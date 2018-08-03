<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
/**
 * CARE2X Integrated Hospital Information System beta 2.0.0 - 2004-05-16
 * GNU General Public License
 * Copyright 2002,2003,2004 Elpidio Latorilla
 * elpidio@care2x.org, elpidio@care2x.net
 *
 * See the file "copy_notice.txt" for the licence notice
 */
$lang_tables[] = 'prompt.php';
$lang_tables[] = 'person.php';
define('LANG_FILE', 'aufnahme.php');
$local_user = 'aufnahme_user';
require_once($root_path . 'include/inc_front_chain_lang.php');


$thisfile = basename($_SERVER['PHP_SELF']);
$breakfile = 'patient.php';
$admissionfile = 'aufnahme_pass.php' . URL_APPEND;

# Resolve PID
if ((!isset($pid) || !$pid) && $_SESSION['sess_pid'])
    $pid = $_SESSION['sess_pid'];

# Save session data
$_SESSION['sess_path_referer'] = $top_dir . $thisfile;
$_SESSION['sess_file_return'] = $thisfile;
$_SESSION['sess_pid'] = $pid;
//$_SESSION['sess_full_pid']=$pid+$GLOBAL_CONFIG['person_id_nr_adder'];
$_SESSION['sess_parent_mod'] = 'registration';
$_SESSION['sess_user_origin'] = 'registration';
# Reset the encounter number
$_SESSION['sess_en'] = 0;

# Create the person show GUI
require_once($root_path . 'include/care_api_classes/class_gui_tz_person_show.php');
$person = new GuiPersonShow;

# Set PID to load the data
$person->setPID($pid);

# Import the current encounter number
$current_encounter = $person->CurrentEncounter();

# Import the death date
$death_date = $person->DeathDate();

//Insurance
$insurance_ID = $person->Insurance($pid);



//* Get the global config for person's registration form*/
include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
$glob_obj = new GlobalConfig($GLOBAL_CONFIG);

//if ($glob_obj->getConfigValue("validate_nhif") === "1") {
////    include $root_path . 'include/inc_init_main.php';
////    //Call nhf class
////    require_once($root_path . 'include/care_api_classes/class_nhif.php');
////
////    //instantiate nhif class with varibles
////    $obj_nhif = new Nhif($nhif_base, $nhif_user, $nhif_pwd);
////    print_r($obj_nhif->nhif_login());
////    echo $obj_nhif->url;
//}

# Load GUI page
include('./gui_bridge/default/gui_tz_person_reg_show.php');
?>