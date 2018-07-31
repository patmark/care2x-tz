<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Como pesquisar nos arquivos de prontu�rio</b></font>
<form action="#" >
    <p><font size=2 face="verdana,arial" >

        <?php if ($src == "select") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero atualizar o documento de prontu�rio exibido</b></font>
        <ul> <b>Passo : </b>Clique no bot�o <input type="button" value="Atualizar dados"> para iniciar a edi��o do documento.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero iniciar uma nova pesquisa nos arquivos</b></font>
        <ul> <b>Passo : </b>Clique no bot�o <input type="button" value="Nova pesquisa em arquivo"> iniciar uma nova pesquisa.<br>
        </ul>
    <?php elseif (($src == "search") && ($x1)) : ?>
        <b>Note</b>
        <ul><?php if ($x1 == 1) : ?> Se a pesquisa retornar um resultado,  o documento completo ser� exibido imediatamente.<br>
                Entretanto, se a pesquisa retornar v�rios resultados, uma lista ser� mostrada.<br>
            <?php endif; ?>
            Para ver a informa��o para o paciente que voc� est� procurando, clique ou o bot�o <img <?php echo createComIcon('../', 'r_arrowgrnsm.gif', '0') ?>> correspondente a ele, ou
            o nome, ou o sobrenome ou a data de admiss�o.
        </ul>
        <b>Nota</b>
        <ul> Se voc� quiser iniciar uma nova pesquisa clique no bot�o <input type="button" value="Nova pesquisa em arquivo">.
        </ul>
    <?php else : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de prontu�rio de um certo departamento</b></font>
        <ul> <b>Passo 1: </b>Entre com o c�digo do departamento no campo  "Departamento:". <br>
            <b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu estou procurando por um certo documento de prontu�rio de um certo paciente</b></font>
        <ul> <b>Passo 1: </b>Entre com a palavra chave no campo correspondente. Pode ser uma palavra completa ou frase ou umas poucas letras de uma palavra de dados pessoais de um paciente. <br>
            <ul><font size=1 color="#000099" >
                <b>Os seguintes campos podem ser preenchidos com uma palavra chave:</b>
                <br> N�mero do paciente
                <br> Sobrenome
                <br> Nome
                <br> Data de nascimento
                <br> Endere�o
                </font>
            </ul><b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de prontu�rio com uma certa organiza��o de seguros</b></font>
        <ul> <b>Passo 1: </b>Entre com a sigla da organiza��o de seguros no campo "Seguro:". <br>
            <b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de prontu�rio com uma certa informa��o adicional de seguro</b></font>
        <ul> <b>Passo 1: </b>Entre a palavra chave no campo "Informa��o Extra:". <br>
            <b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de prontu�rio de pacientes MASCULINOS </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de radio "<span style="background-color:yellow" >Sexo <input type="radio" name="r" value="1">masculino</span>". <br>
            <b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de prontu�rio de pacientes FEMININAS </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de radio "<span style="background-color:yellow" ><input type="radio" name="r" value="1">feminina</span>". <br>
            <b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de prontu�rio de pacientes que receberam conselho m�dico obrigat�rio</b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de radio "<span style="background-color:yellow" >Conselho m�dico: <input type="radio" name="r" value="1">Sim</span>". <br>
            <b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de prontu�rio de pacientes que N�O receberam conselho m�dico obrigat�rio</b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de radio "<span style="background-color:yellow" ><input type="radio" name="r" value="1">N�o</span>". <br>
            <b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de prontu�rio com uma certa palavra chave</b></font>
        <ul> <b>Passo 1: </b>Entre a palavra chave no campo correspondente. Pode ser uma palavra completa ou frase ou umas poucas letras de uma palavra. <br>
            <ul><font size=1 color="#000099" >
                <b>Exemplo:</b> Para uma palavra chave de diagn�stico entre no campo "Diagn�stico" .<br>
                <b>Exemplo:</b> Para uma palavra chave de terapia entre no campo "Terapia sugerida" .<br>
                </font>
            </ul><b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de prontu�rio escritos em uma determinada data</b></font>
        <ul> <b>Passo 1: </b>Entre com a data do documento no campo "Documentado em:". <br>
            <ul><font size=1 color="#000099">
                <b>Dica:</b> Entre "T" ou "t" para gerar automaticamente a data de hoje.<br>
                <b>Dica:</b> Entre "Y" ou "y" para gerar automaticamente a data de ontem.<br>
                </font>
            </ul><b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os documentos de prontu�rio escritos por uma certa pessoa</b></font>
        <ul> <b>Passo 1: </b>Entre com o nome completo da pessoa ou suas primeiras letras no campo "Documentado por:". <br>
            <b>Passo 2: </b>Deixe todos os outros campos vazios ou em branco.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <b>Nota</b>
        <ul> Voc� pode combinar v�rias condi��es de pesquisa. Por exemplo: Se voc� quiser listar todos os pacientes MASCULINOS que foram operados em uma
            cirurgia pl�stica, que receberam o conselho m�dico obrigat�rio, e que tem na terapia uma palavra que inicie com "lipo":<p>
                <b>Passo 1: </b>Entre "plop" no campo "Departamento:". <br>
                <b>Passo 2: </b>Clique no bot�o de radio "<span style="background-color:yellow" >Sexo<input type="radio" name="r" value="1">masculino</span>".<br>
                <b>Passo 3: </b>Clique no bot�o de radio "<span style="background-color:yellow" >Conselho m�dico:<input type="radio" name="r" value="1">Sim</span>".<br>
                <b>Passo 4: </b>Entre "lipo" no campo "Terapia:". <br>
                <b>Passo 5: </b>Clique no bot�o <input type="button" value="Pesquise">  para iniciar a pesquisa.<br>
        </ul>
        <b>Nota</b>
        <ul> Se a pesquisa encontrar um resultado �nico, o documento completo ser� exibido imediatamente.<br>
            Entretanto, se a pesquisa retornar v�rios resultados, uma lista ser� mostrada.<br>
            Para abrir o documento do paciente que voc� est� procurando, clique ou no bot�o <img <?php echo createComIcon('../', 'r_arrowgrnsm.gif', '0') ?>> correspondente a ele, ou
            no nome, sobrenome ou data de admiss�o.
        </ul>

    <?php endif; ?>
    <b>Nota</b>
    <ul> Se voc� decidir cancelar a pesquisa clique no bot�o <input type="button" value="Fechar">.
    </ul>
</form>

