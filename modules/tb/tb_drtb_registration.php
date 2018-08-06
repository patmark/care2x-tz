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
$filename = "tb_menu.php";
$breakfile = "modules/tb/tb_menu.php";

if ($debug) {
    echo "<pre>";
    print_r($_REQUEST);
}
//------------------------------------------------------------------------------------------------------------
if (empty($_REQUEST['pid'])) {
    $error_messages = "<div class=\"errorMessages\">No patient is selected! </div>";
    require ("gui/gui_tb_drtb_registration.php");
    die();
}

if (!$o_tb_patient = new TB_patient($_REQUEST['pid'], $_REQUEST['district_regno'])) {
    require ("gui/gui_tb_drtb_registration.php");
    die();
}

$facility_info = $o_tb_patient->getTBFacilityInfo();
$registration_data = $o_tb_patient->getRegistrationData();

$yesno = array('' => '--Select--', '1' => 'Yes', '0' => 'No');
//print_r($facility_info);

if (isset($_POST['submit'])) {
//    print_r($_POST);
    $o_val = new TBValidator($o_tb_patient->getDefaultData(), $_REQUEST);
    $o_val->set_rule('drtb_regno', 'rule_required');
    $o_val->set_rule('date_drtbreg', 'rule_required');
    $o_val->set_rule('district_regno', 'rule_required');
    $o_val->set_rule('next_ofkin', 'rule_required');
    $o_val->set_rule('telephone', 'rule_required');
    if ($mode == 'new') {
        $o_val->set_rule('drtb_regno', 'unique_drtb_regno');
    }
    $o_val->set_rule('classification_bysiteid', 'rule_select_required');
    $o_val->set_rule('drtb_reg_groupid', 'rule_select_required');
    $o_val->set_rule('used_second_line_drugs', 'rule_select_required');
     $o_val->set_rule('hiv_status', 'rule_select_required');
    
        
//    $o_val->set_rule('treatment_supporter_name', 'rule_required');
//    $o_val->set_rule('treatment_supporter_address', 'rule_required');
//    $o_val->set_rule('treatment_supporter_phone', 'rule_required');
//    
//    $o_val->set_rule('classification_byhistoryid', 'rule_select_required');
   
//    $o_val->set_rule('on_cpt', 'rule_select_required');
//    $o_val->set_rule('on_art', 'rule_select_required');


    $o_val->set_rule('signature', 'rule_required');

    $o_val->applyRules();

    if (($o_val->getErrors()) == 0) {
        if ($_REQUEST['mode'] == 'edit') {
            if ($o_tb_patient->updateDRTBPatient($o_val->getValues())) {
//                header("Location: http://$host$uri/$filename" . URL_APPEND . "$add_breakfile");
                header('Location: ' . $root_path . 'modules/tb/' . $filename . URL_APPEND . $add_breakfile);
                exit;
            }
        } else if ($_REQUEST['mode'] == 'new') {
            if ($o_tb_patient->insertDRTBPatient($o_val->getValues())) {
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
    if ($_REQUEST['mode'] == "new") {
        $values = $o_tb_patient->getDefaultData();
        if ($debug) {
            echo "<pre>";
            print_r($values);
        }
    } else if ($_GET['mode'] == "edit") {
        $values = $o_tb_patient->getFormData($o_tb_patient->getTBData());
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
require ("gui/gui_tb_registration.php");
?>