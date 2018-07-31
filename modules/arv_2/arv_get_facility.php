<?php

require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
//require_once($root_path . 'include/care_api_classes/class_tz_arv_patient.php');

if (isset($_GET['ctc_id'])) {
    $replace = '/^\(?([0-9]{2})\)?[-. ]?([0-9]{2})[-. ]?([0-9]{4})[-. ]?([0-9]{6})$/';
    $return = '$1-$2-$3-$4';
    $ctc_no = preg_replace($replace, $return, $_GET['ctc_id']);

    $arr_ctc = explode('-', $ctc_no);
    $reg_code = $arr_ctc[0];
    $dist_code = $arr_ctc[1];
    $facility_no = $arr_ctc[2];
    $result = '';
    global $db;
    $debug = FALSE;
    ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
    //Get this facility
    $sql_fac = "SELECT TYPE , value
                        FROM care_config_global
                        WHERE TYPE = 'main_info_facility_code'
                        ";

    $arv_facility_code = '';
    if ($res = $db->Execute($sql_fac) AND $res->RecordCount()) {
        while ($row_elem = $res->FetchRow()) {
            $arv_facility_code = $row_elem[1];
        }
    }
    if ($facility_no == $arv_facility_code) {
        $result = 'This facility';
    } else {  //Check other facilities
        $sql = "SELECT *
                      FROM care_tz_arv_facilities
                      WHERE care_tz_arv_facility_id = '$facility_no'"
                . " AND region_code = '$reg_code'"
                . " AND district_code = '$dist_code'";

        if ($res = $db->Execute($sql) AND $res->RecordCount()) {
            while ($row_elem = $res->FetchRow()) {
                $result = $row_elem['facility_name'];
            }
        } else {
            $result = 'Unknown Facility';
        }
    }
    echo $result;
}
?>
