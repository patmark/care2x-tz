<?php $claims_obj->Display_Header($LDBilling, '', ''); ?>
<BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066>

    <?php $claims_obj->Display_Headline($LDClaims, '', '', 'billing_overview.php', 'Billing :: Main Menu'); ?>


    <TABLE cellSpacing=0 width=600 class="submenu_frame" cellpadding="0" valign="middle">
        <TBODY valign="middle">
            <TR valign="middle">
                <TD valign="middle">
                    <TABLE cellSpacing=1 cellPadding=3 width=600 valign="middle">
                        <TBODY class="submenu" valign="middle">
                            <TR valign="middle">
                                <td align=center><img src="../../gui/img/common/default/showdata.gif" border=0></td>
                                <TD class="submenu_item"><nobr><a href="nhif_pass.php?patient=2&sid=<?php echo "$sid&target=review&lang=$lang" ?>"><?php echo $LDPendingClaimsOutp; ?></a></nobr></TD>
                <TD><?php echo $LDPendingClaimsOutp; ?></TD>
            </tr>
            <TR  height=1>
                <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
            </TR>
            <tr valign="middle">
                <td align=center><img src="../../gui/img/common/default/showdata.gif" border=0></td>
                <TD class="submenu_item"><nobr><a href="nhif_pass.php?patient=1&sid=<?php echo "$sid&target=review&lang=$lang" ?>"><?php echo $LDPendingClaimsInp; ?></a></nobr></TD>
    <TD><?php echo $LDPendingClaimsInp; ?></TD>
</tr>
<TR  height=1>
    <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
</TR>

<TR>
    <td align=center><img src="../../gui/img/common/default/showdata.gif" border=0></td>
    <TD class="submenu_item"><nobr><a href="nhif_pass.php?patient=2&sid=<?php echo "$sid&target=report&lang=$lang" ?>"><?php echo $LDClaimsReport; ?></a></nobr></TD>
<TD><?php echo $LDClaimsReport; ?></TD>
</tr>

</tr>

</TBODY>
</TABLE>
</TD>
</TR>
</TBODY>
</TABLE>


<?php $claims_obj->Display_Footer($LDBilling, '', '', 'billing_create_2.php', 'Billing :: Create Quotation'); ?>

<?php $claims_obj->Display_Credits(); ?>
