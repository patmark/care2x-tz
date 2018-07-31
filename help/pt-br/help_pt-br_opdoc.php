<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    Documenta��o de OR - 
    <?php
    if ($src == "create") {
        switch ($x1) {
            case "dummy": print "Criar um novo documento";
                break;
            case "saveok": print " - O documento foi salvo";
                break;
            case "update": print "Atualiza o documento atual";
                break;
            case "search": print "Pesquise um paciente";
                break;
            case "paginate": print "Lista de resultados da pesquisa";
                break;
        }
    }
    if ($src == "search") {
        switch ($x1) {
            case "dummy": print "Pesquisa por um documento";
                break;
            case "": print "Pesquisa por um documento";
                break;
            case "paginate": print "Lista de resultados da pesquisa";
                break;
            case "match": print "Lista de resultados da pesquisa";
                break;
            case "select": print "Documento atual";
        }
    }
    if ($src == "arch") {
        switch ($x1) {
            case "dummy": print "Arquivo";
                break;
            case "": print "Arquivo";
                break;
            case "?": print "Arquivo";
                break;
            case "search": print "Lista dos resultados da pesquisa de arquivo";
                break;
            case "select": print "Documento atual";
        }
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >
    <?php
    if ($src == "create") {

        if ($x1 == 'search' || $x1 == 'paginate') {
            ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como selecionar um paciente a um documento?</b>
            </font>
            <ul>       	
                <b>Nota: </b> Clique no sobrenome do paciente ou no bot�o <img <?php echo createLDImgSrc('../', 'ok_small.gif', '0') ?>>.<p> 
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como iniciar uma nova pesquisa de paciente?</b>
            </font>
            <ul>       	
                <b>Nota: </b> Clique no tab <img <?php echo createLDImgSrc('../', 'document-blue.gif', '0') ?>> .<p> 
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como mudar o departamento?</b>
            </font>
            <ul>       	
                <b>Nota: </b> Clique no link "Mude o departamento" na parte inferior esquerda da p�gina.<p> 
            </ul>
        <?php
    }

    if ($x1 == "saveok") {
        ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como atualizar ou editar o documento atual?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Atualizar dados"> para ir ao modo de edi��o.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como iniciar um novo documento?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Iniciar um novo documento">.<br>
            </ul>
            <b>Nota</b>
            <ul> Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
            </ul>

    <?php } ?>

    <?php if ($x1 == "update") { ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como atualizar ou editar o documento atual?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Quando o documento atual estiver em modo de edi��o, voc� pode editar os dados.<br> 
                <b>Passo 2: </b>Para salvar o documento, clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> .<br> 
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Que dados s�o obrigat�rios para o preenchimento?</b>
            </font>
            <ul>       	
                <b>Nota: </b>Todos os campos vermelhos s�o obrigat�rios.<br> 
            </ul>

            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
            <ul>       	
                Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
            </ul>
    <?php } ?>
    <?php if ($x1 == "dummy") { ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como criar um novo documento?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Encontre o paciente primeiro. Entre no campo de pesquisa de entrada
                ou com a informa��o completa ou algumas letras da informa��o do paciente como sobrenome ou nome.<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> para iniciar a pesquisa por paciente.<p> 
                <ul>       	
                    <b>Nota: </b>Se a pesquisa encontrar um resultado, a informa��o b�sica do paciente ser� imediatamente colocada nos campos correspondentes.<p> 
                        <b>Nota: </b>Se a pesquisa encontrar v�rios resultados, uma lista ser� exibida. Clique no sobrenome do paciente para selecion�-la para documenta��o.<p> 
                </ul>
                <b>Passo 3: </b>Quando a informa��o b�sica do paciente � exibida, voc� pode entrar com informa��o adicional relevante a 
                opera��o nos seus campos correspondentes.<br> 
                <b>Passo 4: </b>Para salvar o documento, clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> .<br> 
            </ul>
    <?php } ?>
<?php } ?>



<?php if ($src == "search") : ?>
        <?php if (($x1 == "dummy") || ($x1 == "")) : ?>


            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como pesquisar por um documento de um paciente em particular?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Entre no campo "<span style="background-color:yellow" > Palavra chave de pesquisa: por exemplo, nome ou sobrenome <input type="text" name="m" size=20 maxlength=20> </span>" ou
                uma informa��o completa ou as primeiras poucas letras do sobrenome ou nome. <br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> para iniciar a pesquisa para o documento do paciente.<p> 
                <ul>       	
                <!--  	<b>Nota: </b>Se a pesquisa encontrar um resultado, o documento do paciente ser� imediatamente exibido.<p> 
                    --> 	<b>Nota: </b>Se a pesquisa encontrar v�rios resultados,  uma lista ser� exibida. Clique no sobrenome do paciente, ou na data da OP, ou no n�mero da OP para selecion�-lo para documenta��o.<p> 
                </ul>
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
            <ul>       	
                Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
            </ul>
    <?php endif; ?>
    <?php if (($x1 == "match" || $x1 == 'paginate') && ($x2 > 0)) : ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como selecionar um documento em particular para exibi��o?</b>
            </font>
            <ul>       	
                <b>Nota: </b> Clique no sobrenome do paciente, ou data da OP, ou o n�mero da OP para exibir seu documento.<p> 
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como ordenar a lista?</b>
            </font>
            <ul>       	
                <b>Nota: </b> Clique no t�tulo da coluna por onde voc� quer ordenar a lista.<p> 
                    Por exemplo: Voc� quer ordenar a lista por sua data de opera��o:<p>
                <blockquote>
                    <img src='../help/en/img/en_or_search_sort.png'>
                </blockquote>
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como continuar pesquisando?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Entre no campo "<span style="background-color:yellow" > Palavra chave de pesquisa: por exemplo, nome ou sobrenome <input type="text" name="m" size=20 maxlength=20> </span>" ou com
                uma informa��o completa ou as primeiras poucas letras do sobrenome ou nome. <br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> para iniciar a pesquisa para o documento do paciente.<p> 
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
            <ul>       	
                Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
            </ul>
    <?php endif; ?>
    <?php if (($x1 == "select") && ($x2 == 1)) : ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como atualizar ou editar o documento atual?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'update_data.gif', '0') ?>> para ir ao modo de edi��o.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como continuar pesquisando?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Entre no campo "<span style="background-color:yellow" > Palavra chave de pesquisa: por exemplo, nome ou sobrenome <input type="text" name="m" size=20 maxlength=20> </span>" ou com
                uma informa��o completa ou as primeiras poucas letras do sobrenome ou nome. <br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> para iniciar a pesquisa para o documento do paciente.<p> 
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
            <ul>       	
                Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
            </ul>

    <?php endif; ?>
<?php endif; ?>

<?php if ($src == "arch") : ?>
    <?php if (($x1 == "dummy") || ($x1 == "?") || ($x1 == "")) : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de opera��es efetuadas numa determinada data</b></font>
            <ul> <b>Passo 1: </b>Entre com a data de opera��o no campo "<span style="background-color:yellow" > Data da opera��o: </span>". <br>
                <ul><font size=1 color="#000099">
                    <!-- <b>Dica:</b> Entre "T" ou "t" para gerar automaticamente a data de hoje.<br>
                    <b>Dica:</b> Entre "Y" ou "y" para gerar automaticamente a data de ontem.<br> -->
                    </font>
                </ul><b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos OR de um certo paciente</b></font>
            <ul> <b>Passo 1: </b>Entre a palavra chave no campo correspondente. Pode ser uma palavra completa ou frase ou umas poucas letras de uma palavra de dados pessoais de um paciente. <br>
                <ul><font size=1 color="#000099" >
                    <b>Os seguintes campos podem ser preenchidos com uma palavra chave:</b>
                    <br> N�mero do paciente
                    <br> Sobrenome
                    <br> Nome
                    <br> Data de nascimento
                    </font>
                </ul><b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos OR feitos por um certo cirurgi�o.</b></font>
            <ul> <b>Passo 1: </b>Entre com o nome do cirurgi�o no campo "<span style="background-color:yellow" > Cirurgi�o: </span>". <br>
                <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos OR dos pacientes externos </b></font>
            <ul> <b>Passo 1: </b>Clique no bot�o de radio "<span style="background-color:yellow" >Pacientes externos <input type="radio" name="r" value="1"></span>". <br>
                <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos OR de pacientes internos. </b></font>
            <ul> <b>Passo 1: </b>Clique no bot�o de radio "<span style="background-color:yellow" ><input type="radio" name="r" value="1">Paciente interno</span>". <br>
                <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos OR de pacientes com seguro geral. </b></font>
            <ul> <b>Passo 1: </b>Clique no bot�o de radio "<span style="background-color:yellow" ><input type="radio" name="r" value="1">Seguro</span>". <br>
                <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos OR de pacientes com seguro privado </b></font>
            <ul> <b>Passo 1: </b>Clique no bot�o de radio "<span style="background-color:yellow" ><input type="radio" name="r" value="1">Privado</span>". <br>
                <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos OR de pacientes particulares </b></font>
            <ul> <b>Passo 1: </b>Clique no bot�o de radio "<span style="background-color:yellow" ><input type="radio" name="r" value="1">Particular</span>". <br>
                <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos OR com uma certa palavra chave</b></font>
            <ul> <b>Passo 1: </b>Entre a palavra chave no campo correspondente. Pode ser uma palavra completa ou frase ou umas poucas letras de uma palavra. <br>
                <ul><font size=2 color="#000099" >
                    <b>Exemplo:</b> Para uma palavra chave de diagn�stico entre com ela no campo "Diagn�stico" .<br>
                    <b>Exemplo:</b> Para uma palavra chave de localiza��o entre com ela no campo "Localiza��o" .<br>
                    <b>Exemplo:</b> Para uma palavra chave de terap�utica entre com ela no campo "Terapia" .<br>
                    <b>Exemplo:</b> Para uma palavra chave de Observa��o especial entre com ela no campo "Observa��o especial" .<br>
                    </font>
                </ul><b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos com uma certa classifica��o de opera��o</b></font>
            <ul> <b>Passo 1: </b>Entre a palavra chave no campo correspondente. Pode ser uma palavra completa ou frase ou umas poucas letras de uma palavra. <br>
                <ul><font size=2 color="#000099" >
                    <b>Exemplo:</b> Para opera��es pequenas entre o n�mero no campo "<span style="background-color:yellow" > <input type="text" name="m" size=4 maxlength=2> pequenas </span>" .<br>
                    <b>Exemplo:</b> FPara opera��es m�dias entre o n�mero no campo "<span style="background-color:yellow" > <input type="text" name="m" size=4 maxlength=2> m�dias </span>" .<br>
                    <b>Exemplo:</b> Para opera��es grandes entre o n�mero no campo "<span style="background-color:yellow" > <input type="text" name="m" size=4 maxlength=2> grandes </span>" .<br>
                    </font>
                </ul><b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<br>
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>><b><font color="#990000"> Nota:</font></b>
            <ul> Voc� pode combinar v�rias condi��es de pesquisa. Por exemplo: Se voc� quiser listar todos os pacientes internos que foram operados pelo cirurgi�o "Smith" 
                e que tem na terapia uma palavra come�ando com "lipo":<p>
                    <b>Passo 1: </b>Entre "Smith" no campo "<span style="background-color:yellow" > Cirurgi�o: <input type="text" name="s" size=15 maxlength=4 value="Smith"> </span>".<br>
                    <b>Passo 2: </b>Clique no bot�o de radio "<span style="background-color:yellow" > <input type="radio" name="r" value="1" verificado>Pcientes internos </span>".<br>
                    <b>Passo 3: </b>Entre "lipo" no campo "<span style="background-color:yellow" > Terapia: <input type="text" name="s" size=20 maxlength=4 value="lipo"> </span>". <br>
                    <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<p>

                    <b>Nota</b><br>
                    Se a pesquisa encontrar um resultado �nico, o documento completo ser� exibido imediatamente.<br>
                    Entretanto, se a pesquisa retornar v�rios resultados, uma lista ser� mostrada.<p>
                    Para abrir o documento do paciente que voc� est� procurando, clique ou no bot�o <img <?php echo createComIcon('../', 'r_arrowgrnsm.gif', '0') ?>> correspondente a ele, ou
                    no nome, sobrenome ou a data ou n�mero da opera��o <nobr>(no.op)</nobr>.
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
            <ul>       	
                Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
            </ul>
    <?php endif; ?>
    <?php if (($x1 == "search") && ($x2 > 1)) : ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como selecionar um documento particular arquivado para exibi��o?</b>
            </font>
            <ul>       	
                <b>Nota: </b> Clique no sobrenome do paciente, ou data da op, ou o n�mero da OP para exibir seu documento arquivado.<p> 
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como continuar pesquisando arquivos?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Nova pesquisa em arquivo"> para voltar aos campos de entrada de pesquisa de arquivo.<p> 
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
            <ul>       	
                Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
            </ul>
    <?php endif; ?>
    <?php if (($x1 == "select") && ($x2 == 1)) : ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como atualizar ou editar o documento arquivado em exibi��o?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Atualizar dados"> para ir ao modo de edi��o.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como continuar pesquisando nos arquivos?</b>
            </font>
            <ul>       	
                <b>M�todo 1: </b>Clique no bot�o <input type="button" value="Nova pesquisa em arquivo"> para voltar aos campos de entrada de pesquisa de arquivo.<p> 
                    <b>M�todo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'arch-blu.gif', '0', 'absmiddle') ?>> para voltar aos campos de entrada de pesquisa de arquivo.<p> 
            </ul>
            <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Nota:</b></font> 
            <ul>       	
                Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
            </ul>

    <?php endif; ?>
<?php endif; ?>

</form>

