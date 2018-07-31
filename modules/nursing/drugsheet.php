<?php
//error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * elpidio@care2x.org, 
 *
 * See the file "copy_notice.txt" for the licence notice
 */
define('LANG_FILE', 'nursing.php');
$local_user = 'ck_pflege_user';
require_once($root_path . 'include/inc_front_chain_lang.php');

//$db->debug=FALSE;
$thisfile = basename($_SERVER['PHP_SELF']);
/* Establish db connection */
if (!isset($db) || !$db)
    include($root_path . 'include/inc_db_makelink.php');

if ($dblink_ok) {
    /* Load date formatter */
    include_once($root_path . 'include/inc_date_format_functions.php');
    require_once($root_path . 'include/care_api_classes/class_mini_dental.php');
    $mini_obj = new dental();
    $toggle = 0;

    $pid = $_REQUEST['pid'];
    $encounter_nr = $_REQUEST['encounter_nr'];

    $pnames = $mini_obj->GetPatientNameFromPid($pid);

    $sql = " SELECT pr.*, drs.*, e.encounter_class_nr, service.sub_class, SUM(drs.amount) as amt_taken, service.partcode "
            . " FROM care_encounter AS e, care_person AS p, care_tz_drugsandservices as service,"
            . " care_encounter_prescription AS pr LEFT OUTER JOIN care_encounter_drugsheet as drs ON pr.nr=drs.prescr_nr "
            . " WHERE p.pid=e.pid AND e.encounter_nr=pr.encounter_nr "
            . " AND service.item_id=pr.article_item_number AND service.is_labtest=0 "
            . " AND (service.purchasing_class = 'drug_list' OR service.purchasing_class ='supplies' OR purchasing_class ='dental') "
            . " AND p.pid=" . $pid . " AND pr.encounter_nr=" . $encounter_nr
            . " GROUP BY pr.nr ORDER BY pr.nr DESC";

//    echo $sql;

    include('gui/gui_drugsheet.php');
} else {
    print '<div style="text-align:center; font:bold 12px Tahoma,Arial,SanSerif,system; color:red;">No Connection to Database</div>';
}
?>