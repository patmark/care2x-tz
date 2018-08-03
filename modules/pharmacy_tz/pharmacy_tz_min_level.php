<?php
//error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
//include_once($root_path . 'include/care_api_classes/class_multi.php');

//$multi = new multi;



if(isset($_REQUEST['id']) && isset($_REQUEST['data']) ){
    
	$sql_update="UPDATE care_tz_drugsandservices SET min_level='".$_REQUEST['data']."' WHERE item_id=".$_REQUEST['id'];
    $result=$db->Execute($sql_update);

    
}

?>
