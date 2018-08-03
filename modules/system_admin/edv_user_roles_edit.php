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
//require_once($root_path . 'include/care_api_classes/class_personell.php');
/**
 * The following require loads the access areas that can be assigned for
 * user permissions.
 */
require($root_path . 'include/inc_accessplan_areas_functions.php');

$breakfile = 'edv-system-admi-welcome.php' . URL_APPEND;
$returnfile = $_SESSION['sess_file_return'] . URL_APPEND;
$_SESSION['sess_file_return'] = basename(__FILE__);

$edit = 0;
$error = 0;

if (!isset($mode))
    $mode = '';
if (!isset($errorbereich))
    $errorbereich = '';

if ($mode != '') {
    if ($mode != 'edit' && $mode != 'update' && $mode != 'data_saved') {
        if ($description == '') {
            $errordescr = 1;
            $error = 1;
        }
    }


    if (($mode == 'save' && !$error ) || ($mode == 'update' && !$errordescr)) {

        /* Prepare the permission codes */
        $p_areas = '';

        $sql = "SELECT * FROM care_menu_main";
        $result = $db->Execute($sql);

        while (list($x, $v) = each($_POST)) {
            if (!ereg('_a_', $x)) {
                if (!ereg('Sys', $x)) {
                    continue;
                }
            }
            if ($_POST[$x] != '') {
                $p_areas.=$v . ' ';
            }
        }

        /* If permission area is available, save it */
        if ($p_areas != '') {
            if ($mode == 'save') {

                $sql = "INSERT INTO care_user_roles
						(
						   description,
						   permission,
						   create_id,
						   create_time
						 )
						 VALUES
						 (
						   '" . addslashes($description) . "',
						   '" . $p_areas . "',
						   '" . $_COOKIE[$local_user . $sid] . "',
						   '" . date('YmdHis') . "'
						 )";
            } else {
                $sql = "UPDATE care_user_roles SET description = '" . addslashes($description) . "',"
                        . " permission='" . $p_areas . "', modify_id='" . $_COOKIE[$local_user . $sid] . "'  WHERE role_id='$role_id'";
            }

            /* Do the query */
            $db->BeginTrans();
            $ok = $db->Execute($sql);
            //$ok=$db->Execute($sql2);
            if ($ok && $db->CommitTrans()) {
                //echo $sql;
                header('Location:edv_user_roles_list.php' . URL_REDIRECT_APPEND . '&mode=data_saved');
                exit;
            } else {
                $db->RollbackTrans();
                if ($mode != 'save')
                    $edit = 1;
                $mode = 'error_double';
                //echo "$sql $LDDbNoSave";
            }
        } else {
            if ($mode != 'save')
                $edit = 1;
            $mode = 'error_noareas';
        } // end if ($p_areas!="")
    }// end of if($mode=="save"

    if ($mode == 'edit' || $mode == 'data_saved' || $edit) {
//        echo $role_id.'dddd';

        $sql1 = "SELECT * FROM care_user_roles WHERE role_id='$role_id'";

        if ($ergebnis1 = $db->Execute($sql1)) {

            if ($ergebnis1->RecordCount()) {

                $role = $ergebnis1->FetchRow();
                $edit = 1;
            }
        }
    }
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
$smarty->assign('sToolbarTitle', $LDManageAccessRoles);

# href for return button
$smarty->assign('pbBack', $returnfile);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('edp.php','access','$mode')");

# href for close button
$smarty->assign('breakfile', $breakfile);

# Window bar title
$smarty->assign('sWindowTitle', $LDManageAccessRoles);

# Buffer page output

ob_start();
?>

<ul>

    <?php
    //if ($mode=='data_saved' || $error ||  $mode=='error_noareas' || $mode=='data_nosave' )

    if (($mode != '' || $error ) && $mode != 'edit') {
        ?>
        <table border=0>
            <tr>
                <td><img <?php echo createMascot($root_path, 'mascot1_r.gif', '0', 'bottom') ?> align="absmiddle"></td>
                <td class="warnprompt">
                    <?php
                    if ($error)
                        echo $LDInputError;
                    elseif ($mode == 'data_saved')
                        echo $LDRoleInfoSaved;
                    elseif ($mode == 'error_save')
                        echo $LDRoleInfoNoSave;
                    elseif ($mode == 'error_noareas')
                        echo $LDNoAreas;
                    elseif ($mode == 'error_double')
                        echo $LDRoleDouble;
                    ?></td>
            </tr>
        </table>
        <?php
    }
    ?>

    <FONT class="prompt">

    <?php
    if (($mode == "")and ( $remark != 'fromlist')) {
        $gtime = date('H.i');
        if ($gtime < '9.00')
            echo $LDGoodMorning;
        if (($gtime > '9.00')and ( $gtime < '18.00'))
            echo $LDGoodDay;
        if ($gtime > '18.00')
            echo $LDGoodEvening;
        echo ' ' . $_COOKIE[$local_user . $sid];
    }
    ?>

    <p>
    <FORM action="edv_user_roles_list.php" name="all">

        <input type="hidden" name="sid" value="<?php echo $sid; ?>">
        <input type="hidden" name="lang" value="<?php echo $lang; ?>">
        <input type="submit" name=message value="<?php echo $LDListRoles ?>">

    </FORM>
    <p>
        </FONT>

    <form method="post" action="edv_user_roles_edit.php" name="user">

        <input type="image"  <?php echo createLDImgSrc($root_path, 'savedisc.gif', '0', 'absmiddle') ?>>

        <?php
        if ($mode == 'data_saved' || $edit) {
            echo '<input type="button" value="' . $LDEnterNewRole . '" onClick="javascript:window.location.href=\'edv_user_roles_edit.php' . URL_REDIRECT_APPEND . '&remark=fromlist\'">';
        }
        ?>
        <!--</br>-->
        <table border=0 bgcolor="#000000" cellpadding=0 cellspacing=0>
            <tr>
                <td>

                    <table border="0" cellpadding="5" cellspacing="1">

                        <tr bgcolor="#dddddd">
                            <td colspan="3">
                                <?php echo $LDNewRole ?>:
                            </td>
                        </tr>

                        <tr bgcolor="#dddddd">
                            <td>
                                <input type=hidden name=route value=validroute>


                                <?php
                                if ($errordescr) {
                                    echo "<font color=red > <b>$LDRoleDescr</b>";
                                } else {
                                    echo $LDRoleDescr;
                                }
                                ?>

                                <?php
                                if ($edit) {
                                    echo '<input type="hidden" name="description" value="' . $role['description'] . '">' . '<b>' . $role['description'] . '</b>';
                                }
                                ?>
                                <input name="description" type="text" value="<?php echo $role['description']; ?>">
                                <br>
                            </td>

                        </tr>


                        <tr bgcolor="#dddddd">
                            <td  colspan=3>

                                <table border=0 cellspacing=0 width=100%>

                                    <!--  The list of the permissible areas are displayed here  -->

                                    <?php
                                    /* Loop through the elements of the access area tags */
                                    while (list($x, $v) = each($area_opt)) {

                                        echo '<tr  bgcolor="white">';

                                        if (eregi('title', $x)) {  // If title print it out
                                            echo ' <td  valign=top bgcolor="#81eff5" colspan=5><FONT  SIZE=2  FACE="Arial">' . $v . '</td>';
                                        } else {
                                            // get the colum index
                                            $cindex = substr($x, 3, 1);

                                            // extract the actual index name
                                            //$x_name=substr($x,strpos($x,'x')+1);


                                            switch ($cindex) {
                                                case 0: echo '
		                      <td  valign=top colspan=5><img  ' . createComIcon($root_path, 'redpfeil.gif', '0', 'absmiddle') . '><input type="checkbox" name="' . $x . '" value="' . $x . '" ';
                                                    if ($edit && strstr($role['permission'], $x))
                                                        echo 'checked ><FONT    SIZE=2  FACE="Arial" color="#ff0000">';
                                                    else
                                                        echo '>';
                                                    echo $v . '</td>';

                                                    break;
                                                case 1: echo '
		                      <td><img src="p.gif" width=15></td><td  valign=top colspan=4><img src="tl2-blue.gif" border=0 width=20 height=21 align="absmiddle"><input type="checkbox" name="' . $x . '" value="' . $x . '" ';
                                                    if ($edit && strstr($role['permission'], $x))
                                                        echo 'checked ><FONT    SIZE=2  FACE="Arial" color="#ff0000">';
                                                    else
                                                        echo '>';
                                                    echo $v . '</td>';

                                                    break;
                                                case 2: echo '
		                      <td><img src="p.gif" width=15><td><img src="p.gif" width=15><td  valign=top colspan=3><img src="tl2-blue.gif" border=0 width=20 height=21 align="absmiddle"><input type="checkbox" name="' . $x . '" value="' . $x . '" ';
                                                    if ($edit && strstr($role['permission'], $x))
                                                        echo 'checked ><FONT    SIZE=2  FACE="Arial" color="#ff0000">';
                                                    else
                                                        echo '>';
                                                    echo $v . '</td>';

                                                    break;
                                                case 3: echo '
		                       <td><img src="p.gif" width=15><td><img src="p.gif" width=15><td><img src="p.gif" width=15><td  valign=top colspan=2><img src="tl2-blue.gif" border=0 width=20 height=21 align="absmiddle"><input type="checkbox" name="' . $x . '" value="' . $x . '" ';
                                                    if ($edit && strstr($role['permission'], $x))
                                                        echo 'checked ><FONT    SIZE=2  FACE="Arial" color="#ff0000">';
                                                    else
                                                        echo '>';
                                                    echo $v . '</td>';

                                                    break;
                                                case 4: echo '
		                       <td><img src="p.gif" width=15><td><img src="p.gif" width=15><td><img src="p.gif" width=15><td><img src="p.gif" width=15><td  valign=top colspan=1><img src="tl2-blue.gif" border=0 width=20 height=21 align="absmiddle"><input type="checkbox" name="' . $x . '" value="' . $x . '" ';
                                                    if ($edit && strstr($role['permission'], $x))
                                                        echo 'checked ><FONT    SIZE=2  FACE="Arial" color="#ff0000">';
                                                    else
                                                        echo '>';
                                                    echo $v . '</td>';

                                                    break;
                                            }
                                        }

                                        echo '</tr>';
                                    }
                                    ?>

                                </table>

                            </td>
                        </tr>

                        <tr bgcolor="#dddddd">
                            <td colspan=3>
                                <p>
                                    <input type="hidden" name="personell_nr" value="<?php echo $personell_nr; ?>">
                                    <input type="hidden" name="role_id" value="<?php echo $role_id ?>">
                                    <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                    <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                                    <input type="hidden" name="mode" value="<?php
                                    if ($edit || $mode == 'data_saved' || $mode == 'edit')
                                        echo 'update';
                                    else
                                        echo 'save';
                                    ?>">
                                    <input type="image"  <?php echo createLDImgSrc($root_path, 'savedisc.gif', '0', 'absmiddle') ?>>
                                    <!-- <input type="reset"  value="<?php echo $LDReset ?>"> -->
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>

    </form>

    <p>
        <a href="<?php echo $breakfile ?>" ><img <?php echo createLDImgSrc($root_path, 'cancel.gif', '0') ?> alt="<?php echo $LDCancel ?>" align="middle"></a>

</ul>

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
