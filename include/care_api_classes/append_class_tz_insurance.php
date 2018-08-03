
  function Display_Header(){
	global $URL_APPEND, $LDBillingInsurance;

  	echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
			<HTML>
			<HEAD>
			 <TITLE>'.$LDBillingInsurance.'</TITLE>
			 <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
			<meta name="Author" content="Robert Meggle">
			<meta name="Generator" content="various: Quanta, AceHTML 4 Freeware, NuSphere, PHP Coder">
			 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

			  	<script language="javascript" >
			<!--
			function gethelp(x,s,x1,x2,x3,x4)
			{
				if (!x) x="";
				urlholder="../../main/help-router.php'.$URL_APPEND.'&helpidx="+x+"&src="+s+"&x1="+x1+"&x2="+x2+"&x3="+x3+"&x4="+x4;
				helpwin=window.open(urlholder,"helpwin","width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
				window.helpwin.moveTo(0,0);
			}
			// -->
			</script>
			<link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
			<script language="javascript" src="../../js/hilitebu.js"></script>

			<STYLE TYPE="text/css">
			A:link  {color: #000066;}
			A:hover {color: #cc0033;}
			A:active {color: #cc0000;}
			A:visited {color: #000066;}
			A:visited:active {color: #cc0000;}
			A:visited:hover {color: #cc0033;}
			</style>
			<script language="JavaScript">
			<!--
			function popPic(pid,nm){

			 if(pid!="") regpicwindow = window.open("../../main/pop_reg_pic.php?sid='.$sid.'&lang='.$lang.'&pid="+pid+"&nm="+nm,"regpicwin","toolbar=no,scrollbars,width=180,height=250");

			}
			// -->
			</script>

			  	<script language="javascript">
			<!--
			function closewin()
			{
				location.href=\'startframe.php?sid='.$sid.'&lang='.$lang.'\';
			}
			// -->
			</script>';
  	return TRUE;
  }

  function Dispay_Headline2($Headline){
	echo '<table width=100% border=0 cellspacing=0 height=100%>
	<tbody class="main">
		<tr>
			<td  valign="top" align="middle" height="35">
				 <table cellspacing="0"  class="titlebar" border=0>
	          			<tr valign=top  class="titlebar" >
	            				<td bgcolor="#99ccff" >&nbsp;&nbsp;<font color="#330066">'.$Headline.'</font></td>
	  					<td bgcolor="#99ccff" align=right><a
	   href="javascript:window.history.back()"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)" ></a><a
	   href="javascript:gethelp(\'insurance_reports_companies.php\',\'Insurance Reports :: Company Overview\')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)"></a><a
	   href="insurance_tz.php?ntid=false&lang=$lang" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)"></a>  </td>
	 				</tr>
	 			</table>';
  	return TRUE;
  }

  function Dispay_Footer($Headline){
	echo '<tr>
		<td>
			<table cellspacing="0"  class="titlebar" border=0>
          			<tr valign=top  class="titlebar" >
           				<td bgcolor="#99ccff" >&nbsp;&nbsp;<font color="#330066"><?php echo $LDManageInsurances; ?></font></td>
  					<td bgcolor="#99ccff" align=right><a
   href="javascript:window.history.back()"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)" ></a><a
   href="javascript:gethelp('insurance_companies_overview.php','Administrative Companies :: Overview')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)"></a><a
   href="insurance_tz.php?ntid=false&lang=$lang" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)"></a>  </td>
 				</tr>
			</table>
		</td>
	<tr>
	<tr valign=top >
		<td bgcolor=#cccccc>
			<table width="100%" border="0" cellspacing="0" cellpadding="1" bgcolor="#cfcfcf">
				<tr>
					<td align="center">
 						<table width="100%" bgcolor="#ffffff" cellspacing=0 cellpadding=5>

   							<tr>
   								<td><div class="copyright">
<script language="JavaScript">
<!--
function openCreditsWindow() {

	urlholder="../../language/$lang/$lang_credits.php?lang=$lang";
	creditswin=window.open(urlholder,"creditswin","width=500,height=600,menubar=no,resizable=yes,scrollbars=yes");

}
// -->
</script>


 <a href="http://www.luico.co.tz" target=_new>CARE2X 3rd Generation pre-deployment 3.3</a> :: <a href="../../legal_gnu_gpl.htm" target=_new> License</a> ::
 <a href=mailto:care2x@luico.co.tz>Contact</a>  :: <a href="../../language/en/en_privacy.htm" target="pp"> Our Privacy Policy </a> ::
 <a href="../../docs/show_legal.php?lang=$lang" target="lgl"> Legal </a> ::
 <a href="javascript:openCreditsWindow()"> Credits </a> ::.<br>

								</div></td>
   							</tr>
  						</table>
					</td>
				</tr>
			</table>
		</td>

	</tr>

	</tbody>
 </table>


</BODY>
</HTML>';

  	return TRUE;
}
}
