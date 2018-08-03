<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$path = $_GET['path'];
if (file_exists($path)) {
    unlink($path);
//        return TRUE;
    
    //Remove from db table 
    
    echo '<script>'
    . 'alert(\'Dicom Successfully Deleted!\');'
    . 'window.history.back();'
    . '</script>';
} else {
    echo '<script>'
    . 'alert(\'Failed!\');'
    . 'window.history.back();'
    . '</script>';
}
