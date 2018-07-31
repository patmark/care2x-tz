<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="Author" content="Dorothea Reichert & Edited by Patrick Mark">
        <?php
        echo '<script language="JavaScript">';
        require($root_path . 'include/inc_checkdate_lang.php');
        echo '</script>';
        echo '<script language="javascript" src="' . $root_path . 'js/setdatetime.js"></script>';
        echo '<script language="javascript" src="' . $root_path . 'js/checkdate.js"></script>';
        echo '<script language="javascript" src="' . $root_path . 'js/dtpick_care2x.js"></script>';
        ?>

        <script language="javascript" type="text/javascript">
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


            function remove_element() {
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

            var arr_elements = ["referred_from_other", "transfer_in_other", "supporter_organisation", "supporter_organisation_td", "transfer_in_div"];

            function hide_element() {
                i = 0;
                while (arr_elements) {

                    var e = document.getElementById(arr_elements[i]);
                    if (arr_elements[i] === 'transfer_in_div') {
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
                if (val === 'OTHER (Specify)') {
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
                if (val === 'ON ART (with records)') {
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

            function get_facility_name(ctc_no) {
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
                        document.getElementById("facility_name").innerHTML = xmlhttp.responseText;
                    }
                }
                //alert(ctc_no);
                urlholder = "<?php echo $root_path; ?>modules/arv_2/arv_get_facility.php?ctc_id=" + ctc_no;
                xmlhttp.open("POST", urlholder, false);
                xmlhttp.send();
            }
            function redirect_fn(path) {
                window.open(path);
            }
        </script>
        <title>CTC Patient Registration</title>
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
                <td bgcolor="#99ccff"><font color="#330066">&nbsp;&nbsp;CTC Registration</font></td>
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
                        <td bgcolor="#F0F8FF"><strong>Name:</strong> <?php echo $registration_data['name']; ?></td>
                        <td bgcolor="#F0F8FF"><strong>Marital Status: </strong> <?php echo $registration_data['marital_status']; ?></td>
                        <td bgcolor="#F0F8FF" colspan="2"><strong>Age:</strong> <?php echo $registration_data['age']; ?></td>
                    </tr>
                </table>
            </fieldset>
            <form id="arv_registration" name="arv_registration" method="post" action="">
                <fieldset>
                    <legend onClick="toggle(this)"><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18"><strong>Patient ART Registration</strong></legend>
                    <table width="750" border="0">

                        <tr>
                            <td width="206" bgcolor="#F0F8FF"><strong>Unique CTC ID Number: </strong></td>
                            <td width="534" colspan="3" bgcolor="#F0F8FF"><?php echo $messages['ctc_id'] . "\n" ?>
                                <input name="ctc_id" type="text" id="ctc_id" <?php echo $mode == 'edit' ? 'readonly' : ''; ?> value="<?php echo $o_arv_patient->format_ctc_no($values['ctc_id']); ?>" size="17" maxlength="17" onblur="get_facility_name(this.value)"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" bgcolor="#F0F8FF">
                                <div id="facility_name"></div> 
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF">&nbsp;</td>
                            <td colspan="3" bgcolor="#F0F8FF"></td>
                        </tr>
                        <?php if ($mode == 'new') { ?>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Patient Referred from:</strong></td>
                                <?php echo $messages['referred_from'] . "\n" ?>
                                <td colspan="1" bgcolor="#F0F8FF">
                                    <?php echo $o_arv_patient->form_dropdown('referred_from', $o_arv_patient->get_referred_from(), $values['referred_from'], "id = \"referred_from\" onchange=\"check_other('referred_from','referred_from_other')\""); ?>
                                </td>
                                <td colspan="3" bgcolor="#F0F8FF"><?php echo $messages['referred_from_other'] . "\n" ?>
                                    <input name="referred_from_other" id="referred_from_other" type="text" value="<?php echo $values['referred_from_other']; ?>" maxlength="30" />
                                </td>
                            </tr>
                            <tr>
                                <td width="200" bgcolor="#F0F8FF"><strong>Prior ARV Exposure: </strong></td>
                                <td colspan="3" bgcolor="#F0F8FF">
                                    <?php echo $messages['exposure'] . "\n" ?>
                                    <?php echo $o_arv_patient->form_dropdown('exposure', $o_arv_patient->get_prior_exposure(), $values['exposure'], "id = \"exposure\" onchange=\"check_transfer_in('exposure','transfer_in_div')\""); ?>
                                </td>
                            </tr>
                        </table>
                        <div id="transfer_in_div">
                            <table width="750" border="0">
                                <tr>
                                    <td bgcolor="#F0F8FF"><strong>Transfer In:</strong></td>
                                    <?php echo $messages['transfer_in'] . "\n" ?>
                                    <td colspan="2" bgcolor="#F0F8FF">
                                        <?php echo $o_arv_patient->form_dropdown('transfer_in', $o_arv_patient->get_transfer_in(), $values['transfer_in'], "id = \"transfer_in\" onchange=\"check_transfer_in_data('transfer_in','transfer_in_data');\""); ?>
                                    </td>
                                    <td colspan="3" bgcolor="#F0F8FF"><?php echo $messages['transfer_in_other'] . "\n" ?>
                                        <input name="transfer_in_other" id="transfer_in_other" type="text" value="<?php echo $values['transfer_in_other']; ?>" maxlength="30" />
                                    </td>
                                </tr>
                            </table>
                            <div id='transfer_in_data'>
                                <table  width="750" border="0">
                                    <tr>
                                        <td bgcolor="#F0F8FF"><strong>Date Start ART Another Clinic</strong></td>
                                        <td bgcolor="#F0F8FF">
                                            <?php echo $messages['date_start_art'] . "\n" ?>
                                            <input name="date_start_art" type="text" id="date_start_art" value="<?php echo $values['date_start_art']; ?>" size="10" maxlength="10" 
                                                   onfocus="this.select()" onkeyup="setDate(this, '<?php echo $date_format; ?>', '<?php echo $lang; ?>')"
                                                   onClick="show_calendar('arv_registration.date_start_art', '<?php echo $date_format; ?>')"/>
                                            <a href="javascript:show_calendar('arv_registration.date_start_art','<?php echo $date_format; ?>')">
                                                <img src="<?php echo $root_path; ?>gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a>(dd/mm/yy)		  </td>
                                        <td colspan="2" bgcolor="#F0F8FF"><strong><i>Status at Start ART:</i></strong> </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F0F8FF">&nbsp;</td>
                                        <td bgcolor="#F0F8FF">&nbsp;</td>
                                        <td width="155" bgcolor="#F0F8FF" >
                                            <?php echo $messages['age_start_art'] . "\n" ?>
                                            Age: 
                                        </td>
                                        <td width="135" bgcolor="#F0F8FF">
                                            <input name="age_start_art" type="text" id="age_start_art" value="<?php echo $values['age_start_art']; ?>" size="8" maxlength="8"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F0F8FF">&nbsp;</td>
                                        <td bgcolor="#F0F8FF">&nbsp;</td>
                                        <td width="155" bgcolor="#F0F8FF" >
                                            <?php echo $messages['status_clinical_stage'] . "\n" ?>
                                            Clinical/WHO Stage: 
                                            <?php $selected[$values['status_clinical_stage']] = "selected"; ?></td>
                                        <td width="135" bgcolor="#F0F8FF"><select name="status_clinical_stage" size="1" id="status_clinical_stage">
                                                <option <?php echo $selected[""] ?> ></option>
                                                <option <?php echo $selected[1] ?> >1</option>
                                                <option <?php echo $selected[2] ?> >2</option>
                                                <option <?php echo $selected[3] ?> >3</option>
                                                <option <?php echo $selected[4] ?> >4</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F0F8FF">&nbsp;</td>
                                        <td bgcolor="#F0F8FF">&nbsp;</td>
                                        <td bgcolor="#F0F8FF">
                                            <?php echo $messages['status_cd4'] . "\n" ?>
                                            CD4:          </td>
                                        <td bgcolor="#F0F8FF"><input name="status_cd4" type="text" id="status_cd4" value="<?php echo $values['status_cd4']; ?>" size="8" maxlength="8" />
                                            <input name="status_cd4_code" type="hidden" value="<?php echo $values['status_cd4_code']; ?>" />		  </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F0F8FF">&nbsp;</td>
                                        <td bgcolor="#F0F8FF">&nbsp;</td>
                                        <td bgcolor="#F0F8FF">
                                            <?php echo $messages['status_function'] . "\n" ?>
                                            Functional Status:
                                        </td>
                                        <td bgcolor="#F0F8FF">
                                            <?php echo $o_arv_patient->form_dropdown('status_function', $o_arv_patient->get_status_function(), $values['status_function'], "id = \"status_function\""); ?>      
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F0F8FF">&nbsp;</td>
                                        <td bgcolor="#F0F8FF">&nbsp;</td>
                                        <td bgcolor="#F0F8FF">
                                            <?php echo $messages['status_weight'] . "\n" ?>
                                            Body Weight          </td>
                                        <td bgcolor="#F0F8FF"><input name="status_weight" type="text" id="status_weight" value="<?php echo $values['status_weight']; ?>" size="8" maxlength="8" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend onClick="toggle(this)"><strong><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18">Patient Address</strong></legend>
                        <table width="750" border="0">
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Region: </strong> &nbsp;<?php echo $registration_data['region']; ?></td>
                                <td bgcolor="#F0F8FF" colspan="2"><strong>District: </strong>&nbsp;<?php echo $registration_data['district']; ?></td>
                                <td bgcolor="#F0F8FF" colspan="2"><strong>Division: </strong>&nbsp;<?php echo $registration_data['division']; ?></td>

                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Ward: </strong> &nbsp;<?php echo $registration_data['ward']; ?></td>
    <!--                            <td bgcolor="#F0F8FF"><strong>Village: </strong>  <?php // echo $registration_data['street'];                                                                                                                                              ?></td>-->
                                <td bgcolor="#EAF4FF" colspan="2"><strong>Street/Village: </strong>  <?php echo $registration_data['village']; ?></td>
                                <td bgcolor="#F0F8FF" colspan="2"><strong>Telephone:</strong>  <?php echo $registration_data['telephone']; ?></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF" colspan="5">&nbsp;</td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Street/Village Chairman: </strong></td>
                                <td colspan="4" bgcolor="#F0F8FF">
                                    <?php echo $messages['chairman_vname'] . "\n" ?>
                                    <!--                                First Name:          </td>-->
                                    <!--                            <td bgcolor="#F0F8FF">-->
                                    <input name="chairman_vname" type="text" id="chairman_vname" value="<?php echo $values['chairman_vname']; ?>" size="20" maxlength="60" /></td>
    <!--                            <td bgcolor="#F0F8FF"><?php // echo $messages['chairman_nname'] . "\n"                                                  ?> Last Name:          </td>
                                <td bgcolor="#F0F8FF"><input name="chairman_nname" type="text" id="chairman_nname" value="<?php // echo $values['chairman_nname'];                                                  ?>" size="15" maxlength="60" /></td>-->
                            </tr>

                            <tr>
                                <td bgcolor="#F0F8FF">&nbsp;</td>
                                <td colspan="4" bgcolor="#F0F8FF">&nbsp;</td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Name of Ten Cell Leader: </strong></td>
                                <td colspan="4" bgcolor="#F0F8FF">
                                    <?php echo $messages['ten_cell_leader'] . "\n" ?>
                                    <input name="ten_cell_leader" type="text" id="ten_cell_leader" value="<?php echo $values['ten_cell_leader']; ?>" size="20" maxlength="60" /></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Name of Head of Household: </strong></td>
                                <td colspan="2" bgcolor="#F0F8FF"><?php echo $messages['head_of_household'] . "\n" ?>
                                    <input name="head_of_household" type="text" id="head_of_household" value="<?php echo $values['head_of_household']; ?>" size="14" maxlength="60" />
                                </td>
                                <td bgcolor="#F0F8FF"><strong>Contact of Household Head: </strong></td>
                                <td colspan="2" bgcolor="#F0F8FF"><?php echo $messages['head_of_household_contact'] . "\n" ?>
                                    <input name="head_of_household_contact" type="text" id="head_of_household_contact" value="<?php echo $values['head_of_household_contact']; ?>" size="14" maxlength="60" />
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend onClick="toggle(this)"><strong><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18">Patient Support</strong></legend>
                        <table width="750" border="0">
                            <tr>
                                <td width="316" bgcolor="#F0F8FF"><strong>Treatment Supporter Name:</strong></td>
                                <td width="424" colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['supporter_vname'] . "\n" ?>
                                    <input name="supporter_vname" type="text" id="supporter_vname" value="<?php echo $values['supporter_vname']; ?>" size="30" maxlength="60" /></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Street:</strong></td>
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['supporter_street'] . "\n" ?>
                                    <input name="supporter_street" type="text" id="supporter_street" value="<?php echo $values['supporter_street']; ?>" size="30" maxlength="60" /></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Village:</strong></td>
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['supporter_villae'] . "\n" ?>
                                    <input name="supporter_village" type="text" id="supporter_village" value="<?php echo $values['supporter_village']; ?>" size="30" maxlength="60" /></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Treatment Supporter Telephone:</strong></td>
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['supporter_telephone'] . "\n" ?>
                                    <input name="supporter_telephone" type="text" id="supporter_telephone" value="<?php echo $values['supporter_telephone']; ?>" size="10" maxlength="10" /></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Patient Joined Community Support Organisation:</strong></td> 
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['joined_supporter_org'] . "\n" ?>
                                    <?php echo $o_arv_patient->form_dropdown('joined_supporter_org', array('No' => 'No', 'Yes' => 'Yes'), $values['joined_supporter_org'], "id = \"joined_supporter_org\" onchange=\"check_joined('joined_supporter_org','supporter_organisation')\""); ?>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" bgcolor="#F0F8FF" id="supporter_organisation_td"><strong>Community Support Organisation/Group </strong></td>
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['supporter_organisation'] . "\n" ?>
                                    <input name="supporter_organisation" type="text" id="supporter_organisation" value="<?php echo $values['supporter_organisation']; ?>" size="30" maxlength="60" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend onClick="toggle(this)"><strong><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18">Drug Allergies</strong></legend>
                        <table width="750" border="0" bgcolor="#F0F8FF">
                            <tr>
                                <td width="266" rowspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['insert_allergies'] . "\n" ?>
                                    <input name="insert_allergies" type="text" id="insert_allergies" size="30" maxlength="60"></td>
                                <td width="86" bgcolor="#F0F8FF"><input name="add" type="button" id="add" onclick="javascript:insert()" value="add"></td>
                                <td width="384" colspan="2" rowspan="2">
                                    <select name="allergies[]" size="4" multiple id="allergies[]" style="width:250px">
                                        <?php echo $values['allergies'] ?>
                                    </select>		  </td>
                            </tr>

                            <tr>
                                <td bgcolor="#F0F8FF"><input name="delete" type="button" onclick="javascript:remove_element()" id="delete" value="del"></td>
                            </tr>
                        </table>
                    </fieldset>

                    <fieldset>
                        <legend onClick="toggle(this)"><strong><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18">ARV Data </strong></legend>
                        <table width="750" border="0">
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>TB Registration No:</strong></td>
                                <td bgcolor="#F0F8FF">
                                    <?php echo $messages['tb_reg_no'] . "\n" ?>
                                    <input name="tb_reg_no" type="text" id="tb_reg_no" value="<?php echo $values['tb_reg_no']; ?>" size="20" maxlength="60" />
                                </td>
                                <td bgcolor="#F0F8FF"></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Huwanyu/HBC Number:</strong></td>
                                <td bgcolor="#F0F8FF">
                                    <?php echo $messages['hbc_number'] . "\n" ?>
                                    <input name="hbc_number" type="text" id="hbc_number" value="<?php echo $values['hbc_number']; ?>" size="20" maxlength="60" />
                                </td>
                                <td bgcolor="#F0F8FF"></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Date of first HIV+ Test: </strong></td>
                                <td bgcolor="#F0F8FF">
                                    <?php echo $messages['date_first_hiv_test'] . "\n" ?>
                                    <input name="date_first_hiv_test" type="text" id="date_first_hiv_test" size="8" maxlength="10" 
                                           onfocus="this.select()" onClick="show_calendar('arv_registration.date_first_hiv_test', '<?php echo $date_format; ?>')" onkeyup="setDate(this, '<?php echo $date_format; ?>', '<?php echo $lang; ?>')" 
                                           value="<?php echo $values['date_first_hiv_test']; ?>" />
                                    <a href="javascript:show_calendar('arv_registration.date_first_hiv_test','<?php echo $date_format; ?>')">
                                        <img src="<?php echo $root_path; ?>gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a>
                                    (dd/mm/yyyy)		  </td>
                                <td colspan="2" bgcolor="#F0F8FF">&nbsp;</td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Date Confirmed HIV+:</strong></td>
                                <td bgcolor="#F0F8FF">
                                    <?php echo $messages['date_confirmed_hiv'] . "\n" ?>
                                    <input name="date_confirmed_hiv" type="text" id="date_confirmed_hiv" value="<?php echo $values['date_confirmed_hiv']; ?>" size="8" maxlength="10" 
                                           onfocus="this.select()" onkeyup="setDate(this, '<?php echo $date_format; ?>', '<?php echo $lang; ?>')" 
                                           onClick="show_calendar('arv_registration.date_confirmed_hiv', '<?php echo $date_format; ?>')"/>
                                    <a href="javascript:show_calendar('arv_registration.date_confirmed_hiv','<?php echo $date_format; ?>')">
                                        <img src="<?php echo $root_path; ?>gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a>
                                    (dd/mm/yyyy)		  </td>
                                <td colspan="2" bgcolor="#F0F8FF">&nbsp;</td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Date Enrolled in Care: </strong></td>
                                <td bgcolor="#F0F8FF"><?php echo $messages['date_enrolled'] . "\n" ?>
                                    <input name="date_enrolled" type="text" id="date_enrolled" value="<?php echo $values['date_enrolled']; ?>" size="8" maxlength="10" 
                                           onfocus="this.select()" onkeyup="setDate(this, '<?php echo $date_format; ?>', '<?php echo $lang; ?>')" 
                                           onClick="show_calendar('arv_registration.date_enrolled', '<?php echo $date_format; ?>')"/>
                                    <a href="javascript:show_calendar('arv_registration.date_enrolled','<?php echo $date_format; ?>')">
                                        <img src="<?php echo $root_path; ?>gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a>(dd/mm/yyyy)		  </td>
                                <td colspan="2" bgcolor="#F0F8FF">&nbsp;</td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Date Medically Eligible: </strong></td>
                                <td bgcolor="#F0F8FF"><?php echo $messages['date_eligible'] . "\n" ?>
                                    <input name="date_eligible" type="text" id="date_eligible" value="<?php echo $values['date_eligible']; ?>" size="8" maxlength="10" 
                                           onfocus="this.select()" onkeyup="setDate(this, '<?php echo $date_format; ?>', '<?php echo $lang; ?>')" 
                                           onClick="show_calendar('arv_registration.date_eligible', '<?php echo $date_format; ?>')"/>
                                    <a href="javascript:show_calendar('arv_registration.date_eligible','<?php echo $date_format; ?>')">
                                        <img src="<?php echo $root_path; ?>gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a> (dd/mm/yyyy)		  </td>
                                <td colspan="2" bgcolor="#F0F8FF"><strong><i>Why Eligible: </i></strong></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF">&nbsp;</td>
                                <td bgcolor="#F0F8FF">&nbsp;</td>
                                <td bgcolor="#F0F8FF">
                                    <?php echo $messages['eligible_reason'] . "\n" ?>
                                    <input name="eligible_reason" type="radio" value="1"  <?php echo $values['eligible_reason'] == 1 ? 'checked="checked" ' : '' ?> />
                                    WHO STAGE (1-4) 
                                </td>
                                <td bgcolor="#F0F8FF">
                                    <input name="eligible_reason_who" type="text" id="eligible_reason_who" value="<?php echo $values['eligible_reason_who']; ?>" size="8" maxlength="8" />
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF">&nbsp;</td>
                                <td bgcolor="#F0F8FF">&nbsp;</td>
                                <td bgcolor="#F0F8FF"><?php echo $messages['eligible_reason_cd4'] . "\n" ?>
                                    <input name="eligible_reason" type="radio"   <?php echo $values['eligible_reason'] == 2 ? 'checked="checked" ' : '' ?> value="2" />
                                    CD4 Count/% 
                                </td>
                                <td bgcolor="#F0F8FF">
                                    <input name="eligible_reason_cd4" type="text" id="eligible_reason_cd4" value="<?php echo $values['eligible_reason_cd4']; ?>" size="8" maxlength="8" />
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF">&nbsp;</td>
                                <td bgcolor="#F0F8FF">&nbsp;</td>
                                <td bgcolor="#F0F8FF"><?php echo $messages['eligible_reason_tlc'] . "\n" ?>
                                    <input name="eligible_reason" type="radio"  <?php echo $values['eligible_reason'] == 3 ? 'checked="checked" ' : '' ?> value="3" />
                                    TLC 
                                </td>
                                <td bgcolor="#F0F8FF">
                                    <input name="eligible_reason_tlc" type="text" id="eligible_reason_tlc" value="<?php echo $values['eligible_reason_tlc']; ?>" size="8" maxlength="8" />
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF">&nbsp;</td>
                                <td bgcolor="#F0F8FF">&nbsp;</td>
                                <td colspan="2" bgcolor="#F0F8FF">&nbsp;</td>

                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Date Eligible &amp; Ready:</strong> </td>
                                <td bgcolor="#F0F8FF">
                                    <?php echo $messages['date_ready'] . "\n" ?>
                                    <input name="date_ready" type="text" id="date_ready" value="<?php echo $values['date_ready']; ?>" size="10" maxlength="10" 
                                           onfocus="this.select()" onkeyup="setDate(this, '<?php echo $date_format; ?>', '<?php echo $lang; ?>')" 
                                           onClick="show_calendar('arv_registration.date_ready', '<?php echo $date_format; ?>');"/>
                                    <a href="javascript:show_calendar('arv_registration.date_ready','<?php echo $date_format; ?>')">
                                        <img src="<?php echo $root_path; ?>gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a>(dd/mm/yy)		  </td>
                                <td colspan="2" bgcolor="#F0F8FF">&nbsp;</td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } else { ?>
                    </table>
                    </fieldset>
                    <fieldset>
                        <legend onClick="toggle(this)"><strong><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18">Patient Address</strong></legend>
                        <table width="750" border="0">
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Region: </strong> &nbsp;<?php echo $registration_data['region']; ?></td>
                                <td bgcolor="#F0F8FF" colspan="2"><strong>District: </strong>&nbsp;<?php echo $registration_data['district']; ?></td>
                                <td bgcolor="#F0F8FF" colspan="2"><strong>Division: </strong>&nbsp;<?php echo $registration_data['division']; ?></td>

                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Ward: </strong> &nbsp;<?php echo $registration_data['ward']; ?></td>
    <!--                            <td bgcolor="#F0F8FF"><strong>Village: </strong>  <?php // echo $registration_data['street'];                                                                                                                                              ?></td>-->
                                <td bgcolor="#EAF4FF" colspan="2"><strong>Street/Village: </strong>  <?php echo $registration_data['village']; ?></td>
                                <td bgcolor="#F0F8FF" colspan="2"><strong>Telephone:</strong>  <?php echo $registration_data['telephone']; ?></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF" colspan="5">&nbsp;</td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Street/Village Chairman: </strong></td>
                                <td colspan="4" bgcolor="#F0F8FF">
                                    <?php echo $messages['chairman_vname'] . "\n" ?>
                                    <!--                                First Name:          </td>-->
                                    <!--                            <td bgcolor="#F0F8FF">-->
                                    <input name="chairman_vname" type="text" id="chairman_vname" value="<?php echo $values['chairman_vname']; ?>" size="20" maxlength="100" /></td>
    <!--                            <td bgcolor="#F0F8FF"><?php // echo $messages['chairman_nname'] . "\n"                                                  ?> Last Name:          </td>
                                <td bgcolor="#F0F8FF"><input name="chairman_nname" type="text" id="chairman_nname" value="<?php // echo $values['chairman_nname'];                                                  ?>" size="15" maxlength="60" /></td>-->
                            </tr>

                            <tr>
                                <td bgcolor="#F0F8FF">&nbsp;</td>
                                <td colspan="4" bgcolor="#F0F8FF">&nbsp;</td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Name of Ten Cell Leader: </strong></td>
                                <td colspan="4" bgcolor="#F0F8FF">
                                    <?php echo $messages['ten_cell_leader'] . "\n" ?>
                                    <input name="ten_cell_leader" type="text" id="ten_cell_leader" value="<?php echo $values['ten_cell_leader']; ?>" size="20" maxlength="100" /></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Name of Head of Household: </strong></td>
                                <td colspan="2" bgcolor="#F0F8FF"><?php echo $messages['head_of_household'] . "\n" ?>
                                    <input name="head_of_household" type="text" id="head_of_household" value="<?php echo $values['head_of_household']; ?>" size="14" maxlength="60" />
                                </td>
                                <td bgcolor="#F0F8FF"><strong>Contact of Household Head: </strong></td>
                                <td colspan="2" bgcolor="#F0F8FF"><?php echo $messages['head_of_household_contact'] . "\n" ?>
                                    <input name="head_of_household_contact" type="text" id="head_of_household_contact" value="<?php echo $values['head_of_household_contact']; ?>" size="14" maxlength="60" />
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend onClick="toggle(this)"><strong><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18">Patient Support</strong></legend>
                        <table width="750" border="0">
                            <tr>
                                <td width="316" bgcolor="#F0F8FF"><strong>Treatment Supporter Name:</strong></td>
                                <td width="424" colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['supporter_vname'] . "\n" ?>
                                    <input name="supporter_vname" type="text" id="supporter_vname" value="<?php echo $values['supporter_vname']; ?>" size="30" maxlength="60" /></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Street:</strong></td>
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['supporter_street'] . "\n" ?>
                                    <input name="supporter_street" type="text" id="supporter_street" value="<?php echo $values['supporter_street']; ?>" size="30" maxlength="60" /></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Village:</strong></td>
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['supporter_villae'] . "\n" ?>
                                    <input name="supporter_village" type="text" id="supporter_village" value="<?php echo $values['supporter_village']; ?>" size="30" maxlength="60" /></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Treatment Supporter Telephone:</strong></td>
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['supporter_telephone'] . "\n" ?>
                                    <input name="supporter_telephone" type="text" id="supporter_telephone" value="<?php echo $values['supporter_telephone']; ?>" size="10" maxlength="10" /></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F8FF"><strong>Patient Joined Community Support Organisation:</strong></td> 
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['joined_supporter_org'] . "\n" ?>
                                    <?php echo $o_arv_patient->form_dropdown('joined_supporter_org', array('No' => 'No', 'Yes' => 'Yes'), $values['joined_supporter_org'], "id = \"joined_supporter_org\" onchange=\"check_joined('joined_supporter_org','supporter_organisation')\""); ?>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" bgcolor="#F0F8FF" id="supporter_organisation_td"><strong>Community Support Organisation/Group </strong></td>
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['supporter_organisation'] . "\n" ?>
                                    <input name="supporter_organisation" type="text" id="supporter_organisation" value="<?php echo $values['supporter_organisation']; ?>" size="30" maxlength="60" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend onClick="toggle(this)"><strong><img src="<?php echo $root_path; ?>gui/img/common/default/plus_menu.gif" width="18" height="18">Drug Allergies</strong></legend>
                        <table width="750" border="0" bgcolor="#F0F8FF">
                            <tr>
                                <td width="266" rowspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['insert_allergies'] . "\n" ?>
                                    <input name="insert_allergies" type="text" id="insert_allergies" size="30" maxlength="60"></td>
                                <td width="86" bgcolor="#F0F8FF"><input name="add" type="button" id="add" onclick="javascript:insert()" value="add"></td>
                                <td width="384" colspan="2" rowspan="2">
                                    <select name="allergies[]" size="4" multiple id="allergies[]" style="width:250px">
                                        <?php echo $values['allergies'] ?>
                                    </select>		  </td>
                            </tr>

                            <tr>
                                <td bgcolor="#F0F8FF"><input name="delete" type="button" onclick="javascript:remove_element()" id="delete" value="del"></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>
                <fieldset>
                    <table width="750">
                        <tr>
                            <td width="95" bgcolor="#F0F8FF"><?php echo $messages['signature'] . "\n" ?><strong>Signature:</strong></td>
                            <td width="643" bgcolor="#F0F8FF"><input name="signature" type="text" id="signature" value="<?php echo $values['signature']; ?>" size="20" maxlength="60" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#F0F8FF">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <input name="registration_id" type="hidden" value="<?php echo $values['registration_id'] ?>" />
                                <input name="mode" type="hidden" value="<?php echo $_REQUEST['mode'] ?>" />
                                <input name="pid" type="hidden" value="<?php echo $_REQUEST['pid'] ?>" />
                                <input name="encounter_nr" type="hidden" value="<?php echo $_REQUEST['encounter_nr'] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#F0F8FF" align="center">
                                <input name="submit" type="submit" class="submit" value='' onClick="javascript:selectAll();"/>
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
