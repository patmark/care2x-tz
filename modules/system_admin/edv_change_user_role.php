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
require_once($root_path . 'include/care_api_classes/class_personell.php');
/**
 * The following require loads the access areas that can be assigned for
 * user permissions.
 */
require($root_path . 'include/inc_accessplan_areas_functions.php');

$breakfile = 'edv-system-admi-welcome.php' . URL_APPEND;
$returnfile = $_SESSION['sess_file_return'] . URL_APPEND;
$_SESSION['sess_file_return'] = basename(__FILE__);
$error = 0;
if ($mode == 'update') {
    if (!isset($_REQUEST['role_id']) || $_REQUEST['role_id'] == '') {
        $error = 1;
    } else {
        $sql = "UPDATE care_users SET role_id =" . $_REQUEST['role_id'] . ", "
                . "modify_id='" . $_COOKIE[$local_user . $sid] . "'  WHERE login_id='" . $itemname . "'";
    }
    $db->BeginTrans();
    $ok = $db->Execute($sql);
    if ($ok && $db->CommitTrans()) {
        header('Location:edv_change_user_role.php' . URL_REDIRECT_APPEND . '&itemname=' . $itemname . '&mode=data_saved&sid=' . $sid . '');
        exit;
    } else {
        $db->RollbackTrans();
        if ($mode != 'update') {
            $mode = 'error_double';
        }
    }
}




$options = '';
$sql = "SELECT * FROM care_user_roles";

$result = $db->Execute($sql);

foreach ($result as $row) {
    if ($mode == 'edit' || $mode == 'data_saved' || $edit || isset($role_id)) {
        if ($row['role_id'] == $role_id) {
            $options.='<option value="' . $row['role_id'] . '" selected>' . $row['description'] . '</option>';
        } else {
            $options.='<option value="' . $row['role_id'] . '">' . $row['description'] . '</option>';
        }
    } else {
        $options.='<option value="' . $row['role_id'] . '">' . $row['description'] . '</option>';
    }
}
$select_role = $options;











# Start Smarty templating here
/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme

require_once($root_path . 'gui/smarty_template/smarty_care.class.php');
$smarty = new smarty_care('system_admin');

# Title in toolbar
$smarty->assign('sToolbarTitle', $LDManageAccess);

# href for return button
$smarty->assign('pbBack', $returnfile);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('edp.php','access','$mode')");

# href for close button
$smarty->assign('breakfile', $breakfile);

# Window bar title
$smarty->assign('sWindowTitle', $LDManageAccess);

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
        echo $LDUserInfoNoSave;
    elseif ($mode == 'error_noareas')
        echo $LDNoAreas;
    elseif ($mode == 'error_double')
        echo $LDUserDouble;
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
    <FORM action="edv_user_access_list.php" name="all">

        <input type="hidden" name="sid" value="<?php echo $sid; ?>">
        <input type="hidden" name="lang" value="<?php echo $lang; ?>">
        <input type="submit" name=message value="<?php echo $LDListActual ?>">

    </FORM>
    <p>
        </FONT>

    <form method="post" action="edv_change_user_role.php" name="user">

        <input type="image"  <?php echo createLDImgSrc($root_path, 'savedisc.gif', '0', 'absmiddle') ?>>



<?php
if ($mode == 'update') {
    echo '<input type="button" value="' . $LDEnterNewUser . '" onClick="javascript:window.location.href=\'edv_user_access_edit.php' . URL_REDIRECT_APPEND . '&remark=fromlist\'">';
    echo '<input type="button" value="Change Password" onClick="javascript:window.location.href=\'edv_user_password_edit.php' . URL_REDIRECT_APPEND . '&userid=' . $userid . '\'">';
}
?>
        <input type="button" value="<?php echo $LDFindEmployee; ?>" onClick="javascript:window.location.href = 'edv_user_search_employee.php<?php echo URL_REDIRECT_APPEND; ?>&remark=fromlist'">
        <table border=0 bgcolor="#000000" cellpadding=0 cellspacing=0>
            <tr>
                <td>
                    <table border="0" cellpadding="5" cellspacing="1">
                        <tr bgcolor="#dddddd">
                            <td colspan="3">
<?php echo $LDChangeUserRole ?>:
                            </td>
                        </tr>
                        <tr bgcolor="#dddddd">
                            <td>
<?php echo $LDUserId ?><input type="text" name="userid" value=<?php echo $itemname; ?> readonly >
                            </td>
                            <td>
                                <?php echo $LDUserAccessRole ?>

                            </td>
                            <td>
                                <select name="role_id">
                                    <option value="">--Select--</option>
<?php echo isset($select_role) ? $select_role : ""; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr bgcolor="#dddddd">
                <td colspan=3>
                    <p>
                        <input type="hidden" name="personell_nr" value="<?php echo $personell_nr; ?>">
                        <input type="hidden" name="itemname" value="<?php echo $itemname ?>">
                        <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                        <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                        <input type="hidden" name="mode" value="<?php echo 'update'; ?>">



                        <input type="image"  <?php echo createLDImgSrc($root_path, 'savedisc.gif', '0', 'absmiddle') ?>>
                        <!-- <input type="reset"  value="<?php echo $LDReset ?>"> -->
                </td>
            </tr>







            <p> 
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
