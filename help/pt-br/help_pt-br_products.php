<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    <?php
    if ($x2 == "pharma")
        print "Farmacia - ";
    else
        print "Suprimento m�dico - ";
    switch ($src) {
        case "head": if ($x2 == "pharma")
                print "Requisitando produtos farmaceuticos";
            else
                print "Requisitando produtos";
            break;
        case "catalog": print "Requisitar catalogo";
            break;
        case "orderlist": print "Requisitar cesta ( lista de requisi��o )";
            break;
        case "final": print "Lista final de requisi��es";
            break;
        case "maincat": print "Requisitar catalogo";
            break;
        case "arch": print "Requisitar arquivo";
            break;
        case "archshow": print "Requisitar arquivo";
            break;
        case "db": switch ($x3) {
                case "input": print "Inserindo um novo produto no banco de dados";
                    break;
            }
            break;
        case "how2":print "Como requisitar ";
            if ($x2 == "pharma")
                print "produtos farmaceuticos products";
            else
                print "produtos";
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >
<?php if ($src == "maincat") : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como adicionar um artigo no cat�logo de requisi��es?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Primero voc� deve encontrar o artigo.  Insira uma informa��o completa ou as primeiras letras da marca, ou o nome gen�rico, ou o n�mero do pedido, etc. No 
            campo		<nobr><span style="background-color:yellow" >" Procura por palavra-chave: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> .<br>
            <b>Passo 2: </b>Clique no bot�o <input type="button" value="Encontrar artigo"> para encontrar o artigo.<br>
            <b>Passo 3: </b>Se a pesquisa encontrou o artigo que exatamente coincide com a palavra-chave, ser�o exibidas informa��es detalhadas do artigo.<br>
            <b>Passo 4: </b>Clique no bot�o <input type="button" value="Coloque este artigo no catalogo"> para adicionar o artigo no catalogo.<p>
                <b>Nota: </b>Se voc� n�o quer colocar este artigo no catalogo apenas continue procurando por outro artigo.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como continuar pesquisando?</b>
        </font>
        <ul>       	
            Apenas siga as instru��es acima para encontrar um artigo.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            A pesquisa encontrou diversos artigos parecidos com minha palavra-chave. O que devo fazer?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Se a pesquisa encotrar o artigo ou informa��es do artigo que aproximam-se das palavras-chave, uma lista ser� exibida.<br>
            <b>Passo 2: </b>Clique no bot�o <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?>>. O artigo ser� adicionado na listagem do cat�logo.<br>
            <b>Passo 3: </b>Se voc� desejar ver primeiro uma lista uma informa��o completa no artigo, clique no seu nome ou no seu bot�o <img <?php echo createComIcon('../', 'info3.gif', '0') ?>>.<br>
            <b>Passo 4: </b>A informa��o completa do artigo ser� exibida.<br>
            <b>Passo 5: </b>Clique no bot�o <input type="button" value="Insira este artigo no cat�logo">.<p>
        </ul>


        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Eu quero saber mais informa��es sobre o artigo. O que eu deveria fazer?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> ou no nome do artigo.<br>
            <b>Passo 2: </b>A informa��o completa sobre o produto ser� exibida.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como remover um artigo da lista do cat�logo?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> do artigo.<br>
        </ul>

<?php endif; ?>

<?php if ($src == "how2") : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como solicitar <?php if ($x2 == "pharma") print "produtos farmaceuticos";
    else print "produtos do suprimento m�dico"; ?>?
        </b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no menu de op��es "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'bestell.gif', '0') ?>> Ordering </span>" para trocar para solicita��o.<br>
            <b>Passo 2: </b>Se voc� estiver logado anteriormente, a cesta de solicita��es e o cat�logo de solicita��es ser�o exibidos. Entretanto, se voc� n�o estiver logado anteriormente, voc� ser� solicitado a inserir seu nome de usu�rio e sua senha.<br>

            <b>Passo 3: </b>Caso solicitado, insira seu nome de usu�rio e sua senha. Clique no bot�o <img <?php echo createLDImgSrc('../', 'continue.gif', '0') ?>>.<br>
            <b>Passo 4: </b>Inicie criando uma lista de pedidos. No quadro direito voc� ver� o cat�logo de pedido do seu departamento, ou hospital, ou sala de opera��es.<p>
                <b>Passo 5: </b>Se o artigo que voc� precisa est� na lista do cat�logo, clique no seu bot�o <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> para colocar <b>uma pe�a</b> do artigo na cesta (lista de pedido) no quadro da esquerda.<p>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Eu quero colocar mais de uma pe�a de um artigo no cesto de pedidos. Como fazer isso?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique o bot�o de selecionar 	<input type="checkbox" name="a" value="a" checked> correspondente ao artigo para selecion�-lo.<br>
            <b>Passo 2: </b>Insira o n�mero de pe�as no " Pcs. <input type="text" name="d" size=2 maxlength=2> " campo correspondente ao artigo.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Colocar no cesto"> para colocar o artigo no cesto (lista de pedidos).<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            O artigo que preciso n�o est� na lista do cat�logo. O que devo fazer?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Voc� deve encontrar o artigo.  Insira uma informa��o completa ou as primeiras letras da marca, ou o nome gen�rico, ou o n�mero do pedido, etc. No
            campo		<nobr><span style="background-color:yellow" >" Pesquisa palavra-chave: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> .<br>
            <b>Passo 2: </b>Clique no bot�o <input type="button" value="Encontrar artigo"> para encontrar o artigo.<br>
            <b>Passo 3: </b>Se a pesquisa encontrar o artigo ou a informa��o do artigo que approxima-se da palavra-chave, uma lista ser� exibida.<br>
            <b>Passo 4: </b>Se voc� deseja colocar uma pe�a do artigo no cesto de pedidos, clique no bot�o <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>>. O artigo ser� colocado no cesto ao mesmo tempo que ser� inclu�do na listagem do cat�logo.<br>
            <b>Passo 5: </b>Se voc� deseja apenas adicionar o artigo na listagem do cat�logo, clique no bot�o <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?>>.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Desejo ver mais informa��es sobre o artigo. O que devo fazer?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> ou no nome do artigo.<br>
            <b>Passo 2: </b>Uma janela exibindo a informa��o completa sobre o produto ir� aparecer.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como remover um artigo da lista do cat�logo?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> do artigo.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Posso mudar o n�mero de pe�as do cesto de pedidos?
        </b>
        </font>
        <ul>       	
            <b>Sim.</b> Apenas substitua o dado com o n�mero de pe�as antes de finalizar a lista de pedidos.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Todos os artigos que necessito est�o no cesto agora. O que devo fazer a seguir?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Voc� pode continuar enviando a lista de pedidos para a  <?php if ($x2 == "pharma") print "farm�cia";
    else print "Reposit�rio m�dico"; ?>. <br>Clique no bot�o <input type="button" value="Encerrar a lista de pedidos"> para iniciar o procedimento.<br>
            <b>Passo 2: </b>A lista de pedidos ser� exibida novamente. Insira seu nome no campo <nobr>"<span style="background-color:yellow" > Created by <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> .<br>
            <b>Passo 3: </b>Selecione a prioridade do pedido entre "<span style="background-color:yellow" > Normal<input type="radio" name="x" value="s" checked> Urgente<input type="radio" name="x" > </span>". Marque o bot�o apropriado.<br>
            <b>Passo 4: </b>O validador (m�dico ou cirurgi�o) deve inserir seu nome no campo <nobr>"<span style="background-color:yellow" > Validado por <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> .<br>
            <b>Passo 5: </b>O validador (m�dico ou cirurgi�o) deve inserir sua senha no campo <nobr>"<span style="background-color:yellow" > Senha: <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> .<br>
            <b>Passo 6: </b>Clique no bot�o <input type="button" value="Envia esta lista de pedidos para a <?php if ($x2 == "pharma") print "farm�cia";
    else print "reposit�rio m�dico"; ?>"> para enviar a lista de pedidos.<br>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Note:</b></font> 
        <ul>       	
            Se voc� decidir cancelar o envio da lista de pedidos, clique no link "<span style="background-color:yellow" > << Voltar e editar a lista </span>" para voltar � lista de pedidos.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Desejo encerrar os pedidos agora. O que devo fazer?</b>
        </font>
        <ul>     
            <b>Passo 1: </b>Clique no link "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> Finalizar pedidos </span>" para voltar o submenu do<?php if ($x2 == "pharma") print "farm�cia";
    else print "reposit�rio medico"; ?> submenu.<br>
        </ul>	
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Desejo criar uma nova lista de pedidos. O que devo fazer?</b>
        </font>
        <ul>     
            <b>Passo 1: </b>Clique no link "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> Iniciar uma nova lista de pedidos </span>" para criar um cesto vazio de pedidos.<br>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
        <ul>       	
            Voc� pode obter instru��es detalhadas do cesto de pedidos ou do cat�logo listando ao clicar no bot�o <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> dentro da janela.
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
        <ul>       	
            Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
        </ul>
<?php endif; ?>


<?php if ($src == "head") : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como solicitar <?php if ($x2 == "pharma")
        print "produtos farmaceuticos";
    else
        print "produtos do reposit�rio medico";
    ?>?
        </b>
        </font>
        <ul>       	

            <b>Passo 1: </b>Primeiro crie uma lista de pedidos. No quadro direito voc� vai ver o cat�logo de pedidos para o seu departamento, ou hospital, ou sala de opera��es.<p>
                <b>Passo 2: </b>Se o artigo que voc� precisa est� na listagem do cat�logo, clique no seu bot�o <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> para colocar <b>uma pe�a</b> do artigo no cesto (lista de pedidos) no quadro do lado esquerdo.<p>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
        <ul>       	
            Voc� pode obter instru��es detalhadas no cesto de pedidos ou na listagem do catalogo clicando no bot�o <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> dentro da janela.
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Note:</b></font> 
        <ul>       	
            Se voc� decidir fechar, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
        </ul>
<?php endif; ?>

<?php if ($src == "catalog") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como colocar um artigo no cesto (lista de pedidos)?
        </b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Se o artigo que voc� precisa est� la lista do cat�logo, clique no seu bot�o <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> para colocar <b>uma pe�a</b> do artigo na lista de pedidos (cesto) no quadro esquerdo.<p>
        </ul>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Desejo colocar mais de uma pe�a do artigo no cesto de pedidos. Como fazer isso?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o selecionar <input type="checkbox" name="a" value="a" checked> correspondente ao artigo para selecion�-lo.<br>
            <b>Passo 2: </b>Insira o n�mero de pe�as no campo " Pcs. <input type="text" name="d" size=2 maxlength=2> "  correspondente ao artigo.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Colocar no cesto"> para colocar o artigo dentro do cesto (lista de pedidos).<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            The artigo que necessito n�o est� na lista do cat�logo. O que devo fazer?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Voc� deve encontrar o artigo. Insira uma informa��o completa ou as primeiras letras da marca, ou o nome gen�rico, ou o n�mero do pedido, etc. No campo 
            <nobr><span style="background-color:yellow" >" Search palavra-chave: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> .<br>
            <b>Passo 2: </b>Clique no bot�o <input type="button" value="Encontrar artigo"> para encontrar o artigo.<br>
            <b>Passo 3: </b>Se a pesquisa encontrou o artigo que exatamente coincide com a palavra-chave, ser�o exibidas informa��es detalhadas do artigo.<br>
            <b>Passo 4: </b>Se voc� deseja inserir uma pe�a do artigo no cesto de pedidos, clique no bot�o <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>>. O artigo ser� colcoado no cesto e ao mesmo tempo ser� inclu�do na listagem do cat�logo.<br>
            <b>Passo 5: </b>Se voc� deseja apenas adicionar o artigo na listagem do catalogo, clique no bot�o <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?>>.<br>

        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Desejo ver mais informa��es sobre artigo. O que devo fazer?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> ou no nome do artigo.<br>
            <b>Passo 2: </b>Uma janela mostrando a informa��o completa sobre o produto ir� aparecer.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como remover um artigo da lista do cat�logo?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> do artigo.<br>
        </ul>

<?php endif; ?>

<?php if ($src == "orderlist") : ?>
    <?php if ($x1 == "0") : ?>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
            <ul>       	
                O cesto est� vazio neste momento.<p>
                    Para criar uma lista de pedidos, selecione o artigo que voc� precisa da lista do cat�logo no quadro direito e coloque no cesto.
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como colocar um artigo no cesto (lista de pedidos)?
            </b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Se o artigo que voc� precisa est� na lista do cat�logo, clique no seu bot�o <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> para colocar <b>uma pe�a</b> do artigo na lista de pedidos (cesto).<br> A lista de pedidos ir�
                ser exibida automaticamente no cesto do quadro da esquerda.<p>
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Note:</b></font> 
            <ul>       	
                Para instru��es detalhadas sobre como pesquisar, selecionar e colocar artigos artigos da lista do catalogo no cesto, clique no bot�o <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> dentro do quadro do catalogo de pedidos � direita.<p>
            </ul>

    <?php else : ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Posso mudar o n�mero de pe�as no cesto de pedidos?
            </b>
            </font>
            <ul>       	
                <b>Sim.</b> Apenas substitua a entrada com o n�menro de pe�as antes de finalizar a lista de pedidos.
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Desejo ver mais informa��es sobre o artigo. O que devo fazer?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> do artigo.<br>
                <b>Passo 2: </b>Uma janela mostrando informa��es completas sobre o produto ir� aparecer.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como remover um artigo do cesto?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> do artigo.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Todos os artigos que necessito est�o no cesto agora. O que devo fazer a seguir?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Voc� pode proceder enviando a lista de pedidos para a farm�cia. <br>Clique no bot�o <input type="button" value="Finalizar a lista de pedidos"> para iniciar o procedimento.<br>
                <b>Passo 2: </b>A lista de pedidos ser� exibida novamente. Insira seu nome no campo <nobr>"<span style="background-color:yellow" > Criado por <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> .<br>
                <b>Passo 3: </b>Selecione o status de prioridade do pedido entre "<span style="background-color:yellow" > Normal<input type="radio" name="x" value="s" checked> Urgente<input type="radio" name="x" > </span>". Clique no bot�o apropriado.<br>
                <b>Passo 4: </b>O validador (m�dico ou cirurgi�o) deve inserir seu nome no campo <nobr>"<span style="background-color:yellow" > Validado por <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> .<br>
                <b>Passo 5: </b>O validador (m�dico ou cirurgi�o) deve inserir sua senha no campo <nobr>"<span style="background-color:yellow" > Senha: <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> .<br>
                <b>Passo 6: </b>Clique no bot�o <input type="button" value="Envia sua lista de pedidos para a farm�cia"> para enviar a lista de pedidos.<br>
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Note:</b></font> 
            <ul>       	
                Se voc� decidir cancelar o envio da lista de pedidos, clique no link "<span style="background-color:yellow" > << Voltar e editar a lista </span>" para voltar para a lista de pedidos.
            </ul>
    <?php endif; ?>

<?php endif; ?>


<?php if ($src == "final") : ?>
    <?php if ($x1 == "1") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Desejo enviar os pedidos agora. O que devo fazer?</b>
            </font>
            <ul>     
                <b>Passo 1: </b>Clique the link "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> Finalizar os pedidos </span>" para voltar para o submenu da farm�cia.<br>
            </ul>	
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Desejo criar uma nova lista de pedidos. O que devo fazer?</b>
            </font>
            <ul>     
                <b>Passo 1: </b>Clique no link "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> Iniciar a nova lista de pedidos </span>" para criar um cesto de pedidos vazio.<br>
            </ul>		<?php else : ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como enviar a lista de pedidos final?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Insira seu nome no campo <nobr>"<span style="background-color:yellow" > Criado por <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> .<br>
                <b>Passo 2: </b>Selecione a prioridade do pedido entre "<span style="background-color:yellow" > Normal<input type="radio" name="x" value="s" checked> Urgente<input type="radio" name="x" > </span>". Clique no bot�o apropriado.<br>
                <b>Passo 3: </b>O validador (m�dico ou cirurgi�o) deve inserir seu nome no campo <nobr>"<span style="background-color:yellow" > Validado por <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> .<br>
                <b>Passo 4: </b>O validador (m�dico ou cirurgi�o) deve inserir sua senha no campo <nobr>"<span style="background-color:yellow" > Senha: <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> .<br>
                <b>Passo 5: </b>Clique no bot�o <input type="button" value="Envia sua lista de pedidos para a farm�cia"> para enviar a lista de pedidos.<br>
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
            <ul>       	
                Se voc� decidir cancelar a lista de pedidos, clique no link "<span style="background-color:yellow" > << Voltar e editar a lista </span>" para voltar � lista de pedidos.
            </ul>
    <?php endif; ?>

<?php endif; ?>
    <!-- ++++++++++++++++++++++++++++++++++ archive +++++++++++++++++++++++++++++++++++++++++++ -->
<?php if ($src == "arch") : ?>


        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b>Desejo ver as listas de pedidos arquivadas.</b></font>
        <ul>  	<b>Passo 1: </b> Insira a informa��o completa ou algumas primeiras letras do nome do departmento, ou id, ou data do pedido, ou prioridade ("urgente") no 
            campo	<nobr><span style="background-color:yellow" >" Procura palavra-chave: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> .<br>
            <b>Passo 2: </b>Marque ou desmarque as seguintes caixas de sele��o para pesquisar as categorias:
            <ul> 	
                <input type="checkbox" name="d" checked> Data<br>
                <input type="checkbox" name="d" checked> Departmento<br>
                <input type="checkbox" name="d" checked> Prioridade<br>
                Por padr�o, todas as tr�s caixas de sele��o ser�o marcadas e a pesquisa ir� pesquisar em todas as tr�s categorias. Se voc� desejar excluir uma categoria clique na sua caixa de sele��o para desmarca-la.
            </ul> 	
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquisa"> para encontrar o artigo.<br>
            <b>Passo 4: </b>Se a pesquisa encontrar o pedido ou os pedidos que approximam-se �s palavras-chave, uma lista ser� exibida.<br>
            <b>Passo 5: </b>Clique no bot�o da lista de pedidos <img <?php echo createComIcon('../', 'uparrowgrnlrg.gif', '0') ?>>. Os detalhes do pedido ser�o exibidos<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b>Diversos pedidos ser�o listados. Como ver um pedido em particular?</b></font>
        <ul>  	
            <b>Passo 1: </b>Clique no bot�o de pedidos <img <?php echo createComIcon('../', 'uparrowgrnlrg.gif', '0') ?>>. Os detalhes dos pedidos ser�o exibidos<br>
        </ul>

        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Note:</b></font> 
        <ul>       	
            Se voc� decidir terminar sua pesquisa e fechar, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
        </ul>


<?php endif; ?>

<?php if ($src == "archshow") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Desejo ver mais informa��es sobre um artigo na lista de pedidos. O que devo fazer?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o do artigo <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> .<br>
            <b>Passo 2: </b>Uma janela mostrando a informa��o completa sobre o produto ir� aparecer.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Desejo ver a lista dos pedidos arquivados novamente. O que devo fazer?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'back2.gif', '0') ?>> .<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
        <font color="#990000"><b>Desejo fazer uma nova pesquisa na lista de pedidos arquivados. O que devo fazer?</b></font>
        <ul>  	<b>Passo 1: </b> Insira uma informa��o completa ou as primeiras letras do nome do departamento, ou id, ou data do pedido, ou prioridade ("urgente") no campo 
            <nobr><span style="background-color:yellow" >" Procura palavra-chave: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> .<br>
            <b>Passo 2: </b>Marque ou desmarque as seguintes caixas de sele��o para a pesquisa por categorias:
            <ul> 	
                <input type="checkbox" name="d" checked> Data<br>
                <input type="checkbox" name="d" checked> Departmento<br>
                <input type="checkbox" name="d" checked> Prioridade<br>
                Por padr�o, todas as tr�s caixas de sele��o ser�o marcadas e a pesquisa ir� pesquisar em todas categorias. Se voc� desejar excluir uma categoria clique na sua caixa de sele��o para desmarcar.
            </ul> 	
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquisar"> para encontrar o artigo.<br>
            <b>Passo 4: </b>Se a pesquisa encontrar o pedido ou pedidos que aproximam-se a palavra-chave, uma lista ser� exibida.<br>
        </ul>
<?php endif; ?>	


<?php if ($src == "db") : ?>
    <?php if ($x1 == "") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como inserir um novo produto na base de dados?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Primeiro insira todas as informa��es dispon�veis sobre o produto nos seus campos correspondentes.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Desejo selecionar uma figura do produto. Como fazer isso?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Selecionar..."> no campo "<span style="background-color:yellow" > Picture file </span>" .<br>
                <b>Passo 2: </b>Uma pequena janelapara selecionar um arquivo ir� aparecer. Selecione o arquivo da figura da sua escolha e clique "OK".<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Finalizei a entrada de todas as informa��es dispon�veis. Como salvar?</b>
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
                <b>Passo 3: </b>Insira as informa��es dispon�veis sobre o novo produto.<br>
                <b>Passo 4: </b>Clique no bot�o <input type="button" value="Salvar"> para salvar a informa��o.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Desejo editar o produto que est� atualmente sendo exibido. Como fazer isso?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Atualizar ou editar">.<br>
                <b>Passo 2: </b>A informa��o do produto ser� automaticamente inserida no formul�rio de edi��o.<br>
                <b>Passo 3: </b>Edite a informa��o.<br>
                <b>Passo 4: </b>Clique no bot�o <input type="button" value="Save"> para salvar a nova informa��o.<br>
            </ul>

    <?php endif; ?>	
<?php endif; ?>	
</form>

