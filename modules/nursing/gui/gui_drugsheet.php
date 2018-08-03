<?php
echo '<html>'
 . '<head>';
?>
<style>
    <!--
    .hide { position:absolute; visibility:hidden; }
    .show { position:absolute; visibility:visible; }
    -->
</style>
<?php
echo '</head>'
 . '<body  bgcolor="#99ccff" TEXT="#000000" LINK="#0000FF" VLINK="#800080"   topmargin="0" marginheight="0">';
//    print '&nbsp;' . $sql;
?>
<table border=0 width="100%" class="titlebar">
    <tr>
        <td width="45%"><b><font face=verdana,arial size=5 color=maroon>
                <?php
                echo 'Patient Medication - ' . '(' . $pid . ') ' . $pnames . '<br><font size=4>';
                echo 'Date: ' . formatDate2Local(date('Y-m-d'), $date_format) . '</font>';
                ?>
                </font></b> 
        </td> <td align="left"><a href="drugsheet.php<?php echo URL_APPEND ?>&encounter_nr=<?php echo $encounter_nr; ?>&pid=<?php echo $pid ?>"><img <?php echo createComIcon($root_path, 'refresh.png', '0', '', TRUE) . ' align="absmiddle" alt="" title="Refresh">' ?></a></td>
        <td align="right" valign="top"><a href="javascript:gethelp('nursing_feverchart_xp.php','<?php echo $winid ?>','','','<?php echo $title ?>')"><img <?php echo createLDImgSrc($root_path, 'hilfe-r.gif', '0') ?>  <?php if ($cfg['dhtml']) echo'style=filter:alpha(opacity=70) onMouseover=hilite(this,1) onMouseOut=hilite(this,0)>'; ?></a>
            <a href="javascript:window.history.back()" ><img <?php echo createLDImgSrc($root_path, 'close2.gif', '0') ?> <?php if ($cfg['dhtml']) echo'style=filter:alpha(opacity=70) onMouseover=hilite(this,1) onMouseOut=hilite(this,0)>'; ?></a></nobr>
        </td>
    </tr>
</table>
<?php
if ($result = $db->Execute($sql)) {
//        print_r($result);
//        print mysql_error();

    if ($result->RecordCount() == 0) {
        print '<div style="text-align:center; font:bold 12px Tahoma,Arial,SanSerif,system; color:green;">No Prescriptions Found</div>';
    }
    ?>
    <table border=2 style="border-collapse: collapse" cellpadding=4 cellspacing=1 width=100% class="frame">
        <thead>
            <tr bgcolor="#31f7c5" valign="top">
                <td width="10%"  style="width: 40px;"><FONT SIZE=-1  FACE="Arial"><strong>S/No</strong></td>
                <td width="30%"><FONT SIZE=-1  FACE="Arial"><strong>Drug/Item Description</strong></td>
                <td width="60%"><FONT SIZE=-1  FACE="Arial"><strong>Details</strong></td>
            </tr>
        </thead>
        <?php
        $sn = 1;
        while ($row = $result->FetchRow()) {
            if ($toggle) {
                $bgc = '#bdbf9e';
            } else {
                $bgc = '#97b8ed';
            }
            $toggle = !$toggle;

            //Get Chartting last details here
            $dssql = "SELECT * FROM care_encounter_drugsheet WHERE "
                    . " prescr_nr='" . $row['nr'] . "' ORDER BY chart_time DESC";

            $dsrow = '';
            if ($ds_result = $db->Execute($dssql)) {
                $dsrow = $ds_result->FetchRow();
            }
            ?>
            <tbody>
                <tr bgcolor="<?php echo $bgc; ?>">
                    <td width="10%"  style="width: 40px;"><FONT SIZE=-1  FACE="Arial"><b><?php echo $sn; ?>.</b></td>
                    <td width="30%">
                        <FONT SIZE=-1  FACE="Arial"><b><?php echo $row['article']; ?></b>
                    </td>
                    <td width="60%"><FONT SIZE=-1  FACE="Arial"><b>Prescription Date:</b>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo @formatDate2Local($row['prescribe_date'], $date_format); ?>
                    </td>
                </tr>

                <tr bgcolor="<?php echo $bgc; ?>" valign="top">
                    <td rowspan="5" colspan="2" width="40%">
                        <FONT SIZE=-1  FACE="Arial">
                        <?php
                        if ($row['notes'] !== '') {
                            echo'<p style="color: green"><b>Notes: </b>' . $row['notes'] . '</p>';
                        }
                        ?>
                        </br><?php
                        if ($row['is_disabled']) {
                            echo '<i>Disabled</i>';
                        }
                        ?>
                    </td>
                </tr>
                <tr bgcolor="<?php echo $bgc; ?>" valign="top">
                    <td colspan="2"><FONT SIZE=-1  FACE="Arial">
                        <b>Dosage:</b> &nbsp;&nbsp;<?php echo $row['dosage']; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Times Per Day:</b> &nbsp;&nbsp;<?php echo $row['times_per_day']; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Total Dose:</b>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $row['total_dosage']; ?>
                    </td>
                </tr>
                <tr bgcolor="<?php echo $bgc; ?>" valign="top">
                    <td><FONT SIZE=-1  FACE="Arial">
                        <b>Total Taken Amount:</b>
                        &nbsp;
                        <?php echo $row['amt_taken']; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Last Taken Amount:</b>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input style="width: 50px;" id="ltamount_<?php echo $row['nr']; ?>" readonly="readonly" value="<?php echo isset($dsrow['amount']) ? $dsrow['amount'] : ''; ?>">
                    </td>
                </tr>
                <tr bgcolor="<?php echo $bgc; ?>" valign="top">
                    <td colspan="2"><FONT SIZE=-1  FACE="Arial">
                        <b>Last Taken Date:</b><input style="width: 120px;" type="text" readonly="readonly" id="ltdate" value="<?php echo isset($dsrow['chart_date']) ? formatDate2Local($dsrow['chart_date'], 'dd/mm/yyyy') : ''; ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Last Taken Time:</b><input type="time" readonly="readonly" id="lttime_<?php echo $row['nr']; ?>" value="<?php echo isset($dsrow['chart_time']) ? $dsrow['chart_time'] : ''; ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Last Taken Status:</b> <?php
                        if ($dsrow['status'] == 0) {
                            echo 'Unknown';
                        } else if ($dsrow['status'] == 1) {
                            echo 'Taken';
                        } else if ($dsrow['status'] == 2) {
                            echo 'Not taken';
                        } else if ($dsrow['status'] == 3) {
                            echo 'Patient Refused';
                        }
                        ?>
                    </td>
                </tr>
                <tr bgcolor="<?php echo $bgc; ?>" valign="top">
                    <?php
                    if ($row['total_dosage'] <= $row['amt_taken'] && ($row['sub_class'] == 'tab' || $row['sub_class'] == 'tabs' || $row['sub_class'] == 'caps' || $row['sub_class'] == 'supplies')) {
                        ?>
                        <td colspan="2" rowspan="2"><FONT SIZE=-1  FACE="Arial"> 
                            <?php
                            echo '<p style="color: green"><i>Dosage completed! </i></p>';
//                            . '</br>';
                        } else {
                            ?>
                        <td colspan="2"><FONT SIZE=-1  FACE="Arial">        
                            <b>Taking Now Amount:</b>

                            <input style="width: 50px;" id="drg_<?php echo $row['nr']; ?>" type="text" value="<?php echo $row['dosage']; ?>">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Taking Date:</b><input type="date" id="date_<?php echo $row['nr']; ?>" value="<?php echo date('Y-m-d'); ?>">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Taking Time:</b><input type="time" id="time_<?php echo $row['nr']; ?>" value="<?php echo date('H:i'); ?>">
                        </td>
                    </tr>
                    <tr bgcolor="<?php echo $bgc; ?>" valign="top">
                        <td colspan="2"><FONT SIZE=-1  FACE="Arial"><b>Prescribed by:</b> <i><?php echo $row['prescriber']; ?></i></td>
                        <td colspan="2">
                            <label><FONT SIZE=-1  FACE="Arial">Status: </label>
                            <select name="status_<?php echo $row['nr']; ?>" id="status_<?php echo $row['nr']; ?>">
                                <option value="0">Unknown</option>
                                <option value="1" selected>Taken</option>
                                <option value="2">Not Taken</option>
                                <option value="3">Patient Refused</option>
                            </select>
                            &nbsp;&nbsp;&nbsp;
                            <span id="<?php echo 'sp_' . $row['nr']; ?>">
                                <input id="<?php echo 'btn_' . $row['nr']; ?>" type="button" value="Chart/Save" onclick="sendData('<?php echo $row['nr']; ?>');"/>
                            </span>&nbsp;&nbsp;&nbsp;
                            <FONT SIZE=-1  FACE="Arial"> 
                            <?php
//                            echo '<p style="color: maroon"><i>To update last entry, please enter Taking Date and time as appears on the Last Taken details! </i></p>';
                        }
                        ?>
                    </td>
                </tr>
                <tr bgcolor="#93a2ba">
                    <td colspan="4">
                        <input type="hidden" id="partcode_<?php echo $row['nr']; ?>" value="<?php echo $row['partcode']; ?>">
                        <input type="hidden" id="totald_<?php echo $row['nr']; ?>" value="<?php echo $row['total_dosage']; ?>">
                    </td>
                </tr>
            </tbody>
            <?php
            $sn++;
        }
        ?>
    </table>
    <?php
}
?>
<script src="<?php echo $root_path; ?>js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script type="text/javascript">

                                    function sendData(nr) {
//        alert(nr);
                                        var status = $('#status_' + nr).val();
                                        var amount = $('#drg_' + nr).val();
                                        var rdate = $('#date_' + nr).val();
                                        var time = $('#time_' + nr).val();
                                        var partcode = $('#partcode_' + nr).val();
                                        var total_dosage = $('#totald_' + nr).val();

                                        var dataString = 'prescr_nr=' + nr + '&chart_date=' + rdate + '&status=' + status + '&chart_time='
                                                + time + '&amount=' + amount + '&partcode=' + partcode + '&total_dosage=' + total_dosage;

//                            alert(dataString)
                                        var proc = confirm('Are you sure you want to submit?');
                                        if (proc) {
                                            var url = "include/drugsheet_submit.php";

                                            $.ajax({
                                                type: "POST",
                                                url: url,
                                                data: dataString,
                                                success: function (data)
                                                {
                                                    alert(data);
                                                    window.location.reload();
//                                                    var updbtn = "<input id='upbtn_" + nr + "' type='button' value='Update Entry' onclick=" + '"updateData(\'' + nr + '\')"/>';
//                                        alert(updbtn); // show response from the php script.
//                                                    $("#sp_" + nr).html(updbtn);
//                                        toggle("span_" + nr);
                                                }
                                            });

//                                toggle('div_' + nr);
                                        } else {
                                            return false;
                                        }
                                    }

                                    function updateData(nr) {
//        alert(nr);
                                        var status = $('#status_' + nr).val();
                                        var amount = $('#drg_' + nr).val();
                                        var rdate = $('#date_' + nr).val();
                                        var time = $('#time_' + nr).val();

                                        var dataString = 'prescr_nr=' + nr + '&chart_date=' + rdate + '&status=' + status
                                                + '&chart_time=' + time + '&amount=' + amount + '';

//                            alert(dataString)
                                        var proc = confirm('Are you sure you want to update?');
                                        if (proc) {
                                            var url = "include/drugsheet_update.php";

                                            $.ajax({
                                                type: "POST",
                                                url: url,
                                                data: dataString,
                                                success: function (data)
                                                {
                                                    alert(data);
//                                        toggle("span_" + nr);
                                                }
                                            });

//                                toggle('div_' + nr);
                                        } else {
                                            return false;
                                        }
                                    }

                                    function toggle(id) {
                                        var element = document.getElementById(id);

                                        if (element) {
                                            var display = element.style.display;

                                            if (display === "none") {
                                                element.style.display = "block";
                                            } else {
                                                element.style.display = "none";
                                            }
                                        }
                                    }
</script>
</body>
</html>