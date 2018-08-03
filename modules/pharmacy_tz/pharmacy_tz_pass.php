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
$lang_tables = array('pharmacy.php', 'actions.php');
define('LANG_FILE', 'stdpass.php');
define('NO_2LEVEL_CHK', 1);
require_once($root_path . 'include/inc_front_chain_lang.php');

require_once($root_path . 'global_conf/areas_allow.php');

//$allowedarea=&$allow_area['pharma'];
$append = URL_REDIRECT_APPEND;


if (!isset($target) || $target == '') {
    $target = 'entry';
}

//echo 'hii ndio taget '. $target;

switch ($target) {

    case 'all':
        $allowedarea = $allow_area['pharma_receive'];
        $fileforward = "pharmacy_tz_pending_prescriptions.php" . $append . "sid=$sid&lang=$lang&prescrServ=prescr&admission=&comming_from=pharmacy&loccode=$substore&locname=$locname";
        $lognow = 'Pharmacy login ok';
        break;
    case 'outpatient':
        $allowedarea = $allow_area['pharma_receive'];
        $fileforward = "pharmacy_tz_pending_prescriptions.php" . $append . "sid=$sid&lang=$lang&prescrServ=prescr&admission=outpatient&comming_from=pharmacy&loccode=$substore&locname=$locname";
        $lognow = 'Pharmacy login ok';
        break;
    case 'inpatient':
        $allowedarea = $allow_area['pharma_receive'];
        $fileforward = "pharmacy_tz_pending_prescriptions.php" . $append . "sid=$sid&lang=$lang&prescrServ=prescr&admission=inpatient&comming_from=pharmacy&loccode=$substore&locname=$locname";
        $lognow = 'Pharmacy login ok';
        break;
    case 'catalog':
        $allowedarea = &$allow_area['pharma_db'];
        $fileforward = "pharmacy_tz_product_catalog.php" . $append . "sid=$sid&lang=$lang";
        $lognow = 'Pharmacy login ok';
        break;
    case 'pricelist':
        $allowedarea = &$allow_area['pharma_db'];
        $fileforward = "magage_pricelist.php" . $append . "sid=$sid&lang=$lang";
        $lognow = 'Pharmacy login ok';
        break;
    case 'prescription':
        $allowedarea = &$allow_area['pharma_receive'];
        $fileforward = "pharmacy_tz_show_prescr.php" . $append . "sid=$sid&lang=$lang";
        $lognow = 'Pharmacy login ok';
        break;
    case 'drugsnservices':
        $allowedarea = &$allow_area['pharma_receive'];
        $fileforward = "pharmacy_tz_pending_prescriptions.php" . $append . "&target=search&prescrServ=serv&task=newprescription&back_path=billing";
        $lognow = 'Prescriptions ok';
        break;
    default:
        $allowedarea = $allow_area['pharma_read'];
        $fileforward = 'pharmacy_tz_substore.php' . $append;
        $lognow = 'Pharmacy login ok';
}

//echo "file forward ".$fileforward;

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
        $buf = $LDPharmacy . ' :: ' . $LDLogin;
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
