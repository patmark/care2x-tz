<?php
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
$lang_tables = array('departments.php');
define('LANG_FILE', 'konsil.php');
$local_user = 'ck_lab_user';

require_once($root_path . 'include/inc_front_chain_lang.php');
require_once($root_path . 'global_conf/inc_global_address.php');
//require_once($root_path . 'include/inc_diagnostics_report_fx.php');

if (!isset($GLOBAL_CONFIG)) {
    $GLOBAL_CONFIG = array();
}
include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
$glob = & new GlobalConfig($GLOBAL_CONFIG);
# Get all config items starting with "main_"
$glob->getConfig('main_%');

$addr[] = array($GLOBAL_CONFIG['main_info_address'],
    "$LDPhone:\n$LDFax:\n$LDEmail:",
    $GLOBAL_CONFIG['main_info_phone'] . "\n" . $GLOBAL_CONFIG['main_info_fax'] . "\n" . $GLOBAL_CONFIG['main_info_email'] . "\n"
);

$main_address = $GLOBAL_CONFIG['main_info_address'];
$addr_line = explode(",", $main_address);

$user_origin = $_REQUEST['user_origin'];

$subtarget . '&user_origin=' . $user_origin;
$thisfile = 'list_test_findings_' . $subtarget . '.php';

$debug = false;

if ($user_origin == 'lab') {
    $local_user = 'ck_lab_user';
    $breakfile = $root_path . 'modules/radiology/radiolog.php' . URL_APPEND;
    $returnfile = 'labor_test_request_admin_' . $subtarget . '.php' . URL_APPEND . '&target=' . $target . '&subtarget=' .
            $subtarget . '&user_origin=' . $user_origin;

    if ($debug)
        echo "User Origin is $user_origin and Breakfile is " . $breakfile . "<br>";
}else {

    $local_user = 'ck_pflege_user';

    if ($user_origin == 'bill')
        $breakfile = $root_path . "modules/billing_tz/billing_tz_quotation.php";

    else

    if ($user_origin == 'rad') {

        $breakfile = $root_path . "modules/radiology/radio_data_patient_such.php";
        $returnfile = $root_path . "modules/radiology/radio_data_patient_such.php";
    } else {

        $breakfile = $root_path . "modules/nursing/nursing-station-patientdaten.php" . URL_APPEND . "&edit=$edit&station=$station&pn=$pn";

        $returnfile = $root_path . "modules/nursing/nursing-station-patientdaten.php" . URL_APPEND . "&edit=$edit&station=$station&pn=$pn";

        if ($debug)
            echo "User Origin is $user_origin and Breakfile is " . $breakfile . "<br>";
    }
}

$bgc1 = '#ffffff';

$edit = 1; /* Assume to edit first */

$formtitle = $LDRadiologyDiagnostics . "S";
$dept_nr = 19; // 19 = department nr. of radiology
$db_request_table = $subtarget;

//$db->debug=1;

require_once($root_path . 'include/care_api_classes/class_encounter.php');
$enc_obj = new Encounter;

/* Here begins the real work */

require_once($root_path . 'include/inc_date_format_functions.php');

//$pid = '';
$result = '';
/* Check for the patient number = $pn. If available get the patients data, otherwise set edit to 0 */
if (isset($pn) && $pn) {

    if ($enc_obj->loadEncounterData($pn)) {

//        include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
//        $GLOBAL_CONFIG = array();
        $glob_obj = new GlobalConfig($GLOBAL_CONFIG);
        $glob_obj->getConfig('patient_%');
        switch ($enc_obj->EncounterClass()) {
            case '1': $full_en = ($pn + $GLOBAL_CONFIG['patient_inpatient_nr_adder']);
                break;
            case '2': $full_en = ($pn + $GLOBAL_CONFIG['patient_outpatient_nr_adder']);
                break;
            default: $full_en = ($pn + $GLOBAL_CONFIG['patient_inpatient_nr_adder']);
        }

        $result = $enc_obj->encounter;
    } else {
        $edit = 0;
        $mode = '';
        $pn = '';
    }
}

//print_r($result);
$pid = $result['pid'];

//If return all requests is set, get all encounters for pid
if (isset($showprevious)) {
    $sql = "SELECT * FROM care_test_request_" . $db_request_table . " ctr, care_tz_drugsandservices cds "
            . " WHERE ctr.test_request=cds.item_id AND ctr.encounter_nr IN(SELECT encounter_nr FROM care_encounter"
            . " WHERE pid=$pid) ORDER BY batch_nr DESC";
} else {
    $sql = "SELECT * FROM care_test_request_" . $db_request_table . " ctr, care_tz_drugsandservices cds "
            . " WHERE ctr.test_request=cds.item_id AND ctr.encounter_nr='$pn' ORDER BY batch_nr DESC";
}

if ($radtests = $db->Execute($sql)) {
//Iterate through the tests
    $data = "";
    $i = 1;     //Initialize counter
    while ($stored_tests = $radtests->FetchRow()) {
        $batch_nr = $stored_tests['batch_nr'];
        //Check if there are results for this test
        $sql = "SELECT * FROM care_test_findings_radio "
                . " WHERE batch_nr='" . $batch_nr . "'";

        $data .= "<tr>";
        $data .= "<td align=center>$i</td>";
        $data .= "<td align=center>" . $stored_tests['send_date'] . "</td>";
        $data .= "<td>" . $stored_tests['item_full_description'] . "</td>";
        $data .= "<td align=center>" . $stored_tests['results_date'] . "</td>";

        if ($res = $db->Execute($sql)) {
            if ($res->RecordCount() > 0) {//If findings are available add edit option/set edit to 1
                $edit = 1;
                $data .= '<td align=center>'
                        . '<input style="width:150px; overflow:hidden; border:1px solid maroon; margin:0px 6px 7px 0px;" type="button" ' .
                        'onClick="javascript:window.location.href=\'' . $root_path . 'modules/radiology/labor_test_findings_radio.php?sid=' . $sid . '&lang=en&edit=' . $edit .
                        '&mode=edit&target=admin&subtarget=radio&batch_nr=' . $batch_nr . '&pn=' . $pn . '&user_origin=' . $user_origin . '&entry_date=0000-00-00\'"' .
                        ' value="View/Edit Findings">
                </td>';
            } else {
                //Only add findings option
                $data .= "<td align=center>"
                        . '<input style="width:150px; overflow:hidden; border:1px solid maroon; margin:0px 6px 7px 0px;" type="button" ' .
                        'onClick="javascript:window.location.href=\'' . $root_path . 'modules/radiology/labor_test_findings_radio.php?sid=' . $sid . '&lang=en&edit=' . $edit .
                        '&mode=edit&target=admin&subtarget=radio&batch_nr=' . $batch_nr . '&pn=' . $pn . '&user_origin=' . $user_origin . '&entry_date=0000-00-00\'"' .
                        ' value="Add Findings">'
                        . '</td>';
            }
        }

        $data .= "<td align=center> </td>";
        $data .= "</tr>";
        $i++;
    }
}

//$stored_tests = $radtests->FetchRow();
# Start Smarty templating here
/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme

require_once($root_path . 'gui/smarty_template/smarty_care.class.php');
$smarty = new smarty_care('nursing');

# Title in toolbar
$smarty->assign('sToolbarTitle', $formtitle . " (" . $pn . ")");

# hide back button
$smarty->assign('pbBack', $returnfile);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('pending_radio_findings.php')");

# href for close button
$smarty->assign('breakfile', $breakfile);

# Window bar title
$smarty->assign('sWindowTitle', $formtitle . " (" . $pn . ")");

$smarty->assign('sOnLoadJs', 'onLoad = "if (window.focus) window.focus();"');

# Collect extra javascript code

ob_start();
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<?php html_rtl($lang); ?><HEAD>
    <?php echo setCharSet(); ?>
    <TITLE><?php echo "$LDRadioDiagnostics $station" ?></TITLE>
    <?php
    require($root_path . 'include/inc_js_gethelp.php');
    require($root_path . 'include/inc_css_a_hilitebu.php');
    ?>
    <style type="text/css">
        div.fva2_ml10 {font-family: verdana,arial; font-size: 12px; margin-left: 10px;}
        div.fa2_ml10 {font-family: arial; font-size: 12px; margin-left: 10px;}
        div.fva2_ml3 {font-family: verdana; font-size: 12px; margin-left: 3px; }
        div.fa2_ml3 {font-family: arial; font-size: 12px; margin-left: 3px; }
        .fva2_ml10 {font-family: verdana,arial; font-size: 12px; margin-left: 10px; color:#000099;}
        .fva2b_ml10 {font-family: verdana,arial; font-size: 12px; margin-left: 10px; color:#000000;}
        .fva0_ml10 {font-family: verdana,arial; font-size: 10px; margin-left: 10px; color:#000099;}
        .fvag_ml10 {font-family: verdana,arial; font-size: 10px; margin-left: 10px; color:#969696;}
    </style>
</HEAD>
<body style="margin:auto">
    <ul>
        <form>
            <table border=1 cellpadding=0 cellspacing=0 bgcolor="#ffffff">
                <tr>
                    <td colspan="5">

                        <table cellpadding="0" cellspacing=1 border="1" width=700>

                            <tr bgcolor="<?php echo $bgc1 ?>">
                                <td  valign="top" align="left"><font color="#000099" size=2 face="verdana,arial">	

                                    <?php
                                    echo $addr_line[0] . '<br>';
                                    echo $addr_line[1];
                                    echo $addr_line[2];
                                    ?>

                                </td>

                                <td  valign="top" align="right">
                                    <div class="fva0_ml10"><font color="#000099" size=2 face="verdana,arial">	
                                        <?php
                                        echo $LDCaseNr . '<br>' . $LDPatNr . '<br>' . $LDFamilyName . '<br>' . $LDNames . '<br>' . $LDSex . '<br>' . $LDBDay;
                                        ?>
                                    </div> 		 </td>

                                <td  valign="top">
                                    <div class="fva0_ml10"><font color="#000000" size=2 face="verdana,arial">	
                                        <?php
                                        echo $full_en . '<br>' . $result['selian_pid'] . '<br>' . $result['name_last'] . '<br>' . ucwords(ucwords($result['name_first'])) . '<br>' . strtoupper($result['sex']) . '<br>' . formatDate2Local($result['date_birth'], $date_format);
                                        ?>
                                    </div> 		 </td>
                            </tr>
                        </table>
                    </td>
                </TR>
                <tr style="background-color: #999999; font-size: 14px;"><td align=center>S/No</td><td align=center>Request Date</td><td align=center>Test Description</td><td align=center>Results Date</td><td align=center>Options</td></tr>
                <?php
                echo $data;
                ?>
                <tr><TD colspan="5"><BR></TD></tr>
                <tr><TD colspan="5" align="center"><a href="<?php echo $thisfile . URL_APPEND; ?>sid=<?php echo $sid; ?>&showprevious=true&pid=<?php echo $pid; ?>&encounter_nr=<?php echo $pn; ?>&pn=<?php echo $pn; ?>&batch_nr=<?php echo $batch_nr; ?>&subtarget=radio&user_origin=rad&edit=1"><b><font color="#990000">Click Here to Show All Tests</font></b></a></TD></tr>
                <tr><TD colspan="5"><BR></TD></tr>
                <tr style="background-color: #999999; font-size: 14px;"><td colspan="5" align=center>DICOM IMAGES</td></tr>
                <tr><TD colspan="5" align="center">
                        <a href="view_person_search.php<?php echo URL_APPEND; ?>&ntid=false&mode=search&searchkey=<?php echo $pid; ?>"><b><font color="#990000">Click Here to View DICOM Images</font></b></a><br>
                    </TD>
                </tr>
                <tr><TD colspan="5"><BR></TD></tr>
                <tr><TD colspan="5" align="center">
                        <a href="upload.php<?php echo URL_APPEND; ?>&ntid=false&mode=new&pid=<?php echo $pid; ?>&encounter_nr=<?php echo $pn; ?>"><b><font color="#990000">Click Here to Upload DICOM Images</font></b></a><br>
                    </TD>
                </tr>
            </table>
        </form>
    </ul>
</body>
<?php
$sTemp = ob_get_contents();
ob_end_clean();


# Assign to page template object
$smarty->assign('sMainFrameBlockData', $sTemp);

/**
 * show Template
 */
$smarty->display('common/mainframe.tpl');
