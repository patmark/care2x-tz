<?php
# Loads the standard gui tags for the registration display page
require('./gui_bridge/default/gui_std_tags.php');

echo StdHeader();
echo setCharSet();
?>
<TITLE><?php echo $LDPatientRegister ?></TITLE>

<script type="text/javascript" src="<?php echo $root_path; ?>js/jquery.1.10.js"></script>
<script type="text/javascript">
    function verify_card(cardno) {
        var accessToken = null;

        var logindata = {
            "grant_type": "password",
            "username": "<?php echo $nhif_user; ?>",
            "password": "<?php echo $nhif_pwd; ?>"
        };
        var url = "<?php echo $nhif_base; ?>/Token";
        ProgressCreate(10);
//        alert('Please wait for at least 10 sec\nfor response from server.........');
        $.ajax(url, {
            type: "POST",
            data: logindata,
            timeout: 10000
        }).done(function (data) {
            accessToken = data.access_token;
            authorize_card(cardno, accessToken);
        }).fail(function (data) {
            ProgressDestroy();
            if (data.status === 400) {
                alert("Error Login in to NHIF Server!\n" +
                        JSON.stringify(data.responseJSON.error_description));
            } else {
                alert("Error Login in to NHIF Server!\n\nPlease check your network connection\nor contact your administrator!");
            }

        });
        //End of login
    }

    function authorize_card(cardno, accessToken) {

        $.ajax("<?php echo $nhif_base; ?>/breeze/Verification/AuthorizeCard?CardNo=" + cardno,
                {
                    headers: {"Authorization": "Bearer " + accessToken},
                    xhrFields: {
                        withCredentials: true
                    }
                }
        ).done(function (data) {
            ProgressDestroy();
//            alert(JSON.stringify(data));
            if (data.CardStatus === 'Invalid') {
                alert(data.Remarks);
            } else {
                alert("First Name:   " + data.FirstName + "\n" +
                        "Middle Name:   " + data.MiddleName + "\n" +
                        "Last Name:   " + data.LastName + "\n" +
                        "Card Status:   " + data.CardStatus + "\n" +
                        "Authorization Status:   " + data.AuthorizationStatus + "\n" +
                        "Authorization No:  " + data.AuthorizationNo + "\n" +
                        "Latest Athorization:   " + data.LatestAuthorization
                        );
                $('.card_fname').append(data.FirstName);
                $('.card_mname').append(data.MiddleName);
                $('.card_lname').append(data.LastName);
                $('.card_status').append(data.CardStatus);
                $('.authorization').append(data.AuthorizationStatus);
                $('.authorization_no').append(data.AuthorizationNo);
                $('.latest_authorization').append(data.LatestAuthorization);
                if (data.AuthorizationStatus === 'ACCEPTED') {
                    hide_authorize();
                    show_links();
                }
            }
        }).fail(function (data) {
            ProgressDestroy();
            if (data.status === 0) {
                alert("Error Connecting to NHIF Server!\n\nPlease check your network connection!");
            } else {
                if (data.status === 404) {
                    alert(JSON.stringify(data.responseText));
                    $('.card_status').append('Card Not Found!');
                    $('.authorization').append('REJECTED');
                } else {
                    alert(JSON.stringify(data.responseText));
                }

            }
        });

        $.ajax('<?php echo $nhif_base; ?>/api/Account/Logout', {
            type: "POST",
            headers: {"Authorization": "Bearer " + accessToken}
        });
    }

    function hide_authorize() {
        $('#authorize_btn').hide();
    }

    function hide_links() {
        $('.admit_patient').hide();
    }
    function show_links() {
        $('.admit_patient').show();
//        document.getElementById(id).style.display = 'block';
    }

</script>

<style>
    <!--
    .hide { position:absolute; visibility:hidden; }
    .show { position:absolute; visibility:visible; }
    -->
</style>

<SCRIPT LANGUAGE="JavaScript">
//Modified by JavaScript Kit for NS6, ability to specify duration
//Visit JavaScript Kit (http://javascriptkit.com) for script

    var duration = 10; // Specify duration of progress bar in seconds
    var _progressWidth = 70;	// Display width of progress bar.

    var _progressBar = "|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||";
    var _progressEnd = 5;
    var _progressAt = 0;


// Create and display the progress dialog.
// end: The number of steps to completion
    function ProgressCreate(end) {
        // Initialize state variables
        _progressEnd = end;
        _progressAt = 0;

        // Move layer to center of window to show
        if (document.all) {	// Internet Explorer
            progress.className = 'show';
            progress.style.left = (document.body.clientWidth / 2) - (progress.offsetWidth / 2);
            progress.style.top = document.body.scrollTop + (document.body.clientHeight / 2) - (progress.offsetHeight / 2);
        } else if (document.layers) {	// Netscape
            document.progress.visibility = true;
            document.progress.left = (window.innerWidth / 2) - 100 + "px";
            document.progress.top = pageYOffset + (window.innerHeight / 2) - 40 + "px";
        } else if (document.getElementById) {	// Netscape 6+
            document.getElementById("progress").className = 'show';
            document.getElementById("progress").style.left = (window.innerWidth / 2) - 100 + "px";
            document.getElementById("progress").style.top = pageYOffset + (window.innerHeight / 2) - 40 + "px";
        }

        ProgressUpdate();	// Initialize bar
    }

// Hide the progress layer
    function ProgressDestroy() {
        // Move off screen to hide
        if (document.all) {	// Internet Explorer
            progress.className = 'hide';
        } else if (document.layers) {	// Netscape
            document.progress.visibility = false;
        } else if (document.getElementById) {	// Netscape 6+
            document.getElementById("progress").className = 'hide';
        }
    }

// Increment the progress dialog one step
    function ProgressStepIt() {
        _progressAt++;
        if (_progressAt > _progressEnd)
            _progressAt = _progressAt % _progressEnd;
        ProgressUpdate();
    }

// Update the progress dialog with the current state
    function ProgressUpdate() {
        var n = (_progressWidth / _progressEnd) * _progressAt;
        if (document.all) {	// Internet Explorer
            var bar = dialog.bar;
        } else if (document.layers) {	// Netscape
            var bar = document.layers["progress"].document.forms["dialog"].bar;
            n = n * 0.55;	// characters are larger
        } else if (document.getElementById) {
            var bar = document.getElementById("bar");
        }
        var temp = _progressBar.substring(0, n);
        bar.value = temp;
    }
</script>

<SCRIPT LANGUAGE="JavaScript">

// Create layer for progress dialog
    document.write("<span id=\"progress\" class=\"hide\">");
    document.write("<FORM name=dialog id=dialog>");
    document.write("<TABLE border=2  bgcolor=\"#FFFFCC\">");
    document.write("<TR><TD ALIGN=\"center\">");
    document.write("Progress<BR>");
    document.write("<input type=text name=\"bar\" id=\"bar\" size=\"" + _progressWidth / 2 + "\"");
    if (document.all || document.getElementById) 	// Microsoft, NS6
        document.write(" bar.style=\"color:navy;\">");
    else	// Netscape
        document.write(">");
    document.write("</TD></TR>");
    document.write("</TABLE>");
    document.write("</FORM>");
    document.write("</span>");
    ProgressDestroy();	// Hides

</script>

<script  language="javascript">
<!--

<?php require($root_path . 'include/inc_checkdate_lang.php'); ?>

    function popRecordHistory(table, pid) {
        urlholder = "./record_history.php<?php echo URL_REDIRECT_APPEND; ?>&table=" + table + "&pid=" + pid;
        HISTWIN<?php echo $sid ?> = window.open(urlholder, "histwin<?php echo $sid ?>", "menubar=no,width=400,height=550,resizable=yes,scrollbars=yes");
    }

-->
</script>
<?php
require($root_path . 'include/inc_js_gethelp.php');
require($root_path . 'include/inc_css_a_hilitebu.php');
?>

</HEAD>

<BODY bgcolor="<?php echo $cfg['bot_bgcolor']; ?>" topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 onLoad="if (window.focus) {
            window.focus();
        }
        if (<?php echo $insurance_ID; ?> === 12 && <?php echo $glob_obj->getConfigValue("validate_nhif"); ?> === 1) {
            //If currently admitted hide authorize button
<?php if (isset($current_encounter) && $current_encounter) { ?>
                hide_authorize();
<?php } ?>
            hide_links();
        }"
      <?php
      if (!$cfg['dhtml']) {
          echo 'link=' . $cfg['body_txtcolor'] . ' alink=' . $cfg['body_alink'] . ' vlink=' . $cfg['body_txtcolor'];
      }
      ?>>
    <table width=100% border=0 cellspacing="0"  cellpadding=0 >

        <tr>
            <td bgcolor="<?php echo $cfg['top_bgcolor']; ?>">
                <FONT  COLOR="<?php echo $cfg['top_txtcolor']; ?>"  SIZE=+2  FACE="Arial"><STRONG> &nbsp;<?php echo $LDPatientRegister ?></STRONG> <font size=+2>(<?php echo ($pid) ?>)</font></FONT>
            </td>
            <td bgcolor="<?php echo $cfg['top_bgcolor']; ?>" align="right">
                <a href="javascript:gethelp('registration_overview.php','Person Registration :: Overview')"><img <?php echo createLDImgSrc($root_path, 'hilfe-r.gif', '0') ?>  <?php if ($cfg['dhtml']) echo'style=filter:alpha(opacity=70) onMouseover=hilite(this,1) onMouseOut=hilite(this,0)>'; ?></a><a href="<?php
                if ($_COOKIE["ck_login_logged" . $sid])
                    echo "news/start_page.php?sid=" . $sid . "&lang=" . $lang;
                else
                    echo $breakfile . "?sid=$sid&target=entry&lang=$lang";
                ?>
                                                                                                                                                                                                        "><img <?php echo createLDImgSrc($root_path, 'close2.gif', '0') ?> alt="<?php echo $LDCloseWin ?>"   <?php if ($cfg['dhtml']) echo'style=filter:alpha(opacity=70) onMouseover=hilite(this,1) onMouseOut=hilite(this,0)>'; ?></a>
            </td>
        </tr>
        <?php
        /* Create the tabs */
        $tab_bot_line = '#66ee66';
        require('./gui_bridge/default/gui_tz_tabs_patreg.php');
        ?>

        <tr>
            <td colspan=3   bgcolor="<?php echo $cfg['body_bgcolor']; ?>">
                <!-- table container for the data display block -->
                <table cellspacing=0 cellpadding="0">
                    <tbody>
                        <tr valign="top">
                            <td> <?php
                                # Display the data.
                                $person->display();
                                ?>
                            </td>
                            <td>
                                <?php
                                require('./gui_bridge/default/gui_patient_reg_options.php');
                                $sTemp = ob_get_contents();
                                # Load and display the options table
                                if ($current_encounter)
//		  require('./gui_bridge/default/gui_patient_reg_options.php');
                                    
                                    ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>

                    <?php if (!$newdata) { ?>
                        <?php
                        if ($target == "search")
                            $newsearchfile = 'patient_register_pass.php' . URL_APPEND . '&target=search';
                        else
                            $newsearchfile = 'patient_register_pass.php' . URL_APPEND . '&target=archiv';
                        ?>
                        <a href="<?php echo $newsearchfile ?>"><img
                                <?php echo createLDImgSrc($root_path, 'new_search.gif', '0', 'absmiddle') ?>></a>
                            <?php
                        }
                        ?>
                    <a href="patient_register_pass.php<?php echo URL_APPEND ?>&pid=<?php echo $pid ?>&target=update&update=1"><img
                            <?php echo createLDImgSrc($root_path, 'update_data.gif', '0', 'absmiddle') ?>></a>
                        <?php
# If currently admitted show button link to admission data display
                        if ($current_encounter) {
                            ?>
                        <a href="aufnahme_pass.php<?php echo URL_APPEND ?>&encounter_nr=<?php echo $current_encounter ?>&origin=patreg_reg&target=admitdata"><img <?php echo createLDImgSrc($root_path, 'admission_data.gif', '0', 'absmiddle') ?>></a>
                        <?php
# Else if person still living, show button links to admission
                    } elseif (!$death_date || $death_date == $dbf_nodate) {
                        ?>
                        <span class="admit_patient">
                            <a href="<?php echo $admissionfile ?>&pid=<?php echo $pid ?>&origin=patreg_reg&target=admitip&encounter_class_nr=1"><img <?php echo createLDImgSrc($root_path, 'admit_inpatient.gif', '0', 'absmiddle') ?>></a>
                            <a href="<?php echo $admissionfile ?>&pid=<?php echo $pid ?>&origin=patreg_reg&target=admitop&encounter_class_nr=2"><img <?php echo createLDImgSrc($root_path, 'admit_outpatient.gif', '0', 'absmiddle') ?>></a>
                        </span>
                        <?php
                    }
                    ?>

                    <?php
                    /*
                      # Don't show register patient button - is confusing staff
                      <form action="patient_register.php" method=post>
                      <input type=submit value="<?php echo $LDRegisterNewPerson ?>" >
                      <input type=hidden name="sid" value=<?php echo $sid; ?>>
                      <input type=hidden name="lang" value="<?php echo $lang; ?>">
                      </form> */
# Load and display the options table
//ob_start();
//ob_end_clean();
                    ?>

                <p>
                    </ul>

                    </FONT>
                <p>
            </td>
        </tr>
    </table>
    <p>
    <ul>
        <FONT    SIZE=2  FACE="Arial">
        <img <?php echo createComIcon($root_path, 'varrow.gif', '0') ?>> <a href="patient_register_pass.php<?php echo URL_APPEND; ?>&target=search"><?php echo $LDPersonSearch ?></a><br>
        <img <?php echo createComIcon($root_path, 'varrow.gif', '0') ?>> <a href="patient_register_pass.php<?php echo URL_APPEND; ?>&newdata=1&from=entry&target=archiv"><?php echo $LDArchive ?></a><br>

        <p>
            <a href="
            <?php
            if ($_COOKIE['ck_login_logged' . $sid])
                echo $root_path . 'main/menu/startframe.php' . URL_APPEND;
            else
                echo $breakfile . URL_APPEND;
            ?>
               "><img <?php echo createLDImgSrc($root_path, 'cancel.gif', '0') ?> alt="<?php echo $LDCancelClose ?>"></a>
    </ul>
    <p>
        <?php
        require($root_path . 'include/inc_load_copyrite.php');
        ?>
        </FONT>
        <?php
        StdFooter();
        ?>
