<?php /* Smarty version 2.6.0, created on 2009-03-03 19:22:56
  compiled from nursing/ward_transferbed_list.tpl */ ?>

<table cellspacing="0" width="100%">
    <tbody>
        <tr>
            <td class="adm_item"><?php echo $this->_tpl_vars['LDRoom']; ?>
            </td>
            <td class="adm_item"><?php echo $this->_tpl_vars['LDBed']; ?>
            </td>
            <td class="adm_item"><?php echo $this->_tpl_vars['LDFamilyName']; ?>
                , <?php echo $this->_tpl_vars['LDName']; ?>
            </td>
            <td class="adm_item"><?php echo $this->_tpl_vars['LDBirthDate']; ?>
            </td>
            <td class="adm_item"><?php echo $this->_tpl_vars['LDBillType']; ?>
            </td>
            <td class="adm_item"></td> &nbsp;
        </tr>

        <?php echo $this->_tpl_vars['sOccListRows']; ?>


    </tbody>
</table>