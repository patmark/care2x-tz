
<script language="JavaScript">
<!-- Script Begin
    function chkform(d) {
    var u = true;
            if (d.msr_date.value == "") {
    alert("<?php echo $LDPlsEnterDate; ?>");
            d.msr_date.focus();
            u = false;
    } else if (d.weight.value == "" && d.height.value == "" && d.head_c.value == "" && d.bp_c.value = "") {
    alert("<?php echo $LDPlsEnterValue; ?>");
            u = false;
    } else if (isNaN(d.weight.value)) {
    d.height.focus(); // patch for Konqueror
            alert("<?php echo $LDEntryInvalidChar; ?>");
            d.weight.focus();
            u = false;
    } else if (d.weight.value < 0) {
    d.height.focus(); // patch for Konqueror
            alert("<?php echo $LDNotNegValue; ?>");
            d.weight.focus();
            u = false;
    } else if (isNaN(d.height.value)) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDEntryInvalidChar; ?>");
            d.height.focus();
            u = false;
    } else if (d.height.value < 0) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDNotNegValue; ?>");
            d.height.focus();
            u = false;
    } else if (isNaN(d.head_c.value)) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDEntryInvalidChar; ?>");
            d.head_c.focus();
            u = false;
    } else if (d.head_c.value < 0) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDNotNegValue; ?>");
            d.head_c.focus();
            u = false;
    } else if (isNaN(d.pulse_c.value)) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDEntryInvalidChar; ?>");
            d.pulse_c.focus();
            u = false;
    } else if (d.pulse_c.value < 0) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDNotNegValue; ?>");
            d.pulse_c.focus();
            u = false;
    } else if (isNaN(d.resprate_c.value)) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDEntryInvalidChar; ?>");
            d.resprate_c.focus();
            u = false;
    } else if (d.resprate_c.value < 0) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDNotNegValue; ?>");
            d.resprate_c.focus();
            u = false;
    } else if (isNaN(d.temp_c.value)) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDEntryInvalidChar; ?>");
            d.temp_c.focus();
            u = false;
    } else if (d.temp_c.value < 0) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDNotNegValue; ?>");
            d.temp_c.focus();
            u = false;
    } else if (isNaN(d.satur_c.value)) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDEntryInvalidChar; ?>");
            d.satur_c.focus();
            u = false;
    } else if (d.satur_c.value < 0) {
    d.weight.focus(); // patch for Konqueror
            alert("<?php echo $LDNotNegValue; ?>");
            d.satur_c.focus();
            u = false;
    } else if (d.measured_by.value == "") {
    alert("<?php echo $LDPlsEnterFullName; ?>");
            d.measured_by.focus();
            u = false;
    }

//        else if (document.getElementById('pulse_c').value == '') {
//            alert('Pulse rate is needed please');
//            document.getElementById('pulse_c').focus();
//            return false;
//        } else if (document.getElementById('resprate_c').value == '') {
//            alert('Respiration Rate is needed please');
//            document.getElementById('resprate_c').focus();
//            return false;
//        } else if (document.getElementById('bp_c').value == '') {
//            alert('Blood pressure rate is needed please');
//            document.getElementById('bp_c').focus();
//            return false;
//        } else if (document.getElementById('temp_c').value == '') {
//            alert('Temperature is needed please');
//            document.getElementById('temp_c').focus();
//            return false;
//        } else
    return u;
    }
//  Script End -->
</script>

<form method="post" name="wtht_form" onSubmit="return chkform(this)">
    <table border=0 cellpadding=2 width=100%>
        <?php
        if ($mode == 'update') {
//            $toggle = 0;
            while (list($x, $row) = each($msr_comp)) {
//                if ($toggle)
//                    $bgc = '#f3f3f3';
//                else
//                    $bgc = '#FFFFCC';
//                $toggle = !$toggle;
                ?>
                <tr bgcolor="#f6f6f6">
                    <td><font color=red>*</font><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo $LDDate; ?></td>
                    <td colspan=3><input type="text" readonly name="msr_date" size=10 maxlength=10 value="<?php echo $row['msr_date']; ?>" > </td>
                </tr>
             <!--    <tr bgcolor="#f6f6f6">
                  <td><FONT SIZE=-1  FACE="Arial" color="#000066"><?php // echo $LDTime;         ?></td>
                  <td><input type="text" name="msr_time" size=10 maxlength=5 ></td>
                </tr>
                -->
                <tr bgcolor="#f6f6f6">
                    <td><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo $LDType; ?></td>
                    <td><font color=red>*</font><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo $LDUnit . ' ' . $LDValue; ?></td>
                    <td><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo $LDUnit . ' ' . $LDType; ?></td>
                    <td><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo "$LDNotes ($LDOptional)"; ?></td>
                </tr>

                <tr bgcolor="#f6f6f6">
                    <td><FONT SIZE=-1  FACE="Arial"><?php echo $LDWeight; ?></td>
                    <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="weight" size=10 maxlength=10 value="<?php echo $row[6]['value']; ?>"></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <select name="wt_unit_nr">
                            <?php
                            while (list($x, $v) = each($unit_types)) {
                                echo '<option value="' . $v['nr'] . '"';
                                if ($v['nr'] == $wt_unit_nr)
                                    echo 'selected';
                                echo '>';
                                if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                    echo $$v['LD_var'];
                                else
                                    echo $v['name'];
                                echo '</option>
				';
                            }
                            reset($unit_types);
                            ?>
                        </select>	 </td>
                    <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="wt_notes" size=40 maxlength=60 value="<?php echo $row[6]['notes']; ?>"></td>
                </tr>

                <tr bgcolor="#f6f6f6">
                    <td><FONT SIZE=-1  FACE="Arial"><?php echo $LDHeight; ?></td>
                    <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="height" size=10 maxlength=10 value="<?php echo $row[7]['value']; ?>"></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <select name="ht_unit_nr">
                            <?php
                            while (list($x, $v) = each($unit_types)) {
                                echo '<option value="' . $v['nr'] . '"';
                                if ($v['nr'] == $ht_unit_nr)
                                    echo 'selected';
                                echo '>';
                                if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                    echo $$v['LD_var'];
                                else
                                    echo $v['name'];
                                echo '</option>
				';
                            }
                            reset($unit_types);
                            ?>
                        </select>	 </td>
                    <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="ht_notes" size=40 maxlength=60 value="<?php echo $row[7]['notes']; ?>"></td>
                </tr>

                <tr bgcolor="#f6f6f6">
                    <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['head_circumference']; ?></td>
                    <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="head_c" size=10 maxlength=10 value="<?php echo $row[9]['value']; ?>"></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <select name="hc_unit_nr">
                            <?php
                            while (list($x, $v) = each($unit_types)) {
                                echo '<option value="' . $v['nr'] . '"';
                                if ($v['nr'] == $hc_unit_nr)
                                    echo 'selected';
                                echo '>';
                                if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                    echo $$v['LD_var'];
                                else
                                    echo $v['name'];
                                echo '</option>
				';
                            }
                            reset($unit_types);
                            ?>
                        </select></td>
                    <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="hc_notes" size=40 maxlength=60 value="<?php echo $row[9]['notes']; ?>"></td>
                </tr>


                <tr bgcolor="#f6f6f6">
                    <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['Pulse']; ?></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <input type="text" name="pulse_c" id="pulse_c" size=10 maxlength=10 value="<?php echo $row[10]['value']; ?>"></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <select name="pulse_nr">
                            <?php
                            print_r($unit_rates);
                            while (list($x, $v) = each($unit_rates)) {
                                echo '<option value="' . $v['nr'] . '"';
                                if ($v['nr'] == $pulse_nr)
                                    echo 'selected';
                                echo '>';
                                echo $v['name'];
                                echo '</option>
				';
                            }
                            reset($unit_rates);
                            ?>
                        </select></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <input type="text" name="pulse_notes" size=40 maxlength=60 value="<?php echo $row[10]['notes']; ?>"></td>
                </tr>
                <tr bgcolor="#f6f6f6">
                    <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['resprate']; ?></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <input type="text" name="resprate_c" id="resprate_c" size=10 maxlength=10 value="<?php echo $row[11]['value']; ?>"></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <select name="resprate_nr">
                            <?php
                            while (list($x, $v) = each($unit_rates)) {
                                echo '<option value="' . $v['nr'] . '"';
                                if ($v['nr'] == $resprate_nr)
                                    echo 'selected';
                                echo '>';
                                echo $v['name'];
                                echo '</option>
				';
                            }
                            reset($unit_rates);
                            ?>
                        </select></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <input type="text" name="resprate_notes" size=40 maxlength=60 value="<?php echo $row[11]['notes']; ?>"></td>
                </tr>
                <tr bgcolor="#f6f6f6">
                    <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['bp']; ?></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <input type="text" name="bp_c" id="bp_c" size=10 maxlength=10 value="<?php echo $row[12]['value']; ?>"></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <select name="bp_nr">
                            <?php
                            while (list($x, $v) = each($unit_bp)) {
                                echo '<option value="' . $v['nr'] . '"';
                                if ($v['nr'] == $bp_nr)
                                    echo 'selected';
                                echo '>';
                                if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                    echo $$v['LD_var'];
                                else
                                    echo $v['name'];
                                echo '</option>';
                            }
                            ?>
                        </select></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <input type="text" name="bp_notes" size=40 maxlength=60 value="<?php echo $row[12]['notes']; ?>"></td>
                </tr>
                <tr bgcolor="#f6f6f6">
                    <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['temp']; ?></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <input type="text" name="temp_c" id="temp_c" size=10 maxlength=10 value="<?php echo $row[13]['value']; ?>"></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <select name="temp_nr">
                            <?php
                            while (list($x, $v) = each($unit_temp)) {
                                echo '<option value="' . $v['nr'] . '"';
                                if ($v['nr'] == $temp_nr)
                                    echo 'selected';
                                echo '>';
                                if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                    echo $$v['LD_var'];
                                else
                                    echo $v['name'];
                                echo '</option>';
                            }
                            ?>
                        </select></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <input type="text" name="temp_notes" size=40 maxlength=60 value="<?php echo $row[13]['notes']; ?>"></td>
                </tr>
                <tr bgcolor="#f6f6f6">
                    <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['saturation']; ?></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <input type="text" name="satur_c" id="satur_c" size=10 maxlength=10 value="<?php echo $row[14]['value']; ?>"></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <select name="satur_nr">
                            <?php
                            while (list($x, $v) = each($unit_sat)) {
                                echo '<option value="' . $v['nr'] . '"';
                                if ($v['nr'] == $satur_nr)
                                    echo 'selected';
                                echo '>';
                                if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                    echo $$v['LD_var'];
                                else
                                    echo $v['name'];
                                echo '</option>';
                            }
                            ?>
                        </select></td>
                    <td><FONT SIZE=-1  FACE="Arial">
                        <input type="text" name="satur_notes" size=40 maxlength=60 value="<?php echo $row[14]['notes']; ?>"></td>
                </tr>
                <!--  wt = 6, ht= 7 -->
                <tr bgcolor="#f6f6f6">
                    <td colspan=4>&nbsp;</td>
                </tr>
        <!--                <tr bgcolor="#f6f6f6">
                    <td><font color=red>*</font><FONT SIZE=-1  FACE="Arial" color="#000066"><?php // echo $LDMeasuredBy;     ?></td>
                    <td colspan=3><input type="text" name="measured_by" size=50 maxlength=60 value="<?php // echo $_SESSION['sess_user_name'];     ?>"></td>
                </tr>-->
                <input type="hidden" name="modify_id" value="<?php echo $_SESSION['sess_user_name']; ?>">
                <!--<input type="hidden" name="nr" value="<?php // echo $row['nr'];     ?>">-->
                <!--<input type="hidden" name="history" value="<?php // echo $row['history']    ?>">-->
                <input type="hidden" name="mode" value="update">
                <?php
            }
        }else {
            ?>
            <tr bgcolor="#f6f6f6">
                <td><font color=red>*</font><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo $LDDate; ?></td>
                <td colspan=3><input type="text" name="msr_date" size=10 maxlength=10  onBlur="IsValidDate(this, '<?php echo $date_format ?>')" onKeyUp="setDate(this, '<?php echo $date_format ?>', '<?php echo $lang ?>')">
                    <a href="javascript:show_calendar('wtht_form.msr_date','<?php echo $date_format; ?>')"><img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle', TRUE); ?>></a>	 </td>
            </tr>
         <!--    <tr bgcolor="#f6f6f6">
              <td><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo $LDTime; ?></td>
              <td><input type="text" name="msr_time" size=10 maxlength=5 ></td>
            </tr>
            -->
            <tr bgcolor="#f6f6f6">
                <td><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo $LDType; ?></td>
                <td><font color=red>*</font><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo $LDUnit . ' ' . $LDValue; ?></td>
                <td><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo $LDUnit . ' ' . $LDType; ?></td>
                <td><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo "$LDNotes ($LDOptional)"; ?></td>
            </tr>

            <tr bgcolor="#f6f6f6">
                <td><FONT SIZE=-1  FACE="Arial"><?php echo $LDWeight; ?></td>
                <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="weight" size=10 maxlength=10 value="<?php echo $weight; ?>"></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <select name="wt_unit_nr">
                        <?php
                        while (list($x, $v) = each($unit_types)) {
                            echo '<option value="' . $v['nr'] . '"';
                            if ($v['nr'] == $wt_unit_nr)
                                echo 'selected';
                            echo '>';
                            if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                echo $$v['LD_var'];
                            else
                                echo $v['name'];
                            echo '</option>
				';
                        }
                        reset($unit_types);
                        ?>
                    </select>	 </td>
                <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="wt_notes" size=40 maxlength=60 value="<?php echo $wt_notes; ?>"></td>
            </tr>

            <tr bgcolor="#f6f6f6">
                <td><FONT SIZE=-1  FACE="Arial"><?php echo $LDHeight; ?></td>
                <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="height" size=10 maxlength=10 value="<?php echo $height; ?>"></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <select name="ht_unit_nr">
                        <?php
                        while (list($x, $v) = each($unit_types)) {
                            echo '<option value="' . $v['nr'] . '"';
                            if ($v['nr'] == $ht_unit_nr)
                                echo 'selected';
                            echo '>';
                            if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                echo $$v['LD_var'];
                            else
                                echo $v['name'];
                            echo '</option>
				';
                        }
                        reset($unit_types);
                        ?>
                    </select>	 </td>
                <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="ht_notes" size=40 maxlength=60 value="<?php echo $ht_notes; ?>"></td>
            </tr>

            <tr bgcolor="#f6f6f6">
                <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['head_circumference']; ?></td>
                <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="head_c" size=10 maxlength=10 value="<?php echo $head_c; ?>"></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <select name="hc_unit_nr">
                        <?php

                        while (list($x, $v) = each($unit_types)) {

                            echo '<option value="' . $v['nr'] . '"';
                            if ($v['nr'] == $hc_unit_nr)
                                echo 'selected';
                            echo '>';
                            if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                echo $$v['LD_var'];
                            else
                                echo $v['name'];
                            echo '</option>
				';
                        }
                        reset($unit_types);
                        ?>
                    </select></td>
                <td><FONT SIZE=-1  FACE="Arial"><input type="text" name="hc_notes" size=40 maxlength=60 value="<?php echo $hc_notes; ?>"></td>
            </tr>


            <tr bgcolor="#f6f6f6">
                <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['Pulse']; ?></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <input type="text" name="pulse_c" id="pulse_c" size=10 maxlength=10 value="<?php echo $pulse_c; ?>"></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <select name="pulse_nr">
                        <?php
                        while (list($x, $v) = each($unit_rates)) {
                            echo '<option value="' . $v['nr'] . '"';
                            if ($v['nr'] == $pulse_nr)
                                echo 'selected';
                            echo '>';
                            echo $v['name'];
                            echo '</option>
				';
                        }
                        reset($unit_rates);
                        ?>
                    </select></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <input type="text" name="pulse_notes" size=40 maxlength=60 value="<?php echo $pulse_notes; ?>"></td>
            </tr>
            <tr bgcolor="#f6f6f6">
                <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['resprate']; ?></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <input type="text" name="resprate_c" id="resprate_c" size=10 maxlength=10 value="<?php echo $resprate_c; ?>"></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <select name="resprate_nr">
                        <?php
                       // print_r($unit_rates);
                        while (list($x, $v) = each($unit_rates)) {
                            echo '<option value="' . $v['nr'] . '"';
                            if ($v['nr'] == $resprate_nr)
                                echo 'selected';
                            echo '>';
                            echo $v['name'];
                            echo '</option>
				';
                        }
                        reset($unit_rates);
                        ?>
                    </select></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <input type="text" name="resprate_notes" size=40 maxlength=60 value="<?php echo $resprate_notes; ?>"></td>
            </tr>
            <tr bgcolor="#f6f6f6">
                <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['bp']; ?></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <input type="text" name="bp_c" id="bp_c" size=10 maxlength=10 value="<?php echo $bp_c; ?>"></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <select name="bp_nr">
                        <?php
                        while (list($x, $v) = each($unit_bp)) {
                            echo '<option value="' . $v['nr'] . '"';
                            if ($v['nr'] == $bp_nr)
                                echo 'selected';
                            echo '>';
                            if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                echo $$v['LD_var'];
                            else
                                echo $v['name'];
                            echo '</option>
				';
                        }
                        ?>
                    </select></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <input type="text" name="bp_notes" size=40 maxlength=60 value="<?php echo $bp_notes; ?>"></td>
            </tr>
            <tr bgcolor="#f6f6f6">
                <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['temp']; ?></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <input type="text" name="temp_c" id="temp_c" size=10 maxlength=10 value="<?php echo $temp_c; ?>"></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <select name="temp_nr">
                        <?php
                        while (list($x, $v) = each($unit_temp)) {
                            echo '<option value="' . $v['nr'] . '"';
                            if ($v['nr'] == $temp_nr)
                                echo 'selected';
                            echo '>';
                            if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                echo $$v['LD_var'];
                            else
                                echo $v['name'];
                            echo '</option>
				';
                        }
                        ?>
                    </select></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <input type="text" name="temp_notes" size=40 maxlength=60 value="<?php echo $temp_notes; ?>"></td>
            </tr>
            <tr bgcolor="#f6f6f6">
                <td><FONT SIZE=-1  FACE="Arial" ><?php echo $LD['saturation']; ?></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <input type="text" name="satur_c" id="satur_c" size=10 maxlength=10 value="<?php echo $satur_c; ?>"></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <select name="satur_nr">
                        <?php
                        while (list($x, $v) = each($unit_sat)) {
                            echo '<option value="' . $v['nr'] . '"';
                            if ($v['nr'] == $satur_nr)
                                echo 'selected';
                            echo '>';
                            if (isset($$v['LD_var']) && !empty($$v['LD_var']))
                                echo $$v['LD_var'];
                            else
                                echo $v['name'];
                            echo '</option>';
                        }
                        ?>
                    </select></td>
                <td><FONT SIZE=-1  FACE="Arial">
                    <input type="text" name="satur_notes" size=40 maxlength=60 value="<?php echo $satur_notes; ?>"></td>
            </tr>
            <!--  wt = 6, ht= 7 -->
            <tr bgcolor="#f6f6f6">
                <td colspan=4>&nbsp;</td>
            </tr>
            <tr bgcolor="#f6f6f6">
                <td><font color=red>*</font><FONT SIZE=-1  FACE="Arial" color="#000066"><?php echo $LDMeasuredBy; ?></td>
                <td colspan=3><input type="text" name="measured_by" size=50 maxlength=60 value="<?php echo $_SESSION['sess_user_name']; ?>"></td>
            </tr>
            <input type="hidden" name="mode" value="create">
            <input type="hidden" name="create_id" value="<?php echo $_SESSION['sess_user_name']; ?>">
            <input type="hidden" name="create_time" value="<?php echo date('YmdHis'); ?>">

            <input type="hidden" name="target" value="<?php echo $target; ?>">
            <input type="hidden" name="history" value="Created: <?php echo date('Y-m-d H:i:s'); ?> : <?php echo $_SESSION['sess_user_name'] . "\n"; ?>">

            <?php
        }
        ?>
    </table>
    <!--<input type="hidden" name="encounter_nr" value="<?php // echo $_SESSION['sess_en'];  ?>">-->
    <input type="hidden" name="encounter_nr" value="<?php echo $encounter_nr ?>">
    <input type="hidden" name="pid" value="<?php echo $_SESSION['sess_pid']; ?>">
    <input type="image" <?php echo createLDImgSrc($root_path, 'savedisc.gif', '0'); ?>>
</form>