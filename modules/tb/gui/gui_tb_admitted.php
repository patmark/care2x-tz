
<?php
$bat_nr = (isset($bat_nr) ? $bat_nr : null);
$tb_obj->Display_Header('TB', 'Admitted Patients');
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

    <?php
//echo 'ajkajjajk';
    $tb_obj->Display_Headline(' ' . $title, '', '', 'tb_menu_main.php', 'Claims :: Pending Claims');
    ?>
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
            <!--Date ends here-->

            <?php if (!isset($mode)) $mode = ''; ?>

            <div style="" class="col-lg-12 col-12">


                <table width="100%"  id="example"  cellspacing=0  class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <?php if ($target_fnc == "drtbadmitted") { ?>
                                <th>DR-TB Registration No</th>
                                <th>DR-TB Registration Date</th>
                            <?php } ?>
                            <th>District TB Registration #</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Sex</th>
                            <th>Registration Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <TBODY>

                        <?php
                        require_once($root_path . 'include/inc_date_format_functions.php');

                        while ($tb_admitted_patient = $tb_admitted_patients->FetchRow()) {
                            ?>
                            <tr>
                                <?php if ($target_fnc == "drtbadmitted") { ?>
                                    <td ><?= strtoupper($tb_admitted_patient['drtb_regno']) ?></td>
                                    <td ><?= $tb_admitted_patient['date_districttb_reg'] ?></td>
                                <?php } ?>
                                <td ><?= strtoupper($tb_admitted_patient['district_regno']) ?></td>
                                <td ><?= ucfirst(strtolower($tb_admitted_patient['name_first'])) ?></td>
                                <td ><?= ucfirst(strtolower($tb_admitted_patient['name_middle'])) ?></td>
                                <td ><?= ucfirst(strtolower($tb_admitted_patient['name_last'])) ?></td>
                                <td ><?= $tb_admitted_patient['sex'] ?></td> 
                                <td ><?= $tb_admitted_patient['tb_date_registration'] ?></td>
                                <td ><div align="center">
                                        <a href="<?php echo $root_path; ?>modules/tb/tb_clinic_pass.php<?= URL_APPEND ?>&lang=en&target=menu&pid=<?= strtoupper($tb_admitted_patient['pid']) ?>" title="TB Patient Details : Click to show"><button type="button">>></button></a>
                                    </div>
                                </td>

                            </tr>

                            <?php
                        }
                        ?>
                    </TBODY>
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

    <?php $tb_obj->Display_Footer($LDCreatenewquotation, '', '', 'billing_create_2.php', 'Billing :: Create Quotation'); ?>

    <?php $tb_obj->Display_Credits(); ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

