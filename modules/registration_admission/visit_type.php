<?php

//session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$root_path = '../../';

require($root_path . 'include/inc_environment_global.php');

$VisitTypeID = $_GET['visit_type'];
$ReferralNo = $_GET['ReferralNo'];

/*
 * For testing purposes
 */

//echo 'Visit: ' . $VisitTypeID;
//echo '<br>';
//echo 'Ref: ' . $ReferralNo;

$_SESSION['nhif_visit_type'] = $VisitTypeID;
$_SESSION['nhif_referral_no'] = $ReferralNo;

echo "<td rowspan=7><div style='min-width: 200px; max-width: 350px;'>"
 . "<p class='card_fullname' style='color:green'>Visit Type Successfully Captured!</p>"
 . "<p class='card_fullname' style='color:green'>Please proceed to admission!</p>"
 . "</td></div>";
echo "<script> "
 . "show_links(); "
 . "</script>";
