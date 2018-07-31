<?php /* Smarty version 2.6.22, created on 2011-09-30 01:09:06
  compiled from tech/send_inquiry.tpl */ ?>

<ul>

    <?php if ($this->_tpl_vars['bShowInquiry']): ?>
        <?php
        $_smarty_tpl_vars = $this->_tpl_vars;
        $this->_smarty_include(array('smarty_include_tpl_file' => "tech/show_inquiry.tpl", 'smarty_include_vars' => array()));
        $this->_tpl_vars = $_smarty_tpl_vars;
        unset($_smarty_tpl_vars);
        ?>
    <?php endif; ?>

    <table cellpadding="5"  border="0" cellspacing=1 width=100%>
        <tr valign=top>
            <td>

                <div class="prompt"><?php echo $this->_tpl_vars['sButton']; ?>
                    <?php echo $this->_tpl_vars['LDQuestions']; ?>
                    <br><font size="1"><?php echo $this->_tpl_vars['LDPlsNoRequest']; ?>
                    </font></div>

                <?php echo $this->_tpl_vars['sFormTag']; ?>

                <table cellpadding="5"  border="0" cellspacing=1>
                    <tr>
                        <td bgcolor=#dddddd >
                            <?php echo $this->_tpl_vars['LDEnterQuestion']; ?>
                            :<br>
                            <TEXTAREA NAME="query" Content-Type="text/html" COLS="50" ROWS="10"></TEXTAREA>
					</td>
				</tr>
				<tr>
					<td bgcolor=#dddddd >
                            <?php echo $this->_tpl_vars['LDName']; ?>
:<br><input type="text" name="inquirer" size="30"  value="<?php echo $this->_tpl_vars['sInquirer']; ?>
"> <br>
                            <?php echo $this->_tpl_vars['LDDept']; ?>
:<br><input type="text" name="dept" size="30" value="<?php echo $this->_tpl_vars['dept_name']; ?>
">
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
                    <?php echo $this->_tpl_vars['sRepairLink']; ?>
<br>
                    <?php echo $this->_tpl_vars['sButton']; ?>
                    <?php echo $this->_tpl_vars['sReportLink']; ?>
<br>

		</td>

		<td align="center">
                <?php
                $_smarty_tpl_vars = $this->_tpl_vars;
                $this->_smarty_include(array('smarty_include_tpl_file' => "tech/inquiry_listbox.tpl", 'smarty_include_vars' => array()));
                $this->_tpl_vars = $_smarty_tpl_vars;
                unset($_smarty_tpl_vars);
                ?>
		</td>
	</tr>
</table>
</ul>