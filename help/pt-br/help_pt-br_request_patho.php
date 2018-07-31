<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Requisi��o de testes de laborat�rio patol�gico</b></font>
<p>
    <font size=2 face="verdana,arial" >

    <?php
    if (!$src) {
        ?>
        <a name="sday"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
        O r�tulo do paciente n�o est� anexado. O que devo fazer?</b></font>
    <ul> 
        <b>Passo 1: </b>Insira uma informa��o completa ou algumas letras da informa��o do paciente, como o primeiro nome, ou o nome da fam�lia, 
        ou o n�mero de registro.
        <p>Exemplo 1: insira "21000012" ou "12".
            <br>Exemplo 2: insira "Guerero" ou "gue".
        <br>Exemplo 3: insira "Alfredo" ou "Alf".<p>
            <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> para iniciar a pesquisa. <p>
            <b>Passo 3: </b> Se a pesquisa encontrar um resultado, selecione a pessoa correta na lista exibida clicando no seu bot�o 
            <img <?php echo createLDImgSrc('../', 'ok_small.gif', '0') ?>> .
    </ul>
    <?php
} else {
    ?>

    <a name="stime"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
    O que escrever no formul�rio de requisi��o?</b></font>
    <ul> 
        <b>Os campos compuls�rios para preencher ou marcar s�o:</b> 
        <ul> 
            <li>Tipo da esp�cie
            <li>Caixa de texto da descri��o da esp�cie 
            <li>Data de opera��o
            <li>M�dico ou cirurgi�o respons�vel pela requisi��o
        </ul>
    </ul>


    <a name="send"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
    Como enviar a requisi��o do teste?</b></font>
    <ul> 
        <b>Passo: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'abschic.gif', '0') ?>> .
    </ul>
    <?php
}
?>

