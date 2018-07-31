<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<a name="howto">
    <font face="Verdana, Arial" size=3 color="#0000cc">
    <b><?php if ($x1 == "docs") print "Ordens m�dicas";
else print "Relat�rio de enfermagem"; ?></b></font>
    <form action="#" >
        <p><font size=2 face="verdana,arial" >

<?php if ($src == "") : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                    Como entrar com <?php if ($x1 == "docs") print "Ordens m�dicas";
    else print "Relat�rio de enfermagem"; ?>?</b></font>
            <ul> 
                <b>Passo 1: </b>Entre com a data no campo "<span style="background-color:yellow" > Data: <input Type="text" name="d" size=10 maxlength=10 value="10.10.2002"> </span>" na coluna "<?php if ($x1 == "docs") print "Ordens m�dicas";
    else print "Relat�rio de enfermagem"; ?>" .<br>
                <font color="#000099" size=1><b>Dicas:</b>
                <ul Type=disc>
                    <li>Para entrar com a data atual, digite "t" ou "T" (significando HOJE) no campo de data. A data atual aparecer� automaticamente no campo de data.
                    <li>Ou clique no bot�o <img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> abaixo do campo. A data atual aparecer� automaticamente no campo de data.
                    <li>Para entrar com a data de  ONTEM, digite "y" ou "Y" (significando ONTEM) no campo de data. A data de ONTEM aparecer� automaticamente no campo de data.
                        </font>
                </ul>
                <b>Passo 2: </b>Entre com o hor�rio no campo "<span style="background-color:yellow" > Hor�rio: <input Type="text" name="d" size=5 maxlength=5 value="10.35"> </span>" na coluna "<?php if ($x1 == "docs") print "Ordens m�dicas";
    else print "Relat�rio de enfermagem"; ?>" .<br>
                <font color="#000099" size=1><b>Dica:</b>
                <ul Type=disc>
                    <li>Para entrar  com o hor�rio atual, digite "n" ou "N" (significando AGORA) no campo de hor�rio. O hor�rio atual aparecer� automaticamente no campo de hor�rio.
                    <li>Ou clique no bot�o <img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> abaixo do campo de hor�rio. O hor�rio atual aparecer� automaticamente no campo de hor�rio.
                        </font>
                </ul>
                <b>Passo 3: </b>Digite <?php if ($x1 == "docs") print "Ordens m�dicas";
    else print "Relat�rio de enfermagem"; ?> no campo "<span style="background-color:yellow" > <?php if ($x1 == "docs") print "Ordens m�dicas";
    else print "Relat�rio de enfermagem"; ?>: <input Type="text" name="d" size=10 maxlength=10 value="relat�rio de teste"> </span>" .<br>
                <font color="#000099" size=1><b>Dicas:</b>
                <ul Type=disc>
                    <li>Clique na caixa de verifica��o "<span style="background-color:yellow" > <input Type="caixa de verifica��o" name="c" value="c"> <img <?php echo createComIcon('../', 'warn.gif', '0') ?>>Coloque este s�mbolo no in�cio. </span>", se voc� quiser que o s�mbolo <img <?php echo createComIcon('../', 'warn.gif', '0') ?>> apare�a no in�cio de <?php if ($x1 == "docs") print "Ordens m�dicas";
    else print "Relat�rio de enfermagem"; ?>.
                    <li>Se voc� quiser destacar parte da <?php if ($x1 == "docs") print "diretiva ou"; ?> relat�rio, clique no �cone <img <?php echo createComIcon('../', 'hilite-s.gif', '0') ?>> antes de digitar a palavra ou frase. Para finalizar o
                        destaque, clique no �cone <img <?php echo createComIcon('../', 'hilite-e.gif', '0') ?>> depois de digitar a �ltima letra da parte destacada.
                        </font>
                </ul>
                <b>Passo 4: </b>Entre com as iniciais de seu nome no campo "<span style="background-color:yellow" > Sinal: <input Type="text" name="d" size=3 maxlength=3 value="ela"> </span>" .<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.<br>
                <b>Passo 5: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao arquivo de dados do paciente.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como entrar  <?php if ($x1 == "docs") print "uma pergunta ao m�dico";
    else print "um relat�rio de efetividade"; ?>?</b></font>
            <ul> 
                <b>Passo 1: </b>Entre com a data no campo "<span style="background-color:yellow" > Data: <input Type="text" name="d" size=10 maxlength=10 value="10.10.2002"> </span>" na coluna "<?php if ($x1 == "docs") print "Perguntas ao m�dico";
    else print "Relat�rio de efetividade"; ?>" .<br>
                <font color="#000099" size=1><b>Dicas:</b>
                <ul Type=disc>
                    <li>Para entrar com a data atual, digite "t" ou "T" (significando HOJE) no campo de data. A data atual aparecer� automaticamente no campo de data.
                    <li>Ou clique no bot�o <img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> abaixo do campo. A data atual aparecer� automaticamente no campo de data.
                    <li>Para entrar com a data de ONTEM, digite "y" ou "Y" (significando ONTEM) no campo de data. A data de ONTEM aparecer� automaticamente no campo de data.
                        </font>
                </ul>
                <b>Passo 2: </b>Digite <?php if ($x1 == "docs") print "pergunta";
    else print "relat�rio de efetividade"; ?> no campo "<span style="background-color:yellow" > <?php if ($x1 == "docs") print "Perguntas ao m�dico";
    else print "Relat�rio de efetividade"; ?>: <input Type="text" name="d" size=10 maxlength=10 value="Relat�rio de teste"> </span>" .<br>
                <font color="#000099" size=1><b>Dicas:</b>
                <ul Type=disc>
                    <li>Clique na caixa de verifica��o "<span style="background-color:yellow" > <input Type="caixa de verifica��o" name="c" value="c"> <img <?php echo createComIcon('../', 'warn.gif', '0') ?>>Coloque este s�mbolo no in�cio. </span>", se voc� quiser que o s�mbolo <img <?php echo createComIcon('../', 'warn.gif', '0') ?>> apare�a no in�cio de <?php if ($x1 == "docs") print "pergunta";
    else print "Relat�rio de efetividade"; ?>.
                    <li>Se voc� quiser destacar parte da <?php if ($x1 == "docs") print "diretiva ou"; ?> relat�rio, clique no �cone <img <?php echo createComIcon('../', 'hilite-s.gif', '0') ?>> antes de digitar a palavra ou frase. Para terminar o
                        destaque, clique no �cone <img <?php echo createComIcon('../', 'hilite-e.gif', '0') ?>> depois de digitar a �ltima letra da parte destacada.
                        </font>
                </ul>
                <b>Passo 3: </b>Entre com as iniciais de seu nome no campo "<span style="background-color:yellow" > Sign: <input Type="text" name="d" size=3 maxlength=3 value="ela"> </span>" .<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.<br>
                <b>Passo 4: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 5: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao arquivo de dados do paciente.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Nota:</b></font>
            <ul> 
                Voc� pode tambem entrar com ambos <?php if ($x1 == "docs") print "ordens m�dicas e perguntas ao m�dico";
    else print "enfermagem e relat�rio de efetividade"; ?> ao mesmo tempo.</ul>

<?php endif; ?>
<?php if ($src == "diagnosis") : ?>
            <a name="extra"><a name="diag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a></a>
            Como exibir um relat�rio de diagn�stico?</b></font>
            <ul> 
                <b>Nota: </b>Se um relat�rio de diagn�stico estiver dispon�vel, uma nota breve da data de sua cria��o e a cl�nica de diagn�stico ou departamento que o criou ser� exibida na coluna da esquerda.<p>
                    <b>Nota: </b>O primeiro relat�rio da lista ser� exibido imediatamente.<p>
                    <b>Passo 1: </b>Clique na breve nota do relat�rio de diagn�stico que voc� quer exibir.<br>	
            </ul>
        <?php endif; ?>
        <?php if ($src == "kg_atg_etc") : ?>
            <a name="pt"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com informa��o sobre a terapia f�sica di�ria (PT), gin�stica anti-trombose (Atg), etc.?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite a informa��o no campo <br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
<?php endif; ?>
<?php if ($src == "fotos") : ?>
            <a name="coag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como visualizar uma foto?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique na miniatura no quadro a esquerda. A imagem em tamanho integral ser� exibida no quadro a direita incluindo a data de tomada e o n�mero da foto.<br>
            </ul>
        <?php endif; ?>
<?php if ($src == "anticoag_dailydose") : ?>
            <a name="daycoag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com informa��o sobre a aplica��o di�ria de anticoagulantes?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite a informa��o ou de dosagem, ou aplicador  no campo <br> "<span style="background-color:yellow" > Entre a nova informa��o aqui ou edite as entradas atuais: </span>" .<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "lot_mat_etc") : ?>
            <a name="lot"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com Notas sobre implantes, no. LOT, no. d�bito, etc?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite informa��o sobre implantes, no. LOT, no. d�bito no campo<br> "<span style="background-color:yellow" > Por favor entre a nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
<?php endif; ?>
<?php if ($src == "medication") : ?>
            <a name="med"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com a medica��o e plano de dosagem?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite a medica��o na coluna da esquerda.<br> 
                <b>Passo 2: </b>Digite o plano de dosagem na coluna do meio.<br> 
                <b>Passo 3: </b>Clique no bot�o de radio do c�digo de cores para a medica��o se necess�rio.<br> 
                <ul Type=disc>
                    <li>Branco para normal ou padr�o.
                    <li><span style="background-color:#00ff00" >Verde</span> para antibi�ticos e seus derivados.
                    <li><span style="background-color:yellow" >Amarelo</span> para rem�dios dial�ticos.
                    <li><span style="background-color:#0099ff" >Azul</span> para rem�dios hemol�ticos (coagulante ou anticoagulante).
                    <li><span style="background-color:#ff0000" >Vermelho</span> para rem�dios aplicados intravenosos.
                </ul>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais se necess�rio.<br>
                <b>Passo 4: </b>Entre seu nome no campo "<span style="background-color:yellow" > Enfermeiro: </span>" .<br> 
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 5: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar o plano de medica��o.<br>
                <b>Passo 6: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 7: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
<?php endif; ?>
<?php if ($src == "medication_dailydose") : ?>
            <?php if ($x2) : ?>

                <a name="daymed"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
                Como entrar com a informa��o de applica��o de medica��o di�ria e dosagem?</b></font>
                <ul> 
                    <b>Passo 1: </b>Clique no campo de entrada correspondente medica��o escolhida.<br>
                    <b>Passo 2: </b>Digite ou a dosagem, ou a  informa��o do aplicador,ou s�mbolos de in�cio/fim no campo.<br>
                    <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                    <b>Passo 3: </b>Se voc� tiver v�rias entradas, entre com todas elas antes de salvar.<br>
                    <b>Passo 4: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                    <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                    <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

                </ul>
    <?php else : ?>
                <a name="daymed"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
                Aparece "N�o h� medica��o ainda". O que devo fazer?</b></font>
                <ul> 
                    <b>Passo 1: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                    <b>Passo 2: </b>Clique em "<span style="background-color:yellow" > Medica��o </span>".<br>
                    <b>Passo 3: </b>Uma janela aparecer� mostrando os campos de entrada para a medica��o e plano de dosagem.<br>
                    <b>Passo 4: </b>Digite a medica��o na coluna da esquerda.<br> 
                    <b>Passo 5: </b>Digite o plano de dosagem na coluna do meio.<br> 
                    <b>Passo 6: </b>Clique no bot�o de radio do c�digo de cores para a medica��o se necess�rio.<br> 
                    <ul Type=disc>
                        <li>Branco para normal ou padr�o.
                        <li><span style="background-color:#00ff00" >Verde</span> para antibi�ticos e seus derivados.
                        <li><span style="background-color:yellow" >Amarelo</span> para rem�dios dial�ticos.
                        <li><span style="background-color:#0099ff" >Azul</span> ara rem�dios hemol�ticos (coagulante ou anticoagulante).
                        <li><span style="background-color:#ff0000" >Vermelho</span> para rem�dios aplicados intravenosos.
                    </ul>
                    <b>Nota: </b>Voc� tambem pode editar as entradas atuais <br>se necess�rio.<br>
                    <b>Passo 7: </b>Entre seu nome no campo "<span style="background-color:yellow" > Enfermeiro: </span>" .<br> 
                    <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                    <b>Passo 8: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar o plano de medica��o.<br>
                    <b>Passo 9: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                    <b>Passo 10: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                </ul>
            <?php endif; ?>
        <?php endif; ?>
<?php if ($src == "iv_needle") : ?>
            <a name="iv"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com a informa��o di�ria de aplica��o e dosagem de medica��o intravenosa?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite ou a dosagem, a informa��o do aplicador, ou s�mbolos de in�cio/fim no campo "<span style="background-color:yellow" > Entre com a nova informa��o aqui ou edite o campo das Entradas atuais: </span>" .<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>

<?php endif; ?>

    </form>

