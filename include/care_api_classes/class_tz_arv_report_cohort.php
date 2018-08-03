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
  `--->Class Cohort_report
 */

class Cohort_report extends ARV_report {

    var $period;
    var $month;
    var $year;
    var $table;

    function Cohort_report($month, $year, $period) {
        parent::ARV_report();
        $this->month = $month;
        $this->year = $year;
        $this->table = $this->createTables(date('Y-m-d', mktime(0, 0, 0, $this->month + 3, 1, $this->year) - 86400));
        $this->period = $period;
    }

    function calc_timeframe() {
        $debug = FALSE;
        $this->timeframe_start = mktime(0, 0, 0, $this->month, 1, $this->year);
        $this->timeframe_end = mktime(0, 0, 0, $this->month + 3, 1, $this->year) - 86400;
        $this->start_timestamp = date('Y-m-d', $this->timeframe_start);
        $this->end_timestamp = date('Y-m-d', $this->timeframe_end - 86400);

        //Initial cohort
        $this->cohort_timestamp[$this->period]['baseline_start'] = mktime(0, 0, 0, $this->month - $this->period, 1, $this->year);
        $this->cohort_timestamp[$this->period]['baseline_stop'] = mktime(0, 0, 0, $this->month - $this->period + 1, 1, $this->year) - 86400;
        $this->cohort_timestamp[$this->period]['baseline_mid_start'] = mktime(0, 0, 0, $this->month - $this->period + 1, 1, $this->year);
        $this->cohort_timestamp[$this->period]['baseline_mid_stop'] = mktime(0, 0, 0, $this->month - $this->period + 2, 1, $this->year) - 86400;
        $this->cohort_timestamp[$this->period]['baseline_end_start'] = mktime(0, 0, 0, $this->month - $this->period + 2, 1, $this->year);
        $this->cohort_timestamp[$this->period]['baseline_end_stop'] = mktime(0, 0, 0, $this->month - $this->period + 3, 1, $this->year) - 86400;

        //Follow up cohort
        $this->cohort_timestamp[$this->period]['follow_up_start'] = mktime(0, 0, 0, $this->month, 1, $this->year);
        $this->cohort_timestamp[$this->period]['follow_up_stop'] = mktime(0, 0, 0, $this->month + 1, 1, $this->year) - 86400;
        $this->cohort_timestamp[$this->period]['follow_up_mid_start'] = mktime(0, 0, 0, $this->month + 1, 1, $this->year);
        $this->cohort_timestamp[$this->period]['follow_up_mid_stop'] = mktime(0, 0, 0, $this->month + 2, 1, $this->year) - 86400;
        $this->cohort_timestamp[$this->period]['follow_up_end_start'] = mktime(0, 0, 0, $this->month + 2, 1, $this->year);
        $this->cohort_timestamp[$this->period]['follow_up_end_stop'] = mktime(0, 0, 0, $this->month + 3, 1, $this->year);

        if ($debug) {
            foreach ($this->cohort_timestamp[$this->period] as $var) {
                echo date('Y-m-d', $var) . "<br>";
            }
        }
        parent::calc_timeframe();
    }

    function get_cohort_indicators() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        $this->sql = 'SELECT indicator_id, indicator_description 
                        FROM care_tz_arv_rep_nacp_coh_ind';

        if ($this->res = $db->Execute($this->sql)) {
            while ($this->row_elem = $this->res->FetchRow()) {
                $arr['indicators'][$this->row_elem[0]] = $this->row_elem[1];
            }
        }
        return $arr;
    }

    function display_cohort_ind_report($ind_id, $date1, $date2, $interval) {
        global $db;
        $debug = FALSE;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
//        echo $this->month." ".$this->year;
        //Create an array of tittles-pupulate the tittles and add them to an array
        $this->sql = "SELECT indicator_id, indicator_description, 
                        numerator_description, denominator_description 
                        FROM care_tz_arv_rep_nacp_coh_ind
                        WHERE indicator_id = $ind_id";

        if ($this->res = $db->Execute($this->sql)) {
            if ($this->res->RecordCount()) {
                while ($this->row_elem = $this->res->FetchRow()) {
                    $arr['tittles']['indic'] = $this->row_elem[1];
                    $arr['tittles']['numer'] = $this->row_elem[2];
                    $arr['tittles']['denom'] = $this->row_elem[3];
                }
            }
        }

        //print_r($this->get_months($date1, $date2));
        //Create an array of cohort columns and follow up columns
        $arr['months'] = $this->get_months($date1, $date2);
        foreach ($arr['months'] as $key => $value) {
            $arr['col'][$key . 'baseline_start'] = mktime(0, 0, 0, $this->month + $key, 1, $this->year);
            $arr['col'][$key . 'baseline_stop'] = mktime(0, 0, 0, $this->month + $key + 1, 1, $this->year) - 86400;
            $arr['col'][$key . 'follow_up_start'] = mktime(0, 0, 0, $this->month + $key + $interval, 1, $this->year);
            $arr['col'][$key . 'follow_up_stop'] = mktime(0, 0, 0, $this->month + $key + $interval + 1, 1, $this->year) - 86400;
            $arr['col'][$key . 'period_start'] = mktime(0, 0, 0, $this->month + $key + $interval / 2, 1, $this->year);
            $arr['col'][$key . 'period_stop'] = mktime(0, 0, 0, $this->month + $key + $interval + 1, 1, $this->year) - 86400;
        }

        //Column queries
        foreach ($arr['months'] as $key => $value) {
            if ($ind_id == 1) {
                $this->sql_numer = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'
                                AND visit_date >='" . date('Y-m-d', $arr['col'][$key . 'period_start']) . "'
                                AND visit_date IS NOT NULL AND (regimen = '1' OR regimen='1x') AND visit_date <= '" .
                        date('Y-m-d', $arr['col'][$key . 'period_stop']) . "'";
                if ($this->res_numer = $db->Execute($this->sql_numer)) {
                    $this->row_elem_numer = $this->res_numer->FetchRow();
                    $arr['numer'][$key] = $this->row_elem_numer[0];
                } else {
                    return FALSE;
                }
                $this->sql_denom = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'";
                if ($this->res_denom = $db->Execute($this->sql_denom)) {
                    $this->row_elem_denom = $this->res_denom->FetchRow();
                    $arr['denom'][$key] = $this->row_elem_denom[0];
                } else {
                    return FALSE;
                }
            } elseif ($ind_id == 2) {
                $this->sql_numer = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL AND follow_status != 6 AND arv_status!= 5 AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'
                                AND pid NOT IN(SELECT pid FROM " . $this->tbl_visit . "
                                WHERE visit_date >='" . date('Y-m-d', $arr['col'][$key . 'period_start']) . "'
                                AND visit_date IS NOT NULL AND (regimen = '1' OR regimen='1x') AND visit_date <= '" .
                        date('Y-m-d', $arr['col'][$key . 'period_stop']) . "')";
                if ($this->res_numer = $db->Execute($this->sql_numer)) {
                    $this->row_elem_numer = $this->res_numer->FetchRow();
                    $arr['numer'][$key] = $this->row_elem_numer[0];
                } else {
                    return FALSE;
                }
                $this->sql_denom = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'";
                if ($this->res_denom = $db->Execute($this->sql_denom)) {
                    $this->row_elem_denom = $this->res_denom->FetchRow();
                    $arr['denom'][$key] = $this->row_elem_denom[0];
                } else {
                    return FALSE;
                }
            } elseif ($ind_id == 4) {
                $this->sql_numer = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL AND follow_status != 6 AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'
                                AND visit_date >='" . date('Y-m-d', $arr['col'][$key . 'period_start']) . "'
                                AND visit_date IS NOT NULL AND (regimen = '1' OR regimen='1x') AND visit_date <= '" .
                        date('Y-m-d', $arr['col'][$key . 'period_stop']) . "'";
                if ($this->res_numer = $db->Execute($this->sql_numer)) {
                    $this->row_elem_numer = $this->res_numer->FetchRow();
                    $arr['numer'][$key] = $this->row_elem_numer[0];
                } else {
                    return FALSE;
                }
                $this->sql_denom = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL  AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'
                                AND visit_date >='" . date('Y-m-d', $arr['col'][$key . 'period_start']) . "'
                                AND visit_date IS NOT NULL AND regimen != -1 AND other_regimen!=-1 AND visit_date <= '" .
                        date('Y-m-d', $arr['col'][$key . 'period_stop']) . "'";
                if ($this->res_denom = $db->Execute($this->sql_denom)) {
                    $this->row_elem_denom = $this->res_denom->FetchRow();
                    $arr['denom'][$key] = $this->row_elem_denom[0];
                } else {
                    return FALSE;
                }
            } elseif ($ind_id == 5) {
                $this->sql_numer = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL AND follow_status != 6 AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'
                                AND visit_date >='" . date('Y-m-d', $arr['col'][$key . 'period_start']) . "'
                                AND visit_date IS NOT NULL AND regimen != -1 AND other_regimen!=-1 AND visit_date <= '" .
                        date('Y-m-d', $arr['col'][$key . 'period_stop']) . "'";
                if ($this->res_numer = $db->Execute($this->sql_numer)) {
                    $this->row_elem_numer = $this->res_numer->FetchRow();
                    $arr['numer'][$key] = $this->row_elem_numer[0];
                } else {
                    return FALSE;
                }
                $this->sql_denom = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL  AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'";
                if ($this->res_denom = $db->Execute($this->sql_denom)) {
                    $this->row_elem_denom = $this->res_denom->FetchRow();
                    $arr['denom'][$key] = $this->row_elem_denom[0];
                } else {
                    return FALSE;
                }
            } elseif ($ind_id == 6) {
                $this->sql_numer = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL AND follow_status != 6 AND arv_status!= 1 
                                AND arv_status!= 1 AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'
                                AND visit_date >='" . date('Y-m-d', $arr['col'][$key . 'period_start']) . "'
                                AND visit_date IS NOT NULL AND regimen != -1 AND other_regimen!=-1 AND visit_date <= '" .
                        date('Y-m-d', $arr['col'][$key . 'period_stop']) . "'";
                if ($this->res_numer = $db->Execute($this->sql_numer)) {
                    $this->row_elem_numer = $this->res_numer->FetchRow();
                    $arr['numer'][$key] = $this->row_elem_numer[0];
                } else {
                    return FALSE;
                }
                $this->sql_denom = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL  AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'";
                if ($this->res_denom = $db->Execute($this->sql_denom)) {
                    $this->row_elem_denom = $this->res_denom->FetchRow();
                    $arr['denom'][$key] = $this->row_elem_denom[0];
                } else {
                    return FALSE;
                }
            } elseif ($ind_id == 7) {
                $this->sql_numer = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL AND follow_status != 6 AND arv_status!= 1 
                                AND arv_status!= 1 AND age >=15 AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'
                                AND visit_date >='" . date('Y-m-d', $arr['col'][$key . 'period_start']) . "'
                                AND visit_date IS NOT NULL AND regimen != -1 AND other_regimen!=-1 AND visit_date <= '" .
                        date('Y-m-d', $arr['col'][$key . 'period_stop']) . "'";
                if ($this->res_numer = $db->Execute($this->sql_numer)) {
                    $this->row_elem_numer = $this->res_numer->FetchRow();
                    $arr['numer'][$key] = $this->row_elem_numer[0];
                } else {
                    return FALSE;
                }
                $this->sql_denom = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL  AND age >=15 AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'";
                if ($this->res_denom = $db->Execute($this->sql_denom)) {
                    $this->row_elem_denom = $this->res_denom->FetchRow();
                    $arr['denom'][$key] = $this->row_elem_denom[0];
                } else {
                    return FALSE;
                }
            } elseif ($ind_id == 8) {
                $this->sql_numer = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL AND follow_status != 6 AND arv_status!= 1 
                                AND arv_status!= 1 AND age <15 AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'
                                AND visit_date >='" . date('Y-m-d', $arr['col'][$key . 'period_start']) . "'
                                AND visit_date IS NOT NULL AND regimen != -1 AND other_regimen!=-1 AND visit_date <= '" .
                        date('Y-m-d', $arr['col'][$key . 'period_stop']) . "'";
                if ($this->res_numer = $db->Execute($this->sql_numer)) {
                    $this->row_elem_numer = $this->res_numer->FetchRow();
                    $arr['numer'][$key] = $this->row_elem_numer[0];
                } else {
                    return FALSE;
                }
                $this->sql_denom = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
                                WHERE date_start_art >='" . date('Y-m-d', $arr['col'][$key . 'baseline_start']) . "'
                                AND date_start_art IS NOT NULL  AND age <15 AND date_start_art <= '" .
                        date('Y-m-d', $arr['col'][$key . 'baseline_stop']) . "'";
                if ($this->res_denom = $db->Execute($this->sql_denom)) {
                    $this->row_elem_denom = $this->res_denom->FetchRow();
                    $arr['denom'][$key] = $this->row_elem_denom[0];
                } else {
                    return FALSE;
                }
            }
        }

//        print_r($arr['col']);
        return $arr;
    }

    function get_months($date1, $date2) {
        $time1 = strtotime($date1);
        $time2 = strtotime($date2);
        $my = date('mY', $time2);

        $months = array(date('F', $time1));

        while ($time1 < $time2) {
            $time1 = strtotime(date('Y-m-d', $time1) . ' +1 month');
            if (date('mY', $time1) != $my && ($time1 < $time2))
                $months[] = date('F', $time1);
        }

        $months[] = date('F', $time2);
        return $months;
    }

    function display_2yrs_cohort_report() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        //Create an array of cohort columns and follow up columns

        for ($i = 0; $i < 6; $i++) {     //Cohort columns
            $j = 0;
//            $k = 0;
            while ($j <= 24) {
                $arr['periods'][$i][$j] = $i . $j;
                if ($j >= 12) {
                    $j+=12;
                } else {
                    $j+=6;
                }
            }
        }
        foreach ($arr['periods'] as $key => $value) {
            foreach ($value as $col => $c_value) {
                $arr['col'][$c_value . 'baseline_start'] = mktime(0, 0, 0, $this->month + $key + $col, 1, $this->year);
                $arr['col'][$c_value . 'baseline_stop'] = mktime(0, 0, 0, $this->month + $key + $col + 1, 1, $this->year) - 86400;
            }
        }

//Rows
        $arr_row[1]['a'] = "date_start_art >= ";
        $arr_row[1]['b'] = "date_start_art <= ";
        $arr_row[2]['a'] = "create_time >= ";
        $arr_row[2]['b'] = "transfer_in_code != -1 AND create_time <= ";
        $arr_row[3]['a'] = "visit_date >= ";
        $arr_row[3]['b'] = "visit_date IS NOT NULL AND follow_status = 5 AND visit_date <= ";
        $arr_row[5]['a'] = "visit_date >= ";
        $arr_row[5]['b'] = "visit_date IS NOT NULL AND regimen = '1' AND visit_date <= ";
        $arr_row[6]['a'] = "visit_date >= ";
        $arr_row[6]['b'] = "visit_date IS NOT NULL AND regimen = '1x' AND visit_date <= ";
        $arr_row[7]['a'] = "visit_date >= ";
        $arr_row[7]['b'] = "visit_date IS NOT NULL AND "
                . "(regimen = '2' OR regimen = '2x' OR other_regimen != '-1') AND visit_date <= ";
        $arr_row[8]['a'] = "pid NOT IN (SELECT pid
      						FROM " . $this->tbl_visit . " visit, care_tz_arv_regimen reg
      						WHERE visit.care_tz_arv_visit_2_id = reg.care_tz_arv_visit_2_id
      						AND visit.visit_date>=";
        $arr_row[8]['b'] = "visit.visit_date <= ";
        $arr_row[9]['a'] = "visit_date >= ";
        $arr_row[9]['b'] = "visit_date IS NOT NULL AND (arv_status = 5 OR arv_status = -1) AND visit_date <= ";
        $arr_row[10]['a'] = "visit_date >= ";
        $arr_row[10]['b'] = "visit_date IS NOT NULL AND follow_status = 6 AND visit_date <= ";
        $arr_row[11]['a'] = "visit_date >= ";
        $arr_row[11]['b'] = "visit_date IS NOT NULL AND follow_status = 2 AND visit_date <= ";
        $arr_row[12]['a'] = "visit_date >= ";
        $arr_row[12]['b'] = "visit_date IS NOT NULL AND date_start_art IS NOT NULL " . "
                            AND follow_status != 6 AND arv_status!= 1 AND arv_status!= 5 AND arv_status!=-1 AND visit_date <= ";
        $arr_row[14]['a'] = "visit_date >= ";
        $arr_row[14]['b'] = "visit_date IS NOT NULL AND cd4_count != -1 AND visit_date <= ";
        $arr_row[15]['a'] = "visit_date >= ";
        $arr_row[15]['b'] = "visit_date <= ";
        $arr_row[16]['a'] = "visit_date >= ";
        $arr_row[16]['b'] = "visit_date IS NOT NULL AND cd4_count != -1 AND cd4_count >200 AND visit_date <= ";
        $arr_row[18]['a'] = "visit_date >= ";
        $arr_row[18]['b'] = "visit_date IS NOT NULL AND functional_status = 1 AND visit_date <= ";
        $arr_row[19]['a'] = "visit_date >= ";
        $arr_row[19]['b'] = "visit_date IS NOT NULL AND functional_status = 2 AND visit_date <= ";
        $arr_row[20]['a'] = "visit_date >= ";
        $arr_row[20]['b'] = "visit_date IS NOT NULL AND functional_status = 3 AND visit_date <= ";
        $arr_row[21]['a'] = "visit_date >= ";
        $arr_row[21]['b'] = "visit_date IS NOT NULL AND functional_status = -1 AND visit_date <= ";
        $arr_row[22]['a'] = "visit_date >= ";
//        $arr_row[22]['b'] = "visit_date IS NOT NULL AND date_start_art IS NOT NULL AND arv_status!=-1 AND visit_date <= ";
        $arr_row[22]['b'] = "visit_date IS NOT NULL AND follow_status != 6 AND arv_status!= 1 AND arv_status!= 5 AND arv_status!=-1 AND visit_date <= ";


        foreach ($arr_row as $r_index => $row) {
            foreach ($arr['periods'] as $key => $value) {
                foreach ($value as $col => $c_value) {
                    if ($r_index == 2) {
                        $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " " . $arr['col'][$c_value . 'baseline_start'] . "
                                AND " . $row['b'] . " " . $arr['col'][$c_value . 'baseline_stop'];
                        if ($this->res = $db->Execute($this->sql)) {
                            $this->row_elem = $this->res->FetchRow();
                            $arr[$r_index][$c_value] = $this->row_elem[0];
                        } else {
                            return FALSE;
                        }
                    } elseif ($r_index == 8) {
                        $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr['col'][$c_value . 'baseline_start']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr['col'][$c_value . 'baseline_stop']) . "' )" . "
                                AND visit_date >= '" . date('Y-m-d', $arr['col'][$c_value . 'baseline_start']) . "'
                                AND visit_date <= '" . date('Y-m-d', $arr['col'][$c_value . 'baseline_stop']) . "'";
                        if ($this->res = $db->Execute($this->sql)) {
                            $this->row_elem = $this->res->FetchRow();
                            $arr[$r_index][$c_value] = $this->row_elem[0];
                        } else {
                            return FALSE;
                        }
                    } elseif ($r_index == 15) {
                        $this->sql = "SELECT cd4_count 
                                FROM " . $this->table . "
                                WHERE " . $row['a'] . " '" . date('Y-m-d', $arr['col'][$c_value . 'baseline_start']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr['col'][$c_value . 'baseline_stop']) . "' 
                                AND visit_date IS NOT NULL AND cd4_count != -1";
                        if ($this->res = $db->Execute($this->sql)) {
                            $arr[$r_index][$c_value] = $this->calc_median($this->res);
//                        print_r($this->res);
                        } else {
                            return FALSE;
                        }
                    } elseif ($r_index == 22) {
                        //Get patients in the interval from baseline end to follow up stop
                        if ($col != 0) {            //Exclude cohort month
                            $this->sql1 = "SELECT DISTINCT pid
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr['col'][$key . '0baseline_stop']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr['col'][$c_value . 'baseline_stop']) . "'";
                            $i = 0;
                            $patients_array = array();
                            if ($this->res = $db->Execute($this->sql1)) {
                                while ($this->row_elem = $this->res->FetchRow()) {
                                    //Get patient's visits
                                    $this->sql2 = "SELECT COUNT(DISTINCT encounter_nr)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr['col'][$key . '0baseline_stop']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr['col'][$c_value . 'baseline_stop']) . "'
                                AND pid =" . $this->row_elem[0];

                                    if ($this->res1 = $db->Execute($this->sql2)) {
                                        $this->row_elem1 = $this->res1->FetchRow();
//                                    $pid = $this->row_elem[0];
                                        $patients_array[$this->row_elem[0]] = $this->row_elem1[0];
                                    } else {
                                        return FALSE;
                                    }

                                    $i++;
                                }
                            } else {
                                return FALSE;
                            }
//                        print_r($patients_array);
                            //Compare visits
                            $arr[$r_index][$c_value] = $this->compare_visits_months($patients_array, $col);
                        }
                    } else {
                        $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr['col'][$c_value . 'baseline_start']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr['col'][$c_value . 'baseline_stop']) . "' ";
                        if ($this->res = $db->Execute($this->sql)) {
                            $this->row_elem = $this->res->FetchRow();
                            $arr[$r_index][$c_value] = $this->row_elem[0];
                        } else {
                            return FALSE;
                        }
                    }
                }
            }
            //Compute totals rows
        }

        return $arr;
    }

    function display_6yrs_cohort_report() {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

//        create an array of periods
        $arr_periods = array();
        $i = 0;
        $j = 0;
        while ($i <= 72) {
            $arr['periods'][$i] = $i;
            if ($i >= 12) {
                $i+=12;
            } elseif ($j == 1) {
                $i = 6;
            } elseif ($j == 2) {
                $i += 6;
            }
            $j++;
        }

//Cohort columns        
        foreach ($arr['periods'] as $key => $value) {
            $arr['col'][$value . 'baseline_start'] = mktime(0, 0, 0, $this->month + $value, 1, $this->year);
            $arr['col'][$value . 'baseline_stop'] = mktime(0, 0, 0, $this->month + $value + 1, 1, $this->year) - 86400;
        }


//Rows
        $arr_row[1]['a'] = "date_start_art >= ";
        $arr_row[1]['b'] = "date_start_art <= ";
        $arr_row[2]['a'] = "create_time >= ";
        $arr_row[2]['b'] = "transfer_in_code != -1 AND create_time <= ";
        $arr_row[3]['a'] = "visit_date >= ";
        $arr_row[3]['b'] = "visit_date IS NOT NULL AND follow_status = 5 AND visit_date <= ";
        $arr_row[5]['a'] = "visit_date >= ";
        $arr_row[5]['b'] = "visit_date IS NOT NULL AND regimen = '1' AND visit_date <= ";
        $arr_row[6]['a'] = "visit_date >= ";
        $arr_row[6]['b'] = "visit_date IS NOT NULL AND regimen = '1x' AND visit_date <= ";
        $arr_row[7]['a'] = "visit_date >= ";
        $arr_row[7]['b'] = "visit_date IS NOT NULL AND "
                . "(regimen = '2' OR regimen = '2x' OR other_regimen != '-1') AND visit_date <= ";
        $arr_row[8]['a'] = "pid NOT IN (SELECT pid
      						FROM " . $this->tbl_visit . " visit, care_tz_arv_regimen reg
      						WHERE visit.care_tz_arv_visit_2_id = reg.care_tz_arv_visit_2_id
      						AND visit.visit_date>=";
        $arr_row[8]['b'] = "visit.visit_date <= ";
        $arr_row[9]['a'] = "visit_date >= ";
        $arr_row[9]['b'] = "visit_date IS NOT NULL AND (arv_status = 5 OR arv_status = -1) AND visit_date <= ";
        $arr_row[10]['a'] = "visit_date >= ";
        $arr_row[10]['b'] = "visit_date IS NOT NULL AND follow_status = 6 AND visit_date <= ";
        $arr_row[11]['a'] = "visit_date >= ";
        $arr_row[11]['b'] = "visit_date IS NOT NULL AND follow_status = 2 AND visit_date <= ";
        $arr_row[12]['a'] = "visit_date >= ";
        $arr_row[12]['b'] = "visit_date IS NOT NULL AND date_start_art IS NOT NULL " . "
                            AND follow_status != 6 AND arv_status!= 1 AND arv_status!= 5 AND arv_status!=-1 AND visit_date <= ";
        $arr_row[14]['a'] = "visit_date >= ";
        $arr_row[14]['b'] = "visit_date IS NOT NULL AND cd4_count != -1 AND visit_date <= ";
        $arr_row[15]['a'] = "visit_date >= ";
        $arr_row[15]['b'] = "visit_date <= ";
        $arr_row[16]['a'] = "visit_date >= ";
        $arr_row[16]['b'] = "visit_date IS NOT NULL AND cd4_count != -1 AND cd4_count >200 AND visit_date <= ";
        $arr_row[18]['a'] = "visit_date >= ";
        $arr_row[18]['b'] = "visit_date IS NOT NULL AND functional_status = 1 AND visit_date <= ";
        $arr_row[19]['a'] = "visit_date >= ";
        $arr_row[19]['b'] = "visit_date IS NOT NULL AND functional_status = 2 AND visit_date <= ";
        $arr_row[20]['a'] = "visit_date >= ";
        $arr_row[20]['b'] = "visit_date IS NOT NULL AND functional_status = 3 AND visit_date <= ";
        $arr_row[21]['a'] = "visit_date >= ";
        $arr_row[21]['b'] = "visit_date IS NOT NULL AND functional_status = -1 AND visit_date <= ";
        $arr_row[22]['a'] = "visit_date >= ";
//        $arr_row[22]['b'] = "visit_date IS NOT NULL AND date_start_art IS NOT NULL AND arv_status!=-1 AND visit_date <= ";
        $arr_row[22]['b'] = "visit_date IS NOT NULL AND follow_status != 6 AND arv_status!= 1 AND arv_status!= 5 AND arv_status!=-1 AND visit_date <= ";


        foreach ($arr_row as $r_index => $row) {
            foreach ($arr['periods'] as $c_index => $col) {
                if ($r_index == 2) {
                    $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " " . $arr['col'][$c_index . 'baseline_start'] . "
                                AND " . $row['b'] . " " . $arr['col'][$c_index . 'baseline_stop'];
                    if ($this->res = $db->Execute($this->sql)) {
                        if ($this->res->RecordCount()) {
                            $this->row_elem = $this->res->FetchRow();
                            $arr[$r_index][$c_index] = $this->row_elem[0];
                        }
                    } else {
                        return FALSE;
                    }
                } elseif ($r_index == 8) {
                    $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr['col'][$c_index . 'baseline_start']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr['col'][$c_index . 'baseline_stop']) . "' )" . "
                                AND visit_date >= '" . date('Y-m-d', $arr['col'][$c_index . 'baseline_start']) . "'
                                AND visit_date <= '" . date('Y-m-d', $arr['col'][$c_index . 'baseline_stop']) . "'";
                    if ($this->res = $db->Execute($this->sql)) {
                        if ($this->res->RecordCount()) {
                            $this->row_elem = $this->res->FetchRow();
                            $arr[$r_index][$c_index] = $this->row_elem[0];
                        }
                    } else {
                        return FALSE;
                    }
                } elseif ($r_index == 15) {
                    $this->sql = "SELECT cd4_count 
                                FROM " . $this->table . "
                                WHERE " . $row['a'] . " '" . date('Y-m-d', $arr['col'][$c_index . 'baseline_start']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr['col'][$c_index . 'baseline_stop']) . "' 
                                AND visit_date IS NOT NULL AND cd4_count != -1";
                    if ($this->res = $db->Execute($this->sql)) {
                        if ($this->res->RecordCount()) {
                            $arr[$r_index][$c_index] = $this->calc_median($this->res);
                        }
                    } else {
                        return FALSE;
                    }
                } elseif ($r_index == 22) {
                    //Get patients in the interval from baseline end to follow up stop
                    if ($c_index != 0) {            //Exclude cohort month
                        $this->sql1 = "SELECT DISTINCT pid
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr['col']['0baseline_stop']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr['col'][$c_index . 'baseline_stop']) . "'";
                        $i = 0;
                        $patients_array = array();
                        if ($this->res = $db->Execute($this->sql1)) {
                            while ($this->row_elem = $this->res->FetchRow()) {
                                //Get patient's visits
                                $this->sql2 = "SELECT COUNT(DISTINCT encounter_nr)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr['col']['0baseline_stop']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr['col'][$c_index . 'baseline_stop']) . "'
                                AND pid =" . $this->row_elem[0];

                                if ($this->res1 = $db->Execute($this->sql2)) {
                                    $this->row_elem1 = $this->res1->FetchRow();
//                                    $pid = $this->row_elem[0];
                                    $patients_array[$this->row_elem[0]] = $this->row_elem1[0];
                                } else {
                                    return FALSE;
                                }

                                $i++;
                            }
                        } else {
                            return FALSE;
                        }
//                        print_r($patients_array);
                        //Compare visits
                        $arr[$r_index][$c_index] = $this->compare_visits_months($patients_array, $col);
                    }
                } else {
                    $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr['col'][$c_index . 'baseline_start']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr['col'][$c_index . 'baseline_stop']) . "' ";
                    if ($this->res = $db->Execute($this->sql)) {
                        $this->row_elem = $this->res->FetchRow();
                        $arr[$r_index][$c_index] = $this->row_elem[0];
                    } else {
                        return FALSE;
                    }
                }
            }
            //Compute totals rows
        }
//        //Compute totals row 4
        return $arr;
    }

    function display_quarterly_cohort_report($count_months) {
        global $db;
        $debug = false;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

        //Initial cohort
        $arr['baseline_start'] = $this->cohort_timestamp[$this->period]['baseline_start'];
        $arr['baseline_stop'] = $this->cohort_timestamp[$this->period]['baseline_stop'];
        $arr['baseline_mid_start'] = $this->cohort_timestamp[$this->period]['baseline_mid_start'];
        $arr['baseline_mid_stop'] = $this->cohort_timestamp[$this->period]['baseline_mid_stop'];
        $arr['baseline_end_start'] = $this->cohort_timestamp[$this->period]['baseline_end_start'];
        $arr['baseline_end_stop'] = $this->cohort_timestamp[$this->period]['baseline_end_stop'];

        //Follow up cohort
        $arr['follow_up_start'] = $this->cohort_timestamp[$this->period]['follow_up_start'];
        $arr['follow_up_stop'] = $this->cohort_timestamp[$this->period]['follow_up_stop'];
        $arr['follow_up_mid_start'] = $this->cohort_timestamp[$this->period]['follow_up_mid_start'];
        $arr['follow_up_mid_stop'] = $this->cohort_timestamp[$this->period]['follow_up_mid_stop'];
        $arr['follow_up_end_start'] = $this->cohort_timestamp[$this->period]['follow_up_end_start'];
        $arr['follow_up_end_stop'] = $this->cohort_timestamp[$this->period]['follow_up_end_stop'];

//        print_r($arr);
//        $arr['baseline_start'] = $this->cohort_timestamp[$count_months]['baseline_start'];
//        $baseline_stop = $this->cohort_timestamp[$count_months]['baseline_stop'];
//        $end_cohort_start = $this->cohort_timestamp[$count_months]['end_cohort_start'];
//        $end_cohort_stop = $this->cohort_timestamp[$count_months]['end_cohort_stop'];
//Cohorts columns
        $arr_col[1]['a'] = $arr['baseline_start'];
        $arr_col[1]['b'] = $arr['baseline_stop'];
        $arr_col[2]['a'] = $arr['follow_up_start'];
        $arr_col[2]['b'] = $arr['follow_up_stop'];
        $arr_col[3]['a'] = $arr['baseline_mid_start'];
        $arr_col[3]['b'] = $arr['baseline_mid_stop'];
        $arr_col[4]['a'] = $arr['follow_up_mid_start'];
        $arr_col[4]['b'] = $arr['follow_up_mid_stop'];
        $arr_col[5]['a'] = $arr['baseline_end_start'];
        $arr_col[5]['b'] = $arr['baseline_end_stop'];
        $arr_col[6]['a'] = $arr['follow_up_end_start'];
        $arr_col[6]['b'] = $arr['follow_up_end_stop'];

//Rows
        $arr_row[1]['a'] = "date_start_art >= ";
        $arr_row[1]['b'] = "date_start_art <= ";
        $arr_row[2]['a'] = "create_time >= ";
        $arr_row[2]['b'] = "transfer_in_code != -1 AND create_time <= ";
        $arr_row[3]['a'] = "visit_date >= ";
        $arr_row[3]['b'] = "visit_date IS NOT NULL AND follow_status = 5 AND visit_date <= ";
        $arr_row[5]['a'] = "visit_date >= ";
        $arr_row[5]['b'] = "visit_date IS NOT NULL AND regimen = '1' AND visit_date <= ";
        $arr_row[6]['a'] = "visit_date >= ";
        $arr_row[6]['b'] = "visit_date IS NOT NULL AND regimen = '1x' AND visit_date <= ";
        $arr_row[7]['a'] = "visit_date >= ";
        $arr_row[7]['b'] = "visit_date IS NOT NULL AND "
                . "(regimen = '2' OR regimen = '2x' OR other_regimen != '-1') AND visit_date <= ";
        $arr_row[8]['a'] = "pid NOT IN (SELECT pid
      						FROM " . $this->tbl_visit . " visit, care_tz_arv_regimen reg
      						WHERE visit.care_tz_arv_visit_2_id = reg.care_tz_arv_visit_2_id
      						AND visit.visit_date>=";
        $arr_row[8]['b'] = "visit.visit_date <= ";
        $arr_row[9]['a'] = "visit_date >= ";
        $arr_row[9]['b'] = "visit_date IS NOT NULL AND (arv_status = 5 OR arv_status = -1) AND visit_date <= ";
        $arr_row[10]['a'] = "visit_date >= ";
        $arr_row[10]['b'] = "visit_date IS NOT NULL AND follow_status = 6 AND visit_date <= ";
        $arr_row[11]['a'] = "visit_date >= ";
        $arr_row[11]['b'] = "visit_date IS NOT NULL AND follow_status = 2 AND visit_date <= ";
        $arr_row[12]['a'] = "visit_date >= ";
        $arr_row[12]['b'] = "visit_date IS NOT NULL AND date_start_art IS NOT NULL " . "
                            AND follow_status != 6 AND arv_status!= 1 AND arv_status!= 5 AND arv_status!=-1 AND visit_date <= ";
        $arr_row[14]['a'] = "visit_date >= ";
        $arr_row[14]['b'] = "visit_date IS NOT NULL AND cd4_count != -1 AND visit_date <= ";
        $arr_row[15]['a'] = "visit_date >= ";
        $arr_row[15]['b'] = "visit_date <= ";
        $arr_row[16]['a'] = "visit_date >= ";
        $arr_row[16]['b'] = "visit_date IS NOT NULL AND cd4_count != -1 AND cd4_count >200 AND visit_date <= ";
        $arr_row[18]['a'] = "visit_date >= ";
        $arr_row[18]['b'] = "visit_date IS NOT NULL AND functional_status = 1 AND visit_date <= ";
        $arr_row[19]['a'] = "visit_date >= ";
        $arr_row[19]['b'] = "visit_date IS NOT NULL AND functional_status = 2 AND visit_date <= ";
        $arr_row[20]['a'] = "visit_date >= ";
        $arr_row[20]['b'] = "visit_date IS NOT NULL AND functional_status = 3 AND visit_date <= ";
        $arr_row[21]['a'] = "visit_date >= ";
        $arr_row[21]['b'] = "visit_date IS NOT NULL AND functional_status = -1 AND visit_date <= ";
        $arr_row[22]['a'] = "visit_date >= ";
//        $arr_row[22]['b'] = "visit_date IS NOT NULL AND date_start_art IS NOT NULL AND arv_status!=-1 AND visit_date <= ";
        $arr_row[22]['b'] = "visit_date IS NOT NULL AND follow_status != 6 AND arv_status!= 1 AND arv_status!= 5 AND arv_status!=-1 AND visit_date <= ";


        foreach ($arr_row as $r_index => $row) {
            foreach ($arr_col as $c_index => $col) {
                if ($r_index == 2) {
                    $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " " . $col['a'] . "
                                AND " . $row['b'] . " " . $col['b'];
                    if ($this->res = $db->Execute($this->sql)) {
                        $this->row_elem = $this->res->FetchRow();
                        $arr[$r_index][$c_index] = $this->row_elem[0];
                    } else {
                        return FALSE;
                    }
                } elseif ($r_index == 8) {
                    $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $col['a']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $col['b']) . "' )" . "
                                AND visit_date >= '" . date('Y-m-d', $col['a']) . "'
                                AND visit_date <= '" . date('Y-m-d', $col['b']) . "'";
                    if ($this->res = $db->Execute($this->sql)) {
                        $this->row_elem = $this->res->FetchRow();
                        $arr[$r_index][$c_index] = $this->row_elem[0];
                    } else {
                        return FALSE;
                    }
                } elseif ($r_index == 15) {
                    $this->sql = "SELECT cd4_count 
                                FROM " . $this->table . "
                                WHERE " . $row['a'] . " '" . date('Y-m-d', $col['a']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $col['b']) . "' 
                                AND visit_date IS NOT NULL AND cd4_count != -1";
                    if ($this->res = $db->Execute($this->sql)) {
                        $arr[$r_index][$c_index] = $this->calc_median($this->res);
//                        print_r($this->res);
                    } else {
                        return FALSE;
                    }
                } elseif ($r_index == 22) {
                    //Get patients in the interval from baseline start to follow up stop

                    if ($c_index % 2 == 0) {                //Exclude odd columns which are cohort month
                        $this->sql1 = "SELECT DISTINCT pid
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr_col[$c_index - 1]['b']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr_col[$c_index]['b']) . "'";
                        $i = 0;
                        $patients_array = array();
                        if ($this->res = $db->Execute($this->sql1)) {
                            while ($this->row_elem = $this->res->FetchRow()) {
                                //Get patient's visits
                                $this->sql2 = "SELECT COUNT(DISTINCT encounter_nr)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr_col[$c_index - 1]['b']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr_col[$c_index]['b']) . "'
                                AND pid =" . $this->row_elem[0];

                                if ($this->res1 = $db->Execute($this->sql2)) {
                                    $this->row_elem1 = $this->res1->FetchRow();
//                                    $pid = $this->row_elem[0];
                                    $patients_array[$this->row_elem[0]] = $this->row_elem1[0];
                                } else {
                                    return FALSE;
                                }

                                $i++;
                            }
                        } else {
                            return FALSE;
                        }
//                        print_r($patients_array);
                        //Compare visits
                        $arr[$r_index][$c_index] = $this->compare_visits_months($patients_array, $count_months);
                    }
                    //Compute total patients
                    $this->sql1 = "SELECT DISTINCT pid
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr_col[1]['b']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr_col[6]['b']) . "'";
                    $i = 0;
                    $patients_array = array();
                    if ($this->res = $db->Execute($this->sql1)) {
                        while ($this->row_elem = $this->res->FetchRow()) {
                            //Get patient's visits
                            $this->sql2 = "SELECT COUNT(DISTINCT encounter_nr)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $arr_col[1]['b']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr_col[6]['b']) . "'
                                AND pid =" . $this->row_elem[0];

                            if ($this->res1 = $db->Execute($this->sql2)) {
                                $this->row_elem1 = $this->res1->FetchRow();
//                                    $pid = $this->row_elem[0];
                                $patients_array[$this->row_elem[0]] = $this->row_elem1[0];
                            } else {
                                return FALSE;
                            }

                            $i++;
                        }
                    } else {
                        return FALSE;
                    }
//                        print_r($patients_array);
                    //Compare visits
                    $arr[$r_index][8] = $this->compare_visits_months($patients_array, $count_months);
                } else {
                    $this->sql = "SELECT COUNT(DISTINCT pid)
	                        FROM " . $this->table . "
	                        WHERE " . $row['a'] . " '" . date('Y-m-d', $col['a']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $col['b']) . "' ";
                    if ($this->res = $db->Execute($this->sql)) {
                        $this->row_elem = $this->res->FetchRow();
                        $arr[$r_index][$c_index] = $this->row_elem[0];
                    } else {
                        return FALSE;
                    }
                }
            }
            //Compute totals rows
            if ($r_index == 15) {
                $this->sql_col7 = "SELECT cd4_count 
                                FROM " . $this->table . "
                                WHERE " . $row['a'] . " '" . date('Y-m-d', $arr_col[1]['a']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr_col[5]['b']) . "' 
                                AND visit_date IS NOT NULL AND cd4_count != -1";
                if ($this->res = $db->Execute($this->sql_col7)) {
                    $arr[$r_index][7] = $this->calc_median($this->res);
//                        print_r($this->res);
                } else {
                    return FALSE;
                }

                $this->sql_col8 = "SELECT cd4_count 
                                FROM " . $this->table . "
                                WHERE " . $row['a'] . " '" . date('Y-m-d', $arr_col[2]['a']) . "'
                                AND " . $row['b'] . " '" . date('Y-m-d', $arr_col[6]['b']) . "' 
                                AND visit_date IS NOT NULL AND cd4_count != -1";
                if ($this->res = $db->Execute($this->sql_col8)) {
                    $arr[$r_index][8] = $this->calc_median($this->res);
//                        print_r($this->res);
                } else {
                    return FALSE;
                }
            } else if ($r_index != 22) {
                $arr[$r_index][7] = $arr[$r_index][1] + $arr[$r_index][3] + $arr[$r_index][5];
                $arr[$r_index][8] = $arr[$r_index][2] + $arr[$r_index][4] + $arr[$r_index][6];
            }
        }
        //Compute totals row 4
        $arr[4][1] = $arr[1][1] + $arr[2][1] - $arr[3][1];
        $arr[4][2] = $arr[1][2] + $arr[2][2] - $arr[3][2];
        $arr[4][3] = $arr[1][3] + $arr[2][3] - $arr[3][3];
        $arr[4][4] = $arr[1][4] + $arr[2][4] - $arr[3][4];
        $arr[4][5] = $arr[1][5] + $arr[2][5] - $arr[3][5];
        $arr[4][6] = $arr[1][6] + $arr[2][6] - $arr[3][6];
        $arr[4][7] = $arr[1][7] + $arr[2][7] - $arr[3][7];
        $arr[4][8] = $arr[1][8] + $arr[2][8] - $arr[3][8];

        return $arr;
    }

}

?>
