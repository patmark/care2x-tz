<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);

$report_textsize = 12;
$report_titlesize = 14;
$report_auxtitlesize = 10;
$report_authorsize = 10;

require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * elpidio@care2x.org, 
 *
 * See the file "copy_notice.txt" for the licence notice
 */
function dateDiff($dformat, $endDate, $beginDate) {
    $date_parts1 = explode($dformat, $beginDate);
    $date_parts2 = explode($dformat, $endDate);
    $start_date = gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
    $end_date = gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
    return $end_date - $start_date;
}

//$lang_tables[]='startframe.php';
$lang_tables[] = 'lab.php';
define('LANG_FILE', 'aufnahme.php');
$local_user = 'ck_lab_user';
require_once($root_path . 'include/inc_front_chain_lang.php');
$thisfile = basename($_SERVER['PHP_SELF']);
require_once($root_path . 'include/inc_date_format_functions.php');

require_once($root_path . 'include/care_api_classes/class_access.php');
$access = new Access();
$access->UserExists($_SESSION['sess_user_name']);

//get in the classes i need
/* Create encounter object */
require_once($root_path . 'include/care_api_classes/class_encounter.php');
$enc_obj = new Encounter($encounter_nr);
$encounter = '';
if ($enc_obj->loadEncounterData()) {
    $encounter = $enc_obj->getLoadedEncounterData();
}

// Get the Deparment name
require_once($root_path . 'include/care_api_classes/class_department.php');
$dept_obj = new Department();
$deptName = $dept_obj->FormalName($enc_obj->encounter['current_dept_nr']);
require_once($root_path . 'include/care_api_classes/class_ward.php');
$ward_obj = new Ward();
$wardName = $ward_obj->getWardInfo($enc_obj->encounter['current_ward_nr']);
$roomName = $ward_obj->_getActiveRoomInfo($enc_obj->encounter['current_room_nr'], $enc_obj->encounter['current_ward_nr']);
$roomNumber = $enc_obj->encounter['current_room_nr'];

//get the lab data
require_once($root_path . 'include/care_api_classes/class_lab.php');
$lab_obj = new Lab($encounter_nr);

//get the lab results..
$enc_obj->setWhereCondition("encounter_nr='$encounter_nr'");

if ($encounterLab = $enc_obj->getBasic4Data($encounter_nr)) {

    $patient = $encounterLab->FetchRow();

    $recs = $lab_obj->getAllResults($encounter_nr);

    if ($rows = $lab_obj->LastRecordCount()) {

        # Check if the lab result was recently modified
        $modtime = $lab_obj->getLastModifyTime();

        $lab_obj->getDBCache('chemlabs_result_' . $encounter_nr . '_' . $modtime, $cache);
        # If cache not available, get the lab results and param items
        if (empty($cache)) {
            $records = array();
            $dt = array();
            while ($buffer = $recs->FetchRow()) {
                # Prepare the values
                $tmp = array($buffer['paramater_name'] => $buffer['parameter_value']);
                $records[$buffer['job_id']][] = $tmp;
                $tdate[$buffer['job_id']] = $buffer['test_date'];
                $ttime[$buffer['job_id']] = $buffer['test_time'];
            }
        }
    } else {
        exit;
    }
} else {
    echo $lab_obj->getLastQuery() . "sql$LDDbNoRead";
    exit;
}

$classpath = $root_path . 'classes/phppdf/';
$fontpath = $classpath . 'fonts/';

include($classpath . 'class.ezpdf.php');
$pdf = new Cezpdf();


$logo = $root_path . 'gui/img/logos/lopo/care_logo.jpg';
//$pidbarcode = $root_path . 'cache/barcodes/pn_' . $encounter['pid'] . '.png';
//$encbarcode = $root_path . 'cache/barcodes/en_' . $encounter_nr . '.png';
// Patch for empty file names 2004-05-2 EL
if (empty($encounter['photo_filename'])) {
    $idpic = $root_path . 'fotos/registration/_nothing_';
} else {
    $idpic = $root_path . 'fotos/registration/' . $encounter['photo_filename'];
}


// Load the page header #1
require('../std_plates/pageheader1.php');
// Load the patient data plate #1
$enc = $encounter_nr;
require('../std_plates/patientdata1.php');

$data = NULL;
// make empty line
$y = $pdf->ezText("\n", 14);

// Get the report title
if (isset($LD_var) && !empty($LD_var)) {
    $title = $LD_var;
} else {
    $title = $name . 'Clinical Laboratory Test Results';
}

$data[] = array($title);
$pdf->ezTable($data, '', '', array('xPos' => 'left', 'xOrientation' => 'right', 'showLines' => 0, 'fontSize' => $report_titlesize, 'showHeadings' => 0, 'shaded' => 2, 'shadeCol2' => array(0.9, 0.9, 0.9), 'width' => 555));
$data[] = array(" $LDDate: " . formatDate2Local($report['date'], $date_format) . "   $LDTime: " . $report['time'] . "   $LDBy: " . $report['personell_name']);
/* $dataInfo[] = array (
  'Department :' => 'Department : ' . $deptName ,
  'Ward :' => 'Ward : ' . $wardName['name'],
  'Room :'   => 'Room : ' . $wardName['roomprefix'].$roomName,
  'Bed :' => 'Bed : ' . $roomNumber
  ); */
//$pdf->ezTable($dataInfo,'','',array('showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'307','shaded'=>2,'shadeCol2'=>array(0.9,0.9,0.9),'width'=>555));
$notShow = explode("-", $skipme);

//ktu baj koken e tabeles
$laboratoryTable[] = array(
    "$LDParameter" => "$LDParameter",
    "$LDNormalValue" => "$LDNormalValue",
    "$LDMsrUnit" => "$LDMsrUnit");
while (list($jid, $xval) = each($tdate)) {
    if (!in_array($jid, $notShow)) {
        continue;
    }
    array_push($laboratoryTable[0], $jid);
}

//gjergji
//looks much better like this :)
//order the values
$requestData = array();
reset($records);
# Get the number of colums
$cols = sizeof($records);
$jIDArray[] = array();
while (list($job_id, $paramgroupvalue) = each($records)) {
    $jIDArray[] = $job_id;
    foreach ($paramgroupvalue as $paramgroup_a => $paramvalue_a) {
        foreach ($paramvalue_a as $paramgroup => $paramvalue) {
            $ext = substr(stristr($paramgroup, '__'), 2);
            $requestData[$ext][$paramgroup][$job_id] = $paramvalue;
        }
    }
}


//while (list($x, $v) = each($laboratoryTable[0])) {
// //Iterate through each record now
//      $tmpArray[0][$v] = $x;
//}
//
//$laboratoryTable = array();
//$laboratoryTable = $tmpArray;
//print_r($laboratoryTable);
//#147
reset($tdate);
reset($ttime);
$pdf->ezText("\n", 8);
//while (list($jid, $date) = each($tdate)) {
//    if (!in_array($jid, $notShow)) {
//        continue;
//    }
//    $pdf->ezText("Date - " . $jid . " : " . formatDate2Local($date, $date_format) . " " . $ttime[$jid], 12, array('justification' => 'left'));
//}
//now the print out
reset($requestData);

//print_r($requestData);

//while (list($jid, $date) = each($tdate)) {
//    if (!in_array($jid, $notShow)) {
//        continue;
//    }
////    print_r($requestData);
//    while (list($group, $pm) = each($requestData)) {
////        echo $group.'<br>';
//        $gName = $lab_obj->getGroupName($group);
////        echo '<tr>';
////        echo '<td colspan="' . COL_MAX . '" bgcolor="#ffffee" class="a10_a"><b>';
////        echo $gName->fields['name'];
////        echo '</b></td></tr><tr>';
//    }
//}

while (list($groupId, $paramEnc) = each($requestData)) {
    $gName = $lab_obj->getGroupName($groupId);
    $cache .= "<tr><td  class=\"va12_n\" colspan=\"" . ($cols + 4) . "\"><b>" . $gName->fields['name'] . "</b></td></tr>";
    while (list($paramId, $encounterNr) = each($paramEnc)) {
        $pName = $lab_obj->TestParamsDetails($paramId);
        $cache .= "<tr>";
        $cache .= "<td class=\"" . $class . "\">" . $pName->fields['name'] . "</td>";
        $cache .= "<td class=\"" . $class . "\">" . $pName->fields['median'] . "</td>";
        $cache .= "<td class=\"" . $class . "\">" . $pName->fields['msr_unit'] . "</td>";
        for ($i = 0; $i < count($jIDArray); $i++) {
            if (array_key_exists($jIDArray[$i], $encounterNr)) {
                $cache .= "<td align=\"right\" class=\"" . $class . "\">";
                $cache .= checkParamValue($encounterNr[$jIDArray[$i]], $pName);
                $cache .= "</td>";
                $ptrack++;
                $columns++;
            } else {
                $cache .= "<td align=\"right\" class=\"" . $class . "\">&nbsp;</td>";
                $ptrack++;
                $columns++;
            }
        }
        $cache .= "<td align=\"right\" colspan=\"" . ($cols - $columns + 1) . "\" class=\"" . $class . "\"><input type=\"checkbox\" name=tk value=\"" . $pName->fields['id'] . "\"></td></tr>";
        $class == 'wardlistrow1' ? $class = 'wardlistrow2' : $class = 'wardlistrow1';
        $columns = 0;
    }
}

$pdf->ezTable($laboratoryTable, '', '', array('xPos' => 'left', 'xOrientation' => 'right', 'shaded' => 0, 'width' => 555));

//end : #147
$pdf->ezText("\n", 14);
// make empty line
$pdf->ezText("\n", 14);
$pdf->ezText("Notes : " . $prescriptionNotes, 12);
$pdf->ezText("\n", 14);
$y = $pdf->ezText("\n", 14);
$pdf->ezText("      Doctor                 		                          			 Lab user  ", 12);
$pdf->ezText($presPrescriber, 12);
$y = $pdf->ezText("\n", 10);
$pdf->ezText("______________________                                   				 " . $access->login_id, 10);
$y = $pdf->ezText("\n", 10);
//$pdf->ezStream();
?>
