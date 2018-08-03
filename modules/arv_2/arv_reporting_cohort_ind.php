<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
#error_reporting(0);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require($root_path . 'include/inc_front_chain_lang.php');
require($root_path . 'include/inc_date_format_functions.php');
require_once($root_path . 'include/care_api_classes/class_tz_arv_report_cohort.php');
//------------------------------------------------------------------------------------------------------
$debug = false;
$curr_month = date("m", time());
$curr_year = date("Y", time());
$date_arr1 = explode("/", $_GET['start_date']); //Start date
$s_month = $date_arr1[1];
$s_year = $date_arr1[2];


$cohort_ind = &new Cohort_report($s_month, $s_year, 6);
$arr_facility = $cohort_ind->getFacilityInfo();
$arr_ind = $cohort_ind->get_cohort_indicators();
$sep = "/";
$start_date = $cohort_ind->formatDate2STD(str_replace("%2F", "/", $_GET['start_date']), "dd/mm/yyyy", &$sep);
$end_date = $cohort_ind->formatDate2STD(str_replace("%2F", "/", $_GET['end_date']), "dd/mm/yyyy", &$sep);

if ($printout) {
//    $cohort_rpt->calc_timeframe();
    $arr_coh = $cohort_ind->display_cohort_ind_report($_GET['indicator'], $start_date, $end_date, $_GET['interval']);
} else if (isset($_GET['submit'])) {
    $arr_coh = $cohort_ind->display_cohort_ind_report($_GET['indicator'], $start_date, $end_date, $_GET['interval']);
}

//------------------------------------------------------------------------------------------------------

require ("gui/gui_arv_reporting_cohort_ind.php");
?>
