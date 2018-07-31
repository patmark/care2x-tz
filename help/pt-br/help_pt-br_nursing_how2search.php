<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    <?php
    switch ($x2) {
        case "search": print "Como... ";
            if ($x1)
                print 'mostre a ocupa��o da ala onde a palavra chave de pesquisa foi encontrada';
            else
                print 'pesquise por um paciente';
            break;
        case "quick": print "Enfermagem - Vis�o r�pida da ocupa��o de hoje da ala";
            break;
        case "arch": print "Ala de enfermagem - Arquivo";
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >
    <?php if ($x2 == "search") : ?>
    <?php if (!$x1) : ?>
            <b>Passo 1</b>

            <ul> Entre no campo "<span style="background-color:yellow" >Por favor, entre com uma palavra chave de pesquisa.</span>" 
                ou com uma informa��o completa ou umas poucas letras de informa��o de um paciente,como exemplo, o nome, ou sobrenome ou ambos.
                <ul type=disc><li>Exemplo 1: entre "Guerero" ou "gue".
                    <li>Exemplo 2: entre "Alfredo" ou "Alf".
                    <li>Exemplo 3: entre "Guerero, Alf".
                </ul>	
            </ul>
            <b>Passo 2</b>
            <ul> Clique no bot�o <input type="button" value="Pesquisa"> para iniciar a pesquisa.<p>
            </ul>
            <b>Passo 3</b>
            <ul> Se a pesquisa encontrar um resultado, a lista de ocupa��o da ala ser� exibida, mostrando onde a palavra chave de pesquisa foi encontrada.<p>
            </ul>
            <b>Passo 4</b>
            <ul> Se a pesquisa encontrar v�rios resultados, uma lista de resultados ser� mostrada.<p>
            </ul>
            <b>Nota</b>
            <ul> Se voc� decidir cancelar a pesquisa clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.
            </ul><?php endif; ?>
        <b>Passo <?php if ($x1) print "1";
    else print "5"; ?></b><ul>clique no bot�o <img <?php echo createComIcon('../', 'bul_arrowblusm.gif', '0') ?>>,
            ou na data, ou na ala para exibir a lista de ocupa��o da ala.
            <p><b>Nota:</b> A palavra chave de pesquisa estar� grifada na lista.
                <br><b>Nota:</b> A lista n�o pode ser editada; est� em modo de "somente leitura". Se voc� tentar abrir o arquivo de dados do paciente clicando em seu nome, voc� ser� avisado para
                entrar com seu nome de usu�rio e senha.
        </ul>
    <?php endif; ?>
<?php if ($x2 == "quick") : ?>
    <?php if ($x1) : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como mostrar o status de ocupa��o de outros dias?</b>
            </font>
            <ul>       	
                <b>Passo: </b>Clique na data do mini-calend�rio.<p>
                <img src="../help/en/img/en_mini_calendar_php.png" border=0 width=223 height=133><p>
                    <b>Nota: </b>A lista antiga de ocupa��o ser� mostrada em modo de "somente leitura". Voc� n�o pode editar ou alterar quaisquer dados de paciente.<br>
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como mostrar a lista de ocupa��o da ala?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique na identifica��o da ala ou seu nomena coluna � esquerda.<br>
                <b>Nota: </b>A lista de ocupa��o que ser� exibida ser� mostrada em modo de "somente leitura". Voc� n�o pode editar ou alterar quaisquer dados de paciente.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como mostrar a lista de ocupa��o da ala para a edi��o ou atualiza��o de dados?</b>
        </Voc� n�o pode>       	
        <b>Passo 1: </b>Clique no �cone <img <?php echo createComIcon('../', 'statbel2.gif', '0') ?>> correspondente a ala escolhida.<br>
        <b>Passo 2: </b>Se voc� estiver logado e tiver direito de acesso para a fun��o, a lista de ocupa��o ser� exibida imediatamente.<br>
        caso contr�rio,  voc� ser� solicitado a entrar com seu nome de usu�rio e senha.<br>
        <b>Passo 3: </b>Se solicitado  entre com seu nome de usu�rio e senha.<br>
        <b>Passo 4: </b>Clique no bot�o  <img <?php echo createLDImgSrc('../', 'continue.gif', '0') ?>> .<br>
        <b>Passo 5: </b>Se voc� tiver direito de acesso para a fun��o, a lista de ocupa��o ser� exibida.<br>
        <b>Nota: </b>A lista de ocupa��o que ser� exibida pode ser "editada". Op��es para edi��o ou atualiza��o dos dados do paciente ser�o apresentadas.
        Voc� tambem pode abrir o arquivo de dados do paciente para continuar editando.<br>
        </ul>
    <?php else : ?>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b>
            N�o h� lista de ocupa��o dispon�vel neste momento!</b>
        </font><p>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como mostrar vis�es r�pidas de uma ocupa��o anterior usando o arquivo?</b>
            </font>
        <ul>       	
            <b>Passo 1: </b>Clique "<span style="background-color:yellow" > Clique aqui para ir ao arquivo <img <?php echo createComIcon('../', 'bul_arrowgrnlrg.gif', '0') ?>> </span>".<br>
            <b>Passo 2: </b>Um calend�rio guia aparecer�.<br>
            <b>Passo 3: </b>Clique em uma data do calend�rio para que uma vis�o r�pida da ocupa��o daquele dia seja mostrada.<br>
        </ul>

    <?php endif; ?>
    <b>Nota</b>
    <ul> Se voc� decidir fecha a Vis�o r�pida clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
    </ul><?php endif; ?>

<?php if ($x2 == "arch") : ?>

    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Como mostrar vis�es r�pidas de uma ocupa��o anterior usando o arquivo?</b>
    </font>
    <ul>       	
        <b>Passo 1: </b>Clique em uma data do calend�rio para exibir a vis�o r�pida de ocupa��o daquele dia.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Como mudar o mes do calend�rio guia?</b>
    </font>
    <ul>       	
        <b>Passo 1: </b>Para mostrar o pr�ximo mes clique no nome do mes no canto superior DIREITO do calend�rio guia.
        Clique quantas vezes for necess�rio at� que o mes desejado seja mostrado.<p>
            <b>Passo 2: </b>Para mostrar o mes anterior, clique no nome do mes no canto superior ESQUERDO do calend�rio guia.
            Clique quantas vezes for necess�rio at� que o mes desejado seja mostrado.<br>
    </ul>

<?php endif; ?>


</form>

