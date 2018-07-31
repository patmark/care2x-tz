<?php

/*
 * This file displaysthe selected test results for printing
 * 
 * By Patrick (markpatrick9@gmail.com)
 */

require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

//$db->debug = true;

/**
 * CARE2X Integrated Hospital Information System Deployment 2.2 - 2006-07-10
 * GNU General Public License
 * Copyright 2002,2003,2004,2005,2006 Elpidio Latorilla
 * elpidio@care2x.org,
 *
 * See the file "copy_notice.txt" for the licence notice
 */
//gjergji :
//data diff for the dob
function dateDiff($dformat, $endDate, $beginDate) {
    $date_parts1 = explode($dformat, $beginDate);
    $date_parts2 = explode($dformat, $endDate);
    $start_date = gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
    $end_date = gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
    return $end_date - $start_date;
}

//gjergji :
//utility function to print out the arrows depending on age / sex
function checkParamValue($paramValue, $pName) {
    global $root_path, $patient;
    $txt = '';
    $dobDiff = dateDiff("-", date("Y-m-d"), $patient['date_birth']);
    switch ($dobDiff) {
        case ( ($dobDiff >= 1) and ( $dobDiff <= 30 ) ) :
            if ($pName->fields['hi_bound_n'] && $paramValue > $pName->fields['hi_bound_n']) {
                $txt.='<img ' . createComIcon($root_path, 'arrow_red_up_sm.gif', '0', '', TRUE) . '> <font color="red">' . htmlspecialchars($paramValue) . '</font>';
            } elseif ($paramValue < $pName->fields['lo_bound_n']) {
                $txt.='<img ' . createComIcon($root_path, 'arrow_red_dwn_sm.gif', '0', '', TRUE) . '> <font color="red">' . htmlspecialchars($paramValue) . '</font>';
            } else {
                $txt.=htmlspecialchars($paramValue);
            }
            break;
        case ( ($dobDiff >= 31) and ( $dobDiff <= 360 ) ) :
            if ($pName->fields['hi_bound_y'] && $paramValue > $pName->fields['hi_bound_y']) {
                $txt.='<img ' . createComIcon($root_path, 'arrow_red_up_sm.gif', '0', '', TRUE) . '> <font color="red">' . htmlspecialchars($paramValue) . '</font>';
            } elseif ($paramValue < $pName->fields['lo_bound_y']) {
                $txt.='<img ' . createComIcon($root_path, 'arrow_red_dwn_sm.gif', '0', '', TRUE) . '> <font color="red">' . htmlspecialchars($paramValue) . '</font>';
            } else {
                $txt.=htmlspecialchars($paramValue);
            }
            break;
        case ( $dobDiff >= 361) and ( $dobDiff <= 5040 ) :
            if ($pName->fields['hi_bound_c'] && $paramValue > $pName->fields['hi_bound_c']) {
                $txt.='<img ' . createComIcon($root_path, 'arrow_red_up_sm.gif', '0', '', TRUE) . '> <font color="red">' . htmlspecialchars($paramValue) . '</font>';
            } elseif ($paramValue < $pName->fields['lo_bound_c']) {
                $txt.='<img ' . createComIcon($root_path, 'arrow_red_dwn_sm.gif', '0', '', TRUE) . '> <font color="red">' . htmlspecialchars($paramValue) . '</font>';
            } else {
                $txt.=htmlspecialchars($paramValue);
            }
            break;
        case $dobDiff > 5040 :
            if ($patient['sex'] == 'm')
                if ($pName->fields['hi_bound'] && $paramValue > $pName->fields['hi_bound']) {
                    $txt.='<img ' . createComIcon($root_path, 'arrow_red_up_sm.gif', '0', '', TRUE) . '> <font color="red">' . htmlspecialchars($paramValue) . '</font>';
                } elseif ($paramValue < $pName->fields['lo_bound']) {
                    $txt.='<img ' . createComIcon($root_path, 'arrow_red_dwn_sm.gif', '0', '', TRUE) . '> <font color="red">' . htmlspecialchars($paramValue) . '</font>';
                } else {
                    $txt.=htmlspecialchars($paramValue);
                } elseif ($patient['sex'] == 'f')
                if ($pName->fields['hi_bound_f'] && $paramValue > $pName->fields['hi_bound_f']) {
                    $txt.='<img ' . createComIcon($root_path, 'arrow_red_up_sm.gif', '0', '', TRUE) . '> <font color="red">' . htmlspecialchars($paramValue) . '</font>';
                } elseif ($paramValue < $pName->fields['lo_bound_f']) {
                    $txt.='<img ' . createComIcon($root_path, 'arrow_red_dwn_sm.gif', '0', '', TRUE) . '> <font color="red">' . htmlspecialchars($paramValue) . '</font>';
                } else {
                    $txt.=htmlspecialchars($paramValue);
                }
            break;
    }
    return $txt;
}

define('LANG_FILE', 'lab.php');
define('NO_2LEVEL_CHK', 1);
require_once($root_path . 'include/inc_front_chain_lang.php');

/* Create encounter object */
require_once($root_path . 'include/care_api_classes/class_lab.php');
$enc_obj = new Encounter($encounter_nr);
$lab_obj = new Lab($encounter_nr);

$cache = '';

//if ($nostat)
//    $ret = $root_path . "modules/laboratory/labor_data_patient_such.php?sid=$sid&lang=$lang&versand=1&keyword=$encounter_nr";
//else
//    $ret = $root_path . "modules/nursing/nursing-station-patientdaten.php?sid=$sid&lang=$lang&station=$station&pn=$encounter_nr";
# Load the date formatter */
require_once($root_path . 'include/inc_date_format_functions.php');

$enc_obj->setWhereCondition("encounter_nr='$encounter_nr'");


if (!isset($GLOBAL_CONFIG))
    $GLOBAL_CONFIG = array();
include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
$glob = & new GlobalConfig($GLOBAL_CONFIG);
# Get all config items starting with "main_"
$glob->getConfig('main_%');

//print_r($GLOBAL_CONFIG);

$records = array();
$dt = array();
if ($encounter = $enc_obj->getBasic4Data($encounter_nr)) {

    $patient = $encounter->FetchRow();
//    print_r($patient);

    $recs = $lab_obj->getAllResults($encounter_nr);

    if ($rows = $lab_obj->LastRecordCount()) {

        while ($buffer = $recs->FetchRow()) {
            # Prepare the values
            $tmp = array($buffer['paramater_name'] => $buffer['parameter_value']);
            $records[$buffer['job_id']][] = $tmp;
            $tdate[$buffer['job_id']] = $buffer['test_date'];
            $ttime[$buffer['job_id']] = $buffer['test_time'];
        }
    }
} else {
    echo "<p>" . $lab_obj->getLastQuery() . "sql$LDDbNoRead";
    exit;
}
?>

<style type="text/css" name="1">
    .va12_n{font-family:verdana,arial; font-size:12; border: 1px solid; color:#000099 }
    .a10_b{font-family:arial; font-size:10; border: 1px solid; color:#000000}
    .a10_n{font-family:arial; font-size:10; border: 1px solid; color:#000099}
    .a12_b{font-family:arial; font-size:12; border: 1px solid; color:#000000}
    .j{font-family:verdana; font-size:12; border: 1px solid; color:#000000}
    .report_tbl {
        border: 1px solid;
        border-collapse: collapse;
        width: 730px;
        margin: auto;
    }
    .report_data{
        border: 1px solid;
    }

    .report_tbl_header{
        width: 725px;
        border: none;
    }
    .no_border_right{
        border: none;
        border-right: none;
    }
    .no_border_left{
        border: none;
        border-left: none;
    }
</style>

<?php

$notShow = explode("-", $skipme);

//print_r($notShow);
//Start appending output to table
$cache .= '<table class="report_tbl">';

$logo = $root_path . $GLOBAL_CONFIG['main_info_logo'];

if ($records) {

    # Get the number of colums
    $cols = sizeof($records);

    //Get patient's data
    $cache.='<tr>';
    $cache.='<td colspan="' . ($cols + 3) . '">';
    $cache .= '<table class="report_tbl_header">';

    //Facility Details here
    $cache.='<td class="no_border_right">';

    $cache.='<img src="' . $logo . '"  width="150">';
    $cache.='</td>';
    $cache.='<td class="no_border_right" valign="top" style="padding: 10px;">';
    $cache.='<p style="font-size:20px">' . $GLOBAL_CONFIG['main_info_address'] . '</p>';
    $cache.= "$LDPhone: " . $GLOBAL_CONFIG['main_info_phone'] . '<br>';
    $cache.= "$LDFax: " . $GLOBAL_CONFIG['main_info_fax'] . '<br>';
    $cache.= "$LDEmail: " . $GLOBAL_CONFIG['main_info_email'] . '<br>';

    $cache.='</td>';
    //End of Facility Details
    //Patient details
    $cache.='<td width="auto" align="right" class="no_border_left" rowspan="2">';
    $cache.='<img src="' . $root_path . 'main/imgcreator/barcode_label_single_large.php?sid=' . $sid . '&lang=' . $lang . '&fen=' . $full_en . '&en=' . $encounter_nr . '" width=282 height=178">';
    $cache.='</td>';
    $cache.='</tr>';

    //Report title
    $cache.='<tr>';
    $cache.='<td width="auto" align="center" colspan="2">';
    $cache.='<p style="font-size:18px; color: violet;">' . $LDClinicalLabRep . '</p>';
    $cache.='</td>';
    $cache.='</tr>';

    $cache .= '</table>';
    $cache.='</td>';
    $cache.='</tr>';

    $cache .= '<tr>';
    $cache .= '<table class="report_tbl">';
    $cache .= '<tr bgcolor="#dd0000" >
		<td class="j" rowspan="2"><font color="#ffffff"> &nbsp;<b>' . $LDParameter . '</b>
		</td>
		<td  class="j" rowspan="2"><font color="#ffffff">&nbsp;<b>' . $LDNormalValue . '</b>&nbsp;</td>
		<td  class="j" rowspan="2"><font color="#ffffff">&nbsp;<b>' . $LDMsrUnit . '</b>&nbsp;</td>
		';

    while (list($x, $v) = each($tdate)) {
        if (!in_array($x, $notShow)) {
            continue;
        }
        $cache.= '
		<td class="a12_b"><font color="#ffffff">Date: &nbsp;&nbsp;<b>' . formatDate2Local($v, $date_format) . '<br>Batch No:  ' . $x . '</b>&nbsp;</td>';
    }

    $cache.= '
		</tr>';
//		<tr bgcolor="#ffddee" >
//		<td class="va12_n"><font color="#ffffff"> &nbsp;
//		</td>
//		<td class="va12_n"><font color="#ffffff"> &nbsp;
//		</td>
//		<td  class="j"><font color="#ffffff">&nbsp;</td>';

    while (list($x, $v) = each($ttime)) {
        if (!in_array($x, $notShow)) {
            continue;
        }
        $cache.= '
		<td class="a12_b"><font color="#0000cc">&nbsp;<b>' . convertTimeToLocal($v) . '</b> ' . $LDOClock . '&nbsp;&nbsp;&nbsp;<strong>Results</strong></td>';
    }

    $cache.= '</tr>';
//gjergji
//looks much better like this :)
//order the values
    $requestData = array();
    reset($records);

    $jIDArray = array();
    while (list($job_id, $paramgroupvalue) = each($records)) {
        if (!in_array($job_id, $notShow)) {
            continue;
        }
        $jIDArray[] = $job_id;
        foreach ($paramgroupvalue as $paramgroup_a => $paramvalue_a) {
            foreach ($paramvalue_a as $paramgroup => $paramvalue) {
                $ext = substr(stristr($paramgroup, '__'), 2);
                $requestData[$ext][$paramgroup][$job_id] = $paramvalue;
            }
        }
    }

//display the values
    $class = 'report_data';
    $columns = 0;
    $ptrack = 0;

    while (list($groupId, $paramEnc) = each($requestData)) {
        $gName = $lab_obj->getGroupName($groupId);
        $cache .= "<tr><td  class=\"va12_n\" colspan=\"" . ($cols + 3) . "\"><b>" . $gName->fields['name'] . "</b></td></tr>";
        while (list($paramId, $encounterNr) = each($paramEnc)) {
            $pName = $lab_obj->TestParamsDetails($paramId);
            $cache .= "<tr>";
            $cache .= "<td class=\"" . $class . "\">" . $pName->fields['name'] . "</td>";
            $cache .= "<td class=\"" . $class . "\">" . $pName->fields['median'] . "</td>";
            $cache .= "<td class=\"" . $class . "\">" . $pName->fields['msr_unit'] . "</td>";
            for ($i = 0; $i < count($jIDArray); $i++) {
                if (array_key_exists($jIDArray[$i], $encounterNr)) {
                    $cache .= "<td align=\"justify\" class=\"" . $class . "\">";
                    $cache .= checkParamValue($encounterNr[$jIDArray[$i]], $pName);
                    $cache .= "</td>";
                    $ptrack++;
                    $columns++;
                } else {
                    $cache .= "<td align=\"center\" class=\"" . $class . "\">&nbsp;</td>";
                    $ptrack++;
                    $columns++;
                }
            }
//            $cache .= "<td align=\"right\" colspan=\"" . ($cols - $columns + 1) . "\" class=\"" . $class . "\"></td></tr>";
            $cache.='</tr>';
//            $class == 'wardlistrow1' ? $class = 'wardlistrow2' : $class = 'wardlistrow1';
            $columns = 0;
        }
    }
    $cache.='<tr>'
            . '<td colspan="' . ($cols + 3) . '"></br>';
    $cache.='</td></tr>';

    $cache.='<tr>'
            . '<td colspan="' . ($cols + 3) . '" align="justify">'
            . "$LDBy: " . $report['personell_name']
            . ' ' . $_SESSION['sess_user_name'];
    $cache.='</td></tr>';
}

//print_r($_SESSION);
# Show the lab results table from the cache
$cache.='</table>';


$cache.='</tr>';
echo $cache;

echo '</table>';

echo '<script> window.print(); </script>';
?>