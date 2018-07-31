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

$edit = 0;
$error = 0;
global $db;

if (!isset($mode))
    $mode = '';
if (!isset($errorname))
    $errorname = '';
if (!isset($erroruser))
    $erroruser = '';
//if (!isset($username))
//    $username = '';
if (!isset($userid))
    $userid = '';
if (!isset($errorpass))
    $errorpass = '';
if (!isset($pass))
    $pass = '';
if (!isset($errorbereich))
    $errorbereich = '';

$pers_obj = new Personell;

if (isset($_POST['pwd_change']) && $_POST['pwd_change'] == 1 && $mode == 'edit') {
    $pass = $_REQUEST['pass1'];
    $userid = $_REQUEST['userid'];
    $role_id = $_REQUEST['role_id'];
    $pers_obj->ResetPassword($userid, $pass);
}

//$mode = $_REQUEST['mode'];

if ($mode != '') {

    if ($mode != 'edit' && $mode != 'update' && $mode != 'data_saved') { //New entry
        /* Trim white spaces off */
        $username = trim($username);
        $userid = trim($userid);
        //get last name from userid as default password
        $names = explode('.', $userid);
        $pass = trim($names[1]);

//        if ($username == '') {
//            $errorname = 1;
//            $error = 1;
//        }
        if ($userid == '') {
            $erroruser = 1;
            $error = 1;
        }
        if ($pass == '') {
            $errorpass = 1;
            $error = 1;
        }
        if ($role_id == '') {
            $errorrole = 1;
            $error = 1;
        }
    }


    if (($mode == 'save' && !$error ) || ($mode == 'update' && !$erroruser)) {
//echo 'kkkkkkklll'.$mode;
        /* Prepare the permission codes */
//        $p_areas = '';
//        $sql = "SELECT * FROM care_menu_main";
//        $result = $db->Execute($sql);
//
//        while (list($x, $v) = each($_POST)) {
//            if (!ereg('_a_', $x))
//                continue;
//            if ($_POST[$x] != '')
//                $p_areas.=$v . ' ';
//        }

        /* If permission area is available, save it */
        if ($role_id != '') {
            if ($mode == 'save') {

                $sql = "INSERT INTO care_users
						(
						   login_id,
						   password,
						   role_id,
						   personell_nr,
						   s_date,
						   s_time,
						   status,
						   modify_id,
						   create_id,
						   create_time
						 )
						 VALUES
						 (
						   '" . addslashes($userid) . "',
						   '" . md5($pass) . "',
						   '" . $role_id . "',
						   '" . $personell_nr . "',
						   '" . date('Y-m-d') . "',
						   '" . date('H:i:s') . "',
						   'normal',
						   '',
						   '" . $_SESSION['sess_user_name'] . "',
						   '" . date('YmdHis') . "'
						 )";
            } else if ($mode == 'update') {
                //Check if a new password is entered
                if (!isset($pass) || $pass == '' || $pass == ' ') {
                    $sql = "UPDATE care_users SET role_id ='$role_id', "
                            . "modify_id='" . $_COOKIE[$local_user . $sid] . "'  WHERE login_id='$userid'";
                } else {
                    $sql = "UPDATE care_users SET password = '" . md5($pass) . "', role_id ='$role_id', "
                            . "modify_id='" . $_COOKIE[$local_user . $sid] . "'  WHERE login_id='$userid'";
                }
            }
//            echo $sql;

            /* Do the query */
            $db->BeginTrans();
            $ok = $db->Execute($sql);
            //$ok=$db->Execute($sql2);
            if ($ok && $db->CommitTrans()) {
//                echo $sql;
                header('Location:edv_user_access_edit.php' . URL_REDIRECT_APPEND . '&userid=' . strtr($userid, ' ', '+') . '&mode=data_saved');
                exit;
            } else {
                $db->RollbackTrans();
                if ($mode != 'save')
                    $edit = 1;
                $mode = 'error_double';
                //echo "$sql $LDDbNoSave";
            }
        }
        else {

            if ($mode != 'save')
                $edit = 1;
            $mode = 'error_save';
        } // end if ($p_areas!="")
    }// end of if($mode=="save"
    /* @var $user type */
    $user;
    if ($mode == 'edit' || $mode == 'data_saved' || $edit) {

        $sql1 = "SELECT CONCAT(p.name_first, ' ', p.name_middle, ' ', p.name_last) AS name, u.personell_nr, login_id, ur.role_id, permission "
                . " FROM care_person p, care_users u, care_user_roles ur, care_personell pn "
                . " WHERE p.pid = pn.pid AND u.personell_nr = pn.nr "
                . " AND u.role_id = ur.role_id AND login_id='$userid'";
//        echo $sql1;
        if ($ergebnis1 = $db->Execute($sql1)) {

            if ($ergebnis1->RecordCount()) {

                $user = $ergebnis1->FetchRow();
                $edit = 1;
            }
        }
    }
}

//Get dropdown list for roles

$options = '';
$sql = "SELECT * FROM care_user_roles";

$result = $db->Execute($sql);

foreach ($result as $row) {
    if ($mode == 'edit' || $mode == 'data_saved' || $edit || isset($role_id)) {
        if ($row['role_id'] == $role_id) {
            $options.='<option value="' . $row['role_id'] . '" selected>' . $row['description'] . '</option>';
        } else if ($row['role_id'] == $user['role_id']) {
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

                <?php
                if ($error) {
                    ?>
                    <td class="warnprompt">
                        <?php
                        echo $LDInputError;
                    } elseif ($mode == 'data_saved') {
                        ?>
                    <td class="successpromt">
                        <?php
                        echo $LDUserInfoSaved;
                    } elseif ($mode == 'error_save') {
                        ?>
                    <td class="warnprompt">
                        <?php
                        echo $LDUserInfoNoSave;
                    } elseif ($mode == 'error_noareas') {
                        echo $LDNoAreas;
                    } elseif ($mode == 'error_double') {
                        echo $LDUserDouble;
                    }
                    ?></td>
            </tr>
        </table>
        <?php
    }
    ?>

    <FONT class="prompt">

    <?php
    if (($mode == "") && ($remark != 'fromlist')) {
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

    <form method="post" action="edv_user_access_edit.php" name="user">

        <!--<input type="image"  <?php // echo createLDImgSrc($root_path, 'savedisc.gif', '0', 'absmiddle')                              ?>>-->

        <?php
        if ($mode == 'data_saved' || $edit) {
            echo '<input type="button" value="' . $LDEnterNewUser . '" onClick="javascript:window.location.href=\'edv_user_access_edit.php' . URL_REDIRECT_APPEND . '&remark=fromlist\'">';
            echo '<input type="button" value="Change Password" onClick="javascript:window.location.href=\'edv_user_password_edit.php' . URL_REDIRECT_APPEND . '&userid=' . $userid . '\'">';
        }
        ?>
        <input type="button" value="<?php echo $LDFindEmployee; ?>" onClick="javascript:window.location.href = 'edv_user_search_employee.php<?php echo URL_REDIRECT_APPEND; ?>&remark=fromlist'">
        <?php if ($src != 'sysadmin' && ($mode == 'new' || $mode == 'edit')) { ?>
            <table border=0 bgcolor="#000000" cellpadding=0 cellspacing=0>
                <tr>
                    <td>

                        <table border="0" cellpadding="5" cellspacing="1">

                            <tr bgcolor="#dddddd">
                                <td colspan="3">
                                    <?php echo $LDNewAccess ?>:
                                </td>
                            </tr>

                            <tr bgcolor="#dddddd">
                                <td>
                                    <?php
                                    if ($errornr) {
                                        echo "<font color=red > <b>$LDPersonnelNo </b>";
                                    } else {
                                        echo $LDPersonnelNo . ': ';
                                    }
                                    ?>

                                    <?php
                                    if ($edit)
                                        echo '<input type="hidden" name="personell_nr" value="' . $user['personell_nr'] . '">' . '<b>' . $user['personell_nr'] . '</b>';
                                    else {
                                        ?>
                                        <input type="hidden" name="personell_nr" value="
                                               <?php if ($personell_nr != "") echo $personell_nr; ?>">
                                               <?php
                                               echo '<b>' . $personell_nr . '</b>';
                                           }
                                           ?>

                                    <br>
                                </td>                                

                                <td>
                                    <input type=hidden name=route value=validroute>


                                    <?php
                                    if ($errorname) {
                                        echo "<font color=red > <b>$LDName</b>";
                                    } else {
                                        echo $LDName . 's: ';
                                    }
                                    ?>

                                    <?php
                                    if ($edit) {
                                        ?> 
                                                                                                                                                                                                        <!--echo '<input type="hidden" name="username" value="' . $user['name'] . '">' . '<b>' . $user['name'] . '</b>';-->
                                                                                                                                                                                                        <!--<input name="username" type="text"--> 
                                        <?php
                                        if ($username != "") {
//                                            echo ' value="' . $username . '"';
                                            echo $username;
                                        } else {
//                                            echo ' value="' . $user['name'] . '"';
                                            echo $user['name'];
                                        }
                                        ?>
                                        <!-- > -->
                                        <?php
                                    } elseif (isset($is_employee) && $is_employee) {
                                        ?>
                                    <!--<input name="username" readonly="readonly"-->
                                        <?php
                                        if ($username != "") {
//                                            echo ' value="' . $username . '"><br>'
                                            echo '<b>' . $username . '</b>';
                                        } else {
//                                            echo ' value="' . $user['name'] . '"><br>'
                                            echo '<b>' . $user['name'] . '</b>';
                                        }
                                        ?> <?php
                                    } else {
                                        ?>

                                                                                                                                                                                                    <!--<input name="username" type="text"--> 
                                        <?php
                                        if ($username != "") {
                                            echo $username;
                                        } else {
//                                            echo ' value="' . $user['name'] . '"';
                                            echo $user['name'];
                                        }
                                        ?>
                                        <!-->-->
                                        <?php
                                    }
                                    ?>
                                    <br>
                                </td>
                                <td>
                                    <?php
                                    if ($erroruser) {
                                        echo "<font color=red > <b>$LDUserId</b>";
                                    } else {
                                        echo $LDUserId;
                                    }
                                    ?>

                                    <?php
                                    if ($edit)
                                        echo '<input type="hidden" name="userid" value="' . $user['login_id'] . '">' . '<b>' . $user['login_id'] . '</b>';
                                    else {
                                        ?>
                                        <input type=text name="userid"
                                               <?php if ($userid != "") echo 'value="' . strtolower($userid) . '"'; ?>>
                                               <?php
                                           }
                                           ?>

                                    <br>
                                </td>
    <!--                                    <td>
                                <?php
//                                    if ($errorpass) {
//                                        echo "<font color=red > <b>$LDPassword</b>";
//                                    } else {
//                                        echo $LDPassword;
//                                    }
                                ?>

                                <?php
//                                    if ($edit)
//                                        echo '<input type="password" name="pass">****';
//                                    else {
                                ?>
                                        <input type="password" name="pass" <?php // if ($pass != "") echo "value=" . $pass;                        ?>>

                                <?php
//                                    }
                                ?>

                                    <br>
                                </td>-->
                            </tr>

                            <tr bgcolor="#dddddd">
                                <td>
                                    <?php
                                    if ($errorrole) {
                                        echo "<font color=red > <b>$LDUserAccessRole</b> </font>";
                                    } else {
                                        echo $LDUserAccessRole;
                                    }
                                    ?>
                                </td>
                                <td colspan="2">
                                    <select name="role_id">
                                        <option value="">--Select--</option>
                                        <?php echo isset($select_role) ? $select_role : ""; ?>
                                    </select>
                                </td>
                            </tr> 
                            <tr bgcolor="#dddddd">
                                <td colspan=3>
                                    <p>
                                        <input type="hidden" name="personell_nr" value="<?php echo $personell_nr; ?>">
                                        <input type="hidden" name="itemname" value="<?php echo $itemname ?>">
                                        <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                        <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                                        <input type="hidden" name="mode" value="<?php
                                        if ($edit || $mode == 'data_saved' || $mode == 'edit') {
                                            echo 'update';
                                        } else if ($mode == 'new') {
                                            echo 'save';
                                        }
                                        ?>">
                                        <input type="image"  <?php echo createLDImgSrc($root_path, 'savedisc.gif', '0', 'absmiddle') ?>>
                                        <!-- <input type="reset"  value="<?php echo $LDReset ?>"> -->
                                </td>
                            </tr> 
                        </table>

                    </td>
                </tr>
            </table>
        <?php } ?>
    </form>
    <?php
//                            echo '<p >' .$mode .'</p>';
    ?>
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
