<?php

$root_path = '../../';
include_once($root_path . 'include/care_api_classes/class_nhif.php');

class Nhif_claims extends Nhif {

    function Nhif_claims($token_url = '', $service_url = '', $nhif_username = '', $nhif_pass = '') {
        if (!empty($token_url)) {
            $this->token_url = $token_url;
        }
        if (!empty($service_url)) {
            $this->service_url = $service_url;
        }

        if (!empty($nhif_username)) {
            $this->nhif_username = $nhif_username;
        }

        if (!empty($nhif_pass)) {
            $this->nhif_pass = $nhif_pass;
        }
    }

    var $fld_care_nhif_claims = array(
        'FolioID',
        'ClaimYear',
        'ClaimMonth',
        'FolioNo',
        'SerialNo',
        'CardNo',
        'Age',
        'TelephoneNo',
        'encounter_nr',
        'claim_status',
        'CreatedBy',
        'DateCreated',
        'LastModifiedBy',
        'LastModified',
    );

    function GetPendingClaims($filter_data = array()) {
        global $db;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::ShowPendingClaims()</b><br>";

//        $globalconfig_obj = new Globalconfig();
        $sql = "SELECT *,care_encounter.encounter_nr AS visit_no,if(care_encounter.encounter_class_nr = 1,'IN','OUT'),care_tz_diagnosis.timestamp as DateCreated, min(care_tz_diagnosis.timestamp) as PatientTypeCode "
                . "FROM care_person,care_tz_company,care_encounter "
                . " LEFT OUTER JOIN care_tz_diagnosis ON care_encounter.encounter_nr =  care_tz_diagnosis.encounter_nr   "
                . "WHERE  care_encounter.encounter_nr NOT IN( SELECT care_nhif_claims.encounter_nr FROM care_nhif_claims WHERE care_nhif_claims.claim_status = 'submitted') "
                . " AND care_encounter.pid = care_person.pid "
                . " AND care_person.insurance_ID = care_tz_company.id  "
                . " AND care_tz_company.company_code like '%NHIF'  "
                . " AND is_discharged= '1' ";
        if (isset($filter_data['in_outpatient'])) {
            $sql .= " AND care_encounter.encounter_class_nr = '" . $filter_data['in_outpatient'] . "'";
        }
        if (isset($filter_data['date_from'])) {
            $sql .= " AND discharge_date >= '" . $filter_data['date_from'] . "'";
        }
        if (isset($filter_data['date_to'])) {
            $sql .= " AND discharge_date <= '" . $filter_data['date_to'] . "'";
        }
        $sql .= 'GROUP BY care_encounter.encounter_nr';

        if (isset($filter_data['sort'])) {
            $sql .= " " . $filter_data['sort'];
        }

        $result = $db->Execute($sql);
        if ($this->debug) {
            echo $sql;
        }
        if ($result->RecordCount() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function GetSumAmoutClaimed($filter_data = array()) {
        global $db;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::GetSumAmoutClaimed()</b><br>";
//        $sql = "SELECT SUM(price*total_dosage) AS totalAmount "
//                . "FROM care_encounter_prescription,care_tz_drugsandservices "
//                . "WHERE care_encounter_prescription.article_item_number = care_tz_drugsandservices.item_id";
        
        $sql = "SELECT SUM(unit_price_1*total_dosage) AS totalAmount "
                . "FROM care_encounter_prescription,care_tz_drugsandservices "
                . "WHERE care_encounter_prescription.article_item_number = care_tz_drugsandservices.item_id";
        if (isset($filter_data['encounter_nr'])) {
            $sql .= " AND care_encounter_prescription.encounter_nr  = '" . $filter_data['encounter_nr'] . "' ";
        }
        if (isset($filter_data['purchasing_class'])) {
            $sql .= " AND (";
            $i = 1;
            foreach ($filter_data['purchasing_class'] as $purchasing_class) {
                if ($i == 1) {
                    $sql .= " care_tz_drugsandservices.purchasing_class = '" . $purchasing_class . "' ";
                } else {
                    $sql .= " OR care_tz_drugsandservices.purchasing_class = '" . $purchasing_class . "' ";
                }
                $i++;
            }
            $sql .= ") ";
        }
        if (isset($filter_data['exclude_purchasing_class'])) {
            $sql .= " AND (";
            $i = 1;
            foreach ($filter_data['exclude_purchasing_class'] as $exclude_purchasing_class) {
//                $sql .= " care_tz_drugsandservices.purchasing_class NOT 
                if ($i == 1) {
                    $sql .= " care_tz_drugsandservices.purchasing_class NOT LIKE '" . $exclude_purchasing_class . "' ";
                } else {
                    $sql .= " AND care_tz_drugsandservices.purchasing_class NOT LIKE '" . $exclude_purchasing_class . "' ";
                }
                $i++;
            }
            $sql .= ") ";
        }
        if (isset($filter_data['like_items'])) {
            $sql .= " AND (";
            $i = 1;
            foreach ($filter_data['like_items'] as $like_items) {
                if ($i == 1) {
                    $sql .= " care_tz_drugsandservices.item_description LIKE '" . $like_items . "' ";
                } else {
                    $sql .= " OR care_tz_drugsandservices.item_description LIKE '" . $like_items . "' ";
                }
                $i++;
            }
            $sql .= ") ";
        }

        if (isset($filter_data['not_like_items'])) {
            $sql .= " AND (";
            $i = 1;
            foreach ($filter_data['not_like_items'] as $not_like_items) {
                if ($i == 1) {
                    $sql .= " care_tz_drugsandservices.item_description NOT LIKE '" . $not_like_items . "' ";
                } else {
                    $sql .= " AND care_tz_drugsandservices.item_description NOTE LIKE '" . $not_like_items . "' ";
                }
                $i++;
            }
            $sql .= " ) ";
        }
        $sql .= " GROUP BY care_encounter_prescription.encounter_nr";
        if ($this->debug) {
            echo $sql_encounter;
        }
        $result = $db->Execute($sql);
        $row = $result->FetchRow();
        return $row['totalAmount'];
    }

    function GetSubmittedClaims($filter_data = array()) {
        global $db;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::ShowPendingClaims()</b><br>";

//        $globalconfig_obj = new Globalconfig();
        $sql = "SELECT *,care_encounter.encounter_nr AS visit_no,if(care_encounter.encounter_class_nr = 1,'IN','OUT'),"
                . "care_tz_diagnosis.timestamp as DateCreated, min(care_tz_diagnosis.timestamp) as PatientTypeCode, "
                . "CONCAT(care_person.name_first,' ',care_person.name_middle,' ',care_person.name_last) as fullname "
                . "FROM care_person,care_tz_company,care_nhif_claims,care_encounter "
                . " LEFT OUTER JOIN care_tz_diagnosis ON care_encounter.encounter_nr =  care_tz_diagnosis.encounter_nr   "
                . "WHERE  care_encounter.encounter_nr = care_nhif_claims.encounter_nr "
                . " AND care_nhif_claims.claim_status = 'submitted' "
                . " AND care_encounter.pid = care_person.pid "
                . " AND care_person.insurance_ID = care_tz_company.id  "
                . " AND care_tz_company.company_code like '%NHIF'  "
                . " AND is_discharged= '1' ";
        if (isset($filter_data['in_outpatient'])) {
            $sql .= " AND care_encounter.encounter_class_nr = '" . $filter_data['in_outpatient'] . "'";
        }
        if (isset($filter_data['date_from'])) {
            $sql .= " AND discharge_date >= '" . $filter_data['date_from'] . "'";
        }
        if (isset($filter_data['date_to'])) {
            $sql .= " AND discharge_date <= '" . $filter_data['date_to'] . "'";
        }
        $sql .= 'GROUP BY care_encounter.encounter_nr';

        if (isset($filter_data['sort'])) {
            $sql .= " " . $filter_data['sort'];
        }

        $result = $db->Execute($sql);
        if ($this->debug) {
            echo $sql;
        }
        if ($result->RecordCount() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function CsvExportSubmittedClaims($filter_data = array()) {
//        print_r($filter_data);
        $submitted_claims_query = $this->GetSubmittedClaims($filter_data);
        if (!is_null($submitted_claims_query)) {
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=data.csv');
//echo 'lsdflkslk';

            $delimiter = ",";
            $filename = "NHIF_Claims_" . date('Y-m-d') . ".csv";

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
            while ($row = $submitted_claims_query->FetchRow()) {
                echo $row['visit_no'];
                $registration_charges = $this->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'like_items' => array('%cons-%')));
                $total_registration += $registration_charges;
                $investigation_charges = $this->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'purchasing_class' => array('xray', 'labtest')));
                $total_investigation += $investigation_charges;
                $outpatient_charges = $row['encounter_class_nr'] == 2 ? $this->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'exclude_purchasing_class' => array('xray', 'labtest', 'minor_proc_op', 'surgical_op', 'eye-surgery', 'dental'), 'not_like_items' => array('%cons-%'))) : '';
                $total_outpatient_charges += $outpatient_charges;
                $surgery_charges = $this->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'purchasing_class' => array('minor_proc_op', 'surgical_op', 'eye-surgery', 'dental', 'eye-service')));
                $total_surgery += $surgery_charges;

                $admission_date = new DateTime($row['encounter_date']);

                $discharge_date = new DateTime($row['discharge_date']);

                $days_admitted = $admission_date->diff($discharge_date);
                $total_days_admitted += $days_admitted->days;
                $inpatient_charges = $row['encounter_class_nr'] == 1 ? $this->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'exclude_purchasing_class' => array('xray', 'labtest', 'minor_proc_op', 'surgical_op', 'eye-surgery', 'dental'), 'not_like_items' => array('%cons-%'))) : '';
                $total_inpatient_charges += $inpatient_charges;
                $grant_charges = $this->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no']));
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
    }

    function filterData(&$str) {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"'))
            $str = '"' . str_replace('"', '""', $str) . '"';
    }

    function ShowPendingClaims($in_outpatient, $sid, $date_from, $date_to, $sort) {
        global $db;
        $counter = 0;
        $color_change = FALSE;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::ShowPendingClaims()</b><br>";

//        $globalconfig_obj = new Globalconfig();
        $sql_encounter = "SELECT *,care_encounter.encounter_nr AS visit_no,if(care_encounter.encounter_class_nr = 1,'IN','OUT'),care_tz_diagnosis.timestamp as DateCreated, min(care_tz_diagnosis.timestamp) as PatientTypeCode "
                . "FROM care_person,care_tz_company,care_encounter "
                . " LEFT OUTER JOIN care_tz_diagnosis ON care_encounter.encounter_nr =  care_tz_diagnosis.encounter_nr   "
                . "WHERE "
                . " care_encounter.encounter_nr NOT IN( SELECT care_nhif_claims.encounter_nr FROM care_nhif_claims WHERE care_nhif_claims.claim_status = 'submitted')  AND "
//                . " care_nhif_claims.claim_status <> 'submitted' AND "
                . " care_encounter.pid = care_person.pid  AND"
                . " care_person.insurance_ID = care_tz_company.id  AND "
                . " care_tz_company.company_code like '%NHIF'  AND"
                . " is_discharged= '1' AND"
                . " care_encounter.encounter_class_nr = '" . $in_outpatient . "' AND "
                . " discharge_date >= '" . $date_from . "' AND "
                . " discharge_date<= '$date_to' GROUP BY care_encounter.encounter_nr " . $sort;

        if ($this->debug) {
            echo $sql_encounter;
        }

        $result_encounter = $db->Execute($sql_encounter);
        if ($result_encounter) {
            while ($row = $result_encounter->FetchRow()) {
                if ($row['sex'] == 'm'or $row['sex'] == 'M') {
                    $row['sex'] = 'Male';
                } elseif ($row['sex'] == 'f' OR $row['sex'] == 'F') {
                    $row['sex'] = 'Female';
                }

                $claims_items_query = $this->get_claim_items(array('encounter_nr' => $row['encounter_nr']));
                $AmountClaimed = 0;
                if (!is_null($claims_items_query)) {
                    while ($claims_items_row = $claims_items_query->FetchRow()) {
                        $AmountClaimed = $AmountClaimed + ($claims_items_row['price'] * $claims_items_row['total_dosage']);
                    }
                }
//                print_r($row);
                $date = date_create();
                echo date_format($row['DateCreated'], 'U = Y-m-d H:i:s') . "\n";

//                date_timestamp_set($date, 1171502725);
//                echo date_format($date, 'U = Y-m-d H:i:s') . "\n";
                echo '
                                       

                                    <tr>
                                    <form method="GET" action="billing_tz_quotation_select_pricelist.php">
                                    
                                        <td ' . $BGCOLOR . ' class="td_content"><div align="center">' . $row['selian_pid'] . '</div></td>
                                        <td ' . $BGCOLOR . ' class="td_content"><div align="center">' . $row['membership_nr'] . '</div></td>
                                        <td ' . $BGCOLOR . ' class="td_content"><div align="center">' . ucfirst(strtolower($row['name_first'])) . '</div></td>
                                        <td ' . $BGCOLOR . ' class="td_content"><div align="center">' . ucfirst(strtolower($row['name_last'])) . '</div></td>
                                        <td ' . $BGCOLOR . ' class="td_content"><div align="center">' . $row['sex'] . '</div></td> 
                                        <td ' . $BGCOLOR . ' class="td_content"><div align="center">' . $row['date_birth'] . '</div></td>
                                        <td ' . $BGCOLOR . ' class="td_content"><div align="center">' . $row['cellphone_1_nr'] . '</div></td>
                                        <td ' . $BGCOLOR . ' class="td_content"><div align="center">' . $row['nhif_auth_no'] . '</div></td>
                                        <td ' . $BGCOLOR . ' class="td_content"><div align="center">' . $row['encounter_date'] . '</div></td>
                                            <td ' . $BGCOLOR . ' class="td_content"><div align="center">' . $AmountClaimed . '</div></td>

                                        <td ' . $BGCOLOR . ' class="td_content"><div align="center">' .
                '<a href="../../modules/nhif/nhif_pass.php' . URL_APPEND . '&patient=' . $in_outpatient . '&lang=en&target=claimsdetails&encounter_nr=' . $row['visit_no'] . '&date_from=' . $date_from . '&date_to=' . $date_to . '" title="Visit Details : Click to show data"><button type="button">>></button></a>'
                . '</div></td>

                                        
                                    </form>
                                    </tr>';
            }
        } else {
            echo '<tr><td colspan="8" align="center">Houston we have a problem. Database error :(</td></tr>';
        }
    }

    function ShowPendingClaimsDetails($filter_data = array()) {
        global $db;
        $counter = 0;
        $color_change = FALSE;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::ShowPendingClaimsDetails()</b><br>";

        if (isset($_GET['sort']) & isset($_GET['sorttyp'])) {
            $sort = 'ORDER BY ' . $_GET['sort'] . ' ' . $_GET['sorttyp'];
        } else {
            $sort = '';
        }
        $globalconfig_obj = new Globalconfig();
        $sql = "SELECT *,if(care_encounter.encounter_class_nr = 1,'IN','OUT') as PatientTypeCode,care_encounter.encounter_nr as visit_no,"
                . " care_tz_diagnosis.timestamp as DateCreated, min(care_tz_diagnosis.timestamp) "
                . " FROM care_person,care_tz_company,care_encounter "
                . " LEFT OUTER JOIN care_tz_diagnosis ON care_encounter.encounter_nr =  care_tz_diagnosis.encounter_nr "
                . " WHERE care_encounter.pid = care_person.pid  AND"
                . " care_person.insurance_ID = care_tz_company.id  AND "
                . " care_tz_company.company_code like '%NHIF'  AND"
                . " is_discharged= '1' ";
        if (isset($filter_data['encounter_nr'])) {
            $sql .= " AND care_encounter.encounter_nr = '" . $filter_data['encounter_nr'] . "' ";
        }

        $sql .= " GROUP BY care_encounter.encounter_nr " . $sort;
        $result_encounter = $db->Execute($sql);
//        while ($row = $result_encounter->FetchRow()) {
//            echo $row['encounter_nr'].' Yes <br>';
//        }
        if ($result_encounter->RecordCount() > 0) {
            return $result_encounter;
        } else {
            return NULL;
        }
    }

    function get_diagnosis($filter_data = array()) {
        global $db;
        $counter = 0;
        $color_change = FALSE;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::get_diagnosis()</b><br>";
        $sql_diagnosis = "SELECT * FROM care_tz_diagnosis WHERE 1 ";
        if (isset($filter_data['pid'])) {
            $sql_diagnosis .= " AND care_tz_diagnosis.PID = '" . $filter_data['pid'] . "' ";
        }
        if (isset($filter_data['encounter_nr'])) {
            $sql_diagnosis .= " AND care_tz_diagnosis.encounter_nr = '" . $filter_data['encounter_nr'] . "' ";
        }
        if ($this->debug) {
            echo $sql_diagnosis;
        }
        $result_diagnosis = $db->Execute($sql_diagnosis);
        if ($result_diagnosis->RecordCount() > 0) {
            return $result_diagnosis;
        } else {
            return NULL;
        }
    }

    function get_labtest($filter_data = array()) {
        global $db;
        $counter = 0;
        $color_change = FALSE;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::get_labtest()</b><br>";
        $sql_diagnosis = "SELECT care_tz_drugsandservices.nhif_item_code,care_tz_drugsandservices.item_number,"
                . " care_tz_drugsandservices.unit_price_1, IF(care_test_request_chemlabor_sub.bill_number>0,1,0) as  bill_status "
                . " FROM care_test_request_chemlabor_sub,care_test_findings_chemlabor_sub,care_tz_drugsandservices"
                . " WHERE care_test_request_chemlabor_sub.item_id = care_tz_drugsandservices.item_id "
                . " AND care_test_findings_chemlabor_sub.encounter_nr = care_test_request_chemlabor_sub.encounter_nr "
                . " AND care_test_findings_chemlabor_sub.paramater_name = care_test_request_chemlabor_sub.paramater_name ";

        if (isset($filter_data['encounter_nr'])) {
            $sql_diagnosis .= " AND care_test_findings_chemlabor_sub.encounter_nr = '" . $filter_data['encounter_nr'] . "' ";
        }
        $sql_diagnosis .= " UNION SELECT care_tz_drugsandservices.nhif_item_code, care_tz_drugsandservices.item_number,"
                . " care_tz_drugsandservices.unit_price_1,if(care_test_request_radio.bill_number>0,1,0) as bill_status"
                . " FROM care_test_request_radio,care_test_findings_radio,care_tz_drugsandservices "
                . " WHERE care_test_request_radio.encounter_nr = care_test_findings_radio.encounter_nr "
                . " AND care_test_request_radio.test_request = care_tz_drugsandservices.item_id";
        if (isset($filter_data['encounter_nr'])) {
            $sql_diagnosis .= " AND care_test_findings_radio.encounter_nr = '" . $filter_data['encounter_nr'] . "' ";
        }
        if ($this->debug) {
            echo $sql_diagnosis;
        }
        $result_diagnosis = $db->Execute($sql_diagnosis);

        if ($result_diagnosis->RecordCount() > 0) {
            return $result_diagnosis;
        } else {
            return NULL;
        }
    }

    function get_claimed_drugs($filter_data = array()) {
//        print_r($filter_data);
        global $db;
        $counter = 0;
        $color_change = FALSE;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::get_claimed_drugs()</b><br>";
        $sql_diagnosis = "SELECT care_tz_drugsandservices.item_full_description,care_tz_drugsandservices.nhif_item_code,care_tz_drugsandservices.item_number,care_encounter_prescription.total_dosage,care_tz_drugsandservices.unit_price_1, IF(care_encounter_prescription.bill_number>0,1,0) as  bill_status,care_encounter_prescription.encounter_nr "
                . " FROM care_encounter_prescription,care_tz_drugsandservices"
                . " WHERE care_encounter_prescription.article_item_number = care_tz_drugsandservices.item_id ";
        if (isset($filter_data['encounter_nr'])) {
            $sql_diagnosis .= " AND care_encounter_prescription.encounter_nr = '" . $filter_data['encounter_nr'] . "' ";
        }
        $sql_diagnosis .= " AND  (care_tz_drugsandservices.purchasing_class = 'drug_list'  "
                . " OR  care_tz_drugsandservices.purchasing_class = 'drug_list_nhif')";
        $result_diagnosis = $db->Execute($sql_diagnosis);

        if ($this->debug) {
            echo $sql_diagnosis;
        }
        if ($result_diagnosis) {
            return $result_diagnosis;
        } else {
            return NULL;
        }
    }

    function get_claimed_surgery_and_services($filter_data = array()) {
        global $db;
        $counter = 0;
        $color_change = FALSE;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::get_labtest()</b><br>";
        $sql_diagnosis = "SELECT care_tz_drugsandservices.item_full_description,care_tz_drugsandservices.nhif_item_code,care_tz_drugsandservices.item_number,care_encounter_prescription.total_dosage,care_tz_drugsandservices.unit_price_1, IF(care_encounter_prescription.bill_number>0,1,0) as  bill_status "
                . " FROM care_encounter_prescription,care_tz_drugsandservices"
                . " WHERE care_encounter_prescription.article_item_number = care_tz_drugsandservices.item_id "
                . " AND  (care_tz_drugsandservices.purchasing_class = 'minor_proc_op' "
                . " OR  care_tz_drugsandservices.purchasing_class = 'surgical_op' "
                . " OR  care_tz_drugsandservices.purchasing_class = 'eye-service' "
                . " OR  care_tz_drugsandservices.purchasing_class = 'dental' "
                . " OR  care_tz_drugsandservices.purchasing_class = 'service' "
                . " OR  care_tz_drugsandservices.purchasing_class = 'eye-surgery')";

        if (isset($filter_data['encounter_nr'])) {
            $sql_diagnosis .= " AND care_encounter_prescription.encounter_nr = '" . $filter_data['encounter_nr'] . "' ";
        }
        $result_diagnosis = $db->Execute($sql_diagnosis);
        if ($result_diagnosis->RecordCount() > 0) {
            return $result_diagnosis;
        } else {
            return NULL;
        }
    }

    function get_nhif_claimes_claimed($filter_data = array()) {
        global $db;
        $counter = 0;
        $color_change = FALSE;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::get_nhif_claimes_claimed()</b><br>";
        $sql = "SELECT * FROM care_nhif_claims WHERE 1 ";

        if (isset($filter_data['encounter_nr'])) {
            $sql .= " AND care_nhif_claims.encounter_nr = '" . $filter_data['encounter_nr'] . "' ";
        }
        $result = $db->Execute($sql);
        if ($result->RecordCount() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function add_nhif_claim($filter_data = array()) {
        global $db;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::add_nhif_claim()</b><br>";
        if (isset($filter_data['encounter_nr'])) {

            $claims_details_nhif_query = $this->ShowPendingClaimsDetails($filter_data);
            if (!is_null($claims_details_nhif_query)) {
                $claims_details_nhif = $claims_details_nhif_query->fields;

                $data_insert = array(
                    'FolioID' => NULL,
                    'ClaimYear' => date('Y', strtotime($claims_details_nhif['discharge_date'])),
                    'ClaimMonth' => date('m', strtotime($claims_details_nhif['discharge_date'])),
                    'FolioNo' => $this->generate_FolioNo(array('ClaimYear' => date('Y', strtotime($claims_details_nhif['discharge_date'])), 'ClaimMonth' => date('m', strtotime($claims_details_nhif['discharge_date'])))),
                    'SerialNo' => NULL,
                    'CardNo' => $claims_details_nhif['membership_nr'],
                    'Age' => date_diff(date_create($claims_details_nhif['date_birth']), date_create($claims_details_nhif['encounter_date']))->format('%y'),
                    'TelephoneNo' => $claims_details_nhif['phone_1_nr'],
                    'encounter_nr' => $filter_data['encounter_nr'],
                    'claim_status' => 'approved',
                    'CreatedBy' => $_SESSION['sess_login_username'],
                    'DateCreated' => date("Y-m-d"),
                    'LastModifiedBy' => NULL,
                    'LastModified' => NULL,
                );
                $this->coretable = 'care_nhif_claims';
                $this->setRefArray($this->fld_care_nhif_claims);
                $this->data_array = $data_insert;
                $nhif_claims_query = $this->get_nhif_claimes_claimed($filter_data);

                if (is_null($nhif_claims_query)) {
                    if ($this->insertDataFromInternalArray($this->data_array)) {
                        return'<div id="success-alert" class="alert alert-success alert-dismissable fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Successiful Approved!</strong> </div>';
                    } else {
                        return'<div class="alert alert-danger alert-dismissable fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error in Approving Claim</strong> </div>';
                    }
                } else {
                    $this->coretable = 'care_nhif_claims';
                    $this->ref_array = $this->fld_care_nhif_claims;
                    if (isset($this->data_array['FolioNo']))
                        unset($this->data_array['FolioNo']);
                    if (isset($this->data_array['encounter_nr']))
                        unset($this->data_array['encounter_nr']);
                    if (isset($this->data_array['DateCreated']))
                        unset($this->data_array['DateCreated']);
                    if (isset($this->data_array['CreatedBy']))
                        unset($this->data_array['CreatedBy']);
                    $this->data_array['LastModifiedBy'] = $_SESSION['sess_login_username'];
                    $this->data_array['LastModified'] = date("Y-m-d");
                    $this->where = ' encounter_nr=' . $filter_data['encounter_nr'];
                    if ($this->updateDataFromInternalArray($filter_data['encounter_nr'])) {
                        return'<div id="success-alert" class="alert alert-success alert-dismissable fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Successiful updated Approval claim details!</strong> </div>';
                    } else {
                        return'<div class="alert alert-danger alert-dismissable fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error in updating Approval Claim details</strong> </div>';
                    }
                }
            }
        } else {
            return'<div class="alert alert-danger alert-dismissable fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Missing Visit Number!</strong> </div>';
        }
    }

    function generate_FolioNo($filter_data = array()) {
        global $db;
        $counter = 0;
        $color_change = FALSE;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::get_nhif_claimes_claimed()</b><br>";
        $sql = "SELECT MAX(FolioNo) as highest_folio_no FROM care_nhif_claims WHERE 1 ";

        if (isset($filter_data['ClaimYear'])) {
            $sql .= " AND care_nhif_claims.ClaimYear = '" . $filter_data['ClaimYear'] . "' ";
        }
        if (isset($filter_data['ClaimMonth'])) {
            $sql .= " AND care_nhif_claims.ClaimMonth = '" . $filter_data['ClaimMonth'] . "' ";
        }
        $result = $db->Execute($sql);
        if ($result->RecordCount() > 0) {
            $claims_details = $result->fields;
            return $claims_details['highest_folio_no'] + 1;
        } else {
            return 1;
        }
    }

    function get_claim_items($filter_data = array()) {
        global $db;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::get_nhif_claimes_claimed()</b><br>";
        $sql = "SELECT * FROM care_encounter_prescription WHERE 1 ";

        if (isset($filter_data['encounter_nr'])) {
            $sql .= " AND care_encounter_prescription.encounter_nr = '" . $filter_data['encounter_nr'] . "' ";
        }
        if (isset($filter_data['exclude_bill_status'])) {
            $sql .= " AND care_encounter_prescription.bill_status <> '" . $filter_data['exclude_bill_status'] . "' ";
        }
        $result = $db->Execute($sql);
        if ($result->RecordCount() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function claims_json($filter_data = array()) {
        $claims_details_query = $this->ShowPendingClaimsDetails($filter_data);
        $nhif_claims_query = $this->get_nhif_claimes_claimed(array('encounter_nr' => $encounter_nr));
        if (!is_null($claims_details_query) && !is_null($nhif_claims_query)) {
            $claims_details = $claims_details_query->fields;
            $nhif_claims_details = $nhif_claims_query->fields;

            $claims_diagnosis_query = $this->get_diagnosis(array('pid' => $claims_details['pid'], 'encounter_nr' => $filter_data['encounter_nr']));
            $claims_diagnosis = array();
            if (!is_null($claims_diagnosis_query)) {
                while ($row = $claims_diagnosis_query->FetchRow()) {
                    $claims_diagnosis[] = array(
                        "FolioDiseaseID" => NULL,
                        "DiseaseCode" => $row['ICD_10_code'],
                        "FolioID" => NULL,
                        "Remarks" => null,
                        "CreatedBy" => $row['create_id'],
                        "DateCreated" => $row['create_time'],
                        "LastModifiedBy" => $row['modify_id'],
                        "LastModified" => $row['modify_time'],
                    );
                }
            }

            $claims_items_query = $this->get_claim_items(array('encounter_nr' => $filter_data['encounter_nr'], 'exclude_bill_status' => 'pending'));
            $claims_items = array();
            if (!is_null($claims_items_query)) {
                while ($row = $claims_items_query->FetchRow()) {
                    $claims_items[] = array(
                        "ItemCode" => $row['article_item_number'],
                        "OtherDetails" => $row['notes'],
                        "ItemQuantity" => $row['total_dosage'],
                        "UnitPrice" => $row['price'],
                        "AmountClaimed" => $row['price'] * $row['total_dosage'],
                        "ApprovalRefNo" => NULL,
                        "CreatedBy" => $row['create_id'],
                        "DateCreated" => $row['create_time'],
                        "LastModifiedBy" => $row['modify_id'],
                        "LastModified" => $row['modify_time']
                    );
                }
            }

            $folio_details = array(
                "FacilityCode" => $_SESSION['facility_code'],
                'ClaimYear' => date('Y', strtotime($claims_details['discharge_date'])),
                'ClaimMonth' => date('m', strtotime($claims_details['discharge_date'])),
                "FolioNo" => $nhif_claims_details['FolioNo'],
                "SerialNo" => $nhif_claims_details['FolioNo'],
                "CardNo" => $nhif_claims_details['CardNo'],
                "FirstName" => $claims_details['name_first'],
                "LastName" => $claims_details['name_last'],
                "Gender" => ($claims_details['sex'] == 'm' OR $claims_details['sex'] == 'M') ? 'Male' : ($claims_details['sex'] == 'f' OR $claims_details['sex'] == 'F') ? 'Female' : $claims_details['sex'],
                "DateOfBirth" => $claims_details['date_birth'],
                "Age" => $nhif_claims_details['Age'],
                "TelephoneNo" => $claims_details['phone_1_nr'],
                "PatientFileNo" => $claims_details['selian_pid'],
                "PatientFile" => NULL,
                "AuthorizationNo" => $claims_details['nhif_auth_no'],
                "AttendanceDate" => date('Y-m-d', strtotime($claims_details['encounter_date'])),
                "PatientTypeCode" => $in_outpatient == 1 ? 'IN' : $in_outpatient == 2 ? 'OUT' : NULL,
                "DateAdmitted" => $in_outpatient == 1 ? date('Y-m-d', strtotime($claims_details['encounter_date'])) : NULL,
                "DateDischarged" => $in_outpatient == 1 ? date('Y-m-d', strtotime($claims_details['discharge_date'])) : NULL,
                "PractitionerNo" => $claims_details['practitioner_nr'],
                "FolioDiseases" => $claims_diagnosis,
                "FolioItems" => $claims_items,
                "CreatedBy" => $nhif_claims_details['CreatedBy'],
                "DateCreated" => $nhif_claims_details['DateCreated'],
                "LastModifiedBy" => $nhif_claims_details['LastModifiedBy'],
                "LastModified" => $nhif_claims_details['LastModified']
            );

            $json_folio_details = array(
                "entities" => array($folio_details)
            );
            return json_encode($json_folio_details);
        } else {
            return NULL;
        }
    }

    function submit_claims($filter_data = array()) {
        $token = '';
        $_SESSION['nhif_claims_token'] = '';
        if ($this->check_claims_token()) {
            $token = $_SESSION['nhif_claims_token'];
        }
        if ($token == '') {
            return array('success' => FALSE, 'status_massage' => "Can't get token reach server!");
        }
        $request = $this->service_url . 'claims/SubmitFolios';
        $data_string = $this->claims_json($filter_data);
        if (!is_null($data_string)) {
            $authorizationHeader = $token;
            $ch = curl_init($request);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                $authorizationHeader,
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string)
            ));
            $result = curl_exec($ch);
            $result = trim($result, "\"");
            $StatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($StatusCode === 200) {
                //Update session variable $_SESSION['nhif_access_token']
                $header_data = 'Authorization:' . $decoded->token_type . ' ' . $decoded->access_token;
                if (isset($source) && $source == 'claims') {
                    $_SESSION['nhif_claims_token'] = $header_data;
                } else {
                    $_SESSION['nhif_access_token'] = $header_data;
                }
                $this->update_claim_status($filter_data);
                return array('success' => TRUE, 'status_massage' => $result);
            }
            if ($StatusCode === 400) {
                //Login failed
                if (isset($decoded->error) && $decoded->error == 'invalid_grant') {
//            die('error occured: ' . $decoded->error_description);
                    return array('success' => FALSE, 'error' => $decoded->error_description);
                }
            } else if ($StatusCode === 0 || curl_errno($curl) === 7) {
                //Cant reach server
                return array('success' => FALSE, 'status_massage' => "Can't reach server. Please check your network connection!");
            } else {
                return array('success' => FALSE, 'status_massage' => "Please check your network connection or contact administrator!");
            }
//            
        } else {
            return array('success' => FALSE, 'status_massage' => "You are trying to submit empty folio!");
        }
    }

    function update_claim_status($filter_data = array()) {
        global $db;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = true : $db->debug = FALSE;
        if ($this->debug)
            echo "<br><b>Method class_nhif_claims::update_claim_status()</b><br>";
        $sql = "UPDATE care_nhif_claims SET claim_status = 'submitted' WHERE 1";

        if (isset($filter_data['encounter_nr'])) {
            $sql .= " AND care_nhif_claims.encounter_nr = '" . $filter_data['encounter_nr'] . "' ";
        }
        $result = $db->Execute($sql);
        if ($result) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    function Display_Headline($Headline, $Headline_Tag, $Headline_phpTag, $Help_file, $Help_Tag) {

        echo '<table cellspacing="0" class="titlebar" border=0 height="35" width="100%>
                                                                         <tr valign=top  class="titlebar" >
                                                                         <td bgcolor="#99ccff" ><font color="#330066"> &nbsp;&nbsp;' . $Headline . ' ' . $Headline_Tag . ' ' . $Headline_phpTag . ' </font></td>
                                                                <td bgcolor="#99ccff" align=right> <a href="javascript:window.history.back()"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)" ></a>';
        $_SESSION['ispopup'] = (isset($_SESSION['ispopup']) ? $_SESSION['ispopup'] : null);
        if ($_SESSION['ispopup'] == "true")
            $closelink = 'javascript:window.close()';
        else
            $closelink = 'insurance_tz.php?ntid=false&lang=$lang';

        echo '<a href="javascript:gethelp(\'' . $Help_file . '\',\'' . $Help_Tag . '\')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a><a href="nhif_claims.php" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a></td>
                                                                </tr>
                                                            </table>
                                                            <table width=100% border=0 cellspacing=0 height=80%>
                                                                <tbody class="main">
                                                                    <tr valign="middle" align="center">
                                                                        <td>';
        return TRUE;
    }

    function Display_Footer($Headline, $Headline_Tag, $Headline_phpTag, $Help_file, $Help_Tag) {
        echo '</td></tr></table><table cellspacing="0" class="titlebar" border=0 height="35" width="100%>
                                                                                           <tr valign=top  class="titlebar" >
                                                                                           <td bgcolor="#99ccff" ><font color="#330066"> &nbsp;&nbsp;' . $Headline . ' ' . $Headline_Tag . ' ' . $Headline_phpTag . ' </font></td>
                                                                <td bgcolor="#99ccff" align=right> <a href="javascript:window.history.back()"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>';

        if ($_SESSION['ispopup'] == "true")
            $closelink = 'javascript:window.close()';
        else
            $closelink = 'insurance_tz.php?ntid=false&lang=$lang';

        echo '<a href="javascript:gethelp(\' ' . $Help_file . '\', \'' . $Help_Tag . '\')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a><a href="billing_tz.php"><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a></td>
                                                                </tr>
                                                            </table>';
        return TRUE;
    }

    function Display_Credits() {
        echo '<table width="100%" border="0" cellspacing="0" cellpadding="1" bgcolor="#cfcfcf">
                                                                <tr>
                                                                    <td align="center">
                                                                        <table width="100%" bgcolor="#ffffff" cellspacing=0 cellpadding=5>
                                                                            <tr>
                                                                                <td><div class="copyright">
                                                                                        <script language="JavaScript">
                                                                                                                                                                                                                                                                                                                                                                                                                                            <!--
                                                                                        function openCreditsWindow() {

                                                                                                                                                                                                                                                                                                                                                                                                                                            urlholder = "../../language/$lang/$lang_credits.php?lang=$lang";
                                                                                                                                                                                                                                                                                                                                                                                                                                                    creditswin = window.open(urlholder, "creditswin", "width=500,height=600,menubar=no,resizable=yes,scrollbars=yes");
                                                                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                                                                    // -->
                                                                                        </script>


                                                                                        <a href="http://www.care2x.org" target=_new>CARE2X 3rd Generation pre-deployment 3.3</a> :: <a href="../../legal_gnu_gpl.htm" target=_new> License</a> :: <a href=mailto:care2x@makiungu.co.tz>Contact</a>  :: <a href="../../language/en/en_privacy.htm" target="pp"> Our Privacy Policy </a> ::
                                                                                        <a href="../../docs/show_legal.php?lang=$lang" target="lgl"> Legal </a> :: <a href="javascript:openCreditsWindow()"> Credits </a> ::.<br>
                                                                                    </div></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                            </BODY>
                                                        </HTML>';

        return TRUE;
    }

    function Display_Header($Title, $Title_Tag, $URL_APPEND) {

        global $URL_APPEND;

        echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
                                                                        <HTML>
                                                                            <HEAD>
                                                                                <TITLE>' . $Title . ' ' . $Title_Tag . '</TITLE>
                                                                                <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
                                                                                <meta name="author" content="ABEL HAULE" >
                                                                                <meta name="generator" content="Bluefish 2.0.2" >
                                                                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

                                                                                <script language="javascript" >
                                                                                                                                                                                                                                                                                                                                                                                                                                    <!--
                                                                                function gethelp(x, s, x1, x2, x3, x4)
                                                                                                                                                                                                                                                                                                                                                                                                                                    {
                                                                                                                                                                                                                                                                                                                                                                                                                                    if (!x) x = "";
                                                                                                                                                                                                                                                                                                                                                                                                                                            urlholder = "../../main/help-router.php' . URL_APPEND . '&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                                                                                                                                                                                                                                                                                                                                                                                                                                            helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                                                                                                                                                                                                                                                                                                                                                                                                                                            window.helpwin.moveTo(0, 0);
                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                            // -->
                                                                                </script>
                                                                                <script language="javascript" >
                                                                                                                                                                                                                                                                                                                                                                                                                            <!--
                                                                                function printOut()
                                                                                                                                                                                                                                                                                                                                                                                                                            {
                                                                                                                                                                                                                                                                                                                                                                                                                            urlholder = "<?php echo $root_path; ?>modules/registration_admission/show_prescription.php?externalcall=TRUE&printout=TRUE&pn=2005500002&sid=<?php echo $sid.; ?>&lang=<?php echo $lang; ?>";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                testprintout = window.open(urlholder, "printout", "width=800,height=600,menubar=no,resizable=yes,scrollbars=yes");
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        // -->
                                                                                </script>
                                                                                <link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
                                                                                <script language="javascript" src="../../js/hilitebu.js"></script>

                                                                                <style media="print">
                                                                                    .noPrint{ display: none; }
                                                                                    .yesPrint{ display: table !important;border:0px; }
                                                                                </style>

                                                                                <STYLE TYPE="text/css">

                                                                                    .table_content {
                                                                                        border: 1px solid #000000;
                                                                                    }

                                                                                    .tr_content {
                                                                                        border: 1px solid #000000;
                                                                                    }


                                                                                    .td_content {
                                                                                        font-family: Arial, Helvetica, sans-serif;
                                                                                        font-size: 12px;
                                                                                        font-style: normal;
                                                                                        font-weight: normal;
                                                                                        font-variant: normal;
                                                                                        border-top-width: 1px;
                                                                                        border-right-width: 1px;
                                                                                        border-bottom-width: 1px;
                                                                                        border-left-width: 1px;
                                                                                        border-top-style: solid;
                                                                                        border-right-style: dotted;
                                                                                        border-bottom-style: solid;
                                                                                        border-left-style: dotted;
                                                                                        border-top-color: #000000;
                                                                                        border-right-color: #000000;
                                                                                        border-bottom-color: #000000;
                                                                                        border-left-color: #000000;
                                                                                    }
                                                                                    p {
                                                                                        font-family: Arial, Helvetica, sans-serif;
                                                                                        font-size: 12px;
                                                                                        font-style: normal;
                                                                                        font-weight: normal;
                                                                                        font-variant: normal;
                                                                                    }

                                                                                    .headline {
                                                                                        background-color: #CC9933;
                                                                                        border-top-width: 1px;
                                                                                        border-right-width: 1px;
                                                                                        border-bottom-width: 1px;
                                                                                        border-left-width: 1px;
                                                                                        border-top-style: solid;
                                                                                        border-right-style: solid;
                                                                                        border-bottom-style: solid;
                                                                                        border-left-style: solid;
                                                                                    }
                                                                                    A:link  {color: #000066;}
                                                                                    A:hover {color: #cc0033;}
                                                                                    A:active {color: #cc0000;}
                                                                                    A:visited {color: #000066;}
                                                                                    A:visited:active {color: #cc0000;}
                                                                                    A:visited:hover {color: #cc0033;}
                                                                                    .lab {font-family: arial; font-size: 9; color:purple;}
                                                                                    .lmargin {margin-left: 5;}
                                                                                    .billing_topic {font-family: arial; font-size: 12; color:black;}

                                                                                </style>


                                                                                <script language="JavaScript" src="<?php echo $root_path; ?>js/cross.js"></script>
                                                                                <script language="JavaScript" src="<?php echo $root_path; ?>js/tooltips.js"></script>
                                                            <div id="BallonTip" style="POSITION:absolute; VISIBILITY:hidden; LEFT:-200px; Z-INDEX:100"></div>

                                                            </HEAD>';
        return TRUE;
    }

}
