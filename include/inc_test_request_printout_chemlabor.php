<?php
//* Get the global config for billing ando other items*/
include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
$glob_obj = new GlobalConfig($GLOBAL_CONFIG);
?>
<!-- outermost table for the form -->
<table border=0 cellpadding=1 cellspacing=0 bgcolor="#606060">
    <tr>
        <td>

            <!-- table for the form simulating the border -->
            <table border=0 cellspacing=0 cellpadding=0 bgcolor="white" width=750>
                <tr>
                    <td>

                        <!-- Here begins the table for the form  -->

                        <table   cellpadding=0 cellspacing=0 border=0 width=750>
                            <tr  valign="top">
                                <!--
                                                        <td bgcolor="<?php echo $bgc1 ?>" width="230">
                                                                        <div class="lmargin">
                                                                        <font size=3 color="#990000" face="arial">
                                                                                <p>
                                
                                                                        </div>
                                                                </td>
                                -->
                                <!-- Middle block of first row -->
                                <td bgcolor="<?php echo $bgc1 ?>">
                                    <table border="1" cellpadding="0" bgcolor="" align="center" style="border-collapse: collapse">
                                        <tr>
                                            <td colspan="5" align="center">
                                                <?php
                                                echo '<font color="#ffffee" class="vi_data"><b>'
                                                . strtoupper($glob_obj->getConfigValue("main_info_facility_name") . ' Clinical Laboratory')
                                                . ' </b></font>';

                                                echo '</br></br>'
                                                . '<font color="#ffffee" class="vi_data"><b>'
                                                . 'Request for Laboratory Examination'
                                                . ' </b></font>';
                                                ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <?php
                                            /* Patient label */
                                            if ($read_form) {
                                                echo '
					<td width=20%><font color="purple">Priority:&nbsp</font>';
                                                if ($urgency == 0) {
                                                    echo '<font color="green"><b>NORMAL';
                                                }
                                                if ($urgency == 3) {
                                                    echo '<font color="blue"><b>PRIORITY';
                                                }
                                                if ($urgency == 5) {
                                                    echo '<font color="orange"><b>URGENT';
                                                }
                                                if ($urgency == 7) {
                                                    echo '<font color="red"><b>EMERGENCY';
                                                }
                                                echo '</td>';
                                                echo'<td width=20%>
					<font color="purple">' . $LDSelianFileNr . '
						<font color="#ffffee" class="vi_data"><b>' . $h_selian_file_number . '
					</td>
					<td width="20%">
					<font color="purple">' . $LDPatientID . '
						<font color="#ffffee" class="vi_data"><b>' . $h_pid . '
					</td>
					<td width="20%">
							<font color="purple">' . $LDSurnameUkoo . '
					 	<font color="#ffffee" class="vi_data"><b>
						' . $h_name_last . '</b>
					</td>
                    <td width="20%">
                            <font color="purple">Health Fund:
                        <font color="#ffffee" class="vi_data"><b>
                        ' . $h_HealthFundName. '</b>
                    </td>

					<td width="20%">
					<font color="purple">' . $LDFirstName . '
					<font color="#ffffee" class="vi_data"><b>
						' . $h_name_first . ' </b>
					</font>
					</td>';
                                                //echo '<img src="'.$root_path.'main/imgcreator/barcode_label_single_large.php?sid=$sid&lang=$lang&fen='.$full_en.'&en='.$pn.'" width=282 height=178>';
                                            }
                                            ?>
                                        </tr>

                                        <tr bgcolor="<?php echo $bgc1 ?>">
                                            <td colspan="">
                                                <font size=2 color="purple" face="verdana,arial" ><?php echo $LDBirthdate; ?> &nbsp; </font>
                                                <?php
                                                $birthdate = date('d-M-Y', strtotime($h_birthdate));
                                                ?>
                                                <font size=2 color="#ffffee" class="vi_data"><b><?php echo $birthdate . ' (' . exactAge(date('d-m-Y', strtotime($h_birthdate))) . ')'; ?></b>&nbsp;</font></td>
                                            <td align="center">
                                                <font size=2 color="purple" face="verdana,arial"><?php echo $LDSex; ?> &nbsp;</font>
                                                <font size=2 color="#ffffee" class="vi_data"><b><?php echo strtoupper($h_sex); ?></b>&nbsp;&nbsp;</font>
                                                <img src="<?php echo $root_path; ?>/gui/img/common/default/<?php echo $h_sex_img; ?>">
                                            </td>
                                            <td colspan="2">
                                                <font size=2 color="purple" face="verdana,arial"><?php
                                                if ($h_encounter_class_nr == "2") {
                                                    echo 'Clinic/Department: ';
                                                    echo '<font size=2 color="#ffffee" class="vi_data"><b>'
                                                    . $h_opd_admission
                                                    . ' </b></font>';
                                                } else {
                                                    echo 'Ward/Station: ';
                                                    echo '<font size=2 color="#ffffee" class="vi_data"><b>'
                                                    . $h_ipd_admission
                                                    . ' </b></font>';
                                                }
                                                ?>  </font>

                                            </td>
                                            <td>
                                                <font size=2 color="purple" face="verdana,arial" ><?php echo $LDRequestDateTime; ?> &nbsp; </font>
                                                <?php
                                                echo '<font size=2 color="#ffffee" class="vi_data"><b>'
                                                . date('d-M-Y  H:i:s', strtotime($h_request_date))
                                                . '</b></font>';
                                                ?></td>

                                        </tr>
                                    </table>
                                </td>
                                <td  bgcolor="<?php echo $bgc1 ?>"  align="right">
                                    <!--  Block for the casenumber codes -->
                                </td>
                        </table>

                    </td>

                </tr>

                <!--  Specimen details here-->

                <tr>
                    <td align="center" style="background-color: #cee1e3">
                        <font size=2 color="purple" face="verdana,arial"><b><?php echo ucwords($LDSpecimenDet); ?> </b></font>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="<?php echo $bgc1 ?>" style="text-align: center; padding-bottom: 5px;">
                        <?php if ($h_specimen_collected == 1) { ?>
                            <table width="100%"  border="1" bgcolor="" style="border-collapse: collapse">
                                <tr style="color: #578195; text-align: center;">
                                    <td width="20%"><strong>Specimen Date & Time</strong></td>
                                    <td width="30%"><strong>Specimen Type</strong></td>
                                    <td width="30%"><strong>Specimen Volume/Mass</strong></td>
                                    <td width="20%"><strong>Container(s) Used</strong></td>
                                </tr>
                                <tr style="color: #738086">
                                    <td width="20%"><?php echo '<font size=2 color="#ffffee" class="vi_data">' . date('d-M-Y  H:i:s', strtotime($h_specimen_date)) . '</font>'; ?></td>
                                    <td width="30%"><?php echo '<font size=2 color="#ffffee" class="vi_data">' . $h_specimen_type . '</font>'; ?></td>
                                    <td width="30%"><?php echo '<font size=2 color="#ffffee" class="vi_data">' . $h_specimen_volume . '</font>'; ?></td>
                                    <td width="20%"><?php echo '<font size=2 color="#ffffee" class="vi_data">' . $h_specimen_container . '</font>'; ?></td>
                                </tr>
                            </table>
                            <?php
                        } else {
                            echo '<i>' . $LDSpecimenNotCol . '</i>';
                        }
                        ?>
                    </td>

                </tr>
                <!--  End of Specimen Details-->

                <!--  Clinical notes here-->

                <!-- <tr>
                    <td align="center" style="background-color: #cee1e3">
                        <font size=2 color="purple" face="verdana,arial"><b><?php //echo ucwords($LDClinicalInfo); ?> </b></font>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="<?php //echo $bgc1 ?>" style="text-align: center; padding-bottom: 5px;">
                        <table width="100%"  border="1" bgcolor="" style="border-collapse: collapse">
                            <tr style="color: #578195; text-align: center;">
                                <td width="12%"><strong>Date</strong></td>
                                <td width="75%"><strong>Patient Notes </strong></td>
                                <td width="13%"><strong>Written by:</strong></td>
                            </tr>
                            <tr style="color: #738086">
                                <?php //$enc_obj->PrintPatientNotes($h_encounter_nr); ?>
                            </tr>
                        </table>
                    </td>

                </tr> -->

            </table>

            <!--  The test parameters begin  -->
            <table border=0 cellpadding=0 cellspacing=0 width=750 bgcolor="<?php echo $bgc1 ?>">
                <?php
                //Get config value for restricting not billed here 
                $hide_not_billed = $glob_obj->getConfigValue("restrict_unbilled_items");
# Start buffering output
                ob_start();
                for ($i = 0; $i <= $max_row; $i++) {
                    echo '<tr class="lab">';
                    for ($j = 0; $j <= $column; $j++) {
                        if ($LD_Elements[$j][$i]['type'] == 'top') {
                            echo '<td bgcolor="#ee6666" colspan="3"><font color="white">&nbsp;<b>' . $LD_Elements[$j][$i]['value'] . '</b></font></td>';
                        } else {
                            if ($LD_Elements[$j][$i]['value']) {
                                echo '<td>';
                                if ($edit) {
                                    if (isset($stored_param[$LD_Elements[$j][$i]['id']]) && !empty($stored_param[$LD_Elements[$j][$i]['id']])) {
                                        echo '<input type="hidden" name="' . $LD_Elements[$j][$i]['id'] . '" value="1">
							<a href="javascript:setM(\'' . $LD_Elements[$j][$i]['id'] . '\')">';
                                    } else {
                                        echo '<input type="hidden" name="' . $LD_Elements[$j][$i]['id'] . '" value="0">
							<a href="javascript:setM(\'' . $LD_Elements[$j][$i]['id'] . '\')">';
                                    }
                                }
                                //Check if item is billed for outpatient
                                if ($hide_not_billed === "1" && $h_encounter_class_nr == "2" && $h_HealthFundName=="CASH") { //Check the restriction status
                                    if ($lab_obj->getLabBillNoByBatch($batch_nr, $LD_Elements[$j][$i]['id']) > 0) {
                                        if (isset($stored_param[$LD_Elements[$j][$i]['id']]) && !empty($stored_param[$LD_Elements[$j][$i]['id']])) {
                                            echo '<img src="f.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                        } else {
                                            echo '<img src="b.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                        }
                                    } else {
                                        echo '<img src="b.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                    }
                                } else if ($hide_not_billed === "1" && $h_encounter_class_nr != "2") {
                                    if (isset($stored_param[$LD_Elements[$j][$i]['id']]) && !empty($stored_param[$LD_Elements[$j][$i]['id']])) {
                                        echo '<img src="f.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                    } else {
                                        echo '<img src="b.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                    }
                                } else {
                                    if (isset($stored_param[$LD_Elements[$j][$i]['id']]) && !empty($stored_param[$LD_Elements[$j][$i]['id']])) {
                                        echo '<img src="f.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                    } else {
                                        echo '<img src="b.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                    }
                                }
                                if ($edit) {
                                    echo '</a>';
                                }
                                echo '</td><td>';
                                if ($edit)
                                    echo '<a href="javascript:setM(\'' . $LD_Elements[$j][$i]['id'] . '\')">' . $LD_Elements[$j][$i]['value'] . '</a>';
                                else
                                    echo $LD_Elements[$j][$i]['value'];

                                echo '</td><td>';
                                if (isset($stored_param[$LD_Elements[$j][$i]['id']]) && !empty($stored_param[$LD_Elements[$j][$i]['id']])) {
                                    $lab_bill = $lab_obj->getLabBillNoByBatch($batch_nr, $LD_Elements[$j][$i]['id']);
                                    if ($lab_bill > 0) {
                                        echo '<font color="green">' . $LDLabRequestBilled . ' ' . $lab_bill . '</font>';
                                    } else {
                                        if ($hide_not_billed !== "1") {
                                            echo '<img src="../../gui/img/common/default/warn.gif" border=0 alt="" style="filter:alpha(opacity=70)"> <font color="red">' . $LDLabRequestNotBilled . '</font> <img src="../../gui/img/common/default/warn.gif" border=0 alt="" style="filter:alpha(opacity=70)">';
                                        } else if ($hide_not_billed === "1" && $h_encounter_class_nr !== "2") {
                                            echo '<img src="../../gui/img/common/default/warn.gif" border=0 alt="" style="filter:alpha(opacity=70)"> <font color="red">' . $LDLabRequestNotBilled . '</font> <img src="../../gui/img/common/default/warn.gif" border=0 alt="" style="filter:alpha(opacity=70)">';
                                        }
                                    }
                                }
                                echo '</td>';
                            } else {
                                echo '<td colspan=3>&nbsp;</td>';
                            }
                        }
                    }

                    echo '</tr><tr>';
                    if ($i < $max_row) {
                        for ($k = 0; $k <= $column; $k++) {
                            echo '<td width=2></td><td colspan="2" bgcolor="#ffcccc" width=' . (intval(745 / $column) - 18) . ' ><img src="p.gif"  width=1 height=1></td>';
                        }
                        echo '</tr>';
                    }
                }

//$sTemp=ob_get_contents();
                ob_end_flush();
                ?>
                <tr>
                    <td colspan=8><font size=2 face="verdana,arial" color="black">&nbsp;&nbsp;&nbsp;<?php
                        if ($stored_request['notes']) {
                            echo "<b>Notes: </b>" . stripslashes($stored_request['notes']);
                        }
                        ?></font></td>
                </tr>
                <tr>
                  <!--<td colspan=20><font size=2 face="verdana,arial" color="purple">&nbsp;<?php // echo $LDEmergencyProgram . ' &nbsp;&nbsp;&nbsp;<img ' . createComIcon($root_path, 'violet_phone.gif', '0', 'absmiddle', TRUE) . '> ' . $LDPhoneOrder                                                                       ?></td>-->
                </tr>


                <tr>
                    <td colspan="4">
                        <font size=2 color="purple" face="verdana,arial"><?php echo $LDDoctorRequest; ?> </font>
                        <?php
                        echo '<font size=2 color="#ffffee" class="vi_data"><b>'
                        . ucwords($h_DoctorID) . '</b></font>';
                        ?>
                    </td>

                    <td colspan=2>
                        <font size=2 color="purple" face="verdana,arial">Sign: </font>
                        &nbsp;<font size=2 face="verdana,arial" color="black"><?php
                        if ($stored_request['doctor_sign']) {
                            echo stripslashes($stored_request['doctor_sign']);
                        } else {
                            echo '__________________';
                        }
                        ?></font>
                    </td>
                </tr>
                <!--<tr></br></tr>-->
            </table><!-- End of the main table holding the form -->

        </td>
    </tr>
</table><!-- End of table simulating the border -->
