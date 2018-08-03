
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<HTML>
<HEAD>
 <TITLE><?php echo $LDReportingModule; ?></TITLE>
 <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
 <meta name="Author" content="Robert Meggle">
 <meta name="Generator" content="various: Quanta, AceHTML 4 Freeware, NuSphere, PHP Coder">
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

  	<script language="javascript" >
<!--
function gethelp(x,s,x1,x2,x3,x4)
{
	if (!x) x="";
	urlholder="../../main/help-router.php?sid=<?php echo sid;?>&lang=$lang&helpidx="+x+"&src="+s+"&x1="+x1+"&x2="+x2+"&x3="+x3+"&x4="+x4;
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

 if(pid!="") regpicwindow = window.open("../../main/pop_reg_pic.php?sid=<?php echo sid;?>&lang=$lang&pid="+pid+"&nm="+nm,"regpicwin","toolbar=no,scrollbars,width=180,height=250");

}
function getARV(path) {
	urlholder="<?php echo $root_path ?>"+path+"<?php echo URL_REDIRECT_APPEND; ?>";
	patientwin=window.open(urlholder,"arv","menubar=no,resizable=yes,scrollbars=yes");
	patientwin.resizeTo(screen.availWidth,screen.availHeight);
	patientwin.focus();
}

// -->
</script>


</HEAD>
<BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066  >

<!-- START HEAD OF HTML CONTENT --->

<table width=100% border=0 cellspacing=0 height=100%>
	<tr>
		<td  valign="top" align="middle" height="35">
			 <table cellspacing="0"  class="titlebar" border=0>
 				<tr valign=top  class="titlebar" >
  					<td width="202" bgcolor="#99ccff" >
    					&nbsp;&nbsp;<font color="#330066"><?php echo $LDClinicReports; ?></font></td>
						  <td width="408" align=right bgcolor="#99ccff">
						   <a href="javascript: history.back();"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)" ></a>
						   <a href="javascript:gethelp('reporting_overview.php','Reporting :: Overview')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)"></a>
						   <a href="<?php echo $root_path;?>modules/news/start_page.php" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)"></a>
						  </td>
  					 </tr>
 </table>

<!-- END HEAD OF HTML CONTENT -->

<br><br><br>
<TABLE cellSpacing=0 cellPadding=0 border=0 class="submenu_frame">
	<TBODY>
	<TR>
		<TD><table cellpadding=3 cellspacing=1>
              <tbody class="submenu">
                <tr>
                  <td width="74" align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td width="262" class="submenu_item"><a href="OPD_diagnostic.php"><?php echo $LDOPDDiagnostic; ?></a> </td>
                  <td width="371"><?php echo $LDAllDiagnosticsbyICD10; ?></td>
                </tr>
                <tr>
                <tr>
                  <td width="74" align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td width="262" class="submenu_item"><a href="OPD_diagnostic_1_month.php"><?php echo $LDOPDDiagnostic_1_month; ?></a> </td>
                  <td width="371"><?php echo $LDAllDiagnosticsbyICD10; ?></td>
                </tr>
                <tr>
  
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="OPD_summary.php"><?php echo $LDOPDSummary; ?></a>
                  </td>
                  <td><?php echo $LDAllvisits; ?></td>
                </tr>
                <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="OPD_summary_withoutdiagnosis.php"><?php echo $LDOPDSummary; ?></a>
                  </td>
                  <td><?php echo $LDAllvisitsWithoutDiagnosis; ?> </td>
                </tr>
                <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="OPD_infections.php"><?php echo $LDOPDInfectionsSummary; ?></a></td>
                  <td>&nbsp;</td>
                </tr>
                 <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="mtuha_icd10.php"><?php echo 'Mtuha-ICD10-Summary'; ?></a></td>
                  <td>&nbsp;</td>
                </tr>
                 <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="mtuha_icd10_report.php"><?php echo $LDMtuhaICD10Report; ?></a></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="mtuha_detailed.php"><?php echo $LDDetailedMTUHA; ?></a></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="mtuha_visits.php"><?php echo $LDMtuhaNewReturn; ?></a></td>
                  <td>&nbsp;</td>
                </tr>
                                <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="mtuha_opd_summary.php"><?php echo $LDMtuhaOPDSummary; ?></a></td>
                  <td>&nbsp;</td>
                </tr>

                <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="OPD_Admissions.php"><?php echo 'OPD Admission Summary'; ?>
                    </a></td>
                  <td><?php echo $LDOPDAdmissionReport; ?></td>
                </tr>
                    <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="OPD_new_return.php"><?php echo 'New and Return with Gender'; ?>
                    </a></td>
                  <td><?php echo $LDOPDAdmissionReport; ?></td>
                </tr>
				<tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="OPD_Department_Admissions.php"><?php echo 'OPD Departments Admission Summary'; ?>
                    </a></td>
                  <td><?php echo '  OPD Admissions Department Summary Report'; ?></td>
                </tr>
				
				 <TR  height=1>
                        <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
                      </TR>

				<td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="IPD_admissions.php"><?php echo 'IPD Admission Summary'; ?>
                    </a></td>
                  <td><?php echo 'IPD Admission Summary Report'; ?></td>
                </tr>
				
				<td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="IPD_discharge.php"><?php echo 'IPD Discharge Summary'; ?>
                    </a></td>
                  <td><?php echo 'IPD Discharge Summary Report'; ?></td>
                </tr>
				
				<td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="IPD_discharge_types.php"><?php echo 'IPD Discharge Types Summary'; ?>
                    </a></td>
                  <td><?php echo 'IPD Discharge Report by types'; ?></td>
                </tr>

               <!-- <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="OPD_total_summary.php"><?php echo $LDClinicSummary; ?></a> </td>
                  <td><?php echo $LDAllvisitsClinic; ?></td>
                </tr> -->
				
                <!--
                <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="javascript:getARV('modules/arv/arv_reporting_quarterly.php')">HIV Care Reporting</a></td>
                  <td>Quarterly Facility Based Reporting</td>
                </tr>
                 <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="javascript:getARV('modules/arv/arv_reporting_overview.php')">HIV Overview</a></td>
                  <td>Patient Data Overview</td>
                </tr>
                </tr>
                 <tr>
                  <td align=center><img src="../../gui/img/common/default/eyeglass.gif" border=0 width="17" height="17"></td>
                  <td class="submenu_item"><a href="javascript:getARV('modules/arv/arv_reporting_cstatistics.php')">HIV C-Statistics</a></td>
                  <td>C-Statistics Overview</td>
                </tr>
                 -->
              </tbody>
            </table></TD>
	</TR>
	</TBODY>
</TABLE>
<br><br><br>






<!-- START BOTTIOM OF HTML CONTENT --->

<table width="100%" border="1" cellspacing="0" cellpadding="1" bgcolor="#cfcfcf">
<tr>
	<td align="center">
  		<table width="100%" bgcolor="#ffffff" cellspacing=0 cellpadding=5>
   		<tr>
   			<td>
	    		<div class="copyright">
					<script language="JavaScript">
					<!-- Script Begin
					function openCreditsWindow() {

						urlholder="../../language/$lang/$lang_credits.php?lang=$lang";
						creditswin=window.open(urlholder,"creditswin","width=500,height=600,menubar=no,resizable=yes,scrollbars=yes");

					}
					//  Script End -->
					</script>


					 <a href="http://www.luico.co.tz" target=_new>CARE2X 3rd Generation pre-deployment 3.3</a> :: <a href="../../legal_gnu_gpl.htm" target=_new> License</a> ::
					 <a href=mailto:care2x@luico.co.tz>Contact</a>  :: <a href="../../language/en/en_privacy.htm" target="pp"> Our Privacy Policy </a> ::
					 <a href="../../docs/show_legal.php?lang=$lang" target="lgl"> Legal </a> ::
					 <a href="javascript:openCreditsWindow()"> Credits </a> ::.<br>

				</div>
    		</td>
   		<tr>
  		</table>
	</td>
	</tr>
</table>
<!-- START BOTTIOM OF HTML CONTENT --->

</BODY>
</HTML>
