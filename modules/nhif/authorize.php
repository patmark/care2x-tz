<?php

//session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$root_path = '../../';

include_once($root_path . 'include/inc_init_main.php');
//Call nhf class
require_once($root_path . 'include/care_api_classes/class_nhif.php');

//instantiate nhif class with varibles
$obj_nhif = new Nhif($verification_token_url, $verification_service_url, $nhif_user, $nhif_pwd);

$card_no = $_GET['card_no'];
$VisitTypeID = $_GET['visit_type'];
$ReferralNo = $_GET['ReferralNo'];

/*
 * For testing purposes
 */
//print_r($obj_nhif->nhifVerificationDetails($card_no));
//echo 'Number: ' . $card_no;
//echo '<br>';
//echo 'Visit: ' . $VisitTypeID;
//echo '<br>';
//echo 'Ref: ' . $ReferralNo;

if ($authorization = $obj_nhif->authorize_card($card_no, $VisitTypeID, $ReferralNo)) {
    //Return the json encoded string
//        json_encode($authorization);

    if ($authorization->AuthorizationStatus === 'REJECTED' || $authorization->CardStatus === 'Inactive' || $authorization->CardStatus === 'Invalid') {
        echo "<td rowspan=7><div style='min-width: 200px; max-width: 350px;'>"
        . "<p class='card_status'><b>Card Status:</b> $authorization->CardStatus </p>
            <p class='authorization'><b>Authorization Status:</b> $authorization->AuthorizationStatus </p>
           <p class='authorization_no'><b>Remarks:</b> $authorization->Remarks</p>"
        . "</td></div>";
        echo "<script> alert('" . $authorization->Remarks . "'); </script>";
    } else if ($authorization->AuthorizationStatus === 'ACCEPTED') {
        //Add details to session
        $_SESSION['nhif_auth_no'] = $authorization->AuthorizationNo;
        $_SESSION['nhif_visit_type'] = $VisitTypeID;
        $_SESSION['nhif_referral_no'] = $ReferralNo;

        echo "<td rowspan=7><div style='min-width: 200px; max-width: 350px;'>"
        . "<p class='card_fullname'><b>Full Name:</b> $authorization->FullName  </p>
                <p class='card_fname'><b>First Name:</b> $authorization->FirstName </p>
                <p class='card_mname'><b>Middle Name:</b> $authorization->MiddleName </p>
                <p class='card_lname'><b>Surname:</b> $authorization->LastName </p>
                <p class='card_status'><b>Card Status:</b> $authorization->CardStatus </p>
                <p class='authorization'><b>Authorization Status:</b> $authorization->AuthorizationStatus </p>
                <p class='authorization_no'><b>Authorization No:</b> $authorization->AuthorizationNo</p>
                <p class='latest_authorization'><b>Latest Authorization:</b> $authorization->LatestAuthorization </p>"
        . "</td></div>";
        echo "<script> "
        . "hide_authorize(); "
        . "show_links(); "
        . "</script>";
    }
} else {
//    echo "<script>alert('Error Occured!\n\nPlease check your network connection, if okay contact administrator!');</script>";
    echo "<p class='card_fullname'>Error Occured! Please check your network connection, if okay contact administrator! </p>";
}
