<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc"> <b> 
    <?php
    if ($x2 == "pharma")
        print "Farmacia - ";
    else
        print "Insumos m�dicos - ";
    switch ($src) {
        case "input": if ($x1 == "update")
                print "Editando la informaci�n de un producto";
            else
                print "Ingresando un producto nuevo en la base de datos";
            break;
        case "search": print "Buscar un producto";
            break;
        case "mng": print "Administrar productos en la base de datos";
            break;
        case "delete": print "Retirando un producto de la base de datos";
            break;
    }
    ?>
</b></font> 
<form action="#" >
<?php if ($src == "input") : ?>
    <?php if ($x1 == "") : ?>
            <ul>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">C�mo ingresar 
                    un producto nuevo en el cat�logo de pedidos?</font></b> </font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Ingrese 
                    toda la informaci�n acerca del producto en el campo respectivo.<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b> Deseo seleccionar una fotograf�a del producto. C�mo 
                    lo hago?</b> </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Seleccionar...">
                    en el campo "<span style="background-color:yellow" > archivo de im�genes</span>".<br>
                    <b>Paso 2: </b>Una peque�a ventana aparecer� para seleccionar el archivo. 
                    Seleccione el archivo de im�genes de su elecci�n y luego d� clic en "OK".<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b> Termin� de ingresar toda la informaci�n del producto. 
                    C�mo lo guardo?</b> </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Salvar">
                    .<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php endif; ?>
    <?php if ($x1 == "save") : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                    C�mo ingreso un producto nuevo en la base de datos?</b> </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Producto nuevo">
                    .<br>
                    <b>Paso 2: </b>Aparecer� el formulario de pedidos.<br>
                    <b>Paso 3: </b>Escriba la informaci�n disponible acerca del producto nuevo.<br>
                    <b>Paso 4: </b>D� clic en el bot�n 
                    <input type="button" value="Guardar">
                    para guardar la informaci�n.<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b> Deseo hacer cambios al producto que al momento estoy 
                    viendo. �C�mo lo hago?</b> </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b> 
                    d� clic al bot�n 
                    <input type="button" value="Actualizar o editar">
                    .<br>
                    <b>Paso 2: </b>La informaci�n de producto ingresar� autom�ticamente al formulario 
                    de edici�n.<br>
                    <b>Paso 3: </b>Edite la informaci�n.<br>
                    <b>Paso 4: </b> d� clic al bot�n 
                    <input type="button" value="Guardar">
                    para guardar la informaci�n.<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php endif; ?>
    <?php if ($x1 == "update") : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                    Deseo hacer cambios al producto que al momento estoy viendo. C�mo lo hago?</b> 
                </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>De 
                    ser necesario, primero deber� borrar los datos que ya est�n ingresados.</font> 
                    <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 
                            2: </b>Escriba la nueva informaci�n en el campo apropiado.</font> 
                    <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 
                            3: </b>D� clic en el bot�n 
                        <input type="button" value="Guardar">
                        para guardar la informaci�n nueva.<br>
                        </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
            <?php endif; ?>
<?php endif; ?>
<?php if ($src == "search") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                C�mo busco un producto?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Escriba 
                la palabra completa o las primeras letras de la marca del art�culo, o el 
                nombre gen�rico, o el n�mero de pedido, etc. en el campo <nobr><span style="background-color:yellow" >" 
                        Busque la palabra...: 
                        <input type="text" name="s" size=10 maxlength=10>
                        "</span></nobr>.<br>
                <b>Paso 2: </b> d� clic al bot�n 
                <input type="button" value="Buscar">
                para hallar el art�culo.<br>
                <b>Paso 3: </b>Si la b�squeda halla el art�culo que concuerda de manera 
                exacta con la palabra de b�squeda, aparecer� informaci�n detallada acerca 
                del art�culo.<br>
                <b>Paso 4: </b>Si la b�squeda halla varios art�culos que se parecen a la 
                palabra que busca, aparecer� una lista con los art�culos posibles.<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php if ($x1 != "multiple") : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                    Hay una lista con muchos art�culos. C�mo veo la informaci�n de un art�culo 
                    en particular?</b> </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> 
                    o en el nombre del art�culo.<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php endif; ?>
    <?php if ($x1 == "multiple") : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                    Deseo ver la lista previa de art�culos hallados. Qu� debo hacer?</b> </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Ir atr�s">
                    .<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php endif; ?>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> 
                Nota:</b></font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted ya 
                no desea ver esa informaci�n, d� clic en <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>. 
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <?php endif; ?>
<?php if ($src == "mng") : ?>
    <?php if (($x3 == "1")) : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                    C�mo hacer cambios a la informaci�n del producto?</b> </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Cambie 
                    la informaci�n acerca del producto nuevo.<br>
                    <b>Paso 2: </b>D� clic en el bot�n 
                    <input type="button" value="Guardar">
                    para guardar la informaci�n nueva.<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php endif; ?>
    <?php if ($x1 == "multiple") : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                    C�mo hago cambios al producto que estoy viendo en este momento?</b> </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Actualizar o editar">
                    .<br>
                    <b>Paso 2: </b>La informaci�n del producto aparecer� en el formulario para 
                    que le pueda hacer los cambios.<br>
                    <b>Paso 3: </b>Edite la informaci�n.<br>
                    <b>Paso 4: </b>D� clic en el bot�n 
                    <input type="button" value="Guardar">
                    para guardar la informaci�n nueva.<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b> C�mo elimino totalmente el producto que estoy viendo?</b> 
                </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en el bot�n 
                    <input type="button" value="Eliminar de la base de datos">
                    .<br>
                    <b>Paso 2: </b>Se le preguntar� si realmente desea eliminar la informaci�n 
                    de la base de datos<br>
                    <b>Paso 3: </b>Si usted realmente desea eliminar la informaci�n del producto, 
                    d� clic en el bot�n 
                    <input type="button" value="S�, estoy absolutamente seguro. Elimine el producto.">
                    </font> 
                    <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
                        <font color="#990000"><b> Nota:</b></font> Este paso no se puede deshacer 
                        una vez que elimin� los datos.<br>
                        </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b> No deseo eliminar el producto. Qu� debo hacer?</b> 
                </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                    clic en "<span style="background-color:yellow" > No, no deseo eliminar este 
                        producto. Ll�veme a la ventana anterior </span>".<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php endif; ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                C�mo administrar un producto en la base de datos?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Primero 
                encuentre el producto. Escriba ya sea la informaci�n completa escriba las 
                primeras letras de la marca, nombre gen�rico, c�digo, etc. en el <nobr><span style="background-color:yellow" >" 
                        campo de B�squeda: 
                        <input type="text" name="s" size=10 maxlength=10>
                        "</span></nobr>.<br>
                <b>Paso 2: </b>D� clic en el bot�n 
                <input type="button" value="Buscar">
                para encontrar el art�culo.<br>
                <b>Paso 3: </b>Si se encuentra un art�culo coincidente con la palabra de 
                b�squeda, aparecer� la informaci�n detallada del producto en cuesti�n.<br>
                <b>Paso 4: </b>Si se encuentran varios art�culos aproximados con la palabra 
                de b�squeda, aparecer� una list de los art�culos coincidentes.<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php if (($x1 != "multiple") && ($x3 == "")) : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                    Me apareci� una lista de art�culos. �Como ver la informaci�n de un art�culo 
                    en particular?</b> </font></font> 
                <ul>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>d� 
                    clic, ya sea al bot�n <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> 
                    o al nombre del art�culo.<br>
                    </font> 
                </ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php endif; ?>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> 
                Nota:</b></font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted decide 
                cerrar esta ventana d� clic al bot�n<img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>. 
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<?php endif; ?>
<?php if ($src == "delete") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                �Como remover un art�culo de la lista?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
                <font color="#990000"><b> Nota:</b></font> La remoci�n de un producto es 
                irreversible.</font> 
                <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 
                        1: </b>Si est� seguro de querer borrarlo, d� clic al bot�n 
                    <input type="button" value="S� estoy seguro. Borra los datos">
                    .<br>
                    </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> �Y si no quiero borrarlo?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                clic al enlace "<span style="background-color:yellow" > No borrar </span>".<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
            <font color="#990000"><b> Nota:</b></font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted decide 
                cerrar esta ventana d� clic al bot�n<img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>. 
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<?php endif; ?>
<?php if ($src == "report") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                �Como escribo un reporte?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Escriba 
                su reporte en el campo <nobr><span style="background-color:yellow" >"Reporte: 
                        <input type="text" name="s" size=10 maxlength=10>
                        "</span></nobr>.<br>
                <b>Paso 2: </b>Escriba su nombre en el campo <nobr><span style="background-color:yellow" >"Report�: 
                        <input type="text" name="s" size=10 maxlength=10>
                        "</span></nobr>.<br>
                <b>Paso 3: </b>Escriba su numero personal en el campo <nobr><span style="background-color:yellow" >" 
                        No. Personal: 
                        <input type="text" name="s" size=10 maxlength=10>
                        "</span></nobr>.<br>
                <b>Paso 4: </b>D� clic en el bot�n 
                <input type="button" value="Enviar">
                para enviar el reporte.<br>
                </font> 
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
            <font color="#990000"><b> <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nota:</font></b> 
            </font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted decide 
            cerrar esta ventana d� clic al bot�n</font><img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>. 
        </ul> 
<?php endif; ?>
    </font> 
</form>

