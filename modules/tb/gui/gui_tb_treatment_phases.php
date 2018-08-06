<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="Author" content="Patrick Mark">

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
            .success {
                color: green;
                font-weight: bold;
            }
            
            

        </style>
        <link rel="stylesheet" href="<?php echo $root_path; ?>assets/bootstrap/css/bootstrap.min.css" >
        <script src="<?php echo $root_path; ?>assets/bootstrap/js/jquery-3.2.1.slim.min.js" ></script>
        <script src="<?php echo $root_path; ?>assets/bootstrap/js/popper.min.js" ></script>
        <script src="<?php echo $root_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>

        <!-- Bootstrap Date-Picker Plugin -->
        <link href="<?php echo $root_path; ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $root_path; ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
                var start_date = $('input[name="start_date"]'); //our date input has the name "date"
                var end_date = $('input[name="end_date"]'); //our date input has the name "date"
                var outcome_date = $('input[name="outcome_date"]'); //our date input has the name "date"
                var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                var options = {
                    format: 'yyyy-mm-dd',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                    showDropdowns: true,
                };
                start_date.datepicker(options);
                end_date.datepicker(options);
                outcome_date.datepicker(options);
            })
        </script>
        <script type="text/javascript"><?php require($root_path . 'include/inc_checkdate_lang.php'); ?>
        </script>
        <script language="javascript" src="<?php echo $root_path; ?>js/setdatetime.js"></script>
        <script language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>
        <script language="javascript" src="<?php echo $root_path; ?>js/dtpick_care2x.js"></script>

        <script language="javascript" type="text/javascript">
            function toggle(element) {
                var image = element.getElementsByTagName('img')[0];
                var content = element.parentNode.getElementsByTagName('table')[0];

                if (content.style.display === 'none') {
                    // wenn es nicht sichtbar ist
                    content.style.display = 'block'; // sichtbar machen
                    image.src = '<?php echo $root_path ?>gui/img/common/default/minus.gif';
                } else {
                    // wenn es bereits sichtbar ist
                    content.style.display = 'none'; // unsichtbar machen
                    image.src = '<?php echo $root_path ?>gui/img/common/default/plus.gif';
                }
            }
            //-------------------------
            function gethelp(x, s, x1, x2, x3, x4) {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php<?php echo URL_APPEND; ?>&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }

            function selectAll() {
                for (var i = 0; i < document.forms[0].length; ++i) {
                    if (document.forms[0].elements[i].options) {
                        if (document.forms[0].elements[i].multiple === true) {
                            for (j = 0; j < document.forms[0].elements[i].length; ++j) {
                                document.forms[0].elements[i].options[j].selected = "selected";
                            }
                        }
                    }
                }
            }

            function insert() {
                var destination_obj = document.forms[0].elements['allergies[]'];
                var source_obj = document.forms[0].elements['insert_allergies'];

                var item_text = trim(source_obj.value);

                if (item_text === "") {
                    alert("Please enter a value!");
                    return false;
                }

                if (check_existance(destination_obj, item_text)) {
                    alert("You have it in the list");
                    return false;
                } else {
                    new_item_obj = new Option(item_text);
                    destination_obj.options[destination_obj.options.length] = new_item_obj;
                    source_obj.value = "";
                }

                return true;
            }

            function trim(sString) {
                while (sString.substring(0, 1) === ' ') {
                    sString = sString.substring(1, sString.length);
                }
                while (sString.substring(sString.length - 1, sString.length) === ' ') {
                    sString = sString.substring(0, sString.length - 1);
                }
                return sString;
            }


            function remove_element() {
                var destination_obj = document.forms[0].elements['allergies[]'];
                if (destination_obj.selectedIndex >= 0) {
                    destination_obj.options[destination_obj.selectedIndex].text = null;
                    destination_obj.options[destination_obj.selectedIndex] = null;
                    return true;
                } else {
                    alert("Please select one item on the right side if you have to remove it");
                    return false;
                }
            }

            function check_existance(destination_obj, item_text) {
                for (var i = 0; i < destination_obj.options.length; i++) {
                    if (destination_obj.options[i].text === item_text) {
                        return true;
                    }
                }
                return false;
            }

            var arr_elements = ["referrer_other", "placeofwork_other", "eptb_site", "classification_byhistory_other", "hiv_details", "date_start_cpt", "date_start_art"];

            function hide_element() {
                i = 0;
                while (arr_elements) {

                    var e = document.getElementById(arr_elements[i]);
                    if (arr_elements[i] === 'hiv_details') {
                        e.style.display = 'none';
                    }
                    var isfilled = e.value;
                    if (isfilled === '') {
                        e.style.display = 'none';
                    }
                    i++;
                }
            }


            function check_other(id, id2) {
                var e = document.getElementById(id);
                var label = document.getElementById(id2);
                val = e.options[e.selectedIndex].text;
                if (val === 'Other (Specify)' || val === 'Others (Specify)') {
                    //alert(val);
                    label.style.display = '';
                } else {  //Hide element and erase/reset the content
                    label.style.display = 'none';
                    label.value = '';
                }
            }

            function check_eptb(id, id2) {
                var e = document.getElementById(id);
                var label = document.getElementById(id2);
                val = e.options[e.selectedIndex].text;

                if (val === 'Extra-pulmonary (EPTB)') {
                    //alert(val);
                    label.style.display = '';
                } else {  //Hide element and erase/reset the content
                    label.style.display = 'none';
                    label.value = '';
                }
            }

            function check_hiv_status(id, id2) {
                var e = document.getElementById(id);
                var label = document.getElementById(id2);
                val = e.options[e.selectedIndex].text;

                if (val === 'Positive') {
                    //alert(val);
                    label.style.display = '';
                } else {  //Hide element and erase/reset the content
                    label.style.display = 'none';
                    label.value = '';
                }
            }

            function check_on_cpt(id, id2) {
                var e = document.getElementById(id);
                var label = document.getElementById(id2);
                val = e.options[e.selectedIndex].text;

                if (val === 'Yes') {
                    //alert(val);
                    label.style.display = '';
                } else {  //Hide element and erase/reset the content
                    label.style.display = 'none';
                    label.value = '';
                }
            }

            function check_transfer_in(id, id2) {
                var e = document.getElementById(id);
                var label = document.getElementById(id2);
                val = e.options[e.selectedIndex].text;
                if (val === 'TRANSFER IN (with records)') {
                    //alert(val);
                    label.style.display = 'block';
                } else {  //Hide element 
                    label.style.display = 'none';
                    //label.value = '';
                }
            }

            function check_transfer_in_data(id, id2) {
                var e = document.getElementById(id);
                var label = document.getElementById(id2);
                val = e.options[e.selectedIndex].text;
                if (val === 'ON TB Care (with records)') {
                    //alert(val);
                    label.style.display = 'block';
                } else {  //Hide element 
                    label.style.display = 'none';
                    //label.value = '';
                }
            }

            function check_joined(id, id2) {
                var e = document.getElementById(id);
                var label = document.getElementById(id2);
                var td = document.getElementById('supporter_organisation_td');
                val = e.options[e.selectedIndex].text;
                if (val === 'Yes') {
                    //alert(val);
                    label.style.display = '';
                    td.style.display = '';
                } else {  //Hide element and erase/reset the content
                    label.style.display = 'none';
                    label.value = '';
                    td.style.display = 'none';
                }
            }

            function check_filled_textbox(id) {
                var e = document.getElementById(id);
                var isfilled = e.value;
                if (isfilled === '' || isfilled === ' ') {
                    var name = e.getAttribute("name");
                    alert("Please fill " + name + " first");
                    e.value = '';
                }
            }


            function redirect_fn(path) {
                window.open(path);
            }
        </script>
        <title>TB Patient Registration</title>
        <link rel="stylesheet" href="<?php echo $root_path; ?>css/themes/default/default.css" type="text/css">
        <style type="text/css">
            body{
                background: #deeef4;
                font-size: 15px;
            }

            .content{
                width: 800px;
                margin: auto;
            }

            .error {
                color: red;
                font-weight: bold;
            }

            fieldset {
                width:775px;
                margin-top:15px;
                margin-left:20px;
                background-color:#E8F2FF;
            }

            .submit{
                background-image: url(<?php echo $root_path; ?>gui/img/control/blue_aqua/en/en_savedisc.gif);
                background-position:  0px 0px;
                background-repeat: no-repeat;
                width: 76px;
                height: 21px;
                border: 0px;
            }

            #facility_name{
                /*border: 1px solid;*/
                color:#9c3619;
                text-align:center;
            }

        </style> 
    </head>
    <body onload = "hide_element()">
        <table cellspacing="0"  class="titlebar" border=0>
            <tr valign=top  class="titlebar" >
                <td bgcolor="#99ccff">
                    <font color="#330066">
                        &nbsp;&nbsp; TB Patient Treatment Phases and Outcomes
                    </font>
                </td>
                <td bgcolor="#99ccff" align=right>
                    <a href="javascript:gethelp('tb_registration.php','<?php echo $src; ?>')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                    &nbsp;
                    <a href="<?php echo $root_path . $breakfile . URL_APPEND . $add_breakfile ?>" ><img src="../../gui/img/control/blue_aqua/en/en_cancel.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>     </td>
            </tr>
        </table>
        <div class="container">
            <div class="row">
                <?php echo $errorMessages ?>
                <fieldset>
                    <legend onClick="toggle(this)"><img src="<?php echo $root_path ?>gui/img/common/default/plus.gif" width="18" height="18" >
                        Facility Information</legend>
                    <table border="0">
                        <tr>
                            <td bgcolor="#F0F8FF" width="40%"><strong>Facility Name:</strong> <?php echo $facility_info['main_info_tb_facility_name']; ?></td>
                            <td bgcolor="#F0F8FF" width="20%"><strong>Facility Code:</strong> <?php echo $facility_info['main_info_tb_facility_code']; ?></td>
                            <td bgcolor="#F0F8FF" width="40%"><strong>District:</strong> <?php echo $facility_info['main_info_tb_facility_district']; ?></td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset>
                    <legend onClick="toggle(this)"><img src="<?php echo $root_path; ?>gui/img/common/default/plus.gif" width="18" height="18">Registration Data</legend>
                    <table border="0" class="">
                        <tr>
                            <td bgcolor="#F0F8FF"><strong>Patient File Number: </strong><?php echo $registration_data['facility_file_number']; ?></td>
                            <td bgcolor="#F0F8FF"><strong>PID: </strong><?php echo $registration_data['pid']; ?></td>
                            <td bgcolor="#F0F8FF"><strong>Sex: </strong><?php echo strtoupper($registration_data['sex']); ?></td>
                            <td bgcolor="#F0F8FF"><strong>Date of Birth: </strong><?php echo formatDate2Local($registration_data['date_of_birth'], $date_format, null, null); ?></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><strong>Name:</strong> <?php echo $registration_data['name']; ?></td>
                            <td bgcolor="#F0F8FF"><strong>Marital Status: </strong> <?php echo $registration_data['marital_status']; ?></td>
                            <td></td>
                            <td bgcolor="#F0F8FF" colspan="2"><strong>Age:</strong> <?php echo $registration_data['age']; ?></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><strong>Region: </strong> &nbsp;<?php echo $registration_data['region']; ?></td>
                            <td bgcolor="#F0F8FF" colspan="2"><strong>District: </strong>&nbsp;<?php echo $registration_data['district']; ?></td>
                            <td bgcolor="#F0F8FF" colspan="2"><strong>Division: </strong>&nbsp;<?php echo $registration_data['division']; ?></td>

                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><strong>Ward: </strong> &nbsp;<?php echo $registration_data['ward']; ?></td>
<!--                            <td bgcolor="#F0F8FF"><strong>Village: </strong>  <?php // echo $registration_data['street'];                                                                                                                                                                                                                                                                                                              ?></td>-->
                            <td bgcolor="#EAF4FF" colspan="2"><strong>Street/Village: </strong>  <?php echo $registration_data['village']; ?></td>
                            <td bgcolor="#F0F8FF" colspan="2"><strong>Telephone:</strong>  <?php echo $registration_data['telephone']; ?></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF" colspan="5">&nbsp;</td>
                        </tr>
                    </table>
                </fieldset>

                <fieldset>
                    <legend onClick="toggle(this)"><img src="<?php echo $root_path; ?>gui/img/common/default/plus.gif" width="18" height="18">
                        Treatment Phase Data</legend>
                    <table class="table-primary" style="border: #9c3619 dashed 1px; border-collapse:collapse; padding: 5px; font-size: 14px">
                        <?php
                        if ($treatment_phase_data) {
                            ?>
                            <tr bgcolor="#DAF7A6" height="15" style="border: #9c3619 dashed 1px;">
                                <td>
                                    <strong>Phase Description</strong>
                                </td>
                                <td>
                                    <strong>Case</strong>
                                </td>
                                <td>
                                    <strong>Drugs</strong>
                                </td>
                                <td>
                                    <strong>Dosage</strong>
                                </td>

                                <td>
                                    <strong>Start Date</strong>
                                </td>
                                <td>
                                    <strong>End Date</strong>
                                </td>
                                <td>
                                    <strong>Start Encounter</strong>
                                </td>
                                <td>
                                    <strong>Options</strong>
                                </td>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($treatment_phase_data as $row) {
                                if ($i % 2 == 0) {
                                    $bgcolor = "#f5d688";
                                } else {
                                    $bgcolor = "#F0F8FF";
                                }
                                ?>    
                                <tr bgcolor="<?php echo $bgcolor; ?>" style="border: #9c3619 dashed 1px;">
                                    <td>
                                        <?php echo $row['phase_description']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['tb_case']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['treatment_phase_drugs']; ?>
                                    </td>

                                    <td>
                                        <?php echo $row['treatment_phase_dosage']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['start_date']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['end_date']; ?>
                                    </td>

                                    <td>
                                        <?php echo $row['start_encounter_nr']; ?>
                                    </td>

                                    <td rowspan="2" align="center">
                                        <a href="tb_treatment_phases.php<?php echo URL_APPEND ?>&patient_treatment_phaseid=<?php echo $row['patient_treatment_phaseid']; ?>&pid=<?php echo $_GET['pid'] ?>&mode=edit" >
                                            Edit</a>
                                    </td>
                                </tr>
                                <tr bgcolor="<?php echo $bgcolor; ?>" style="border: #9c3619 dashed 1px;">
                                    <td>
                                        <strong>Outcome: </strong>
                                    </td>
                                    <td>
                                        <?php echo $row['treatment_outcome']; ?>
                                    </td>
                                    <td>
                                        <strong>Outcome Date:</strong>
                                    </td>
                                    <td>
                                        <?php echo $row['outcome_date']; ?>
                                    </td>
                                    <td>
                                        <strong>Remarks:</strong>
                                    </td>
                                    <td colspan="2">
                                        <?php echo $row['remarks']; ?>
                                    </td>
                                </tr>

                                <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <tr style="border: #9c3619 dashed 1px;">
                                <td width="550" colspan="3" bgcolor="#F0F8FF">
                                    <?php echo $error_messages['treatment_phases'] . "\n" ?>
                                </td>
                            </tr>
                        <?php } ?>


<!--                        <tr>
                            <td colspan="5" align="center" bgcolor="#F0F8FF">
                                <br/>
                            </td>
                        </tr>-->
                    </table>
                </fieldset>

                <fieldset>
                    <legend onClick="toggle(this)">
                        <img src="<?php echo $root_path; ?>gui/img/common/default/plus.gif" width="18" height="18">
                        <?php echo ($mode == 'edit') ? 'Edit ' : 'New ' ?> Treatment Phase Data
                    </legend>
                    <form name="household_contact" action="" method="post">
                        <table border="0">

                            <tr>
                                <td colspan="5" align="center" bgcolor="#F0F8FF">
                                    <?php
                                    if (isset($_SESSION['message'])) {
                                        echo "<div class='success'>" . $_SESSION['message'] . "</div>";
                                        $_SESSION['message'] = ''; //Reset variable
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Select Phase:</strong></td>
                                <td colspan="1" bgcolor="#F0F8FF">
                                    <?php echo $o_tb_patient->form_dropdown('phase_id', $o_tb_patient->get_TreatmentPhase(), $values['phase_id'], "id = \"phase_id\" class=\"form-control\" "); ?>
                                    <?php echo $messages['phase_id'] . "\n" ?>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Select Case:</strong></td>
                                <td colspan="1" bgcolor="#F0F8FF">
                                    <?php echo $o_tb_patient->form_dropdown('tb_caseid', $o_tb_patient->get_TreatmentCase(), $values['tb_caseid'], "id = \"tb_caseid\" class=\"form-control\" "); ?>
                                    <?php echo $messages['tb_caseid'] . "\n" ?>
                                </td>
                            </tr>

                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Drugs: </strong></td>
                                <td bgcolor="#F0F8FF">
                                    <input class="form-control" name="treatment_phase_drugs" type="text" id="treatment_phase_drugs" value="<?php echo $values['treatment_phase_drugs']; ?>" size="25" maxlength="100" />
                                    <?php echo $messages['treatment_phase_drugs'] . "\n" ?></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Tablets per Dose: </strong></td>
                                <td bgcolor="#F0F8FF">
                                    <input class="form-control" name="treatment_phase_dosage" type="text" id="treatment_phase_dosage" value="<?php echo $values['treatment_phase_dosage']; ?>" size="25" maxlength="255" />
                                    <?php echo $messages['treatment_phase_dosage'] . "\n" ?>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Start Date: </strong></td>
                                <td bgcolor="#F0F8FF">
                                    <input class="form-control" name="start_date" placeholder="YYYY-MM-DD" type="text" id="start_date" value="<?php echo $values['start_date']; ?>" size="25" maxlength="255" />
                                    <?php echo $messages['start_date'] . "\n" ?>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>End Date: </strong></td>
                                <td bgcolor="#F0F8FF">
                                    <input class="form-control" name="end_date" placeholder="YYYY-MM-DD" type="text" id="end_date" value="<?php echo $values['end_date']; ?>" size="25" maxlength="255" />
                                    <?php echo $messages['end_date'] . "\n" ?>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Treatment Outcome:</strong></td>
                                <td colspan="1" bgcolor="#F0F8FF">
                                    <?php echo $o_tb_patient->form_dropdown('treatment_outcomeid', $o_tb_patient->get_TreatmentOutcomes(), $values['treatment_outcomeid'], "id = \"treatment_outcomeid\" class=\"form-control\" "); ?>
                                    <?php echo $messages['treatment_outcomeid'] . "\n" ?>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Outcome Date: </strong></td>
                                <td bgcolor="#F0F8FF">
                                    <input class="form-control" name="outcome_date" placeholder="YYYY-MM-DD" type="text" id="outcome_date" value="<?php echo $values['outcome_date']; ?>" size="25" maxlength="255" />
                                    <?php echo $messages['outcome_date'] . "\n" ?>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Remarks: </strong></td>
                                <td bgcolor="#F0F8FF">
                                    <textarea class="form-control" name="remarks" id="remarks" rows="3" cols="50"><?php echo $values['remarks']; ?></textarea>
                                    <?php echo $messages['remarks'] . "\n" ?>
                                </td>
                            </tr>
                        </table>

                        <table width="750">
                            <tr>
                                <td width="95" bgcolor="#F0F8FF"><strong>Signature:</strong></td>
                                <td width="643" bgcolor="#F0F8FF">
                                    <input class="form-control" name="signature" type="text" readonly id="signature" value="<?php echo $values['signature']; ?>" size="20" maxlength="60" />
                                    <?php echo $messages['signature'] . "\n" ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" bgcolor="#F0F8FF">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <input class="form-control" name="patient_treatment_phaseid" type="hidden" value="<?php echo $values['patient_treatment_phaseid'] ?>" />
                                    <input class="form-control" name="mode" type="hidden" value="<?php echo $_REQUEST['mode'] ?>" />
                                    <input class="form-control" name="pid" type="hidden" value="<?php echo $_REQUEST['pid'] ?>" />
                                    <input class="form-control" name="encounter_nr" type="hidden" value="<?php echo $_REQUEST['encounter_nr'] ?>" />
                                    <input class="form-control" name="start_encounter_nr" type="hidden" value="<?php echo $_REQUEST['encounter_nr'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" bgcolor="#F0F8FF" align="center">
                                    <a href="<?php echo $root_path . $breakfile . URL_APPEND . $add_breakfile ?>" >
                                        <img src="../../gui/img/control/blue_aqua/en/en_close2.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)">
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="button submit" name="submit" type="submit" value='' onClick="javascript:selectAll();"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </fieldset>

                </p>
                <p>&nbsp;</p></td>
                </tr>
            </div>
            <div class="row">

            </div>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="1" bgcolor="#cfcfcf">
            <tr>
                <td>
                    <br/>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="1" bgcolor="#cfcfcf">
            <tr>
                <td align="center">
                    <table width="100%" bgcolor="#ffffff" cellspacing=0 cellpadding=5>
                        <tr>
                            <td><div class="copyright">
                                    <script language="JavaScript">

                                        function openCreditsWindow() {

                                            urlholder = "../../language/$lang/$lang_credits.php?lang=$lang";
                                            creditswin = window.open(urlholder, "creditswin", "width=500,height=600,menubar=no,resizable=yes,scrollbars=yes");
                                        }

                                    </script>


                                    <a href="http://www.care2x.org" target=_new>CARE2X 3rd Generation pre-deployment 3.5</a> :: <a href="../../legal_gnu_gpl.htm" target=_new> License</a> :: <a href=mailto:care2x@makiungu.co.tz>Contact</a>  :: <a href="../../language/en/en_privacy.htm" target="pp"> Our Privacy Policy </a> ::
                                    <a href="../../docs/show_legal.php?lang=$lang" target="lgl"> Legal </a> :: <a href="javascript:openCreditsWindow()"> Credits </a> ::.<br>
                                </div></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </BODY>
</HTML>
