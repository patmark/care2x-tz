<?php /* Smarty version 2.6.22, created on 2015-10-30 11:01:26
         compiled from ctc/arv_menu.php */ ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<HTML>
    <HEAD>
        <TITLE><?php echo '<?php'; ?>
 echo $LDCTCMenu; <?php echo '?>'; ?>
</TITLE>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="Author" content="Mark Patrick">
        <script language="javascript">
            <!-- 
            if (parent.frames.length >= 1) {
                window.top.location.href = document.location;
            }

            function openCreditsWindow() {

                urlholder = "../../language/$lang/$lang_credits.php?lang=$lang";
                creditswin = window.open(urlholder, "creditswin", "width=500,height=600,menubar=no,resizable=yes,scrollbars=yes");

            }

            function gethelp(x, s, x1, x2, x3, x4)
            {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php<?php echo '<?php'; ?>
 echo URL_APPEND; <?php echo '?>'; ?>
&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }

//-->
        </script> 
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

    </HEAD>
    <BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066  >
        <table width=100% border=0 cellspacing=0 height=100%>
            <tbody class="main">

                <tr>
                    <td bgcolor=#ffffff valign=top>
                        <blockquote>
                            <TABLE cellSpacing=0  width=600 class="submenu_frame" cellpadding="0">
                                <TBODY>
                                    <TR>
                                        <TD>
                                            <TABLE cellSpacing=1 cellPadding=3 width=600>
                                                <?php echo '<?php'; ?>

                                                if ($mode == "registered") {
                                                    <?php echo '?>'; ?>

                                                    <TBODY class="submenu">
                                                        <TR> 
                                                            <td align=center><img src="../../gui/img/common/default/showdata.gif" border=0></td>
                                                            <TD class="submenu_item"><nobr><a href="arv_registration.php<?php echo '<?php'; ?>
 echo URL_APPEND <?php echo '?>'; ?>
&encounter_nr=<?php echo '<?php'; ?>
 echo $_GET['encounter_nr']; <?php echo '?>'; ?>
&pid=<?php echo '<?php'; ?>
 echo $_GET['pid'] <?php echo '?>'; ?>
&mode=edit" target="_parent">Edit CTC Patient</a></nobr></TD>
                                            <TD>Edit Patient's CTC Registration data</TD>
                                        </tr>
                                        <TR> 
                                            <td align=center><img src="../../gui/img/common/default/new_group.gif" border=0></td>
                                            <TD class="submenu_item"><nobr><a href="arv_family_info.php<?php echo '<?php'; ?>
 echo URL_APPEND <?php echo '?>'; ?>
&encounter_nr=<?php echo '<?php'; ?>
 echo $_GET['encounter_nr']; <?php echo '?>'; ?>
&pid=<?php echo '<?php'; ?>
 echo $_GET['pid'] <?php echo '?>'; ?>
&mode=new" target="_parent">Family Information</a></nobr></TD>
                                    <TD>Add/Edit Patient's Family Information</TD>
                                    </tr>
                                    <?php echo '<?php'; ?>

                                    if (!$o_arv_visit->is_visit_encounter()) {
                                        <?php echo '?>'; ?>

                                        <TR> 
                                            <td align=center><img src="../../gui/img/common/default/new_group.gif" border=0></td>
                                            <TD class="submenu_item"><nobr><a href="<?php echo '<?php'; ?>
 echo $root_path <?php echo '?>'; ?>
modules/arv_2/arv_visit_frameset.php<?php echo '<?php'; ?>
 echo URL_APPEND <?php echo '?>'; ?>
&encounter_nr=<?php echo '<?php'; ?>
 echo $_GET['encounter_nr']; <?php echo '?>'; ?>
&pid=<?php echo '<?php'; ?>
 echo $_GET['pid'] <?php echo '?>'; ?>
&mode=new" target="_parent">New Visit</a></nobr></TD>
                                        <TD>Insert data of a new ctc visit</TD>
                                        </tr>
                                    <?php echo '<?php'; ?>
 } <?php echo '?>'; ?>

                                    <TR> 
                                        <td height="26" align=center><img src="../../gui/img/common/default/pdata.gif" border=0 width="16" height="16"></td>
                                        <TD class="submenu_item"><nobr><a href="arv_overview.php<?php echo '<?php'; ?>
 echo URL_APPEND <?php echo '?>'; ?>
&encounter_nr=<?php echo '<?php'; ?>
 echo $_GET['encounter_nr']; <?php echo '?>'; ?>
&pid=<?php echo '<?php'; ?>
 echo $_GET['pid'] <?php echo '?>'; ?>
" target="_parent">Show CTC Data</a></nobr></TD>
                                    <TD>Get an overview over patient's ctc data</TD>
                                    </tr>
                                    <TR> 
                                        <td height="26" align=center><img src="../../gui/img/common/default/yellowlist.gif" border=0 width="16" height="17"></td>
                                        <TD class="submenu_item"><nobr><a href="arv_education_menu.php<?php echo '<?php'; ?>
 echo URL_APPEND <?php echo '?>'; ?>
&encounter_nr=<?php echo '<?php'; ?>
 echo $_GET['encounter_nr']; <?php echo '?>'; ?>
&pid=<?php echo '<?php'; ?>
 echo $_GET['pid'] <?php echo '?>'; ?>
" target="_parent">Follup-up education</a></nobr></TD>
                                    <TD>Get an overview over patient's ctc data</TD>
                                    </tr>
                                    <TR  height=1> 
                                        <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
                                    </TR>
                                    </TBODY>
                                    <?php echo '<?php'; ?>

                                } else {
                                    <?php echo '?>'; ?>

                                    <TBODY class="submenu">
                                        <TR> 
                                            <td align=center><img src="../../gui/img/common/default/showdata.gif" border=0></td>
                                            <TD class="submenu_item"><nobr><a href="arv_registration.php<?php echo '<?php'; ?>
 echo URL_APPEND <?php echo '?>'; ?>
&pid=<?php echo '<?php'; ?>
 echo $_GET['pid'] <?php echo '?>'; ?>
&encounter_nr=<?php echo '<?php'; ?>
 echo $_GET['encounter_nr']; <?php echo '?>'; ?>
&mode=new" target="_parent">New CTC Patient</a></nobr></TD>
                                    <TD>Admit a new patient to the ctc programme</TD>
                                    </tr>
                                    </TBODY>
                                    <?php echo '<?php'; ?>

                                }
                                <?php echo '?>'; ?>


                                <TBODY class="submenu">
                                    <TR> 
                                        <td align=center><img src="../../gui/img/common/default/persons.gif" border=0></td>
                                        <TD class="submenu_item"><nobr><a href="../../modules/ambulatory/amb_clinic_patients.php?lang=en&sid=<?php echo '<?php'; ?>
 echo session_id(); <?php echo '?>'; ?>
&origin=pass&target=list&dept_nr=42&checkintern=1">Patients</a></nobr></TD>
                                <TD>Back to Choosing Patients</TD>
                                </tr>
                                </TBODY>
                            </TABLE>
                    </TD>
                </TR>
            </TBODY>
        </TABLE>
        <p>
        <p>
        </blockquote>									
    </td>
</tr>
<tr valign=top >
    <td bgcolor=#cccccc>
        <?php echo '<?php'; ?>
 require($root_path . 'include/inc_load_copyrite.php'); <?php echo '?>'; ?>

    </td>
</tr>
</tbody>
</table>
</BODY>
</HTML>