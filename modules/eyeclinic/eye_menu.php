<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require($root_path . 'include/inc_front_chain_lang.php');
require_once($root_path . 'include/care_api_classes/class_tz_arv_case.php');
//----------------------------------------------------------------------------------------------------
/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License

 * See the file "copy_notice.txt" for the licence notice
 */
//-------------------------------------------------------------------------------------------------------------------------------------
$breakfile = "modules/ambulatory/amb_clinic_patients.php";
$add_breakfile = "&pid=" . $_GET['pid'] . "&dept_nr=42";

require ("gui/gui_eyeclinic_menu.php");
?>
