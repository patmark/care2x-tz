<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

$lang_tables[] = 'date_time.php';
$lang_tables[] = 'reporting.php';
require($root_path . 'include/inc_front_chain_lang.php');
#Load and create paginator object
require_once($root_path . 'include/care_api_classes/class_tz_reporting.php');
/**
 * getting summary of OPD...
 */
$rep_obj = new selianreport();

require_once('include/inc_timeframe.php');
/**
 * Getting the timeframe...
 */
$debug = false;
$PRINTOUT = FALSE;
if (empty($_GET['printout'])) {
    if (empty($_POST['month']) && empty($_POST['year'])) {
        if ($debug)
            echo "no time value is set, we're using now the current month<br>";
        $month = date("n", time());
        $year = date("Y", time());
        $start_timeframe = mktime(0, 0, 0, $month, 1, $year);
        $end_timeframe = mktime(0, 0, 0, $month + 1, 0, $year); // Last day of requested month
    } else { // month and year are given...
        if ($debug)
            echo "Getting an new time range...<br>";
        $start_timeframe = mktime(0, 0, 0, $_POST['month'], 1, $_POST['year']);
        $end_timeframe = mktime(0, 0, 0, $_POST['month'] + 1, 0, $_POST['year']);
    } // end of if (empty($_POST['month']) && empty($_POST['year']))
} else {
    $PRINTOUT = TRUE;
} // end of if (empty($_GET['printout']))

require_once('gui/gui_billing_summary.php');
?>
