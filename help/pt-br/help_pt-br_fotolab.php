<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    Laborat�rio fotogr�fico - 
    <?php
    switch ($src) {
        case "init": print "Inicializando";
            break;
        case "input": print "Selecionando fotos para o upload";
            break;
        case "maindata": print "Dados do paciente";
            break;
        case "save": print "Fotos arquivadas";
            break;
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >
    <?php if ($src == "input") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Os campos de entrada s�o mostrados. Como selecionar os arquivos de imagem?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <input type="button" value="Procurando..."> para encontrar o arquivo ou as fotos que voc� quer armazenar.<br>
            <b>Passo 2: </b>Uma janela "Selecione arquivo" aparecer�. Selecione o arquivo que voc� quer e clique "Abrir".<br>
            <b>Passo 3: </b>Se o arquivo que voc� selecionou � um arquivo em formato gr�fico v�lido, uma amostra da foto aparecer� no conto superior direito do quadro (somente no navegador MSIE). De outra forma, repita os passos 1 e 2.<br>
            <b>Passo 4: </b>Entre com a data em que a foto foi tomada, no campo "<span style="background-color:yellow" > Data da foto </span>" .<p>


                <b>Passo 5: </b>Entre com o n�mero da foto no campo "<span style="background-color:yellow" > N�mero </span>" .<p>


        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como ver uma amostra da foto?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b> Clique no bot�o correpondente da foto <img <?php echo createComIcon('../', 'lilcamera.gif', '0') ?>> .<br>
        </ul>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como mudar o n�mero de imagens para fazer o upload?</b>
        </font>
        <ul>       	
            <b>Passo 1:</b> Entre com o n�mero no campo "Eu quero fazer um upload <input type="text" name="v" size=4 maxlength=4> imagem(ns) " .<p>
                <b>Passo 2:</b> Clique "OK" <p>
        </ul>

<?php endif; ?>	

<?php if ($src == "maindata") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como encontrar os dados de um paciente?</b>
        </font>
        <ul>	
            <b>Passo 1: </b>Entre com o n�mero do paciente ou n�mero do caso no campo "<span style="background-color:yellow" > N�mero do paciente </span>" .<br>
            <b>Passo 2: </b>Clique no bot�o <input type="button" value="Pesquise"> para encontrar o paciente.<br>
            <b>Passo 3: </b>Quando o paciente for encontrado, seus dados b�sicos aparecer�o nos campos correspondentes.<br>
            <b>Passo 4: </b>Se todas ou a maioria das fotos foram tomadas na mesma data, entre com a data no campo <nobr>"<span style="background-color:yellow" > Data da foto </span>"</nobr> .<br>
            <b>Passo 5: </b>Clique no bot�o <img <?php echo createComIcon('../', 'preset-add.gif', '0') ?>> para marcar esta data em todas as fotos. Esta data aparecer�
            automaticamente nos campos "Data da foto" no quadro � esquerda.<p>
                <img <?php echo createComIcon('../', 'warn.gif', '0') ?>><b> Nota! </b>Se uma ou algumas fotos devem ter uma data diferente, entre com esta data no campo "Data de foto" da foto correspondente. Voc� somente pode fazer isto ap�s ter concluido o passo 5.<p>
        </ul>

<?php endif; ?>	
<?php if ($src == "save") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Eu quero armazenar fotos adicionais do mesmo paciente. Como fazer?</b>
        </font>
        <ul>	
            <b>Passo 1: </b>Entre com o n�mero de fotos que voc� quer armazenar no campo <nobr>" <input type="text" name="g" size=3 maxlength=2> Fotos adicionais do <span style="background-color:yellow" > mesmo paciente. </span>"</nobr> .<br>
            <b>Passo 2: </b>Clique no bot�o <input type="button" value="OK">.<br>
        </ul>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Eu quero armazenar fotos de outro paciente. Como fazer?</b>
        </font>
        <ul>	
            <b>Passo 1: </b>Entre com o n�mero de fotos que voc� quer armazenar no campo <nobr>" <input type="text" name="g" size=3 maxlength=2> Fotos de <span style="background-color:yellow" > outro paciente. </span>"</nobr> .<br>
            <b>Passo 2: </b>Clique no bot�o <input type="button" value="OK">.<br>
        </ul>

<?php endif; ?>	



</form>

