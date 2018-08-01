<?php
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');


/**
 * CARE2X Integrated Hospital Information System version deployment 1.1 (mysql) 2004-01-11
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * , elpidio@care2x.org
 *
 * See the file "copy_notice.txt" for the licence notice
 */
define('SHOW_DOC_2', 1);  # Define to 1 to  show the 2nd doctor-on-duty
define('DOC_CHANGE_TIME', '7.30'); # Define the time when the doc-on-duty will change in 24 hours H.M format (eg. 3 PM = 15.00, 12 PM = 0.00)

$lang_tables[] = 'ambulatory.php';
$lang_tables[] = 'prompt.php';
$lang_tables[] = 'departments.php';
define('LANG_FILE', 'nursing.php');
//define('NO_2LEVEL_CHK',1);
$local_user = 'ck_pflege_user';
require_once($root_path . 'include/inc_front_chain_lang.php');

/**
 * Set default values if not available from url
 */
if (!isset($dept_nr) || empty($dept_nr)) {
    $dept_nr = $_SESSION['sess_dept_nr'];
} # Default station must be set here !!
if (!isset($pday) || empty($pday))
    $pday = date('d');
if (!isset($pmonth) || empty($pmonth))
    $pmonth = date('m');
if (!isset($pyear) || empty($pyear))
    $pyear = date('Y');
$s_date = $pyear . '-' . $pmonth . '-' . $pday;

if ($s_date == date('Y-m-d'))
    $is_today = true;
else
    $is_today = false;

//$db->debug=1;

$tnow = date('H:i:s');

if (!isset($mode))
    $mode = '';

$breakfile = 'ambulatory.php' . URL_APPEND; # Set default breakfile
if ($backpath)
    $breakfile = urldecode($backpath) . URL_APPEND;
$thisfile = basename($_SERVER['PHP_SELF']);
if (isset($retpath)) {
    switch ($retpath) {
        case 'quick': $breakfile = 'nursing-schnellsicht.php' . URL_APPEND;
            break;
        case 'ward_mng': $breakfile = 'nursing-station-info.php' . URL_APPEND . '&ward_nr=' . $ward_nr . '&mode=show';
            break;
        case 'billing' : $breakfile = '../modules/billing_tz/billing_tz_pending.php' . URL_APPEND;
    }
}



# Mark where we are
$_SESSION['sess_user_origin'] = 'amb';

# Load date formatter
require_once($root_path . 'include/inc_date_format_functions.php');

require_once($root_path . 'include/care_api_classes/class_tz_arv_patient.php');

require_once($root_path . 'include/care_api_classes/class_tz_tb_patient.php');

//* Get the global config for billing item*/
include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
$glob_obj = new GlobalConfig($GLOBAL_CONFIG);

if (($mode == '') || ($mode == 'fresh')) {

    # Create encounter object
    include_once($root_path . 'include/care_api_classes/class_encounter.php');
    $enc_obj = new Encounter;

    # Create insurance object
    include_once($root_path . 'include/care_api_classes/class_tz_insurance.php');
    $ins_obj = New Insurance_tz;

    # Create multi functional object
    include_once($root_path . 'include/care_api_classes/class_multi.php');
    $multi_obj = New multi;

    # Get all outpatients for this dept
    if ($_GET['sort'] == '') {
        $sort = 'encounter_date';
    }
    $opat_obj = $enc_obj->OutPatientsBasic($sort, $dept_nr);
    #echo $enc_obj->getLastQuery();
    $rows = $enc_obj->LastRecordCount();

    # If dept name is empty, fetch by location nr
    if (!isset($dept) || empty($dept)) {
        # Create department object
        include_once($root_path . 'include/care_api_classes/class_department.php');
        $dept_obj = new Department;
        $deptLDvar = $dept_obj->LDvar($dept_nr);
        if (isset($$deptLDvar) && !empty($$deptLDvar))
            $dept = $$deptLDvar;
        else
            $dept = $dept_obj->FormalName($dept_nr);
    }

    # set to edit mode
    $edit = true;
    # Create the waiting outpatients� list

    $dnr = (isset($w_waitlist) && $w_waitlist) ? 0 : $dept_nr;
    //echo '<p>'.$enc_obj->getLastQuery();

    $waitlist = $enc_obj->createWaitingOutpatientList($dnr);
    $waitlist_count = $enc_obj->LastRecordCount();
    //echo $waitlist_count.'<p>'.$enc_obj->getLastQuery();
    # Get the doctor�s on duty information
    #### Start of routine to fetch doctors on duty
    $elem = 'duty_1_pnr';
    if (SHOW_DOC_2)
        $elem .= ',duty_2_pnr';

    # Create personnel object

    include_once($root_path . 'include/care_api_classes/class_personell.php');

    $pers_obj = new Personell;

    if ($result = $pers_obj->getDOCDutyplan($dept_nr, $pyear, $pmonth, $elem)) {
        $duty1 = &unserialize($result['duty_1_pnr']);
        if (SHOW_DOC_2)
            $duty2 = &unserialize($result['duty_2_pnr']);
        //echo $sql."<br>";
    }
    //echo $pers_obj->getLastQuery();
    # Adjust the day index. This is necessary since change of duty usually happens early morning  not midnight
    $offset_day = $pday - 1;
    # Consider the early morning hours to belong to the past day
    if (date('H.i') < DOC_CHANGE_TIME)
        $offset_day--;
    if ($pnr1 = $duty1['ha' . $offset_day]) {
        $person1 = $pers_obj->getPersonellInfo($pnr1);
    }
    if (SHOW_DOC_2 && ($pnr2 = $duty2['hr' . $offset_day])) {
        $person2 = $pers_obj->getPersonellInfo($pnr2);
    }
    #### End of routine to fetch doctors on duty
}


# load config options
include_once($root_path . 'include/care_api_classes/class_multi.php');
$cd_obj = new multi;
$vct = $cd_obj->__genNumbers();


# Start Smarty templating here
/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme

require_once($root_path . 'gui/smarty_template/smarty_care.class.php');
$smarty = new smarty_care('nursing');


# Reload the page after 60 seconds
$smarty->assign('sReloadPage', TRUE);
$smarty->assign('sReloadTarget', $REQUEST_URI . '&refreshed=1');
$smarty->assign('sReloadDelay', 300);

#print '<hr />requested: '.$REQUEST_URI.'<hr />';
# Title in toolbar
$smarty->assign('sToolbarTitle', $dept . " :: $LDOutpatientClinic (" . formatDate2Local($s_date, $date_format, '', '', $null = '') . ")");

# hide back button
$smarty->assign('pbBack', FALSE);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('outpatient_clinic.php','Outpatient Clinic')");

# href for close button
$smarty->assign('breakfile', $breakfile);

$smarty->assign('showDiagnosis', '<a href=amb_clinic_patients_pass.php' . URL_APPEND . '&dept=' . urlencode($dept) . '&dept_nr=' . $dept_nr . '&target=diagnosis>' . $LDShowDiagnosis . '</a>');

$smarty->assign('showPrescr', '<a href=amb_clinic_patients_pass.php' . URL_APPEND . '&dept=' . urlencode($dept) . '&dept_nr=' . $dept_nr . '&target=pharmacy>' . $LDShowPrescr . '</a>');

$smarty->assign('showLabs', '<a href=amb_clinic_patients_pass.php' . URL_APPEND . '&dept=' . urlencode($dept) . '&dept_nr=' . $dept_nr . '&target=laboratory>' . $LDShowLabs . '</a>');

$smarty->assign('showRadio', '<a href=amb_clinic_patients_pass.php' . URL_APPEND . '&dept=' . urlencode($dept) . '&dept_nr=' . $dept_nr . '&target=radiology>' . $LDShowRadio . '</a>');


# Window bar title
$smarty->assign('sWindowTitle', $dept . " :: $LDOutpatientClinic (" . formatDate2Local($s_date, $date_format, '', '', $null = '') . ")");

# Collect extra javascript code
# Initialize page�s control variables
if ($mode == 'paginate') {
    $searchkey = $_SESSION['sess_searchkey'];
} else {
    # Reset paginator variables
    $pgx = 0;
    $totalcount = 0;
    $odir = '';
    $oitem = '';
}
require_once($root_path . 'include/care_api_classes/class_paginator.php');
$pagen = new Paginator($pgx, $thisfile, $_SESSION['sess_searchkey'], $root_path);
$breakfile = 'amb_clinic_patients.php';
$newdata = 1;
$target = 'archiv';


ob_start();
?>

<script language="javascript">
<!--
    var urlholder;
    function getinfo(pn) {
    if (pn === 'nobill') {
    alert('Not billed yet!');
    } else {
<?php
/* if($edit) */ {
    echo '
        urlholder="' . $root_path . 'modules/nursing/nursing-station-patientdaten.php' . URL_REDIRECT_APPEND;
    echo '&pn=" + pn + "';
    echo "&pday=$pday&pmonth=$pmonth&pyear=$pyear&edit=$edit&station=$station";
    echo '";';
//    echo 'patientwin=window.open(urlholder,pn,"width=800,height=600,menubar=no,resizable=yes,scrollbars=yes");

    echo 'patientwin=window.open(urlholder,pn,"width=840,height=650,menubar=no,resizable=yes,scrollbars=yes");
        patientwin.moveTo(0,0);
        patientwin.resizeTo(screen.availWidth,screen.availHeight)';
}
/* else echo '
  window.location.href=\'nursing-station-pass.php'.URL_APPEND.'&rt=pflege&edit=1&station='.$station.'\''; */
?>
    }
    }
    /*
     function getARV(pid, encounter_nr) {
     urlholder = "<?php echo $root_path ?>modules/arv_2/arv_menu.php<?php echo URL_REDIRECT_APPEND; ?>&pid=" + pid + "&encounter_nr=" + encounter_nr;
     //patientwin=window.open(urlholder,"arv","menubar=no,resizable=yes,scrollbars=yes")
     window.location.href = urlholder;
     patientwin.resizeTo(screen.availWidth, screen.availHeight);
     patientwin.focus();
     }
     */

    function getARV(pid, encounter_nr) {
<?php
/* if($edit) */ {
    echo '
        urlholder="' . $root_path . 'modules/arv_2/arv_menu.php' . URL_REDIRECT_APPEND;
    echo '&pid=" + pid + "';
    echo '&encounter_nr=" + encounter_nr + "';
    echo '";';
//    echo '
//        patientwin=window.open(urlholder,encounter_nr,"width=700,height=600,menubar=no,resizable=yes,scrollbars=yes");
//
//        patientwin.moveTo(0,0)
//        patientwin.resizeTo(screen.availWidth,screen.availHeight)';
}
/* else echo '
  window.location.href=\'nursing-station-pass.php'.URL_APPEND.'&rt=pflege&edit=1&station='.$station.'\''; */
?>
    window.location.href = urlholder;
    }

    function getTB(pid, encounter_nr) {
<?php
// if($edit) {
echo '
        urlholder="' . $root_path . 'modules/tb/tb_clinic_pass.php' . URL_REDIRECT_APPEND;
echo '&target=menu&pid=" + pid + "';
echo '&encounter_nr=" + encounter_nr + "';
echo '";';
//    echo '
//        patientwin=window.open(urlholder,encounter_nr,"width=700,height=600,menubar=no,resizable=yes,scrollbars=yes");
//
//        patientwin.moveTo(0,0)
//        patientwin.resizeTo(screen.availWidth,screen.availHeight)';
//}
/* else echo '
  window.location.href=\'nursing-station-pass.php'.URL_APPEND.'&rt=pflege&edit=1&station='.$station.'\''; */
?>
    window.location.href = urlholder;
    }


    function getEyeclinic(pid, encounter_nr) {
    urlholder = "<?php echo $root_path ?>modules/eyeclinic/eye_menu.php<?php echo URL_REDIRECT_APPEND; ?>&pid=" + pid + "&encounter_nr=" + encounter_nr;
    //patientwin=window.open(urlholder,"arv","menubar=no,resizable=yes,scrollbars=yes")
    window.location.href = urlholder;
//        patientwin.resizeTo(screen.availWidth, screen.availHeight);
//        patientwin.focus();
    }


    function getrem(pn) {
    urlholder = "<?php echo $root_path ?>modules/nursing/nursing-station-remarks.php<?php echo URL_REDIRECT_APPEND; ?>&pn=" + pn + "<?php echo "&dept_nr=$dept_nr&pday=$pday&pmonth=$pmonth&pyear=$pyear"; ?>";
    patientwin = window.open(urlholder, pn, "width=700,height=500,menubar=no,resizable=yes,scrollbars=yes");
    }

    function release(nr)
    {
    urlholder = "amb_clinic_discharge.php<?php echo URL_REDIRECT_APPEND; ?>&pn=" + nr + "<?php echo "&pyear=" . $pyear . "&pmonth=" . $pmonth . "&pday=" . $pday . "&tb=" . str_replace("#", "", $cfg['top_bgcolor']) . "&tt=" . str_replace("#", "", $cfg['top_txtcolor']) . "&bb=" . str_replace("#", "", $cfg['body_bgcolor']) . "&d=" . $cfg['dhtml']; ?>&station=<?php echo $station; ?>&dept_nr=<?php echo $dept_nr; ?>";
        //indatawin=window.open(urlholder,"bedroom","width=700,height=450,menubar=no,resizable=yes,scrollbars=yes"
        window.location.href = urlholder;
        }

        function popinfo(l, d)
        {
        urlholder = "<?php echo $root_path ?>modules/doctors/doctors-dienstplan-popinfo.php<?php echo URL_REDIRECT_APPEND ?>&nr=" + l + "&dept_nr=" + d + "&user=<?php echo $aufnahme_user . '"' ?>;

                infowin = window.open(urlholder, "dienstinfo", "width=400,height=450,menubar=no,resizable=yes,scrollbars=yes");
        }
        function assignWaiting(pn, pw)
        {
        urlholder = "amb_clinic_assignwaiting.php<?php echo URL_REDIRECT_APPEND ?>&pn=" + pn + "&pdept=" + pw + "&dept_nr=<?php echo $dept_nr ?>&station=<?php echo $station ?>";
        asswin<?php echo $sid ?> = window.open(urlholder, "asswind<?php echo $sid ?>", "width=650,height=500,menubar=no,resizable=yes,scrollbars=yes");
        }
        function Transfer(pn, pw, patnr)
        {
        if (confirm("<?php echo $LDSureTransferPatient . "-" ?>")) {
        urlholder = "amb_clinic_transfer_select.php<?php echo URL_REDIRECT_APPEND ?>&pn=" + pn + "&pat_station=" + pw + "&dept_nr=<?php echo $dept_nr ?>&station=<?php echo $station ?>&patnr=" + patnr;
        transwin<?php echo $sid ?> = window.open(urlholder, "transwin<?php echo $sid ?>", "width=800,height=620,menubar=no,resizable=yes,scrollbars=yes");
        }
        }

<?php
require($root_path . 'include/inc_checkdate_lang.php');
?>

// -->
</script>

<script language="javascript" src="<?php echo $root_path; ?>js/setdatetime.js"></script>

<script language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>

<?php
$sTemp = ob_get_contents();

ob_end_clean();

$smarty->append('JavaScript', $sTemp);

# If ward exists, show the occupancy list

if ($rows) {

    $smarty->assign('bShowPatientsList', TRUE);

    if ($s_date < date('Y-m-d')) {
        $smarty->assign('sWarningPrompt', '<img ' . createComIcon($root_path, 'warn.gif', '0', 'absmiddle', TRUE) . '> <font color="#ff0000"><b>' . $LDAttention . '</font> ' . $LDOldList . '</b>');

        # Prevent adding new patients to the list  if list is old
        $edit = FALSE;
    }

    # Start here, create the occupancy list
    # Assign the column  names

    $smarty->assign('LDTime', $LDTime);
    $smarty->assign('LDRoom', $LDRoom);
    $smarty->assign('LDBed', $LDPatListElements[1]);
    $smarty->assign('LDFamilyName', '<a href="amb_clinic_patients.php?&dept_nr=' . $dept_nr . '&sort=name_last">' . $LDLastName . '</a>');
    $smarty->assign('LDName', '<a href="amb_clinic_patients.php?&dept_nr=' . $dept_nr . '&sort=name_first">' . $LDName . '</a>');

    $smarty->assign('LDBirthDate', '<a href="amb_clinic_patients.php?&dept_nr=' . $dept_nr . '&sort=date_birth">' . $LDBirthDate . '</a>');
    $smarty->assign('LDPatNr', '<a href="amb_clinic_patients.php?&dept_nr=' . $dept_nr . '&sort=pid">' . $LDPatFileNr . '</a>');
    $smarty->assign('LDAdmissionDate', '<a href="amb_clinic_patients.php?&dept_nr=' . $dept_nr . '&sort=encounter_date">' . $LDAdmissionDate . '</a>');

    $smarty->assign('LDInsuranceType', $LDPatListElements[6]);

    $smarty->assign('LDOptions', $LDPatListElements[7]);


    # Initialize help flags
    $toggle = 1;
    $room_info = array();

    $males = 0;
    $females = 0;

    # Initialize list rows container string
    $sListRows = '';

    # Loop trough patients

    while ($patient = $opat_obj->FetchRow()) {
        if ($patient['encounter_nr'] == $sEncNrBuffer) {
            continue;
        } else {
            $sEncNrBuffer = $patient['encounter_nr'];
        }

        #print_r($patient); print '<hr />';
        # Reset elements

        $smarty->assign('sMiniColorBars', '');
        $smarty->assign('sRoom', '');
        $smarty->assign('sBed', '');
        $smarty->assign('sBedIcon', '');
        $smarty->assign('cComma', '');
        $smarty->assign('sFamilyName', '');
        $smarty->assign('sName', '');
        $smarty->assign('sTitle', '');
        $smarty->assign('sBirthDate', '');
        $smarty->assign('sPatNr', '');
        $smarty->assign('sAdmitDataIcon', '');
        $smarty->assign('sChartFolderIcon', '');
        $smarty->assign('sNotesIcon', '');
        $smarty->assign('sTransferIcon', '');
        $smarty->assign('sDischargeIcon', '');
        $smarty->assign('vitalSigns', '');
        $smarty->assign('sFlagDiag', '');
        $smarty->assign('sFlagDiag2', '');
        $smarty->assign('sNoDiag', '');

        $sAstart = '';
        $sAend = '';
        $sFamNameBuffer = '';
        $sNameBuffer = '';


        # set row color/class

        if ($toggle) {
            $smarty->assign('bToggleRowClass', TRUE);
        } else {
            $smarty->assign('bToggleRowClass', FALSE);
        }

        $toggle = !$toggle;

//        echo $dept_nr.'<br>';
        # If appt time is past the now time, color font with red
        if ($patient['time'] < $tnow)
            $smarty->assign('sTimeFontClass' . 'class="cave_data"');
        elseif (($patient['time'] >= $tnow) && ($patient['time'] <= $tnow))
            $smarty->assign('sTimeFontClass' . 'class="go_data"');

        if ($patient['time'])
            $smarty->assign('sTime', convertTimeToLocal($patient['time'], $date_format));
//        print_r($patient).'<br><hr>';
        # If patient and edit show small color bars
        if ($edit) {
            //Check here that the patient has paid for consultation and shor patient bars else hide
//            if ($glob_obj->getConfigValue("restrict_unbilled_items") === "1" && $dept_nr != 55) { //For KB hosp
            if ($glob_obj->getConfigValue("restrict_unbilled_items") === "1") {
                if ($enc_obj->getEncouterBillNo($patient['encounter_nr']) > 0) {
                    $smarty->assign('sMiniColorBars', '<a href="javascript:getinfo(\'' . $patient['encounter_nr'] . '\')">
			 		<img src="' . $root_path . 'main/imgcreator/imgcreate_colorbar_small.php' . URL_APPEND . '&pn=' . $patient['encounter_nr'] . '" alt="' . $LDSetColorRider . '" align="absmiddle" border=0 width=80 height=18>
			 		</a>');
                } else {
                    $smarty->assign('sMiniColorBars', '<a href="javascript:getinfo(\'nobill\')">
			 		<img src="' . $root_path . 'main/imgcreator/imgcreate_colorbar_small.php' . URL_APPEND . '&pn=' . $patient['encounter_nr'] . '" alt="' . $LDSetColorRider . '" align="absmiddle" border=0 width=80 height=18>
			 		</a>');
                }
            } else {

                $smarty->assign('sMiniColorBars', '<a href="javascript:getinfo(\'' . $patient['encounter_nr'] . '\')">
			 		<img src="' . $root_path . 'main/imgcreator/imgcreate_colorbar_small.php' . URL_APPEND . '&pn=' . $patient['encounter_nr'] . '" alt="' . $LDSetColorRider . '" align="absmiddle" border=0 width=80 height=18>
			 		</a>');
            }
        }


        # Show images by sex

        $sBuffer = '<a href="javascript:popPic(\'' . $patient['pid'] . '\')" title="' . $LDShowPhoto . '">';
        switch (strtolower($patient['sex'])) {
            case 'f':
                $smarty->assign('sBedIcon', $sBuffer . '<img ' . createComIcon($root_path, 'spf.gif', '0', '', TRUE) . '></a>');
                $females++;
                break;
            case 'm':
                $smarty->assign('sBedIcon', $sBuffer . '<img ' . createComIcon($root_path, 'spm.gif', '0', '', TRUE) . '></a>');
                $males++;
                break;
            default:
                $smarty->assign('sBedIcon', $sBuffer . '<img ' . createComIcon($root_path, 'bn.gif', '0', '', TRUE) . '></a>');
        }

        # Show the patients name with link to open charts
        if ($edit) {

            $sAstart = '<a href="' . $root_path . 'modules/registration_admission/aufnahme_pass.php' . URL_APPEND . '&target=search&fwd_nr=' . $patient['encounter_nr'] . '" title="' . $LDClk2Show . '">';
        }

        $smarty->assign('sTitle', ucfirst($patient['title']));

        if (isset($sln) && $sln)
            $sFamNameBuffer = eregi_replace($sln, '<span style="background:yellow">' . ucfirst($sln) . '</span>', ucfirst($patient['name_last']));
        else
            $sFamNameBuffer = ucfirst($patient['name_last']);

        if ($bed['name_last'])
            $smarty->assign('cComma', ',');
        else
            $smarty->assign('cComma', '');

        if (isset($sfn) && $sfn)
            $sNameBuffer = eregi_replace($sfn, '<span style="background:yellow">' . ucwords($sln) . '</span>', ucwords($patient['name_first']));
        else
            $sNameBuffer = ucwords($patient['name_first']);

        $oNameBuffer = ucfirst($patient['name_2']);

        if ($edit)
            $sAend = '</a>';
        else
            $sAend = '';

        # Assign the family and first names together with the <a href></a> tags
        # omit <a href></a> tags
        $smarty->assign('sFamilyName', $sFamNameBuffer);
        $smarty->assign('sName', $sNameBuffer);

        # old code
        # $smarty->assign('sFamilyName',$sAstart.$sFamNameBuffer.$sAend);
        # $smarty->assign('sName',$sAstart.$sNameBuffer.$sAend);

        if ($patient['date_birth']) {

            if (isset($sg) && $sg)
                $smarty->assign('sBirthDate', eregi_replace($sg, "<font color=#ff0000><b>" . ucfirst($sg) . "</b></font>", formatDate2Local($patient['date_birth'], $date_format)));
            else
                $smarty->assign('sBirthDate', formatDate2Local($patient['date_birth'], $date_format));
        }

        $enc_obj->loadEncounterData($patient['encounter_nr']);
        $pid = $enc_obj->PID();

        if ($patient['selian_pid']) {

            if (isset($sg) && $sg)
                $smarty->assign('sPatNr', '=====' . eregi_replace($sg, "<font color=#ff0000><b>" . ucfirst($sg) . "</b></font>", $patient['selian_pid']));
            else
                $smarty->assign('sPatNr', $patient['selian_pid']);
        }


        $enc_obj->loadEncounterData($patient['encounter_nr']);
        $encounter_date = $enc_obj->EncounterDate();

        if ($patient['encounter_nr'])
            $smarty->assign('sAdmissionDate', $encounter_date);


        $sBuffer = '';
        $insurance_name = " ";
        #if($patient['insurance_class_nr']!=2) $sBuffer = $sBuffer.'<font color="#ff0000">';

        if ($patient['insurance_ID']) {

            if ($ins_obj->CheckCurrentContractValidity($patient['insurance_ID'])) {
                $insurance_name = $ins_obj->GetName_insurance_from_id($patient['insurance_ID']);
            }

            $smarty->assign('sInsuranceType', substr($insurance_name, 0, 15));
        } else {
            if ($patient['insurance_ID'] == 0) {
                $insurance_name = 'Cash-patient';
            }
            $smarty->assign('sInsuranceType', substr($insurance_name, 0, 15));
        }


        if ($edit) {

            /* MEROTECH:
              Commented out for selian town clinic by Alexander Irro
              $smarty->assign('sAdmitDataIcon','<a href="'.$root_path.'modules/registration_admission/aufnahme_pass.php'.URL_APPEND.'&target=search&fwd_nr='.$patient['encounter_nr'].'" title="'.$LDAdmissionData.' : '.$LDClk2Show.'"><img '.createComIcon($root_path,'pdata.gif','0','',TRUE).' alt="'.$LDAdmissionData.' : '.$LDClk2Show.'"></a>');
             */
            if ($dept_nr == 42) {
                $o_arv_patient = new ART_patient($patient['pid']);
                if ($o_arv_patient->is_arv_admitted($patient['pid'])) {
                    $temp_image = "<a href=\"javascript:getARV('" . $patient['pid'] . "','" . $patient['encounter_nr'] . "')\"><img " . createComIcon($root_path, 'ball_gray.png', '0', '', TRUE) . " alt=\"inARV\"></a>";
                } else {
                    $temp_image = "<a href=\"javascript:getARV('" . $patient['pid'] . "','" . $patient['encounter_nr'] . "')\"><img " . createComIcon($root_path, 'ball_red.png', '0', '', TRUE) . " alt=\"not_inARV\"></a>";
                }
            }

            if ($dept_nr == 47) {
                $o_tb_patient = new TB_patient($patient['pid']);
                if ($o_tb_patient->is_tb_admitted($patient['pid'])) {
                    $temp_image = "<a href=\"javascript:getTB('" . $patient['pid'] . "','" . $patient['encounter_nr'] . "')\"><img " . createComIcon($root_path, 'ball_gray.png', '0', '', TRUE) . " alt=\"in TB Care\" title=\"TB Module: Click\"></a>";
                } else {
                    $temp_image = "<a href=\"javascript:getTB('" . $patient['pid'] . "','" . $patient['encounter_nr'] . "')\"><img " . createComIcon($root_path, 'green_dot.gif', '0', '', TRUE) . " alt=\"not in TB Care\" title=\"TB Module: Click\"></a>";
                }
            }

            if ($dept_nr == 7) {
                //$o_arv_patient=&new ART_patient($patient['pid']);
                //if($o_arv_patient->is_arv_admitted($patient['pid'])) {
                //$temp_image="<a href=\"javascript:getEyeclinic('".$patient['pid']."','".$patient['encounter_nr']."')\"><img ".createComIcon($root_path,'ball_gray.png','0','',TRUE)." alt=\"inARV\"></a>";
                //}
                //else {
                $temp_image = "<a href=\"javascript:getEyeclinic('" . $patient['pid'] . "','" . $patient['encounter_nr'] . "')\"><img width=17 height=17 " . createComIcon($root_path, 'eye.gif', '0', '', TRUE) . " alt=\"Eye Examination\"></a>";
                //}
            }

            $kct = $cd_obj->CheckDiagnosis($patient['encounter_nr']);
            if ($vct[9] == 1) {
                if (($kct < 1) && ($patient['encounter_nr'] != '')) {
                    $smarty->assign('sFlagDiag', ' style="background-color:yellow !important; color:#000000;" ');
                    $smarty->assign('sFlagDiag2', ' style="background-color:yellow !important; color:#000000;" ');
                    $smarty->assign('sNoDiag', ' [ No Dx ] ');
                }
            }

            //Check here that the patient has paid for consultation and show options else hide
//            if ($glob_obj->getConfigValue("restrict_unbilled_items") === "1" && $dept_nr != 55) {  //For KB Hosp
            if ($glob_obj->getConfigValue("restrict_unbilled_items") === "1") {
                if ($enc_obj->getEncouterBillNo($patient['encounter_nr']) > 0) {
                    $smarty->assign('sAdmitDataIcon', '<a href="' . $root_path . 'modules/registration_admission/aufnahme_pass.php' . URL_APPEND . '&target=search&fwd_nr=' . $patient['encounter_nr'] . '" title="' . $LDAdmissionData . ' : ' . $LDClk2Show . '"><img ' . createComIcon($root_path, 'pdata.gif', '0', '', TRUE) . ' align="absmiddle" alt="' . $LDAdmissionData . ' : ' . $LDClk2Show . '"></a>');
                    $smarty->assign('sARVIcon', $temp_image);

                    $smarty->assign('sChartFolderIcon', '<a href="javascript:getinfo(\'' . $patient['encounter_nr'] . '\')"><img ' . createComIcon($root_path, 'open.gif', '0', '', TRUE) . ' align="absmiddle" alt="' . $LDShowPatData . '"></a>');

                    $display = $multi_obj->has_notes($patient['encounter_nr']);

                    $sBuffer = '<a href="javascript:getrem(\'' . $patient['encounter_nr'] . '\')"><img ';
                    if ($display > 0)
                        $sBuffer = $sBuffer . createComIcon($root_path, 'bubble3.gif', '0', '', TRUE);
                    else
                        $sBuffer = $sBuffer . createComIcon($root_path, 'bubble2.gif', '0', '', TRUE);
                    $sBuffer = $sBuffer . ' align="absmiddle" alt="' . $LDNoticeRW . '"></a>';

                    $smarty->assign('sNotesIcon', $sBuffer);

                    $smarty->assign('sTransferIcon', '<a href="javascript:Transfer(\'' . $patient['encounter_nr'] . '\',\'\', \'' . $pid . '\')"><img ' . createComIcon($root_path, 'xchange.gif', '0', '', TRUE) . ' align="absmiddle" alt="' . $LDTransferPatient . '"></a>');

                    $smarty->assign('vitalSigns', '<a href="' . $root_path . 'modules/registration_admission/show_weight_height.php' . URL_APPEND . '&target=search&pid=' . $pid . '"><img ' . createComIcon($root_path, 'sheart-working.gif', '0', '', TRUE) . ' align="absmiddle" alt="" title="Vital Signs: Click to show Vital Signs"></a>');
                }else {
                    $smarty->assign('sChartFolderIcon', 'Not Billed Yet!');
                }
            } else {
                $smarty->assign('sAdmitDataIcon', '<a href="' . $root_path . 'modules/registration_admission/aufnahme_pass.php' . URL_APPEND . '&target=search&fwd_nr=' . $patient['encounter_nr'] . '" title="' . $LDAdmissionData . ' : ' . $LDClk2Show . '"><img ' . createComIcon($root_path, 'pdata.gif', '0', '', TRUE) . ' align="absmiddle" alt="' . $LDAdmissionData . ' : ' . $LDClk2Show . '"></a>');
                $smarty->assign('sARVIcon', $temp_image);

                $smarty->assign('sChartFolderIcon', '<a href="javascript:getinfo(\'' . $patient['encounter_nr'] . '\')"><img ' . createComIcon($root_path, 'open.gif', '0', '', TRUE) . ' align="absmiddle" alt="' . $LDShowPatData . '"></a>');

                $display = $multi_obj->has_notes($patient['encounter_nr']);

                $sBuffer = '<a href="javascript:getrem(\'' . $patient['encounter_nr'] . '\')"><img ';
                if ($display > 0)
                    $sBuffer = $sBuffer . createComIcon($root_path, 'bubble3.gif', '0', '', TRUE);
                else
                    $sBuffer = $sBuffer . createComIcon($root_path, 'bubble2.gif', '0', '', TRUE);
                $sBuffer = $sBuffer . ' align="absmiddle" alt="' . $LDNoticeRW . '"></a>';

                $smarty->assign('sNotesIcon', $sBuffer);

                $smarty->assign('sTransferIcon', '<a href="javascript:Transfer(\'' . $patient['encounter_nr'] . '\',\'\', \'' . $pid . '\')"><img ' . createComIcon($root_path, 'xchange.gif', '0', '', TRUE) . ' align="absmiddle" alt="' . $LDTransferPatient . '"></a>');

                $smarty->assign('vitalSigns', '<a href="' . $root_path . 'modules/registration_admission/show_weight_height.php' . URL_APPEND . '&target=search&pid=' . $pid . '"><img ' . createComIcon($root_path, 'sheart-working.gif', '0', '', TRUE) . ' align="absmiddle" alt="' . $LDTransferPatient . '" title="Vital Signs: Click to show Vital Signs"></a>');
            }
            /* MEROTECH:
              Commented out for selian town clinic by Alexander Irro
              $smarty->assign('sDischargeIcon','<a href="javascript:release(\''.$patient['encounter_nr'].'\')" title="'.$LDReleasePatient.'"><img '.createComIcon($root_path,'bestell.gif','0','',TRUE).' alt="'.$LDReleasePatient.'"></a>');
             */
        }

        # Create the rows using ward_occupancy_list_row.tpl template
        ob_start();
        $smarty->display('ambulatory/outpatients_list_row.tpl');
        $sListRows = $sListRows . ob_get_contents();
        ob_end_clean();

        # Append the new row to the previous row in string

        $smarty->assign('sOccListRows', $sListRows);
    } // end of patients loop
}else {

    # Prompt no outpatients available
    $smarty->assign('sWarningPrompt', '
			<div class="warnprompt"><p><ul><img ' . createMascot($root_path, 'mascot1_r.gif', '0', 'absmiddle') . '>
			' . str_replace("~station~", strtoupper($station), $LDNoOutpatients) . '</b></font><br><img ' . createComIcon($root_path, 'bul_arrowgrnlrg.gif', '0', '', TRUE) . '>
			<a href="' . $root_path . 'modules/appointment_scheduler/appt_main_pass.php' . URL_APPEND . '&dept_nr=' . $dept_nr . '&dept_name=' . $dept . '">' . $LDGoToAppointments . '</a><p>
			</ul></div>');
}

# Assign href  for  bottom close button
$smarty->assign('pbClose', '<a href="' . $breakfile . '"><img ' . createLDImgSrc($root_path, 'close2.gif', '0', 'absmiddle') . '></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp');

$smarty->assign('sMainBlockIncludeFile', 'ambulatory/outpatients.tpl');

/**
 * show Template
 */
$smarty->display('common/mainframe.tpl');
?>

<head>
    <!--src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">-->
    <script type="text/javascript" src="<?php echo $root_path; ?>js/jquery.1.10.js"></script>

    <script type="text/javascript">
        function open_chatbox()
        {
        $('#result').fadeOut(500);
        $('#resultBox').fadeIn(1000);
        }
        function closeChat()
        {
        $('#resultBox').fadeOut(500);
        $('#result').fadeIn(1000);
        }
        function openPat(url) {
        var patientwin;
        patientwin = window.open(url, '_blank', "width=840,height=650,menubar=no,resizable=yes,scrollbars=yes");
        patientwin.moveTo(0, 0);
        patientwin.resizeTo(screen.availWidth, screen.availHeight)
        }

        </scri        pt>
        <style>
                #result
        {
        position:fixed;
        width:200px;
        border - radius: 30px 40px 20px;
        height:auto;
        padding:10px;
        background:lime;
        text - align:center;
        font - family:Cambria;
        font - size:20px;
        bottom:0px;
        right:15px;
        cursor:pointer;
        }
        #resultBox
        {
        display:none;
        position:fixed;
        width:250px;
        min - height: 300px;
        max - height: 600px;
        padding:5px;
        background:#EEEEEE;
        color:#FF7700;
        box - shadow:0 0 0.1em #000;
        font - family:Cambria;
        font - size:15px;
        bottom:0px;
        right:15px;
        cursor:pointer;
        overflow - y: scroll;
        }
        #close
        {
        position:absolute;
        width:15px;
        height:15px;
        padding:6px 5px 10px 5px;
        text - align:center;
        background:rgba(0, 0, 0, 0.8);
        color:#FF7700;
        font - family:Cambria;
        right:0px; top:0px;
        border - radius: 60px;
        }
    </style>
    </head>
    
    <body>
    <div id="result" onClick="open_chatbo
                x();"> Tests Results < /div>
    <div id="resultBox">
    <div onclick="closeChat()" id="close">x</div>
    <div>
                <?php
                $sqlnames = "SELECT DISTINCT ce.pid, concat(cp.name_first,' ',cp.name_last) as fullname,
                                ce.encounter_nr, dr.report_nr
                            FROM care_person cp,care_encounter_diagnostics_report dr,care_encounter ce
                            WHERE ce.encounter_nr=dr.encounter_nr
                            AND ce.pid=cp.pid
                            AND ce.is_discharged=0
                            AND dr.open_status=0       
                            AND ce.current_dept_nr='$dept_nr'
                        ORDER BY dr.create_time ASC";

                $resultsnames = $db->Execute($sqlnames);

                while ($namesresults = $resultsnames->FetchRow()) {
                    $nameR = $namesresults['fullname'];
                    $encounter = $namesresults['encounter_nr'];
                    $report_nr = $namesresults['report_nr'];

                    $url = $root_path . "modules/nursing/nursing-station-patientdaten.php" . URL_REDIRECT_APPEND . "&pn=$encounter" . "&pday=$pday" . "&pmonth=$pmonth" . "&pyear=$pyear&edit=$edit&station=$dept_nr&open=1&report_nr=$report_nr";

                    echo "<p>";
                    echo '<a href="javascript:openPat(\'' . $url . '\')">' . $nameR . '</a> </br>';
                    echo "</p>";
                }
                ?>
    
    </div>