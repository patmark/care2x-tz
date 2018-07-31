<?php

require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require_once($root_path . 'include/care_api_classes/class_tz_insurance.php');
$lang_tables[] = 'aufnahme.php';
if (isset($_REQUEST['insr_id'])) {
    $id = $_REQUEST['insr_id'];
}
$insurance_obj = new Insurance_tz();
$array = $insurance_obj->GetInsuranceAsArray($id);
if ($array['enable_member_expiry'] == 1) {
    $display = 'onyesha';
    echo $display;
} else {
    $display = 'ficha';
    echo $display;
}
?>
