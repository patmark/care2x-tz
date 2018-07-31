<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<a name="howto">
    <font face="Verdana, Arial" size=3 color="#0000cc">
    <b><?php echo "$x3" ?></b></font>
    <form action="#" >
        <p><font size=2 face="verdana,arial" >

            <?php if ($src == "bp_temp") : ?>
                <a name="cbp"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
                Como entrar com a temperatura ou press�o sanguinea?</b></font>
            <ul> <b>Passo 1: </b>Entre com os dados e hor�rio.<br>
                <ul type="disc">
                    <li>Entre com o hor�rio e press�o sanguinea na coluna da esquerda "<font color="#cc0000">Press�o sanguinea</font>" .<br>
                        Exemplo: <input type="text" name="v" size=5 maxlength=5 value="10.05">&nbsp;&nbsp;<input type="text" name="w" size=8 maxlength=8 value="128/85">
                    <li>Entre o hor�rio e a temperatura na coluna da direita "<font color="#0000ff">Temperatura</font>" .<br>
                        Exemplo: <input type="text" name="t" size=5 maxlength=5 value="12.35">&nbsp;&nbsp;<input type="text" name="u" size=8 maxlength=8 value="37.3">
                </ul>		
                <ul >
                    <font color="#000099" size=1><b>Dica:</b> Para entrar com o hor�rio atual, digite "n" ou "N" (significando AGORA) no campo de hor�rio. O hor�rio atual exato
                    aparecer� automaticamente naquele campo.</font>
                </ul>
                <b>Passo 2: </b>Se voc� tiver v�rios dados, entre com todos eles antes de salvar.<br>
                <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar os dados recem entrados.<br>
                <b>Passo 4: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 5: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "diet") : ?>

            <a name="diet"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com um plano de dieta?</b></font>
            <ul> <b>Passo 1: </b>Entre com o plano de dieta no campo <br> "<span style="background-color:yellow" > Entre a nova informa��o aqui ou edite as entradas atuais </span>" .<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar o novo plano de dieta que foi entrado.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "allergy") : ?>
            <a name="allergy"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com informa��o de alergia?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite a informa��o de alergia ou CAVE no campo<br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "diag_ther") : ?>
            <a name="diag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com o diagn�stico principal e/ou terapia?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite a informa��o de diagn�stico ou terapia no campo <br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "diag_ther_dailyreport") : ?>
            <a name="daydiag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com informa��o di�ria de diagn�stico ou plano de terapia?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite a informa��o de diagn�stico ou terapia no campo<br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "xdiag_specials") : ?>
            <a name="extra"><a name="diag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a></a>
            Como entrar com notas, diagn�sticos extra?</b></font>
            <ul> 
                <b>Passo 1: </b>Type the notas or extra diagnoses in the<br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "kg_atg_etc") : ?>
            <a name="pt"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com a informa��o de terapia f�sica di�ria (PT), gin�stica anti-trombosis (Atg), etc.?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite a informa��o no campo <br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "anticoag") : ?>
            <a name="coag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar anticoagulantes?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite a informa��o de anticoagulantes e/ou dosagem no campo<br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "anticoag_dailydose") : ?>
            <a name="daycoag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com informa��o sobre aplica��o di�ria de anticoagulante?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite ou a dosagem, ou a  informa��o do aplicador no campo<br> "<span style="background-color:yellow" > Entre a nova informa��o aqui ou edite as Entradas atuais: </span>" .<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "lot_mat_etc") : ?>
            <a name="lot"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com notas sobre implantes, no. LOT , no. d�bito, etc?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite a informa��o do LOT, no. d�bito, implantes no campo<br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais in the "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "medication") : ?>
            <a name="med"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com a medica��o e plano de dosagem?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite a medica��o na coluna da esquerda.<br> 
                <b>Passo 2: </b>Digite o plano de dosagem na coluna do meio.<br> 
                <b>Passo 3: </b>Clique no bot�o de radio do c�digo de cores para a medica��o se necess�rio.<br> 
                <ul type=disc>
                    <li>Branco para normal ou padr�o.
                    <li><span style="background-color:#00ff00" >Verde</span> para antibi�ticos e seus derivados.
                    <li><span style="background-color:yellow" >Amarelo</span> para rem�dios dial�ticos.
                    <li><span style="background-color:#0099ff" >Azul</span> para rem�dios hemol�ticos (coagulante ou anticoagulante).
                    <li><span style="background-color:#ff0000" >Vermelho</span> para rem�dios aplicados intravenosos.
                </ul>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais se necess�rio.<br>
                <b>Passo 4: </b>Entre seu nome no campo "<span style="background-color:yellow" > Enfermeiro: </span>" .<br> 
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 5: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar o plano de medica��o.<br>
                <b>Passo 6: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 7: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>
        <?php endif; ?>
        <?php if ($src == "medication_dailydose") : ?>
            <?php if ($x2) : ?>

                <a name="daymed"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
                Como entrar com a informa��o de applica��o de medica��o di�ria e dosagem?</b></font>
                <ul> 
                    <b>Passo 1: </b>Clique no campo de entrada correspondente medica��o escolhida.<br>
                    <b>Passo 2: </b>Digite ou na dosagem, informa��o do aplicador,ou s�mbolos de in�cio/fim no campo.<br>
                    <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                    <b>Passo 3: </b>Se voc� tiver v�rias entradas, entre com todas elas antes de salvar.<br>
                    <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                    <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                    <b>Passo 6: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

                </ul>
            <?php else : ?>
                <a name="daymed"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
                Aparece "N�o h� medica��o ainda". O que devo fazer?</b></font>
                <ul> 
                    <b>Passo 1: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                    <b>Passo 2: </b>Clique em "<span style="background-color:yellow" > Medica��o </span>".<br>
                    <b>Passo 3: </b>Uma janela aparecer� mostrando os campos de entrada para a medica��o e plano de dosagem.<br>
                    <b>Passo 4: </b>Digite a medica��o na coluna da esquerda.<br> 
                    <b>Passo 5: </b>Digite o plano de dosagem na coluna do meio.<br> 
                    <b>Passo 6: </b>Clique no bot�o de radio do c�digo de cores para a medica��o se necess�rio.<br> 
                    <ul type=disc>
                        <li>Branco para normal ou padr�o.
                        <li><span style="background-color:#00ff00" >Verde</span> para antibi�ticos e seus derivados.
                        <li><span style="background-color:yellow" >Amarelo</span> para rem�dios dial�ticos.
                        <li><span style="background-color:#0099ff" >Azul</span> para rem�dios hemol�ticos (coagulante ou anticoagulante).
                        <li><span style="background-color:#ff0000" >Vermelho</span> para rem�dios aplicados intravenosos.
                    </ul>
                    <b>Nota: </b>Voc� tambem pode editar as entradas atuais <br>se necess�rio.<br>
                    <b>Passo 7: </b>Entre seu nome no campo "<span style="background-color:yellow" > Enfermeiro: </span>" .<br> 
                    <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                    <b>Passo 8: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar o plano de medica��o.<br>
                    <b>Passo 9: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                    <b>Passo 10: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                </ul>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($src == "iv_needle") : ?>
            <a name="iv"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com a informa��o di�ria de aplica��o e dosagem de medica��o intravenosa?</b></font>
            <ul> 
                <b>Passo 1: </b>Digite ou a dosagem, a informa��o do aplicador, ou s�mbolos de in�cio/fim no campo "<span style="background-color:yellow" > Entre com a nova informa��o aqui ou edite o campo das Entradas atuais: </span>" .<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 3: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 4: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>

            </ul>

        <?php endif; ?>

    </form>

