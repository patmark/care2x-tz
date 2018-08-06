<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require($root_path . 'include/inc_front_chain_lang.php');
require_once($root_path . 'include/care_api_classes/class_tz_tb_patient.php');
//----------------------------------------------------------------------------------------------------
/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2007 Dorothea Reichert based on the development of Elpidio Latorilla (2002,2003,2004,2005)
 * elpidio@care2x.org, meggle@merotech.de
 *
 * See the file "copy_notice.txt" for the licence notice
 */
//-------------------------------------------------------------------------------------------------------------------------------------
$breakfile = "modules/ambulatory/amb_clinic_patients.php";
$add_breakfile = "&pid=" . $_REQUEST['pid'] . "&dept_nr=47";

require_once($root_path . 'include/care_api_classes/class_nhif_claims.php');

$claims_obj = new Nhif_claims;

$o_tb_patient = new TB_patient($_REQUEST['pid']);

//Set Session user origin to tbcare
$_SESSION['sess_user_origin'] = 'tbcare';

//Check if encounter Number is not set and set
if (empty($_GET['encounter_nr']) || !isset($_GET['encounter_nr'])) {
    $_GET['encounter_nr'] = $claims_obj->GetEncounterFromBatchNumber($_REQUEST['pid']);
}

require ("gui/gui_tb_menu.php");
?>
