<?php
//$sid = $_REQUEST['sid']; //Get current session id
//session_id($sid); //Initialize session with current session id
//session_start();
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

$lang_tables[] = 'departments.php';
$lang_tables[] = 'pharmacy.php';
$lang_tables[] = 'diagnoses_ICD10.php';
$lang_tables[] = 'obstetrics.php';
$lang_tables[] = 'aufnahme.php';
define('LANG_FILE', 'nursing.php');
//define('LANG_FILE','aufnahme.php');

define('NO_2LEVEL_CHK', 1);
require_once($root_path . 'include/inc_front_chain_lang.php');

include_once($root_path . 'include/care_api_classes/class_mini_dental.php');
include_once($root_path . 'include/care_api_classes/class_radio.php');
include_once($root_path . 'include/care_api_classes/class_multi.php');
require_once($root_path . 'include/care_api_classes/class_tz_diagnostics.php');
//$diagnostic_obj->get_array_search_results($keyword);

$diagnostic_obj = new Diagnostics;
$diagnostic_obj->get_array_search_results($keyword);
$alergic = new dental;
//$Radiology = new dental;
$rad_obj = new Radio;
$multi = new multi;

/**
 * If the script call comes from the op module replace the user cookie with the user info from op module
 */
//$db->debug=FALSE;

if (isset($op_shortcut) && $op_shortcut) {
    $_COOKIE['ck_pflege_user' . $sid] = $op_shortcut;
    setcookie('ck_pflege_user' . $sid, $op_shortcut, 0, '/');
    $edit = 1;
} elseif ($_COOKIE['ck_op_pflegelogbuch_user' . $sid]) {
    setcookie('ck_pflege_user' . $sid, $_COOKIE['ck_op_pflegelogbuch_user' . $sid], 0, '/');
    $edit = 1;
} elseif ($_COOKIE['aufnahme_user' . $sid]) {
    setcookie('ck_pflege_user' . $sid, $_COOKIE['aufnahme_user' . $sid], 0, '/');
    $edit = 1;
} elseif (!$_COOKIE['ck_pflege_user' . $sid]) {
    //if($edit) {header('Location:'.$root_path.'language/'.$lang.'/lang_'.$lang.'_invalid-access-warning.php'); exit;};
}

/* Load the visual signalling defined constants */
require_once($root_path . 'include/inc_visual_signalling_fx.php');
require_once($root_path . 'global_conf/inc_remoteservers_conf.php');

/* Retrieve the SIGNAL_COLOR_LEVEL_ZERO = for convenience purposes */
$z = SIGNAL_COLOR_LEVEL_ZERO;
/* Retrieve the SIGNAL_COLOR_LEVEL_FULL = for convenience purposes */
$f = SIGNAL_COLOR_LEVEL_FULL;

$_SESSION['sess_user_origin'] = 'nursing';

/* Create department object and load all medical depts */
require_once($root_path . 'include/care_api_classes/class_department.php');
$dept_obj = new Department;
$medical_depts = $dept_obj->getAllMedical();
/* Create encounter object */
require_once($root_path . 'include/care_api_classes/class_encounter.php');
$enc_obj = new Encounter;

/* Load global configs */
include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
$GLOBAL_CONFIG = array();
$glob_obj = new GlobalConfig($GLOBAL_CONFIG);
$glob_obj->getConfig('patient_%');


$_SESSION['logID'] = $_SESSION['sess_user_name'];

include_once($root_path . 'include/inc_date_format_functions.php');

$enc_obj->where = " encounter_nr=$pn";
$result = '';
if ($enc_obj->loadEncounterData($pn)) {
    /* 			switch ($enc_obj->EncounterClass())
      {
      case '1': $full_en = ($pn + $GLOBAL_CONFIG['patient_inpatient_nr_adder']);
      break;
      case '2': $full_en = ($pn + $GLOBAL_CONFIG['patient_outpatient_nr_adder']);
      break;
      default: $full_en = ($pn + $GLOBAL_CONFIG['patient_inpatient_nr_adder']);
      }
     */
    $full_en = $pn;

    if ($enc_obj->is_loaded) {
        $result = &$enc_obj->encounter;
        $rows = $enc_obj->record_count;

        if ($result['is_discharged'])
            $edit = 0;
    }
}

$dob = @formatDate2STD($result['date_birth'], 'dd-mm-yyyy');

$name = $result['name_last'] . ',  ' . ucwords($result['name_first']);
?>
<html>

    <body onpageshow="window.print()">
        <form>
            <table>
                <tr>
                    <td colspan="2" style="padding-top:15px;">
                        <table width="100%" height="28" border="0" align="center" cellpadding="0" cellspacing="0" style=" border:1px solid #ccc;">
                            <tr align="center" valign="middle">
                                <td align="center" class="heading" style="color:black; text-transform:uppercase; padding:6px; text-align:left; background:none !important; font-size:15px; font-weight: bold">
                                    Patient History
<!--                                    <input id="bner" onClick="extratable()"
                                           type="button"  style="width:100px; float:right;border:1px solid maroon; margin:-2px;">-->
                                </td>

                            </tr>
                            <tr align="center" valign="middle">
                                <td align="center" class="heading" style="color:black; /*text-transform:uppercase;*/ padding:6px; text-align:left; background:none !important; font-size:14px; font-weight: bold">
                                    Patient Names: &nbsp;
                                <!--</td><td style="text-align:left;">-->
                                    <?php echo $name; ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    Date of Birth:<?php echo '  ' . $dob; ?>
                                </td>
                        </table>

                        <table width="100%"  border="0" align="center" cellpadding="10" cellspacing="1" id="extratable" style="">

                            <tr>
                                <td width="15%" bgcolor="#D2DFD0" style="border-top:3px solid red;" valign="top"><strong>notes</strong></td>
                                <td width="85%" style="border-top:3px solid red;">
                                    <table width="100%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#A6BFA2" class="style3">
                                        <tr bgcolor="#D2DFD0">
                                            <td width="93"><strong>Date</strong></td>
                                            <td width="368"><strong>Patient Notes </strong></td>
                                            <td width="101"><strong>Written by:</strong></td>
                                        </tr>
                                        <?php $alergic->PrintPatientNotes($pid, $encounter_nr,$LDNoRecordFound, $c1, $c2, $records); ?>
                                    </table>
                                </td>
                            </tr> 

                            <tr>
                                <td width="15%" bgcolor="#D2DFD0" style="border-top:3px solid red;" valign="top"><strong>Laboratory</strong></td>
                                <td width="85%" style="border-top:3px solid red;">
                                    <?php ?>
                                    <?php include('./labor_datalist_history.php'); ?>

                                </td>
                            </tr>
                            <tr>
                                <td width="15%" bgcolor="#D2DFD0" style="border-top:3px solid red;" valign="top"><strong>Diagnosis</strong></td>
                                <td width="85%" style="border-top:3px solid red;">

                                    <?php $diagnostic_obj->Display_Archived_Diagnoses($pid); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="15%" bgcolor="#D2DFD0" style="border-top:3px solid red;" valign="top"><strong>Prescriptions</strong></td>
                                <td width="85%" style="border-top:3px solid red;">
                                    <?php include('./labor_datalist_prescription.php'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="15%" bgcolor="#D2DFD0" style="border-top:3px solid red;" valign="top"><strong>Vital Signs</strong></td>
                                <td width="85%" style="border-top:3px solid red;">
                                    <?php include('./vital_sign.php'); ?>
                                </td>
                            </tr>
    <!--                        <tr align="center" valign="middle">
                                <td align="center" colspan=2 style="border-top:3px solid red;">
                                    <input id="bner" onClick="window.location.href = './nursing-station-patientdaten_print.php<?php // print "?&sid=" . $_GET['sid'] . "&pday=" . $_GET['pday'] . "&pn=" . $_GET['pn'] . "&lang=" . $_GET['lang'] . "&pday=" . $_GET['pday'] . "&pmonth=" . $_GET['pmonth'] . "&pyear=" . $_GET['pyear'] . "&pid=" . (($pid != '') ? $pid : $_SESSION['sess_pid']);                 ?>'"
                                           type="button" value="PRINT" style="width:100px; border:1px solid maroon; margin:-2px;">
    
                                    <input id="bner" onClick="window.print()"
                                           type="button" value="PRINT" style="width:100px; border:1px solid maroon; margin:-2px;">
    
                                </td>
                            </tr>-->
                        </table>
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>