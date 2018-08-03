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
define('LANG_FILE', 'edp.php');
$local_user = 'ck_edv_user';
require_once($root_path . 'include/inc_front_chain_lang.php');
/**
 * The following require loads the access areas that can be assigned for
 * user permissions.
 */
require($root_path . 'include/inc_accessplan_areas_functions.php');

require_once($root_path . 'include/inc_config_color.php');

$breakfile = 'edv.php?sid=' . $sid . '&lang=' . $lang;
$returnfile = $_SESSION['sess_file_return'] . URL_APPEND;
$_SESSION['sess_file_return'] = basename(__FILE__);

$thisfile = basename($_SERVER['PHP_SELF']);

if (isset($mode) && ($mode == 'search')) {

    if (!isset($db) || !$db)
        include_once($root_path . 'include/inc_db_makelink.php');

    if (isset($dblink_ok) && $dblink_ok) {
        /* Load the date formatter */
        include_once($root_path . 'include/inc_date_format_functions.php');


        $sql = 'SELECT * FROM care_users WHERE exc <> 1 AND (login_id LIKE "' . addslashes($name) . '%" OR name LIKE "' . addslashes($name) . '%")';

        if ($ergebnis = $db->Execute($sql)) {

            $rows = $ergebnis->RecordCount();
        }
    } else {
        echo "$LDDbNoLink<br>$sql";
    }
}
?>

    <?php html_rtl($lang); ?>
<HEAD>
    <?php echo setCharSet(); ?>
    <?php
    require($root_path . 'include/inc_css_a_hilitebu.php');
    ?>
    <script language="javascript">
<!-- 

        function gethelp(x, s, x1, x2, x3)
        {
            if (!x)
                x = "";
            urlholder = "<?php echo $root_path; ?>help-router.php<?php echo URL_REDIRECT_APPEND ?>&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3;
            helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
            window.helpwin.moveTo(0, 0);
        }
        // -->
    </script>
</HEAD>

<BODY topmargin=0 leftmargin=0 marginheight=0 marginwidth=0 bgcolor=<?php echo $cfg['bot_bgcolor']; ?> onLoad="document.searchwin.name.select()">


    <FONT    SIZE=-1  FACE="Arial">

    <P>


    <table width=100% border=0 cellspacing=0>
        <tr>
            <td bgcolor="<?php echo $cfg['top_bgcolor']; ?>" height="45"><FONT  COLOR="<?php echo $cfg['top_txtcolor']; ?>"  SIZE=+2  FACE="Arial">
                <STRONG> <?php echo "$LDEDP $LDAccessRight $LDSearch" ?></STRONG></FONT></td>
            <td bgcolor="<?php echo $cfg['top_bgcolor']; ?>" height="10" align=right>
<?php if ($cfg['dhtml']) echo'<a href="' . $returnfile . '"><img ' . createLDImgSrc($root_path, 'back2.gif', '0') . '  style=filter:alpha(opacity=70) onMouseover=hilite(this,1) onMouseOut=hilite(this,0)>'; ?></a>
                <a href="javascript:gethelp('')"><img <?php echo createLDImgSrc($root_path, 'hilfe-r.gif', '0') ?>  <?php if ($cfg['dhtml']) echo'style=filter:alpha(opacity=70) onMouseover=hilite(this,1) onMouseOut=hilite(this,0)>'; ?></a><a href="<?php echo $breakfile; ?>"><img <?php echo createLDImgSrc($root_path, 'close2.gif', '0') ?> alt="<?php echo $LDClose ?>"  <?php if ($cfg['dhtml']) echo'style=filter:alpha(opacity=70) onMouseover=hilite(this,1) onMouseOut=hilite(this,0)>'; ?></a></td>
        </tr>
        <tr>
            <td bgcolor=<?php echo $cfg['body_bgcolor']; ?> colspan=2>

                <p><br>
                <ul>

                    <?php
                    if (($mode == 'search') && ($rows)) {
                        echo '
				<table border=0 bgcolor="#999999" cellpadding=0 cellspacing=0>
				<tr><td>
				<table border="0" cellpadding="5" cellspacing="1">';
                        echo '
					<tr bgcolor="#dddddd" background="' . $root_path . 'gui/img/common/default/tableHeaderbg3.gif">';
                        echo "
					<td colspan=8><FONT SIZE=1  FACE=verdana,Arial color=\"#800000\"><b>$LDActualAccess</b></td>";
                        echo "
					</tr>";
                        echo '
					<tr bgcolor="#dfdfdf">';
                        for ($i = 0; $i < sizeof($LDAccessIndex); $i++)
                            echo "
			<td><FONT    SIZE=1  FACE=verdana,Arial><b>" . $LDAccessIndex[$i] . "</b></td>";
                        echo "</tr>";

                        while ($zeile = $ergebnis->FetchRow()) {
                            if ($zeile['exc'])
                                continue;
                            echo '
						<tr  bgcolor="#efefef">';
                            echo "
						<td><FONT    SIZE=1  FACE=Arial>" . $zeile['name'] . "</td>\n
						<td><FONT    SIZE=1  FACE=Arial>" . $zeile['login_id'] . "</td>\n
						<td><FONT    SIZE=1  FACE=Arial>****</td><td>\n";
                            if ($zeile['lockflag'])
                                echo '
				   		<img ' . createComIcon($root_path, 'padlock.gif', '0') . '>';
                            else
                                echo '<img ' . createComIcon($root_path, 'arrow-gr.gif', '0') . '>';


                            echo "
						</td>\n <td><FONT    SIZE=1  FACE=Arial>";
                            /* Display the permitted areas */

                            $area = explode(' ', $zeile['permission']);

                            for ($j = 0; $j < sizeof($area); $j++)
                                echo $area_opt[$area[$j]] . '<br>';

                            echo '</td>
					<td><FONT    SIZE=1  FACE=Arial> ' . formatDate2Local($zeile['s_date'], $date_format) . ' / ' . convertTimeToLocal($zeile['s_time']) . ' </td>';
                            echo "
					<td><FONT    SIZE=1  FACE=Arial>" . $zeile['create_id'] . "</td>";
                            echo "
					<td><FONT    SIZE=1  FACE=verdana,Arial>
					<a href=edv_user_access_edit.php?sid=" . $sid . "&lang=" . $lang . "&mode=edit&userid=" . str_replace(' ', '+', $zeile['login_id']) . " title=\"$LDChange\"> $LDInitChange</a> \n
			<a href=edv_user_access_lock.php?sid=" . $sid . "&lang=" . $lang . "&itemname=" . str_replace(' ', '+', $zeile['login_id']) . " ";
                            if ($zeile['lockflag'])
                                echo "title=\"$LDUnlock\" > $LDInitUnlock";
                            else
                                echo "title=\"$LDLock\"> $LDInitLock";
                            echo "</a> \n
			<a href=edv_user_access_delete.php?sid=" . $sid . "&lang=" . $lang . "&itemname=" . str_replace(' ', '+', $zeile['login_id']) . " title=\"$LDDelete\">	$LDInitDelete</a> </td>";
                            echo "</tr>";
                        };
                        echo "
					</table>
				</td></tr>
				</table>";
                    }
                    ?>

                    <form method="post" action="<?php echo $thisfile; ?>" name="searchwin">
                        <table  border=1 cellpadding="20">
                            <tr>
                                <td bgcolor="#ffffdd"><font face=verdana,arial size=2 color=#800000>
                                    <p>
                                        <b><?php echo $LDKeywordPrompt ?></b><p>

                                    <table border="0" cellpadding="5" cellspacing="1">
                                        <tr>
                                            <td><font face=verdana,arial size=2 color=#000080><?php echo "$LDName / $LDUserId" ?>:<br>
                                                <input type="text" name="name" size=25 maxlength=40>
                                            </td>
                                        </tr>

                                        <tr><td><input type="image" <?php echo createLDImgSrc($root_path, 'searchlamp.gif', '0') ?>>
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                    <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                                    <input type="hidden" name="mode" value="search">

                                    </form>
                                    </ul>
                                </td>
                            </tr>
                        </table>        

                        <p>

                            </td>
                            </tr>
                            </table>        
                            <br>

                        <FORM  method=get action="<?php echo $breakfile; ?>" >
                            <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                            <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                            <INPUT type="submit"  value="<?php echo $LDCancel ?>"></FORM>
                        <p>

<?php
require($root_path . 'include/inc_load_copyrite.php');
?>


                            </FONT>


                            </BODY>
                            </HTML>
