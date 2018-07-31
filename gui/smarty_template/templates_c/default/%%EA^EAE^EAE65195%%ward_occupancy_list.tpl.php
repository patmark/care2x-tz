<?php /* Smarty version 2.6.22, created on 2018-07-16 17:12:34
         compiled from nursing/ward_occupancy_list.tpl */ ?>

<table cellspacing="0" style="width:100%;">
    <tbody>
        <tr>
            <td class="wardlisttitlerow">&nbsp;</td>
            <td class="wardlisttitlerow"><?php echo $this->_tpl_vars['LDRoom']; ?>
</td>
            <td class="wardlisttitlerow"><?php echo $this->_tpl_vars['LDBed']; ?>
</td>
            <td class="wardlisttitlerow"><?php echo $this->_tpl_vars['LDFamilyName']; ?>
, <?php echo $this->_tpl_vars['LDName']; ?>
</td>
            <td class="wardlisttitlerow"><?php echo $this->_tpl_vars['LDBirthDate']; ?>
</td>
            <td class="wardlisttitlerow"><?php echo $this->_tpl_vars['LDPatNr']; ?>
</td>
            <td class="wardlisttitlerow"><?php echo $this->_tpl_vars['LDAdmissionDate']; ?>
</td>
            <td class="wardlisttitlerow"><?php echo $this->_tpl_vars['LDInsuranceType']; ?>
</td>
            <td class="wardlisttitlerow"><?php echo $this->_tpl_vars['LDOptions']; ?>
</td>
        </tr>

        <?php echo $this->_tpl_vars['sOccListRows']; ?>


    </tbody>
</table>