<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc"> <b><?php echo "Laboratorio - $x3" ?></b></font> 
<form action="#" >
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php if ($src == "") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
            �C�mo hago aparecer la tabla gr�fica para los par�metros de pruebas?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� clic 
            en la casilla para poner los vistos 
            <input type="checkbox" name="s" value="s" checked>
            correspondiente al par�metro que desea seleccionar.<br>
            <b>Paso 2: </b>Si usted desea mostrar varios par�metros a la vez, d� clic 
            en sus casillas correspondientes.<br>
            <b>Paso 3: </b>D� clic en el �cono <img src="../img/chart.gif" width=16 height=17 border=0> 
            para mostrar la tabla gr�fica.<br>
            </font>
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> Deseo seleccionar todos los par�metros. �Existe una 
            forma r�pida de seleccionarlos todos a la vez?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>S� la hay!</b><br>
            <b>Paso 1: </b>D� clic en el bot�n <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?> border=0> 
            para seleccionar todos los par�metros.<br>
            </font>
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �C�mo borro todos los par�metros seleccionados?</b> 
        </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� clic 
            en el bot�n <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?> border=0> 
            nuevamente para BORRAR todos los par�metros previamente seleccionados.<br>
            </font>
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
    <?php endif; ?>
    <?php if ($src == "graph") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>�C�mo 
            retorno a los resultados de las pruebas sin las tablas gr�ficas? </b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota: </b>Si usted desea 
            regresar, d� clic en el bot�n <img <?php echo createLDImgSrc('../', 'back2.gif', '0', 'absmiddle') ?>>.</font>
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
    <?php endif; ?>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>�C�mo 
        cierro la ventana de laboratorio?<?php echo $x3 ?>? </b></font></font> 
    <ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota: </b>Si usted desea 
        cerrar, d� clic en el bot�n <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?> align="absmiddle">.</font>
    </ul>


</form>

