














<?php
$bat_nr = (isset($bat_nr) ? $bat_nr : null);
$claims_obj->Display_Header($LDNewQuotation, $enc_obj->ShowPID($bat_nr), '');
?>
<style>
    /*###Desktops, big landscape tablets and laptops(Large, Extra large)####*/
    @media screen and (min-width: 1024px){
        /*Style*/
        .container{
            max-width: 1024px;
        }
    }

    /*###Tablet(medium)###*/
    @media screen and (min-width : 768px) and (max-width : 1023px){
        /*Style*/
        .container{
            max-width: 768px;
        }
    }

    /*### Smartphones (portrait and landscape)(small)### */
    @media screen and (min-width : 0px) and (max-width : 767px){
        /*Style*/
        .container{
            max-width: 767px;
        }
    }
</style>
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
<BODY bgcolor="#ffffff" link="#000066" alink="#cc0000" vlink="#000066" onLoad="javascript:setBallon('BallonTip', '', '');">

    <?php $claims_obj->Display_Headline('NHIF Claims Report From '.date('d-M-Y', strtotime($_POST['date_from'])).' To '.date('d-M-Y', strtotime($_POST['date_to'])), '', '', 'Nhif_pending_claims.php', 'Claims :: Pending Claims'); ?>
    <!--Date starts here-->


    <!--datatables-->
    <script src="<?php echo $root_path; ?>assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $root_path; ?>assets/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo $root_path; ?>assets/datatables/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <link href="<?php echo $root_path; ?>assets/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <!--Bootstrap-->
    <link rel="stylesheet" href="<?php echo $root_path; ?>assets/bootstrap/css/bootstrap.min.css" >
    <script src="<?php echo $root_path; ?>assets/bootstrap/js/popper.min.js" ></script>
    <script src="<?php echo $root_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $root_path; ?>assets/datatables/plugins/fixedHeader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
    <link href="<?php echo $root_path; ?>assets/datatables/plugins/fixedHeader/css/fixedHeader.dataTables.min.css" rel="stylesheet" type="text/css"/>

    <link href="<?php echo $root_path; ?>assets/datatables/plugins/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo $root_path; ?>assets/datatables/plugins/responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <!--Datepicker-->
    <script src="<?php echo $root_path; ?>assets/datatables/plugins/responsive/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
    <!-- Bootstrap Date-Picker Plugin -->
    <link href="<?php echo $root_path; ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo $root_path; ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

    <script>
    $(document).ready(function () {
        var date_from = $('input[name="date_from"]'); //our date input has the name "date"
        var date_to = $('input[name="date_to"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        var options = {
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            showDropdowns: true,
        };
        date_from.datepicker(options);
        date_to.datepicker(options);
    })
    </script>
    <script type="text/javascript"><?php require($root_path . 'include/inc_checkdate_lang.php'); ?>
    </script>
    <script language="javascript" src="<?php echo $root_path; ?>js/setdatetime.js"></script>
    <script language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>
    <script language="javascript" src="<?php echo $root_path; ?>js/dtpick_care2x.js"></script>
    <div class="container">        
        <div class="row">
            <div class="col">
                <form name="form1" class="form-inline"  action="" method="POST" onSubmit=" return CheckTarehe();">
                    <table class="table">   
                        <tr>  
                            <th> 
                                <div class="alert alert-info">
                                    <strong>ONE MONTH SUBMITTED CLAIMS IS SELECTED BY DEFAULT, TO SEARCH MORE CLAIMS CHOOSE DATE BELOW.</strong>
                                </div>

                            </th>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                $_POST['date_from'] = (isset($_POST['date_from']) ? $_POST['date_from'] : isset($_REQUEST['date_from']) ? $_REQUEST['date_from'] : NULL);
                                $in_outpatient = (isset($_POST['in_outpatient']) ? $_POST['in_outpatient'] : $in_outpatient);
                                ?>
                                <input type="hidden" name="in_outpatient"  value="<?php echo $in_outpatient; ?>" >
                                <div class="bootstrap-iso">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">

                                                <!-- Form code begins -->

                                                <div class="form-group"> <!-- Date input -->
                                                    <label class="control-label" for="date_from">From Date</label>
                                                    <input class="form-control" id="date_from" name="date_from" placeholder="MM/DD/YYY" type="text" value="<?php echo $_POST['date_from']; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="date">To</label>
                                                    <input class="form-control" id="date_to" name="date_to" placeholder="MM/DD/YYY" type="text" value="<?php echo $date_to; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4 col-xs-12">
                                                <div class="form-group"> <!-- Submit button -->
                                                    <button class="btn btn-primary " name="submit" type="submit">Show</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4 col-xs-12">
                                                <div class="form-group"> <!-- Submit button -->
                                                    <a href="<?php echo $root_path; ?>modules/nhif/export_csv_submited_claims.php?date_from=<?=$_POST['date_from']?>&date_to=<?=$_POST['date_to']?>"><button class="btn btn-primary "  type="button">Export</button></a>

                                                </div>
                                            </div>



                                        </div>    
                                    </div>
                                </div>


                            </td>

                        </tr>
                    </table>

                </form>
            </div>
        </div>
        <div class="row">
            <!--Date ends here-->

            <?php
            if (!isset($mode))
                $mode = '';
            if (isset($_POST['export_csv'])) {
                $claims_obj->test(array('sid' => $sid, 'date_from' => $_POST['date_from'], 'date_to' => $_POST['date_to']));
            }
            ?>

            <div style="" class="col-lg-12 col-12">
                <table width="100%"  id="example"  cellspacing=0  class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th><strong><?= $LDFolioNo ?></strong></th>
                            <th><strong><?php echo $LDFullName; ?></strong></th>                            
                            <th><strong><?php echo $LDCardno; ?></strong></th>
                            <th><strong><?= $LDRegistration ?></strong></th>
                            <th><strong>Investigation</strong></th>
                            <th><strong>Outpatient <br>Charges</strong></th>
                            <th><strong>Surgery</strong></th>
                            <th><strong>Days <br>Admitted</strong></th>
                            <th><strong>Inpatient <br>Charges</strong></th>
                            <th><strong>Total</strong></th>
                            <th><div align="center"><strong><?php echo $LDInfo; ?></strong></div></th>

                        </tr>
                    </thead>

                    <TBODY>

                        <?php
                        require_once($root_path . 'include/inc_date_format_functions.php');

                        if (!isset($_POST['date_from']) || is_null($_POST['date_from']) || $_POST['date_from'] == '' || empty($_POST['date_from'])) {
                            $_POST['date_from'] = date('Y-m') . '-01';
                        } else {
                            list($month, $day, $year) = explode('/', $_POST['date_from']);
//                    $_POST['date_from'] = $year . '-' . $month . '-' . $day;
                        }
                        if (!isset($_POST['date_to']) || is_null($_POST['date_to']) || $_POST['date_to'] == '' || empty($_POST['date_to'])) {
                            $_POST['date_to'] = date('Y-m-d');
                        } else {
                            list($month, $day, $year) = explode('/', $_POST['date_to']);
//                    $_POST['date_to'] = $year . '-' . $month . '-' . $day;
                        }
                        $total_registration = 0;
                        $total_investigation = 0;
                        $total_outpatient_charges = 0;
                        $total_registration = 0;
                        $total_surgery = 0;
                        $total_registration = 0;
                        $total_days_admitted = 0;
                        $total_inpatient_charges = 0;
                        $grant_total = 0;

                        $submitted_claims_query = $claims_obj->GetSubmittedClaims(array('sid' => $sid, 'date_from' => $_POST['date_from'], 'date_to' => $_POST['date_to']));
                        if (!is_null($submitted_claims_query)) {
                            while ($row = $submitted_claims_query->FetchRow()) {
                                if ($row['sex'] == 'm'or $row['sex'] == 'M') {
                                    $row['sex'] = 'Male';
                                } elseif ($row['sex'] == 'f' OR $row['sex'] == 'F') {
                                    $row['sex'] = 'Female';
                                }

                                $registration_charges = $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'like_items' => array('%cons-%')));
                                $total_registration += $registration_charges;
                                $investigation_charges = $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'purchasing_class' => array('xray', 'labtest')));
                                $total_investigation += $investigation_charges;
                                $outpatient_charges = $row['encounter_class_nr'] == 2 ? $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'exclude_purchasing_class' => array('xray', 'labtest', 'minor_proc_op', 'surgical_op', 'eye-surgery', 'dental'), 'not_like_items' => array('%cons-%'))) : '';
                                $total_outpatient_charges += $outpatient_charges;
                                $surgery_charges = $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'purchasing_class' => array('minor_proc_op', 'surgical_op', 'eye-surgery', 'dental', 'eye-service')));
                                $total_surgery += $surgery_charges;

                                $admission_date = new DateTime($row['encounter_date']);

                                $discharge_date = new DateTime($row['discharge_date']);

                                $days_admitted = $admission_date->diff($discharge_date);
                                $total_days_admitted += $days_admitted->days;
                                $inpatient_charges = $row['encounter_class_nr'] == 1 ? $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no'], 'exclude_purchasing_class' => array('xray', 'labtest', 'minor_proc_op', 'surgical_op', 'eye-surgery', 'dental'), 'not_like_items' => array('%cons-%'))) : '';
                                $total_inpatient_charges += $inpatient_charges;
                                $grant_charges = $claims_obj->GetSumAmoutClaimed(array('encounter_nr' => $row['visit_no']));
                                $grant_total += $grant_charges;

//                        echo 'Difference: ' . $difference->y . ' years, '
//                        . $difference->m . ' months, '
//                        . $date_difference->days . ' days';
//
//                        print_r($difference);
                                ?>
                                <tr>
                                    <td ><?= $row['FolioNo'] ?></td>
                                    <td ><?= ucfirst(strtolower($row['fullname'])) ?></td>
                                    <td ><?= $row['membership_nr'] ?></td>
                                    <td style="text-align: right"><?= $registration_charges ?></td>
                                    <td style="text-align: right"><?= $investigation_charges ?></td>
                                    <td style="text-align: right"><?= $outpatient_charges ?></td>
                                    <td style="text-align: right"><?= $surgery_charges ?></td>
                                    <td style="text-align: right"><?= $row['encounter_class_nr'] == 1 ? $days_admitted->days : '' ?></td>
                                    <td style="text-align: right"><?= $inpatient_charges ?></td>
                                    <td style="text-align: right"><?= $grant_charges ?></td>
                                    <td ><div align="center">
                                            <a href="../../modules/nhif/nhif_pass.php<?= URL_APPEND ?>&patient=<?= $row['encounter_class_nr'] ?>&lang=en&target=claimsdetails&encounter_nr=<?= $row['visit_no'] ?>&date_from=<?= $date_from ?>&date_to=<?= $date_to ?>" title="Visit Details : Click to show data"><button type="button">>></button></a>
                                        </div>
                                    </td>

                                </tr>

                                <?php
                            }
                        }
//                $claims_obj->ShowPendingClaims($in_outpatient, $sid, $_POST['date_from'], $_POST['date_to']);
                        ?>
                    </TBODY>
                    <tfoot class="thead-light">
                        <tr>                            
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="text-align: right"><?= $total_registration ?></th>
                            <th style="text-align: right"><?= $total_investigation ?></th>
                            <th style="text-align: right"><?= $total_outpatient_charges ?></th>
                            <th style="text-align: right"><?= $total_surgery ?></th>
                            <th style="text-align: right"><?= $total_days_admitted ?></th>
                            <th style="text-align: right"><?= $total_inpatient_charges ?></th>
                            <th style="text-align: right"><?= $grant_total ?></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#example').DataTable(
                    {
//                                                scrollY: "300px",
                        scrollX: true,
                        scrollCollapse: true,
                        fixedHeader: {
                            header: false,
                            footer: false
                        },
                        responsive: true,
                        columnDefs: [
                            {responsivePriority: 1, targets: 0},
                            {responsivePriority: 2, targets: -1},
                            {responsivePriority: 3, targets: -2}
                        ]
                    });
        });
    </script>
    

    <?php $claims_obj->Display_Footer($LDCreatenewquotation, '', '', 'billing_create_2.php', 'Billing :: Create Quotation'); ?>

    <?php $claims_obj->Display_Credits(); ?>
