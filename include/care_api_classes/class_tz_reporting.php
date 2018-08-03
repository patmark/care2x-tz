<?php
/**
 * Care2x API package
 * @package care_api
 */
/**
 * selian reporting methods.
 * Note this class should be instantiated only after a "$db" adodb  connector object
 * has been established by an adodb instance
 * @author Robert Meggle (www.MEROTECH.de: meggle@merotech.de)
 * @version beta 0.0.1
 * @copyright 2006 Robert Meggle, based on the development of Elpidio Latorilla
 * @package care_api
 */
/*
  Modified by Moye Masenga
  06-04-2011
 */

require_once($root_path . 'include/care_api_classes/class_tz_billing.php');

/**
 * Include the class_report if it�s not done so far...
 */
require_once($root_path . 'include/care_api_classes/class_report.php');

/**
 * Class and its members..
 */
class selianreport extends report {

    /**
     * constructor
     */
    function class_selianreport() {
        global $db;
        $this->debug = FALSE;
        $this->debug == TRUE ? $db->debug = TRUE : $db->debug = FALSE;
    }

    function GetPIDOfLaspedContract($days = '') {
        global $db;
        $rep_obj = new report();
        $tmp_reporting_table_1 = $rep_obj->SetReportingLink('care_tz_insurance', 'PID', 'care_person', 'pid');
        $tmp_reporting_table_2 = $rep_obj->TMP_GroupBy($tmp_reporting_table_1, 'care_tz_insurance_PID');
        $rep_obj->DisconnectReportingTable($tmp_reporting_table_1);

        $now = time();
        $seconds = $days * 24 * 60;
        $asked_time = $now - $seconds;

        $this->setTable($tmp_reporting_table_2);
        $this->sql = "SELECT selian_pid, date_reg, name_first, name_2, name_3, name_middle, name_last, name_maiden, name_others FROM $this->coretable WHERE end_date < $asked_time";
        $mysql_ptr = $db->Execute($this->sql);
    }

    //------------------------------------------------------------------------------------------------------------------------
//This function is completely re-rewritten by Israel Pascal
    function Display_OPD_Diagnostic($start, $end) {
        global $db;
        global $PRINTOUT;
        global $LDNoDiagnosticsResults;
        $rep_obj = new selianreport();
        $debug = FALSE;
        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
        $sql_timeframe = "  ( timestamp>=" . $start . " AND timestamp<=" . $end . ") ";

//echo 'PUT INDEX IN THE ICD_10_code IF THIS REPORT IS SLOW';
//count all
        $sql_count = "SELECT diag.ICD_10_code, DATE_FORMAT( cp.date_birth, '%Y' ) AS TAREHE,  diag.ICD_10_description, count(*) AS TOTAL FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid WHERE $sql_timeframe  GROUP BY  diag.`ICD_10_code`";
        $count_result = $db->Execute($sql_count);

        $data = array();
        while ($rows = $count_result->FetchRow()) {
            $data['count'][] = $rows;
        }
        $count1 = count($data['count']);
        $count = $count1 - 1;

        for ($i = 0; $i <= $count; $i++) {
            $diagnostic_code = $data['count'][$i]['ICD_10_code'];




//under age count
            $sql_under_age = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_UNDER_AGE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid WHERE (DATE_FORMAT( NOW( ) , '%Y' ) - DATE_FORMAT( cp.date_birth, '%Y' ) ) <5 AND $sql_timeframe AND diag.ICD_10_code='$diagnostic_code'";
            $under_age_result = $db->Execute($sql_under_age);



//over age count
            $sql_over_age = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_OVER_AGE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid WHERE (DATE_FORMAT( NOW( ) , '%Y' ) - DATE_FORMAT( cp.date_birth, '%Y' ) ) >=5 AND $sql_timeframe AND diag.ICD_10_code='" . $diagnostic_code . "'";
            $over_age_result = $db->Execute($sql_over_age);

//Male count
            $sql_male = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_MALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid WHERE cp.sex='m' AND $sql_timeframe  AND diag.`ICD_10_code`='" . $diagnostic_code . "'";
            $male_result = $db->Execute($sql_male);

//Female count
            $sql_female = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_FEMALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid WHERE cp.sex='f' AND $sql_timeframe  AND diag.`ICD_10_code`='" . $diagnostic_code . "'";
            $female_result = $db->Execute($sql_female);


            $rows_under_age = $under_age_result->FetchRow();
            $rows_over_age = $over_age_result->FetchRow();
            $rows_male = $male_result->FetchRow();
            $rows_female = $female_result->FetchRow();
            $rows_total = $count_result->FetchRow();
            ?>
            <tr>
                <?php echo '<td>' . $data['count'][$i]['ICD_10_code'] . '</td><td>' . $data['count'][$i]['ICD_10_description'] . '</td><td>' . $rows_under_age['TOTAL_UNDER_AGE'] . '</td><td>' . $rows_over_age['TOTAL_OVER_AGE'] . '</td><td>' . $rows_male['TOTAL_MALE'] . '</td><td>' . $rows_female['TOTAL_FEMALE'] . '</td><td>' . $data['count'][$i]['TOTAL'] . '</td>'; ?>
            <tr>
                <?php
            }





            return 1;
        }

//-----------------------------------------------------------------------------
        function Display_OPD_ICD10($start_timeframe, $end_timeframe) {
            global $db;
            global $PRINTOUT;
            global $LDNoDiagnosticsResults;

            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            if ($this->_Create_Diagnostics_table($start_timeframe, $end_timeframe, '2', $is_entered)) {

                $this->_Create_patients_table($start_timeframe, $end_timeframe, '2');

                // get the Diagnostic-Codes, Diagnostic-full-name and total out of this table:
                $sql = "SELECT ICD_10_code, ICD_10_description, UNIX_TIMESTAMP(date_birth) as date_birth
				FROM tmp_diagnostics INNER JOIN tmp_patients ON tmp_diagnostics.pid = tmp_patients.pid 
				group by ICD_10_code";

                if ($rs_ptr = $db->Execute($sql))
                    $res_array = $rs_ptr->GetArray();


                $SHOW_COLORS = $printout ? TRUE : FALSE;
                $bg_col_marker = TRUE;

                while (list ($i, $v) = each($res_array)) {
                    if ($SHOW_COLORS) {
                        if ($bg_col_marker) {
                            echo "<tr bgcolor=#ffffaa>";
                            $bg_col_marker = FALSE;
                        } else {
                            echo "<tr bgcolor=#ffffdd>";
                            $bg_col_marker = TRUE;
                        }
                    }
                    $icd_10_code = $v['ICD_10_code'];
                    $icd_10_description = $v['ICD_10_description'];
                    echo "<td>$icd_10_code</td>";
                    echo "<td>$icd_10_description</td>";

                    $arr_diagnosis = $this->Get_Diagnoses_Count($icd_10_code);

                    $diag_total = $arr_diagnosis['underage']['total'] + $arr_diagnosis['underyr']['total'] + $arr_diagnosis['under5']['total'] + $arr_diagnosis['over5']['total'];

                    echo '<td bgcolor="#ffffaa">' . $arr_diagnosis['underage']['male'] . '</td>
			  <td bgcolor="#ffffaa">' . $arr_diagnosis['underage']['female'] . '</td>
		      <td bgcolor="#ffffaa">' . $arr_diagnosis['underage']['total'] . '</td>';

                    echo '<td>' . $arr_diagnosis['underyr']['male'] . '</td>
			  <td>' . $arr_diagnosis['underyr']['female'] . '</td>
		      <td>' . $arr_diagnosis['underyr']['total'] . '</td>';

                    echo '<td bgcolor="#ffffaa">' . $arr_diagnosis['under5']['male'] . '</td>
		      <td bgcolor="#ffffaa">' . $arr_diagnosis['under5']['female'] . '</td>
		      <td bgcolor="#ffffaa">' . $arr_diagnosis['under5']['total'] . '</td>';

                    echo '<td>' . $arr_diagnosis['over5']['male'] . '</td>
		      <td>' . $arr_diagnosis['over5']['female'] . '</td>
		      <td>' . $arr_diagnosis['over5']['total'] . '</td>';

                    echo '<td bgcolor="#ffffaa">' . $diag_total . '</td>';

                    echo '</tr>';
                }
                $this->DisconnectReportingTable('tmp_diagnostics');
                $this->DisconnectReportingTable('tmp_patients');

                return 1;
            } else {
                echo "<font color=\"red\">" . $LDNoDiagnosticsResults . "</font><br><br>";
            }
        }

//-----------------------------------------------------------------------------
        //This function is completely re-rewritten by Israel Pascal & modified by Mark Patrick
        function Display_OPD_Diagnostic_month($start, $end,$admission_nr,$insurance,$current_ward_nr,$dept_nr) {
           // echo 'start date'.$start.'<br>';
           // echo 'end date'.$end;
            global $db;
            global $PRINTOUT;
            global $LDNoDiagnosticsResults,$LDhf;
//            $rep_obj = new selianreport();
            $debug = false;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql_timeframe = "  ( timestamp>=" . $start . " AND timestamp<=" . $end . ") ";
            $sql_time_no_stamp_start = date("Y-m-d", $start);
            $sql_time_no_stamp_end = date("Y-m-d", $end);

            //echo $sql_time_no_stamp_start.'<br>';

            $month_start = date("n", $start);
            $year_start = date("Y", $start);
            $d = cal_days_in_month(CAL_GREGORIAN, $month_start, $year_start);



//GET VALUE FOR HEALTH FUND AND DEPARTMENT

          

        
        if (isset($_POST['show']) || isset($PRINTOUT)) {
            //print_r($_POST);
            //echo $adm_nr;
            //echo $insurance;

            //start checking admission id

            // if ($PRINTOUT) {
            //   echo $admission_id;
            //   echo $current_ward_nr;
            //   echo $dept_nr;

                               
            // }




            switch ($admission_nr) {
                case ' all_opd_ipd':
                    $idara='';
                    $LDidara='IN AND OUT PATIENT';
                    break;
                case '1':
                        if ($current_ward_nr=='all_ipd') {
                            $idara="AND encounter_class_nr=".'1';
                            $LDidara='INPATIENT';

                        }else{
                            $idara="AND current_ward_nr=".$current_ward_nr;
                            $this->sql='SELECT ward_id FROM care_ward WHERE nr='.$current_ward_nr;
                            $this->result=$db->Execute($this->sql);
                            $LDidara=$this->result->FetchRow();
                            $LDidara=$LDidara['ward_id'];



                        }
                        break; 

                case '2':
                        if ($dept_nr=='all_opd') {
                            $idara="AND encounter_class_nr=".'2';
                            $LDidara='OUTPATIENT';
                        }else{
                            $idara="AND current_dept_nr=".$dept_nr;
                            $this->sql='SELECT name_formal FROM care_department WHERE nr='.$dept_nr;
                            $this->result=$db->Execute($this->sql);
                            $LDidara=$this->result->FetchRow();
                            $LDidara=$LDidara['name_formal'];


                        }
                               # code...
                               break;           
                
                default:
                $idara='';
                    
                    break;
            }//end checking admission

            //start checking insurance 



            switch ($insurance) {
                case '-2':
                    $hf='';
                    $LDhf='ALL COMPANIES';
                    break;

                case '0':
                        $hf="AND insurance_ID=".'0';
                        $LDhf='CASH';

                        break;    
                
                default:
                    $hf="AND insurance_ID=".$insurance;
                    $this->sql="SELECT name FROM care_tz_company WHERE id=".$insurance;
                    $this->result=$db->Execute($this->sql);
                    $LDhf=$this->result->FetchRow();
                    $LDhf=$LDhf['name'];


                    break;
            }//end checking insurance



        }




        


//echo 'PUT INDEX IN THE ICD_10_code IF THIS REPORT IS SLOW';
//Total OPD under month male
//count all
            $sql_count = "SELECT diag.ICD_10_code, DATE_FORMAT(cp.date_birth, '%Y') AS TAREHE,  diag.ICD_10_description, count(*) AS TOTAL FROM care_tz_diagnosis diag INNER JOIN care_person cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr  WHERE $sql_timeframe  $hf $idara  GROUP BY  diag.`ICD_10_description` ORDER BY diag.`ICD_10_code`";

            //echo $sql_count;
            $count_result = $db->Execute($sql_count);

//echo '<tr>';
//echo '<td colspan="2">'.TOTAL OPD PATIENTS.'<td>'.$OPD_under_month_male_count.'</td><td>'.$OPD_under_month_female_count.'</td><td>'.$OPD_under_month_male_count+$OPD_under_month_female_count.'</td><td>'.$OPD_month_to_under_yr_male_count.'</td><td>'.$OPD_month_to_under_yr_female_count.'</td><td>'.$OPD_month_to_under_yr_male_count+$OPD_month_to_under_yr_female_count.'</td><td>'.$OPD_yr_to_under_5yrs_male_count.'</td><td>'.$OPD_yr_to_under_5yrs_female_count.'</td><td>'.$OPD_yr_to_under_5yrs_male_count+$OPD_yr_to_under_5yrs_female_count.'</td><td>'.$OPD_over_5yrs_male_count.'</t><td>'.$OPD_over_5yrs_female_count.'</td><td>'.$OPD_over_5yrs_male_count+$OPD_over_5yrs_female_count.'</td>';
//echo '</tr>';
            ?>
            <!--
            <tr><td colspan="2">TOTAL OPD PATIENT</td><td><?php // echo $OPD_under_month_male_count; ?></td><td><?php echo $OPD_under_month_female_count; ?></td><td><?php echo $OPD_under_month_male_count + $OPD_under_month_female_count; ?></td><td><?php echo $OPD_month_to_under_yr_male_count; ?></td><td><?php echo $OPD_month_to_under_yr_female_count; ?></td><td><?php echo $OPD_month_to_under_yr_male_count + $OPD_month_to_under_yr_female_count; ?></td><td><?php echo $OPD_yr_to_under_5yrs_male_count; ?></td><td><?php echo $OPD_yr_to_under_5yrs_female_count; ?></td><td><?php echo $OPD_yr_to_under_5yrs_male_count + $OPD_yr_to_under_5yrs_female_count; ?></td><td><?php echo $OPD_over_5yrs_male_count; ?></td><td><?php echo $OPD_over_5yrs_female_count; ?></td><td><?php echo $OPD_over_5yrs_male_count + $OPD_over_5yrs_female_count; ?></td></tr>
            -->
            <?php
            $data = array();
            while ($rows = $count_result->FetchRow()) {
                $data['count'][] = $rows;
            }
            $count1 = count($data['count']);
            $count = $count1 - 1;

            for ($i = 0; $i <= $count; $i++) {
                $diagnostic_code = $data['count'][$i]['ICD_10_code'];


//under one month male
                $sql_under_month_male = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_UNDER_MONTH_MALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr WHERE timestampdiff(DAY,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) <$d AND $sql_timeframe $hf $idara AND cp.sex='m' AND diag.ICD_10_code='$diagnostic_code' ORDER BY ICD_10_code ";


                $under_month_male_result = $db->Execute($sql_under_month_male);

//under one month female
                $sql_under_month_female = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_UNDER_MONTH_FEMALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr  WHERE timestampdiff(DAY,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) <$d AND $sql_timeframe $hf $idara AND cp.sex='f' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code";
                $under_month_female_result = $db->Execute($sql_under_month_female);

//one month to under year male
                $sql_month_to_under_yr_male = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_MONTH_TO_UNDER_YR_MALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr WHERE timestampdiff(MONTH,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) >=1 AND timestampdiff(MONTH,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) <12 AND $sql_timeframe $hf $idara AND cp.sex='m' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code";
                $month_to_under_yr_male_result = $db->Execute($sql_month_to_under_yr_male);

//one month to under year female
                $sql_month_to_under_yr_female = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_MONTH_TO_UNDER_YR_FEMALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr WHERE timestampdiff(MONTH,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) >=1 AND timestampdiff(MONTH,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) <12 AND $sql_timeframe $hf $idara AND cp.sex='f' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code";
                $month_to_under_yr_female_result = $db->Execute($sql_month_to_under_yr_female);

//year to under 5years male
                $sql_yr_to_under_5yrs_male = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_YR_TO_UNDER_5YRS_MALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr WHERE timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) >=1 AND timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) <5  AND $sql_timeframe $hf $idara AND cp.sex='m' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code"; 
                $yr_to_under_5yrs_male_result = $db->Execute($sql_yr_to_under_5yrs_male);

//year to under 5years female
                $sql_yr_to_under_5yrs_female = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_YR_TO_UNDER_5YRS_FEMALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr WHERE timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) >=1 AND timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) <5 AND $sql_timeframe $hf $idara AND cp.sex='f' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code";
                $yr_to_under_5yrs_female_result = $db->Execute($sql_yr_to_under_5yrs_female);

//5 yrs and above male
                // $sql_5yrs_and_above_male = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_5YRS_AND_ABOVE_MALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid WHERE timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) >=5 AND $sql_timeframe AND cp.sex='m' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code";
                //$over_or_equal_to_5yrs_male_result = $db->Execute($sql_5yrs_and_above_male);
//5 yrs and above female
                //$sql_5yrs_and_above_female = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_5YRS_AND_ABOVE_FEMALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid WHERE timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) >=5 AND $sql_timeframe AND cp.sex='f' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code";
                //$over_or_equal_to_5yrs_female_result = $db->Execute($sql_5yrs_and_above_female);
//60 yrs and above male
                $sql_60yrs_and_above_male = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_60YRS_AND_ABOVE_MALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr WHERE timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) >=60 AND $sql_timeframe $hf $idara AND cp.sex='m' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code"; 


                $over_or_equal_to_60yrs_male_result = $db->Execute($sql_60yrs_and_above_male);

//60 yrs and above female
                $sql_60yrs_and_above_female = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_60YRS_AND_ABOVE_FEMALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr WHERE timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) >=60 AND $sql_timeframe $hf $idara AND cp.sex='f' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code";
                $over_or_equal_to_60yrs_female_result = $db->Execute($sql_60yrs_and_above_female);

//5years to under 60years male
                $sql_5yrs_to_under_60yrs_male = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_5YRS_TO_UNDER_60YRS_MALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr WHERE timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) >=5 AND timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) <60  AND $sql_timeframe $hf $idara AND cp.sex='m' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code";
                $yrs5_to_under_60yrs_male_result = $db->Execute($sql_5yrs_to_under_60yrs_male);

//5years to under 60years female
                $sql_5yrs_to_under_60yrs_female = "SELECT diag.ICD_10_code,  diag.ICD_10_description, count(*) AS TOTAL_5YRS_TO_UNDER_60YRS_FEMALE FROM care_tz_diagnosis AS diag INNER JOIN care_person AS cp   ON diag.PID=cp.pid INNER JOIN care_encounter ce ON ce.encounter_nr=diag.encounter_nr WHERE timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) >=5 AND timestampdiff(YEAR,DATE_FORMAT(cp.date_birth,'%Y-%m-%d'),DATE_FORMAT(NOW(),'%Y-%m-%d')) <60 AND $sql_timeframe $hf $idara AND cp.sex='f' AND diag.ICD_10_code='" . $diagnostic_code . "' ORDER BY ICD_10_code";
                $yrs5_to_under_60yrs_female_result = $db->Execute($sql_5yrs_to_under_60yrs_female);




                $rows_under_month_male = $under_month_male_result->FetchRow();
                $rows_under_month_female = $under_month_female_result->FetchRow();
                $rows_month_to_under_yr_male = $month_to_under_yr_male_result->FetchRow();
                $rows_month_to_under_yr_female = $month_to_under_yr_female_result->FetchRow();
                $rows_yr_to_under_5yrs_male = $yr_to_under_5yrs_male_result->FetchRow();
                $rows_yr_to_under_5yrs_female = $yr_to_under_5yrs_female_result->FetchRow();
                //$rows_over_or_equal_to_5yrs_male = $over_or_equal_to_5yrs_male_result->FetchRow();
                //$rows_over_or_equal_to_5yrs_female = $over_or_equal_to_5yrs_female_result->FetchRow();
                $rows_over_or_equal_to_60yrs_male = $over_or_equal_to_60yrs_male_result->FetchRow();
                $rows_over_or_equal_to_60yrs_female = $over_or_equal_to_60yrs_female_result->FetchRow();
                $rows_5yrs_to_under_60yrs_male = $yrs5_to_under_60yrs_male_result->FetchRow();
                $rows_5yrs_to_under_60yrs_female = $yrs5_to_under_60yrs_female_result->FetchRow();


                $total_under_month_male_female = $rows_under_month_male['TOTAL_UNDER_MONTH_MALE'] + $rows_under_month_female['TOTAL_UNDER_MONTH_FEMALE'];
                $total_month_to_under_yr_male_female = $rows_month_to_under_yr_male['TOTAL_MONTH_TO_UNDER_YR_MALE'] + $rows_month_to_under_yr_female['TOTAL_MONTH_TO_UNDER_YR_FEMALE'];
                $total_yr_to_under_5yrs_male_female = $rows_yr_to_under_5yrs_male['TOTAL_YR_TO_UNDER_5YRS_MALE'] + $rows_yr_to_under_5yrs_female['TOTAL_YR_TO_UNDER_5YRS_FEMALE'];
                //$total_over_or_equal_to_5yrs_male_female = $rows_over_or_equal_to_5yrs_male['TOTAL_5YRS_AND_ABOVE_MALE'] + $rows_over_or_equal_to_5yrs_female['TOTAL_5YRS_AND_ABOVE_FEMALE'];
                $total_over_or_equal_to_60yrs_male_female = $rows_over_or_equal_to_60yrs_male['TOTAL_60YRS_AND_ABOVE_MALE'] + $rows_over_or_equal_to_60yrs_female['TOTAL_60YRS_AND_ABOVE_FEMALE'];
                $total_5yrs_to_under_60yrs_male_female = $rows_5yrs_to_under_60yrs_male['TOTAL_5YRS_TO_UNDER_60YRS_MALE'] + $rows_5yrs_to_under_60yrs_female['TOTAL_5YRS_TO_UNDER_60YRS_FEMALE'];

                $total_for_all = $total_5yrs_to_under_60yrs_male_female + $total_over_or_equal_to_60yrs_male_female + $total_under_month_male_female + $total_month_to_under_yr_male_female + $total_yr_to_under_5yrs_male_female + $total_over_or_equal_to_5yrs_male_female;
                ?>
            <tr>
                <?php
                echo '<td>' . $data['count'][$i]['ICD_10_code'] . '</td><td>' . $data['count'][$i]['ICD_10_description'] . '</td><td align="center">' . $rows_under_month_male['TOTAL_UNDER_MONTH_MALE'] . '</td><td align="center">' . $rows_under_month_female['TOTAL_UNDER_MONTH_FEMALE'] . '</td><td align="center">' . $total_under_month_male_female . '</td>'
                . '<td align="center">' . $rows_month_to_under_yr_male['TOTAL_MONTH_TO_UNDER_YR_MALE'] . '</td><td align="center">' . $rows_month_to_under_yr_female['TOTAL_MONTH_TO_UNDER_YR_FEMALE'] . '</td><td align="center">' . $total_month_to_under_yr_male_female . '</td>'
                . '<td align="center">' . $rows_yr_to_under_5yrs_male['TOTAL_YR_TO_UNDER_5YRS_MALE'] . '</td><td align="center">' . $rows_yr_to_under_5yrs_female['TOTAL_YR_TO_UNDER_5YRS_FEMALE'] . '</td><td align="center">' . $total_yr_to_under_5yrs_male_female . '</td>'
                . '<td align="center">' . $rows_5yrs_to_under_60yrs_male['TOTAL_5YRS_TO_UNDER_60YRS_MALE'] . '</td><td align="center">' . $rows_5yrs_to_under_60yrs_female['TOTAL_5YRS_TO_UNDER_60YRS_FEMALE'] . '</td><td align="center">' . $total_5yrs_to_under_60yrs_male_female . '</td>'
                . '<td align="center">' . $rows_over_or_equal_to_60yrs_male['TOTAL_60YRS_AND_ABOVE_MALE'] . '</td><td align="center">' . $rows_over_or_equal_to_60yrs_female['TOTAL_60YRS_AND_ABOVE_FEMALE'] . '</td><td align="center">' . $total_over_or_equal_to_60yrs_male_female . '</td>'
                . '<td align="center">' . $total_for_all . '</td>';
                ?>
            <tr>
                <?php
            }

            return 1;
        }

        //------------------------------------------------------------------------------------------------------------------------
        function Display_OPD_Summary($start, $end) {
            global $db;

            $WITH_TIMEFRAME = FALSE;

            if (func_num_args()) {

                $start = func_get_arg(0);
                $end = func_get_arg(1);
                $WITH_TIMEFRAME = TRUE;
            }


            $rep_obj = new selianreport();

            $tmp_tbl_OPD_summary = $rep_obj->SetReportingLink('care_person', 'pid', 'care_tz_diagnosis', 'PID');
            //$tmp_tbl_allpatients = $rep_obj -> SetReportingTable('care_person');

            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $arr_ret['return']['underage'];
            $arr_ret['return']['adult'];
            $arr_ret['return']['male'];
            $arr_ret['return']['female'];
            $arr_ret['return']['total'];

            $arr_ret['NewRegistration']['underage'];
            $arr_ret['NewRegistration']['adult'];
            $arr_ret['NewRegistration']['male'];
            $arr_ret['NewRegistration']['female'];
            $arr_ret['NewRegistration']['total'];

            $arr_ret['Total']['underage'];
            $arr_ret['Total']['adult'];
            $arr_ret['Total']['male'];
            $arr_ret['Total']['female'];
            $arr_ret['Total']['total'];

            $arr_ret['Total_Pedriatics']['underage'];

            $arr_ret['revisit']['underage'];
            $arr_ret['revisit']['adult'];
            $arr_ret['revisit']['male'];
            $arr_ret['revisit']['female'];
            $arr_ret['revisit']['total'];

            /*             * **************************************************************************************************
             *  Revisit�s under 5
             */

            $sql = "SELECT count(*) AS return_underage FROM $tmp_tbl_OPD_summary
					   WHERE type='new' AND UNIX_TIMESTAMP(date_birth) > (UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))) ";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";
            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['return']['underage'] = $row['return_underage'];

            /**
             * Total revisits
             */
            $sql = "SELECT count(*) AS total FROM $tmp_tbl_OPD_summary
					   WHERE type='new'";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['return']['total'] = $row['total'];

            /**
             * Revist�s over 5
             */
            $arr_ret['return']['adult'] = $arr_ret['return']['total'] - $arr_ret['return']['underage'];

            /**
             * Total male revisits
             */
            $sql = "SELECT count(*) AS male FROM $tmp_tbl_OPD_summary
					   WHERE type='new' and sex='m'";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['return']['male'] = $row['male'];

            /**
             * Total female revisits
             */
            $sql = "SELECT count(*) AS female FROM $tmp_tbl_OPD_summary
					   WHERE type='new' and sex='f'";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['return']['female'] = $row['female'];


            /*             * **************************************************************************************************
             *  New Registration�s under 5
             */

            $sql = "SELECT count(*) AS return_underage FROM $tmp_tbl_OPD_summary
					   WHERE type='new patient' AND UNIX_TIMESTAMP(date_birth) > (UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)))";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['NewRegistration']['underage'] = $row['return_underage'];

            /**
             * Total New Registration
             */
            $sql = "SELECT count(*) AS Total FROM $tmp_tbl_OPD_summary
					   WHERE type='new patient' ";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['NewRegistration']['total'] = $row['Total'];

            /**
             * New Registration�s over 5
             */
            $arr_ret['NewRegistration']['adult'] = $arr_ret['NewRegistration']['total'] - $arr_ret['NewRegistration']['underage'];

            /**
             * Total male New Registration
             */
            $sql = "SELECT count(*) AS male FROM $tmp_tbl_OPD_summary
					   WHERE type='new patient' and sex='m'";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['NewRegistration']['male'] = $row['male'];

            /**
             * Total female New Registration
             */
            $sql = "SELECT count(*) AS female FROM $tmp_tbl_OPD_summary
					   WHERE type='new patient'  and sex='f'";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['NewRegistration']['female'] = $row['female'];

            /*             * **************************************************************************************************
             *  Total Registration�s under 5
             */

            $sql = "SELECT count(*) AS Total_underage FROM $tmp_tbl_OPD_summary
					   WHERE UNIX_TIMESTAMP(date_birth) > (UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)))";
            if ($WITH_TIMEFRAME)
                $sql.=" AND (timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['Total']['underage'] = $row['Total_underage'];

            /**
             * Total New Registration
             */
            $sql = "SELECT count(*) AS Total FROM $tmp_tbl_OPD_summary ";
            if ($WITH_TIMEFRAME)
                $sql.=" WHERE ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['Total']['total'] = $row['Total'];

            /**
             * New Registration�s over 5
             */
            $arr_ret['Total']['adult'] = $arr_ret['Total']['total'] - $arr_ret['Total']['underage'];

            /**
             * Total male New Registration
             */
            $sql = "SELECT count(*) AS Total_male FROM $tmp_tbl_OPD_summary
					   WHERE sex='m'";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['Total']['male'] = $row['Total_male'];

            /**
             * Total female New Registration
             */
            $sql = "SELECT count(*) AS Total_female FROM $tmp_tbl_OPD_summary
					   WHERE sex='f'";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['Total']['female'] = $row['Total_female'];

            /**
             * **************************************************************************************************
             * Total Pedriatics
             */
            $sql = "SELECT count(*) AS Total_underage FROM $tmp_tbl_OPD_summary
					   WHERE UNIX_TIMESTAMP(date_birth) > (UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)))";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";

            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['Total_Pedriatics']['underage'] = $row['Total_underage'];

            /*             * **************************************************************************************************
             *  Views for the same reasons:
             */

            $sql = "SELECT count(*) AS return_underage FROM $tmp_tbl_OPD_summary
					   WHERE type='revisit' AND UNIX_TIMESTAMP(date_birth) > (UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)))
		       ";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";


            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['revisit']['underage'] = (empty($row['return_underage'])) ? 0 : $row['return_underage'];
            //$arr_ret['revisit']['underage'] =  $row['return_underage'];

            /**
             * Total revisits
             */
            $sql = "SELECT count(*) AS total FROM $tmp_tbl_OPD_summary
					   WHERE type='revisit'";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";
            $sql .= " GROUP BY ICD_10_code";


            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['revisit']['total'] = (empty($row['total'])) ? 0 : $row['total'];

            /**
             * Revist�s over 5
             */
            $arr_ret['revisit']['adult'] = $arr_ret['revisit']['total'] - $arr_ret['revisit']['underage'];

            /**
             * Total male revisits
             */
            $sql = "SELECT count(*) AS male FROM $tmp_tbl_OPD_summary
					   WHERE type='revisit' and sex='m'";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";
            $sql .= " GROUP BY ICD_10_code";


            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['revisit']['male'] = (empty($row['male'])) ? 0 : $row['male'];

            /**
             * Total female revisits
             */
            $sql = "SELECT count(*) AS female FROM $tmp_tbl_OPD_summary
					   WHERE type='revisit' and sex='f'";
            if ($WITH_TIMEFRAME)
                $sql.=" AND ( timestamp>=" . $start . " AND timestamp<=" . $end . ")";
            $sql .= " GROUP BY ICD_10_code";


            $rs_ptr = $db->Execute($sql);
            $row = $rs_ptr->FetchRow();
            $arr_ret['revisit']['female'] = (empty($row['female'])) ? 0 : $row['female'];

            $rep_obj->DisconnectReportingTable($tmp_tbl_OPD_summary);

            return $arr_ret;
        }

        //------------------------------------------------------------------------------------------------------------------------
        /**
         * Laboratory-Section
         */
        //------------------------------------------------------------------------------------------------------------------------

        function GetAllLaboratorySections() {
            
        }

        //------------------------------------------------------------------------------------------------------------------------
        function Display_Billing_Summary() {
            
        }

        //------------------------------------------------------------------------------------------------------------------------
        /**
         * Billing-Section
         */
        //--
        function DisplayBillingTableHead() {
            global $PRINTOUT;
            global $LDDailyFinancialRecord, $LDDate, $LDAdvance, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg,
            $LDImaging, $LDOther, $LDTotal;

            // Table definition will be organized by the variable $table_head from here:
            // headline:
            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"18\" align=\"center\">" . $LDDailyFinancialRecord . "</td>\n";
            else
                $table_head .= "<td colspan=\"18\" align=\"center\">" . $LDDailyFinancialRecord . "</td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAdvance . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAmb . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDBed . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsult . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsum . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDental . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDrugs . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDEye . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFile . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDICU . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLab . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMort . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMinProc . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurg . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDImaging . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDOther . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td>" . $LDAdvance . "Advance</td>\n";
                $table_head .= "<td>" . $LDAmb . "Amb</td>\n";
                $table_head .= "<td>" . $LDBed . "Bed</td>\n";
                $table_head .= "<td>" . $LDConsult . "Consult</td>\n";
                $table_head .= "<td>" . $LDConsum . "Consum</td>\n";
                $table_head .= "<td>" . $LDDental . "Dental</td>\n";
                $table_head .= "<td>" . $LDDrugs . "Drugs</td>\n";
                $table_head .= "<td>" . $LDEye . "Eye</td>\n";
                $table_head .= "<td>" . $LDFile . "File</td>\n";
                $table_head .= "<td>" . $LDICU . "ICU</td>\n";
                $table_head .= "<td>" . $LDFile . "File</td>\n";
                $table_head .= "<td>" . $LDMort . "Mort</td>\n";
                $table_head .= "<td>" . $LDMinProc . "Min. Proc</td>\n";
                $table_head .= "<td>" . $LDProcSurg . "Proc/Surg</td>\n";
                $table_head .= "<td>" . $LDImaging . "Imaging</td>\n";
                $table_head .= "<td>" . $LDOther . "W/Chair</td>\n";
                $table_head .= "<td>" . $LDTotal . "Total</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayCashBillingTableHead($admission) {
            global $PRINTOUT;
            global $LDDailyCashFinancialRecord, $LDDate, $LDAdvance, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg,
            $LDImaging, $LDOther, $LDTotal;

            $admissionclass = "";

            if ($admission == 2) {
                $admissionclass = "Outpatient";
            } else
            if ($admission == 1) {
                $admissionclass = "Inpatient";
            } else
                $admissionclass = "All";

            // Table definition will be organized by the variable $table_head from here:
            // headline:
            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"19\" align=\"center\">Cash Financial Summary : $admissionclass </td>\n";
            else
                $table_head .= "<td colspan=\"19\" align=\"center\">Cash  Financial Summary : $admissionclass </td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAdvance . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAmb . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDBed . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsult . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsum . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDental . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDrugs . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDEye . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFile . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDICU . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLab . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMort . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMinProc . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurg . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDImaging . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDOther . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td>" . $LDAdvance . "Advance</td>\n";
                $table_head .= "<td>" . $LDAmb . "Amb</td>\n";
                $table_head .= "<td>" . $LDBed . "Bed</td>\n";
                $table_head .= "<td>" . $LDConsult . "Consult</td>\n";
                $table_head .= "<td>" . $LDConsum . "Consum</td>\n";
                $table_head .= "<td>" . $LDDental . "Dental</td>\n";
                $table_head .= "<td>" . $LDDrugs . "Drugs</td>\n";
                $table_head .= "<td>" . $LDEye . "Eye</td>\n";
                $table_head .= "<td>" . $LDFile . "File</td>\n";
                $table_head .= "<td>" . $LDICU . "ICU</td>\n";
                $table_head .= "<td>" . $LDLab . "Lab</td>\n";
                $table_head .= "<td>" . $LDMort . "Mort</td>\n";
                $table_head .= "<td>" . $LDMinProc . "Min. Proc</td>\n";
                $table_head .= "<td>" . $LDProcSurg . "Proc/Surg</td>\n";
                $table_head .= "<td>" . $LDImaging . "Imaging</td>\n";
                $table_head .= "<td>" . $LDOther . "Other</td>\n";
                $table_head .= "<td>" . $LDTotal . "Total</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayCashReceiptsTableHead($admission) {
            global $PRINTOUT;
            global $LDDailyFinancialRecordOPD, $LDDate, $LDBillNo, $LDAdvance, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg,
            $LDImaging, $LDOther, $LDTotal;

            $admissionclass = "";

            if ($admission == 2) {
                $admissionclass = "Outpatient";
            } else
            if ($admission == 1) {
                $admissionclass = "Inpatient";
            } else
                $admissionclass = "All";

            // Table definition will be organized by the variable $table_head from here:
            // headline:
            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"19\" align=\"center\"> $admissionclass Cash Receipts Summary </td>\n";
            else
                $table_head .= "<td colspan=\"19\" align=\"center\"> $admissionclass Cash  Receipts Summary</td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDBillNo . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAdvance . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAmb . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDBed . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsult . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsum . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDental . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDrugs . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDEye . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFile . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDICU . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLab . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMort . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMinProc . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurg . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDImaging . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDOther . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td>" . $LDBillNo . "Bill No</td>\n";
                $table_head .= "<td>" . $LDAdvance . "Advance</td>\n";
                $table_head .= "<td>" . $LDAmb . "Amb</td>\n";
                $table_head .= "<td>" . $LDBed . "Bed</td>\n";
                $table_head .= "<td>" . $LDConsult . "Consult</td>\n";
                $table_head .= "<td>" . $LDConsum . "Consum</td>\n";
                $table_head .= "<td>" . $LDDental . "Dental</td>\n";
                $table_head .= "<td>" . $LDDrugs . "Drugs</td>\n";
                $table_head .= "<td>" . $LDEye . "Eye</td>\n";
                $table_head .= "<td>" . $LDFile . "File</td>\n";
                $table_head .= "<td>" . $LDICU . "ICU</td>\n";
                $table_head .= "<td>" . $LDLab . "Lab</td>\n";
                $table_head .= "<td>" . $LDMort . "Mort</td>\n";
                $table_head .= "<td>" . $LDMinProc . "Min. Proc</td>\n";
                $table_head .= "<td>" . $LDProcSurg . "Proc/Surg</td>\n";
                $table_head .= "<td>" . $LDImaging . "Imaging</td>\n";
                $table_head .= "<td>" . $LDOther . "Other</td>\n";
                $table_head .= "<td>" . $LDTotal . "Total</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayInsuranceBillingTableHead($admission) {
            global $PRINTOUT;
            global $LDDailyFinancialRecordOPD, $LDDate, $LDAmb, $LDAdvance, $LDBed, $LDConsult, $LDConsum,
            $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDImaging, $LDOther, $LDTotal;

            $admissionclass = "";

            if ($admission == 2) {
                $admissionclass = "Outpatient";
            } else
            if ($admission == 1) {
                $admissionclass = "Inpatient";
            } else
                $admissionclass = "All";

            // Table definition will be organized by the variable $table_head from here:
            // headline:
            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"18\" align=\"center\">Insurance Financial Summary : $admissionclass </td>\n";
            else
                $table_head .= "<td colspan=\"18\" align=\"center\">Insurance  Financial Summary : $admissionclass </td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAdvance . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAmb . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDBed . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsult . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsum . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDental . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDrugs . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDEye . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFile . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDICU . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLab . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMort . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMinProc . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurg . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDImaging . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDOther . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td>" . $LDAdvance . "Advance</td>\n";
                $table_head .= "<td>" . $LDAmb . "Amb</td>\n";
                $table_head .= "<td>" . $LDBed . "Bed</td>\n";
                $table_head .= "<td>" . $LDConsult . "Consum</td>\n";
                $table_head .= "<td>" . $LDConsum . "Consum</td>\n";
                $table_head .= "<td>" . $LDDental . "Dental</td>\n";
                $table_head .= "<td>" . $LDDrugs . "Drugs</td>\n";
                $table_head .= "<td>" . $LDEye . "Eye</td>\n";
                $table_head .= "<td>" . $LDFile . "File</td>\n";
                $table_head .= "<td>" . $LDICU . "ICU</td>\n";
                $table_head .= "<td>" . $LDLab . "Lab</td>\n";
                $table_head .= "<td>" . $LDMort . "Mort</td>\n";
                $table_head .= "<td>" . $LDMinProc . "Min. Proc</td>\n";
                $table_head .= "<td>" . $LDProcSurg . "Proc/Surg</td>\n";
                $table_head .= "<td>" . $LDImaging . "Imaging</td>\n";
                $table_head .= "<td>" . $LDOther . "W/Chair</td>\n";
                $table_head .= "<td>" . $LDTotal . "Total</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayInsuranceCompanyBillingTableHead($insurance_id, $admission) {
            global $db;
            global $PRINTOUT;
            global $LDDailyFinancialRecordOPD, $LDDate, $LDPatient, $LDAdvance, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU,
            $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDImaging, $LDOther, $LDTotal;

            $admissionclass = "";

            if ($admission == 2) {
                $admissionclass = "Outpatient";
            } else
            if ($admission == 1) {
                $admissionclass = "Inpatient";
            } else
                $admissionclass = "All";

            // Table definition will be organized by the variable $table_head from here:
            // headline:

            $sql_insurancename = "SELECT name FROM care_tz_company where id='$insurance_id'";

            $insurance_name = $db->Execute($sql_insurancename);

            $sql_insurancename = $insurance_name->FetchRow();

            $insurancename = $sql_insurancename['name'];

            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"19\" align=\"center\"> $admissionclass Financial Summary for $insurancename </td>\n";
            else
                $table_head .= "<td colspan=\"19\" align=\"center\"> $admissionclass Financial Summary for $insurancename </td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDPatient . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAdvance . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAmb . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDBed . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsult . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsum . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDental . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDrugs . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDEye . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFile . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDICU . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLab . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMort . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMinProc . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurg . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDImaging . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDOther . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td>" . $LDPatient . "Patient/ID</td>\n";
                $table_head .= "<td>" . $LDAdvance . "Advance</td>\n";
                $table_head .= "<td>" . $LDAmb . "Amb</td>\n";
                $table_head .= "<td>" . $LDBed . "Bed</td>\n";
                $table_head .= "<td>" . $LDConsult . "Consult</td>\n";
                $table_head .= "<td>" . $LDConsum . "Consum</td>\n";
                $table_head .= "<td>" . $LDDental . "Dental</td>\n";
                $table_head .= "<td>" . $LDDrugs . "Drugs</td>\n";
                $table_head .= "<td>" . $LDEye . "Eye</td>\n";
                $table_head .= "<td>" . $LDFile . "File</td>\n";

                $table_head .= "<td>" . $LDICU . "ICU</td>\n";
                $table_head .= "<td>" . $LDLab . "Lab</td>\n";
                $table_head .= "<td>" . $LDMort . "Mort</td>\n";
                $table_head .= "<td>" . $LDMinProc . "Min. Proc</td>\n";
                $table_head .= "<td>" . $LDProcSurg . "Proc/Surg</td>\n";
                $table_head .= "<td>" . $LDImaging . "Imaging</td>\n";
                $table_head .= "<td>" . $LDOther . "WChair</td>\n";
                $table_head .= "<td>" . $LDTotal . "Total</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayCompaniesBillingTableHead($admission) {
            global $db;
            global $PRINTOUT;
            global $LDDailyFinancialRecordOPD, $LDCompany, $LDAdvance, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU,
            $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDImaging, $LDOther, $LDTotal;

            $admissionclass = "";

            if ($admission == 2) {
                $admissionclass = "Outpatient";
            } else
            if ($admission == 1) {
                $admissionclass = "Inpatient";
            } else
                $admissionclass = "All";

            // Table definition will be organized by the variable $table_head from here:
            // headline:

            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"18\" align=\"center\"> $admissionclass Financial Summary for all Companies </td>\n";
            else
                $table_head .= "<td colspan=\"18\" align=\"center\"> $admissionclass Financial Summary for all Companies </td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDCompany . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAdvance . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAmb . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDBed . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsult . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsum . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDental . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDrugs . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDEye . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFile . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDICU . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLab . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMort . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMinProc . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurg . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDImaging . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDOther . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {

                $table_head .= "<td>" . $LDCompany . "Company</td>\n";
                $table_head .= "<td>" . $LDAdvance . "Advance</td>\n";
                $table_head .= "<td>" . $LDAmb . "Amb</td>\n";
                $table_head .= "<td>" . $LDBed . "Bed</td>\n";
                $table_head .= "<td>" . $LDConsult . "Consult</td>\n";
                $table_head .= "<td>" . $LDConsum . "Consum</td>\n";
                $table_head .= "<td>" . $LDDental . "Dental</td>\n";
                $table_head .= "<td>" . $LDDrugs . "Drugs</td>\n";
                $table_head .= "<td>" . $LDEye . "Eye</td>\n";
                $table_head .= "<td>" . $LDFile . "File</td>\n";

                $table_head .= "<td>" . $LDICU . "ICU</td>\n";
                $table_head .= "<td>" . $LDLab . "Lab</td>\n";
                $table_head .= "<td>" . $LDMort . "Mort</td>\n";
                $table_head .= "<td>" . $LDMinProc . "Min. Proc</td>\n";
                $table_head .= "<td>" . $LDProcSurg . "Proc/Surg</td>\n";
                $table_head .= "<td>" . $LDImaging . "Imaging</td>\n";
                $table_head .= "<td>" . $LDOther . "Other</td>\n";
                $table_head .= "<td>" . $LDTotal . "Total</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayPendingQuotationsTableHead($admission, $pricelist) {
            global $db;
            global $PRINTOUT;
            global $LDPendingQuotationsReport, $LDDate, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU,
            $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDImaging, $LDOther, $LDTotal;

            $bill_obj = New Bill;
            $price_detail = $bill_obj->getPriceDescription($pricelist);

            $admissionclass = "";

            if ($admission == 2) {
                $admissionclass = "Outpatient";
            } else
            if ($admission == 1) {
                $admissionclass = "Inpatient";
            } else
                $admissionclass = "All";

            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"18\" align=\"center\">  $admissionclass Pending Quotations Report assuming $price_detail pricelist</td>\n";
            else
                $table_head .= "<td colspan=\"18\" align=\"center\"> $admissionclass Pending Quotations Report assuming $price_detail pricelist </td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAmb . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDBed . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsult . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsum . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDental . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDrugs . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDEye . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFile . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDICU . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLab . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMort . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMinProc . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurg . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDImaging . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDOther . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td>" . $LDAmb . "Amb</td>\n";
                $table_head .= "<td>" . $LDBed . "Bed</td>\n";
                $table_head .= "<td>" . $LDConsult . "Consult</td>\n";
                $table_head .= "<td>" . $LDConsum . "Consum</td>\n";
                $table_head .= "<td>" . $LDDental . "Dental</td>\n";
                $table_head .= "<td>" . $LDDrugs . "Drugs</td>\n";
                $table_head .= "<td>" . $LDEye . "Eye</td>\n";
                $table_head .= "<td>" . $LDFile . "File</td>\n";
                $table_head .= "<td>" . $LDICU . "ICU</td>\n";
                $table_head .= "<td>" . $LDLab . "Lab</td>\n";
                $table_head .= "<td>" . $LDMort . "Mort</td>\n";
                $table_head .= "<td>" . $LDMinProc . "Min. Proc</td>\n";
                $table_head .= "<td>" . $LDProcSurg . "Proc/Surg</td>\n";
                $table_head .= "<td>" . $LDImaging . "Imaging</td>\n";
                $table_head .= "<td>" . $LDOther . "WChair</td>\n";
                $table_head .= "<td>" . $LDTotal . "Total</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayDeletedQuotationsTableHead($pricelist) {
            global $db;
            global $PRINTOUT;
            global $LDDeletedQuotationsReport, $LDDate, $LDDescription, $LDPrice, $LDNoOfItems, $LDTotal, $LDCashier;

            $bill_obj = New Bill;
            $price_details = $bill_obj->getPriceDescription($pricelist);

            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"9\" align=\"center\"> Deleted Quotations Report assuming $price_details pricelist</td>\n";
            else
                $table_head .= "<td colspan=\"9\" align=\"center\">Deleted Quotations Report assuming $price_details pricelist.</td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDPatientName . "File_Nr</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDSelianfilenumber . "Name</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDescription . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDNoOfItems . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDPrice . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDCashier . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDeleteDate . "Delete Date</td>\n";

                $table_head.="</tr>\n";
            } else {

                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDPatientName . "File_Nr</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDSelianfilenumber . "Name</td>\n";
                $table_head .= "<td>" . $LDDescription . "Description</td>\n";
                $table_head .= "<td>" . $LDPrice . "Price</td>\n";
                $table_head .= "<td>" . $LDNoOfItems . "No.Of Item</td>\n";
                $table_head .= "<td>" . $LDTotal . "Total</td>\n";
                $table_head .= "<td>" . $LDCashier . "Cashier</td>\n";
                $table_head .= "<td>" . $LDDeleteDate . "Delete Date</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayPrepaidFinancialTableHead() {
            global $PRINTOUT;
            global $LDDailyFinancialRecordOPD, $LDDate, $LDInvoice, $LDFileTSH, $LDMatTSH, $LDLabTSH,
            $LDXRayTSH, $LDDawaTSH, $LDProcSurgTSH, $LDDressTSH, $LDMengTSH, $LDJumlaTSH;

            // Table definition will be organized by the variable $table_head from here:
            // headline:
            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"12\" align=\"center\">Insurance Receipt-General Financial Summary</td>\n";
            else
                $table_head .= "<td colspan=\"12\" align=\"center\">Insurance Receipt-General Financial Summary</td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">Organization</td>\n";
//			$table_head .= "<td bgcolor=\"#CC9933\">".$LDInvoice."/td>\n" ;
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFileTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMatTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLabTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDXRayTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDawaTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurgTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDressTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMengTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDJumlaTSH . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td>" . $LDInvoice . "Invoice</td>\n";
                $table_head .= "<td>" . $LDFileTSH . "File(TSH)</td>\n";
                $table_head .= "<td>" . $LDMatTSH . "Mat(TSH)</td>\n";
                $table_head .= "<td>" . $LDLabTSH . "Lab(TSH)</td>\n";
                $table_head .= "<td>" . $LDXRayTSH . "X-Ray(TSH)</td>\n";
                $table_head .= "<td>" . $LDDawaTSH . "Dawa(TSH)</td>\n";
                $table_head .= "<td>" . $LDProcSurgTSH . "Proc/Surg(TSH)</td>\n";
                $table_head .= "<td>" . $LDDressTSH . "Dress(TSH)</td>\n";
                $table_head .= "<td>" . $LDMengTSH . "Meng(TSH)</td>\n";
                $table_head .= "<td>" . $LDJumlaTSH . "Jumla(TSH)</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayDentalPrepaidFinancialTableHead() {
            global $PRINTOUT;
            global $LDDailyFinancialRecordOPD, $LDDate, $LDInvoice, $LDFileTSH, $LDMatTSH, $LDLabTSH,
            $LDXRayTSH, $LDDawaTSH, $LDProcSurgTSH, $LDDressTSH, $LDMengTSH, $LDJumlaTSH;

            // Table definition will be organized by the variable $table_head from here:
            // headline:
            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"12\" align=\"center\">Dental Insurance Financial Summary</td>\n";
            else
                $table_head .= "<td colspan=\"12\" align=\"center\">Dental Insurance Financial Summary</td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">Organization</td>\n";
//			$table_head .= "<td bgcolor=\"#CC9933\">".$LDInvoice."/td>\n" ;
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFileTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMatTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLabTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDXRayTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDawaTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurgTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDressTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMengTSH . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">Dental</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDJumlaTSH . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td>" . $LDInvoice . "Invoice</td>\n";
                $table_head .= "<td>" . $LDFileTSH . "File(TSH)</td>\n";
                $table_head .= "<td>" . $LDMatTSH . "Mat(TSH)</td>\n";
                $table_head .= "<td>" . $LDLabTSH . "Lab(TSH)</td>\n";
                $table_head .= "<td>" . $LDXRayTSH . "X-Ray(TSH)</td>\n";
                $table_head .= "<td>" . $LDDawaTSH . "Dawa(TSH)</td>\n";
                $table_head .= "<td>" . $LDProcSurgTSH . "Proc/Surg(TSH)</td>\n";
                $table_head .= "<td>" . $LDDressTSH . "Dress(TSH)</td>\n";
                $table_head .= "<td>" . $LDMengTSH . "Meng(TSH)</td>\n";
                $table_head .= "<td>" . $LDJumlaTSH . "Jumla(TSH)</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        /**
         * ARV-Billing-Section
         */
        //--
        function DisplayARVBillingTableHead() {
            global $PRINTOUT;
            global $LDDailyFinancialRecordOPD, $LDDate, $LDPatientName, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDress, $LDDrugs, $LDEye,
            $LDFile, $LDICU, $LDLab, $LDMort, $LDProcSurg, $LDImaging, $LDOther, $LDTotal;

            // Table definition will be organized by the variable $table_head from here:
            // headline:
            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"18\" align=\"center\">DailyFinancialRecord ART Fund</td>\n";
            else
                $table_head .= "<td colspan=\"18\" align=\"center\">DailyFinancialRecord ART Fund</td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">Patient Name/ID</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAmb . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDBed . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsult . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsum . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDental . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDrugs . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDEye . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFile . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDICU . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLab . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMort . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurg . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDImaging . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDOther . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td>" . $LDPatientName . "Patient Name/ID</td>\n";
                $table_head .= "<td>" . $LDAmb . "Amb</td>\n";
                $table_head .= "<td>" . $LDConsult . "Bed</td>\n";
                $table_head .= "<td>" . $LDConsum . "Consum</td>\n";
                $table_head .= "<td>" . $LDDental . "Dental</td>\n";
                $table_head .= "<td>" . $LDDrugs . "Drugs</td>\n";
                $table_head .= "<td>" . $LDEye . "Eye</td>\n";
                $table_head .= "<td>" . $LDFile . "File</td>\n";
                $table_head .= "<td>" . $LDICU . "ICU</td>\n";
                $table_head .= "<td>" . $LDLab . "Lab</td>\n";
                $table_head .= "<td>" . $LDMort . "Mort</td>\n";
                $table_head .= "<td>" . $LDProcSurg . "ProcSurg</td>\n";
                $table_head .= "<td>" . $LDImaging . "Imaging</td>\n";
                $table_head .= "<td>" . $LDOther . "W/Chair</td>\n";
                $table_head .= "<td>" . $LDTotal . "Total</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayTBBillingTableHead() {
            global $PRINTOUT;
            global $LDDailyFinancialRecord, $LDDate, $LDPatientName, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs,
            $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDProcSurg, $LDImaging, $LDOther, $LDTotal;

            // Table definition will be organized by the variable $table_head from here:
            // headline:
            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"18\" align=\"center\">DailyFinancialRecord TB Fund</td>\n";
            else
                $table_head .= "<td colspan=\"18\" align=\"center\">DailyFinancialRecord TB Fund</td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            if (!$PRINTOUT) {
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDate . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">Patient Name/ID</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAmb . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDBed . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsult . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDConsum . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDental . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDrugs . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDEye . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDFile . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDICU . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDLab . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDMort . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDProcSurg . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDImaging . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDOther . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head .= "<td>" . $LDDate . "Date</td>\n";
                $table_head .= "<td>" . $LDPatientName . "Patient Name/ID</td>\n";
                $table_head .= "<td>" . $LDAmb . "Amb</td>\n";
                $table_head .= "<td>" . $LDBed . "Bed</td>\n";
                $table_head .= "<td>" . $LDConsult . "Bed</td>\n";
                $table_head .= "<td>" . $LDConsum . "Consum</td>\n";
                $table_head .= "<td>" . $LDDental . "Dental</td>\n";
                $table_head .= "<td>" . $LDDrugs . "Drugs</td>\n";
                $table_head .= "<td>" . $LDEye . "Eye</td>\n";
                $table_head .= "<td>" . $LDFile . "File</td>\n";
                $table_head .= "<td>" . $LDICU . "ICU</td>\n";
                $table_head .= "<td>" . $LDLab . "Lab</td>\n";
                $table_head .= "<td>" . $LDMort . "Mort</td>\n";
                $table_head .= "<td>" . $LDProcSurg . "ProcSurg</td>\n";
                $table_head .= "<td>" . $LDImaging . "Imaging</td>\n";
                $table_head .= "<td>" . $LDOther . "Other</td>\n";
                $table_head .= "<td>" . $LDTotal . "Total</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function _GetDailyLabItemTotal($curr_day_start, $day, $item_id) {
            global $db;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);

            if ($item_id != "") {
                $sql = "SELECT count(id) as RetVal FROM tmp_laboratories WHERE id='" . $item_id . "'  AND send_date >=$curr_day_start AND send_date <=$curr_day_end";
            } else {
                $sql = "SELECT count(id) as RetVal FROM tmp_laboratories WHERE send_date >=$curr_day_start AND send_date <=$curr_day_end";
            }

            $res_ptr = $db->Execute($sql);
            if ($res_row = $res_ptr->FetchRow())
                return $res_row['RetVal'];
            else
                return 0;
        }

        function _GetDailyLabItemTestsTotal($curr_day_start, $day, $item_id) {
            global $db;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);

            if ($item_id != "") {
                $sql = "SELECT count(id) as RetVal FROM tmp_laboratories WHERE id='" . $item_id . "'  AND send_date >=$curr_day_start AND send_date <=$curr_day_end";
            } else {
                $sql = "SELECT count(id) as RetVal FROM tmp_laboratories WHERE send_date >=$curr_day_start AND send_date <=$curr_day_end";
            }

            $res_ptr = $db->Execute($sql);
            if ($res_row = $res_ptr->FetchRow())
                return $res_row['RetVal'];
            else
                return 0;
        }

        function _get_requested_day($start_time_frame, $day) {
            /**
             * Private function: getting the exact date, beginning with start_time_frame (UNIX timestamp)
             * adding the value given in the variable "day"
             * Return value is an UNIX-Timestamp
             */
            $sec_to_add = $day * 24 * 60 * 60;
            return $requested_day = $start_time_frame + $sec_to_add;
        }

        function _get_amount_of($start_timeframe, $day, $filter, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            global $db;
            global $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;

            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM tmp_billing_master  ";
            switch ($filter) {

                case "amb": //
                    if ($debug)
                        echo "amb<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'A%'  AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "bed": //Consultation
                    if ($debug)
                        echo "bed<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'B%'  AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "consult": //Consultation
                    if ($debug)
                        echo "consult<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'C%'  AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "consum": //Consumables
                    if ($debug)
                        echo "consum<br>";

                    $sql_filter = "WHERE purchasing_class='supplies' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "dental":
                    if ($debug)
                        echo "dental<br>";
                    $sql_filter = "WHERE purchasing_class='dental' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "drugs":
                    if ($debug)
                        echo "drugs<br>";
                    $sql_filter = "WHERE (  purchasing_class='drug_list') AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "eye": //eye patients
                    if ($debug)
                        echo "eye<br>";
                    $sql_filter = "WHERE purchasing_class='eye-service' OR purchasing_class='eye-surgery' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "file": //new patients
                    // new patient: all the patients what got the service item R01

                    if ($debug)
                        echo "file<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "icu":
                    if ($debug)
                        echo $LDICU . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'I%' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "lab":
                    if ($debug)
                        echo $LDLab . "<br>";
                    $sql_filter = "WHERE purchasing_class='labtest' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "mort":
                    if ($debug)
                        echo $LDMort . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'M%' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "minproc":
                    if ($debug)
                        echo $LDMinProc . "<br>";
                    $sql_filter = "WHERE purchasing_class='minor_proc_op' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "proc/surg":
                    if ($debug)
                        echo "proc/surg<br>";
                    $sql_filter = "WHERE ( purchasing_class='obgyne_op' OR purchasing_class='ortho_op' OR purchasing_class='surgical_op') AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "radio"://returns
                    if ($debug)
                        echo "radio<br>";
                    $sql_filter = "WHERE purchasing_class='xray' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "other"://returns
                    // returns: all other items 
                    if ($debug)
                        echo "other<br>";
                    $sql_filter = "WHERE purchasing_class!='drug_list' 
				AND purchasing_class!='supplies'
				AND purchasing_class!='service'
				AND purchasing_class!='dental' 
				AND purchasing_class!='labtest'
				AND purchasing_class!='xray'
				AND purchasing_class!='minor_proc_op'
				AND purchasing_class!='eye-service' 
				AND purchasing_class!='eye-surgery' 
				AND purchasing_class!='obgyne_op'
				AND purchasing_class!='ortho_op' 
				AND purchasing_class!='surgical_op'
				AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "total":
                    if ($debug)
                        echo $LDTotal . "<br>";
                    $sql_filter = "WHERE $curr_day_start <=date_change AND $curr_day_end>=date_change"; // count of all
                    break;
                default:
                    return FALSE;
            }

            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];
            if ($filter == "total") {
                $sql_lab = "SELECT SUM(price) as RetVal FROM care_tz_billing_archive_elem WHERE prescriptions_nr=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                $db_obj_total = $db->Execute($sql_lab);
                $row_total = $db_obj_total->FetchRow();
                if ($total_lab = $row_total['RetVal'])
                    $return_value +=$total_lab;
            }


            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_cash_amount_of($start_timeframe, $day, $filter, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            global $db;
            global $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;

            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM tmp_billing_master  ";
            switch ($filter) {

                case "amb":
                    if ($debug)
                        echo "amb<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'A%' 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "bed":

                    if ($debug)
                        echo "bed<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'B%' 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "consult": //Consultation
                    if ($debug)
                        echo $LDConsult . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'C%' 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";

                    break;

                case "consum": //Consultation
                    if ($debug)
                        echo $LDConsum . "<br>";
                    $sql_filter = "WHERE purchasing_class='supplies'  
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";

                    break;

                case "dental":
                    if ($debug)
                        echo "dental<br>";
                    $sql_filter = "WHERE purchasing_class='dental'  
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "drugs":
                    $sql_filter = "WHERE (purchasing_class='drug_list') 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "eye":
                    $sql_filter = "WHERE (purchasing_class='eye-service' OR purchasing_class='eye-surgery') 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "file": //new patients
                    // new patient: all the patients what got the service item R01

                    if ($debug)
                        echo "file<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "icu":
                    if ($debug)
                        echo "icu<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'I%' 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "lab":
                    if ($debug)
                        echo $LDLab . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='labtest' 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "mort":
                    if ($debug)
                        echo $LDMort . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'M%' 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "minproc":
                    if ($debug)
                        echo $LDMinProc . "<br>";
                    $sql_filter = "WHERE purchasing_class='minor_proc_op' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "proc/surg":
                    if ($debug)
                        echo "proc/surg<br>";
                    $sql_filter = "WHERE ( purchasing_class='obgyne_op' OR purchasing_class='ortho_op' OR purchasing_class='surgical_op') 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "radio":
                    if ($debug)
                        echo "Radio<br>";
                    $sql_filter = "WHERE purchasing_class='xray' 
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;


                case "other"://returns
                    // returns: all patients, what got the service item R02
                    if ($debug)
                        echo "other<br>";
                    $sql_filter = "WHERE purchasing_class!='drug_list' 
				AND purchasing_class!='supplies' 
				AND purchasing_class!='service' 
				AND purchasing_class!='dental' 
				AND purchasing_class!='service'
				AND purchasing_class!='labtest'
				AND purchasing_class!='xray'
				AND purchasing_class!='minor_proc_op'
				AND purchasing_class!='eye-service' 
				AND purchasing_class!='eye-surgery' 
				AND purchasing_class!='obgyne_op'
				AND purchasing_class!='ortho_op' 
				AND purchasing_class!='surgical_op'
				AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "total":
                    if ($debug)
                        echo $LDTotal . "<br>";
                    $sql_filter = "WHERE $curr_day_start <=date_change 
				AND insurance_id=0 AND $curr_day_end>=date_change"; // count of all
                    break;
                default:
                    return FALSE;
            }

            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];
            if ($filter == "total") {
                $sql_lab = "SELECT SUM(price) as RetVal FROM care_tz_billing_archive_elem WHERE prescriptions_nr=0 AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                $db_obj_total = $db->Execute($sql_lab);
                $row_total = $db_obj_total->FetchRow();
                if ($total_lab = $row_total['RetVal'])
                    $return_value +=$total_lab;
            }


            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_insurance_amount_of($start_timeframe, $day, $filter, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            global $db;
            global $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;

            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM tmp_billing_master  ";
            switch ($filter) {

                case "amb":
                    if ($debug)
                        echo "amb<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'A%' 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "bed":
                    if ($debug)
                        echo $LDBed . "<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'B%' 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";

                    break;

                case "consult":
                    if ($debug)
                        echo "consult<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'C%' 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "consum":
                    if ($debug)
                        echo "consum<br>";
                    $sql_filter = "WHERE  purchasing_class='supplies' 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "dental":
                    if ($debug)
                        echo "dental<br>";
                    $sql_filter = "WHERE purchasing_class='dental' 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "drugs":
                    if ($debug)
                        echo "drugs<br>";
                    $sql_filter = "WHERE ( purchasing_class='drug_list') 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "eye":
                    if ($debug)
                        echo "eye<br>";
                    $sql_filter = "WHERE ( purchasing_class='eye-service' OR purchasing_class='eye-surgery') 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "file":
                    if ($debug)
                        echo "file<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "icu":
                    if ($debug)
                        echo "icu<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'I%' 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "lab":
                    if ($debug)
                        echo $LDLab . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='labtest' 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "mort":
                    if ($debug)
                        echo $LDMort . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'M%' 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "minproc":
                    if ($debug)
                        echo $LDMinProc . "<br>";
                    $sql_filter = "WHERE purchasing_class='minor_proc_op' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "proc/surg":
                    if ($debug)
                        echo "proc/surg<br>";
                    $sql_filter = "WHERE ( purchasing_class='obgyne_op' OR purchasing_class='ortho_op' OR purchasing_class='surgical_op') 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "radio":
                    if ($debug)
                        echo "radio<br>";
                    $sql_filter = "WHERE purchasing_class='xray' 
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "other":
                    if ($debug)
                        echo "other<br>";
                    $sql_filter = "WHERE purchasing_class!='drug_list' 
				AND purchasing_class!='supplies' 
				AND purchasing_class!='service' 
				AND purchasing_class!='dental' 
				AND purchasing_class!='labtest'
				AND purchasing_class!='xray'
				AND purchasing_class!='minor_proc_op'
				AND purchasing_class!='eye-service' 
				AND purchasing_class!='eye-surgery' 
				AND purchasing_class!='obgyne_op'
				AND purchasing_class!='ortho_op' 
				AND purchasing_class!='surgical_op'
				AND insurance_id!='0' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "total":
                    if ($debug)
                        echo $LDTotal . "<br>";
                    $sql_filter = "WHERE $curr_day_start <=date_change 
				 AND insurance_id!='0' AND $curr_day_end>=date_change"; //
                    break;
                default:
                    return FALSE;
            }

            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];
            if ($filter == "total") {
                $sql_lab = "SELECT SUM(price) as RetVal FROM care_tz_billing_archive_elem WHERE prescriptions_nr=0 AND insurance_id!='0' 
AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                $db_obj_jumla = $db->Execute($sql_lab);
                $row_jumla = $db_obj_jumla->FetchRow();
                if ($jumla_lab = $row_jumla['RetVal'])
                    $return_value +=$jumla_lab;
            }


            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_arv_amount_of($start_timeframe, $day, $encounternr, $filter, $total_summary) {

            $sql_filter = "";
            $day-=1;
            $debug = false;

            if ($total_summary) {
                //$curr_day_start=$this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";


            global $db;
            global $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;


            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $sql = "SELECT SUM(price*amount) as RetVal FROM tmp_billing_master  ";


            switch ($filter) {

                case "amb": //new patients
                    // new patient: all the patients what got the service item R01
                    if ($debug)
                        echo "amb<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'A%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "bed":
                    if ($debug)
                        echo "bed<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='B%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "consult": //Consultation

                    if ($debug)
                        echo $LDConsult . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'C%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";

                    break;

                case "consum": //Consultation

                    if ($debug)
                        echo $LDConsum . "<br>";
                    $sql_filter = "WHERE purchasing_class='supplies' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "dental":
                    if ($debug)
                        echo "dental<br>";
                    $sql_filter = "WHERE purchasing_class='dental' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "drugs":
                    if ($debug)
                        echo "drugs<br>";
                    $sql_filter = "WHERE purchasing_class='drug_list' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "eye":
                    if ($debug)
                        echo "eye<br>";
                    $sql_filter = "WHERE purchasing_class='eye-service' OR purchasing_class='eye-surgery' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;


                case "file": //file

                    if ($debug)
                        echo $LDFile . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "icu":
                    if ($debug)
                        echo "icu<br>";
                    $sql_filter = "WHERE purchasing_class='service'  AND item_number like 'I%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "lab": //lab
                    if ($debug)
                        echo $LDLab . "<br>";
                    $sql_filter = "WHERE purchasing_class='labtest' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "mort":
                    if ($debug)
                        echo "mort<br>";
                    $sql_filter = "WHERE purchasing_class='service'  AND item_number like 'M%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "minproc":
                    if ($debug)
                        echo $LDMinProc . "<br>";
                    $sql_filter = "WHERE purchasing_class='mminor_proc_op'  AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "proc/surg": //
                    if ($debug)
                        echo $LDProcSurg . "<br>";
                    $sql_filter = "WHERE (purchasing_class='obgyne_op' OR purchasing_class='ortho_op' OR  purchasing_class='surgical_op')
AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "radio":
                    if ($debug)
                        echo "radio<br>";
                    $sql_filter = "WHERE purchasing_class='xray' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "other"://returns
                    if ($debug)
                        echo "other<br>";
                    $sql_filter = "WHERE purchasing_class!='drug_list' 
				AND purchasing_class!='supplies' 
				AND purchasing_class!='service' 
				AND purchasing_class!='dental' 
				AND purchasing_class!='labtest'
				AND purchasing_class!='xray'
				AND purchasing_class!='minor_proc_op'
				AND purchasing_class!='eye-service' 
				AND purchasing_class!='eye-surgery' 
				AND purchasing_class!='obgyne_op'
				AND purchasing_class!='ortho_op' 
				AND purchasing_class!='surgical_op'
				AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr'";
                    break;

                case "total":
                    if ($debug)
                        echo $LDTotal . "<br>";
                    $sql_filter = "WHERE from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  and encounter_nr='$encounternr' and purchasing_class !='dental'"; // count of all
                    break;
                default:
                    return FALSE;
            }
            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];
            if ($filter == "total") {
                $sql_lab = "SELECT SUM( price ) AS RetVal FROM care_tz_billing_archive_elem, care_tz_billing_archive WHERE prescriptions_nr =0 AND  $curr_day_start <=date_change AND $curr_day_end>=date_change and encounter_nr='$encounternr' AND care_tz_billing_archive.nr = care_tz_billing_archive_elem.nr";
                $db_obj_jumla = $db->Execute($sql_lab);
                $row_jumla = $db_obj_jumla->FetchRow();
                if ($jumla_lab = $row_jumla['RetVal'])
                    $return_value +=$jumla_lab;
            }


            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_bill_amount_of($start_timeframe, $admission, $day, $billnr, $filter, $total_summary) {

            $sql_filter = "";
            $day-=1;
            $debug = false;

            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            if ($admission == '1') {
                $admission_encounter = " AND care_encounter.encounter_class_nr = 1 ";
            } else if ($admission == '2') {
                $admission_encounter = " AND care_encounter.encounter_class_nr = 2 ";
            } else if ($admission == "") {
                $admission_encounter = "";
            }

            if ($billnr) {
                $and_bill = " AND BillNumber = '$billnr'";
                $a_bill = " AND care_tz_billing_archive_elem.nr = '$billnr'";
            } else {
                $and_bill = "";
                $a_bill = "";
            }

            global $db;

            global $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;


            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $sql = "SELECT SUM(price*amount) as RetVal FROM tmp_billing_master  ";


            switch ($filter) {

                case "amb": //new patients
                    // new patient: all the patients what got the service item R01
                    if ($debug)
                        echo "amb<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'A%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";

                    break;

                case "bed":
                    if ($debug)
                        echo "bed<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='B%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "consult": //Consultation

                    if ($debug)
                        echo $LDConsult . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'C%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "consum": //Consultation

                    if ($debug)
                        echo $LDConsum . "<br>";
                    $sql_filter = "WHERE purchasing_class='supplies' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "dental":
                    if ($debug)
                        echo "dental<br>";
                    $sql_filter = "WHERE purchasing_class='dental' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') $and_bill";
                    break;

                case "drugs":
                    if ($debug)
                        echo "drugs<br>";
                    $sql_filter = "WHERE purchasing_class='drug_list' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "eye":
                    if ($debug)
                        echo "eye<br>";
                    $sql_filter = "WHERE purchasing_class='eye-service' OR purchasing_class='eye-surgery' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "file": //file

                    if ($debug)
                        echo $LDFile . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "icu":
                    if ($debug)
                        echo "icu<br>";
                    $sql_filter = "WHERE purchasing_class='service'  AND item_number like 'I%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "lab": //lab
                    if ($debug)
                        echo $LDLab . "<br>";
                    $sql_filter = "WHERE purchasing_class='labtest' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "mort":
                    if ($debug)
                        echo "mort<br>";
                    $sql_filter = "WHERE purchasing_class='service'  AND item_number like 'M%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "minproc":
                    if ($debug)
                        echo $LDMinProc . "<br>";
                    $sql_filter = "WHERE purchasing_class='minor_proc_op'  AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "proc/surg": //
                    if ($debug)
                        echo $LDProcSurg . "<br>";
                    $sql_filter = "WHERE (purchasing_class='obgyne_op' OR purchasing_class='ortho_op' OR  purchasing_class='surgical_op')
AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "radio":
                    if ($debug)
                        echo "radio<br>";
                    $sql_filter = "WHERE purchasing_class='xray' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;


                case "other"://returns
                    if ($debug)
                        echo "other<br>";
                    $sql_filter = "WHERE purchasing_class!='drug_list' 
				AND purchasing_class!='supplies'
				AND purchasing_class!='service'  
				AND purchasing_class!='dental' 
				AND purchasing_class!='labtest'
				AND purchasing_class!='xray'
				AND purchasing_class!='minor_proc_op'
				AND purchasing_class!='eye-service' 
				AND purchasing_class!='eye-surgery' 
				AND purchasing_class!='obgyne_op'
				AND purchasing_class!='ortho_op' 
				AND purchasing_class!='surgical_op'
				AND item_number like 'W%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";
                    break;

                case "total":
                    if ($debug)
                        echo $LDTotal . "<br>";
                    $sql_filter = "WHERE from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y')  $and_bill";  // count of all
                    break;
                default:
                    return FALSE;
            }

            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];
            if ($filter == "total") {
                $sql_lab = "SELECT SUM( price ) AS RetVal FROM care_tz_billing_archive_elem, care_tz_billing_archive,care_encounter WHERE prescriptions_nr =0 AND  $curr_day_start <=date_change AND $curr_day_end>=date_change  AND care_tz_billing_archive.nr = care_tz_billing_archive_elem.nr  
AND care_tz_billing_archive.encounter_nr=care_encounter.encounter_nr $admission_encounter $a_bill AND description NOT LIKE 'Advance%'";


                $db_obj_jumla = $db->Execute($sql_lab);
                $row_jumla = $db_obj_jumla->FetchRow();
                if ($jumla_lab = $row_jumla['RetVal'])
                    $return_value +=$jumla_lab;
            }


            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_prepaid_amount_of($start_timeframe, $day, $insuranceid, $filter, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            global $db;
            global $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;


            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM tmp_billing_master  ";
            switch ($filter) {
                case "amb":
                    if ($debug)
                        echo $LDAmb . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'A%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";

                    break;

                case "bed":
                    if ($debug)
                        echo $LDBed . "<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'B%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";

                    break;

                case "consult": //Consultation
                    if ($debug)
                        echo $LDConsult . "<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'C%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";

                    break;

                case "consum":
                    if ($debug)
                        echo $LDConsum . "<br>";

                    $sql_filter = "WHERE purchasing_class='supplies'  AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";

                    break;

                case "dental":
                    if ($debug)
                        echo "dental<br>";
                    $sql_filter = "WHERE purchasing_class='dental' AND 
				from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "drugs":
                    if ($debug)
                        echo "drugs<br>";
                    $sql_filter = "WHERE (  purchasing_class='drug_list') AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "eye":
                    if ($debug)
                        echo "eye<br>";
                    $sql_filter = "WHERE (  purchasing_class='eye-service' OR purchasing_class='eye-surgery' ) AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "file": //new patients
                    // new patient: all the patients what got the service item R01

                    if ($debug)
                        echo "file<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "icu":
                    if ($debug)
                        echo $LDICU . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'I%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "lab":
                    if ($debug)
                        echo $LDLab . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='labtest' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "mort":
                    if ($debug)
                        echo $LDMort . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'M%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "minproc":
                    if ($debug)
                        echo $LDMinProc . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='minor_proc_op' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "proc/surg		
				if ($debug) echo $LDProcSurg<br>";
                    $sql_filter = "WHERE ( purchasing_class='obgyne_op' OR purchasing_class='ortho_op' OR purchasing_class='surgical_op') AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "radio":
                    if ($debug)
                        echo "radio<br>";
                    $sql_filter = "WHERE purchasing_class='xray' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "other":
                    if ($debug)
                        echo "other<br>";
                    $sql_filter = "WHERE purchasing_class!='drug_list' 
				AND purchasing_class!='supplies' 
				AND purchasing_class!='service' 
				AND purchasing_class!='dental' 
				AND purchasing_class!='labtest'
				AND purchasing_class!='xray'
				AND purchasing_class!='minor_proc_op'
				AND purchasing_class!='eye-service' 
				AND purchasing_class!='eye-surgery' 
				AND purchasing_class!='obgyne_op'
				AND purchasing_class!='ortho_op' 
				AND purchasing_class!='surgical_op'
				AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "total":
                    if ($debug)
                        echo $LDTotal . "<br>";
                    $sql_filter = "WHERE  from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'"; // count of all
                    break;
                default:
                    return FALSE;
            }

            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];
            if ($filter == "jumla") {
                $sql_lab = "SELECT SUM(price) as RetVal FROM care_tz_billing_archive_elem WHERE prescriptions_nr=0 AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                $db_obj_jumla = $db->Execute($sql_lab);
                $row_jumla = $db_obj_jumla->FetchRow();
                if ($jumla_lab = $row_jumla['RetVal'])
                    $return_value +=$jumla_lab;
            }


            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, $filter, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)


            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            if ($encounternr) {
                $and_encounter = " AND encounter_nr ='$encounternr'";
            } else {
                $and_encounter = "";
            }

            global $db;
            global $LDAdvance, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;


            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM tmp_billing_master  ";
            switch ($filter) {

                case "amb":
                    if ($debug)
                        echo $LDAmb . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'A%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "bed":
                    if ($debug)
                        echo $LDBed . "<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'B%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "consult": //Consultation
                    if ($debug)
                        echo $LDConsult . "<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'C%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "consum":
                    if ($debug)
                        echo $LDConsum . "<br>";

                    $sql_filter = "WHERE purchasing_class='supplies'  AND 
				from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "dental":
                    if ($debug)
                        echo "dental<br>";
                    $sql_filter = "WHERE purchasing_class='dental' AND 
				from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "drugs":
                    if ($debug)
                        echo "drugs<br>";
                    $sql_filter = "WHERE (  purchasing_class='drug_list') AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  
		encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";
                    break;

                case "eye":
                    if ($debug)
                        echo "eye<br>";
                    $sql_filter = "WHERE ( purchasing_class='eye-service' OR purchasing_class='eye-surgery' ) 
AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  
		encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";
                    break;

                case "file": //new patients
                    // new patient: all the patients what got the service item R01

                    if ($debug)
                        echo "file<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "icu":
                    if ($debug)
                        echo $LDICU . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'I%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "lab":
                    if ($debug)
                        echo $LDLab . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='labtest' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "mort":
                    if ($debug)
                        echo $LDMort . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'M%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "minproc":
                    if ($debug)
                        echo $LDMinProc . "<br>";
                    $sql_filter = "WHERE purchasing_class='minor_proc_op'  AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "proc/surg":
                    if ($debug)
                        echo $LDProcSurg . "<br>";
                    $sql_filter = "WHERE ( purchasing_class='obgyne_op' OR purchasing_class='ortho_op' OR purchasing_class='surgical_op') AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "radio":
                    if ($debug)
                        echo "radio<br>";
                    $sql_filter = "WHERE purchasing_class='xray' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  
				encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "other":
                    if ($debug)
                        echo "other<br>";
                    $sql_filter = "WHERE purchasing_class!='drug_list' 
				AND purchasing_class!='supplies' 
				AND purchasing_class!='service' 
				AND purchasing_class!='dental' 
				AND purchasing_class!='labtest'
				AND purchasing_class!='xray'
				AND purchasing_class!='minor_proc_op'
				AND purchasing_class!='eye-service' 
				AND purchasing_class!='eye-surgery' 
				AND purchasing_class!='obgyne_op'
				AND purchasing_class!='ortho_op' 
				AND purchasing_class!='surgical_op' 
				AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND 
				 encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;

                case "total":
                    if ($debug)
                        echo $LDTotal . "<br>";
                    $sql_filter = "WHERE  from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

                    break;
                default:
                    return FALSE;
            }

            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];
            if ($filter == "total") {
                $sql_lab = "SELECT SUM(price) as RetVal FROM care_tz_billing_archive_elem, care_tz_billing_archive WHERE prescriptions_nr=0 AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";
                $db_obj_jumla = $db->Execute($sql_lab);
                $row_jumla = $db_obj_jumla->FetchRow();
                if ($jumla_lab = $row_jumla['RetVal'])
                    $return_value +=$jumla_lab;
            }


            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_insurance_company_total($start_timeframe, $day, $insuranceid, $filter, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            if ($insuranceid) {
                $and_insurance = " AND insurance_id = '$insuranceid'";
            } else {
                $and_insurance = "";
            }

            global $db;
            global $LDAdvance, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;


            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM tmp_billing_master  ";
            switch ($filter) {

                case "amb":
                    if ($debug)
                        echo $LDAmb . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'A%' AND $curr_day_start <=date_change AND $curr_day_end>=date_change $and_insurance";

                    break;

                case "bed":
                    if ($debug)
                        echo $LDBed . "<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'B%' AND $curr_day_start <=date_change AND $curr_day_end>=date_change $and_insurance";

                    break;

                case "consult": //Consultation
                    if ($debug)
                        echo $LDConsult . "<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'C%' AND $curr_day_start <=date_change AND $curr_day_end>=date_change $and_insurance";

                    break;

                case "consum":
                    if ($debug)
                        echo $LDConsum . "<br>";

                    $sql_filter = "WHERE purchasing_class='supplies' AND $curr_day_start <=date_change AND $curr_day_end>=date_change  $and_insurance";

                    break;

                case "dental":
                    if ($debug)
                        echo "dental<br>";
                    $sql_filter = "WHERE purchasing_class='dental' AND $curr_day_start <=date_change AND $curr_day_end>=date_change $and_insurance";

                    break;

                case "drugs":
                    if ($debug)
                        echo "drugs<br>";
                    $sql_filter = "WHERE (  purchasing_class='drug_list') AND $curr_day_start <=date_change AND $curr_day_end>=date_change $and_insurance";
                    break;

                case "eye":
                    if ($debug)
                        echo "eye<br>";
                    $sql_filter = "WHERE ( purchasing_class='eye-service' OR purchasing_class='eye-surgery' ) 
AND $curr_day_start <=date_change AND $curr_day_end>=date_change $and_insurance";
                    break;

                case "file": //new patients
                    // new patient: all the patients what got the service item R01

                    if ($debug)
                        echo "file<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' AND $curr_day_start <=date_change AND $curr_day_end>=date_change $and_insurance";
                    break;

                case "icu":
                    if ($debug)
                        echo $LDICU . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'I%' AND $curr_day_start <=date_change AND $curr_day_end>=date_change $and_insurance";

                    break;

                case "lab":
                    if ($debug)
                        echo $LDLab . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='labtest' AND $curr_day_start <=date_change AND $curr_day_end>=date_change $and_insurance";

                    break;

                case "mort":
                    if ($debug)
                        echo $LDMort . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'M%' AND $curr_day_start <=date_change AND $curr_day_end>=date_change $and_insurance";

                    break;

                case "minproc":
                    if ($debug)
                        echo $LDMinProc . "<br>";
                    $sql_filter = "WHERE purchasing_class='minor_proc_op'  AND $curr_day_start <=date_change AND $curr_day_end>=date_change  $and_insurance";
                    break;

                case "proc/surg":
                    if ($debug)
                        echo $LDProcSurg . "<br>";
                    $sql_filter = "WHERE ( purchasing_class='obgyne_op' OR purchasing_class='ortho_op' OR purchasing_class='surgical_op') AND $curr_day_start <=date_change AND $curr_day_end>=date_change  $and_insurance";

                    break;

                case "radio":
                    if ($debug)
                        echo "radio<br>";
                    $sql_filter = "WHERE purchasing_class='xray' AND $curr_day_start <=date_change AND $curr_day_end>=date_change   $and_insurance";

                    break;

                case "other":
                    if ($debug)
                        echo "other<br>";
                    $sql_filter = "WHERE purchasing_class!='drug_list' 
				AND purchasing_class!='supplies' 
				AND purchasing_class!='service'  
				AND purchasing_class!='dental' 
				AND purchasing_class!='labtest'
				AND purchasing_class!='xray'
				AND purchasing_class!='minor_proc_op'
				AND purchasing_class!='eye-service' 
				AND purchasing_class!='eye-surgery' 
				AND purchasing_class!='obgyne_op'
				AND purchasing_class!='ortho_op' 
				AND purchasing_class!='surgical_op' 
				AND $curr_day_start <=date_change AND $curr_day_end>=date_change AND $curr_day_start <=date_change AND $curr_day_end>=date_change  $and_insurance";

                    break;

                case "total":
                    if ($debug)
                        echo $LDTotal . "<br>";
                    $sql_filter = "WHERE  $curr_day_start <=date_change AND $curr_day_end>=date_change  $and_insurance";

                    break;
                default:
                    return FALSE;
            }

            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];
            if ($filter == "total") {
                $sql_lab = "SELECT SUM(price) as RetVal FROM care_tz_billing_archive_elem, care_tz_billing_archive WHERE prescriptions_nr=0 AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_end,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid' $and_encounter";
                $db_obj_jumla = $db->Execute($sql_lab);
                $row_jumla = $db_obj_jumla->FetchRow();
                if ($jumla_lab = $row_jumla['RetVal'])
                    $return_value +=$jumla_lab;
            }


            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, $filter, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            global $db;
            global $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;

            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM tmp_billing_master  ";
            switch ($filter) {
                case "invoice":
                    if ($debug)
                        echo $LDInvoice . "<br>";
                    $sql = "SELECT count(distinct(nr)) as RetVal FROM care_tz_billing_archive_elem  where $curr_day_start <=date_change AND $curr_day_end>=date_change AND (care_tz_billing_archive_elem .insurance_id !='' OR care_tz_billing_archive_elem .insurance_id !='NULL' OR care_tz_billing_archive_elem .insurance_id !='0') ";
                    break;
                case "file": //new patients
                    // new patient: all the patients what got the service item R01

                    if ($debug)
                        echo "file<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "consult": //Consultation
                    if ($debug)
                        echo $LDmat . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'C%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "lab":
                    if ($debug)
                        echo $LDlab . "<br>";
                    // start und ende timeframe fehlt noch!
                    $sql_filter = "WHERE purchasing_class='labtest' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;
                case "xray":

                    if ($debug)
                        echo "xray<br>";
                    $sql_filter = "WHERE purchasing_class='xray' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "dental":
                    if ($debug)
                        echo "dental<br>";
                    $sql_filter = "WHERE purchasing_class='dental' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "drugs":
                    if ($debug)
                        echo "drugs<br>";
                    $sql_filter = "WHERE ( purchasing_class='drug_list') AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "file":
                    if ($debug)
                        echo "file<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "icu":
                    if ($debug)
                        echo "icu<br>";
                    $sql_filter = "WHERE ( purchasing_class='service') AND item_number like 'I%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "mort":
                    if ($debug)
                        echo "mort<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'M%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "minproc":
                    if ($debug)
                        echo "min. proc<br>";
                    $sql_filter = "WHERE ( purchasing_class=minor_proc_op')  AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "proc/surg":
                    if ($debug)
                        echo "proc/surg<br>";
                    $sql_filter = "WHERE ( purchasing_class='eye-service' OR purchasing_class='obgyne_op' OR purchasing_class='ortho_op' 
OR purchasing_class='surgical_op') AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "radio":
                    if ($debug)
                        echo "Imaging<br>";
                    $sql_filter = "WHERE purchasing_class='xray' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                    break;

                case "other":
                    if ($debug)
                        echo "other<br>";
                    $sql_filter = "WHERE purchasing_class!='drug_list' 
				AND purchasing_class!='supplies' 
				AND purchasing_class!='service'  
				AND purchasing_class!='dental' 
				AND purchasing_class!='labtest'
				AND purchasing_class!='xray'
				AND purchasing_class!='minor_proc_op'
				AND purchasing_class!='eye-service' 
				AND purchasing_class!='eye-surgery' 
				AND purchasing_class!='obgyne_op'
				AND purchasing_class!='ortho_op' 
				AND purchasing_class!='surgical_op' 
				AND $curr_day_start <=date_change AND $curr_day_end>=date_change AND $curr_day_start <=date_change AND $curr_day_end>=date_change  $and_insurance";

                    break;

                case "total":
                    if ($debug)
                        echo $LDjumla . "<br>";
                    $sql_filter = "WHERE  from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid' "; // count of all
                    break;
                default:
                    return FALSE;
            }
            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];
            if ($filter == "total") {
                $sql_lab = "SELECT SUM(price) as RetVal FROM care_tz_billing_archive_elem WHERE prescriptions_nr=0 AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";
                $db_obj_jumla = $db->Execute($sql_lab);
                $row_jumla = $db_obj_jumla->FetchRow();
                if ($jumla_lab = $row_jumla['RetVal'])
                    $return_value +=$jumla_lab;
            }


            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_advance_amount_of($start_timeframe, $day, $filter, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            global $db;
            global $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;

            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM care_tz_billing_archive_elem   ";
            switch ($filter) {
                case "";
                    if ($debug)
                        echo "<br>";

                    $sql_filter = "WHERE description like 'Advance%'  AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "cash": //
                    if ($debug)
                        echo "cash<br>";

                    $sql_filter = "WHERE description like 'Advance%' AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "insurance": //
                    if ($debug)
                        echo "insurance<br>";

                    $sql_filter = "WHERE description like 'Advance%'  AND insurance_id!=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                default:
                    return FALSE;
            }

            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];

            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_bill_advance_amount_of($start_timeframe, $admission, $day, $billnr, $filter, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            if ($admission == '1') {
                $admission_encounter = " AND care_encounter.encounter_class_nr = 1 ";
            } else if ($admission == '2') {
                $admission_encounter = " AND care_encounter.encounter_class_nr = 2 ";
            } else if ($admission == "") {
                $admission_encounter = "";
            }

            if ($billnr) {
                $and_bill = " AND care_tz_billing_archive_elem.nr = '$billnr'";
            } else {
                $and_bill = "";
            }

            global $db;


            global $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;

            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM care_tz_billing_archive_elem  
		INNER JOIN care_tz_billing_archive ON care_tz_billing_archive_elem.nr = care_tz_billing_archive.nr  
		INNER JOIN care_encounter ON care_encounter.encounter_nr=care_tz_billing_archive.encounter_nr ";

            switch ($filter) {
                case "";
                    if ($debug)
                        echo "<br>";

                    $sql_filter = "WHERE description like 'Advance%'  AND $curr_day_start <=date_change AND $curr_day_end>=date_change $admission_encounter $and_bill";
                    break;

                case "cash": //
                    if ($debug)
                        echo "cash<br>";

                    $sql_filter = "WHERE description like 'Advance%' AND insurance_id=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change  $admission_encounter $and_bill";
                    break;

                case "insurance": //
                    if ($debug)
                        echo "insurance<br>";

                    $sql_filter = "WHERE description like 'Advance%'  AND insurance_id!=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change
$admission_encounter $and_bill";
                    break;

                default:
                    return FALSE;
            }

            $db_obj = $db->Execute($sql . $sql_filter);
            $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];

            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_insurance_company_advance_amount($start_timeframe, $day, $encounternr, $insuranceid, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            global $db;
            global $LDAdvance, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;


            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM care_tz_billing_archive_elem WHERE description like 'Advance%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND encounter_nr='$encounternr' AND  insurance_id='$insuranceid'";

            if ($db_obj = $db->Execute($sql))
                $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];

            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_insurance_company_advance_total($start_timeframe, $day, $insuranceid, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            global $db;
            global $LDAdvance, $LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab, $LDMort, $LDMinProc, $LDProcSurg, $LDRadio, $LDOther, $LDTotal;


            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
            $sql = "SELECT SUM(price*amount) as RetVal FROM care_tz_billing_archive_elem WHERE description like 'Advance%' AND from_unixtime($curr_day_start,'%d-%m-%Y') <= from_unixtime(date_change,'%d-%m-%Y') AND from_unixtime($curr_day_start,'%d-%m-%Y') >= from_unixtime(date_change,'%d-%m-%Y') AND  insurance_id='$insuranceid'";

            if ($db_obj = $db->Execute($sql))
                $row = $db_obj->FetchRow();
            $return_value = $row['RetVal'];

            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _get_pending_amount_of($start_timeframe, $day, $filter, $pricelist, $total_summary) {
            $sql_filter = "";
            $day-=1;
            $debug = false;
            if ($total_summary) {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = mktime(0, 0, 0, date("n", $start_timeframe) + 1, 1, date("Y", $start_timeframe)) - 1;
            } else {
                $curr_day_start = $this->_get_requested_day($start_timeframe, $day);
                $curr_day_end = $curr_day_start + (24 * 60 * 60 - 1);
            } // end of if ($total_summary)
            if ($debug)
                echo $curr_day_start . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_start) . "<br>";
            if ($debug)
                echo $curr_day_end . ": ";
            if ($debug)
                echo date("d.m.y", $curr_day_end) . "<br>";

            global $db;
            global$LDAmb, $LDBed, $LDConsult, $LDConsum, $LDDental, $LDDrugs, $LDEye, $LDFile, $LDICU, $LDLab,
            $LDMort, $LDMinProc, $LDProcSurg, $LDImaging, $LDOther, $LDTotal;

            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $sql = "SELECT SUM(unit_price*amount) as RetVal FROM tmp_billing_pending_quotations   ";

            switch ($filter) {

                case "amb": //
                    if ($debug)
                        echo "amb<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'A%'  AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;


                case "bed": //Consultation
                    if ($debug)
                        echo "bed<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'B%' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "consult": //Consultation
                    if ($debug)
                        echo "consult<br>";

                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'C%'  AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "consum": //Consumables
                    if ($debug)
                        echo "consum<br>";

                    $sql_filter = "WHERE purchasing_class='supplies' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "dental":
                    if ($debug)
                        echo "dental<br>";
                    $sql_filter = "WHERE purchasing_class='dental' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "drugs":
                    if ($debug)
                        echo "drugs<br>";
                    $sql_filter = "WHERE (  purchasing_class='drug_list') AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "eye":
                    if ($debug)
                        echo "eye<br>";
                    $sql_filter = "WHERE ( purchasing_class='eye-service' OR purchasing_class='eye-surgery' ) AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "file": //new patients
                    // new patient: all the patients what got the service item R01

                    if ($debug)
                        echo "file<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number='R01' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "icu":
                    if ($debug)
                        echo $LDICU . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'I%' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "lab":
                    if ($debug)
                        echo $LDLab . "<br>";
                    $sql_filter = "WHERE purchasing_class='labtest' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "mort":
                    if ($debug)
                        echo $LDMort . "<br>";
                    $sql_filter = "WHERE purchasing_class='service' AND item_number like 'M%' AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "minproc":
                    if ($debug)
                        echo $LDMinProc . "<br>";
                    $sql_filter = "WHERE purchasing_class='minor_proc_op'  AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "proc/surg":
                    if ($debug)
                        echo "proc/surg<br>";
                    $sql_filter = "WHERE ( purchasing_class='obgyne_op' OR purchasing_class='ortho_op' OR purchasing_class='surgical_op') AND $curr_day_start <=date_change AND $curr_day_end>=date_change ";
                    break;

                case "radio"://returns
                    if ($debug)
                        echo "radio<br>";
                    $sql_filter = "WHERE purchasing_class='xray' AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "other"://returns
                    // returns: all other items
                    if ($debug)
                        echo "other<br>";
                    $sql_filter = "WHERE purchasing_class!='drug_list' 
				AND purchasing_class!='supplies'
				AND purchasing_class!='service'   
				AND purchasing_class!='dental' 
				AND purchasing_class!='labtest'
				AND purchasing_class!='xray'
				AND purchasing_class!='minor_proc_op'
				AND purchasing_class!='eye-service' 
				AND purchasing_class!='eye-surgery' 
				AND purchasing_class!='obgyne_op'
				AND purchasing_class!='ortho_op' 
				AND purchasing_class!='surgical_op'
				AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
                    break;

                case "total":
                    if ($debug)
                        echo $LDTotal . "<br>";
                    $sql_filter = "WHERE $curr_day_start <=date_change AND $curr_day_end>=date_change"; // count of all
                    break;

                default:
                    return FALSE;
            }

            $db_obj = $db->Execute($sql . $sql_filter);
            if ($row = $db_obj->FetchRow())
                $return_value = $row['RetVal'];
            /*
              if ($filter=="total") {
              $sql_total="SELECT SUM(price) as RetVal FROM tmp_billing_pending_quotations
              WHERE  prescriptions_nr=0 AND $curr_day_start <=date_change AND $curr_day_end>=date_change";
              $db_obj_total = $db->Execute($sql_total);
              $row_total=$db_obj_total->FetchRow();
              if ($total_sum=$row_total['RetVal'])
              $return_value +=$total_sum;

              }

             */

            if ($return_value) {
                return number_format($return_value, 0, '.', ',');
            } else { // no return value given for this query...
                return "0";
            } // end of if ($return_value)
        }

        function _Create_financial_tmp_master_table($start_timeframe, $end_timeframe) {
            global $db;
            $db->debug = false;
            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TABLE IF EXISTS `tmp_billing_master`";
            $db_ptr = $db->Execute($sql_d);
            $sql_s = "CREATE  TEMPORARY TABLE tmp_billing_master TYPE=HEAP (SELECT DISTINCT
				  care_tz_billing_archive_elem.nr as BillNumber,
				  care_tz_billing_archive_elem.date_change,
				  care_tz_billing_archive_elem.is_labtest,
				  care_tz_billing_archive_elem.is_medicine,
				  care_tz_billing_archive_elem.is_comment,
				  care_tz_billing_archive_elem.is_paid,
				  care_tz_billing_archive_elem.amount,
				  care_tz_billing_archive_elem.price,
				  care_tz_billing_archive_elem.insurance_id,
				  care_tz_billing_archive_elem.description,
				  care_tz_drugsandservices.purchasing_class,
				  care_tz_drugsandservices.item_number,
          		  care_encounter.encounter_nr,
          		  care_encounter.pid
				from care_tz_billing_archive
				INNER JOIN care_tz_billing_archive_elem on care_tz_billing_archive.nr=care_tz_billing_archive_elem.nr
				INNER JOIN care_tz_drugsandservices ON care_tz_drugsandservices.item_id = care_tz_billing_archive_elem.item_number
				INNER JOIN care_encounter ON care_encounter.encounter_nr=care_tz_billing_archive.encounter_nr
				WHERE care_tz_billing_archive_elem.date_change>='" . $start_timeframe . "' AND care_tz_billing_archive_elem.date_change<='" . $end_timeframe . "')";
            if ($db_ptr = $db->Execute($sql_s))
                return TRUE;
            else
                return FALSE;
        }

        function _Create_Cash_financial_tmp_master_table($start_timeframe, $end_timeframe, $admission) {
            global $db;
            $db->debug = false;

            if ($admission == '1') {
                $admission_encounter = " AND care_encounter.encounter_class_nr = 1";
            } else if ($admission == '2') {
                $admission_encounter = " AND care_encounter.encounter_class_nr = 2";
            } else if ($admission == "") {
                $admission_encounter = "";
            }


            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TABLE IF EXISTS `tmp_billing_master`";
            $db_ptr = $db->Execute($sql_d);
            $sql_s = "CREATE TEMPORARY TABLE tmp_billing_master TYPE=HEAP (SELECT DISTINCT
				  care_tz_billing_archive_elem.nr as BillNumber,
				  care_tz_billing_archive_elem.date_change,
				  care_tz_billing_archive_elem.is_labtest,
				  care_tz_billing_archive_elem.is_medicine,
				  care_tz_billing_archive_elem.is_comment,
				  care_tz_billing_archive_elem.is_paid,
				  care_tz_billing_archive_elem.amount,
				  care_tz_billing_archive_elem.price,
				  care_tz_billing_archive_elem.insurance_id,
				  care_tz_billing_archive_elem.description,
				  care_tz_drugsandservices.purchasing_class,
				  care_tz_drugsandservices.item_number,care_tz_drugsandservices.item_description,care_tz_drugsandservices.item_full_description,
          		  care_encounter.encounter_nr,
          		  care_encounter.pid
				from care_tz_billing_archive
				INNER JOIN care_tz_billing_archive_elem on care_tz_billing_archive.nr=care_tz_billing_archive_elem.nr
				INNER JOIN care_tz_drugsandservices ON care_tz_drugsandservices.item_id = care_tz_billing_archive_elem.item_number
				INNER JOIN care_encounter ON care_encounter.encounter_nr=care_tz_billing_archive.encounter_nr
				WHERE care_tz_billing_archive_elem.date_change>='" . $start_timeframe . "' AND care_tz_billing_archive_elem.date_change<='" . $end_timeframe . "' $admission_encounter AND (insurance_id ='' OR insurance_id ='NULL' OR insurance_id ='0') )";

            if ($db_ptr = $db->Execute($sql_s))
                return TRUE;
            else
                return FALSE;
        }

        function _Create_Cash_receipts_tmp_master_table($start_timeframe, $end_timeframe, $admission) {
            global $db;
            $db->debug = false;

            if ($admission == '1') {
                $admission_encounter = " AND care_encounter.encounter_class_nr = 1";
            } else if ($admission == '2') {
                $admission_encounter = " AND care_encounter.encounter_class_nr = 2";
            } else if ($admission == "") {
                $admission_encounter = "";
            }


            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TABLE IF EXISTS `tmp_billing_master`";
            $db_ptr = $db->Execute($sql_d);
            $sql_s = "CREATE TEMPORARY TABLE tmp_billing_master TYPE=HEAP (SELECT DISTINCT
				  care_tz_billing_archive_elem.nr as BillNumber,
				  care_tz_billing_archive_elem.date_change,
				  care_tz_billing_archive_elem.is_labtest,
				  care_tz_billing_archive_elem.is_medicine,
				  care_tz_billing_archive_elem.is_comment,
				  care_tz_billing_archive_elem.is_paid,
				  care_tz_billing_archive_elem.amount,
				  care_tz_billing_archive_elem.price,
				  care_tz_billing_archive_elem.insurance_id,
				  care_tz_billing_archive_elem.description,
				  care_tz_drugsandservices.purchasing_class,
				  care_tz_drugsandservices.item_number,care_tz_drugsandservices.item_description,care_tz_drugsandservices.item_full_description,
          		  care_encounter.encounter_nr,
          		  care_encounter.pid
				from care_tz_billing_archive
				INNER JOIN care_tz_billing_archive_elem on care_tz_billing_archive.nr=care_tz_billing_archive_elem.nr
				LEFT JOIN care_tz_drugsandservices ON care_tz_drugsandservices.item_id = care_tz_billing_archive_elem.item_number
				INNER JOIN care_encounter ON care_encounter.encounter_nr=care_tz_billing_archive.encounter_nr
				WHERE care_tz_billing_archive_elem.date_change>='" . $start_timeframe . "' AND care_tz_billing_archive_elem.date_change<='" . $end_timeframe . "' $admission_encounter AND (insurance_id ='' OR insurance_id ='NULL' OR insurance_id ='0') )";

            if ($db_ptr = $db->Execute($sql_s))
                return TRUE;
            else
                return FALSE;
        }

        function _Create_insurance_financial_tmp_master_table($start_timeframe, $end_timeframe, $admission) {
            global $db;
            $db->debug = false;


            if ($admission == '1') {
                $admission_encounter = " AND care_encounter.encounter_class_nr = 1";
            } else if ($admission == '2') {
                $admission_encounter = " AND care_encounter.encounter_class_nr = 2";
            } else if ($admission == "") {
                $admission_encounter = "";
            }


            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TEMPORARY TABLE IF EXISTS `tmp_billing_master`";
            $db_ptr = $db->Execute($sql_d);


            $sql_s = "CREATE  TEMPORARY TABLE tmp_billing_master TYPE=HEAP (SELECT DISTINCT
				  care_tz_billing_archive_elem.nr as BillNumber,
				  care_tz_billing_archive_elem.date_change,
				  care_tz_billing_archive_elem.is_labtest,
				  care_tz_billing_archive_elem.is_medicine,
				  care_tz_billing_archive_elem.is_comment,
				  care_tz_billing_archive_elem.is_paid,
				  care_tz_billing_archive_elem.amount,
				  care_tz_billing_archive_elem.price,
				  care_tz_billing_archive_elem.insurance_id,
				  care_tz_billing_archive_elem.description,
				  care_tz_drugsandservices.purchasing_class,
				  care_tz_drugsandservices.item_number,care_tz_drugsandservices.item_description,care_tz_drugsandservices.item_full_description,
          		  care_encounter.encounter_nr,
          		  care_encounter.pid
				from care_tz_billing_archive
				INNER JOIN care_tz_billing_archive_elem on care_tz_billing_archive.nr=care_tz_billing_archive_elem.nr
				INNER JOIN care_tz_drugsandservices ON care_tz_drugsandservices.item_id = care_tz_billing_archive_elem.item_number
				INNER JOIN care_encounter ON care_encounter.encounter_nr=care_tz_billing_archive.encounter_nr
				WHERE care_tz_billing_archive_elem.date_change>='" . $start_timeframe . "' AND care_tz_billing_archive_elem.date_change<='" . $end_timeframe . "' $admission_encounter AND (insurance_id !='' OR insurance_id!='NULL' OR insurance_id !='0') )";
            if ($db_ptr = $db->Execute($sql_s))
                return TRUE;
            else
                return FALSE;
        }

        function _Create_prepaid_tmp_master_table($start_timeframe, $end_timeframe) {
            global $db;
            $db->debug = false;
            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TABLE IF EXISTS `tmp_billing_master`";
            $db_ptr = $db->Execute($sql_d);
            $sql_s = "CREATE TEMPORARY TABLE tmp_billing_master TYPE=HEAP (SELECT DISTINCT
				  care_tz_billing_archive_elem.nr as BillNumber,
				  care_tz_billing_archive_elem.date_change,
				  care_tz_billing_archive_elem.is_labtest,
				  care_tz_billing_archive_elem.is_medicine,
				  care_tz_billing_archive_elem.is_comment,
				  care_tz_billing_archive_elem.is_paid,
				  care_tz_billing_archive_elem.amount,
				  care_tz_billing_archive_elem.price,care_tz_billing_archive_elem.insurance_id,
				  care_tz_billing_archive_elem.description,
				  care_tz_drugsandservices.purchasing_class,
				  care_tz_drugsandservices.item_number,care_tz_drugsandservices.item_description,care_tz_drugsandservices.item_full_description,
          		  care_encounter.encounter_nr,care_encounter.current_dept_nr,
          		  care_encounter.pid
				from care_tz_billing_archive
				INNER JOIN care_tz_billing_archive_elem on care_tz_billing_archive.nr=care_tz_billing_archive_elem.nr
				INNER JOIN care_tz_drugsandservices ON care_tz_drugsandservices.item_id = care_tz_billing_archive_elem.item_number
				INNER JOIN care_encounter ON care_encounter.encounter_nr=care_tz_billing_archive.encounter_nr
				WHERE care_tz_billing_archive_elem.date_change>='" . $start_timeframe . "' AND care_tz_billing_archive_elem.date_change<='" . $end_timeframe . "' AND (insurance_id !='' OR insurance_id!='NULL' OR insurance_id !='0') )";
            if ($db_ptr = $db->Execute($sql_s))
                return TRUE;
            else
                return FALSE;
        }

        function _Create_art_financial_tmp_master_table($start_timeframe, $end_timeframe) {
            global $db;
            $db->debug = false;
            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TABLE IF EXISTS `tmp_billing_master`";
            $db_ptr = $db->Execute($sql_d);
            $sql_s = "CREATE  TEMPORARY TABLE tmp_billing_master TYPE=HEAP (SELECT DISTINCT
				  care_tz_billing_archive_elem.nr as BillNumber,
				  care_tz_billing_archive_elem.date_change,
				  care_tz_billing_archive_elem.is_labtest,
				  care_tz_billing_archive_elem.is_medicine,
				  care_tz_billing_archive_elem.is_comment,
				  care_tz_billing_archive_elem.is_paid,
				  care_tz_billing_archive_elem.amount,
				  care_tz_billing_archive_elem.price,
				  care_tz_billing_archive_elem.insurance_id,
				  care_tz_billing_archive_elem.description,
				  care_tz_drugsandservices.purchasing_class,
				  care_tz_drugsandservices.item_number,
          		  care_encounter.encounter_nr,care_encounter.current_dept_nr,
          		  care_encounter.pid
				from care_tz_billing_archive
				INNER JOIN care_tz_billing_archive_elem on care_tz_billing_archive.nr=care_tz_billing_archive_elem.nr
				INNER JOIN care_tz_drugsandservices ON care_tz_drugsandservices.item_id = care_tz_billing_archive_elem.item_number
				INNER JOIN care_encounter ON care_encounter.encounter_nr=care_tz_billing_archive.encounter_nr
				WHERE care_tz_billing_archive_elem.date_change>='" . $start_timeframe . "' AND care_tz_billing_archive_elem.date_change<='" . $end_timeframe . "' AND current_dept_nr='42')";
            if ($db_ptr = $db->Execute($sql_s))
                return TRUE;
            else
                return FALSE;
        }

        function _Create_tb_financial_tmp_master_table($start_timeframe, $end_timeframe) {
            global $db;
            $db->debug = false;
            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TABLE IF EXISTS `tmp_billing_master`";
            $db_ptr = $db->Execute($sql_d);
            $sql_s = "CREATE  TEMPORARY TABLE tmp_billing_master TYPE=HEAP (SELECT DISTINCT
				  care_tz_billing_archive_elem.nr as BillNumber,
				  care_tz_billing_archive_elem.date_change,
				  care_tz_billing_archive_elem.is_labtest,
				  care_tz_billing_archive_elem.is_medicine,
				  care_tz_billing_archive_elem.is_comment,
				  care_tz_billing_archive_elem.is_paid,
				  care_tz_billing_archive_elem.amount,
				  care_tz_billing_archive_elem.price,
				  care_tz_billing_archive_elem.insurance_id,
				  care_tz_billing_archive_elem.description,
				  care_tz_drugsandservices.purchasing_class,
				  care_tz_drugsandservices.item_number,
          		  care_encounter.encounter_nr,care_encounter.current_dept_nr,
          		  care_encounter.pid
				from care_tz_billing_archive
				INNER JOIN care_tz_billing_archive_elem on care_tz_billing_archive.nr=care_tz_billing_archive_elem.nr
				INNER JOIN care_tz_drugsandservices ON care_tz_drugsandservices.item_id = care_tz_billing_archive_elem.item_number
				INNER JOIN care_encounter ON care_encounter.encounter_nr=care_tz_billing_archive.encounter_nr
				WHERE care_tz_billing_archive_elem.date_change>='" . $start_timeframe . "' AND care_tz_billing_archive_elem.date_change<='" . $end_timeframe . "' AND current_dept_nr='47')";
            if ($db_ptr = $db->Execute($sql_s))
                return TRUE;
            else
                return FALSE;
        }

        function _Create_pending_quotations_tmp_master_table($start_timeframe, $end_timeframe, $admission) {
            global $db;
            $db->debug = false;

            $and_admission = "";

            if ($admission == '2') {
                $and_admission = " AND care_encounter.encounter_class_nr=2";
            } else
            if ($admission == '1') {
                $and_admission = " AND care_encounter.encounter_class_nr=1";
            } else
                $and_admission = "";


            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TABLE IF EXISTS `tmp_billing_pending_quotations`";
            $db_ptr = $db->Execute($sql_d);
            $sql_s = "CREATE TEMPORARY TABLE tmp_billing_pending_quotations SELECT
care_person.pid
				,	care_person.selian_pid
				,	care_person.name_first
				, 	care_person.name_last
				, 	care_person.date_birth
				, 	care_encounter.encounter_date
				,	unix_timestamp(care_encounter.encounter_date) as date_change
				,   care_encounter.encounter_class_nr
				, 	care_encounter.current_dept_nr
				, 	care_encounter.current_ward_nr
				,	care_tz_drugsandservices.item_number
				, 	CASE WHEN isnull(care_tz_drugsandservices.item_description)=1 THEN 'not available' ELSE care_tz_drugsandservices.item_description END as item_description
				,	1 as amount
				, 	CASE WHEN isnull(care_tz_drugsandservices.unit_price)=1 THEN 0 ELSE care_tz_drugsandservices.unit_price END as unit_price
				, 	CASE WHEN isnull(care_tz_drugsandservices.unit_price_1)=1 THEN 0 ELSE care_tz_drugsandservices.unit_price_1 END as unit_price_1
				, 	CASE WHEN isnull(care_tz_drugsandservices.unit_price_2)=1 THEN 0 ELSE care_tz_drugsandservices.unit_price_2 END as unit_price_2
				, 	CASE WHEN isnull(care_tz_drugsandservices.unit_price_3)=1 THEN 0 ELSE care_tz_drugsandservices.unit_price_3 END as unit_price_3
				, 	CASE WHEN isnull(care_tz_drugsandservices.purchasing_class)=1 THEN 'not available' ELSE care_tz_drugsandservices.purchasing_class END as purchasing_class
				,	care_encounter.encounter_nr
			FROM care_person

			INNER JOIN care_encounter
				ON care_encounter.pid=care_person.pid
			INNER JOIN care_test_request_chemlabor
				ON care_test_request_chemlabor.encounter_nr=care_encounter.encounter_nr
			INNER JOIN care_test_request_chemlabor_sub
				ON care_test_request_chemlabor.batch_nr=care_test_request_chemlabor_sub.batch_nr
			INNER JOIN care_tz_drugsandservices
				ON care_test_request_chemlabor_sub.item_id=care_tz_drugsandservices.item_id
			
			WHERE care_test_request_chemlabor_sub.bill_number = 0 $and_admission 

AND unix_timestamp(care_encounter.encounter_date)>='" . $start_timeframe . "' AND unix_timestamp(care_encounter.encounter_date)<='" . $end_timeframe . "'
			
			AND 	(isnull(care_test_request_chemlabor_sub.is_disabled) OR care_test_request_chemlabor_sub.is_disabled='')
			        
			UNION

			SELECT
                                care_person.pid
                                ,       care_person.selian_pid
                                ,       care_person.name_first
                                ,       care_person.name_last
                                ,       care_person.date_birth
                                ,       care_encounter.encounter_date
								,		unix_timestamp(care_encounter.encounter_date) as date_change
								,       care_encounter.encounter_class_nr
                                ,       care_encounter.current_dept_nr
                                ,       care_encounter.current_ward_nr
								,		care_tz_drugsandservices.item_number
 								,       care_tz_drugsandservices.item_description 
								,		care_test_request_radio.number_of_tests as amount
                                ,       care_tz_drugsandservices.unit_price
                                ,       care_tz_drugsandservices.unit_price_1
                                ,       care_tz_drugsandservices.unit_price_2
                                ,       care_tz_drugsandservices.unit_price_3
                                ,       care_tz_drugsandservices.purchasing_class
                                ,       care_encounter.encounter_nr
		 FROM care_person

                        INNER JOIN care_encounter
                                ON care_encounter.pid=care_person.pid
                        INNER JOIN care_test_request_radio
 				ON care_test_request_radio.encounter_nr = care_encounter.encounter_nr
			INNER JOIN care_tz_drugsandservices
				ON care_test_request_radio.test_request = care_tz_drugsandservices.item_description


			WHERE care_test_request_radio.bill_number = 0 $and_admission 
AND unix_timestamp(care_encounter.encounter_date)>='" . $start_timeframe . "' AND unix_timestamp(care_encounter.encounter_date)<='" . $end_timeframe . "'
			AND 	(isnull(care_test_request_radio.is_disabled) OR care_test_request_radio.is_disabled='')

			UNION
			
			SELECT
					care_person.pid
				,	care_person.selian_pid
				,	care_person.name_first
				, 	care_person.name_last
				, 	care_person.date_birth
				, 	care_encounter.encounter_date
				,	unix_timestamp(care_encounter.encounter_date) as date_change
				,   care_encounter.encounter_class_nr
				, 	care_encounter.current_dept_nr
				, 	care_encounter.current_ward_nr
				,	care_tz_drugsandservices.item_number
				, 	care_tz_drugsandservices.item_description
				,	care_encounter_prescription.total_dosage as amount
				, 	care_tz_drugsandservices.unit_price
				, 	care_tz_drugsandservices.unit_price_1
				, 	care_tz_drugsandservices.unit_price_2
				, 	care_tz_drugsandservices.unit_price_3
				, 	care_tz_drugsandservices.purchasing_class
				,	care_encounter.encounter_nr
			FROM care_person

			INNER JOIN care_encounter
				ON care_encounter.pid=care_person.pid
			INNER JOIN care_encounter_prescription
				ON care_encounter.encounter_nr=care_encounter_prescription.encounter_nr
			INNER JOIN care_tz_drugsandservices 
			ON care_encounter_prescription.article_item_number=care_tz_drugsandservices.item_id

			WHERE
					care_encounter_prescription.bill_number = 0 $and_admission

AND unix_timestamp(care_encounter.encounter_date)>='" . $start_timeframe . "' AND unix_timestamp(care_encounter.encounter_date)<='" . $end_timeframe . "'

				AND	care_tz_drugsandservices.purchasing_class != 'labtest'

				AND     care_tz_drugsandservices.purchasing_class != 'xray'
					
				AND 	(isnull(care_encounter_prescription.is_disabled) OR care_encounter_prescription.is_disabled='')
			";

            if ($db_ptr = $db->Execute($sql_s))
                return TRUE;
            else
                return FALSE;
        }

        function _Create_deleted_quotations_tmp_master_table($start_timeframe, $end_timeframe) {
            global $db;
            $db->debug = false;

            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TABLE IF EXISTS `tmp_billing_deleted_quotations`";
            $db_ptr = $db->Execute($sql_d);
            $sql_s = "CREATE TEMPORARY TABLE tmp_billing_deleted_quotations SELECT 
care_person.pid
				,	care_person.selian_pid
				,	care_person.name_first
				, 	care_person.name_last
				, 	care_person.date_birth
				, 	care_encounter.encounter_date
				,   care_encounter.encounter_class_nr
				, 	care_encounter.current_dept_nr
				, 	care_encounter.current_ward_nr
				,	care_tz_drugsandservices.item_description
				,	care_tz_drugsandservices.item_id
				,	1  as amount
				,	care_test_request_chemlabor_sub.disable_id
				,	care_test_request_chemlabor_sub.disable_date
				, 	care_tz_drugsandservices.unit_price
				, 	care_tz_drugsandservices.unit_price_1
				, 	care_tz_drugsandservices.unit_price_2
				, 	care_tz_drugsandservices.unit_price_3
			    , 	care_tz_drugsandservices.purchasing_class
				,	care_encounter.encounter_nr
				
			FROM care_person

			INNER JOIN care_encounter
				ON care_encounter.pid=care_person.pid
			INNER JOIN care_test_request_chemlabor
				ON care_test_request_chemlabor.encounter_nr=care_encounter.encounter_nr
			INNER JOIN care_test_request_chemlabor_sub
				ON care_test_request_chemlabor.batch_nr=care_test_request_chemlabor_sub.batch_nr
			INNER JOIN care_tz_drugsandservices
				ON care_test_request_chemlabor_sub.item_id=care_tz_drugsandservices.item_id
			
			WHERE care_test_request_chemlabor_sub.bill_status='dropped'
AND unix_timestamp(care_encounter.encounter_date)>='" . $start_timeframe . "' AND unix_timestamp(care_encounter.encounter_date)<='" . $end_timeframe . "'
			  			    
			UNION

			SELECT
                                care_person.pid
                                ,       care_person.selian_pid
                                ,       care_person.name_first
                                ,       care_person.name_last
                                ,       care_person.date_birth
                                ,       care_encounter.encounter_date
		   						,       care_encounter.encounter_class_nr
                                ,       care_encounter.current_dept_nr
                                ,       care_encounter.current_ward_nr
 		  						,       care_tz_drugsandservices.item_description
		  						,       care_tz_drugsandservices.item_id
		 						,       care_test_request_radio.number_of_tests as amount 
		 						,       care_test_request_radio.disable_id
								,		care_test_request_radio.disable_date
                                ,       care_tz_drugsandservices.unit_price
                                ,       care_tz_drugsandservices.unit_price_1
                                ,       care_tz_drugsandservices.unit_price_2
                                ,       care_tz_drugsandservices.unit_price_3
                                ,       care_tz_drugsandservices.purchasing_class
                                ,       care_encounter.encounter_nr
		 FROM care_person

                        INNER JOIN care_encounter
                                ON care_encounter.pid=care_person.pid
                        INNER JOIN care_test_request_radio
 				ON care_test_request_radio.encounter_nr = care_encounter.encounter_nr
			INNER JOIN care_tz_drugsandservices
				ON care_test_request_radio.test_request = care_tz_drugsandservices.item_description
			WHERE care_test_request_radio.bill_status='dropped' 
AND unix_timestamp(care_encounter.encounter_date)>='" . $start_timeframe . "' AND unix_timestamp(care_encounter.encounter_date)<='" . $end_timeframe . "'
 		
			UNION
			
			SELECT
					care_person.pid
				,	care_person.selian_pid
				,	care_person.name_first
				, 	care_person.name_last
				, 	care_person.date_birth
				, 	care_encounter.encounter_date
				,   care_encounter.encounter_class_nr
				, 	care_encounter.current_dept_nr
				, 	care_encounter.current_ward_nr
				, 	care_tz_drugsandservices.item_description
				,	care_tz_drugsandservices.item_id
				,	care_encounter_prescription.total_dosage as amount
				,	care_encounter_prescription.disable_id
				,	care_encounter_prescription.disable_date
				, 	care_tz_drugsandservices.unit_price
				, 	care_tz_drugsandservices.unit_price_1
				, 	care_tz_drugsandservices.unit_price_2
				, 	care_tz_drugsandservices.unit_price_3
				, 	care_tz_drugsandservices.purchasing_class
				,	care_encounter.encounter_nr
				
			FROM care_person

			INNER JOIN care_encounter
				ON care_encounter.pid=care_person.pid
			INNER JOIN care_encounter_prescription
				ON care_encounter.encounter_nr=care_encounter_prescription.encounter_nr
			INNER JOIN care_tz_drugsandservices 
			ON care_encounter_prescription.article_item_number=care_tz_drugsandservices.item_id

			WHERE
					care_encounter_prescription.bill_status='dropped' 

				AND	care_tz_drugsandservices.purchasing_class != 'labtest'

				AND care_tz_drugsandservices.purchasing_class != 'xray'
				
				AND unix_timestamp(care_encounter.encounter_date)>='" . $start_timeframe . "' AND unix_timestamp(care_encounter.encounter_date)<='" . $end_timeframe . "'";

            if ($db_ptr = $db->Execute($sql_s))
                return TRUE;
            else
                return FALSE;
        }

        function _Create_lab_requests_table($start_timeframe, $end_timeframe, $admission) {
            global $db;
            $db->debug = false;

            $end_timeframe += (24 * 60 * 60 - 1);

            if ($admission == 1) {
                $sql_admission = " encounter_class_nr='" . $admission . "'";
            } else
            if ($admission == 2) {
                $sql_admission = " encounter_class_nr='" . $admission . "'";
            } else
                $sql_admission = " 1=1 ";

            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TABLE IF EXISTS `tmp_laboratories`";
            $db_ptr = $db->Execute($sql_d);
            $sql_s = "CREATE TEMPORARY TABLE tmp_laboratories ENGINE=MEMORY (SELECT care_test_request_chemlabor.batch_nr,UNIX_TIMESTAMP(care_test_request_chemlabor.create_time) as send_date,care_test_request_chemlabor.status,
paramater_name as id
				FROM care_test_request_chemlabor
				INNER JOIN care_test_request_chemlabor_sub ON care_test_request_chemlabor.batch_nr=care_test_request_chemlabor_sub.batch_nr
				INNER JOIN care_encounter ON care_test_request_chemlabor.encounter_nr = care_encounter.encounter_nr
				WHERE $sql_admission
				AND UNIX_TIMESTAMP(care_test_request_chemlabor.create_time)>='" . $start_timeframe . "' 
				AND UNIX_TIMESTAMP(care_test_request_chemlabor.create_time)<='" . $end_timeframe . "' AND (care_test_request_chemlabor_sub.is_disabled!='1' OR care_test_request_chemlabor_sub.status!='deleted'))";

            if ($db_ptr = $db->Execute($sql_s))
                return TRUE;
            else
                return FALSE;
        }

        function _Create_lab_tests_table($start_timeframe, $end_timeframe, $admission,$health_fund) {
            global $db;
            $db->debug = false;

            $end_timeframe += (24 * 60 * 60 - 1);

            if ($admission == 1) {
                $sql_admission = " encounter_class_nr='" . $admission . "'";
            } else
            if ($admission == 2) {
                $sql_admission = " encounter_class_nr='" . $admission . "'";
            } else {
                $sql_admission = " 1=1 ";
            }

            switch ($health_fund) {
                case "-2":
                    $hf="";
                    break;

                case "0":
                    $hf="AND care_person.insurance_ID='0'";
                    break;    

                
                default:
                    $hf="AND care_person.insurance_ID=".$health_fund;
                    break;
            }

              if (!$_POST['show']) {
                $hf="";
                  
              }

                           
            



            // SELECT-Statement with all the informations we need:
            $sql_d = "DROP TABLE IF EXISTS `tmp_laboratories`";
            $db_ptr = $db->Execute($sql_d);
            $sql_s = "CREATE TEMPORARY TABLE tmp_laboratories ENGINE=MEMORY (SELECT care_test_request_chemlabor.batch_nr, UNIX_TIMESTAMP( care_test_request_chemlabor.create_time ) AS send_date, 
                care_test_request_chemlabor.status, paramater_name AS id
                FROM care_test_request_chemlabor
                INNER JOIN care_test_findings_chemlabor_sub ON care_test_request_chemlabor.batch_nr = care_test_findings_chemlabor_sub.job_id
                INNER JOIN care_encounter ON care_test_request_chemlabor.encounter_nr = care_encounter.encounter_nr INNER JOIN care_person ON care_person.pid=care_encounter.pid
                    WHERE $sql_admission $hf 
                    AND UNIX_TIMESTAMP(care_test_request_chemlabor.create_time)>='" . $start_timeframe . "' 
                    AND UNIX_TIMESTAMP(care_test_request_chemlabor.create_time)<='" . $end_timeframe . "') ";
//            echo $sql_s;
            if ($db_ptr = $db->Execute($sql_s)) {
//                print_r($db_ptr);
                return TRUE;
            } else {
                return FALSE;
            }
        }

        function DisplayBillingTestSummary($start_timeframe, $end_timeframe) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforFinancialReports, $LDstarttime, $LDendtime;
            $color_change = FALSE;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);
            $this->_Create_financial_tmp_master_table($start_timeframe, $end_timeframe);
            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";

            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);
            $table.="<tr>\n";
            for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                $table.="<tr>\n";
                if ($current_day > time()) {

                    if (!$PRINTOUT)
                        $bg_color = "#ffffff";

                    $italic_tag_open = "<i>";
                    $italic_tag_close = "</i>";
                } else {

                    if (!$PRINTOUT)
                        $bg_color = "#ffffaa";

                    $italic_tag_open = "";
                    $italic_tag_close = "";
                } // end of if ($current_day > time())



                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . date("j/m/Y", $this->_get_requested_day($start_timeframe, $day - 1, FALSE)) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_advance_amount_of($start_timeframe, $day, "", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "amb", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "bed", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "consult", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "consum", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "dental", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "drugs", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "eye", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "file", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "icu", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "lab", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "mort", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "minproc", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "proc/surg", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "radio", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "other", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, $day, "total", FALSE) . $italic_tag_close . "</td>\n";

                $table.="</tr>\n";
            }
            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_advance_amount_of($start_timeframe, 1, "", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "amb", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "bed", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "consult", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "consum", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "dental", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "drugs", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "eye", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "file", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "icu", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "lab", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "mort", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "minproc", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "proc/surg", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "radio", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "other", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "total", TRUE) . $italic_tag_close . "</td>\n";

            $table.="</tr>\n";
            $table.="</tr>\n";
            echo $table;
        }

        function DisplayBillingResultRows($start_timeframe, $end_timeframe) {
            
        }

        function DisplayCashBillingTestSummary($start_timeframe, $end_timeframe, $admission) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforFinancialReports, $LDstarttime, $LDendtime;

            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);
            $this->_Create_Cash_financial_tmp_master_table($start_timeframe, $end_timeframe, $admission);
            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";

            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);
            $table.="<tr>\n";
            for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                $table.="<tr>\n";
                if ($current_day > time()) {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffff";
                    $italic_tag_open = "<i>";
                    $italic_tag_close = "</i>";
                } else {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffaa";
                    $italic_tag_open = "";
                    $italic_tag_close = "";
                } // end of if ($current_day > time())

                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . date("j/m/Y", $this->_get_requested_day($start_timeframe, $day - 1, FALSE)) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_advance_amount_of($start_timeframe, $day, "cash", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "amb", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "bed", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "consult", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "consum", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "dental", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "drugs", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "eye", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "file", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "icu", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "lab", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "mort", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "minproc", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "proc/surg", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "radio", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "other", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, $day, "total", FALSE) . $italic_tag_close . "</td>\n";

                $table.="</tr>\n";
            }
            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_advance_amount_of($start_timeframe, 1, "cash", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "amb", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "bed", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "consult", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "consum", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "dental", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "drugs", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "eye", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "file", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "icu", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "lab", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "mort", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "minproc", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "proc/surg", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "radio", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "other", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "total", TRUE) . $italic_tag_close . "</td>\n";

            $table.="</tr>\n";
            $table.="</tr>\n";
            echo $table;
        }

        function DisplayCashBillingResultRows($start_timeframe, $end_timeframe) {
            
        }

        function DisplayCashReceiptsTestSummary($start_timeframe, $end_timeframe, $admission) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforFinancialReports, $LDstarttime, $LDendtime;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);

            $this->_Create_Cash_receipts_tmp_master_table($start_timeframe, $end_timeframe, $admission);

            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.Y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";

            $first_day_of_req_month = date("d", $start_timeframe);
            echo $first_day_of_req_month;
            echo 'mj';
            $last_day_of_req_month = date("d", $end_timeframe);
            $table.="<tr>\n";
            for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                $table.="<tr>\n";
                if ($current_day > time()) {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffff";
                    $italic_tag_open = "<i>";
                    $italic_tag_close = "</i>";
                } else {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffaa";
                    $italic_tag_open = "";
                    $italic_tag_close = "";
                } // end of if ($current_day > time())


                $sql_encounter_nr = "SELECT distinct(BillNumber) FROM tmp_billing_master where  from_unixtime( date_change, '%Y-%d-%m' )=from_unixtime( $current_day, '%Y-%d-%m' )  ";
                $db_ptr_encounter_nr = $db->Execute($sql_encounter_nr);


                while ($db_row_encounter_nr = $db_ptr_encounter_nr->FetchRow()) {
                    $billnr = $db_row_encounter_nr['BillNumber'] . '<br>';
                    //$encounternr=$db_row_encounter_nr['encounternr'].'<br>';
                    //$pid=$db_row_encounter_nr['pid'].'<br>';


                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . date("j/m/Y", $current_day - 1) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $billnr . $italic_tag_close . "</td>\n";
                    //$table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_arv_amount_of($start_timeframe,$day,$encounternr,"invoice", FALSE).$italic_tag_close."</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_advance_amount_of($start_timeframe, $admission, $day, $billnr, "", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "amb", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "bed", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "consult", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "consum", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "dental", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "drugs", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "eye", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "file", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "icu", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "lab", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "mort", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "minproc", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "proc/surg", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "radio", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "other", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_bill_amount_of($start_timeframe, $admission, $day, $billnr, "total", FALSE) . $italic_tag_close . "</td>\n";

                    $table.="</tr>\n";
                }
            }
            $billnr = FALSE;
            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_advance_amount_of($start_timeframe, 1, "", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "amb", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "bed", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "consult", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "consum", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "dental", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "drugs", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "eye", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "file", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "icu", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "lab", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "mort", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "minproc", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "proc/surg", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "radio", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "other", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_cash_amount_of($start_timeframe, 1, "total", TRUE) . $italic_tag_close . "</td>\n";

            $table.="</tr>\n";
            $table.="</tr>\n";

            echo $table;
        }

        function DisplayCashReceiptsRows() {
            
        }

        function DisplayInsuranceBillingTestSummary($start_timeframe, $end_timeframe, $admission) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforFinancialReports, $LDstarttime, $LDendtime;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);
            $this->_Create_insurance_financial_tmp_master_table($start_timeframe, $end_timeframe, $admission);
            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";

            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);
            $table.="<tr>\n";
            for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                $table.="<tr>\n";
                if ($current_day > time()) {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffff";
                    $italic_tag_open = "<i>";
                    $italic_tag_close = "</i>";
                } else {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffaa";
                    $italic_tag_open = "";
                    $italic_tag_close = "";
                } // end of if ($current_day > time())


                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . date("j/m/Y", $this->_get_requested_day($start_timeframe, $day - 1, FALSE)) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_advance_amount_of($start_timeframe, $day, "insurance", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "amb", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "bed", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "consult", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "consum", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "dental", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "drugs", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "eye", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "file", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "icu", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "lab", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "mort", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "minproc", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "proc/surg", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "radio", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "other", FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, $day, "total", FALSE) . $italic_tag_close . "</td>\n";

                $table.="</tr>\n";
            }
            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_advance_amount_of($start_timeframe, 1, "insurance", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "amb", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "bed", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "consult", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "consum", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "dental", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "drugs", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "eye", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "file", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "icu", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "lab", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "mort", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "minproc", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "proc/surg", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "radio", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "other", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_amount_of($start_timeframe, 1, "total", TRUE) . $italic_tag_close . "</td>\n";

            $table.="</tr>\n";
            $table.="</tr>\n";
            echo $table;
        }

        function DisplayInsuranceBillingResultRows($start_timeframe, $end_timeframe) {
            
        }

        function DisplayInsuranceCompanyTestSummary($start_timeframe, $end_timeframe, $insuranceid, $admission) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforFinancialReports, $LDstarttime, $LDendtime;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);
            $this->_Create_insurance_financial_tmp_master_table($start_timeframe, $end_timeframe, $admission);

            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";

            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);
            $table.="<tr>\n";
            for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                $table.="<tr>\n";
                if ($current_day > time()) {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffff";
                    $italic_tag_open = "<i>";
                    $italic_tag_close = "</i>";
                } else {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffaa";
                    $italic_tag_open = "";
                    $italic_tag_close = "";
                } // end of if ($current_day > time())


                $sql_encounter_nr = "SELECT distinct (encounter_nr)  as encounternr , pid FROM tmp_billing_master where insurance_id='$insuranceid' and from_unixtime( date_change, '%Y-%d-%m' )=from_unixtime( $current_day, '%Y-%d-%m' )  ";
                $db_ptr_encounter_nr = $db->Execute($sql_encounter_nr);

                while ($db_row_encounter_nr = $db_ptr_encounter_nr->FetchRow()) {

                    $encounternr = $db_row_encounter_nr['encounternr'] . '<br>';

                    $pid = $db_row_encounter_nr['pid'] . '<br>';

                    $sql_hospitalnr = "SELECT name_last,name_first FROM care_person where pid='$pid'";
                    $db_ptr_hospitalnr = $db->Execute($sql_hospitalnr);
                    $db_row_hospitalnr = $db_ptr_hospitalnr->FetchRow();
                    $hospitalnr = $db_row_hospitalnr['name_last'] . '  ' . $db_row_hospitalnr['name_first'];


                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . date("j/m/Y", $current_day) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $hospitalnr . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_advance_amount($start_timeframe, $day, $encounternr, $insuranceid, FALSE) . $italic_tag_close . "</td>\n";

                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "amb", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "bed", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "consult", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "consum", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "dental", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "drugs", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "eye", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "file", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "icu", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "lab", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "mort", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "minproc", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "proc/surg", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "radio", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "other", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_amount_of($start_timeframe, $day, $encounternr, $insuranceid, "total", FALSE) . $italic_tag_close . "</td>\n";

                    $table.="</tr>\n";
                }
            }

            $table.="<tr>\n";

            if (!$PRINTOUT)
                $bg_color = "#CC9933";

            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\"></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_advance_amount($start_timeframe, 1, $insuranceid, $insuranceid, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "amb", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "bed", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "consult", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "consum", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "dental", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "drugs", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "eye", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "file", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "icu", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "lab", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "mort", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "minproc", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "proc/surg", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "radio", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "other", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "total", TRUE) . $italic_tag_close . "</td>\n";

            $table.="</tr>\n";
            $table.="</tr>\n";

            echo $table;
        }

        function DisplayInsuranceCompanyResultRows($start_timeframe, $end_timeframe, $insurance_id) {
            
        }

        function DisplayCompaniesBillingTestSummary($start_timeframe, $end_timeframe, $admission) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforFinancialReports, $LDstarttime, $LDendtime;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);
            $this->_Create_prepaid_tmp_master_table($start_timeframe, $end_timeframe);
            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";
            /*
              $first_day_of_req_month = date ("d",$start_timeframe);
              $last_day_of_req_month = date ("d",$end_timeframe);
             */
            $table.="<tr>\n";
            /*
              for ($day=$first_day_of_req_month; $day<=$last_day_of_req_month ; $day++) {
              $current_day = $this->_get_requested_day($start_timeframe, $day-1);
              $table.="<tr>\n";
              if ($current_day > time()) {
              if (!$PRINTOUT)$bg_color="#ffffff";
              $italic_tag_open="<i>";
              $italic_tag_close="</i>";
              } else {
              if (!$PRINTOUT)$bg_color="#ffffaa";
              $italic_tag_open="";
              $italic_tag_close="";
              } // end of if ($current_day > time())
             */
            $sql_insurance_id = "SELECT distinct (tmp_billing_master.insurance_id) as insuranceid,care_tz_company.name FROM tmp_billing_master INNER JOIN care_tz_company ON tmp_billing_master.insurance_id=care_tz_company.id   ORDER BY name ASC";
            $db_ptr_insurance_id = $db->Execute($sql_insurance_id);

            while ($db_row_insurance_id = $db_ptr_insurance_id->FetchRow()) {
                $insuranceid = $db_row_insurance_id['insuranceid'] . '<br>';

                $insurance_name = $db_row_insurance_id['name'];

                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $insurance_name . $italic_tag_close . "</td>\n";

                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_advance_total($start_timeframe, $day, $insuranceid, TRUE) . $italic_tag_close . "</td>\n";

                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "amb", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "bed", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "consult", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "consum", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "dental", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "drugs", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "eye", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "file", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "icu", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "lab", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "mort", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "minproc", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "proc/surg", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "radio", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "other", TRUE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, $insuranceid, "total", TRUE) . $italic_tag_close . "</td>\n";

                $table.="</tr>\n";
            }

            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";

            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";

            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_advance_total($start_timeframe, 1, "", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "amb", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "bed", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "consult", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "consum", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "dental", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "drugs", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "eye", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "file", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "icu", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "lab", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "mort", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "minproc", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "proc/surg", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "radio", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "other", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_insurance_company_total($start_timeframe, 1, "", "total", TRUE) . $italic_tag_close . "</td>\n";

            $table.="</tr>\n";
            $table.="</tr>\n";

            echo $table;
        }

        function DisplayCompaniesBillingResultRows($start_timeframe, $end_timeframe, $admission) {
            
        }

        function DisplayPrepaidBillingTestSummary($start_timeframe, $end_timeframe) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforFinancialReports, $LDstarttime, $LDendtime;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);
            $this->_Create_prepaid_tmp_master_table($start_timeframe, $end_timeframe);
            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";

            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);
            $table.="<tr>\n";
            for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                $table.="<tr>\n";
                if ($current_day > time()) {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffff";
                    $italic_tag_open = "<i>";
                    $italic_tag_close = "</i>";
                } else {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffaa";
                    $italic_tag_open = "";
                    $italic_tag_close = "";
                } // end of if ($current_day > time())

                $sql_insurance_id = "SELECT distinct (insurance_id)  as insuranceid  FROM tmp_billing_master where from_unixtime( date_change, '%Y-%d-%m' )=from_unixtime( $current_day, '%Y-%d-%m' )  and insurance_id != '0'";
                $db_ptr_insurance_id = $db->Execute($sql_insurance_id);
                while ($db_row_insurance_id = $db_ptr_insurance_id->FetchRow()) {
                    $insuranceid = $db_row_insurance_id['insuranceid'] . '<br>';

                    $sql_insurancename = "SELECT name FROM care_tz_company where id='$insuranceid'";
                    $db_ptr_insurancename = $db->Execute($sql_insurancename);
                    $db_row_insurancename = $db_ptr_insurancename->FetchRow();
                    $insurancename = $db_row_insurancename['name'];




                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . date("j/m/Y", $current_day - 1) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $insurancename . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_prepaid_amount_of($start_timeframe, $day, $insuranceid, "file", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_prepaid_amount_of($start_timeframe, $day, $insuranceid, "mat", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_prepaid_amount_of($start_timeframe, $day, $insuranceid, "lab", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_prepaid_amount_of($start_timeframe, $day, $insuranceid, "xray", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_prepaid_amount_of($start_timeframe, $day, $insuranceid, "dawa", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_prepaid_amount_of($start_timeframe, $day, $insuranceid, "surg", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_prepaid_amount_of($start_timeframe, $day, $insuranceid, "dress", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_prepaid_amount_of($start_timeframe, $day, $insuranceid, "meng", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_prepaid_amount_of($start_timeframe, $day, $insuranceid, "jumla", FALSE) . $italic_tag_close . "</td>\n";

                    $table.="</tr>\n";
                }
            }
            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";
            /* $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"invoice", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"file", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"mat", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"lab", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"xray", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"dawa", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"surg", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"dress", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"meng", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"jumla", TRUE).$italic_tag_close."</td>\n";

              $table.="</tr>\n";
              $table.="</tr>\n";
             */echo $table;
        }

        function DisplayPrepaidBillingResultRows($start_timeframe, $end_timeframe) {
            
        }

        function DisplayDentalPrepaidBillingTestSummary($start_timeframe, $end_timeframe) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforFinancialReports, $LDstarttime, $LDendtime;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);
            $this->_Create_prepaid_tmp_master_table($start_timeframe, $end_timeframe);
            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";

            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);
            $table.="<tr>\n";
            for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                $table.="<tr>\n";
                if ($current_day > time()) {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffff";
                    $italic_tag_open = "<i>";
                    $italic_tag_close = "</i>";
                } else {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffaa";
                    $italic_tag_open = "";
                    $italic_tag_close = "";
                } // end of if ($current_day > time())

                $sql_insurance_id = "SELECT distinct (insurance_id)  as insuranceid  FROM tmp_billing_master where from_unixtime( date_change, '%Y-%d-%m' )=from_unixtime( $current_day, '%Y-%d-%m' )  and insurance_id != '0' and current_dept_nr='43' ";
                $db_ptr_insurance_id = $db->Execute($sql_insurance_id);
                while ($db_row_insurance_id = $db_ptr_insurance_id->FetchRow()) {
                    $insuranceid = $db_row_insurance_id['insuranceid'] . '<br>';

                    $sql_insurancename = "SELECT name FROM care_tz_company where id='$insuranceid'";
                    $db_ptr_insurancename = $db->Execute($sql_insurancename);
                    $db_row_insurancename = $db_ptr_insurancename->FetchRow();
                    $insurancename = $db_row_insurancename['name'];




                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . date("j/m/Y", $current_day - 1) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $insurancename . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, "file", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, "mat", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, "lab", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, "xray", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, "dawa", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, "surg", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, "dress", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, "meng", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, "dental", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_dental_prepaid_amount_of($start_timeframe, $day, $insuranceid, "jumla", FALSE) . $italic_tag_close . "</td>\n";

                    $table.="</tr>\n";
                }
            }
            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";
            /* $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"invoice", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"file", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"mat", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"lab", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"xray", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"dawa", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"surg", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"dress", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"meng", TRUE).$italic_tag_close."</td>\n";
              $table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_amount_of($start_timeframe,1,"jumla", TRUE).$italic_tag_close."</td>\n";

              $table.="</tr>\n";
              $table.="</tr>\n";
             */echo $table;
        }

        function DisplayDentalPrepaidBillingResultRows($start_timeframe, $end_timeframe) {
            
        }

        function DisplayARVBillingTestSummary($start_timeframe, $end_timeframe) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforFinancialReports, $LDstarttime, $LDendtime;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);

            $this->_Create_art_financial_tmp_master_table($start_timeframe, $end_timeframe);

            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.Y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";





            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);
            $table.="<tr>\n";
            for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                $table.="<tr>\n";
                if ($current_day > time()) {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffff";
                    $italic_tag_open = "<i>";
                    $italic_tag_close = "</i>";
                } else {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffaa";
                    $italic_tag_open = "";
                    $italic_tag_close = "";
                } // end of if ($current_day > time())


                $sql_encounter_nr = "SELECT distinct (encounter_nr)  as encounternr , pid FROM tmp_billing_master where from_unixtime( date_change, '%Y-%d-%m' )=from_unixtime( $current_day, '%Y-%d-%m' )  ";
                $db_ptr_encounter_nr = $db->Execute($sql_encounter_nr);
                while ($db_row_encounter_nr = $db_ptr_encounter_nr->FetchRow()) {
                    $encounternr = $db_row_encounter_nr['encounternr'] . '<br>';
                    $pid = $db_row_encounter_nr['pid'] . '<br>';

                    $sql_hospitalnr = "SELECT name_last,name_first FROM care_person where pid='$pid'";
                    $db_ptr_hospitalnr = $db->Execute($sql_hospitalnr);
                    $db_row_hospitalnr = $db_ptr_hospitalnr->FetchRow();
                    $hospitalnr = $db_row_hospitalnr['name_last'] . '  ' . $db_row_hospitalnr['name_first'];



                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . date("j/m/Y", $current_day - 1) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $hospitalnr . $italic_tag_close . "</td>\n";
                    //$table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_arv_amount_of($start_timeframe,$day,$encounternr,"invoice", FALSE).$italic_tag_close."</td>\n";

                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "amb", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "bed", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "consult", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "consum", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "dental", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "drugs", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "eye", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "file", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "icu", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "lab", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "mort", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "proc/surg", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "radio", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "other", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "total", FALSE) . $italic_tag_close . "</td>\n";

                    $table.="</tr>\n";
                }
            }
            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "amb", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "bed", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "consult", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "consum", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "dental", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "drugs", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "eye", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "file", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "icu", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "lab", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "mort", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "proc/surg", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "radio", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "other", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "total", TRUE) . $italic_tag_close . "</td>\n";

            $table.="</tr>\n";
            $table.="</tr>\n";

            echo $table;
            //}
        }

        function DisplayTBBillingTestSummary($start_timeframe, $end_timeframe) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforFinancialReports, $LDstarttime, $LDendtime;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);

            $this->_Create_tb_financial_tmp_master_table($start_timeframe, $end_timeframe);

            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.Y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";





            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);
            $table.="<tr>\n";
            for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                $table.="<tr>\n";
                if ($current_day > time()) {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffff";
                    $italic_tag_open = "<i>";
                    $italic_tag_close = "</i>";
                } else {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffaa";
                    $italic_tag_open = "";
                    $italic_tag_close = "";
                } // end of if ($current_day > time())


                $sql_encounter_nr = "SELECT distinct (encounter_nr)  as encounternr , pid FROM tmp_billing_master where from_unixtime( date_change, '%Y-%d-%m' )=from_unixtime( $current_day, '%Y-%d-%m' )  ";
                $db_ptr_encounter_nr = $db->Execute($sql_encounter_nr);
                while ($db_row_encounter_nr = $db_ptr_encounter_nr->FetchRow()) {
                    $encounternr = $db_row_encounter_nr['encounternr'] . '<br>';
                    $pid = $db_row_encounter_nr['pid'] . '<br>';

                    $sql_hospitalnr = "SELECT name_last,name_first FROM care_person where pid='$pid'";
                    $db_ptr_hospitalnr = $db->Execute($sql_hospitalnr);
                    $db_row_hospitalnr = $db_ptr_hospitalnr->FetchRow();
                    $hospitalnr = $db_row_hospitalnr['name_last'] . '  ' . $db_row_hospitalnr['name_first'];



                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . date("j/m/Y", $current_day - 1) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $hospitalnr . $italic_tag_close . "</td>\n";
                    //$table .= "<td bgcolor=\"$bg_color\" align=\"right\">".$italic_tag_open.$this->_get_arv_amount_of($start_timeframe,$day,$encounternr,"invoice", FALSE).$italic_tag_close."</td>\n";

                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "amb", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "bed", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "consult", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "consum", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "dental", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "drugs", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "eye", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "file", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "icu", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "lab", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "mort", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "proc/surg", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "radio", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "other", FALSE) . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_arv_amount_of($start_timeframe, $day, $encounternr, "total", FALSE) . $italic_tag_close . "</td>\n";

                    $table.="</tr>\n";
                }
            }
            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "amb", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "bed", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "consult", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "consum", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "dental", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "drugs", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "eye", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "file", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "icu", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "lab", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "mort", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "proc/surg", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "radio", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "other", TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_amount_of($start_timeframe, 1, "total", TRUE) . $italic_tag_close . "</td>\n";

            $table.="</tr>\n";
            $table.="</tr>\n";

            echo $table;
            //}
        }

        function DisplayTBBillingResultRows($start_timeframe, $end_timeframe) {
            
        }

        function DisplayPendingQuotationsSummary($start_timeframe, $end_timeframe, $admission, $pricelist) {
            global $db;
            global $PRINTOUT;
            global $LDPendingQuotationsReport, $LDstarttime, $LDendtime;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);

            $bill_obj = New Bill;

            $this->_Create_pending_quotations_tmp_master_table($start_timeframe, $end_timeframe, $admission);
            echo $LDLookingforFinancialReports . ": " . $LDstarttime . ": " . date("d.m.y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";

            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);
            $table.="<tr>\n";
            for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                $table.="<tr>\n";
                if ($current_day > time()) {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffff";
                    $italic_tag_open = "<i>";
                    $italic_tag_close = "</i>";
                } else {
                    if (!$PRINTOUT)
                        $bg_color = "#ffffaa";
                    $italic_tag_open = "";
                    $italic_tag_close = "";
                } // end of if ($current_day > time())

                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . date("j/m/Y", $this->_get_requested_day($start_timeframe, $day - 1, FALSE)) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\"align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "amb", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "bed", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "consult", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "consum", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "dental", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "drugs", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "file", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "icu", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "lab", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "mort", $pricelist, FALSE) . $italic_tag_close . "</td>\n";

                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "minproc", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "proc/surg", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "radio", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "other", $pricelist, FALSE) . $italic_tag_close . "</td>\n";
                $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, $day, "total", $pricelist, FALSE) . $italic_tag_close . "</td>\n";

                $table.="</tr>\n";
            }
            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "amb", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "bed", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "consult", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "consum", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "dental", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "drugs", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "file", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "icu", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "lab", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "mort", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "minproc", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "proc/surg", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "radio", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "other", $pricelist, TRUE) . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $this->_get_pending_amount_of($start_timeframe, 1, "total", $pricelist, TRUE) . $italic_tag_close . "</td>\n";

            $table.="</tr>\n";
            $table.="</tr>\n";
            echo $table;
        }

        function DisplayPendingQuotationsResultRows($start_timeframe, $end_timeframe) {
            
        }

        function GetDeletedQuotations() {
            global $db, $tbl;
            $db->debug = FALSE;


            $this->sql = "SELECT encounter_date,selian_pid,name_first,name_last,item_description,amount,item_id,disable_id,disable_date from tmp_billing_deleted_quotations
					 ORDER BY encounter_date ASC ";

            $db->Execute($this->sql);
            $this->request = $db->Execute($this->sql);
            return $this->request;
        }

        function DisplayDeletedQuotationsSummary($start_timeframe, $end_timeframe, $pricelist) {
            global $db;
            global $PRINTOUT;
            global $LDDeletedQuotationsReport, $LDstarttime, $LDendtime;
            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);

            echo $LDeletedQuotationsReport . ": " . $LDstarttime . ": " . date("d.m.y :: G:i:s", $start_timeframe) . " " . $LDendtime . ": " . date("d.m.y :: G:i:s", $end_timeframe) . "<br>";

            $bill_obj = new Bill;

            if ($this->_Create_deleted_quotations_tmp_master_table($start_timeframe, $end_timeframe))
                $del_items = $this->GetDeletedQuotations();
            $total_del = 0;

            if ($del_items)
                while ($del_row = $del_items->FetchRow()) {
                    $counter++;
                    if ($color_change) {
                        $BGCOLOR = 'bgcolor="#ffffdd"';
                        $color_change = FALSE;
                    } else {
                        $BGCOLOR = 'bgcolor="#ffffaa"';
                        $color_change = TRUE;
                    }

                    $price = $bill_obj->getPrice($del_row['item_id'], $pricelist);
                    $amount = $del_row['amount'] * $price;
                    $total_del +=$amount;

                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $del_row['encounter_date'] .
                            $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $del_row['selian_pid'] .
                            $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $del_row['name_last'] . ' ' . $italic_tag_open . $del_row['name_first'] .
                            $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $del_row['item_description'] . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $del_row['amount'] . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $price . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $amount . $italic_tag_close . "</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $del_row['disable_id'] . $italic_tag_close . "						</td>\n";
                    $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $del_row['disable_date'] . $italic_tag_close . "
</td>\n";

                    $table.="</tr>\n";
                }

            $table.="<tr>\n";
            if (!$PRINTOUT)
                $bg_color = "#CC9933";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"><strong>&sum;</strong></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $total_del . $italic_tag_close . "</td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"></td>\n";
            $table .= "<td bgcolor=\"$bg_color\" align = \"center\"></td>\n";

            $table.="</tr>\n";
            $table.="</tr>\n";

            echo $table;
            //}
        }

        function DisplayDeletedQuotationsResultRows() {
            
        }

        //------------------------------------------------------------------------------------------------------------------------
        /**
         * Insurance Section
         */
        //--
        function DisplayCompanyTableHead() {
            // Table definition will be organized by the variable $table_head from here:

            global $LDCompanyReportInsurance, $LDNameofemployee, $LDSelianfilenumber, $LDDateofcontract, $LDValidto, $LDPrice;
            // headline:
            $table_head = "<tr>\n";
            $table_head .= "<td bgcolor=\"#ffffaa\" colspan=\"11\" align=\"center\">" . $LDCompanyReportInsurance . "Company Report (Insurance)</td>\n";
            $table_head.="</tr>\n";

            $table_head.="<tr>\n";
            $table_head .= "<td bgcolor=\"#CC9933\">" . $LDNameofemployee . "</td>\n";
            $table_head .= "<td bgcolor=\"#CC9933\">" . $LDSelianfilenumber . "</td>\n";
            $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDateofcontract . "</td>\n";
            $table_head .= "<td bgcolor=\"#CC9933\">" . $LDValidto . "</td>\n";
            $table_head .= "<td bgcolor=\"#CC9933\">" . $LDPrice . "</td>\n";
            $table_head.="</tr>\n";
            echo $table_head;
        }

        function DisplayCompanyTestSummary($start_timeframe, $end_timeframe) {
            
        }

        function DisplayCompanyResultRows($start_timeframe, $end_timeframe) {
            
        }

//------------------------------------------------------------------------------------------------------
        function Get_Visits_Count() {
            global $db, $tmp_tbl_admissions;
            ;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $arr_reg['underage']['male'];
            $arr_reg['underage']['female'];
            $arr_reg['underage']['total'];

            $arr_reg['underyr']['male'];
            $arr_reg['underyr']['female'];
            $arr_reg['underyr']['total'];

            $arr_reg['under5']['male'];
            $arr_reg['under5']['female'];
            $arr_reg['under5']['total'];

            //$arr_reg['over5']['male'];
            //$arr_reg['over5']['female'];
            //$arr_reg['over5']['total'];

            $arr_reg['over60']['male'];
            $arr_reg['over60']['female'];
            $arr_reg['over60']['total'];

            $arr_reg['under60']['male'];
            $arr_reg['under60']['female'];
            $arr_reg['under60']['total'];


            /*             * ************* Admissions Under 1 Month *************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month))";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month))";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_reg['underage']['male'] = $row_m['age_m'];
            $arr_reg['underage']['female'] = $row_f['age_f'];
            $arr_reg['underage']['total'] = $row_m['age_m'] + $row_f['age_f'];


            /*             * *********** Under 1 year over 1 Month ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month))";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month))";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_reg['underyr']['male'] = $row_m['age_m'];
            $arr_reg['underyr']['female'] = $row_f['age_f'];
            $arr_reg['underyr']['total'] = $row_m['age_m'] + $row_f['age_f'];


            /*             * *********** Under 5 years over 1 Year ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year))";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
					    AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year))";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_reg['under5']['male'] = $row_m['age_m'];
            $arr_reg['under5']['female'] = $row_f['age_f'];
            $arr_reg['under5']['total'] = $row_m['age_m'] + $row_f['age_f'];

            /*             * *********** Over 5 years ********************** */
            /*
              $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
              WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))";
              if($rs_ptr = $db->Execute($sql))
              $row_m=$rs_ptr->FetchRow();

              $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
              WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))";
              if($rs_ptr = $db->Execute($sql))
              $row_f=$rs_ptr->FetchRow();

              $arr_reg['over5']['male'] =  $row_m['age_m'];
              $arr_reg['over5']['female'] = $row_f['age_f'];
              $arr_reg['over5']['total'] =   $row_m['age_m'] + $row_f['age_f'];
             */

            /*             * *********** Over 60 years ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year))";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year))";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_reg['over60']['male'] = $row_m['age_m'];
            $arr_reg['over60']['female'] = $row_f['age_f'];
            $arr_reg['over60']['total'] = $row_m['age_m'] + $row_f['age_f'];

            /*             * *********** Under 5 years over 60 Years ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year))
					    AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_reg['under60']['male'] = $row_m['age_m'];
            $arr_reg['under60']['female'] = $row_f['age_f'];
            $arr_reg['under60']['total'] = $row_m['age_m'] + $row_f['age_f'];

            $arr_reg['total'] = $arr_reg['underage']['total'] + $arr_reg['underyr']['total'] + $arr_reg['under5']['total'] + $arr_reg['over5']['total'] + $arr_reg['over60']['total'] + $arr_reg['under60']['total'];

            return $arr_reg;
        }

//------------------------------------------------------------------------------------------------------
        function Get_FirstTime_Reg_Count() {
            global $db, $tmp_tbl_admissions;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $arr_new['underage']['male'];
            $arr_new['underage']['female'];
            $arr_new['underage']['total'];

            $arr_new['underyr']['male'];
            $arr_new['underyr']['female'];
            $arr_new['underyr']['total'];

            $arr_new['under5']['male'];
            $arr_new['under5']['female'];
            $arr_new['under5']['total'];

            //$arr_new['over5']['male'];
            //$arr_new['over5']['female'];
            //$arr_new['over5']['total'];

            $arr_new['over60']['male'];
            $arr_new['over60']['female'];
            $arr_new['over60']['total'];

            $arr_new['under60']['male'];
            $arr_new['under60']['female'];
            $arr_new['under60']['total'];


            /*             * ************* Admissions Under 1 Month *************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) AND is_first_reg='1'";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) AND is_first_reg='1'";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_new['underage']['male'] = $row_m['age_m'];
            $arr_new['underage']['female'] = $row_f['age_f'];
            $arr_new['underage']['total'] = $row_m['age_m'] + $row_f['age_f'];


            /*             * *********** Under 1 year over 1 Month ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) AND is_first_reg='1'";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) AND is_first_reg='1'";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_new['underyr']['male'] = $row_m['age_m'];
            $arr_new['underyr']['female'] = $row_f['age_f'];
            $arr_new['underyr']['total'] = $row_m['age_m'] + $row_f['age_f'];


            /*             * *********** Under 5 years over 1 Year ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year)) AND is_first_reg='1'";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
					    AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year)) AND is_first_reg='1'";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_new['under5']['male'] = $row_m['age_m'];
            $arr_new['under5']['female'] = $row_f['age_f'];
            $arr_new['under5']['total'] = $row_m['age_m'] + $row_f['age_f'];

            /*             * *********** Over 5 years ********************** */
            /*
              $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
              WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)) AND is_first_reg='1'";
              if($rs_ptr = $db->Execute($sql))
              $row_m=$rs_ptr->FetchRow();

              $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
              WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)) AND is_first_reg='1'";
              if($rs_ptr = $db->Execute($sql))
              $row_f=$rs_ptr->FetchRow();

              $arr_new['over5']['male'] =  $row_m['age_m'];
              $arr_new['over5']['female'] = $row_f['age_f'];
              $arr_new['over5']['total'] =   $row_m['age_m'] + $row_f['age_f'];
             */
            /*             * *********** Over 60 years ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year)) AND is_first_reg='1'";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year)) AND is_first_reg='1'";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_new['over60']['male'] = $row_m['age_m'];
            $arr_new['over60']['female'] = $row_f['age_f'];
            $arr_new['over60']['total'] = $row_m['age_m'] + $row_f['age_f'];

            /*             * *********** Under 5 years over 60 Year ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)) AND is_first_reg='1'";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year))
					    AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)) AND is_first_reg='1'";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_new['under60']['male'] = $row_m['age_m'];
            $arr_new['under60']['female'] = $row_f['age_f'];
            $arr_new['under60']['total'] = $row_m['age_m'] + $row_f['age_f'];

            $arr_new['total'] = $arr_new['underage']['total'] + $arr_new['underyr']['total'] + $arr_new['under5']['total'] + $arr_new['over5']['total'] + $arr_new['over60']['total'] + $arr_new['under60']['total'];

            return $arr_new;
        }

//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
        function Get_New_Reg_Count() {
            global $db, $tmp_tbl_admissions;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $arr_newreg['underage']['male'];
            $arr_newreg['underage']['female'];
            $arr_newreg['underage']['total'];

            $arr_newreg['underyr']['male'];
            $arr_newreg['underyr']['female'];
            $arr_newreg['underyr']['total'];

            $arr_newreg['under5']['male'];
            $arr_newreg['under5']['female'];
            $arr_newreg['under5']['total'];

            //$arr_newreg['over5']['male'];
            //$arr_newreg['over5']['female'];
            //$arr_newreg['over5']['total'];

            $arr_newreg['over60']['male'];
            $arr_newreg['over60']['female'];
            $arr_newreg['over60']['total'];

            $arr_newreg['under60']['male'];
            $arr_newreg['under60']['female'];
            $arr_newreg['under60']['total'];



            /*             * ************* Admissions Under 1 Month *************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) 
					   AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) 
					   AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_newreg['underage']['male'] = $row_m['age_m'];
            $arr_newreg['underage']['female'] = $row_f['age_f'];
            $arr_newreg['underage']['total'] = $row_m['age_m'] + $row_f['age_f'];


            /*             * *********** Under 1 year over 1 Month ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) 
					   AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) 
					   AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_newreg['underyr']['male'] = $row_m['age_m'];
            $arr_newreg['underyr']['female'] = $row_f['age_f'];
            $arr_newreg['underyr']['total'] = $row_m['age_m'] + $row_f['age_f'];


            /*             * *********** Under 5 years over 1 Year ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year)) 
					   AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
					    AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year)) 
						AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_newreg['under5']['male'] = $row_m['age_m'];
            $arr_newreg['under5']['female'] = $row_f['age_f'];
            $arr_newreg['under5']['total'] = $row_m['age_m'] + $row_f['age_f'];

            /*             * *********** Over 5 years ********************** */
            /*
              $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
              WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
              AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
              if($rs_ptr = $db->Execute($sql))
              $row_m=$rs_ptr->FetchRow();

              $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
              WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
              AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
              if($rs_ptr = $db->Execute($sql))
              $row_f=$rs_ptr->FetchRow();

              $arr_newreg['over5']['male'] =  $row_m['age_m'];
              $arr_newreg['over5']['female'] = $row_f['age_f'];
              $arr_newreg['over5']['total'] =   $row_m['age_m'] + $row_f['age_f'];
             */
            /*             * *********** Over 60 years ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year)) 
					   AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year)) 
					   AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_newreg['over60']['male'] = $row_m['age_m'];
            $arr_newreg['over60']['female'] = $row_f['age_f'];
            $arr_newreg['over60']['total'] = $row_m['age_m'] + $row_f['age_f'];

            /*             * *********** Under 5 years over 60 Year ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)) 
					   AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year))
					    AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)) 
						AND date_format(encounter_date,'%d.%m.%y') = date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_newreg['under60']['male'] = $row_m['age_m'];
            $arr_newreg['under60']['female'] = $row_f['age_f'];
            $arr_newreg['under60']['total'] = $row_m['age_m'] + $row_f['age_f'];

            $arr_newreg['total'] = $arr_newreg['underage']['total'] + $arr_newreg['underyr']['total'] + $arr_newreg['under5']['total'] + $arr_newreg['over5']['total'] + $arr_newreg['over60']['total'] + $arr_newreg['under60']['total'];

            return $arr_newreg;
        }

//------------------------------------------------------------------------------------------------------
        function Get_Return_Reg_Count() {
            global $db, $tmp_tbl_admissions;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $arr_ret['underage']['male'];
            $arr_ret['underage']['female'];
            $arr_ret['underage']['total'];

            $arr_ret['underyr']['male'];
            $arr_ret['underyr']['female'];
            $arr_ret['underyr']['total'];

            $arr_ret['under5']['male'];
            $arr_ret['under5']['female'];
            $arr_ret['under5']['total'];

            //$arr_ret['over5']['male'];
            //$arr_ret['over5']['female'];
            //$arr_ret['over5']['total'];

            $arr_ret['over60']['male'];
            $arr_ret['over60']['female'];
            $arr_ret['over60']['total'];

            $arr_ret['under60']['male'];
            $arr_ret['under60']['female'];
            $arr_ret['under60']['total'];


            /*             * ************* Admissions Under 1 Month *************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) 
					   AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) 
					   AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_ret['underage']['male'] = $row_m['age_m'];
            $arr_ret['underage']['female'] = $row_f['age_f'];
            $arr_ret['underage']['total'] = $row_m['age_m'] + $row_f['age_f'];


            /*             * *********** Under 1 year over 1 Month ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) 
					   AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 month)) 
					   AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_ret['underyr']['male'] = $row_m['age_m'];
            $arr_ret['underyr']['female'] = $row_f['age_f'];
            $arr_ret['underyr']['total'] = $row_m['age_m'] + $row_f['age_f'];


            /*             * *********** Under 5 years over 1 Year ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year)) 
					   AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
					    AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 year)) 
						AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_ret['under5']['male'] = $row_m['age_m'];
            $arr_ret['under5']['female'] = $row_f['age_f'];
            $arr_ret['under5']['total'] = $row_m['age_m'] + $row_f['age_f'];

            /*             * *********** Over 5 years ********************** */
            /*
              $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
              WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
              AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
              if($rs_ptr = $db->Execute($sql))
              $row_m=$rs_ptr->FetchRow();

              $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
              WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year))
              AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
              if($rs_ptr = $db->Execute($sql))
              $row_f=$rs_ptr->FetchRow();

              $arr_ret['over5']['male'] =  $row_m['age_m'];
              $arr_ret['over5']['female'] = $row_f['age_f'];
              $arr_ret['over5']['total'] =   $row_m['age_m'] + $row_f['age_f'];
             */
            /*             * *********** Over 60 years ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year)) 
					   AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year)) 
					   AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_ret['over60']['male'] = $row_m['age_m'];
            $arr_ret['over60']['female'] = $row_f['age_f'];
            $arr_ret['over60']['total'] = $row_m['age_m'] + $row_f['age_f'];

            /*             * *********** Under 5 years over 60 Year ********************** */

            $sql = "SELECT count(*) as age_m FROM $tmp_tbl_admissions
					   WHERE sex='m' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year))
					   AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)) 
					   AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_m = $rs_ptr->FetchRow();

            $sql = "SELECT count(*) as age_f FROM $tmp_tbl_admissions
					   WHERE sex='f' AND UNIX_TIMESTAMP(date_birth) > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 60 year))
					    AND UNIX_TIMESTAMP(date_birth) <= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 5 year)) 
						AND date_format(encounter_date,'%d.%m.%y') != date_format(date_reg,'%d.%m.%y')";
            if ($rs_ptr = $db->Execute($sql))
                $row_f = $rs_ptr->FetchRow();

            $arr_ret['under60']['male'] = $row_m['age_m'];
            $arr_ret['under60']['female'] = $row_f['age_f'];
            $arr_ret['under60']['total'] = $row_m['age_m'] + $row_f['age_f'];


            $arr_ret['total'] = $arr_ret['underage']['total'] + $arr_ret['underyr']['total'] + $arr_ret['under5']['total'] + $arr_ret['over60']['total'] + $arr_ret['under60']['total'];

            return $arr_ret;
        }

        //------------------------------------------------------------------------------------------------------------------------
        /**
         * Pharmacy Section
         */
        //--

        function DisplayPharmacyTableHead($class, $admission, $bill) {

            global $PRINTOUT;

            global $LDPharmacyReportwithoutstockinfo, $LDDrugName, $LDPartCode, $LDAmountofDrugsused, $LDCostofdrugsused, $LDUnitPrice;



            $header = "";



            if ($class == 'drug_list') {

                $category = " Pharmacy Report";
            } else

            if ($class == 'supplies') {

                $category = " Consumables Report";
            }



            if ($admission == 1) {

                $adm_info = " Outpatient";
            } else

            if ($admission == 2) {

                $adm_info = " Inpatient";
            } else
                $adm_info = " All";



            if ($bill == 1) {

                $header = " Cash";
            } else

            if ($bill == 2) {

                $header = " Credit";
            }



            $table_head = "<tr>\n";

            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\"  colspan=\"11\" align=\"center\"> " . $adm_info . " " . $header . " " . $category . "</td>\n";
            else
                $table_head .= "<td colspan=\"11\" align=\"center\"> " . $adm_info . " " . $header . " " . $category . "</td>\n";

            $table_head.="</tr>\n";



            if (!$PRINTOUT) {

                $table_head.="<tr>\n";

                $table_head .= "<td bgcolor=\"#CC9933\">PARTCODE</td>\n";

                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDrugName . "</td>\n";

                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDUnitPrice . "</td>\n";

                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDAmountofDrugsused . "</td>\n";

                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDCostofdrugsused . "</td>\n";

                $table_head.="</tr>\n";
            } else {

                $table_head.="<tr>\n";

                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDPartCode . "</td>\n";

                $table_head .= "<td>" . $LDDrugName . "</td>\n";

                $table_head .= "<td>" . $LDAmountofDrugsused . "d</td>\n";

                $table_head .= "<td>" . $LDCostofdrugsused . "</td>\n";

                $table_head .= "<td>" . $LDUnitPrice . "</td>\n";

                $table_head.="</tr>\n";
            }

            echo $table_head;
        }

        function DisplayServicesTableHead($class, $admission, $bill) {
            global $PRINTOUT;
            global $LDDetails, $LDNoOfItems, $LDAmount, $LDUnitPrice, $LDtotal;

            $header = "";

            if ($class == 'drug_list') {
                $category = " Pharmacy Report";
            } else
            if ($class == 'supplies') {
                $category = " Consumables Report";
            }
            if ($class == 'service') {
                $category = " Services Report";
            }

            if ($admission == 1) {
                $adm_info = " Outpatient";
            } else
            if ($admission == 2) {
                $adm_info = " Inpatient";
            } else
                $adm_info = " All";



            if ($bill == 1) {
                $header = " Cash";
            } else
            if ($bill == 2) {
                $header = " Credit";
            }

            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\"  colspan=\"11\" align=\"center\"> " . $adm_info . " " . $header . " " . $category . "</td>\n";
            else
                $table_head .= "<td colspan=\"11\" align=\"center\">" . $adm_info . " " . $header . " " . $category . "</td>\n";
            $table_head.="</tr>\n";

            if (!$PRINTOUT) {
                $table_head.="<tr>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDetails . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDUnitPrice . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDNoOfItems . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDtotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head.="<tr>\n";
                $table_head .= "<td>" . $LDDetails . "</td>\n";
                $table_head .= "<td>" . $LDUnitPrice . "d</td>\n";
                $table_head .= "<td>" . $LDNoOfItems . "</td>\n";
                $table_head .= "<td>" . $LDtotal . "</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayLaboratoryTableHead($admission) {
            global $PRINTOUT;
            global $LDLaboratoryCashReport, $LDTestName, $LDNoOfTests, $LDTotalAmount, $LDUnitPrice;

            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\"  colspan=\"11\" align=\"center\">" . $LDLaboratoryCashReport . "</td>\n";
            else
                $table_head .= "<td colspan=\"11\" align=\"center\">" . $LDLaboratoryCashReport . "</td>\n";
            $table_head.="</tr>\n";

            if (!$PRINTOUT) {
                $table_head.="<tr>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTestName . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDUnitPrice . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDNoOfTests . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotalAmount . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head.="<tr>\n";
                $table_head .= "<td>" . $LDTestName . "</td>\n";
                $table_head .= "<td>" . $LDUnitPrice . "</td>\n";
                $table_head .= "<td>" . $LDNoOfTests . "d</td>\n";
                $table_head .= "<td>" . $LDTotalAmount . "</td>\n";

                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function DisplayServiceTableHead($admission, $bill) {
            global $PRINTOUT;
            global $LDServicesReport, $LDDetails, $LDNoItems, $LDCostofItemsused, $LDUnitPrice;

            $header = "";

            if ($bill == 1) {
                $header = " Cash";
            } else
            if ($bill == 2) {
                $header = " Credit";
            }

            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\"  colspan=\"11\" align=\"center\"> " . $header . " " . $LDServicesReport . "</td>\n";
            else
                $table_head .= "<td colspan=\"11\" align=\"center\">" . $header . " " . $LDServicesReport . "</td>\n";
            $table_head.="</tr>\n";

            if (!$PRINTOUT) {
                $table_head.="<tr>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDDetails . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDUnitPrice . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDNoOfItems . "</td>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDCostofItemsused . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head.="<tr>\n";
                $table_head .= "<td>" . $LDDetails . "</td>\n";
                $table_head .= "<td>" . $LDNoOfItems . "d</td>\n";
                $table_head .= "<td>" . $LDCostofItemsused . "</td>\n";
                $table_head .= "<td>" . $LDUnitPrice . "</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        function _GetSumOfItemAmount($item_number) {
            global $db;
            $sql = "SELECT SUM(amount) as RetVal FROM tmp_billing_master WHERE item_number='" . $item_number . "'";
            $res_ptr = $db->Execute($sql);
            $res_row = $res_ptr->FetchRow();
            return $res_row['RetVal'];
        }

        function _GetTotalSumOfItems($class) {
            global $db;
            $sql = "SELECT SUM(amount*price) as RetVal FROM tmp_billing_master WHERE purchasing_class='" . $class . "' ";
            $res_ptr = $db->Execute($sql);
            $res_row = $res_ptr->FetchRow();
            $return_value = $res_row['RetVal'];
            return (!empty($return_value)) ? $res_row['RetVal'] : "&nbsp;";
        }

        function _GetTotalSumOfItemAmount($item_number) {
            global $db;
            $sql = "SELECT SUM(amount*price) as RetVal FROM tmp_billing_master WHERE item_number='" . $item_number . "'";
            $res_ptr = $db->Execute($sql);
            $res_row = $res_ptr->FetchRow();
            return $res_row['RetVal'];
        }

        function DisplayPharmacyResultRows($start_timeframe, $end_timeframe, $p_class, $admission, $bill) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforPharmacyReports, $LDstarttime, $LDendtime, $LDNothinginList, $LDNA, $LDtotal;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $end_timeframe += (24 * 60 * 60 - 1);
            if (!$PRINTOUT) {
                $bg_color_1 = "#ffffaa";
                $bg_color_2 = "#ffffbb";
            } else {
                $bg_color_1 = "";
                $bg_color_2 = "";
            }
            $bg_color_swich = FALSE;

            if ($bill == "") {
                $s_bill = "";
            } else
            if ($bill == 1) {
                $s_bill = " AND insurance_id = 0 ";
            }
            if ($bill == 2) {
                $s_bill = " AND insurance_id != 0 ";
            }

            $this->_Create_financial_tmp_master_table($start_timeframe, $end_timeframe, $admission);

            echo "Looking for Pharmacy Reports by time range: starttime: " . date("d.m.y :: G:i:s", $start_timeframe) . " endtime: " . date("d.m.y :: G:i:s", $end_timeframe) . "<br><br><br>";
            $sql = "SELECT item_number, description, price FROM tmp_billing_master WHERE purchasing_class='$p_class' $s_bill GROUP BY item_number, price";
            $rs_ptr = $db->Execute($sql);
            $table = "";
            if ($res_array = $rs_ptr->GetArray()) {

                while (list($u, $v) = each($res_array)) {

                    if ($bg_color_swich) {
                        $bg_color = $bg_color_1;
                        $bg_color_swich = FALSE;
                    } else {
                        $bg_color = $bg_color_2;
                        $bg_color_swich = TRUE;
                    } // end of if ($bg_color_swich)

                    $table .= "<tr bgcolor=$bg_color>\n";

                    $table.="<td>\n";
                    $table.="  " . $v['description'];
                    $table.="</td>\n";

                    $table.="<td align=\"right\">\n";
                    $table.="  " . $v['price'];
                    $table.="</td>\n";

                    $table.="<td align=\"right\">\n";
                    $table.="  " . $this->_GetSumOfItemAmount($v['item_number']);
                    $table.="</td>\n";

                    $table.="<td align=\"right\">\n";
                    $table.="  " . number_format($this->_GetTotalSumOfItemAmount($v['item_number']), 0, '.', ',');
                    $table.="</td>\n";
                    $table.="</tr>\n";
                } // end of while (list($u,$v)=each($res_array))
            } else {
                $table .= "<tr bgcolor=$bg_color>\n";

                $table.="<td>\n";
                $table.="  " . $LDNothinginList;
                $table.="</td>\n";

                $table.="<td>\n";
                $table.="N/A";
                $table.="</td>\n";

                $table.="<td>\n";
                $table.=$LDNA;
                $table.="</td>\n";

                $table.="<td>\n";
                $table.=$LDNA;
                $table.="</td>\n";

                $table.="</tr>\n";
            } // End of if ($res_array = $rs_ptr->GetArray())
            $table .= "<tr bgcolor=$bg_color>\n";

            $table.="<td align=\"right\">\n";
            $table.="<b>" . $LDtotal . " &sum;</b>";
            $table.="</td>\n";
            $table.="<td>\n";
            $table.="<td>\n";
            $table.=" &nbsp;";
            $table.="</td>\n";

            $table.="<td align=\"right\">\n";
            $table.="  <b>" . number_format($this->_GetTotalSumOfItems('drug_list'), 0, '.', ',') . "</b>";
            $table.="</td>\n";

            $table.=" &nbsp;";
            $table.="</td>\n";

            $table.="</tr>\n";


            echo $table;
        }

        function DisplayLaboratoryResultRows($start_timeframe, $end_timeframe, $admission, $bill) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforLaboratoryReports, $LDstarttime, $LDendtime, $LDNothinginList, $LDNA, $LDtotal;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $end_timeframe += (24 * 60 * 60 - 1);

            if (!$PRINTOUT) {
                $bg_color_1 = "#ffffaa";
                $bg_color_2 = "#ffffbb";
            } else {
                $bg_color_1 = "";
                $bg_color_2 = "";
            }
            $bg_color_swich = FALSE;

            if ($bill == "") {
                $s_bill = "";
            } else
            if ($bill == 1) {
                $s_bill = " AND insurance_id = 0 ";
            }
            if ($bill == 2) {
                $s_bill = " AND insurance_id != 0 ";
            }


            $this->_Create_financial_tmp_master_table($start_timeframe, $end_timeframe, $admission);

            echo "Looking for Laboratory Reports by time range: starttime: " . date("d.m.y :: G:i:s", $start_timeframe) . " endtime: " . date("d.m.y :: G:i:s", $end_timeframe) . "<br><br><br>";
            $sql = "SELECT item_number, description, price FROM tmp_billing_master WHERE purchasing_class='labtest' $s_bill GROUP BY item_number, price";
            $rs_ptr = $db->Execute($sql);



            $table = "";
            if ($res_array = $rs_ptr->GetArray()) {

                while (list($u, $v) = each($res_array)) {


                    if ($bg_color_swich) {
                        $bg_color = $bg_color_1;
                        $bg_color_swich = FALSE;
                    } else {
                        $bg_color = $bg_color_2;
                        $bg_color_swich = TRUE;
                    } // end of if ($bg_color_swich)

                    $table .= "<tr bgcolor=$bg_color>\n";

                    $table.="<td>\n";
                    $table.="  " . $v['description'];
                    $table.="</td>\n";

                    $table.="<td align=\"right\">\n";
                    $table.="  " . $v['price'];
                    $table.="</td>\n";

                    $table.="<td align=\"right\">\n";
                    $table.="  " . $this->_GetSumOfItemAmount($v['item_number']);
                    $table.="</td>\n";

                    $table.="<td align=\"right\">\n";
                    $table.="  " . number_format($this->_GetTotalSumOfItemAmount($v['item_number']), 0, '.', ',');
                    $table.="</td>\n";
                    $table.="</tr>\n";
                } // end of while (list($u,$v)=each($res_array))
            } else {
                $table .= "<tr bgcolor=$bg_color>\n";

                $table.="<td>\n";
                $table.="  " . $LDNothinginList;
                $table.="</td>\n";

                $table.="<td>\n";
                $table.="N/A";
                $table.="</td>\n";

                $table.="<td>\n";
                $table.=$LDNA;
                $table.="</td>\n";

                $table.="<td>\n";
                $table.=$LDNA;
                $table.="</td>\n";

                $table.="</tr>\n";
            } // End of if ($res_array = $rs_ptr->GetArray())
            $table .= "<tr bgcolor=$bg_color>\n";

            $table.="<td align=\"right\">\n";
            $table.="<b>" . $LDtotal . " &sum;</b>";
            $table.="</td>\n";
            $table.="<td>\n";
            $table.="<td>\n";
            $table.=" &nbsp;";
            $table.="</td>\n";

            $table.="<td align=\"right\">\n";
            $table.="  <b>" . number_format($this->_GetTotalSumOfItems('labtest'), 0, '.', ',') . "</b>";
            $table.="</td>\n";

            $table.=" &nbsp;";
            $table.="</td>\n";

            $table.="</tr>\n";


            echo $table;
        }

        function DisplayServiceResultRows($start_timeframe, $end_timeframe, $admission, $bill) {
            global $db;
            global $PRINTOUT;
            global $LDLookingforServiceReports, $LDstarttime, $LDendtime, $LDNothinginList, $LDNA, $LDtotal;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $end_timeframe += (24 * 60 * 60 - 1);
            if (!$PRINTOUT) {
                $bg_color_1 = "#ffffaa";
                $bg_color_2 = "#ffffbb";
            } else {
                $bg_color_1 = "";
                $bg_color_2 = "";
            }
            $bg_color_swich = FALSE;

            if ($bill == "") {
                $s_bill = "";
            } else
            if ($bill == 1) {
                $s_bill = " AND insurance_id = 0 ";
            }
            if ($bill == 2) {
                $s_bill = " AND insurance_id != 0 ";
            }
            echo $_bill;

            $this->_Create_financial_tmp_master_table($start_timeframe, $end_timeframe, $admission);

            echo "Looking for Services Reports by time range: starttime: " . date("d.m.y :: G:i:s", $start_timeframe) . " endtime: " . date("d.m.y :: G:i:s", $end_timeframe) . "<br><br><br>";
            $sql = "SELECT item_number, description, price FROM tmp_billing_master WHERE purchasing_class='service' $s_bill GROUP BY item_number, price";
            $rs_ptr = $db->Execute($sql);
            $table = "";
            if ($res_array = $rs_ptr->GetArray()) {

                while (list($u, $v) = each($res_array)) {

                    if ($bg_color_swich) {
                        $bg_color = $bg_color_1;
                        $bg_color_swich = FALSE;
                    } else {
                        $bg_color = $bg_color_2;
                        $bg_color_swich = TRUE;
                    } // end of if ($bg_color_swich)

                    $table .= "<tr bgcolor=$bg_color>\n";

                    $table.="<td>\n";
                    $table.="  " . $v['description'];
                    $table.="</td>\n";

                    $table.="<td align=\"right\">\n";
                    $table.="  " . $v['price'];
                    $table.="</td>\n";

                    $table.="<td align=\"right\">\n";
                    $table.="  " . $this->_GetSumOfItemAmount($v['item_number']);
                    $table.="</td>\n";

                    $table.="<td align=\"right\">\n";
                    $table.="  " . number_format($this->_GetTotalSumOfItemAmount($v['item_number']), 0, '.', ',');
                    $table.="</td>\n";
                    $table.="</tr>\n";
                } // end of while (list($u,$v)=each($res_array))
            } else {
                $table .= "<tr bgcolor=$bg_color>\n";

                $table.="<td>\n";
                $table.="  " . $LDNothinginList;
                $table.="</td>\n";

                $table.="<td>\n";
                $table.="N/A";
                $table.="</td>\n";

                $table.="<td>\n";
                $table.=$LDNA;
                $table.="</td>\n";

                $table.="<td>\n";
                $table.=$LDNA;
                $table.="</td>\n";

                $table.="</tr>\n";
            } // End of if ($res_array = $rs_ptr->GetArray())
            $table .= "<tr bgcolor=$bg_color>\n";

            $table.="<td align=\"right\">\n";
            $table.="<b>" . $LDtotal . " &sum;</b>";
            $table.="</td>\n";
            $table.="<td>\n";
            $table.="<td>\n";
            $table.=" &nbsp;";
            $table.="</td>\n";

            $table.="<td align=\"right\">\n";
            $table.="  <b>" . number_format($this->_GetTotalSumOfItems('service'), 0, '.', ',') . "</b>";
            $table.="</td>\n";

            $table.=" &nbsp;";
            $table.="</td>\n";

            $table.="</tr>\n";


            echo $table;
        }

        function SetReportingLink_OPDAdmission($tbl1, $tbl1_key, $tbl1_key1, $tbl2, $tbl2_key, $tbl2_key1) {
            global $db;
            if ($this->debug)
                echo "class_report::SetReportingLink_OPDAdmission($tbl1,$tbl1_key, $tbl2,$tbl2_key)<br>";
            // enlarge the max_tmp_table_size to the maximum what we can use:
            $this->Transact("SET @@max_heap_table_size=4294967296");
            if (!(empty($tbl1) || empty($tbl1_key) || empty($tbl1_key1) || empty($tbl2) || empty($tbl2_key) || empty($tbl2_key1))) {

                // For a given existing table from the database, we need more specific informations in the alias field
                // check it for table 1:
                $result_fields_tbl1 = $this->_SetColumnNamesAsString($tbl1, $this->GetFieldnames($tbl1));
                // check it for table 2:
                $result_fields_tbl2 = $this->_SetColumnNamesAsString($tbl2, $this->GetFieldnames($tbl2));

                // There are no TEXT nor BLOBS in TEMPORARY tables allowed: Clean it:
                $result_fields = $this->_ColumnNames($tbl1, $result_fields_tbl1, $tbl2, $result_fields_tbl2);

                $this->setTable($this->tmp_tbl_name.=time());
                $this->sql = "CREATE TEMPORARY TABLE $this->coretable  SELECT $result_fields FROM $tbl1 INNER JOIN $tbl2 ON $tbl1.$tbl1_key=$tbl2.$tbl2_key and date_format( $tbl1.$tbl1_key1, '%d.%m.%y' )=date_format( $tbl2.$tbl2_key1, '%d.%m.%y' ) ";
                return ($this->Transact($this->sql)) ? $this->coretable : FALSE;
            } else {
                return FALSE;
            }
        }

        function SetReportingLink_Admissions($tbl1, $tbl1_key, $tbl1_key1, $tbl2, $tbl2_key, $start, $end, $admission) {
            global $db;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            if ($this->debug)
                echo "class_report::SetReportingLink_Admissions($tbl1,$tbl1_key, $tbl1_key1,$tbl2,$tbl2_key, $start, $end, $admission)<br>";
            // enlarge the max_tmp_table_size to the maximum what we can use:
            $this->Transact("SET @@max_heap_table_size=4294967296");
            if (!(empty($tbl1) || empty($tbl1_key) || empty($tbl2) || empty($tbl2_key))) {

                if ($admission == 1) {
                    $sql_adm = " AND current_ward_nr > 0";
                } else
                if ($admission == 2) {
                    $sql_adm = " AND current_dept_nr > 0";
                }

                $this->setTable($this->tmp_tbl_name.=time());
                $this->sql = "CREATE  TEMPORARY TABLE $this->coretable (SELECT $tbl1.encounter_nr,$tbl1.encounter_date,$tbl1.encounter_class_nr,$tbl1.current_ward_nr,
	  $tbl1.current_dept_nr,$tbl1.consulting_dr,$tbl1.is_discharged,$tbl1.discharge_date,
	  $tbl2.pid,$tbl2.selian_pid,$tbl2.date_reg,$tbl2.name_first,$tbl2.name_2,$tbl2.name_last,$tbl2.date_birth,$tbl2.sex,$tbl2.is_first_reg FROM $tbl1 INNER JOIN $tbl2 ON $tbl1.$tbl1_key=$tbl2.$tbl2_key AND UNIX_TIMESTAMP(encounter_date)>='" . $start . "' AND UNIX_TIMESTAMP(encounter_date)<='" . $end . "' " . $sql_adm . ")";
                return ($this->Transact($this->sql)) ? $this->coretable : FALSE;
            } else {
                return FALSE;
            }
        }

//***********************************************************************************************************************************************
        function DisplayMonthlyLabTableHead($start_timeframe, $end_timeframe, $admission) {
            global $PRINTOUT;
            global $LDLaboratorySummary, $LDTest, $LDNoOfItems, $LDTotal;

            //$first_day_of_req_month=0;
            //$last_day_of_req_month=0;

            $end_timeframe += (24 * 60 * 60 - 1);
            $header = "";

            $first_day_of_req_month = date("j", $start_timeframe);
            $last_day_of_req_month = date("j", $end_timeframe);


            if ($admission == 1) {
                $adm_info = " Inpatient";
            } else
            if ($admission == 2) {
                $adm_info = " Outpatient";
            } else
                $adm_info = " All";

            $colspan = $last_day_of_req_month + 2;
            $table_head = "<tr>\n";
            if (!$PRINTOUT)
                $table_head .= "<td bgcolor=\"#ffffaa\"  colspan=\"$colspan\" align=\"center\"><h3> " . $LDLaboratorySummary . " " . $adm_info . "</h3></td>\n";
            else
                $table_head .= "<td colspan=\"$colspan\" align=\"center\"><h3> " . $LDLaboratorySummary . " " . $adm_info . "</h3></td>\n";
            $table_head.="</tr>\n";


            if (!$PRINTOUT) {
                $table_head.="<tr>\n";
                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTest . "</td>\n";

                for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                    $current_day = $this->_get_requested_day($start_timeframe, $day - 1);

                    if ($current_day > time()) {
                        if (!$PRINTOUT)
                            $bg_color = "#ffffff";
                        $italic_tag_open = "<i>";
                        $italic_tag_close = "</i>";
                    } else {
                        if (!$PRINTOUT)
                            $bg_color = "#ffffaa";
                        $italic_tag_open = "";
                        $italic_tag_close = "";
                    } // end of if ($current_day > time())

                    $table_head .= "<th width=\"20\" bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $day . $italic_tag_close . "</td>\n";
                }

                $table_head .= "<td bgcolor=\"#CC9933\">" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            } else {
                $table_head.="<tr>\n";
                $table_head .= "<td>" . $LDTest . "</td>\n";

                for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                    $current_day = $this->_get_requested_day($start_timeframe, $day - 1);

                    if ($current_day > time()) {
                        if (!$PRINTOUT)
                            $bg_color = "#ffffff";
                        $italic_tag_open = "<i>";
                        $italic_tag_close = "</i>";
                    } else {
                        if (!$PRINTOUT)
                            $bg_color = "#ffffaa";
                        $italic_tag_open = "";
                        $italic_tag_close = "";
                    } // end of if ($current_day > time())

                    $table_head .= "<td bgcolor=\"$bg_color\" align=\"right\">" . $italic_tag_open . $day . $italic_tag_close . "</td>\n";
                }

                $table_head .= "<td>" . $LDTotal . "</td>\n";
                $table_head.="</tr>\n";
            }
            echo $table_head;
        }

        //***********************************************************************************************************************************
        function DisplayMonthlyLabRequestsSummary($start_timeframe, $end_timeframe, $admission) {
            global $db;
            global $PRINTOUT;
            global $LDLaboratoryReports, $LDstarttime, $LDendtime, $LDNothinginList, $LDNA, $LDtotal;

            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);

            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);

            if (!$PRINTOUT) {
                $bg_color_1 = "#ffffaa";
                $bg_color_2 = "#ffffbb";
            } else {
                $bg_color_1 = "";
                $bg_color_2 = "";
            }

            $bg_color_swich = FALSE;


            $this->_Create_lab_requests_table($start_timeframe, $end_timeframe, $admission);

            echo "Laboratory Reports by time range: starttime: " . date("d.m.y :: G:i:s", $start_timeframe) . " endtime: " . date("d.m.y :: G:i:s", $end_timeframe) . "<br><br><br>";

            $sql = "SELECT nr, name, id FROM care_tz_laboratory_param WHERE group_id!='-1' ORDER BY name";

            $rs_ptr = $db->Execute($sql);
            $table = "";
            if ($res_array = $rs_ptr->GetArray()) {

                while (list($u, $v) = each($res_array)) {

                    $item_count = 0;
                    $item_total = 0;

                    if (!$PRINTOUT) {

                        if ($bg_color_swich) {
                            $bg_color = $bg_color_1;
                            $bg_color_swich = FALSE;
                        } else {
                            $bg_color = $bg_color_2;
                            $bg_color_swich = TRUE;
                        } // end of if ($bg_color_swich)

                        $table .= "<tr bgcolor=$bg_color>\n";
                    } else {

                        $table .= "<tr>\n";
                    }



                    $table.="<td>\n";
                    $table.="  " . $v['name'];
                    $table.="</td>\n";

                    for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                        $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                        $item_count = $this->_GetDailyLabItemTotal($current_day, $day, $v['id']);
                        $item_total+= $item_count;

                        if ($current_day > time()) {
                            if (!$PRINTOUT)
                                $td_bg_color = "#ffffff";
                            $italic_tag_open = "<i>";
                            $italic_tag_close = "</i>";
                        } else {
                            if (!$PRINTOUT)
                                $td_bg_color = $bg_color;
                            $italic_tag_open = "";
                            $italic_tag_close = "";
                        } // end of if ($current_day > time())

                        $table.="<td bgcolor=\"$td_bg_color\" align=\"right\">" . $italic_tag_open . $item_count . $italic_tag_close . "</td>\n";
                    }

                    $table.="<td align=\"right\">\n";
                    $table.="  " . $item_total;
                    $table.="</td>\n";
                    $table.="</tr>\n";
                } // end of while (list($u,$v)=each($res_array))

                $table .= "<tr bgcolor=$bg_color>\n";
                $table .= "<td><strong>&sum;</strong></td>\n";

                $daily_count = 0;
                $daily_total = 0;

                for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                    $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                    $daily_count = $this->_GetDailyLabItemTotal($current_day, $day, "");
                    $total_count+= $daily_count;

                    if ($current_day > time()) {
                        if (!$PRINTOUT)
                            $td_bg_color = "#ffffff";
                        $italic_tag_open = "<i>";
                        $italic_tag_close = "</i>";
                    } else {
                        if (!$PRINTOUT)
                            $td_bg_color = $bg_color;
                        $italic_tag_open = "";
                        $italic_tag_close = "";
                    } // end of if ($current_day > time())

                    $table.="<td bgcolor=\"$td_bg_color\" align=\"right\"><b>" . $italic_tag_open . $daily_count . $italic_tag_close . "</b></td>\n";
                }
                $table.="<td bgcolor=\"$td_bg_color\" align=\"right\"><b>" . $italic_tag_open . $total_count . $italic_tag_close . "<b></td>\n";
            } else {
                $table .= "<tr bgcolor=$bg_color>\n";

                $table.="<td>\n";
                $table.="  " . $LDNothinginList;
                $table.="</td>\n";

                $table.="<td colspan=31>\n";
                $table.="</td>\n";

                $table.="<td>\n";
                $table.=$LDNA;
                $table.="</td>\n";
                $table.="</tr>\n";
            } // End of if ($res_array = $rs_ptr->GetArray())

            echo $table;
        }

//***********************************************************************************************************************************
        function DisplayMonthlyLabTestsSummary($start_timeframe, $end_timeframe, $admission,$health_fund) {
            global $db;
            global $PRINTOUT;
            global $LDLaboratoryReports, $LDstarttime, $LDendtime, $LDNothinginList, $LDNA, $LDtotal;

            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

            $first_day_of_req_month = 0;
            $last_day_of_req_month = 0;
            $end_timeframe += (24 * 60 * 60 - 1);

            $first_day_of_req_month = date("d", $start_timeframe);
            $last_day_of_req_month = date("d", $end_timeframe);

            if (!$PRINTOUT) {
                $bg_color_1 = "#ffffaa";
                $bg_color_2 = "#ffffbb";
            } else {
                $bg_color_1 = "";
                $bg_color_2 = "";
            }

            $bg_color_swich = FALSE;




            $this->_Create_lab_tests_table($start_timeframe, $end_timeframe, $admission,$health_fund);

            echo "Laboratory Reports by time range: starttime: " . date("d.m.y :: G:i:s", $start_timeframe) . " endtime: " . date("d.m.y :: G:i:s", $end_timeframe) . "<br><br><br>";

            $sql = "SELECT nr, name, id FROM care_tz_laboratory_param WHERE group_id!='-1' ORDER BY name";

            $rs_ptr = $db->Execute($sql);
            $table = "";
            if ($res_array = $rs_ptr->GetArray()) {

                while (list($u, $v) = each($res_array)) {

                    $item_count = 0;
                    $item_total = 0;

                    if (!$PRINTOUT) {

                        if ($bg_color_swich) {
                            $bg_color = $bg_color_1;
                            $bg_color_swich = FALSE;
                        } else {
                            $bg_color = $bg_color_2;
                            $bg_color_swich = TRUE;
                        } // end of if ($bg_color_swich)

                        $table .= "<tr bgcolor=$bg_color>\n";
                    } else {

                        $table .= "<tr>\n";
                    }



                    $table.="<td>\n";
                    $table.="  " . $v['name'];
                    $table.="</td>\n";

                    for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                        $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                        $item_count = $this->_GetDailyLabItemTestsTotal($current_day, $day, $v['id']);
                        $item_total+= $item_count;

                        if ($current_day > time()) {
                            if (!$PRINTOUT)
                                $td_bg_color = "#ffffff";
                            $italic_tag_open = "<i>";
                            $italic_tag_close = "</i>";
                        } else {
                            if (!$PRINTOUT)
                                $td_bg_color = $bg_color;
                            $italic_tag_open = "";
                            $italic_tag_close = "";
                        } // end of if ($current_day > time())

                        $table.="<td bgcolor=\"$td_bg_color\" align=\"right\">" . $italic_tag_open . $item_count . $italic_tag_close . "</td>\n";
                    }

                    $table.="<td align=\"right\">\n";
                    $table.="  " . $item_total;
                    $table.="</td>\n";
                    $table.="</tr>\n";
                } // end of while (list($u,$v)=each($res_array))

                $table .= "<tr bgcolor=$bg_color>\n";
                $table .= "<td><strong>&sum;</strong></td>\n";

                $daily_count = 0;
                $daily_total = 0;

                for ($day = $first_day_of_req_month; $day <= $last_day_of_req_month; $day++) {
                    $current_day = $this->_get_requested_day($start_timeframe, $day - 1);
                    $daily_count = $this->_GetDailyLabItemTotal($current_day, $day, "");
                    $total_count+= $daily_count;

                    if ($current_day > time()) {
                        if (!$PRINTOUT)
                            $td_bg_color = "#ffffff";
                        $italic_tag_open = "<i>";
                        $italic_tag_close = "</i>";
                    } else {
                        if (!$PRINTOUT)
                            $td_bg_color = $bg_color;
                        $italic_tag_open = "";
                        $italic_tag_close = "";
                    } // end of if ($current_day > time())

                    $table.="<td bgcolor=\"$td_bg_color\" align=\"right\"><b>" . $italic_tag_open . $daily_count . $italic_tag_close . "</b></td>\n";
                }
                $table.="<td bgcolor=\"$td_bg_color\" align=\"right\"><b>" . $italic_tag_open . $total_count . $italic_tag_close . "<b></td>\n";
            } else {
                $table .= "<tr bgcolor=$bg_color>\n";

                $table.="<td>\n";
                $table.="  " . $LDNothinginList;
                $table.="</td>\n";

                $table.="<td colspan=31>\n";
                $table.="</td>\n";

                $table.="<td>\n";
                $table.=$LDNA;
                $table.="</td>\n";
                $table.="</tr>\n";
            } // End of if ($res_array = $rs_ptr->GetArray())

            echo $table;
        }

//**********************************************************************************************************************************************

        function Detailed_Revenue($date_from, $date_to, $company, $admission, $dept = '', $insurance = '', $print = 0) {
            //The detailed revenue function was written by Israel Pascal and modified by Mark Patrick
//            $print = 1;
            global $LDOther, $LDBilled_date, $LDAdmission_date, $LDPatient, $LDBirthDate, $LDSelianfilenumber, $LDMembership_NR, $LDForm_NR, $LDDescription, $LDGroup, $LDPrice, $LDRefund, $LDTopup, $LDDeposit;
            global $LDLab, $LDDrugs, $LDRadilogy, $LDDental, $LDEye, $LDMinProc, $LDProcSurg, $LDServicesTotal, $LDPartCode, $LDConsum, $LDSuppliesLab, $LDtotal, $LDNA, $LDNoOfItems;
            global $db;
            $arr_date_from = explode("-", $date_from);
            $arr_date_to = explode("-", $date_to);
            $date_from_timestamp = mktime(00, 00, 00, $arr_date_from[1], $arr_date_from[2], $arr_date_from[0]);
            $date_to_timestamp = mktime(23, 59, 59, $arr_date_to[1], $arr_date_to[2], $arr_date_to[0]);
            $bill_obj = New Bill;

            $in_out_patient = '';

            if ($date_from <= '2016-03-20') {

                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=1';
                            $in_out_where = 'WHERE ce.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=2';
                            $in_out_where = 'WHERE ce.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch  
            } else {
                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=1';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND billelem.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_ward_nr=' . $_POST['current_ward_nr'];
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=2';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND billelem.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_dept_nr=' . $_POST['dept_nr'];
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch 
            }

            if ($print) {
                $_POST['insurance'] = $insurance;
            }
            //echo $_POST['insurance']; 
            switch ($_POST['insurance']) {
                case -2:
                    $PayType = " insurance_id>=0 ";
                    $where_PayType = " WHERE billelem.insurance_id>=0 ";
                    $and_PayType = " AND billelem.insurance_id>=0 ";
                    break;

                case -1:
                    $PayType = " insurance_id=0 ";
                    $where_PayType = " WHERE billelem.insurance_id=0";
                    $and_PayType = " AND billelem.insurance_id=0 ";
                    break;

                default:
                    $PayType = " insurance_id=" . $_POST['insurance'];
                    $where_PayType = " WHERE billelem.insurance_id=" . $_POST['insurance'];
                    $and_PayType = " AND billelem.insurance_id=" . $_POST['insurance'] . " ";
//                    $where_PayType_id = " WHERE id =" . $_POST['insurance'];
                    break;
            }

            //get company name
            if ($_POST['insurance'] == -2) {
                $company_names = 'ALL CUSTOMERS';
            } else if ($_POST['insurance'] == -1) {
                $company_names = 'CASH';
            } else {
                $company_name = "SELECT name FROM care_tz_company WHERE id = " . $_POST['insurance'] . " ";
                $company_result = $db->Execute($company_name);
                if ($company_row = $company_result->FetchRow()) {

                    $company_names = $company_row['name'];
                }
            }

            $filename = fopen('./gui/downloads/detailed_revenue.csv', 'w');
            ?>       
        <table class="report" width="90%" border="1" valign="top"> 
            <tr bgcolor="lightgrey">
                <th width="70" >FROM:</th><th width="150" colspan="2"><?php echo date('d.M.Y H:i:s', $date_from_timestamp); ?></th><th width="70">TO:</th><th width="150" colspan="3"><?php echo date('d.M.Y H:i:s', $date_to_timestamp); ?></th><th colspan="6"><?php echo $company_names; ?></th> 
            </tr>
            <?php fputcsv($filename, array('FROM:', date('d.M.Y H:i:s', $date_from_timestamp), 'TO:', date('d.M.Y H:i:s', $date_to_timestamp), $company_names)); ?>
            <tr>
                <th width="70"  scope="col" font-size="8"> <?php echo $LDBilled_date; ?></th>
                <th width="70"  scope="col"> <?php echo $LDAdmission_date; ?></th>
                <th width="136" scope="col"><?php echo $LDPatient . '/ Names'; ?></th>
                <th width="136" scope="col"><?php echo $LDBirthDate; ?></th>
                <th width="90"  scope="col"> <?php echo $LDSelianfilenumber; ?></th>
                <th width="137" scope="col"><?php echo $LDMembership_NR; ?></th>
                <th width="90"  scope="col"> <?php echo $LDForm_NR; ?></th>
                <th width="90"  scope="col"> <?php echo 'Item Code'; ?></th>
                <th width="86"  scope="col"> <?php echo $LDDescription; ?></th>
                <th width="82"  scope="col"> <?php echo $LDGroup; ?></th>
                <th width="82"  scope="col"> <?php echo $LDNoOfItems; ?></th>
                <th width="70"  scope="col"> <?php echo $LDPrice; ?></th>
                <th width="70"  scope="col"> <?php echo $LDDeposit; ?></th>
            </tr>  
            <?php
            fputcsv($filename, array($LDBilled_date, $LDAdmission_date, $LDPatient, $LDBirthDate, $LDSelianfilenumber, $LDMembership_NR, $LDForm_NR, $LDPartCode, $LDDescription, $LDGroup, $LDNoOfItems, $LDPrice, $LDDeposit));
            //*********************************START PATIENTS WITHOUT DEPOSIT***************************************************************
            //echo 'in out'. $in_out_patient;
            //get list of all receipts to pass in the loop  
            $sql_receipts_list = "SELECT billelem.User_Id,cba.nr,cba.encounter_nr,cp.name_first,cp.name_last,billelem.date_change AS billed_date,billelem.bank_ref, ce.encounter_date AS admission_date,cp.date_birth,cp.selian_pid,cp.membership_nr,ce.form_nr  FROM care_tz_billing_archive cba 
			  INNER JOIN care_tz_billing_archive_elem billelem
			                      ON cba.nr=billelem.nr 
			  INNER JOIN care_encounter ce 
			                      ON cba.encounter_nr=ce.encounter_nr
			  INNER JOIN care_person cp 
			                      ON cp.pid=ce.pid                 
			   WHERE billelem.is_deposit_item!=1 AND billelem.description NOT IN('Advance','Topup','Refund') AND  billelem.date_change BETWEEN '" . $date_from_timestamp . "' AND '" . $date_to_timestamp . "' " . $and_PayType . " " . $in_out_patient . " GROUP BY cba.nr ORDER BY cba.encounter_nr";
            $receipts_list_result = $db->Execute($sql_receipts_list);

//            echo $sql_receipts_list;

            while ($rows_particlars = $receipts_list_result->FetchRow()) {
                ?>
                <tr>
                    <!-- list names-->
                    <td width="70" scope="col" bgcolor="lightblue" > <?php echo date('d.M.Y', $rows_particlars['billed_date']); ?></td> 
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo date('d.M.Y', strtotime($rows_particlars['admission_date'])); ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo ucfirst($rows_particlars['name_first']) . ' ' . ucfirst($rows_particlars['name_last']); ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo date('d.M.Y', strtotime($rows_particlars['date_birth'])); ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo $rows_particlars['selian_pid']; ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo $rows_particlars['membership_nr']; ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo $rows_particlars['form_nr']; ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"></td>
                    <td width="70" scope="col" bgcolor="lightblue"> </td>
                    <td width="70" scope="col" bgcolor="lightblue"> </td>
                    <td width="70" scope="col" bgcolor="lightblue"> </td>
                    <td width="70" scope="col" bgcolor="lightblue"> </td>
                    <td width="70" scope="col" bgcolor="lightblue"> </td>
                    <?php //fputcsv($filename,array(date('d.M.Y',$rows_particlars['billed_date']),date('d.M.Y',strtotime($rows_particlars['admission_date'])),$rows_particlars['name_last'].' '.$rows_particlars['name_first'],date('d.M.Y',strtotime($rows_particlars['date_birth'])),$rows_particlars['selian_pid'],$rows_particlars['membership_nr'],$rows_particlars['form_nr'],'','','','','','')); ?>
                </tr>
                <?php
                $total_items = 0;
                $sql_items = "SELECT pricelist.purchasing_class,pricelist.partcode,billelem.description,billelem.nr,billelem.amount,(amount*price) AS total_price
				               FROM care_tz_billing_archive_elem billelem 
				               INNER JOIN care_tz_drugsandservices pricelist
				               ON pricelist.item_id=billelem.item_number WHERE nr=" . $rows_particlars['nr'];

                $items_result = $db->Execute($sql_items);

                while ($rows_items = $items_result->FetchRow()) {
                    $total_items+=$rows_items['total_price'];


                    switch ($rows_items['purchasing_class']) {
                        case "labtest":
                            $total_lab+=$rows_items['total_price'];
                            $class['purch_class'] = 'LAB TEST';
                            break;

                        case "dental":
                            $total_dental+=$rows_items['total_price'];
                            $class['purch_class'] = 'DENTAL';
                            break;

                        case "eye-service":
                            $total_eye_service+=$rows_items['total_price'];
                            $class['purch_class'] = 'EYE SERVICE';
                            break;

                        case "minor_proc_op":
                            $total_minor_proc_op+=$rows_items['total_price'];
                            $class['purch_class'] = 'MINOR PROCEDURE';
                            break;

                        case "service":
                            $total_service+=$rows_items['total_price'];
                            $class['purch_class'] = 'SERVICE';
                            break;

                        case "supplies":
                            $total_supplies+=$rows_items['total_price'];
                            $class['purch_class'] = 'SUPPLIES';
                            break;

                        case "supplies_laboratory":
                            $total_supplies_laboratory+=$rows_items['total_price'];
                            $class['purch_class'] = 'LABORATORY SUPPLIES';
                            break;

                        case "surgical_op":
                            $total_surgical_op+=$rows_items['total_price'];
                            $class['purch_class'] = 'SURGICAL OP';
                            break;

                        case "drug_list":
                            $total_drug_list+=$rows_items['total_price'];
                            $class['purch_class'] = 'DRUG';
                            break;

                        case "drug_list_ctc":
                            $total_drug_list_ctc+=$rows_items['total_price'];
                            $class['purch_class'] = 'CTC DRUG';
                            break;

                        case "drug_list_nhif":
                            $total_drug_list_nhif+=$rows_items['total_price'];
                            $class['purch_class'] = 'NHIF DRUG';
                            break;

                        case "xray":
                            $total_xray+=$rows_items['total_price'];
                            $class['purch_class'] = 'RADIOLOGY';
                            break;

                        default:
                            $total_other+=$rows_items['total_price'];
                            $class['purch_class'] = 'OTHER';
                            break;
                    }//end switch purchasing_class
                    ?>
                    <tr>
                        <td colspan="7" bgcolor="grey"  ></td><td><?php echo $rows_items['partcode']; ?></td>
                        <td><?php echo $rows_items['description']; ?></td>
                        <td><?php echo $class['purch_class']; ?></td>
                        <td><?php echo $rows_items['amount']; ?></td>
                        <td><?php echo $rows_items['total_price']; ?></td>
                        <td>null</td>

                    </tr>  

                    <?php fputcsv($filename, array(date('d.M.Y', $rows_particlars['billed_date']), date('d.M.Y', strtotime($rows_particlars['admission_date'])), ucfirst($rows_particlars['name_last']) . ' ' . ucfirst($rows_particlars['name_first']), date('d.M.Y', strtotime($rows_particlars['date_birth'])), $rows_particlars['selian_pid'], $rows_particlars['membership_nr'], $rows_particlars['form_nr'], $rows_items['partcode'], $rows_items['description'], $class['purch_class'], $rows_items['amount'], $rows_items['total_price'], 'Null')); ?>
                    <?php
                }//end while $rows_items            
                ?>  
                <tr bgcolor="lightblue"><td colspan="13" bgcolor="lightblue"></td></tr>             
                <tr bgcolor="lightblue"><td colspan="8" ><B><font size="3">SUB TOTAL <?php echo number_format($total_items) . ';'; ?></B>&nbsp;<i>Receipt Number <?php echo $rows_particlars['nr'] . ';  '; ?>&nbsp;<i>BankRef: <?php echo $rows_particlars['bank_ref'].';  ';?>CASHIER <?php echo $rows_particlars['User_Id'] . ';  '; ?> </i></font></td></tr>          
                <tr bgcolor="red"><td colspan="13" bgcolor="red"></td></tr>
                <?php fputcsv($filename, array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ')); ?>

                <?php
            }//end while $rows_receipt_list
//***********************************END PATIENTS WITHOUT DEPOSIT***************************************************************************                    
//***********************************START PATIENT WITH DEPOSIT****************************************************************************
            //Patients who paid advance only 
            echo '<tr bgcolor="lightgrey"><td colspan="13" align="center">PATIENT DEPOSIT</td></tr>';
            fputcsv($filename, array('PATIENTS WITH DEPOSITS'));
            $sql_deposit = "SELECT  cp.pid, cp.name_first, cp.name_last,cp.date_birth,cp.membership_nr,ce.form_nr,cp.selian_pid,ce.encounter_nr,ce.encounter_class_nr,ce.current_ward_nr,ce.current_dept_nr,
                billelem.insurance_id,ce.encounter_date,billelem.date_change AS billed_date, billelem.bank_ref,billelem.description, billelem.amount,billelem.price,cba.nr 
          FROM care_person AS cp 
               INNER JOIN care_encounter AS ce ON cp.pid = ce.pid 
               INNER JOIN care_tz_billing_archive AS cba ON ce.encounter_nr = cba.encounter_nr 
               INNER JOIN care_tz_billing_archive_elem AS billelem ON billelem.nr = cba.nr 
          WHERE description='Advance' AND billelem.date_change BETWEEN '" . $date_from_timestamp . "' AND '" . $date_to_timestamp . "' " . $in_out_patient . " " . $and_PayType . "";
            $sql_deposit_result = $db->Execute($sql_deposit);

            while ($rows_dep = $sql_deposit_result->FetchRow()) {
                $total_deposit+=$rows_dep['price'];
                $class['purch_class'] = 'DEPOSIT';
                ?>
                <tr>        
                    <td width="70" scope="col" font-size="8"> <?php echo date('d.M.Y', $rows_dep['billed_date']); ?></td>
                    <td width="70" scope="col" font-size="8"> <?php echo date('d.M.Y', strtotime($rows_dep['encounter_date'])); ?></td>
                    <td width="70" scope="col" font-size="8"> <?php echo ucfirst($rows_dep['name_first']) . ' ' . ucfirst($rows_dep['name_last']); ?></td>
                    <td width="70" scope="col" font-size="8"> <?php echo date('d.M.Y', strtotime($rows_dep['date_birth'])); ?></td>
                    <td width="70" scope="col" font-size="8"> <?php echo $rows_dep['selian_pid']; ?></td>
                    <td width="70" scope="col" font-size="8"> <?php echo 'Bill No: ' . $rows_dep['nr']; ?></td>
                    <td width="70" scope="col" font-size="8"> <?php echo $rows_dep['form_nr']; ?></td>
                    <td width="70" scope="col" font-size="8"> <?php echo $rows_dep['partcode']; ?></td>
                    <td width="70" scope="col" font-size="8"> <?php   echo  $class['purch_class']. 'BankRef: '.$rows_dep['bank_ref'];?></td>
                    <td width="70" scope="col" font-size="8"> <?php echo $class['purch_class']; ?></td>
                    <td width="70" scope="col" font-size="8"> <?php echo $rows_dep['description']; ?></td>
                    <td width="70" scope="col" font-size="8"> <?php echo $rows_dep['amount']; ?></td>
                    <!--<td width="70" scope="col" font-size="8"> <?php //echo  $rows_dep['price'];                                    ?></td>-->
                    <td width="70" scope="col" font-size="8"> <?php echo $rows_dep['price']; ?></td>
                </tr>
                <?php fputcsv($filename, array(date('d.M.Y', $rows_dep['billed_date']), date('d.M.Y', strtotime($rows_dep['encounter_date'])), $rows_dep['name_last'] . ' ' . $rows_dep['name_first'], date('d.M.Y', strtotime($rows_dep['date_birth'])), $rows_dep['selian_pid'], 'Bill No: ' . $rows_dep['nr'], $rows_dep['form_nr'], $rows_dep['partcode'], $class['purch_class'], $class['purch_class'], $rows_dep['amount'], 'Null', $rows_dep['price'])); ?>
                <?php
            }

//***********************************END PATIENT WITH DEPOSIT******************************************************************************
//
//***********************************START PATIENTS WITH DEPOSITS BUT NOT YET CLEARED BILL*************************************************************
            echo '<tr bgcolor="lightgrey"><td colspan="13" align="center">PATIENT ITEMS WITH DEPOSITS BUT NO FINAL BILL</td></tr>';
            fputcsv($filename, array('PATIENTS WITH DEPOSIT BUT NO FINAL BILL YET'));
//patients with deposits and some paid for items                   
            $sql_receipts_list = "SELECT billelem.User_Id,cba.nr,cba.encounter_nr,cp.name_first,cp.name_last,billelem.date_change AS billed_date, ce.encounter_date AS admission_date,cp.date_birth,cp.selian_pid,cp.membership_nr,ce.form_nr  FROM care_tz_billing_archive cba 
			  INNER JOIN care_tz_billing_archive_elem billelem
			                      ON cba.nr=billelem.nr 
			  INNER JOIN care_encounter ce 
			                      ON cba.encounter_nr=ce.encounter_nr
			  INNER JOIN care_person cp 
			                      ON cp.pid=ce.pid                 
			   WHERE billelem.is_deposit_item=1 AND billelem.description NOT IN('Advance','Topup','Refund') 
                           AND billelem.nr NOT IN(SELECT nr FROM care_tz_billing_archive_elem WHERE description like'Topup%'
                            OR description like 'Refund%' AND  billelem.date_change BETWEEN '" . $date_from_timestamp . "' AND '" . $date_to_timestamp . "') 
                           AND  billelem.date_change BETWEEN '" . $date_from_timestamp . "' AND '" . $date_to_timestamp . "' " . $and_PayType . " " . $in_out_patient . " GROUP BY cba.nr ORDER BY cba.encounter_nr";
            $receipts_list_result = $db->Execute($sql_receipts_list);

//            echo $sql_receipts_list;
            while ($rows_particlars = $receipts_list_result->FetchRow()) {
                ?>
                <tr>
                    <!-- list names-->
                    <td width="70" scope="col" bgcolor="lightblue" > <?php echo date('d.M.Y', $rows_particlars['billed_date']); ?></td> 
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo date('d.M.Y', strtotime($rows_particlars['admission_date'])); ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo ucfirst($rows_particlars['name_first']) . ' ' . ucfirst($rows_particlars['name_last']); ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo date('d.M.Y', strtotime($rows_particlars['date_birth'])); ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo $rows_particlars['selian_pid']; ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo $rows_particlars['membership_nr']; ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"> <?php echo $rows_particlars['form_nr']; ?></td>
                    <td width="70" scope="col" bgcolor="lightblue"></td>
                    <td width="70" scope="col" bgcolor="lightblue"> </td>
                    <td width="70" scope="col" bgcolor="lightblue"> </td>
                    <td width="70" scope="col" bgcolor="lightblue"> </td>
                    <td width="70" scope="col" bgcolor="lightblue"> </td>
                    <td width="70" scope="col" bgcolor="lightblue"> </td>
                    <?php //fputcsv($filename,array(date('d.M.Y',$rows_particlars['billed_date']),date('d.M.Y',strtotime($rows_particlars['admission_date'])),$rows_particlars['name_last'].' '.$rows_particlars['name_first'],date('d.M.Y',strtotime($rows_particlars['date_birth'])),$rows_particlars['selian_pid'],$rows_particlars['membership_nr'],$rows_particlars['form_nr'],'','','','','','')); ?>
                </tr>
                <?php
                $total_items = 0;
                $sql_items = "SELECT pricelist.purchasing_class,pricelist.partcode,billelem.description,billelem.nr,billelem.amount,(amount*price) AS total_price
				               FROM care_tz_billing_archive_elem billelem 
				               INNER JOIN care_tz_drugsandservices pricelist
				               ON pricelist.item_id=billelem.item_number WHERE nr=" . $rows_particlars['nr'];

                $items_result = $db->Execute($sql_items);

                while ($rows_items = $items_result->FetchRow()) {
                    $total_items+=$rows_items['total_price'];


                    switch ($rows_items['purchasing_class']) {
                        case "labtest":
                            $total_lab_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'LAB TEST';
                            break;

                        case "dental":
                            $total_dental_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'DENTAL';
                            break;

                        case "eye-service":
                            $total_eye_service_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'EYE SERVICE';
                            break;

                        case "minor_proc_op":
                            $total_minor_proc_op_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'MINOR PROCEDURE';
                            break;

                        case "service":
                            $total_service_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'SERVICE';
                            break;

                        case "supplies":
                            $total_supplies_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'SUPPLIES';
                            break;

                        case "supplies_laboratory":
                            $total_supplies_laboratory_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'LABORATORY SUPPLIES';
                            break;

                        case "surgical_op":
                            $total_surgical_op_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'SURGICAL OP';
                            break;

                        case "drug_list":
                            $total_drug_list_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'DRUG';
                            break;

                        case "drug_list_ctc":
                            $total_drug_list_ctc_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'CTC DRUG';
                            break;

                        case "drug_list_nhif":
                            $total_drug_list_nhif_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'NHIF DRUG';
                            break;

                        case "xray":
                            $total_xray_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'RADIOLOGY';
                            break;

                        default:
                            $total_other_dep+=$rows_items['total_price'];
                            $class['purch_class'] = 'OTHER';
                            break;
                    }//end switch purchasing_class
                    ?>
                    <tr>
                        <td colspan="7" bgcolor="grey"  ></td><td><?php echo $rows_items['partcode']; ?></td>
                        <td><?php echo $rows_items['description']; ?></td>
                        <td><?php echo $class['purch_class']; ?></td>
                        <td><?php echo $rows_items['amount']; ?></td>
                        <td><?php echo $rows_items['total_price']; ?></td>
                        <td>null</td>

                    </tr>  

                    <?php fputcsv($filename, array(date('d.M.Y', $rows_particlars['billed_date']), date('d.M.Y', strtotime($rows_particlars['admission_date'])), ucfirst($rows_particlars['name_last']) . ' ' . ucfirst($rows_particlars['name_first']), date('d.M.Y', strtotime($rows_particlars['date_birth'])), $rows_particlars['selian_pid'], $rows_particlars['membership_nr'], $rows_particlars['form_nr'], $rows_items['partcode'], $rows_items['description'], $class['purch_class'], $rows_items['amount'], $rows_items['total_price'], 'Null')); ?>
                    <?php
                }//end while $rows_items            
                ?>  
                <tr bgcolor="red"><td colspan="13" bgcolor="red"></td></tr>             
                <tr bgcolor="lightblue"><td colspan="8" ><B><font size="3">SUB TOTAL <?php echo number_format($total_items) . ';'; ?></B>&nbsp;<i>Receipt Number <?php echo $rows_particlars['nr'] . ';  '; ?>CASHIER <?php echo $rows_particlars['User_Id'] . ';  '; ?> </i></font></td></tr>          
                <tr bgcolor="red"><td colspan="13" bgcolor="red"></td></tr>
                <?php fputcsv($filename, array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ')); ?>
                <?php
            }
//***********************************END PATIENTS WITH DEPOSITS BUT NOT YET CLEARED BILL*************************************************************
//
//***********************************START PATIENT TOPUP***********************************************************************************

            echo '<tr bgcolor="lightgrey"><td colspan="13" align="center">PATIENT TOPUP</td></tr>';
            fputcsv($filename, array('PATIENTS WITH TOPUP'));
//patients with topup                    
            $sql_topup = "SELECT  cp.pid,billelem.nr,billelem.User_Id,cp.name_first, cp.name_last,cp.date_birth,cp.membership_nr,ce.form_nr,cp.selian_pid,ce.encounter_nr,ce.encounter_class_nr,ce.current_ward_nr,ce.current_dept_nr,billelem.insurance_id,ce.encounter_date,billelem.date_change AS billed_date,billelem.bank_ref,billelem.description, billelem.amount,billelem.price 
          FROM care_person AS cp 
               INNER JOIN care_encounter AS ce ON cp.pid = ce.pid 
               INNER JOIN care_tz_billing_archive AS cba ON ce.encounter_nr = cba.encounter_nr 
               INNER JOIN care_tz_billing_archive_elem AS billelem ON billelem.nr = cba.nr 
          WHERE description='Topup' AND billelem.date_change BETWEEN '" . $date_from_timestamp . "' AND '" . $date_to_timestamp . "' " . $in_out_patient . " " . $and_PayType . "";
            $sql_topup_result = $db->Execute($sql_topup);

            while ($rows_topup = $sql_topup_result->fetchRow()) {
                $total_topup+=$rows_topup['price'];
                $sql_deposit_topup = "SELECT description,price,encounter_nr,cbae.nr 
			                                FROM care_tz_billing_archive_elem AS cbae 
			                                INNER JOIN care_tz_billing_archive AS cba
			                        ON cbae.nr=cba.nr
			                        WHERE description='Advance' AND encounter_nr=" . $rows_topup['encounter_nr'];
                $amt_deposited_topup = 0;
                $deposit_topup_result = $db->Execute($sql_deposit_topup);
                while ($rows_total_deposit_topup = $deposit_topup_result->FetchRow()) {
                    $amt_deposited_topup+=$rows_total_deposit_topup['price'];
                }//end while total deposited                   
                ?>
                <tr bgcolor="grey">
                    <td bgcolor="lightblue">&nbsp;<?php echo date('d.M.Y', $rows_topup['billed_date']); ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo date('d.M.Y', strtotime($rows_topup['encounter_date'])); ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo ucfirst($rows_topup['name_first']) . ' ' . ucfirst($rows_topup['name_last']); ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo date('d.M.Y', strtotime($rows_topup['date_birth'])); ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo $rows_topup['selian_pid']; ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo $rows_topup['membership_nr']; ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo $rows_topup['form_nr']; ?></td>	
                    <td bgcolor="lightblue">&nbsp;<?php echo $LDNA; ?></td>
                    <td bgcolor="lightblue"></td>
                    <td bgcolor="lightblue"></td>
                    <td bgcolor="lightblue"></td>
                    <td bgcolor="lightblue"></td>
                    <td bgcolor="lightblue"></td>
                </tr>
                <?php //fputcsv($filename,array(date('d.M.Y',$rows_topup['billed_date']),date('d.M.Y',strtotime($rows_topup['encounter_date'] )),$rows_topup['name_first'].' '.$rows_topup['name_last'],date('d.M.Y',strtotime($rows_topup['date_birth'])),$rows_topup['selian_pid'],$rows_topup['membership_nr'],$rows_topup['form_nr'],$LDNA,'','','','',''))  ?>;              

                <?php
                $sql_topup_items = "SELECT billelem.description,billelem.amount,(billelem.amount * billelem.price) AS total_price,pricelist.purchasing_class
			                                  FROM care_tz_billing_archive_elem AS billelem 
			                                  INNER JOIN care_tz_drugsandservices AS pricelist
			                                  ON pricelist.item_id=billelem.item_number
			                             WHERE is_deposit_item=1 AND  nr=" . $rows_topup['nr'];
//                $sql_topup_items = "SELECT billelem.description,billelem.amount,(billelem.amount * billelem.price) AS total_price,pricelist.purchasing_class
//			                                  FROM care_tz_billing_archive_elem AS billelem 
//			                                  INNER JOIN care_tz_drugsandservices AS pricelist
//			                                  ON pricelist.item_id=billelem.item_number
//			                             WHERE nr=" . $rows_topup['nr'];
                $total_topup_items = 0;
                $sql_topup_items_result = $db->Execute($sql_topup_items);
                while ($rows_topup_items = $sql_topup_items_result->FetchRow()) {
                    $total_topup_items+=$rows_topup_items['total_price'];

                    switch ($rows_topup_items['purchasing_class']) {
                        case "labtest":
                            $total_lab_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'LAB TEST';
                            break;

                        case "dental":
                            $total_dental_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'DENTAL';
                            break;

                        case "eye-service":
                            $total_eye_service_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'EYE SERVICE';
                            break;

                        case "minor_proc_op":
                            $total_minor_proc_op_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'MINOR PROCEDURE';
                            break;

                        case "service":
                            $total_service_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'SERVICE';
                            break;

                        case "supplies":
                            $total_supplies_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'SUPPLIES';
                            break;

                        case "supplies_laboratory":
                            $total_supplies_laboratory_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'LABORATORY SUPPLIES';
                            break;

                        case "surgical_op":
                            $total_surgical_op_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'SURGICAL OP';
                            break;

                        case "drug_list":
                            $total_drug_list_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'DRUG';
                            break;

                        case "drug_list_ctc":
                            $total_drug_list_ctc_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'CTC DRUG';
                            break;

                        case "drug_list_nhif":
                            $total_drug_list_nhif_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'NHIF DRUG';
                            break;

                        case "xray":
                            $total_xray_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'RADIOLOGY';
                            break;

                        default:
                            $total_other_dep+=$rows_topup_items['total_price'];
                            $class['purch_class'] = 'OTHER';
                            break;
                    }//end switch purchasing_class
                    ?>
                    <tr>
                        <td colspan="8" bgcolor="grey"  ></td><td><?php echo $rows_topup_items['description']; ?></td>
                        <td><?php echo $class['purch_class']; ?></td>
                        <td><?php echo $rows_topup_items['amount']; ?></td>
                        <td><?php echo $rows_topup_items['total_price']; ?></td>
                        <td>null</td>
                        <?php fputcsv($filename, array(date('d.M.Y', $rows_topup['billed_date']), date('d.M.Y', strtotime($rows_topup['encounter_date'])), $rows_topup['name_first'] . ' ' . $rows_topup['name_last'], date('d.M.Y', strtotime($rows_topup['date_birth'])), $rows_topup['selian_pid'], $rows_topup['membership_nr'], $rows_topup['form_nr'], $LDNA, $rows_topup_items['description'], $class['purch_class'], $rows_topup_items['amount'], $rows_topup_items['total_price'])); ?>



                    </tr>  
                    <?php
                }
                fputcsv($filename, array(date('d.M.Y', $rows_topup['billed_date']), date('d.M.Y', strtotime($rows_topup['encounter_date'])), $rows_topup['name_first'] . ' ' . $rows_topup['name_last'], date('d.M.Y', strtotime($rows_topup['date_birth'])), $rows_topup['selian_pid'], $rows_topup['membership_nr'], $rows_topup['form_nr'], $LDNA, 'TOTAL TOPUP', '', '', '', number_format($rows_topup['price'])));
                ?>    
                <tr bgcolor="red"><td colspan="13" bgcolor="red"></td></tr>             
                <tr bgcolor="lightblue"><td colspan="8" ><B><font size="3">DEPOSITED <?php echo number_format($amt_deposited_topup) . ';  '; ?></B>SUB TOTAL <?php echo number_format($total_topup_items) . ';'; ?><i>Rec# <?php echo $rows_topup['nr'] . ';'; ?> BankRef: <?php echo $rows_topup['bank_ref'].';'; ?>CASHIER <?php echo $rows_topup['User_Id']; ?> </i></font></td><td colspan="4"><B><font size="3"><i>FINAL BILL(TOPUP)</i>:</font></B></td><td><span style="border-bottom:double black;"><font size="3"><?php echo number_format($rows_topup['price']); ?><i></i></font></span></td></tr>          
                <tr bgcolor="red"><td colspan="13" bgcolor="red"></td></tr>
                <?php // fputcsv($filename,array('','','','','','','','','','','','','')); ?>
                <?php //fputcsv($filename,array('','','','','','','','DEPOSITED'.number_format($amt_deposited_topup),'SUB TOTAL'.number_format($total_topup_items),'REC#'.$rows_topup['nr'],'CASHIER '.$rows_topup['User_Id'],'','','',''.)); ?>
                <?php
            }
//***********************************END PATIENT TOPUP*************************************************************************************
//***********************************START PATIENT REFUND**********************************************************************************
            echo '<tr bgcolor="lightgrey"><td colspan="13" align="center">PATIENT REFUND</td></tr>';

            //patients with refund
            $sql_refund = "SELECT  cp.pid,billelem.nr,billelem.User_Id, cp.name_first, cp.name_last,cp.date_birth,cp.membership_nr,ce.form_nr,cp.selian_pid,ce.encounter_nr,ce.encounter_class_nr,ce.current_ward_nr,ce.current_dept_nr,billelem.insurance_id,billelem.bank_ref,ce.encounter_date,billelem.date_change AS billed_date, billelem.description, billelem.amount,billelem.price 
          FROM care_person AS cp 
               INNER JOIN care_encounter AS ce ON cp.pid = ce.pid 
               INNER JOIN care_tz_billing_archive AS cba ON ce.encounter_nr = cba.encounter_nr 
               INNER JOIN care_tz_billing_archive_elem AS billelem ON billelem.nr = cba.nr 
          WHERE description='Refund' AND billelem.date_change BETWEEN '" . $date_from_timestamp . "' AND '" . $date_to_timestamp . "' " . $in_out_patient . " " . $and_PayType . "";
            $sql_refund_result = $db->Execute($sql_refund);

            while ($rows_refund = $sql_refund_result->fetchRow()) {
                $total_refund+=$rows_refund['price'];
                $sql_deposit_refund = "SELECT description,price,encounter_nr,cbae.nr 
			                                FROM care_tz_billing_archive_elem AS cbae 
			                                INNER JOIN care_tz_billing_archive AS cba
			                        ON cbae.nr=cba.nr
			                        WHERE description='Advance' AND encounter_nr=" . $rows_refund['encounter_nr'];
                $amt_deposited_refund = 0;
                $deposit_refund_result = $db->Execute($sql_deposit_refund);
                while ($rows_total_deposit_refund = $deposit_refund_result->FetchRow()) {
                    $amt_deposited_refund += $rows_total_deposit_refund['price'];
                }//end while total deposited                   
                ?>
                <tr bgcolor="grey">;
                    <td bgcolor="lightblue">&nbsp;<?php echo date('d.M.Y', $rows_refund['billed_date']); ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo date('d.M.Y', strtotime($rows_refund['encounter_date'])); ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo ucfirst($rows_refund['name_first']) . ' ' . ucfirst($rows_refund['name_last']); ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo date('d.M.Y', strtotime($rows_refund['date_birth'])); ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo $rows_refund['selian_pid']; ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo $rows_refund['membership_nr']; ?></td>
                    <td bgcolor="lightblue">&nbsp;<?php echo $rows_refund['form_nr']; ?></td>	
                    <td bgcolor="lightblue">&nbsp;<?php echo $LDNA; ?></td>
                    <td bgcolor="lightblue"></td>
                    <td bgcolor="lightblue"></td>
                    <td bgcolor="lightblue"></td>
                    <td bgcolor="lightblue"></td>
                    <td bgcolor="lightblue"></td>
                </tr>


                <?php
                $sql_refund_items = "SELECT billelem.description,billelem.amount,(billelem.amount * billelem.price) AS total_price,pricelist.purchasing_class
			                                  FROM care_tz_billing_archive_elem AS billelem 
			                                  INNER JOIN care_tz_drugsandservices AS pricelist
			                                  ON pricelist.item_id=billelem.item_number
			                             WHERE is_deposit_item=1 AND  nr=" . $rows_refund['nr'];
                $total_refund_items = 0;
                $sql_refund_items_result = $db->Execute($sql_refund_items);
                while ($rows_refund_items = $sql_refund_items_result->FetchRow()) {
                    $total_refund_items+=$rows_refund_items['total_price'];


                    switch ($rows_refund_items['purchasing_class']) {
                        case "labtest":
                            $total_lab_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'LAB TEST';
                            break;

                        case "dental":
                            $total_dental_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'DENTAL';
                            break;

                        case "eye-service":
                            $total_eye_service_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'EYE SERVICE';
                            break;

                        case "minor_proc_op":
                            $total_minor_proc_op_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'MINOR PROCEDURE';
                            break;

                        case "service":
                            $total_service_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'SERVICE';
                            break;

                        case "supplies":
                            $total_supplies_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'SUPPLIES';
                            break;

                        case "supplies_laboratory":
                            $total_supplies_laboratory_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'LABORATORY SUPPLIES';
                            break;

                        case "surgical_op":
                            $total_surgical_op_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'SURGICAL OP';
                            break;

                        case "drug_list":
                            $total_drug_list_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'DRUG';
                            break;

                        case "drug_list_ctc":
                            $total_drug_list_ctc_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'CTC DRUG';
                            break;

                        case "drug_list_nhif":
                            $total_drug_list_nhif_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'NHIF DRUG';
                            break;

                        case "xray":
                            $total_xray_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'RADIOLOGY';
                            break;

                        default:
                            $total_other_dep+=$rows_refund_items['total_price'];
                            $class['purch_class'] = 'OTHER';
                            break;
                    }//end switch purchasing_class
                    ?>
                    <tr>
                        <td colspan="8" bgcolor="grey"  ></td><td><?php echo $rows_refund_items['description']; ?></td>
                        <td><?php echo $class['purch_class']; ?></td>
                        <td><?php echo $rows_refund_items['amount']; ?></td>
                        <td><?php echo $rows_refund_items['total_price']; ?></td>
                        <td>null</td>
                        <?php fputcsv($filename, array(date('d.M.Y', $rows_refund['billed_date']), date('d.M.Y', strtotime($rows_refund['encounter_date'])), $rows_refund['name_first'] . ' ' . $rows_refund['name_last'], date('d.M.Y', strtotime($rows_refund['date_birth'])), $rows_refund['selian_pid'], $rows_refund['membership_nr'], $rows_refund['form_nr'], $LDNA, $rows_refund_items['description'], $class['purch_class'], $rows_refund_items['amount'], $rows_refund_items['total_price'])); ?>		   
                    </tr>  
                    <?php
                }
                fputcsv($filename, array(date('d.M.Y', $rows_refund['billed_date']), date('d.M.Y', strtotime($rows_refund['encounter_date'])), $rows_refund['name_first'] . ' ' . $rows_refund['name_last'], date('d.M.Y', strtotime($rows_refund['date_birth'])), $rows_refund['selian_pid'], $rows_refund['membership_nr'], $rows_refund['form_nr'], $LDNA, 'TOTAL REFUND', '', '', '', number_format($rows_refund['price'])));
                ?>    
                <tr bgcolor="red"><td colspan="13" bgcolor="red"></td></tr>             
                <tr bgcolor="lightblue"><td colspan="8" ><B><font size="3">DEPOSITED <?php echo number_format($amt_deposited_refund); ?>&nbsp;</B>SUB TOTAL <?php echo number_format($total_refund_items) . ';'; ?>&nbsp;Rec#<?php echo $rows_refund['nr'] . '; '; ?>&nbsp;BankRef:<?php echo $rows_refund['bank_ref'].'; ';?>&nbsp;CASHIER <?php echo $rows_refund['User_Id'] . ';'; ?></font></td><td colspan="4"><B><font size="3"><i>FINAL BILL(REFUND)</i>:</font></B></td><td><span style="border-bottom:double black;"><font size="3"><?php echo number_format($rows_refund['price']); ?><i></i></font></span></td></tr>          
                <tr bgcolor="red"><td colspan="13" bgcolor="red"></td></tr>
                <?php
            }

//**********END PATIENT REFUND**************************************************
//******************SUM ALL******************************************
            $drugs_total = $total_drug_list + $total_drug_list_ctc + $total_drug_list_nhif;

            $drugs_total_dep = $total_drug_list_dep + $total_drug_list_ctc_dep + $total_drug_list_nhif_dep;

            $total_all_exl_deposit = $drugs_total + $total_lab + $total_xray + $total_dental + $total_eye_service + $total_minor_proc_op + $total_surgical_op + $total_service + $total_supplies + $total_supplies_laboratory + $total_other;
            $total_items_deposit = $drugs_total_dep + $total_lab_dep + $total_xray_dep + $total_dental_dep + $total_eye_service_dep + $total_minor_proc_op_dep + $total_surgical_op_dep + $total_service_dep + $total_supplies_dep + $total_supplies_laboratory_dep + $total_other_dep;
            $sum_deposits = $total_deposit + $total_topup + $total_refund;
            $sum_deposits_and_topup=$total_deposit + $total_topup;
            $sum_topup_refund_items = $total_refund_items + $total_topup_items;
//********END SUM ALL*****************************************
//***START SUMMARY****************************
            ?>
            <?php if ($print) { ?>
                <table class="report" width="100%" border="1">
                <?php } else { ?>
                    <table class="report" width="90%" border="1">
                    <?php } ?>

                    <tr>
                        <th width="89" scope="col"><?php echo $LDLab; ?></th>
                        <th width="89" scope="col"><?php echo $LDDrugs; ?></th>
                        <th width="89" scope="col"><?php echo $LDRadilogy; ?></th>
                        <th width="89" scope="col"><?php echo $LDDental; ?></th>
                        <th width="89" scope="col"><?php echo $LDEye; ?></th>
                        <th width="89" scope="col"><?php echo $LDMinProc; ?></th>
                        <th width="89" scope="col"><?php echo $LDProcSurg; ?></th>
                        <th width="89" scope="col"><?php echo $LDServicesTotal; ?></th>
                        <th width="89" scope="col"><?php echo $LDConsum; ?></th>
                        <th width="89" scope="col"><?php echo $LDSuppliesLab; ?></th>
                        <th width="89" scope="col"><?php echo $LDOther; ?></th>
                        <!--
                        <th width="89" scope="col">TOTAL EXCL. DEPOSIT ITEMS</th>
                          -->
                        <th width="89" scope="col">TOTAL AMT FOR ITEMS</th>
                        <?php fputcsv($filename, array($LDLab, $LDDrugs, $LDRadilogy, $LDDental, $LDEye, $LDMinProc, $LDProcSurg, $LDServicesTotal, $LDConsum, $LDSuppliesLab, $LDOther, 'TOTAL WITH DEPOSIT ITEMS')); ?>
                    </tr>
                    <tr>
                        <th width="89" scope="col"><?php echo number_format($total_lab+$total_lab_dep); ?></th>
                        <th width="89" scope="col"><?php echo number_format($drugs_total+$drugs_total_dep); ?></th>
                        <th width="89" scope="col"><?php echo number_format($total_xray+$total_xray_dep); ?></th>
                        <th width="89" scope="col"><?php echo number_format($total_dental+$total_dental_dep); ?></th>
                        <th width="89" scope="col"><?php echo number_format($total_eye_service+$total_eye_service_dep); ?></th>
                        <th width="89" scope="col"><?php echo number_format($total_minor_proc_op+$total_minor_proc_op_dep); ?></th>
                        <th width="89" scope="col"><?php echo number_format($total_surgical_op+$total_surgical_op_dep); ?></th>
                        <th width="89" scope="col"><?php echo number_format($total_service+$total_service_dep); ?></th>
                        <th width="89" scope="col"><?php echo number_format($total_supplies+$total_supplies_dep); ?></th>
                        <th width="89" scope="col"><?php echo number_format($total_supplies_laboratory+$total_supplies_laboratory_dep); ?></th>
                        <th width="89" scope="col"><?php echo number_format($total_other+$total_other_dep); ?></th>

                         <!--
                            /*
                        <th width="89" scope="col"><B><span style="border-bottom:double black;"><font size="3"><?php ($total_all_exl_deposit); ?></font></span></B></th>
                        */
                    -->


                        <th width="89" scope="col"><B><span style="border-bottom:double black;"><font size="3"><?php echo number_format($total_all_exl_deposit + $total_items_deposit); ?></font></span></B></th>
                    </tr>
                    <tr bgcolor="black"><td colspan="13" bgcolor="red"></td></tr>
                </table>
                </p>
                <?php fputcsv($filename, array(number_format($total_lab+$total_lab_dep), number_format($drugs_total+$drugs_total_dep), number_format($total_xray+$total_xray_dep), number_format($total_dental+$total_dental_dep), number_format($total_eye_service+$total_eye_service_dep), number_format($total_minor_proc_op+$total_minor_proc_op_dep), number_format($total_surgical_op+$total_surgical_op_dep), number_format($total_service+$total_service_dep), number_format($total_supplies+$total_supplies_dep), number_format($total_supplies_laboratory+$total_supplies_laboratory_dep), number_format($total_other+$total_other_dep), number_format($total_all_exl_deposit + $total_items_deposit))); ?>
                <table class="report" width="90%" border="0">
                    <tr>
                        <th align="left"><font size="3"><span style="border-bottom:double black;">MAIN SUMMARY:</span></font></th><th align="left">
                            <font size="5">GRAND TOTAL:&nbsp;&nbsp;&nbsp;<span style="border-bottom:double black"><?php echo number_format($total_all_exl_deposit + $sum_deposits_and_topup) . '/='; ?></span></font><i>Excl.Refund</i></th>          
                        <?php fputcsv($filename, array('GRAND TOTAL:', number_format($total_all_exl_deposit + $sum_deposits_and_topup))); ?> 

                        <?php fputcsv($filename, array('MAIN SUMMARY')); ?>   
                    <tr>
                    <tr><td></td></tr>
                    <tr align="left"><td><font size="2">TOTAL DEPOSIT:&nbsp;&nbsp;&nbsp;<?php echo number_format($total_deposit); ?></font></td></tr>
                    <tr><td align="left"><font size="2">TOTAL TOPUP:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($total_topup); ?></span></font></td></tr>
                    <tr><td align="left"><font size="2">TOTAL REFUND:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($total_refund); ?></font></td></tr>
                    <tr><td align="left"><font size="3"><B>NET DEPOSITS</B></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3"><span style="border-bottom:double black;" ><?php echo number_format($sum_deposits); ?></span></font></td><td><a href="./gui/downloads/detailed_revenue.csv"><img border=0 src="../../gui/img/common/default/savedisk.gif"></a></td></tr>

                    <?php fputcsv($filename, array('TOTAL DEPOSIT:', number_format($total_deposit))); ?>
                    <?php fputcsv($filename, array('TOTAL TOPUP:', number_format($total_topup))); ?>
                    <?php fputcsv($filename, array('TOTAL REFUND:', number_format($total_refund))); ?>
                    <?php fputcsv($filename, array('NET DEPOSITS:', number_format($sum_deposits))); ?> 
                    </tr>
                    </tr>
                </table>  

                <?php
//******END SUMMARY***********************************************************
                ?>                              

            </table>      
            <?php
            fclose($filename);
        }

//*************************************************************************************************************************************************	
//*************************************************************************************************************************************************	
//=============================================================================================================
        function DailySummary($date_from, $date_to, $company, $admission, $dept = '', $insurance = '', $print = 0) {
                    //daily summary report was written by Israel Pascal
                    global $LDOther, $LDBilled_date, $LDAdmission_date, $LDPatient, $LDBirthDate, $LDSelianfilenumber, $LDMembership_NR, $LDForm_NR, $LDDescription, $LDGroup, $LDPrice, $LDRefund, $LDTopup, $LDDeposit;
                    global $LDLab, $LDDrugs, $LDRadilogy, $LDDental, $LDEye, $LDMinProc, $LDProcSurg, $LDServicesTotal, $LDPartCode, $LDConsum, $LDSuppliesLab, $LDtotal, $LDNA, $LDNoOfItems;
                    global $db;
                    $arr_date_from = explode("-", $date_from);
                    $arr_date_to = explode("-", $date_to);
                    $date_from_timestamp = mktime(00, 00, 00, $arr_date_from[1], $arr_date_from[2], $arr_date_from[0]);
                    $date_to_timestamp = mktime(23, 59, 59, $arr_date_to[1], $arr_date_to[2], $arr_date_to[0]);
                    $bill_obj = New Bill;

                    $in_out_patient = '';

                    if ($date_from <= '2016-03-20') {

                        switch ($admission) {
                            case 1:
                                if ($print) {
                                    $_POST['current_ward_nr'] = $dept;
                                }
                                if ($_POST['current_ward_nr'] == 'all_ipd') {
                                    $in_out_patient = ' AND ce.encounter_class_nr=1';
                                    $in_out_where = 'WHERE ce.encounter_class_nr=1';
                                    $idara="ALL-INPATIENT";

                                } else {
                                    $in_out_patient = ' AND ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                                    $in_out_where = 'WHERE ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                                    $sql_ward="SELECT name FROM care_ward WHERE nr=".$_POST['current_ward_nr'];
                                    $result_ward=$db->Execute($sql_ward);
                                    if($wardname_row=$result_ward->FetchRow()){
                                        $idara=$wardname_row['name'];
                                    }
                                }
                                break;
                            case 2:
                                if ($print) {
                                    $_POST['dept_nr'] = $dept;
                                }
                                if ($_POST['dept_nr'] == 'all_opd') {
                                    $in_out_patient = ' AND ce.encounter_class_nr=2';
                                    $in_out_where = 'WHERE ce.encounter_class_nr=2';
                                    $idara='ALL OUT-PATIENT';
                                } else {
                                    $in_out_patient = ' AND ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                                    $in_out_where = 'WHERE ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                                    $sql_dept="SELECT name_formal FROM care_department WHERE nr=". $_POST['dept_nr'];
                                    $result_dept=$db->Execute($sql_dept);
                                    if($deptname_row=$result_dept->FetchRow()){
                                        $idara=$deptname_row['name_formal'];

                                    }
                                }
                                break;
                            default:
                                $in_out_patient = '';
                                $in_out_where = '';
                                break;
                        }//end of switch  
                    } else {
                        switch ($admission) {
                            case 1:
                                if ($print) {
                                    $_POST['current_ward_nr'] = $dept;
                                }
                                if ($_POST['current_ward_nr'] == 'all_ipd') {
                                    $in_out_patient = ' AND bae.encounter_class_nr=1';
                                    $in_out_where = 'WHERE bae.encounter_class_nr=1';
                                    $idara="ALL-INPATIENT";
                                    

                                } else {
                                    $in_out_patient = ' AND bae.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                                    $in_out_where = 'WHERE bae.current_ward_nr=' . $_POST['current_ward_nr'];
                                    $sql_ward="SELECT name FROM care_ward WHERE nr=".$_POST['current_ward_nr'];
                                    $result_ward=$db->Execute($sql_ward);
                                    if($wardname_row=$result_ward->FetchRow()){
                                        $idara=$wardname_row['name'];

                                    }
                                }
                                break;
                            case 2:
                                if ($print) {
                                    $_POST['dept_nr'] = $dept;
                                }
                                if ($_POST['dept_nr'] == 'all_opd') {
                                    $in_out_patient = ' AND bae.encounter_class_nr=2';
                                    $in_out_where = 'WHERE bae.encounter_class_nr=2';
                                    $idara='ALL OUT-PATIENT';
                                } else {
                                    $in_out_patient = ' AND bae.current_dept_nr=' . $_POST['dept_nr'] . " ";
                                    $in_out_where = 'WHERE bae.current_dept_nr=' . $_POST['dept_nr'];
                                    $sql_dept="SELECT name_formal FROM care_department WHERE nr=". $_POST['dept_nr'];
                                    $result_dept=$db->Execute($sql_dept);
                                    if($deptname_row=$result_dept->FetchRow()){
                                        $idara=$deptname_row['name_formal'];

                                    }
                                }
                                break;
                            default:
                                $in_out_patient = '';
                                $in_out_where = '';
                                $idara='ALL OPD AND IPD';
                                break;
                        }//end of switch 
                    }

                    if ($print) {
                        $_POST['insurance'] = $insurance;
                    }
                    //echo $_POST['insurance']; 
                    switch ($_POST['insurance']) {
                        case -2:
                            $PayType = " insurance_id>=0 ";
                            $where_PayType = " WHERE bae.insurance_id>=0 ";
                            $and_PayType = " AND bae.insurance_id>=0 ";
                            break;

                        case -1:
                            $PayType = " insurance_id=0 ";
                            $where_PayType = " WHERE bae.insurance_id=0";
                            $and_PayType = " AND bae.insurance_id=0 ";
                            break;

                        default:
                            $PayType = " insurance_id=" . $_POST['insurance'];
                            $where_PayType = " WHERE bae.insurance_id=" . $_POST['insurance'];
                            $and_PayType = " AND bae.insurance_id=" . $_POST['insurance'] . " ";
        //                    $where_PayType_id = " WHERE id =" . $_POST['insurance'];
                            break;
                    }

                    //get company name
                    if ($_POST['insurance'] == -2) {
                        $company_names = 'ALL CUSTOMERS';
                    } else if ($_POST['insurance'] == -1) {
                        $company_names = 'CASH';
                    } else {
                        $company_name = "SELECT name FROM care_tz_company WHERE id = " . $_POST['insurance'] . " ";
                        $company_result = $db->Execute($company_name);
                        if ($company_row = $company_result->FetchRow()) {

                            $company_names = $company_row['name'];
                        }
                    }


                    
                     $sql_hospname="SELECT value FROM care_config_global WHERE type='main_info_address' ";
                     $result_hospname=$db->Execute($sql_hospname);
                     if($rows_hospname=$result_hospname->FetchRow()){
                        $hospname=$rows_hospname['value'];
                     }

                     $filename='';
                     $filename=fopen('./gui/downloads/DailySummary.csv', 'w');
                     ?>
                     <table>
                     <tr><th><?php echo $hospname;?><br>Report Date:  <?php echo $date_from;?> To:  <?php echo $date_to;?><br>Health Fund:<?php echo $company_names;?><br>Dept/ward:<?php echo $idara; ?></th></tr>
                      

                      
                      
                      
                         
                     </table>
                     <?php
                     fputcsv($filename, array($hospname));
                     fputcsv($filename, array($date_from,' TO ',$date_to));
                     fputcsv($filename, array($idara));
                     fputcsv($filename, array($company_names)); 
                    

                      
$purchasing_class=array('labtest','drug_list%','xray','dental','eye-service','minor_proc_op','surgical_op','service','supplies','supplies_laboratory');
$header=array('Date','LAB','DRUGS','XRAY','DENTAL','EYE','MINOR PROC','MAJOR PROC','CONS AND SERVICES','SUPPLIES','SUPPLIES LAB.','Total');
                      $start_date=date('d-m-Y',$date_from_timestamp);
                      $end_date=date('d-m-Y',$date_to_timestamp);

                      $begin= new DateTime($start_date);
                      $end= new DateTime($end_date);

                      $end=$end->modify('+1 day');

                      $interval=new DateInterval('P1D');

                      $daterange= new DatePeriod($begin,$interval,$end);
                    ?>
                       <table class="report" width="90%" border="1">
                    <?php   
                         //put headers
                    ?>
                          <tr>
                     <?php     
                         for ($i=0; $i <sizeof($header) ; $i++) {
                          ?>
                          <th><?php echo $header[$i]; ?></th>
                          <?php 
                            
                             
                         }
                         
                         fputcsv($filename,array('Date','LAB','DRUGS','XRAY','DENTAL','EYE','MINOR PROC','MAJOR PROC','CONS AND SERVICES','SUPPLIES','SUPPLIES LAB.','Total'));
                         ?>
                         </tr>
                         <?php
                         
                              
                     foreach($daterange as $date){ 
                     $horizontal='';



                     
                        
              ?>
                            <tr>            
              <?php           
                               
        
                               $tarehe=$date->format('Y-m-d');
                               $tarehe2=$date->format('d.m.Y');
                               
                                ?>
                                <td><?php echo $tarehe2;?></td>
                                <?php
                                //fputcsv($filename,array($tarehe2));
                                 $row_total=0;
                                 $column_total=0; 

                               for ($i=0; $i<sizeof($purchasing_class); $i++) {               

                                     
                                     
                                            $sql="SELECT SUM(bae.amount*bae.price) AS total
                                                     FROM care_tz_billing_archive_elem AS bae 
                                                     INNER JOIN care_tz_drugsandservices AS pricelist 
                                                     ON bae.item_number=pricelist.item_id 
                                                     WHERE pricelist.purchasing_class LIKE '".$purchasing_class[$i]."'  AND FROM_UNIXTIME(date_change,'%Y-%m-%d')='".$tarehe."' $in_out_patient $and_PayType
                                                      GROUP BY FROM_UNIXTIME(date_change,'%Y-%m-%d')";

                                                //echo $sql.'<br>';                  
                                               $result=$db->Execute($sql);
                                               $row=$result->FetchRow();

                                                $horizontal.=number_format($row['total']).'-'; 
                                    

                 ?>
                                           <td>
                                           <?php echo  number_format($row['total']) ?>                               
                                          
                                              
                                                                              
                                           
                                               
                                           </td>
                 <?php  

                                             


                                              
                                                //fputcsv($filename,array($horizontal));                    
                                     $row_total+=$row['total'];   
                                     
                                     switch ($purchasing_class[$i]) {
                                                       case 'labtest':
                                                       $total_lab+=$row['total'];
                                                           
                                                           break;
                                                        case substr($purchasing_class[$i], 0,9)==='drug_list':
                                                         $total_drugs+=$row['total'];
                                                         break;

                                                         case 'xray':
                                                         $total_xray+=$row['total'];
                                                         break;

                                                         case 'dental':
                                                         $total_dental+=$row['total'];
                                                         break;

                                                         case 'eye-service':
                                                         $total_eye_service+=$row['total'];
                                                         break;

                                                         case 'minor_proc_op':
                                                         $total_minor_proc_op+=$row['total'];
                                                         break;

                                                         case 'surgical_op':
                                                         $total_surgical_op+=$row['total'];
                                                         break;

                                                         case 'service':
                                                         $total_service+=$row['total'];
                                                         break;

                                                         case 'supplies':
                                                         $total_supplies+=$row['total'];
                                                         break;

                                                         case 'supplies_laboratory':
                                                         $total_lab_supplies+=$row['total'];




                                                       
                                                       default:
                                                           $total_other+=$row['total'];
                                                           break;
                                                   }              
                                         
                                        
                               }
                             
                       
                                       
                ?>
                                             <?php
                                              $array_csv=explode('-',$horizontal);
                                              fputcsv($filename,array($tarehe2,$array_csv[0],$array_csv[1],$array_csv[2],$array_csv[3],$array_csv[4],$array_csv[5],$array_csv[6],$array_csv[7],$array_csv[8],$array_csv[9],$row_total)).'<br>';

                                              ?>

                             <td><?php echo number_format($row_total); ?></td>
                             </tr>


                <?php    
                
                                       
                         
                        }


$sum_all=$total_lab+$total_drugs+$total_xray+$total_dental+$total_eye_service+$total_minor_proc_op+$total_surgical_op+$total_service+$total_supplies+$total_lab_supplies;
           

       
                    ?>       
<tr><td>TOTAL</td><td><?php echo number_format($total_lab);?></td><td><?php echo number_format($total_drugs)  ?></td><td><?php echo number_format($total_xray);?></td><td><?php echo number_format($total_dental); ?></td><td><?php echo number_format($total_eye_service) ;?></td>
<td><?php echo number_format($total_minor_proc_op);  ?></td><td><?php echo number_format($total_surgical_op);  ?></td><td><?php echo number_format($total_service);  ?></td><td><?php echo number_format($total_supplies);  ?></td><td><?php echo number_format($total_lab_supplies);  ?></td><td><?php echo number_format($sum_all); ?></td>
<?php fputcsv($filename, array('TOTAL',$total_lab,$total_drugs,$total_xray,$total_dental,$total_eye_service,$total_minor_proc_op,$total_surgical_op,$total_service,$total_supplies,$total_lab_supplies,$sum_all)); ?>
</tr>                      
                    </table>
                    <table>
                    <tr>
                        <td><a href="./gui/downloads/DailySummary.csv"><img border=0 src="../../gui/img/common/default/savedisk.gif"></a></td>
                    </tr>
                </table>
                       
                    <?php
                    fclose($filename);
                }


 //start services
                 function services($date_from, $date_to, $company, $admission, $dept = '', $insurance = '', $print = 0) {
                    //The detailed revenue function was written by Israel Pascal and modified by Mark Patrick
        //            $print = 1;
                    global $LDOther, $LDBilled_date, $LDAdmission_date, $LDPatient, $LDBirthDate, $LDSelianfilenumber, $LDMembership_NR, $LDForm_NR, $LDDescription, $LDGroup, $LDPrice, $LDRefund, $LDTopup, $LDDeposit;
                    global $LDLab, $LDDrugs, $LDRadilogy, $LDDental, $LDEye, $LDMinProc, $LDProcSurg, $LDServicesTotal, $LDPartCode, $LDConsum, $LDSuppliesLab, $LDtotal, $LDNA, $LDNoOfItems;
                    global $db;
                    $arr_date_from = explode("-", $date_from);
                    $arr_date_to = explode("-", $date_to);
                    $date_from_timestamp = mktime(00, 00, 00, $arr_date_from[1], $arr_date_from[2], $arr_date_from[0]);
                    $date_to_timestamp = mktime(23, 59, 59, $arr_date_to[1], $arr_date_to[2], $arr_date_to[0]);
                    $bill_obj = New Bill;

                    $in_out_patient = '';

                    if ($date_from <= '2016-03-20') {

                        switch ($admission) {
                            case 1:
                                if ($print) {
                                    $_POST['current_ward_nr'] = $dept;
                                }
                                if ($_POST['current_ward_nr'] == 'all_ipd') {
                                    $in_out_patient = ' AND ce.encounter_class_nr=1';
                                    $in_out_where = 'WHERE ce.encounter_class_nr=1';
                                    $idara="ALL-INPATIENT";

                                } else {
                                    $in_out_patient = ' AND ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                                    $in_out_where = 'WHERE ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                                    $sql_ward="SELECT name FROM care_ward WHERE nr=".$_POST['current_ward_nr'];
                                    $result_ward=$db->Execute($sql_ward);
                                    if($wardname_row=$result_ward->FetchRow()){
                                        $idara=$wardname_row['name'];
                                    }
                                }
                                break;
                            case 2:
                                if ($print) {
                                    $_POST['dept_nr'] = $dept;
                                }
                                if ($_POST['dept_nr'] == 'all_opd') {
                                    $in_out_patient = ' AND ce.encounter_class_nr=2';
                                    $in_out_where = 'WHERE ce.encounter_class_nr=2';
                                    $idara='ALL OUT-PATIENT';
                                } else {
                                    $in_out_patient = ' AND ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                                    $in_out_where = 'WHERE ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                                    $sql_dept="SELECT name_formal FROM care_department WHERE nr=". $_POST['dept_nr'];
                                    $result_dept=$db->Execute($sql_dept);
                                    if($deptname_row=$result_dept->FetchRow()){
                                        $idara=$deptname_row['name_formal'];

                                    }
                                }
                                break;
                            default:
                                $in_out_patient = '';
                                $in_out_where = '';
                                break;
                        }//end of switch  
                    } else {
                        switch ($admission) {
                            case 1:
                                if ($print) {
                                    $_POST['current_ward_nr'] = $dept;
                                }
                                if ($_POST['current_ward_nr'] == 'all_ipd') {
                                    $in_out_patient = ' AND bae.encounter_class_nr=1';
                                    $in_out_where = 'WHERE bae.encounter_class_nr=1';
                                    $idara="ALL-INPATIENT";
                                    

                                } else {
                                    $in_out_patient = ' AND bae.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                                    $in_out_where = 'WHERE bae.current_ward_nr=' . $_POST['current_ward_nr'];
                                    $sql_ward="SELECT name FROM care_ward WHERE nr=".$_POST['current_ward_nr'];
                                    $result_ward=$db->Execute($sql_ward);
                                    if($wardname_row=$result_ward->FetchRow()){
                                        $idara=$wardname_row['name'];

                                    }
                                }
                                break;
                            case 2:
                                if ($print) {
                                    $_POST['dept_nr'] = $dept;
                                }
                                if ($_POST['dept_nr'] == 'all_opd') {
                                    $in_out_patient = ' AND bae.encounter_class_nr=2';
                                    $in_out_where = 'WHERE bae.encounter_class_nr=2';
                                    $idara='ALL OUT-PATIENT';
                                } else {
                                    $in_out_patient = ' AND bae.current_dept_nr=' . $_POST['dept_nr'] . " ";
                                    $in_out_where = 'WHERE bae.current_dept_nr=' . $_POST['dept_nr'];
                                    $sql_dept="SELECT name_formal FROM care_department WHERE nr=". $_POST['dept_nr'];
                                    $result_dept=$db->Execute($sql_dept);
                                    if($deptname_row=$result_dept->FetchRow()){
                                        $idara=$deptname_row['name_formal'];

                                    }
                                }
                                break;
                            default:
                                $in_out_patient = '';
                                $in_out_where = '';
                                $idara='ALL OPD AND IPD';
                                break;
                        }//end of switch 
                    }

                    if ($print) {
                        $_POST['insurance'] = $insurance;
                    }
                    //echo $_POST['insurance']; 
                    switch ($_POST['insurance']) {
                        case -2:
                            $PayType = " insurance_id>=0 ";
                            $where_PayType = " WHERE bae.insurance_id>=0 ";
                            $and_PayType = " AND bae.insurance_id>=0 ";
                            break;

                        case -1:
                            $PayType = " insurance_id=0 ";
                            $where_PayType = " WHERE bae.insurance_id=0";
                            $and_PayType = " AND bae.insurance_id=0 ";
                            break;

                        default:
                            $PayType = " insurance_id=" . $_POST['insurance'];
                            $where_PayType = " WHERE bae.insurance_id=" . $_POST['insurance'];
                            $and_PayType = " AND bae.insurance_id=" . $_POST['insurance'] . " ";
        //                    $where_PayType_id = " WHERE id =" . $_POST['insurance'];
                            break;
                    }

                    //get company name
                    if ($_POST['insurance'] == -2) {
                        $company_names = 'ALL CUSTOMERS';
                    } else if ($_POST['insurance'] == -1) {
                        $company_names = 'CASH';
                    } else {
                        $company_name = "SELECT name FROM care_tz_company WHERE id = " . $_POST['insurance'] . " ";
                        $company_result = $db->Execute($company_name);
                        if ($company_row = $company_result->FetchRow()) {

                            $company_names = $company_row['name'];
                        }
                    }


                    
                     $sql_hospname="SELECT value FROM care_config_global WHERE type='main_info_address' ";
                     $result_hospname=$db->Execute($sql_hospname);
                     if($rows_hospname=$result_hospname->FetchRow()){
                        $hospname=$rows_hospname['value'];
                     }

                     $filename='';
                     $filename=fopen('./gui/downloads/DailySummary.csv', 'w');
                     ?>
                    
                     <?php
                     
                      $start_date=date('d-m-Y',$date_from_timestamp);
                      $end_date=date('d-m-Y',$date_to_timestamp);

                       $start_date_with_seconds=date('Y-m-d 00:00:00',$date_from_timestamp);
                      $end_date_with_seconds=date('Y-m-d 23:59:59',$date_to_timestamp);

                      $begin= new DateTime($start_date);
                      $end= new DateTime($end_date);

                      $end=$end->modify('+1 day');

                      $interval=new DateInterval('P1D');

                      $daterange= new DatePeriod($begin,$interval,$end);        


                     



                        
                       
                         //this  sql_headers will display column names.     

                         $sql_headers="SELECT (CASE WHEN bae.description LIKE 'CONS%' THEN 'CONS' WHEN bae.description LIKE 'BED%' THEN 'BED' ELSE bae.description END ) AS headers  FROM care_tz_billing_archive_elem as bae INNER JOIN care_tz_drugsandservices as pricelist ON pricelist.item_id=bae.item_number WHERE pricelist.purchasing_class='service' AND FROM_UNIXTIME(date_change)  BETWEEN '".$start_date_with_seconds."' AND '".$end_date_with_seconds."' $in_out_patient $and_PayType  GROUP BY headers";

                        // echo $sql_headers;
                       //end of query to display column names




                         

                         
                            echo '<table border=1 class="report" width="90%">'; 


                                                
                                          //start display column names   
                                           $result_headers=$db->Execute($sql_headers);
                                            
                             

                                         //end of column names
                                             
                                   echo '<tr>';
                                   echo '<th>Date</th>';
                                   $record_count=$result_headers->recordcount();
                                   $headers=array();
                                   while($row_header=$result_headers->FetchRow()){

                                           
                                    
                                    echo '<th>'.$row_header['headers'].'</th>';

                                         $headers[]=$row_header['headers'];

                                   }
                                   echo '</tr>';
                                   
                                   

                                  
                                    

                                    foreach ($daterange as $tarehe) {//START FOREACH LOOP
                                        $MysqlDateFormat=$tarehe->format('Y-m-d');
                                         $StandardDateFormat=$tarehe->format('d/m/Y');
                                         echo '<tr>';

                                         echo '<th>'.$StandardDateFormat.'</th>';

                                         //for loop to get the data for each date
                                         for($i=0; $i<$record_count; $i++){//START FOR LOOP
                                            //echo $headers[$i].'<br>';

                                              if($headers[$i]=='CONS'){
                                                $description="AND bae.description LIKE 'cons%'";

                                              }elseif ($headers[$i]=='BED') {
                                                $description="AND bae.description LIKE 'bed%'";
                                                  
                                              }else{

                                                $description="AND bae.description = '".$headers[$i]."'";


                                              }

                                              $this->result=$db->Execute("SELECT SUM(bae.amount * bae.price) AS TOTAL FROM care_tz_billing_archive_elem bae INNER JOIN care_tz_drugsandservices pricelist ON bae.item_number=pricelist.item_id WHERE pricelist.purchasing_class='service' AND FROM_UNIXTIME(date_change, '%Y-%m-%d')='".$MysqlDateFormat."' $description $in_out_patient $and_PayType  ");


                                              $rowdata=$this->result->FetchRow();

                                              echo '<td>'.number_format($rowdata['TOTAL']).'</td>';


                                            //TOTAL FOR ROWS
                                              $TOTAL+=$rowdata['TOTAL'];



                                         }//END FOR LOOP



                                        // echo '<td>'.$TOTAL.'</td>';






                                        
                                    }//END FOREACH
                                   
                                   

                                   

                                   echo '</tr>';

                                   echo '</table>';                 

                           

                    
                    
                       
                       
                       
                       
                   
                        

                        
        
                               
                        
                                     
                        
                }

 //end services                

//===================================================================
                function cons_and_services($date_from, $date_to, $company, $admission, $dept = '', $insurance = '', $print = 0) {
                    //The detailed revenue function was written by Israel Pascal and modified by Mark Patrick
        //            $print = 1;
                    global $LDOther, $LDBilled_date, $LDAdmission_date, $LDPatient, $LDBirthDate, $LDSelianfilenumber, $LDMembership_NR, $LDForm_NR, $LDDescription, $LDGroup, $LDPrice, $LDRefund, $LDTopup, $LDDeposit;
                    global $LDLab, $LDDrugs, $LDRadilogy, $LDDental, $LDEye, $LDMinProc, $LDProcSurg, $LDServicesTotal, $LDPartCode, $LDConsum, $LDSuppliesLab, $LDtotal, $LDNA, $LDNoOfItems;
                    global $db;
                    $arr_date_from = explode("-", $date_from);
                    $arr_date_to = explode("-", $date_to);
                    $date_from_timestamp = mktime(00, 00, 00, $arr_date_from[1], $arr_date_from[2], $arr_date_from[0]);
                    $date_to_timestamp = mktime(23, 59, 59, $arr_date_to[1], $arr_date_to[2], $arr_date_to[0]);
                    $bill_obj = New Bill;

                    $in_out_patient = '';

                    if ($date_from <= '2016-03-20') {

                        switch ($admission) {
                            case 1:
                                if ($print) {
                                    $_POST['current_ward_nr'] = $dept;
                                }
                                if ($_POST['current_ward_nr'] == 'all_ipd') {
                                    $in_out_patient = ' AND ce.encounter_class_nr=1';
                                    $in_out_where = 'WHERE ce.encounter_class_nr=1';
                                    $idara="ALL-INPATIENT";

                                } else {
                                    $in_out_patient = ' AND ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                                    $in_out_where = 'WHERE ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                                    $sql_ward="SELECT name FROM care_ward WHERE nr=".$_POST['current_ward_nr'];
                                    $result_ward=$db->Execute($sql_ward);
                                    if($wardname_row=$result_ward->FetchRow()){
                                        $idara=$wardname_row['name'];
                                    }
                                }
                                break;
                            case 2:
                                if ($print) {
                                    $_POST['dept_nr'] = $dept;
                                }
                                if ($_POST['dept_nr'] == 'all_opd') {
                                    $in_out_patient = ' AND ce.encounter_class_nr=2';
                                    $in_out_where = 'WHERE ce.encounter_class_nr=2';
                                    $idara='ALL OUT-PATIENT';
                                } else {
                                    $in_out_patient = ' AND ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                                    $in_out_where = 'WHERE ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                                    $sql_dept="SELECT name_formal FROM care_department WHERE nr=". $_POST['dept_nr'];
                                    $result_dept=$db->Execute($sql_dept);
                                    if($deptname_row=$result_dept->FetchRow()){
                                        $idara=$deptname_row['name_formal'];

                                    }
                                }
                                break;
                            default:
                                $in_out_patient = '';
                                $in_out_where = '';
                                break;
                        }//end of switch  
                    } else {
                        switch ($admission) {
                            case 1:
                                if ($print) {
                                    $_POST['current_ward_nr'] = $dept;
                                }
                                if ($_POST['current_ward_nr'] == 'all_ipd') {
                                    $in_out_patient = ' AND bae.encounter_class_nr=1';
                                    $in_out_where = 'WHERE bae.encounter_class_nr=1';
                                    $idara="ALL-INPATIENT";
                                    

                                } else {
                                    $in_out_patient = ' AND bae.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                                    $in_out_where = 'WHERE bae.current_ward_nr=' . $_POST['current_ward_nr'];
                                    $sql_ward="SELECT name FROM care_ward WHERE nr=".$_POST['current_ward_nr'];
                                    $result_ward=$db->Execute($sql_ward);
                                    if($wardname_row=$result_ward->FetchRow()){
                                        $idara=$wardname_row['name'];

                                    }
                                }
                                break;
                            case 2:
                                if ($print) {
                                    $_POST['dept_nr'] = $dept;
                                }
                                if ($_POST['dept_nr'] == 'all_opd') {
                                    $in_out_patient = ' AND bae.encounter_class_nr=2';
                                    $in_out_where = 'WHERE bae.encounter_class_nr=2';
                                    $idara='ALL OUT-PATIENT';
                                } else {
                                    $in_out_patient = ' AND bae.current_dept_nr=' . $_POST['dept_nr'] . " ";
                                    $in_out_where = 'WHERE bae.current_dept_nr=' . $_POST['dept_nr'];
                                    $sql_dept="SELECT name_formal FROM care_department WHERE nr=". $_POST['dept_nr'];
                                    $result_dept=$db->Execute($sql_dept);
                                    if($deptname_row=$result_dept->FetchRow()){
                                        $idara=$deptname_row['name_formal'];

                                    }
                                }
                                break;
                            default:
                                $in_out_patient = '';
                                $in_out_where = '';
                                $idara='ALL OPD AND IPD';
                                break;
                        }//end of switch 
                    }

                    if ($print) {
                        $_POST['insurance'] = $insurance;
                    }
                    //echo $_POST['insurance']; 
                    switch ($_POST['insurance']) {
                        case -2:
                            $PayType = " insurance_id>=0 ";
                            $where_PayType = " WHERE bae.insurance_id>=0 ";
                            $and_PayType = " AND bae.insurance_id>=0 ";
                            break;

                        case -1:
                            $PayType = " insurance_id=0 ";
                            $where_PayType = " WHERE bae.insurance_id=0";
                            $and_PayType = " AND bae.insurance_id=0 ";
                            break;

                        default:
                            $PayType = " insurance_id=" . $_POST['insurance'];
                            $where_PayType = " WHERE bae.insurance_id=" . $_POST['insurance'];
                            $and_PayType = " AND bae.insurance_id=" . $_POST['insurance'] . " ";
        //                    $where_PayType_id = " WHERE id =" . $_POST['insurance'];
                            break;
                    }

                    //get company name
                    if ($_POST['insurance'] == -2) {
                        $company_names = 'ALL CUSTOMERS';
                    } else if ($_POST['insurance'] == -1) {
                        $company_names = 'CASH';
                    } else {
                        $company_name = "SELECT name FROM care_tz_company WHERE id = " . $_POST['insurance'] . " ";
                        $company_result = $db->Execute($company_name);
                        if ($company_row = $company_result->FetchRow()) {

                            $company_names = $company_row['name'];
                        }
                    }


                    
                     $sql_hospname="SELECT value FROM care_config_global WHERE type='main_info_address' ";
                     $result_hospname=$db->Execute($sql_hospname);
                     if($rows_hospname=$result_hospname->FetchRow()){
                        $hospname=$rows_hospname['value'];
                     }

                     $filename='';
                     $filename=fopen('./gui/downloads/DailySummary.csv', 'w');
                     ?>
                     <table>
                     <tr><th><?php echo $hospname;?><br>Report Date:  <?php echo $date_from;?> To:  <?php echo $date_to;?><br>Health Fund:<?php echo $company_names;?><br>Dept/ward:<?php echo $idara; ?></th></tr>
                      

                      
                      
                      
                         
                     </table>
                     <?php
                     fputcsv($filename, array($hospname));
                     fputcsv($filename, array($date_from,' TO ',$date_to));
                     fputcsv($filename, array($idara));
                     fputcsv($filename, array($company_names)); 
                    

                      
$purchasing_class=array('labtest','drug_list%','xray','dental','eye-service','minor_proc_op','surgical_op','service','supplies','supplies_laboratory');
$header=array('Date','LAB','DRUGS','XRAY','DENTAL','EYE','MINOR PROC','MAJOR PROC','CONS AND SERVICES','SUPPLIES','SUPPLIES LAB.','Total');
                      $start_date=date('d-m-Y',$date_from_timestamp);
                      $end_date=date('d-m-Y',$date_to_timestamp);

                      $begin= new DateTime($start_date);
                      $end= new DateTime($end_date);

                      $end=$end->modify('+1 day');

                      $interval=new DateInterval('P1D');

                      $daterange= new DatePeriod($begin,$interval,$end);
                    ?>
                       <table class="report" width="90%" border="1">
                    <?php   
                         //put headers
                    ?>
                          <tr>
                     <?php     
                         for ($i=0; $i <sizeof($header) ; $i++) {
                          ?>
                          <th><?php echo $header[$i]; ?></th>
                          <?php 
                            
                             
                         }
                         
                         fputcsv($filename,array('Date','LAB','DRUGS','XRAY','DENTAL','EYE','MINOR PROC','MAJOR PROC','CONS AND SERVICES','SUPPLIES','SUPPLIES LAB.','Total'));
                         ?>
                         </tr>
                         <?php
                         
                              
                     foreach($daterange as $date){ 
                     $horizontal='';



                     
                        
              ?>
                            <tr>            
              <?php           
                               
        
                               $tarehe=$date->format('Y-m-d');
                               $tarehe2=$date->format('d.m.Y');
                               
                                ?>
                                <td><?php echo $tarehe2;?></td>
                                <?php
                                //fputcsv($filename,array($tarehe2));
                                 $row_total=0;
                                 $column_total=0; 

                               for ($i=0; $i<sizeof($purchasing_class); $i++) {               

                                     
                                     
                                            $sql="SELECT SUM(bae.amount*bae.price) AS total
                                                     FROM care_tz_billing_archive_elem AS bae 
                                                     INNER JOIN care_tz_drugsandservices AS pricelist 
                                                     ON bae.item_number=pricelist.item_id 
                                                     WHERE pricelist.purchasing_class LIKE '".$purchasing_class[$i]."'  AND FROM_UNIXTIME(date_change,'%Y-%m-%d')='".$tarehe."' $in_out_patient $and_PayType
                                                      GROUP BY FROM_UNIXTIME(date_change,'%Y-%m-%d')";

                                                //echo $sql.'<br>';                  
                                               $result=$db->Execute($sql);
                                               $row=$result->FetchRow();

                                                $horizontal.=number_format($row['total']).'-'; 
                                    

                 ?>
                                           <td>
                                           <?php echo  number_format($row['total']) ?>                               
                                          
                                              
                                                                              
                                           
                                               
                                           </td>
                 <?php  

                                             


                                              
                                                //fputcsv($filename,array($horizontal));                    
                                     $row_total+=$row['total'];   
                                     
                                     switch ($purchasing_class[$i]) {
                                                       case 'labtest':
                                                       $total_lab+=$row['total'];
                                                           
                                                           break;
                                                        case substr($purchasing_class[$i], 0,9)==='drug_list':
                                                         $total_drugs+=$row['total'];
                                                         break;

                                                         case 'xray':
                                                         $total_xray+=$row['total'];
                                                         break;

                                                         case 'dental':
                                                         $total_dental+=$row['total'];
                                                         break;

                                                         case 'eye-service':
                                                         $total_eye_service+=$row['total'];
                                                         break;

                                                         case 'minor_proc_op':
                                                         $total_minor_proc_op+=$row['total'];
                                                         break;

                                                         case 'surgical_op':
                                                         $total_surgical_op+=$row['total'];
                                                         break;

                                                         case 'service':
                                                         $total_service+=$row['total'];
                                                         break;

                                                         case 'supplies':
                                                         $total_supplies+=$row['total'];
                                                         break;

                                                         case 'supplies_laboratory':
                                                         $total_lab_supplies+=$row['total'];




                                                       
                                                       default:
                                                           $total_other+=$row['total'];
                                                           break;
                                                   }              
                                         
                                        
                               }
                             
                       
                                       
                ?>
                                             <?php
                                              $array_csv=explode('-',$horizontal);
                                              fputcsv($filename,array($tarehe2,$array_csv[0],$array_csv[1],$array_csv[2],$array_csv[3],$array_csv[4],$array_csv[5],$array_csv[6],$array_csv[7],$array_csv[8],$array_csv[9],$row_total)).'<br>';

                                              ?>

                             <td><?php echo number_format($row_total); ?></td>
                             </tr>


                <?php    
                
                                       
                         
                        }


$sum_all=$total_lab+$total_drugs+$total_xray+$total_dental+$total_eye_service+$total_minor_proc_op+$total_surgical_op+$total_service+$total_supplies+$total_lab_supplies;
           

       
                    ?>       
<tr><td>TOTAL</td><td><?php echo number_format($total_lab);?></td><td><?php echo number_format($total_drugs)  ?></td><td><?php echo number_format($total_xray);?></td><td><?php echo number_format($total_dental); ?></td><td><?php echo number_format($total_eye_service) ;?></td>
<td><?php echo number_format($total_minor_proc_op);  ?></td><td><?php echo number_format($total_surgical_op);  ?></td><td><?php echo number_format($total_service);  ?></td><td><?php echo number_format($total_supplies);  ?></td><td><?php echo number_format($total_lab_supplies);  ?></td><td><?php echo number_format($sum_all); ?></td>
<?php fputcsv($filename, array('TOTAL',$total_lab,$total_drugs,$total_xray,$total_dental,$total_eye_service,$total_minor_proc_op,$total_surgical_op,$total_service,$total_supplies,$total_lab_supplies,$sum_all)); ?>
</tr>                      
                    </table>
                    <table>
                    <tr>
                        <td><a href="./gui/downloads/DailySummary.csv"><img border=0 src="../../gui/img/common/default/savedisk.gif"></a></td>
                    </tr>
                </table>
                       
                    <?php
                    fclose($filename);
                }


//=====================================================================       



        function MtuhaDiagnosisBlocks($nr, $companies) {
            /*
              This function was written by Israel Pascal
              ELCT e-Health Unit
              Arusha Tanzania
              9th DEC 2015
              israel.pascal10@gmail.com
              israel@elct.or.tz
              +255767809660
             */
            global $db, $LDDateFrom, $LDDateTo, $root_path, $LDShow, $date_format;

            if (isset($_POST['show']) || !empty($_POST['show'])) {

                if ($_POST['date_from'] <= $_POST['date_to']) {
                    if (isset($_POST['admission_id']) || !empty($_POST['admission_id'])) {
                        if ($_POST['admission_id'] == 'all_opd_ipd') {
                            //all opd and ipd 
                            $dept_ward = '';
                            $ward_dept_name = 'ALL INPATIENT AND OUTPATIENT';
                        } else {
                            if ($_POST['admission_id'] == 1) {
                                //ipd
                                switch ($_POST['current_ward_nr']) {
                                    case 'all_ipd':
                                        $dept_ward = ' AND current_ward_nr>0 ';
                                        $ward_dept_name = 'ALL INPATIENT';
                                        break;
                                    default:
                                        $dept_ward = ' AND current_ward_nr=' . $_POST['current_ward_nr'];
                                        $sql_ward_name = "SELECT name FROM care_ward WHERE nr=" . $_POST['current_ward_nr'];
                                        $result_ward_name = $db->Execute($sql_ward_name);
                                        $in_out_name = $result_ward_name->FetchRow();
                                        $ward_dept_name = $in_out_name['name'];
                                }
                            } else {
                                //opd
                                switch ($_POST['dept_nr']) {
                                    case 'all_opd':
                                        $dept_ward = ' AND current_dept_nr>0 ';
                                        $ward_dept_name = 'ALL OUTPATIENT';
                                        break;
                                    default:
                                        $dept_ward = ' AND current_dept_nr=' . $_POST['dept_nr'];
                                        $sql_dept_name = "SELECT name_formal FROM care_department WHERE nr=" . $_POST['dept_nr'];
                                        $result_dept_name = $db->Execute($sql_dept_name);
                                        $dept_name = $result_dept_name->FetchRow();
                                        $ward_dept_name = $dept_name['name_formal'];
                                }
                            }
                        }//end dept ward validation
                        $error = false;
                        for ($i = 1; $i <= $_POST['blocks']; $i++) {

                            if ($_POST['start' . $i] > $_POST['end' . $i] || $_POST['start' . $i] == '' || $_POST['end' . $i] == '') {
                                $error = true;
                                $message = "ERROR! MAKE SURE INPUT BOX ARE NOT EMPTY AND START AGE IS LESS OR EQUAL TO END AGE";
                            }
                        }//end for loop
                        if (!$error) {
                            //query database
                            $DateFromArray = explode('/', $_POST['date_from']);
                            $DateToArray = explode('/', $_POST['date_to']);
                            $DateStampFrom = mktime(00, 00, 00, $DateFromArray[1], $DateFromArray[0], $DateFromArray[2]);
                            $DateStampTo = mktime(23, 59, 59, $DateToArray[1], $DateToArray[0], $DateToArray[2]);

                            switch ($_POST['insurance']) {
                                case -2:
                                    $cash_credit = '';
                                    $health_fund = 'ALL';
                                    break;

                                case -1:
                                    $cash_credit = " AND insurance_ID=13";
                                    $health_fund = "CASH PATIENT";
                                    break;

                                default:
                                    $cash_credit = " AND insurance_ID=" . $_POST['insurance'];
                                    $sql_insurancename = "SELECT name FROM care_tz_company where id=" . $_POST['insurance'];
                                    $insurance_name = $db->Execute($sql_insurancename);
                                    $sql_insurancename = $insurance_name->FetchRow();
                                    $health_fund = $sql_insurancename['name'];
                            }

                            //Call all diagnosises based on specified date and department/ward
                            $sql_diag = "CREATE TEMPORARY TABLE IF NOT EXISTS AllDiagTmp AS 
							   (SELECT diag.*,current_dept_nr,current_ward_nr,(DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT( cp.date_birth, '%Y' )) AS birth_date,cp.sex,cp.death_encounter_nr 
							   FROM care_tz_diagnosis AS diag 
							   INNER JOIN care_encounter AS ce 
							   ON diag.encounter_nr=ce.encounter_nr 
							   INNER JOIN care_person AS cp ON cp.pid=ce.pid 
							   WHERE timestamp BETWEEN '" . $DateStampFrom . "' AND '" . $DateStampTo . "' " . $dept_ward . " " . $cash_credit . " )";









                            $result_tmp = $db->Execute($sql_diag);
                            $sql_grp = "SELECT ICD_10_code,ICD_10_description FROM AllDiagTmp GROUP BY ICD_10_code";
                            $result_grp = $db->Execute($sql_grp);

                            $TABLE2 = '';
                            $TABLE2.='<TR>';

                            $filename_mtuha = fopen('./gui/downloads/mtuha_detailed.csv', 'w');

                            while ($rows_tmp = $result_grp->FetchRow()) {



                                $TABLE2.='<TR><TD>' . $rows_tmp['ICD_10_description'] . '</TD><TD>' . $rows_tmp['ICD_10_code'] . '</TD>';

                                //echo $rows_tmp['ICD_10_description'].'<br>';

                                $pair = $_POST['blocks'];
                                for ($i = 1; $i <= $pair; $i++) {
                                    $row_cases_female['total_female'] = 0;
                                    $row_cases_male['total_male'] = 0;
                                    $row_deaths_male['total_male'] = 0;
                                    $row_deaths_female['total_female'] = 0;
                                    $row_newp_male['total_male'] = 0;
                                    $row_newp_female['total_female'] = 0;
                                    $row_new_case_male['total_male'] = 0;
                                    $row_new_case_female['total_female'] = 0;
                                    $row_revisit_male['total_male'] = 0;
                                    $row_revisit_female['total_female'] = 0;

                                    //CASES MALE AND FEMALE
                                    $sql_cases_male = "SELECT count(*) AS total_male FROM AllDiagTmp WHERE birth_date BETWEEN " . $_POST['start' . $i] . " AND " . $_POST['end' . $i] . " AND sex='m' AND ICD_10_code='" . $rows_tmp['ICD_10_code'] . "' ";
                                    $sql_cases_female = "SELECT count(*) AS total_female FROM AllDiagTmp WHERE birth_date BETWEEN " . $_POST['start' . $i] . " AND " . $_POST['end' . $i] . " AND sex='f' AND ICD_10_code='" . $rows_tmp['ICD_10_code'] . "' ";

                                    //DEATHS MALE AND FEMALE
                                    $sql_deaths_male = "SELECT count(*) AS total_male FROM AllDiagTmp WHERE birth_date BETWEEN " . $_POST['start' . $i] . " AND " . $_POST['end' . $i] . " AND sex='m' AND ICD_10_code='" . $rows_tmp['ICD_10_code'] . "' AND death_encounter_nr>0 ";
                                    $sql_deaths_female = "SELECT count(*) AS total_female FROM AllDiagTmp WHERE birth_date BETWEEN " . $_POST['start' . $i] . " AND " . $_POST['end' . $i] . " AND sex='f' AND ICD_10_code='" . $rows_tmp['ICD_10_code'] . "' AND death_encounter_nr>0 ";

                                    //NEW PATIENT MALE AND FEMALE
                                    $sql_newp_male = "SELECT count(*) AS total_male FROM AllDiagTmp WHERE birth_date BETWEEN " . $_POST['start' . $i] . " AND " . $_POST['end' . $i] . " AND sex='m' AND ICD_10_code='" . $rows_tmp['ICD_10_code'] . "' AND type like '%patient' ";
                                    $sql_newp_female = "SELECT count(*) AS total_female FROM AllDiagTmp WHERE birth_date BETWEEN " . $_POST['start' . $i] . " AND " . $_POST['end' . $i] . " AND sex='f' AND ICD_10_code='" . $rows_tmp['ICD_10_code'] . "' AND type like '%patient' ";

                                    //NEW CASE MALE AND FEMALE
                                    $sql_new_case_male = "SELECT count(*) AS total_male FROM AllDiagTmp WHERE birth_date BETWEEN " . $_POST['start' . $i] . " AND " . $_POST['end' . $i] . " AND sex='m' AND ICD_10_code='" . $rows_tmp['ICD_10_code'] . "' AND type='new' ";
                                    $sql_new_case_female = "SELECT count(*) AS total_female FROM AllDiagTmp WHERE birth_date BETWEEN " . $_POST['start' . $i] . " AND " . $_POST['end' . $i] . " AND sex='f' AND ICD_10_code='" . $rows_tmp['ICD_10_code'] . "' AND type='new' ";

                                    //REVISIT MALE AND FEMALE
                                    $sql_revisit_male = "SELECT count(*) AS total_male FROM AllDiagTmp WHERE birth_date BETWEEN " . $_POST['start' . $i] . " AND " . $_POST['end' . $i] . " AND sex='m' AND ICD_10_code='" . $rows_tmp['ICD_10_code'] . "' AND type='revisit' ";
                                    $sql_revisit_female = "SELECT count(*) AS total_female FROM AllDiagTmp WHERE birth_date BETWEEN " . $_POST['start' . $i] . " AND " . $_POST['end' . $i] . " AND sex='f' AND ICD_10_code='" . $rows_tmp['ICD_10_code'] . "' AND type='revisit' ";

                                    $result_cases_male = $db->Execute($sql_cases_male);
                                    $result_cases_female = $db->Execute($sql_cases_female);

                                    $result_deaths_male = $db->Execute($sql_deaths_male);
                                    $result_deaths_female = $db->Execute($sql_deaths_female);

                                    $result_newp_male = $db->Execute($sql_newp_male);
                                    $result_newp_female = $db->Execute($sql_newp_female);

                                    $result_new_case_male = $db->Execute($sql_new_case_male);
                                    $result_new_case_female = $db->Execute($sql_new_case_female);

                                    $result_revisit_male = $db->Execute($sql_revisit_male);
                                    $result_revisit_female = $db->Execute($sql_revisit_female);

                                    $row_cases_male = $result_cases_male->FetchRow();
                                    $row_cases_female = $result_cases_female->FetchRow();

                                    $row_deaths_male = $result_deaths_male->FetchRow();
                                    $row_deaths_female = $result_deaths_female->FetchRow();

                                    $row_newp_male = $result_newp_male->FetchRow();
                                    $row_newp_female = $result_newp_female->FetchRow();

                                    $row_new_case_male = $result_new_case_male->FetchRow();
                                    $row_new_case_female = $result_new_case_female->FetchRow();

                                    $row_revisit_male = $result_revisit_male->FetchRow();
                                    $row_revisit_female = $result_revisit_female->FetchRow();

                                    $total_cases_male_female = $row_cases_male['total_male'] + $row_cases_female['total_female'];
                                    $total_deaths_male_female = $row_deaths_male['total_male'] + $row_deaths_female['total_female'];
                                    $total_newp_male_female = $row_newp_male['total_male'] + $row_newp_female['total_female'];
                                    $total_new_case_male_female = $row_new_case_male['total_male'] + $row_new_case_female['total_female'];
                                    $total_revisit_male_female = $row_revisit_male['total_male'] + $row_revisit_female['total_female'];

                                    $TABLE2.='<TD BGCOLOR=#99CCFF>' . $row_cases_male['total_male'] . '</TD><TD BGCOLOR=#99CCFF>' . $row_cases_female['total_female'] . '</TD><TD BGCOLOR=#99CCFF>' . $total_cases_male_female . '</TD>
        <TD>' . $row_deaths_male['total_male'] . '</TD><TD>' . $row_deaths_female['total_female'] . '</TD><TD>' . $total_deaths_male_female . '</TD><TD BGCOLOR=#99CCFF>' . $row_newp_male['total_male'] . '</TD><TD BGCOLOR=#99CCFF>' . $row_newp_female['total_female'] . '</TD><TD BGCOLOR=#99CCFF>' . $total_newp_male_female . '</TD><TD>' . $row_new_case_male['total_male'] . '</TD><TD>' . $row_new_case_female['total_female'] . '</TD><TD>' . $total_new_case_male_female . '</TD><TD BGCOLOR=#99CCFF>' . $row_revisit_male['total_male'] . '</TD><TD BGCOLOR=#99CCFF>' . $row_revisit_female['total_female'] . '</TD><TD BGCOLOR=#99CCFF>' . $total_revisit_male_female . '</TD>';


                                    fputcsv($filename_mtuha, array($row_cases_male['total_male'], $row_cases_female['total_female'], $total_cases_male_female, $row_deaths_male['total_male'], $row_deaths_female['total_female'], $total_deaths_male_female, $row_newp_male['total_male'], $row_newp_female['total_female'], $total_newp_male_female, $row_new_case_male['total_male'], $row_new_case_female['total_female'], $total_new_case_male_female, $row_revisit_male['total_male'], $row_revisit_female['total_female'], $total_revisit_male_female));
                                }





















                                $TABLE2.='</TR>';
                            }
                        } else {
                            echo $message;
                        }
                    }//end admission_id validation
                }//end date validation
            }//end show
            ?>
            <form name="form1" method="post" action="" onsubmit="return inputvalue()">
                <table width="100%" border="0" align="center">
                    <tr>
                        <td><?php echo $LDDateFrom; ?><input name="date_from" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_from'] ?>">
                            <a href="javascript:show_calendar('form1.date_from','<?php echo $date_format ?>')">
                                <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>


                            <?php echo $LDDateTo; ?>
                            <input name="date_to" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_to'] ?>" >
                            <a href="javascript:show_calendar('form1.date_to','<?php echo $date_format ?>')">
                                <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>
                            <font size=1>[dd/mm/yyyy]

                            <?php echo $companies; ?>  
                            <select name="admission_id" id="admission_id" onChange="javascript:popdepts()">
                                <OPTION selected value="all_opd_ipd" >All</OPTION>
                                <OPTION value="2">Outpatient</OPTION>
                                <OPTION value="1">Inpatient</OPTION>
                                <input type="submit" name="show" value="<?php echo $LDShow; ?>">
                            </select>

                            <div id="dept">all_opd_ipd</div>




                        </td>
                    </tr>

                </table>


                <?php
                $TABLE = '<TABLE BORDER=0 CELLPADDING=4 class="report">';
                $TABLE.="<input type=\"hidden\" name=\"blocks\" id=\"blocks\" value=\"$nr\">";
                $TABLE.="<tr bgcolor='#cccccc'><td>Date:</td><td colspan=2>From:" . $_POST['date_from'] . " TO: " . $_POST['date_to'] . "</td><td colspan=6>Health Fund:" . $health_fund . "</td><td colspan=8>Dept_ward:" . $ward_dept_name . "</td></tr>";


                //for($k=1; $k<=3; $k++){
                $TABLE.='<TR><td></td><td></td>';
                for ($i = 1; $i <= $nr; $i++) {

                    $start = $_POST['start' . $i];
                    $end = $_POST['end' . $i];

                    $TABLE.="<TH COLSPAN=15 >AGE: FROM<input size=\"3\" type=\"text\" name=\"start$i\" id=\"start$i\"  value=\"$start\"   >TO<input size=\"3\" type=\"text\" name=\"end$i\" id=\"end$i\" value=\"$end\" onchange=\"ValidateAge($i)\" ></TH>";
                }
                $TABLE.='</TR><TR><td></td><td></td>';
                for ($i = 1; $i <= $nr; $i++) {
                    $TABLE.='<TD colspan=3 BGCOLOR=#99CCFF>CASES</TD><TD colspan=3>DEATHS</TD><TD colspan=3 BGCOLOR=#99CCFF>NEW PATIENT</TD><TD colspan=3>NEW CASE</TD><TD colspan=3 BGCOLOR=#99CCFF>REVISIT</TD>';
                }
                $TABLE.='</TR><TR><td>Diagnosis Name</td><td>ICD10 Code</td>';
                for ($i = 1; $i <= $nr; $i++) {
                    $TABLE.='<TD BGCOLOR=#99CCFF>M</TD><TD BGCOLOR=#99CCFF>F</TD><TD BGCOLOR=#99CCFF>TOTAL</TD>
        <TD>M</TD><TD>F</TD><TD>TOTAL</TD><TD BGCOLOR=#99CCFF>M</TD><TD BGCOLOR=#99CCFF>F</TD><TD BGCOLOR=#99CCFF>TOTAL</TD><TD>M</TD><TD>F</TD><TD>TOTAL</TD><TD BGCOLOR=#99CCFF>M</TD><TD BGCOLOR=#99CCFF>F</TD><TD BGCOLOR=#99CCFF>TOTAL</TD>';
                }

                $TABLE.='</TR>';

                //}



                $TABLE.=$TABLE2;
                $TABLE.='</table>';
                echo $TABLE;
                ?>
                <table>
                    <tr>
                        <td><a href="./gui/downloads/mtuha_detailed.csv"><img border=0 src="../../gui/img/common/default/savedisk.gif"></a></td>
                    </tr>
                </table>

            </form>		
            <?php
//*******************************************************************************************


            fclose($filename_mtuha);
        }

//end mtuha diagnosis blocks  

        function lab_detailed($nr = '') {
            /*
              This function was written by Israel Pascal
              ELCT e-Health Unit
              Arusha Tanzania
              9th DEC 2015
              israel.pascal10@gmail.com
              israel@elct.or.tz
              +255767809660
             */
            global $db, $LDDateFrom, $LDDateTo, $root_path, $LDShow, $date_format;




            if (isset($_POST['show']) || !empty($_POST['show'])) {


                if ($_POST['date_from'] <= $_POST['date_to']) {
                    if (isset($_POST['admission_id']) || !empty($_POST['admission_id'])) {
                        if ($_POST['admission_id'] == 'all_opd_ipd') {
                            //all opd and ipd 
                            $dept_ward = '';
                            $in_out_p = 'IN AND OUT PATIENT';
                        } else {
                            if ($_POST['admission_id'] == 1) {
                                //ipd
                                switch ($_POST['current_ward_nr']) {
                                    case 'all_ipd':
                                        $dept_ward = ' AND current_ward_nr>0';
                                        $in_out_p = 'ALL INPATIENT';
                                        break;
                                    default:
                                        $dept_ward = ' AND current_ward_nr=' . $_POST['current_ward_nr'];
                                        $sql_ward_name = "SELECT name FROM care_ward WHERE nr=" . $_POST['current_ward_nr'];
                                        $result_ward_name = $db->Execute($sql_ward_name);
                                        $in_out_name = $result_ward_name->FetchRow();
                                        $in_out_p = $in_out_name['name'];
                                }
                            } else {
                                //opd
                                switch ($_POST['dept_nr']) {
                                    case 'all_opd':
                                        $dept_ward = ' AND current_dept_nr>0';
                                        $in_out_p = "ALL OUT PATIENT";
                                        break;
                                    default:
                                        $dept_ward = ' AND current_dept_nr=' . $_POST['dept_nr'];
                                        $sql_dept_name = "SELECT name_formal FROM care_department WHERE nr=" . $_POST['dept_nr'];
                                        $result_dept_name = $db->Execute($sql_dept_name);
                                        $dept_name = $result_dept_name->FetchRow();
                                        $in_out_p = $dept_name['name_formal'];
                                }
                            }
                        }//end dept ward validation
                        $error = false;
                        for ($i = 1; $i <= $_POST['blocks']; $i++) {

                            if ($_POST['start' . $i] > $_POST['end' . $i] || $_POST['start' . $i] == '' || $_POST['end' . $i] == '') {
                                $error = true;
                                $message = "ERROR! MAKE SURE INPUT BOX ARE NOT EMPTY AND START AGE IS LESS OR EQUAL TO END AGE";
                            }
                        }//end for loop
                        if (!$error) {
                            //query database
                            $DateFromArray = explode('/', $_POST['date_from']);
                            $DateToArray = explode('/', $_POST['date_to']);
                            $DateStampFrom = mktime(00, 00, 00, $DateFromArray[1], $DateFromArray[0], $DateFromArray[2]);
                            $DateStampTo = mktime(23, 59, 59, $DateToArray[1], $DateToArray[0], $DateToArray[2]);
                            $mysql_date_from = date('Y-m-d H:i:s', $DateStampFrom);
                            $mysql_date_to = date('Y-m-d H:i:s', $DateStampTo);


                            $sql_lab = "CREATE TEMPORARY TABLE IF NOT EXISTS AllLabTmp AS
							             (SELECT distinct chemsub.`paramater_name`,CASE WHEN chemsub.`parameter_value` LIKE '%pos%' THEN 'positive' ELSE 'negative' END AS result,chemsub.create_time, cp.selian_pid, chemsub.`encounter_nr`,cp.`sex`, DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT(cp.date_birth,'%Y') AS age
							                FROM `care_test_findings_chemlabor_sub` AS chemsub INNER JOIN care_encounter AS ce ON ce.encounter_nr=chemsub.encounter_nr \n"
                                    . "INNER JOIN 
                                    care_person AS cp ON cp.pid=ce.pid WHERE chemsub.`parameter_value` REGEXP 'pos|neg' AND chemsub.create_time BETWEEN '" . $mysql_date_from . "' AND '" . $mysql_date_to . "'" . $dept_ward . ")";

                            //echo $sql_lab;              							   

                            $result_lab = $db->Execute($sql_lab);
                            $sql_lab_group = "SELECT paramater_name, result FROM AllLabTmp GROUP BY paramater_name ";

                            $result_lab_group = $db->Execute($sql_lab_group);

                            $TABLE2 = '';
                            $TABLE2.='<TR>';


                            while ($rows_lab_group = $result_lab_group->FetchRow()) {

                                $total_male_female = 0;



                                for ($j = 1; $j <= 2; $j++) {
                                    if ($j == 1) {

                                        $test = 'Positive';
                                    } else {

                                        $test = 'Negative';
                                    }
                                    $firstColor = "#ffffff"; // White
                                    $secondColor = "#cccccc"; // Gray
                                    $colorThisTime = ($j % 2 == 0) ? $firstColor : $secondColor;
                                    $TABLE2.='<TR bgcolor="' . $colorThisTime . '"><TD>' . $rows_lab_group['paramater_name'] . '</TD><TD>' . $test . '</TD>';
                                    for ($i = 1; $i <= $nr; $i++) {
                                        //MALE
                                        $sql_male = "SELECT COUNT(*) AS total_male FROM AllLabTmp WHERE age BETWEEN '" . $_POST['start' . $i] . "' AND '" . $_POST['end' . $i] . "' AND paramater_name='" . $rows_lab_group['paramater_name'] . "' AND sex='m' AND result='" . $test . "'";
                                        //FEMALE
                                        $sql_female = "SELECT COUNT(*) AS total_female FROM AllLabTmp WHERE age BETWEEN '" . $_POST['start' . $i] . "' AND '" . $_POST['end' . $i] . "' AND paramater_name='" . $rows_lab_group['paramater_name'] . "' AND sex='f' AND result='" . $test . "'";

                                        $result_male = $db->Execute($sql_male);
                                        $result_female = $db->Execute($sql_female);

                                        $row_total_male = $result_male->FetchRow();
                                        $row_total_female = $result_female->FetchRow();

                                        $TABLE2.='<TD>' . $row_total_male['total_male'] . '</TD>';
                                        $TABLE2.='<TD>' . $row_total_female['total_female'] . '</TD>';
                                        $total_male_female = $row_total_male['total_male'] + $row_total_female['total_female'];
                                        $TABLE2.='<TD>' . $total_male_female . '</TD>';
                                    }//end for loop
                                }//j  loop






                                $TABLE2.='</TR>';
                            }
                        } else {
                            echo $message;
                        }
                    }//end admission_id validation
                }//end date validation
            }//end show
            ?>
            <form name="form1" method="post" action="" onsubmit="return inputvalue()">
                <table width="100%" border="0" align="center">
                    <tr>
                        <td><?php echo $LDDateFrom; ?><input name="date_from" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_from'] ?>">
                            <a href="javascript:show_calendar('form1.date_from','<?php echo $date_format ?>')">
                                <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>


                            <?php echo $LDDateTo; ?>
                            <input name="date_to" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_to'] ?>" >
                            <a href="javascript:show_calendar('form1.date_to','<?php echo $date_format ?>')">
                                <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>
                            <font size=1>[dd/mm/yyyy]


                            <select name="admission_id" id="admission_id" onChange="javascript:popdepts()">
                                <OPTION selected value="all_opd_ipd" >All</OPTION>
                                <OPTION value="2">Outpatient</OPTION>
                                <OPTION value="1">Inpatient</OPTION>
                                <input type="submit" name="show" value="<?php echo $LDShow; ?>">
                            </select>
                            <div id="dept">all_opd_ipd</div>




                        </td>
                    </tr>

                </table>


                <?php
                $TABLE = '<TABLE BORDER=1 CELLPADDING=4 class="report">';
                $TABLE.="<input type=\"hidden\" name=\"blocks\" id=\"blocks\" value=\"$nr\">";

                //for($k=1; $k<=3; $k++){
                $TABLE.='<TR><td colspan="2">AGE GROUP</td>';
                for ($i = 1; $i <= $nr; $i++) {

                    $start = $_POST['start' . $i];
                    $end = $_POST['end' . $i];
                    $firstColor = "#ffffff"; // White
                    $secondColor = "#cccccc"; // Gray
                    $colorThisTime = ($i % 2 == 0) ? $firstColor : $secondColor;
                    $TABLE.="<TH bgcolor=" . $colorThisTime . " COLSPAN=3><input size=\"3\" type=\"text\" name=\"start$i\" id=\"start$i\"  value=\"$start\"   ><input size=\"3\" type=\"text\" name=\"end$i\" id=\"end$i\" value=\"$end\" onchange=\"ValidateAge($i)\" ></TH>";
                }
                $TABLE.='</TR><TR bgcolor="lightblue"><td>Lab test</td><td>Result</td>';

                for ($i = 1; $i <= $nr; $i++) {
                    $firstColor = "#ffffff"; // White
                    $secondColor = "#cccccc"; // Gray
                    //$colorThisTime = ($i % 2 == 0) ? $firstColor : $secondColor;		
                    $TABLE.='<TD BGCOLOR="lightblue">M</TD><TD BGCOLOR="lightblue">F</TD><TD BGCOLOR="lightblue">TOTAL</TD>';
                }

                $TABLE.='</TR>';

                //}



                $TABLE.=$TABLE2;
                $TABLE.='</table>';
                echo $TABLE;
                ?>
                <table>
                    <tr>
                        <td><a href="./gui/downloads/mtuha_detailed.csv"><img border=0 src="../../gui/img/common/default/savedisk.gif"></a></td>
                    </tr>
                </table>

            </form>		
            <?php
            fclose($filename_mtuha);
        }

//end of function detailed_lab
//*******************************************************************************************************************

        function lab_mtuha($nr = '') {
            /*
              This function was written by Israel Pascal
              ELCT e-Health Unit
              Arusha Tanzania
              9th DEC 2015
              israel.pascal10@gmail.com
              israel@elct.or.tz
              +255767809660
             */
            global $db, $LDDateFrom, $LDDateTo, $root_path, $LDShow, $date_format,$insurance_obj;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;



            if (isset($_POST['show']) || !empty($_POST['show'])) {

                if ($_POST['date_from'] <= $_POST['date_to']) {
                    if (isset($_POST['admission_id']) || !empty($_POST['admission_id'])) {
                        if ($_POST['admission_id'] == 'all_opd_ipd') {
                            //all opd and ipd 
                            $dept_ward = '';
                        } else {
                            if ($_POST['admission_id'] == 1) {
                                //ipd
                                switch ($_POST['current_ward_nr']) {
                                    case 'all_ipd':
                                        $dept_ward = ' AND current_ward_nr>0';
                                        break;
                                    default:
                                        $dept_ward = ' AND current_ward_nr=' . $_POST['current_ward_nr'];
                                }
                            } else {
                                //opd
                                switch ($_POST['dept_nr']) {
                                    case 'all_opd':
                                        $dept_ward = ' AND current_dept_nr>0';
                                        break;
                                    default:
                                        $dept_ward = ' AND current_dept_nr=' . $_POST['dept_nr'];
                                }
                            }
                        }//end dept ward validation


                       //Get health fund
                        if ($_POST['insurance']=="-2") {
                            $hf="";
                            
                        }elseif ($_POST['insurance']=="0") {
                            $hf='AND cp.insurance_ID='."0";
                        }else{
                            $hf='AND cp.insurance_ID='.$_POST['insurance'];
                        }

                       // echo $hf;


                           //echo $insurance_obj->GetName_insurance_from_id($_POST['insurance']);
                           if($_POST['insurance']=="-2"){
                            $hfname="ALL";
                           }elseif ($_POST['insurance']=="0") {
                               $hfname="CASH";
                           }else{
                            $hfname=$insurance_obj->GetName_insurance_from_id($_POST['insurance']);
                           }

                           echo $hfname;

                         

                        $error = false;
                        for ($i = 1; $i <= $_POST['blocks']; $i++) {

                            if ($_POST['start' . $i] > $_POST['end' . $i] || $_POST['start' . $i] == '' || $_POST['end' . $i] == '') {
                                $error = true;
                                $message = "ERROR! MAKE SURE INPUT BOX ARE NOT EMPTY AND START AGE IS LESS OR EQUAL TO END AGE";
                            }
                        }//end for loop
                        if (!$error) {
                            //query database
                            $DateFromArray = explode('/', $_POST['date_from']);
                            $DateToArray = explode('/', $_POST['date_to']);
                            $DateStampFrom = mktime(00, 00, 00, $DateFromArray[1], $DateFromArray[0], $DateFromArray[2]);
                            $DateStampTo = mktime(23, 59, 59, $DateToArray[1], $DateToArray[0], $DateToArray[2]);
                            $mysql_date_from = date('Y-m-d H:i:s', $DateStampFrom);
                            $mysql_date_to = date('Y-m-d H:i:s', $DateStampTo);

                            $TABLE2 = '';
                            $TABLE2.='<TR>';

                            $sql_lab_tmp = "CREATE TEMPORARY TABLE IF NOT EXISTS labresult AS 
							                 (SELECT ce.current_ward_nr,ce.current_dept_nr,chemsub.paramater_name,chemsub.parameter_value,cp.sex,(DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT( cp.date_birth, '%Y' )) AS age,chemsub.create_time
							                         FROM care_test_findings_chemlabor_sub AS chemsub
							                         INNER JOIN care_encounter AS ce ON ce.encounter_nr=chemsub.encounter_nr 
							                         INNER JOIN care_person AS cp ON cp.pid=ce.pid
							                  WHERE chemsub.create_time BETWEEN '" . $mysql_date_from . "' AND '" . $mysql_date_to ."' $hf". " $dept_ward)";

                                              

                                              
                            $db->Execute($sql_lab_tmp);


                           

                            $sql_group = "SELECT paramater_name FROM labresult GROUP BY paramater_name";
                            $result_group = $db->Execute($sql_group);
                            $total_male_female = 0;
                            while ($rows_group = $result_group->FetchRow()) {//first while loop
                                //$TABLE2.='<TR bgcolor="'.$colorThisTime.'"><TD>'.$rows_group['paramater_name'].'</TD>';
                                $sql_values = "SELECT parameter_value FROM labresult 
										             WHERE paramater_name='" . $rows_group['paramater_name'] . "' 
										             GROUP BY parameter_value ";
                                $result_values_group = $db->Execute($sql_values);
                                $j = 0;
                                while ($rows_values = $result_values_group->FetchRow()) {//while loop to list parameter and values
                                    $firstColor = "#ffffff"; // White
                                    $secondColor = "#cccccc"; // Gray
                                    $colorThisTime = ($j % 2 == 0) ? $firstColor : $secondColor;
                                    $TABLE2.='<TR bgcolor="' . $colorThisTime . '"><TD>' . $rows_group['paramater_name'] . '</TD><TD>' . $rows_values['parameter_value'] . '</TD>';

                                    for ($i = 1; $i <= $nr; $i++) {

                                        $sql_male = "SELECT count(*) AS total_male 
										                     FROM labresult 
										                     WHERE sex='m' AND age 
										                     BETWEEN '" . $_POST['start' . $i] . "' AND '" . $_POST['end' . $i] . "' AND  create_time BETWEEN '" . $mysql_date_from . "' AND '" . $mysql_date_to . "' AND paramater_name='" . $rows_group['paramater_name'] . "' AND parameter_value='" . addslashes($rows_values['parameter_value']) . "' $dept_ward ";

                                        $sql_female = "SELECT count(*) AS total_female 
										                     FROM labresult 
										                     WHERE sex='f' AND age 
										                     BETWEEN '" . $_POST['start' . $i] . "' AND '" . $_POST['end' . $i] . "' AND  create_time BETWEEN '" . $mysql_date_from . "' AND '" . $mysql_date_to . "' AND paramater_name='" . $rows_group['paramater_name'] . "' AND parameter_value='" . addslashes($rows_values['parameter_value']) . "' $dept_ward ";

                                        $result_male = $db->Execute($sql_male);
                                        $result_female = $db->Execute($sql_female);

                                        $row_male = $result_male->FetchRow();
                                        $row_female = $result_female->FetchRow();

                                        $TABLE2.='<TD>' . $row_male['total_male'] . '</TD>';
                                        $TABLE2.='<TD>' . $row_female['total_female'] . '</TD>';
                                        $total_male_female = $row_male['total_male'] + $row_female['total_female'];
                                        $TABLE2.='<TD>' . $total_male_female . '</TD>';



                                        $j++;
                                    }
                                }//while loop to list parameter and values             
                            }//first while loop








                            $TABLE2.='</TR>';
                        } else {
                            echo $message;
                        }
                    }//end admission_id validation
                }//end date validation
            }//end show
            ?>
            <form name="form1" method="post" action="" onsubmit="return inputvalue()">
                <table width="100%" border="0" align="center">
                    <tr>
                        <td><?php echo $LDDateFrom; ?><input name="date_from" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_from'] ?>">
                            <a href="javascript:show_calendar('form1.date_from','<?php echo $date_format ?>')">
                                <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>


                            <?php echo $LDDateTo; ?>
                            <input name="date_to" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_to'] ?>" >
                            <a href="javascript:show_calendar('form1.date_to','<?php echo $date_format ?>')">
                                <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>
                            <font size=1>[dd/mm/yyyy]


                            <select name="admission_id" id="admission_id" onChange="javascript:popdepts()">
                                <OPTION selected value="all_opd_ipd" >All</OPTION>
                                <OPTION value="2">Outpatient</OPTION>
                                <OPTION value="1">Inpatient</OPTION>
                                <input type="submit" name="show" value="<?php echo $LDShow; ?>">
                            </select>
                            <div id="dept">all_opd_ipd</div>





                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $insurance_obj->ShowAllInsurancesForQuotatuion();?></td>
                    </tr>

                </table>




                <?php

               // print_r($_POST); 
                $TABLE = '<TABLE BORDER=1 CELLPADDING=4 class=report>';
                $TABLE.="<input type=\"hidden\" name=\"blocks\" id=\"blocks\" value=\"$nr\">";
                if($_POST['show']){
                $TABLE.='<TR>';
                $TABLE.='<TD>';
                $TABLE.=$hfname;
                $TABLE.='</TD>';
                $TABLE.='<TD>';
                $TABLE.=$_POST['date_from'];
                $TABLE.=' TO ';
                $TABLE.=$_POST['date_to'];
                $TABLE.='</TD>';

                $TABLE.='</TR>';
                }




                //for($k=1; $k<=3; $k++){
                $TABLE.='<TR><td colspan="2">AGE GROUP</td>';
                for ($i = 1; $i <= $nr; $i++) {

                    $start = $_POST['start' . $i];
                    $end = $_POST['end' . $i];
                    $firstColor = "#ffffff"; // White
                    $secondColor = "#cccccc"; // Gray
                    $colorThisTime = ($i % 2 == 0) ? $firstColor : $secondColor;
                    $TABLE.="<TH bgcolor=" . $colorThisTime . " COLSPAN=3><input size=\"3\" type=\"text\" name=\"start$i\" id=\"start$i\" placeholder=\"From\"  value=\"$start\"   ><input size=\"3\" type=\"text\" name=\"end$i\" id=\"end$i\" value=\"$end\" placeholder=\"To\" onchange=\"ValidateAge($i)\" ></TH>";
                }
                $TABLE.='</TR><TR bgcolor="lightblue"><td>Lab test</td><td>Result</td>';

                for ($i = 1; $i <= $nr; $i++) {
                    $firstColor = "#ffffff"; // White
                    $secondColor = "#cccccc"; // Gray
                    //$colorThisTime = ($i % 2 == 0) ? $firstColor : $secondColor;		
                    $TABLE.='<TD BGCOLOR="lightblue">M</TD><TD BGCOLOR="lightblue">F</TD><TD BGCOLOR="lightblue">TOTAL</TD>';
                }

                $TABLE.='</TR>';

                //}



                $TABLE.=$TABLE2;
                $TABLE.='</table>';
                echo $TABLE;
                ?>
                <table>
                    <tr>
                        <td><a href="./gui/downloads/mtuha_detailed.csv"><img border=0 src="../../gui/img/common/default/savedisk.gif"></a></td>
                    </tr>
                </table>

            </form>		
            <?php
//*******************************************************************************************************************


            fclose($filename_mtuha);
        }

//end of function lab mtuha		
        //******************************************************************************************************************

        function dateRange($first, $last, $step = '+1 day', $format = 'Y/m/d') {
            $dates = array();
            $current = strtotime($first);
            $last = strtotime($last);

            while ($current <= $last) {

                $dates[] = date($format, $current);
                $current = strtotime($step, $current);
            }

            return $dates;
        }

//end date range
        //******************************************************************************************************************

        function mtuhanewreturn($nr = '', $companies) {
            /*
              This function was written by Israel Pascal
              ELCT e-Health Unit
              Arusha Tanzania
              9th DEC 2015
              israel.pascal10@gmail.com
              israel@elct.or.tz
              +255767809660
             */
            global $db, $LDDateFrom, $LDDateTo, $root_path, $LDShow, $date_format;
            $debug = FALSE;
            ($debug) ? $db->debug = TRUE : $db->debug = FALSE;



            if (isset($_POST['show']) || !empty($_POST['show'])) {

                if ($_POST['date_from'] <= $_POST['date_to']) {
                    if (isset($_POST['admission_id']) || !empty($_POST['admission_id'])) {
                        if ($_POST['admission_id'] == 'all_opd_ipd') {
                            //all opd and ipd 
                            $dept_ward = '';
                        } else {
                            if ($_POST['admission_id'] == 1) {
                                //ipd
                                switch ($_POST['current_ward_nr']) {
                                    case 'all_ipd':
                                        $dept_ward = ' AND current_ward_nr>0';
                                        break;
                                    default:
                                        $dept_ward = ' AND current_ward_nr=' . $_POST['current_ward_nr'];
                                }
                            } else {
                                //opd
                                switch ($_POST['dept_nr']) {
                                    case 'all_opd':
                                        $dept_ward = ' AND current_dept_nr>0';
                                        break;
                                    default:
                                        $dept_ward = ' AND current_dept_nr=' . $_POST['dept_nr'];
                                }
                            }
                        }//end dept ward validation
                        $error = false;
                        for ($i = 1; $i <= $_POST['blocks']; $i++) {

                            if ($_POST['start' . $i] > $_POST['end' . $i] || $_POST['start' . $i] == '' || $_POST['end' . $i] == '') {
                                $error = true;
                                $message = "ERROR! MAKE SURE INPUT BOX ARE NOT EMPTY AND START AGE IS LESS OR EQUAL TO END AGE";
                            }
                        }//end for loop
                        if (!$error) {
                            //query database
                            $DateFromArray = explode('/', $_POST['date_from']);
                            $DateToArray = explode('/', $_POST['date_to']);
                            $DateStampFrom = mktime(00, 00, 00, $DateFromArray[1], $DateFromArray[0], $DateFromArray[2]);
                            $DateStampTo = mktime(23, 59, 59, $DateToArray[1], $DateToArray[0], $DateToArray[2]);
                            $mysql_date_from = date('Y-m-d H:i:s', $DateStampFrom);
                            $mysql_date_to = date('Y-m-d H:i:s', $DateStampTo);

                            $TABLE2 = '';
                            $TABLE2.='<TR>';
                            //israel you will start real business here
                            //echo $_POST['insurance'];
                            switch ($_POST['insurance']) {
                                case -2:
                                    $cash_credit = '';
                                    break;

                                case -1:
                                    $cash_credit = " AND insurance_ID=13";
                                    break;

                                default:
                                    $cash_credit = " AND insurance_ID=" . $_POST['insurance'];
                            }


                            $date = $this->dateRange($mysql_date_from, $mysql_date_to);

                            $date_qty = count($date);

                            for ($i = 0; $i < $date_qty; $i++) {//first for loop start
                                $total_male_female_new = 0;
                                $total_male_female_return = 0;
                                $TABLE2.='<TR><TD colspan=2>' . date('d.m.Y', strtotime($date[$i])) . '</TD>';
                                for ($j = 1; $j <= $nr; $j++) {//second for loop start
                                    //*******************Decoration*******************************************
                                    $firstColor = "#ffffff"; // White
                                    $secondColor = "#cccccc"; // Gray
                                    $colorThisTime = ($j % 2 == 0) ? $firstColor : $secondColor;
                                    //************************************************************************


                                    $sql_new_male = "SELECT count(*) AS total_new_male 
								          FROM care_person cp 
								          INNER JOIN care_encounter ce ON cp.pid=ce.pid
								          WHERE cp.sex='m' AND DATE_FORMAT(ce.encounter_date,'%Y-%m-%d')='" . date('Y-m-d', strtotime($date[$i])) . "' AND (DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT( cp.date_birth, '%Y' )) BETWEEN '" . $_POST['start' . $j] . "' AND '" . $_POST['end' . $j] . "' $cash_credit $dept_ward AND DATE_FORMAT( ce.encounter_date,  '%Y-%m-%d' ) = DATE_FORMAT( cp.date_reg,  '%Y-%m-%d' )";

                                    $sql_new_female = "SELECT count(*) AS total_new_female 
								          FROM care_person cp 
								          INNER JOIN care_encounter ce ON cp.pid=ce.pid
								          WHERE cp.sex='f' AND DATE_FORMAT(ce.encounter_date,'%Y-%m-%d')='" . date('Y-m-d', strtotime($date[$i])) . "' AND (DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT( cp.date_birth, '%Y' )) BETWEEN '" . $_POST['start' . $j] . "' AND '" . $_POST['end' . $j] . "' $cash_credit $dept_ward AND DATE_FORMAT( ce.encounter_date,  '%Y-%m-%d' ) = DATE_FORMAT( cp.date_reg,  '%Y-%m-%d' )";

                                    $sql_return_male = "SELECT count(*) AS total_return_male 
								          FROM care_person cp 
								          INNER JOIN care_encounter ce ON cp.pid=ce.pid
								          WHERE cp.sex='m' AND DATE_FORMAT(ce.encounter_date,'%Y-%m-%d')='" . date('Y-m-d', strtotime($date[$i])) . "' AND (DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT( cp.date_birth, '%Y' )) BETWEEN '" . $_POST['start' . $j] . "' AND '" . $_POST['end' . $j] . "' $cash_credit $dept_ward AND DATE_FORMAT( ce.encounter_date,  '%Y-%m-%d' ) > DATE_FORMAT( cp.date_reg,  '%Y-%m-%d' )";

                                    $sql_return_female = "SELECT count(*) AS total_return_female 
								          FROM care_person cp 
								          INNER JOIN care_encounter ce ON cp.pid=ce.pid
								          WHERE cp.sex='f' AND DATE_FORMAT(ce.encounter_date,'%Y-%m-%d')='" . date('Y-m-d', strtotime($date[$i])) . "' AND (DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT( cp.date_birth, '%Y' )) BETWEEN '" . $_POST['start' . $j] . "' AND '" . $_POST['end' . $j] . "' $cash_credit $dept_ward AND DATE_FORMAT( ce.encounter_date,  '%Y-%m-%d' ) > DATE_FORMAT( cp.date_reg,  '%Y-%m-%d' )";

                                    $result_new_male = $db->Execute($sql_new_male);
                                    $result_new_female = $db->Execute($sql_new_female);
                                    $result_return_male = $db->Execute($sql_return_male);
                                    $result_return_female = $db->Execute($sql_return_female);

                                    $row_new_male = $result_new_male->FetchRow();
                                    $row_new_female = $result_new_female->FetchRow();
                                    $row_return_male = $result_return_male->FetchRow();
                                    $row_return_female = $result_return_female->FetchRow();


                                    $TABLE2.='<TD bgcolor="' . $colorThisTime . '" >' . $row_new_male['total_new_male'] . '</TD>';
                                    $TABLE2.='<TD bgcolor="' . $colorThisTime . '">' . $row_new_female['total_new_female'] . '</TD>';
                                    $total_male_female_new = $row_new_male['total_new_male'] + $row_new_female['total_new_female'];
                                    $TABLE2.='<TD bgcolor="' . $colorThisTime . '">' . $total_male_female_new . '</TD>';

                                    $TABLE2.='<TD bgcolor="' . $colorThisTime . '">' . $row_return_male['total_return_male'] . '</TD>';
                                    $TABLE2.='<TD bgcolor="' . $colorThisTime . '">' . $row_return_female['total_return_female'] . '</TD>';
                                    $total_male_female_return = $row_return_male['total_return_male'] + $row_return_female['total_return_female'];
                                    $TABLE2.='<TD bgcolor="' . $colorThisTime . '">' . $total_male_female_return . '</TD>';
                                }//second for loop end
                            }//first for loop


                            $TABLE2.='</TR>';
                        } else {
                            echo $message;
                        }
                    }//end admission_id validation
                }//end date validation
            }//end show
            ?>
            <form name="form1" method="post" action="" onsubmit="return inputvalue()">
                <table width="100%" border="0" align="center">
                    <tr>
                        <td><?php echo $LDDateFrom; ?><input name="date_from" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_from'] ?>">
                            <a href="javascript:show_calendar('form1.date_from','<?php echo $date_format ?>')">
                                <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>


                            <?php echo $LDDateTo; ?>
                            <input name="date_to" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_to'] ?>" >
                            <a href="javascript:show_calendar('form1.date_to','<?php echo $date_format ?>')">
                                <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>
                            <font size=1>[dd/mm/yyyy]


                            <select name="admission_id" id="admission_id" onChange="javascript:popdepts()">
                                <OPTION selected value="all_opd_ipd" >All</OPTION>
                                <OPTION value="2">Outpatient</OPTION>
                                <OPTION value="1">Inpatient</OPTION>
                                <input type="submit" name="show" value="<?php echo $LDShow; ?>">
                            </select>
                            <div id="dept">all_opd_ipd</div>
                            <?php echo $companies; ?>




                        </td>
                    </tr>

                </table>


                <?php
                $TABLE = '<TABLE BORDER=1 CELLPADDING=4>';
                $TABLE.="<input type=\"hidden\" name=\"blocks\" id=\"blocks\" value=\"$nr\">";

                //for($k=1; $k<=3; $k++){
                $TABLE.='<TR><td colspan="2">AGE GROUP <img src="../../gui/img/common/default/arrow.gif" border=0 width="15" height="15"></td>';
                for ($i = 1; $i <= $nr; $i++) {

                    $start = $_POST['start' . $i];
                    $end = $_POST['end' . $i];
                    $firstColor = "#ffffff"; // White
                    $secondColor = "#cccccc"; // Gray
                    $colorThisTime = ($i % 2 == 0) ? $firstColor : $secondColor;
                    $TABLE.="<TH bgcolor=" . $colorThisTime . " COLSPAN=6><input size=\"3\" type=\"text\" name=\"start$i\" id=\"start$i\"  value=\"$start\"   ><input size=\"3\" type=\"text\" name=\"end$i\" id=\"end$i\" value=\"$end\" onchange=\"ValidateAge($i)\" ></TH>";
                }

                $TABLE.='</TR><TR><td colspan="2" >VISIT TYPE <img src="../../gui/img/common/default/arrow.gif" border=0 width="15" height="15"></td>';

                for ($i = 1; $i <= $nr; $i++) {
                    $firstColor = "#ffffff"; // White
                    $secondColor = "#cccccc"; // Gray
                    $colorThisTime = ($i % 2 == 0) ? $firstColor : $secondColor;
                    $TABLE.="<TD bgcolor=" . $colorThisTime . " COLSPAN=3>NEW</TD><TD bgcolor=" . $colorThisTime . " COLSPAN=3>RETURN</TD>";
                }

                $TABLE.='</TR><TR ><td colspan="2">DATE <img src="../../gui/img/common/default/arrow_red_dwn_sm.gif" border=0 width="15" height="15"></td>';

                for ($i = 1; $i <= $nr; $i++) {
                    $firstColor = "#ffffff"; // White
                    $secondColor = "#cccccc"; // Gray
                    $colorThisTime = ($i % 2 == 0) ? $firstColor : $secondColor;
                    $TABLE.="<TD bgcolor=" . $colorThisTime . ">M</TD><TD bgcolor=" . $colorThisTime . ">F</TD><TD bgcolor=" . $colorThisTime . ">TOTAL</TD><TD bgcolor=" . $colorThisTime . ">M</TD><TD bgcolor=" . $colorThisTime . ">F</TD><TD bgcolor=" . $colorThisTime . ">TOTAL</TD>";
                }

                $TABLE.='</TR>';

                //}



                $TABLE.=$TABLE2;
                $TABLE.='</table>';
                echo $TABLE;
                ?>
                <table>
                    <tr>
                        <td><a href="./gui/downloads/mtuha_detailed.csv"><img border=0 src="../../gui/img/common/default/savedisk.gif"></a></td>
                    </tr>
                </table>

            </form>		
            <?php
            fclose($filename_mtuha);
        }

//end of function lab mtuha
        //***************************************************


    //start function for drugs consumption
        function drug_consumption($MysqlDateFrom,$MysqlDateTo,$insurance,$admission){
            global $db;

            global $ins_name,$admissionname,$root_path,$glob_obj,$GLOBAL_CONFIG,$messag;        
            
            $HeaderArray= array('INTERNAL ID','PARTCODE','DESCRIPTION','QTY','TOTAL COST','TOTAL SALE','PROFIT');
              
             $filename=null; 
             $filename = fopen('./gui/downloads/drug_consumption.csv', 'w');
                 
           include($root_path . 'include/inc_init_main.php');
           require_once($root_path . 'include/care_api_classes/class_globalconfig.php');
           $glob_obj = new GlobalConfig($GLOBAL_CONFIG);
           $glob_obj->getConfig('transmit_to_weberp_enabled');
           //echo $GLOBAL_CONFIG['transmit_to_weberp_enabled'];   

           //RecordCount()
        
           
           if($GLOBAL_CONFIG['transmit_to_weberp_enabled']=="1"){
            $sql_cost_update="UPDATE $dbname.care_tz_billing_archive_elem AS bae 
                  INNER JOIN $dbname.care_encounter_prescription AS cep
                  INNER JOIN $weberp_db.stockmaster AS erpmaster SET bae.materialcost=erpmaster.materialcost 
           WHERE bae.prescriptions_nr=cep.nr AND erpmaster.stockid=cep.partcode";
           $db->Execute($sql_cost_update);      
      

           
            }


           




                

                        
                   
             
           ?>
           
            <table border="1" class="report"   ">
            
            <tr><td><strong> Date:</strong><?php echo ' '. $_POST['date_from'].' ';?><strong> To: </strong><?php echo ' '.$_POST['date_to'];?> </td><td><strong> Health Fund: </strong><?php echo $ins_name;?></td><td><strong> Department/Ward: </strong><?php echo $admissionname;?></td></tr>
            <?php
            fputcsv($filename, array('FROM:',$_POST['date_from'] , 'TO:',$_POST['date_to'],'HEALTH FUND:',$ins_name,'Department/Ward:', $admissionname));
            ?>

            
            </table>
           
            <table border="1" class="report" style="width: 98%;">
              
            <tr style="background-color:lightgrey; font-weight: 24px;"><th><?php echo  $HeaderArray[0] ?></th><th><?php echo $HeaderArray[1]; ?></th><th><?php echo $HeaderArray[2];?></th><th><?php echo $HeaderArray[3]  ?></th><th><?php echo $HeaderArray[4];?></th><th><?php echo $HeaderArray[5];?></th><th><?php echo $HeaderArray[6];?></th></tr>

            <?php
             fputcsv($filename, array($HeaderArray[0], $HeaderArray[1],$HeaderArray[2],$HeaderArray[3],$HeaderArray[4],$HeaderArray[5],$HeaderArray[6]));
            
            $this->sql="SELECT pricelist.partcode, bare.item_number,bare.description,sum(amount) as qty, sum(amount*materialcost) as total_cost, sum(amount*price) as total_sales,sum(amount*price)-sum(amount*materialcost) as profit  FROM care_tz_billing_archive_elem bare INNER JOIN care_tz_drugsandservices pricelist ON bare.item_number=pricelist.item_id WHERE from_unixtime(date_change,'%Y-%m-%d') BETWEEN '".$MysqlDateFrom."' AND '".$MysqlDateTo."' AND pricelist.purchasing_class like 'drug_list%' $insurance $admission  GROUP BY pricelist.partcode ORDER BY description ASC";

            

            


                 $this->result=$db->Execute($this->sql);


                  
                 while($rows=$this->result->FetchRow()){
                    $grand_cost+=$rows['total_cost'];
                    $grand_sale+=$rows['total_sales'];
                    $grand_profit+=$rows['profit'];
                    echo '<tr>';

                    echo '<td>'.$rows['item_number'].'</td><td>'.$rows['partcode'].'</td><td>'.$rows['description'].'</td><td>'.$rows['qty'].'</td><td>'.number_format($rows['total_cost']).'</td><td>'.number_format($rows['total_sales']).'</td><td>'.number_format($rows['profit']).'</td>';


                    echo '</tr>';

                    fputcsv($filename, array($rows['item_number'],$rows['partcode'],$rows['description'],$rows['qty'],$rows['total_cost'],$rows['total_sales'],$rows['profit']));

                 }
                 
                echo '<tr bgcolor="lightgrey">';
                 echo '<td colspan="4">&nbsp;<strong>GRAND TOTAL:</strong></td><td><strong>'.number_format($grand_cost).'</strong></td></td><td><strong>'.number_format($grand_sale).'</strong></td><td><strong>'.number_format($grand_profit).'</strong></td>';
                echo '</tr>';
                fputcsv($filename, array('GRAND TOTAL:','','','',$grand_cost,$grand_sale,$grand_profit));
            
            ?>

                 
                
            </table>
            
            

           <?php 


        
        }
    //end function for drugs consumption  


    function supplies_consumption($MysqlDateFrom,$MysqlDateTo,$insurance,$admission){
            global $db;
            global $ins_name,$admissionname;        
            
            $HeaderArray= array('INTERNAL ID','PARTCODE','DESCRIPTION','QTY','TOTAL COST','TOTAL SALE','PROFIT');
              
             $filename=null; 
             $filename = fopen('./gui/downloads/drug_consumption.csv', 'w');


              
                   
             
           ?>
           
            <table border="1" class="report"   ">
            <tr><td><strong> Date:</strong><?php echo ' '. $_POST['date_from'].' ';?><strong> To: </strong><?php echo ' '.$_POST['date_to'];?> </td><td><strong> Health Fund: </strong><?php echo $ins_name;?></td><td><strong> Department/Ward: </strong><?php echo $admissionname;?></td></tr>
            <?php
            fputcsv($filename, array('FROM:',$_POST['date_from'] , 'TO:',$_POST['date_to'],'HEALTH FUND:',$ins_name,'Department/Ward:', $admissionname));
            ?>

            
            </table>
           
            <table border="1" class="report" style="width: 98%;">
              
            <tr style="background-color:lightgrey; font-weight: 24px;"><th><?php echo  $HeaderArray[0] ?></th><th><?php echo $HeaderArray[1]; ?></th><th><?php echo $HeaderArray[2];?></th><th><?php echo $HeaderArray[3]  ?></th><th><?php echo $HeaderArray[4];?></th><th><?php echo $HeaderArray[5];?></th><th><?php echo $HeaderArray[6];?></th></tr>

            <?php
             fputcsv($filename, array($HeaderArray[0], $HeaderArray[1],$HeaderArray[2],$HeaderArray[3],$HeaderArray[4],$HeaderArray[5],$HeaderArray[6]));
            
            $this->sql="SELECT pricelist.partcode, bare.item_number,bare.description,sum(amount) as qty, sum(amount*materialcost) as total_cost, sum(amount*price) as total_sales,sum(amount*price)-sum(amount*materialcost) as profit  FROM care_tz_billing_archive_elem bare INNER JOIN care_tz_drugsandservices pricelist ON bare.item_number=pricelist.item_id WHERE from_unixtime(date_change,'%Y-%m-%d') BETWEEN '".$MysqlDateFrom."' AND '".$MysqlDateTo."' AND pricelist.purchasing_class='supplies' $insurance $admission  GROUP BY bare.item_number ORDER BY description ASC";

            

            


                 $this->result=$db->Execute($this->sql);
                  
                 while($rows=$this->result->FetchRow()){
                    $grand_cost+=$rows['total_cost'];
                    $grand_sale+=$rows['total_sales'];
                    $grand_profit+=$rows['profit'];
                    echo '<tr>';

                    echo '<td>'.$rows['item_number'].'</td><td>'.$rows['partcode'].'</td><td>'.$rows['description'].'</td><td>'.$rows['qty'].'</td><td>'.number_format($rows['total_cost']).'</td><td>'.number_format($rows['total_sales']).'</td><td>'.number_format($rows['profit']).'</td>';


                    echo '</tr>';

                    fputcsv($filename, array($rows['item_number'],$rows['partcode'],$rows['description'],$rows['qty'],$rows['total_cost'],$rows['total_sales'],$rows['profit']));

                 }
                 
                echo '<tr bgcolor="lightgrey">';
                 echo '<td colspan="4">&nbsp;<strong>GRAND TOTAL:</strong></td><td><strong>'.number_format($grand_cost).'</strong></td></td><td><strong>'.number_format($grand_sale).'</strong></td><td><strong>'.number_format($grand_profit).'</strong></td>';
                echo '</tr>';
                fputcsv($filename, array('GRAND TOTAL:','','','',$grand_cost,$grand_sale,$grand_profit));
            
            ?>


                
            </table>
            
            

           <?php 


        
        }  
       //end of supplies consumption


        //radiolog revenue report

        function Radiology_Revenue($date_from, $date_to, $company, $admission, $dept = '', $insurance = '', $print = 0){

            // echo 'date from '.$date_from.'<br>';
            // echo 'date_to  '.$date_to.'<br>';
            // echo 'company '.$company.'<br>';
            // echo 'admission '.$admission.'<br>';
            // echo 'dept '.$dept.' initialized to empty'.'<br>';
            // echo 'insurance '.$insurance.' initialized to empty'.'<br>';
            // echo 'print '.$print.' initialized to zero'.'<br>';



              global $LDOther, $LDBilled_date, $LDAdmission_date, $LDPatient, $LDBirthDate, $LDSelianfilenumber, $LDMembership_NR, $LDForm_NR, $LDDescription, $LDGroup, $LDPrice, $LDRefund, $LDTopup, $LDDeposit;
            global $LDLab, $LDDrugs, $LDRadilogy, $LDDental, $LDEye, $LDMinProc, $LDProcSurg, $LDServicesTotal, $LDPartCode, $LDConsum, $LDSuppliesLab, $LDtotal, $LDNA, $LDNoOfItems;
            global $db;
            $arr_date_from = explode("-", $date_from);
            $arr_date_to = explode("-", $date_to);
            $date_from_timestamp = mktime(00, 00, 00, $arr_date_from[1], $arr_date_from[2], $arr_date_from[0]);
            $date_to_timestamp = mktime(23, 59, 59, $arr_date_to[1], $arr_date_to[2], $arr_date_to[0]);
            $bill_obj = New Bill;

            $in_out_patient = '';

            if ($date_from <= '2016-03-20') {

                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=1';
                            $in_out_where = 'WHERE ce.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=2';
                            $in_out_where = 'WHERE ce.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch  
            } else {
                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=1';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND billelem.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_ward_nr=' . $_POST['current_ward_nr'];
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=2';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND billelem.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_dept_nr=' . $_POST['dept_nr'];
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch 
            }

            if ($print) {
                $_POST['insurance'] = $insurance;
            }
            //echo $_POST['insurance']; 
            switch ($_POST['insurance']) {
                case -2:
                    $PayType = " insurance_id>=0 ";
                    $where_PayType = " WHERE billelem.insurance_id>=0 ";
                    $and_PayType = " AND billelem.insurance_id>=0 ";
                    break;

                case -1:
                    $PayType = "insurance_id=0";
                    $where_PayType = " WHERE billelem.insurance_id=0";
                    $and_PayType = " AND billelem.insurance_id=0 ";
                    break;

                default:
                    $PayType = " insurance_id=" . $_POST['insurance'];
                    $where_PayType = " WHERE billelem.insurance_id=" . $_POST['insurance'];
                    $and_PayType = " AND billelem.insurance_id=" . $_POST['insurance'] . " ";
//                    $where_PayType_id = " WHERE id =" . $_POST['insurance'];
                    break;
            }

            //get company name
            if ($_POST['insurance'] == -2) {
                $company_names = 'ALL CUSTOMERS';
            } else if ($_POST['insurance'] == -1) {
                $company_names = 'CASH';
            } else {
                $company_name = "SELECT name FROM care_tz_company WHERE id = " . $_POST['insurance'] . " ";
                $company_result = $db->Execute($company_name);
                if ($company_row = $company_result->FetchRow()) {

                    $company_names = $company_row['name'];
                }
            }


        $this->sql="SELECT billelem.description,sum(billelem.amount) as qty,sum(billelem.amount*billelem.price) as total_price
                    FROM care_tz_billing_archive_elem as billelem
                    INNER JOIN care_tz_drugsandservices as pricelist
                    ON billelem.item_number=pricelist.item_id WHERE date_change BETWEEN '".$date_from_timestamp."' AND '".$date_to_timestamp."' AND pricelist.purchasing_class='xray' $and_PayType $in_out_patient  GROUP BY pricelist.item_id";

                    

                    

                
                    echo '<div align="center">';
                    //echo '<div>'.date('d-F-Y',strtotime($date_from)).'</div>';
                    //echo '<div >'.date('d-F-Y',strtotime($date_to)).'</div>';
                    echo '<table  border="0" class="report">';
                    echo '<tr>';
                    echo '<th>'.date('d-F-Y',strtotime($date_from)).' To: ' .date('d-F-Y',strtotime($date_to)).';   '   .$company_names.'</th>';
                    echo '</tr>';

                    echo '</table>';
                    echo '<table border="1"  table width=80% >';

                    echo '<tr bgcolor="lightgrey" style="font-weight: thicker">';

                                                
                    echo '<th>DESCRIPTION</th><th>QTY</th><th>TOTAL</th>';
                    echo '</tr>';
                        
                    
                    


                    $this->result=$db->Execute($this->sql); 
                    echo '<tr>';  
                    $grand_total=0;
                    while ($rows=$this->result->FetchRow()) {
                         echo '<td>'.$rows['description'].'</td><td>'.$rows['qty'].'</td><td>'.number_format($rows['total_price']).'</td>';


                            
                    echo '</tr>';
                    $grand_total+=$rows['total_price'];


                    }

                    echo '<tr bgcolor="lightgrey"><td></td><td><strong>TOTAL:</strong></td><td>'.number_format($grand_total).'</td></tr>';

                    



                   echo '</table>';
                   echo '</div>'; 


        }

        //end radiology revenue report

        //start laboratory revenue report
        function Laboratory_Revenue($date_from, $date_to, $company, $admission, $dept = '', $insurance = '', $print = 0){

            // echo 'date from '.$date_from.'<br>';
            // echo 'date_to  '.$date_to.'<br>';
            // echo 'company '.$company.'<br>';
            // echo 'admission '.$admission.'<br>';
            // echo 'dept '.$dept.' initialized to empty'.'<br>';
            // echo 'insurance '.$insurance.' initialized to empty'.'<br>';
            // echo 'print '.$print.' initialized to zero'.'<br>';



              global $LDOther, $LDBilled_date, $LDAdmission_date, $LDPatient, $LDBirthDate, $LDSelianfilenumber, $LDMembership_NR, $LDForm_NR, $LDDescription, $LDGroup, $LDPrice, $LDRefund, $LDTopup, $LDDeposit;
            global $LDLab, $LDDrugs, $LDRadilogy, $LDDental, $LDEye, $LDMinProc, $LDProcSurg, $LDServicesTotal, $LDPartCode, $LDConsum, $LDSuppliesLab, $LDtotal, $LDNA, $LDNoOfItems;
            global $db;
            $arr_date_from = explode("-", $date_from);
            $arr_date_to = explode("-", $date_to);
            $date_from_timestamp = mktime(00, 00, 00, $arr_date_from[1], $arr_date_from[2], $arr_date_from[0]);
            $date_to_timestamp = mktime(23, 59, 59, $arr_date_to[1], $arr_date_to[2], $arr_date_to[0]);
            $bill_obj = New Bill;

            $in_out_patient = '';

            if ($date_from <= '2016-03-20') {

                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=1';
                            $in_out_where = 'WHERE ce.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=2';
                            $in_out_where = 'WHERE ce.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch  
            } else {
                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=1';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND billelem.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_ward_nr=' . $_POST['current_ward_nr'];
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=2';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND billelem.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_dept_nr=' . $_POST['dept_nr'];
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch 
            }

            if ($print) {
                $_POST['insurance'] = $insurance;
            }
            //echo $_POST['insurance']; 
            switch ($_POST['insurance']) {
                case -2:
                    $PayType = " insurance_id>=0 ";
                    $where_PayType = " WHERE billelem.insurance_id>=0 ";
                    $and_PayType = " AND billelem.insurance_id>=0 ";
                    break;

                case -1:
                    $PayType = "insurance_id=0";
                    $where_PayType = " WHERE billelem.insurance_id=0";
                    $and_PayType = " AND billelem.insurance_id=0 ";
                    break;

                default:
                    $PayType = " insurance_id=" . $_POST['insurance'];
                    $where_PayType = " WHERE billelem.insurance_id=" . $_POST['insurance'];
                    $and_PayType = " AND billelem.insurance_id=" . $_POST['insurance'] . " ";
//                    $where_PayType_id = " WHERE id =" . $_POST['insurance'];
                    break;
            }

            //get company name
            if ($_POST['insurance'] == -2) {
                $company_names = 'ALL CUSTOMERS';
            } else if ($_POST['insurance'] == -1) {
                $company_names = 'CASH';
            } else {
                $company_name = "SELECT name FROM care_tz_company WHERE id = " . $_POST['insurance'] . " ";
                $company_result = $db->Execute($company_name);
                if ($company_row = $company_result->FetchRow()) {

                    $company_names = $company_row['name'];
                }
            }


        $this->sql="SELECT billelem.description,sum(billelem.amount) as qty,sum(billelem.amount*billelem.price) as total_price
                    FROM care_tz_billing_archive_elem as billelem
                    INNER JOIN care_tz_drugsandservices as pricelist
                    ON billelem.item_number=pricelist.item_id WHERE date_change BETWEEN '".$date_from_timestamp."' AND '".$date_to_timestamp."' AND pricelist.purchasing_class='labtest' $and_PayType $in_out_patient  GROUP BY pricelist.item_id";

                    

                    

                
                    echo '<div align="center">';
                    //echo '<div>'.date('d-F-Y',strtotime($date_from)).'</div>';
                    //echo '<div >'.date('d-F-Y',strtotime($date_to)).'</div>';
                    echo '<table  border="0" class="report">';
                    echo '<tr>';
                    echo '<th>'.date('d-F-Y',strtotime($date_from)).' To: ' .date('d-F-Y',strtotime($date_to)).';   '   .$company_names.'</th>';
                    echo '</tr>';

                    echo '</table>';
                    echo '<table border="1"  table width=80% >';

                    echo '<tr bgcolor="lightgrey" style="font-weight: thicker">';

                                                
                    echo '<th>DESCRIPTION</th><th>QTY</th><th>TOTAL</th>';
                    echo '</tr>';
                        
                    
                    


                    $this->result=$db->Execute($this->sql); 
                    echo '<tr>';  
                    $grand_total=0;
                    while ($rows=$this->result->FetchRow()) {
                         echo '<td>'.$rows['description'].'</td><td>'.$rows['qty'].'</td><td>'.number_format($rows['total_price']).'</td>';


                            
                    echo '</tr>';
                    $grand_total+=$rows['total_price'];


                    }

                    echo '<tr bgcolor="lightgrey"><td></td><td><strong>TOTAL:</strong></td><td>'.number_format($grand_total).'</td></tr>';

                    



                   echo '</table>';
                   echo '</div>'; 


        }

        //end laboratory revenue report

        //start surgical_op

         function SurgicalOp_Revenue($date_from, $date_to, $company, $admission, $dept = '', $insurance = '', $print = 0){

            // echo 'date from '.$date_from.'<br>';
            // echo 'date_to  '.$date_to.'<br>';
            // echo 'company '.$company.'<br>';
            // echo 'admission '.$admission.'<br>';
            // echo 'dept '.$dept.' initialized to empty'.'<br>';
            // echo 'insurance '.$insurance.' initialized to empty'.'<br>';
            // echo 'print '.$print.' initialized to zero'.'<br>';



              global $LDOther, $LDBilled_date, $LDAdmission_date, $LDPatient, $LDBirthDate, $LDSelianfilenumber, $LDMembership_NR, $LDForm_NR, $LDDescription, $LDGroup, $LDPrice, $LDRefund, $LDTopup, $LDDeposit;
            global $LDLab, $LDDrugs, $LDRadilogy, $LDDental, $LDEye, $LDMinProc, $LDProcSurg, $LDServicesTotal, $LDPartCode, $LDConsum, $LDSuppliesLab, $LDtotal, $LDNA, $LDNoOfItems;
            global $db;
            $arr_date_from = explode("-", $date_from);
            $arr_date_to = explode("-", $date_to);
            $date_from_timestamp = mktime(00, 00, 00, $arr_date_from[1], $arr_date_from[2], $arr_date_from[0]);
            $date_to_timestamp = mktime(23, 59, 59, $arr_date_to[1], $arr_date_to[2], $arr_date_to[0]);
            $bill_obj = New Bill;

            $in_out_patient = '';

            if ($date_from <= '2016-03-20') {

                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=1';
                            $in_out_where = 'WHERE ce.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=2';
                            $in_out_where = 'WHERE ce.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch  
            } else {
                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=1';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND billelem.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_ward_nr=' . $_POST['current_ward_nr'];
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=2';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND billelem.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_dept_nr=' . $_POST['dept_nr'];
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch 
            }

            if ($print) {
                $_POST['insurance'] = $insurance;
            }
            //echo $_POST['insurance']; 
            switch ($_POST['insurance']) {
                case -2:
                    $PayType = " insurance_id>=0 ";
                    $where_PayType = " WHERE billelem.insurance_id>=0 ";
                    $and_PayType = " AND billelem.insurance_id>=0 ";
                    break;

                case -1:
                    $PayType = "insurance_id=0";
                    $where_PayType = " WHERE billelem.insurance_id=0";
                    $and_PayType = " AND billelem.insurance_id=0 ";
                    break;

                default:
                    $PayType = " insurance_id=" . $_POST['insurance'];
                    $where_PayType = " WHERE billelem.insurance_id=" . $_POST['insurance'];
                    $and_PayType = " AND billelem.insurance_id=" . $_POST['insurance'] . " ";
//                    $where_PayType_id = " WHERE id =" . $_POST['insurance'];
                    break;
            }

            //get company name
            if ($_POST['insurance'] == -2) {
                $company_names = 'ALL CUSTOMERS';
            } else if ($_POST['insurance'] == -1) {
                $company_names = 'CASH';
            } else {
                $company_name = "SELECT name FROM care_tz_company WHERE id = " . $_POST['insurance'] . " ";
                $company_result = $db->Execute($company_name);
                if ($company_row = $company_result->FetchRow()) {

                    $company_names = $company_row['name'];
                }
            }


        $this->sql="SELECT billelem.description,sum(billelem.amount) as qty,sum(billelem.amount*billelem.price) as total_price
                    FROM care_tz_billing_archive_elem as billelem
                    INNER JOIN care_tz_drugsandservices as pricelist
                    ON billelem.item_number=pricelist.item_id WHERE date_change BETWEEN '".$date_from_timestamp."' AND '".$date_to_timestamp."' AND pricelist.purchasing_class='surgical_op' $and_PayType $in_out_patient  GROUP BY pricelist.item_id";

                    

                    

                
                    echo '<div align="center">';
                    //echo '<div>'.date('d-F-Y',strtotime($date_from)).'</div>';
                    //echo '<div >'.date('d-F-Y',strtotime($date_to)).'</div>';
                    echo '<table  border="0" class="report">';
                    echo '<tr>';
                    echo '<th>'.date('d-F-Y',strtotime($date_from)).' To: ' .date('d-F-Y',strtotime($date_to)).';   '   .$company_names.'</th>';
                    echo '</tr>';

                    echo '</table>';
                    echo '<table border="1"  table width=80% >';

                    echo '<tr bgcolor="lightgrey" style="font-weight: thicker">';

                                                
                    echo '<th>DESCRIPTION</th><th>QTY</th><th>TOTAL</th>';
                    echo '</tr>';
                        
                    
                    


                    $this->result=$db->Execute($this->sql); 
                    echo '<tr>';  
                    $grand_total=0;
                    while ($rows=$this->result->FetchRow()) {
                         echo '<td>'.$rows['description'].'</td><td>'.$rows['qty'].'</td><td>'.number_format($rows['total_price']).'</td>';


                            
                    echo '</tr>';
                    $grand_total+=$rows['total_price'];


                    }

                    echo '<tr bgcolor="lightgrey"><td></td><td><strong>TOTAL:</strong></td><td>'.number_format($grand_total).'</td></tr>';

                    



                   echo '</table>';
                   echo '</div>'; 


        }



        //end surgical_op


        //start obgyne
        function Obgyne_Revenue($date_from, $date_to, $company, $admission, $dept = '', $insurance = '', $print = 0){

            // echo 'date from '.$date_from.'<br>';
            // echo 'date_to  '.$date_to.'<br>';
            // echo 'company '.$company.'<br>';
            // echo 'admission '.$admission.'<br>';
            // echo 'dept '.$dept.' initialized to empty'.'<br>';
            // echo 'insurance '.$insurance.' initialized to empty'.'<br>';
            // echo 'print '.$print.' initialized to zero'.'<br>';



              global $LDOther, $LDBilled_date, $LDAdmission_date, $LDPatient, $LDBirthDate, $LDSelianfilenumber, $LDMembership_NR, $LDForm_NR, $LDDescription, $LDGroup, $LDPrice, $LDRefund, $LDTopup, $LDDeposit;
            global $LDLab, $LDDrugs, $LDRadilogy, $LDDental, $LDEye, $LDMinProc, $LDProcSurg, $LDServicesTotal, $LDPartCode, $LDConsum, $LDSuppliesLab, $LDtotal, $LDNA, $LDNoOfItems;
            global $db;
            $arr_date_from = explode("-", $date_from);
            $arr_date_to = explode("-", $date_to);
            $date_from_timestamp = mktime(00, 00, 00, $arr_date_from[1], $arr_date_from[2], $arr_date_from[0]);
            $date_to_timestamp = mktime(23, 59, 59, $arr_date_to[1], $arr_date_to[2], $arr_date_to[0]);
            $bill_obj = New Bill;

            $in_out_patient = '';

            if ($date_from <= '2016-03-20') {

                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=1';
                            $in_out_where = 'WHERE ce.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=2';
                            $in_out_where = 'WHERE ce.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch  
            } else {
                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=1';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND billelem.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_ward_nr=' . $_POST['current_ward_nr'];
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=2';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND billelem.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_dept_nr=' . $_POST['dept_nr'];
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch 
            }

            if ($print) {
                $_POST['insurance'] = $insurance;
            }
            //echo $_POST['insurance']; 
            switch ($_POST['insurance']) {
                case -2:
                    $PayType = " insurance_id>=0 ";
                    $where_PayType = " WHERE billelem.insurance_id>=0 ";
                    $and_PayType = " AND billelem.insurance_id>=0 ";
                    break;

                case -1:
                    $PayType = "insurance_id=0";
                    $where_PayType = " WHERE billelem.insurance_id=0";
                    $and_PayType = " AND billelem.insurance_id=0 ";
                    break;

                default:
                    $PayType = " insurance_id=" . $_POST['insurance'];
                    $where_PayType = " WHERE billelem.insurance_id=" . $_POST['insurance'];
                    $and_PayType = " AND billelem.insurance_id=" . $_POST['insurance'] . " ";
//                    $where_PayType_id = " WHERE id =" . $_POST['insurance'];
                    break;
            }

            //get company name
            if ($_POST['insurance'] == -2) {
                $company_names = 'ALL CUSTOMERS';
            } else if ($_POST['insurance'] == -1) {
                $company_names = 'CASH';
            } else {
                $company_name = "SELECT name FROM care_tz_company WHERE id = " . $_POST['insurance'] . " ";
                $company_result = $db->Execute($company_name);
                if ($company_row = $company_result->FetchRow()) {

                    $company_names = $company_row['name'];
                }
            }


        $this->sql="SELECT billelem.description,sum(billelem.amount) as qty,sum(billelem.amount*billelem.price) as total_price
                    FROM care_tz_billing_archive_elem as billelem
                    INNER JOIN care_tz_drugsandservices as pricelist
                    ON billelem.item_number=pricelist.item_id WHERE date_change BETWEEN '".$date_from_timestamp."' AND '".$date_to_timestamp."' AND pricelist.purchasing_class='obgyne_op' $and_PayType $in_out_patient  GROUP BY pricelist.item_id";

                    

                    

                
                    echo '<div align="center">';
                    //echo '<div>'.date('d-F-Y',strtotime($date_from)).'</div>';
                    //echo '<div >'.date('d-F-Y',strtotime($date_to)).'</div>';
                    echo '<table  border="0" class="report">';
                    echo '<tr>';
                    echo '<th>'.date('d-F-Y',strtotime($date_from)).' To: ' .date('d-F-Y',strtotime($date_to)).';   '   .$company_names.'</th>';
                    echo '</tr>';

                    echo '</table>';
                    echo '<table border="1"  table width=80% >';

                    echo '<tr bgcolor="lightgrey" style="font-weight: thicker">';

                                                
                    echo '<th>DESCRIPTION</th><th>QTY</th><th>TOTAL</th>';
                    echo '</tr>';
                        
                    
                    


                    $this->result=$db->Execute($this->sql); 
                    echo '<tr>';  
                    $grand_total=0;
                    while ($rows=$this->result->FetchRow()) {
                         echo '<td>'.$rows['description'].'</td><td>'.$rows['qty'].'</td><td>'.number_format($rows['total_price']).'</td>';


                            
                    echo '</tr>';
                    $grand_total+=$rows['total_price'];


                    }

                    echo '<tr bgcolor="lightgrey"><td></td><td><strong>TOTAL:</strong></td><td>'.number_format($grand_total).'</td></tr>';

                    



                   echo '</table>';
                   echo '</div>'; 


        }



        //end obgyne

        //start ortho
        function Ortho_Revenue($date_from, $date_to, $company, $admission, $dept = '', $insurance = '', $print = 0){

            // echo 'date from '.$date_from.'<br>';
            // echo 'date_to  '.$date_to.'<br>';
            // echo 'company '.$company.'<br>';
            // echo 'admission '.$admission.'<br>';
            // echo 'dept '.$dept.' initialized to empty'.'<br>';
            // echo 'insurance '.$insurance.' initialized to empty'.'<br>';
            // echo 'print '.$print.' initialized to zero'.'<br>';



              global $LDOther, $LDBilled_date, $LDAdmission_date, $LDPatient, $LDBirthDate, $LDSelianfilenumber, $LDMembership_NR, $LDForm_NR, $LDDescription, $LDGroup, $LDPrice, $LDRefund, $LDTopup, $LDDeposit;
            global $LDLab, $LDDrugs, $LDRadilogy, $LDDental, $LDEye, $LDMinProc, $LDProcSurg, $LDServicesTotal, $LDPartCode, $LDConsum, $LDSuppliesLab, $LDtotal, $LDNA, $LDNoOfItems;
            global $db;
            $arr_date_from = explode("-", $date_from);
            $arr_date_to = explode("-", $date_to);
            $date_from_timestamp = mktime(00, 00, 00, $arr_date_from[1], $arr_date_from[2], $arr_date_from[0]);
            $date_to_timestamp = mktime(23, 59, 59, $arr_date_to[1], $arr_date_to[2], $arr_date_to[0]);
            $bill_obj = New Bill;

            $in_out_patient = '';

            if ($date_from <= '2016-03-20') {

                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=1';
                            $in_out_where = 'WHERE ce.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND ce.encounter_class_nr=2';
                            $in_out_where = 'WHERE ce.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE ce.current_dept_nr=' . $_POST['dept_nr'] . " ";
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch  
            } else {
                switch ($admission) {
                    case 1:
                        if ($print) {
                            $_POST['current_ward_nr'] = $dept;
                        }
                        if ($_POST['current_ward_nr'] == 'all_ipd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=1';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=1';
                        } else {
                            $in_out_patient = ' AND billelem.current_ward_nr=' . $_POST['current_ward_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_ward_nr=' . $_POST['current_ward_nr'];
                        }
                        break;
                    case 2:
                        if ($print) {
                            $_POST['dept_nr'] = $dept;
                        }
                        if ($_POST['dept_nr'] == 'all_opd') {
                            $in_out_patient = ' AND billelem.encounter_class_nr=2';
                            $in_out_where = 'WHERE billelem.encounter_class_nr=2';
                        } else {
                            $in_out_patient = ' AND billelem.current_dept_nr=' . $_POST['dept_nr'] . " ";
                            $in_out_where = 'WHERE billelem.current_dept_nr=' . $_POST['dept_nr'];
                        }
                        break;
                    default:
                        $in_out_patient = '';
                        $in_out_where = '';
                        break;
                }//end of switch 
            }

            if ($print) {
                $_POST['insurance'] = $insurance;
            }
            //echo $_POST['insurance']; 
            switch ($_POST['insurance']) {
                case -2:
                    $PayType = " insurance_id>=0 ";
                    $where_PayType = " WHERE billelem.insurance_id>=0 ";
                    $and_PayType = " AND billelem.insurance_id>=0 ";
                    break;

                case -1:
                    $PayType = "insurance_id=0";
                    $where_PayType = " WHERE billelem.insurance_id=0";
                    $and_PayType = " AND billelem.insurance_id=0 ";
                    break;

                default:
                    $PayType = " insurance_id=" . $_POST['insurance'];
                    $where_PayType = " WHERE billelem.insurance_id=" . $_POST['insurance'];
                    $and_PayType = " AND billelem.insurance_id=" . $_POST['insurance'] . " ";
//                    $where_PayType_id = " WHERE id =" . $_POST['insurance'];
                    break;
            }

            //get company name
            if ($_POST['insurance'] == -2) {
                $company_names = 'ALL CUSTOMERS';
            } else if ($_POST['insurance'] == -1) {
                $company_names = 'CASH';
            } else {
                $company_name = "SELECT name FROM care_tz_company WHERE id = " . $_POST['insurance'] . " ";
                $company_result = $db->Execute($company_name);
                if ($company_row = $company_result->FetchRow()) {

                    $company_names = $company_row['name'];
                }
            }


        $this->sql="SELECT billelem.description,sum(billelem.amount) as qty,sum(billelem.amount*billelem.price) as total_price
                    FROM care_tz_billing_archive_elem as billelem
                    INNER JOIN care_tz_drugsandservices as pricelist
                    ON billelem.item_number=pricelist.item_id WHERE date_change BETWEEN '".$date_from_timestamp."' AND '".$date_to_timestamp."' AND pricelist.purchasing_class='ortho_op' $and_PayType $in_out_patient  GROUP BY pricelist.item_id";

                    

                    

                
                    echo '<div align="center">';
                    //echo '<div>'.date('d-F-Y',strtotime($date_from)).'</div>';
                    //echo '<div >'.date('d-F-Y',strtotime($date_to)).'</div>';
                    echo '<table  border="0" class="report">';
                    echo '<tr>';
                    echo '<th>'.date('d-F-Y',strtotime($date_from)).' To: ' .date('d-F-Y',strtotime($date_to)).';   '   .$company_names.'</th>';
                    echo '</tr>';

                    echo '</table>';
                    echo '<table border="1"  table width=80% >';

                    echo '<tr bgcolor="lightgrey" style="font-weight: thicker">';

                                                
                    echo '<th>DESCRIPTION</th><th>QTY</th><th>TOTAL</th>';
                    echo '</tr>';
                        
                    
                    


                    $this->result=$db->Execute($this->sql); 
                    echo '<tr>';  
                    $grand_total=0;
                    while ($rows=$this->result->FetchRow()) {
                         echo '<td>'.$rows['description'].'</td><td>'.$rows['qty'].'</td><td>'.number_format($rows['total_price']).'</td>';


                            
                    echo '</tr>';
                    $grand_total+=$rows['total_price'];


                    }

                    echo '<tr bgcolor="lightgrey"><td></td><td><strong>TOTAL:</strong></td><td>'.number_format($grand_total).'</td></tr>';

                    



                   echo '</table>';
                   echo '</div>'; 


        }


        //end ortho

    }
    ?>      	






















