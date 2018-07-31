<?php

require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

//Set script source t o nursing and pass it to session
$_SESSION['sess_user_origin'] = 'nursing';
$_SESSION['sess_pid'] = $_REQUEST['pid'];

header('Location: ' . $root_path . 'modules/registration_admission/show_weight_height.php');
?>