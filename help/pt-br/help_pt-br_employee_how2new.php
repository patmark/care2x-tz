<font face="Verdana, Arial" size=3 color="#0000cc"><b>Gerencia de pessoal</b></font><p>
    <?php
    if (!$src && !$x1) {
        ?>
        <font size=2 face="verdana,arial" >
        <b>Como empregar uma pessoa</b></font>
    <p><font size=2 face="verana,arial" >
    <form action="#" >
        <b>Passo 1</b>

        <ul> 
            <font color=#ff0000>Verifique primeiro se os dados b�sicos da pessoa j� existem</font>.<p>
                Entre  ou com uma informa��o completa ou umas poucas letras da informa��o, como s� o nome por exemplo, ou sobrenome, 
                ou o PID (identificador de pessoa).
            <p>Exemplo 1: entre "21000012" ou "12".
                <br>Exemplo 2: entre "Guerero" ou "gue".
                <br>Exemplo 3: entre "Alfredo" ou "Alf".

        </ul>

        <b>Passo 2</b>
        <ul> Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> para iniciar a pesquisa. 
        </ul>

        <b>Passo 3</b>
        <ul> Se a pesquisa n�o encontrar resultado, voc� deve primeiro registrar a pessoa. Clique no bot�o  <img <?php echo createLDImgSrc('../', 'register_gray.gif', '0') ?>>  e siga as instru��es para o registro de uma pessoa.
        </ul>
        <b>Passo 4</b>
        <ul> Se a pesquisa encontrar resultado, selecione a pessoa certa da lista mostrada, clicando no bot�o  <img <?php echo createLDImgSrc('../', 'ok_small.gif', '0') ?>> ao lado dela.
        </ul>
        <b>Passo 5</b>
        <ul> Uma vez que o formul�rio de emprego esteja mostrado, entre com todos os dados relevantes de emprego.<p>
                <img <?php echo createComIcon('../', 'warn.gif', '0') ?>> Nota: Se a pessoa estiver empregada neste momento, seus dados de emprego ser�o mostrados.
        </ul>
        <b>Passo 6</b>
        <ul> 
            Clique no bot�o  <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para
            salvar a informa��o de emprego.<p>

        </ul>


        <b>Nota</b>

        <ul> Se estiver faltando uma informa��o, as entradas ser�o mostradas novamente e uma mensagem aparecer� solicitando que voc�
            entre com a informa��o no campo ou campos marcados em vermelho. Ap�s, clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para
            salvar a informa��o completa.<p>
        </ul>

        <b>Nota</b>
        <ul> Se voc� decidir cancelar a admiss�o clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.

        </ul>
    </form>
    <?php
} else {
    ?>

    <font size=2 face="verdana,arial" >
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
    <?php
    if ($src) {
        ?>
        <font color="#990000"><b>Como atualizar os dados de emprego?</b></font>
        <ul> 
            <b>Passo 1:</b> Entre com os novos dados nos campos apropriados.<p>
                <b>Passo 2:</b> Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar os dados de emprego atualizados.<p>
                <img <?php echo createComIcon('../', 'warn.gif', '0') ?>> Nota: Se voc� quiser cancelar a atualiza��o, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>> .
        </ul>
        <?php
    } else {
        ?>
        <font color="#990000"><b>Comoempregar a pessoa?</b></font>
        <ul> 
            <b>Passo 1:</b> Entre com os dados de emprego nos campos apropriados .<p>
                <b>Passo 2:</b> Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>>  para salvar os dados de emprego.<p>
                <img <?php echo createComIcon('../', 'warn.gif', '0') ?>> Nota: Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>> .
        </ul>
        <?php
    }
}
?>
