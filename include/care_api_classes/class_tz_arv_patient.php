<?php

require_once($root_path . 'include/care_api_classes/class_person.php');
require_once('class_tz_arv_visit.php');

/**
 *  ARV methods for tanzania (the product-module is completely rewritten by Dorothea Reichert)
 *
 * Note this class should be instantiated only after a "$db" adodb  connector object  has been established by an adodb instance
 * @author Dorothea Reichert (Version 1.0.0) - dorothea.reichert@merotech.de
 * @copyright 2006 Robert Meggle (MEROTECH info@merotech.de)
 * @package care_api from Elpidio Latirilla
 */
/*
  Class Structure:

  Class Core
  |
  `---> Class Person
  |
  `--->Class ARV_patient
 */

class ART_patient extends Person {

    var $registrationData;
    var $insert_array;
    var $msg_tpl = "<table class=\"mainTable\"><tr><td class=\"error2\">%s</td></tr></table>";
    var $defaultData;
    var $registrationID;
    var $error_messages;
    var $errors;

    function ART_patient($pid, $registration_id) {

        $this->defaultData = array(
            'ctc_id' => '',
            'referred_from' => '',
            'referred_from_other' => '',
            'chairman_vname' => '',
            'chairman_nname' => '',
            'chairman_street' => '',
            'chairman_village' => '',
            'chairman_hamlet' => '',
            'ten_cell_leader' => '',
            'head_of_household' => '',
            'head_of_household_contact' => '',
            'transfer_in' => '',
            'transfer_in_other' => '',
            'exposure' => '',
            'tb_reg_no' => '',
            'hbc_number' => '',
            'date_first_hiv_test' => '',
            'date_confirmed_hiv' => '',
            'date_enrolled' => '',
            'date_eligible' => '',
            'eligible_reason' => '',
            'eligible_reason_who' => '',
            'eligible_reason_cd4' => '',
            'eligible_reason_tlc' => '',
            'date_ready' => '',
            'date_start_art' => '',
            'age_start_art' => '',
            'insert_allergies' => '',
            'supporter_vname' => '',
            'supporter_nname' => '',
            'supporter_street' => '',
            'supporter_village' => '',
            'supporter_telephone' => '',
            'joined_supporter_org' => '',
            'supporter_organisation' => '',
            'status_clinical_stage' => '',
            'status_function' => '',
            'status_weight' => '',
            'status_height' => '',
            'status_cd4' => '',
            'allergies' => '',
            'relative_ctc_id' => '',
            'relative_name' => '',
            'care_tz_arv_relatives_code_id' => '',
            'age' => '',
            'hiv_status' => '',
            'hiv_care_status' => '',
            'facility_file_no' => '',
            'file_no' => '',
            'signature' => $_SESSION['sess_login_username'],
        );

        if (empty($pid)) {
            $this->errors++;
            $this->error_messages['pid'] = sprintf($this->msg_tpl, "No patient selected!");
            return false;
        }
        $this->pid = $pid;
        if (isset($registration_id)) {
            $this->registrationID = $registration_id;
        }

        if ($this->is_arv_admitted()) {
            $this->registrationID = $this->getRegistrationIDFromPID();
        }
        return true;
    }

    function setRegistrationID($registrationID) {
        if (empty($registrationID)) {
            $this->errors++;
            return false;
        }
        $this->registrationID = $registrationID;
        return true;
    }

    function getDefaultData() {
        return $this->defaultData;
    }

    function getErrors() {
        return $this->errors;
    }

    function getErrorMessages() {
        return $this->error_messages;
    }

    function getFormData($vars) {
        $temp = $vars;
        foreach ($vars['allergies'] as $element) {
            $temp['allergies'].="<option>$element</option>";
        }
        return $temp;
    }

    function is_arv_admitted() {
        // check if a patient is already registered to the ARV programme
        global $db;

        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
        $sql = "SELECT * from care_person, care_tz_arv_registration
			  WHERE care_tz_arv_registration.pid=care_person.pid
			  AND care_person.pid=$this->pid";

        return ($rs = $db->Execute($sql) AND $rs->FetchRow()) ? true : false;
    }

    function getARTData() {
        global $db, $date_format;
        $this->debug = false;
        ($this->debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT
						care_tz_arv_registration_id, 
						care_tz_arv_lab_id, 
						care_tz_arv_functional_status_id, 
						care_tz_arv_exposure_id, 
						pid, 
						ctc_id, 
						ten_cell_leader, 
						head_of_household,
                                                head_of_household_contact,
                                                date_first_hiv_test, 
						date_confirmed_hiv, 
						date_eligible, 
						date_enrolled, 
						date_ready, 
						date_start_art,
                                                age_start_art,
						status_clinical_stage, 
						status_weight,
                                                status_height,
                                                tb_reg_no,
                                                hbc_number,
						create_id,
						modify_id
					FROM care_tz_arv_registration
					WHERE
						pid=" . $this->pid;

        if ($this->res = $db->Execute($this->sql) AND $registrationData = $this->res->FetchRow()) {
            $arv_data = $registrationData;
            $this->registrationID = $registrationData['care_tz_arv_registration_id'];
            $arv_data['exposure'] = $registrationData['care_tz_arv_exposure_id'];
            $arv_data['registration_id'] = $registrationData['care_tz_arv_registration_id'];
            $arv_data['status_function'] = $registrationData['care_tz_arv_functional_status_id'];
            $arv_data['signature'] = $registrationData['create_id'];
            if (!empty($registrationData['date_first_hiv_test'])) {
                $arv_data['date_first_hiv_test'] = formatDate2Local($registrationData['date_first_hiv_test'], $date_format);
            }
            if (!empty($registrationData['date_confirmed_hiv'])) {
                $arv_data['date_confirmed_hiv'] = formatDate2Local($registrationData['date_confirmed_hiv'], $date_format);
            }
            if (!empty($registrationData['date_eligible'])) {
                $arv_data['date_eligible'] = formatDate2Local($registrationData['date_eligible'], $date_format);
            }
            if (!empty($registrationData['date_enrolled'])) {
                $arv_data['date_enrolled'] = formatDate2Local($registrationData['date_enrolled'], $date_format);
            }
            if (!empty($registrationData['date_ready'])) {
                $arv_data['date_ready'] = formatDate2Local($registrationData['date_ready'], $date_format);
            }
            if (!empty($registrationData['date_start_art'])) {
                $arv_data['date_start_art'] = formatDate2Local($registrationData['date_start_art'], $date_format);
            }
            if (!empty($arv_data['modify_id'])) {
                $arv_data['signature'] = $arv_data['modify_id'];
            } else {
                $arv_data['signature'] = $arv_data['create_id'];
            };
        } else {
            return false;
        }

        //------------------------------------
        if (!empty($arv_data['status_function'])) {
            $this->sql = "SELECT
							code
						FROM care_tz_arv_functional_status
						WHERE
							care_tz_arv_functional_status_id=" . $arv_data['status_function'];

            if ($this->res = $db->Execute($this->sql)) {
                $exp_data = $this->res->FetchRow();
                $arv_data['status_function_text'] = $exp_data['code'];
            } else {
                return false;
            }
        }

        //------------------------------------
        if (!empty($arv_data['exposure'])) {
            $this->sql = "SELECT
							description
						FROM care_tz_arv_exposure
						WHERE
							care_tz_arv_exposure_id=" . $arv_data['exposure'];

            if ($this->res = $db->Execute($this->sql)) {
                $exp_data = $this->res->FetchRow();
                $arv_data['exposure_text'] = $exp_data['description'];
            } else {
                return false;
            }
        }
        //------------------------------------
        if (!empty($arv_data['care_tz_arv_lab_id'])) {
            $this->sql = "SELECT
							care_tz_arv_lab_id,
							nr,
							value
						FROM care_tz_arv_lab
						WHERE
							care_tz_arv_lab_id=" . $registrationData['care_tz_arv_lab_id'];

            if ($this->res = $db->Execute($this->sql)) {
                $lab_data = $this->res->FetchRow();
                $arv_data['status_cd4'] = $lab_data['value'];
                $arv_data['status_cd4_code'] = $lab_data['care_tz_arv_lab_id'];
            } else {
                return false;
            }
        }
        //------------------------------------
        $this->sql = "SELECT description
					FROM care_tz_arv_allergies
                    WHERE care_tz_arv_registration_id=" . $registrationData['care_tz_arv_registration_id'];

        if ($this->res = $db->Execute($this->sql)) {
            if ($this->res->RecordCount()) {
                while ($allergies = $this->res->FetchRow()) {
                    $arv_data['allergies'][] = $allergies[0];
                }
            }
        } else {
            return false;
        }
        //------------------------------------
        $this->sql = "SELECT care_tz_arv_referred_from_code_id,
						   other,
						   description
					FROM care_tz_arv_referred_from
					INNER JOIN care_tz_arv_referred_from_code USING(care_tz_arv_referred_from_code_id)
					WHERE care_tz_arv_registration_id=" . $registrationData['care_tz_arv_registration_id'];

        if ($this->res = $db->Execute($this->sql)) {
            $referred = $this->res->FetchRow();
            $arv_data['referred_from'] = $referred[0];
            $arv_data['referred_from_text'] = $referred['description'] . " " . $referred[1];
            $arv_data['referred_from_other'] = $referred[1];
        } else {
            return false;
        }
        //------------------------------------
        $this->sql = "SELECT care_tz_arv_transfer_in_code_id,
						   other,
						   description
					FROM care_tz_arv_transfer_in
					INNER JOIN care_tz_arv_transfer_in_code USING(care_tz_arv_transfer_in_code_id)
					WHERE care_tz_arv_registration_id=" . $registrationData['care_tz_arv_registration_id'];

        if ($this->res = $db->Execute($this->sql)) {
            $transfer = $this->res->FetchRow();
            $arv_data['transfer_in'] = $transfer[0];
            $arv_data['transfer_in_text'] = $transfer['description'] . " " . $transfer[1];
            $arv_data['transfer_in_other'] = $transfer[1];
        } else {
            return false;
        }
        //------------------------------------
        $this->sql = "SELECT care_tz_arv_eligible_reason_code_id,
                           care_tz_arv_lab_id,
						   description,
                           nr,
                           value,
						   msr_unit
					FROM care_tz_arv_eligible_reason
                    LEFT OUTER JOIN care_tz_arv_lab USING(care_tz_arv_lab_id)
					LEFT OUTER JOIN care_tz_laboratory_param USING (nr)
					INNER JOIN care_tz_arv_eligible_reason_code USING (care_tz_arv_eligible_reason_code_id)
					WHERE care_tz_arv_registration_id=" . $registrationData['care_tz_arv_registration_id'];

        if ($this->res = $db->Execute($this->sql)) {
            $eligible = $this->res->FetchRow();
            $arv_data['eligible_reason'] = $eligible[0];
            $arv_data['eligible_reason_text'] = $eligible['description'] . " " . $eligible['value'] . " " . $eligible['msr_unit'];
            if ($eligible['nr'] == 1) {
                $arv_data['eligible_reason_who'] = $eligible['value'];
            } else if ($eligible['nr'] == 86) {
                $arv_data['eligible_reason_cd4'] = $eligible['value'];
            } else if ($eligible['nr'] == 101) {
                $arv_data['eligible_reason_tlc'] = $eligible['value'];
            }
        } else {
            return false;
        }
        //------------------------------------
        $this->sql = "SELECT vname,nname
					FROM care_tz_arv_chairman
					WHERE care_tz_arv_registration_id=" . $registrationData['care_tz_arv_registration_id'];

        if ($this->res = $db->Execute($this->sql)) {
            $chairman = $this->res->FetchRow();
            $arv_data['chairman_vname'] = $chairman['vname'];
            $arv_data['chairman_nname'] = $chairman['nname'];
//            $arv_data['chairman_street'] = $chairman['street'];
//            $arv_data['chairman_village'] = $chairman['village'];
//            $arv_data['chairman_hamlet'] = $chairman['hamlet'];
        } else {
            return false;
        }
        //------------------------------------
        $this->sql = "SELECT vname,nname,street,village,telephone,joined_supporter_org,organisation
					FROM care_tz_arv_treatment_supporter
					WHERE care_tz_arv_registration_id=" . $registrationData['care_tz_arv_registration_id'];

        if ($this->res = $db->Execute($this->sql)) {
            $supporter = $this->res->FetchRow();
            $arv_data['supporter_vname'] = $supporter['vname'];
            $arv_data['supporter_nname'] = $supporter['nname'];
            $arv_data['supporter_street'] = $supporter['street'];
            $arv_data['supporter_village'] = $supporter['village'];
            $arv_data['supporter_telephone'] = $supporter['telephone'];
            $arv_data['joined_supporter_org'] = $supporter['joined_supporter_org'];
            $arv_data['supporter_organisation'] = $supporter['organisation'];
        } else {
            return false;
        }
        //--------------------------------------
        if (isset($_GET['file_no'])) {
            $file_no = $_GET['file_no'];
            $this->sql = "SELECT * FROM care_tz_arv_relatives
                          WHERE care_tz_arv_registration_id=" . $registrationData['care_tz_arv_registration_id'] . ' ' .
                    "AND facility_file_no=" . $file_no;
            if ($this->res = $db->Execute($this->sql)) {
                $relative = $this->res->FetchRow();
                $arv_data['relative_name'] = $relative['relative_name'];
                $arv_data['care_tz_arv_relatives_code_id'] = $relative['care_tz_arv_relatives_code_id'];
                $arv_data['age'] = $relative['age'];
                $arv_data['hiv_status'] = $relative['hiv_status'];
                $arv_data['hiv_care_status'] = $relative['hiv_care_status'];
                $arv_data['relative_ctc_id'] = $relative['relative_ctc_id'];
                $arv_data['facility_file_no'] = $relative['facility_file_no'];
            } else {
                return false;
            }
        }
        //--------------------------------------
        if ($this->debug == true) {
            echo "<pre>";
            print_r($arv_data);
            echo "</pre>";
        }
        return $arv_data;
    }

    function getRegistrationID() {
        return $this->registrationID;
    }

    function prepDataforDB($array) {
        global $date_format;
        $debug = false;
        $date = array('date_first_hiv_test', 'date_confirmed_hiv', 'date_confirmed_hiv', 'date_eligible', 'date_enrolled', 'date_ready', 'date_start_art');
        foreach ($this->defaultData as $x => $v) {
            if (!empty($array[$x])) {
                if (in_array($x, $date)) {
                    $returnArray[$x] = formatDate2STD($array[$x], $date_format);
                } else {
                    $returnArray[$x] = $array[$x];
                }
            } else {
                $returnArray[$x] = 'null';
            }
        }

        if ($debug) {
            echo "<pre>";
            echo "---InsertArray---";
            print_r($returnArray);
            echo "</pre>";
        }
        return $returnArray;
    }

    function insertARTPatient($data) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $value = $this->prepDataforDB($data);

        if ($value['status_cd4'] != 'null') {
            $insertarray['nr'] = '86';
            $insertarray['care_tz_arv_visit_2_id'] = 'null';
            $insertarray['value'] = $value['status_cd4'];

            $this->setTable("care_tz_arv_lab");
            if (!Core::insertDataFromArray($insertarray)) {
                return false;
            }

            $insertarray = null;
            $insertarray['care_tz_arv_lab_id'] = $db->Insert_ID();
        }

        $insertarray['care_tz_arv_functional_status_id'] = $value['status_function'];
        $insertarray['care_tz_arv_exposure_id'] = $value['exposure'];
        $insertarray['pid'] = $this->getValue('pid');
        $insertarray['ctc_id'] = trim(str_replace('-', '', $value['ctc_id']));
        $insertarray['ten_cell_leader'] = $value['ten_cell_leader'];
        $insertarray['head_of_household'] = $value['head_of_household'];
        $insertarray['head_of_household_contact'] = $value['head_of_household_contact'];
        $insertarray['date_first_hiv_test'] = $value['date_first_hiv_test'];
        $insertarray['date_confirmed_hiv'] = $value['date_confirmed_hiv'];
        $insertarray['date_eligible'] = $value['date_eligible'];
        $insertarray['date_enrolled'] = $value['date_enrolled'];
        $insertarray['date_ready'] = $value['date_ready'];
        $insertarray['date_start_art'] = $value['date_start_art'];
        $insertarray['age_start_art'] = $value['age_start_art'];
        $insertarray['status_clinical_stage'] = $value['status_clinical_stage'];
        $insertarray['status_weight'] = $value['status_weight'];
        $insertarray['tb_reg_no'] = $value['tb_reg_no'];
        $insertarray['hbc_number'] = $value['hbc_number'];
        $insertarray['create_id'] = $value['signature'];
        $insertarray['create_time'] = time();
        $insertarray['history'] = "Created " . date('Y-m-d H:i:s') . " " . $value['signature'] . ";\n";

        $this->setTable("care_tz_arv_registration");
        if (!Core::insertDataFromArray($insertarray)) {
            if ($db->ErrorNo() == 1062) {
                $this->errors++;
                $this->error_message['db'] = sprintf($this->msg_tpl, "A patient with this ID is already registered");
            } else {
                $this->errors++;
                $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
            }
            return false;
        }
        $insertarray = null;
        $this->registrationID = $db->Insert_ID();

        foreach ($value['allergies']as $name) {
            $insertarray['care_tz_arv_registration_id'] = $this->registrationID;
            $insertarray['description'] = $name;

            $this->coretable = "care_tz_arv_allergies";
            if (!Core::insertDataFromArray($insertarray)) {
                $this->errors++;
                $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                return false;
            }
            $insertarray = null;
        }

        if ($value['referred_from'] != 'null') {
            $insertarray['care_tz_arv_referred_from_code_id'] = $value['referred_from'];
            $insertarray['care_tz_arv_registration_id'] = $this->registrationID;
            $insertarray['other'] = $value['referred_from_other'];

            $this->coretable = "care_tz_arv_referred_from";
            if (!Core::insertDataFromArray($insertarray)) {
                $this->errors++;
                $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                return false;
            }
            $insertarray = null;
        }

        if ($value['transfer_in'] != 'null') {
            $insertarray['care_tz_arv_transfer_in_code_id'] = $value['transfer_in'];
            $insertarray['care_tz_arv_registration_id'] = $this->registrationID;
            $insertarray['other'] = $value['transfer_in_other'];

            $this->coretable = "care_tz_arv_transfer_in";
            if (!Core::insertDataFromArray($insertarray)) {
                $this->errors++;
                $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                return false;
            }
            $insertarray = null;
        }

        //--------------------------------------------------------------------------------
        if ($value['eligible_reason'] != 'null') {
            if ($value['eligible_reason_who'] != 'null') {
                $insertarray['nr'] = '1';
                $insertarray['care_tz_arv_visit_2_id'] = 'null';
                $insertarray['value'] = $value['eligible_reason_who'];

                $this->coretable = "care_tz_arv_lab";
                if (!Core::insertDataFromArray($insertarray)) {
                    $this->errors++;
                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                    return false;
                }
                $insertarray = null;
                $insertarray['care_tz_arv_lab_id'] = $db->Insert_ID();
                $insertarray['care_tz_arv_eligible_reason_code_id'] = $value['eligible_reason'];
                $insertarray['care_tz_arv_registration_id'] = $this->registrationID;
                $this->coretable = "care_tz_arv_eligible_reason";
                if (!Core::insertDataFromArray($insertarray)) {
                    $this->errors++;
                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                    return false;
                }
                $insertarray = null;
            } else if ($value['eligible_reason_cd4'] != 'null') {
                $insertarray['nr'] = '86';
                $insertarray['care_tz_arv_visit_2_id'] = 'null';
                $insertarray['value'] = $value['eligible_reason_cd4'];

                $this->coretable = "care_tz_arv_lab";
                if (!Core::insertDataFromArray($insertarray)) {
                    $this->errors++;
                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                    return false;
                }
                $insertarray = null;
                $insertarray['care_tz_arv_lab_id'] = $db->Insert_ID();
                $insertarray['care_tz_arv_eligible_reason_code_id'] = $value['eligible_reason'];
                $insertarray['care_tz_arv_registration_id'] = $this->registrationID;
                $this->coretable = "care_tz_arv_eligible_reason";
                if (!Core::insertDataFromArray($insertarray)) {
                    $this->errors++;
                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                    return false;
                }
                $insertarray = null;
            } else if ($value['eligible_reason_tlc'] != 'null') {
                $insertarray['nr'] = '101';
                $insertarray['care_tz_arv_visit_2_id'] = 'null';
                $insertarray['value'] = $value['eligible_reason_tlc'];

                $this->coretable = "care_tz_arv_lab";
                if (!Core::insertDataFromArray($insertarray)) {
                    $this->errors++;
                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                    return false;
                }
                $insertarray = null;
                $insertarray['care_tz_arv_lab_id'] = $db->Insert_ID();
                $insertarray['care_tz_arv_eligible_reason_code_id'] = $value['eligible_reason'];
                $insertarray['care_tz_arv_registration_id'] = $this->registrationID;
                $this->coretable = "care_tz_arv_eligible_reason";
                if (!Core::insertDataFromArray($insertarray)) {
                    $this->errors++;
                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                    return false;
                }
                $insertarray = null;
            } else {
                $insertarray['care_tz_arv_lab_id'] = 'null';
                $insertarray['care_tz_arv_eligible_reason_code_id'] = $value['eligible_reason'];
                $insertarray['care_tz_arv_registration_id'] = $this->registrationID;
                $this->coretable = "care_tz_arv_eligible_reason";
                if (!Core::insertDataFromArray($insertarray)) {
                    $this->errors++;
                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                    return false;
                }
                $insertarray = null;
            }
        }
        //----------------------------------------------------------------------------------------------

        $insertarray['care_tz_arv_registration_id'] = $this->registrationID;
        $insertarray['vname'] = $value['chairman_vname'];
        $insertarray['nname'] = $value['chairman_nname'];
//        $insertarray['street'] = $value['chairman_street'];
//        $insertarray['village'] = $value['chairman_village'];
//        $insertarray['hamlet'] = $value['chairman_hamlet'];
        $this->coretable = "care_tz_arv_chairman";
        if (!Core::insertDataFromArray($insertarray)) {
            return false;
        }
        $insertarray = null;

        $insertarray['care_tz_arv_registration_id'] = $this->registrationID;
        $insertarray['vname'] = $value['supporter_vname'];
//        $insertarray['nname'] = $value['supporter_nname'];
        $insertarray['street'] = $value['supporter_street'];
        $insertarray['telephone'] = $value['supporter_telephone'];
        $insertarray['joined_supporter_org'] = $value['joined_supporter_org'];
        $insertarray['organisation'] = $value['supporter_organisation'];
        $insertarray['village'] = $value['supporter_village'];
        $this->coretable = "care_tz_arv_treatment_supporter";
        if (!Core::insertDataFromArray($insertarray)) {
            return false;
        }
        $insertarray = null;
        return true;
//        }
    }

    function updateARTPatient($data) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $value = $this->prepDataforDB($data);

        if ($debug == true) {
            echo "<pre>";
        }

        //--------------------------------------------------------------------------
//        if ($value['status_cd4_code'] != 'null') {
//            $updatearray['value'] = $value['status_cd4'];
//
//            $this->setTable("care_tz_arv_lab");
//            $this->where = "care_tz_arv_lab_id=(SELECT care_tz_arv_lab_id FROM care_tz_arv_registration
//                                              WHERE care_tz_arv_registration_id=" . $this->registrationID . ")";
//
//            if (!Core::updateDataFromArray($updatearray, 100, false)) {
//                return false;
//            }
//            $updatearray['care_tz_arv_lab_id'] = $value['status_cd4_code'];
//            $updatearray = null;
//        } else if ($value['status_cd4'] != 'null') {
//            $insertarray['nr'] = '86';
//            $insertarray['care_tz_arv_visit_2_id'] = 'null';
//            $insertarray['value'] = $value['status_cd4'];
//
//            $this->setTable("care_tz_arv_lab");
//            if (!Core::insertDataFromArray($insertarray)) {
//                return false;
//            }
//            $updatearray['care_tz_arv_lab_id'] = $db->Insert_ID();
//        }
        //--------------------------------------------------------------------------
        $updatearray['care_tz_arv_functional_status_id'] = $value['status_function'];
        $updatearray['care_tz_arv_exposure_id'] = $value['exposure'];
        $updatearray['ctc_id'] = trim(str_replace('-', '', $value['ctc_id']));
        $updatearray['ten_cell_leader'] = $value['ten_cell_leader'];
        $updatearray['head_of_household'] = $value['head_of_household'];
        $updatearray['head_of_household_contact'] = $value['head_of_household_contact'];
//        $updatearray['date_first_hiv_test'] = $value['date_first_hiv_test'];
//        $updatearray['date_confirmed_hiv'] = $value['date_confirmed_hiv'];
//        $updatearray['date_eligible'] = $value['date_eligible'];
//        $updatearray['date_enrolled'] = $value['date_enrolled'];
//        $updatearray['date_ready'] = $value['date_ready'];
//        $updatearray['date_start_art'] = $value['date_start_art'];
//        $updatearray['age_start_art'] = $value['age_start_art'];
//        $updatearray['status_clinical_stage'] = $value['status_clinical_stage'];
//        $updatearray['status_weight'] = $value['status_weight'];
//        $updatearray['tb_reg_no'] = $value['tb_reg_no'];
//        $updatearray['hbc_number'] = $value['hbc_number'];
        $updatearray['modify_id'] = $value['signature'];
        $updatearray['modify_time'] = time();
        $updatearray['history'] = "concat(history,'Update " . date('Y-m-d H:i:s') . " " . $value['signature'] . ";\n')";

        $this->where = "care_tz_arv_registration_id=" . $this->registrationID;
        $this->setTable("care_tz_arv_registration");
        $this->where = "care_tz_arv_registration_id=" . $value['file_no'];
        if (!Core::updateDataFromArray($updatearray, 100, false)) {
            return false;
        }
        $updatearray = null;

        //--------------------------------------------
        if (!$this->Transact("Delete from care_tz_arv_allergies WHERE care_tz_arv_registration_id=" . $this->registrationID)) {
            return false;
        };
        foreach ($value['allergies']as $name) {
            $updatearray['care_tz_arv_registration_id'] = $this->registrationID;
            $updatearray['description'] = $name;

            $this->coretable = "care_tz_arv_allergies";
            if (!Core::insertDataFromArray($updatearray)) {
                $this->errors++;
                $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                return false;
            }
            $updatearray = null;
        }
        //--------------------------------------------------
//        if (!$this->Transact("Delete from care_tz_arv_referred_from WHERE care_tz_arv_registration_id=" . $this->registrationID)) {
//            return false;
//        };
//        if ($value['referred_from'] != 'null') {
//            $updatearray['care_tz_arv_referred_from_code_id'] = $value['referred_from'];
//            $updatearray['care_tz_arv_registration_id'] = $this->registrationID;
//            $updatearray['other'] = $value['referred_from_other'];
//
//            $this->coretable = "care_tz_arv_referred_from";
//            if (!Core::insertDataFromArray($updatearray, 100, false)) {
//                $this->errors++;
//                $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
//                return false;
//            }
//            $updatearray = null;
//        }
        //--------------------------------------------------
//        if (!$this->Transact("Delete from care_tz_arv_transfer_in WHERE care_tz_arv_registration_id=" . $this->registrationID)) {
//            return false;
//        };
//        if ($value['transfer_in'] != 'null') {
//            $updatearray['care_tz_arv_transfer_in_code_id'] = $value['transfer_in'];
//            $updatearray['care_tz_arv_registration_id'] = $this->registrationID;
//            $updatearray['other'] = $value['transfer_in_other'];
//
//            $this->coretable = "care_tz_arv_transfer_in";
//            if (!Core::insertDataFromArray($updatearray, 100, false)) {
//                $this->errors++;
//                $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
//                return false;
//            }
//            $updatearray = null;
//        }
//        //----------------------------------------------------
//        if (!$this->Transact("Delete FROM care_tz_arv_eligible_reason WHERE care_tz_arv_registration_id=" . $this->registrationID)) {
//            return false;
//        };
//        if ($value['eligible_reason'] != 'null') {
//            if ($value['eligible_reason_who'] != 'null') {
//                $updatearray['nr'] = '1';
//                $updatearray['care_tz_arv_visit_2_id'] = 'null';
//                $updatearray['value'] = $value['eligible_reason_who'];
//
//                $this->coretable = "care_tz_arv_lab";
//                if (!Core::insertDataFromArray($updatearray, 100, false)) {
//                    $this->errors++;
//                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
//                    return false;
//                }
//                $updatearray = null;
//                $updatearray['care_tz_arv_lab_id'] = $db->Insert_ID();
//                $updatearray['care_tz_arv_eligible_reason_code_id'] = $value['eligible_reason'];
//                $updatearray['care_tz_arv_registration_id'] = $this->registrationID;
//                $this->coretable = "care_tz_arv_eligible_reason";
//                if (!Core::insertDataFromArray($updatearray, 100, false)) {
//                    $this->errors++;
//                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
//                    return false;
//                }
//                $updatearray = null;
//            } else if ($value['eligible_reason_cd4'] != 'null') {
//                $updatearray['nr'] = '86';
//                $updatearray['care_tz_arv_visit_2_id'] = 'null';
//                $updatearray['value'] = $value['eligible_reason_cd4'];
//
//                $this->coretable = "care_tz_arv_lab";
//                if (!Core::insertDataFromArray($updatearray, 100, false)) {
//                    $this->errors++;
//                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
//                    return false;
//                }
//                $updatearray = null;
//                $updatearray['care_tz_arv_lab_id'] = $db->Insert_ID();
//                $updatearray['care_tz_arv_eligible_reason_code_id'] = $value['eligible_reason'];
//                $updatearray['care_tz_arv_registration_id'] = $this->registrationID;
//                $this->coretable = "care_tz_arv_eligible_reason";
//                if (!Core::insertDataFromArray($updatearray, 100, false)) {
//                    $this->errors++;
//                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
//                    return false;
//                }
//                $updatearray = null;
//            } else if ($value['eligible_reason_tlc'] != 'null') {
//                $updatearray['nr'] = '101';
//                $updatearray['care_tz_arv_visit_2_id'] = 'null';
//                $updatearray['value'] = $value['eligible_reason_tlc'];
//
//                $this->coretable = "care_tz_arv_lab";
//                if (!Core::insertDataFromArray($updatearray, 100, false)) {
//                    $this->errors++;
//                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
//                    return false;
//                }
//                $updatearray = null;
//                $updatearray['care_tz_arv_lab_id'] = $db->Insert_ID();
//                $updatearray['care_tz_arv_eligible_reason_code_id'] = $value['eligible_reason'];
//                $updatearray['care_tz_arv_registration_id'] = $this->registrationID;
//                $this->coretable = "care_tz_arv_eligible_reason";
//                if (!Core::insertDataFromArray($updatearray, 100, false)) {
//                    $this->errors++;
//                    $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
//                    return false;
//                }
//                $updatearray = null;
//            }
//        }
        //-------------------------------------------------------------------------------

        $updatearray['vname'] = $value['chairman_vname'];
        $updatearray['nname'] = $value['chairman_nname'];
        $updatearray['street'] = $value['chairman_street'];
        $updatearray['village'] = $value['chairman_village'];
        $updatearray['hamlet'] = $value['chairman_hamlet'];
        $this->coretable = "care_tz_arv_chairman";
        $this->where = "care_tz_arv_registration_id=" . $this->registrationID;
        if (!Core::updateDataFromArray($updatearray, 100, false)) {
            return false;
        }
        $updatearray = null;

        $updatearray['vname'] = $value['supporter_vname'];
        $updatearray['nname'] = $value['supporter_nname'];
        $updatearray['street'] = $value['supporter_street'];
        $updatearray['village'] = $value['supporter_village'];
        $updatearray['telephone'] = $value['supporter_telephone'];
        $updatearray['joined_supporter_org'] = $value['joined_supporter_org'];
        $updatearray['organisation'] = $value['supporter_organisation'];
        $this->coretable = "care_tz_arv_treatment_supporter";
        $this->where = "care_tz_arv_registration_id=" . $this->registrationID;
        if (!Core::updateDataFromArray($updatearray, 100, false)) {
            return false;
        }
        $updatearray = null;
        if ($debug == true)
            echo "</pre>";
        return true;
    }

    function insertARTPatientFamilyInfo($data) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $value = $this->prepDataforDB($data);

        if ($debug == true) {
            echo "<pre>";
        }

        $insertarray['relative_ctc_id'] = trim(str_replace('-', '', $value['relative_ctc_id']));
        $insertarray['relative_name'] = $value['relative_name'];
        $insertarray['care_tz_arv_relatives_code_id'] = $value['care_tz_arv_relatives_code_id'];
        $insertarray['age'] = $value['age'];
        $insertarray['hiv_status'] = $value['hiv_status'];
        $insertarray['hiv_care_status'] = $value['hiv_care_status'];
        $insertarray['facility_file_no'] = $value['facility_file_no'];
        $insertarray['care_tz_arv_registration_id'] = $this->registrationID;
        $insertarray['history'] = "Created " . date('Y-m-d H:i:s') . " " . $value['signature'] . ";\n";

        $this->setTable("care_tz_arv_relatives");
        if (!Core::insertDataFromArray($insertarray)) {
            if ($db->ErrorNo() == 1062) {
                $this->errors++;
                $this->error_message['db'] = sprintf($this->msg_tpl, "A relative with this ID is already registered");
            } else {
                $this->errors++;
                $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
            }
            return false;
        }
        $insertarray = null;
        return true;
    }

    function updateARTPatientFamilyInfo($data) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $value = $this->prepDataforDB($data);

        if ($debug == true) {
            echo "<pre>";
        }

        $updatearray['relative_ctc_id'] = trim(str_replace('-', '', $value['relative_ctc_id']));
        $updatearray['relative_name'] = $value['relative_name'];
        $updatearray['care_tz_arv_relatives_code_id'] = $value['care_tz_arv_relatives_code_id'];
        $updatearray['age'] = $value['age'];
        $updatearray['hiv_status'] = $value['hiv_status'];
        $updatearray['hiv_care_status'] = $value['hiv_care_status'];
        $updatearray['facility_file_no'] = $value['facility_file_no'];
        $updatearray['history'] = "concat(history,'Update " . date('Y-m-d H:i:s') . " " . $value['signature'] . ";\n')";

        $this->where = "care_tz_arv_registration_id=" . $this->registrationID;
        $this->setTable("care_tz_arv_relatives");
        $this->where = "facility_file_no=" . $value['file_no'];
        if (!Core::updateDataFromArray($updatearray, 100, false)) {
            return false;
        }
        $updatearray = null;
        if ($debug == true)
            echo "</pre>";
        return true;
    }

    function getFacilityInfo() {
        //reads the information out of the DB that are entered inside the ARV Administration
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT TYPE , value
					FROM care_config_global
					WHERE TYPE = 'main_info_facility_name'
					OR TYPE = 'main_info_facility_code'
					OR TYPE = 'main_info_facility_district'
					";

        if ($this->res = $db->Execute($this->sql) AND $this->res->RecordCount()) {
            while ($this->row_elem = $this->res->FetchRow()) {
                $temp = $this->row_elem[0];
                $arv_facility_data[$temp] = $this->row_elem[1];
                ;
            }
            return $arv_facility_data;
        } else {
            $this->errors++;
            $this->error_message['facility_info'] = sprintf($this->msg_tpl, "There is no information given about the ART facility!
            Please go to System Admin --> ARV Admin --> Facility Information");
            return false;
        }
    }

    function getRegistrationData() {
        $registrationData['facility_file_number'] = $this->getValue('selian_pid');
        $registrationData['pid'] = $this->getValue('pid');
        $registrationData['sex'] = $this->getValue('sex');
        $registrationData['name'] = $this->getValue('name_first') . " " . $this->getValue('name_last');
        $registrationData['marital_status'] = $this->getValue('civil_status');
        $registrationData['date_of_birth'] = $this->getValue('date_birth');
        $registrationData['age'] = $this->alter($this->getValue('date_birth'));

        $registrationData['region'] = $this->get_region($this->getValue('region'));
        $registrationData['district'] = $this->get_district($this->getValue('district'));
        $registrationData['division'] = $this->get_division($this->getValue('division')); //This value should be added to registration
        $registrationData['ward'] = $this->get_ward($this->getValue('ward'));
        $registrationData['street'] = $this->getValue('addr_str');
        $registrationData['village'] = $this->getValue('citizenship');
        $registrationData['telephone'] = $this->getTelephoneCombined();
        return $registrationData;
    }

    function get_region($reg_id) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT region_name
                        FROM care_tz_region
					WHERE region_id = $reg_id";

        if ($this->res = $db->Execute($this->sql) AND $data = $this->res->FetchRow()) {
            return $data[0];
        } else {
            return false;
        }
    }

    function get_district($distr_id) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT district_name
                        FROM care_tz_district
					WHERE district_code = $distr_id";

        if ($this->res = $db->Execute($this->sql) AND $data = $this->res->FetchRow()) {
            return $data[0];
        } else {
            return false;
        }
    }

    function get_division($div_id) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT division_name
                        FROM care_tz_division
					WHERE division_code = $div_id";

        if ($this->res = $db->Execute($this->sql) AND $data = $this->res->FetchRow()) {
            return $data[0];
        } else {
            return false;
        }
    }

    function get_ward($ward_code) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT ward_name
                        FROM care_tz_ward
					WHERE ward_id = $ward_code";

        if ($this->res = $db->Execute($this->sql) AND $data = $this->res->FetchRow()) {
            return $data[0];
        } else {
            return false;
        }
    }

    function getshortARTSummary() {
        $artSummary['facility_file_number'] = $this->getValue('selian_pid');
        $artSummary['pid'] = $this->getValue('pid');
        $artSummary['name'] = $this->getValue('name_first') . " " . $this->getValue('name_last');
        $artSummary['sex'] = $this->getValue('sex');
        $artSummary['date_of_birth'] = $this->getValue('date_birth');
        $artSummary['ctc_id'] = $this->get_ctc_id_from_pid();
        return $artSummary;
    }

    function get_ctc_id_from_pid() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT ctc_id
					FROM care_tz_arv_registration
					WHERE pid=" . $this->pid;

        if ($this->res = $db->Execute($this->sql) AND $data = $this->res->FetchRow()) {
            return $data[0];
        } else
            return null;
    }

    function alter($date) {
        $temp = explode('-', $date);
        $gebd = $temp[2];
        $gebm = $temp[1];
        $geby = $temp[0];

        if (date('m', time()) < $gebm) {
            $x = 1;
        } else if (date('m', time()) == $gebm AND date('d', time()) < $gebd) {
            $x = 1;
        }
        return date('Y', time()) - $geby - $x;
    }

    function getTelephoneCombined() {
        ($this->getValue('phone_1_nr')) ? $tel.=$this->getValue('phone_1_nr') . "; " : $tel = "";
        ($this->getValue('phone_2_nr')) ? $tel.=$this->getValue('phone_2_nr') . "; " : $tel.="";
        ($this->getValue('cellphone_1_nr')) ? $tel.=$this->getValue('cellphone_1_nr') . "; " : $tel.="";
        ($this->getValue('cellphone_2_nr')) ? $tel.=$this->getValue('cellphone_2_nr') . "" : $tel.="";

        return $tel;
    }

    function getAllARTVisits($encounter_nr) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT
						care_tz_arv_visit_2_id as visit_id
					FROM care_tz_arv_visit_2
					WHERE care_tz_arv_registration_id=$this->registrationID";

        if ($this->res = $db->Execute($this->sql)) {
            return $this->res;
        } else {
            return false;
        }
    }

    function displayAllARTVisits() {
        global $db, $root_path, $date_format;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $fields = array('pregnant', 'cotrim', 'diflucan', 'nutrition_support');
        $code = array('1' => 'yes', '2' => 'no');

        $this->getARTData();
        if (!$this->res = $this->getAllARTVisits())
            return false;

        if (!($this->res->RecordCount())) {
            $this->error_message['db'] = "There are no visits for this patients yet!";
            $this->errors++;
            return false;
        }
        $i = 0;
        while ($this->row_elem = $this->res->FetchRow()) {
            $artVisit = new ARV_Visit(null, $this->row_elem['visit_id']);
            $visit_data[$i] = $artVisit->getVisitTableData();

            foreach ($visit_data[$i] as $index => $value) {
                if (is_array($value)) {
                    foreach ($value as $element) {
                        $temp = explode("|", $element, 3);
                        $visit_data[$i][$index].=$temp[2] . ", ";
                    }
                } else {
                    if (strpos($value, "|")) {
                        $temp = explode("|", $value, 3);
                        $visit_data[$i][$index] = $temp[2];
                    } else {
                        $visit_data[$i][$index] = $value;
                    }
                }
            }

            if (!empty($visit_data[$i]['height'])) {
                $visit_data[$i]['weight_height'] = $visit_data[$i]['weight'] . "\\" . $visit_data[$i]['height'];
            } else {
                $visit_data[$i]['weight_height'] = $visit_data[$i]['weight'];
            }

            if (!empty($visit_data[$i]['adher_reas_code'])) {
                $visit_data[$i]['adher_combined'] = $visit_data[$i]['adher_code'] . "\\" . $visit_data[$i]['adher_reas_code'];
            } else {
                $visit_data[$i]['adher_combined'] = $visit_data[$i]['adher_code'];
            }

            foreach ($fields as $var) {
                $visit_data[$i][$var] = $code[$visit_data[$i][$var]];
            }

            if (!empty($visit_data[$i]['date_of_delivery'])) {
                $visit_data[$i]['pregnancy'] = $visit_data[$i]['pregnant'] . ", " . $visit_data[$i]['date_of_delivery'];
            } else {
                $visit_data[$i]['pregnancy'] = $visit_data[$i]['pregnant'];
            }

            if (!empty($visit_data[$i]['regimen_days'])) {
                $visit_data[$i]['regimen_combined'] = $visit_data[$i]['regimen_code'] . "\\" . $visit_data[$i]['regimen_days'];
            } else {
                $visit_data[$i]['regimen_combined'] = $visit_data[$i]['regimen_code'];
            }

            $i++;
        }

        return $visit_data;
    }

    function insertComment($data, $group_id) {
        global $db, $date_format;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $date_comment = formatDate2STD($data['comment_date'], $date_format);
        $this->sql = "INSERT INTO care_tz_arv_education SET 
                        care_tz_arv_registration_id=" . $this->registrationID . ",
                    	care_tz_arv_education_topic_id=" . $data['comment_id'] . ",
                    	comment_date='$date_comment',
						care_tz_arv_education_group_id=$group_id,
						comment='" . $data['comment'] . "',
						create_id='" . $data['signature'] . "',
						modify_id=null,
						modify_time=" . time() . ",
				        history='Created " . date('Y-m-d H:i:s') . " " . $data['signature'] . ";\n'";

        if (!$this->Transact($this->sql)) {
            $this->errors++;
            $this->error_message['db'] = "Insert failed";
            return false;
        }
    }

    function loadAllComments($group_id) {
        global $db, $date_format;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        if (isset($group_id)) {
            $where_and = "AND care_tz_arv_education_group_id=$group_id";
        }
        $this->sql = "SELECT care_tz_arv_education_topic_id as comment_id, 
						   comment_date, 
                           comment, 
                           care_tz_arv_education_id as text_id
					FROM care_tz_arv_education
					WHERE care_tz_arv_registration_id=" . $this->registrationID . " 
                    $where_and
					ORDER BY care_tz_arv_education_topic_id ASC, comment_date DESC";

        $group[1] = "education";
        $group[2] = "progression";
        $group[3] = "preparation";
        $group[4] = "support";

        if ($this->res = $db->Execute($this->sql)) {
            if ($this->res->RecordCount()) {
                while ($this->row_elem = $this->res->FetchRow()) {
                    if (isset($group_id)) {
                        $commentData[$this->row_elem['comment_id']][] = "<strong>" . formatDate2Local($this->row_elem['comment_date'], $date_format) . "</strong>\n" . $this->row_elem['comment'] .
                                "<br><a href=\"arv_" . $group[$group_id] . ".php?del_id=" . $this->row_elem['text_id'] . "&pid=" . $_REQUEST['pid'] . "&encounter_nr=" . $_REQUEST['encounter_nr'] . "\" />del</a>";
                    } else {
                        $commentData[$this->row_elem['comment_id']][] = formatDate2Local($this->row_elem['comment_date'], $date_format) . "\n" . $this->row_elem['comment'];
                    }
                }
            }
        } else {
            $this->errors++;
            $this->errorMessages['db'] = "Problems with loading comments from DB";
            return false;
        }

        return $commentData;
    }

    function deleteComment($id) {
        global $db, $date_format;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "DELETE FROM care_tz_arv_education WHERE care_tz_arv_education_id=$id";

        if (!$this->Transact($this->sql)) {
            return false;
        }
        return true;
    }

    function getRegistrationIDFromPID() {
        global $db, $date_format;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT care_tz_arv_registration_id
					FROM care_tz_arv_registration
					WHERE pid=" . $this->pid;

        if ($this->res = $db->Execute($this->sql) AND $data = $this->res->FetchRow()) {
            return $data[0];
        } else
            return null;
    }

    function get_referred_from() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tz_arv_referred_from_code";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
//                array_push($result, $this->row_elem);
                $result[$this->row_elem['care_tz_arv_referred_from_code_id']] = $this->row_elem['description'];
            }
        }
        return $result;
    }

    function get_transfer_in() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tz_arv_transfer_in_code";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
//                array_push($result, $this->row_elem);
                $result[$this->row_elem['care_tz_arv_transfer_in_code_id']] = $this->row_elem['description'];
            }
        }
        return $result;
    }

    function get_prior_exposure() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tz_arv_exposure";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
//                array_push($result, $this->row_elem);
                $result[$this->row_elem['care_tz_arv_exposure_id']] = $this->row_elem['description'];
            }
        }
        return $result;
    }

    function get_status_function() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tz_arv_functional_status";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
                $result[$this->row_elem['care_tz_arv_functional_status_id']] = $this->row_elem['description'];
            }
        }
        return $result;
    }

    function get_relation_list() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tz_arv_relatives_code";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
                $result[$this->row_elem['care_tz_arv_relatives_code_id']] = $this->row_elem['description'];
            }
        }
        return $result;
    }

    function patient_relatives_list($registration_id) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
        $table = '';
        $this->sql = "SELECT *
                      FROM care_tz_arv_relatives
                      WHERE care_tz_arv_registration_id = '$registration_id'";
        if ($this->res = $db->Execute($this->sql) AND $this->res->RecordCount()) {
            $table.='<tr>';
            $table.='<td bgcolor="#F0F8FF" align="center"><strong>File Reference</strong></td>';
            $table.='<td bgcolor="#F0F8FF" align="center"><strong>Name</strong></td>';
            $table.='<td bgcolor="#F0F8FF" align="center"><strong>Age</strong></td>';
            $table.='<td bgcolor="#F0F8FF" align="center"><strong>HIV Status</strong></td>';
            $table.='<td bgcolor="#F0F8FF" align="center"><strong>HIV Care Status</strong></td>';
            $table.='<td bgcolor="#F0F8FF" align="center"><strong>Action</strong></td>';
            $table.='</tr>';
            while ($this->row_elem = $this->res->FetchRow()) {
                $table.='<tr>';
                $table.="<td bgcolor=\"#F0F8FF\" align=\"center\">" . $this->row_elem['facility_file_no'] . "</td>";
                $table.="<td bgcolor=\"#F0F8FF\" align=\"center\">" . $this->row_elem['relative_name'] . "</td>";
                $table.="<td bgcolor=\"#F0F8FF\" align=\"center\">" . $this->row_elem['age'] . "</td>";
                $table.="<td bgcolor=\"#F0F8FF\" align=\"center\">" . $this->row_elem['hiv_status'] . "</td>";
                $table.="<td bgcolor=\"#F0F8FF\" align=\"center\">" . $this->row_elem['hiv_care_status'] . "</td>";
                $table.="<td bgcolor=\"#F0F8FF\" align=\"center\">";
                $table.='<a href="' . $root_path . 'arv_family_info_new.php' .
                        URL_APPEND . '&encounter_nr=' . $_GET['encounter_nr'] . '&pid=' . $_GET['pid'] . '&file_no=' . $this->row_elem['facility_file_no'] . '&mode=edit" target="_parent"' .
                        '"><img src="../../gui/img/control/blue_aqua/en/en_edit_sm.gif" border=0 width="76" height="16" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>';
                $table.='&nbsp&nbsp';
                $table.='<a href="' . $root_path . 'arv_delete_relative.php' .
                        URL_APPEND . '&encounter_nr=' . $_GET['encounter_nr'] . '&pid=' . $_GET['pid'] . '&arv_reg_id=' . $this->row_elem['care_tz_arv_registration_id'] . '&file_no=' . $this->row_elem['facility_file_no'] . '&mode=new" target="_parent"' .
                        '"><img src="../../gui/img/common/default/delete.gif" border=0 width="19" height="19" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>';
                $table.="</td>";
                $table.='</tr>';
//                $res.= $this->row_elem['relative_name'];
            }
        } else {
            $table.="<table class=\"mainTable\"><tr><td bgcolor=\"#F0F8FF\" class=\"error2\">No Patient Relative Registered!</td></tr></table>";
        }
        return $table;
    }

    function delete_patient_relative($reg_id, $file_no) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "DELETE FROM care_tz_arv_relatives WHERE care_tz_arv_registration_id=$reg_id
                       AND facility_file_no = $file_no";
        if (!$this->Transact($this->sql)) {
            return false;
        }
        return true;
    }

    function form_dropdown($name = '', $options = array(), $selected = array(), $extra = '') {
        if (!is_array($selected)) {
            $selected = array($selected);
        }

        // If no selected state was submitted we will attempt to set it automatically
        if (count($selected) === 0) {
            // If the form name appears in the $_POST array we have a winner!
            if (isset($_POST[$name])) {
                $selected = array($_POST[$name]);
            }
        }

        if ($extra != '')
            $extra = ' ' . $extra;

        $multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

        $form = '<select name="' . $name . '"' . $extra . $multiple . ">\n";

        foreach ($options as $key => $val) {
            $key = (string) $key;

            if (is_array($val) && !empty($val)) {
                $form .= '<optgroup label="' . $key . '">' . "\n";

                foreach ($val as $optgroup_key => $optgroup_val) {
                    $sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

                    $form .= '<option value="' . $optgroup_key . '"' . $sel . '>' . (string) $optgroup_val . "</option>\n";
                }

                $form .= '</optgroup>' . "\n";
            } else {
                $sel = (in_array($key, $selected)) ? ' selected="selected"' : '';

                $form .= '<option value="' . $key . '"' . $sel . '>' . (string) $val . "</option>\n";
            }
        }

        $form .= '</select>';

        return $form;
    }

    function format_ctc_no($ctc_no) {
        $replace = '/^\(?([0-9]{2})\)?[-. ]?([0-9]{2})[-. ]?([0-9]{4})[-. ]?([0-9]{6})$/';
        $return = '$1-$2-$3-$4';
        return preg_replace($replace, $return, $ctc_no);
    }

    function get_facility_other($ctc_no) {
        $ctc_no = $this->format_ctc_no($ctc_no);
        $arr_ctc = explode('-', $ctc_no);
        $facility_no = $arr_ctc[2];
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tz_arv_facilities
                      WHERE care_tz_arv_facility_id = $facility_no";
        $result = '';
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
                $result = $this->row_elem['facility_name'];
            }
        }
        echo $result;
    }

}

?>
