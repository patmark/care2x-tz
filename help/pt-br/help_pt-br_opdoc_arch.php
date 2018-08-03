<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    OR documentoation - 
    <?php
    if ($src == "arch") {
        switch ($x1) {
            case "dummy": print "Arquivo";
                break;
            case "": print "Arquivo";
                break;
            case "?": print "Arquivo";
                break;
            case "search": print "Lista de reultados da busca de arquivos";
                break;
            case "select": print "Documentos do paciente";
        }
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<Param action="#" >

<?php if ($src == "arch") : ?>
    <?php if (($x1 == "dummy") || ($x1 == "?") || ($x1 == "") || !$x2) : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Desejo listar todos os  documentos de opera��es feitos em uma certa data</b></font>
        <ul> <b>Passo 1: </b>Insira a data da opera��o no campo "<span style="background-color:yellow" > Data da opera��o: </span>". <br>
            <ul><font size=1 color="#000099">
                <!-- <b>Tip:</b> Digite "T" ou "t" para automaticamente produzir a data de hoje.<br>
                <b>Dica:</b> Digite "Y" ou "y" para automaticamente produzir a data de ontem.<br> -->
                </font>
            </ul><b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
        </ul>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Desejo listar todos os documentos do Centro Cir�rgico de um certo paciente.</b></font>
        <ul> <b>Passo 1: </b>Insira a palavra-chave no campo correspondente. Pode ser uma palavra inteira ou algumas letras dos dados pessoais do paciente. <br>
            <ul><font size=1 color="#000099" >
                <b>Os seguintes campos podem ser preenchidos com a palavra-chave:</b>
                <br> Num. do paciente
                <br> Nome de fam�lia
                <br> Primeiro nome
                <br> Data de nascimento
                </font>
            </ul><b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Desejo listar todos os documentos do Centro Cir�rgico feitos por um cirurgi�o.</b></font>
        <ul> <b>Passo 1: </b>Insira o nome do cirurgi�o no campo "<span style="background-color:yellow" > Cirurgi�o: </span>". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Desejo listar todos os documentos do Centro Cir�rgico  de pacientes ambulatoriais  </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o r�dio"<span style="background-color:yellow" >Paciente ambulatorial <input type="radio" name="r" value="1"></span>". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Desejo listar todos os documentos do Centro Cir�rgico  de pacientes internados</b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o r�dio "<span style="background-color:yellow" ><input type="radio" name="r" value="1">paciente internado</span>". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Desejo listar todos os documentos do Centro Cir�rgico  of pacientes  geralmente segurados</b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o r�dio "<span style="background-color:yellow" ><input type="radio" name="r" value="1">Seguro</span>". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Desejo listar todos os documentos do Centro Cir�rgico  de pacientes segurados de Parama privada </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o r�dio "<span style="background-color:yellow" ><input type="radio" name="r" value="1">Privado</span>". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Desejo listar todos os documentos do Centro Cir�rgico de pacientes auto-pagantes </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o r�dio "<span style="background-color:yellow" ><input type="radio" name="r" value="1">Auto paga</span>". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Desejo listar todos os documentos do Centro Cir�rgico  com uma determinada palavra-chave</b></font>
        <ul> <b>Passo 1: </b>Insira a palabra-chave no campo correspondente. Pode ser uma palavra inteira ou algumas letras do documento. <br>
            <ul><font size=2 color="#000099" >
                <b>Exemplo:</b> Para palavras-chave de diagn�stico insira no campo "Diagn�stico".<br>
                <b>Exemplo:</b> Para palavras-chave de localiza��o insira no campo "Localiza��o".<br>
                <b>Exemplo:</b> Para  palavras-chave terap�uticas insira no campo "Terapia".<br>
                <b>Exemplo:</b> Para palavras-chave notas especiais insira no campo "Notas especiais".<br>
                </font>
            </ul><b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
        </ul>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Desejo listar todos os documentos com uma certa classifica��o de opera��o</b></font>
        <ul> <b>Passo 1: </b>Insira a palavra-chave no campo correspondente. Pode ser uma palavra inteira ou algumas letras do documento. <br>
            <ul><font size=2 color="#000099" >
                <b>Exemplo:</b> Para opera��es pequenas insira o n�mero no campo"<span style="background-color:yellow" > <input type="text" name="m" size=4 maxlength=2> pequena </span>" .<br>
                <b>Exemplo:</b> Para opera��es m�dias insira o n�mero no campo"<span style="background-color:yellow" > <input type="text" name="m" size=4 maxlength=2> m�dia </span>" .<br>
                <b>Exemplo:</b> Para opera��es grandes insira o n�mero no campo"<span style="background-color:yellow" > <input type="text" name="m" size=4 maxlength=2> grande </span>" .<br>
                </font>
            </ul><b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>><b><font color="#990000"> Note:</font></b>
        <ul> Voc� pode combinar diversas condi��es de pesquisa. Por exemplo: Se voc� deseja listar todos os pacientes internados que foram operados pelo Cirurgi�o "Smith" 
            e que possui um terapia contendo a palavra que inicia com "lipo":<p>
                <b>Passo 1: </b>Insira "Smith" no campo"<span style="background-color:yellow" > Cirurgi�o: <input type="text" name="s" size=15 maxlength=4 value="Smith"> </span>".<br>
                <b>Passo 2: </b>Clique no bot�o r�dio "<span style="background-color:yellow" > <input type="radio" name="r" value="1" checked>paciente internado </span>".<br>
                <b>Passo 3: </b>Insira "lipo" no campo "<span style="background-color:yellow" > Terapia: <input type="text" name="s" size=20 maxlength=4 value="lipo"> </span>". <br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<p>

                <b>Note</b><br>
                Se a pesquisa encontrar um resultado �nico, o documento completo ser� exibido imediatamente.<br>
                Entretanto, se a pesquisa encontrar diversos resultados, uma lista ser� exibida.<p>
                Para abrir o documento para o paciente que voc� estiver procurando, clique no bot�o <img <?php echo createComIcon('../', 'r_arrowgrnsm.gif', '0') ?>> correspondente a este, ou
                o primeiro nome, ou o nome de fam�lia, ou a data, ou o n�mero op <nobr>(op nr)</nobr>.
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Note:</b></font> 
        <ul>       	
            Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
        </ul>
    <?php endif; ?>
    <?php if (($x1 == "search" || $x1 = 'paginate') && ($x2 > 0)) : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como selecionar um arquivo particular para exibir?</b>
        </font>
        <ul>       	
            <b>Nota: </b> Clique no nome de fam�lia do paciente, ou primeiro none, ou a data de op, ou o n�mero op para exibir o documento.<p> 
        </ul>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como organizar a lista?</b>
        </font>
        <ul>       	
            <b>Nota: </b> Clique no t�tulo da coluna onde voc� deseja que a lista seja organizada.<p> 
                Por exemplo: Se voc� deseja organizar a lista pela data de opera��o, clique no t�tulo "Data OP". <br>A seguir, um clique ir� inverter a ordem de organiza��o:<p>
            <blockquote>
                <img src='../help/en/img/en_or_search_sort.png'>
            </blockquote>
        </ul>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como continuar pesquisando nos arquivos?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <input type="button" value="Nova pesquisa de arquivo"> para voltar � pesquisa de arquivo nos campos de entrada.<p> 
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
        <ul>       	
            Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
        </ul>
    <?php endif; ?>
    <?php if (($x1 == "select" || $x1 = 'paginate') && ($x2 == 1)) : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como atualizar ou editar o docuemtno exibido?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <input type="button" value="Update data"> para trocar para o modo de edi��o.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como continuar pesquisando nos arquivos?</b>
        </font>
        <ul>       	
            <b>Metodo 1: </b>Clique no bot�o <input type="button" value="Nova pesquisa de arquivo"> para voltar � pesquisa de arquivos nos campos de entrada.<p> 
                <b>OU Metodo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'arch-blu.gif', '0', 'absmiddle') ?>> para voltar � pesquisa de arquivos nos campos de entrada.<p> 
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
        <ul>       	
            Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
        </ul>

    <?php endif; ?>
<?php endif; ?>

</Param>

