<?php

class Validator {

    var $defaults;
    var $data_in;
    var $data_out;
    var $messages;
    var $errors;
    var $rules;
    var $msg_tpl = "<div class=\"error\">%s</div>";

    function Validator($defaults_, $data_in_) {
        $this->defaults = $defaults_;
        $this->data_in = $data_in_;
    }

    function set_rule($field, $rule, $param) {
        //Method for setting a validation rule for the ARV forms
        $this->rules[$field][$rule] = $param;
    }

    function filterData($val) {
        //clean the data entered into the ARV forms
        $val = trim($val);
        $val = htmlentities($val);
        $val = strip_tags($val);
        return $val;
    }

    function applyRules() {
        /* Method for form validation.
         * Parameters:
         * $defaults: Array of $default values for the form elements
         * $data_in: Array of $_GET or $_POST variables.
         *
         * set empty fields to the default value
         * apply the rules given with the set_rule method
         * return an array, containing the number of errors, error messages, and the validated data
         * */

        $keys = array_keys($this->defaults);

        foreach ($keys as $k) {
            $this->messages[$k] = false;

            if (!isset($this->data_in[$k])) {

                $this->data_out[$k] = $this->defaults[$k];
                continue;
            }
            $this->filterData($this->data_in[$k]);
            $this->data_out[$k] = $this->data_in[$k];
        }


        foreach ($keys as $field) {
            while (list($rule, $param) = each($this->rules[$field])) {

                $success = $this->$rule($this->data_out[$field], $param);

                if ($success) {
                    $this->messages[$field] = sprintf($this->msg_tpl, $this->$rule($this->data_out[$field], $param));
                    $this->errors++;
                    break;
                }
            }
        }
    }

    function getValues() {
        return $this->data_out;
    }

    function getMessages() {
        return $this->messages;
    }

    function getErrors() {
        return $this->errors;
    }

//------------------------------------------------------------------------------------------------------	
    function rule_required($val) {
        if (empty($val)) {
            $msg_string = "Please enter a value!";
            return $msg_string;
        }
        return false;
    }

    function rule_ctc_id($val) {
        
    }

    function rule_date($val) {
        if (empty($val)) {
            return false;
        }
        $rule_date = '#^((0?\d|[1-2]\d)[/]\s*(0?[1-9]|10|11|12)|(30)[/]
		\s*(0?[13456789]|10|11|12)|(31)[/]\s*(0?[13578]|10|12))[/]\s*(19\d\d|20\d\d)$#x';
        $rule_date_dash = '#^((0?\d|[1-2]\d)[-]\s*(0?[1-9]|10|11|12)|(30)[-]
		\s*(0?[13456789]|10|11|12)|(31)[-]\s*(0?[13578]|10|12))[-]\s*(19\d\d|20\d\d)$#x';

        if (preg_match($rule_date, $val) || preg_match($rule_date_dash, $val)) {
            $now = time();
            $date = strtotime($this->formatDate2STD($val, 'dd/mm/yyyy'));  //Get entered date in timestamp
            if ($date > $now) {
                return "Date can not be in the future!";
            }
        } else {
            return "Please enter a valid date!";
        }
    }

    function rule_date_greater($date1, $date2) {
        //format to standard
        $date1 = $this->formatDate2STD($date1, 'dd/mm/yyyy');
        $date2 = $this->formatDate2STD($date2, 'dd/mm/yyyy');
        if (empty($date1) || empty($date2)) {
            return FALSE;
        }
        if ($this->compare_dates($date2, $date1)) {
            return FALSE;
        } else {
            return "Date out of range!";
        }
    }

    function compare_dates($date1, $date2) {
        $startdate = strtotime($date1);
        $enddate = strtotime($date2);
        if ($startdate <= $enddate) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function rule_decimal($val) {
        $success = true;
        $regex = '#^\d{1,3}[.]+\d{1,2}$|^\d{0,3}$#';
        $success = preg_match($regex, $val);
        return !$success ? "Please enter a value in the format 111.22 or 111!" : false;
    }

    function rule_min_chars($val, $number) {
        if (empty($val)) {
            return false;
        }
        if (strlen($val) < $number) {
            $error_string = "Please enter at minimum $number characters!";
            return $error_string;
        }
        return false;
    }

    function rule_not_empty($val) {
        if (empty($val)) {
            return false;
        }
        return true;
    }

    function rule_numeric($val) {
        if (!empty($val)) {
            $val = trim(str_replace('-', '', $val));
            return is_numeric($val) ? false : $error_string = "Please enter a numeric value!";
        } else {
            return false;
        }
    }

    function unique_ctc_id($val) {
        if (!empty($val)) {
            $val = trim(str_replace('-', '', $val));
            global $db;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            //Check if patient with that id already exists
            $this->sql = "SELECT pid, ctc_id
                        FROM care_tz_arv_registration
					WHERE ctc_id =" . $val;

            if ($this->res = $db->Execute($this->sql) AND $data = $this->res->FetchRow()) {
//                header("Location: arv_registration.php" . URL_APPEND . "&pid=" . $data['pid'] . "&mode=edit");
                return "A patient with this ID already exists! Click "
                        . "<a href=javascript:redirect_fn('arv_registration.php" . URL_APPEND . "&encounter_nr=000000&pid=" . $data['pid'] . "&mode=edit" . "')" . ">HERE</a>&nbspto view or edit patient";
            } else {
                return FALSE;
            }
        }
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

}

?>
