<?php

require_once($root_path . 'include/care_api_classes/class_tz_arv_report.php');
/*
  Class Structure:

  Class Core
  |
  `---> Class Report
  |
  `--->Class ARV_report
  |
  `--->Class Quarterly_report
 */

class Quarterly_report extends ARV_report {

    var $nr_6;
    var $nr_12;
    var $month;
    var $year;
    var $table;

    function Quarterly_report($month, $year, $nr_6, $nr_12) {
        parent::ARV_report();
        $this->month = $month;
        $this->year = $year;
        $this->table = $this->createTables(date('Y-m-d', mktime(0, 0, 0, $this->month + 3, 1, $this->year) - 86400));
        $this->nr_6 = $nr_6;
        $this->nr_12 = $nr_12;
    }

    function calc_timeframe() {
        $debug = false;
        $this->timeframe_start = mktime(0, 0, 0, $this->month, 1, $this->year);
        $this->timeframe_end = mktime(0, 0, 0, $this->month + 3, 1, $this->year) - 86400;
        $this->start_timestamp = date('Y-m-d', $this->timeframe_start);
        $this->end_timestamp = date('Y-m-d', $this->timeframe_end - 86400);

        $this->cohort_timestamp[6]['baseline_start'] = mktime(0, 0, 0, $this->month - 7 + $this->nr_6, 1, $this->year);
        $this->cohort_timestamp[6]['baseline_stop'] = mktime(0, 0, 0, $this->month - 6 + $this->nr_6, 1, $this->year);
        $this->cohort_timestamp[6]['end_cohort_start'] = mktime(0, 0, 0, $this->month - 1 + $this->nr_6, 1, $this->year);
        $this->cohort_timestamp[6]['end_cohort_stop'] = mktime(0, 0, 0, $this->month + $this->nr_6, 1, $this->year);

        $this->cohort_timestamp[12]['baseline_start'] = mktime(0, 0, 0, $this->month - 13 + $this->nr_12, 1, $this->year);
        $this->cohort_timestamp[12]['baseline_stop'] = mktime(0, 0, 0, $this->month - 12 + $this->nr_12, 1, $this->year);
        $this->cohort_timestamp[12]['end_cohort_start'] = mktime(0, 0, 0, $this->month - 1 + $this->nr_12, 1, $this->year);
        $this->cohort_timestamp[12]['end_cohort_stop'] = mktime(0, 0, 0, $this->month + $this->nr_12, 1, $this->year);

        if ($debug) {
            foreach ($this->cohort_timestamp[6] as $var) {
                echo date('Y-m-d', $var) . "<br>";
            }
        }
        parent::calc_timeframe();
    }

//-----------------------------------------------------------------------------------------------------------------

    function display_quarterly_art_report_no1() {
        global $db;
        $this->debug = FALSE;
        $this->debug == TRUE ? $db->debug = TRUE : $db->debug = FALSE;


        $arr_row[1] = "date_enrolled<'" . date('Y-m-d', $this->timeframe_start) . "' ";
        $arr_row[2] = "date_enrolled>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND date_enrolled <='" . date('Y-m-d', $this->timeframe_end) .
                "' AND care_tz_arv_registration_id NOT IN(SELECT care_tz_arv_registration_id FROM care_tz_arv_transfer_in) ";
        $arr_row[3] = "date_enrolled<='" . date('Y-m-d', $this->timeframe_end) . "' ";
        $arr_row[4] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL ";
        $arr_row[5] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND(co_medication =303
                             OR co_medication = 517 OR co_medication = 587) ";
        $arr_row[6] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND tb_status != -1 ";
        $arr_row[7] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND tb_treatment = 1 ";
        $arr_row[8] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND 
                             (nutritional_status = 2 OR nutritional_status = 3) ";
        $arr_row[9] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND 
                             (nutritional_status = 2 OR nutritional_status = 3)
                             AND (nutritional_supp = 1 OR nutritional_supp = 2)";
        $arr_row[10] = "date_eligible>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND date_eligible <='" . date('Y-m-d', $this->timeframe_end) . "'"
                . " AND date_eligible IS NOT NULL AND date_start_art >='" . date('Y-m-d', $this->timeframe_end) . "'";


//Skip $arr_col[1] and $arr_col[2] which hold total values
        //Males columns
        $arr_col[3] = "AND SEX='m' AND age < 1";
        $arr_col[4] = "AND SEX='m' AND age >= 1 AND age <=4";
        $arr_col[5] = "AND SEX='m' AND age >= 5 AND age <=14";
        $arr_col[6] = "AND SEX='m' AND age >= 15";
        ////Skip $arr_col[7] for total females
        //Females columns
        $arr_col[8] = "AND SEX='f' AND age < 1";
        $arr_col[9] = "AND SEX='f' AND age >= 1 AND age <=4";
        $arr_col[10] = "AND SEX='f' AND age >= 5 AND age <=14";
        $arr_col[11] = "AND SEX='f' AND age >= 15";
        $arr_col[12] = "AND SEX='f' AND pregnant = 1";

        foreach ($arr_row as $r_index => $row) {
            $arr[$r_index][1] = 0;       //An array for grand total
            $arr[$r_index][2] = 0;       //An array for total males
            $arr[$r_index][7] = 0;       //An array for total females

            foreach ($arr_col as $c_index => $col) {
                $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE $row
                            $col";

                if ($this->res = $db->Execute($this->sql)) {
                    $this->row_elem = $this->res->FetchRow();
                    $arr[$r_index][$c_index] = $this->row_elem[0];
                } else {
                    return FALSE;
                }
            }

            //Calc totals in a row
            $arr[$r_index][2] = $arr[$r_index][3] + $arr[$r_index][4] + $arr[$r_index][5] + $arr[$r_index][6]; //Males
            $arr[$r_index][7] = $arr[$r_index][8] + $arr[$r_index][9] + $arr[$r_index][10] + $arr[$r_index][11]; //Females
            $arr[$r_index][1] = $arr[$r_index][2] + $arr[$r_index][7];      //Grand total
        }

        return $arr;
    }

    function display_quarterly_art_report_no2() {
        global $db;
        $debug = FALSE;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $arr_row[1] = "date_start_art<'" . date('Y-m-d', $this->timeframe_start) . "' ";
        $arr_row[2] = "date_start_art>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND date_start_art <='" . date('Y-m-d', $this->timeframe_end) .
                "' AND care_tz_arv_registration_id NOT IN(SELECT care_tz_arv_registration_id FROM care_tz_arv_transfer_in) ";
        $arr_row[3] = "date_start_art<='" . date('Y-m-d', $this->timeframe_end) . "' ";
        $arr_row[4] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND arv_status !=1 
                             AND arv_status !=5 AND (regimen = '1' OR regimen = '1x')";
        $arr_row[5] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND arv_status !=1 
                             AND arv_status !=5 AND (regimen = '2' OR regimen = '2x')";
        $arr_row[6] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND arv_status !=1 
                             AND arv_status !=5 AND other_regimen != -1 ";
        $arr_row[7] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND arv_status !=1 
                             AND arv_status !=5 AND regimen = '0' AND other_regimen = -1 ";
        $arr_row[8] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND arv_status !=1 
                             AND arv_status !=5 ";
        $arr_row[9] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND arv_status !=1 
                             AND arv_status !=5 AND care_tz_arv_registration_id 
                             NOT IN(SELECT care_tz_arv_registration_id FROM care_tz_arv_transfer_in)";
        $arr_row[10] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND arv_status !=1 
                             AND arv_status !=5 AND care_tz_arv_registration_id 
                             IN(SELECT care_tz_arv_registration_id FROM care_tz_arv_transfer_in)";


//Skip $arr_col[1] and $arr_col[2] which hold total values
        //Males columns
        $arr_col[3] = "AND SEX='m' AND age < 1";
        $arr_col[4] = "AND SEX='m' AND age >= 1 AND age <=4";
        $arr_col[5] = "AND SEX='m' AND age >= 5 AND age <=14";
        $arr_col[6] = "AND SEX='m' AND age >= 15";
        ////Skip $arr_col[7] for total females
        //Females columns
        $arr_col[8] = "AND SEX='f' AND age < 1";
        $arr_col[9] = "AND SEX='f' AND age >= 1 AND age <=4";
        $arr_col[10] = "AND SEX='f' AND age >= 5 AND age <=14";
        $arr_col[11] = "AND SEX='f' AND age >= 15";
        $arr_col[12] = "AND SEX='f' AND pregnant = 1";

        foreach ($arr_row as $r_index => $row) {
            $arr[$r_index][1] = 0;       //An array for grand total
            $arr[$r_index][2] = 0;       //An array for total males
            $arr[$r_index][7] = 0;       //An array for total females

            foreach ($arr_col as $c_index => $col) {
                $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE $row
                            $col";

                if ($this->res = $db->Execute($this->sql)) {
                    $this->row_elem = $this->res->FetchRow();
                    $arr[$r_index][$c_index] = $this->row_elem[0];
                } else {
                    return FALSE;
                }
            }

            //Calc totals in a row
            $arr[$r_index][2] = $arr[$r_index][3] + $arr[$r_index][4] + $arr[$r_index][5] + $arr[$r_index][6]; //Males
            $arr[$r_index][7] = $arr[$r_index][8] + $arr[$r_index][9] + $arr[$r_index][10] + $arr[$r_index][11]; //Females
            $arr[$r_index][1] = $arr[$r_index][2] + $arr[$r_index][7];      //Grand total
        }

        return $arr;
    }

    function display_quarterly_art_report_no3() {
        global $db;
        $this->debug = FALSE;
        $this->debug == TRUE ? $db->debug = TRUE : $db->debug = FALSE;

        $arr_row[1] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND arv_status =5 ";
        $arr_row[2] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND follow_status = 5 ";
        $arr_row[3] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND follow_status = 6 ";
        $arr_row[4] = "visit_date>='" . date('Y-m-d', $this->timeframe_start) .
                "' AND visit_date<='" . date('Y-m-d', $this->timeframe_end) . "'
		             AND visit_date IS NOT NULL AND follow_status = 2 ";

        //Initialize total
        $arr[5] = 0;
        foreach ($arr_row as $r_index => $row) {
            $this->sql = "SELECT COUNT(DISTINCT pid)
                            FROM " . $this->table . "
                            WHERE $row";
            if ($this->res = $db->Execute($this->sql)) {
                $this->row_elem = $this->res->FetchRow();
                $arr[$r_index] = $this->row_elem[0];
                //Sum up
                $arr[5]+=$arr[$r_index];
            } else {
                return false;
            }
        }
        return $arr;
    }

}

?>
