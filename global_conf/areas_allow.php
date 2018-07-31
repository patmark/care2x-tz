<?php

//error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR),
### The following arrays are the "role" levels each containing an access point or groups of access points

$all = '_a_0_all';
$sysadmin = 'System_Admin';

$allow_area = array(
    'admit_all' => array('_a_1_admissionwrite', '_a_2_admissionread', '_a_2_archiveread', '_a_1_medocswrite'),
    'admit_write' => array('_a_1_admissionwrite'),
    'admit_read' => array('_a_2_admissionread'),
    'admit_archive' => array('_a_2_archiveread'),
    'aar' => array('_a_1_aarreadwrite'),
    'outp_write' => array('_a_1_outpwrite'),
    'outp_read' => array('_a_2_outpread'),
    'report_all' => array('_a_1_allreportingread', '_a_2_reportingread', '_a_2_clinicreportingread', '_a_2_financialreportingread', '_a_2_systemreportingread'),
    'report' => array('_a_2_reportingread'),
    'report_clinical' => array('_a_2_clinicreportingread'),
    'report_financial' => array('_a_2_financialreportingread'),
    'report_system' => array('_a_2_systemreportingread'),
    'bill_all' => array('_a_1_billallwrite', '_a_2_billallread', '_a_2_billquotations', '_a_2_billreports'),
    'bill_w' => array('_a_1_billallwrite'),
    'bill_r' => array('_a_2_billallread'),
    'bill_q' => array('_a_2_billquotations'),
    'bill_qoutp' => array('_a_3_billquotationsoutp'),
    'bill_qinp' => array('_a_3_billquotationsinp'),
    'bill_qden' => array('_a_3_billquotationsden'),
    'bill_rep' => array('_a_2_billreports'),
//    'bill_ins' => array('_a_2_billinsread', '_a_3_billallwrite'),
    'cafe' => array('_a_1_newsallwrite', '_a_1_newscafewrite'),
    'medocs' => array('_a_1_medocswrite'),
    'phonedir' => array('$all, $sysadmin'),
    'doctors' => array('_a_1_opdoctorallwrite', '_a_1_doctorsdutyplanwrite'),
    'wards' => array('_a_1_doctorsdutyplanwrite', '_a_1_opdoctorallwrite', '_a_1_nursingstationallwrite', $all, $sysadmin),
    'op_room' => array('_a_1_opdoctorallwrite', '_a_1_opnursedutyplanwrite', '_a_2_opnurseallwrite'),
    'tech' => array('_a_1_techreception'),
    'lab_all' => array('_a_1_labresultsreadwrite'),
    'lab_request' => array('_a_2_labrequest'),
    'lab_r' => array('_a_3_labresultsread'),
    'lab_w' => array('_a_2_labresultswrite'),
    'lab_bl_w' => array('_a_2_labbloodwrite'),
    'lab_bl_r' => array('_a_3_labbloodread'),
//    'lab_p' => array('_a_2_labparametersedit'),
    'radio' => array('_a_1_radiowrite', '_a_1_opdoctorallwrite', '_a_2_opnurseallwrite'),
    'radio_read' => array('_a_2_radioread'),
    'pharma_db' => array('_a_1_pharmadbadmin'),
    'pharma_receive' => array('_a_2_pharmareception'),
    'pharma_order' => array('_a_3_pharmaorder'),
    'pharma_read' => array('_a_4_pharmaread'),
    'depot_db' => array('_a_1_meddepotdbadmin'),
    'depot_rec' => array('_a_2_meddepotreception'),
    'depot_order' => array('_a_3_meddepotorder'),
    'depot_read' => array('_a_4_meddepotread'),
    'edp' => array('no_allow_type_all',),
    'news' => array('_a_1_newsallwrite'),
    'cafenews' => array('_a_1_newsallwrite', '_a_2_newscafewrite'),
    'op_docs' => array('_a_1_opdoctorallwrite'),
    'duty_op' => array('_a_1_opnursedutyplanwrite'),
    'fotolab' => array('_a_1_photowrite'),
    'test_diagnose' => array('_a_1_diagnosticsresultwrite', '_a_2_labresultswrite'),
    'test_read' => array('_a_3_diagnosticsresultread'),
    'test_receive' => array('_a_1_diagnosticsresultwrite', '_a_2_labresultswrite', '_a_2_diagnosticsreceptionwrite'),
    'test_order' => array('_a_1_diagnosticsresultwrite', '_a_2_labresultswrite', '_a_2_diagnosticsreceptionwrite', '_a_3_diagnosticsrequest')
);

/*
 * Include a file for child areas for overriding the child permissions when
 * assigned a superior permission i.e: parent aquires all the child permissions
 * By: Mark Pat 24th Oct 2015
 */

include($root_path . 'global_conf/areas_children.php');
?>
