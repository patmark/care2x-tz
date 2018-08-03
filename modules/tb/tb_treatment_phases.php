<?php

//error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
//error_reporting(E_ALL);
//-------------------------------------------------------------------------------------------------------
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require($root_path . 'include/inc_date_format_functions.php');
require($root_path . 'include/inc_front_chain_lang.php');
require_once($root_path . 'include/care_api_classes/class_tz_tb_patient.php');
require_once($root_path . 'include/care_api_classes/class_tz_tb_form_validator.php');

//-------------------------------------------------------------------------------------------------------
/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2007 Dorothea Reichert based on the development of Elpidio Latorilla (2002,2003,2004,2005)
 * elpidio@care2x.org, meggle@merotech.de
 *
 * See the file "copy_notice.txt" for the licence notice
 */
//-------------------------------------------------------------------------------------------------------------------------------------
$debug = FALSE;
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$add_breakfile = "&pid=" . $_REQUEST['pid'] . "&encounter_nr=" . $_REQUEST['encounter_nr'];
$filename = "tb_treatment_phases.php";
$breakfile = "modules/tb/tb_menu.php";

if ($debug) {
    echo "<pre>";
    print_r($_REQUEST);
}
//------------------------------------------------------------------------------------------------------------
//if (empty($_REQUEST['pid']) OR empty($_REQUEST['encounter_nr'])) {
//    $error_messages = "<div class=\"errorMessages\">No patient is selected! </div>";
//    require ("gui/gui_tb_treatment_support.php");
//    die();
//}

if (!$o_tb_patient = new TB_patient($_REQUEST['pid'], $_REQUEST['district_regno'])) {
    require ("gui/gui_tb_treatment_support.php");
    die();
}

$facility_info = $o_tb_patient->getTBFacilityInfo();
$registration_data = $o_tb_patient->getRegistrationData();

$treatment_phase_data = $o_tb_patient->getTBTreatmentPhaseData();
//print_r($treatment_support_data[1]['treatment_supporter_name']);exit;

if ($debug) {
    foreach ($treatment_phase_data as $row) {
        print_r($row);
        echo '<br/>';
    }
}

$yesno = array('' => '--Select--', '1' => 'Yes', '0' => 'No');

$medication = array('' => '--Select--', 'TB Rx' => 'TB Rx', 'IPT' => 'IPT');

$outcome = array('' => '--Select--', 'No TB' => 'No TB', 'TB' => 'TB');

$sexmf = array('' => '--Select--', 'Male' => 'Male', 'Female' => 'Female');
//print_r($facility_info);

if (isset($_POST['submit'])) {
    $o_val = new TBValidator($o_tb_patient->getDefaultData(), $_REQUEST);

    $o_val->set_rule('phase_id', 'rule_required');
    $o_val->set_rule('phase_id', 'rule_numeric');
    $o_val->set_rule('tb_caseid', 'rule_required');
    $o_val->set_rule('tb_caseid', 'rule_numeric');

    $o_val->set_rule('treatment_phase_drugs', 'rule_required');
    $o_val->set_rule('treatment_phase_dosage', 'rule_required');
    $o_val->set_rule('start_date', 'rule_required');
//    $o_val->set_rule('started_medication', 'rule_required');


    $o_val->set_rule('signature', 'rule_required');

    $o_val->applyRules();

    if (($o_val->getErrors()) == 0) {
        if ($_REQUEST['mode'] == 'edit') {
            if ($o_tb_patient->updateTBPatientTreatmentPhase($o_val->getValues())) {
//                header("Location: http://$host$uri/$filename" . URL_APPEND . "$add_breakfile");
                $_SESSION['message'] = 'Data Updated Successfully!';
                header('Location: ' . $root_path . 'modules/tb/' . $filename . URL_APPEND . $add_breakfile);
                exit;
            }
        } else if ($_REQUEST['mode'] == 'new') {
            if ($o_tb_patient->insertTBPatientTreatmentPhase($o_val->getValues())) {
                $_SESSION['message'] = 'Data Added Successfully!';
//                $filename = 'modules/tb/tb_registered.php';
//                header("Location: http://$host$uri/$filename" . URL_APPEND . "$add_breakfile");
                header('Location: ' . $root_path . 'modules/tb/' . $filename . URL_APPEND . $add_breakfile);
                exit;
            }
        }
    } else {
        $messages = $o_val->getMessages();
        $values = $o_tb_patient->getFormData($o_val->getValues());
    }
} else {

    $values = $o_tb_patient->getDefaultData();
    if ($mode == 'edit') {
        $values = $o_tb_patient->getTBPatientTreatmentPhase($_REQUEST['patient_treatment_phaseid']);
    }
    if ($debug) {
        echo "<pre>";
        print_r($values);
    }
}

$errors = $o_tb_patient->getErrors();
$error_messages = $o_tb_patient->getErrorMessages();
if ($errors != 0) {
    $errorString .= "<div class=\"errorMessages\">";
    foreach ($error_messages as $msg) {
        echo $msg;
    }
    $errorString .= "</div>";
}
require ("gui/gui_tb_treatment_phases.php");
