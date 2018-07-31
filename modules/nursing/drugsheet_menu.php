<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require($root_path . 'include/inc_front_chain_lang.php');
require_once($root_path . 'include/care_api_classes/class_mini_dental.php');
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
//$breakfile = "modules/ambulatory/amb_clinic_patients.php";
//$add_breakfile = "&pid=" . $_REQUEST['pid'] . "&dept_nr=47";
//
require_once($root_path . 'include/care_api_classes/class_nhif_claims.php');

$claims_obj = new Nhif_claims;
$mini_obj = new dental();

$pid = $_REQUEST['pid'];
$ward_nr = $_REQUEST['ward_nr'];

//Get pharmacy code for the ward and assign to session
# Create ward object
require_once($root_path . 'include/care_api_classes/class_ward.php');
$ward_obj = new Ward;

if ($ward_pharmacy = $ward_obj->WardPharmacy($ward_nr)) {
    $_SESSION['ward_pharmacy'] = $ward_pharmacy;
}

$pnames = $mini_obj->GetPatientNameFromPid($pid);

require ("gui/gui_drugsheet_menu.php");
?>
