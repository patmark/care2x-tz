<?php

/*
 * $Header: /usr/share/cvs/care2002_tz_mero_vps/nocc/lang/zh-tw.php,v 1.1 2006/01/13 13:42:52 irroal Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the chinese (Taiwan) big5 language
 * Translation by Cary Leung <cary@cary.net>
 */

$charset = 'Big5';

// Configuration for the days and months
// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'zh_TW.BIG5';

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

$err_user_empty = '�n�J�W�r����m�ť�';
$err_passwd_empty = '�K�X����m�ť�';


// html message

$alt_delete = '�簣�w��ܤ��H��';
$alt_delete_one = '�簣���H��';
$alt_new_msg = '�s�H��';
$alt_reply = '�^�ЫH��';
$alt_reply_all = '�^�ЩҦ��H';
$alt_forward = '��H';
$alt_next = '�U�@��';
$alt_prev = '�W�@��';
$html_on = '&#22312;';
$html_theme = '&#32972;&#26223;&#20027;&#38988;';

// index.php

$html_lang = '�y��';
$html_welcome = '�w���';
$html_login = '�n�J';
$html_passwd = '�K�X';
$html_submit = '����';
$html_help = '���U';
$html_server = '��A��';
$html_wrong = '�n�J�W�r�αK�X�����T';
$html_retry = '�A����';

// Other pages

$html_view_header = '��ܼ��D';
$html_remove_header = '����ܼ��D';
$html_inbox = '�H�c';
$html_new_msg = '�g�H��';
$html_reply = '�^��';
$html_reply_short = '�^��';
$html_reply_all = '�^�ЩҦ��H';
$html_forward = '��H';
$html_forward_short = '��H';
$html_delete = '�簣';
$html_new = '�s';
$html_mark = '�簣';
$html_att = '����';
$html_atts = '����';
$html_att_unknown = '[����]';
$html_attach = '����';
$html_attach_forget = '�A�ѰO�[�J���� !';
$html_attach_delete = '�簣�w��ܪ�';
$html_from = '��';
$html_subject = '�D��';
$html_date = '���';
$html_sent = '�ǰe';
$html_size = '��n';
$html_totalsize = '�`��n';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = '�ɦW';
$html_to = '����H';
$html_cc = '�ƻs��';
$html_bcc = 'Bcc';
$html_nosubject = '�L�D��';
$html_send = '�ǰe';
$html_cancel = '���';
$html_no_mail = '�L���e.';
$html_logout = '�n�X';
$html_msg = '�H��';
$html_msgs = '�H��';
$html_configuration = 'This server is not well set up !';

$original_msg = '-- ��l���e --';
$to_empty = '�� \'����H\' ����m����S�� !';
?>