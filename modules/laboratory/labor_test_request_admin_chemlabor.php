<?php
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
/* Start initializations */
$lang_tables = array('departments.php', 'konsil.php');
define('LANG_FILE', 'konsil_chemlabor.php');

/* We need to differentiate from where the user is coming:
 *  $user_origin != lab ;  from patient charts folder
 *  $user_origin == lab ;  from the laboratory
 *  and set the user cookie name and break or return filename
 */

//$db->debug=1;

if ($user_origin == 'lab') {
    $local_user = 'ck_lab_user';
    $breakfile = $root_path . "modules/laboratory/labor.php" . URL_APPEND;
} elseif ($user_origin == 'amb') {
    $local_user = 'ck_lab_user';
    $breakfile = $root_path . 'modules/ambulatory/ambulatory.php' . URL_APPEND;
} elseif ($user_origin == 'billing') {
    $local_user = 'ck_lab_user';
    $breakfile = $root_path . "modules/billing_tz/billing_tz.php";
} else {
    $local_user = 'ck_lab_user';
    $breakfile = $root_path . "modules/laboratory/labor.php" . URL_APPEND;
    /*
      $local_user='ck_pflege_user';
      $breakfile=$root_path."modules/nursing/nursing-station-patientdaten.php".URL_APPEND."&edit=$edit&station=$station&pn=$pn";
     */
}

require_once($root_path . 'include/inc_front_chain_lang.php'); ///* invoke the script lock*/

$thisfile = 'labor_test_request_admin_chemlabor.php';

$bgc1 = '#fff3f3'; /* The main background color of the form */
$edit_form = 0; /* Set form to non-editable */
$read_form = 1; /* Set form to read */
$edit = 0; /* Set script mode to no edit */

$formtitle = $LDChemicalLaboratory;
$dept_nr = 24; // 24 = department Nr. chemical lab

$subtarget = 'chemlabor';

require_once($root_path . 'include/care_api_classes/class_encounter.php');
$enc_obj = new Encounter;

require_once($root_path . 'include/care_api_classes/class_lab.php');
$lab_obj = new Lab;

/* If request is available, load the date format functions */
require_once($root_path . 'include/inc_date_format_functions.php');

/* Here begins the real work */

if (!isset($mode))
    $mode = '';

switch ($mode) {
    case 'done':
        $sql = "UPDATE care_test_request_" . $subtarget . "
											SET status = 'done',
													history=" . $enc_obj->ConcatHistory("Done: " . date('Y-m-d H:i:s') . " = " . $_SESSION['sess_user_name'] . "\n") . ",
													modify_id = '" . $_SESSION['sess_user_name'] . "',
													modify_time = '" . date('YmdHis') . "'
											WHERE batch_nr = '" . $batch_nr . "'";

        if ($ergebnis = $enc_obj->Transact($sql)) {
            include_once($root_path . 'include/inc_diagnostics_report_fx.php');
            //echo $sql;
            /* If the findings are saved, signal the availability of report to the requesting doctor
             */
            signalNewDiagnosticsReportEvent('', 'labor_test_request_printpop.php');
            if (!$discharge)
                header("location:" . $thisfile . URL_REDIRECT_APPEND . "&edit=$edit&pn=$pn&user_origin=$user_origin&status=$status&target=$target&subtarget=$subtarget&noresize=$noresize");
            else
                header('Location: ../ambulatory/amb_clinic_discharge.php' . URL_REDIRECT_APPEND . '&pn=' . $pn . '&pyear=' . date("Y") . '&pmonth=' . date("n") . '&pday=' . date(j) . '&tb=' . str_replace("#", "", $cfg['top_bgcolor']) . '&tt=' . str_replace("#", "", $cfg['top_txtcolor']) . '&bb=' . str_replace("#", "", $cfg['body_bgcolor']) . '&d=' . $cfg['dhtml'] . '&station=' . $station . '&backpath=' . urlencode('../laboratory/labor_test_request_admin_chemlabor.php') . '&dept_nr=' . $dept_nr);
            exit;
        }else {
            echo "<p>$sql<p>$LDDbNoSave";
            $mode = "";
        }
        break;
}// end of switch($mode)

if (!$mode) /* Get the pending test requests with no specimen/sample collected */ {
    $sql = "SELECT care_person.pid, care_person.selian_pid, UPPER(name_last) as name_last, CONCAT(name_first,'  ', name_2) AS name_first,"
            . "batch_nr, tr.encounter_nr,tr.send_date,tr.notes,tr.priority,dept_nr,room_nr FROM care_test_request_" . $subtarget . " tr,
					care_encounter, care_person
						         WHERE (tr.status='pending' OR tr.status='')  AND
						         tr.encounter_nr = care_encounter.encounter_nr AND
						         care_encounter.pid = care_person.pid
                                                         AND care_encounter.is_discharged = 0
                                                         AND tr.specimen_collected = 0
						         ORDER BY  tr.send_date DESC";

//    echo "<p>$sql<p>";
    if ($requests = $db->Execute($sql)) {

        $batchrows = $requests->RecordCount();
        if ($batchrows && (!isset($batch_nr) || !$batch_nr)) {
            $test_request = $requests->FetchRow();
            /* Check for the patietn number = $pn. If available get the patients data  */
            $pn = $test_request['encounter_nr'];
            $batch_nr = $test_request['batch_nr'];
            $name_first = ucwords($test_request['name_first']);
            $selian_pid = $test_request['selian_pid'];
        }
    } else {
        echo "<p>$sql<p>$LDDbNoRead";
        exit;
    }

    //Start here fetching requests that are awaiting results
    $sql_w = "SELECT care_person.pid, care_person.selian_pid, UPPER(name_last) as name_last, CONCAT(name_first,'  ', name_2) AS name_first,"
            . "batch_nr, tr.encounter_nr,tr.send_date,tr.notes,tr.priority,dept_nr,room_nr FROM care_test_request_" . $subtarget . " tr,
					care_encounter, care_person
						         WHERE (tr.status='pending' OR tr.status='')  AND
						         tr.encounter_nr = care_encounter.encounter_nr AND
						         care_encounter.pid = care_person.pid
                                                         AND care_encounter.is_discharged = 0
                                                         AND tr.specimen_collected = 1
						         ORDER BY  tr.send_date DESC";

//    echo "<p>$sql<p>";
    if ($requests_w = $db->Execute($sql_w)) {

        $batchrows_w = $requests_w->RecordCount();
        if ($batchrows_w && (!isset($batch_nr) || !$batch_nr)) {
            $test_request_w = $requests_w->FetchRow();
            /* Check for the patietn number = $pn. If available get the patients data  */
            $pn = $test_request_w['encounter_nr'];
            $batch_nr_w = $test_request_w['batch_nr'];
            $name_first_w = ucwords($test_request_w['name_first']);
            $selian_pid_w = $test_request_w['selian_pid'];
        }
    } else {
        echo "<p>$sql<p>$LDDbNoRead";
        exit;
    }

    $mode = "show";

    if (!empty($_GET['tracker'])) {
        $h_batch_nr = $_GET['batch_nr'];
    } else {
        $h_batch_nr = $batch_nr;
    }


    include_once($root_path . 'include/care_api_classes/class_department.php');
    $dept_obj = new Department;

    include_once($root_path . 'include/care_api_classes/class_ward.php');
    $ward_obj = new Ward;


    /* prepare selection to show the headline... */
//    $sql_headline = "SELECT care_person.pid, care_person.selian_pid, UPPER(name_last) as name_last, CONCAT(name_first,'  ', name_2) AS name_first, sex, batch_nr, 
//date_birth,care_encounter.encounter_class_nr,care_encounter.current_ward_nr,care_encounter.current_dept_nr, 
//tr.encounter_nr,tr.send_date, tr.notes, dept_nr,room_nr,tr.create_id, tr.specimen_collected
//                            FROM care_test_request_" . $subtarget . " tr, care_encounter, care_person
//                            WHERE (tr.status='pending' OR tr.status='') AND
//			    tr.encounter_nr = care_encounter.encounter_nr AND
//			    care_encounter.pid = care_person.pid
//		         AND tr.batch_nr = " . $h_batch_nr . "
//		         ORDER BY  tr.send_date DESC";
    //Sql headline for chemlabor
    if ($subtarget == 'chemlabor') {
        $sql_headline = "SELECT care_person.pid,care_person.insurance_ID,care_person.selian_pid, UPPER(name_last) as name_last, CONCAT(name_first,'  ', name_2) AS name_first, sex, batch_nr, 
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
        $sql_headline = "SELECT care_person.pid,care_person.insurance_ID, care_person.selian_pid, UPPER(name_last) as name_last, CONCAT(name_first,'  ', name_2) AS name_first, sex, batch_nr, 
                date_birth,care_encounter.encounter_class_nr,care_encounter.current_ward_nr,care_encounter.current_dept_nr, 
                tr.encounter_nr,tr.send_date, tr.notes, dept_nr,room_nr,tr.create_id FROM care_test_request_" . $subtarget . " tr, care_encounter, care_person
						         WHERE (tr.status='pending' OR tr.status='') AND
						         tr.encounter_nr = care_encounter.encounter_nr AND
						         care_encounter.pid = care_person.pid
						         AND tr.batch_nr = " . $h_batch_nr . "
						         ";
    }


    if ($h_requests = $db->Execute($sql_headline)) {

            
        if ($test_request_headline = $h_requests->FetchRow()) {

            //GET INSURANCE NAME
            if($test_request_headline['insurance_ID']=='0'){
                $h_HealthFundName='CASH';
            }else{
                $sql_HealthFundName="SELECT name,id FROM care_tz_company WHERE id=".$test_request_headline['insurance_ID'];
                $result_HealthFundName=$db->Execute($sql_HealthFundName);
                $HealthFundName=$result_HealthFundName->FetchRow();
                $h_HealthFundName=$HealthFundName['name'];


            }

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
            $h_request_date = $test_request_headline['send_date'];
            $h_notes = $test_request_headline['notes'];
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
                if ($room_prefix == $room_prefix_result->fetchRow()) {
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

/* Check for the patietn number = $pn. If available get the patients data */
if (($batchrows || $batchrows_w) && $pn) {
    if ($enc_obj->loadEncounterData($pn)) {
        //echo "lade Patientendaten...";
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

        $result = $enc_obj->encounter;

        $sql = "SELECT * FROM care_test_request_" . $subtarget . " WHERE batch_nr='" . $batch_nr . "'";
        if ($ergebnis = $db->Execute($sql)) {
            if ($editable_rows = $ergebnis->RecordCount()) {

                $stored_request = $ergebnis->FetchRow();

                //echo $stored_request['parameters'];
                parse_str($stored_request['parameters'], $stored_param);
                $edit_form = 1;
            }
        } else {
            echo "<p>$sql<p>$LDDbNoRead";
        }
    }
}

# Prepare title
$sTitle = $LDPendingTestRequest;
if ($batchrows || $batchrows_w)
    $sTitle = $sTitle . " (" . $batch_nr . ")";

# Start Smarty templating here
/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme

require_once($root_path . 'gui/smarty_template/smarty_care.class.php');
$smarty = new smarty_care('common');

# Title in toolbar
$smarty->assign('sToolbarTitle', $sTitle);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('lab_pending_requests.php','Laboratories :: Pending Requests')");

# hide return  button
$smarty->assign('pbBack', FALSE);

# href for close button
$smarty->assign('breakfile', "javascript:window.close()");

# Window bar title
$smarty->assign('sWindowTitle', $sTitle);

$smarty->assign('sOnLoadJs', 'onload="setBallon(\'BallonTip\');"');
# collect extra javascript code
ob_start();
?>
<html>
    <head>

    </head>

    <style type="text/css">
        .lab {font-family: arial; font-size: 9; color:purple;}
        .lmargin {margin-left: 5;}
    </style>

    <script language="javascript">
<!--

<?php
if ($edit) {
    ?>

            function chkForm(d)
            {
                return true
            }

            function loadM(fn)
            {
                mBlank = new Image();
                mBlank.src = "../img/pink_border.gif";
                mFilled = new Image();
                mFilled.src = "../img/filled_pink_block.gif";

                form_name = fn;
            }

            function setM(m)
            {
                eval("marker=document.images." + m);
                eval("element=document." + form_name + "." + m);

                if (marker.src != mFilled.src)
                {
                    marker.src = mFilled.src;
                    element.value = '1';
                    // alert(element.name+element.value);
                }
                else
                {
                    marker.src = mBlank.src;
                    element.value = '0';
                    // alert(element.name+element.value);
                }
            }


            function setThis(prep, elem, begin, end, step)
            {
                for (i = begin; i < end; i = i + step)
                {
                    x = prep + i;
                    if (elem != i)
                    {
                        eval("marker=document.images." + x);
                        if (marker.src == mFilled.src)
                            setM(x);
                    }
                }
                setM(prep + elem);
            }

            function sendLater()
            {
                document.form_test_request.status.value = "draft";
                if (chkForm(document.form_test_request))
                    document.form_test_request.submit();
            }

    <?php
}
?>

        function printOut()
        {
            urlholder = "labor_test_request_printpop.php?sid=<?php echo $sid ?>&lang=<?php echo $lang ?>&user_origin=<?php echo $user_origin ?>&target=<?php echo $target ?>&subtarget=<?php echo $subtarget ?>&batch_nr=<?php echo $batch_nr ?>&pn=<?php echo $stored_request['encounter_nr'] ?>";
            testprintout<?php echo $sid ?> = window.open(urlholder, "testprintout<?php echo $sid ?>", "width=755,height=600,menubar=no,resizable=no,scrollbars=yes");
            //testprintout<?php echo $sid ?>.print();
        }

<?php require($root_path . 'include/inc_checkdate_lang.php'); ?>

        //-->
    </script>
    <script language="javascript" src="../js/setdatetime.js"></script>
    <script language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>

    <script language="JavaScript" src="<?php echo $root_path; ?>js/cross.js"></script>
    <script language="JavaScript" src="<?php echo $root_path; ?>js/tooltips.js"></script>
    <div id="BallonTip" style="POSITION:absolute; VISIBILITY:hidden; LEFT:-200px; Z-INDEX: 100"></div>

    <?php
    $sTemp = ob_get_contents();
    ob_end_clean();

    $smarty->append('JavaScript', $sTemp);

# Buffer page output

    ob_start();

# If pending request available, show list and actual form

    if ($batchrows) {
        ?>

        <table border=0>
            <tr valign="top">
                <!-- Left block for the request list  -->
                <td>
                    <h3 style="color: #09cae7">Pending Requests</h3>
                    <?php
                    /* The following routine creates the list of pending requests */
                    require($root_path . 'include/inc_test_request_lister_fx.php');
                    ?>
                </td>
                <!-- right block for the form -->
                <td>

                    <!-- Here begins the form  -->

                    <a href="javascript:printOut()"><img <?php echo createLDImgSrc($root_path, 'printout.gif', '0', 'absmiddle') ?> alt="<?php echo $LDPrintOut ?>"></a>

                    <!-- Hide Enter and Done buttons if the specimen is not collected-->
                    <?php if ($h_specimen_collected == 1) { ?>
                        <a href="<?php echo 'labor_datainput.php' . URL_APPEND . '&encounter_nr=' . $pn . '&job_id=' . $batch_nr . '&mode=' . $mode . '&update=1&user_origin=lab_mgmt'; ?>"><img <?php echo createLDImgSrc($root_path, 'enter.gif', '0', 'absmiddle') ?> alt="<?php echo $LDEnterResult ?>"></a>
                        <a href="<?php echo $thisfile . URL_APPEND . "&edit=" . $edit . "&mode=done&target=" . $target . "&subtarget=" . $subtarget . "&batch_nr=" . $batch_nr . "&pn=" . $pn . "&formtitle=" . $formtitle . "&user_origin=" . $user_origin . "&noresize=" . $noresize; ?>"><img <?php echo createLDImgSrc($root_path, 'done.gif', '0', 'absmiddle') ?> alt="<?php echo $LDDone ?>"></a>
                    <?php } else { ?>
                        <!--<a href="<?php //echo $thisfile . URL_APPEND . "&edit=" . $edit . "&mode=done&discharge=true&target=" . $target . "&subtarget=" . $subtarget . "&batch_nr=" . $batch_nr . "&pn=" . $pn . "&formtitle=" . $formtitle . "&user_origin=" . $user_origin . "&noresize=" . $noresize;   ?>"><img <?php echo createLDImgSrc($root_path, 'done_and_discharge.gif', '0', 'absmiddle') ?> alt="Move the form to the archive and discharge our patient"></a>-->
                       <!--<a href="<?php // echo $root_path . "modules/nursing/nursing-station-patientdaten-doconsil-chemlabor.php" . URL_APPEND . "&pn=$pn&edit=1&job_id=$batch_nr&station=$station&target=$subtarget&dept_nr=$dept_nr&user_origin=$user_origin&noresize=$noresize&mode=edit&batch_nr=$batch_nr";   ?>"><img <?php echo createLDImgSrc($root_path, 'done_and_discharge.gif', '0', 'absmiddle') ?> alt="Edit Request"></a>-->
                        <a href="<?php echo 'labor_collect_specimen.php' . URL_APPEND . '&encounter_nr=' . $pn . '&job_id=' . $batch_nr . '&mode=' . $mode . '&update=1&user_origin=lab_mgmt'; ?>"><img <?php echo createLDImgSrc($root_path, 'specimen.gif', '0', 'absmiddle') ?> alt="<?php echo $LDCollectSpecimen ?>"></a>
                        <?php
                    }
                    require_once($root_path . 'include/care_api_classes/class_tz_billing.php');
                    $bill_obj = new Bill;
                    $bill_number = $bill_obj->GetBillByBatchNr($batch_nr);

                    require_once($root_path . 'include/inc_test_request_printout_chemlabor.php');
                    ?>

                    <a href="javascript:printOut()"><img <?php echo createLDImgSrc($root_path, 'printout.gif', '0', 'absmiddle') ?> alt="<?php echo $LDPrintOut ?>"></a>
                    <a href="<?php echo 'labor_datainput.php' . URL_APPEND . '&encounter_nr=' . $pn . '&job_id=' . $batch_nr . '&mode=' . $mode . '&update=1&user_origin=lab_mgmt'; ?>"><img <?php echo createLDImgSrc($root_path, 'enter.gif', '0', 'absmiddle') ?> alt="<?php echo $LDEnterResult ?>"></a>
                    <a href="<?php echo $thisfile . URL_APPEND . "&edit=" . $edit . "&mode=done&target=" . $target . "&subtarget=" . $subtarget . "&batch_nr=" . $batch_nr . "&pn=" . $pn . "&formtitle=" . $formtitle . "&user_origin=" . $user_origin . "&noresize=" . $noresize; ?>"><img <?php echo createLDImgSrc($root_path, 'done.gif', '0', 'absmiddle') ?> alt="<?php echo $LDDone ?>"></a>
                    <a href="labor_test_request_pass.php"><img <?php echo createLDImgSrc($root_path, 'new.gif', '0', 'absmiddle') ?></a>

                </td>
                <?php if ($batchrows_w) { ?>
                    <!-- Right block for the request awaiting results list  -->
                    <td>
                        <h3 style="color: #09cae7">Requests Waiting for Results</h3>
                        <?php
                        /* The following routine creates the list of pending requests */
                        require($root_path . 'include/inc_test_request_waiting_res_fx.php');
                        ?>
                    </td>
                <?php } ?>
            </tr>
        </table>

        <?php
    } else {
        ?>
        <img <?php echo createMascot($root_path, 'mascot1_r.gif', '0', 'absmiddle') ?> ><font size=3 face="verdana,arial" color="#990000"><b><?php echo $LDNoPendingRequest ?></b></font>
        <p>
            <a href="<?php echo $breakfile ?>"><img <?php echo createLDImgSrc($root_path, 'back2.gif', '0') ?>></a>
            <?php
        }

        $sTemp = ob_get_contents();
        ob_end_clean();

# Assign the page output to main frame template

        $smarty->assign('sMainFrameBlockData', $sTemp);

        /**
         * show Template
         */
        $smarty->display('common/mainframe.tpl');
        ?>
