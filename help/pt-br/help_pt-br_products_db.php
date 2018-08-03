<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    <?php
    if ($x2 == "pharma")
        print "Farmacia - ";
    else
        print "Suprimentos m�dicos - ";
    switch ($src) {
        case "input": if ($x1 == "update")
                print "Editando uma informa��o de produto";
            else
                print "Inserindo um novo produto no banco de dados";
            break;
        case "search": print "Pesquisar um produto";
            break;
        case "mng": print "Gerenciar produtos no banco de dados";
            break;
        case "delete": print "Removendo um produto do banco de dados";
            break;
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >



<?php if ($src == "input") : ?>
    <?php if ($x1 == "") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como inserir um novo produto no banco da dados?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Primeiro insira todas informa��es dispon�veis sobre o produto nos seus campos correspondentes.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Eu quero selecionar uma figura do produto. Como fazer isso?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Procurar..."> no campo "<span style="background-color:yellow" > arquivo da figura </span>" .<br>
                <b>Passo 2: </b>Uma pequena janela para selecionar um arquivo ir� aparecer. Selecione o arquivo com a figura de sua escolha e clique em "OK".<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Finalizei a entrada de todas as informa��es de produto dispon�veis. Como salvar?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Salvar">.<br>
            </ul>
    <?php endif; ?>	
    <?php if ($x1 == "save") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como inserir um novo produto no banco de dados?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Novo produto"> .<br>
                <b>Passo 2: </b>O formul�rio de entrada ir� aparecer.<br>
                <b>Passo 3: </b>Insira todas as informa��es dispon�veis sobre o novo produto.<br>
                <b>Passo 4: </b>Clique no bot�o <input type="button" value="Salvar"> para salvar as informa��es.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Eu quero editar um produto que j� est� cadastrado. Como fazer isso?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Atualizar ou Editar">.<br>
                <b>Passo 2: </b>A informa��o do produto ser� automaticamente mostrada junto ao formul�rio de edi��o.<br>
                <b>Passo 3: </b>Edite a informa��o.<br>
                <b>Passo 4: </b>Clique no bot�o <input type="button" value="Salvar"> para salvar a nova informa��o.<br>
            </ul>

    <?php endif; ?>	
    <?php if ($x1 == "update") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Eu quero editar o produto que est� sendo mostrado agora. Como fazer isso?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Se necess�rio primeiramente apague as informa��es existentes em um campo.<p>
                    <b>Passo 2: </b>Digite a nova informa��o no campo apropriado.<p>
                    <b>Passo 3: </b>Clique no bot�o <input type="button" value="Salvar"> para salvar a nova informa��o.<br>
            </ul>
        <?php endif; ?>	
    <?php endif; ?>	

<?php if ($src == "search") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como pesquisar um produto?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Insira uma informa��o completa ou as primeiras letras da marca, ou o nome gen�rico, ou o n�mero do pedido, etc. No 
            campo				<nobr><span style="background-color:yellow" >" Procura por palavra-chave...: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> .<br>
            <b>Passo 2: </b>Clique no bot�o <input type="button" value="Pesquisar"> para encontrar o artigo.<br>
            <b>Passo 3: </b>Se a pesquisa encontrou o artigo que exatamente coincide com a palavra-chave, ser�o exibidas informa��es detalhadas do artigo.<br>
            <b>Passo 4: </b>Se a pesquisa encontrar diversos artigos relacionados com a palavra-chave, uma lista dos artigos ser� exibida.<br>
        </ul>
    <?php if ($x1 != "multiple") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Uma lista com diversos artigos est� listada. Como ver as informa��es de um artigo em particular?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> ou no nome do artigo.<br>
            </ul>
    <?php endif; ?>
    <?php if ($x1 == "multiple") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Desejo ver a lista pr�via dos artigos. O que eu deveria fazer?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Voltar">.<br>
            </ul>
    <?php endif; ?>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
        <ul>       	
            Se voc� decidir cancelar clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.
        </ul>

    <?php endif; ?>

<?php if ($src == "mng") : ?>
    <?php if (($x3 == "1")) : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como editar a informa��o de um produto?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Editar a informa��o sobre um novo produto.<br>
                <b>Passo 2: </b>Clique no bot�o <input type="button" value="Salvar"> para salvar a nova informa��o.<br>
            </ul>
        <?php endif; ?>

    <?php if ($x1 == "multiple") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como editar a informa��o do produto em exibi��o?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Atualizar ou editar">.<br>
                <b>Passo 2: </b>A informa��o do produto ser� automaticamente inserida no formul�rio de edi��o.<br>
                <b>Passo 3: </b>Edite a informa��o.<br>
                <b>Passo 4: </b>Clique no bot�o <input type="button" value="Salvar"> para salvar a nova informa��o.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como remover o produto que est� atualmente sendo exibido?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Remover do banco de dados">.<br>
                <b>Passo 2: </b>Voc� ser� consultado se deseja realmente remover a informa��o do banco de dados.<br>
                <b>Passo 3: </b>Se voc� realmente quer remover a informa��o do produto, clique no bot�o <input type="button" value="Sim, estou certo disso. Remova o dado."><p>
                    <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Note:</b></font> Remover ou apagar um dado n�o pode ser desfeito.<br>
            </ul>	
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Eu n�o quero remover a informa��o do produto. O que devo fazer?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no link "<span style="background-color:yellow" > << N�o, n�o apague. Volte </span>".<br>
            </ul>	
    <?php endif; ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como gerenciar um produto no banco de dados?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Primeiro encontre o artigo. Insira a informa��o completa ou as primeiras letras da marca do artigo, ou nome generico, ou numero do pedido, etc. no 
            campo	<nobr><span style="background-color:yellow" >" Procura palavra-chave: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> .<br>
            <b>Passo 2: </b>Clique no bot�o <input type="button" value="Pesquisar"> para encontrar o artigo.<br>
            <b>Passo 3: </b>Se a pesquisa encontrou o artigo que exatamente coincide com a palavra-chave, ser�o exibidas informa��es detalhadas do artigo.<br>
            <b>Passo 4: </b>Se a pesquisa encontrar diversos artigos relacionados com a palavra-chave, uma lista dos artigos ser� exibida.<br>
        </ul>



    <?php if (($x1 != "multiple") && ($x3 == "")) : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Uma lista com diversos artigos est� listada. Como ver as informa��es de um artigo em particular?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> ou no nome do artigo.<br>
            </ul>
    <?php endif; ?>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Note:</b></font> 
        <ul>       	
            Se voc� decidir cancelar clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.
        </ul>
<?php endif; ?>



<?php if ($src == "delete") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Desejo remover o produto do banco de dados. O que devo fazer?</b>
        </font>
        <ul>       	
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> Remover ou apagar um produto n�o pode ser desfeito.<p>
                <b>Passo 1: </b>Se voc� estiver certo que deseja apagar o produto, clique no bot�o <input type="button" value="Sim, estou certo. Apague o dado.">.<br>
        </ul>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Eu n�o quero remover a informa��o do produto. O que devo fazer?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no link "<span style="background-color:yellow" > << N�o, n�o apague. Voltar </span>".<br>
        </ul>	

        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
        <ul>       	
            Se voc� decidir cancelar clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.
        </ul>

    <?php endif; ?>	

<?php if ($src == "report") : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como escrever um relat�rio?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Escreva seu relat�rio no campo
            <nobr><span style="background-color:yellow" >" Relat�rio: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> .<br>
            <b>Passo 2: </b>Digite seu nome no campo
            <nobr><span style="background-color:yellow" >" Relator: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> .<br>
            <b>Passo 3: </b>Insire seu n�mero pessoal no campo
            <nobr><span style="background-color:yellow" >" Num pessoal: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> .<br>
            <b>Passo 4: </b>Clique no bot�o <input type="button" value="Envia"> para enviar o relat�rio.<br>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b><br></font> 

        Se voc� decidir cancelar ou finalizar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
        </ul>
<?php endif; ?>	

</form>

