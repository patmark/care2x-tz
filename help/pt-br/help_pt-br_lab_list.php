<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b><?php echo "Laboratory - $x3" ?></b></font>
<form action="#" >
    <p><font size=2 face="verdana,arial" >

        <?php if ($src == "") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como mostrar os gr�ficos dos par�metros de teste?</b>
            </font>
        <ul>      
            <b>Passo 1: </b>Clique na caixa de sele��o <input type="checkbox" name="s" value="s" verififcado> correspondente ao par�metro escolhido para selecion�-lo.<br>
            <b>Passo 2: </b>Se voc� quiser mostrar v�rios par�metros de uma s� vez, clique nas caixas de sele��o correspondentes.<br>
            <b>Passo 3: </b>Clique no �cone <img <?php echo createComIcon('../', 'chart.gif', '0') ?>>  para a exibi��o do gr�fico.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Eu quero selecionar todos os par�metros. H� um modo r�pido de selecionar todos os par�metros de uma s� vez?</b>
        </font>
        <ul>      
            <b>Sim, h�!</b><br>
            <b>Passo 1: </b>Clique  no bot�o <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?> border=0> para selecionar todos os par�metros.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como desmarcar todos os par�metros?</b>
        </font>
        <ul>      
            <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?> border=0> novamente para DESMARCAR todos os par�metros.<br>
        </ul>
    <?php endif; ?>
    <?php if ($src == "graph") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Como voltar para os resultados dos testes sem os gr�ficos? </b></font>
        <ul> <b>Nota: </b>Se voc� quiser voltar, clique no bot�o <img <?php echo createLDImgSrc('../', 'back2.gif', '0', 'absmiddle') ?>>.</ul>
    <?php endif; ?>

    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Como fechar o laborat�rio <?php echo $x3 ?>? </b></font>
    <ul> <b>Nota: </b>Se voc� quiser fechar, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?> align="absmiddle">.</ul>


</form>

