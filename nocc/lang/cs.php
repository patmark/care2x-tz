<?php

/*
 * $Header: /usr/share/cvs/care2002_tz_mero_vps/nocc/lang/cs.php,v 1.1 2006/01/13 13:42:52 irroal Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Czech language
 * Translation by Vaclav Habr <habr@fonet.cz>
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months
// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'cs_CZ';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d-%m-%Y';

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d-%m-%Y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Nen� vypln�no p�ihla�ovac� jm�no ';
$err_passwd_empty = 'Nen� vypln�no heslo';

// html message

$alt_delete = 'Vymazat vybran� zpr�vy';
$alt_delete_one = 'Vymazat zpr�vu';
$alt_new_msg = 'Nov� zpr�vy';
$alt_reply = 'Odpov�d�t autorovi';
$alt_reply_all = 'Odpov�d�t v�em';
$alt_forward = 'P�edat d�l';
$alt_next = 'Dal�� zpr�va';
$alt_prev = 'P�edchoz� zpr�va';
$html_on = 'na';
$html_theme = 'T�ma';


// index.php

$html_lang = 'Jazyk';
$html_welcome = 'V�tejte v';
$html_login = 'Jm�no';
$html_passwd = 'Heslo';
$html_submit = 'P�ihl�sit';
$html_help = 'Pomoc';
$html_server = 'Server';
$html_wrong = 'Prihla�ovac� jm�no a heslo nesouhlas�';
$html_retry = 'Opakuj';

// Other pages

$html_view_header = 'Zobraz hlavi�ku';
$html_remove_header = 'Skryj hlavi�ku';
$html_inbox = 'Inbox';
$html_new_msg = 'Nov� zpr�va';
$html_reply = 'Odpov�d�t';
$html_reply_short = 'Re';
$html_reply_all = 'Odpov�d�t v�em';
$html_forward = 'P�edat d�l';
$html_forward_short = 'Fw';
$html_delete = 'Vymazat';
$html_new = 'Nov�';
$html_mark = 'Vymazat';
$html_att = 'P��loha';
$html_atts = 'P��lohy';
$html_att_unknown = '[nezn�m�]';
$html_attach = 'P��loha';
$html_attach_forget = 'Soubor mus� b�t p�ipojen p�ed odesl�n�m mailu';
$html_attach_delete = 'Vyma� vybran�';
$html_from = 'Od';
$html_subject = 'P�edm�t';
$html_date = 'Datum';
$html_sent = 'Poslat';
$html_size = 'Velikost';
$html_totalsize = 'Celkov� velikost';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'N�zev souboru';
$html_to = 'Komu';
$html_cc = 'Kopie';
$html_bcc = 'Skryt�';
$html_nosubject = 'Bez n�zvu';
$html_send = 'Po�li';
$html_cancel = 'Storno';
$html_no_mail = '��dn� zpr�va';
$html_logout = 'Odhl�en�';
$html_msg = 'Zpr�va';
$html_msgs = 'Zpr�vy';

$original_msg = '-- P�vodn� zpr�va --';
$to_empty = 'Mus�te vyplnit polo�ku Komu:';
?>