<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<HTML>

    <?php
    error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
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
//$db->debug=1;

    define('SHOW_DOC_2', 1);  # Define to 1 to  show the 2nd doctor-on-duty
    define('DOC_CHANGE_TIME', '7.30'); # Define the time when the doc-on-duty will change in 24 hours H.M format (eg. 3 PM = 15.00, 12 PM = 0.00)

    $lang_tables[] = 'prompt.php';
    define('LANG_FILE', 'nursing.php');
//define('NO_2LEVEL_CHK',1);
    $local_user = 'ck_pflege_user';
    require($root_path . 'include/inc_front_chain_lang.php');

    if (empty($_COOKIE[$local_user . $sid])) {
        $edit = 0;
        include($root_path . "language/" . $lang . "/lang_" . $lang . "_" . LANG_FILE);
    }

    if (isset($_POST['ward_nr'])) {
        $ward_nr = $_POST['ward_nr'];
    }
    if (isset($_GET['ward_nr']) && $_GET['ward_nr'] != '') {
        $ward_nr = $_GET['ward_nr'];
    }
    $station = $_GET['station'];

    $breakfile = 'nursing-station-pass.php' . URL_APPEND . '&ward_nr=' . $ward_nr . '&mode=show&rt=pflege&edit=1&station=' . $station;
    ?>


    <HEAD>
        <TITLE> - </TITLE>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta name="Author" content="Timo Hasselwander from merotech">
        <meta name="Generator" content="various: Quanta, AceHTML 4 Freeware, NuSphere, PHP Coder">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <script language="javascript" >
<!--
            function gethelp(x, s, x1, x2, x3, x4)
            {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php<?php echo URL_APPEND; ?>&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }
// -->
        </script>

        <script type="text/javascript">
<?php
require($root_path . 'include/inc_checkdate_lang.php');
?>
        </script>
        <script language="javascript" src="<?php echo $root_path; ?>js/setdatetime.js"></script>
        <script language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>
        <script language="javascript" src="<?php echo $root_path; ?>js/dtpick_care2x.js"></script>

        <link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
        <script language="javascript" src="../../js/hilitebu.js"></script>

        <STYLE TYPE="text/css">
            A:link  {color: #000066;}
            A:hover {color: #cc0033;}
            A:active {color: #cc0000;}
            A:visited {color: #000066;}
            A:visited:active {color: #cc0000;}
            A:visited:hover {color: #cc0033;}
        </style>
        <script language="JavaScript">
            <!--
        function popPic(pid, nm) {

                if (pid != "")
                    regpicwindow = window.open("../../main/pop_reg_pic.php?sid=<?php echo $sid . "&lang=" . $lang ?>&pid=" + pid + "&nm=" + nm, "regpicwin", "toolbar=no,scrollbars,width=180,height=250");

            }
            // -->
        </script>

        <script language="javascript">


<!--
            function closewin()
            {
                location.href = 'startframe.php?sid=<?php echo $sid . "&lang=" . $lang ?>';
            }


            function open_drug_services() {
                urlholder = "<?php echo $root_path; ?>/modules/pharmacy_tz/pharmacy_tz_pending_prescriptions.php<?php echo URL_APPEND; ?>&target=search&task=newprescription&back_path=billing";
                patientwin = window.open(urlholder, "Ziel", "width=750,height=550,status=yes,menubar=no,resizable=yes,scrollbars=yes");
                patientwin.moveTo(0, 0);
                patientwin.resizeTo(screen.availWidth, screen.availHeight);
            }
            function open_lab_request() {
                urlholder = "<?php echo $root_path; ?>modules/laboratory/labor_test_request_pass.php?<?php echo URL_APPEND; ?>&target=chemlabor&user_origin=bill";
                patientwin = window.open(urlholder, "Ziel", "width=750,height=550,status=yes,menubar=no,resizable=yes,scrollbars=yes");
                patientwin.moveTo(0, 0);
                patientwin.resizeTo(screen.availWidth, screen.availHeight);
            }
// -->
        </script>



    </HEAD>
    <BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066  >

        <form name="nursingform" method="GET" action="">



            <table width=100% border=0 cellspacing=0 height=100%>
                <tbody class="main">
                    <tr>
                        <td  valign="top" align="middle" height="35">
                            <table cellspacing="0"  class="titlebar" border=0>
                                <tr valign=top  class="titlebar" >
                                    <td bgcolor="#99ccff" >
                                        &nbsp;&nbsp;<font color="#330066"><?php echo 'Diagnosis for ' . $station; ?></font>

                                    </td>
                                    <td bgcolor="#99ccff" align=right><a
                                            href="javascript:window.history.back()"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)" ></a><a
                                            href="javascript:gethelp('billing_overview.php','Pharmacy')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a><a
                                            href="<?php echo $breakfile; ?>"><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>  </td>
                                </tr>
                            </table>		</td>
                    </tr>

                    <tr>
                        <td bgcolor=#ffffff valign=top>

                            <br>
                            <blockquote>
                                <TABLE cellSpacing=0  width=800 class="submenu_frame" cellpadding="0">
                                    <TBODY>
                                        <?php
                                        include_once($root_path . 'include/inc_date_format_functions.php');

                                        if (isset($_GET['prescr_date'])) {
                                            $prescr_date = $_GET['prescr_date'];
                                            //echo 'Date set: '.$prescr_date;
                                        } else {
                                            $prescr_date = formatDate2Local(date('Y-m-d'), $date_format);
                                        }
                                        ?>
                                    <br>
                                    <TR>
                                        <TD bgcolor=#ffffff align="center">
                                            <b>Filter by Date: </b>
                                            <!--</TD><TD>-->
                                            <input name="prescr_date" type="text" size="15" maxlength=10 value="<?php {
                                                echo $prescr_date;
                                            }
                                            ?>"
                                                   onFocus="this.select();"
                                                   onBlur="IsValidDate(this, 'dd/MM/yyyy')"
                                                   onKeyUp="setDate(this, 'dd/MM/yyyy', 'en');">
                                            <a href="javascript:show_calendar('nursingform.prescr_date','dd/MM/yyyy')">
                                                <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>


                                            <font size=1>[
                                            <?php
                                            $dfbuffer = "LD_" . strtr($date_format, ".-/", "phs");
                                            echo $$dfbuffer;
                                            ?>
                                            ] </font>
                                            <!--</TD>-->
                                            <!--<br>-->
                                            <!--<td>-->
                                            <input type="submit" name="setTime" value="Show">
                                        </td>
                                    </TR>
                                    <TR>
                                        <TD bgcolor=#ffffff align="center">&nbsp;</TD>
                                    </TR>
                                    <?php
                                    echo '<tr class="titlebar" bgcolor="#99ccff"><td><font color="#330066">Diagnosis for ' . $station . ' - ' . $prescr_date . '</font></td></tr>';
                                    echo '<tr class="titlebar" bgcolor="#99ccff"><td>&nbsp;</td></tr>';
                                    ?>

                                    <TR>
                                        <TD>
                                            <TABLE cellSpacing=1 cellPadding=3 width=800>
                                                <TBODY class="submenu">

                                                    <tr>
                                                        <td class="submenu_item"><?php echo $LDPatientID ?></td>
                                                        <td class="submenu_item"><?php echo $LDLastName . ', ' . $LDName ?></td>
                                                        <td class="submenu_item"><?php echo $LDDiagnosis ?></td>
                                                        <td class="submenu_item"><?php echo $LDDiagnosisDescr ?></td>
                                                        <td class="submenu_item"><?php echo $LDNotes ?></td>
                                                        <td class="submenu_item"><?php echo $LDCaseType ?></td>
                                                        <td class="submenu_item"><?php echo $LDDiagnosisDate ?></td>
                                                        <td class="submenu_item"><?php echo $LDEnteredBy ?></td>

                                                    </tr>

                                                    <?php
//			include_once($root_path.'include/inc_date_format_functions.php');
//
//			if (isset($_GET['prescr_date']))
//			{
//				$prescr_date = $_GET['prescr_date'];
//				//echo 'Date set: '.$prescr_date;
//
//			}
//			else
//			{
//				$prescr_date = formatDate2Local(date('Y-m-d'),$date_format);
//
//
//			}




                                                    $coreObjOuter = new Core;

                                                    $sqlOuter = "select * from care_encounter where current_ward_nr=$ward_nr and is_discharged=0";

                                                    $coreObjOuter->result = $db->Execute($sqlOuter);

                                                    foreach ($coreObjOuter->result as $rowEncounter) {

                                                        echo '<TR  height=1>
                                        <TD colSpan=8 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
                                            </TR>';


                                                        echo '<tr>';

                                                        //data person
                                                        $pid = $rowEncounter['pid'];
                                                        echo '<td>' . $pid . '</td>';

                                                        $sqlPerson = "select * from care_person where pid=$pid";
                                                        $coreObjInner->result = $db->Execute($sqlPerson);
                                                        $rowPerson = $coreObjInner->result->FetchRow();
                                                        $name_last = strtoupper($rowPerson['name_last']);
                                                        $name_first = ucwords($rowPerson['name_first'] . ' ' . $rowPerson['name_2']);

                                                        echo '<td>' . $name_last . ', ' . $name_first . '</td>';


                                                        //encounter nr
                                                        $encounterNr = $rowEncounter['encounter_nr'];
                                                        //echo 'Encounter nr: '.$encounterNr.'<br> ';
                                                        //diagnosis
                                                        //$sqlInner = "select * from care_encounter_prescription where encounter_nr = $encounterNr";


                                                        $dateSQL = substr($prescr_date, 6, 4) . '-' . substr($prescr_date, 3, 2) . '-' . substr($prescr_date, 0, 2);
//                                                        echo $dateSQL;

                                                        $sqlInner = "select *, FROM_UNIXTIME(timestamp) AS diag_date from care_tz_diagnosis" .
                                                                " where encounter_nr = $encounterNr "
                                                                . "AND FROM_UNIXTIME(timestamp) like '%$dateSQL%'";
//                                                        echo $sqlInner;

                                                        $coreObjInner->result = $db->Execute($sqlInner);

                                                        $prescr = '';

                                                        foreach ($coreObjInner->result as $rowPrescr) {
//                                                            print_r($rowPrescr);
                                                            if ($prescr == '')
                                                                $prescr .= '<td>';
                                                            else
                                                                $prescr .= '<tr><td>&nbsp;</td><td>&nbsp;</td><td>';

                                                            $diagnosis_code = $rowPrescr['ICD_10_code'];

                                                            $diagnosis_descr = $rowPrescr['ICD_10_description'];

                                                            $dnotes = $rowPrescr['comment'];
//                                                            echo $dnotes;

                                                            $type = $rowPrescr['type'];

                                                            $doctor = $rowPrescr['doctor_name'];

                                                            $prescr .= $diagnosis_code . '</td><td>' . $diagnosis_descr . '</td>'
                                                                    . '<td>' . $dnotes . '</td><td>' . $type . '</td><td>' . $rowPrescr['diag_date'] . '</td><td>' . $doctor;

                                                            $prescr .= '</td></tr>';


                                                            if (isset($_GET['save'])) {

                                                                $taken = $_GET['taken_' . $nr];

                                                                if ($taken == 'on')
                                                                    $takenSetter = 1;
                                                                else
                                                                    $takenSetter = 0;


                                                                $sqlTaken = "UPDATE care_encounter_prescription SET taken='$takenSetter' WHERE nr='$nr'";
                                                                $db->Execute($sqlTaken);
                                                            }
                                                        }
                                                        if ($prescr == '')
                                                            $prescr .= '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';

                                                        echo $prescr;
                                                    }
                                                    ?>
                                                <input type="hidden" name="station" value="<?php echo $station ?>">
                                                <input type="hidden" name="ward_nr" value="<?php echo $ward_nr ?>">






                                                </TBODY>
                                            </TABLE>
                                        </TD>
                                    </TR>






                                    </TBODY>
                                </TABLE>

                                <p>
                                    <a href="<?php echo $breakfile ?>"><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>

                                                        <!--<input type="image" src="../../gui/img/control/default/en/en_savedisc.gif" value="button"  name="save">-->
                                    <br><br><br>

<!--                                    <input name="prescr_date" type="text" size="15" maxlength=10 value="<?php {
//                                        echo $prescr_date;
                                    }
                                    ?>"
                                           onFocus="this.select();"
                                           onBlur="IsValidDate(this, 'dd/MM/yyyy')"
                                           onKeyUp="setDate(this, 'dd/MM/yyyy', 'en');">
                                    <a href="javascript:show_calendar('nursingform.prescr_date','dd/MM/yyyy')">
                                        <img <?php // echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle');  ?>></a>


                                    <font size=1>[
                                    <?php
//                                    $dfbuffer = "LD_" . strtr($date_format, ".-/", "phs");
//                                    echo $$dfbuffer;
                                    ?>
                                    ] </font><br>

                                    <input type="submit" name="setTime" value="Show">-->

                                <p>
                            </blockquote>
                        </td>
                    </tr>
            </table>
        </form>
        <table width=100% border=0 cellspacing=0 height=100%>
            <tr valign=top >
                <td bgcolor=#cccccc>
                    <table width="100%" border="0" cellspacing="0" cellpadding="1" bgcolor="#cfcfcf">
                        <tr>
                            <td align="center">
                                <table width="100%" bgcolor="#ffffff" cellspacing=0 cellpadding=5>

                                    <tr>
                                        <td>
                                            <div class="copyright">
                                                <script language="JavaScript">
                                                    <!-- Script Begin
                                                function openCreditsWindow() {

                                                        urlholder = "../../language/$lang/$lang_credits.php?lang=$lang";
                                                        creditswin = window.open(urlholder, "creditswin", "width=500,height=600,menubar=no,resizable=yes,scrollbars=yes");

                                                    }
                                                    //  Script End -->
                                                </script>


                                                <a href="http://www.luico.co.tz" target=_new>CARE2X 3rd Generation pre-deployment 3.3</a> :: <a href="../../legal_gnu_gpl.htm" target=_new> License</a> ::
                                                <a href=mailto:care2x@luico.co.tz>Contact</a>  :: <a href="../../language/en/en_privacy.htm" target="pp"> Our Privacy Policy </a> ::
                                                <a href="../../docs/show_legal.php?lang=$lang" target="lgl"> Legal </a> ::
                                                <a href="javascript:openCreditsWindow()"> Credits </a> ::.<br>

                                            </div>
                                        </td>
                                    <tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>

            </tr>

        </tbody>
    </table>
</BODY>
</HTML>
