<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    Gerenciamento de ala 
    <?php
    switch ($src) {
        case "main": print "";
            break;
        case "new": print " - Criar uma nova ala";
            break;
        case "arch": print "Ala de enfermagem - Arquivo";
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >
    <?php if ($src == "main") : ?>

        <b>Criar</b>

        <ul>Para criar uma nova ala, clique esta op��o. 
        </ul>	
    </ul>
    <b>Perfil de dados da ala</b>
    <ul>Esta op��o exibir� o perfil de uma ala e outros dados relevantes.
    </ul>
    <b>Bloqueio de cama</b>
    <ul>Se voc� quiser bloquear uma ou v�rias camas de uma vez s�, clique esta op��o. A ala assinalada ser� exibida ou se n�o dispon�vel, a
        ala padr�o ser� exibida. O bloqueio de uma cama necessita de uma senha v�lida com direito de acesso a esta fun��o.
    </ul>
    <b>Direitos d acesso</b>
    <ul> Nesta op��o voc� pode criar, editar, bloquear, ou apagar direitos de acesso para uma ala em particular. Todos os direitos de acesso criados ter�o um
        acesso somente nesta ala particular.
    </ul>
<?php endif; ?>
<?php if ($x2 == "quick") : ?>
    <?php if ($x1) : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Mostre a lista de ocupa��o da ala?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>clique na identifica��o da ala ou nome na coluna da esquerda.<br>
            <b>Nota: </b>A lista de ocupa��o que ser� exibida est� em modo de "somente leitura". Voc� n�o pode editar ou mudar quaisquer dados de paciente.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como exibir a lista de ocupa��o da ala para edi��o o atualiza��o de dados?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>clique no �cone <img <?php echo createComIcon('../', 'statbel2.gif', '0') ?>> correspondente a ala escolhida.<br>
            <b>Passo 2: </b>Se voc� estiver logado e tem direito de acesso a esta fun��o, a lista de ocupa��o ser� exibida imediatamente.<br>
            De outro modo, voc� ser� solicitado a entrar com seu nome de usu�rio e senha.<br>
            <b>Passo 3: </b>Se solicitado, entre com seu nome de usu�rio e senha.<br>
            <b>Passo 4: </b>clique no bot�o <input type="button" value="Continue...">.<br>
            <b>Passo 5: </b>Se voc� tem direito de acesso a esta fun��o, a lista de ocupa��o ser� exibida.<br>
            <b>Note: </b>A lista de ocupa��o que ser� exibida pode ser "editada". Op��es para editar ou atualizar dados de pacientes ser�o exibidas.
            voc� pode tambem abrir o arquivo de dados de paciente para outras edi��es.<br>
        </ul>
    <?php else : ?>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b>
            N�o h� lista de ocupa��o dispon�vel neste momento!</b>
        </font><p>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como exibir em vis�o r�pida a ocupa��o usando o arquivo?</b>
            </font>
        <ul>       	
            <b>Passo 1: </b>clique "<span style="background-color:yellow" > para ir ao arquivo <img <?php echo createComIcon('../', 'bul_arrowgrnlrg.gif', '0') ?>> </span>".<br>
            <b>Passo 2: </b>Um calend�rio guia aparecer�.<br>
            <b>Passo 3: </b>clique numa data do calend�rio para exibir uma vis�o r�pida da ocupa��o daquele dia.<br>
        </ul>

    <?php endif; ?>
    <b>Nota</b>
    <ul> Se voc� decidir fechar a vis�o r�pida clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
    </ul><?php endif; ?>

<?php if ($src == "new") : ?>

    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Como criar uma nova ala?</b>
    </font>
    <ul>       	
        <b>Passo 1: </b>Entre com a ID da ala ou nome no campo "<span style="background-color:yellow" > Ala: </span>" .<br>
        <b>Passo 2: </b>Selecione o departamento ou cl�nica a quem a ala pertence no campo de sele��o "<span style="background-color:yellow" > Departamento: </span>" .<br>
        <b>Passo 3: </b>Escreva a descri��o da ala e outras informa��es no campo  "<span style="background-color:yellow" > Descri��o: </span>" .<br>
        <b>Passo 4: </b>Entre com o n�mero do primeiro quarto da ala no campo "<span style="background-color:yellow" > N�mero do primeiro quarto: </span>" .<br>
        <b>Passo 5: </b>Entre com o n�mero do �ltimo quarto da  ala no campo "<span style="background-color:yellow" > N�mero do �ltimo quarto: </span>" .<br>
        <b>Passo 6: </b>Entre com o prefixo do quarto no campo "<span style="background-color:yellow" >Prefixo do quarto: </span>" .<br>
        <b>Passo 7: </b>Entre com o nome do enfermeiro chefe no campo "<span style="background-color:yellow" > Enfermeiro chefe: </span>" .<br>
        <b>Passo 8: </b>Entre com o nome do assistente do enfermeiro chefe no campo de entrada de texto "<span style="background-color:yellow" > Assistente do enfermeiro chefe: </span>" .<br>
        <b>Passo 9: </b>Digite os nomes dos enfermeiros da ala no campo "<span style="background-color:yellow" > Enfermeiros: </span>" .<br>
        <b>Passo 10: </b>clique no bot�o <input type="button" value="Criar a ala"> para criar a ala.<br>
    </ul>
    <b>Nota</b>
    <ul> Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Posso assinalar o n�mero de camas em um quarto?</b>
    </font>
    <ul>       	
        <b>N�o. </b>Nesta vers�o do programa o n�mero de camas num quarto est� fixado em 2. Voc� n�o pode mudar isto.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Posso assinalar o prefixo (ou id) para uma cama?</b>
    </font>
    <ul>       	
        <b>N�o. </b>Nesta vers�o do programa o prefixo (de id) para uma cama est� fixado em a ou b . Voc� n�o pode mudar isto.<br>
    </ul>
    <b>Nota</b>
    <ul> Se voc� quiser cancelar, clique no bot�o  <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.
    </ul>
<?php endif; ?>

<?php if ($src == "sComo") : ?>
    <?php if ($x1 == "1") : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como salvar o perfil de ume ala?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>clique no bot�o <input type="button" value="Salvar"> .<br>
        </ul>
        <b>Nota</b>
        <ul> Se voc� quiser cancelar, clique no bot�o  <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.
        </ul>

    <?php else : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como editar o perfil de uma ala?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>clique no bot�o <input type="button" value="Editar o perfil da ala"> .<br>
        </ul>
        <b>Nota</b>
        <ul> Se voc� quiser cancelar, clique no bot�o  <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Eu quero editar o perfil de uma esta��o diferente desta que est� exibida. O que devo fazer?</b>
        </font>
        <ul>       	
            <b>Passo 1:</b> clique no link "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> Outras alas </span>" para listar as alas dispon�veis.<br>
            <b>Passo 2:</b> Uma vez listadas as alas, clique na ala que voc� deseja editar.
        </ul>
        <b>Nota</b>
        <ul> Se voc� quiser cancelar, clique no bot�o  <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.
        </ul>

    <?php endif; ?>
<?php endif; ?>


<?php if ($src == "") : ?>

    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Como selecionar uma ala para editar seu perfil?</b>
    </font>
    <ul>       	
        <b>Passo 1: </b>clique a ala da lista que voc� deseja editar.<br>
    </ul>
    <b>Nota</b>
    <ul> Se voc� quiser cancelar, clique no bot�o  <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.
    </ul>

<?php endif; ?>


</form>

