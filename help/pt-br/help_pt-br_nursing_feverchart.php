<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<a name="howto">
    <font face="Verdana, Arial" size=3 color="#0000cc">
    <b><?php echo "$x3" ?></b></font>
    <form action="#" >
        <p><font size=2 face="verdana,arial" >

            <?php if ($src == "main") : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                    Como ...?</b></font>
            <ul type="disc"> 
                <li><a href="#cbp">entrar com a temperatura ou press�o sanguinea.</a>
                <li><a href="#movedate">mover ou mudar a data do gr�fico.</a>
                <li><a href="#diet">entrar com um plano de dieta.</a>
                <li><a href="#allergy">entrar com informa��o de alergia.</a>
                <li><a href="#diag">entrar o diagn�stico principal ou plano de terapia.</a>
                <li><a href="#daydiag">entrar a informa��o de diagn�stico di�rio o plano de terapia.</a>
                <li><a href="#extra">entrar notas, diagn�sticos extra, etc.</a>
                <li><a href="#pt">entrar informa��o sobre terapia f�sica di�ria (Pt), gin�stica anti-trombose (ATg), etc.</a>
                <li><a href="#coag">entrar anticoagulantes.</a>
                <li><a href="#daycoag">entrar com informa��o sobre a aplica��o di�ria de anticoagulantes.</a>
                <li><a href="#lot">entrar notas sobre implantes, no.LOT , no. de d�bito, etc.</a>
                <li><a href="#med">entrar com o plano de medica��o e dosagem.</a>
                <li><a href="#daymed">entrar com informa��o sobre aplica��o e dosagem di�ria de medica��o.</a>
                <li><a href="#iv">entrar com informa��o sobre o plano de aplica��o e dosagem di�ria de medica��o intravenosa.</a>
            </ul>		
            <hr>
            <a name="cbp"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com a temperatura ou press�o sanguinea?</b></font>
            <ul> <b>Passo 1: </b>Clique na �rea de gr�fico correspondente a data escolhida.<br>
                <b>Passo 2: </b>Uma janela para entrar com os dados de temperatura e/ou press�o sanguinea aparecer�.<br>
                <b>Passo 3: </b>Entre com os dados e hor�rio.<br>
                <ul type="disc">
                    <li>Entre o hor�rio e a temperatura na coluna da direita "<font color="#0000ff">temperatura</font>" .<br>
                        Exemplo: <input type="text" name="t" size=5 maxlength=5 value="12.35">&nbsp;&nbsp;<input type="text" name="u" size=8 maxlength=8 value="37.3">
                    <li>Entre com o hor�rio e press�o sanguinea na coluna da esquerda "<font color="#cc0000">Press�o sanguinea</font>" .<br>
                        Exemplo: <input type="text" name="v" size=5 maxlength=5 value="10.05">&nbsp;&nbsp;<input type="text" name="w" size=8 maxlength=8 value="128/85">
                </ul>		
                <ul >
                    <font color="#000099" size=1><b>Dica:</b> Para entrar com o hor�rio atual, digite "n" ou "N" (significando AGORA) no campo de hor�rio. O hor�rio atual exato
                    aparecer� automaticamente naquele campo.</font>
                </ul>
                <b>Passo 4: </b>Se voc� tiver v�rios dados, entre com todos eles antes de salvar.<br>
                <b>Passo 5: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar os dados recem entrados.<br>
                <b>Passo 6: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos.<br>
                <b>Passo 5: </b>Se voce terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a "Como ...?"</a></font>
            </ul>
            <a name="movedate"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como mover ou mudar a data do gr�fico?</b></font>
            <ul> 
                <li><font color="#660000"><b>Para mover a data um dia para tr�s:</b></font><br>
                    <b>Passo 1: </b>Clique no �cone da data <img <?php echo createComIcon('../', 'l_arrowgrnsm.gif', '0') ?>> na coluna <span style="background-color:yellow" >mais � esquerda</span> do gr�fico.<p>
                <li><font color="#660000"><b>Para mover a data um dia para frente:</b></font><br>
                    <b>Passo 1: </b>Clique no �cone da data <img <?php echo createComIcon('../', 'bul_arrowgrnsm.gif', '0') ?>> na coluna <span style="background-color:yellow" >mais � direita</span> do gr�fico.
                    <p>
                <li><font color="#660000"><b>Para marcar diretamente a data de in�cio do gr�fico:</b></font><br>
                    <b>Passo 1: </b>Clique no <span style="background-color:yellow" >bot�o da direita do mouse</span> no �cone <img <?php echo createComIcon('../', 'l_arrowgrnsm.gif', '0') ?>> na coluna de data <span style="background-color:yellow" >mais � esquerda</span> do gr�fico.<br>
                    <b>Passo 2: </b>Clique <input type="button" value="OK"> quando perguntado por confirma��o.<br>
                    <b>Passo 3: </b>Uma pequena janela aparecer� mostrando os campos de sele��o para a data de in�cio.<br>
                    <b>Passo 4: </b>Selecione o dia, mes, e ano.<br>
                    <b>Passo 5: </b>Clique no bot�o <input type="button" value="OK"> para permitir a mudan�a.<br>
                    A pequena janela fechar� automaticamente e o gr�fico se ajustar� � mudan�a de data.<p>

                <li><font color="#660000"><b>Para marcar diretamente a data de fim do gr�fico:</b></font><br>
                    <b>Passo 1: </b>Clique no <span style="background-color:yellow" >bot�o da direita do mouse</span> no �cone <img <?php echo createComIcon('../', 'bul_arrowgrnsm.gif', '0') ?>> na coluna de data <span style="background-color:yellow" >mais � direita</span> do gr�fico.<br>
                    <b>Passo 2: </b>Clique <input type="button" value="OK"> quando perguntado por confirma��o.<br>
                    <b>Passo 3: </b>Uma pequena janela aparecer� mostrando os campos de sele��o para a data de fim.<br>
                    <b>Passo 4: </b>Selecione o dia, mes, e ano.<br>
                    <b>Passo 5: </b>Clique no bot�o <input type="button" value="OK"> para permitir a mudan�a.<br>
                    A pequena janela fechar� automaticamente e o gr�fico se ajustar� � mudan�a de data.<br>
                    <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a "Como ...?"</a></font>
            </ul>
            <a name="diet"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com um plano de dieta?</b></font>
            <ul> <b>Passo 1: </b>Clique no "<span style="background-color:yellow" > Plano de dieta </span>" correspondente � data escolhida.<br>
                <b>Passo 2: </b>A janela para entrar ou editar o plano de dieta aparecer�.<br>
                <b>Passo 3: </b>Entre com o plano de dieta.<br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar o novo plano de dieta que foi entrado.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
            <a name="allergy"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com informa��o de alergia?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique no �cone (clip) <img <?php echo createComIcon('../', 'clip.gif', '0') ?>>  na "<span style="background-color:yellow" > Alergia <img <?php echo createComIcon('../', 'clip.gif', '0') ?>> </span>".<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando o campo de entrada para informa��o de alergia.<br>
                <b>Passo 3: </b>Digite a informa��o de alergia ou CAVE no campo<br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais <br>no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>

            <a name="diag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com o diagn�stico principal e/ou terapia?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique no �cone (clip) <img <?php echo createComIcon('../', 'clip.gif', '0') ?>> no campo "<span style="background-color:yellow" > Diagn�stico/Terapia <img <?php echo createComIcon('../', 'clip.gif', '0') ?>> </span>".<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando o campo de entrada para informa��o sobre diagn�stico/terapia.<br>
                <b>Passo 3: </b>Digite a informa��o de diagn�stico ou terapia no campo<br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais <br>no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
            <a name="daydiag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com informa��o di�ria de diagn�stico ou plano de terapia?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique ou na coluna vazia ou no diagn�stico/terapia di�ria existente, correspondente � data escolhida.<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando o campo de entrada para a informa��o de diagn�stico/terapia  para a data escolhida.<br>
                <b>Passo 3: </b>Digite a informa��o de diagn�stico ou terapia  no campo<br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voce tambem pode editar as entradas atuais <br>no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar the informa��o.<br>
                <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
            <a name="extra"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com notas, diagn�sticos extra?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique no �cone (clip) <img <?php echo createComIcon('../', 'clip.gif', '0') ?>> em "<span style="background-color:yellow" > Notas, diagn�stico extra <img <?php echo createComIcon('../', 'clip.gif', '0') ?>> </span>".<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando o campo de entrada para notas e diagn�stico extra.<br>
                <b>Passo 3: </b>Digite as notas ou diagn�stico extra no campo <br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais <br>no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar the informa��o.<br>
                <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
            <a name="pt"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com a informa��o de terapia f�sica di�ria (PT), gin�stica anti-trombosis (Atg), etc.?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique no "<span style="background-color:yellow" > Pt,Atg,etc: </span>" correspondente � data escolhida.<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando o campo de entrada para a data escolhida.<br>
                <b>Passo 3: </b>Digite a informa��o no campo <br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais <br>no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
            <a name="coag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar anticoagulantes?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique no �cone (clip) <img <?php echo createComIcon('../', 'clip.gif', '0') ?>> no "<span style="background-color:yellow" > Anticoagulantes <img <?php echo createComIcon('../', 'clip.gif', '0') ?>> </span>".<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando o campo de entrada para anticoagulantes.<br>
                <b>Passo 3: </b>Digite a informa��o de anticoagulantes e/ou dosagem no campo<br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais <br>no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar the informa��o.<br>
                <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
            <a name="daycoag"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com informa��o sobre aplica��o di�ria de anticoagulante?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique ou na coluna vazia ou na informa��o existente de anticoagulante correspondente � data escolhida.<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando o campo de entrada aplica��o di�ria de anticoagulante para a data escolhida.<br>
                <b>Passo 3: </b>Digite ou a dosagem, ou a  informa��o do aplicador no campo<br> "<span style="background-color:yellow" > Entre a nova informa��o aqui ou edite as Entradas atuais: </span>" .<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
            <a name="lot"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com notas sobre implantes, no. LOT , no. d�bito, etc?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique no �cone (clip) <img <?php echo createComIcon('../', 'clip.gif', '0') ?>> em "<span style="background-color:yellow" > Notas <img <?php echo createComIcon('../', 'clip.gif', '0') ?>> </span>".<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando o campo de entrada notas auxiliares.<br>
                <b>Passo 3: </b>Digite a informa��o do LOT, no. d�bito, implantes no campo<br> "<span style="background-color:yellow" > Por favor entre nova informa��o aqui: </span>" .<br>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais <br>no campo "<span style="background-color:yellow" > Entradas atuais: </span>" se necess�rio.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar a informa��o.<br>
                <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
            <a name="med"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com a medica��o e plano de dosagem?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique em "<span style="background-color:yellow" > Medica��o </span>".<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando os campos de entrada para medica��o e plano de dosagem.<br>
                <b>Passo 3: </b>Digite a medica��o na coluna da esquerda.<br> 
                <b>Passo 4: </b>Digite o plano de dosagem na coluna do meio.<br> 
                <b>Passo 5: </b>Clique no bot�o de radio do c�digo de cores para a medica��o, se necess�rio.<br> 
                <ul type=disc>
                    <li>Branco para normal ou padr�o.
                    <li><span style="background-color:#00ff00" >Verde</span> para antibi�ticos e seus derivados.
                    <li><span style="background-color:yellow" >Amarelo</span> para rem�dios dial�ticos.
                    <li><span style="background-color:#0099ff" >Azul</span> para rem�dios hemol�ticos (coagulante ou anticoagulante).
                    <li><span style="background-color:#ff0000" >Vermelho</span> para rem�dios aplicados intravenosos.
                </ul>
                <b>Nota: </b>Voc� tambem pode editar as entradas atuais <br>se necess�rio.<br>
                <b>Passo 6: </b>Entre seu nome no campo "<span style="background-color:yellow" > Enfermeiro: </span>" .<br> 
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 7: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar o plano de medica��o.<br>
                <b>Passo 8: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 9: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
            <a name="daymed"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com a informa��o de applica��o de medica��o di�ria e dosagem?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique ou numa coluna vazia de medica��o ou numa informa��o existente correspondente � data escolhida.<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando a medica��o e plano de dosagem com o campo de entradas para a informa��o do dia.<br>
                <b>Passo 3: </b>Clique no campo de entrada correspondente medica��o escolhida.<br>
                <b>Passo 4: </b>Digite ou na dosagem, informa��o do aplicador,ou s�mbolos de in�cio/fim no campo.<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 5: </b>Se voc� tiver v�rias entradas, entre com todas elas antes de salvar.<br>
                <b>Passo 6: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar the informa��o.<br>
                <b>Passo 7: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 8: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
            <a name="iv"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
            Como entrar com a informa��o di�ria de aplica��o e dosagem de medica��o intravenosa?</b></font>
            <ul> 
                <b>Passo 1: </b>Clique ou numa coluna vazia de medica��o ou numa informa��o existente ao lado de <br>"<span style="background-color:yellow" > Intravenoso>> </span>" correspondente � data escolhida.<br>
                <b>Passo 2: </b>Uma janela aparecer� mostrando o campo de entrada para o dia da informa��o da medica��o intravenosa.<br>
                <b>Passo 3: </b>Digite ou a dosagem, a informa��o do aplicador, ou s�mbolos de in�cio/fim no campo "<span style="background-color:yellow" > Entre com a nova informa��o aqui ou edite o campo das Entradas atuais: </span>" .<br>
                <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.<br>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar the informa��o.<br>
                <b>Passo 5: </b>Se voc� quiser corrigir quaisquer erros, clique nos dados errados e substitua com os corretos e salve novamente.<br>
                <b>Passo 6: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> para fechar a janela e voltar ao gr�fico.<br>
                <font color="#000099" size=1><a href="#howto"><img <?php echo createComIcon('../', 'arrow-t.gif', '0') ?>> Voltar a  "Como ...?"</a></font>
            </ul>
        <?php elseif (($src == "") && ($x1 == "template")) : ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                O que eu deveria fazer quando <span style="background-color:yellow" >a lista de hoje ainda n�o est� criada</span>?</b></font>
            <ul> <b>Passo 1: </b>Clique no bot�o <input type="button" value="Mostre a �ltima lista de ocupa��o"> para encontrar a �ltima lista que foi gravada.
                <br>
                <b>Passo 2: </b>Quando uma lista gravada � encontrada dentro dos �ltimos 31 dias, ela ser� exibida.<br>
                <b>Passo 3: </b>Clique no bot�o <input type="button" value="Copie esta lista para hoje."><br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Eu n�o quero ver a �ltima lista de ocupa��o. Como criar a nova lista?</b></font>
            <ul> <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'plus2.gif', '0') ?>> correspondente ao n�mero do quarto e cama.
                <br>
                <b>Passo 2: </b>Uma janela para a pesquisa do paciente aparecer�.<br>
                <b>Passo 3: </b>Primeiro encontre o paciente entrando com uma palavra chave de pesquisa em um dos v�rios campos de entradas.<br>
                Se voc� quiser encontrar o paciente...<ul type="disc">
                    <li>pelo seu n�mero de paciente, entre com o n�mero no campo <br>"<span style="background-color:yellow" >Patient no.:</span><input type="text" name="t" size=19 maxlength=10 value="22000109">" .
                    <li>pelo seu sobrenome, entre seu sobrenome ou as primeiras poucas letras no campo <br>"<span style="background-color:yellow" >Sobrenome:</span><input type="text" name="t" size=19 maxlength=10 value="Schmitt">" .
                    <li>pelo seu nome, entre seu nome ou as primeiras poucas letras no campo <br>"<span style="background-color:yellow" >Nome:</span><input type="text" name="t" size=19 maxlength=10 value="Peter">" .
                    <li>pela sua data de nascimento, entre sua data de nascimento ou os primeiro poucos n�meros no campo <br>"<span style="background-color:yellow" >Data de nascimento:</span><input type="text" name="t" size=19 maxlength=10 value="10.10.1966">" .
                </ul>
                <b>Passo 4: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> para iniciar a pesquisa de paciente.<br>
                <b>Passo 5: </b>Se a pesquisa encontrar um paciente ou v�rios pacientes, uma lista de pacientes ser� exibida.<br>
                <b>Passo 6: </b>Para selecionar o paciente certo, clique no bot�o&nbsp;<button><img <?php echo createComIcon('../', 'post_discussion.gif', '0') ?>></button> correspondente a ele.<br>
            </ul>
        <?php elseif (($src == "getlast") && ($x1 == "last")) : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como copiar a �ltima lista gravada exibida para a lista de ocupa��o de hoje?</b></font>
            <ul> <b>Passo 1: </b>Clique no bot�o <input type="button" value="Copie esta lista para hoje."> para copiar a �ltima lista gravada.
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                A �ltima lista de ocupa��o est� sendo exibida mas eu n�o quero copi�-la. Como iniciar uma nova lista? </b></font>
            <ul> <b>Passo 1: </b>Clique no bot�o <input type="button" value="N�o copie isto! Crie uma nova lista."> para iniciar uma nova lista.
            </ul>
        <?php elseif ($src == "assign") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como assinalar uma cama a um paciente?</b></font>
            <ul> <b>Passo 1: </b>Primeiro encontre o paciente entrando com uma palavra chave de pesquisa em um dos v�rios campos de entradas.<br>
                Se voc� quiser encontrar o paciente...<ul type="disc">
                    <li>pelo seu n�mero de paciente, entre com o n�mero no campo <br>"<span style="background-color:yellow" >No. do pacient:</span><input type="text" name="t" size=19 maxlength=10 value="22000109">" .
                    <li>pelo seu sobrenome, entre seu sobrenome ou as primeiras poucas letras no campo <br>"<span style="background-color:yellow" >Sobrenome:</span><input type="text" name="t" size=19 maxlength=10 value="Schmitt">" .
                    <li>pelo seu nome, entre seu nome ou as primeiras poucas letras no campo <br>"<span style="background-color:yellow" >Nome:</span><input type="text" name="t" size=19 maxlength=10 value="Peter">" .
                    <li>pela sua data de nascimento, entre sua data de nascimento ou os primeiro poucos n�meros no campo <br>"<span style="background-color:yellow" >Data de nascimento:</span><input type="text" name="t" size=19 maxlength=10 value="10.10.1966">" .
                </ul>
                <b>Passo 2: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> para iniciar a pesquisa de paciente.<br>
                <b>Passo 3: </b>Se a pesquisa encontrar um paciente ou v�rios pacientes, uma lista de pacientes ser� exibida.<br>
                <b>Passo 4: </b>Para selecionar o paciente certo, clique no bot�o&nbsp;<button><img <?php echo createComIcon('../', 'post_discussion.gif', '0') ?>></button> correspondente a ele.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como bloquear uma cama?</b></font>
            <ul> <b>Passo 1: </b>Clique em "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> <font color="#0000ff">Bloqueie esta cama</font> </span>".<br>
                <b>Passo 2: </b>Choose&nbsp;<button>OK</button> quando for perguntado por confirma��o.<p>
            </ul>
            <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.</ul>

        <?php elseif ($src == "remarks") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como escrever observa��es ou notas sobre o paciente?</b></font>
            <ul> <b>Passo 1: </b>Clique campo de entrada de texto.<br>
                <b>Passo 2: </b>Digite suas observa��es ou notas<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Eu terminei de escrever. Como  salvo as observa��es ou notas?</b></font>
            <ul> 	<b>Passo 1: </b>Clique no bot�o <input type="button" value="Salvar"> para salvar.<p>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Eu salvei as observa��es. Como fecho a janela?</b></font>
            <ul> 	<b>Passo 1: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?> align="absmiddle"> para fechar a janela.<p>
            </ul>
        <?php elseif ($src == "discharge") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como liberar um paciente?</b></font>
            <ul> <b>Passo 1: </b>Selecione o tipo de libera��o clicando no bot�o correspondente<br>
                <ul><br>
                    <input type="radio" name="relart" value="reg" checked> Libera��o Regular<br>
                    <input type="radio" name="relart" value="auto"> O paciente deixou o hospital por vontade pr�pria<br>
                    <input type="radio" name="relart" value="emerg"> Libera��o de Emergencia<br>  <br>
                </ul>
                <b>Passo 2: </b>Digite observa��es adicionais ou notas sobre a libera��o no campo "<span style="background-color:yellow" > Observa��o: </span>" se dispon�vel. <br>
                <b>Passo 3: </b>Digite seu nome no campo "<span style="background-color:yellow" > Enfermeiro: <input type="text" name="a" size=20 maxlength=20></span>" se estiver vazio. <br>
                <b>Passo 4: </b>Marque o campo " <span style="background-color:yellow" ><input type="checkbox" name="d" value="d"> Sim, tenho certeza. Libere o paciente. </span>" . <br>
                <b>Passo 5: </b>Clique no bot�o <input type="button" value="libere"> para liberar o paciente.<p>
                    <b>Passo 6: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?> align="absmiddle"> para Voltar para a nova lista de ocupa��o da ala.<p>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Eu tentei, clicando no bot�o <input type="button" value="libere"> , mas n�o h� resposta. Por que?</b></font>
            <ul> <b>Nota: </b>O campo da caixa de verifica��o deve estar marcado conforme: <br>
                " <span style="background-color:yellow" ><input type="checkbox" name="d" value="d" verificado> Sim, tenho certeza. Libere o paciente. </span>". <p>
                    <b>Passo 1: </b>Clique na caixa de verifica��o se ela n�o estiver marcada.<p>
            </ul>
            <b>Nota: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?> align="absmiddle">.</ul>

        <?php endif; ?>

    </form>

