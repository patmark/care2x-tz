<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
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
$lang_tables[] = 'prompt.php';
define('LANG_FILE', 'nursing.php');
$local_user = 'ck_pflege_user';
require_once($root_path . 'include/inc_front_chain_lang.php');
if (!$encoder)
    $encoder = $_SESSION['sess_user_name'];

//$breakfile="amb_clinic_patients.php".URL_APPEND."&edit=$edit&dept_nr=$dept_nr";
$breakfile = "javascript:window.close();";
//if($backpath) $breakfile=urldecode($backpath).URL_APPEND;
$thisfile = basename($_SERVER['PHP_SELF']);

# Load date formatter
require_once($root_path . 'include/inc_date_format_functions.php');
require_once($root_path . 'include/care_api_classes/class_encounter.php');
require_once($root_path . 'include/care_api_classes/class_tz_diagnostics.php');
include_once($root_path . 'language/en/lang_en_aufnahme.php');
//include_once($root_path.'language/en/obstetrics.php');


require_once($root_path . 'include/care_api_classes/class_measurement.php');
require_once($root_path . 'include/care_api_classes/class_mini_dental.php');
$oc = new dental;
$obj = new Measurement;

$fileNr = $oc->GetFileNoFromPID($pid);

$unit_types = $obj->getUnits();
$unit_rates = $obj->rateUnits();
$unit_bp = $obj->pressureUnits();
$unit_temp = $obj->temperatureUnits();

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


$enc_obj = new Encounter;

if ($enc_obj->loadEncounterData($pn)) {
    //$db->debug=1;

    if (($mode == 'release') && !(isset($lock) || $lock)) {
        $date = (empty($x_date)) ? date('Y-m-d') : formatDate2STD($x_date, $date_format);
        $time = (empty($x_time)) ? date('H:i:s') : convertTimeToStandard($x_time);
        # Check the discharge type
        switch ($relart) {
            case 8: if ($released = $enc_obj->DischargeFromDept($pn, $relart, $date, $time)) {
                    # Reset current department
                    //$enc_obj->ResetAllCurrentPlaces($pn,0);
                }
                break;
            default: $released = $enc_obj->Discharge($pn, $relart, $date, $time);
        }
        if ($released) {
            # If discharge note present
            if (!empty($info)) {
                $data_array['notes'] = $info;
                $data_array['encounter_nr'] = $pn;
                $data_array['date'] = $date;
                $data_array['time'] = $time;
                $data_array['personell_name'] = $encoder;
                $enc_obj->saveDischargeNotesFromArray($data_array);
            }

            # If patient died
            //$db->debug=1;
            if ($relart == 7) {
                include_once($root_path . 'include/care_api_classes/class_person.php');
                $person = new Person;
                $death['death_date'] = $date;
                $death['death_encounter_nr'] = $pn;
                if ($dbtype == 'mysql')
                    $death['history'] = "CONCAT(history,'Discharged " . date('Y-m-d H:i:s') . " $encoder\n')";
                else
                    $death['history'] = "history || 'Discharged " . date('Y-m-d H:i:s') . " $encoder\n' ";
                $death['modify_id'] = $encoder;
                $death['modify_time'] = date('YmdHis');
                $person->setDeathInfo($enc_obj->PID(), $death);
                //echo $person->getLastQuery();
            }

            header("location:$thisfile?sid=$sid&lang=$lang&pn=$pn&backpath=$backpath&bd=$bd&rm=$rm&pyear=$pyear&pmonth=$pmonth&pday=$pday&mode=$mode&released=1&lock=1&x_date=$x_date&x_time=$x_time&relart=$relart&encoder=" . strtr($encoder, " ", "+") . "&info=" . strtr($info, " ", "+") . "&station=$station&dept_nr=$dept_nr");
            exit;
        }
    }

    include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
    $GLOBAL_CONFIG = array();
    $glob_obj = new GlobalConfig($GLOBAL_CONFIG);
    $glob_obj->getConfig('patient_%');
    $glob_obj->getConfig('person_%');

    $result = $enc_obj->encounter;

    /* Check whether config foto path exists, else use default path */
    $default_photo_path = 'fotos/registration';
    $photo_filename = $result['photo_filename'];
    $photo_path = (is_dir($root_path . $GLOBAL_CONFIG['person_foto_path'])) ? $GLOBAL_CONFIG['person_foto_path'] : $default_photo_path;
    require_once($root_path . 'include/inc_photo_filename_resolve.php');
    /* Load the discharge types */
    $discharge_types = $enc_obj->getDischargeTypesData();

    if (!isset($dept) || empty($dept)) {
        # Create nursing notes object
        include_once($root_path . 'include/care_api_classes/class_department.php');
        $dept_obj = new Department;
        $dept = $dept_obj->FormalName($dept_nr);
    }
}

# Start Smarty templating here
/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme

require_once($root_path . 'gui/smarty_template/smarty_care.class.php');
$smarty = new smarty_care('common');

# Toolbar title

$smarty->assign('sToolbarTitle', 'Detailed Patient History');

# href for the return button
$smarty->assign('pbBack', FALSE);

# href for the  button
$smarty->assign('pbHelp', "javascript:gethelp('discharge_patient.php','Discharge Patient','','$station','$LDReleasePatient')");

$smarty->assign('breakfile', $breakfile);

# Window bar title
$smarty->assign('title', $LDReleasePatient);

# If not yet released, create javascript code
# Collect extra javascript code

if (!$released) {

    ob_start();
    ?>

    <script language="javascript">
    <!--

        function pruf(d)
        {
            if (!d.sure.checked) {
                return false;
            } else {
                if (!d.encoder.value) {
                    alert("<?php echo $LDAlertNoName ?>");
                    d.encoder.focus();
                    return false;
                }
                if (!d.x_date.value) {
                    alert("<?php echo $LDAlertNoDate ?>");
                    d.x_date.focus();
                    return false;
                }
                if (!d.x_time.value) {
                    alert("<?php echo $LDAlertNoTime ?>");
                    d.x_time.focus();
                    return false;
                }
                // Check if death
                if (d.relart[3].checked == true && d.x_date.value != "") {
                    if (!confirm("<?php echo $LDDeathDateIs ?> " + d.x_date.value + ". <?php echo "$LDIsCorrect $LDProceedSave" ?>"))
                        return false;
                }
                return true;
            }
        }

    <?php require($root_path . 'include/inc_checkdate_lang.php'); ?>
    //-->
    </script>

    <script language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>
    <script language="javascript" src="<?php echo $root_path; ?>js/setdatetime.js"></script>
    <script language="javascript" src="<?php echo $root_path; ?>js/dtpick_care2x.js"></script>

    <?php
    $sTemp = ob_get_contents();
    ob_end_clean();

    $smarty->append('JavaScript', $sTemp);
} // End of if !$released

if (($mode == "release") && ($released)) {

    echo '
	<html><head>
	<script  language="javascript">
	window.opener.location.replace(\'' . $backpath . '\');
	window.close();
	</script></head></html>';
    die();
    $smarty->assign('sPrompt', $LDJustReleased);
}

$smarty->assign('thisfile', $thisfile);
$smarty->assign('sBarcodeLabel', '<img src="' . $root_path . 'main/imgcreator/barcode_label_single_large.php?sid=' . $sid . '&lang=' . $lang . '&fen=' . $full_en . '&en=' . $pn . '" width=282 height=178>');
$smarty->assign('img_source', '<img ' . $img_source . ' align="top">');
$smarty->assign('LDLocation', "$LDClinic/$LDDept");
$smarty->assign('sLocation', $dept);
$smarty->assign('LDDate', $LDDate);

$temp_image = "<a href=\"javascript:getARV('" . $patient['pid'] . "','" . $patient['encounter_nr'] . "')\"><img " . createComIcon($root_path, 'ball_gray.png', '0', '', TRUE) . " alt=\"inARV\"></a>";
$smarty->assign('sARVIcon', 'TEST');
if ($released) {
    $smarty->assign('released', TRUE);
    $smarty->assign('x_date', nl2br($x_date));
} else {
    $smarty->assign('sDateInput', '<input type="text" name="x_date" size=12 maxlength=10 value="' . formatdate2Local(date('Y-m-d'), $date_format) . '"  onBlur="IsValidDate(this,\'' . $date_format . '\')"  onKeyUp="setDate(this,\'' . $date_format . '\',\'' . $lang . '\')">');
    $smarty->assign('sDateMiniCalendar', "<a href=\"javascript:show_calendar('discform.x_date','$date_format')\"><img " . createComIcon($root_path, 'show-calendar.gif', '0', 'top') . "></a>");
}
$smarty->assign('LDClockTime', $LDClockTime);

if ($released)
    $smarty->assign('x_time', nl2br($x_time));
else
    $smarty->assign('sTimeInput', '<input type="text" name="x_time" size=12 maxlength=12 value="' . convertTimeToLocal(date('H:i:s')) . '" onKeyUp=setTime(this,\'' . $lang . '\')>');
$smarty->assign('LDReleaseType', $LDReleaseType);

$sTemp = '';
if ($released) {

    while ($dis_type = $discharge_types->FetchRow()) {
        if ($dis_type['nr'] == $relart) {
            //$sTemp = $sTemp.'&nbsp;';
            if (isset($$dis_type['LD_var']) && !empty($$dis_type['LD_var']))
                $sTemp = $sTemp . $$dis_type['LD_var'];
            else
                $sTemp = $sTemp . $dis_type['name'];
            break;
        }
    }
}else {
    $init = 1;
    while ($dis_type = $discharge_types->FetchRow()) {
        # We will display only discharge types 1 to 7
        if (stristr('4,5,6', $dis_type['nr']))
            continue;
        $sTemp = $sTemp . '<input type="radio" name="relart" value="' . $dis_type['nr'] . '"';
        if ($init) {
            $sTemp = $sTemp . ' checked';
            $init = 0;
        }
        $sTemp = $sTemp . '>';
        if (isset($$dis_type['LD_var']) && !empty($$dis_type['LD_var']))
            $sTemp = $sTemp . $$dis_type['LD_var'];
        else
            $sTemp = $sTemp . $dis_type['name'];
        $sTemp = $sTemp . '<br>';
    }
}

$patient_nr = $enc_obj->PID();
$enc_obj->LastName();

global $db;

require_once($root_path . 'include/care_api_classes/class_tz_insurance.php');
$coreObj = new core;
$coreObj2 = new core;
$coreObj3 = new core;
$coreObj4 = new core;
$coreObj5 = new core;
$coreObj6 = new core;
$coreObj7 = new core;
$coreObj8 = new core;
$sqlPurchaseClass = "SELECT purchasing_class FROM care_tz_drugsandservices WHERE purchasing_class != 'service' group by purchasing_class";
$coreObj3->result = $db->Execute($sqlPurchaseClass);
$tabAll = '<table cellpadding=6>';


$encounterNr = $pn;
while ($encounterNr != null) {
    //block "location"
    $tab_temp0 = '';
    $sql4 = "select * from care_encounter_location where encounter_nr =" . $encounterNr;

    $coreObj->result = $db->Execute($sql4);
    foreach ($coreObj->result as $wert) {
        //echo $wert['name'].'<br>';

        $sqlTemp = "select * from care_encounter where encounter_nr=" . $encounterNr;
        $ergTemp = $db->Execute($sqlTemp);
        $rowTemp = $ergTemp->FetchRow();

        if ($rowTemp['encounter_class_nr'] == 1) {
            //inpatient
            $table = 'care_ward';
            $column = 'name';
        } else {
            //outpatient
            $table = 'care_department';
            $column = 'name_formal';
        }

        $sql5 = "select * from " . $table . " where nr=" . $wert['location_nr'];

        $ergebnis = $db->Execute($sql5);
        $row2 = $ergebnis->FetchRow();


        if ($wert['date_to'] == "0000-00-00") {
            $date_to = '---';
        } else
            $date_to = $wert['date_to'];

        $type = $wert['type_nr'];

        $currWard = $wert['current_ward'];
        $encDate = $wert['encounter_date'];


        if ($rowTemp['encounter_class_nr'] == 1) {
            //inpatient
            if ($type == 1)
                $location = "Waiting Area";
            else
                $location = $row2[$column];

            if (($type == 1) || ($type == 2))
                $tab_temp0 .="<tr bgcolor=lightgreen><td>" . $wert['date_from'] . "</td><td>" . $wert['time_from'] . "</td><td>" . $date_to . "</td><td>" . $wert['time_to'] . "</td><td>" . $location . "</td></tr>";
        }
        else {
            //outpatient
            $location = $row2[$column];
            $tab_temp0 .="<tr bgcolor=lightgreen><td>" . $wert['date_from'] . "</td><td>" . $wert['time_from'] . "</td><td>" . $date_to . "</td><td>" . $wert['time_to'] . "</td><td>" . $location . "</td></tr>";
        }
    }

    if ($tab_temp0 != '') {

        $tabAll .= "<tr><td>&nbsp;</td></tr><tr><th>location</th></tr><tr><th align=left>date from</th><th align=left>time from</th><th align=left>date to</th><th align=left>time to</th><th align=left>location</th></tr>";
        $tabAll .= $tab_temp0;
        $tabAll .= "</table><br/><table cellpadding=6>";
    }// end of block "location"
    //drugs and services
    $tab_temp1 = '';
    $sql4 = "select distinct purchasing_class from care_tz_drugsandservices";
    $coreObj3->result = $db->Execute($sql4);
    foreach ($coreObj3->result as $wert) {
        $p_class = $wert['purchasing_class'];
        //purchasing class is drug_list
        if (mb_substr($p_class, 0, 9) == 'drug_list') {



            $sql = "SELECT * FROM care_encounter_prescription INNER JOIN care_tz_drugsandservices ON care_tz_drugsandservices.item_id=care_encounter_prescription.article_item_number INNER JOIN care_encounter ON care_encounter.encounter_nr=care_encounter_prescription.encounter_nr where care_encounter.pid='" . $patient_nr . "' and care_encounter_prescription.status!='deleted' and purchasing_class='" . $p_class . "'";

            //sql-query for every purchasing class
            $coreObj->result = $db->Execute($sql);
            foreach ($coreObj->result as $wertInner) {

                $tab_temp1 .="<tr><td>" . $wertInner['prescribe_date'] . "</td><td>" . $wertInner['article'] . "</td><td>" . $wertInner['dosage'] . "</td><td>" . $wertInner['times_per_day'] . "</td><td>" . $wertInner['days'] . "</td><td>" . $wertInner['total_dosage'] . "</td><td>" . $wertInner['prescriber'] . "</td><td>" . $wertInner['issuer'] . "</td></tr>";
            }//end of for each wertinner
            //output only if there is any entry
            if ($tab_temp1 != '') {
                $tab_prescr1 = "<tr><td>&nbsp;</td></tr><tr><th>" . $p_class . "</th></tr><tr><th align=left>Prescription Date</th><th align=left>article</th><th align=left>dosage</th><th align=left>times per day</th><th align=left>days</th><th align=left>total dose</th><th align=left>prescriber</th><th align=left>Issuer</th></tr>";
                $tab_prescr1 .= $tab_temp1;
            } else {
                $tab_prescr1 = '';
            }
        }//end of drug_list
    }//end of foreach wert

    $tabAll .= $tab_prescr1;
    $tabAll .="</table><br/><table cellpadding=6>";

    //diagnosises
    $tab_temp2 = '';
    $sql2 = "select * from care_tz_diagnosis where PID =" . $patient_nr;
    $coreObj->result = $db->Execute($sql2);
    foreach ($coreObj->result as $wert) {
        //echo $wert['ICD_10_code'].' '.$wert['ICD_10_description'].' '.date("d.m.Y H:i",$wert['timestamp']).'<br>';
        $tab_temp2 .="<tr><td>" . date("d.m.Y H:i", $wert['timestamp']) . "</td><td>" . $wert['ICD_10_description'] . "</td><td>" . $wert['ICD_10_code'] . "</td><td>" . $wert['doctor_name'] . "</td></tr>";
    }

    if ($tab_temp2 != '') {
        $tab_diagnosis = "<tr><td>&nbsp;</td></tr><tr><th>diagnosises</th></tr><tr><th align=left>date and time</th><th align=left>ICD 10 description</th><th align=left>ICD 10 code</th><th align=left>Entered By</th></tr>";
        $tab_diagnosis .= $tab_temp2;
    } else
        $tab_diagnosis = '';

    $tabAll .= $tab_diagnosis;
    $tabAll .= "</table><br/><table cellpadding=6>";





    //test findings chemlab
    $tab_temp3 = '';
    $sql3 = "select * from care_test_findings_chemlab INNER JOIN care_encounter ON care_encounter.encounter_nr=care_test_findings_chemlab.encounter_nr  where care_encounter.pid =" . $patient_nr;
    //echo $sql3;
    $coreObj->result = $db->Execute($sql3);
    foreach ($coreObj->result as $wert) {

        $batchNr = $wert['batch_nr'];

        $sqlBatch = "select * from care_test_findings_chemlabor_sub where batch_nr=$batchNr";
        //echo $sqlBatch; 
        $coreObj2->result = $db->Execute($sqlBatch);

        foreach ($coreObj2->result as $param) {
            $tab_temp3 .="<tr><td>" . $wert['test_date'] . "</td><td>" . $wert['test_time'] . "</td><td>" . $param['paramater_name'] . "</td><td>" . $param['parameter_value'] . "</td><td>" . $param['create_id'] . "</td></tr>";
        }
    }

    if ($tab_temp3 != '') {
        $tab_findings_chemlab = "<tr><td>&nbsp;</td></tr><tr><th>laboratory</th></tr><tr><th align=left>date</th><th align=left>time</th><th align=left>parameter</th><th align=left>value</th><th align=left>Enter By</th></tr>";
        $tab_findings_chemlab .= $tab_temp3;
    } else
        $tab_findings_chemlab = '';

    $tabAll .= $tab_findings_chemlab;
    $tabAll .= "</table><br/><table cellpadding=6>";

    //radilogy
    $tab_temp6 = '';
    $sql6 = "SELECT rr.test_request,price.item_description,rf.findings, rf.diagnosis,rf.create_id,rf.findings_date FROM care_test_request_radio AS rr INNER JOIN care_test_findings_radio AS rf ON rr.batch_nr=rf.batch_nr INNER JOIN care_encounter AS ce ON ce.encounter_nr=rf.encounter_nr INNER JOIN care_tz_drugsandservices AS price ON price.item_id=rr.test_request WHERE ce.pid=" . $patient_nr;

    $coreObj4->result = $db->Execute($sql6);
    foreach ($coreObj4->result as $wert) {
        //echo $wert['ICD_10_code'].' '.$wert['ICD_10_description'].' '.date("d.m.Y H:i",$wert['timestamp']).'<br>';
        $tab_temp6 .="<tr><td>" . $wert['findings_date'] . "</td><td>" . $wert['item_description'] . "</td><td>" . $wert['findings'] . "</td><td>" . $wert['diagnosis'] . "</td><td>" . $wert['create_id'] . "</td></tr>";
    }

    if ($tab_temp6 != '') {
        $tab_radio = "<tr><td>&nbsp;</td></tr><tr><th>Radiology</th></tr><tr><th align=left>date</th><th align=left>description</th><th align=left>findings</th><th align=left>diagnosis</th><th align=left>Entered By</th></tr>";
        $tab_radio .= $tab_temp6;
    } else
        $tab_radio = '';

    $tabAll .= $tab_radio;
    $tabAll .= "</table><br/><table cellpadding=6>";

    //procedures
    $tab_temp7 = '';
    $sql7 = "SELECT cep.prescribe_date,cep.article,cep.prescriber FROM care_encounter_prescription AS cep INNER JOIN care_tz_drugsandservices AS price ON cep.article_item_number=price.item_id INNER JOIN care_encounter AS ce ON ce.encounter_nr=cep.encounter_nr  WHERE price.purchasing_class IN('surgical_op','minor_proc_op','dental','eye-service') AND ce.pid=" . $patient_nr;

    $coreObj5->result = $db->Execute($sql7);
    foreach ($coreObj5->result as $wert) {
        //echo $wert['ICD_10_code'].' '.$wert['ICD_10_description'].' '.date("d.m.Y H:i",$wert['timestamp']).'<br>';
        $tab_temp7 .="<tr><td>" . $wert['prescribe_date'] . "</td><td>" . $wert['article'] . "</td><td>" . $wert['prescriber'] . "</td></tr>";
    }

    if ($tab_temp7 != '') {
        $tab_proc = "<tr><td>&nbsp;</td></tr><tr><th>Procedures</th></tr><tr><th align=left>date</th><th align=left>description</th><th align=left>Entered By</th></tr>";
        $tab_proc .= $tab_temp7;
    } else
        $tab_proc = '';

    $tabAll .= $tab_proc;
    $tabAll .= "</table><br/><table cellpadding=6>";
    //end of procedure
    //patient notes
    $tab_temp8 = '';
    $sql8 = " SELECT cen.date,cen.notes,cen.short_notes,cen.create_id,ctn.name FROM care_encounter_notes AS cen INNER JOIN care_type_notes AS ctn ON cen.type_nr=ctn.nr INNER JOIN care_encounter AS ce ON ce.encounter_nr=cen.encounter_nr WHERE  ce.pid=" . $patient_nr;

    $coreObj6->result = $db->Execute($sql8);
    foreach ($coreObj6->result as $wert) {
        //echo $wert['ICD_10_code'].' '.$wert['ICD_10_description'].' '.date("d.m.Y H:i",$wert['timestamp']).'<br>';
        $tab_temp8 .="<tr bgcolor=orange><td >" . $wert['date'] . "</td><td>" . $wert['name'] . "</td><td></td><td>" . $wert['create_id'] . "</td><</tr>";
        $tab_temp8 .="<tr bgcolor=lightgreen><td>&nbsp;</td><td>" . $wert['short_notes'] . "</td></tr>";
        $tab_temp8 .="<tr bgcolor=lightgreen><td>&nbsp;</td><td>" . $wert['notes'] . "</td>/tr>";
    }

    if ($tab_temp8 != '') {
        $tab_notes = "<tr><td>&nbsp;</td></tr><tr><th><strong>HISTORY</strong></th></tr><tr><th align=left>date</th><th>&nbsp;&nbsp;</th><th align=left>&nbsp;&nbsp;</th><th align=left>Entered By</th></tr>";
        $tab_notes .= $tab_temp8;
    } else
        $tab_notes = '';

    $tabAll .= $tab_notes;
    $tabAll .= "</table><br/><table cellpadding=6>";
    //end of patient notes
    //start measurement
//$lang_tables[]='obstetrics.php';

    $tab_temp9 = '';
    $sql9 = "SELECT m.nr,m.value,m.msr_date,m.msr_time,m.unit_nr,m.encounter_nr,m.msr_type_nr,m.create_time, m.notes
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
            "m.msr_type_nr=13)
		ORDER BY m.msr_date DESC";

    //$sql10 ="SELECT cem.msr_date,cem.msr_time,cem.measured_by FROM care_encounter_measurement cem INNER JOIN care_type_measurement ctm ON cem.msr_type_nr=ctm.nr INNER JOIN care_unit_measurement cum ON cum.nr=cem.unit_nr INNER JOIN care_encounter ce ON ce.encounter_nr=cem.encounter_nr WHERE ce.pid=".$patient_nr." GROUP BY msr_time";

    if ($result = $db->Execute($sql9)) {
        if ($rows = $result->RecordCount()) {
            while ($msr_row = $result->FetchRow()) {
                # group the elements
                $msr_comp[$msr_row['create_time']]['encounter_nr'] = $msr_row['encounter_nr'];
                $msr_comp[$msr_row['create_time']]['msr_date'] = $msr_row['msr_date'];
                $msr_comp[$msr_row['create_time']]['msr_time'] = $msr_row['msr_time'];
                $msr_comp[$msr_row['create_time']][$msr_row['msr_type_nr']] = $msr_row;
            }
        }
    }

    while (list($x, $row) = each($msr_comp)) {
        if ($toggle)
            $bgc = '#f3f3f3';
        else
            $bgc = '#FFFFCC';
        $toggle = !$toggle;

        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    <td width=17% align=left valign=top>" . $LDDate . "</td>
    <td align=left valign=top>" . $LDType . "</td>
    <td align=left valign=top>" . $LDUnit . ' ' . $LDValue . "</td>
    <td align=left valign=top>" . $LDNotes . "</td>
  </tr>";

        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    <td width=17% rowspan=10 align=left valign=top bgcolor=" . $bgc . ">" . $row['msr_date'] . "</td>
      
    <td width=48% align=left valign=top bgcolor=" . $bgc . ">&nbsp</td>
  </tr>";

        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    
    
    <td align=left valign=top bgcolor=" . $bgc . ">&nbsp</td>
  </tr>";

        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    <td width=19% align=left valign=top>" . $LDTime . "</td>
    <td width=16% align=left valign=top bgcolor=" . $bgc . ">" . strtr($row['msr_time'], '.', ':') . "</td>
    <td width=48% align=left valign=top bgcolor=" . $bgc . ">&nbsp</td>
  </tr>";

        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    <td align=left valign=top>" . $LDWeight . "</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[6]['value'] . ' ' . $unit_ids[$row[6]['unit_nr']] . "</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[6]['notes'] . "</td>
  </tr>";

        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    <td align=left valign=top>" . $LDHeight . "</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[7]['value'] . ' ' . $unit_ids[$row[7]['unit_nr']] . "</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[7]['notes'] . "</td>
  </tr>";

        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    <td align=left valign=top>Head Circumference</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[9]['value'] . ' ' . $unit_ids[$row[9]['unit_nr']] . "</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[9]['notes'] . "</td>
  </tr>";

        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    <td align=left valign=top>Pulse</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[10]['value'] . ' ' . $unit_ids[$row[10]['unit_nr']] . "</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[10]['notes'] . "</td>
  </tr>";

        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    <td align=left valign=top>Respiratory</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[11]['value'] . ' ' . $unit_ids[$row[11]['unit_nr']] . "</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[11]['notes'] . "</td>
  </tr>";

        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    <td align=left valign=top>Blood Pressure</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[12]['value'] . ' ' . $unit_ids[$row[12]['unit_nr']] . "</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[12]['notes'] . "</td>
     </tr>";
        $tab_temp9.="<tr bgcolor=" . $bgc . ">
    <td align=left valign=top>Temperature</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[13]['value'] . ' ' . $unit_ids[$row[13]['unit_nr']] . "</td>
    <td align=left valign=top bgcolor=" . $bgc . ">" . $row[13]['notes'] . "</td>
  </tr>";
    }
    $tabAll .=$tab_temp9;
    //end measurement
    //block: find previous encounter_nr
    $sqlEncounter = "SELECT encounter_nr_prev FROM care_encounter where encounter_nr=$encounterNr";
    $result = $db->Execute($sqlEncounter);

    foreach ($result as $wert) {
        $encounter_nr_prev = $wert['encounter_nr_prev'];
        //echo 'encounter nr prev: '.$encounter_nr_prev;
    }


    if ($encounter_nr_prev != 0)
        $encounterNr = $wert['encounter_nr_prev'];
    else
        $encounterNr = null;
}//Ende der encounter-Schleife

$tabAll .="</table>";

$smarty->assign('list', $tabAll);
//start measurement
//}
// $smarty->assign('list2', $msr_value);
//end test
//measurement end


/* important tables:
 * care_class_encounter		 : division inpatient/outpatient
 * care_department     		 : all outpatient departments
 * care_ward            	 : all inpatient wards
 * care_encounter_location 	 : history of patient by encounter_nr
 * care_type_discharge       : type of discharge/transfer
 *
 * care_test_findings_chemlab
 * care_test_findings_chemlabor_sub
 */


$smarty->assign('LDNurse', $LDNurse);

$smarty->assign('encoder', $encoder);

if (!(($mode == 'release') && ($released))) {

    $smarty->assign('bShowValidator', TRUE);
    $smarty->assign('pbSubmit', '<input type="submit" style="height:35;width:100" value="' . $LDRelease . '" >');
    $smarty->assign('sValidatorCheckBox', '<input type="checkbox" name="sure" value="1">');
    $smarty->assign('LDYesSure', $LDYesSure);
}

$sTemp = '<input type="hidden" name="mode" value="release">
						';

if (($released) || ($lock))
    $sTemp = $sTemp . '<input type="hidden" name="lock" value="1">';

$sTemp = $sTemp . '<input type="hidden" name="sid" value="' . $sid . '">
		<input type="hidden" name="lang" value="' . $lang . '">
		<input type="hidden" name="station" value="' . $station . '">
		<input type="hidden" name="ward_nr" value="' . $ward_nr . '">
		<input type="hidden" name="dept" value="' . $dept . '">
		<input type="hidden" name="dept_nr" value="' . $dept_nr . '">
		<input type="hidden" name="pday" value="' . $pday . '">
		<input type="hidden" name="pmonth" value="' . $pmonth . '">
		<input type="hidden" name="pyear" value="' . $pyear . '">
		<input type="hidden" name="rm" value="' . $rm . '">
		<input type="hidden" name="bd" value="' . $bd . '">
		<input type="hidden" name="pn" value="' . $pn . '">
		<input type="hidden" name="backpath" value="' . urlencode($backpath) . '">
		<input type="hidden" name="s_date" value="' . "$pyear-$pmonth-$pday" . '">';

$smarty->assign('sHiddenInputs', $sTemp);


if (($mode == 'release') && ($released))
    $sBreakButton = '<img ' . createLDImgSrc($root_path, 'close2.gif', '0') . '>';
else
    $sBreakButton = '<img ' . createLDImgSrc($root_path, 'cancel.gif', '0') . ' border="0">';

$smarty->assign('pbCancel', '<a href="' . $breakfile . '">' . $sBreakButton . '</a>');

$smarty->assign('sMainBlockIncludeFile', 'nursing/discharge_patient_info.tpl');

/**
 * show Template
 */
$smarty->display('common/mainframe.tpl');
// $smarty->display('debug.tpl');
?>
