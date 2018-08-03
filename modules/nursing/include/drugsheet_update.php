<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$root_path = '../../../';
//echo $_SERVER['PHP_SELF'];
/* ------begin------ This protection code was suggested by Luki R. luki@karet.org ---- */
if (preg_match('/drugsheet_submit.php', $_SERVER['PHP_SELF']))
    die('<meta http-equiv="refresh" content="0; url=../">');

require_once($root_path . 'include/care_api_classes/class_drugsheet.php');
if (!isset($obj)) {
    $obj = new Drugsheet;
}
//
//print_r($_POST);

if (!isset($db) || !$db)
    include_once($root_path . 'include/inc_db_makelink.php');
if ($dblink_ok) {

    $_POST['modify_id'] = $_SESSION['sess_user_name'];
    $_POST['modify_time'] = date('Y-m-d H:i:s');
    $obj->setDataArray($_POST);
    $obj->where = " prescr_nr='" . $_POST['prescr_nr'] . "' AND"
            . " chart_date='" . $_POST['chart_date'] . "' AND"
            . " chart_time='" . $_POST['chart_time'] . "'";

    if ($obj->updateDataFromInternalArray($_POST['prescr_nr'])) {
        echo 'Update Success!';
    } else {
        echo "Update Failed!";
    }
//            break;
//    }// end of switch
} else {
    echo "Database Connection Failed<br>";
} 
