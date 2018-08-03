<?php

require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require_once($root_path . 'include/inc_environment_global.php');
include_once($root_path . 'include/care_api_classes/class_prescription.php');

//$_SESSION['item_array']=NULL;
if (!isset($pres_obj))
    $pres_obj = new Prescription;
$app_types = $pres_obj->getAppTypes();
$pres_types = $pres_obj->getPrescriptionTypes();


$show = $_REQUEST['show'];
$filter = $_REQUEST['filter'];
$db_drug_filter = $_REQUEST['db_drug_filter'];
$item_value = $_REQUEST['keyword'];

//check $item_value;
if ($item_value == '') {
    $item_value = ' ';
}

//$drug_list=$pres_obj->getDrugList($db_drug_filter,0,$item_value);

if (empty($show)) {
    $show = "drug list";
}

if (!empty($show)) { // In case something goes wrong, then do nothing!
    $drug_list = "";

    if ($debug)
        echo "Show tab: " . $show . "<br>";
    if ($debug)
        echo "DB-Filter: " . $db_drug_filter . "<br>";
    if ($debug)
        echo "DB-Filter2: " . $filter . "<br>";
    if ($debug)
        echo "This is external call?: " . $externalcall . "<br>";
    if ($debug)
        echo "prescrServ: " . $_GET['prescrServ'] . "<br>";



    if (empty($db_drug_filter))
        $db_drug_filter = "drug_list";

    $drug_list = $pres_obj->getDrugList($db_drug_filter, '0' . $type, $item_value);




    if ($filter == 'pediadric')
        $drug_list = $pres_obj->getDrugList($db_drug_filter, "is_pediatric" . $type, $item_value);
    elseif ($filter == 'adult')
        $drug_list = $pres_obj->getDrugList($db_drug_filter, "is_adult" . $type, $item_value);
    elseif ($filter == 'others')
        $drug_list = $pres_obj->getDrugList($db_drug_filter, "is_other" . $type, $item_value);
    elseif ($filter == 'consumable')
        $drug_list = $pres_obj->getDrugList($db_drug_filter, "is_consumable" . $type, $item_value);
}
else {
    $drug_list = $pres_obj->getDrugList("drug_list", 0, $item_value);
}
$pres_obj->DisplayDrugs($drug_list);
?>

