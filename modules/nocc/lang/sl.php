<?php
/*
 * $Header: /usr/share/cvs/care2002_tz_mero_vps/modules/nocc/lang/sl.php,v 1.1 2006/01/13 13:39:10 irroal Exp $ 
 *
 * Copyright 2000 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2000 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the slovenian language
 * Tanslation by Borut Mrak <borut.mrak@ijs.si>
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'sl_SI';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d.%m.%Y'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d.%m.%Y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Uporabni�ko ime ni bilo vne�eno';
$err_passwd_empty = 'Geslo ni bilo vne�eno';


// html message

$alt_delete = 'Izbri�i izbrana sporo�ila';
$alt_delete_one = 'Izbri�i sporo�ilo';
$alt_new_msg = 'Nova sporo�ila';
$alt_reply = 'Odgovori';
$alt_reply_all = 'Odgovri vsem';
$alt_forward = 'Naprej';
$alt_next = 'Naslednji';
$alt_prev = 'Prej�nji';


// index.php

$html_lang = 'Jezik';
$html_welcome = 'Dobrodo�li v';
$html_login = 'Uporabni�ko ime';
$html_passwd = 'Geslo';
$html_submit = 'Prijava';
$html_help = 'Pomo�';
$html_server = 'Stre�nik';
$html_wrong = 'Uporabni�ko ime ali geslo napa�no';
$html_retry = 'Ponovi';
$html_on = 'on';
$html_theme = 'Theme';

// Other pages

$html_view_header = 'Poka�i glavo';
$html_remove_header = 'Skrij glavo';
$html_inbox = 'Prejeto';
$html_new_msg = 'Pi�i';
$html_reply = 'Odgovori';
$html_reply_short = 'Re';
$html_reply_all = 'Odgovori vsem';
$html_forward = 'Posreduj';
$html_forward_short = 'Fw';
$html_delete = 'Bri�i';
$html_new = 'Novo';
$html_mark = 'Izbri�i';
$html_att = 'Priponka';
$html_atts = 'Priponke';
$html_att_unknown = '[neznan]';
$html_attach = 'Pripni';
$html_attach_forget = 'Datoteko morate pripeti pred poi�iljanjem sporo�ila!';
$html_attach_delete = 'Odstrani izbrane';
$html_from = 'Od';
$html_subject = 'Zadeva';
$html_date = 'Datum';
$html_sent = 'Poslano';
$html_size = 'Velikost';
$html_totalsize = 'Skupna velikost';
$html_kb = 'Kb';
$html_bytes = 'bajtov';
$html_filename = 'Ime datoteke';
$html_to = 'Za';
$html_cc = 'Kp';
$html_bcc = 'Skp';
$html_nosubject = 'Brez zadeve';
$html_send = 'Po�lji';
$html_cancel = 'Prekli�i';
$html_no_mail = 'Ni sporo�il.';
$html_logout = 'Odjava';
$html_msg = 'Sporo�il';
$html_msgs = 'Sporo�il';
$html_configuration = 'This server is not well set up !';

$original_msg = '-- Izvorno sporo�ilo --';
$to_empty = 'Polje \'Za:\' ne sme biti prazno!';
?>