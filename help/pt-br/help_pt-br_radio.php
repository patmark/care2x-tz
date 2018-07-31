<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    Radiologia Raio X - 
    <?php
    if ($src == "search") {
        print "Pesquisar um paciente";
    }
    ?>
</b>
</font>
<p><font size=2 face="verana,arial" >
<form action="#" >

<?php if ($src == "search") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como pesquisar um paciente?</b>
        </font>

        <ul>       	
            <b>Passo 1: </b>Insira uma informa��o completa ou os primeiros d�gitos do n�menro do paciente, ou nome de fam�lia, 
            ou primeiro nome no campo correspondente. <br>
            <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> para iniciar a pesquisa pelo paciente.<p> 
            <ul>       	
                <b>Nota: </b>Se a pesquisa encotrar um resultado, uma lista ser� exibida. <p>
            </ul>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como fazer uma visualiza��o pr�via do filme do Raio X do paciente e seu diagn�stico?</b>
        </font>

        <ul>       	
            <b>Passo 1: </b>Clique no link ou no bot�o r�dio "<span style="background-color:yellow" > <font color="#0000cc">Visualizar/Diagn�stico</font> <input type="radio" name="d" value="a"> </span>".<br>
            A miniatura do filme do Raio X ir� ser exibido no quadro esquerdo abaixo.<br> 
            O diagn�stico do filme do Raio X ser� exibido no quadro direito abaixo.<br> 
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como exibir o filme de Raio X do paciente em tela inteira?</b>
        </font>
        <ul>       	
            <b>Step 1: </b>Clique no bot�o  <img <?php echo createComIcon('../', 'torso.gif', '0') ?>> correspondente ao paciente para escolher entre tela inteira ou n�o.<br>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Note:</b></font> 
        <ul>       	
            Se voc� decidir fechar clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
        </ul>
<?php endif; ?>


</form>

