<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="Author" content="Dorothea Reichert">
        <?php
        echo '<script language="JavaScript">';
        require($root_path . 'include/inc_checkdate_lang.php');
        echo '</script>';
        echo '<script language="javascript" src="' . $root_path . 'js/setdatetime.js"></script>';
        echo '<script language="javascript" src="' . $root_path . 'js/checkdate.js"></script>';
        echo '<script language="javascript" src="' . $root_path . 'js/dtpick_care2x.js"></script>';
        ?>
        <script language='javascript' type='text/javascript'>

            function gethelp(x, s, x1, x2, x3, x4) {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php<?php echo URL_APPEND; ?>&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }

            function createTable(element) {
                parent.frames['leftFrame'].location.href = '<?php echo $root_path ?>modules/arv_2/arv_code_tables.php?table=' + element.name;
                element.blur();
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

            function remove_selection(element) {
                var destination_obj = parent.frames['mainFrame'].document.forms[0].elements[element];

                if (destination_obj.type === "text") {
                    destination_obj.value = "";
                    destination_obj_hidden = parent.frames['mainFrame'].document.forms[0].elements[element.substring(0, element.indexOf("_txt"))];
                    destination_obj_hidden.value = "";
                }
                else {
                    if (destination_obj.selectedIndex >= 0) {
                        destination_obj.options[destination_obj.selectedIndex].text = null;
                        destination_obj.options[destination_obj.selectedIndex] = null;
                        return true;
                    }
                    else {
                        alert("Please select one item on the left side if you want to remove it");
                        return false;
                    }
                }
                return true;
            }

            var arr_elements = ["referred_from_other", "transfer_in_other", "supporter_organisation", "adher_reasons"];

            function hide_element() {
                i = 0;
                while (arr_elements) {

                    var e = document.getElementById(arr_elements[i]);
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
                if ((val === 'OTHER (Specify)') || (val === 'OTHER ANTIBIOTICS')) {
                    //alert(val);
                    label.style.display = '';
                } else {  //Hide element and erase/reset the content
                    label.style.display = 'none';
                    label.value = '';
                }
            }

            function adher_reasons(id, val) {
//                alert(id);
//                var e = document.getElementById(id);
                var label = document.getElementById("adher_reasons");
//                val = e.options[e.selectedIndex].text;
                if (val === '2') {
//                    alert(val);
                    label.style.display = '';
                } else {  //Hide element and erase/reset the content
                    label.style.display = 'none';
                    label.value = '';
                }
            }

            function check_filled_textbox(id) {
                var e = document.getElementById(id);
                var isfilled = e.value;
                if (isfilled === '' || isfilled === ' ') {
                    var name = e.getAttribute("name");
                    alert("Please fill " + name + " first");
                }
            }

            function redirect_fn(path) {
                window.open(path);
            }
        </script>
        <title>CTC VISIT</title>
        <link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
        <style type="text/css">
            .error {
                color: red;
                font-weight: bold;
            }

            .mainTable {
                margin-top:15px;
                margin-bottom:15px;
                margin-left:20px;
                margin-right: 10px;
                border: 1px ridge black;
                width:644px;
            }

            .mainTable td {
                padding-left:5px;
            }

            .submit{
                background-image: url(<?php echo $root_path; ?>gui/img/control/blue_aqua/en/en_savedisc.gif);
                background-position:  0px 0px;
                background-repeat: no-repeat;
                width: 76px;
                height: 21px;
                border: 0px;
            }

            .maindiv{
                width:820px;
                height:auto;
                /*margin:0 auto;*/
                /*border:1px solid;*/
            }

            #leftdiv{
                width:670px;
                float:left;
                height:auto;
                /*border:1px solid;*/
            }

            #rightdiv{
                width: 140px;
                float:right;
                /*border:1px solid;*/
                height:600px;
                margin-top:20px;
            }
            #clearfloats{
                clear:both;
            }
            th{
                font-size:large;
                font-weight:bold;
                color:chocolate;
            }
        </style> 
    </head>
    <body onload = "hide_element()">

        <table cellspacing="0"  class="titlebar" border=0 >
            <tr valign=top  class="titlebar" >
                <td bgcolor="#99ccff">&nbsp;&nbsp;<font color="#330066">CTC Visit Form </font></td>
                <td bgcolor="#99ccff" align=right>
                    <a href="javascript:gethelp('arv_visit.php','<?php echo $src; ?>')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                    &nbsp;
                    <a href="<?php echo $root_path . $breakfile . URL_APPEND . $add_breakfile ?>" ><img src="../../gui/img/control/blue_aqua/en/en_cancel.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>     </td>
            </tr>
        </table>
        <div class="maindiv">
            <div id="leftdiv">
                <?php echo $error_messages ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="arv_visit">

                    <table width="644" border="0" class="mainTable">
                        <tr>
                            <td width="300" bgcolor="#F0F8FF"><strong>Unique CTC ID Number:</strong> <?php echo $o_arv_patient->format_ctc_no($art_info['ctc_id']); ?></td>
                            <td colspan="2" bgcolor="#F0F8FF"><strong>Health Facility File Number:</strong> <?php echo $art_info['facility_file_number']; ?></td>
                            <td width="40" bgcolor="#F0F8FF"><strong>Sex: </strong><?php echo strtoupper($art_info['sex']); ?></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><strong>Name:</strong> <?php echo $art_info['name']; ?></td>
                            <td bgcolor="#F0F8FF"><strong>Date of birth:</strong> <?php echo formatDate2Local($art_info['date_of_birth'], 'dd/mm/yyyy'); ?></td>
                            <td colspan="2" bgcolor="#F0F8FF"><strong>PID:</strong> <?php echo $art_info['pid']; ?></td>
                        </tr>
                    </table>
                    <table width="644" border="0" class="mainTable">
                        <tr>
                            <td width="272" bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>Visit Date: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['visit_date'] . "\n" ?>
                                <input name="visit_date" type="text" size="10" maxlength="10"  onfocus="this.select()" onkeyup="setDate(this, '<?php echo $date_format; ?>', '<?php echo $lang; ?>')" 
                                       id="visit_date" type="text" value="<?php echo $values['visit_date']; ?>" 
                                       onClick="show_calendar('arv_visit.visit_date', '<?php echo $date_format; ?>')"/>
                                <a href="javascript:show_calendar('arv_visit.visit_date','<?php echo $date_format; ?>')">
                                    <img src="../../gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a>
                                (dd/mm/yyyy)    </td>
                        </tr>
                        <tr>
                            <td width="272" bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>Visit Type: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['visit_type'] . "\n" ?>
                                <input name="visit_type_txt" value="<?php echo $values['visit_type_txt'] ?>" type="text" onFocus="javascript:createTable(this)" size="10" maxlength="7" />
                                <input name="visit_type" type="hidden" value="<?php echo $values['visit_type'] ?>">	<img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('visit_type_txt')"></td>
                        </tr>

                        <tr>
                            <td bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>Weight:</strong></div></td>
                            <td width="186" bgcolor="#F0F8FF">
                                <?php echo $messages['weight'] . "\n" ?>
                                <input name="weight" type="text" size="6" maxlength="6" value="<?php echo $values['weight']; ?>"/>
                                kg	</td>
                            <td width="164" bgcolor="#F0F8FF"><?php echo $messages['height'] . "\n" ?><strong>Height:</strong>

                                <input name="height" type="text" size="3" maxlength="3" value="<?php echo $values['height']; ?>"/>
                                cm</td>
                        </tr>
                        <tr>
                            <td bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>WHO Clinical Stage:</strong></div></td>
                            <td colspan='2' bgcolor="#F0F8FF">
                                <?php echo $messages['clinical_stage'] . "\n" ?>
                                <?php
                                echo $o_arv_visit->form_dropdown('clinical_stage', $o_arv_visit->get_clinical_stage($values['visit_date']), $values['clinical_stage'], "id = \"clinical_stage\"");
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>CD4 Count / %: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['cd4'] . "\n" ?>
                                <input name="cd4" type="text" value="<?php echo $values['cd4'] ?>" size="6" maxlength="6" /></td>
                        </tr>
                        <tr>
                            <td bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>Aids Defining Illnesses, New Symptoms, Side Effects, Hospitalized: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['illness_code'] . "\n" ?>
                                <select name="illness_code[]" multiple="multiple" onFocus="javascript:createTable(this)" size="4" style="width:200px">
                                    <?php
                                    echo $values['illness_code'];
                                    ?>
                                </select>
                                <img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('illness_code[]')"></td>
                        </tr>
                        <tr>
                            <td bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>Functional Status: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['functional_status'] . "\n" ?>
                                <input name="functional_status_txt" type="text" value="<?php echo $values['functional_status_txt'] ?>" onFocus="javascript:createTable(this)" size="1" maxlength        ="1"/>
                                <input name="functional_status" type="hidden" value="<?php echo $values['functional_status'] ?>" />	<img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('functional_status_txt')"></td>
                        </tr>
                        <?php if (strtoupper($art_info['sex']) == 'F') { ?>
                            <tr>
                                <td bordercolor="#999900" bgcolor="#F0F8FF"  rowspan='4'><div align="right"><strong>Pregnant:</strong></div></td>
                                <td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['pregnant'] . "\n" ?>
                                    <?php
                                    $pregnancies = array('2' => 'No', '1' => 'Yes');
                                    echo $o_arv_patient->form_dropdown('pregnant', $pregnancies, $values['pregnant'], "id = \"pregnant\"");
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo "Date of Delivery: " . $messages['date_of_delivery'] . "\n" ?>
                                    <input name="date_of_delivery" type="text" size="10" maxlength="10" onfocus="this.select()" onkeyup="setDate(this, '<?php echo $date_format; ?>', '<?php echo $lang; ?>')"
                                           id="date_of_delivery" type="text" value="<?php echo $values['date_of_delivery'] ?>" 
                                           onClick="show_calendar('arv_visit.date_of_delivery', '<?php echo $date_format; ?>')"/>
                                    <a href="javascript:show_calendar('arv_visit.date_of_delivery','<?php echo $date_format; ?>')">
                                        <img src="../../gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a>
                                    (dd/mm/yyyy) 
                                </td>
                            </tr>
                            <tr>
                                <td td colspan="2" bgcolor="#F0F8FF">
                                    Family Planning:<input name="family_planning_txt" value="<?php echo $values['family_planning_txt'] ?>" type="text" onFocus="javascript:createTable(this)" size="10" maxlength="7" />
                                    <input name="family_planning" type="hidden" value="<?php echo $values['family_planning'] ?>">	<img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('family_planning_txt')">
                                </td>
                            </tr>
                            <tr>

                                <td td colspan="2" bgcolor="#F0F8FF">
                                    <?php echo $messages['preg_clinic_id'] . "\n" ?>
                                    Clinic ID:<input name="preg_clinic_id" id="preg_clinic_id" value="<?php echo $values['preg_clinic_id'] ?>" type="text" maxlength="7" />
                                </td>
                            </tr>

                        <?php } else {
                            ?>
                            <input name="family_planning" type="hidden" value="">  
                        <?php }
                        ?>

                        <tr>
                            <td bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>TB Screening and Dx: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['tb_status'] . "\n" ?>
                                <input name="tb_status_txt" value="<?php echo $values['tb_status_txt'] ?>" type="text" onFocus="javascript:createTable(this)" size="10" maxlength="7" />
                                <input name="tb_status" type="hidden" value="<?php echo $values['tb_status'] ?>">	<img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('tb_status_txt')"></td>
                        </tr>
                        <tr>
                            <td bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>TB Rx / IPT: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['tb_treatment_code'] . "\n" ?>
                                <select name="tb_treatment_code[]" multiple="multiple" onFocus="javascript:createTable(this)" size="4" style="width:200px">
                                    <?php
                                    echo $values['tb_treatment_code'];
                                    ?>
                                </select>
                                <img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('tb_treatment_code[]')"></td>
                        </tr>

                        <tr>
                            <td bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>ARV Status: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['status'] . "\n" ?>
                                <input name="status_txt" type="text" value="<?php echo $values['status_txt'] ?>" size="1" onFocus="javascript:createTable(this)" maxlength="1" />
                                <input type="hidden" name="status" value="<?php echo $values['status'] ?>"/>	<img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('status_txt')"></td>
                        </tr>
                        <tr>
                            <td bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>ARV Reason: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['status_txt_code'] . "\n" ?>
                                <select name="status_txt_code[]"  multiple onFocus="javascript:createTable(this)" size="4" style="width:200px">
                                    <?php
                                    echo $values['status_txt_code'];
                                    ?>
                                </select>
                                <img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('status_txt_code[]')"></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>ARV Combination Regimen:</strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['regimen_code'] . "\n" ?>
                                <input name="regimen_code_txt" type="text" size="30" value="<?php echo $values['regimen_code_txt'] ?>" onFocus="javascript:createTable(this)" maxlength="30" />
                                <input type="hidden" name="regimen_code" value="<?php echo $values['regimen_code'] ?>"/>
                                No. of Days dispensed:
                                <?php echo $messages['regimen_days'] . "\n" ?>
                                <input name="regimen_days" value="<?php echo $values['regimen_days'] ?>" type="text" size="3" maxlength="3" /></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>ARV Adherence: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['adher_code'] . "\n";
// echo $values['adher_code'];
                                ?>
                                
                                <?php echo $o_arv_patient->form_dropdown('adher_code', $o_arv_visit->get_adher_code(), $values['adher_code'], "id = \"pregnant\"  onchange=\"javascript:adher_reasons('adher_code',this.value)\"") ?>
<!--                                <input name="adher_code_txt" type="text" id="adher_code" value="<?php // echo $values['adher_code_txt']          ?>" onFocus="javascript:createTable(this)" onchange="javascript:adher_reasons('adher_code')" size="1" maxlength="1" />
                                <input type="hidden" name="adher_code" value="<?php // echo $values['adher_code']          ?>"/>	<img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('adher_code_txt')">-->
                            </td>
                        </tr>
                       
                        <tr id='adher_reasons'>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>ARV Poor Adherence Reasons </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['adher_reas_code'] . "\n" ?>
                                <select name="adher_reas_code[]" multiple onFocus="javascript:createTable(this)" size="4" style="width:150px">
                                    <?php
                                    echo $values['adher_reas_code'];
                                    ?>
                                </select>
                                <img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('adher_reas_code[]')"></td>
                        </tr>
                        <!--</table>-->
                        <!--</div>-->

                    <!--<table width="644" border="0" class="mainTable">-->
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>OI RX / Prophylaxis and Relevant Co-Medications: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['drugsandservices'] . "\n" ?>
                                <select name="drugsandservices[]"  multiple onFocus="javascript:createTable(this)" size="4" style="width:200px">
                                    <?php
                                    echo $values['drugsandservices'];
                                    ?>
                                </select>
                                <img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('drugsandservices[]')"></td>
                        </tr>

                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>HB:</strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['hb'] . "\n" ?>
                                <input name="hb" type="text" value="<?php echo $values['hb'] ?>" size="6" maxlength="6" /></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>ALT</strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['alt'] . "\n" ?>
                                <input name="alt" value="<?php echo $values['alt'] ?>" type="text" size="6" maxlength="6" /></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>Other Diagnostic / Lab Results: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['laboratory_param'] . "\n" ?>
                                <select name="laboratory_param[]" multiple onFocus="javascript:createTable(this)" size="4" style="width:250px">
                                    <?php
                                    echo $values['laboratory_param'];
                                    ?>
                                </select>
                                <img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('laboratory_param[]')"></td>
                        </tr>

                        <tr>
                            <td width="272" bordercolor="#999900" bgcolor="#F0F8FF"><div align="right"><strong>Nutritional Status: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['nutritional_status'] . "\n" ?>
                                <input name="nutritional_status_txt" type="text" value="<?php echo $values['nutritional_status_txt'] ?>" onFocus="javascript:createTable(this)" size="10" />
                                <input type="hidden" name="nutritional_status" value="<?php echo $values['nutritional_status'] ?>"/>	<img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('nutritional_status_txt')"></td>
                        </tr>

                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>Nutrition Support needed: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php
                                echo $messages['nutrition_support'] . "\n";
                                echo $o_arv_patient->form_dropdown('nutrition_support', array('2' => 'No', '1' => 'Yes'), $values['nutrition_support'], "id = \"nutrition_support\"");
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>Nutritional Supplement: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['nutritional_supp'] . "\n" ?>
                                <input name="nutritional_supp_txt" type="text" value="<?php echo $values['nutritional_supp_txt'] ?>" onFocus="javascript:createTable(this)" size="10" />
                                <input type="hidden" name="nutritional_supp" value="<?php echo $values['nutritional_supp'] ?>"/>	<img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('nutritional_supp_txt')"></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>Referred to: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['referred_code'] . "\n" ?>
                                <input name="referred_code_txt" value="<?php echo $values['referred_code_txt'] ?>" onFocus="javascript:createTable(this)" type="text" size="20" maxlength="60" />
                                <input type="hidden" name="referred_code" value="<?php echo $values['referred_code'] ?>"/>
                                <img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('referred_code_txt')"></td>
                        </tr>
<!--                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>Next Visit Date: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                        <?php // echo $messages['next_visit_date'] . "\n"      ?>
                                <input name="next_visit_date" value="<?php // echo $values['next_visit_date']                                              ?>" type="text" size="10" maxlength="10" onfocus="this.select()" onkeyup="setDate(this, '<?php // echo $date_format;                                              ?>', '<?php // echo $lang;                                              ?>')" 
                                       id="next_visit_date" type="text" value="" onClick="show_calendar('arv_visit.next_visit_date', '<?php // echo $date_format;                                              ?>')"/>
                                <a href="javascript:show_calendar('arv_visit.next_visit_date','<?php // echo $date_format;                                              ?>')">
                                    <img src="../../gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a>
                                (dd/mm/yyyy) </td>
                        </tr>-->
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>Follow Up Status </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['follow_status_code'] . "\n" ?>
                                <input name="follow_status_code_txt" value="<?php echo $values['follow_status_code_txt'] ?>" onFocus="javascript:createTable(this)" type="text" size="30" maxlength="60" />
                                <input type="hidden" name="follow_status_code" value="<?php echo $values['follow_status_code'] ?>"/>
                                <img src="../../../gui/img/common/default/delete.gif" onClick="javascript:remove_selection('follow_status_code_txt')"></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">&nbsp;</td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"><strong>Signature of clinician: </strong></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">
                                <?php echo $messages['signature'] . "\n" ?>
                                <input name="signature" type="text" size="30" maxlength="60" value="<?php echo $values['signature'] ?>"/></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF"><div align="right"></div></td>
                            <td colspan="2" bgcolor="#F0F8FF">&nbsp;</td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F8FF">&nbsp;</td>
                            <td colspan="2" bgcolor="#F0F8FF" ><input name="submit" type='submit' class="submit" id="submit" value="" onClick="javascript:selectAll()">
                                <input name="mode" type="hidden" value="<?php echo $_REQUEST['mode'] ?>" />
                                <input name="pid" type="hidden" value="<?php echo $_REQUEST['pid'] ?>" />
                                <input name="visit_id" type="hidden" value="<?php echo $_REQUEST['visit_id'] ?>" />
                                <input name="encounter_nr" type="hidden" value="<?php echo $_REQUEST['encounter_nr'] ?>" /></td>
                        </tr>

                    </table>
                </form>
            </div>
            <div id="rightdiv">
                <table>
                    <th>Visits</th>
                    <?php
                    $BGCOLOR = '#E8F2FF';
                    foreach ($visit_table_rows as $row) {
                        $table_string = "<tr bgcolor=\"#F0F8FF\">";
                        $table_string.="<td bgcolor='$BGCOLOR'><div align=\"center\"><a href=javascript:redirect_fn('arv_visit_frameset.php" . URL_APPEND .
                                "&visit_id=" . $row['visit_id'] . "&encounter_nr=" . $row['encounter_nr'] . "&mode=edit&pid=" .
                                $_REQUEST['pid'] . "')>" . $row['visit_date'] . "</a></div></td></tr>";
                        echo $table_string;
                    }
                    ?>
                </table>
            </div>
            <div id="clearfloats">

            </div>
        </div>
    </body>
</html>



