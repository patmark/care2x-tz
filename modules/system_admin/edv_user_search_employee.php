<?php
//error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
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
$lang_tables = array('personell.php', 'edp.php');
define('LANG_FILE', 'aufnahme.php');
$local_user = 'ck_edv_user';
require_once($root_path . 'include/inc_front_chain_lang.php');
require_once($root_path . 'include/inc_date_format_functions.php');
require_once($root_path . 'include/care_api_classes/class_personell.php');

$toggle = 0;
$breakfile = 'edv_user_access_edit.php' . URL_APPEND . '&target=' . $target;
/* Set color values for the search mask */
$searchmask_bgcolor = '#f3f3f3';
$searchprompt = $LDEntryPrompt;
$entry_block_bgcolor = '#fff3f3';
$entry_border_bgcolor = '#6666ee';
$entry_body_bgcolor = '#ffffff';

if (!isset($searchkey)) {
    $searchkey = '';
}
if (!isset($mode)) {
    $mode = '';
}

//$db->debug=1;
$search_sql = '';
if (($mode === 'search') && ($searchkey)) {
    /* Load global config */
    $suchwort = trim($searchkey);

    if (is_numeric($suchwort)) {
        $suchbuffer = (int) $suchwort;
        $numeric = 1;
        //Search using pid or personnel #
        $search_sql .= " pn.pid LIKE '%$suchbuffer' OR pn.nr LIKE '%$suchbuffer'";
//        echo $suchbuffer;
//        exit();
    } else {
        $suchbuffer = $suchwort;
        $keys = explode(" ", $searchkey);
//        $keyCount = 0;
//        foreach ($keywords as $keys) {
//            if ($keyCount > 0) {
//                $search_sql .= " AND";
//            }
        if (count($keys) == 3) {
            $search_sql .= " p.name_first LIKE '%$keys[0]%' AND (p.name_middle LIKE '%$keys[1]%' OR p.name_2 LIKE '%$keys[1]%') AND p.name_last LIKE '%$keys[2]%'";
        } else if (count($keys) == 2) {
            $search_sql .= " p.name_first LIKE '%$keys[0]%' AND (p.name_middle LIKE '%$keys[1]%' OR p.name_last LIKE '%$keys[1]%' OR p.name_2 LIKE '%$keys[1]%')";
        } else if (count($keys) == 1) {
            $search_sql .= " p.name_first LIKE '%$keys[0]%' OR p.name_middle LIKE '%$keys[0]%' OR p.name_last LIKE '%$keys[0]%' OR p.name_2 LIKE '%$keys[1]%'";
        }
//            ++$keyCount;
//        }
    }

    if (addslashes($suchwort) != '*') {
        $sql = "SELECT * FROM care_person p, care_personell pn  WHERE p.pid=pn.pid AND $search_sql LIMIT 0, 10";
    } else {
        $sql = "SELECT * FROM care_person p, care_personell pn WHERE p.pid=pn.pid LIMIT 0, 99";
    }

//    echo $sql;
//    exit();

    /* Create personell object */
    $personell_obj = new Personell();

    if ($ergebnis = $db->Execute($sql)) {

        if ($linecount = $ergebnis->RecordCount()) {

            if (($linecount == 1) && $numeric) {
                $zeile = $ergebnis->FetchRow();
//                print_r($zeile['nr']);
                //Check if already a user
//                $userid = $personell_obj->userExists($zeile['nr']);
//                echo $userid;
                if ($personell_obj->userExists($zeile['nr'])) {
                    $userid = $personell_obj->userExists($zeile['nr']);
                    $append = '&mode=edit&userid=' . $userid;
                } else {
                    $mode = 'new';
                    $append = '&is_employee=1&personell_nr=' . $zeile['nr'] . '&username=' . strtr(($zeile['name_first'] . ' ' . $zeile['name_last']), ' ', '+') .
                            '&mode=' . $mode . '&userid=' . strtr(($zeile['name_first'] . '.' . $zeile['name_last']), ' ', '+');
                }
                header("location:edv_user_access_edit.php" . URL_REDIRECT_APPEND . $append);
                exit;
            }
        }
    } else {
//        echo "<p>" . $sql . "<p>$LDDbNoRead";
    }
} else {
    $mode = '';
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
$smarty->assign('sToolbarTitle', "$LDPersonellData :: $LDSearch");

# hide return button
$smarty->assign('pbBack', FALSE);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('employee_search.php')");

# href for close button
$smarty->assign('breakfile', $breakfile);

# Window bar title
$smarty->assign('sWindowTitle', "$LDPersonellData :: $LDSearch");

# Body onLoad Javascript
$smarty->assign('sOnLoadJs', 'onLoad="document.searchform.searchkey.select()"');

# Buffer page output

ob_start();
?>

<ul>

    <table border=0 cellpadding=10 bgcolor="<?php echo $entry_border_bgcolor ?>">
        <tr>
            <td>
                <?php
                include($root_path . 'include/inc_patient_searchmask.php');
                ?>
            </td>
        </tr>
    </table>


    <p>
        <a href="<?php echo $breakfile; ?>"><img <?php echo createLDImgSrc($root_path, 'cancel.gif', '0') ?>></a>
    <p>

        <?php
        if ($mode == 'search') {

            if (!$linecount) {
                $linecount = 0;
            }

            echo '<hr width=80% align=left><p>' . str_replace("~nr~", $linecount, $LDSearchFound) . '<p>';

            if ($linecount) {

                /* Load the common icons & images */
                $img_options = createLDImgSrc($root_path, 'ok_small.gif', '0');
                $img_status = createComIcon($root_path, 'redflag.gif');
                $bg_skin = createBgSkin($root_path, 'tableHeaderbg.gif');
                ?>
            <table border=0 cellpadding=2 cellspacing=1>
                <tr class="wardlisttitlerow">
                    <td><b><?php echo $LDStatus; ?></b></td>
                    <td><b><?php echo $LDUserId; ?></b></td>
                    <td><b><?php echo $LDName; ?></b></td>
                    <td><b><?php echo $LDOptions; ?></td>
                </tr>

                <?php
                while ($zeile = $ergebnis->FetchRow()) {

                    echo "<tr class=";
                    if ($toggle) {
                        echo '"wardlistrow2">';
                    } else {
                        echo '"wardlistrow1">';
                    }
                    $toggle = !$toggle;


                    if ($personell_obj->userExists($zeile['nr'])) {
                        echo'<td align="center">&nbsp;';
                        echo '<img ' . $img_status . '>';
                        echo "</td>";
                        $mode = 'edit';
                        $alt = $LDEdit;
                        $append = '&mode=' . $mode . '&userid=' . $personell_obj->userExists($zeile['nr']);
                        echo"<td>";
                        echo '&nbsp;' . $personell_obj->userExists($zeile['nr']);
                        echo "</td>";
                    } else {
                        echo'<td align="center">&nbsp;';
                        echo "</td>";
                        $mode = 'new';
                        $alt = $LDCreate;
                        $append = '&is_employee=1&personell_nr=' . $zeile['nr'] . '&username=' . strtr(($zeile['name_first'] . ' ' . $zeile['name_last']), ' ', '+') .
                                '&mode=' . $mode . '&userid=' . strtr(($zeile['name_first'] . '.' . $zeile['name_last']), ' ', '+');
                        echo"<td>";
                        echo "</td>";
                    }

                    echo"<td>";
                    echo "&nbsp;" . $zeile['name_first'] . ' ' . $zeile['name_middle'] . ' ' . $zeile['name_last'] . ' ' . $zeile['name_2'];
                    echo "</td>";

                    echo '
				<td>&nbsp;
					<a href="edv_user_access_edit.php' . URL_APPEND . $append . '">
					<img ' . $img_options . ' alt="' . $alt . '"></a>&nbsp;';

                    if (!file_exists($root_path . 'cache/barcodes/en_' . $full_en . '.png')) {
                        echo "<img src='" . $root_path . "classes/barcode/image.php?code=" . ($zeile['nr'] + $GLOBAL_CONFIG['personell_nr_adder']) . "&style=68&type=I25&width=180&height=50&xres=2&font=5&label=2&form_file=en' border=0 width=0 height=0>";
                    }
                    echo '</td></tr>';
                }
                echo "
			</table>";
                if ($linecount > 15) {
                    /* Set the appending nr for the searchform */
                    $searchform_count = 2;
                    ?>
                    <p>
                    <table border=0 cellpadding=10 bgcolor="<?php echo $entry_border_bgcolor ?>">
                        <tr>
                            <td>
                                <?php
                                include($root_path . 'include/inc_patient_searchmask.php');
                                ?>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
            }
        }
        ?>
        <p>

            </ul>

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