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
if (empty($_REQUEST['pid']) OR empty($_REQUEST['encounter_nr'])) {
    $error_messages = "<div class=\"errorMessages\">No patient is selected! </div>";
    require ("gui/gui_tb_registration.php");
    die();
}

if (!$o_tb_patient = &new TB_patient($_REQUEST['pid'], $_REQUEST['registration_id'])) {
    require ("gui/gui_tb_registration.php");
    die();
}

$facility_info = $o_tb_patient->getFacilityInfo();
$registration_data = $o_tb_patient->getRegistrationData();

//print_r($facility_info);

if (isset($_POST['submit'])) {
    $o_val = &new TBValidator($o_tb_patient->getDefaultData(), $_REQUEST);
    $o_val->set_rule('district_reg_no', 'rule_required');
//    $o_val->set_rule('ctc_id', 'rule_numeric');
//    $o_val->set_rule('ctc_id', 'rule_min_chars', 14);
    if ($mode == 'new') {
        $o_val->set_rule('ctc_id', 'unique_ctc_id');
    }
    $o_val->set_rule('signature', 'rule_required');

//    $o_val->set_rule('joined_supporter_org', 'rule_required');

    $o_val->set_rule('status_cd4', 'rule_numeric');
    $o_val->set_rule('eligible_reason_cd4', 'rule_numeric');
    $o_val->set_rule('eligible_reason_tlc', 'rule_numeric');

//    $o_val->set_rule('ctc_id', 'rule_min_chars', 3);
    $o_val->set_rule('chairman_vname', 'rule_min_chars', 2);
//    $o_val->set_rule('chairman_nname', 'rule_min_chars', 2);
    $o_val->set_rule('signature', 'rule_min_chars', 2);

    $o_val->set_rule('district_reg_no', 'rule_numeric');
    $o_val->set_rule('hbc_number', 'rule_numeric');
    $o_val->set_rule('date_first_hiv_test', 'rule_date');
    $o_val->set_rule('date_confirmed_hiv', 'rule_date');
    $o_val->set_rule('date_confirmed_hiv', 'rule_date_greater', $_POST['date_first_hiv_test']);
    $o_val->set_rule('date_enrolled', 'rule_date');
    $o_val->set_rule('date_enrolled', 'rule_date_greater', $_POST['date_confirmed_hiv']);
    $o_val->set_rule('date_eligible', 'rule_date');
//    $o_val->set_rule('date_eligible', 'rule_date_greater', $_POST['date_first_hiv_test']);
//    $o_val->set_rule('date_eligible', 'rule_date_greater', $_POST['date_confirmed_hiv']);
    $o_val->set_rule('date_eligible', 'rule_date_greater', $_POST['date_enrolled']);
    $o_val->set_rule('date_ready', 'rule_date');
//    $o_val->set_rule('date_ready', 'rule_date_greater', $_POST['date_first_hiv_test']);
//    $o_val->set_rule('date_ready', 'rule_date_greater', $_POST['date_confirmed_hiv']);
//    $o_val->set_rule('date_ready', 'rule_date_greater', $_POST['date_enrolled']);
    $o_val->set_rule('date_ready', 'rule_date_greater', $_POST['date_eligible']);
    $o_val->set_rule('date_start_art', 'rule_date');
//    $o_val->set_rule('date_start_art', 'rule_date_greater', $_POST['date_confirmed_hiv']);
//    $o_val->set_rule('date_start_art', 'rule_date_greater', $_POST['date_eligible']);
    $o_val->set_rule('date_start_art', 'rule_date_greater', $_POST['date_ready']);
    $o_val->set_rule('age_start_art', 'rule_numeric');
    $o_val->set_rule('age_start_art', 'rule_numeric');

    $o_val->set_rule('status_weight', 'rule_decimal');
    $o_val->applyRules();

    if (($o_val->getErrors()) == 0) {
        if ($_REQUEST['mode'] == 'edit') {

            if ($o_tb_patient->updateTBPatient($o_val->getValues())) {
                header("location: http://$host$uri/$filename" . URL_REDIRECT_APPEND . "$add_breakfile");
                exit;
            }
        } else if ($_REQUEST['mode'] == 'new') {
            if ($o_tb_patient->insertTBPatient($o_val->getValues())) {
                header("location: http://$host$uri/$filename" . URL_REDIRECT_APPEND . "$add_breakfile");
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
    $errorString.="<div class=\"errorMessages\">";
    foreach ($error_messages as $msg) {
        echo $msg;
    }
    $errorString.="</div>";
}
require ("gui/gui_tb_registration.php");
?>