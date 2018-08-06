<?php

require('./roots.php');
require($root_path . 'include/inc_environment_global.php');


/**
 * CARE2X Integrated Hospital Information System version deployment 1.1 (mysql) 2004-01-11
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * , elpidio@care2x.org
 *
 * See the file "copy_notice.txt" for the licence notice
 */
define('SHOW_DOC_2', 1);  # Define to 1 to  show the 2nd doctor-on-duty
define('DOC_CHANGE_TIME', '7.30'); # Define the time when the doc-on-duty will change in 24 hours H.M format (eg. 3 PM = 15.00, 12 PM = 0.00)

$lang_tables[] = 'ambulatory.php';
$lang_tables[] = 'prompt.php';
$lang_tables[] = 'departments.php';
define('LANG_FILE', 'nursing.php');
//define('NO_2LEVEL_CHK',1);
$local_user = 'ck_pflege_user';
require_once($root_path . 'include/inc_front_chain_lang.php');

/**
 * Set default values if not available from url
 */
if (!isset($dept_nr) || empty($dept_nr)) {
    $dept_nr = $_SESSION['sess_dept_nr'];
} # Default station must be set here !!
if (!isset($pday) || empty($pday))
    $pday = date('d');
if (!isset($pmonth) || empty($pmonth))
    $pmonth = date('m');
if (!isset($pyear) || empty($pyear))
    $pyear = date('Y');
$s_date = $pyear . '-' . $pmonth . '-' . $pday;

if ($s_date == date('Y-m-d'))
    $is_today = true;
else
    $is_today = false;

//$db->debug=1;

$tnow = date('H:i:s');

if (!isset($mode))
    $mode = '';

$breakfile = 'ambulatory.php' . URL_APPEND; # Set default breakfile
if ($backpath)
    $breakfile = urldecode($backpath) . URL_APPEND;
$thisfile = basename($_SERVER['PHP_SELF']);
if (isset($retpath)) {
    switch ($retpath) {
        case 'quick': $breakfile = 'nursing-schnellsicht.php' . URL_APPEND;
            break;
        case 'ward_mng': $breakfile = 'nursing-station-info.php' . URL_APPEND . '&ward_nr=' . $ward_nr . '&mode=show';
            break;
        case 'billing' : $breakfile = '../modules/billing_tz/billing_tz_pending.php' . URL_APPEND;
    }
}



# Mark where we are
$_SESSION['sess_user_origin'] = 'tbcare';

# Load date formatter
require_once($root_path . 'include/inc_date_format_functions.php');

require_once($root_path . 'include/care_api_classes/class_tz_arv_patient.php');

require_once($root_path . 'include/care_api_classes/class_tz_tb_patient.php');

//* Get the global config for billing item*/
include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
$glob_obj = new GlobalConfig($GLOBAL_CONFIG);

$tb_obj = new TB_patient;
$target_fnc = $_REQUEST['target'];
if ($target_fnc == "drtbregistered") {
    $tb_registered_patients = $tb_obj->getDRTBPatients();
    $title='DR - TB Registered Patients';
} else {
    $tb_registered_patients = $tb_obj->getTBPatients();
    $title='TB Registered Patients';
}
include_once ('gui/gui_tb_registered.php');
