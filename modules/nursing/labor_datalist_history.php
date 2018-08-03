<?php

//$sql_lab="SELECT lab.test_date,lab.paramater_name,lab.parameter_value FROM care_test_findings_chemlabor_sub AS lab WHERE lab.encounter_nr IN (SELECT encounter_nr FROM care_encounter WHERE pid=".$_SESSION['sess_pid'].") ORDER BY lab.test_date ";
$sql_lab = "SELECT DISTINCT lab.test_date, labpar.name AS paramater_name,lab.parameter_value FROM care_test_findings_chemlabor_sub lab, care_tz_laboratory_param labpar"
        . " WHERE lab.paramater_name=labpar.id AND lab.encounter_nr IN (SELECT encounter_nr FROM care_encounter WHERE pid='" . $pid . "') ORDER BY lab.test_date DESC";
$lab_result = $db->Execute($sql_lab);


echo '
<form action="labor-data-makegraph.php" method="post" name="labdata">
<table border=0 width="100%" bgcolor="#666666" cellpadding=3 cellspacing=1>';


echo '
		<tr bgcolor="#CAD3EC" >
		<td class="va12_n"><font color="#000"> &nbsp;<b>test date</b>
		<td class="va12_n"><font color="#000"> &nbsp;<b>Parameter name</b>
		</td>
		<td  class="j"><font color="#000">&nbsp;<b>value</b>&nbsp;</td>
		</tr>
		';
while ($parameter = $lab_result->FetchRow()) {
    echo '
		<tr bgcolor="#D2DFD0" >
		<td class="va12_n"><font color="#000"> &nbsp;' . $parameter['test_date'] . '
		<td class="va12_n"><font color="#000"> &nbsp;' . $parameter['paramater_name'] . '
		</td>
		<td  class="j"><font color="#000">&nbsp;' . $parameter['parameter_value'] . '&nbsp;</td>
		</tr>
		';
}



echo '</table>';
echo '</form>';
?>
