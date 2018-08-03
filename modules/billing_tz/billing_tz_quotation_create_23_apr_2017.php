<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
//error_reporting(0);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2005 Robert Meggle based on the development of Elpidio Latorilla (2002,2003,2004,2005)
 * elpidio@care2x.org, meggle@merotech.de
 *
 * See the file "copy_notice.txt" for the licence notice
 */
//define('LANG_FILE','billing.php');
$lang_tables[] = 'billing.php';
$lang_tables[] = 'aufnahme.php';
//include($root_path.'include/inc_load_lang_tables.php');
require($root_path . 'include/inc_front_chain_lang.php');

require_once($root_path . 'include/care_api_classes/class_encounter.php');
require_once($root_path . 'include/care_api_classes/class_person.php');
require_once($root_path . 'include/care_api_classes/class_tz_billing.php');
//$billing_tz = new Bill();
require_once($root_path . 'include/care_api_classes/class_tz_insurance.php');
//$insurance_tz = new Insurance_tz();
require_once($root_path . 'include/care_api_classes/class_tz_drugsandservices.php');
//require_once($root_path.'include/care_api_classes/class_tz_insurance_reports.php');
//$insurance_tz_report = new Insurance_Reports_tz();
$per_obj = new Person;
$enc_obj = new Encounter;
$bill_obj = new Bill;
$insurance_obj = new Insurance_tz;
$drg_obj = new DrugsAndServices;
Global $company_id;
$user_origin = 'quotation';
$clear_bill = $_POST['clear_bill'];
$balance = $_POST['balance'];
$bank=$_POST['bank'];
$debug = FALSE;
($debug) ? $db->debug = TRUE : $db->debug = FALSE;

if ($debug) {
    echo "task:" . $task . "<br>";
}

$IS_PATIENT_INSURED = $insurance_obj->is_patient_insured($pid);
//$enc_obj->LoadEncounterData();
//$IS_PATIENT_INSURED=$insurance_obj->is_patient_insured($enc_obj->ShowPID($bat_nr));


if ($debug)
    echo "<b>billing_tz_quotation_create.php</b>";

//$task="insert";
$billcounter = 0;
if ($task == "insert") {
    if ($debug)
        echo "TASK:INSERT";
    $deletecounter = 0;

    while (list($x, $v) = each($_POST)) {//echo print_r($_POST);
        if ($debug)
            echo "looking for: " . $x . "  " . $v . "<br>";

        if (strstr($x, "modepres_")) {

            $prescriptions_nr = substr(strrchr($x, "_"), 1);

            $dosageNew = $_POST['dosage_' . $prescriptions_nr];
            $timesPerDayNew = $_POST['times_per_day_' . $prescriptions_nr];
            $daysNew = $_POST['days_' . $prescriptions_nr];

            $result = $bill_obj->GetNewQuotation_Prescriptions($encounter_nr, $in_outpatient);
            //$sqlQuery = "SELECT dosage, times_per_day, days, price, bill_number, drug_class FROM care_encounter_prescription WHERE nr=$prescriptions_nr";
            //$result=$db->Execute($sqlQuery);
            if ($result)
                $row = $result->FetchRow();

            $dosageOld = $row['dosage'];
            $timesPerDayOld = $row['times_per_day'];
            $daysOld = $row['days'];

            $old_bill_nr = $row['bill_number'];
            $drug_class = $row['drug_class'];


            $comment = $_POST['notes_' . $prescriptions_nr];
            $user = $_SESSION['sess_user_name'];

            if ($_POST['modepres_' . $prescriptions_nr] == 'bill') {
                $billcounter++;
                //Okay, this one has to be billed!
                if (!isset($new_bill_number)) {
                    $new_bill_number = $bill_obj->CreateNewBill($encounter_nr);
                }
                if ($debug)
                    echo "insurance_$prescriptions_nr" . $_POST['insurance_' . $prescriptions_nr] . "<br>";
                if ($debug)
                    echo "insurance:" . $_POST['insurance'] . "<br>";
                if ($debug)
                    echo "showprice_$prescriptions_nr :" . $_POST['showprice_' . $prescriptions_nr] . "<br>";
                $price = $_POST['showprice_' . $prescriptions_nr];
                //echo $_POST['price_'.$prescriptions_nr];
                if ($debug)
                    echo 'times per day: ' . $_POST['times_per_day_' . $prescriptions_nr] . '<br>';
                if ($debug)
                    echo 'days: ' . $_POST['days_' . $prescriptions_nr] . '<br>';
                if ($debug)
                    echo 'unit_price: ' . $_GET['unit_price'] . '<br>'; // <=== This is the selected pricelist!!!

                if ($dosageOld != $dosageNew)
                    $insurance_obj->trackChanges('billing', $new_bill_number, 'prescription', $prescriptions_nr, 'change', $dosageOld, $dosageNew, 'dosage', $comment, $user);

                if ($timesPerDayOld != $timesPerDayNew)
                    $insurance_obj->trackChanges('billing', $new_bill_number, 'prescription', $prescriptions_nr, 'change', $timesPerDayOld, $timesPerDayNew, 'times per day', $comment, $user);

                if ($daysOld != $daysNew)
                    $insurance_obj->trackChanges('billing', $new_bill_number, 'prescription', $prescriptions_nr, 'change', $daysOld, $daysNew, 'days', $comment, $user);

                $bill_obj->StorePrescriptionItemToBill($pid, $prescriptions_nr, $new_bill_number, $_POST['insurance_' . $prescriptions_nr], $_GET['unit_price'],$bank);


                $bill_obj->UpdateBillNumberNewPrescription($prescriptions_nr, $new_bill_number);
                //$bill_obj->deduct_from_stock($prescriptions_nr,$_POST['dosage_'.$prescriptions_nr]);
                if ($debug)
                    echo "Prescription: allocate2insurance(" . $new_bill_number . ", " . $_POST['showprice_' . $prescriptions_nr] . "," . $_POST['insurance'] . ");";
                if ($_POST['insurance'] != -1)
                    $insurance_obj->allocatePrescriptionsToinsurance($new_bill_number, $prescriptions_nr, $_POST['showprice_' . $prescriptions_nr], $_POST['insurance']);
            }
            elseif ($_POST['modepres_' . $prescriptions_nr] == 'delete') {
                $insurance_obj->trackChanges('billing', -1, 'prescription', $prescriptions_nr, 'delete', $dosageOld, '-', 'dosage', $comment, $user);

                $deletecounter++;
                //Hmm, lets kick this one out!
                $bill_obj->DeleteNewPrescription($prescriptions_nr, 'Disabled by billing officer');
            }
        } elseif (strstr($x, "modelab_")) {
            if ($debug)
                echo "looking for lab ...<br>";
            $labtest_nr = substr(strrchr($x, "_"), 1);
            $dosageNew = $_POST['dosage_' . $labtest_nr];
            $timesPerDayNew = $_POST['times_per_day_' . $labtest_nr];
            $daysNew = $_POST['days_' . $labtest_nr];

            $result = $bill_obj->GetNewQuotation_Laboratory($encounter_nr, $in_outpatient);
            if ($result)
                $row = $result->FetchRow();
            $dosageOld = 1;
            $timesPerDayOld = 0;
            $daysOld = 0;

            $old_bill_nr = $row['bill_number'];
            $drug_class = 'labtest';
            $batch_nr = $row['batch_nr'];


            $comment = $_POST['notes_' . $labtest_nr];
            $user = $_SESSION['sess_user_name'];


            if ($_POST['modelab_' . $labtest_nr] == 'bill') {
                $billcounter++;
                //Okay, this one has to be billed!
                if (!$new_bill_number) {
                    $new_bill_number = $bill_obj->CreateNewBill($encounter_nr);
                }

                if ($dosageOld != $dosageNew)
                    $insurance_obj->trackChanges('billing', $new_bill_number, 'laboratory', $labtest_nr, 'change', $dosageOld, $dosageNew, 'dosage', $comment, $user);
                if ($debug)
                    echo "Laboratory: allocate2insurance(" . $new_bill_number . ", $labtest_nr," . $_POST['insurance'] . ");";
                if ($debug)
                    echo "labtest nr." . $labtest_nr . "<br>";
                if ($debug)
                    echo "billnumber: $new_bill_number<br>";
                //if ($debug) echo "labtest nr.: ".$_POST['insurance_'.$labtest_nr]."<br>";
                if ($debug)
                    echo "insurance: " . $_POST['insurance'] . "<br>";

                $bill_obj->StoreLaboratoryItemToBill($pid, $labtest_nr, $batch_nr, $new_bill_number, $_POST['insurance_' . $labtest_nr], $_GET['unit_price'],$bank);

                $bill_obj->UpdateBillNumberNewLaboratory($labtest_nr, $new_bill_number);

                if ($_POST['insurance'] != -1)
                    $insurance_obj->allocateLaboratoryItemsToinsurance($new_bill_number, $labtest_nr, $_POST['showprice_' . $labtest_nr], $_POST['insurance']);
            }
            elseif ($_POST['modelab_' . $labtest_nr] == 'delete') {
                $deletecounter++;
                //Hmm, lets kick this one out!
                $bill_obj->DeleteNewLaboratory($labtest_nr, 'Disabled by billing officer');
            }
        } elseif (strstr($x, "moderad_")) {
            if ($debug)
                echo "looking for rad ...<br>";
            $radtest_nr = substr(strrchr($x, "_"), 1);
            $dosageNew = $_POST['dosage_' . $radtest_nr];
            $timesPerDayNew = $_POST['times_per_day_' . $radtest_nr];
            $daysNew = $_POST['days_' . $radtest_nr];

            $result = $bill_obj->GetNewQuotation_Radiology($encounter_nr, $in_outpatient);
            if ($result)
                $row = $result->FetchRow();
            $dosageOld = 1;
            $timesPerDayOld = 0;
            $daysOld = 0;

            $old_bill_nr = $row['bill_number'];
            $drug_class = 'xray';


            $comment = $_POST['notes_' . $radtest_nr];
            $user = $_SESSION['sess_user_name'];
            if ($_POST['moderad_' . $radtest_nr] == 'bill') {
                $billcounter++;
                //Okay, this one has to be billed!
                if (!$new_bill_number) {
                    $new_bill_number = $bill_obj->CreateNewBill($encounter_nr);
                }

                if ($dosageOld != $dosageNew)
                    $insurance_obj->trackChanges('billing', $new_bill_number, 'radiology', $radtest_nr, 'change', $dosageOld, $dosageNew, 'dosage', $comment, $user);
                if ($debug)
                    echo "Radiology: allocate2insurance(" . $new_bill_number . ", $radtest_nr," . $_POST['insurance'] . ");";
                if ($debug)
                    echo "radtest nr." . $radtest_nr . "<br>";
                if ($debug)
                    echo "billnumber: $new_bill_number<br>";
                //if ($debug) echo "radtest nr.: ".$_POST['insurance_'.$radtest_nr]."<br>";
                if ($debug)
                    echo "insurance: " . $_POST['insurance'] . "<br>";

                $bill_obj->StoreRadiologyItemToBill($pid, $radtest_nr, $new_bill_number, $_POST['insurance_' . $radtest_nr], $_GET['unit_price'],$bank);

                $bill_obj->UpdateBillNumberNewRadiology($radtest_nr, $new_bill_number);

                if ($_POST['insurance'] != -1)
                    $insurance_obj->allocateRadiologyItemsToinsurance($new_bill_number, $radtest_nr, $_POST['showprice_' . $radtest_nr], $_POST['insurance']);
            }
            elseif ($_POST['moderad_' . $radtest_nr] == 'delete') {
                $deletecounter++;
                //Hmm, lets kick this one out!
                $bill_obj->DeleteNewRadiology($radtest_nr, 'Disabled by billing officer');
            }
        }
    }

    if ($billcounter) {
        $sql = 'select pid FROM care_encounter where encounter_nr=' . $encounter_nr;
        $result = $db->Execute($sql);
        $row = $result->FetchRow();
        $batch_nr = $row['pid'];

        if ($clear_bill) {
            if ($balance < 0) {
                $description = 'Refund';
            } else if ($balance > 0) {
                $description = 'Topup';
            }
            $bill_obj->StoreAdvancePaymentToBill($pid, $new_bill_number, 0, $balance, $notes, $description,$bank);
            //transfer bill need to be reviewed
            $bill_obj->FlagDepositItems($new_bill_number);
        } else {
            if ($_POST['insurance'] == -1) {
                if ($balance > 0) {
                    $description = 'Topup';

                    $bill_obj->StoreAdvancePaymentToBill($pid, $new_bill_number, 0, $balance, $notes, $description);
                    //transfer bill need to be reviewed
                    $bill_obj->FlagDepositItems($new_bill_number);
                }if ($balance < 0) {
                    $bill_obj->FlagDepositItems($new_bill_number);
                }
            }
        }

        header("location: billing_tz_edit.php" . URL_APPEND . "&batch_nr=" . $batch_nr . "&bill_number=" . $new_bill_number . "&user_origin=quotation&patient=" . $_REQUEST['patient']);
    } else {
        if ($deletecounter > 0)
            $message = '<font color=red>' . $deletecounter . ' items deleted for ' . $enc_obj->ShowPID($pid) . '.</font>';
        else {
            $message = '<font color=red>?' . $LDNothingToDo . ' ' . $enc_obj->ShowPID($pid) . '.</font>';
            header("location: billing_tz_quotation.php" . $URL_APPEND . "?&message=" . urlencode($message) . "&patient=" . $_REQUEST['patient']);
        }
    }
} // end of if($task=="insert")

if ($debug)
    echo "<br>nothing to do - just show what we have...<br>";

//require_once($root_path.'include/care_api_classes/class_tz_insurance.php');
//$insurance_tz = New Insurance_tz();
// Get actual insurance budget of PID
$matchingContract = $insurance_obj->GetContractMemberFromTimestamp($pid, time());
$matchingBills = $bill_obj->GetBillCostSummaryInTimeframe($pid, $matchingContract['start_date'], time());
$ceiling = $matchingContract['Member']['ceiling'] - $matchingContract['Member']['ceiling_startup_subtraction'];
$used_budget = $matchingBills;
$insurancebudget = $ceiling - $used_budget;



require ("gui/gui_billing_tz_quotation_create.php");
?>
