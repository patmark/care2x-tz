<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
//error_reporting(E_WARNING);
/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * elpidio@care2x.org, 
 *
 * See the file "copy_notice.txt" for the licence notice
 */
/* We need to differentiate from where the user is coming: 
 *  $user_origin != lab ;  from patient charts folder
 *  $user_origin == lab ;  from the laboratory
 *  $user_origin == amb ;  from the ambulatory clinics
 *  and set the user cookie name and break or return filename
 */
switch ($user_origin) {
    case 'lab':

        $local_user = 'ck_lab_user';
        $breakfile = $root_path . 'labor.php' . URL_APPEND;
        break;

    case 'amb':

        $local_user = 'ck_amb_user';
        $breakfile = $root_path . 'dept.php?sid=' . URL_APPEND;
        break;

    case 'patreg':

        $local_user = 'aufnahme_user';
        $breakfile = 'javascript:window.close()';
        break;

    default:

        $local_user = 'ck_pflege_user';
        $breakfile = $root_path . "pflege-station-patientdaten.php" . URL_APPEND . "&edit=$edit&station=$station&pn=$pn";
}

/* Start initializations */
//$lang_tables[] = 'departments.php';
$lang_tables = array('departments.php', 'konsil.php');
if ($subtarget == 'chemlabor')
    define('LANG_FILE', 'konsil_chemlabor.php');
else
    define('LANG_FILE', 'konsil.php');

require_once($root_path . 'include/inc_front_chain_lang.php'); ///* invoke the script lock*/

/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme
require_once($root_path . 'gui/smarty_template/smarty_care.class.php');
$smarty = new smarty_care('laboratory');


$thisfile = 'labor_test_request_printpop.php';


if (!empty($_GET['tracker']))
    $h_batch_nr = $_GET['batch_nr'];
else
    $h_batch_nr = $batch_nr;

/* The main background color of the form */
if ($target == 'generic') {
    $bgc1 = '#bbdbc4';
} else {
    switch ($subtarget) {
        case 'generic':
            $bgc1 = '#bbdbc4';
            break;
        case 'patho':
            $bgc1 = '#cde1ec';
            $formtitle = $LDPathology;
            break;
        case 'radio':
            $bgc1 = '#ffffff';
            $formtitle = $LDRadiology;
            break;
        case 'blood':
            $bgc1 = '#99ffcc';
            $formtitle = $LDBloodBank;
            break;
        case 'chemlabor':
            $bgc1 = '#fff3f3';
            $formtitle = $LDChemicalLaboratory;
            break;
        case 'baclabor':
            $formtitle = $LDBacteriologicalLaboratory;
            $bgc1 = '#fff3f3';
            /* Load additional language table */
            if (file_exists($root_path . 'language/' . $lang . '/lang_' . $lang . '_konsil_baclabor.php'))
                include_once($root_path . 'language/' . $lang . '/lang_' . $lang . '_konsil_baclabor.php');
            else
                include_once($root_path . 'language/' . LANG_DEFAULT . '/lang_' . LANG_DEFAULT . '_konsil_baclabor.php');
            break;
        default: $bgc1 = '#ffffff';
            break;
    }
}
//$abtname=get_meta_tags($root_path."global_conf/$lang/konsil_tag_dept.pid");
$edit_form = 0; /* Set form to non-editable */
$read_form = 1; /* Set form to read */
$edit = 0; /* Set script mode to no edit */

//$formtitle=$abtname[$subtarget];


if ($target == 'generic') {
    $db_request_table = $target;
    $sql_2 = "SELECT * FROM care_test_request_" . $db_request_table . " WHERE batch_nr='" . $h_batch_nr . "'";
    $formfile = $target;
} else {
    $db_request_table = $subtarget;
    $sql_2 = "SELECT * FROM care_test_request_" . $db_request_table . " WHERE batch_nr='" . $h_batch_nr . "'";
    $formfile = $subtarget;
}


include_once($root_path . 'include/care_api_classes/class_department.php');
$dept_obj = new Department;

require_once($root_path . 'include/care_api_classes/class_lab.php');
$lab_obj = new Lab;

$enc_notes;

/* Check for the patietn number = $pn. If available get the patients data, */
if (isset($pn) && $pn) {
    include_once($root_path . 'include/care_api_classes/class_encounter.php');
    $enc_obj = new Encounter;

    if ($enc_obj->loadEncounterData($pn)) {
        $edit = true;
        include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
        $GLOBAL_CONFIG = array();
        $glob_obj = new GlobalConfig($GLOBAL_CONFIG);
        $glob_obj->getConfig('patient_%');
        switch ($enc_obj->EncounterClass()) {
            case '1': $full_en = ($pn + $GLOBAL_CONFIG['patient_inpatient_nr_adder']);
                break;
            case '2': $full_en = ($pn + $GLOBAL_CONFIG['patient_outpatient_nr_adder']);
                break;
            default: $full_en = ($pn + $GLOBAL_CONFIG['patient_inpatient_nr_adder']);
        }
        $_SESSION['sess_en'] = $pn;
        $_SESSION['sess_full_en'] = $full_en;
    }

    $result = $enc_obj->encounter;

    include_once($root_path . 'include/care_api_classes/class_ward.php');
    $ward_obj = new Ward;

    require_once($root_path . 'include/care_api_classes/class_tz_billing.php');
    $bill_obj = new Bill;
    $bill_number = $bill_obj->GetBillByBatchNr($h_batch_nr);
    /* prepare selection to show the headline... */
    //Sql headline for chemlabor
    if ($subtarget == 'chemlabor') {
        $sql_headline = "SELECT care_person.pid, care_person.selian_pid, UPPER(name_last) as name_last, CONCAT(name_first,'  ', name_2) AS name_first, sex, batch_nr, 
                date_birth,care_encounter.encounter_class_nr,care_encounter.current_ward_nr,care_encounter.current_dept_nr, 
                tr.encounter_nr,tr.send_date, tr.notes, tr.specimen_collected, tr.specimen_date, tr.specimen_type, tr.specimen_volume, 
                tr.specimen_units, tr.specimen_container, tr.specimen_taken_by, 
                dept_nr,room_nr,tr.create_id FROM care_test_request_" . $subtarget . " tr, care_encounter, care_person
						         WHERE (tr.status='pending' OR tr.status='') AND
						         tr.encounter_nr = care_encounter.encounter_nr AND
						         care_encounter.pid = care_person.pid
						         AND tr.batch_nr = " . $h_batch_nr . "
						         ";
    } else {
        $sql_headline = "SELECT care_person.pid, care_person.selian_pid, UPPER(name_last) as name_last, CONCAT(name_first,'  ', name_2) AS name_first, sex, batch_nr, 
                date_birth,care_encounter.encounter_class_nr,care_encounter.current_ward_nr,care_encounter.current_dept_nr, 
                tr.encounter_nr,tr.send_date, dept_nr,tr.create_id FROM care_test_request_" . $subtarget . " tr, care_encounter, care_person
						         WHERE (tr.status='pending' OR tr.status='') AND
						         tr.encounter_nr = care_encounter.encounter_nr AND
						         care_encounter.pid = care_person.pid
						         AND tr.batch_nr = " . $h_batch_nr . "
						         ";
    }
//    echo $sql_headline;
    if ($h_requests = $db->Execute($sql_headline)) {
        if ($test_request_headline = $h_requests->FetchRow()) {
            $h_pid = $test_request_headline['pid'];
            $h_batch_nr = $test_request_headline['batch_nr'];
            $h_encounter_nr = $test_request_headline['encounter_nr'];
            $h_encounter_class_nr = $test_request_headline['encounter_class_nr'];
            $h_ipd_admission = $ward_obj->WardName($test_request_headline['current_ward_nr']);
            $h_opd_admission = $dept_obj->DeptName($test_request_headline['current_dept_nr']);
            $h_selian_file_number = $test_request_headline['selian_pid'];
            $h_name_first = ucwords($test_request_headline['name_first']);
            $h_name_last = $test_request_headline['name_last'];
            $h_birthdate = $test_request_headline['date_birth'];
            $h_sex = $test_request_headline['sex'];
            $h_DoctorID = $test_request_headline['create_id'];
            if (isset($test_request_headline['notes'])) {
                $h_notes = $test_request_headline['notes'];
            } else {
                if ($enc_obj->getEncounterNotes($pn)) {
                    $notes = $enc_obj->getEncounterNotes($pn)->FetchRow();
                }
                $h_notes = $notes['notes'];
            }
            $enc_notes = $h_notes;
            $h_request_date = $test_request_headline['send_date'];

            $h_specimen_collected = $test_request_headline['specimen_collected'];
            $h_specimen_type = $test_request_headline['specimen_type'];
            $h_specimen_date = $test_request_headline['specimen_date'];
            $h_specimen_volume = $test_request_headline['specimen_volume'];
            $h_specimen_container = $test_request_headline['specimen_container'];

            $person = $test_request_headline;
            $sql_urgency = 'SELECT priority from care_test_request_chemlabor WHERE batch_nr=' . $h_batch_nr;
            $h_urgency = $db->Execute($sql_urgency);
            $test_urgency = $h_urgency->FetchRow();
            $urgency = $test_urgency['priority'];

            if ($h_encounter_class_nr == 1) {
                $sqlroomprefix = "SELECT roomprefix FROM care_ward WHERE nr=" . $test_request_headline['current_ward_nr'];
                $room_prefix_result = $db->Execute($sqlroomprefix);
                if ($room_prefix = $room_prefix_result->fetchRow()) {
                    $roomprefix = $room_prefix['roomprefix'];
                }
            }
            if ($h_sex == "f") {
                $h_sex_img = "spf.gif";
            } else {
                $h_sex_img = "spm.gif";
            }
            //echo "sex:".$_sex;
        } // end of if ($test_request_headline = $h_requests->FetchRow())
    } // end of if($h_requests=$db->Execute($sql_headline))
}


/* Here begins the real work */
/* Load date formatter */
include_once($root_path . 'include/inc_date_format_functions.php');

/* Load editor functions */
//include_once('../include/inc_editor_fx.php');

if (!isset($mode))
    $mode = "";


if ($enc_obj->is_loaded) {
//    echo $sql_2;
    if ($ergebnis = $db->Execute($sql_2)) {
        if ($editable_rows = $ergebnis->RecordCount()) {

            $stored_request = $ergebnis->FetchRow();

            if (isset($stored_request['parameters'])) {
                //echo $stored_request['parameters'];
                parse_str($stored_request['parameters'], $stored_param);
            }

            /* parse the material type */
            if (isset($stored_request['material'])) {
                parse_str($stored_request['material'], $stored_material);
            }
            /* parse the test type */
            if (isset($stored_request['test_type'])) {
                parse_str($stored_request['test_type'], $stored_test_type);
            }
            $read_form = 1;
            $printmode = 1;
        }
    } else {
        echo "<p>$sql<p>$LDDbNoRead";
    }
}

if ($dept_obj->preloadDept($stored_request['testing_dept'])) {
    $buffer = $dept_obj->LDvar();
    if (isset($$buffer) && !empty($$buffer))
        $formtitle = $$buffer;
    else
        $formtitle = $dept_obj->FormalName();
}
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<?php html_rtl($lang); ?>
<HEAD>
    <?php echo setCharSet(); ?>
    <TITLE><?php echo "$LDDiagnosticTest $station" ?></TITLE>
    <?php
    require($root_path . 'include/inc_js_gethelp.php');
    require($root_path . 'include/inc_css_a_hilitebu.php');
    ?>
    <style type="text/css">
        div.fva2_ml10 {font-family: verdana,arial; font-size: 12; margin-left: 10;}
        div.fa2_ml10 {font-family: arial; font-size: 12; margin-left: 10;}
        div.fva2_ml3 {font-family: verdana; font-size: 12; margin-left: 3; }
        div.fa2_ml3 {font-family: arial; font-size: 12; margin-left: 3; }
        .fva2_ml10 {font-family: verdana,arial; font-size: 12; margin-left: 10; color:#000099;}
        .fva2b_ml10 {font-family: verdana,arial; font-size: 12; margin-left: 10; color:#000000;}
        .fva0_ml10 {font-family: verdana,arial; font-size: 10; margin-left: 10; color:#000099;}
        .fvag_ml10 {font-family: verdana,arial; font-size: 10; margin-left: 10; color:#969696;}

        <?php
        if ($target == 'baclabor') {
            ?>
            .lab {font-family: arial; font-size: 9; color:#ee6666;}
            <?php
        } else {
            ?>
            .lab {font-family: arial; font-size: 9; color:purple;}
            <?php
        }
        ?>

        .lmargin {margin-left: 5;}
    </style>

</HEAD> 

<BODY bgcolor="white" OnLoad="window.print();">

    <?php
    require_once($root_path . 'include/inc_test_request_printout_fx.php');

    if ($show_print_button)
        echo '<a href="javascript:window.print()"><img ' . createLDImgSrc($root_path, 'printout.gif', '0') . '></a><p>';


    /* Load the form for printing out */
    if ($subtarget == 'chemlabor' || $subtarget == 'baclabor') {

        require_once($root_path . 'include/inc_test_request_printout_chemlabor.php');
    } elseif ($subtarget == 'patho') {
        $smarty->assign('bgc1', $bgc1);
        $smarty->assign('printmode', TRUE);

        $read_form = TRUE;

        include($root_path . 'include/inc_test_request_printout_' . $formfile . '.php');

        $smarty->display('forms/pathology.tpl');
    } else {
        include($root_path . 'include/inc_test_request_printout_' . $formfile . '.php');
    }
    ?>


</BODY>
</HTML>
