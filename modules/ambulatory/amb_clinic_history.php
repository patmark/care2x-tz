<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * elpidio@care2x.org,
 *
 * See the file "copy_notice.txt" for the licence notice
 */
$lang_tables[] = 'prompt.php';
$lang_tables[] = 'obstetrics.php';
define('LANG_FILE', 'nursing.php');
$local_user = 'ck_pflege_user';
require_once($root_path . 'include/inc_front_chain_lang.php');
if (!$encoder)
    $encoder = $_SESSION['sess_user_name'];


//$breakfile="amb_clinic_patients.php".URL_APPEND."&edit=$edit&dept_nr=$dept_nr";
$breakfile = "javascript:window.close();";
//if($backpath) $breakfile=urldecode($backpath).URL_APPEND;
$thisfile = basename($_SERVER['PHP_SELF']);



# Load date formatter
require_once($root_path . 'include/inc_date_format_functions.php');
require_once($root_path . 'include/care_api_classes/class_encounter.php');
require_once($root_path . 'include/care_api_classes/class_tz_diagnostics.php');
include_once($root_path . 'language/en/lang_en_aufnahme.php');
//include_once($root_path.'language/en/obstetrics.php');


require_once($root_path . 'include/care_api_classes/class_measurement.php');
require_once($root_path . 'include/care_api_classes/class_mini_dental.php');
$oc = new dental;
$obj = new Measurement;
$fileNr = $oc->GetFileNoFromPID($pid);
$BirthDate = $oc->BirthDate($pid);
require_once($root_path . 'include/care_api_classes/class_tz_diagnostics.php');
//$diagnostic_obj->get_array_search_results($keyword);

$diagnostic_obj = new Diagnostics;
$diagnostic_obj->get_array_search_results($keyword);
?>
<table width="100%"  border="0" align="center" cellpadding="10" cellspacing="1" >
    <tr>
        <td width="81" bgcolor="#F0F4F0"><div align="right"><span class="style3">Name:</span></div></td>
        <td width="572" bgcolor="#F9F9F9">
            <strong>
                <?php $oc->GetPatientNameFromPid($pid); ?>
            </strong></td>
    </tr>
    <tr>
        <td bgcolor="#F0F4F0"><div align="right"><span class="style3">File Nr:</span></div></td>
        <td bgcolor="#F9F9F9"><strong>
                <?php echo $fileNr; ?>
            </strong></td>
    </tr>
    <tr>
        <td bgcolor="#F0F4F0"><div align="right"><span class="style3">BirthDate:</span></div></td>
        <td bgcolor="#F9F9F9"><strong>
                <?php echo $BirthDate; ?>
            </strong></td>
    </tr>

    <tr>
        <td width="15%" bgcolor="#D2DFD0" style="border-top:3px solid red;" valign="top"><strong>Laboratory</strong></td>
        <td width="85%" style="border-top:3px solid red;">
            <?php ?>
            <?php include($root_path . 'modules/nursing/labor_datalist_history.php'); ?>

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
            <?php include($root_path . 'modules/nursing/labor_datalist_prescription.php'); ?>
        </td>
    </tr>

    <tr>
        <td width="15%" bgcolor="#D2DFD0" style="border-top:3px solid red;" valign="top"><strong>Vital Signs</strong></td>
        <td width="85%" style="border-top:3px solid red;">
            <?php include($root_path . '/modules/nursing/vital_sign.php'); ?>
        </td>
    </tr> 
    <tr>
        <td width="15%" bgcolor="#D2DFD0" style="border-top:3px solid red;" valign="top"><strong>notes</strong></td>
        <td width="85%" style="border-top:3px solid red;">
            <table width="100%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#A6BFA2" class="style3">
                <tr bgcolor="#D2DFD0">
                    <td width="93"><strong>Date</strong></td>
                    <td width="368"><strong>Patient Notes </strong></td>
                    <td width="101"><strong>Written by:</strong></td>
                </tr>

                <!--//-->

                <?php $oc->PrintPatientNotes($pid, $encounter_nr,$LDNoRecordFound, $c1, $c2, $records); ?>

                <!--//-->

                <tr align="center" valign="top" bgcolor="#A6BFA2">
                    <td colspan="3" class="style7">****End****</td>
                </tr> 
            </table>
        </td>
    </tr>  


</table>                                      
