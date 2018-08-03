
<p><font size=2 face="verdana,arial" >
<form action="#" >
    <b><font color="#000066" size="2" face="Verdana, Arial, Helvetica, sans-serif">Para actualizar o cambiar 
        datos</font></b> 
    <ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted desea 
        hacer cambios en la informaci�n, d� clic en el bot�n 
        <input type="button" value="Actualice los datos">
        . </font> 
    </ul>
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php if ($src == "search") : ?>
        <b><font color="990000">B�squeda nueva</font></b> </font><font face="Verdana, Arial, Helvetica, sans-serif"> 
        <ul>
            <font size="2"> Si usted desea hacer una nueva b�squeda, d� clic en el bot�n 
            <input type="button" value="Volver a la b�squeda">
            . </font> 
        </ul>
        <font size="2"> 
    <?php else : ?>
        <b><font color="990000">Para registrar la informaci�n de un paciente nuevo</font></b> 
        <ul>
            Si usted desea empezar un registro nuevo, d� clic en el bot�n<font face="Verdana, Arial, Helvetica, sans-serif"><font face="Verdana, Arial, Helvetica, sans-serif"><font size="2">
            <input name="button" type="button" value="Volver a admisi�n">
            </font></font>.</font>
        </ul>
        </font></font>
        <p><font face="Verdana, Arial, Helvetica, sans-serif"> <font size="2"> 
        <?php endif; ?>
        <b>Nota</b> </font></font> </p>
    <ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted desea volver 
        una ventana atr�s, d� clic en el bot�n <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>></font>. 
    </ul>


</form>

