<?PHP
//Teil eins der Untermen�auswahl; 
?>
<!--**************************************************************************-->
<!-- Der Abschnitt zwischen den Sternen beschreibt die erste Zeile f�r das Submen� dieses Moduls -->			
<TABLE cellSpacing=0 cellPadding=0 width=550 bgColor=#999999 border=0>
        <TBODY>
        <TR>
          <TD>
            <TABLE cellSpacing=1 cellPadding=3 width=550 bgColor=#999999 
            border=0>
              <TBODY>	
							
						
											
					<TR bgColor=#eeeeee><td align=center><img <?php echo createComIcon($root_path,'cf.gif','0') ?>></td>
                <TD vAlign=top ><FONT 
                  face="Verdana,Helvetica,Arial" size=2><B><nobr>
				  <a href="<?php echo $thismodulname; ?>-main-pass.php?sid=<?php echo $sid."&lang=$lang"; ?>&target=<?php echo $thismodulname ?>"><?php echo $beschreibung;//" starten"; ?></a>
				  </nobr></B></FONT></TD>
                <TD><FONT face="Verdana,Helvetica,Arial" 
                  size=2><?php echo $beschreibungtxt;//"startet das Modul" ?></FONT></TD>
<!-- graue Zeile f�r Abstand einf�gen , falls ein weiterer Menpunkt per copy-paste angef�t wird
	             <TR bgColor=#dddddd height=1>
                <TD colSpan=3><IMG height=1 
                  src="../../gui/img/common/default/pixel.gif" 
                  width=5></TD></TR>
-->
</TBODY>
		</TABLE>
		</TD></TR>
		</TBODY>
		</TABLE>			
<!--**************************************************************************-->		

	
	