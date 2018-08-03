<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    <?php
    switch ($x2) {
        case "search": print "�C�mo ";
            if ($x1)
                print 'muestro la ocupaci�n del pabell�n en donde se hall� la palabra clave?';
            else
                print 'busco un paciente?';
            break;
        case "quick": print "Enfermer�a - Vista r�pida de la ocupaci�n del pabell�n para el d�a de hoy";
            break;
        case "arch": print "Estaciones de enfermer�a - Archivo";
    }
    ?></b></font>
<p><font size=2 face="verdana,arial" >
<form action="#" >
    <?php if ($x2 == "search") : ?>
    <?php if (!$x1) : ?>
            <b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Paso 1</font></b> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Escriba en el campo "<span style="background-color:yellow" >Por 
                    favor, escriba una palabra clave.</span>" ya sea la informaci�n completa o 
                las primeras letras, como por ejemplo un nombre, un apellido o ambos. </font>
                <ul type=disc>
                    <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Ejemplo 
                        1: escriba "Guerrero" o "gue". </font>
                    <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Ejemplo 2: escriba 
                        "Alfredo" o "Alf". </font>
                    <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Ejemplo 
                        3: escriba "Guerrero, Alf". </font>
                </ul>
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2</b> </font>
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> D� clic en el bot�n 
                <input type="button" value="Buscar">
                para empezar la b�squeda.</font>
                <p> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 3</b> </font>
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si la b�squeda halla un 
                resultado, se mostrar� la lista con la ocupaci�n de pabellones.</font>
                <p> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 4</b> </font>
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si la b�squeda halla varios 
                resultados, aparecer� una lista con todos los resultados.</font>
                <p> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota</b> 
            </font><font face="Verdana, Arial, Helvetica, sans-serif"><ul><font size="2">
                Si usted decide cerrar la ventana de b�squeda, d� clic en el bot�n <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>. 
                </font></ul>
            <font size="2"><?php endif; ?>
        <b>Paso 
    <?php if ($x1) print "1";
    else print "5"; ?>
        </b>
        <ul>
            D� clic en el bot�n <img <?php echo createComIcon('../', 'bul_arrowblusm.gif', '0') ?>>, 
            o la fecha, o el pabell�n para mostrar la lista de ocupaci�n del pabell�n. 
            <p><b>Nota:</b> La palabra clave de b�squeda aparecer� resaltada entre el 
                texto. <br>
                <b>Nota:</b> La lista no puede ser editada en "modalidad solamente de lectura". 
                Si usted intenta abrir la carpeta que tiene los datos del paciente, mediante 
                un clic en el nombre, se le solicitar� que escriba su nombre y contrase�a. 
        </ul>
    <?php endif; ?>
<?php if ($x2 == "quick") : ?>
    <?php if ($x1) : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                �Qu� se hace para ver la lista de ocupaci�n del pabell�n?</b> </font></font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� clic 
                en la identificaci�n del pabell�n o el nombre en la columna izquierda.<br>
                <b>Nota: </b>La lista de ocupaci�n que se mostrar� se muestra de "modalidad 
                solamente lectura". No puede editar o cambiar ning�n dato del paciente.<br>
                </font>
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> �Qu� se hace para ver la lista de ocupaci�n del pabell�n 
                para hacer cambios o actualizar los datos?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� clic 
                en el �cono <img <?php echo createComIcon('../', 'statbel2.gif', '0') ?>> correspondiente 
                al pabell�n seleccionado.<br>
                <b>Paso 2: </b>Si usted ingres� su nombre y contrase�a y tiene derechos de 
                acceso para la funci�n, la lista de ocupaci�n se mostrar� inmediatamente.<br>
                De otro modo, se le pedir� que ingrese el nombre y contrase�a.<br>
                <b>Paso 3: </b>De ser necesario, escriba su nombre y contrase�a.<br>
                <b>Paso 4: </b>D� clic en el bot�n 
                <input type="button" value="Contin�e...">
                .<br>
                <b>Paso 5: </b>Si usted tiene un derecho de acceso para la funci�n, aparecer� 
                la lista de ocupaci�n.<br>
                <b>Nota: </b>La lista de ocupaci�n que ser� mostrada puede ser "editada". 
                Aparecer�n las opciones para cambiar o actualizar los datos del paciente. 
                Usted tambi�n puede abrir la carpeta de datos del paciente para hacer cambios 
                adicionales.<br>
                </font>
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
    <?php else : ?>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> 
                �No existe un listado de ocupaci�n disponible al momento!</b> </font></font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b> �C�mo solicito vistas r�pidas de ocupaci�n previa 
                    usando el archivo?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� clic 
                en "<span style="background-color:yellow" > D� clic aqu� para ir al archivo 
                    <img <?php echo createComIcon('../', 'bul_arrowgrnlrg.gif', '0') ?>> </span>".<br>
                <b>Paso 2: </b>Aparecer� un calendario.<br>
                <b>Paso 3: </b>D� clic en una fecha en el calendario para mostrar una vista 
                r�pida de ocupaci�n para ese d�a.<br>
                </font>
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
    <?php endif; ?>
        <b>Nota</b> 
        </font><font face="Verdana, Arial, Helvetica, sans-serif"><ul><font size="2">
            Si usted decide cerrar la ventana de vista r�pida, d� clic al bot�n <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>. 
            </font></ul>
        <font size="2"><?php endif; ?>
<?php if ($x2 == "arch") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
            �C�mo solicito vistas r�pidas de ocupaci�n previa usando el archivo?</b> </font></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� clic 
            en una fecha en el calendario para mostrar la vista r�pida de ocupaci�n para 
            ese d�a.<br>
            </font>
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �C�mo cambio el mes en el calendario?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Para mostrar 
            el mes siguiente, d� clic en el nombre del mes en la esquina superior DERECHA 
            del calendario. D� clic tantas veces sea necesario hasta que se presente el 
            mes buscado.</font>
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2: </b>Para 
                mostrar el mes anterior, d� clic en el nombre del mes en la esquina superior 
                IZQUIERDA del calendario. D� clic tantas veces sea necesario hasta que se 
                presente el mes buscado.<br>
                </font>
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php endif; ?>
    </font> 
</form>

