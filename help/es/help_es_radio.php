<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    Radiolog�a Rayos X - 
    <?php
    if ($src == "search") {
        print "Buscar un paciente";
    }
    ?>
</b>
</font>
<p><font size=2 face="verdana,arial" >
<form action="#" >
<?php if ($src == "search") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b> 
            C�mo buscar un paciente?</b> </font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Ingrese 
            la palabra completa o las primeras letras del apellido del paciente o el n�mero 
            del paciente, o el nombre del paciente en el campo. <br>
            <b>Paso 2: </b>D� clic en el bot�n <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> 
            para que el computador inicie la b�squeda del paciente.</font> 
            <p> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota: </b>Si 
                la b�squeda entrega un resultado, se mostrar� una lista.</font>
            </ul>
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> C�mo puedo previsualizar una radiograf�a del paciente 
            y su diagn�stico?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic en el hiperv�nculo o en el bot�n "<span style="background-color:yellow" > 
                <font color="#0000cc">Previsualizar/Diagn�stico</font> 
                <input type="radio" name="d" value="a">
            </span>".<br>
            Aparecer� una miniatura de la radiograf�a en el marco inferior izquierda.<br>
            El diagn�stico aparecer� en el marco inferior derecho.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> C�mo puedo ver toda la radiograf�a del paciente?</b> 
        </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic en el bot�n <img <?php echo createComIcon('../', 'torso.gif', '0') ?>> 
            del paciente respectivo para pasar a la modalidad de pantalla completa.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
        <font color="#990000"><b> Nota:</b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si desea pasar 
            a la ventana anterior, d� clic en el bot�n <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>. 
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<?php endif; ?>
    </font> 
</form>

