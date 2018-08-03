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
$lang_tables[] = 'access.php';
define('LANG_FILE', 'edp.php');
$local_user = 'ck_edv_user';

require_once($root_path . 'include/inc_front_chain_lang.php');
/**
 * The following require loads the access areas that can be assigned for
 * user permissions.
 */
require($root_path . 'include/inc_accessplan_areas_functions.php');

$breakfile = 'edv-system-admi-welcome.php' . URL_APPEND;
//$returnfile=$_SESSION['sess_file_return'].URL_APPEND;
$returnfile = 'edv_user_roles_edit.php' . URL_APPEND;
$_SESSION['sess_file_return'] = basename(__FILE__);

/* Load the date formatter */
include_once($root_path . 'include/inc_date_format_functions.php');

$sql = 'SELECT * FROM care_user_roles ORDER BY role_id';

if ($ergebnis = $db->Execute($sql)) {

    $rows = $ergebnis->RecordCount();
}

# Start Smarty templating here
/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme

require_once($root_path . 'gui/smarty_template/smarty_care.class.php');
$smarty = new smarty_care('system_admin');

# Title in toolbar
$smarty->assign('sToolbarTitle', $LDListRoles);

# href for return button
$smarty->assign('pbBack', $returnfile);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('edp.php','access','list')");

# href for close button
$smarty->assign('breakfile', $breakfile);

# Window bar title
$smarty->assign('sWindowTitle', $LDListRoles);

# Buffer page output

ob_start();

echo '
	<table border=0 class="frame" cellpadding=0 cellspacing=0>
		<tr>
		<td>';
echo '<input type="button" value="Add New Role" onClick="javascript:window.location.href=\'edv_user_roles_edit.php' . URL_REDIRECT_APPEND . '\'">';
echo '	</td>
	</tr>
    </table>
    </br>';

if ($remark == 'itemdelete') {
    echo '<img ' . createMascot($root_path, 'mascot1_r.gif', '0', 'absmiddle') . '><FONT class="warnprompt"> ' . $LDRoleDeleted . '<br>' . $LDFfActualRoles . ' </font><p>';
}

echo '
				<table border=0 class="frame" cellpadding=0 cellspacing=0>
				<tr>
				<td>
				<table border="0" cellpadding="5" cellspacing="1">';
echo '
					<tr class="submenu">';
echo "
					<td colspan=8><FONT color=\"#800000\"><b>$LDActualRole</b></td>";
echo "
					</tr>";
echo '
					<tr class="wardlisttitlerow">';
for ($i = 0; $i < sizeof($LDRoleIndex); $i++)
    echo "
			<td><b>" . $LDRoleIndex[$i] . "</b></td>";
echo "</tr>";

/* Load common icons */
$img_padlock = createComIcon($root_path, 'padlock.gif', '0');
$img_arrow = createComIcon($root_path, 'arrow-gr.gif', '0');

while ($zeile = $ergebnis->FetchRow()) {

    echo "
						<tr class=\"wardlistrow1\">\n";
    echo "
						<td>" . $zeile['role_id'] . "</td>\n
						<td>" . $zeile['description'] . "</td>\n";

    echo "<td>";

    /* Display the permitted areas */
    $area = explode(' ', $zeile['permission']);
    for ($n = 0; $n < sizeof($area); $n++) {
        echo $area_opt[$area[$n]] . '<br>';
    }

    echo '</td>
					<td>' . $zeile['create_id'] . '</td>';

    echo '
					<td> ' . formatDate2Local($zeile['create_time'], $date_format) . '</td>';
    echo '
					<td>' . $zeile['modify_id'] . '</td>';

    echo '
					<td> ' . formatDate2Local($zeile['modify_time'], $date_format) . '</td>';

    echo "
					<td>
					<a href=edv_user_roles_edit.php?sid=" . $sid . "&lang=" . $lang . "&mode=edit&role_id=" . $zeile['role_id'] . " title=\"$LDChange\"> $LDInitChange</a> \n
	
			<a href=edv_user_role_delete.php?sid=" . $sid . "&lang=" . $lang . "&role_id=" . $zeile['role_id'] . " title=\"$LDDelete\">	$LDInitDelete</a> </td>";
    echo "</tr>";
}
echo "
					</table>
				</td>
			</tr>
		</table>";
?>

<p>

<FORM method="post" action="<?php
echo "edv_user_roles_edit.php";
?>" >
    <input type=hidden name="sid" value="<?php echo $sid; ?>">
    <input type=hidden name="lang" value="<?php echo $lang; ?>">
    <input type=hidden name="remark" value="fromlist">
    <INPUT type="submit"  value=" <?php echo $LDOK ?> ">
</FORM>

<p>

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