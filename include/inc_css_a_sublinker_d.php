<?php

if ($cfg['dhtml']) {
    print' 
	<STYLE TYPE="text/css">
	A:link  {text-decoration: none; color: ' . $cfg['idx_txtcolor'] . ';}
	A:hover {text-decoration: underline; color: ' . $cfg['idx_hover'] . ';}
	A:active {text-decoration: none; color: ' . $cfg['idx_alink'] . ';}
	A:visited {text-decoration: none; color: ' . $cfg['idx_txtcolor'] . ';}
	A:visited:active {text-decoration: none; color: ' . $cfg['idx_alink'] . ';}
	A:visited:hover {text-decoration: underline; color: ' . $cfg['idx_hover'] . ';}
	</style>';

    print'
	<SCRIPT language="JavaScript" src="../js/sublinker-d.js">
    </SCRIPT>';
}
?>
