<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    Radiologia - Subiendo im�genes Dicom

</b>
</font>
<p><font size=2 face="verdana,arial" >
<form action="#" >
    <?php
    if (!$src) {
        ?>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �Como subir im�genes?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Si est� 
            disponible el numero de referencia relacionado a la im�gen, escr&iacute;balo 
            en el campo "<font color=#0000ff>Numero</font>". </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2: </b>Si est� 
                disponible el numero o ID de referencia de los cocumentos relacionados, 
                escr&iacute;balo en el campo"<font color=#0000ff>ID's de documentos'&quot;</font> 
                separando el ID con comas. </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 3: </b>Escriba 
                una corta descripci�n de la imagen(es) en el campo "<font color=#0000ff>Notas</font>". 
                </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 4: </b>D� clic 
                al bot&oacute;n 
                <input type="button" value="Explorar">
                para abrir la ventana selectora de archivos. </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 5: </b>Seleccione 
                el archivo de imagen. </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 6: </b>Cuando 
                haya seleccionado las im�genes d� clic en el bot�n <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> 
                para empezar a subirlas. </font>
            <p> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �Como cambiar la cantidad de im�genes para subir?</b> 
        </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota: </b>Cambie el 
            numero solamente antes de escribir cualquier dato o antes de seleccionar las 
            im�genes. </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Escriba 
                el n�mero en el campo "Necesito subir 
                <input type="text" name="d" size=3 maxlength=1 value=4>
                " . </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2: </b>Clic 
                "Ir". </font>
            <p> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <?php
    } else {
        ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
            Despues de una transferencia exitosa, �como puedo checar la integridad de las 
            im�genes?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso: </b>D� clic al 
            &iacute;cono <img <?php echo createComIcon('../', 'torso.gif', '0') ?>> de "<b>Grupo 
                de Imagenes #</b>" para mostrar las im�genes en la misma ventana. </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="../help/es/img/es_dicom_group_in.png" border=0>
                </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Or: </b>D� clic 
                al &iacute;cono <img <?php echo createComIcon('../', 'torso_win.gif', '0') ?>> de 
                "<b>Grupo de Imagenes #</b>"para ver las im&aacute;genes en otra ventana. 
                </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="../help/es/img/es_dicom_group_ex.png" border=0>
                </font>
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> Despues de una transferencia exitosa, �como puedo 
            checar la integridad de cada im�gen?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso: </b>D� clic al 
            &iacute;cono <img <?php echo createComIcon('../', 'torso.gif', '0') ?>> para mostrar 
            una im�gen en la misma ventana. </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="../help/es/img/es_dicom_single_in.png" border=0>
                </font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Or: </b>D� clic 
                al &iacute;cono <img <?php echo createComIcon('../', 'torso_win.gif', '0') ?>> para 
                ver la im&aacute;gen en otra ventana.. </font> 
            <p> <img src="../help/es/img/es_dicom_single_ex.png" border=0>
        </ul>

        <?php
    }
    ?>

</form>

