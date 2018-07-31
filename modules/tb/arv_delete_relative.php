<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

$debug = false;
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$add_breakfile = "&pid=" . $_REQUEST['pid'] . "&encounter_nr=" . $_REQUEST['encounter_nr'] . "&mode=new";
$filename = "arv_family_info.php";
$breakfile = "modules/arv_2/arv_family_info.php";

if (isset($_GET['arv_reg_id']) && isset($_GET['file_no'])) {
    global $db;
    $debug = false;
    ($debug) ? $db->debug = TRUE : $db->debug = FALSE;

    $sql = "DELETE FROM care_tz_arv_relatives WHERE care_tz_arv_registration_id= " . $_GET['arv_reg_id'] . ' ' .
            "AND facility_file_no =" . $_GET['file_no'];

    $db->BeginTrans();
    $ok = $db->Execute($sql);

    if ($ok) {
        $db->CommitTrans();
        echo "<script type=\"text/javascript\"> 
            alert(\"Delete Success!\");
             </script>";
        header("location: http://$host$uri/$filename" . URL_REDIRECT_APPEND . "$add_breakfile");
    } else {
        $db->RollbackTrans();
        echo "<script type=\"text/javascript\"> 
            alert(\"Delete Failed!\");
             </script>";
        header("location: http://$host$uri/$filename" . URL_REDIRECT_APPEND . "$add_breakfile");
    }
}
?>
