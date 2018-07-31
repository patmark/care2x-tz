<?php /* Smarty version 2.6.22, created on 2011-09-30 01:09:06
  compiled from tech/inquiry_listbox.tpl */ ?>

<form action="technik-questions.php">
    <table cellspacing=0 cellpadding=1 border=0 class="frame" width=20%>
        <tr>
            <td>

                <table  cellspacing=0 cellpadding=2 >
                    <tr class="submenu2_titlebar">
                        <td align=center>
                            <b><?php echo $this->_tpl_vars['LDLastQuestions']; ?>
                            </b>
                        </td>
                    </tr>
                    <tr class="submenu2_list">
                        <td>
                            <?php echo $this->_tpl_vars['sInquiryList']; ?>

                        </td>
                    </tr>
                    <tr class="submenu2_body">
                        <td>
                    <center>
                        <?php echo $this->_tpl_vars['LDFrom']; ?>
                        :
                        <?php echo $this->_tpl_vars['sListboxHiddenInputs']; ?>

                        <?php echo $this->_tpl_vars['sListboxSubmit']; ?>

                    </center>
            </td>
        </tr>
    </table>

</td>
</tr>
</table>
</form>