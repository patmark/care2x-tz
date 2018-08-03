<?php
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
require_once($root_path . 'include/care_api_classes/class_globalconfig.php');
$glob_obj = new GlobalConfig($GLOBAL_CONFIG);


global $db;
$debug = false;
($debug) ? $db->debug = true : $db->debug = FALSE;

if ($_REQUEST['change'] == true) {
    $sql = 'UPDATE care_config_global SET `value` = \'' . $_REQUEST['rest_weberp_stock_enable'] . '\', `modify_time` = NOW() WHERE CONVERT(`care_config_global`.`type` USING utf8) = \'rest_weberp_stock_enable\' LIMIT 1;';
    $db->Execute($sql);
}

$glob_obj->getConfig('rest_weberp_stock_enable');
if ($GLOBAL_CONFIG['rest_weberp_stock_enable'] == "") {
    $sql = 'INSERT INTO care_config_global (`type`, `value`, `notes`, `status`, `history`, `modify_id`, `modify_time`, `create_id`, `create_time`) '
            . 'VALUES (\'rest_weberp_stock_enable\', \'0\', NULL, \'\', \'\', \'\', NOW(), \'\', NOW());';
    $db->Execute($sql);
}
?>

<HTML>
    <HEAD>
        <TITLE>General Management - </TITLE>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta name="Author" content="Elpidio Latorilla">
        <meta name="Generator" content="various: Quanta, AceHTML 4 Freeware, NuSphere, PHP Coder">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <script language="javascript" >
<!--
            function gethelp(x, s, x1, x2, x3, x4)
            {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php?sid=<?php echo $sid . "&lang=" . $lang; ?>&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }
// -->

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
        <script language="JavaScript">
            <!--
        function popPic(pid, nm) {

                if (pid != "")
                    regpicwindow = window.open("../../main/pop_reg_pic.php?sid=<?php echo $sid . "&lang=" . $lang; ?>&pid=" + pid + "&nm=" + nm, "regpicwin", "toolbar=no,scrollbars,width=180,height=250");

            }
            // -->
        </script>


    </HEAD>
    <BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066  >
        <table width=100% border=0 cellspacing=0 height=100%>
            <tbody class="main">
                <tr>

                    <td  valign="top" align="middle" height="35">
                        <table cellspacing="0"  class="titlebar" border=0>
                            <tr valign=top  class="titlebar" >
                                <td bgcolor="#99ccff" >
                                    &nbsp;&nbsp;<font color="#330066">REST Service for WebERP Stock Interface Configuration</font>
                                </td>
                                <td bgcolor="#99ccff" align=right>
                                    <a  href="edv_generally_management.php?sid=<?php echo $sid . "&lang=" . $lang; ?>73&ntid=false"><img src="../../gui/img/control/blue_aqua/en/en_back2.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)" ></a><a
                                        href="javascript:gethelp('edp.php','access','')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a><a
                                        href="edv-system-admi-welcome.php?sid=<?php echo $sid . "&lang=" . $lang; ?>&ntid=false" ><img src="../../gui/img/control/blue_aqua/en/en_close2.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>     
                                </td>
                            </tr>

                        </table>

                        <br><br>
                        <form  method="post" name="form">
                            <table border=0 cellspacing=1 cellpadding=5>
                                <tr>
                                    <td class="adm_item" align="right"><FONT  color="#0000cc"><b><?php echo 'Enable the REST Stock Interface to WebERP?'; ?></b></FONT></td>
                                    <td  align="left">

                                        <select name="rest_weberp_stock_enable">
                                            <?php
                                            if ($GLOBAL_CONFIG['rest_weberp_stock_enable'] == 1) {
                                                echo '<option value="1" selected>Yes</option>';
                                                echo '<option value="0">No</option>';
                                            } else {
                                                echo '<option value="1">Yes</option>';
                                                echo '<option value="0" selected>No</option>';
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" name="change" value="true">
                                        <input type="submit" value="Change">
                                    </td>
                                </tr>

                            </table>
                        </form>


                        <ul>
                            </html>