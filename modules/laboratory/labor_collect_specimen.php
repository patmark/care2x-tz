<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require ('./roots.php');
require ($root_path . 'include/inc_environment_global.php');
/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * elpidio@care2x.org,
 *
 * See the file "copy_notice.txt" for the licence notice
 */
$lang_tables = array('chemlab_groups.php', 'chemlab_params.php');
define('LANG_FILE', 'lab.php');
$local_user = 'ck_lab_user';
require_once ($root_path . 'include/inc_front_chain_lang.php');

$debug = FALSE;
($debug) ? $db->debug = true : $db->debug = FALSE;

if (!$encounter_nr) {
    header('Location:' . $root_path . 'language/' . $lang . '/lang_' . $lang . '_invalid-access-warning.php');
    exit();
}

if (!isset($user_origin) || empty($user_origin)) {
    $user_origin = 'lab';
}

$thisfile = 'labor_collect_specimen.php';

# Create encounter object
require_once ($root_path . 'include/care_api_classes/class_encounter.php');
//$encounter = new Encounter($encounter_nr);
$enc_obj = new Encounter($encounter_nr);
if ($encounter = $enc_obj->getBasic4Data($encounter_nr)) {
    $patient = $encounter->FetchRow();
}

$enc_obj->loadEncounterData($encounter_nr);
$pid = $enc_obj->PID();

# Create lab object
require_once ($root_path . 'include/care_api_classes/class_lab.php');
$lab_obj = new Lab($encounter_nr);

$specimen_date = date('Y-m-d H:i:s');

# Set the return file
if (isset($job_id) && $job_id) {
    switch ($user_origin) {
        case 'lab_mgmt' :
            $breakfile = "labor_test_request_admin_chemlabor.php" . URL_APPEND . "&pn=$encounter_nr&batch_nr=$job_id&user_origin=lab";
            break;
        default :
            //$breakfile="labor_data_check_arch.php".URL_APPEND."&versand=1&encounter_nr=$encounter_nr";
            $breakfile = "labor.php";
    }
} else {
    $breakfile = "labor_data_patient_such.php" . URL_APPEND . "&mode=edit";
}

//Initialize the variables here
$specimen_collected = '';
$specimen_type = '';
$specimen_volume = '';
$specimen_units = '';
$specimen_container = '';
//$specimen_date = '';
//$specimen_taken_by = '';
//Check for available data
if ($row = $lab_obj->GetJobSpecimenDetails($job_id)) {
    //
    $specimen_collected = $row['specimen_collected'];
    $specimen_type = $row['specimen_type'];
    $specimen_volume = $row['specimen_volume'];
    $specimen_units = $row['specimen_units'];
    $specimen_container = $row['specimen_container'];
    $specimen_date = $row['specimen_date'];
    $specimen_taken_by = $row['specimen_taken_by'];

    //
}

//Save specimen data here
if (isset($_POST['specimen_type'])) {

    $spec_array = array('specimen_collected' => 1,
        'specimen_type' => $_POST['specimen_type'],
        'specimen_volume' => $_POST['specimen_volume'],
        'specimen_units' => $_POST['specimen_units'],
        'specimen_container' => $_POST['specimen_container'],
        'specimen_date' => $_POST['specimen_date'],
        'specimen_taken_by' => $_POST['specimen_taken_by']);

    //Call a function to add specimen data
    if ($lab_obj->SaveJobSpecimenDetails($job_id, $spec_array)) {
        $saved = TRUE;
        //Alert the user data has been saved and Redirect to lists
        echo '<script>'
        . "alert('Data Saved Successfully!');"
        . "window.location='$breakfile'"
        . '</script>';
    }
}

# Prepare title
$sTitle = "Laboratory Specimen Data";

# Start Smarty templating here
/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme


require_once ($root_path . 'gui/smarty_template/smarty_care.class.php');
$smarty = new smarty_care('common');

# Title in toolbar
$smarty->assign('sToolbarTitle', $sTitle);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('lab_report_edit.php','Laboratories :: Lab Report Edit','main','$job_id')");

# hide return  button
$smarty->assign('pbBack', FALSE);

# href for close button
$smarty->assign('breakfile', $breakfile);

# Window bar title
$smarty->assign('sWindowTitle', $sTitle);

# collect extra javascript code
ob_start();
?>

<style type="text/css" name="1">
    .va12_n {
        font-family: verdana, arial;
        font-size: 12;
        color: #000099
    }

    .a10_b {
        font-family: arial;
        font-size: 10;
        color: #000000
    }

    .a10_n {
        font-family: arial;
        font-size: 10;
        color: #000099
    }
</style>

<script language="javascript" name="j1">
<!--
    function pruf(d)
    {
        if (!d.specimen_type.value)
        {
            alert("Please enter specimen type(s) separated by comma (,)");
            d.specimen_type.focus();
            return false;
        }
        else
        {
            if (d.specimen_taken_by) {
                if (!d.specimen_taken_by.value)
                {
                    alert("Session expired! Please login again");
                    this.window.close();
                    return false;
                }
                else
                    return true;
            }
        }
    }
-->
</script>


<?php
$sTemp = ob_get_contents();
ob_end_clean();

$smarty->append('JavaScript', $sTemp);

# Assign patient basic elements
$smarty->assign('LDCaseNr', $LDPatientID);
$smarty->assign('LDLastName', $LDLastName);
$smarty->assign('LDName', $LDName);
$smarty->assign('LDBday', $LDBday);
$smarty->assign('LDJobIdNr', $LDJobIdNr);

$smarty->assign('sPID', $pid);
$smarty->assign('sLastName', $patient['name_last']);
$smarty->assign('sName', ucwords($patient['name_first']));
$smarty->assign('sBday', date('d-M-Y', strtotime($patient['date_birth'])));
$smarty->assign('sJobIdNr', $job_id . '<input type=hidden name=job_id value="' . $job_id . '">');

$smarty->assign('pbSave', '<input  type="image" ' . createLDImgSrc($root_path, 'send.gif', '0') . ' >');

if ($saved || $update) {
    $sCancelBut = '<img ' . createLDImgSrc($root_path, 'close2.gif', '0', 'absmiddle') . '>';
} else {
    $sCancelBut = '<img  ' . createLDImgSrc($root_path, 'cancel.gif', '0', 'absmiddle') . '>';
}

//$smarty->assign('pbCancel',"<a href=\"$breakfile\">$sCancelBut</a>");
$smarty->assign('pbCancel', "<a href=\"$breakfile\">$sCancelBut</a>");

$smarty->assign('sFormAction', $thisfile);

//Start input parameters here
ob_start();
?>

<tr>
    <td class="adm_item"><?php echo $LDSpecType_Comma . ':'; ?></td>
    <td class="adm_input"><input name="specimen_type" value="<?php
        echo isset($specimen_type) ? $specimen_type : '';
        ?>"/></td>
</tr>
<tr>
    <td class="adm_item"><?php echo $LDSpecVolume . ':'; ?></td>
    <td class="adm_input"><input name="specimen_volume" value="<?php
        echo isset($specimen_volume) ? $specimen_volume : '';
        ?>"/></td>
</tr>
<tr>
    <td class="adm_item"><?php echo $LDSpecUnits . ':'; ?></td>
    <td class="adm_input"><input name="specimen_units" value="<?php
        echo isset($specimen_units) ? $specimen_units : '';
        ?>"/></td>
</tr>
<tr>
    <td class="adm_item"><?php echo $LDSpecContainer . ':'; ?></td>
    <td class="adm_input"><input name="specimen_container" value="<?php
        echo isset($specimen_container) ? $specimen_container : '';
        ?>"/></td>
</tr>
<tr>
    <td class="adm_item"><?php echo $LDSpecDate . ':'; ?></td>
    <td class="adm_input"><input name="specimen_date" value="<?php
        echo isset($specimen_date) ? $specimen_date : date('Y-m-d H:i:s');
        ?>" readonly="true"/></td>
</tr>
<tr>
    <td class="adm_item"><?php echo $LDSpecTakenBy . ':'; ?></td>
    <td class="adm_input"><input name="specimen_taken_by" value="<?php
                                 if (isset($specimen_taken_by)) {
                                     echo $specimen_taken_by;
                                 } else if (isset($_SESSION['sess_user_name'])) {
                                     echo $_SESSION['sess_user_name'];
                                 }
                                 ?>" readonly="true"/></td>
</tr>

<?php
$inParameters = ob_get_contents();
ob_end_clean();

$smarty->assign('inParameters', $inParameters);

$smarty->assign('sMainBlockIncludeFile', 'laboratory/chemlab_data_sample.tpl');
/**
 * show Template
 */
$smarty->display('common/mainframe.tpl');
?>
