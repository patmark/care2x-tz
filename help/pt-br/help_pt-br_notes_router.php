<font face="Verdana, Arial" size=3 color="#0000cc">
<b><?php echo $x1 ?></b></font>

<p><font size=2 face="verdana,arial" >

    <?php
    if ($x2 == 'show' || $src == 'sickness') {
        if ($x3) {
            
        } else {

            if ($src == 'sickness') {
                ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
                <font color="#990000"><b>How to change the department?</b></font>
            <ul> 
                <b>Passo 1: </b> Selecione o departamento da caixa seletora com o nome de " <img <?php echo createComIcon('../', 'bul_arrowgrnlrg.gif', '0') ?>> Crie um formul�rio para".<p>
                    <b>Passo 2: </b> Clique "OK".<p>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b>Como salvar a confirma��o?</b></font>
            <ul> 
                <b>Passo: </b> Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> .<p>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b>Como imprimir a confirma��o?</b></font>
            <ul> 
                <b>Passo: </b> Clique no bot�o <img <?php echo createLDImgSrc('../', 'printout.gif', '0') ?>> .<p>
            </ul>

            <?php
        } elseif ($src == 'diagnostics') {
            ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b>N�o h� dados dispon�veis ainda. Como entrar com dados novos?</b></font>
            <ul> 
                <b>Nota: </b> Novos resultados de diagn�sticos ou relat�rios somente podem ser entrados via os m�dulos apropriados de laborat�rio ou diagn�stico. O m�dulo de admiss�o tem o modo de  "somente leitura" .<p>
            </ul>
            <?php
        } elseif ($src == 'notes') {
            ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b>N�o h� dados dispon�veis ainda. Como entrar com dados novos?</b></font>
            <ul> 
                <b>Passo: </b> Clique no link " <img <?php echo createComIcon('../', 'bul_arrowgrnlrg.gif', '0') ?>> <font color=#0000ff><b>Entre novo registro</b></font>" .<p>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b>Como exibir de volta o menu de op��es?</b></font>
            <ul> 
                <b>Passo: </b> Clique no link " <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> <font color=#0000ff><b>Voltar para op��es</b></font>" .<p>
            </ul>

            <?php
        } else {
            ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b>N�o h� dados dispon�veis ainda. Como entrar com dados novos?</b></font>
            <ul> 
                <b>Passo: </b> Clique no link " <img <?php echo createComIcon('../', 'bul_arrowgrnlrg.gif', '0') ?>> <font color=#0000ff>Entre novo registro</font>" .<p>
            </ul>

            <?php
        }
    }
} else {
    ?>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
    <font color="#990000"><b>Como criar o registro?</b></font>

    <ul> 
        <b>Passo: </b> Entre a  informa��o, ent�o clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> .
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
    <font color="#990000"><b>Como entrar com a data?</b></font>
    <ul> 
        <b>Passo 1: </b> Clique no �cone <img <?php echo createComIcon('../', 'show-calendar.gif', '0') ?>>  e um mini-calend�rio aparecer�.<p>
        <img src="../help/en/img/en_date_select.png"><p>
            <b>Passo 2: </b> Clique a data no mini-calend�rio.<p>
        <img src="../help/en/img/en_mini_calendar.png"><p>
            <b>OR: </b> Para entrar a data de "hoje" , digite "t" ou "T" no campo de entrada de data. A data de hoje ser� inserida automaticamente no formato local.<p>
            <b>OR: </b> Para entrar a data de "ontem" , digite "y" ou "Y" no campo de entrada de data. A data de ontem ser� inserida automaticamente no formato local.<p>

    </ul>
    <?php
}
?>
