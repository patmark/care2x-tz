<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');

require($root_path . 'include/inc_environment_global.php');
include_once($root_path . 'include/care_api_classes/class_multi.php');

$multi = new multi;

require_once($root_path . 'include/care_api_classes/class_appointment.php');
$obj = new Appointment();

extract($_GET);
$dz = explode('/', $dt);
$dt2 = $dz[2] . '-' . $dz[1] . '-' . $dz[0];

if (($tm != '') && ($dt != '') && ($dpt != '')) {
    $vk = $db->Execute(' SELECT * FROM care_appointment WHERE date="' . $dt2 . '" AND to_dept_nr=' . $dpt);


    // $created_date=$this->row['create_time'];

    //          $leo=date('Y-m-d H:i:s');

    //          $date1=new DateTime($created_date);
    //          $date2=new DateTime($leo);

    //          $interval = $date1->diff($date2);            

    //          $dateDiff = intval((strtotime($leo)-strtotime($created_date))/60);


              
      while ($rows=$vk->FetchRow()) {        
        $date1= $dt2. ' '.$rows['time'];
        $date2= $dt2. ' '.$tm;

        $tar1= new  DateTime($date1);
        $tar2= new  DateTime($date2);

        $interval = $tar1->diff($tar2);
        $dateDiff = intval((strtotime($date2)-strtotime($date1))/60);

        if($dateDiff<15){
            $dont_allow=TRUE;
        }



          
            

          
      }
    


    if ($dont_allow) {
        print 'Appointment Time interval is 15 minutes <input type="hidden" id="hd" name="hd" value="1">';
    } else {
        print '<input type="hidden" id="hd" name="hd" value="0">';
        print mysql_error();
    }
    //Check That the allowed number of appointments is not exceeded

    if ($obj->appointment_count($dt2, '_DEPT', $dpt)) {
        $sql = $db->Execute("SELECT max_appointments FROM care_department
                                                WHERE nr = $dpt");
        $app = $sql->FetchRow();
        $app = $app['max_appointments'];
        print 'You have reached the maximum number of ' . $app . ' appointments for ' . $dt . ' on this department'
                . '<input type="hidden" id="max_app" name="max_app" value="1">';
    }
} else
    print ' ... <input type="hidden" id="hd" name="hd" value="0">';
?>