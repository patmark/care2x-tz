<!--<script type="text/javascript" src="<?php echo $root_path; ?>js/jquery.1.10.js"></script>-->
<script type="text/javascript">

    function approove_claim(encounter_nr) {
        ProgressCreate(10);
        $(document).ready(function () {
            $.ajax({
                url: "<?php echo $root_path; ?>modules/nhif/approve_claim.php",
                type: 'GET',
                data: {encounter_nr: encounter_nr},
                success: function (data) {
                    ProgressDestroy();
                    $("#approve_link").html(data);
                }
            });
        });
    }
</script>
<?php
$bat_nr = (isset($bat_nr) ? $bat_nr : null);
$claims_obj->Display_Header($LDNewQuotation, $enc_obj->ShowPID($bat_nr), '');
?>

<BODY bgcolor="#ffffff" link="#000066" alink="#cc0000" vlink="#000066" onLoad="javascript:setBallon('BallonTip', '', '');">

    <?php $claims_obj->Display_Headline($LDPendingClaims, '', '', 'Nhif_pending_claims.php', 'Claims :: Pending Claims'); ?>
    <!--Date starts here-->
    <script type="text/javascript">
        function CheckTarehe() {
            var date_from = document.getElementById("date_from").value;
            var date_to = document.getElementById("date_to").value;

            if (date_from == '') {
                alert("Date empty");
                return false;
            } else if (date_to == '') {
                alert("Date empty");
                return false;

            } else if (date_from > date_to) {
                alert("incorrect date");
                return false;

            }

        }

    </script>
    <script>
        window.setTimeout(function () {
            $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 5000);
    </script>
    <link rel="stylesheet" href="<?php echo $root_path; ?>assets/bootstrap/css/bootstrap.min.css" >
    <script src="<?php echo $root_path; ?>assets/bootstrap/js/jquery-3.2.1.slim.min.js" ></script>
    <script src="<?php echo $root_path; ?>assets/bootstrap/js/popper.min.js" ></script>
    <script src="<?php echo $root_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript"><?php require($root_path . 'include/inc_checkdate_lang.php'); ?>
    </script>
    <script language="javascript" src="<?php echo $root_path; ?>js/setdatetime.js"></script>
    <script language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>
    <script language="javascript" src="<?php echo $root_path; ?>js/dtpick_care2x.js"></script>


    <?php
    if ($page_action == 'approve') {
        echo $claims_obj->add_nhif_claim(array('encounter_nr' => $encounter_nr));
    }
    $claims_details_query = $claims_obj->ShowPendingClaimsDetails(array('in_outpatient' => $in_outpatient, 'encounter_nr' => $encounter_nr));

    if (!is_null($claims_details_query)) {
        $claims_details = $claims_details_query->fields;



//        print_r($claims_details);
        ?>

        <style>
            .wrapper{
                line-height: 150%;
                /*width: 277mm;*/ 
                background-color: #59f7f2;
            }
            .center{
                text-align: center;
            }
            .left{text-align: left;}
            .right{
                text-align: right;
            }
            .logo{
                width: 24mm;
            }
            .title1{
                font-size: 20px;
                font-weight: bold;
            }
            .title2{
                font-size: 16px;
                font-weight: bold;
            }
            .undeline_sapn{
                border-bottom: 2px dotted;
                padding-right: 10px;
                padding-left: 10px;
                width: 100%;
            }
            .shade-light{
                height: 10mm;
                background-color:  lightgray;
            }
            table {
                table-layout: auto;
                border-collapse: collapse;
                width: 98%;
            }
            .table-lebel{
                padding-right: 10mm;
            }
            .table-lebel td{
                white-space: nowrap;  /** added **/
            }
            .table-lebel td:last-child{
                width:100%;
                padding-left: 5mm;
                border-bottom: 2px dotted;
            }

        </style>
        <?php
//        print_r($claims_details);
//
//        echo $encounter_nr;
        ?>

        <div class="row">
            <div class="col-4"> 
                <a href="../../modules/nhif/nhif_pass.php<?= URL_APPEND ?> &patient=<?= $in_outpatient ?> &lang=en&target=claimsdetails&page_action=resfresh&encounter_nr=<?= $encounter_nr ?>&date_from=<?= $date_from ?>&date_to=<?= $date_to ?>" title="Refresh Details"><input type="submit" class="btn btn-info btn-block" name="show" value="Refresh"></a>
            </div>
            <div class="col-4">
                <a href="../../modules/nhif/nhif_pass.php<?= URL_APPEND ?> &patient=<?= $in_outpatient ?> &lang=en&target=review&encounter_nr=<?= $encounter_nr ?>&date_from=<?= $date_from ?>&date_to=<?= $date_to ?>" title="Back to List"><input type="submit" class="btn btn-info btn-block" name="show" value="Back to List"></a>
            </div>
            <div class="col-4">
                <?php
                $nhif_claims_query = $claims_obj->get_nhif_claimes_claimed(array('encounter_nr' => $encounter_nr));

                if (!is_null($nhif_claims_query)) {
                    ?>
                    <a href="../../modules/nhif/nhif_pass.php<?= URL_APPEND ?> &patient=<?= $in_outpatient ?> &lang=en&target=send&encounter_nr=<?= $encounter_nr ?>&date_from=<?= $date_from ?>&date_to=<?= $date_to ?>" title="Send Claim to NHIF"><input type="submit" class="btn btn-info btn-block" name="show" value="Submit Claim"></a>
                    <?php
                } else {
                    ?>
                    <a href="../../modules/nhif/nhif_pass.php<?= URL_APPEND ?> &patient=<?= $in_outpatient ?> &lang=en&target=claimsdetails&page_action=approve&encounter_nr=<?= $encounter_nr ?>&date_from=<?= $date_from ?>&date_to=<?= $date_to ?>" title="Approve Claim"><input type="submit" class="btn btn-info btn-block" name="show" value="Approve"></a>
                    <?php
                }
                ?>

            </div>
        </div>
        <div class="row">
            <table border="0" width="100%" cellspacing="1" cellpadding="1" style="background-color: azure" >
                <tr>
                    <td>
                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td rowspan="3" class="left logo" >
                                    <img class="logo" src="<?php echo $root_path; ?>modules/nhif/images/NHIF_logo.jpg" alt="NHIF Logo"/>
                                </td>
                                <td class="center title1">CONFIDENTIAL</td>
                                <td class="center" rowspan="2">Form NHIF 2A&B<br> Regulation 18(1)</td>
                            </tr>
                            <tr>                                        
                                <td class="center title1">THE NHIF - HEALTH PROVIDER IN//OUT PATIENT CLAIM FORM</td>

                            </tr>
                            <tr>                                        
                                <td class="right">Serial No. 13/14</td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th>A: PARTICULARS:</th>   
                </tr>
                <tr>
                    <td>
                        <table border="0" width="100%" cellspacing="0" cellpadding="0">

                            <tr>
                                <td><table class="table-lebel" ><tr><td>1. Name of Hospital/Health Centers/Disp</td> <td></td></tr></table></td>
                                <td><table class="table-lebel" ><tr><td>2. NHIF Acredition No:</td> <td><?= $_SESSION['facility_code'] ?></td></tr></table></td>
                            </tr>
                            <tr>
                                <td><table class="table-lebel" ><tr><td>3. Address:</td> <td></td></tr></table></td>
                                <td><table class="table-lebel" ><tr><td>4. Registration Fees:</td> <td></td></tr></table></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td><table class="table-lebel" ><tr><td>5. Name of Patient:</td> <td><?= strtoupper($claims_details['name_first']) ?> <?= strtoupper($claims_details['name_middle']) ?> <?= strtoupper($claims_details['name_last']) ?></td></tr></table></td>
                                            <td><table class="table-lebel" ><tr><td>6. Age:</td> <td></td></tr></table></td>
                                            <td> <table class="table-lebel" ><tr><td>7. Sex:</td> <td><?= strtoupper($claims_details['sex']) ?></td></tr></table></td>
                                        </tr>
                                    </table>
                                </td>
                                <td><table class="table-lebel" ><tr><td>8. Membership No.:</td> <td><?= $claims_details['membership_nr'] ?></td></tr></table></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td><table class="table-lebel" ><tr><td>9. Occupation:</td> <td></td></tr></table></td>
                                <td><table class="table-lebel" ><tr><td>10. Type of illness(code):</td> <td>
                                                <?php
                                                $claims_diagnosis_query = $claims_obj->get_diagnosis(array('pid' => $claims_details['pid'], 'encounter_nr' => $encounter_nr));
                                                if (!is_null($claims_diagnosis_query)) {
                                                    while ($row = $claims_diagnosis_query->FetchRow()) {
                                                        echo $row['ICD_10_code'] . ',';
                                                    }
                                                }
                                                ?>
                                            </td></tr></table>
                                </td>
                                <td> <table class="table-lebel" ><tr><td>11. Date of Attendance:</td> <td><?= $claims_details['encounter_date'] ?></td></tr></table></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th>B: COST OF SERVICE</th>
                </tr>
                <tr>
                    <td>

                        <table cellpadding=0 cellspacing=0 border=1 height="200" width="100%">
                            <thead>
                                <tr class="shade-light">
                                    <th class="center">INVESTIGATION</th>
                                    <th class="center">MEDICINE/DRUGS</th>
                                    <th class="center">SURGERY/SERVICES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding:0;margin:0">
                                        <table cellpadding=5 cellspacing=0 border=1 height="100%" width="100%" style="width:100% !important;">
                                            <THEAD>
                                                <tr style="height:10mm;">
                                                    <th class="center">Type</th>
                                                    <th class="center">Codes</th>
                                                    <th class="center">Costs</th>
                                                </tr>
                                            </THEAD>
                                            <tbody>
                                                <?php
                                                $investigation_total_cost = 0;
                                                $claims_diagnosis_query = $claims_obj->get_labtest(array('pid' => $claims_details['pid'], 'encounter_nr' => $encounter_nr));
                                                if (!is_null($claims_diagnosis_query)) {

                                                    while ($row = $claims_diagnosis_query->FetchRow()) {
                                                        $investigation_total_cost = $investigation_total_cost + intval($row['unit_price_1']);
                                                        ?>
                                                        <tr style="height:7mm;">
                                                            <td ></td>
                                                            <td><?= $row['item_number'] ?></td>
                                                            <!--<td><?ph $row['nhif_item_code']?></td>-->
                                                            <td class="right"><?= number_format($row['unit_price_1']) ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <?php ?>

                                                <tr class="shade-light" >
                                                    <th colspan="2"  class="center">SUB TOTAL</th>
                                                    <th class="right"><?= $investigation_total_cost != 0 ? number_format($investigation_total_cost) : '' ?></th>                                                
                                                </tr>
                                            </tbody>
                                        </table>                                    
                                    </td>
                                    <td style="padding:0;margin:0">
                                        <table cellpadding=5 cellspacing=0 border=1 height="100%" style="width:100% !important;">
                                            <THEAD>
                                                <tr style="height:10mm;">
                                                    <th class="center">Type(Generic)</th>
                                                    <th class="center">Codes</th>
                                                    <th class="center">Quantity of Drugs</th>
                                                    <th class="center">Costs</th>
                                                </tr>
                                            </THEAD>
                                            <tbody>
                                                <?php 
                                                $drugs_total_cost = 0;
                                                $claims_drugs_details_query = $claims_obj->get_claimed_drugs(array('pid' => $claims_details['pid'], 'encounter_nr' => $encounter_nr));
                                                if (!is_null($claims_drugs_details_query)) {
                                                    while ($claims_drugs_row = $claims_drugs_details_query->FetchRow()) {
                                                        $drugs_total_cost = $drugs_total_cost + intval($claims_drugs_row['unit_price_1'] * $claims_drugs_row['total_dosage']);
                                                        ?>
                                                        <tr style="height:7mm;">
                                                            <!--<td ><?= $claims_drugs_row['item_full_description']. $claims_drugs_row['encounter_nr']?></td>-->
                                                            <td ><?= $claims_drugs_row['item_full_description'] ?> </td>
                                                            <td class="center"><?= $claims_drugs_row['item_number'] ?></td>
                                                            <!--<td class="center"><?ph $row['nhif_item_code']?></td>-->
                                                            <td class="center"><?= $claims_drugs_row['total_dosage'] ?></td>
                                                            <td class="right"><?= number_format($claims_drugs_row['unit_price_1'] * $claims_drugs_row['total_dosage']) ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr class="shade-light" >
                                                    <th colspan="3"  class="center">SUB TOTAL</th>
                                                    <th class="right"><?= $drugs_total_cost != 0 ? number_format($drugs_total_cost) : '' ?></th>                                                
                                                </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                    <td>
                                        <table cellpadding=5 cellspacing=0 border=1 height="100%" style="width:100% !important;">
                                            <THEAD>
                                                <tr style="height:10mm;">
                                                    <th class="center">Type of surgery</th>
                                                    <th class="center">Codes</th>
                                                    <th class="center">Costs</th>
                                                </tr>
                                            </THEAD>
                                            <tbody>
                                                <?php 
                                                $surgery_service_total_cost = 0;
                                                $claims_surgery_service_query = $claims_obj->get_claimed_surgery_and_services(array('pid' => $claims_details['pid'], 'encounter_nr' => $encounter_nr));
                                                if (!is_null($claims_surgery_service_query)) {


                                                    while ($row = $claims_surgery_service_query->FetchRow()) {
                                                        $surgery_service_total_cost = $surgery_service_total_cost + intval($row['unit_price_1'] * $row['total_dosage']);
                                                        ?>
                                                        <tr style="height:7mm;">
                                                            <td ><?= $row['item_full_description'] ?></td>
                                                            <td class="center"><?= $row['item_number'] ?></td>
                                                            <!--<td><?ph $row['nhif_item_code']?></td>-->
                                                            <td class="right"><?= number_format($row['unit_price_1']) ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr class="shade-light" >
                                                    <th colspan="2"  class="center">SUB TOTAL</th>
                                                    <th class="right"><?= $surgery_service_total_cost != 0 ? number_format($surgery_service_total_cost) : '' ?></th>                                                
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr >
                                    <td colspan="2"></td>
                                    <td>
                                        <table cellpadding=5 cellspacing=0 border=1 height="100%" style="width:100% !important;">
                                            <tr class="shade-light">
                                                <th>
                                                    GRAND TOTAL                                                
                                                </th>
                                                <th class="right">
                                                    <?= number_format($investigation_total_cost + $drugs_total_cost + $surgery_service_total_cost) ?>
                                                </th>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <th><table class="table-lebel" ><tr><td>C: Name of attending Clinician:</td> <td></td></tr></table></th>
                                <td><table class="table-lebel" ><tr><td>Qualification:</td> <td></td></tr></table></td>
                                <td><table class="table-lebel" ><tr><td>Signature:</td> <td></td></tr></table></td>
                            </tr>

                        </table>

                    </td>
                </tr>
                <tr>
                    <th>D: Patient Certification</th>
                </tr>
                <tr>
                    <td>
                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><table class="table-lebel" ><tr><td>I certify that I received the above named services. Name:</td><td><?= strtoupper($claims_details['name_first']) ?> <?= strtoupper($claims_details['name_middle']) ?> <?= strtoupper($claims_details['name_last']) ?></td></tr></table></td>
                                <td><table class="table-lebel" ><tr><td>Signature:</td> <td></td></tr></table></td>
                                <td><table class="table-lebel" ><tr><td>Tel. No:</td> <td><?= $claims_details['phone_1_nr'] ?></td></tr></table></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th><table class="table-lebel" ><tr><td>E: Description of Out/In-patient Management/any Other additional information (a separate sheet can be used):</td> <td></td></tr></table></th>
                </tr>
                <tr>
                    <th>
                        F: Claimant Certification:
                    </th>
                </tr>
                <tr>
                    <td>
                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><table class="table-lebel" ><tr><td>I certify that I provided the above service.  Name:</td> <td><?= $claims_details['doctor_name'] ?></td></tr></table></td>
                                <td><table class="table-lebel" ><tr><td>Signature:</td> <td</td></tr></table></td>
                                <td><table class="table-lebel" ><tr><td>Official Stamp:</td> <td></td></tr></table></td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td>
                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <th>NB:</th>
                                <th>Fill in Triplicate and please submit the original form on monthly basis, and the claim be attached with Monthly Report.<br>Any falsified information may subject you to prosecution in accordance with NHIF Act No. 8 of 1999.</th>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-6">
                <form name="form1" action="" method="POST" onSubmit=" return CheckTarehe();">
                    <input type="submit" class="btn btn-info btn-block" name="show" value="Refresh">
                </form>
            </div>
            <div class="col-6">
                <?php
                $nhif_claims_query = $claims_obj->get_nhif_claimes_claimed($filter_data = array('encounter_nr' => $encounter_nr));

                if (!is_null($nhif_claims_query)) {
                    ?>
                    <a href="../../modules/nhif/nhif_pass.php<?= URL_APPEND ?> &patient=<?= $in_outpatient ?> &lang=en&target=send&encounter_nr= <?= $encounter_nr ?>" title="Send Claim to NHIF"><input type="submit" class="btn btn-info btn-block" name="show" value="Submit"></a>
                    <?php
                } else {
                    ?>
                    <a href="../../modules/nhif/nhif_pass.php<?= URL_APPEND ?> &patient=<?= $in_outpatient ?> &lang=en&target=claimsdetails&page_action=approve&encounter_nr= <?= $encounter_nr ?>" title="Send Claim to NHIF"><input type="submit" class="btn btn-info btn-block" name="show" value="Approve"></a>
                        <?php
                    }
                    ?>

            </div>
        </div>
        <?php
    }
    ?>


    <?php $claims_obj->Display_Footer($LDCreatenewquotation, '', '', 'billing_create_2.php', 'Billing :: Create Quotation'); ?>

    <?php $claims_obj->Display_Credits(); ?>
    