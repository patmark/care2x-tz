<?php

/* ------begin------ This protection code was suggested by Luki R. luki@karet.org ----
 * 
 * Permission code modified by Mark Patrick markpatrick9@gmail.com
 * 
 * Added code to get child permissions and allow access for parent permission
 * 
 */

if (preg_match('/inc_passcheck.php/i', $_SERVER['PHP_SELF']))
    die('<meta http-equiv="refresh" content="0; url=../">');
/* ------end------ */

/**
 * CARE 2002 Integrated Hospital Information System
 * GNU General Public License
 * Copyright 2002 Elpidio Latorilla
 * elpidio@care2x.org,
 *
 * See the file "copy_notice.txt" for the licence notice
 */
function validarea(&$zeile2, $permit_type_all = 1) {
    global $allowedarea, $childareas;

//    print_r($zeile2);
    if (preg_match('/System_Admin/i', $zeile2)) {  // if System_admin return true
        return 1;
    } elseif (in_array('no_allow_type_all', $allowedarea)) { // check if the type "all" is blocked, if so return false
        return 0;
    } elseif ($permit_type_all && preg_match('/_a_0_all/i', $zeile2)) { // if type "all" , return true
        return 1;
    } else {                                                                  // else scan the permission
        for ($j = 0; $j < sizeof($allowedarea); $j++) {
            if (preg_match('/' . $allowedarea[$j] . '/i', $zeile2)) {
                return 1;
            }

            /* Check if permission has children and get them for comparing
             * Code added by Mark Patrick (2015)
             */ else {
                $perm = explode(' ', $zeile2);  //Assigned permissions as per role
//                print_r($perm);
//                echo '</br>';
//                print_r($allowedarea[$j]);
                foreach ($perm as $list) {
//                    print_r($childareas[$list]);
                    if (sizeof($childareas[$list]) > 0) { //Check if permission has children
                        for ($k = 0; $k < sizeof($childareas[$list]); $k++) { //Iterate through each group of children
                            if (in_array($allowedarea[$j], $childareas[$list])) {
                                return 1;
//                                break;
                            }
                        }
                    }
                }
            }
        }
    }
    return 0;           // otherwise the user has no access permission in the area, return false
}

function logentry(&$userid, $key, $report, &$remark1, &$remark2) {
    global $passtag, $root_path;

    if ($passtag)
        $logpath = $root_path . 'logs/access_fail/' . date('Y') . '/';
    else
        $logpath = $root_path . 'logs/access/' . date('Y') . '/';

    if (file_exists($logpath)) {
        $logpath = $logpath . date('Y-m-d') . '.log';
        $file = fopen($logpath, 'a');
        if ($file) {
            if ($userid == '')
                $userid = 'blank';
            $line = date('Y-m-d') . '/' . date('H:i') . ' ' . $report . '  Username=' . $key . '  Userid=' . $userid . '  Fileaccess=' . $remark1 . '  Fileforward=' . $remark2;
            fputs($file, $line);
            fputs($file, "\r\n");
            fclose($file);
        }
    }
}

/* if(!isset($db) || !$db || !$dblink_ok) include_once($root_path.'include/inc_db_makelink.php');

  if($dblink_ok)
  { */
$debug = FALSE;
($debug) ? $db->debug = TRUE : $db->debug = FALSE;

$sql = 'SELECT * FROM care_users u, care_user_roles ur WHERE u.role_id = ur.role_id '
        . 'AND login_id=\'' . addslashes($userid) . '\'';
#print $sql.'<hr />';
//echo $fileforward;
if ($ergebnis = $db->Execute($sql)) {
    $zeile = $ergebnis->FetchRow();

    if (isset($checkintern) && $checkintern) {
        $dec_login = new Crypt_HCEMD5($key_login, '');
        //$keyword = $dec_login->DecodeMimeSelfRand($_COOKIE['ck_login_pw'.$sid]);
        $keyword = $dec_login->DecodeMimeSelfRand($_SESSION['sess_login_pw']);
    } else {
        $checkintern = false;
    }

    if (($zeile['password'] == md5($keyword)) && ($zeile['login_id'] == $userid)) {
        if (!($zeile['lockflag'])) {
            if ((isset($screenall) && $screenall) || validarea($zeile['permission'])) {
                if (empty($zeile['name']))
                    $zeile['name'] = ' ';

                logentry($userid, $zeile['name'], "IP:" . $_SERVER['REMOTE_ADDR'] . " $lognote ", $thisfile, $fileforward);

                /**
                 * Init crypt to use 2nd level key and encrypt the sid.
                 * Store to cookie the "$ck_2level_sid.$sid"
                 * There is no need to call another include of the inc_init_crypt.php since it is already included at the start
                 * of the script that called this script.
                 */
                $enc_2level = new Crypt_HCEMD5($key_2level, makeRand());
                $ciphersid = $enc_2level->encodeMimeSelfRand($sid);
                //setcookie('ck_2level_sid'.$sid,$ciphersid,time()+3600,'/');
                //setcookie($userck.$sid,$zeile['name'],time()+3600,'/');
                setcookie('ck_2level_sid' . $sid, $ciphersid, 0, '/');
                setcookie($userck . $sid, $zeile['name'], 0, '/');
                //setcookie('ck_2level_sid'.$sid,$ciphersid);
                //setcookie($userck.$sid,$zeile['name']);
//                echo $fileforward;
                $_SESSION['sess_user_name'] = $zeile['name'];

                header('Location: ' . strtr($fileforward, ' ', '+') . '&checkintern=' . $checkintern);

                exit;
            }else {
                $passtag = 2;
            };
        } else
            $passtag = 3;
    }else {
        $passtag = 1;
    };
} else {
    $passtag = 1;
};
/* }
  else  print "$LDDbNoLink<br>"; */
?>