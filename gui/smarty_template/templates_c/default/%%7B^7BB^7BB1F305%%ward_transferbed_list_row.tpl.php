<?php /* Smarty version 2.6.22, created on 2017-07-17 00:33:21
         compiled from nursing/ward_transferbed_list_row.tpl */ ?>

<?php if ($this->_tpl_vars['bHighlightRow']): ?>
<tr class="hilite">
    <?php elseif ($this->_tpl_vars['bToggleRowClass']): ?>
<tr class="wardlistrow1">

    <?php else: ?>
<tr class="wardlistrow2">
    <?php endif; ?>
    <td>&nbsp;<?php echo $this->_tpl_vars['sRoom']; ?>
</td>
    <td>&nbsp;<?php echo $this->_tpl_vars['sBed']; ?>
 <?php echo $this->_tpl_vars['sBedIcon']; ?>
</td>
    <td>&nbsp;<?php echo $this->_tpl_vars['sTitle']; ?>
 <?php echo $this->_tpl_vars['sFamilyName']; ?>
<?php echo $this->_tpl_vars['cComma']; ?>
 <?php echo $this->_tpl_vars['sName']; ?>
</td>
    <td>&nbsp;<?php echo $this->_tpl_vars['sBirthDate']; ?>
</td>
    <td>&nbsp;<?php echo $this->_tpl_vars['sInsuranceType']; ?>
</td>
    <td>&nbsp;<?php echo $this->_tpl_vars['sNotesIcon']; ?>
</td>
</tr>
<tr>
    <td colspan="8" class="thinrow_vspacer"><?php echo $this->_tpl_vars['sOnePixel']; ?>
</td>
</tr>