<?php
/*
 * $Header: /usr/share/cvs/care2002_tz_mero_vps/modules/nocc/lang/sv.php,v 1.1 2006/01/13 13:39:10 irroal Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Swedish language
 * Translation by Robert Niska <r.niska@redbox.d2g.nu>
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'sv_SE';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%A %d %B %Y';

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d-%m-%Y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Login f�ltet �r tomt';
$err_passwd_empty = 'L�senords f�ltet �r tomt';


// html message

$alt_delete = 'Ta bort valt meddelande';
$alt_delete_one = 'Ta bort meddelandet';
$alt_new_msg = 'Nya Meddelanden';
$alt_reply = 'Svara';
$alt_reply_all = 'Svara alla';
$alt_forward = 'Vidarebefodra';
$alt_next = 'N�sta';
$alt_prev = 'F�reg�ende';


// index.php

$html_lang = 'Spr�k';
$html_welcome = 'V�lkommen till';
$html_login = 'Anv�ndarnamn';
$html_passwd = 'L�senord';
$html_submit = 'Logga in';
$html_help = 'Hj�lp';
$html_server = 'Server';
$html_wrong = 'Anv�ndarnamnet eller l�senordet �r fel';
$html_retry = 'F�rs�k igen';
$html_on = 'P�';
$html_theme = 'Tema';

// Other pages

$html_view_header = 'Visa huvud';
$html_remove_header = 'D�lj huvud';
$html_inbox = 'Inkorg';
$html_new_msg = 'Skriv';
$html_reply = 'Svara';
$html_reply_short = 'Re';
$html_reply_all = 'Svara Alla';
$html_forward = 'Vidarebefodra';
$html_forward_short = 'Fw';
$html_delete = 'Ta bort';
$html_new = 'Nytt';
$html_mark = 'Ta bort';
$html_att = 'Bifogat';
$html_atts = 'Bifogade';
$html_att_unknown = '[ok�nd]';
$html_attach = 'Bifoga';
$html_attach_forget = 'Du m�ste bifoga din fil innan du skickar meddelandet !';
$html_attach_delete = 'Ta bort vald';
$html_from = 'Fr�n';
$html_subject = '�mne';
$html_date = 'Datum';
$html_sent = 'Skicka';
$html_size = 'Storlek';
$html_totalsize = 'Total Storlek';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Filnamn';
$html_to = 'Till';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'Inget �mne';
$html_send = 'Skicka';
$html_cancel = 'Avbryt';
$html_no_mail = 'Inget meddelande.';
$html_logout = 'Logga ut';
$html_msg = 'Meddelande';
$html_msgs = 'Meddelanden';
$html_configuration = 'This server is not well set up !';

$original_msg = '-- Original Meddelande --';
$to_empty = 'Mottagar f�ltet kan inte vara tomt !';
?>