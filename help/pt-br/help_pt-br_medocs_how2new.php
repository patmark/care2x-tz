<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Como documentar um paciente em um prontu�rio</b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >
    <?php if ($src == "?") : ?>
        <b>Passo 1</b>

        <ul> Encontre os dados b�sicos do paciente.<br>
            Entre no campo "Documente o seguinte paciente:"  qualquer uma das seguintes informa��es:<br>
            <Ul type="disc">
                <li>n�mero do paciente ou<br>
                <li>sobrenome do paciente ou<br>
                <li>nome do paciente <br>
                    <font size=1 color="#000099" face="verdana,arial">
                    <b>Dica:</b> Se o seu sistema estiver equipado com um scanner de c�digo de barras, clique no campo "Documente o seguinte paciente:" para foc�-lo
                    e ler o c�digo de barras no cart�o do paciente com o scanner. Pule o passo 2.
                    </font>
            </ul>

        </ul>
        <b>Passo 2</b>

        <ul> Clique no bot�o <input type="button" value="Pesquise"> para iniciar a pesquisa.

        </ul>
        <b>Alternativa ao passo 2</b>
        <ul> Voc� pode fazer qualquer destas a��es:<br>
            <Ul type="disc">		
                <li>entre com o sobrenome do paciente no campo "Sobrenome:"  <br>
                <li>OU entre com o nome do paciente no campo "Nome:"  <br>
            </ul>
            ent�o clique na tecla "Enter" do teclado.

        </ul>
        <b>Passo 3</b>
        <ul> Se a pesquisa retornar um �nico resultado, um formul�rio com os dados b�sicos do paciente ser� exibido.
            Entretanto, se a pesquisa retornar v�rios resultados, uma lista ser� mostrada.
        <?php endif; ?>

        <?php if (($src == "?") || ($x1 > 1)) : ?>

            <br>Para documentar um paciente da lista,
            Clique ou no bot�o <img <?php echo createComIcon('../', 'r_arrowgrnsm.gif', '0') ?>> correspondente a ele, ou
            no sobrenome, ou nome, ou n�mero do paciente, ou data de admiss�o.
        </ul>
    <?php endif; ?>

    <?php if ($src == "?") : ?>
        <b>Passo 4</b>
    <?php endif; ?>

    <?php if (($src != "?") && ($x1 == 1)) : ?>
        <b>Passo 1</b>
    <?php endif; ?>
    <?php if (($x1 == "1") || ($src == "?")) : ?>
        <ul> Uma vez que um novo formul�rio com os dados do paciente esteja exibido, voc� pode fazer o seguinte: 
            <Ul type="disc">		
                <li>entre com informa��o adicional do segurador ou seguro no campo "Inform��o extra:" ,<br>
                <li>Clique "<span style="background-color:yellow" ><input type="radio" name="n" value="a">Sim</span>" nos bot�es de "Conselho m�dico" se o paciente recebeu conselho m�dico obrigat�rio,<br>
                <li>Clique "<span style="background-color:yellow" ><input type="radio" name="n" value="a">N�o</span>"nos bot�es de "Conselho m�dico" se o paciente n�o recebeu conselho m�dico obrigat�rio,<br>
                <li>entre com o relat�rio de diagn�stico no campo "Diagn�stico:" ,<br>
                <li>entre com o relat�rio de terapia no campo "Terapia:" ,<br>
                <li>se necess�rio, mude a data no campo "Documentado em:" ,<br>
                <li>se necess�rio, mude o nome no campo "Documentado por:" ,<br>
                <li>se necess�rio, entre com um n�mero chave no campo "N�mero chave:" ,<br>
            </ul>
        </ul>
        <b>Nota</b>
        <ul> Se voc� decidir apagar suas entradas clique no bot�o <input type="button" value="Apagar">.
        </ul>

        <b>Passo <?php if ($src != "?") print "2";
    else print "5"; ?></b>
        <ul> Clique no bot�o <input type="button" value="Salvar"> para salvar o documento.
        </ul>
<?php endif; ?>
    <b>Nota</b>
    <ul> Se voc� decidir cancelar o documento clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.

    </ul>


</form>

