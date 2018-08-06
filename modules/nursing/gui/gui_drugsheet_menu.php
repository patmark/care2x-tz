<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<script language="javascript">

//    if (parent.frames.length >= 1) {
//        window.top.location.href = document.location;
//    }

    function openCreditsWindow() {

        urlholder = "../../language/$lang/$lang_credits.php?lang=$lang";
        creditswin = window.open(urlholder, "creditswin", "width=500,height=600,menubar=no,resizable=yes,scrollbars=yes");

    }

    function gethelp(x, s, x1, x2, x3, x4)
    {
        if (!x)
            x = "";
        urlholder = "../../main/help-router.php<?php echo URL_APPEND; ?>&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
        helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
        window.helpwin.moveTo(0, 0);
    }

//
</script> <!--
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
        
    </HEAD>-->

<?php
//        require_once('./classes/phpSniff/phpSniff.class.php'); # Sniffer for PHP 
$claims_obj->Display_Header($LDPatientDrugsheet, '', '');
?>
<BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066>
    <table width=100% border=0 cellspacing=0 height=100%>
        <tbody class="main">
            <tr>
                <td  valign="top" align="middle" height="35">
                    <table cellspacing="0"  class="titlebar" border=0>
                        <tr valign=top  class="titlebar" >
                            <td bgcolor="#99ccff" >&nbsp;&nbsp;<font color="#330066">
                                <?php echo (isset($_SESSION['sess_user_origin']) && $_SESSION['sess_user_origin'] == 'tbcare') ? 'NATIONAL TB AND LEPROSY PROGRAMME<br/>' : '' ?>
                                &nbsp;&nbsp;&nbsp;Patient Treatment Management - <?php echo '(' . $pid . ') ' . $pnames ?></font>
                            </td>
                            <td bgcolor="#99ccff" align=right>
                                <a href="javascript:gethelp('nursing.php','Treatment Sheet Menu','<?php echo $mode; ?>')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                                &nbsp;
                                <a href="<?php echo 'javascript:window.history.back()' ?>" ><img src="../../gui/img/control/blue_aqua/en/en_cancel.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>  </td>
                        </tr>
                    </table>				
                </td>
            </tr>
            <tr>
                <td bgcolor=#ffffff valign=top>
                    <blockquote>
                        <TABLE cellSpacing=0  width=600 class="submenu_frame" cellpadding="0">
                            <TBODY>
                                <TR>
                                    <TD>
                                        <TABLE cellSpacing=1 cellPadding=3 width=600>
                                            <TBODY class="submenu">
                                                <TR> 
                                                    <td height="26" align=center><img src="../../gui/img/common/default/pdata.gif" border=0 width="16" height="16"></td>
                                                    <TD class="submenu_item"><nobr><a href="nursing-getdailybp_t.php<?php echo URL_APPEND ?>&encounter_nr=<?php echo $_GET['encounter_nr']; ?>&pid=<?php echo $_GET['pid'] ?>">Record Daily Temperature and Pressure</a></nobr></TD>
                                    <TD>Daily Temperature and Pressure</TD>
                                </tr>
                                <TR> 
                                    <td height="26" align=center><img src="../../gui/img/common/default/dawa.jpg" border=0 width="16" height="17"></td>
                                    <TD class="submenu_item"><nobr><a href="drugsheet.php<?php echo URL_APPEND ?>&encounter_nr=<?php echo $_GET['encounter_nr']; ?>&pid=<?php echo $_GET['pid'] ?>">Medication</a></nobr></TD>
                            <TD>Daily Drugs Administration</TD>
                            </tr>
                            <TR  height=1> 
                                <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
                            </TR>
                            </TBODY>

                            <TBODY class="submenu">
                                <TR> 
                                    <td align=center><img src="../../gui/img/common/default/yellowlist.gif" border=0></td>
                                    <TD class="submenu_item"><nobr><a href="nursing-getmedx.php?lang=en&sid=<?php echo session_id(); ?>&origin=pass&target=list&dept_nr=47&checkintern=1">Treatment Sheet</a></nobr></TD>
                            <TD>Treatment Sheet/Report</TD>
                            </tr>
                            <TR  height=1> 
                                <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
                            </TR>
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
        <?php require($root_path . 'include/inc_load_copyrite.php'); ?>
    </td>
</tr>
</tbody>
</table>
</BODY>
<!--</HTML>-->
