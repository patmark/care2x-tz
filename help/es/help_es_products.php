<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    <?php
    if ($x2 == "pharma")
        print "Farmacia - ";
    else
        print "Insumos m�dicos - ";
    switch ($src) {
        case "head": if ($x2 == "pharma")
                print "Ordering pharmaceutical products";
            else
                print "Ordering products";
            break;
        case "catalog": print "Cat�logo de pedidos";
            break;
        case "orderlist": print "Canasta de pedidos ( order list )";
            break;
        case "final": print "Listado final de pedidos";
            break;
        case "maincat": print "Cat�logo de pedidos";
            break;
        case "arch": print "Archivo de pedidos";
            break;
        case "archshow": print "Archivo de pedidos";
            break;
        case "db": switch ($x3) {
                case "input": print "Ingreso de un producto nuevo a la base de datos";
                    break;
            }
            break;
        case "how2":print "C�mo hacer pedidos de ";
            if ($x2 == "pharma")
                print "productos farmac�uticos";
            else
                print "productos";
    }
    ?></b></font>
<p><font size=2 face="verdana,arial" >
<form action="#" >
<?php if ($src == "maincat") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif">C�mo a�adir un pedido 
            al cat�logo de pedidos?</font></b> </font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Primero 
            debe hallar el art�culo. Escriba ya sea la informaci�n completa o las primeras 
            letras del art�culo o marca, o nombre generico, o c�digo, etc. en el <nobr><span style="background-color:yellow" >" 
                    campo de la caja de b�squeda: 
                    <input type="text" name="s" size=10 maxlength=10>
                    "</span></nobr>.<br>
            <b>Paso 2: </b>D� clic en el bot�n 
            <input type="button" value="Buscar art�culo">
            para encontrar el art�culo.<br>
            <b>Paso 3: </b>Si la b�squeda encontr� el art�culo exacto a su palabra de 
            b�squeda, ser� desplegada la informaci�n a detalle.<br>
            <b>Paso 4: </b>D� clic en el bot�n 
            <input type="button" value="Poner en el cat�logo">
            para agregar el art�culo al cat�logo.</font> 
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nota: </b>Si 
                no quiere poner este art�culo en el cat�logo solo continue buscando otro 
                art�culo.<br>
                </font>
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> C�mo continuar la b�squeda?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Siga las instrucciones 
            de arriba para hallar el art�culo.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> La b�squeda hall� varios art�culos que se aproximan 
            a mi palabra de b�squeda. Qu� debo hacer?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Si 
            la b�squeda hall� al art�culo o informaci�n del art�culo que se aproxima a 
            las palabras que us� en su b�squeda, aparecer� una lista.<br>
            <b>Paso 2: </b>D� clic en el bot�n <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?>>. 
            El art�culo se a�adir� a lista del cat�logo.<br>
            <b>Paso 3: </b>Si quiere ver primero la informaci�n completa delart�culo, 
            haga clic en el nombre<img <?php echo createComIcon('../', 'info3.gif', '0') ?>>.<br>
            <b>Paso 4: </b>Se desplegar� la informaci�n completa del artculo.<br>
            <b>Paso 5: </b>D� clic en el bot�n 
            <input type="button" value="Poner en el cat�logo">
            .</font> 
            <p> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> Quiero ver m�s informaci�n sobre ese art�culo. �Qu� 
            debo hacer?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>d� 
            clic, ya sea al bot�n <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> 
            o al nombre del art�culo.<br>
            <b>Paso 2: </b>Se desplegar� la informaci�n completa del artculo.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �C�mo elimino un art�culo de la lista del cat�logo?</b> 
        </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic en el bot�n <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> 
            del art�culo.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <?php endif; ?>
<?php if ($src == "how2") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
            Como hago un pedido de 
    <?php if ($x2 == "pharma") print "productos farmac�uticos";
    else print "productos de los insumos m�dicos"; ?>
            ? </b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic en la opci�n del men� "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'bestell.gif', '0') ?>> 
                Pedidos </span>" para pasar a la ventana de pedidos.<br>
            <b>Paso 2: </b>Si usted ya ha ingresado con su nombre y contrase�a, ver� la 
            canasta de pedidos y el cat�logo de pedidos. Sin embargo, si no ha ingresado 
            con su nombre y contrase�a antes, deber� ingresar estos datos. <br>
            <b>Paso 3: </b>Despues de ingresar su nombre y contrase�a. D� clic en el bot�n 
            <img <?php echo createLDImgSrc('../', 'continue.gif', '0') ?>>.<br>
            <b>Paso 4: </b>Crea una lista de pedido. A la derecha podr� ver el cat�logo 
            por departamento, pabell�n, o sala.</font> 
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 5: 
                </b>Si el art�culo que necesitas est� en la lista, haga clic en el bot�n 
                <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> 
                para poner <b>una pieza</b> del art�culo en la canasta (lista de pedido) 
                a la izquierda.</font> 
            <p> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> Deseo colocar m�s de una unidad del producto en la 
            canasta. C�mo lo hago?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic al bot�n 
            <input type="checkbox" name="a" value="a" checked>
            correspondiente al art�culo seleccionado.<br>
            <b>Paso 2: </b>Escriba el numero de piezas en. 
            <input type="text" name="d" size=2 maxlength=2>
            " el campo correspondiente al art�culo.<br>
            <b>Paso 3: </b>D� clic en el bot�n 
            <input type="button" value="Poner en la canasta">
            el art�culo en la canasta (lista de pedido).<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> El art�culo que necesito no est� en la lista. �Que 
            hago?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Debes 
            encontrar el art�culo. Escriba ya sea la informaci�n completa o las primeras 
            letras de la marca, o nombre gen�rico, c�digo, etc. en el <nobr><span style="background-color:yellow" >" 
                    campo de b�squeda: 
                    <input type="text" name="s" size=10 maxlength=10>
                    "</span></nobr> .<br>
            <b>Paso 2: </b>D� clic en el bot�n 
            <input type="button" value="Encontrar art�culo">
            para encontrar el �rticulo.<br>
            <b>Paso 3: </b>Si se encuentra el art�culo que se aproxime a la palabra clave, 
            aparecer� un listado.<br>
            <b>Paso 4: </b>Si quiere poner un art�culo en la canasta de compras, d� clic 
            al bot�n<img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>>. 
            El art�culo sera puesto en la lista del pedido y a la vez ser� incluido al 
            cat�logo.<br>
            <b>Paso 5: </b>Si solo quiere agregar el art�culo al Cat�logo, d� clic al 
            bot�n<img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?>>.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �Como puedo ver m�s informaci�n del art�culo?</b> 
        </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>d� 
            clic, ya sea al bot�n <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> 
            o al nombre del art�culo.<br>
            <b>Paso 2: </b>Una ventana le mostrar� la informaci�n del art�culo.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �Como remuevo un art�culo del cat�logo?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic en el bot�n <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> 
            del art�culol.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �Puedo cambiar la cantidad en la canasta de compras? 
        </b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Si.</b> Solo 
            reemplace el numero de piezas con el deseado despu�s finalice la lista de 
            pedido. </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> Ya est�n en la canasta todos los art�culos que necesito. 
            �Cual es el siguiente paso?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Puede 
            proceder enviando el pedido a 
    <?php if ($x2 == "pharma") print "pharmacy";
    else print "medical depot"; ?>
            . <br>
            D� clic en el bot�n 
            <input type="button" value="Finalizar lista de pedido">
            Para iniciar el proceso.<br>
            <b>Paso 2: </b>El pedido ser� desplegado de nuevo. Escriba su nombre en <nobr>"<span style="background-color:yellow" > 
                    en el campo Creado por 
                    <input type="text" name="c" size=15 maxlength=10>
                </span>"</nobr>.<br>
            <b>Paso 3: </b>Seleccione el estatus de prioridad del pedido entre "<span style="background-color:yellow" > 
                Normal 
                <input type="radio" name="x" value="s" checked>
                Urgente 
                <input type="radio" name="x" >
            </span>". Seleccione el bot�n apropiado.<br>
            <b>Paso 4: </b>El validador (m�dico or cirujano) debe escribir su nombre en 
            el <nobr>"<span style="background-color:yellow" > campo Validado por 
                    <input type="text" name="c" size=15 maxlength=10>
                </span>"</nobr>.<br>
            <b>Paso 5: </b>El validador (m�dico or cirujano) debe escribir su <nobr>"<span style="background-color:yellow" > 
                    Contrase�a: 
                    <input type="text" name="c" size=15 maxlength=10>
                </span>"</nobr>.<br>
            <b>Paso 6: </b>D� clic en el bot�n 
            <input type="button" value="Enviar esta lista de pedido a<?php if ($x2 == "pharma") print "Farmacia";
    else print "Insumos medicos"; ?>">
            para enviar el pedido.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
        <font color="#990000"><b> Nota:</b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted decide 
            cerrar esta ventana, d� clic al enlace "<span style="background-color:yellow" > 
                Regresar y editar lista</span>" regresar a la lista de pedido. </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> Quiero hacer el pedido ahora. �Que hago?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic al enlace "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> 
                finalizar pedido </span>" para regresar 
    <?php if ($x2 == "pharma") print "pharmacy";
    else print "medical depot"; ?>
            'al submen�.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �Que hacer para crear otro pedido?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic al enlace "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> 
                Crear una nueva lista de pedido </span>" para empezar con una canasta vac�a.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
        <font color="#990000"><b> Nota:</b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Usted puede detallar 
            las instrucciones en el pedido o el cat�logo pulsando el bot�n <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            dentro de la ventana. </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
        <font color="#990000"><b> Nota:</b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted decide 
            cerrar d� clic al bot�n<img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>. 
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<?php endif; ?>
<?php if ($src == "head") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
            Como pedir 
    <?php if ($x2 == "pharma")
        print "pharmaceutical products";
    else
        print "products from the medical depot";
    ?>
            ? </b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Crear 
            primero una lista de pedido. En el lado derecho usted ver� el cat�logo para 
            su departamento, pabell�n, o sala.</font> 
            <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2: 
                </b>Si el art�culo que necesita est� en la lista del cat�logo, pulse el 
                bot�n <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> para 
                poner <b>la cantidad</b> de art�culos en la (lista del pedido) a la izquierda.</font>
            <p> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
        <font color="#990000"><b> Nota:</b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Usted puede detallar 
            las instrucciones en el pedido o el cat�logo pulsando el bot�n <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            dentro de la ventana. </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
        <font color="#990000"><b> Nota:</b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted decide 
            cerrar d� clic al bot�n<img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>. 
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<?php endif; ?>
<?php if ($src == "catalog") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
            �C�mo poner un art�culo en la canasta (lista de pedido)? </b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Si 
            el art�culo que necesita est� en la lista del cat�logo, pulse el bot�n <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> 
            para poner <b>la cantidad</b> de art�culos en la (lista del pedido) a la izquierda.</font> 
            <p> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �Como poner mas de un art�culo en la canasta de comprass?</b> 
        </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic al selector 
            <input type="checkbox" name="a" value="a" checked>
            correspondiente al art�culo en cuestion.<br>
            <b>Paso 2: </b>Escriba el numero de piezas en el campo. 
            <input type="text" name="d" size=2 maxlength=2>
            " orrespondiente al art�culo .<br>
            <b>Paso 3: </b>D� clic en el bot�n 
            <input type="button" value="Poner en la canasta">
            para poner el art�culo en la canasta de compras.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> El art�culo que necesito no est� en la lista. �Que 
            hago?</b> </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Primero 
            debe encontrar el art�culo. Escriba ya sea la informaci�n completa o las primeras 
            letras de la marca, o nombre gen�rico, c�digo, etc. en el <nobr><span style="background-color:yellow" >" 
                    campo de b�squeda: 
                    <input type="text" name="s" size=10 maxlength=10>
                    "</span></nobr> <br>
            <b>Paso 2: </b>D� clic en el bot�n 
            <input type="button" value="Encontrar art�culo">
            para encontrar el art&iacute;culo.<br>
            <b>Paso 3: </b>se encuentra el art�culo que se aproxime a la palabra clave, 
            aparecer� un listado.<br>
            <b>Paso 4: </b>Si quiere poner un art�culo en la canasta de compras, d� clic 
            al bot�n<img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>>. 
            El art�culo sera puesto en la lista del pedido y a la vez ser� incluido al 
            cat�logo.<br>
            <b>Paso 5: </b>Si solo quiere agregar el art�culo al Cat�logo, d� clic al 
            bot�n<img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?>>.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �Como puedo ver m�s informaci�n del art�culo?</b> 
        </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>d� 
            clic, ya sea al bot�n <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> 
            o al nombre del art�culo.<br>
            <b>Paso 2: </b>Aparecer� una ventana que le mostrar� la informaci�n del art�culo.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �Como remuevo o borro un art�culo del cat�logo?</b> 
        </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic en el bot�n <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> 
            del art&iacute;culo.<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<?php endif; ?>
<?php if ($src == "orderlist") : ?>
    <?php if ($x1 == "0") : ?>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> 
                Nota:</b></font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si la canasta 
                esta vacia. </font><font face="Verdana, Arial, Helvetica, sans-serif"> 
                <p><font size="2"> para crear un pedido, selecccione el art�culo que necesita 
                    del cat�logo a la derecha y agr&eacute;guelo a la canasta de compras. </font></font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> �C�mo poner un art�culo en la canasta (lista de pedido)? 
            </b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Si 
                el art�culo que necesita est� en la lista del cat�logo, pulse el bot�n <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> 
                para poner la cantidad</b> de art�culos en la (lista del pedido) a la izquierda.</font> 
                <p> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
            <font color="#990000"><b> Nota:</b></font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Para mayores 
                instrucciones para buscar, seleccionar, y poner art�culos del cat�logo a la 
                canasta, haga clic en el bot�n <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                dentro del cat�logo a la derecha.</font> 
                <p> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php else : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                �Puedo cambiar la cantidad en la canasta de compras? </b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Yes.</b> Solo 
                reemplace el numero de piezas con el deseado despu�s finalice la lista de 
                pedido. </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> �Como puedo ver m�s informaci�n del art�culo?</b> 
            </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                clic, ya sea al bot�n <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> 
                del art�culo.<br>
                <b>Paso 2: </b>Aparecer� una ventana que le mostrar� la informaci�n del art�culo.<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> �Como remuevo un art�culo de la canasta de compras?</b> 
            </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                clic en el bot�n <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> 
                del art�culo.<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> Ya est�n en la canasta todos los art�culos que necesito. 
                �Cual es el siguiente paso?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Puede 
                proceder enviando el pedido a la Farmacia <br>
                D� clic en el bot�n 
                <input name="button" type="button" value="Finalizar lista de pedido">
                para iniciar el proceso.<br>
                <b>Paso 2: </b>El pedido ser� desplegado de nuevo. Escriba su nombre en el 
                campo <nobr>"<span style="background-color:yellow" > Creado por 
                        <input type="text" name="c" size=15 maxlength=10>
                    </span>"</nobr> .<br>
                <b>Paso 3: </b>Seleccione el estatus de prioridad del pedido entre "<span style="background-color:yellow" > 
                    Normal 
                    <input type="radio" name="x" value="s" checked>
                    Urgente 
                    <input type="radio" name="x" >
                </span>". Seleccionando el bot�n apropiado<br>
                <b>Paso 4: </b>El validador (m�dico or cirujano) debe escribir su nombre en 
                el <nobr>"<span style="background-color:yellow" > campo Validado por 
                        <input type="text" name="c" size=15 maxlength=10>
                    </span>"</nobr> <br>
                <b>Paso 5: </b>El validador (m�dico or cirujano) debe escribir su <nobr>"<span style="background-color:yellow" > 
                        Contrase&ntilde;a: 
                        <input type="text" name="c" size=15 maxlength=10>
                    </span>"</nobr> <br>
                <b>Paso 6: </b>D� clic en el bot�n 
                <input name="button2" type="button" value="Enviar esta lista de pedido a la Farmacia">
                para enviar el pedido.<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
            <font color="#990000"><b> Nota:</b></font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted decide 
                cerrar esta ventana, d� click al enlace "<span style="background-color:yellow" >Regresar 
                    y editar la lista</span>" regresar a la lista de pedido. </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php endif; ?>
<?php endif; ?>
<?php if ($src == "final") : ?>
    <?php if ($x1 == "1") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                Quiero hacer el pedido ahora. �Que hago?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                clic al enlace "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> 
                    finalizar pedido </span>" para regresar al submenu.<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> �Que hacer para crear otro pedido?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                clic al enlace "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> 
                    Crear una nueva lista de pedido </span>" para empezar con una canasta vac�a.<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php else : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> �Como finalizo el pedido?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Puede 
                proceder enviando el pedido a la Farmacia <br>
                D� clic en el bot�n 
                <input name="button3" type="button" value="Finalizar lista de pedido">
                para iniciar el proceso.<br>
                <b>Paso 2: </b>El pedido ser� desplegado de nuevo. Escriba su nombre en el 
                campo <nobr>"<span style="background-color:yellow" > Creado por 
                        <input type="text" name="c" size=15 maxlength=10>
                    </span>"</nobr> .<br>
                <b>Paso 3: </b>Seleccione el estatus de prioridad del pedido entre "<span style="background-color:yellow" > 
                    Normal 
                    <input type="radio" name="x" value="s" checked>
                    Urgente 
                    <input type="radio" name="x" >
                </span>". Seleccionando el bot�n apropiado.<br>
                <b>Paso 4: </b>El validador (m�dico or cirujano) debe escribir su nombre en 
                el <nobr>"<span style="background-color:yellow" > campo Validado por 
                        <input type="text" name="c" size=15 maxlength=10>
                    </span>"</nobr> <br>
                <b>Paso 5: </b>El validador (m�dico or cirujano) debe escribir su <nobr>"<span style="background-color:yellow" >Contrase&ntilde;a</span><span style="background-color:yellow" >: 
                        <input type="text" name="c" size=15 maxlength=10>
                    </span>"</nobr> <br>
                <b>Paso 6: </b>D� clic en el bot�n 
                <input type="button" value="Enviar esta lista de pedido a la Farmacia">
                para enviar el pedido.<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
            <font color="#990000"><b> Nota:</b></font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted decide 
                cerrar d� clic al bot�n"<span style="background-color:yellow" > Regresar y 
                    editar la lista</span>" para regresar al pedido. </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?php endif; ?>
<?php endif; ?>
    <!-- ++++++++++++++++++++++++++++++++++ archive +++++++++++++++++++++++++++++++++++++++++++ -->
<?php if ($src == "arch") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Quiero 
            ver el archivo de pedidos.</b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b> 
            Escriba ya sea la informaci�n completa o las primeras letras del departmento, 
            o id, fecha del pedido, prioridad("urgente") en el <nobr><span style="background-color:yellow" >" 
                    campo de b�squeda: 
                    <input type="text" name="s" size=10 maxlength=10>
                    "</span></nobr> <br>
            <b>Paso 2: </b>Seleccione las siguientes categorias de b�squeda </font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                <input type="checkbox" name="d" checked>
                Fecha<br>
                <input type="checkbox" name="d" checked>
                Departmento<br>
                <input type="checkbox" name="d" checked>
                Prioridad<br>
                Por defecto, las 3 categorias apareceran seleccionadas y la b�squeda se 
                har&aacute; en las 3 categorias. Asi que si quiere excluir alguna categoria 
                desm�rquela. </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 3: </b>D� 
            clic en el bot�n 
            <input type="button" value="Buscar">
            para encontrar el art�culo.<br>
            <b>Paso 4: </b>Si la b�squeda encuentra el o los pedidos aproxuimados a la 
            b�squeda, aparecer� un listado.<br>
            <b>Paso 5: </b>D� clic al bot�n del pedido que le interese ver <img <?php echo createComIcon('../', 'uparrowgrnlrg.gif', '0') ?>>. 
            y se mostraran los detalles<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b>Fueron listados varios pedidos. �Como veo alguno en 
            particular?</b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic al bot�n del pedido<img <?php echo createComIcon('../', 'uparrowgrnlrg.gif', '0') ?>>. 
            y se mostraran los detalles<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> 
        <font color="#990000"><b> Nota:</b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted decide 
            terminar la b�squeda y cerrar, d� clic al bot�n<img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>. 
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<?php endif; ?>
<?php if ($src == "archshow") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
            Quiero ver m�s informaci�n sobre algun art�culo en ese pedido. �Qu� debo hacer?</b> 
        </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic al bot�n <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> del 
            art�culo<br>
            <b>Paso 2: </b>Y se desplegar� una ventana mostrando la informaci�n<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b> �Que hago para ver de nuevo la lista de pedidos archivados?</b> 
        </font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
            clic al bot�n 
            <input type="button" value="Regresar">
            .<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b>�Como buscar de nuevo en el archivo de pedidos?</b></font></font> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b> 
            Escriba ya sea la informaci�n completa o las primeras letras del departamento, 
            o id, fecha del pedido, prioridad ("urgente") en el <nobr><span style="background-color:yellow" >" 
                    campo de b�squeda: 
                    <input type="text" name="s" size=10 maxlength=10>
                    "</span></nobr> <br>
            <b>Paso 2: </b>Seleccione las siguientes categorias de b�squeda </font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                <input type="checkbox" name="d" checked>
                Fecha<br>
                <input type="checkbox" name="d" checked>
                Departmento<br>
                <input type="checkbox" name="d" checked>
                Prioridad<br>
                Por defecto, las 3 categorias apareceran seleccionadas y la b�squeda se 
                har�a en las 3 categorias. Asi que si quiere excluir alguna categoria desm&aacute;rquela. 
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 3: </b>D� 
            clic en el bot�n 
            <input type="button" value="Buscar">
            para encontrar el art�culo.<br>
            <b>Paso 4: </b>Si la b�squeda encuentra el o los pedidos aproximados a la 
            b�squeda, aparecer� un listado.<br>
            <b>Paso 5: </b>D� clic al bot�n del pedido que le interese ver <img <?php echo createComIcon('../', 'uparrowgrnlrg.gif', '0') ?>>. 
            y se mostraran los detalles<br>
            </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<?php endif; ?>
<?php if ($src == "db") : ?>
    <?php if ($x1 == "") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b> 
                �C�mo ingreso un producto nuevo en la base de datos?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>Primero 
                escriba toda la informaci�n correspondiente al producto en sus campos correspondientes.<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> �Como selecciono la fotografia del producto?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                clic en el bot�n 
                <input type="button" value="Explorar...">
                en el "<span style="background-color:yellow" > campo de archivo de fotografias 
                </span>" .<br>
                <b>Paso 2: </b>Aparecera una peque�a ventana para seleccionar el archivo. 
                Selecciona la fotografia que guste y da clic a "OK".<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> Ya ingrese toda la informaci�n, �como la guardo?</b> 
            </font></font> 
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
                clic al bot�n 
                <input type="button" value="Nuevo producto">
                .<br>
                <b>Paso 2: </b>Aparecera una forma.<br>
                <b>Paso 3: </b>Escriba toda la informaci�n relevante sobre el producto.<br>
                <b>Paso 4: </b>D� clic en el bot�n 
                <input type="button" value="Salvar">
                para salvar la informaci�n<br>
                </font> 
            </ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b> Como editar la informaci�n del producto ?</b> </font></font> 
            <ul>
                <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 1: </b>D� 
                clic en el bot�n 
                <input type="button" value="Actualizar o editar">
                .<br>
                <b>Paso 2: </b>Se desplegar� una forma conteniendo la informaci�n actual del 
                producto.<br>
                <b>Paso 3: </b>Edite la informaci�n.<br>
                <b>Paso 4: </b>D� clic en el bot�n 
                <input type="button" value="Salvar">
                para guardar la nueva informaci�n<br>
                </font><font face="Verdana, Arial, Helvetica, sans-serif"> </font> 
            </ul>

    <?php endif; ?>	
<?php endif; ?>	
</form>

