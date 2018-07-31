<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
define('LANG_FILE', 'aufnahme.php');
$local_user = 'aufnahme_user';
require_once($root_path . 'include/inc_front_chain_lang.php');
require_once($root_path . 'include/inc_date_format_functions.php');

//$thisfile=basename($_SERVER['PHP_SELF']);




$SQL = "SELECT  cp.name_first,cp.name_2,cp.name_last,ce.encounter_date,cep.article,cep.prescribe_date,cep.dosage,cep.times_per_day,cep.days,cep.total_dosage,cep.prescriber,cep.notes,drgs.purchasing_class FROM care_person AS cp 
             INNER JOIN care_encounter AS ce ON cp.pid=ce.pid INNER JOIN care_encounter_prescription AS cep ON cep.encounter_nr=ce.encounter_nr INNER JOIN care_tz_drugsandservices AS drgs ON drgs.item_id=cep.article_item_number 
             WHERE cep.encounter_nr='" . $pid . "' AND cep.status!='deleted' AND cep.issuer='' AND drgs.purchasing_class like 'drug_list%' ";

$NAMES_SQL = "SELECT cp.name_first,cp.name_2,cp.name_last,ce.encounter_nr,ce.encounter_date FROM care_person AS cp INNER JOIN care_encounter AS ce ON cp.pid=ce.pid WHERE encounter_nr='" . $pid . "' ";
$RESULT_NAME2 = $db->Execute($NAMES_SQL);
if ($NAMES = $RESULT_NAME2->fetchRow()) {
    $NAMES = $NAMES['name_first'] . ' ' . $NAMES['name_2'] . ' ' . $NAMES['name_last'];
}
$RESULT = $db->Execute($SQL);
$RESULT2 = $db->Execute($SQL);

while ($data = $RESULT->fetchRow()) {
    $days[] = $data['days'];
}

$max_no_of_days = max($days);
//	$max_no_of_days='3';

$no_of_columns = ($max_no_of_days * 3) + 4;
$column_width_drug = '12';
$column_width_no_times_per_day = '8';
$column_width_dose = '3';
$column_width_doctor = '8';
$column_width_notes = '8';

$total_other_cols_width = $column_width_drug + $column_width_no_times_per_day + $column_width_dose + $column_width_doctor + $column_width_notes;
$small_col_width = min((100 - $total_other_cols_width) / ($max_no_of_days * 3), 5);
$table_width = $small_col_width * ($max_no_of_days * 3) + $total_other_cols_width;
?>

<html>
    <head>
        <link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
    </head>
    <BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066  >

        <table cellspacing="0"  class="titlebar" border=0>
            <tr valign=top  class="titlebar" >
                <td bgcolor="#99ccff" >
                    &nbsp;&nbsp;<font color="#330066">Drug Treatment Form</font>
                </td>
            </tr>
        </td>
        <table border=1 cellSpacing=1 cellPadding=3 bgcolor="white" width=<?php print $table_width; ?>%>
            <tbody class="main">
                <!--// Patient information row-->
                <tr>
                    <td colspan=<?php print $no_of_columns; ?>

                        <!--// call the imgcreator function to print the patient label large here, containing all the patient details-->
                        <br>
                        &nbsp;&nbsp;<?php echo '<img src="' . $root_path . 'main/imgcreator/barcode_label_single_large.php?sid=' . $sid . '&lang=' . $lang . '&fen=' . $full_en . '&en=' . $pid . '" width=282 height=178>'; ?>
                        <br><br>
                    </td>
                </tr>

                <!--// Table headers -->
                <tr>
                    <th bgcolor="#99ccff" rowspan=3 width="<?php print $column_width_drug; ?>%"><font color="#330066">
                        Prescription
                        </font></th>
                    <th bgcolor="#99ccff" rowspan=3 width="<?php print $column_width_notes; ?>%"><font color="#330066">
                        Notes
                        </font></th>
                    <th bgcolor="#99ccff" colspan=2><font color="#330066">
                        Date:
                        </font></th>

                    <!--// Same loop that ends when $no_of_days is reached, now printing the date for each day prescribed -->
                    <?php
                    for ($x = 0; $x < $max_no_of_days; $x++) {
                        $day = date('d M Y', mktime(0, 0, 0, date("m"), date("d") + $x, date("Y")));
                        echo '
			<th bgcolor="#99ccff" colspan=3>
				' . $day . '
			</th>
			';
                    }
                    $x = 0;
                    ?>
                </tr>
                <tr>
                    <th bgcolor="#99ccff" colspan=2>
                        Weight:
                    </th>

                    <!--// Begin a loop that ends when $no_of_days is reached, creating empty cells, -->
                    <?php
                    for ($x = 0; $x < $max_no_of_days; $x++) {
                        echo '
			<td bgcolor="#e5e5e5" colspan=3>
				&nbsp;
			</td>';
                    }
                    $x = 0;
                    ?>
                </tr>
                <tr>
                    <th bgcolor="#c3c3c3" width="<?php print $column_width_no_times_per_day; ?>%">
                        Number of times given per day
                    </th>
                    <th bgcolor="#c3c3c3" width="<?php print $column_width_dose; ?>%">
                        Dose
                    </th>

                    <!-- // Again the loop -->
                    <?php
                    for ($x = 0; $x < $max_no_of_days; $x++) {
                        echo '
			<th bgcolor="#c3c3c3" width=' . $small_col_width . '%>
				Adm. by
			</th>
			<th bgcolor="#c3c3c3" width=' . $small_col_width . '%>
				Time
			</th>
			<th bgcolor="#c3c3c3" width=' . $small_col_width . '%>
				Result
			</th>
			';
                    }
                    $x = 0;
                    ?>
                </tr>

                <!--
                // Now we come to the rest of the table
                // We have to start a loop that ends when the number of drugs prescribed is reached
                -->

                <?php
//	for($i=0; $i < $no_of_drugs_prescr; $i++) { 
//		while ($db_field = mysql_fetch_assoc($result) ) {
                while ($db_field = $RESULT2->fetchRow()) {
                    $doctor = $db_field['prescriber'];
                    $date_prescr = $db_field['prescribe_date'];
                    $drug = $db_field['article'];
                    $dose = $db_field['dosage'];
                    $no_of_times_per_day = $db_field['times_per_day'];
                    $no_of_days = $db_field['days'];
                    $notes = $db_field['notes'];
                    $check = 'YES!';

                    echo '
		<tr>
			<td rowspan=' . $no_of_times_per_day . '>
			<p align="left"><b>
				' . $drug . '</b></p>
				<p align="right"><i>Prescribed by:<br>' . $doctor . '</i></p>
			</th>
			<td rowspan=' . $no_of_times_per_day . '>
				' . $notes . '
			</th>
			';

                    for ($a = 0; $a < $no_of_times_per_day; $a++) { // nested loop creating the number of rows according to no. of times per day
                        if ($a > 0) {
                            echo '
				<tr>';
                        }
                        $time_of_day = $a + 1;
                        echo '
					<td align=center>' . $time_of_day;


                        echo'</td>
					<td align=center>' . $dose . '</td>
				';

                        for ($z = 0; $z < ($max_no_of_days * 3); $z++) {
                            echo '
				<td bgcolor="#e5e5e5">
					&nbsp;
				</td>
		
				';
                        }
                        $z = 0;
                        echo '</tr>';
                    }

                    $x++;
                    echo '<tr><td bgcolor="#99ccff" colspan=' . $no_of_columns . '>&nbsp;</td></tr>';
                }
                $x = 0;
                ?>
                <tr>
                    <td colspan=2>Codes to be used for filling "Result" column: </td>
                    <td colspan=<?php print $no_of_columns - 2; ?>><b>T</b> - Taken / <b>NT</b> - Received but Not Taken / <b>R</b> - Refused / <b>RD</b> - Refused and Destroyed
                    </td>
                </tr>
        </table>
</body>
</html>

