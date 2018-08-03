<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
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
$lang_tables = array('person.php', 'actions.php');
define('LANG_FILE', 'stdpass.php');
define('NO_2LEVEL_CHK', 1);
require_once($root_path . 'include/inc_front_chain_lang.php');

require_once($root_path . 'global_conf/areas_allow.php');
//$allowedarea = &$allow_area['outp_read'];
$append = URL_REDIRECT_APPEND;

//echo $target;
switch ($target) {
    case 'list':
        $allowedarea = $allow_area['outp_write'];
        $fileforward = 'amb_clinic_patients.php' . $append . '&origin=pass&target=list&dept_nr=' . $dept_nr;
        $lognote = $LDAppointments . 'ok';
        break;
    case 'diagnosis':
        $allowedarea = $allow_area['test_read'];
        $fileforward = 'amb_clinic_diagnosis_list.php' . $append . '&origin=pass&dept=' . urlencode($dept) . '&dept_nr=' . $dept_nr . '&target=diagnosis';
//        $fileforward = $root_path . 'modules/nursing/nursing-station-diagnosis-list.php' . $append . '&origin=pass&dept=' . urlencode($dept) . '&dept_nr=' . $dept_nr . '&target=diagnosis';
        $lognote = 'ok';
        break;
    case 'pharmacy':
        $allowedarea = $allow_area['pharma_read'];
        $fileforward = 'amb_clinic_pharmacy_list.php' . $append . '&origin=pass&dept=' . urlencode($dept) . '&dept_nr=' . $dept_nr . '&target=diagnosis';
        $lognote = 'ok';
        break;
    case 'laboratory':
        $allowedarea = $allow_area['test_receive'];
        $fileforward = 'amb_clinic_laboratory_list.php' . $append . '&origin=pass&dept=' . urlencode($dept) . '&dept_nr=' . $dept_nr . '&target=diagnosis';
        $lognote = 'ok';
        break;
    case 'radiology':
        $allowedarea = $allow_area['radio_read'];
        $fileforward = 'amb_clinic_radiology_list.php' . $append . '&origin=pass&dept=' . urlencode($dept) . '&dept_nr=' . $dept_nr . '&target=diagnosis';
        $lognote = 'ok';
        break;
    default:
        $allowedarea = $allow_area['outp_read'];
        $fileforward = 'amb_clinic_patients.php' . $append . '&origin=pass&dept_nr=' . $dept_nr;
        $lognote = $LDAppointments . 'ok';
        break;
}
$thisfile = basename($_SERVER['PHP_SELF']);
# Set the break (return) file
switch ($_SESSION['sess_user_origin']) {
    case 'amb': $breakfile = $root_path . 'modules/ambulatory/ambulatory.php' . URL_APPEND;
        break;
    default: $breakfile = $root_path . 'main/startframe.php' . URL_APPEND;
}

$_SESSION['sess_parent_mod'] = '';

$userck = 'ck_pflege_user';

# reset all 2nd level lock cookies
setcookie($userck . $sid, '', 0, '/');
require($root_path . 'include/inc_2level_reset.php');
setcookie('ck_2level_sid' . $sid, '', 0, '/');

require($root_path . 'include/inc_passcheck_internchk.php');
if ($pass == 'check')
    include($root_path . 'include/inc_passcheck.php');

$errbuf = $LDOutpatientClinic;


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
        if ($cfg['dhtml']) {

            $buf = $LDOutpatientClinic;
            if ($dept)
                $buf.=' <nobr>:: ' . $dept . '</nobr>';
            echo '
<script language=javascript>
<!--
 if (window.screen.width) 
 { if((window.screen.width)>1000) document.write(\'<img ' . createComIcon($root_path, 'xplaster.gif', '0', 'top') . '><FONT  COLOR="' . $cfg['top_txtcolor'] . '"  SIZE=6  FACE="verdana"> <b>' . $buf . '</b></font>\');}
 //-->
 </script>';
        }
        ?>

    <table width=100% border=0 cellpadding="0" cellspacing="0"> 

        <?php require($root_path . 'include/inc_passcheck_mask.php') ?>  

        <p>
            <?php
            require($root_path . 'include/inc_load_copyrite.php');
            ?>
            </FONT>
            </BODY>
            </HTML>
