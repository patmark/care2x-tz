<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title></title>

    </head>
    <body>
        <form >
            <font face="Verdana, Arial" size=2> <font  size=3 color="#0000cc"> <b> 
                <?php
                print "Soporte T�cnico - ";
                switch ($src) {
                    case "request": print "Solicitud de servicio de reparaci�n";
                        break;
                    case "report": print "Reporte el cumplimiento de un servicio de reparaci�n";
                        break;
                    case "queries": print "Env�e una consulta o pregunta";
                        break;
                    case "arch": print "Investigue en los archivos";
                        break;
                    case "showarch": print "Reporte";
                        break;
                }
                ?>
            </b> </font> 
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                <?php if ($src == "request") : ?>
                    </font> 
                <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                    <font color="#990000"><b> C�mo escribo una solicitud para servicio de reparaci�n?</b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Escriba 
                    la localizaci�n del da�o en el campo <nobr>"<span style="background-color:yellow" > 
                            Localizaci�n del da�o 
                            <input type="text" name="d" size=20 maxlength=10>
                        </span>"</nobr>.</font> 
                    <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2: 
                        </b>Escriba su nombre en <nobr>"<span style="background-color:yellow" > 
                            Solicitado por: 
                            <input type="text" name="d" size=20 maxlength=10>
                        </span>"</nobr>.<br>
                    <b>Paso 3: </b>Escriba su n�mero de personal en el campo <nobr>"<span style="background-color:yellow" > 
                            No. de Personal: 
                            <input type="text" name="d" size=20 maxlength=5>
                        </span>"</nobr>.<br>
                    <b>Paso 4: </b>Escriba su n�mero telef�nico en el campo <nobr>"<span style="background-color:yellow" > 
                            N�mero telef�nico: 
                            <input type="text" name="d" size=20 maxlength=5>
                        </span>"</nobr> en caso de que el departamento de soporte t�cnico tenga 
                    consultas referentes a su solicitud.</font> 
                    <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 5: 
                        </b>Escriba la descripci�n del da�o en el campo <nobr>"<span style="background-color:yellow" > 
                            Por favor describa el tipo de da�o: 
                            <input type="text" name="d" size=20 maxlength=5>
                        </span>"</nobr>.<br>
                    <b>Paso 6: </b>D� clic en el bot�n 
                    <input type="button" value="Enviar">
                    para enviar su solicitud. <br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota</b> </font><font face="Verdana, Arial, Helvetica, sans-serif"> 
                <ul>
                    <font size="2"> Si usted decide cerrar el formulario de pedidos, d� clic en 
                    el bot�n <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>. </font> 
                </ul>
                <font size="2"> </font><font face="Verdana, Arial" size=2><font face="Verdana, Arial, Helvetica, sans-serif"><font size="2">
            <?php endif; ?>
            </font></font></font><font size="2"> 
            <?php if ($src == "report") : ?>
                </font></font> 
                <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                    <font color="#990000"><b> �C�mo se reporta que un servico de reparaci�n ha 
                        concluido satisfactoriamente?</b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Escriba 
                    la localizaci�n del da�o en el campo <nobr>"<span style="background-color:yellow" > 
                            Localizaci�n del da�o 
                            <input type="text" name="d" size=20 maxlength=10>
                        </span>"</nobr>.</font> 
                    <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2: 
                        </b>Escriba el n�mero de identificaci�n de trabajo en el campo <nobr>"<span style="background-color:yellow" > 
                            No. de ID de trabajo: 
                            <input type="text" name="d" size=20 maxlength=10>
                        </span>"</nobr>.<br>
                    <b>Paso 3: </b>Escriba su nombre el el campo <nobr>"<span style="background-color:yellow" > 
                            T�cnico: 
                            <input type="text" name="d" size=20 maxlength=10>
                        </span>"</nobr>.<br>
                    <b>Paso 4: </b>Escriba su n�mero de Personal en el campo <nobr>"<span style="background-color:yellow" > 
                            No. de Personal: 
                            <input type="text" name="d" size=20 maxlength=5>
                        </span>"</nobr>.<br>
                    <b>Paso 5: </b>Escriba la descripci�n del trabajo de reparaci�n que ha llevado 
                    a cabo en el campo <nobr>"<span style="background-color:yellow" > Por favor 
                            describa el trabajo de reparaci�n que ha llevado a cabo: 
                            <input type="text" name="d" size=20 maxlength=5>
                        </span>"</nobr>.<br>
                    <b>Paso 6: </b>D� clic en el bot�n 
                    <input type="button" value="Enviar reporte">
                    para enviar su reporte. <br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota</b> </font><font face="Verdana, Arial, Helvetica, sans-serif"> 
                <ul>
                    <font size="2"> Si usted decide cerrar el formulario de pedidos, d� clic en 
                    el bot�n <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>. </font> 
                </ul>
                <font size="2"> 
            <?php endif; ?>
            <?php if ($src == "queries") : ?>
                </font></font> 
                <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                    <font color="#990000"><b> �C�mo env�o una consulta o pregunta al departamento 
                        de soporte t�cnico?</b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Escriba 
                    su consulta o pregunta en el campo <nobr>"<span style="background-color:yellow" > 
                            Por favor, escriba su pregunta: 
                            <input type="text" name="d" size=20 maxlength=5>
                        </span>"</nobr>.<br>
                    <b>Paso 2: </b>Escriba su nombre en el campo <nobr>"<span style="background-color:yellow" > 
                            Nombre: 
                            <input type="text" name="d" size=20 maxlength=10>
                        </span>"</nobr>.<br>
                    <b>Paso 3: </b>Escriba su departamento en el campo <nobr>"<span style="background-color:yellow" > 
                            Departamento: 
                            <input type="text" name="d" size=20 maxlength=5>
                        </span>"</nobr>.<br>
                    <b>Paso 4: </b>D� clic en el bot�n 
                    <input type="button" value="Enviar consulta">
                    para enviar su consulta. <br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b> �C�mo puedo ver mis consultas anteriores y las respuestas 
                    que el Departamento T�cnico haya dado a ellas?</b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Primero 
                    debe escribir su nombre y contrase�a. Escriba su nombre en el campo <nobr>"<span style="background-color:yellow" > 
                            De: 
                            <input type="text" name="d" size=20 maxlength=5>
                        </span>"</nobr> que se halla en la esquina superior derecha.<br>
                    <b>Paso 2: </b>D� clic en el bot�n 
                    <input type="button" value="Ingresar">
                    . <br>
                    <b>Paso 3: </b>Si usted ha enviado consultas previamente, ver� una lista de 
                    ellos en formato corto. <br>
                    <b>Paso 4: </b>Si su consulta recibi� respuesta por parte del Departamento 
                    T�cnico, el s�mbolo <img src="../gui/img/common/default/warn.gif" border=0 width=16 height=16 align="absmiddle"> 
                    aparecer� al final. <br>
                    <b>Paso 5: </b>Para leer su consulta y la respuesta del Departamento T�cnico 
                    a ella, d� clic en ella. <br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota</b> </font><font face="Verdana, Arial, Helvetica, sans-serif"> 
                <ul>
                    <font size="2"> Si usted decide cerrar el formulario de consultas, d� clic 
                    en el bot�n <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>. </font> 
                </ul>
                <font size="2"> 
            <?php endif; ?>
            <?php if ($src == "arch") : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                    �C�mo se leen los reportes t�cnicos?</b></font></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota: </b>Los 
                    reportes t�cnicos que no han sido le�dos o impresos todav�a se muestran de 
                    manera inmediata en una lista.</font> 
                    <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: 
                        </b>D� clic en el bot�n <img src="../gui/img/common/default/upArrowGrnLrg.gif" border=0 width=16 height=16 align="absmiddle"> 
                        del reporte que usted desea abrir. <br>
                        </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b> �C�mo busco un reporte t�cnico en particular?</b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Escriba 
                    ya sea palabras completas o las primeras letras en los campos correspondientes 
                    como se describe a continuaci�n.<br>
                    </font> 
                    <ul type=disc>
                        <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Si usted 
                            desea hallar reportes escritos por un t�cnico en particular, escriba el 
                            nombre del t�cnico en el campo "<span style="background-color:yellow" > 
                                T�cnico: 
                                <input type="text" name="t" size=11 maxlength=4 value="Nombre">
                            </span>".<br>
                            </font> 
                        <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Si usted 
                            desea hallar reportes de trabajos llevados a cabo en un departamento en 
                            particular, escriba el nombre del departamento en el campo "<span style="background-color:yellow" > 
                                Departamento: 
                                <input type="text" name="t" size=11 maxlength=4 value="Nombre">
                            </span>".<br>
                            </font> 
                        <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Si usted 
                            desea hallar reportes escritos en una fecha en particular, escriba la 
                            fecha en el campo "<span style="background-color:yellow" > Fecha desde: 
                                <input type="text" name="t" size=11 maxlength=4 value="Nombre">
                            </span>".<br>
                            </font> 
                        <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Si usted 
                            desea hallar reportes escritos dentro de un periodo dado, escriba la fecha 
                            de inicio en el campo "<span style="background-color:yellow" > Fecha desde: 
                                <input type="text" name="t" size=11 maxlength=4 value="Nombre">
                            </span>" y escriba la fecha de finalizaci�n en el campo "<span style="background-color:yellow" > 
                                hasta: 
                                <input type="text" name="t" size=11 maxlength=4 value="Nombre">
                            </span>".<br>
                            </font> 
                    </ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Buscar">
                    para empezar la b�squeda. <br>
                    <b>Paso 3: </b>Los resultados se mostrar�n en una lista. D� clic en el �cono 
                    <img src="../gui/img/common/default/upArrowGrnLrg.gif" border=0 width=16 height=16 align="absmiddle"> 
                    del reporte que desea abrir. <br>
                    <b>Nota: </b>Los reportes t�cnicos que se encuentran marcados con <img src="../gui/img/common/default/check-r.gif" border=0  align="absmiddle"> 
                    ya han sido le�dos o impresos.</font> 
                    <p> 
                </ul>
                </font> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
            <?php endif; ?>
            <?php if ($src == "showarch") : ?>
                <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> 
                    Marcando el reporte como le�do.</b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Marcar como 'le�do'">
                    .</font> 
                    <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota: </b>Cuando 
                        el reporte ha sido marcado como le�do, no aparecer� en la lista inmediatamente 
                        al inicio de cada b�squeda en el archivo. Solamente podr�n hallarse nuevamente 
                        mediante los m�todos de b�squeda en archivo usuales.</font>
                    <p> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
                <font color="#990000"><b> Imprimiendo el reporte.</b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Imprimir">
                    .</font> 
                    <p> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b> �C�mo volver al inicio de la b�squeda en el archivo?</b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Volver">
                    .</font> 
                    <p> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
            <?php endif; ?>
            <?php if ($src == "dutydoc") : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                    �C�mo se documentan las labores hechas durante las horas de trabajo?</b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Escriba 
                    la fecha en el campo " Fecha 
                    <input type="text" name="d" size=10 maxlength=10>
                    ".</font> 
                    <p> 
                    <ul>
                        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Tip: </b>Escriba 
                        ya sea "h" o "H" (que significa HOY) para que ingrese de manera autom�tica 
                        la fecha de hoy.<br>
                        <b>Tip: </b>Escriba ya sea "a" o "A" (que significa AYER) para que ingrese 
                        de manera autom�tica la fecha de ayer.</font> 
                        <p> 
                    </ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2: </b>Escriba 
                    el nombre de la enfermera "on-duty" en el campo <nobr>"<span style="background-color:yellow" > 
                            Apellido, nombre 
                            <input type="text" name="d" size=20 maxlength=10>
                        </span>"</nobr>.<br>
                    <b>Paso 3: </b>Escriba la hora en la que comenz� la tarea asignada en el campo 
                    "<span style="background-color:yellow" > de 
                        <input type="text" name="d" size=5 maxlength=5>
                    </span>".<br>
                    <b>Paso 4: </b>Escriba la hora en la que termin� la tarea asignada en el campo 
                    "<span style="background-color:yellow" > para 
                        <input type="text" name="d" size=5 maxlength=5>
                    </span>".</font> 
                    <p> 
                    <ul>
                        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Tip: </b>Escriba 
                        ya sea "n" o "N" (que significa AHORA) para que ingrese de manera autom�tica 
                        la hora actual.</font> 
                        <p> 
                    </ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 5: </b>Escriba 
                    el n�mero OR number en el campo "<span style="background-color:yellow" > Sala 
                        de operaciones 
                        <input type="text" name="d" size=5 maxlength=5>
                    </span>".<br>
                    <b>Paso 6: </b>Escriba el diagn�stico, tratamiento o cirug�a en el campo <nobr>"<span style="background-color:yellow" > 
                            Diagn�stico/Terapia: 
                            <input type="text" name="d" size=5 maxlength=5>
                        </span>"</nobr>.<br>
                    <b>Paso 7: </b>Escriba el nombre de la enfermera en standby en el campo <nobr>"<span style="background-color:yellow" > 
                            En espera: 
                            <input type="text" name="d" size=5 maxlength=5>
                        </span>"</nobr>.<br>
                    <b>Paso 8: </b>Escriba el nombre de la enfermera de llamada en el campo <nobr>"<span style="background-color:yellow" > 
                            De guardia: 
                            <input type="text" name="d" size=5 maxlength=5>
                        </span>"</nobr>de ser necesario.<br>
                    <b>Paso 1: </b>D� clic en el bot�n 
                    <input type="button" value="Guardar">
                    para guardar el documento. <br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b>�C�mo imprimo el listado del documento?</b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Imprimir">
                    y aparecer� la ventana de impresi�n.<br>
                    <b>Paso 2: </b>Siga las instrucciones en la ventana de impresi�n.<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b>He guardado el documento y deseo cerrarlo. �Qu� debo 
                    hacer? </b></font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Si 
                    usted ha terminado, d� clic en el bot�n <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>. 
                    </font><br>
                </ul>
            <?php endif; ?>

        </form>
    </body>
</html>
