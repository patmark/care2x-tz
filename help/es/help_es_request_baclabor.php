<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Solicitud de prueba de laboratorio Bacteriologico</b></font>
<p><ul>

    <?php
    if (!$src) {
        ?>
        <?php
    } else {
        ?>
        <a name="sel"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> </a><strong><font color="990000" size="2" face="Verdana, Arial, Helvetica, sans-serif">La 
            etiqueta del paciente no esta adjunta. &iquest;Que hacer?</font></strong>

        <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Escriba 
            ya sea la informaci�n completa o las primeras letras de la informacion del 
            paciente, como por ejemplo el apellido, nombre, o su numero. </font></p>
        <p><font color="#000066" size="2" face="Verdana, Arial, Helvetica, sans-serif">Ejemplo 1: escriba 
            "21000012" o "12". <br>
            Ejemplo 2: escriba "Guerero" o "gue". <br>
            Ejemplo 3: escriba "Alfredo" o "Alf". </font> 
        <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2: </b>D� 
            clic al boton <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> 
            para iniciar la b&uacute;squeda. </font> 
        <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 3: </b> 
            Si la busqueda encuentra un resultado, seleccione la persona de la lista clicando 
            el bot&oacute;n <img <?php echo createLDImgSrc('../', 'ok_small.gif', '0') ?>> 
            . </font> 
    </ul>
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 

    <?php
}
?>
</font>