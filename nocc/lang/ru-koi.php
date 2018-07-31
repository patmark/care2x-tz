<?php

/*
 * $Header: /usr/share/cvs/care2002_tz_mero_vps/nocc/lang/ru-koi.php,v 1.1 2006/01/13 13:42:52 irroal Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the russian (KOI8-R) language
 * Translation by Sergey Frolovithev <serg@spylog.ru>
 * Additional translation Anton Jakimov <t0xa@ls2.lv>
 */

$charset = 'KOI8-R';

// Configuration for the days and months
// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'ru_RU';

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
$default_time_format = '%H:%M';


// Here is the configuration for the HTML

$err_user_empty = '�� ������ �����';
$err_passwd_empty = '�� ������ ������';


// html message

$alt_delete = '������� ��������� ���������';
$alt_delete_one = '������� ���������';
$alt_new_msg = '����� ���������';
$alt_reply = '�������� ������';
$alt_reply_all = '�������� ����';
$alt_forward = '���������';
$alt_next = '���������';
$alt_prev = '����������';


// index.php

$html_lang = '����';
$html_welcome = '����� ���������� �';
$html_login = '���';
$html_passwd = '������';
$html_submit = '�����';
$html_help = '������';
$html_server = '������';
$html_wrong = '����� ��� ������ �� �����';
$html_retry = '���������';
$html_on = '���.';
$html_theme = '������';

// Other pages

$html_view_header = '����������� ��������� ������';
$html_remove_header = '������ ��������� ������';
$html_inbox = '��������';
$html_new_msg = '��������';
$html_reply = '��������';
$html_reply_short = 'Re';
$html_reply_all = '�������� ����';
$html_forward = '���������';
$html_forward_short = 'Fw';
$html_delete = '�������';
$html_new = '�����';
$html_mark = '�������';
$html_att = '������������� ����';
$html_atts = '������������� �����';
$html_att_unknown = '[����������]';
$html_attach = '���������� ����';
$html_attach_forget = '�� ������ ���������� ���� �� �������� ���������!';
$html_attach_delete = '������� ���������';
$html_from = '��';
$html_subject = '����';
$html_date = '�����';
$html_sent = '���������';
$html_size = '������';
$html_totalsize = '����� ������';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = '��� �����';
$html_to = '����';
$html_cc = '�����';
$html_bcc = 'Bcc';
$html_nosubject = 'no subject';
$html_send = '���������';
$html_cancel = '��������';
$html_no_mail = '��������� ���';
$html_logout = '�����';
$html_msg = '���������';
$html_msgs = '���������';
$html_configuration = 'This server is not well set up !';

$original_msg = '-- Original Message --';
$to_empty = '���� \'����\' �� ������ ���� ������ !';
?>
