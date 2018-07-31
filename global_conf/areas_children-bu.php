<?php

/* Child areas array for overriding the child permissions when
 * assigned a superior permission i.e: parent aquires all the child permissions
 * By: Mark Pat 24th Oct 2015
 * 
 */

$childareas = array(
    '_a_1_admissionwrite' => array('_a_2_admissionread', '_a_2_archiveread'),
    '_a_1_aarreadwrite' => array('_a_2_aarread'),
    '_a_1_outpwrite' => array('_a_2_outpread'),
    '_a_1_nursingstationallwrite' => array('_a_2_nursingstationallread'),
    '_a_1_nursingdutyplanwrite' => array('_a_2_nursingdutyplanread'),
    '_a_1_diagnosticsresultwrite' => array('_a_3_diagnosticsresultread', '_a_2_diagnosticsreceptionwrite', '_a_3_diagnosticsrequest'),
    '_a_2_diagnosticsreceptionwrite' => array('_a_3_diagnosticsrequest'),
    '_a_1_labresultsreadwrite' => array('_a_2_labresultswrite', '_a_3_labresultsread', '_a_2_labparametersedit', '_a_2_labbloodwrite', '_a_3_labbloodread', '_a_2_labrequest'),
    '_a_2_labresultswrite' => array('_a_3_labresultsread'),
    '_a_2_labbloodwrite' => array('_a_3_labbloodread'),
    '_a_2_labrequest' => array('_a_3_labresultsread'),
    '_a_1_opdoctorallwrite' => array('_a_2_opnurseallwrite', '_a_3_opnurseallread'),
    '_a_2_opnurseallwrite' => array('_a_3_opnurseallread'),
    '_a_1_opnursedutyplanwrite' => array('_a_2_opnursedutyplanread'),
    '_a_1_radiowrite' => array('_a_1_opdoctorallwrite', '_a_2_opnurseallwrite', '_a_2_radioread'),
    '_a_1_medocswrite' => array('_a_2_medocsread'),
    '_a_1_pharmadbadmin' => array('_a_2_pharmareception', '_a_3_pharmaorder', '_a_4_pharmaread'),
    '_a_2_pharmareception' => array('_a_3_pharmaorder', '_a_4_pharmaread'),
    '_a_3_pharmaorder' => array('_a_4_pharmaread'),
    '_a_1_meddepotdbadmin' => array('_a_2_meddepotreception', '_a_3_meddepotorder', '_a_4_meddepotread'),
    '_a_2_meddepotreception' => array('_a_3_meddepotorder', '_a_4_meddepotread'),
    '_a_3_meddepotorder' => array('_a_4_meddepotread'),
    '_a_1_doctorsdutyplanwrite' => array('_a_2_doctorsdutyplanread'),
    '_a_1_photowrite' => array('_a_2_photoread'),
    '_a_1_timestampallwrite' => array('_a_2_timestampallread'),
    '_a_1_dutyplanallwrite' => array('_a_2_dutyplanallread'),
    '_a_1_billallwrite' => array('_a_2_billallread', '_a_2_billquotations', '_a_2_billreports', '_a_3_billquotationsoutp', '_a_3_billquotationsinp', '_a_3_billquotationsden'),
    '_a_2_billquotations' => array('_a_3_billquotationsoutp', '_a_3_billquotationsinp', '_a_3_billquotationsden', '_a_2_billallread'),
    '_a_3_billquotationsoutp' => array('_a_2_billallread'),
    '_a_3_billquotationsinp' => array('_a_2_billallread'),
    '_a_3_billquotationsden' => array('_a_2_billallread'),
    '_a_2_billreports' => array('_a_2_billallread'),
    '_a_1_newsallwrite' => array('_a_2_newscafewrite', '_a_2_newsallmoderatedwrite'),
    '_a_1_allreportingread' => array('_a_2_reportingread', '_a_2_clinicreportingread', '_a_2_financialreportingread', '_a_2_systemreportingread'),
);
?>
