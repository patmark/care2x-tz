<?php
//$sid = $_REQUEST['sid']; //Get current session id
//session_id($sid); //Initialize session with current session id
//session_start();
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

$lang_tables[] = 'departments.php';
$lang_tables[] = 'pharmacy.php';
$lang_tables[] = 'diagnoses_ICD10.php';
$lang_tables[] = 'obstetrics.php';
$lang_tables[] = 'aufnahme.php';
define('LANG_FILE', 'nursing.php');
//define('LANG_FILE','aufnahme.php');

define('NO_2LEVEL_CHK', 1);
require_once($root_path . 'include/inc_front_chain_lang.php');

include_once($root_path . 'include/care_api_classes/class_mini_dental.php');
include_once($root_path . 'include/care_api_classes/class_radio.php');
include_once($root_path . 'include/care_api_classes/class_multi.php');
require_once($root_path . 'include/care_api_classes/class_tz_diagnostics.php');
//$diagnostic_obj->get_array_search_results($keyword);

$diagnostic_obj = new Diagnostics;
//$diagnostic_obj->get_array_search_results($keyword);
$alergic = new dental;
//$Radiology = new dental;
$rad_obj = new Radio;
$multi = new multi;

/**
 * If the script call comes from the op module replace the user cookie with the user info from op module
 */
//$db->debug=FALSE;

if (isset($op_shortcut) && $op_shortcut) {
    $_COOKIE['ck_pflege_user' . $sid] = $op_shortcut;
    setcookie('ck_pflege_user' . $sid, $op_shortcut, 0, '/');
    $edit = 1;
} elseif ($_COOKIE['ck_op_pflegelogbuch_user' . $sid]) {
    setcookie('ck_pflege_user' . $sid, $_COOKIE['ck_op_pflegelogbuch_user' . $sid], 0, '/');
    $edit = 1;
} elseif ($_COOKIE['aufnahme_user' . $sid]) {
    setcookie('ck_pflege_user' . $sid, $_COOKIE['aufnahme_user' . $sid], 0, '/');
    $edit = 1;
} elseif (!$_COOKIE['ck_pflege_user' . $sid]) {
    //if($edit) {header('Location:'.$root_path.'language/'.$lang.'/lang_'.$lang.'_invalid-access-warning.php'); exit;};
}

/* Load the visual signalling defined constants */
require_once($root_path . 'include/inc_visual_signalling_fx.php');
require_once($root_path . 'global_conf/inc_remoteservers_conf.php');

/* Retrieve the SIGNAL_COLOR_LEVEL_ZERO = for convenience purposes */
$z = SIGNAL_COLOR_LEVEL_ZERO;
/* Retrieve the SIGNAL_COLOR_LEVEL_FULL = for convenience purposes */
$f = SIGNAL_COLOR_LEVEL_FULL;

$_SESSION['sess_user_origin'] = 'nursing';

/* Create department object and load all medical depts */
require_once($root_path . 'include/care_api_classes/class_department.php');
$dept_obj = new Department;
$medical_depts = $dept_obj->getAllMedical();
/* Create encounter object */
require_once($root_path . 'include/care_api_classes/class_encounter.php');
$enc_obj = new Encounter;

/* Load global configs */
include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
$GLOBAL_CONFIG = array();
$glob_obj = new GlobalConfig($GLOBAL_CONFIG);
$glob_obj->getConfig('patient_%');


$_SESSION['logID'] = $_SESSION['sess_user_name'];

function Spacer() {
    /* ?>
      <TR bgColor=#dddddd height=1>
      <TD colSpan=3><IMG height=1
      src="../../gui/img/common/default/pixel.gif"
      width=5></TD></TR>
      <?php
     */
}

/* Establish db connection */
if (!isset($db) || !$db)
    include($root_path . 'include/inc_db_makelink.php');
if ($dblink_ok) {
    /* Load date formatter */
    include_once($root_path . 'include/inc_date_format_functions.php');
    $enc_obj->where = " encounter_nr=$pn";
    if ($enc_obj->loadEncounterData($pn)) {
        /* 			switch ($enc_obj->EncounterClass())
          {
          case '1': $full_en = ($pn + $GLOBAL_CONFIG['patient_inpatient_nr_adder']);
          break;
          case '2': $full_en = ($pn + $GLOBAL_CONFIG['patient_outpatient_nr_adder']);
          break;
          default: $full_en = ($pn + $GLOBAL_CONFIG['patient_inpatient_nr_adder']);
          }
         */
        $full_en = $pn;

        if ($enc_obj->is_loaded) {
            $result = &$enc_obj->encounter;
            $rows = $enc_obj->record_count;

            if ($result['is_discharged'])
                $edit = 0;

            $event_table = 'care_encounter_event_signaller';

            /* If mode = save_event_changes, save the color bar status */

            if ($mode == 'save_event_changes') {
                $sql_buf = '';

                /* prepare the rose_x part sql query */

                for ($i = 1; $i < 25; $i++) {
                    $buf = 'rose_' . $i;

                    $sql_buf .= $buf . " ='" . $$buf . "', ";
                }

                /* prepare the green_x part */

                for ($i = 1; $i < 8; $i++) {
                    $buf = 'green_' . $i;

                    $sql_buf .= $buf . "='" . $$buf . "', ";
                }

                /* append the additional color event signallers */

                $sql_buf .= "yellow='$yellow', black='$black', blue_pale='$blue_pale', brown='$brown',
						                   pink='$pink', yellow_pale='$yellow_pale', red='$red', green_pale='$green_pale',
										   violet='$violet', blue='$blue', biege='$biege', orange='$orange'";


                $sql = "UPDATE $event_table SET $sql_buf WHERE encounter_nr='$pn'";

                //  echo $sql;

                if ($event_result = $enc_obj->Transact($sql)) {
                    if (!$db->Affected_Rows()) {
                        /* If entry not yet existing, insert data */

                        /* prepare the rose_x part sql query */

                        $set_str = '';
                        $sql_buf = '';

                        for ($i = 1; $i < 25; $i++) {

                            $buf = 'rose_' . $i;

                            $set_str .= $buf . ', ';

                            $sql_buf .= "'" . $$buf . "', ";
                        }

                        /* prepare the green_x part */

                        for ($i = 1; $i < 8; $i++) {
                            $buf = 'green_' . $i;

                            $set_str .= $buf . ', ';

                            $sql_buf .= "'" . $$buf . "', ";
                        }

                        /* append the additional color event signallers */

                        $set_str .= 'yellow, black, blue_pale, brown,
						                   pink, yellow_pale, red, green_pale,
										   violet, blue, biege, orange';

                        /* prepare the values part */

                        $sql_buf .= "'$yellow', '$black', '$blue_pale', '$brown',
						                   '$pink', '$yellow_pale', '$red', '$green_pale',
										   '$violet', '$blue', '$biege', '$orange'";

                        $sql = "INSERT INTO $event_table (encounter_nr, $set_str) VALUES ('$pn', $sql_buf)";

                        if ($event_result = $enc_obj->Transact($sql)) {
                            $event = $_POST;

                            $mode = 'changes_saved';
                            //echo "ok insertd $sql";
                        } else {
                            //echo "failed insert $sql";
                            $mode = '';
                        }
                    } else {
                        $mode = 'changes_saved';
                        //echo "update ok $sql";
                    }
                } else {
                    $mode = '';
                    //echo " failed update $sql";
                }
            }

            //echo $sql;

            if (!isset($mode) || ($mode == '') || ($mode == 'changes_saved')) {
                /* Get the color event signaller data */

                $sql = "SELECT * FROM " . $event_table . " WHERE encounter_nr='" . $pn . "'";

                if ($event_result = $db->Execute($sql)) {
                    if ($event_result->RecordCount()) {
                        $event = $event_result->FetchRow();
                    } else {
                        /* If no event entry yet, create event array with zeros */
                        $event = array('yellow' => $z, 'black' => $z, 'blue_pale' => $z, 'brown' => $z, 'pink' => $z, 'yellow_pale' => $z, 'red' => $z, 'green_pale' => $z, 'violet' => $z, 'blue' => $z, 'biege' => $z, 'orange' => $z);
//                        /* Add the green_n */
//                        for ($i = 1; $i < 8; $i++) {
//                            $event['green_' . $i] = $z;
//                        }
//                        /* Add the rose_n */
//                        for ($i = 1; $i < 25; $i++) {
//                            $event['rose_' . $i] = $z;
//                        }
                    }
                }
            }
        } // end of if($rows)
        /*
         * Check if opened from results link and update
         * care_encounter_diagnostics_report table
         */
        if (isset($_GET['open']) && !empty($_GET['open'])) {
            $report_nr = $_GET['report_nr'];
            $sql_rep = "UPDATE care_encounter_diagnostics_report "
                    . "SET open_status=1 WHERE report_nr=$report_nr";
            if (!$db->Execute($sql_rep)) {
                echo "<p>$sql_rep$LDDbNoRead";
                exit;
            }
        }
    } else { // end of if ($ergebnis)
        echo "<p>$sql$LDDbNoRead";
        exit;
    }
} else {
    echo "$LDDbNoLink<br>$sql<br>";
}

$fr = strtolower(str_replace('.', '-', ($result['encounter_nr'] . '_' . $result['name_last'] . '_' . ucwords($result['name_first']) . '_' . $result['date_birth'])));

# Start Smarty templating here
/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme

require_once($root_path . 'gui/smarty_template/smarty_care.class.php');
$smarty = new smarty_care('nursing');

# Title in toolbar
$smarty->assign('sToolbarTitle', "$LDPatDataFolder $station");

# hide return button
$smarty->assign('pbBack', FALSE);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('patient_charts.php','Patient&acute;s chart folder :: Overview','','$station','Main folder')");

# href for close button
$smarty->assign('breakfile', 'javascript:window.close()');

# Window bar title
$smarty->assign('sWindowTitle', ucfirst($result[name_last]) . "," . ucwords($result[name_first]) . " " . $result[date_birth] . " " . $LDPatDataFolder);

# Body Onload js
$sOnLoadJs = 'onLoad="initwindow();';
if ($mode == 'changes_saved') {
    $sOnLoadJs = $sOnLoadJs . 'window.opener.location.reload();';
}
$sOnLoadJs = $sOnLoadJs . '"';
$smarty->assign('sOnLoadJs', $sOnLoadJs);

//-- get dept_nr
if (isset($_SESSION['deptnr'])) {
    $dept_nr = $_SESSION['deptnr'];
}

//$multi = new multi;
$vct = $multi->__genNumbers();

# if rooming list enabled
$room = ($vct[8] == 2) ? $room : 'GENERAL';

$pid = $enc_obj->EncounterExists($pn);


$multi->doctorSTAT($_SESSION['sess_login_userid'], $pn);

# Collect js code

ob_start();
?>
<script language="javascript">
<!--
    var urlholder;
    var changed_flag = 0;
    function initwindow() {
        if (window.focus)
            window.focus();
        //window.resizeTo(800,600);
    }

    function getinfo(patientID) {
        urlholder = "nursing-station.php?route=validroute&patient=" + patientID + "&user=<?php echo $aufnahme_user . '"' ?>;
                patientwin = window.open(urlholder, patientID, "menubar=no,resizable=yes,scrollbars=yes");
        patientwin.moveTo(0, 0);
        patientwin.resizeTo(screen.availWidth, screen.availHeight);
    }

    function enlargewin() {
        window.moveTo(0, 0);
        //window.resizeTo(1000,740);
        window.resizeTo(screen.availWidth, screen.availHeight);
    }

    function xmakekonsil(v) {
        var x = v;
        /*	if((v=="patho")||(v=="inmed")||(v=="radio")||(v=="baclabor")||(v=="blood")||(v=="chemlabor"))
         {
         */
        if ((v == "inmed") || (v == "allamb") || (v == "unfamb") || (v == "sono") || (v == "nuklear"))
        {
            v = "generic";
        }
        location.href = "nursing-station-patientdaten-doconsil-" + v + ".php?sid=<?php echo "$sid&lang=$lang&edit=$edit&station=$station&pn=$pn&konsil="; ?>" + x + "&target=" + v;
        /*	}
         else
         {v="radio";
         location.href="ucons.php?sid=<?php echo "$sid&lang=$lang&station=$station&pn=$pn&konsil="; ?>"+v;
         }
         */	//enlargewin();
    }
    function makekonsil(d) {
        if (d != "") {
            location.href = "nursing-station-patientdaten-doconsil-router.php?sid=<?php
//echo "$sid&lang=$lang&edit=$edit&station=$station&pn=$pn&dept_nr=";
echo "$sid&lang=$lang&edit=$edit&station=$station&pn=$pn&dept_id=";
?>" + d;
        }
    }
    function pullbar(cb) {
        var buf;
        eval("buf = document.patient_folder." + cb.name + ".value");
        buf = parseInt(buf);
        if ((buf == '<?php echo $f ?>') || (buf) || (buf ==<?php echo $f ?>))
        {
            eval("document." + cb.name + ".src='<?php echo $root_path; ?>gui/img/common/default/qbar_<?php echo $z ?>_" + cb.name + ".gif'");
            eval("document.patient_folder." + cb.name + ".value = <?php echo $z ?>");
        } else
        {
            eval("document." + cb.name + ".src='<?php echo $root_path; ?>gui/img/common/default/qbar_<?php echo $f ?>_" + cb.name + ".gif'");
            eval("document.patient_folder." + cb.name + ".value = <?php echo $f ?>");
        }
        changed_flag = 1;
    }

    function pullGreenbar(cb) {
        var buf;
        eval("buf = document.patient_folder." + cb.name + ".value");
        buf = parseInt(buf);
        if ((buf == '<?php echo $f ?>') || (buf) || (buf ==<?php echo $f ?>))
        {
            eval("document." + cb.name + ".src='<?php echo $root_path; ?>gui/img/common/default/qbar_<?php echo $z ?>_green.gif'");
            eval("document.patient_folder." + cb.name + ".value = <?php echo $z ?>");
        } else
        {
            eval("document." + cb.name + ".src='<?php echo $root_path; ?>gui/img/common/default/qbar_<?php echo $f ?>_green.gif'");
            eval("document.patient_folder." + cb.name + ".value = <?php echo $f ?>");
        }
        changed_flag = 1;
    }

    function pullRosebar(cb)
    {
        var buf;
        eval("buf = document.patient_folder." + cb.name + ".value");
        buf = parseInt(buf);
        if ((buf == '<?php echo $f ?>') || (buf) || (buf ==<?php echo $f ?>))
        {
            eval("document." + cb.name + ".src='<?php echo $root_path; ?>gui/img/common/default/qbar_<?php echo $z ?>_rose.gif'");
            eval("document.patient_folder." + cb.name + ".value = <?php echo $z ?>");
        } else
        {
            eval("document." + cb.name + ".src='<?php echo $root_path; ?>gui/img/common/default/qbar_<?php echo $f ?>_rose.gif'");
            eval("document.patient_folder." + cb.name + ".value = <?php echo $f ?>");
        }
        changed_flag = 1;
    }



    function pullMaroonbar(cb) {
        var buf;
        eval("buf = document.patient_folder." + cb.name + ".value");
        buf = parseInt(buf);
        if ((buf == '<?php echo $f ?>') || (buf) || (buf ==<?php echo $f ?>))
        {
            eval("document." + cb.name + ".src='<?php echo $root_path; ?>gui/img/common/default/qbar_<?php echo $z ?>_rose.gif'");
            eval("document.patient_folder." + cb.name + ".value = <?php echo $z ?>");
        } else {
            eval("document." + cb.name + ".src='<?php echo $root_path; ?>gui/img/common/default/qbar_<?php echo $f ?>_rose.gif'");
            eval("document.patient_folder." + cb.name + ".value = <?php echo $f ?>");
        }
        changed_flag = 1;
    }

    function isColorBarUpdated() {
        if (changed_flag == 1)
            return true;
        else
            return false;
    }
    function winClose() {
        window.opener.location.reload();
        window.close();
    }
    function openDRGComposite() {
<?php
if ($cfg['dhtml']) {
    echo '
                        w=window.parent.screen.width;
                        h=window.parent.screen.height;';
} else {
    echo '
                        w=800;
                        h=650;';
}
?>

        drgcomp_<?php echo $_SESSION['sess_full_en'] . "_" . $op_nr . "_" . $dept_nr . "_" . $saal ?> = window.open("<?php echo $root_path ?>modules/drg/drg-composite-start.php<?php echo URL_REDIRECT_APPEND . "&display=composite&pn=" . $pn . "&edit=$edit&ln=$name_last&fn=$name_first&bd=$date_birth&dept_nr=$dept_nr&oprm=$saal"; ?>", "drgcomp_<?php echo $encounter_nr . "_" . $op_nr . "_" . $dept_nr . "_" . $saal ?>", "menubar=no,resizable=yes,scrollbars=yes, width=" + (w - 15) + ", height=" + (h - 60));
                window.drgcomp_<?php echo $_SESSION['sess_full_en'] . "_" . $op_nr . "_" . $dept_nr . "_" . $saal ?>.moveTo(0, 0);
            }

//-->
</script>
<?php
$sTemp = ob_get_contents();
ob_end_clean();
$smarty->append('JavaScript', $sTemp);

# Buffer page output

ob_start();
?>

<ul><p><br>

    <form  method="post" name="patient_folder" onSubmit="return isColorBarUpdated()">


        <?php
# internal function for the following lines of code only

        function ha() {
            global $edit;
            if ($edit) {
                return '<a href="#">';
            }
        }

        function he() {
            global $edit;
            if ($edit) {
                return 'onClick="javascript:pullbar(this)"></a><a href="#">';
            } else {
                return '>';
            }
        }

        function hx() {
            global $edit;
            if ($edit) {
                return 'onClick="javascript:pullbar(this)"></a>';
            } else {
                return '>';
            }
        }

        function gx() {
            global $edit;
            if ($edit) {
                return 'onClick="javascript:pullGreenbar(this)"></a>';
            } else {
                return '>';
            }
        }

        function rx() {
            global $edit;
            if ($edit) {
                return 'onClick="javascript:pullRosebar(this)"></a>';
            } else {
                return '>';
            }
        }

        function mx() {
            global $edit;
            if ($edit) {
                return 'onClick="javascript:pullMaroonbar(this)"></a>';
            } else {
                return '>';
            }
        }

        require_once($root_path . 'include/care_api_classes/class_notes_nursing.php');
        include_once($root_path . 'include/care_api_classes/class_person.php');

        $pobj = new Person;

        $pid = $pobj->GetPidFromEncounter($pn);
        ?>


        <script language="javascript" type="text/javascript">
            <!--
                    function hideme(str, div, ht) {
                if (document.getElementById(str).value == "+") {
                    document.getElementById(str).value = "-";
                    document.getElementById(div).style.height = ht + 'px';
                } else {
                    document.getElementById(str).value = "+";
                    document.getElementById(div).style.height = "30px";
                }
            }

            function extratable() {
                var my = document.getElementById('extratable');
                var bt = document.getElementById('bner');
                if (my.style.display == 'none') {
                    my.style.display = 'block';
                    bt.value = 'Hide History';
                } else {
                    my.style.display == 'none';
                    bt.value = 'History';
                }
            }
-->
        </script>

        <style type="text/css">
            <!--
            .heading {
                font-family: Tahoma, monospace;
                font-size: 11px;
                color: white;
                background-color: #696969;
                font:bold 11px Tahoma; color:white; text-transform:uppercase;
            }
            -->
        </style>

       


                                <?PHP
                               


                                echo '<img src="' . $root_path . 'main/imgcreator/barcode_label_single_large.php?sid=' . $sid . '&lang=' . $lang . '&fen=' . $full_en . '&en=' . $pn . '&pid=' . $pid . '" width=282 height=178 align="left" hspace=5 vspace=5>';

       

                                
			
		





        $SQL="SELECT * FROM care_encounter_prescription WHERE encounter_nr='$full_en'";
        $RESULT=$db->Execute($SQL);
        while($rows=$RESULT->FetchRow()){
           // echo $rows['encounter_nr'].'<br>';

        }
		
                                ?>




    


<?php
$sTemp = ob_get_contents();
ob_end_clean();

# Assign page output to the mainframe template

$smarty->assign('sMainFrameBlockData', $sTemp);
/**
 * show Template
 */
$smarty->display('common/mainframe.tpl');
?>
