<?php

require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
include_once($root_path . 'include/care_api_classes/class_person.php');
$img_vema = 'check1.gif';
$img_kosa = 'delete2.gif';
$pid = $_REQUEST['pid'];
$file_nr = $_REQUEST['file_nr'];

$person_obj = new Person($pid);

if ($person_obj->SelianFileExists($file_nr) || !is_numeric($file_nr)) {
    $img = $img_kosa;
    echo "<img src=" . $root_path . 'gui/img/common/default/' . $img . ">";
} else {
    $img = $img_vema;

    echo "<img src=" . $root_path . 'gui/img/common/default/' . $img . ">";
}
?>
