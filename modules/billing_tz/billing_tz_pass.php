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
$lang_tables = array('billing.php', 'actions.php');
define('LANG_FILE', 'stdpass.php');
define('NO_2LEVEL_CHK', 1);
require_once($root_path . 'include/inc_front_chain_lang.php');

require_once($root_path . 'global_conf/areas_allow.php');

//$allowedarea = &$allow_area['bill'];
$append = URL_REDIRECT_APPEND;

if (!isset($target) || $target == '') {
    $target = 'read';
}

switch ($target) {
    
    case 'outpatient':
        $allowedarea = $allow_area['bill_qoutp'];
        $fileforward = "billing_tz_quotation.php" . $append . "&patient=outpatient&sid=$sid&target=outpatient&lang=$lang";
        $lognow = 'Billing login ok';
        break;
    case 'inpatient':
        $allowedarea = $allow_area['bill_qinp'];
        $fileforward = "billing_tz_quotation.php" . $append . "&patient=inpatient&sid=$sid&target=inpatient&lang=$lang";
        $lognow = 'Billing login ok';
        break;
    case 'artndental':
        $allowedarea = $allow_area['bill_qden'];
        $fileforward = "billing_tz_quotation.php" . $append . "&patient=artndental&sid=$sid&target=inpatient&lang=$lang";
        $lognow = 'Billing login ok';
        break;
    case 'pending':
        $allowedarea = $allow_area['bill_w'];
        $fileforward = "billing_tz_pending.php" . $append . "&sid=$sid&target=pending&lang=$lang";
        $lognow = 'Billing login ok';
        break;
     case 'pendingtable':
        $allowedarea = $allow_area['bill_w'];
        $fileforward = "billing_tz_pending_table.php" . $append . "&sid=$sid&target=pendingtable&lang=$lang";
        $lognow = 'Billing login ok';
        break;    
    case 'archive':
        $allowedarea = $allow_area['bill_rep'];
        $fileforward = "billing_tz_archive.php" . $append . "&sid=$sid&page=1&target=pending&lang=$lang";
        $lognow = 'Billing login ok';
        break;
    case 'archiverep':
        $allowedarea = $allow_area['bill_rep'];
        $fileforward = "billing_tz_archive_date.php" . $append . "&sid=$sid&page=1&target=pending&lang=$lang";
        $lognow = 'Billing login ok';
        break;
    case 'insurance':
        $allowedarea = $allow_area['bill_w'];
        $fileforward = "insurance_tz.php" . $append . "&sid=$sid&page=1&target=pending&lang=$lang";
        $lognow = 'Insurance ok';
        break;
    default:
        $allowedarea = $allow_area['bill_r'];
        $fileforward = 'billing_tz.php' . $append;
        $lognow = 'Billing login ok';
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
        $buf = $LDBilling . ' :: ' . $LDLogin;
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
