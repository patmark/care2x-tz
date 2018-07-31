<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Como
    <?php
    switch ($x1) {
        case "search": print 'pesquisa um n�mero de telefone';
            break;
        case "dir": print 'abre toda a lista telef�nica';
            break;
        case "newphone": print 'insere uma nova informa��o de telefone';
            break;
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >
<?php if ($x1 == "search") { ?>
    <?php if ($src == "newphone") { ?>
            <b>Step 1</b>
            <ul> Clique no bot�o <img <?php echo createLDImgSrc('../', 'such-gray.gif', '0') ?>>.
            </ul>
    <?php } ?>
        <b>Passo <?php if ($src == "newphone") print "2";
    else print "1"; ?></b>

        <ul> Insira o campo "<span style="background-color:yellow" >Insira a palavra chave.</span>" com uma informa��o completa ou algumas letras, como por exemplo o hospital ou c�digo do departamento, nome de fam�lia, ou primeiro nome,
            ou o n�mero do quarto.
            <br>Exemplo 1: insira  "m9a" ou "M9A" ou "M9".
            <br>Exemplo 2: insira "Guerero" ou "gue".
            <br>Exemplo 3: insira "Alfredo" ou "Alf".
            <br>Exemplo 4: insira "op11" ou "OP11" ou "op".

        </ul>
        <b>Passo <?php if ($src == "newphone") print "3";
    else print "2"; ?></b>
        <ul> Clique no bot�o <input type="button" value="Pesquisa"> para iniciar a pesquisa.<p>
        </ul>
        <b>Passo <?php if ($src == "newphone") print "4";
    else print "3"; ?></b>
        <ul> Se a pesquisa encontrar resultado(s), uma lista ser� exibida.<p>
        </ul>
    <?php } ?>

    <?php if ($x1 == "dir") { ?>
        <b>Passo 1</b>
        <ul> Clique no bot�o <img <?php echo createLDImgSrc('../', 'phonedir-gray.gif', '0') ?>>.
        </ul>
        <?php
    }

    if ($x1 == "newphone") {
        if ($src == "search") {
            ?>
            <b>Step 1</b>
            <ul> Clique no bot�o <img <?php echo createLDImgSrc('../', 'newdata-gray.gif', '0') ?>>.
            </ul>
            <b>Passo 2</b>
            <ul> Se voc� estiver logado anteriormente a tem um direito de acesso para esta fun��o, o formul�rio de entrada para uma 
                nova informa��o de telefone ir� aparecer no quadro principal.<br>
                De outra forma, se voc� n�o estiver logado, voc� ser� requisitado a inserir seu nome de usu�rio e senha. <p>
    <?php } ?>
                Insira seu nome de usu�rio e senha e clique no bot�o <img <?php echo createLDImgSrc('../', 'continue.gif', '0') ?>>.<p>

        </ul>
        <?php } ?>

    <b>Nota</b>
    <ul> Se voc� decidir cancelar
        <?php
        switch ($x1) {
            case "search": print 'search click the button <img ' . createLDImgSrc('../', 'cancel.gif', '0') . '>.';
                break;
            case "dir": print ' the directory click the button <input type="button" value="Cancel">.';
                break;
            case "newphone": print ' click the button <img ' . createLDImgSrc('../', 'cancel.gif', '0') . '>.';
                break;
        }
        ?>
    </ul>

</form>

