<?php

/*
 * $Header: /usr/share/cvs/care2002_tz_mero_vps/nocc/lang/he.php,v 1.1 2006/01/13 13:42:52 irroal Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the hebrew language
 * 
 * By Tzafrir Cohen <tzafrir@technion.ac.il>
 *
 * This is still experimental, and not tested enough. Comments would be
 * welcomed [tzafrir]
 *
 */

// While it could be claimed that using UTF-8 is the Right Thing , it is still
// not common enough. ISO-8859-8 can be read basically anywhere. This is not 
// the case with UTF-8 .
$charset = 'ISO-8859-8-i';

// Configuration for the days and months
// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'he';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'rtl';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y-%m-%d';

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = '��� �� ������ ���';
$err_passwd_empty = '��� ������ ���';


// html message

$alt_delete = '����� ������� ��������';
$alt_delete_one = '����� ������';
$alt_new_msg = '����� ����';
$alt_reply = '�����';
$alt_reply_all = '����� ���';
$alt_forward = '�����';
$alt_next = '������ ����';
$alt_prev = '������� �����';
$html_on = '����';
$html_theme = 'Theme';

// index.php

$html_lang = '���';
$html_welcome = '������ �����';
$html_login = '�� ������';
$html_passwd = '�����';
$html_submit = '�������';
$html_help = '����';
$html_server = '���';
$html_wrong = '�� ������ �� ������ ������';
$html_retry = '����� ����';

// Other pages

$html_view_header = '���� ������';
$html_remove_header = '����� ������';
$html_inbox = '���� �����';
$html_new_msg = '�����';
$html_reply = '�����';
# please leave 'Re' and 'Fwd' as they are, otherwise they mess the subject line
# [tzafrir]
$html_reply_short = 'Re';
$html_reply_all = '����� ���';
$html_forward = '�����';
$html_forward_short = 'Fw';
$html_delete = '�����';
$html_new = '���';
$html_mark = '�����';
$html_att = '����� ����';
$html_atts = '�������';
$html_att_unknown = '[�� ����]';
$html_attach = '�����';
$html_attach_forget = '������ ���� ���� ���� ����� ������!';
$html_attach_delete = '����� ��������';
$html_from = '���';
$html_subject = '����';
$html_date = '�����';
$html_sent = 'Send';
$html_size = '����';
$html_totalsize = '��\' ����';
$html_kb = '�\'�';
$html_bytes = '����';
$html_filename = '�� �����';
$html_to = '��';
$html_cc = '����';
$html_bcc = 'Bcc';
$html_nosubject = '[��� ����]';
$html_send = '�����';
$html_cancel = '�����';
$html_no_mail = 'No message.';
$html_logout = '�����';
$html_msg = '�����';
$html_msgs = '������';
$html_configuration = 'This server is not well set up !';

# I think some people will rather leave this one untranslated as well...
#$original_msg = '-- Original Message --';
$original_msg = '-- ����� ������ --';
$to_empty = '���� �-\'��\' ���� ����� ���!';
?>