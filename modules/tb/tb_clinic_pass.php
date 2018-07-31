<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
/**
 * CARE2X Integrated Hospital Information System beta 2.0.1 - 2004-07-04
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * elpidio@care2x.org, 
 *
 * See the file "copy_notice.txt" for the licence notice
 */
$lang_tables = array('tb.php', 'actions.php');
define('LANG_FILE', 'stdpass.php');
define('NO_2LEVEL_CHK', 1);
require_once($root_path . 'include/inc_front_chain_lang.php');

require_once($root_path . 'global_conf/areas_allow.php');

$append = URL_REDIRECT_APPEND;

if (!isset($target) || $target == '') {
    $target = 'read';
}

$pid = $_REQUEST['pid'];
$encounter_nr = $_REQUEST['encounter_nr'];
$page_action = $_REQUEST['page_action'];
$mode = $_REQUEST['mode'];
//$date_to = $_REQUEST['date_to'];

switch ($target) {

    case 'menu':
        $allowedarea = $allow_area['tb_read'];
        $fileforward = "tb_menu.php" . $append . "&sid=$sid&target=read&pid=$pid&encounter_nr=$encounter_nr&lang=$lang";
        $lognow = 'TB login ok';
        break;
    case 'new':
        $allowedarea = $allow_area['tb_write'];
        $fileforward = "tb_registration.php" . $append . "&sid=$sid&target=new&lang=$lang&pid=$pid&patient=$patient&encounter_nr=$encounter_nr&mode=$mode";
        $lognow = 'TB login ok';
        break;
    case 'visit':
        $allowedarea = $allow_area['tb_all'];
        $fileforward = "tb_visit.php" . $append . "&sid=$sid&target=visitdetails&pid=$pid&patient=$patient&lang=$lang&encounter_nr=$encounter_nr&page_action=$page_action&date_from=$date_from&date_to=$date_to";
        $lognow = 'TB login ok';
        break;
    case 'report':
        $allowedarea = $allow_area['tb_read'];
        $fileforward = "tb_reports.php" . $append . "&sid=$sid&target=read&patient=$patient&lang=$lang&encounter_nr=$encounter_nr&page_action=$page_action&date_from=$date_from&date_to=$date_to";
        $lognow = 'TB login ok';
        break;

    default:
        $allowedarea = $allow_area['tb_read'];
        $fileforward = 'tb_menu_main.php' . $append;
        $lognow = 'TB login ok';
        break;
}

$thisfile = basename($_SERVER['PHP_SELF']);

$userck = 'aufnahme_user';
//reset cookie;
// reset all 2nd level lock cookies
setcookie($userck . $sid, '', 0, '/');
require($root_path . 'include/inc_2level_reset.php');
setcookie(ck_2level_sid . $sid, '', 0, '/');

require($root_path . 'include/inc_passcheck_internchk.php');
if ($pass == 'check')
    include($root_path . 'include/inc_passcheck.php');

$errbuf = $LDAdmission;

require($root_path . 'include/inc_passcheck_head.php');
?>

<BODY  onLoad="document.passwindow.userid.focus();" bgcolor=<?php echo $cfg['body_bgcolor']; ?>
<?php
if (!$cfg['dhtml']) {
    echo ' link=' . $cfg['idx_txtcolor'] . ' alink=' . $cfg['body_alink'] . ' vlink=' . $cfg['idx_txtcolor'];
}
?>>

    <FONT    SIZE=-1  FACE="Arial">

    <P>
        <?php
        $buf = $LDTBClinic . ' :: ' . $LDLogin;
        echo '
<script language=javascript>
<!--
 if (window.screen.width) 
 { if((window.screen.width)>1000) document.write(\'<img ' . createComIcon($root_path, 'smiley.gif', '0', 'top') . '><FONT  COLOR="' . $cfg['top_txtcolor'] . '"  SIZE=6  FACE="verdana"> <b>' . $buf . '</b></font>\');}
 //-->
 </script>';
        ?>


    <table width=100% border=0 cellpadding="0" cellspacing="0"> 
        <?php
        $maskBorderColor = '#66ee66';
        require($root_path . 'include/inc_passcheck_mask.php')
        ?>  

        <p>
            <?php
            require($root_path . 'include/inc_load_copyrite.php');
            ?>
            </FONT>
            </BODY>
            </HTML>
