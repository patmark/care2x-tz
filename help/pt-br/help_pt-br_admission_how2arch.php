<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Como pesquisar nos arquivos</b></font>
<form action="#" >
    <p><font size=2 face="verdana,arial" >

        <?php if ($src == "select") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero atualizar o dado mostrado</b></font>
        <ul> <b>Step : </b>Clique no bot�o <input type="button" value="Atualizar dados"> para iniciar a edi��o dos dados.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero iniciar uma nova pesquisa nos arquivos</b></font>
        <ul> <b>Passo : </b>Clique no bot�o <input type="button" value="Nova pesquisa em arquivo"> para iniciar uma nova pesquisa.<br>
        </ul>
    <?php elseif ($src == "search") : ?>
        <b>Nota</b>
        <ul> Se a pesquisa encontrar um �nico resultado,a informa��o completa ser� mostrada imediatamente.<br>
            Se a pesquisa entretanto encontrar v�rios resultados,uma lista ser� mostrada.<br>
            Para ver a informa��o do paciente que voc� est� procurando, clique no bot�o <img <?php echo createComIcon('../', 'r_arrowgrnsm.gif', '0') ?>> correspondente a ele, ou
            o nome, ou o sobrenome ou a data de admiss�o.
        </ul>
        <b>Nota</b>
        <ul> Se voc� quiser iniciar uma nova pesquisa clique no bot�o <input type="button" value="Nova pesquisa em arquivo">.
        </ul>
    <?php else : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes admitidos hoje</b></font>
        <ul> <b>Passo 1: </b>Entre com a data de hoje no campo "Data de admiss�o: desde:". <br>
            <ul><font size=1 color="#000099">
                <b>Dica:</b> Entre "T" ou "t" para automaticamente gerar a data de hoje.<br>
                </font>
            </ul><b>Passo 2: </b>Deixe o campo "at�:" vazio.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes admitidos entre as datas inclusive</b></font>
        <ul> <b>Passo 1: </b>Entre com a data inicial no campo "Data de admiss�o: desde:". <br>
            <ul><font size=1 color="#000099">
                <b>Dica:</b> Entre "T" ou "t" para automaticamente gerar a data de hoje.<br>
                <b>Dica:</b> Entre "Y" ou "y" para automaticamente gerar a data de ontem.<br>
                </font>
            </ul><b>Passo 2: </b>Entre com a data final no campo "at�:".<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes MASCULINOS admitidos </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de r�dio "Sexo <input type="radio" name="r" value="1">masculino". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes FEMININOS admitidos </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de radio "<input type="radio" name="r" value="1">feminino". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes ambulantes admitidos </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de radio "<input type="radio" name="r" value="1">Ambulante". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes estacion�rios admitidos</b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de radio "<input type="radio" name="r" value="1">Estacion�rio. <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes particulares </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de radio "<input type="radio" name="r" value="1">Particulares". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes com plano/seguro particular </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de radio "<input type="radio" name="r" value="1">Particular". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes com plano/seguro geral </b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o de radio "<input type="radio" name="r" value="1">Seguro". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes que tem plano de sa�de de uma determinada organiza��o</b></font>
        <ul> <b>Passo 1: </b>Entre com a sigla da institui��o de seguro/plano m�dico no campo "Seguro". <br>
            <b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero listar todos os pacientes com uma certa palavra chave</b></font>
        <ul> <b>Passo 1: </b>Entre com a palavra chave no campo correspondente. Pode ser uma palavra completa ou frase ou umas poucas letras de uma palavra. <br>
            <ul><font size=1 color="#000099" >
                <b>Exemplo:</b> Para a palavra chave diagn�stico entre no campo "Diagn�stico" .<br>
                <b>Exemplo:</b> Para a palavra chave recomendante entre no campo "Recomendado por" .<br>
                <b>Exemplo:</b> Para a palavra chave terap�utica entre no campo "Terapia sugerida" .<br>
                <b>Exemplo:</b> Para palavra chave observa��es especiais entre no campo "Observa��es especiais" .<br>
                </font>
            </ul><b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu estou procurando um certo paciente com uma certa palavra chave</b></font>
        <ul> <b>Passo 1: </b>Entre a palavra chave no campo correspondente. Pode ser uma palavra completa ou frase ou umas poucas letras de uma palavra. <br>
            <ul><font size=1 color="#000099" >
                <b>Os seguintes campos podem ser preenchidos com uma palavra chave:</b>
                <br> N�mero do paciente
                <br> Sobrenome
                <br> Nome
                <br> Data de nascimento
                <br> Endere�o
                </font>
            </ul><b>Passo 2: </b>Deixe todos os outros campos em branco ou vazios.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <b>Nota</b>
        <ul>  Voc� pode combinar diversas condi��es de pesquisa. Por exemplo: Se voc� quiser listar todos os pacientes MASCULINOS
            admitidos entre 10.12.1999 and 24.01.2001 inclusive:<p>
                <b>Passo 1: </b>Entre "10.12.1999" no campo "Data de admiss�o: desde:". <br>
                <b>Passo 2: </b>Entre "24.01.2001 no campo "at�:".<br>
                <b>Passo 3: </b>Clique no bot�o de radio "Sex <input type="radio" name="r" value="1">masculino". <br>
                <b>Passo 4: </b>Clique no bot�o <input type="button" value="PESQUISA">  para iniciar a pesquisa.<br>
        </ul>
        <b>Nota</b>
        <ul>  Se a pesquisa encontrar um �nico resultado, a informa��o completa ser� mostrada imediatamente.<br>
            Se a pesquisa entretanto encontrar v�rios resultados, uma lista ser� mostrada.<br>
            Para ver a informa��o do paciente que voc� est� procurando, clique no bot�o <img <?php echo createComIcon('../', 'r_arrowgrnsm.gif', '0') ?>> correspondente a ele, ou
            o nome, ou o sobrenome ou a data de admiss�o.
        </ul>

    <?php endif; ?>
    <b>Nota</b>
    <ul> Se voc� decidir cancelar a pesquisa clique no bot�o <input type="button" value="Cancelar">.
    </ul>
</form>

