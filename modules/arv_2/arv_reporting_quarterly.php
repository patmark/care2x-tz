<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
#error_reporting(0);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require($root_path . 'include/inc_front_chain_lang.php');
require($root_path . 'include/inc_date_format_functions.php');
require_once($root_path . 'include/care_api_classes/class_tz_arv_report_quarterly.php');
//------------------------------------------------------------------------------------------------------
$debug = false;
$curr_month = date("m", time());
$curr_year = date("Y", time());

if ($printout) {
    $start_month_timestamp = mktime(0, 0, 0, $_GET['quarter'], 1, $_GET['year']);
    $end_month_timestamp = mktime(0, 0, 0, $_GET['quarter'] + 3, 1, $_GET['year']) - 86400;  //86400 are seconds in a day
} else if (isset($_GET['submit'])) {
    #Please select Timeframe
    $start_month_timestamp = mktime(0, 0, 0, $_GET['quarter'], 1, $_GET['year']);
    $end_month_timestamp = mktime(0, 0, 0, $_GET['quarter'] + 3, 1, $_GET['year']) - 86400;  //86400 are seconds in a day
} else {
    $start_month_timestamp = mktime(0, 0, 0, $curr_month - 3, 1, $curr_year);
    $end_month_timestamp = mktime(0, 0, 0, $curr_month, 1, $curr_year) - 86400;   //86400 are seconds in a day
    $_GET['quarter'] = $curr_month - 3;
    $_GET['year'] = $curr_year;
    $_GET['month_6'] = 1;
    $_GET['month_12'] = 1;
}

//------------------------------------------------------------------------------------------------------
$arv_report = &new Quarterly_report($_GET['quarter'], $_GET['year'], $_GET['month_6'], $_GET['month_12']);
$arv_report->calc_timeframe();
$arr_facility = $arv_report->getFacilityInfo();
$arr_r1 = $arv_report->display_quarterly_art_report_no1();
$arr_r2 = $arv_report->display_quarterly_art_report_no2();
$arr_r3 = $arv_report->display_quarterly_art_report_no3();
//$arr_c6 = $arv_report->display_quarterly_art_report_no4(6);
//$arr_c12 = $arv_report->display_quarterly_art_report_no4(12);
//$arr_r6 = $arv_report->display_quarterly_art_report_no6();
//------------------------------------------------------------------------------------------------------

require ("gui/gui_arv_reporting_quarterly.php");
?>
