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

class TB_patient extends Person {

    var $registrationData;
    var $insert_array;
    var $msg_tpl = "<table class=\"mainTable\"><tr><td class=\"error2\">%s</td></tr></table>";
    var $defaultData;
    var $district_regno;
    var $error_messages;
    var $errors;

    function TB_patient($pid, $district_regno) {

        $this->defaultData = array(
            'district_regno' => '',
            'placeofwork_id' => '',
            'placeofwork_other' => '',
            'area_leader' => '',
            'contact_telephone' => '',
            'nationalid' => '',
            'referrer_id' => '',
            'referrer_other' => '',
            'dotoption_id' => '',
            'treatment_supporter_name' => '',
            'treatment_supporter_address' => '',
            'treatment_supporter_phone' => '',
            'classification_bysiteid' => '',
            'eptb_site' => '',
            'classification_byhistoryid' => '',
            'classification_byhistory_other' => '',
            'hiv_status' => '',
            'hiv_regno' => '',
            'on_cpt' => '',
            'date_start_cpt' => '',
            'on_art' => '',
            'date_start_art' => '',
            'allergies' => '',
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
        if (isset($district_regno)) {
            $this->district_regno = $district_regno;
        }

        if ($this->is_tb_admitted()) {
//            $this->district_regno = $this->getRegistrationIDFromPID();
        }
        return true;
    }

    function setRegistrationID($district_regno) {
        if (empty($district_regno)) {
            $this->errors++;
            return false;
        }
        $this->district_regno = $district_regno;
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
            $temp['allergies'] .= "<option>$element</option>";
        }
        return $temp;
    }

    function is_tb_admitted() {
        // check if a patient is already registered to the TB Care programme
        global $db;

        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
        $sql = "SELECT * from care_tb_patient
		WHERE care_tb_patient.pid=$this->pid";

        return ($rs = $db->Execute($sql) AND $rs->FetchRow()) ? true : false;
    }

    /*
     * this function checks if a patient is registered to
     * MDR-TB programme at the facility
     */

    function is_drtb_admitted() {
        // check if a patient is already registered to the TB Care programme
        global $db;

        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
        $sql = "SELECT * from care_tb_dr_patient
		WHERE care_tb_dr_patient.pid=$this->pid";

        return ($rs = $db->Execute($sql) AND $rs->FetchRow()) ? true : false;
    }

    function getTBData() {
        global $db, $date_format;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT pid, 
						district_regno, 
						placeofwork_id, 
						placeofwork_other, 
						area_leader, 
						contact_telephone, 
						nationalid, 
						referrer_id,
                                                referrer_other,
                                                dotoption_id, 
						classification_bysiteid, 
						eptb_site, 
						classification_byhistoryid, 
						classification_byhistory_other, 
						hiv_status,
                                                hiv_regno,
						on_cpt, 
						date_start_cpt,
                                                on_art,
                                                date_start_art,
                                                modify_id,
                                                create_id,
						history
					FROM care_tb_patient
					WHERE
						pid=" . $this->pid;

        if ($this->res = $db->Execute($this->sql) AND $registrationData = $this->res->FetchRow()) {
            $tb_data = $registrationData;
            $this->district_regno = $registrationData['district_regno'];
            $tb_data['signature'] = $_SESSION['sess_login_username'];
        } else {
            return false;
        }

        //------------------------------------
        $this->sql = "SELECT allergy_description
					FROM care_tb_allergies
                    WHERE district_regno='" . $this->district_regno . "'";

        if ($this->res = $db->Execute($this->sql)) {
            if ($this->res->RecordCount()) {
                while ($allergies = $this->res->FetchRow()) {
                    $tb_data['allergies'][] = $allergies[0];
                }
            }
        } else {
            return false;
        }
        //------------------------------------
        $this->sql = "SELECT treatment_supporterid,treatment_supporter_name, treatment_supporter_address,
                                treatment_supporter_phone,
                                is_current, modify_id, history
					FROM care_tb_treatment_supporter
					WHERE pid=" . $registrationData['pid'];

        if ($this->res = $db->Execute($this->sql)) {
            $supporter = $this->res->FetchRow();
            $tb_data['treatment_supporterid'] = $supporter['treatment_supporterid'];
            $tb_data['treatment_supporter_name'] = $supporter['treatment_supporter_name'];
            $tb_data['treatment_supporter_address'] = $supporter['treatment_supporter_address'];
            $tb_data['treatment_supporter_phone'] = $supporter['treatment_supporter_phone'];
            $tb_data['is_current'] = $supporter['is_current'];
            $tb_data['modify_id'] = $supporter['modify_id'];
            $tb_data['history'] = $supporter['history'];
        } else {
            return false;
        }
        //------------------------------------
        if ($this->debug == true) {
            echo "<pre>";
            print_r($tb_data);
            echo "</pre>";
        }
        return $tb_data;
    }

    function getTBPatient() {
        global $db, $date_format;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT care_person.pid, 
						district_regno, 
                                                care_tb_patient.create_date as tb_date_registration,
                                                selian_pid,
                                                name_first,
                                                name_middle,
                                                name_last
					FROM care_tb_patient,care_person
					WHERE care_tb_patient.pid = care_person.pid ";

        if ($this->res = $db->Execute($this->sql)) {
            return $this->res;
        } else {
            return false;
        }
    }
        function getDRTBPatient() {
        global $db, $date_format;
        $this->debug = FALSE;
        ($this->debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT care_person.pid, 
						district_regno, 
                                                care_tb_dr_patient.create_date as tb_date_registration,
                                                selian_pid,
                                                name_first,
                                                name_middle,
                                                name_last
					FROM care_tb_dr_patient,care_person
					WHERE care_tb_dr_patient.pid = care_person.pid ";

        if ($this->res = $db->Execute($this->sql)) {
            return $this->res;
        } else {
            return false;
        }
    }

    function getRegistrationID() {
        return $this->district_regno;
    }

    function prepDataforDB($array) {
        global $date_format;
        $debug = false;
        $date = array('date_first_hiv_test', 'date_confirmed_hiv', 'date_confirmed_hiv', 'date_eligible', 'date_enrolled', 'date_start_cpt', 'date_start_art');
        foreach ($this->defaultData as $x => $v) {
            if (!empty($array[$x])) {
//                if (in_array($x, $date)) {
//                    $returnArray[$x] = formatDate2STD($array[$x], $date_format);
//                } else {
                $returnArray[$x] = $array[$x];
//                }
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

    function insertTBPatient($data) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $value = $this->prepDataforDB($data);

        $insertarray['district_regno'] = $value['district_regno'];
        $insertarray['placeofwork_id'] = $value['placeofwork_id'];
        $insertarray['pid'] = $this->getValue('pid');
//        $insertarray['ctc_id'] = trim(str_replace('-', '', $value['ctc_id']));
        $insertarray['placeofwork_other'] = $value['placeofwork_other'];
        $insertarray['area_leader'] = $value['area_leader'];
        $insertarray['contact_telephone'] = $value['contact_telephone'];
        $insertarray['nationalid'] = $value['nationalid'];
        $insertarray['referrer_id'] = $value['referrer_id'];
        $insertarray['referrer_other'] = $value['referrer_other'];
        $insertarray['dotoption_id'] = $value['dotoption_id'];

        $insertarray['classification_bysiteid'] = $value['classification_bysiteid'];
        $insertarray['eptb_site'] = $value['eptb_site'];
        $insertarray['classification_byhistoryid'] = $value['classification_byhistoryid'];
        $insertarray['classification_byhistory_other'] = $value['classification_byhistory_other'];
        $insertarray['hiv_status'] = $value['hiv_status'];
        $insertarray['hiv_regno'] = $value['hiv_regno'];
        $insertarray['on_cpt'] = $value['on_cpt'];
        $insertarray['date_start_cpt'] = $value['date_start_cpt'];
        $insertarray['on_art'] = $value['on_art'];
        $insertarray['date_start_art'] = $value['date_start_art'];

        $insertarray['create_id'] = $value['signature'];
        $insertarray['history'] = "Created " . date('Y-m-d H:i:s') . ": " . $value['signature'] . ";\n";

        $this->setTable("care_tb_patient");
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
        $this->district_regno = $value['district_regno'];
        $insertarray = null;
//        $this->district_regno = $db->Insert_ID();

        foreach ($value['allergies'] as $name) {
            $insertarray['district_regno'] = $this->district_regno;
            $insertarray['allergy_description'] = $name;

            $this->coretable = "care_tb_allergies";
            if (!Core::insertDataFromArray($insertarray)) {
                $this->errors++;
                $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                return false;
            }
            $insertarray = null;
        }

        $insertarray['pid'] = $this->getValue('pid');
//        $insertarray['district_regno'] = $this->district_regno;
        $insertarray['treatment_supporter_name'] = $value['treatment_supporter_name'];
        $insertarray['treatment_supporter_address'] = $value['treatment_supporter_address'];
        $insertarray['treatment_supporter_phone'] = $value['treatment_supporter_phone'];

        $insertarray['create_id'] = $value['signature'];
        $insertarray['history'] = "Created " . date('Y-m-d H:i:s') . ": " . $value['signature'] . ";\n";
        $this->coretable = "care_tb_treatment_supporter";
        if (!Core::insertDataFromArray($insertarray)) {
            return false;
        }
        $insertarray = null;
        return true;
//        }
    }

    function updateTBPatient($data) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $value = $this->prepDataforDB($data);

        if ($debug == true) {
            echo "<pre>";
        }

        $updatearray['district_regno'] = $value['district_regno'];
        $updatearray['placeofwork_id'] = $value['placeofwork_id'];
        $updatearray['pid'] = $this->getValue('pid');
//        $updatearray['ctc_id'] = trim(str_replace('-', '', $value['ctc_id']));
        $updatearray['placeofwork_other'] = $value['placeofwork_other'];
        $updatearray['area_leader'] = $value['area_leader'];
        $updatearray['contact_telephone'] = $value['contact_telephone'];
        $updatearray['nationalid'] = $value['nationalid'];
        $updatearray['referrer_id'] = $value['referrer_id'];
        $updatearray['referrer_other'] = $value['referrer_other'];
        $updatearray['dotoption_id'] = $value['dotoption_id'];

        $updatearray['classification_bysiteid'] = $value['classification_bysiteid'];
        $updatearray['eptb_site'] = $value['eptb_site'];
        $updatearray['classification_byhistoryid'] = $value['classification_byhistoryid'];
        $updatearray['classification_byhistory_other'] = $value['classification_byhistory_other'];
        $updatearray['hiv_status'] = $value['hiv_status'];
        $updatearray['hiv_regno'] = $value['hiv_regno'];
        $updatearray['on_cpt'] = $value['on_cpt'];
        $updatearray['date_start_cpt'] = $value['date_start_cpt'];
        $updatearray['on_art'] = $value['on_art'];
        $updatearray['date_start_art'] = $value['date_start_art'];

        $updatearray['modify_id'] = $value['signature'];
//        $updatearray['modify_time'] = time();
        $updatearray['history'] = "concat(history,'Update " . date('Y-m-d H:i:s') . " " . $value['signature'] . ";\n')";

        $this->where = "district_regno='" . $this->district_regno . "'";
        $this->setTable("care_tb_patient");
//        $this->where = "care_tz_arv_registration_id=" . $value['file_no'];
        if (!Core::updateDataFromArray($updatearray, 100, false)) {
            return false;
        }
        $updatearray = null;

        //--------------------------------------------
        if (!$this->Transact("Delete from care_tb_allergies WHERE district_regno='" . $this->district_regno . "'")) {
            return false;
        };
        foreach ($value['allergies']as $name) {
            $updatearray['district_regno'] = $this->district_regno;
            $updatearray['allergy_description'] = $name;

            $this->coretable = "care_tb_allergies";
            if (!Core::insertDataFromArray($updatearray)) {
                $this->errors++;
                $this->error_message['db'] = sprintf($this->msg_tpl, "Insert failed");
                return false;
            }
            $updatearray = null;
        }

        $updatearray['pid'] = $this->getValue('pid');
//        $updatearray['district_regno'] = $this->district_regno;
        $updatearray['treatment_supporter_name'] = $value['treatment_supporter_name'];
        $updatearray['treatment_supporter_address'] = $value['treatment_supporter_address'];
        $updatearray['treatment_supporter_phone'] = $value['treatment_supporter_phone'];
        $this->coretable = "care_tb_treatment_supporter";
        $this->where = "pid=" . $updatearray['pid'] . ' AND is_current=1';
        //Check if supporter exists, if not insert else update

        if ($this->check_exists($this->coretable, $this->where)) {
            if (!Core::updateDataFromArray($updatearray, 100, false)) {
                return false;
            }
        } else {
            $this->coretable = "care_tb_treatment_supporter";
            if (!Core::insertDataFromArray($updatearray)) {
                return false;
            }
        }

        $updatearray = null;
        if ($debug == true)
            echo "</pre>";
        return true;
    }

    function check_exists($table, $where) {
        // check if an entry already exists in a table
        global $db;

        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
        $sql = "SELECT * from $table
		WHERE $where";

        return ($rs = $db->Execute($sql) AND $rs->FetchRow()) ? true : false;
    }

    function insertTBPatientFamilyInfo($data) {
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
        $insertarray['care_tz_arv_registration_id'] = $this->district_regno;
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

    function updateTBPatientFamilyInfo($data) {
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

        $this->where = "care_tz_arv_registration_id=" . $this->district_regno;
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

    function getTBFacilityInfo() {
        //reads the information out of the DB that are entered inside the ARV Administration
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT TYPE, value
					FROM care_config_global
					WHERE TYPE = 'main_info_tb_facility_name'
					OR TYPE = 'main_info_tb_facility_code'
					OR TYPE = 'main_info_tb_facility_district'
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
            $this->error_message['facility_info'] = sprintf($this->msg_tpl, "There is no information given about this TB facility!
            Please go to System Admin --> Facility Information --> TB Facility Information");
            return false;
        }
    }

    function getRegistrationData() {
        $registrationData['facility_file_number'] = $this->getValue('selian_pid');
        $registrationData['pid'] = $this->getValue('pid');
        $registrationData['sex'] = $this->getValue('sex');
        $registrationData['name'] = $this->getValue('name_first') . " " . $this->getValue('name_last') . " " . $this->getValue('name_2');
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
        ($this->getValue('phone_1_nr')) ? $tel .= $this->getValue('phone_1_nr') . "; " : $tel = "";
        ($this->getValue('phone_2_nr')) ? $tel .= $this->getValue('phone_2_nr') . "; " : $tel .= "";
        ($this->getValue('cellphone_1_nr')) ? $tel .= $this->getValue('cellphone_1_nr') . "; " : $tel .= "";
        ($this->getValue('cellphone_2_nr')) ? $tel .= $this->getValue('cellphone_2_nr') . "" : $tel .= "";

        return $tel;
    }

    function insertComment($data, $group_id) {
        global $db, $date_format;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $date_comment = formatDate2STD($data['comment_date'], $date_format);
        $this->sql = "INSERT INTO care_tz_arv_education SET 
                        care_tz_arv_registration_id=" . $this->district_regno . ",
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
					WHERE care_tz_arv_registration_id=" . $this->district_regno . " 
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

    function getDistrictRegnoFromPID() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT district_regno
					FROM care_tb_patient
					WHERE pid=" . $this->pid;

        if ($this->res = $db->Execute($this->sql) AND $data = $this->res->FetchRow()) {
            return $data[0];
        } else
            return null;
    }

    function get_referrer() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tb_referrer";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
//                array_push($result, $this->row_elem);
                $result[$this->row_elem['referrer_id']] = $this->row_elem['referrer_description'];
            }
        }
        return $result;
    }

    function get_DOT_Option() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tb_dotoptions";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
//                array_push($result, $this->row_elem);
                $result[$this->row_elem['dotoption_id']] = $this->row_elem['dotoption_description'];
            }
        }
        return $result;
    }

    function get_classification_bysite() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tb_classification_bysite";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
//                array_push($result, $this->row_elem);
                $result[$this->row_elem['classification_bysite_id']] = $this->row_elem['classification_bysite'];
            }
        }
        return $result;
    }

    function get_classification_byhistory() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tb_classification_byhistory";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
//                array_push($result, $this->row_elem);
                $result[$this->row_elem['classification_byhistoryid']] = $this->row_elem['classification_byhistory_descripton'];
            }
        }
        return $result;
    }

    function get_hiv_status() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tb_hiv_status";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
//                array_push($result, $this->row_elem);
                $result[$this->row_elem['hiv_status_id']] = $this->row_elem['hiv_status_description'];
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

    function get_placeofwork() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tb_placeofwork";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
                $result[$this->row_elem['placeofwork_id']] = $this->row_elem['placeofwork'];
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
            $table .= '<tr>';
            $table .= '<td bgcolor="#F0F8FF" align="center"><strong>File Reference</strong></td>';
            $table .= '<td bgcolor="#F0F8FF" align="center"><strong>Name</strong></td>';
            $table .= '<td bgcolor="#F0F8FF" align="center"><strong>Age</strong></td>';
            $table .= '<td bgcolor="#F0F8FF" align="center"><strong>HIV Status</strong></td>';
            $table .= '<td bgcolor="#F0F8FF" align="center"><strong>HIV Care Status</strong></td>';
            $table .= '<td bgcolor="#F0F8FF" align="center"><strong>Action</strong></td>';
            $table .= '</tr>';
            while ($this->row_elem = $this->res->FetchRow()) {
                $table .= '<tr>';
                $table .= "<td bgcolor=\"#F0F8FF\" align=\"center\">" . $this->row_elem['facility_file_no'] . "</td>";
                $table .= "<td bgcolor=\"#F0F8FF\" align=\"center\">" . $this->row_elem['relative_name'] . "</td>";
                $table .= "<td bgcolor=\"#F0F8FF\" align=\"center\">" . $this->row_elem['age'] . "</td>";
                $table .= "<td bgcolor=\"#F0F8FF\" align=\"center\">" . $this->row_elem['hiv_status'] . "</td>";
                $table .= "<td bgcolor=\"#F0F8FF\" align=\"center\">" . $this->row_elem['hiv_care_status'] . "</td>";
                $table .= "<td bgcolor=\"#F0F8FF\" align=\"center\">";
                $table .= '<a href="' . $root_path . 'arv_family_info_new.php' .
                        URL_APPEND . '&encounter_nr=' . $_GET['encounter_nr'] . '&pid=' . $_GET['pid'] . '&file_no=' . $this->row_elem['facility_file_no'] . '&mode=edit" target="_parent"' .
                        '"><img src="../../gui/img/control/blue_aqua/en/en_edit_sm.gif" border=0 width="76" height="16" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>';
                $table .= '&nbsp&nbsp';
                $table .= '<a href="' . $root_path . 'arv_delete_relative.php' .
                        URL_APPEND . '&encounter_nr=' . $_GET['encounter_nr'] . '&pid=' . $_GET['pid'] . '&arv_reg_id=' . $this->row_elem['care_tz_arv_registration_id'] . '&file_no=' . $this->row_elem['facility_file_no'] . '&mode=new" target="_parent"' .
                        '"><img src="../../gui/img/common/default/delete.gif" border=0 width="19" height="19" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>';
                $table .= "</td>";
                $table .= '</tr>';
//                $res.= $this->row_elem['relative_name'];
            }
        } else {
            $table .= "<table class=\"mainTable\"><tr><td bgcolor=\"#F0F8FF\" class=\"error2\">No Patient Relative Registered!</td></tr></table>";
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

    function format_district_regno($ctc_no) {
        $replace = '/^\(?([0-9]{2})\)?[-. ]?([0-9]{2})[-. ]?([0-9]{4})[-. ]?([0-9]{6})$/';
        $return = '$1-$2-$3-$4';
        return preg_replace($replace, $return, $ctc_no);
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

    function Display_Header($Title = '', $Title_Tag = '', $URL_APPEND = '') {

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

    function Display_Headline($Headline = 'TB', $Headline_Tag = '', $Headline_phpTag = '', $Help_file = '', $Help_Tag = '') {
//         echo 'skss';
        echo '<table cellspacing="0" class="titlebar" border=0 height="35" width="100%>
                                                                         <tr valign=top  class="titlebar" >
                                                                         <td bgcolor="#99ccff" ><font color="#330066"> &nbsp;&nbsp;' . $Headline . ' ' . $Headline_Tag . ' ' . $Headline_phpTag . ' </font></td>
                                                                <td bgcolor="#99ccff" align=right> <a href="javascript:window.history.back()"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)" ></a>';
        $_SESSION['ispopup'] = (isset($_SESSION['ispopup']) ? $_SESSION['ispopup'] : null);
        if ($_SESSION['ispopup'] == "true")
            $closelink = 'javascript:window.close()';
        else
            $closelink = 'insurance_tz.php?ntid=false&lang=$lang';

        echo '<a href="javascript:gethelp(\'' . $Help_file . '\',\'' . $Help_Tag . '\')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a><a href="tb_menu_main.php" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a></td>
                                                                </tr>
                                                            </table>
                                                            <table width=100% border=0 cellspacing=0 height=80%>
                                                                <tbody class="main">
                                                                    <tr valign="middle" align="center">
                                                                        <td>';
        return TRUE;
    }

}

?>
