<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Requisi��o de teste do laboratorio bacteriol�gico </b></font>
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



    <a name="sel"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
    Como selecionar um par�metro de teste?</b></font>
    <ul> 
        <b>Step: </b>Clique no pequeno ret�ngulo rosa ao lado do par�metro para "escurec�-lo".<p>
            <img src="../help/en/img/en_request_baclabor.png" border=0 width=325 height=134>
    </ul>

    <a name="usel"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
    Como n�o selecionar um par�metro de teste?</b></font>
    <ul> 
        <b>Passo: </b>Clique novamente no pequeno ret�ngulo "escurecido" abaixo do par�mentro para voltar � cor anterior.<br>
    </ul>


    <a name="send"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
    Como enviar a requisi��o de teste?</b></font>
    <ul> 
        <b>Passo: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'abschic.gif', '0') ?>> .
    </ul>

    <?php
}
?>
