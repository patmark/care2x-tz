<?php $bill_obj->Display_Header($LDBilling, '', ''); ?>
<BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066>

    <script language="JavaScript">

        function open_drug_services() {
            urlholder = "<?php echo $root_path; ?>modules/pharmacy_tz/pharmacy_tz_pass.php<?php echo URL_APPEND; ?>&target=drugsnservices&prescrServ=serv&task=newprescription&back_path=billing";
            patientwin = window.open(urlholder, "Ziel", "width=750,height=550,status=yes,menubar=no,resizable=yes,scrollbars=yes");
            patientwin.moveTo(0, 0);
            patientwin.resizeTo(screen.availWidth, screen.availHeight);
        }
        function open_lab_request() {
            urlholder = "<?php echo $root_path; ?>modules/laboratory/labor_test_request_pass.php?<?php echo URL_APPEND; ?>&target=chemlabor&user_origin=bill";
            patientwin = window.open(urlholder, "Ziel", "width=750,height=550,status=yes,menubar=no,resizable=yes,scrollbars=yes");
            patientwin.moveTo(0, 0);
            patientwin.resizeTo(screen.availWidth, screen.availHeight);
        }

    </script>
    <?php $bill_obj->Display_Headline($LDBilling, '', '', 'billing_overview.php', 'Billing :: Main Menu'); ?>


    <TABLE cellSpacing=0 width=600 class="submenu_frame" cellpadding="0" valign="middle">
        <TBODY valign="middle">
            <TR valign="middle">
                <TD valign="middle">
                    <TABLE cellSpacing=1 cellPadding=3 width=600 valign="middle">
                        <TBODY class="submenu" valign="middle">
                            <TR valign="middle">
                                <td align=center><img src="../../gui/img/common/default/showdata.gif" border=0></td>
                                <TD class="submenu_item"><nobr><a href="billing_tz_pass.php?patient=outpatient&sid=<?php echo "$sid&target=outpatient&lang=$lang" ?>"><?php echo "Create Outpatient Quotation" ?></a></nobr></TD>
                <TD><?php echo $LDShowPendingQuot; ?></TD>
            </tr>
            <TR>
                <td align=center><img src="../../gui/img/common/default/showdata.gif" border=0></td>
                <TD class="submenu_item"><nobr><a href="billing_tz_pass.php?patient=inpatient&sid=<?php echo "$sid&target=inpatient&lang=$lang" ?>"><?php echo "Create Inpatient Quotation" ?></a></nobr></TD>
    <TD><?php echo $LDShowPendingQuot; ?></TD>
</tr>

<TR>
    <td align=center><img src="../../gui/img/common/default/showdata.gif" border=0></td>
    <TD class="submenu_item"><nobr><a href="billing_tz_pass.php?patient=artndental&sid=<?php echo "$sid&target=artndental&lang=$lang" ?>"><?php echo "Create ART and Dental Quotation" ?></a></nobr></TD>
<TD><?php echo $LDShowPendingQuot; ?></TD>
</tr>

<TR  height=1>
    <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
</TR>

<TR>
    <td height="26" align=center><img src="../../gui/img/common/default/prescription.gif" border=0 width="16" height="16"></td>
<!--  <TD class="submenu_item"><nobr><a href="<?php echo $root_path; ?>/modules/pharmacy_tz/pharmacy_tz_pending_prescriptions.php<?php echo URL_APPEND; ?>&target=search&task=newprescription&back_path=billing">Drug and other services request</a></nobr></TD> --> 
    <TD class="submenu_item"><nobr><a href="javascript:open_drug_services()" ><?php echo $LDDrugandService ?></a></nobr></TD>

<TD><?php echo $LDPrescription; ?></TD>
</TR>

<TR  height=1>
    <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
</TR>
<TR>
    <td align=center><img src="../../gui/img/common/default/comments.gif" border=0></td>
    <TD class="submenu_item"><nobr><a href="billing_tz_pass.php?sid=<?php echo "$sid&target=pending&lang=$lang" ?>"><?php echo $LDPendingBills ?></a></nobr></TD>
<TD><?php echo $LDShowPendingnewBill; ?></TD>
</tr>

<TR>
    <td align=center><img src="../../gui/img/common/default/update2.gif" border=0></td>
    <TD class="submenu_item"><nobr><a href="billing_tz_pass.php?sid=<?php echo "$sid&target=pendingtable&lang=$lang" ?>"><?php echo $LDPendingBillsTable ?></a></nobr></TD>
<TD><?php echo $LDShowPendingnewBill; ?></TD>
</tr>

<TR>
    <td height="26" align=center><img src="../../gui/img/common/default/bestell.gif" border=0 width="16" height="16"></td>
    <TD class="submenu_item"><nobr><a href="billing_tz_pass.php?page=1&sid=<?php echo "$sid&target=archive&lang=$lang" ?>"><?php echo $LDBillingArchive ?></a></nobr></TD>
<TD><?php echo $LDShowsArchiveBills; ?></TD>
</tr>
<TR>
    <td height="26" align=center><img src="../../gui/img/common/default/bestell.gif" border=0 width="16" height="16"></td>
    <TD class="submenu_item"><nobr><a href="billing_tz_pass.php?page=1&sid=<?php echo "$sid&target=archiverep&lang=$lang" ?>"><?php echo $LDBillingArchiveReport ?></a></nobr></TD>
<TD><?php echo $LDShowsArchiveBillsReport; ?></TD>
</tr>

<TR  height=1>
    <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
</TR>
<!--
<TR>
  <td height="26" align=center><img src="../../gui/img/common/default/prescription.gif" border=0 width="16" height="16"></td>
  <TD class="submenu_item"><nobr><a href="<?php echo $root_path; ?>modules/radiology/radiolog.php?ntid=false&lang=en">Radiology</a></nobr></TD>
  <TD>Radiology Test Request</TD>
</tr>
-->
<!--                    <TR>
                        <td height="26" align=center><img src="../../gui/img/common/default/prescription.gif" border=0 width="16" height="16"></td>
-->                        <!--<TD class="submenu_item"><nobr><a href="<?php echo $root_path; ?>modules/laboratory/labor_test_request_pass.php?<?php echo URL_APPEND; ?>&target=chemlabor&user_origin=bill">'.$LDLabTestRequest.'</a></nobr></TD> -->
<!-- 					<TD class="submenu_item"><nobr><a href="javascript:open_lab_request()"><?php echo $LDLabTestRequest ?></a></nobr></TD>
                        <TD><?php echo $LDLaborTest; ?></TD>
                      </tr>
                      <TR>
                        <td height="26" align=center><img src="../../gui/img/common/default/prescription.gif" border=0 width="16" height="16"></td>
-->                      <!-- <TD class="submenu_item"><nobr><a href="<?php echo $root_path; ?>/modules/pharmacy_tz/pharmacy_tz_pending_prescriptions.php<?php echo URL_APPEND; ?>&target=search&task=newprescription&back_path=billing">Drug and other services request</a></nobr></TD> -->
<!--                     <TD class="submenu_item"><nobr><a href="javascript:open_drug_services()" ><?php echo $LDDrugandService ?></a></nobr></TD>

                                                <TD><?php echo $LDPrescription; ?></TD>
                      </tr>-->


<TR  height=1>
    <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
</TR>
<TR>
    <td height="26" align=center><img src="../../gui/img/common/default/pdata.gif" border=0></td>
    <TD class="submenu_item"><nobr><a href="billing_tz_pass.php?sid=<?php echo "$sid&target=insurance&lang=$lang" ?>"><?php echo $LDInsuranceManagement ?></a></nobr></TD>
<TD><?php echo $LDAddEditRemoveIns; ?></TD>
</tr>
<TR  height=1>
    <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
</TR>

</TBODY>
</TABLE>
</TD>
</TR>
</TBODY>
</TABLE>


<?php $bill_obj->Display_Footer($LDBilling, '', '', 'billing_create_2.php', 'Billing :: Create Quotation'); ?>

<?php $bill_obj->Display_Credits(); ?>
