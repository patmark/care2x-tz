<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
include($root_path . 'language/en/lang_en_reporting.php');
//require($root_path.'include/inc_environment_global.php');
require_once($root_path . 'include/care_api_classes/class_tz_insurance.php');

$insurance_obj = new Insurance_tz;
?>
<table width=100% border=0 cellspacing=0 height=100%>
    <tbody class="main">





        <tr>

            <td  valign="top" align="middle" height="35">
                <table width="770" border=0 align="center" cellspacing="0"  class="titlebar">
                    <tr valign=top  class="titlebar" >
                        <td width="423" bgcolor="#99ccff" >
                            &nbsp;&nbsp;<font color="#330066">INSURANCE COMPANIES REPORT</font></td>
                        <td width="238" align=right bgcolor="#99ccff">
                            <a href="javascript: history.back();"><img src="../../gui/img/control/default/en/en_back2.gif" /></a>
                        <td width="103" bgcolor="#99ccff" ><a href="<?php echo $root_path; ?>modules/reporting_tz/reporting_main_menu.php" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a></td>
                        </td>
                    </tr>
                </table>
                <P>














