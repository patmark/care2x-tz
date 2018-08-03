<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Como pesquisar um documento de prontu�rio </b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >
    <?php if (($src == "?") || ($x1 == "0")) : ?>
        <b>Passo 1</b>

        <ul> Entre no campo "<span style="background-color:yellow" >Documento de prontu�rio de:</span>" com uma informa��o completa ou umas poucas letras de informa��o de um paciente,como exemplo o n�mero do paciente, ou nome, ou sobrenome.
            <p>Exemplo 1: entre "21000012" ou "12".
                <br>Exemplo 2: entre "Guerero" ou "gue".
                <br>Exemplo 3: entre "Alfredo" ou "Alf".

        </ul>
        <b>Passo 2</b>
        <ul> Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>>  para iniciar a pesquisa.<p>
        </ul>
        <b>Passo 3</b>
        <ul> Se a pesquisa encontrar um resultado �nico, o documento de prontu�rio completo ser� exibido imediatamente.
            Entretanto, se a pesquisa retornar v�rios resultados, uma lista ser� mostrada.<p>
                Para ver o documento de prontu�rio do paciente que voc� est� procurando, clique no bot�o <img <?php echo createComIcon('../', 'r_arrowgrnsm.gif', '0') ?>> correspondente a ele, ou
                no sobrenome, ou no n�mero do documento, ou hor�rio.
        </ul>
    <?php endif; ?>
    <?php if ($x1 > 1) : ?>
        Para ver o documento de prontu�rio do paciente que voc� est� procurando, clique no bot�o <img <?php echo createComIcon('../', 'r_arrowgrnsm.gif', '0') ?>> correspondente a ele, ou
        no sobrenome, ou no n�mero do documento, ou hor�rio.<p>
        <?php endif; ?>
        <?php if (($src != "?") && ($x1 == "1")) : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero atualizar o documento</b></font>
        <ul> Se voc� quiser atualizar o documento exibido, clique no bot�o <input type="button" value="Atualizar dados">.
        </ul>
    <?php endif; ?>
    <b>Note</b>
    <ul> Se voc� decidir cancelar a pesquisa clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
    </ul>


</form>

