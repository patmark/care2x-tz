<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
//require($root_path . 'include/inc_front_chain_lang.php');
//require($root_path . 'language/en/lang_en_reporting.php');
require($root_path . 'language/en/lang_en_date_time.php');
require($root_path . 'include/inc_date_format_functions.php');

#Load and create paginator object
require_once($root_path . 'include/care_api_classes/class_tz_reporting.php');
/**
 * getting summary of OPD...
 */
$rep_obj = new selianreport();

$lang_tables[] = 'date_time.php';
$lang_tables[] = 'reporting.php';
require($root_path . 'include/inc_front_chain_lang.php');
require_once('include/inc_timeframe.php');
$month = array_search(1, $ARR_SELECT_MONTH);
$year = array_search(1, $ARR_SELECT_YEAR);





if (!isset($_POST['amount_per_person']) || $_POST['amount_per_person'] == '') {
    $amount_per_person = 0;
} else {
    $amount_per_person = $_POST['amount_per_person'];
}

if ($printout) {
    $startdate = $_GET['start'];
    $enddate = $_GET['end'];
//    $start_timeframe = $start;
//    $end_timeframe = $end;
//    $startdate = date("y.m.d ", $start_timeframe);
//    $enddate = date("y.m.d", $end_timeframe);
    $amount_per_person = $_GET['amount_per_person'];
} else {
    (!isset($_POST['date_from']) || $_POST['date_from'] == '') ? $startdate = @formatDate2STD(date('Y-m-d'), "yyyy-mm-dd") : $startdate = @formatDate2STD($_POST['date_from'], "dd/mm/yyyy");
//    $startdate = @formatDate2STD($_POST['date_from'], "dd/mm/yyyy");
    (!isset($_POST['date_to']) || $_POST['date_to'] == '') ? $enddate = @formatDate2STD(date('Y-m-d'), "yyyy-mm-dd") : $enddate = @formatDate2STD($_POST['date_to'], "dd/mm/yyyy");
}

$debug = FALSE;
($debug) ? $db->debug = TRUE : $db->debug = FALSE;


//Get the doctors list and the patients they have attended.

$docs_patients = "SELECT name, doctor, date, cd.name_formal, patients 
    FROM care_tz_hospital_doctor_history dh, care_users cu, care_department cd 
    WHERE dh.doctor = cu.login_id AND dh.dept=cd.nr 
    AND date >= '$startdate' AND date <= '$enddate' 
    ORDER BY doctor asc";

    //echo $docs_patients;



$db_docs_patients = $db->Execute($docs_patients);

//Get patients attended on a specific date

$data = array();
//$data1 = array();

$i = 0;
$tabler = '';
$gtotal = 0;
$doc = '';

while ($row = $db_docs_patients->FetchRow()) {




    //Get the first name on the list
    if ($i == 0) {
        $doc = $row['doctor'];
        $name = $row['name'];
        $count_t = 0;  //Initialize total count to zero which holds no of patients per doctor
    }



    /* Get doctor's name for the rest of the rows, if new, filter data to return distinct values
     * and assign new value to $doctor
     */



    if ($row['doctor'] != $doc) {


//        $data['patients_list'][$doctor] = array_unique($data['patients_list'][$doctor]);
        //Check that no of patients is not zero
        if ($count_t > 0) {
            //Get total amount
            $amount_doc_total = number_format($amount_per_person * $count_t);
            $tabler .= '<tr>';
            $tabler.='<td colspan=3 align=right><b><b></td>';
//        $tabler.='<td></td>';
            $tabler.='<td align=center></td>';
            $tabler.='<td></td>';
            $tabler.='<td align="center">' . number_format($amount_per_person, 2) . '</td>';
            $tabler.='<td align="center">' . $amount_doc_total . '</td>';
            $tabler.="<td><a href=\"javascript:patientsList('$doc');\">Open List</a></td>";
            $tabler .= '</tr>';
        }
        $count_t = 0;       //Reset total count to zero which holds no of patients per doctor
        //Assign new values
        $doc = $row['doctor'];
        $name = $row['name'];
    }



    //Get the list of patients separated by | into array, extract and assign to $data
    $arr_patients = explode('|', $row['patients']);

    //Get the date of attendance
    $date = $row['date'];

    //Get dept
    $dept = $row['name_formal'];



    foreach ($arr_patients as $key => $value) {
        $data['patients_list'][$doc][$date][] = $value;
        $data['date'][$doc][] = $date;
    }



//}
//
////Check patients with consultation etc per doctor on a given date
//



    foreach ($data['patients_list'] as $doc => $list) {







       // print_r($data['patients_list']).'<br>';
//      echo $doc.'---------';
//        print_r($list);
        $pats= array();
        $tarehe=array();
        foreach ($list as $date => $patients) {
            //Iterate through doctor and get patients on a date
//        foreach ($patients as $date => $encounter) {
            //Check diagnosis
//             $sql_diag = "SELECT DISTINCT encounter_nr FROM  care_tz_diagnosis "
//                     . " WHERE encounter_nr IN(" . implode(',', $patients) . ")
//                         AND FROM_UNIXTIME(timestamp) like '%$date%' "
//                     . " AND doctor_name ='$name'";

            
// //            echo $sql_diag;
//             $db_docs_diag = $db->Execute($sql_diag);
            

//             while ($row_diag= $db_docs_diag->FetchRow()) {
//                  array_push($pats, $row_diag['encounter_nr']);
//             }



            //Check notes


            $sql_notes = "SELECT DISTINCT cen.encounter_nr
                        FROM  care_encounter_notes cen 
                        WHERE 
                         date like '%$date%'  "
                    . " AND personell_name='$name'";

                    







                   // echo $name.'  '.$dept.'<br>';
        // echo $sql_notes;
            $db_docs_notes = $db->Execute($sql_notes);
            while ($row_notes = $db_docs_notes->FetchRow()) {
//                print_r($row_notes);

                


                $sql_min_nr="SELECT MIN(care_encounter_notes.nr),personell_name FROM care_encounter_notes INNER JOIN care_users ON care_users.name=care_encounter_notes.personell_name INNER JOIN care_user_roles ON care_user_roles.role_id=care_users.role_id INNER JOIN care_encounter ON care_encounter.encounter_nr=care_encounter_notes.encounter_nr LEFT JOIN care_department ON care_encounter.current_dept_nr=care_department.nr  WHERE care_encounter_notes.encounter_nr='".$row_notes['encounter_nr']."' AND  date like '%$date%' AND care_user_roles.description='".doctor."'";

                //echo $sql_min_nr;



                $min_result=$db->Execute($sql_min_nr);
                $row_min=$min_result->FetchRow();

                if($row_min['personell_name']==$name){
                    array_push($pats, $row_notes['encounter_nr']);
                    array_push($tarehe,$date);

                } 


                

                
                
            }

//             //Check prescriptions
//             $sql_presc = "SELECT DISTINCT encounter_nr "
//                     . " FROM  care_encounter_prescription "
//                     . " WHERE encounter_nr IN(" . implode(',', $patients) . ")
//                         AND article != ''
//                         AND prescribe_date like '%$date%' "
//                     . " AND prescriber ='$name'";
// //           echo $sql_presc;
//             $db_docs_presc = $db->Execute($sql_presc);
//             while ($row_presc = $db_docs_presc->FetchRow()) {
//                 array_push($pats, $row_presc['encounter_nr']);
//             }

            //start getting patients who treated by more than one doctor in one visit

            

            
             
             
               
        }



        

        //filter the $pats array to remain with unique values
        $pats = array_unique($pats);
        
//        print_r($pats);
        //Count the filtered array 
        $count = count($pats);
//        echo $count . '-----------------------------<br>';
    }







    unset($data);

    //Get the largest in array
    $count_r = $count;

    //Omit rows with zero no of patients
    if ($count_r > 0) {
        $count_t+=$count_r;
        $gtotal+=$count_r;

//    $row['count'] = $count_r;
//    echo $name . ' - ' . $count_t . ' - ' . $date;
//    $data1['docs_list'][] = $row;

        $tabler .= '<tr>';
        $serial = $i + 1;

        $tabler.='<td align="center">' . $serial . '</td>';
        $tabler.='<td align=center>' . @formatDate2Local($date, "dd/mm/yyyy") . '</td>';
        $tabler.="<td align=center>$name</td>";
        $tabler.='<td align=center>' . $count_r . '</td>';
        $tabler.='<td align=center></td>';
        $tabler.='<td></td>';
        $tabler.='<td></td>';
        $tabler.='</tr>';
        $i++;
    }
}
//Get totals on exiting loop
//Check that no of patients is not zero
if ($count_t > 0) {
    $amount_doc_total = number_format($amount_per_person * $count_t);
    $tabler .= '<tr>';
    $tabler.='<td colspan=3 align=right><b>Sub Total<b></td>';
//        $tabler.='<td></td>';
    $tabler.='<td align=center></td>';
    $tabler.='<td></td>';
    $tabler.='<td align="center">' . number_format($amount_per_person, 2) . '</td>';
    $tabler.='<td align="center">' . $amount_doc_total . '</td>';
    $tabler.="<td><a href=\"javascript:patientsList('$doc');\">Open List</a></td>";
    $tabler .= '</tr>';
}


//print_r($db_docs_patients);
print_r($data['patients_list']);

require_once('gui/gui_docs_presc.php');
