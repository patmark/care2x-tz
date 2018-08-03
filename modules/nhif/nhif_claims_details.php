<?php

//error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
//error_reporting(0);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2005 Robert Meggle based on the development of Elpidio Latorilla (2002,2003,2004,2005)
 * elpidio@care2x.org, meggle@merotech.de
 *
 * See the file "copy_notice.txt" for the licence notice
 */
require_once($root_path . 'include/care_api_classes/class_encounter.php');
require_once($root_path . 'include/care_api_classes/class_tz_billing.php');
require_once($root_path . 'include/care_api_classes/class_nhif_claims.php');
//require_once($root_path.'include/care_api_classes/class_tz_insurance.php');
//$insurance_tz = New Insurance_tz;
$enc_obj = new Encounter;
$claims_obj = new Nhif_claims;

require_once($root_path . 'include/care_api_classes/class_tz_drugsandservices.php');
$drg_obj = new DrugsAndServices;

$in_outpatient = $_REQUEST['patient'];
$encounter_nr = $_REQUEST['encounter_nr'];
$page_action = $_REQUEST['page_action'];
$date_from = $_REQUEST['date_from'];
$date_to = $_REQUEST['date_to'];

define('LANG_FILE', 'nhif.php');
require($root_path . 'include/inc_front_chain_lang.php');
require ('gui/gui_nhif_claims_details.php');
?>
