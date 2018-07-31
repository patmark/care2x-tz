<?php

require_once($root_path . 'include/care_api_classes/class_encounter.php');
//require($root_path . 'include/inc_date_format_functions.php');

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
  `---> Class Notes
  |
  `--->Class Encounter
  |
  `--->Class ARV_Visit
 */

class ARV_Visit extends Encounter {

    var $table_info = array("illness_code" => "AIDS DEFINING ILLNESSES, NEW SYMPTOMS, SIDE EFFECTS, HOSPITALIZED",
        "functional_status" => "FUNCTIONAL STATUS",
        "tb_status" => "TB STATUS",
        "status" => "ARV STATUS",
        "regimen_code" => "ARV COMBINATION REGIMENS",
        "adher_code" => "ARV ADHERENCE",
        "adher_reas_code" => "ARV POOR ADHERENCE REASONS",
        "referred_code" => "REFERRED TO",
        "status_txt_code" => "ARV REASON",
        "follow_status_code" => "FOLLOW UP STATUS");
    var $visitID;
    var $img_plus = "<img src=\"../../gui/img/common/default/plus.gif\">";
    var $img_minus = "<img src=\"../../gui/img/common/default/minus.gif\">";
    var $arv_data = array('visit_date' => '',
        'visit_type' => '',
        'weight' => '',
        'encounter_nr' => '',
        'height' => '',
        'clinical_stage' => '',
        'cd4' => '',
        'illness_code' => '',
        'functional_status' => '',
        'pregnant' => '',
        'preg_clinic_id' => '',
        'date_of_delivery' => '',
        'family_planning' => '',
        'tb_status' => '',
        'tb_treatment_code' => '',
        'cotrim' => '',
        'diflucan' => '',
        'status' => '',
        'status_txt_code' => '',
        'regimen_code' => '',
        'regimen_days' => '',
        'adher_code' => '',
        'adher_reas_code' => '',
        'drugsandservices' => '',
        'hb' => '',
        'alt' => '',
        'laboratory_param' => '',
        'nutrition_support' => '',
        'nutritional_status' => '',
        'nutritional_supp' => '',
        'referred_code' => '',
        'next_visit_date' => '',
        'follow_status_code' => '',
        'create_id' => '');
    var $defaultData;
    var $insertArray = array();
    var $updateArray = array();
    var $o_val;
    var $errors;
    var $errorMessages;
    var $registrationID;

//-----------------------------------------------------------------------------------------------------
    function ARV_Visit($enc_nr, $visit_id, $registration_id) {
        $this->defaultData = array('visit_date' => date('d/m/Y', time()), 'weight' => '', 'visit_type' => '', 'height' => '', 'clinical_stage' => '', 'illness_code' => '', 'pregnant' => '',
            'encounter_nr' => '', 'date_of_delivery' => '', 'family_planning' => '', 'preg_clinic_id' => '', 'family_planning_txt' => '', 'functional_status_txt' => '', 'functional_status' => '', 'tb_status_txt' => '', 'tb_status' => '',
            'tb_treatment_code' => '', 'cotrim' => '', 'diflucan' => '',
            'status_txt' => '', 'status' => '', 'status_txt_code' => '', 'regimen_code_txt' => '', 'regimen_code' => '', 'regimen_days' => '', 'adher_code_txt' => '', 'adher_code' => '',
            'adher_reas_code' => '', 'drugsandservices' => '', 'cd4' => '', 'hb' => '', 'alt' => '', 'nutritional_status' => '', 'nutritional_status_txt' => '', 'nutritional_supp' => '', 'nutritional_supp_txt' => '',
            'laboratory_param' => '', 'nutrition_support' => '', 'referred_code_txt' => '', 'referred_code' => '', 'next_visit_date' => '', 'follow_status_code_txt' => '', 'follow_status_code' => '',
            'signature' => $_SESSION['sess_login_username']);

        $this->enc_nr = $enc_nr;
        $this->visitID = $visit_id;
        $this->registrationID = $registration_id;
        return true;
    }

    function getErrors() {
        return $this->errors;
    }

    function getErrorMessages() {
        return $this->errorMessages;
    }

    function is_visit_encounter() {
        //Check if a patient has already visited with this encounter
        global $db;

        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
        $sql = "SELECT * from care_encounter, care_tz_arv_visit_2
			  WHERE care_tz_arv_visit_2.encounter_nr=care_encounter.encounter_nr
			  AND care_tz_arv_visit_2.encounter_nr= $this->enc_nr";

        return ($rs = $db->Execute($sql) AND $rs->FetchRow()) ? true : false;
    }

//-------------------------------------------------------------------------------------------------------	
    function getFormData($array) {
        foreach ($array as $index => $value) {
            if (is_array($array[$index])) {
                foreach ($value as $element) {
                    $temp = explode("|", $element, 3);
                    $a_request[$index].="<option value=\"$element\" >" . $temp[2] . "</option>";
                }
            } else {
                if (strpos($value, "|")) {
                    $temp = explode("|", $value, 3);
                    $a_request[$index . "_txt"] = $temp[2];
                    $a_request[$index] = $value;
                } else {
                    $a_request[$index] = $value;
                };
            }
        }
        return $a_request;
    }

//------------------------------------------------------------------------------------------------------------------------

    function getCodesTable($table_name) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $var = rtrim($table_name, '[]');
        $var = rtrim($var, '_txt');

        $this->sql = "SELECT *
				    FROM care_tz_arv_$var
				   ";

        if (!$this->res = $db->Execute($this->sql)) {
            return false;
        }
        if (!($this->res->RecordCount())) {
            return false;
        }

        $table_string = $this->table_info[$table_name];
        $table_string.="<form><table>";

        while ($this->row_elem = $this->res->FetchRow()) {
            $id = "'" . $this->row_elem[0] . "'";
            $item_text = "'" . $this->row_elem['code'] . "'";

            if ($this->row_elem['code'] == "0") {
                $table_string.="<tr>
									<td colspan=\"4\">" . $this->row_elem['description'] . "</td>
								</tr>";
            } else if ($this->row_elem['other']) {
                $other = "document.forms[0].elements['field_" . $this->row_elem[0] . "'].value";
                $item_text = "'" . $this->row_elem['code'] . ": '+" . $other;

                $table_string.="<tr class=\"row\" ondblclick=\"javascript:add('$table_name',$id,$item_text,$other)\">
									<td>" . $this->row_elem['code'] . "</td>
									<td>" . $this->row_elem['description'] . "<input type=\"text\" name=\"field_" . $this->row_elem[0] . "\" /></td>
									<td onclick=\"javascript:add('$table_name',$id,$item_text,$other)\">$this->img_plus</td>
									<td onclick=\"javascript:remove('$table_name',$item_text)\">$this->img_minus</td>
								</tr>";
            } else {
                $other = "''";
                $table_string.="<tr class=\"row\" ondblclick=\"javascript:add('$table_name',$id,$item_text,$other)\">
									<td>" . $this->row_elem['code'] . "</td>
									<td>" . $this->row_elem['description'] . "</td>
									<td onclick=\"javascript:add('$table_name',$id,$item_text,$other)\">$this->img_plus</td>
									<td onclick=\"javascript:remove('$table_name',$item_text)\">$this->img_minus</td>
								</tr>";
            }
        }

        $table_string.="</table></form>";

        return $table_string;
    }

    function getLabParamTable() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT nr, name, msr_unit
					FROM care_tz_laboratory_param";

        if (!$this->res = $db->Execute($this->sql)) {
            return false;
        }
        if (!($this->res->RecordCount())) {
            return false;
        }

        $table_string.="<form><table>";
        while ($this->row_elem = $this->res->FetchRow()) {
            $id = "'" . $this->row_elem[0] . "'";
            $item_text = "'" . $this->row_elem['name'] . ": '+ document.forms[0].elements['field_" . $this->row_elem['nr'] . "'].value + ' " . $this->row_elem['msr_unit'] . "'";
            $other = "document.forms[0].elements['field_" . $this->row_elem['nr'] . "'].value";

            $table_string.="<tr class=\"row\" ondblclick=\"javascript:add('laboratory_param[]',$id,$item_text,$other)\">
								<td>" . $this->row_elem['name'] . "</td>
								<td><input name=\"field_" . $this->row_elem['nr'] . "\"  type=\"text\" size=\"6\" maxlength=\"10\" /></td>
								<td>" . $this->row_elem['msr_unit'] . "</td>
								<td onclick=\"javascript:add('laboratory_param[]',$id,$item_text,$other)\">$this->img_plus</td>
								<td onclick=\"javascript:remove('laboratory_param[]',$item_text)\">$this->img_minus</td>
							</tr>";
        }

        $table_string.="</form></table>";
        return $table_string;
    }

    function getDrugTable() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT item_id, item_description 
					FROM care_tz_drugsandservices 
					WHERE purchasing_class = 'drug_list' 
					ORDER BY item_description";

        if (!$this->res = $db->Execute($this->sql)) {
            return false;
        }
        if (!($this->res->RecordCount())) {
            return false;
        }

        $table_string.="<form><table>";
        while ($this->row_elem = $this->res->FetchRow()) {
            $id = "'" . $this->row_elem['item_id'] . "'";
            $item_text = "'" . $this->row_elem['item_description'] . "'";
            $other = "''";

            $table_string.="<tr class=\"row\" ondblclick=\"javascript:add('drugsandservices[]',$id,$item_text,$other)\">
								<td>" . $this->row_elem['item_description'] . "</td>
								<td onclick=\"javascript:add('drugsandservices[]',$id,$item_text,$other)\">$this->img_plus</td>
								<td onclick=\"javascript:remove('drugsandservices[]',$item_text)\">$this->img_minus</td>
							</tr>";
        }
        $id = "-1";
        $item_text = "document.forms[0].elements['field_'].value";
        $other = "document.forms[0].elements['field_'].value";

        $table_string.="<tr class=\"row\" ondblclick=\"javascript:add('drugsandservices[]',$id,$item_text,$other)\">
							<td>other <input name=\"field_\"  type=\"text\" size=\"6\" maxlength=\"10\" /></td>
							<td onclick=\"javascript:add('drugsandservices[]',$id,$item_text,$other)\">$this->img_plus</td>
							<td onclick=\"javascript:remove('drugsandservices[]',$item_text)\">$this->img_minus</td>
						</tr>";

        $table_string.="</form></table>";
        return $table_string;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------

    function prepDataforDB($array) {
        global $date_format;
        $debug = false;

        foreach ($this->defaultData as $x => $v) {
            if (!empty($array[$x])) {
                if (is_array($array[$x])) {
                    foreach ($array[$x] as $x2 => $v2) {
                        $temp = explode('|', $v2, 3);
                        if ($temp[1] != "") {
                            $data[$x][$temp[0]] = "'" . $temp[1] . "'";
                        } else {
                            $data[$x][$temp[0]] = 'null';
                        }
                    }
                } else if (strpos($array[$x], "|")) {
                    $temp = explode('|', $array[$x], 3);
                    if ($x == "functional_status" OR $x == "tb_status" OR $x == "status_txt" OR $x == "adher_code" OR $x == "status") {
                        $data[$x] = $temp[0];
                    } else {
                        if ($temp[1] != "") {
                            $data[$x]['id'] = $temp[0];
                            $data[$x]['other'] = "'" . $temp[1] . "'";
                        } else {
                            $data[$x]['id'] = $temp[0];
                            $data[$x]['other'] = 'null';
                        }
//                        if($temp[0]==''||$temp[0]=='n'){
//                            $data[$x]['id'] = 'null';
//                        }
                    }
                } else {
                    if ($x == "visit_date" OR $x == "date_of_delivery" OR $x == "next_visit_date") {
                        $data[$x] = "'" . formatDate2STD($array[$x], $date_format) . "'";
                    } else {
                        $data[$x] = "'" . $array[$x] . "'";
                    }
                }
            } else {
                $data[$x] = 'null';
            }
        }
        if ($debug) {
            echo "<pre>";
            echo "*******InsertArray**************</br>";
            print_r($data);
            echo "</pre>";
        }
        return $data;
    }

    function insertARTVisit($data) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $insertArray = $this->prepDataforDB($data);

        if ($debug == true)
            echo "<pre>";
        if (empty($insertArray['family_planning']) || $insertArray['family_planning'] == 'null') {
            $this->sql_1 = "INSERT INTO care_tz_arv_visit_2 SET
						visit_date=" . $insertArray['visit_date'] . ",
                                                care_tz_arv_visit_type_id=" . $insertArray['visit_type']['id'] . ",
						weight=" . $insertArray['weight'] . ", 
						height=" . $insertArray['height'] . ",
						clinical_stage=" . $insertArray['clinical_stage'] . ",
                                               	encounter_nr=" . $insertArray['encounter_nr'] . ",
						care_tz_arv_registration_id=" . $this->registrationID . ",
						pregnant=" . $insertArray['pregnant'] . ", 
						date_of_delivery=" . $insertArray['date_of_delivery'] . ",
                                                preg_clinic_id=" . $insertArray['preg_clinic_id'] . ",
                                                care_tz_arv_functional_status_id=" . $insertArray['functional_status'] . ",
						care_tz_arv_tb_status_id=" . $insertArray['tb_status'] . ",
						care_tz_arv_status_id=" . $insertArray['status']['id'] . ",
						care_tz_arv_adher_code_id=" . $insertArray['adher_code'] . ",
                                                nutrition_support=" . $insertArray['nutrition_support'] . ",
                                                care_tz_arv_nutritional_status_id=" . $insertArray['nutritional_status']['id'] . ",
                                                care_tz_arv_nutritional_supp_id=" . $insertArray['nutritional_supp']['id'] . ",
                        next_visit_date=" . $insertArray['next_visit_date'] . ", 
                        create_id=" . $insertArray['signature'] . ", 
                        create_time=" . time() . ", 
						history='Created " . date('Y-m-d H:i:s') . " " . $data['signature'] . ";\n';
						";
        } else {
            $this->sql_1 = "INSERT INTO care_tz_arv_visit_2 SET
						visit_date=" . $insertArray['visit_date'] . ",
                                                care_tz_arv_visit_type_id=" . $insertArray['visit_type']['id'] . ",
						weight=" . $insertArray['weight'] . ", 
						height=" . $insertArray['height'] . ",
						clinical_stage=" . $insertArray['clinical_stage'] . ",
                                               	encounter_nr=" . $insertArray['encounter_nr'] . ",
						care_tz_arv_registration_id=" . $this->registrationID . ",
						pregnant=" . $insertArray['pregnant'] . ", 
						date_of_delivery=" . $insertArray['date_of_delivery'] . ",
                                                preg_clinic_id=" . $insertArray['preg_clinic_id'] . ",
                                                family_planning_id=" . $insertArray['family_planning']['id'] . ",
						care_tz_arv_functional_status_id=" . $insertArray['functional_status'] . ",
						care_tz_arv_tb_status_id=" . $insertArray['tb_status'] . ",
						care_tz_arv_status_id=" . $insertArray['status']['id'] . ",
						care_tz_arv_adher_code_id=" . $insertArray['adher_code'] . ",
                                                nutrition_support=" . $insertArray['nutrition_support'] . ",
                                                care_tz_arv_nutritional_status_id=" . $insertArray['nutritional_status']['id'] . ",
                                                care_tz_arv_nutritional_supp_id=" . $insertArray['nutritional_supp']['id'] . ",
                        next_visit_date=" . $insertArray['next_visit_date'] . ", 
                        create_id=" . $insertArray['signature'] . ", 
                        create_time=" . time() . ", 
						history='Created " . date('Y-m-d H:i:s') . " " . $data['signature'] . ";\n';
						";
        }
        if (!$this->Transact($this->sql_1)) {
            if ($db->ErrorNo() == 1062) {
                $this->errorMessages['db'] = "There is already a visit for this encounter";
            } else {
                $this->errors++;
                $this->errorMessages['db'] = "Insert patient visit failed!";
            }
            return false;
        }
        $this->visitID = $db->Insert_ID();

        //------------------------------------------------------------------------
        foreach ($insertArray['illness_code'] as $x => $v) {

            $this->sql_2 = "INSERT INTO care_tz_arv_illness SET
							care_tz_arv_illness_code_id=$x, 
							care_tz_arv_visit_2_id=" . $this->visitID . ", 
							other=$v
						 ";

            if (!$this->Transact($this->sql_2)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert illness code failed!";
                return false;
            }
        }

        //------------------------------------------------------------------------
        foreach ($insertArray['tb_treatment_code'] as $x => $v) {

            $this->sql_2 = "INSERT INTO care_tz_arv_tb_treatment SET
							care_tz_arv_tb_treatment_code_id=$x, 
							care_tz_arv_visit_2_id=" . $this->visitID . ", 
							other=$v
						 ";

            if (!$this->Transact($this->sql_2)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert TB treatment failed!";
                return false;
            }
        }

        //-------------------------------------------------------------------------
        foreach ($insertArray['status_txt_code'] as $x => $v) {

            $this->sql_3 = "INSERT INTO care_tz_arv_status_txt SET
							care_tz_arv_visit_2_id=" . $this->visitID . ", 
							care_tz_arv_status_txt_code_id=$x,
							other=$v
						 ";

            if (!$this->Transact($this->sql_3)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert ARV Reason failed!";
                return false;
            }
        }

        //--------------------------------------------------------------------------
        if ($insertArray['regimen_code'] != 'null') {
            $this->sql_4 = "INSERT INTO care_tz_arv_regimen SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_regimen_code_id=" . $insertArray['regimen_code']['id'] . ",
							other=" . $insertArray['regimen_code']['other'] . ", 
							regimen_days=" . $insertArray['regimen_days'] . "
						 ";

            if (!$this->Transact($this->sql_4)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert ARV regimen failed!";
                return false;
            }
        } else {
            $this->sql_4 = "INSERT INTO care_tz_arv_regimen SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_regimen_code_id=null,
							other=null, 
							regimen_days=null
						 ";

            if (!$this->Transact($this->sql_4)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert ARV regimen failed!";
                return false;
            }
        }


        //--------------------------------------------------------------------
        foreach ($insertArray['adher_reas_code'] as $x => $v) {
            $this->sql_5 = "INSERT INTO care_tz_arv_adher_reas SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_adher_reas_code_id=$x,
							other=$v
						 ";

            if (!$this->Transact($this->sql_5)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert adher reas failed!";
                return false;
            }
        }

        //--------------------------------------------------------------------
        foreach ($insertArray['drugsandservices'] as $x => $v) {
            if ($x == -1) {
                $this->sql_6 = "INSERT INTO care_tz_arv_co_medi_other SET
								description=$v
						 	";

                if (!$this->Transact($this->sql_6)) {
                    $this->errors++;
                    $this->errorMessages['db'] = "Insert co-medications failed!";
                    return false;
                }

                $this->sql_7 = "INSERT INTO care_tz_arv_co_medi SET
							  care_tz_arv_visit_2_id=" . $this->visitID . ",
							  care_tz_arv_co_medi_other_id=" . $db->Insert_ID() . ", 
							  item_id=null
						     ";

                if (!$this->Transact($this->sql_7)) {
                    $this->errors++;
                    $this->errorMessages['db'] = "Insert co-medications failed!";
                    return false;
                }
            } else {
                $this->sql_7 = "INSERT INTO care_tz_arv_co_medi SET
							  care_tz_arv_visit_2_id=" . $this->visitID . ",
							  care_tz_arv_co_medi_other_id=null,
							  item_id=$x
						     ";

                if (!$this->Transact($this->sql_7)) {
                    $this->errors++;
                    $this->errorMessages['db'] = "Insert co-medications failed!";
                    return false;
                }
            }
        }

        //--------------------------------------------------------------
        foreach ($insertArray['laboratory_param'] as $x => $v) {
            $this->sql_8 = "INSERT INTO care_tz_arv_lab SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							nr=$x, 
							value=$v, 
							date_analyse=null
						 ";

            if (!$this->Transact($this->sql_8)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert Other diagnosis failed!";
                return false;
            }
        }

        //--------------------------------------------------------------

        $this->sql_8 = "INSERT INTO care_tz_arv_lab SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							nr=86, 
							value=" . $insertArray['cd4'] . ", 
							date_analyse=null
						 ";

        if (!$this->Transact($this->sql_8)) {
            $this->errors++;
            $this->errorMessages['db'] = "Insert CD4 failed!";
            return false;
        }

        $this->sql_8 = "INSERT INTO care_tz_arv_lab SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							nr=17, 
							value=" . $insertArray['hb'] . ", 
							date_analyse=null
						 ";

        if (!$this->Transact($this->sql_8)) {
            $this->errors++;
            $this->errorMessages['db'] = "Insert HB failed!";
            return false;
        }

        $this->sql_8 = "INSERT INTO care_tz_arv_lab SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							nr=102, 
							value=" . $insertArray['alt'] . ", 
							date_analyse=null
						 ";

        if (!$this->Transact($this->sql_8)) {
            $this->errors++;
            $this->errorMessages['db'] = "Insert ALT failed!";
            return false;
        }

        //---------------------------------------------------------------
        if ($insertArray['referred_code'] != 'null') {
            $this->sql_9 = "INSERT INTO care_tz_arv_referred SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_referred_code_id=" . $insertArray['referred_code']['id'] . ", 
							other=" . $insertArray['referred_code']['other'] . "
						 ";

            if (!$this->Transact($this->sql_9)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert Referred to failed!";
                return false;
            }
        } else {
            $this->sql_9 = "INSERT INTO care_tz_arv_referred SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_referred_code_id=null, 
							other=null
						 ";

            if (!$this->Transact($this->sql_9)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert Referred to failed!";
                return false;
            }
        }

        //------------
        if ($insertArray['follow_status_code'] != 'null') {
            $this->sql_10 = "INSERT INTO care_tz_arv_follow_status SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_follow_status_code_id=" . $insertArray['follow_status_code']['id'] . ", 
							other=" . $insertArray['follow_status_code']['other'] . "
						 ";

            if (!$this->Transact($this->sql_10)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert Follow Status failed!";
                return false;
            }
        } else {
            $this->sql_10 = "INSERT INTO care_tz_arv_follow_status SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_follow_status_code_id=null, 
							other=null
						 ";

            if (!$this->Transact($this->sql_10)) {
                $this->errors++;
                $this->errorMessages['db'] = "Insert Follow Status failed!";
                return false;
            }
        }

        //------------
        if ($debug == true)
            echo "</pre>";

        return true;
    }

    function updateARTVisit($data) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $updateArray = $this->prepDataforDB($data);
        $where_condition = "WHERE care_tz_arv_visit_2_id=" . $this->visitID;

        if ($debug == true)
            echo "<pre>";
        if (empty($updateArray['family_planning']) || $updateArray['family_planning'] == 'null') {
            $this->sql = "UPDATE care_tz_arv_visit_2 SET
						visit_date=" . $updateArray['visit_date'] . ",
                                                care_tz_arv_visit_type_id=" . $updateArray['visit_type']['id'] . ",
						weight=" . $updateArray['weight'] . ",
						height=" . $updateArray['height'] . ",
						clinical_stage=" . $updateArray['clinical_stage'] . ",
                                               	encounter_nr=" . $updateArray['encounter_nr'] . ",
						care_tz_arv_registration_id=" . $this->registrationID . ",
						pregnant=" . $updateArray['pregnant'] . ",
						date_of_delivery=" . $updateArray['date_of_delivery'] . ",
                                                preg_clinic_id=" . $updateArray['preg_clinic_id'] . ",
                                                care_tz_arv_functional_status_id=" . $updateArray['functional_status'] . ",
						care_tz_arv_tb_status_id=" . $updateArray['tb_status'] . ",
						care_tz_arv_status_id=" . $updateArray['status']['id'] . ",
						care_tz_arv_adher_code_id=" . $updateArray['adher_code'] . ",
                                                nutrition_support=" . $updateArray['nutrition_support'] . ",
                                                care_tz_arv_nutritional_status_id=" . $updateArray['nutritional_status']['id'] . ",
                                                care_tz_arv_nutritional_supp_id=" . $updateArray['nutritional_supp']['id'] . ",
                        next_visit_date=" . $updateArray['next_visit_date'] . ", 
                        modify_id=" . $updateArray['signature'] . ", 
                        modify_time=" . time() . ", 
			history=" . $this->ConcatHistory('Update' . ' ' . date('Y-m-d H:i:s') . ' ' . $updateArray['modify_id'] . ' ;\n') . "
					$where_condition
						";
        } else {
            $this->sql = "UPDATE care_tz_arv_visit_2 SET
						visit_date=" . $updateArray['visit_date'] . ",
                                                care_tz_arv_visit_type_id=" . $updateArray['visit_type']['id'] . ",
						weight=" . $updateArray['weight'] . ",
						height=" . $updateArray['height'] . ",
						clinical_stage=" . $updateArray['clinical_stage'] . ",
                                               	encounter_nr=" . $updateArray['encounter_nr'] . ",
						care_tz_arv_registration_id=" . $this->registrationID . ",
						pregnant=" . $updateArray['pregnant'] . ",
						date_of_delivery=" . $updateArray['date_of_delivery'] . ",
                                                preg_clinic_id=" . $updateArray['preg_clinic_id'] . ",
                                                family_planning_id=" . $updateArray['family_planning'] . ",
						care_tz_arv_functional_status_id=" . $updateArray['functional_status'] . ",
						care_tz_arv_tb_status_id=" . $updateArray['tb_status'] . ",
						care_tz_arv_status_id=" . $updateArray['status']['id'] . ",
						care_tz_arv_adher_code_id=" . $updateArray['adher_code'] . ",
                                                nutrition_support=" . $updateArray['nutrition_support'] . ",
                                                care_tz_arv_nutritional_status_id=" . $updateArray['nutritional_status']['id'] . ",
                                                care_tz_arv_nutritional_supp_id=" . $updateArray['nutritional_supp']['id'] . ",
                        next_visit_date=" . $updateArray['next_visit_date'] . ", 
                        modify_id=" . $updateArray['signature'] . ", 
                        modify_time=" . time() . ", 
			history=" . $this->ConcatHistory('Update' . ' ' . date('Y-m-d H:i:s') . ' ' . $updateArray['modify_id'] . ' ;\n') . "
					$where_condition
						";
        }
        if (!$this->Transact($this->sql)) {
            $this->errors++;
            $this->error_message['db'] = "Update Visit failed";
            return false;
        }

        //------------------------------------------------------------------
        $this->sql_8 = "UPDATE care_tz_arv_lab SET
							value=" . $updateArray['cd4'] . "
							$where_condition AND nr=86
						 ";

        if (!$this->Transact($this->sql_8)) {
            $this->errors++;
            $this->errorMessages['db'] = "Update failed!";
            return false;
        }

        $this->sql_8 = "UPDATE care_tz_arv_lab SET
							value=" . $updateArray['hb'] . " 
							$where_condition AND nr=17
						 ";

        if (!$this->Transact($this->sql_8)) {
            $this->errors++;
            $this->errorMessages['db'] = "Update failed!";
            return false;
        }

        $this->sql_8 = "UPDATE care_tz_arv_lab SET
							value=" . $updateArray['alt'] . "
							$where_condition AND nr=102
						 ";

        if (!$this->Transact($this->sql_8)) {
            $this->errors++;
            $this->errorMessages['db'] = "Update failed!";
            return false;
        }
        //-------------------------------------------------------------------
        $this->sql = "DELETE FROM care_tz_arv_illness $where_condition;";
        if (!$this->Transact($this->sql)) {
            return false;
        }

        foreach ($updateArray['illness_code'] as $x => $v) {

            $this->sql = "INSERT INTO care_tz_arv_illness SET
							care_tz_arv_illness_code_id=$x, 
							care_tz_arv_visit_2_id=" . $this->visitID . ", 
							other=$v
						 ";

            if (!$this->Transact($this->sql)) {
                $this->errors++;
                $this->error_message['db'] = "Update failed";
                return false;
            }
        }

        //-------------------------------------------------------------------
        $this->sql = "DELETE FROM care_tz_arv_tb_treatment $where_condition;";
        if (!$this->Transact($this->sql)) {
            return false;
        }

        foreach ($updateArray['tb_treatment_code'] as $x => $v) {

            $this->sql = "INSERT INTO care_tz_arv_tb_treatment SET
							care_tz_arv_tb_treatment_code_id=$x, 
							care_tz_arv_visit_2_id=" . $this->visitID . ", 
							other=$v
						 ";

            if (!$this->Transact($this->sql)) {
                $this->errors++;
                $this->error_message['db'] = "Update failed";
                return false;
            }
        }

        //-------
        $this->sql = "DELETE FROM care_tz_arv_status_txt $where_condition;";
        if (!$this->Transact($this->sql)) {
            return false;
        }

        foreach ($updateArray['status_txt_code'] as $x => $v) {
            $this->sql_3 = "INSERT INTO care_tz_arv_status_txt SET
							care_tz_arv_visit_2_id=" . $this->visitID . ", 
							care_tz_arv_status_txt_code_id=$x,
							other=$v
						 ";

            if (!$this->Transact($this->sql_3)) {
                $this->errors++;
                $this->error_message['db'] = "Update failed";
                return false;
            }
        }

        //---------
        if ($updateArray['regimen_code'] != 'null') {
            $this->sql_4 = "UPDATE care_tz_arv_regimen SET
							care_tz_arv_regimen_code_id=" . $updateArray['regimen_code']['id'] . ",
							other=" . $updateArray['regimen_code']['other'] . ", 
							regimen_days=" . $updateArray['regimen_days'] . "
							$where_condition
						 ";

            if (!$this->Transact($this->sql_4)) {
                $this->errors++;
                $this->error_message['db'] = "Update failed";
                return false;
            }
        }

        //------------
        $this->sql = "DELETE FROM care_tz_arv_adher_reas $where_condition;";
        if (!$this->Transact($this->sql)) {
            return false;
        }

        foreach ($updateArray['adher_reas_code'] as $x => $v) {

            $this->sql_5 = "INSERT INTO care_tz_arv_adher_reas SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_adher_reas_code_id=$x,
							other=$v
						 ";

            if (!$this->Transact($this->sql_5)) {
                $this->errors++;
                $this->error_message['db'] = "Update failed";
                return false;
            }
        }

        //------------
        $this->sql = "DELETE FROM care_tz_arv_co_medi $where_condition;";
        if (!$this->Transact($this->sql)) {
            return false;
        }

        foreach ($updateArray['drugsandservices'] as $x => $v) {
            if ($x == -1) {
                $this->sql_6 = "INSERT INTO care_tz_arv_co_medi_other SET
								description=$v
						 	";

                if (!$this->Transact($this->sql_6)) {
                    $this->error_message['db'] = "Update failed";
                    $this->errors++;
                    return false;
                }

                $this->sql_7 = "INSERT INTO care_tz_arv_co_medi SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_co_medi_other_id=" . $db->Insert_ID() . ", 
							item_id=null
						 ";

                if (!$this->Transact($this->sql_7)) {
                    $this->error_message['db'] = "Update failed";
                    $this->errors++;
                    return false;
                }
            } else {
                $this->sql_7 = "INSERT INTO care_tz_arv_co_medi SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_co_medi_other_id=null,
							item_id=$x
						 ";

                if (!$this->Transact($this->sql_7)) {
                    $this->error_message['db'] = "Update failed";
                    $this->errors++;
                    return false;
                }
            }
        }

        //-----------------------------------------------------------------------------------
        $this->sql = "DELETE FROM care_tz_arv_lab $where_condition AND nr NOT IN (17,86,101,102)";
        if (!$this->Transact($this->sql)) {
            return false;
        }

        foreach ($updateArray['laboratory_param'] as $x => $v) {
            $this->sql_8 = "INSERT INTO care_tz_arv_lab SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							nr=$x, 
							value=$v, 
							date_analyse=null
						 ";

            if (!$this->Transact($this->sql_8)) {
                $this->errors++;
                $this->error_message['db'] = "Update failed";
                return false;
            }
        }

        //------------	
        if ($updateArray['referred_code'] != 'null') {
            $this->sql_9 = "UPDATE care_tz_arv_referred SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_referred_code_id=" . $updateArray['referred_code']['id'] . ", 
							other=" . $updateArray['referred_code']['other'] . "
                                                        $where_condition
						 ";

            if (!$this->Transact($this->sql_9)) {
                $this->errors++;
                $this->error_message['db'] = "Update failed";
                return false;
            }
        }

        //------------
        if ($updateArray['follow_status_code'] != 'null') {
            $this->sql_10 = "UPDATE care_tz_arv_follow_status SET
							care_tz_arv_visit_2_id=" . $this->visitID . ",
							care_tz_arv_follow_status_code_id=" . $updateArray['follow_status_code']['id'] . ", 
							other=" . $updateArray['follow_status_code']['other'] . "
                                                        $where_condition
						 ";

            if (!$this->Transact($this->sql_10)) {
                $this->errors++;
                $this->error_message['db'] = "Update failed";
                return false;
            }
        }

        //------------
        if ($debug == true)
            echo "</pre>";
        return true;
    }

    function getDefaultData() {
        return $this->defaultData;
    }

//--------------------------------------------------------------------------------------------------------------------------------------------------
    function getVisitData() {
        global $db, $date_format;
        $debug = FALSE;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $where_condition = "WHERE care_tz_arv_visit_2_id=" . $this->visitID;
        if ($debug == true)
            echo "<pre>";
        $this->sql = "SELECT care_tz_arv_visit_2_id as visit_id,
						   #care_tz_arv_functional_status_id,
						   #care_tz_arv_tb_status_id,
						   #care_tz_arv_status_id,
						   #care_tz_arv_adh_code_id,
                                                   #care_tz_arv_visit_type_id,
						   visit_date,
                                                   encounter_nr,
                                                   weight, 
						   height,
						   clinical_stage, 
						   pregnant, 
						   date_of_delivery,
                                                   preg_clinic_id,
						   cotrim,
						   diflucan,
                                                   nutrition_support,
                                                   next_visit_date,
						   create_id,
						   modify_id 
                    FROM care_tz_arv_visit_2
					$where_condition
				   ";

        if (!$this->res = $db->Execute($this->sql)) {
            $this->errors++;
            $this->errorMessages['db'] = "Problems with getting data from DB!";
            return false;
        }
        if (!$arv_data = $this->res->FetchRow()) {
            $this->errors++;
            $this->errorMessages['db'] = "There are no visits for this patient yet!";
            return false;
        } else {
            if (!empty($arv_data['visit_date'])) {
                $arv_data['visit_date'] = formatDate2Local($arv_data['visit_date'], $date_format);
            }
            if (!empty($arv_data['date_of_delivery'])) {
                $arv_data['date_of_delivery'] = formatDate2Local($arv_data['date_of_delivery'], $date_format);
            }
            if (!empty($arv_data['next_visit_date'])) {
                $arv_data['next_visit_date'] = formatDate2Local($arv_data['next_visit_date'], $date_format);
            }
            if (!empty($arv_data['modify_id'])) {
                $arv_data['signature'] = $arv_data['modify_id'];
            } else {
                $arv_data['signature'] = $arv_data['create_id'];
            };
        }

        //------------------------------------------------------------

        $temp = array('visit_type', 'functional_status', 'tb_status', 'status', 'nutritional_status', 'nutritional_supp');

        foreach ($temp as $table_name) {
            $this->sql = "SELECT st.care_tz_arv_" . $table_name . "_id as id, 
							   code, 
                               description
						FROM care_tz_arv_$table_name st
						INNER JOIN care_tz_arv_visit_2 USING (care_tz_arv_" . $table_name . "_id)
						$where_condition
						";

            if (!$this->res = $db->Execute($this->sql)) {
                $this->errors++;
                $this->errorMessages['db'] = "Problems with getting data from DB!";
                return false;
            }
            if ($this->row_elem = $this->res->FetchRow()) {
                $arv_data[$table_name] = $this->row_elem['id'] . "||" . $this->row_elem['code'];
            }
        }

        //------------------------------------------------------------

        $temp = array('adher_code');

        foreach ($temp as $table_name) {
            $this->sql = "SELECT st.care_tz_arv_" . $table_name . "_id as id, 
							   code, 
                               description
						FROM care_tz_arv_$table_name st
						INNER JOIN care_tz_arv_visit_2 USING (care_tz_arv_" . $table_name . "_id)
						$where_condition
						";

            if (!$this->res = $db->Execute($this->sql)) {
                $this->errors++;
                $this->errorMessages['db'] = "Problems with getting data from DB!";
                return false;
            }
            if ($this->row_elem = $this->res->FetchRow()) {
                $arv_data[$table_name] = $this->row_elem['id'];
            }
        }

        //--------------------------------------------------------
        $this->sql = "SELECT 
				family_planning_id, arv_visit_family_planning_id, 
                                code, description
						FROM care_tz_arv_visit_2, care_tz_arv_family_planning
                                                WHERE family_planning_id = arv_visit_family_planning_id
                                                AND care_tz_arv_visit_2_id=$this->visitID
					   ";

        if ($this->res = $db->Execute($this->sql)) {
            if ($this->row_elem = $this->res->FetchRow()) {
                $arv_data['family_planning_txt'] = $this->row_elem['code'];
                $arv_data['family_planning'] = $this->row_elem['arv_visit_family_planning_id'];
            }
        } else {
            $this->errors++;
            $this->errorMessages['db'] = "Problems with getting data from DB!";
            return false;
        }

        //---------------------------------------------------------------------------
        $temp = array('regimen', 'referred', 'follow_status');

        foreach ($temp as $table_name) {
            $this->sql = "SELECT 
							care_tz_arv_" . $table_name . "_code_id as id,
							code,
							tb.other as other
						FROM care_tz_arv_$table_name tb
						INNER JOIN care_tz_arv_" . $table_name . "_code code 
	                    USING (care_tz_arv_" . $table_name . "_code_id)
						$where_condition
					   ";

            if ($this->res = $db->Execute($this->sql)) {
                if ($this->res->RecordCount()) {
                    while ($this->row_elem = $this->res->FetchRow()) {
                        if (!empty($this->row_elem['other'])) {
                            $arv_data[$table_name . "_code"] = $this->row_elem['id'] . "|" . $this->row_elem['other'] . "|" . $this->row_elem['code'] . ": " . $this->row_elem['other'];
                        } else
                            $arv_data[$table_name . "_code"] = $this->row_elem['id'] . "|" . $this->row_elem['other'] . "|" . $this->row_elem['code'];
                    }
                }
            }
            else {
                $this->errors++;
                $this->errorMessages['db'] = "Problems with getting data from DB!";
                return false;
            }
        }

        //---------------------------------------------------------------------------

        $this->sql = "SELECT 
							regimen_days
						FROM care_tz_arv_regimen
						$where_condition
					   ";

        if ($this->res = $db->Execute($this->sql)) {
            if ($this->row_elem = $this->res->FetchRow()) {
                $arv_data['regimen_days'] = $this->row_elem[0];
            }
        } else {
            $this->errors++;
            $this->errorMessages['db'] = "Problems with getting data from DB!";
            return false;
        }

        //----------------------------------------------------------------------------
        $temp = array('illness', 'status_txt', 'adher_reas', 'tb_treatment');

        foreach ($temp as $table_name) {
            $this->sql = "SELECT 
							care_tz_arv_" . $table_name . "_code_id,
							code,
							tb.other as other
						FROM care_tz_arv_$table_name tb
						INNER JOIN care_tz_arv_" . $table_name . "_code code 
	                    USING (care_tz_arv_" . $table_name . "_code_id)
						$where_condition
					   ";

            if ($this->res = $db->Execute($this->sql)) {
                if ($this->res->RecordCount()) {
                    while ($this->row_elem = $this->res->FetchRow()) {
                        if (!empty($this->row_elem['other'])) {
                            $arv_data[$table_name . "_code"][] = $this->row_elem[0] . "|" . $this->row_elem[2] . "|" . $this->row_elem[1] . ": " . $this->row_elem[2];
                        } else
                            $arv_data[$table_name . "_code"][] = $this->row_elem[0] . "|" . $this->row_elem[2] . "|" . $this->row_elem[1];
                    }
                }
            }
            else {
                $this->errors++;
                $this->errorMessages['db'] = "Problems with getting data from DB!";
                return false;
            }
        }

        //-------------------------------------------------
        $this->sql = "SELECT item_id, 
                           item_description,
       					   care_tz_arv_co_medi_other_id,
       					   description
					FROM care_tz_arv_co_medi
					LEFT OUTER JOIN care_tz_drugsandservices USING (item_id)
					LEFT OUTER JOIN care_tz_arv_co_medi_other USING (care_tz_arv_co_medi_other_id)
					$where_condition";

        if ($this->res = $db->Execute($this->sql)) {
            if ($this->res->RecordCount()) {
                while ($this->row_elem = $this->res->FetchRow()) {
                    if (!empty($this->row_elem['item_id'])) {
                        $arv_data['drugsandservices'][] = $this->row_elem['item_id'] . "||" . $this->row_elem['item_description'];
                    } else if (!empty($this->row_elem['care_tz_arv_co_medi_other_id'])) {
                        $arv_data['drugsandservices'][] = "-1|" . $this->row_elem['description'] . "|" . $this->row_elem['description'];
                    }
                }
            }
        } else {
            $this->errors++;
            $this->errorMessages['db'] = "Problems with getting data from DB!";
            return false;
        }
        //------------------------------------

        $this->sql = "SELECT nr, name, value, msr_unit
					FROM care_tz_arv_lab
					INNER JOIN care_tz_laboratory_param USING(nr)
					$where_condition";

        if ($this->res = $db->Execute($this->sql)) {
            if ($this->res->RecordCount()) {
                while ($this->row_elem = $this->res->FetchRow()) {
                    if ($this->row_elem['nr'] == 86) {
                        $arv_data['cd4'] = $this->row_elem['value'];
                    } else if ($this->row_elem['nr'] == 17) {
                        $arv_data['hb'] = $this->row_elem['value'];
                    } else if ($this->row_elem['nr'] == 102) {
                        $arv_data['alt'] = $this->row_elem['value'];
                    } else {
                        $arv_data['laboratory_param'][] = $this->row_elem['nr'] . "|" . $this->row_elem['value'] . "|" . $this->row_elem['name'] . ": " . $this->row_elem['value'] . " " . $this->row_elem['msr_unit'];
                    }
                }
            }
        } else {
            $this->errors++;
            $this->errorMessages['db'] = "Problems with getting data from DB!";
            return false;
        }


        if ($debug == true) {
            print_r($arv_data);
            echo "</pre>";
        }

        return $arv_data;
    }

//--------------------------------------------------------------------------------------------------------------------
    function getVisitTableData() {
        $array = $this->getVisitData();

        foreach ($array as $index => $value) {
            if (is_array($array[$index])) {
                foreach ($value as $element) {
                    $temp = explode("|", $element, 3);
                    $a_request[$index].=$temp[2] . ", ";
                }
            } else {
                $temp = explode("|", $value, 3);
                if (!isset($temp[2])) {
                    $a_request[$index] = $temp[0];
                } else
                    $a_request[$index] = $temp[2];
            }
        }
        return $a_request;
    }

    function get_clinical_stage($date = '') {
        if (!empty($date)) {
            $date = $this->formatDate2STD($date, 'dd/mm/yyyy');
        } else {
            $date = date('Y-m-d');
        }
        global $db;
        $debug = FALSE;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
        //Get the previous visit stage
        $this->sql = "SELECT MAX(clinical_stage) AS stage
                      FROM care_tz_arv_visit_2
                      WHERE care_tz_arv_registration_id='$this->registrationID'"
                . " AND visit_date < '$date'";
        $result = array();
        $stage = '';

        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
                //print_r($this->row_elem['stage']);
                $stage = $this->row_elem['stage'];
                $result[$this->row_elem['stage']] = $this->row_elem['stage'];
            }
            $i = $stage;
            while ($i < 4) {
                $result[$i + 1] = $i + 1;
                $i++;
            }
        }

        return $result;
    }

    function get_adher_code() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = "SELECT *
                      FROM care_tz_arv_adher_code";
        $result = array('' => '--Select--');
        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
//                array_push($result, $this->row_elem);
                $result[$this->row_elem['care_tz_arv_adher_code_id']] = $this->row_elem['code'] . " " . $this->row_elem['description'];
            }
        }
        return $result;
    }

    function formatDate2STD($localDate, $localFormat, &$sepChars) {
        $finalDate = 0;
        $localFormat = strtolower($localFormat);

        if (!$sepChars)
            $sepChars = array('-', '.', '/', ':', ',');

        if (preg_match('/0000/i', $finalDate))
            $finalDate = 0;


        if (!$finalDate) {

            for ($i = 0; $i < sizeof($sepChars); $i++) {
                if (strchr($localDate, $sepChars[$i])) {
                    $loc_array = explode($sepChars[$i], $localDate);
                    break;
                }
            }

            for ($i = 0; $i < sizeof($sepChars); $i++) {
                if (strchr($localFormat, $sepChars[$i])) {
                    $Format_array = explode($sepChars[$i], $localFormat);
                    break;
                }
            }

            /* Detect local format and reformat the local time to DATE standard */
            for ($i = 0; $i < 3; $i++) {
                if ($Format_array[$i] == 'yyyy') {
                    $vYear = $loc_array[$i];
                } elseif ($Format_array[$i] == 'mm') {
                    $vMonth = $loc_array[$i];
                } elseif ($Format_array[$i] == 'dd') {
                    $vDay = $loc_array[$i];
                }
            }

            # if invalid numeric return empty string
            if (!is_numeric($vYear) || !is_numeric($vMonth) || !is_numeric($vDay)) {
                $finalDate = '';
            } else {
                # DATE standard
                if (strlen($vMonth) == 1)
                    $vMonth = '0' . $vMonth;
                if (strlen($vDay) == 1)
                    $vDay = '0' . $vDay;
                $finalDate = $vYear . '-' . $vMonth . '-' . $vDay;
            }
        }
        return $finalDate;
    }

/// Added /////----------------------------------------
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

    function patient_appointments($registration_id) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
        $table = '';
        $this->sql = "SELECT *
                      FROM care_tz_arv_appointment
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

}

?>
