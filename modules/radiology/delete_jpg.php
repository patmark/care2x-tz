<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$sid = $_REQUEST['sid']; //Get current session id
session_id($sid); //Initialize session with current session id
session_start();
//$path = $_REQUEST['path'];
//if (preg_match('.jpg', $path)) {
//Delete JPG images and their corresponding thumbnails

$dicom_jpg = $_SESSION['dicom_jpg'];

foreach ($dicom_jpg as $path) {

    if (file_exists($path)) {
        unlink($path);
//        return TRUE;
        echo 'Success';
    } else {
        echo 'Error removing image!';
    }
}
//Unset session variable
//print_r($dicom_jpg);

$dicom_jpg_tn = $_SESSION['dicom_jpg_tn'];
foreach ($dicom_jpg_tn as $path) {

    if (file_exists($path)) {
        unlink($path);
//        return TRUE;
        echo 'Success';
    } else {
        echo 'Error removing image!';
    }
}
//Unset session variable
unset($_SESSION['dicom_jpg_tn']);
unset($_SESSION['dicom_jpg']);
//}

