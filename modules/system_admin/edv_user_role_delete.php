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

$breakfile = 'edv-system-admi-welcome.php' . URL_APPEND;
$returnfile = 'edv_user_roles_list.php' . URL_APPEND;
//$_SESSION['sess_file_return']='edv.php';

require_once($root_path . 'include/care_api_classes/class_access.php');
$user = & new Access($itemname);

if ($finalcommand == 'delete') {

    if (!$user->checkRoleUse($role_id)) {

        if ($user->DeleteRole($role_id)) {
            header("location: edv_user_roles_list.php?sid=" . $sid . "&lang=" . $lang . "&remark=itemdelete");
            exit;
        } else {
            echo '<p>' . $LDDbNoDelete . '<p>' . $user->getLastQuery();
        }
    } else {
        echo '<p>' . $LDDbNoDelete . '<p>' . 'Role in use by users';
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
$smarty->assign('sToolbarTitle', "$LDEDP::$LDManageAccessRoles::$LDDelete");

# hide return button
$smarty->assign('pbBack', $returnfile);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('edp.php','access','delete')");

# href for close button
$smarty->assign('breakfile', $breakfile);

# Window bar title
$smarty->assign('sWindowTitle', "$LDEDP::$LDAccessRoles::$LDDelete");

# Buffer page output

ob_start();
?>

<p>

<center>
    <table width=50% border=1 cellpadding="20">
        <tr>
            <td bgcolor="#ffffdd"><font face=verdana,arial size=2>
                <p>
                <?php echo $LDSureDeleteRole ?><p>

                <table border="0" cellpadding="5" cellspacing="1">
                    <tr>
                        <td align=right><font face=verdana,arial size=2 color=#000080><?php echo $LDRoleID ?>:
                        </td><td><font face=verdana,arial size=2 color=#800000>
                            <?php
                            echo $role_id;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td align=right><font face=verdana,arial size=2 color=#000080><?php echo $LDRoleDescr ?>:</td>
                        <td><font face=verdana,arial size=2 color=#800000>
                            <?php
                            echo $user->roleDescr($role_id);
                            ?>
                        </td>
                    </tr>
                </table>

                <br>
                <FORM action="edv_user_role_delete.php" method="post">
                    <INPUT type="hidden" name="role_id" value="<?php echo $role_id ?>">
                    <input type="hidden" name="finalcommand" value="delete">
                    <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                    <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                    <INPUT type="submit" name="versand" value="<?php echo $LDYesDeleteRole ?>"></font></FORM>
                <p>
                    <a href="<?php echo $returnfile ?>"><img <?php echo createLDImgSrc($root_path, 'cancel.gif', '0') ?>  alt="<?php echo $LDCancel ?>" align="middle"></a>

                    </center>

            </td>
        </tr>
    </table>        

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
