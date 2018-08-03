<?php

require_once('care_api_classes/class_globalconfig.php');
require_once('inc_environment_global.php');

$glob_obj = new GlobalConfig($GLOBAL_CONFIG);
$glob_obj->getConfig('transmit%');

if ($GLOBAL_CONFIG['transmit_to_weberp_enabled'] == "") {
    $sql = 'INSERT INTO care_config_global (`type`, `value`, `notes`, `status`, `history`, `modify_id`, '
            . ' `modify_time`, `create_id`, `create_time`) VALUES (\'transmit_to_weberp_enabled\', \'0\', '
            . ' NULL, \'\', \'\', \'\', NOW(), \'\', \'0000-00-00 00:00:00\');';
    $db->Execute($sql);
}

//$webERPServerURL = "http://localhost/weberp_kibongoto_api/api/api_xml-rpc.php";
//$weberpuser = "care2x";
//$weberppassword = "x2erac";
//$weberpDebugLevel = 0;
$transmit_to_weberp_enabled = $GLOBAL_CONFIG['transmit_to_weberp_enabled'];
?>
