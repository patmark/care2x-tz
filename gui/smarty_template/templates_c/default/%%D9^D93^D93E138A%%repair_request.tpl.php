<?php /* Smarty version 2.6.22, created on 2011-09-30 01:11:06
  compiled from tech/repair_request.tpl */ ?>

<ul>
    <div class="prompt"><?php echo $this->_tpl_vars['sButton']; ?>
        <?php echo $this->_tpl_vars['LDReRepairTxt']; ?>
    </div>

    <?php echo $this->_tpl_vars['sFormTag']; ?>

    <table cellpadding="5"  border="0" cellspacing=1>
        <tr>
            <td bgcolor=#ffffcc valign="top">
                <?php echo $this->_tpl_vars['LDRepairArea']; ?>
                :<br>
                <input name="dept" type="text" value="<?php echo $this->_tpl_vars['sArea']; ?>
                       " size="30" maxlength="25">
            </td>

            <td bgcolor=#ffffcc >
                <?php echo $this->_tpl_vars['LDReporter']; ?>
                :<br>
                <input type="text" name="reporter" size="30" value="<?php echo $this->_tpl_vars['sUserName']; ?>
                       ">
                <br>
                <?php echo $this->_tpl_vars['LDPersonnelNr']; ?>
                :<br>
                <input type="text" name="id" size="30" value=""><br>
                <?php echo $this->_tpl_vars['LDPhoneNr']; ?>
                :<br>
                <input type="text" name="tphone" size="30" value="<?php echo $this->_tpl_vars['sThisPhoneNr']; ?>
                       ">
            </td>
        </tr>
        <tr>
            <td colspan=2 bgcolor=#ffffcc ><FONT    SIZE=-1  FACE="Arial">
                <?php echo $this->_tpl_vars['LDPlsDescribe']; ?>
                :<br>
                <TEXTAREA NAME="job" Content-Type="text/html" COLS="60" ROWS="10"></TEXTAREA>
			</td>
		</tr>
</table>
<p>
        <?php echo $this->_tpl_vars['sHiddenInputs']; ?>

&nbsp;
<p>
        <?php echo $this->_tpl_vars['pbSubmit']; ?>
        <?php echo $this->_tpl_vars['pbCancel']; ?>

</form>

<p>
        <?php echo $this->_tpl_vars['sButton']; ?>
        <?php echo $this->_tpl_vars['sReportLink']; ?>
<br>
        <?php echo $this->_tpl_vars['sButton']; ?>
        <?php echo $this->_tpl_vars['sQuestionLink']; ?>
<br>

</ul>