<?php

/*
 * $Header: /usr/share/cvs/care2002_tz_mero_vps/nocc/lang/pl.php,v 1.1 2006/01/13 13:42:52 irroal Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Polish language
 * Translation by Rafal <arat@alpha.net.pl>
 */

$charset = 'windows-1250';

// Configuration for the days and months
// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'pl';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y-%m-%d';

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Nazwa u�ytkownika jest pusta';
$err_passwd_empty = 'Has�o jest puste';


// html message

$alt_delete = 'Usu� zaznaczone wiadomo�ci';
$alt_delete_one = 'Usu� wiadomo��';
$alt_new_msg = 'Nowa wiadomo��';
$alt_reply = 'Odpowiedz autorowi';
$alt_reply_all = 'Odpowiedz wszystkim';
$alt_forward = 'Prze�lij dalej';
$alt_next = 'Dalej';
$alt_prev = 'Poprzednia';
$html_on = 'wlaczone';
$html_theme = 'Temat';

// index.php

$html_lang = 'J�zyk';
$html_welcome = 'Witaj w';
$html_login = 'Nazwa';
$html_passwd = 'Has�o';
$html_submit = 'Zaloguj si�';
$html_help = 'Pomoc';
$html_server = 'Serwer';
$html_wrong = 'Nazwa albo has�o s� nieprawid�owe';
$html_retry = 'Pon�w pr�b�';

// Other pages

$html_view_header = 'Zobacz nag��wek';
$html_remove_header = 'Ukryj nag��wek';
$html_inbox = 'Skrzynka odbiorcza';
$html_new_msg = 'Nowa wiadomo��';
$html_reply = 'Odpowiedz';
$html_reply_short = 'Odp';
$html_reply_all = 'Odpowiedz wszystkim';
$html_forward = 'Prze�lij dalej';
$html_forward_short = 'Fw';
$html_delete = 'Usu�';
$html_new = 'Nowa';
$html_mark = 'Usu�';
$html_att = 'Za��cznik';
$html_atts = 'Za��czniki';
$html_att_unknown = '[nieznany typ]';
$html_attach = 'Do��cz';
$html_attach_forget = 'Musisz za��czyc plik przed wys�aniem wiadomo�ci !';
$html_attach_delete = 'Usu� zaznaczone';
$html_from = 'Od';
$html_subject = 'Temat';
$html_date = 'Data';
$html_sent = 'Wy�lij';
$html_size = 'Wielko��';
$html_totalsize = 'Rozmiar ca�kowity';
$html_kb = 'Kb';
$html_bytes = 'bajt�w';
$html_filename = 'Nazwa pliku';
$html_to = 'Do';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'Bez tematu';
$html_send = 'Wy�lij';
$html_cancel = 'Anuluj';
$html_no_mail = 'Brak wiadomo�ci.';
$html_logout = 'Wyloguj �i�';
$html_msg = 'Wiadomo��';
$html_msgs = 'Wiadomo�ci';
$html_configuration = 'This server is not well set up !';

$original_msg = '-- Oryginalna wiadomo�� --';
$to_empty = 'Pole \'Do\' nie mo�e by� puste !';
?>