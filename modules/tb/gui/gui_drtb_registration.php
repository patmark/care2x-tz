<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="Author" content="Patrick Mark">

        <link rel="stylesheet" href="<?php echo $root_path; ?>assets/bootstrap/css/bootstrap.min.css" >
        <script src="<?php echo $root_path; ?>assets/bootstrap/js/jquery-3.2.1.slim.min.js" ></script>
        <script src="<?php echo $root_path; ?>assets/bootstrap/js/popper.min.js" ></script>
        <script src="<?php echo $root_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- Bootstrap Date-Picker Plugin -->
        <link href="<?php echo $root_path; ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $root_path; ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
                var date_drtbreg = $('input[name="date_drtbreg"]'); //our date input has the name "date"
                var date_districttb_reg = $('input[name="date_districttb_reg"]'); //our date input has the name "date"
//                var treatment_episode_start_date = $('input[name="treatment_episode_start_date"]'); //our date input has the name "date"
                var treatment_episode_end_date = $('input[name="treatment_episode_end_date"]'); //our date input has the name "date"
                var date_start_cpt = $('input[name="date_start_cpt"]'); //our date input has the name "date"
                var date_start_art = $('input[name="date_start_art"]'); //our date input has the name "date"
                var cd4_cell_count_date = $('input[name="cd4_cell_count_date"]'); //our date input has the name "date"

                var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                var options = {
                    format: 'yyyy-mm-dd',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                    showDropdowns: true,
                };
                date_drtbreg.datepicker(options);
                date_districttb_reg.datepicker(options);
//                treatment_episode_start_date.datepicker(options);
                treatment_episode_end_date.datepicker(options);
                date_start_cpt.datepicker(options);
                date_start_art.datepicker(options);
                cd4_cell_count_date.datepicker(options);
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
//                alert(content);
                if (content.style.display === 'none') {
                    // wenn es nicht sichtbar ist
                    content.style.display = 'block'; // sichtbar machen
                    image.src = '<?php echo $root_path ?>gui/img/common/default/minus.gif';
                } else {
                    // wenn es bereits sichtbar ist
//                    content.style.display = 'none'; // unsichtbar machen
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

            var arr_elements = ["drtb_reg_group_other", "eptb_site", "classification_byhistory_other", "hiv_details", "date_start_cpt", "date_start_art"];

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
        <link rel="stylesheet" href="<?php echo $root_path; ?>css/themes/default/tbmod.css" type="text/css">

        <!--AdminLTE-->

    </head>
    <body onload = "hide_element()">

        <table cellspacing="0"  class="titlebar" border=0>
            <tr valign=top  class="titlebar" >
                <td bgcolor="#99ccff" ><font color="#330066">&nbsp;&nbsp; DR - TB Patient Registration</font></td>
                <td bgcolor="#99ccff" align=right>
                    <a href="javascript:gethelp('tb_registration.php','<?php echo $src; ?>')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                    &nbsp;
                    <a href="<?php echo $root_path . $breakfile . URL_APPEND . $add_breakfile ?>" ><img src="../../gui/img/control/blue_aqua/en/en_cancel.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>     </td>
            </tr>
        </table>
        <div class="container">

            <div class="row">

                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <fieldset>
                        <legend class="legend" onClick="toggle(this)"><img src="<?php echo $root_path ?>gui/img/common/default/plus.gif" width="18" height="18" >
                            Facility Information</legend>
                        <table border="0" style="background:#F0F8FF; font-size: 13px">
                            <tr>
                                <td bgcolor="#F0F8FF" width="40%"><strong>Facility Name:</strong> <?php echo $facility_info['main_info_tb_facility_name']; ?></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF" width="20%"><strong>Facility Code:</strong> <?php echo $facility_info['main_info_tb_facility_code']; ?></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF" width="40%"><strong>District:</strong> <?php echo $facility_info['main_info_tb_facility_district']; ?></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <fieldset>
                        <legend class="legend" onClick="toggle(this)"><img src="<?php echo $root_path; ?>gui/img/common/default/plus.gif">Registration Data</legend>
                        <table border="0" class="" style="background:#F0F8FF; font-size: 13px">
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
    <!--                            <td bgcolor="#F0F8FF"><strong>Village: </strong>  <?php // echo $registration_data['street'];                                                                                                                                                                                                                                                                                                             ?></td>-->
                                <td bgcolor="#EAF4FF" colspan="2"><strong>Street/Village: </strong>  <?php echo $registration_data['village']; ?></td>
                                <td bgcolor="#F0F8FF" colspan="2"><strong>Telephone:</strong>  <?php echo $registration_data['telephone']; ?></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF" colspan="5">&nbsp;</td>
                            </tr>
                        </table>
                    </fieldset>
                </div><?php echo $errorMessages ?>
            </div>


            <form id="tb_registration" name="registration" method="post" action="">
                <fieldset>
                    <legend class="legend" onClick="toggle(this)"><img src="<?php echo $root_path; ?>gui/img/common/default/plus.gif" width="18" height="18">
                        Patient DR - TB Registration</legend>
                    <div class="row" id="patreg">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <table border="0">
                                <tr>
                                    <td  bgcolor="#F0F8FF"><strong>DR-TB Registration Number: </strong></td>
                                    <td  colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="drtb_regno" type="text" id="drtb_regno" <?php echo $mode == 'edit' ? 'readonly' : ''; ?> value="<?php echo $o_tb_patient->format_district_regno($values['drtb_regno']); ?>" size="25"/>
                                        <?php echo $messages['drtb_regno'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td  bgcolor="#F0F8FF"><strong>Date of DR-TB Registration: </strong></td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" placeholder="YYYY-MM-DD" name="date_drtbreg" id="date_drtbreg" type="text" value="<?php echo $values['date_drtbreg']; ?>" />
                                        <?php echo $messages['date_drtbreg'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td  bgcolor="#F0F8FF"><strong>District Reg Number: </strong></td>
                                    <td  colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="district_regno" type="text" id="district_regno" <?php echo $mode == 'edit' || $mode == 'transfer' ? 'readonly' : ''; ?> value="<?php echo $o_tb_patient->format_district_regno($values['district_regno']); ?>" size="25"/>
                                        <?php echo $messages['district_regno'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td  bgcolor="#F0F8FF"><strong>Date of District TB Registration: </strong></td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" placeholder="YYYY-MM-DD" name="date_districttb_reg" id="date_districttb_reg" type="text" value="<?php echo $values['date_districttb_reg']; ?>" />
                                        <?php echo $messages['date_districttb_reg'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Name of Next of Kin: </strong></td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="next_ofkin" type="text" id="next_ofkin" value="<?php echo $values['next_ofkin']; ?>" size="25"  />
                                        <?php echo $messages['next_ofkin'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Address of Next of Kin: </strong></td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="next_ofkin_add" type="text" id="next_ofkin_add" value="<?php echo $values['next_ofkin_add']; ?>" size="25"  />
                                        <?php echo $messages['next_ofkin_add'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Telephone: </strong></td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="telephone" type="text" id="telephone" value="<?php echo $values['telephone']; ?>" size="25" />
                                        <?php echo $messages['telephone'] . "\n" ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <table border="0">
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Registration Group:</strong></td>
                                    <td colspan="1" bgcolor="#F0F8FF">
                                        <?php echo $o_tb_patient->form_dropdown('drtb_reg_groupid', $o_tb_patient->get_drtb_reg_groupid(), $values['drtb_reg_groupid'], "id = \"drtb_reg_groupid\" class=\"form-control\" onchange=\"check_other('drtb_reg_groupid','drtb_reg_group_other')\"");
                                        ?>
                                        <?php echo $messages['drtb_reg_groupid'] . "\n" ?>
                                    </td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="drtb_reg_group_other" id="drtb_reg_group_other" type="text" value="<?php echo $values['drtb_reg_group_other']; ?>" />
                                        <?php echo $messages['drtb_reg_group_other'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Initial Weight (Kg): </strong></td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="initial_weight" type="text" id="initial_weight" value="<?php echo $values['initial_weight']; ?>" size="25" />
                                        <?php echo $messages['initial_weight'] . "\n" ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Height (Cm): </strong></td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="height" type="text" id="height" value="<?php echo $values['height']; ?>" size="25" />
                                        <?php echo $messages['height'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Classification by Site:</strong></td>
                                    <td colspan="1" bgcolor="#F0F8FF">
                                        <?php echo $o_tb_patient->form_dropdown('classification_bysiteid', $o_tb_patient->get_drtbclassification_bysite(), $values['classification_bysiteid'], "id = \"classification_bysiteid\" class=\"form-control\" onchange=\"check_eptb('classification_bysiteid','eptb_site')\""); ?>
                                        <?php echo $messages['classification_bysiteid'] . "\n" ?>
                                    </td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="eptb_site" id="eptb_site" type="text" value="<?php echo $values['eptb_site']; ?>" />
                                        <?php echo $messages['eptb_site'] . "\n" ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="legend" onClick="toggle(this)">
                        <img src="<?php echo $root_path; ?>gui/img/common/default/plus.gif" width="18" height="18">
                        Previous Tuberculosis Treatment Episodes
                    </legend>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <table border="0">
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Start Date (if unknown, put a year):</strong></td>
                                    <td bgcolor="#F0F8FF">
                                        <input class="form-control" placeholder="YYYY-MM-DD" name="treatment_episode_start_date" id="treatment_episode_start_date" type="text" value="<?php echo $values['treatment_episode_start_date']; ?>" />
                                        <?php echo $messages['treatment_episode_start_date'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Regimen (write regimen in drug abbreviations): </strong></td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="treatment_episode_regimen" type="text" id="treatment_episode_regimen" value="<?php echo $values['treatment_episode_regimen']; ?>" size="25" />
                                        <?php echo $messages['treatment_episode_regimen'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>End Date (if unknown, put a year):</strong></td>
                                    <td bgcolor="#F0F8FF">
                                        <input class="form-control" placeholder="YYYY-MM-DD" name="treatment_episode_end_date" id="treatment_episode_end_date" type="text" value="<?php echo $values['treatment_episode_end_date']; ?>" />
                                        <?php echo $messages['treatment_episode_end_date'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Treatment Outcome:</strong></td>
                                    <td colspan="1" bgcolor="#F0F8FF">
                                        <?php echo $o_tb_patient->form_dropdown('treatment_outcomeid', $o_tb_patient->get_TreatmentOutcomes(), $values['treatment_outcomeid'], "id = \"treatment_outcomeid\" class=\"form-control\" "); ?>
                                        <?php echo $messages['treatment_outcomeid'] . "\n" ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <table border="0">
                                <tr>
                                    <td bgcolor="#F0F8FF" colspan="2" align="center"><strong>First-line Drug Abbreviations</strong></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF" align="center">
                                        <strong>Abbreviations</strong>
                                    </td>
                                    <td bgcolor="#F0F8FF" align="center">
                                        <strong>Drug Class</strong>
                                    </td>
                                </tr>
                                <?php foreach ($o_tb_patient->get_drtb_drug_abbreviations() as $row) { ?>
                                    <tr>
                                        <td bgcolor="#F0F8FF" align="left">
                                            <?php echo $row['drugabbreviation'] . ' = ' . $row['drugname']; ?>
                                        </td>
                                        <td bgcolor="#F0F8FF" align="center">
                                            <?php echo $row['drug_class']; ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </table>
                        </div>
                    </div>
                </fieldset>


                <fieldset>
                    <legend class="legend" onClick="toggle(this)">
                        <img src="<?php echo $root_path; ?>gui/img/common/default/plus.gif" width="18" height="18">
                        Classification of Previous Drug Use:
                    </legend>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <table border="0" class="table-striped">
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Used Second-line Drugs Previously?:</strong></td>

                                    <td bgcolor="#F0F8FF">
                                        <?php echo $o_tb_patient->form_dropdown('used_second_line_drugs', $yesno, $values['used_second_line_drugs'], "id = \"used_second_line_drugs\" class=\"form-control\""); ?>
                                        <?php echo $messages['used_second_line_drugs'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>If Yes, Specify: </strong></td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                        <input class="form-control" name="second_line_drugs" type="text" id="second_line_drugs" value="<?php echo $values['second_line_drugs']; ?>"  />
                                        <?php echo $messages['second_line_drugs'] . "\n" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF" colspan="2" align="center"><strong>Second-line Drug Abbreviations</strong></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF" align="center">
                                        <strong>Abbreviations</strong>
                                    </td>
                                    <td bgcolor="#F0F8FF" align="center">
                                        <strong>Drug Class</strong>
                                    </td>
                                </tr>
                                <?php foreach ($o_tb_patient->get_drtb_drug_abbreviations(2) as $row) { ?>
                                    <tr>
                                        <td bgcolor="#F0F8FF" align="left">
                                            <?php echo $row['drugabbreviation'] . ' = ' . $row['drugname']; ?>
                                        </td>
                                        <td bgcolor="#F0F8FF" align="center">
                                            <?php echo $row['drug_class']; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <table border="0" class="table-striped">

                                <tr>
                                    <td bgcolor="#F0F8FF" colspan="2" align="center"><strong>Second-line Drug Abbreviations Continued</strong></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF" align="center">
                                        <strong>Abbreviations</strong>
                                    </td>
                                    <td bgcolor="#F0F8FF" align="center">
                                        <strong>Drug Class</strong>
                                    </td>
                                </tr>
                                <?php foreach ($o_tb_patient->get_drtb_drug_abbreviations(2, '6,20') as $row) { ?>
                                    <tr>
                                        <td bgcolor="#F0F8FF" align="left">
                                            <?php echo $row['drugabbreviation'] . ' = ' . $row['drugname']; ?>
                                        </td>
                                        <td bgcolor="#F0F8FF" align="center">
                                            <?php echo $row['drug_class']; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>

                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <fieldset>
                            <legend class="legend" onClick="toggle(this)">
                                <img src="<?php echo $root_path; ?>gui/img/common/default/plus.gif" width="18" height="18">
                                HIV Details
                            </legend>
                            <table width="100%" border="0">
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>HIV Status:</strong></td>
                                    <td colspan="2" bgcolor="#F0F8FF">
                                        <?php echo $o_tb_patient->form_dropdown('hiv_status', $o_tb_patient->get_hiv_status(), $values['hiv_status'], "id = \"hiv_status\" class=\"form-control\" onchange=\"check_hiv_status('hiv_status','hiv_details');\""); ?>
                                        <?php echo $messages['hiv_status'] . "\n" ?>
                                    </td>
                                    <td colspan="3" bgcolor="#F0F8FF">
                                    </td>
                                </tr>
                            </table>
                            <?php
                            if ($mode == 'edit' && $values['hiv_status'] == 1) {
                                ?><div>
                                    <?php
                                } else {
                                    ?>
                                    <div id="hiv_details">
                                    <?php } ?>
                                    <table width="750" border="0">
                                        <tr>
                                            <td bgcolor="#F0F8FF"><strong>HIV Care Registration Number: </strong></td>
                                            <td bgcolor="#F0F8FF">
                                                <input class="form-control" name="hiv_regno" type="text" id="hiv_regno" value="<?php echo $values['hiv_regno']; ?>" size="25" />
                                                <?php echo $messages['hiv_regno'] . "\n" ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#F0F8FF"><strong>CD4 Cell Count: </strong></td>
                                            <td bgcolor="#F0F8FF">
                                                <input class="form-control" name="cd4_cell_count" type="text" id="cd4_cell_count" value="<?php echo $values['cd4_cell_count']; ?>" size="25" />
                                                <?php echo $messages['cd4_cell_count'] . "\n" ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#F0F8FF"><strong>CD4 Cell Count Date: </strong></td>
                                            <td  bgcolor="#F0F8FF">
                                                <input class="form-control" placeholder="YYYY-MM-DD" name="cd4_cell_count_date" id="cd4_cell_count_date" type="text" value="<?php echo $values['cd4_cell_count_date']; ?>" />
                                                <?php echo $messages['cd4_cell_count_date'] . "\n" ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#F0F8FF"><strong>On CPT?:</strong></td>

                                            <td  bgcolor="#F0F8FF">
                                                <?php echo $o_tb_patient->form_dropdown('on_cpt', $yesno, $values['on_cpt'], "id = \"on_cpt\" class=\"form-control\" onchange=\"check_on_cpt('on_cpt','date_start_cpt');\""); ?>
                                                <?php echo $messages['on_cpt'] . "\n" ?>
                                            </td>
                                            <td  bgcolor="#F0F8FF">
                                                <input class="form-control" placeholder="YYYY-MM-DD" name="date_start_cpt" id="date_start_cpt" type="text" value="<?php echo $values['date_start_cpt']; ?>" />
                                                <?php echo $messages['date_start_cpt'] . "\n" ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#F0F8FF"><strong>On ART Drugs?:</strong></td>
                                            <td  bgcolor="#F0F8FF">
                                                <?php echo $o_tb_patient->form_dropdown('on_art', $yesno, $values['on_art'], "id = \"on_art\" class=\"form-control\" onchange=\"check_on_cpt('on_art','date_start_art');\""); ?>
                                                <?php echo $messages['on_art'] . "\n" ?>
                                            </td>
                                            <td bgcolor="#F0F8FF">
                                                <!--<input class="form-control" name="date_start_art" id="date_start_art" type="text" value="<?php // echo $values['date_start_art'];                                                                                       ?>" />-->
                                                <input class="form-control" placeholder="YYYY-MM-DD" name="date_start_art" type="text" id="date_start_art" value="<?php echo $values['date_start_art']; ?>" size="10" 
                                                       onfocus="this.select()" />
                                                       <?php echo $messages['date_start_art'] . "\n" ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <fieldset>
                            <legend class="legend" onClick="toggle(this)"><img src="<?php echo $root_path; ?>gui/img/common/default/plus.gif" width="18" height="18">
                                Drug Allergies</legend>
                            <table width="750" border="0" bgcolor="#F0F8FF">
                                <tr>
                                    <td width="300" rowspan="2" bgcolor="#F0F8FF">
                                        <input class="form-control" style="min-width:50px;" name="insert_allergies" type="text" id="insert_allergies" >
                                        <?php echo $messages['insert_allergies'] . "\n" ?>
                                    </td>
                                    <td width="86" bgcolor="#F0F8FF"><input class="form-control" name="add" type="button" id="add" onclick="javascript:insert()" value="add"></td>
                                    <td width="384" colspan="2" rowspan="2">
                                        <select class="form-control" name="allergies[]" size="4" multiple id="allergies[]" style="width:250px">
                                            <?php echo $values['allergies'] ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F0F8FF"><input class="form-control" name="delete" type="button" onclick="javascript:remove_element()" id="delete" value="del"></td>
                                </tr>
                            </table>
                        </fieldset>
                    </div>
                </div>

                <fieldset>
                    <table width="750">
                        <tr>
                            <td width="95" bgcolor="#F0F8FF"><strong>Signature:</strong></td>
                            <td width="643" bgcolor="#F0F8FF"><input class="form-control" name="signature" type="text" readonly id="signature" value="<?php echo $values['signature']; ?>" size="20" />
                                <?php echo $messages['signature'] . "\n" ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#F0F8FF">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <input class="form-control" name="patient_treatment_episodeid" type="hidden" value="<?php echo $values['patient_treatment_episodeid']; ?>" />
                                <input class="form-control" name="mode" type="hidden" value="<?php echo isset($_REQUEST['mode']) ? $_REQUEST['mode'] : 'new'; ?>" />
                                <input class="form-control" name="pid" type="hidden" value="<?php echo $_REQUEST['pid'] ?>" />
                                <input class="form-control" name="encounter_nr" type="hidden" value="<?php echo $_REQUEST['encounter_nr'] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#F0F8FF" align="center">
                                <input class="button submit" name="submit" type="submit" value='' onClick="javascript:selectAll();"/>
                            </td>
                        </tr>
                    </table>
                </fieldset>

            </form>
        </p>
        <p>&nbsp;</p>
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