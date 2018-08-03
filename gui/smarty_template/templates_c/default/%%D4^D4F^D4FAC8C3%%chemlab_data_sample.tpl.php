<?php /* Smarty version 2.6.22, created on 2017-07-19 02:17:27
         compiled from laboratory/chemlab_data_sample.tpl */ ?>
<table width="100%" border="0">
    <tbody>
        <tr valign="top">
            <td>
                                <form method="post" <?php echo $this->_tpl_vars['sFormAction']; ?>
 onSubmit="return pruf(this)" name="datain">
                    <table cellspacing=1 cellpadding=1 width="50%"  bgcolor=#ffdddd style="margin: auto;">
                        <tbody>
                            <tr>
                                <td class="adm_item"><?php echo $this->_tpl_vars['LDCaseNr']; ?>
:</td>
                                <td class="adm_input"><?php echo $this->_tpl_vars['sPID']; ?>
</td>
                            </tr>
                            <tr>
                                <td class="adm_item"><?php echo $this->_tpl_vars['LDLastName']; ?>
, <?php echo $this->_tpl_vars['LDName']; ?>
:</td>
                                <td class="adm_input"><b><?php echo $this->_tpl_vars['sLastName']; ?>
, <?php echo $this->_tpl_vars['sName']; ?>
</b></td>
                            </tr>
                            <tr>
                                <td class="adm_item"><?php echo $this->_tpl_vars['LDBday']; ?>
:</td>
                                <td class="adm_input"><b><?php echo $this->_tpl_vars['sBday']; ?>
</b></td>
                            </tr>
                            <tr>
                                <td class="adm_item"><?php echo $this->_tpl_vars['LDJobIdNr']; ?>
:</td>
                                <td class="adm_input"><?php echo $this->_tpl_vars['sJobIdNr']; ?>
</td>
                            </tr>

                        </tbody>
                    </table>

                    <table cellspacing=1 cellpadding=1 width="50%"  bgcolor=#ffdddd style="margin: auto;">
                        <tbody>
                            <?php echo $this->_tpl_vars['inParameters']; ?>


                            <tr>
                                <td><?php echo $this->_tpl_vars['pbSave']; ?>
</td>
                                <td align="right"><?php echo $this->_tpl_vars['pbCancel']; ?>
</td>
                            </tr>
                        </tbody>
                    </table>

                </form>
            </td>

        </tr>
    </tbody>
</table>