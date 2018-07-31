<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

#Load and create paginator object
require_once($root_path . 'include/care_api_classes/class_ward.php');
require_once($root_path . 'include/care_api_classes/class_tz_reporting.php');
require_once($root_path . 'include/care_api_classes/class_tz_insurance.php');

/**
 * getting the amunt of different Diagnostic Codes
 */
$insurance_obj = new Insurance_tz;
$rep_obj = new selianreport();

$ward_obj = new Ward;
$items = 'nr,name';
$TP_SELECT_BLOCK_IN = '';
$ward_info = $ward_obj->getAllWardsItemsObject($items);
$TP_SELECT_BLOCK_IN.='<select name="current_ward_nr" size="1"><option value="all_ipd">all</option>';
if (!empty($ward_info) && $ward_info->RecordCount()) {
    while ($station = $ward_info->FetchRow()) {
        $TP_SELECT_BLOCK_IN.='
								<option value="' . $station['nr'] . '" ';
        if (isset($current_ward_nr) && ($current_ward_nr == $station['nr']))
            $TP_SELECT_BLOCK.='selected';
        $TP_SELECT_BLOCK_IN.='>' . $station['name'] . '</option>';
    }
}
$TP_SELECT_BLOCK_IN.='</select>';



require_once($root_path . 'include/care_api_classes/class_department.php');
$dept_obj = new Department;
$medical_depts = $dept_obj->getAllMedical();
$TP_SELECT_BLOCK = '<select name="dept_nr" size="1"><option value="all_opd">all</option>';
$later_depts = $medical_depts;

while (list($x, $v) = each($medical_depts)) {
    $TP_SELECT_BLOCK.='
	<option value="' . $v['nr'] . '">';
    $buffer = $v['LD_var'];
    if (isset($$buffer) && !empty($buffer))
        $TP_SELECT_BLOCK.=$$buffer;
    else
        $TP_SELECT_BLOCK.=$v['name_formal'];
    $TP_SELECT_BLOCK.='</option>';
}
$TP_SELECT_BLOCK.='</select>';






require_once('include/inc_timeframe.php');

$month = array_search(1, $ARR_SELECT_MONTH);
$year = array_search(1, $ARR_SELECT_YEAR);
$PRINTOUT = FALSE;
if ($_GET['printout']) {

	$admission_nr=$_GET['admission_nr'];
	$insurance=$_GET['hf'];
    $current_ward_nr=$_GET['current_ward_nr'];
    $dept_nr=$_GET['dept_nr'];


    $start = $_GET['start'];
    $end = $_GET['end'];

    $PRINTOUT = TRUE;
} else {
    $start = mktime(0, 0, 0, $month, 1, $year);
    $end = mktime(0, 0, 0, $month + 1, 1, $year);
    $admission_nr=$_POST['admission_id'];
    $current_ward_nr=$_POST['current_ward_nr'];
    $dept_nr=$_POST['dept_nr'];

    $insurance=$_POST['insurance'];


    





    

}


$lang_tables[] = 'reporting.php';
$lang_tables[] = 'date_time.php';
require($root_path . 'include/inc_front_chain_lang.php');
require_once('gui/gui_mtuha_icd10_report.php');
?>
