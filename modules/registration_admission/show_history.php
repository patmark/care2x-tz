<?php
//error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require($root_path . 'language/en/lang_en_aufnahme.php');
?>
<!--<table width=15% border=0 cellspacing=0 height=15%>
    <tr>-->
<html>
    <body>

    <!--<td  valign="top" align="left" height="35">-->
        <table width="1010" border=0 align="left" cellspacing="0"  class="titlebar">
            <tr valign=top  class="titlebar" >
                <td width="696" bgcolor="#99ccff" >
                <td width="310" align=right bgcolor="#99ccff">
                    <a href="javascript: window.history.back();"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)" ></a>
                    <a href="javascript:gethelp('reporting_overview.php','Reporting :: Overview')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a><a href="<?php echo $root_path; ?>modules/news/start_page.php" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onmouseover="hilite(this, 1)" onmouseout="hilite(this, 0)" /></a></td>
            </tr>
        </table>		   
        <?php
//Get Hospital address
        $sql_hosp = "SELECT  `type`,`value` FROM  `care_config_global` WHERE type ='main_info_address' OR type ='main_info_email' OR type ='main_info_fax' OR type ='main_info_phone'";


//Get person details
        $sql_person = "SELECT name_first,name_2,name_last,sex,date_birth,selian_pid FROM care_person WHERE pid=" . $_SESSION['sess_pid'] . "";



//Get prescriptions
        $sql_pr = "SELECT cp.pid,cep.prescribe_date,cep.article,cep.dosage,cep.times_per_day,cep.days,cep.total_dosage,pricelist.purchasing_class FROM care_encounter_prescription AS cep INNER JOIN care_encounter AS ce ON cep.encounter_nr=ce.encounter_nr INNER JOIN care_person AS cp ON cp.pid=ce.pid INNER JOIN care_tz_drugsandservices AS pricelist ON pricelist.item_description=cep.article WHERE cp.pid=" . $_SESSION['sess_pid'] . " AND pricelist.purchasing_class='drug_list'";

//Get diagnosis
        $sql_diag = "SELECT FROM_UNIXTIME(timestamp) AS diag_date,ICD_10_description,type,comment FROM care_tz_diagnosis WHERE pid=" . $_SESSION['sess_pid'] . " ORDER BY diag_date";

//Get laboratory test
        $sql_lab = "SELECT lab.test_date,lab.paramater_name,lab.parameter_value FROM care_test_findings_chemlabor_sub AS lab WHERE lab.encounter_nr IN (SELECT encounter_nr FROM care_encounter WHERE pid=" . $_SESSION['sess_pid'] . ") ORDER BY lab.test_date ";

//Get admission number
        $sql_en = "SELECT encounter_nr FROM care_encounter WHERE pid=" . $_SESSION['sess_pid'] . "";

//start execution of the queries
        $result_hosp = $db->Execute($sql_hosp);
        $result_person = $db->Execute($sql_person);
        $result_pr = $db->Execute($sql_pr);
        $result_diag = $db->Execute($sql_diag);
        $result_lab = $db->Execute($sql_lab);

//Get hospital name
        function hosp_name() {
            global $db;
            $sql_hosp_name = "SELECT value FROM care_config_global WHERE type='main_info_address' ";
            $result = $db->Execute($sql_hosp_name);
            while ($rows = $result->FetchRow()) {
                $hospital_name = $rows['value'];
                return $hospital_name;
            }
        }

//Get phone number
        function hosp_phone() {
            global $db;
            $sql_hosp_phone = "SELECT value FROM care_config_global WHERE type='main_info_phone'";
            $result = $db->Execute($sql_hosp_phone);
            while ($rows = $result->FetchRow()) {
                $hospital_phone = $rows['value'];
                return $hospital_phone;
            }
        }

//Get email

        function hosp_email() {
            global $db;
            $sql_hosp_email = "SELECT value FROM care_config_global WHERE type='main_info_email'";
            $result = $db->Execute($sql_hosp_email);
            while ($rows = $result->FetchRow()) {
                $hospital_email = $rows['value'];
                return $hospital_email;
            }
        }

//Get fax
        function hosp_fax() {
            global $db;
            $sql_hosp_fax = "SELECT value FROM care_config_global WHERE type='main_info_fax'";
            $result = $db->Execute($sql_hosp_fax);
            while ($rows = $result->FetchRow()) {
                $hospital_fax = $rows['value'];
                return $hospital_fax;
            }
        }

//Person details
        while ($rows = $result_person->FetchRow()) {
            $fname = $rows['name_first'];
            $lname = $rows['name_last'];
            $sex = $rows['sex'];
            $date_birth = $rows['date_birth'];
            $file_nr = $rows['selian_pid'];
        }
        ?>
        <!--<form id="form1" name="form1" method="post" action="">-->

        <table width="793" border="1" align="center">
            <tr bgcolor="orange">
                <th colspan="5" scope="col"><?php echo hosp_name(); ?></th>
            </tr>
            <tr>
                <td width="102"  bgcolor="orange"><?php echo $LDPhone; ?></td>
                <td colspan="4"><?php echo hosp_phone(); ?></td>
            </tr>
            <tr>
                <td  bgcolor="orange"><?php echo $LDEmail; ?></td>
                <td colspan="4"><?php echo hosp_email(); ?></td>
            </tr>
            <tr>
                <td height="28"  bgcolor="orange"><?php echo $LDFax; ?></td>
                <td colspan="4"><?php echo hosp_fax(); ?></td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr bgcolor="orange">
                <td><?php echo $LDMedocsElements[1]; ?></td>
                <td width="176"><?php echo $LDFileNr; ?></td>
                <td width="125"><?php echo $LDBday; ?></td>
                <td width="155"><?php echo $LDSex; ?></td>
            </tr>
            <tr>
                <td><?php echo ucwords($fname) . ' ' . $lname; ?></td>
                <td><?php echo $file_nr; ?></td>
                <td><?php echo $date_birth; ?></td>
                <td><?php echo $sex; ?></td>

            </tr>
            <tr>
                <td height="54" colspan="5">&nbsp;</td>
            </tr>
            <tr bgcolor="orange">
                <td colspan="5">DRUG PRESCRIPTION</td>
            </tr>
            <tr bgcolor="lightblue">
                <td>Date</td>
                <td>Article</td>
                <td>Dosage</td>
                <td>X per day</td>
                <td>Days</td>
                <!--<td>total</td>-->

            </tr>
            <?php
            while ($rows_pr = $result_pr->FetchRow()) {
                echo '<tr>';
                echo '<td>' . $rows_pr['prescribe_date'] . '</td>';
                echo '<td>' . $rows_pr['article'] . '</td>';
                echo '<td>' . $rows_pr['dosage'] . '</td>';
                echo '<td>' . $rows_pr['times_per_day'] . '</td>';
                echo '<td>' . $rows_pr['days'] . '</td>';
//echo '<td>'.$rows_pr['total_dosage'].'</td>';
                echo '<tr><br>';
            }
            ?>

            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr bgcolor="orange">
                <td colspan="5">DIAGNOSIS</td>
            </tr>
            <tr bgcolor="lightblue">
                <td>Date</td>
                <td>Diagnosis name</td>
                <td>Type</td>
                <td colspan="2">comment</td>
            </tr>
            <?php
            while ($rows_diag = $result_diag->FetchRow()) {

                echo '<tr>';
                echo '<td>' . $rows_diag['diag_date'] . '</td>';
                echo '<td>' . $rows_diag['ICD_10_description'] . '</td>';
                echo '<td>' . $rows_diag['type'] . '</td>';
                echo ' <td colspan="2">' . $rows_diag['comment'] . '</td>';
                echo '</tr>';
                echo '<br>';
            }
            ?>

            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr bgcolor="orange">
                <td colspan="5">LABORATORY</td>
            </tr>
            <tr bgcolor="lightblue">
                <td>Date</td>
                <td>Parameter</td>
                <td>value</td>
                <td colspan="2">comments</td>
            </tr>
            <?php
            while ($rows_lab = $result_lab->FetchRow()) {

                echo '<tr>';
                echo '<td>' . $rows_lab['test_date'] . '</td>';
                echo '<td>' . $rows_lab['paramater_name'] . '</td>';
                echo '<td>' . $rows_lab['parameter_value'] . '</td>';
                echo '<td colspan="2">' . $rows_lab['comment'] . '</td>';
                echo '</tr>';
                echo '<br>';
            }
            ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr bgcolor="orange">
                <td colspan="5">COMMENTS:-</td>
            </tr>
            <tr>
                <td height="255" colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td height="63" colspan="5"><p>&nbsp;</p>
                    <p>Signature..............................................................................................</p></td>
            </tr>
            <tr>
                <td height="57" colspan="5"><p>&nbsp;</p>
                    <p>Designation</p></td>
            </tr>
        </table>
        <p>&nbsp;   </p>
        <p>
            <input type="button" name="print" value="PRINT" onclick="window.print()" />

        </p>
        <!--</form>-->

    </body>
</html>