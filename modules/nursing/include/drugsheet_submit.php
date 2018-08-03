<?php

//session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Get root_path from current script 
//location as this script is called by ajax

$path = explode('/', $_SERVER['SCRIPT_FILENAME']);

//print_r($_SERVER);
$root_path = '/';
//Iterate through path excluding the location of this script to get the root path 
//(we know this script is at /modules/nursing/include/)
for ($i = 1; $i < count($path) - 4; $i++) { //we start from 1 to omit the empty result at 0
    $root_path .= $path[$i] . '/';
}
//echo $root_path;
//exit;
//print_r($_SESSION);
//echo $_POST['sess_user_name'];
//$sess_user_name = $_POST['sess_user_name'];
//Check if session is valid
//if (!isset($_POST['sess_user_name']) || $_POST['sess_user_name'] == '') {
//    echo 'Session expired! Please login again to proceed!';
//    exit();
//}

/* ------begin------ This protection code was suggested by Luki R. luki@karet.org ---- */
//if (preg_match('/drugsheet_submit.php/i', $_SERVER['PHP_SELF']))
//    die('<meta http-equiv="refresh" content="0; url=../">');
//Include this to check if transmit to webERP is enabled in 
//global configuration and stored in $transmit_to_weberp_enabled variable
require_once($root_path . 'include/inc_init_xmlrpc.php');

require_once($root_path . 'include/care_api_classes/class_drugsheet.php');
if (!isset($obj)) {
    $obj = new Drugsheet;
}
//
//print_r($_POST);
//exit;

$mode = 'create';
if (!isset($db) || !$db)
    include_once($root_path . 'include/inc_db_makelink.php');
if ($dblink_ok) {
    $msg = '';
    switch ($mode) {
        case 'create':
            $_POST['modify_id'] = "";
            $_POST['create_id'] = $_SESSION['sess_user_name'];
            $obj->setDataArray($_POST);
            if ($obj->insertDataFromInternalArray()) {

                $msg .= 'Record Added Successfully!';

                //Update Stock in WebERP
                if ($transmit_to_weberp_enabled == 1) {
                    //Check if item is not done
                    $sql_status = "SELECT article_item_number FROM care_encounter_prescription "
                            . " WHERE status != 'done' AND care_encounter_prescription.nr=" . $_POST['prescr_nr'];

                    if ($sres = $db->Execute($sql_status)) {
                        if ($sres->RecordCount() > 0) {
//                            $msg .= '-----' . $sres->RecordCount() . ' ---- ----';
                            require_once($root_path . 'include/care_api_classes/class_weberp_c2x.php');
                            if (!isset($weberp_obj)) {
                                $weberp_obj = new weberp_c2x;
                            }
//                            echo $msg;
                            //echo $msg. '\nTransmit to WebERP Enabled!';
//                            exit;
                            if (isset($_SESSION['ward_pharmacy'])) {
                                $locationcode = $_SESSION['ward_pharmacy'];

                                //Check to verify if location is in WebERP
                                //before proceeding
                                if (!$weberp_obj->get_location_exists_in_webERP($locationcode)) {
                                    $msg .= ' Pharmacy location ' . $locationcode . ' not in WebERP!';
                                    echo $msg;
                                    exit();
                                }
                                //let us done dental items
                                //done dental items
                                $sql_done_dental = "SELECT article_item_number FROM care_encounter_prescription "
                                        . " INNER JOIN care_tz_drugsandservices ON care_encounter_prescription.article_item_number=care_tz_drugsandservices.item_id "
                                        . " WHERE care_tz_drugsandservices.purchasing_class IN('dental','supplies') "
                                        . " AND care_encounter_prescription.nr=" . $_POST['prescr_nr'];
                                $result_done_dental = $db->Execute($sql_done_dental);
                                while ($row_done_dental = $result_done_dental->FetchRow()) {
                                    $sql_update = "UPDATE care_encounter_prescription 
                                           SET status = 'done', taken='1', sub_store='" . $locationcode . "',"
                                            . " issuer='" . $_SESSION['sess_user_name'] . "' 
                                          WHERE care_encounter_prescription.nr='" . $_POST['prescr_nr'] . "'";

                                    $db->Execute($sql_update);
                                }


                                //
                                //
                                //end done dental items
                                if ($_POST['amount'] > 0) {
                                    if (isset($_POST['partcode'])) {

                                        $item = $weberp_obj->get_stock_item_from_webERP($_POST['partcode']);
                                        if ($_POST['partcode'] == $item['stockid']) {
                                            $Bal = $weberp_obj->get_stock_balance_webERP($_POST['partcode']);
                                            for ($i = 0; $i < sizeof($Bal); $i++) {
                                                if ($Bal[$i]['loccode'] == $locationcode) {
                                                    $StockBal = $Bal[$i]['quantity'];
                                                    if ($StockBal > 0) {
                                                        if ($StockBal >= $_POST['amount']) {
                                                            $TranDate = date('Y-m-d');
                                                            $zero = 0.00;
                                                            $amount = number_format($_POST['amount'], 2);
                                                            $t_dose = number_format($_POST['total_dosage'], 2);
                                                            //Check here if amount > total_dose, then this could be an injection,
                                                            //deduct total_dose instead and mark it as done
                                                            if ($_POST['amount'] >= $t_dose) {
                                                                $Quantity = $zero - $t_dose;
                                                                $adjust = $weberp_obj->stock_adjustment_in_webERP($_POST['partcode'], $locationcode, $Quantity, $TranDate);
                                                                //set done in c2x
                                                                $sql_update = "UPDATE care_encounter_prescription 
                                                                            SET status = 'done', taken='1', sub_store='" . $locationcode . "',"
                                                                        . " issuer='" . $_SESSION['sess_user_name'] . "' 
                                                                            WHERE care_encounter_prescription.nr='" . $_POST['prescr_nr'] . "'";

                                                                $db->Execute($sql_update);
                                                            } else {
                                                                $Quantity = $zero - $amount;
                                                                $adjust = $weberp_obj->stock_adjustment_in_webERP($_POST['partcode'], $locationcode, $Quantity, $TranDate);
                                                            }
                                                            //$adjusted_qty = 0;
                                                            $adjusted_qty = $weberp_obj->get_stock_balance_webERP($_POST['partcode']);

                                                            //echo 'adjusted'.$adjusted_qty[$i]['quantity'] .'<br>';
                                                            //echo 'initial balance'.$StockBal;
                                                            if ($StockBal > $adjusted_qty[$i]['quantity']) {
                                                                $msg .= ' Stock adjustment successful!';
                                                            } else {
                                                                $msg .= ' Adjustment failed!';
                                                            }
//                                                        $sql = "UPDATE
//                care_encounter_prescription
//          SET status = 'done',taken='1',issue_date='" . date('Y-m-d H:i:s') . "',materialcost='" . number_format($item['materialcost'], '2', '.', '') . "',sub_store='" . $locationcode . "',issuer='" . $_SESSION['sess_user_name'] . "',in_weberp='1'
//          WHERE encounter_nr = " . $pn . "
//                AND prescribe_date = '" . $prescription_date . "' AND partcode='" . $row_api['partcode'] . "' AND status IN('','pending')";
//
//
//
//
//                                                        $sql3 = "SELECT nr FROM care_encounter_prescription WHERE encounter_nr=" . $pn . " AND prescribe_date = '" . $prescription_date . "'";
//                                                        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
//                                                        $result_nr = $db->Execute($sql3);
//                                                        $data = array();
//                                                        while ($store_rows = $result_nr->FetchRow()) {
//                                                            $data['nr'][] = $store_rows;
//                                                        }
//                                                        while (list($x, $v) = each($data['nr'])) {
//                                                            $sql4 = "UPDATE care_tz_billing_archive_elem SET sub_store='" . $locationcode . "', materialcost='" . number_format($item['materialcost'], '2', '.', '') . "' WHERE prescriptions_nr='" . $v['nr'] . "' AND status IN('','pending')";
//                                                            $db->Execute($sql4);
//                                                        }
//
//
//                                                        ($debug) ? $db->debug = TRUE : $db->debug = FALSE;
//                                                        $db->Execute($sql);
//                                                    }
                                                        }//end  if($StockBal>=$row_api['total_dosage'])
                                                    }//end if($StockBal>0)
                                                }//end if($Bal[$i]['loccode']==$locationcode)
                                            }//end for loop sizeof($Bal)
                                        } else {//end  if($row_api['partcode']==$item['stockid'])
                                            $msg .= ' Partcode not found in weberp stock!';
                                        }
                                    }//end isset($row_api['partcode']                    
                                }//end $row_api['total_dosage']>0
                            } else {
                                $msg .= ' No pharmacy for the ward to adjust stock from!';
                            }
                        }
                    } else {
                        $msg .= ' Item already done. Stock adjusted!';
                    }
                }
                echo $msg;
            } else { //End insert data 
                //Check if record exists and update
                $msg .= 'Record exists';
                echo $msg;
                exit;
                $dssql = "SELECT * FROM care_encounter_drugsheet WHERE "
                        . " prescr_nr='" . $_POST['prescr_nr'] . "' AND"
                        . " chart_date='" . $_POST['chart_date'] . "' AND"
                        . " chart_time='" . $_POST['chart_time'] . "'";
                //$dsrow = '';
                if ($ds_result = $db->Execute($dssql)) {
                    if ($ds_result->RecordCount()) {
                        $obj->where = " prescr_nr='" . $_POST['prescr_nr'] . "' AND"
                                . " chart_date='" . $_POST['chart_date'] . "' AND"
                                . " chart_time='" . $_POST['chart_time'] . "'";

                        $_POST['modify_id'] = $_SESSION['sess_user_name'];
                        $_POST['modify_time'] = date('Y-m-d H:i:s');
                        $obj->setDataArray($_POST);
                        if ($obj->updateDataFromInternalArray($_POST['prescr_nr'])) {
                            echo 'Update Success!';
                        } else {
                            echo "Update Failed!";
                        }
                    } else {
                        echo "Save Failed!";
                    }
                } else {
                    echo "Save Failed!";
                }
            }
            break;
    }// end of switch
} else {
    echo "Database Connection Failed<br>";
}
?>