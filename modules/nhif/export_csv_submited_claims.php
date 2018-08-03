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
require_once($root_path . 'include/care_api_classes/class_nhif_claims.php');
//require_once($root_path.'include/care_api_classes/class_tz_insurance.php');
//$insurance_tz = New Insurance_tz;
$enc_obj = new Encounter;
$claims_obj = new Nhif_claims;

require_once($root_path . 'include/care_api_classes/class_tz_drugsandservices.php');
$drg_obj = new DrugsAndServices;

$in_outpatient = $_REQUEST['patient'];

$date_from = date('d-M-Y', strtotime($_REQUEST['date_from']));
$date_to = date('d-M-Y', strtotime($_REQUEST['date_to']));


define('LANG_FILE', 'nhif.php');
require($root_path . 'include/inc_front_chain_lang.php');




// output headers so that the file is downloaded rather than displayed
$submitted_claims_query = $claims_obj->GetSubmittedClaims($filter_data);
if (!is_null($submitted_claims_query)) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
//echo 'lsdflkslk';

    $delimiter = ",";
    $filename = "NHIF_Claims_From_" . $date_from . "_To_" . $date_to . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
//            $fields = array('ID', 'Name', 'Email', 'Phone', 'Created', 'Status');
//            fputcsv($f, $fields, $delimiter);
    //output each row of the data, format line as csv and write to file pointer
    $total_registration = 0;
    $total_investigation = 0;
    $total_outpatient_charges = 0;
    $total_registration = 0;
    $total_surgery = 0;
    $total_registration = 0;
    $total_days_admitted = 0;
    $total_inpatient_charges = 0;
    $grant_total = 0;
    $title_row = array();
    fputcsv($f, $title_row, $delimiter);
    $sub_title_row = array('Claim Summary for claim No:NHIF/'.$_SESSION['facility_code'].'/'.date('M-Y', strtotime($_REQUEST['date_from']))." Facility Name".$_SESSION['facility_name'].'('.$_SESSION['facility_code'].')' );
    fputcsv($f, $sub_title_row, $delimiter);
    $header_row = array($LDFolioNo, $LDFullName, $LDCardno, $LDRegistration, 'Investigation', 'Outpatient Charges', 'surgery Charges', 'Days admited', 'Inpatient Charges', 'Grand Total');
    fputcsv($f, $header_row, $delimiter);
    while ($row = $submitted_claims_query->FetchRow()) {
        $registration_charges = $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'like_items' => array('%cons-%')));
        $total_registration += $registration_charges;
        $investigation_charges = $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'purchasing_class' => array('xray', 'labtest')));
        $total_investigation += $investigation_charges;
        $outpatient_charges = $row['encounter_class_nr'] == 2 ? $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'exclude_purchasing_class' => array('xray', 'labtest', 'minor_proc_op', 'surgical_op', 'eye-surgery', 'dental'), 'not_like_items' => array('%cons-%'))) : '';
        $total_outpatient_charges += $outpatient_charges;
        $surgery_charges = $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'purchasing_class' => array('minor_proc_op', 'surgical_op', 'eye-surgery', 'dental', 'eye-service')));
        $total_surgery += $surgery_charges;

        $admission_date = new DateTime($row['encounter_date']);

        $discharge_date = new DateTime($row['discharge_date']);

        $days_admitted = $admission_date->diff($discharge_date);
        $total_days_admitted += $days_admitted->days;
        $inpatient_charges = $row['encounter_class_nr'] == 1 ? $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'exclude_purchasing_class' => array('xray', 'labtest', 'minor_proc_op', 'surgical_op', 'eye-surgery', 'dental'), 'not_like_items' => array('%cons-%'))) : '';
        $total_inpatient_charges += $inpatient_charges;
        $grant_charges = $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no']));
        $grant_total += $grant_charges;

        $status = ($row['status'] == '1') ? 'Active' : 'Inactive';
        $lineData = array($row['FolioNo'], ucfirst(strtolower($row['fullname'])), $row['membership_nr'], $registration_charges, $investigation_charges, $outpatient_charges, $surgery_charges, $row['encounter_class_nr'] == 1 ? $days_admitted->days : '', $inpatient_charges, $grant_charges);
        fputcsv($f, $lineData, $delimiter);
    }

    $lineData = array('', '', 'Total', $total_registration, $total_investigation, $total_outpatient_charges, $total_surgery, $total_days_admitted, $total_inpatient_charges, $grant_total);
    fputcsv($f, $lineData, $delimiter);
    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;
