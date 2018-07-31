<?php /* Smarty version 2.6.22, created on 2016-08-13 20:39:33
         compiled from products/form.tpl */ ?>

<font class="prompt"><?php echo $this->_tpl_vars['sSaveFeedBack']; ?>
</font>
<font class="warnprompt"><?php echo $this->_tpl_vars['sMascotImg']; ?>
 <?php echo $this->_tpl_vars['LDOrderNrExists']; ?>
 <br> <?php echo $this->_tpl_vars['sNoSave']; ?>
</font>

<?php echo $this->_tpl_vars['sFormStart']; ?>


	
	<table border=0 cellspacing=1 cellpadding=3>
	<tbody class="submenu">
		<tr>
		<td align=right width=140 class="prompt"><?php echo $this->_tpl_vars['LDOrderNr']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sOrderNrInput']; ?>
</td>
		<td rowspan=14 valign=top><?php echo $this->_tpl_vars['LDPreview']; ?>
 <br> <?php echo $this->_tpl_vars['sProductImage']; ?>
</td>
		</tr>
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDArticleName']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sArticleNameInput']; ?>
</td>
		</tr>
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDGeneric']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sGenericInput']; ?>
</td>
		</tr>
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDDescription']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sDescriptionInput']; ?>
</td>
		</tr>
		<!-- Comment by RM

		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDPacking']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sPackingInput']; ?>
</td>
		</tr>
		-->
		<!-- Comment by RM
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDCAVE']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sCAVEInput']; ?>
</td>
		</tr>
		-->
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDCategory']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sCategoryInput']; ?>
</td>
		</tr>
		<!-- Comment by RM
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDMinOrder']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sMinOrderInput']; ?>
</td>
		</tr>
		-->
		<!-- Comment by RM
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDMaxOrder']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sMaxOrderInput']; ?>
</td>
		</tr>
		-->
		<!-- Comment by RM
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDPcsProOrder']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sPcsProOrderInput']; ?>
</td>
		</tr>
		-->
		<!-- Comment by RM
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDIndustrialNr']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sIndustrialNrInput']; ?>
</td>
		</tr>
		-->
		<!-- Comment by RM
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDLicenseNr']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sLicenseNrInput']; ?>
</td>
		</tr>
		-->
		<!-- Comment by RM
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDPicFile']; ?>
</td>
		<td><?php echo $this->_tpl_vars['sPicFileInput']; ?>
</td>
		</tr>
		-->
		<tr>
		<td align=right width=140><?php echo $this->_tpl_vars['LDReset']; ?>
</td>
		<td align=right><?php echo $this->_tpl_vars['LDSave']; ?>
 <?php echo $this->_tpl_vars['sUpdateButton']; ?>
</td>
		</tr>
	</tbody>
	</table>

		<?php echo $this->_tpl_vars['sHiddenInputs']; ?>

	
	<?php echo $this->_tpl_vars['sNewProduct']; ?>


<?php echo $this->_tpl_vars['sFormEnd']; ?>


<?php echo $this->_tpl_vars['sBreakButton']; ?>
