<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="Author" content="Patrick Mark">

        <script language="JavaScript" type="text/JavaScript">

            function toggle(element) {
                var image = element.getElementsByTagName('img')[0];
                var content = element.parentNode.getElementsByTagName('table')[0];

                if (content.style.display === 'none') {
                    // wenn es nicht sichtbar ist
                    content.style.display = 'block'; // sichtbar machen
                    image.src = '<?php echo $root_path ?>gui/img/common/default/minus_menu.gif';
                } else {
                    // wenn es bereits sichtbar ist
                    content.style.display = 'none'; // unsichtbar machen
                    image.src = '<?php echo $root_path ?>gui/img/common/default/plus_menu.gif';
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
                }
                else {
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


            function remove(element) {
                var destination_obj = document.forms[0].elements['allergies[]'];
                if (destination_obj.selectedIndex >= 0) {
                    destination_obj.options[destination_obj.selectedIndex].text = null;
                    destination_obj.options[destination_obj.selectedIndex] = null;
                    return true;
                }
                else {
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

            var arr_elements = ['family_info_new'];

            function hide_element() {
                i = 0;
                while (arr_elements) {

                    var e = document.getElementById(arr_elements[i]);
//                    var isfilled = e.value;
//                    if (isfilled === '') {
                    e.style.display = 'none';
//                    }
                    i++;
                }
            }

            function show_element(id) {
                var element = document.getElementById(id);
                if (element.style.display === 'none') {
                    element.style.display = '';
                } else {
                    element.style.display = 'none';
                }
            }

            function search_relative(id) {
                var e = document.getElementById('relative_ctc_id');
                ctc_id = e.value;

                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
                    {
                        document.getElementById(id).innerHTML = xmlhttp.responseText;
                    }
                }
                urlholder = "<?php echo $root_path; ?>modules/arv_2/arv_search_family.php?ctc_id=" + ctc_id;
                xmlhttp.open("POST", urlholder, false);
                xmlhttp.send();
            }

        </script>
        <title>Patient's Family Information</title>
        <link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
        <style type="text/css">
            body{
                background: #deeef4;
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

            .register{
                background-image: url(<?php echo $root_path; ?>gui/img/control/blue_aqua/en/en_register.gif);
                background-position:  0px 0px;
                background-repeat: no-repeat;
                width: 76px;
                height: 21px;
                border: 0px;
            }

            .input_short{
                width: 80px;
            }

            .input_med{
                width: 150px;
            }

        </style> 
    <body>
        <table cellspacing="0"  class="titlebar" border=0>
            <tr valign=top  class="titlebar" >
                <td bgcolor="#99ccff"><font color="#330066">&nbsp;&nbsp;Patient's Family Information</font></td>
                <td bgcolor="#99ccff" align=right>
                    <a href="javascript:gethelp('arv_visit.php','<?php echo $src; ?>')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                    &nbsp;
                    <a href="<?php echo $root_path . $breakfile . URL_APPEND . $add_breakfile ?>" ><img src="../../gui/img/control/blue_aqua/en/en_cancel.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>     </td>
            </tr>
        </table>
        <div class="content">
            <?php echo $errorMessages ?>
            <fieldset>
                <legend onClick="toggle(this)"><img src="<?php echo $root_path ?>gui/img/common/default/plus_menu.gif" width="18" height="18" ><strong>Facility Information</strong></legend>
                <table width="750" border="0">
                    <tr>
                        <td bgcolor="#F0F8FF"><strong>Facility Name:</strong> <?php echo $facility_info['main_info_facility_name']; ?></td>
                        <td bgcolor="#F0F8FF"><strong>Facility Code:</strong> <?php echo $facility_info['main_info_facility_code']; ?></td>
                        <td bgcolor="#F0F8FF"><strong>District:</strong> <?php echo $facility_info['main_info_facility_district']; ?></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend onClick="toggle(this)"><strong><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18">Registration Data</strong></legend>
                <table width="750" border="0">
                    <tr>
                        <td bgcolor="#F0F8FF"><strong>Health Facility File Number: </strong><?php echo $registration_data['facility_file_number']; ?></td>
                        <td bgcolor="#F0F8FF"><strong>PID: </strong><?php echo $registration_data['pid']; ?></td>
                        <td bgcolor="#F0F8FF"><strong>Sex: </strong><?php echo $registration_data['sex']; ?></td>
                        <td bgcolor="#F0F8FF"><strong>Date of Birth: </strong><?php echo formatDate2Local($registration_data['date_of_birth'], $date_format, null, null); ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#F0F8FF"><strong>Patient ID:</strong>&nbsp;&nbsp;&nbsp;<?php echo $o_arv_patient->format_ctc_no($values['ctc_id']); ?></td>
                        <td bgcolor="#F0F8FF"><strong>Name:</strong> <?php echo $registration_data['name']; ?></td>
                        <td bgcolor="#F0F8FF"><strong>Marital Status: </strong> <?php echo $registration_data['marital_status']; ?></td>
                        <td bgcolor="#F0F8FF"><strong>Age:</strong> <?php echo $registration_data['age']; ?></td>
                    </tr>
                </table>
            </fieldset>

            <fieldset>
                <legend onClick="toggle(this)"><strong><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18">Patient Relatives</strong></legend>
                <table width="750" border="0">
                    <?php
                    echo $o_arv_patient->patient_relatives_list($values['registration_id']);
                    ?>
                </table>
            </fieldset>

            <form name='family_info_new' id='family_info_new' method='post' action=''>
                <fieldset>
                    <legend id='new_patient'><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18"><strong><?php
                            if ($_GET['mode'] == 'edit') {
                                echo 'Edit Patient Relative';
                            } else {
                                echo 'Register New Patient Relative';
                            }
                            ?></strong>
                    </legend>
                    <table width="750" border="0">
                        <tr>
                            <td colspan="6" bgcolor="#F0F8FF">&nbsp;</td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><strong>Name:</strong></td>
                            <td bgcolor="#F0F8FF"> <?php echo $messages['relative_name'] . "\n" ?>                                
                                <input class="input_med" name='relative_name' type='text' value="<?php echo $values['relative_name'] ?>"/>
                            </td>
                            <td bgcolor="#F0F8FF"><strong>Relation:</strong></td>
                            <td bgcolor="#F0F8FF"> <?php
                                echo $messages['care_tz_arv_relatives_code_id'] . "\n";
                                echo $o_arv_patient->form_dropdown('care_tz_arv_relatives_code_id', $o_arv_patient->get_relation_list(), $values['care_tz_arv_relatives_code_id']);
                                ?>                                
                            </td>
                            <td bgcolor="#F0F8FF"><strong>Age:</strong></td>
                            <td bgcolor="#F0F8FF"> <?php echo $messages['age'] . "\n" ?>                                
                                <input class="input_short" name='age' type='text' value="<?php echo $values['age'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><strong>HIV Status:</strong></td>
                            <td bgcolor="#F0F8FF"> <?php
                                $hiv_status = array('' => '--Select--', 'positive' => 'Positive', 'negative' => 'Negative', 'unknown' => 'Unknown');
                                echo $messages['hiv_status'] . "\n";
                                echo $o_arv_patient->form_dropdown('hiv_status', $hiv_status, $values['hiv_status']);
                                ?>
                            <td bgcolor="#F0F8FF"><strong>HIV Care Status:</strong></td>
                            <td bgcolor="#F0F8FF" colspan="3"> <?php
                                $hiv_care_status = array('' => '--Select--', 'Not in HIV Care' => 'Not in HIV Care', 'In HIV Care' => 'In HIV Care', 'Attending this Clinic' => 'Attending this Clinic');
                                echo $messages['hiv_care_status'] . "\n";
                                echo $o_arv_patient->form_dropdown('hiv_care_status', $hiv_care_status, $values['hiv_care_status']);
                                ?>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><strong>Unique CTC ID No:</strong></td>
                            <td bgcolor="#F0F8FF" colspan="2">
                                <?php echo $messages['relative_ctc_id'] . "\n" ?>
                                <input name="relative_ctc_id" type="text" id="relative_ctc_id" value="<?php echo $o_arv_patient->format_ctc_no($values['relative_ctc_id']); ?>" size="14" maxlength="17" />
                            </td>
                            <td bgcolor="#F0F8FF"><strong>Facility File No:</strong></td>
                            <td bgcolor="#F0F8FF" colspan="2"> <?php echo $messages['facility_file_no'] . "\n" ?>                                
                                <input class="input_med" name='facility_file_no' type='text' value="<?php echo $values['facility_file_no'] ?>"/>
                            </td>
                        </tr>
                    </table>
                    <table width="750" border="0">           
                        <tr>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <input name="registration_id" type="hidden" value="<?php echo $values['registration_id'] ?>" />
                                <input name="mode" type="hidden" value="<?php echo $_REQUEST['mode'] ?>" />
                                <input name="pid" type="hidden" value="<?php echo $_REQUEST['pid'] ?>" />
                                <input name="encounter_nr" type="hidden" value="<?php echo $_REQUEST['encounter_nr'] ?>" />
                                <input name="file_no" type="hidden" value="<?php echo $_REQUEST['file_no']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#F0F8FF" align="center">
                                <input name="submit" type="submit" class="submit" value=""/>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </p>
        <p>&nbsp;</p></td>
</tr>
</div>
</body>
</html>
