<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
/**
 * CARE2X Integrated Hospital Information System beta 2.0.1 - 2004-07-04
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * elpidio@care2x.org,
 *
 * See the file "copy_notice.txt" for the licence notice
 */
# Set defaults
if (!$target) {
    $target = 'search';
}
if (!isset($wt_unit_nr) || !$wt_unit_nr)
    $wt_unit_nr = 6;# set your default unit of weight msrmnt type, default 6 = kilogram
if (!isset($ht_unit_nr) || !$ht_unit_nr)
    $ht_unit_nr = 7;# set your default unit of height msrmnt type, default 7 = centimeter
if (!isset($hc_unit_nr) || !$hc_unit_nr)
    $hc_unit_nr = 7;# set your default unit of head circumfernce msrmnt type, default 7 = centimeter

$thisfile = basename(__FILE__);

require_once($root_path . 'include/care_api_classes/class_measurement.php');
require_once($root_path . 'include/care_api_classes/class_mini_dental.php');
$oc = new dental;
$obj = new Measurement;

if (isset($_SESSION['sess_pid'])) {
    $pid = $_SESSION['sess_pid'];
} else if (isset($pid)) {
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

//print_r($unit_ids);

if (isset($_POST['mode'])) {
    $mode = $_POST['mode'];
} else if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

//echo $mode;

if ($mode == 'new') {   //resolve for mode = new to mode = create
    $mode = 'create';
}


//echo $mode;
//echo test_update();
//echo $_SESSION['sess_en'] . ' -Encounter' . $encounter_nr;

if (!isset($mode)) {
    $mode = 'show';
} elseif ($mode == 'create' || $mode = 'update') {
    $modetmp = $mode;         //Set a temporary value for mode to reset the value after each variable 
    include_once($root_path . 'include/inc_date_format_functions.php');
    if ($_POST['msr_date']) {
        $_POST['msr_date'] = @formatDate2STD($_POST['msr_date'], $date_format);
    } else {
        $_POST['msr_date'] = date('Y-m-d');
    }
//    echo $_POST['msr_date'];

    if ($weight || $height || $head_c || $pulse_c || $resprate_c || $bp_c || $temp_c) {
# Set to no redirect
        $no_redirect = TRUE;

        if ($weight) {
            $mode = $modetmp;
            $_POST['value'] = $weight;
            $_POST['msr_type_nr'] = 6; # msrmt type 6 = weight
            $_POST['notes'] = isset($_POST['wt_notes']) && $wt_notes != "" ? $wt_notes : " ";
            $_POST['unit_nr'] = $wt_unit_nr;
            $_POST['unit_type_nr'] = 2; # 2 = weight
            $value = $_POST['weight'];
            $res = test_update($mode, $encounter_nr, $msr_date, $msr_time, $msr_type_nr = 6, $value);
        }
        if ($height) {
            $mode = $modetmp;
            $_POST['value'] = $height;
            $_POST['msr_type_nr'] = 7;  # msrmt type 7 = height
            $_POST['notes'] = isset($_POST['ht_notes']) && $ht_notes != "" ? $ht_notes : " ";
            $_POST['unit_nr'] = $ht_unit_nr;
            $_POST['unit_type_nr'] = 3; # 3 = length
            $value = $_POST['height'];
//            echo $value;
            $res = test_update($mode, $encounter_nr, $msr_date, $msr_time, $msr_type_nr = 7, $value);
        }
        if ($head_c) {
            $mode = $modetmp;
            $_POST['value'] = $head_c;
            $_POST['msr_type_nr'] = 9; # msrmt type 9 = head circumference
            $_POST['notes'] = isset($_POST['hc_notes']) && $hc_notes != "" ? $hc_notes : " ";
            $_POST['unit_nr'] = $hc_unit_nr;
            $_POST['unit_type_nr'] = 3; # 3 = length
            $value = $_POST['head_c'];
            $res = test_update($mode, $encounter_nr, $msr_date, $msr_time, $msr_type_nr = 9, $value);
        }

        if ($pulse_c) {
            $mode = $modetmp;
            $_POST['value'] = $pulse_c;
            $_POST['msr_type_nr'] = 10; # msrmt type 10 = Pulse
            $_POST['notes'] = isset($_POST['pulse_notes']) && $pulse_notes != "" ? $pulse_notes : " ";
            $_POST['unit_nr'] = $pulse_nr;
            $_POST['unit_type_nr'] = 7; # 7 = rate
            $value = $_POST['pulse_c'];
            $res = test_update($mode, $encounter_nr, $msr_date, $msr_time, $msr_type_nr = 10, $value);
        }

        if ($resprate_c) {
            $mode = $modetmp;
            $_POST['value'] = $resprate_c;
            $_POST['msr_type_nr'] = 11; # msrmt type 11 = Respiration Rate
            $_POST['notes'] = isset($_POST['resprate_notes']) && $resprate_notes != "" ? $resprate_notes : " ";
            $_POST['unit_nr'] = $resprate_nr;
            $_POST['unit_type_nr'] = 7; # 7 = rate
            $value = $_POST['resprate_c'];
            $res = test_update($mode, $encounter_nr, $msr_date, $msr_time, $msr_type_nr = 11, $value);
        }

        if ($bp_c) {
            $mode = $modetmp;
            $_POST['value'] = $bp_c;
            $_POST['msr_type_nr'] = 12; # msrmt type 12 = Blood Pressure
            $_POST['notes'] = isset($_POST['bp_notes']) && $bp_notes != "" ? $bp_notes : " ";
            $_POST['unit_nr'] = $bp_nr;
            $_POST['unit_type_nr'] = 4; # 4 = mmHg
            $value = $_POST['bp_c'];
            $res = test_update($mode, $encounter_nr, $msr_date, $msr_time, $msr_type_nr = 12, $value);
        }

        if ($temp_c) {
            $mode = $modetmp;
            $_POST['value'] = $temp_c;
            $_POST['msr_type_nr'] = 13; # msrmt type 12 = Body Temperature
            $_POST['notes'] = isset($_POST['temp_notes']) && $temp_notes != "" ? $temp_notes : " ";
            $_POST['unit_nr'] = $temp_nr;
            $_POST['unit_type_nr'] = 5; # 5 = celcius
            $value = $_POST['temp_c'];
            $res = test_update($mode, $encounter_nr, $msr_date, $msr_time, $msr_type_nr = 13, $value);
        }

        if ($satur_c) {
            $mode = $modetmp;
            $_POST['value'] = $satur_c;
            $_POST['msr_type_nr'] = 14; # msrmt type 14 = Saturation
            $_POST['notes'] = isset($_POST['satur_notes']) && $satur_notes != "" ? $satur_notes : " ";
            $_POST['unit_nr'] = $satur_nr;
            $_POST['unit_type_nr'] = 8; # 8 = %
            $value = $_POST['satur_c'];
            $res = test_update($mode, $encounter_nr, $msr_date, $msr_time, $msr_type_nr = 14, $value);
        }

//-- get dept_nr
        if (isset($_SESSION['deptnr'])) {
            $dept_nr = $_SESSION['deptnr'];
        }

        header("location:" . $thisfile . URL_REDIRECT_APPEND . "&target=$target&allow_update=1&pid=" . $_SESSION['sess_pid']);
//        header("location:" . $thisfile . URL_REDIRECT_APPEND . "&target=$target&mode=$mode&allow_update=1&pid=" . $_SESSION['sess_pid']);
        exit;
    }
}

function test_update($mode, $encounter_nr, $msr_date, $msr_time, $msr_type_nr, $value) {
    global $db, $root_path, $obj, $oc, $no_redirect;
    if ($mode == 'update') {
//        echo $msr_date . ' ' . $msr_time . ' ' . $encounter_nr;
        $_POST['msr_date'] = $msr_date;
        $_POST['msr_time'] = $msr_time;
        $_POST['value'] = $value;
        $_POST['modify_id'] = $_SESSION['sess_user_name'];

        //Check if its a new record and create otherwise if exists, update
        $testQry = "SELECT nr, value, measured_by FROM care_encounter_measurement "
                . "WHERE msr_type_nr=$msr_type_nr AND encounter_nr=$encounter_nr
                        AND msr_date='$msr_date' AND msr_time='$msr_time'";
        if ($result = $db->Execute($testQry)) {
            if ($result->RecordCount() > 0) {
                $row = $result->FetchRow();
                $nr = $row[0];
                include('./include/save_admission_data.inc.php');
            } else {
                $mode = 'create';
                $_POST['modify_id'] = "";
                $_POST['create_id'] = $_SESSION['sess_user_name'];
                $_POST['measured_by'] = $_SESSION['sess_user_name'];
                $_POST['history'] = "Created: " . date('Y-m-d H:i:s') . " " . $_SESSION['sess_user_name'];
                $_POST['create_time'] = date('YmdHis');
                include('./include/save_admission_data.inc.php');
            }
            return TRUE;
        }
    } else {
        # Non standard time format
        $_POST['msr_time'] = date('H.i');
        $_POST['create_time'] = date('YmdHis'); # Create the timestamp to group the values
        $_POST['create_id'] = $_SESSION['sess_user_name'];
        include('./include/save_admission_data.inc.php');
    }
    return TRUE;
}

if ($mode == 'update') {
    $encounter_nr = $_GET['encounter_nr'];
    $msr_date = $_GET['msr_date'];
    $msr_time = $_GET['msr_time'];

    $sql = "SELECT m.nr,m.value,m.msr_date,m.msr_time,m.unit_nr,m.encounter_nr,m.msr_type_nr,m.create_time, m.notes
		FROM 	care_encounter AS e,
					care_person AS p,
					care_encounter_measurement AS m
		WHERE p.pid=" . $_SESSION['sess_pid'] . "
			AND p.pid=e.pid
			AND e.encounter_nr=m.encounter_nr
                        AND m.encounter_nr=$encounter_nr
                        AND m.msr_date='$msr_date'
                        AND m.msr_time='$msr_time'
			AND (m.msr_type_nr=6 OR " .
            "m.msr_type_nr=7 OR " .
            "m.msr_type_nr=9 OR " .
            "m.msr_type_nr=10 OR " .
            "m.msr_type_nr=11 OR " .
            "m.msr_type_nr=12 OR " .
            "m.msr_type_nr=13 OR " .
            "m.msr_type_nr=14)
		ORDER BY m.msr_date DESC";
//    echo $sql;
    if ($result = $db->Execute($sql)) {
        if ($rows = $result->RecordCount()) {
//            print_r($result);
            while ($msr_row = $result->FetchRow()) {
# group the elements
                $msr_comp[$msr_row['msr_time']]['encounter_nr'] = $msr_row['encounter_nr'];
                $msr_comp[$msr_row['msr_time']]['msr_date'] = $msr_row['msr_date'];
                $msr_comp[$msr_row['msr_time']]['msr_time'] = $msr_row['msr_time'];
                $msr_comp[$msr_row['msr_time']][$msr_row['msr_type_nr']] = $msr_row;
            }
        }
    }
}

$lang_tables[] = 'obstetrics.php';
require('./include/init_show.php');

if ($mode == 'show') {

    $sql = "SELECT m.nr,m.value,m.msr_date,m.msr_time,m.unit_nr,m.encounter_nr,m.msr_type_nr,m.create_time, m.notes
		FROM 	care_encounter AS e,
					care_person AS p,
					care_encounter_measurement AS m
		WHERE p.pid=" . $_SESSION['sess_pid'] . "
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
//                $msr_comp[$msr_row['create_time']]['encounter_nr'] = $msr_row['encounter_nr'];
//                $msr_comp[$msr_row['create_time']]['msr_date'] = $msr_row['msr_date'];
//                $msr_comp[$msr_row['create_time']]['msr_time'] = $msr_row['msr_time'];
//                $msr_comp[$msr_row['create_time']][$msr_row['msr_type_nr']] = $msr_row;
                $msr_comp[$msr_row['msr_time']]['encounter_nr'] = $msr_row['encounter_nr'];
                $msr_comp[$msr_row['msr_time']]['msr_date'] = $msr_row['msr_date'];
                $msr_comp[$msr_row['msr_time']]['msr_time'] = $msr_row['msr_time'];
                $msr_comp[$msr_row['msr_time']][$msr_row['msr_type_nr']] = $msr_row;
            }
        }
    }
}



# set your default unit of msrmnt type, default 6 = kilogram
if (!isset($wt_unit_nr) || !$wt_unit_nr)
    $wt_unit_nr = 6;

# set your default unit of msrmnt type, default 7 = centimeter
if (!isset($ht_unit_nr) || !$ht_unit_nr)
    $ht_unit_nr = 7;

# set your default unit of msrmnt type, default 7 = centimeter
if (!isset($hc_unit_nr) || !$hc_unit_nr)
    $hc_unit_nr = 7;


$subtitle = $LDMeasurements;

# Set the type of "notes"
$notestype = 'msr';

$_SESSION['sess_file_return'] = $thisfile;

$buffer = str_replace('~tag~', $title . ' ' . $name_last, $LDNoRecordFor);
$norecordyet = str_replace('~obj~', strtolower($subtitle), $buffer);

# Load GUI page
require('./gui_bridge/default/gui_show.php');
?>
