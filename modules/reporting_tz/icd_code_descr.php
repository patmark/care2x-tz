<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

//function icd_code($icd_code) {
if (isset($_GET['icd_code'])) {
    $icd_code = $_GET['icd_code'];
    $icd_qry = "SELECT description
                FROM care_tz_icd10_quicklist
                WHERE diagnosis_code = '$icd_code'";
    $db_icd_code = $db->Execute($icd_qry);
    while ($row_icd_code = $db_icd_code->FetchRow()) {
        echo $row_icd_code['description'];
    }
}

?>
