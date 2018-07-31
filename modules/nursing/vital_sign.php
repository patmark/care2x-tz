<?php

require_once($root_path . 'include/care_api_classes/class_measurement.php');
require_once($root_path . 'include/care_api_classes/class_mini_dental.php');
$oc = new dental;
$obj = new Measurement;

if (isset($pid)) {
    $_SESSION['sess_pid'] = $pid;
}

$fileNr = $oc->GetFileNoFromPID($pid);
$encounter_nr = $oc->GetEncounterFromPid($_SESSION['sess_pid']);

if ($_SESSION['sess_en'] !== $encounter_nr) {
    $_SESSION['sess_en'] = $encounter_nr;
}

$unit_types = $obj->getUnits();
$unit_rates = $obj->rateUnits();
$unit_bp = $obj->pressureUnits();
$unit_temp = $obj->temperatureUnits();
$unit_sat = $obj->percentUnits();

# Prepare unit ids in array
$unit_ids = array();
while (list($x, $v) = each($unit_types)) {
    $unit_ids[$v['nr']] = $v['id'];
}
reset($unit_types);


while (list($x, $v) = each($unit_rates)) {
    $unit_ids[$v['nr']] = $v['id'];
}
reset($unit_rates);


while (list($x, $v) = each($unit_bp)) {
    $unit_ids[$v['nr']] = $v['id'];
}
reset($unit_bp);


while (list($x, $v) = each($unit_temp)) {
    $unit_ids[$v['nr']] = $v['id'];
}
reset($unit_temp);

while (list($x, $v) = each($unit_sat)) {
    $unit_ids[$v['nr']] = $v['id'];
}
reset($unit_sat);

$sql = "SELECT m.nr,m.value,m.msr_date,m.msr_time,m.unit_nr,m.encounter_nr,m.msr_type_nr,m.create_time, m.notes
		FROM 	care_encounter AS e,
					care_person AS p,
					care_encounter_measurement AS m
		WHERE p.pid=" . $pid . "
			AND p.pid=e.pid
			AND e.encounter_nr=m.encounter_nr
			AND (m.msr_type_nr=6 OR " .
        "m.msr_type_nr=7 OR " .
        "m.msr_type_nr=9 OR " .
        "m.msr_type_nr=10 OR " .
        "m.msr_type_nr=11 OR " .
        "m.msr_type_nr=12 OR " .
        "m.msr_type_nr=13 OR " .
        "m.msr_type_nr=14)
		ORDER BY m.msr_date DESC";

if ($result = $db->Execute($sql)) {
    if ($rows = $result->RecordCount()) {
        while ($msr_row = $result->FetchRow()) {
            # group the elements
//            $msr_comp[$msr_row['create_time']]['encounter_nr'] = $msr_row['encounter_nr'];
//            $msr_comp[$msr_row['create_time']]['msr_date'] = $msr_row['msr_date'];
//            $msr_comp[$msr_row['create_time']]['msr_time'] = $msr_row['msr_time'];
//            $msr_comp[$msr_row['create_time']][$msr_row['msr_type_nr']] = $msr_row;

            $msr_comp[$msr_row['msr_time']]['encounter_nr'] = $msr_row['encounter_nr'];
            $msr_comp[$msr_row['msr_time']]['msr_date'] = $msr_row['msr_date'];
            $msr_comp[$msr_row['msr_time']]['msr_time'] = $msr_row['msr_time'];
            $msr_comp[$msr_row['msr_time']][$msr_row['msr_type_nr']] = $msr_row;
        }
    }
}

include($root_path . 'modules/nursing/gui/gui_show_weight_height.php');
