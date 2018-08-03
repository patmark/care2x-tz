<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
#error_reporting(0);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require($root_path . 'include/inc_front_chain_lang.php');
require($root_path . 'include/inc_date_format_functions.php');
require_once($root_path . 'include/care_api_classes/class_tz_arv_report_cohort.php');
//------------------------------------------------------------------------------------------------------
$debug = FALSE;
$curr_month = date("m", time());
$curr_year = date("Y", time());

if ($printout) {
    $start_month_timestamp = mktime(0, 0, 0, $_GET['quarter'] - $_GET['period'], 1, $_GET['year']);
    $end_month_timestamp = mktime(0, 0, 0, $_GET['quarter'] - $_GET['period'] + 3, 1, $_GET['year']) - 86400;  //86400 are seconds in a day

    $fu_start_month_timestamp = mktime(0, 0, 0, $_GET['quarter'], 1, $_GET['year']);
    $fu_end_month_timestamp = mktime(0, 0, 0, $_GET['quarter'] + 3, 1, $_GET['year']) - 86400;  //86400 are seconds in a day

    $cohort_rpt = &new Cohort_report($_GET['quarter'], $_GET['year'], $_GET['period']);
    $cohort_rpt->calc_timeframe();
    $arr_facility = $cohort_rpt->getFacilityInfo();
    $arr_c = $cohort_rpt->display_quarterly_cohort_report($_GET['period']);
} else if (isset($_GET['submit'])) {
    #Please select Timeframe
    $start_month_timestamp = mktime(0, 0, 0, $_GET['quarter'] - $_GET['period'], 1, $_GET['year']);
    $end_month_timestamp = mktime(0, 0, 0, $_GET['quarter'] - $_GET['period'] + 3, 1, $_GET['year']) - 86400;  //86400 are seconds in a day

    $fu_start_month_timestamp = mktime(0, 0, 0, $_GET['quarter'], 1, $_GET['year']);
    $fu_end_month_timestamp = mktime(0, 0, 0, $_GET['quarter'] + 3, 1, $_GET['year']) - 86400;  //86400 are seconds in a day

    $cohort_rpt = &new Cohort_report($_GET['quarter'], $_GET['year'], $_GET['period']);
    $cohort_rpt->calc_timeframe();
    $arr_facility = $cohort_rpt->getFacilityInfo();
    $arr_c = $cohort_rpt->display_quarterly_cohort_report($_GET['period']);
}

//------------------------------------------------------------------------------------------------------

require ("gui/gui_arv_reporting_cohort_quarterly.php");
?>
