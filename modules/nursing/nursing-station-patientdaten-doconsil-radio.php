<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
//error_reporting(0);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
/**
 * CARE2X Integrated Hospital Information System version deployment 1.1 (mysql) 2004-01-11
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * , elpidio@care2x.org
 *
 * See the file "copy_notice.txt" for the licence notice
 */
$lang_tables[] = 'departments.php';
define('LANG_FILE', 'konsil.php');
include_once($root_path . 'include/care_api_classes/class_prescription.php');
if (!isset($pres_obj))
    $pres_obj = new Prescription;
include_once($root_path . 'include/care_api_classes/class_core.php');


/* We need to differentiate from where the user is coming:
 *  $user_origin != lab ;  from patient charts folder
 *  $user_origin == lab ;  from the laboratory
 *  and set the user cookie name and break or return filename
 */
$target = "radio";
if ($user_origin == 'lab') {
    $local_user = 'ck_lab_user';
    if ($target == "radio")
        $breakfile = $root_path . 'modules/radiology/radiolog.php' . URL_APPEND;
    else
        $breakfile = $root_path . 'modules/laboratory/labor.php' . URL_APPEND;
}
else {
    $local_user = 'ck_pflege_user';
    $breakfile = "nursing-station-patientdaten.php" . URL_APPEND . "&edit=$edit&station=$station&pn=$pn";
}

require_once($root_path . 'include/inc_front_chain_lang.php');
require_once($root_path . 'global_conf/inc_global_address.php');

//$db->debug=1;

$thisfile = basename($_SERVER['PHP_SELF']);

$bgc1 = '#ffffff';  // entry form's background color
//$abtname=get_meta_tags($root_path."global_conf/$lang/konsil_tag_dept.pid");

$formtitle = $LDRadiology;

$db_request_table = 'radio';
define('_BATCH_NR_INIT_', 60000000);
/*
 *  The following are  batch nr inits for each type of test request
 *   chemlabor = 10000000; patho = 20000000; baclabor = 30000000; blood = 40000000; generic = 50000000; radio = 60000000
 */
$debug = false;
($debug) ? $db->debug = TRUE : $db->debug = FALSE;
/* Here begins the real work */
require_once($root_path . 'include/inc_date_format_functions.php');

# Create a core object
//require_once($root_path.'include/inc_front_chain_lang.php');
$core = new Core;

include_once($root_path . 'include/care_api_classes/class_encounter.php');
$enc_obj = new Encounter;

/* Check for the patient number = $pn. If available get the patients data, otherwise set edit to 0 */
if (isset($pn) && $pn) {
    $sql = 'SELECT current_dept_nr FROM care_encounter WHERE encounter_nr=' . $pn;
    $result = $db->Execute($sql);
    $row = $result->FetchRow();
    $dept_nr = $row['current_dept_nr'];

    if ($enc_obj->loadEncounterData($pn)) {
        /*
          include_once($root_path.'include/care_api_classes/class_globalconfig.php');
          $GLOBAL_CONFIG=array();
          $glob_obj=new GlobalConfig($GLOBAL_CONFIG);
          $glob_obj->getConfig('patient_%');
          switch ($enc_obj->EncounterClass())
          {
          case '1': $full_en = ($pn + $GLOBAL_CONFIG['patient_inpatient_nr_adder']);
          break;
          case '2': $full_en = ($pn + $GLOBAL_CONFIG['patient_outpatient_nr_adder']);
          break;
          default: $full_en = ($pn + $GLOBAL_CONFIG['patient_inpatient_nr_adder']);
          }
         */ $full_en = $pn;
        $result = $enc_obj->encounter;
        include_once($root_path . 'include/care_api_classes/class_diagnostics.php');
        $diag_obj_rad = new Diagnostics;
        $diag_obj_rad->useRadioRequestTable();
    } else {
        $edit = 0;
        $mode = "";
        $pn = "";
    }
}

if (!isset($dept_nr) or $dept_nr == '')
    $dept_nr = $data['dept_nr'];

if (!isset($mode))
    $mode = "";

//Get here patient notes for encounter
if ($enc_obj->getEncounterNotes($pn)) {
    $enc_notes = $enc_obj->getEncounterNotes($pn)->FetchRow();
//    print_r($enc_notes);
}


switch ($mode) {
    case 'save':
        /* 			
          $diag_obj_rad->useRadioRequestTable();
          $data['batch_nr']=$batch_nr;
          $data['encounter_nr']=$pn;
          $data['dept_nr']=$current_dept_nr;
          $data['test_type']=$test_type;
          $data['if_patmobile']=$if_patmobile;
          $data['if_allergy']=$if_allergy;
          $data['if_hyperten']=$if_hyperten;
          $data['if_pregnant']=$if_pregnant;
          $data['clinical_info']=$clinical_info;
          $data['test_request']=$test_request;
          $data['send_date']= date('Y-m-d H:i:s');
          $data['send_doctor']=$send_doctor;
          $data['test_nr']=$test_nr;
          $data['test_date']=$test_date;
          $data['test_time']=$test_time;
          $data['status']='pending';
          $data['history']="Create: ".date('Y-m-d H:i:s')." = ".$_SESSION['sess_user_name']."\n";
          $data['bill_number']=$bill_nr;
          $data['bill_status']=$bill_status;
          $data['is_disabled']=$is_disabled;
          $data['modify_id']=$_SESSION['sess_user_name'];
          $data['modify_time']=date('YmdHis');
          $data['create_id']=$_SESSION['sess_user_name'];
          $data['create_time']=date('YmdHis');
          $data['process_id']=$_SESSION['sess_user_name'];
          $data['process_time']=date('YmdHis');
          $diag_obj_rad->setDataArray($data);
          //echo 'Name: '.$tmpParam[0];

         */
        if (empty($xray))
            $xray = 0;
        if (empty($ct))
            $ct = 0;
        if (empty($sono))
            $sono = 0;
        if (empty($mammograph))
            $mammograph = 0;
        if (empty($mrt))
            $mrt = 0;
        if (empty($nuclear))
            $nuclear = 0;

        //Generate a new batch number for the request

        $sql_batch = "SELECT batch_nr FROM care_test_request_" . $db_request_table . " ORDER BY batch_nr DESC";
        if ($ergebnis = $db->SelectLimit($sql_batch, 1)) {
            if ($batchrows = $ergebnis->RecordCount()) {
                $bnr = $ergebnis->FetchRow();
                $batch_nr = $bnr['batch_nr'];
                if (!$batch_nr)
                    $batch_nr = _BATCH_NR_INIT_;
                else
                    $batch_nr++;
            }
            else {
                $batch_nr = _BATCH_NR_INIT_;
            }
        } else {
            echo "<p>$sql<p>$LDDbNoRead";
        } //End of batch number generation




        $sql = "INSERT INTO care_test_request_" . $db_request_table . "
			(batch_nr, encounter_nr, dept_nr,
			xray, ct, sono, mammograph, mrt, nuclear,
			 if_patmobile, if_allergy, if_hyperten, if_pregnant,
			 test_request, number_of_tests, send_date,
			send_doctor, status,
			history,
			create_id,
			create_time,
			results)
			VALUES
			(
			'" . $batch_nr . "','" . $pn . "','" . $dept_nr . "',
			'" . $xray . "','" . $ct . "','" . $sono . "','" . $mammograph . "','" . $mrt . "','" . $nuclear . "',
			'" . $if_patmobile . "','" . $if_allergy . "','" . $if_hyperten . "','" . $if_pregnant . "',
			'" . htmlspecialchars($test_request) . "','" . $number_of_tests . "','" . date('Y-m-d') . "',
			'" . htmlspecialchars($send_doctor) . "', 'pending',
			'Create: " . date('Y-m-d H:i:s') . " = " . $_SESSION['sess_user_name'] . "\n',
			'" . $_SESSION['sess_user_name'] . "',
			'" . date('YmdHis') . "',
			''
			)";


        $presc_obj = new Prescription;

//$drug_list_id = $presc_obj-> GetItemIDByName($_POST['test_request']);

        $presc_obj->insert_prescription_Radio($pn, $_POST['test_request'], $_POST['number_of_tests']);
        if ($ergebnis = $core->Transact($sql)) {
            //echo $sql;
            // Load the visual signalling functions
            include_once($root_path . 'include/inc_visual_signalling_fx.php');
            // Set the visual signal
            setEventSignalColor($pn, SIGNAL_COLOR_RADIOLOGY_REQUEST);

            header("location:" . $root_path . "modules/laboratory/labor_test_request_aftersave.php?sid=$sid&lang=$lang&edit=$edit&saved=insert&pn=$pn&station=$station&user_origin=$user_origin&status=$status&target=$target&noresize=$noresize&batch_nr=$batch_nr");
            exit;
        } else {
            echo "<p>$sql<p>$LDDbNoSave";
            $mode = "";
        }


        break; // end of case 'save'

    case 'update':

        $sql = "UPDATE care_test_request_" . $db_request_table . " SET
								          dept_nr = '" . $dept_nr . "',
										  xray='" . $xray . "', ct='" . $ct . "', sono='" . $sono . "',
										  mammograph='" . $mammograph . "', mrt='" . $mrt . "', nuclear='" . $nuclear . "',
										  if_patmobile='" . $if_patmobile . "', if_allergy='" . $if_allergy . "',
										  if_hyperten='" . $if_hyperten . "', if_pregnant='" . $if_pregnant . "',
										  clinical_info='', "
                . "                                                                   test_request='" . htmlspecialchars($test_request) . "',
										  send_date='" . formatDate2Std($send_date, $date_format) . "',
										  send_doctor='" . htmlspecialchars($send_doctor) . "', status='" . $status . "',
										  history=" . $core->ConcatHistory('Update: ' . date('Y-m-d H:i:s') . ' = ' . $_SESSION['sess_user_name'] . '\n') . ",
											bill_number='" . $bill_nr . "',
											bill_status='" . $bill_status . "',
											is_disabled='" . $is_disabled . "',
										  modify_id='" . $_SESSION['sess_user_name'] . "',
										  modify_time='" . date('YmdHis') . "'
										   WHERE batch_nr = '" . $batch_nr . "'";

        if ($ergebnis = $core->Transact($sql)) {
            //echo $sql;
            // Load the visual signalling functions
            include_once($root_path . 'include/inc_visual_signalling_fx.php');
            // Set the visual signal
            setEventSignalColor($pn, SIGNAL_COLOR_DIAGNOSTICS_REQUEST);

            header("location:" . $root_path . "modules/laboratory/labor_test_request_aftersave.php?sid=$sid&lang=$lang&edit=$edit&saved=update&pn=$pn&station=$station&user_origin=$user_origin&status=$status&target=$target&batch_nr=$batch_nr&noresize=$noresize");
            exit;
        } else {
            echo "<p>$sql<p>$LDDbNoSave";
            $mode = '';
        }

        break; // end of case 'save'


    /* If mode is edit, get the stored test request when its status is either "pending" or "draft"
     *  otherwise it is not editable anymore which happens when the lab has already processed the request,
     *  or when it is discarded, hidden, locked, or otherwise.
     */
    case 'edit':

        $sql = "SELECT * FROM care_test_request_" . $db_request_table . " WHERE batch_nr='" . $batch_nr . "' AND (status='pending' OR status='draft')";
        if ($ergebnis = $db->Execute($sql)) {
            if ($editable_rows = $ergebnis->RecordCount()) {
                $stored_request = $ergebnis->FetchRow();
                $edit_form = 1;
            }
        }

        break; ///* End of case 'edit': */

    default: $mode = "";
}// end of switch($mode)

if (!$mode) /* Get a new batch number */ {
//    $sql = "SELECT batch_nr FROM care_test_request_" . $db_request_table . " ORDER BY batch_nr DESC";
//    if ($ergebnis = $db->SelectLimit($sql, 1)) {
//        if ($batchrows = $ergebnis->RecordCount()) {
//            $bnr = $ergebnis->FetchRow();
//            $batch_nr = $bnr['batch_nr'];
//            if (!$batch_nr)
//                $batch_nr = _BATCH_NR_INIT_;
//            else
//                $batch_nr++;
//        }
//        else {
//            $batch_nr = _BATCH_NR_INIT_;
//        }
//    } else {
//        echo "<p>$sql<p>$LDDbNoRead";
//    }
    $mode = "save";
}

# Start Smarty templating here
/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme

require_once($root_path . 'gui/smarty_template/smarty_care.class.php');
$smarty = new smarty_care('nursing');

# Title in toolbar
$smarty->assign('sToolbarTitle', "$LDDiagnosticTest :: $formtitle");

# hide back button
$smarty->assign('pbBack', FALSE);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('request_radio.php','$pn')");

# href for close button
$smarty->assign('breakfile', $breakfile);

# Window bar title
$smarty->assign('sWindowTitle', "$LDDiagnosticTest :: $formtitle");

# Create start new button if user comes from lab
if ($user_origin == 'lab') {
    $smarty->assign('pbAux1', $thisfile . URL_APPEND . "&station=$station&user_origin=$user_origin&status=$status&target=$target&noresize=$noresize");
    $smarty->assign('gifAux1', createLDImgSrc($root_path, 'newpat2.gif', '0'));
}

if (!$noresize) {
    $sOnLoadJs = 'if (window.focus) window.focus();window.moveTo(0,0); window.resizeTo(1000,740);';
} else {
    $sOnLoadJs = 'if (window.focus) window.focus();';
}
if ($pn == "")
    $sOnLoadJs = $sOnLoadJs . 'document.searchform.searchkey.focus();';

$smarty->assign('sOnLoadJs', 'onLoad="' . $sOnLoadJs . '"');

# Collect extra javascript code
ob_start();
?>

<style type="text/css">
    div.fva2_ml10 {
        font-family: verdana, arial;
        font-size: 12;
        margin-left: 10;
    }

    div.fa2_ml10 {
        font-family: arial;
        font-size: 12;
        margin-left: 10;
    }

    div.fva2_ml3 {
        font-family: verdana;
        font-size: 12;
        margin-left: 3;
    }

    div.fa2_ml3 {
        font-family: arial;
        font-size: 12;
        margin-left: 3;
    }

    .fva2_ml10 {
        font-family: verdana, arial;
        font-size: 12;
        margin-left: 10;
        color: #000000;
    }

    .fva2b_ml10 {
        font-family: verdana, arial;
        font-size: 12;
        margin-left: 10;
        color: #000000;
    }

    .fva0_ml10 {
        font-family: verdana, arial;
        font-size: 10;
        margin-left: 10;
        color: #000000;
    }
</style>

<script language="javascript">
<!--
    function chkForm(d) {

        if ((d.test_request.value == '') || (d.test_request.value == ' '))
        {
            alert("<?php echo $LDPlsEnterDiagnosisQuiry ?>");
            d.test_request.focus();
            return false;
        } else if ((d.number_of_tests.value == '') || (d.number_of_tests.value == ' '))
        {
            alert("<?php echo $LDPlsEnterNoOfTests ?>");
            d.number_of_tests.focus();
            return false;
        }
//        else if ((d.clinical_info.value == '') || (d.clinical_info.value == ' '))
//        {
//            alert("<?php // echo $LDPlsEnterClinicalInfo   ?>");
//            d.clinical_info.focus();
//            return false;
//        } 
        else if ((d.send_doctor.value == '') || (d.send_doctor.value == ' '))
        {
            alert("<?php echo $LDPlsEnterDoctorName ?>");
            d.send_doctor.focus();
            return false;
        } else if ((d.send_date.value == '') || (d.send_date.value == ' '))
        {
            alert("<?php echo $LDPlsEnterDate ?>");
            d.send_date.focus();
            return false;
        } else if ((d.test_type.value == '') || (d.test_type.value == ' '))
        {
            alert("<?php echo $LDPlsSelectType ?>");
            d.test_type.focus();
            return false;
        } else
            return true;
    }

    function sendLater()
    {
        document.form_test_request.status.value = "draft";
        if (chkForm(document.form_test_request))
            document.form_test_request.submit();
    }

    function printOut()
    {
        urlholder = "<?php echo $root_path ?>modules/laboratory/labor_test_request_printpop.php?sid=<?php echo $sid ?>&lang=<?php echo $lang ?>&user_origin=<?php echo $user_origin ?>&subtarget=<?php echo $target ?>&batch_nr=<?php echo $batch_nr ?>&pn=<?php echo $pn; ?>";
                testprintout<?php echo $sid ?> = window.open(urlholder, "testprintout<?php echo $sid ?>", "width=800,height=600,menubar=no,resizable=yes,scrollbars=yes");
                testprintout<?php echo $sid ?>.print();
            }





<?php require($root_path . 'include/inc_checkdate_lang.php'); ?>

//-->
</script>

<script
language="javascript" src="<?php echo $root_path; ?>js/setdatetime.js"></script>
<script
language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>
<script
    language="javascript"
src="<?php echo $root_path; ?>js/dtpick_care2x.js"></script>

<?php
$sTemp = ob_get_contents();
ob_end_clean();

$smarty->append('JavaScript', $sTemp);

ob_start();
?>

<ul>

    <?php
    if ($edit) {
        ?>
        <form name="form_test_request" method="post"
              action="<?php echo $thisfile ?>" onSubmit="return chkForm(this)"><?php
                  /* If in edit mode display the control buttons */

                  $controls_table_width = 700;

                  require($root_path . 'include/inc_test_request_controls.php');
              } elseif (!$read_form && !$no_proc_assist) {
                  ?>

            <table border=0>
                <tr>
                    <td valign="bottom"><img
                            <?php echo createComIcon($root_path, 'angle_down_l.gif', '0') ?>></td>
                    <td><font color="#000099" SIZE=3 FACE="verdana,Arial"> <b><?php echo $LDPlsSelectPatientFirst ?></b></font></td>
                    <td><img
                            <?php echo createMascot($root_path, 'mascot1_l.gif', '0', 'absmiddle') ?>></td>
                </tr>
            </table>
            <?php
        }
        ?> <!--  outermost table creating form border -->
        <table border=0 bgcolor="#000000" cellpadding=1 cellspacing=0>
            <tr>
                <td>

                    <table border=0 bgcolor="#ffffff" cellpadding=0 cellspacing=0>
                        <tr>
                            <td>

                                <table cellpadding=0 cellspacing=1 border=0 width=760>
                                    <tr valign="top">
                                        <td bgcolor="#ffffff"><?php
                                            /* echo '
                                              <div class=fva2b_ml10><span style="background:yellow"><b>'.$result[patnum].'</b></span><br>
                                              <b>'.$result[name].', '.$result[vorname].'</b> <br>
                                              <font color=maroon>'.formatDate2Local($result[gebdatum],$date_format).'</font> <br><font size=1>
                                              '.nl2br($result[address]).'<p>
                                              '.$station.'&nbsp;'.$result[kasse].' '.$result[kassename].'</div>';
                                              echo '
                                              <input type="text" name="stat_dept" value="'.strtoupper($station).'" size=25 maxlength=30>
                                              </div>
                                             */
                                            if ($edit) {
                                                echo '<img src="' . $root_path . 'main/imgcreator/barcode_label_single_large.php?sid=' . $sid . '&lang=' . $lang . '&fen=' . $full_en . '&en=' . $pn . '" width=282 height=178>';
                                            } elseif ($pn == '') {
                                                $searchmask_bgcolor = "#f3f3f3";
                                                include($root_path . 'include/inc_test_request_searchmask.php');
                                            }
                                            ?> </td>
                                        <?php /* ?>							     <td bgcolor="<?php echo $bgc1 ?>"  class=fva2_ml10><div class=fva2_ml10><font size=5 color="#0000ff"><b><?php echo $formtitle ?></b></font>
                                          <br><?php echo $global_address[$target].'<br>'.$LDTel.'&nbsp;'.$global_phone[$target]; ?>
                                          </td>
                                          </tr>
                                          <tr>
                                          <td bgcolor="<?php echo $bgc1 ?>" align="right" valign="bottom">
                                          <?php
                                          echo '<font size=1 color="#990000" face="verdana,arial">'.$batch_nr.'</font>&nbsp;&nbsp;<br>';
                                          echo "<img src='".$root_path."classes/barcode/image.php?code=".$batch_nr."&style=68&type=I25&width=145&height=40&xres=2&font=5' border=0>";
                                          </td> */ ?>
                                    </tr>

                                    <tr bgcolor="<?php echo $bgc1 ?>">
                                        <td valign="top" colspan=2>


                                            <table border=0 cellpadding=1 cellspacing=1 width=100%>

                                                <?php
                                                echo '<tr><td colspan=2><div class=fva2_ml10>' . $LDReqTest . ':<br>';
                                                echo '<select name="test_request">';
                                                echo '<option value="">==Select a test==</option>';
                                                $drug_list = $pres_obj->getDrugList('xray', '0');
                                                for ($i = 0; $i < sizeOf($drug_list); $i++) {

                                                    if ($drug_list[$i][1] == $stored_request['test_request']) {
                                                        echo '<option selected value="' . $drug_list[$i][1] . '">' . $drug_list[$i][0] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $drug_list[$i][1] . '">' . $drug_list[$i][0] . '</option>';
                                                    }
                                                }
                                                echo '</select></td></tr>';

                                                echo '<tr><td colspan = 2>';
                                                echo '<p>';
                                                echo '</td></tr>';

                                                echo '<tr><td colspan=2><div class=fva2_ml10>' . $LDNoOfTests . ':<br>';
                                                echo '<select name="number_of_tests">';
// echo '<option selected value="">=>Number of Tests= </option>';
                                                echo '<option selected value="1">1</option>';
                                                echo '<option value="2">2</option>';
                                                echo '</select></td></tr>';
                                                ?>
                                                <?php
                                                /* THE CODE BELOW HAS BEEN DISABLED, HAYDOM DONT SEE THE NEED FOR THEM TO ENABLE YOU WILL HAVE TO REMOVE PHP TAGS AT THE TOP OF COMMENT AND BOTTON
                                                  <tr>
                                                  <td align="right"><div class=fva2_ml10><?php echo $LDXrayTest ?></td>
                                                  <td><input type="checkbox" name="xray" value="1" <?php if(($edit_form || $read_form) && $stored_request['xray']) echo "checked" ?>></td>
                                                  <td align="right"><div class=fva2_ml10><?php echo $LDSonograph ?></td>
                                                  <td><input type="checkbox" name="sono" value="1" <?php if(($edit_form || $read_form) && $stored_request['sono']) echo "checked" ?>></td>
                                                  </tr>
                                                  <tr>
                                                  <td align="right"><div class=fva2_ml10><?php echo $LDCT ?></td>
                                                  <td><input type="checkbox" name="ct" value="1" <?php if(($edit_form || $read_form) && $stored_request['ct']) echo "checked" ?>></td>
                                                  <td align="right"><div class=fva2_ml10><?php echo $LDMammograph ?></td>
                                                  <td><input type="checkbox" name="mammograph" value="1" <?php if(($edit_form || $read_form) && $stored_request['mammograph']) echo "checked" ?>></td>
                                                  </tr>
                                                  <tr>
                                                  <td align="right"><div class=fva2_ml10><?php echo $LDMRT ?></td>
                                                  <td><input type="checkbox" name="mrt" value="1" <?php if(($edit_form || $read_form) && $stored_request['mrt']) echo "checked" ?>></td>
                                                  <td align="right"><div class=fva2_ml10><?php echo $LDNuclear ?></td>
                                                  <td><input type="checkbox" name="nuclear" value="1" <?php if(($edit_form || $read_form) && $stored_request['nuclear']) echo "checked" ?>></td>
                                                  </tr>
                                                 */
                                                ?>


                                                <tr>
                                                    <td colspan=4>
                                                        <hr>									</td>
                                                </tr>

                                                <tr>
                                                    <td align="right">
                                                        <div class=fva2_ml10><?php echo $LDPatMobile ?> &nbsp;<?php echo $LDYes ?>									</div>									</td>
                                                    <td><font size=2 face="verdana,arial"> <input type="radio"
                                                                                                  name="if_patmobile" value="1"
                                                                                                  <?php if (($edit_form || $read_form) && $stored_request['if_patmobile']) echo "checked" ?>>
                                                        &nbsp;<?php echo $LDNo ?> <input type="radio"
                                                                                         name="if_patmobile" value="0"
                                                                                         <?php if (($edit_form || $read_form) && !$stored_request['if_patmobile']) echo "checked" ?>></font></td>
                                                    <td align="right">
                                                        <div class=fva2_ml10><?php echo $LDAllergyKnown ?> &nbsp;<?php echo $LDYes ?>									</div>									</td>
                                                    <td><font size=2 face="verdana,arial"> <input type="radio"
                                                                                                  name="if_allergy" value="1"
                                                                                                  <?php if (($edit_form || $read_form) && $stored_request['if_allergy']) echo "checked" ?>>
                                                        &nbsp;<?php echo $LDNo ?> <input type="radio" name="if_allergy"
                                                                                         value="0"
                                                                                         <?php if (($edit_form || $read_form) && !$stored_request['if_allergy']) echo "checked" ?>></font></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">
                                                        <div class=fva2_ml10><?php echo $LDHyperthyreosisKnown ?>
                                                            &nbsp;<?php echo $LDYes ?>									</div>									</td>
                                                    <td><font size=2 face="verdana,arial"> <input type="radio"
                                                                                                  name="if_hyperten" value="1"
                                                                                                  <?php if (($edit_form || $read_form) && $stored_request['if_hyperten']) echo "checked" ?>>
                                                        &nbsp;<?php echo $LDNo ?> <input type="radio"
                                                                                         name="if_hyperten" value="0"
                                                                                         <?php if (($edit_form || $read_form) && !$stored_request['if_hyperten']) echo "checked" ?>></font></td>
                                                    <td align="right">
                                                        <div class=fva2_ml10><?php echo $LDPregnantPossible ?> &nbsp;<?php echo $LDYes ?>									</div>									</td>
                                                    <td><font size=2 face="verdana,arial"> <input type="radio"
                                                                                                  name="if_pregnant" value="1"
                                                                                                  <?php if (($edit_form || $read_form) && $stored_request['if_pregnant']) echo "checked" ?>>
                                                        &nbsp;<?php echo $LDNo ?> <input type="radio"
                                                                                         name="if_pregnant" value="0"
                                                                                         <?php if (($edit_form || $read_form) && !$stored_request['if_pregnant']) echo "checked" ?>></font></td>
                                                </tr>
                                            </table>							</td>
                                    </tr>
                                    <tr bgcolor="<?php echo $bgc1 ?>">
                                        <td colspan=2>
                                            <div class=fva2_ml10><?php echo $LDClinicalInfo ?>:<br>
                                                <textarea name="clinical_info" cols=110 rows=12 wrap="physical" readonly="readonly"><?php
//                                                    if (!($edit_form || $read_form) && !$stored_request['clinical_info']) {
                                                    echo stripslashes($enc_notes['notes']);
//                                                    } else {
//                                                        echo stripslashes($stored_request['clinical_info']);
//                                                    }
                                                    ?></textarea>

                                            </div>							</td>
                                    </tr>

                                    <!-- 
echo '<tr bgcolor="<?php echo $bgc1 ?>">
    <td colspan=2><div class=fva2_ml10><?php echo $LDReqTest ?>:<br>
    <textarea name="test_request" cols=80 rows=5 wrap="physical"><?php
                                    if (!($edit_form || $read_form) && !$stored_request['test_request'])
                                        echo stripslashes($stored_request['test_request']);
                                    else
                                        echo $enc_notes['notes'];
                                    ?></textarea>
                    </td>';-->
                                    <tr bgcolor="<?php echo $bgc1 ?>">
                                        <td colspan=2 align="right">
                                            <div class=fva2_ml10><font color="#000099"> <?php echo $LDDate ?>:

                                                <font
                                                    size=1 face="arial"> <?php echo $LDRequestingDoc ?>: 
                                                    <?php
//                                                    session_id($sid);
//                                                    session_start();
//                                                    print_r($_SESSION);
                                                    ?>
                                                <input type="text" name="send_doctor" size=40 maxlength=40 value="<?php echo $_SESSION['sess_user_name']; ?>" readonly> </font></div><br>							</td>
                                    </tr>
                                    <tr bgcolor="<?php echo $bgc1 ?>">
                                        <td colspan=2 bgcolor="#cccccc">
                                            <div class=fva2_ml10><font color="#000099"> <?php echo $LDXrayNumber ?>
                                                <img
                                                    src="<?php echo $root_path ?>gui/img/common/default/gray_pixel.gif"
                                                    border=0 width=100 height=20 align="absmiddle" vspace=3> <?php echo $LD_r_cm2 ?>
                                                <img
                                                    src="<?php echo $root_path ?>gui/img/common/default/gray_pixel.gif"
                                                    border=0 width=50 height=20 align="absmiddle" vspace=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <?php echo $LDXrayTechnician ?>&nbsp;<img
                                                    src="<?php echo $root_path ?>gui/img/common/default/gray_pixel.gif"
                                                    border=0 width=150 height=20 align="absmiddle" vspace=3> <?php echo $LDDate ?>&nbsp;<img
                                                    src="<?php echo $root_path ?>gui/img/common/default/gray_pixel.gif"
                                                    border=0 width=100 height=20 align="absmiddle" vspace=3></div>							</td>
                                    </tr>
                                    <tr bgcolor="<?php echo $bgc1 ?>">
                                        <td colspan=2>
                                            <div class=fva2_ml10>&nbsp;<br>
                                                <font color="#969696"><?php echo $LDNotesTempReport ?></font><br>
                                                <img
                                                    src="<?php echo $root_path ?>gui/img/common/default/gray_pixel.gif"
                                                    border=0 width=675 height=120>							</div>							</td>
                                    </tr>

                                    <tr bgcolor="<?php echo $bgc1 ?>">
                                        <td colspan=2 align="right">
                                            <div class=fva2_ml10><font color="#969696"> <?php echo $LDDate ?>
                                                <img
                                                    src="<?php echo $root_path ?>gui/img/common/default/gray_pixel.gif"
                                                    border=0 width=100 height=20 align="absmiddle" vspace=3> <?php echo $LDReportingDoc ?>
                                                <img
                                                    src="<?php echo $root_path ?>gui/img/common/default/gray_pixel.gif"
                                                    border=0 width=250 height=20 align="absmiddle" vspace=3></div>							</td>
                                    </tr>
                                </table>					</td>
                        </tr>
                    </table>		</td>
            </tr>
        </table>





        <?php
        if ($edit) {

            /* If in edit mode display the control buttons */
            require($root_path . 'include/inc_test_request_controls.php');

            require($root_path . 'include/inc_test_request_hiddenvars.php');
            ?>
        </form>

        <?php
    }
    ?>
</ul>

<?php
$sTemp = ob_get_contents();
ob_end_clean();

# Assign to page template object
$smarty->assign('sMainFrameBlockData', $sTemp);

/**
 * show Template
 */
$smarty->display('common/mainframe.tpl');
?>
