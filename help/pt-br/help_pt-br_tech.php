<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title></title>

    </head>
    <body>
        <form >
            <font face="Verdana, Arial" size=2>
            <font  size=3 color="#0000cc">
            <b>

                <?php
                print "Suporte t�cnico - ";
                switch ($src) {
                    case "request": print "Requisi��o para servi�o de reparo";
                        break;
                    case "report": print "Relatar servi�os de reparo conclu�dos";
                        break;
                    case "queries": print "Enviar uma pergunta ou d�vida";
                        break;
                    case "arch": print "Pesquisar nos arquivos";
                        break;
                    case "showarch": print "Relat�rio";
                        break;
                }
                ?>
            </b>
            </font>
            <p>

                <?php if ($src == "request") : ?>
                <p>
                    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                        Como enviar uma requisi��o para um servi�o de reparo ?</b></font>
                <ul> <b>Passo 1: </b>Informe a localiza��o do dano na  
                    <nobr>"<span style="background-color:yellow" > Campo de localiza��o do dano <input type="text" name="d" size=20 maxlength=10> </span>"</nobr> .<p>
                        <b>Passo 2: </b>Informe o seu nome no campo <nobr>"<span style="background-color:yellow" > Solicitado por: <input type="text" name="d" size=20 maxlength=10> </span>"</nobr> .<br>
                    <b>Passo 3: </b>Informe seu n�mero pessoal no campo <nobr>"<span style="background-color:yellow" > Num. Pessoal: <input type="text" name="d" size=20 maxlength=5> </span>"</nobr> .<br>
                    <b>Passo 4: </b>Informe o seu n�mero de telefone no campo <nobr>"<span style="background-color:yellow" > Num. Telefone: <input type="text" name="d" size=20 maxlength=5> </span>"</nobr> caso o departamento de suporte t�cnico ter alguma d�vida sobre sua requisi��o.<p>
                        <b>Passo 5: </b>Digite a descri��o do dano no campo <nobr>"<span style="background-color:yellow" > Descreva a natureza do dano: <input type="text" name="d" size=20 maxlength=5> </span>"</nobr> .<br>
                    <b>Passo 6: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'abschic.gif', '0') ?>> para enviar sua requisi��o. <br>
                </ul>
                <b>Nota</b>
                <ul> Se voc� decidir fechar o formul�rio de requisi��o, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
                </ul>
            <?php endif; ?>
            <?php if ($src == "report") : ?>
                <p>
                    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                        Como relatar um servi�o de reparo conclu�do?</b></font>
                <ul> <b>Passo 1: </b>Insira a localiza��o do dano no  campo
                    <nobr>"<span style="background-color:yellow" > Localiza��o do dano <input type="text" name="d" size=20 maxlength=10> </span>"</nobr> .<p>
                        <b>Passo 2: </b>Insira o n�mero do servi�o no campo <nobr>"<span style="background-color:yellow" > Num. do Servi�o: <input type="text" name="d" size=20 maxlength=10> </span>"</nobr> .<br>
                    <b>Passo 3: </b>Insira seu nome no campo <nobr>"<span style="background-color:yellow" > T�cnico: <input type="text" name="d" size=20 maxlength=10> </span>"</nobr> .<br>
                    <b>Passo 4: </b>Insira seu n�mero pessoal no campo <nobr>"<span style="background-color:yellow" > N�m. pessoal: <input type="text" name="d" size=20 maxlength=5> </span>"</nobr> .<br>
                    <b>Passo 5: </b>Digite a descri��o do servi�o de reparo realizado no campo <nobr>"<span style="background-color:yellow" > Por favor descreva o servi�o de reparo realizado por voc�: <input type="text" name="d" size=20 maxlength=5> </span>"</nobr> .<br>
                    <b>Passo 6: </b>Clique no bot�o <input type="button" value="Enviar Relat�rio"> para enviar seu relat�rio. <br>
                </ul>
                <b>Nota</b>
                <ul> Se voc� decidir fechar o formul�rio de requisi��o, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
                </ul>
            <?php endif; ?>
            <?php if ($src == "queries") : ?>
                <p>
                    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                        Como enviar uma d�vida ou quest�o para o departamento de suporte t�cnico? </b></font>
                <ul> <b>Passo 1: </b>Digite sua d�vida ou quest�o no campo <nobr>"<span style="background-color:yellow" > Digite sua quest�o: <input type="text" name="d" size=20 maxlength=5> </span>"</nobr> .<br>
                    <b>Passo 2: </b>Insira seu nome no campo <nobr>"<span style="background-color:yellow" > Nome: <input type="text" name="d" size=20 maxlength=10> </span>"</nobr> .<br>
                    <b>Passo 3: </b>Insira seu departamento no campo <nobr>"<span style="background-color:yellow" > Departmento: <input type="text" name="d" size=20 maxlength=5> </span>"</nobr> .<br>
                    <b>Passo 4: </b>Clique no bot�o <input type="bot�o" value="Send inquiry"> para enviar sua d�vida. <br>
                </ul>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                    Como ver minhas d�vidas anteriores e as respostas do departamento t�cnico ? </b></font>
                <ul> <b>Passo 1: </b>Primeiro voc� deve logar-se. Digite seu nome no campo <nobr>"<span style="background-color:yellow" > from: <input type="text" name="d" size=20 maxlength=5> </span>"</nobr> no canto direito superior.<br>
                    <b>Passo 2: </b>Clique no <input type="button" value="Login">. <br>
                    <b>Passo 3: </b>Se voc� possui d�vidas anteriores, elas estar�o listadas de forma resumida.  <br>
                    <b>Passo 4: </b>Se sua d�vida for respondida pelo departamento t�cnico, o s�mbolo <img src="../img/warn.gif" border=0 width=16 height=16 align="absmiddle"> ir�
                    ser exibido no final. <br>
                    <b>Passo 5: </b>Para ler sua d�vida e a resposta do departamento t�cnico, clique sobre ela. <br>
                </ul>
                <b>Nota</b>
                <ul> Se voc� decidir fechar o formul�rio de d�vida clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
                </ul>
            <?php endif; ?>
            <?php if ($src == "arch") : ?>

                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                    Como ler relat�rios t�cnicos?</b></font>
                <ul> 
                    <b>Nota: </b>Os relat�rios t�cnicos que ainda n�o foram lidos ou impressos s�o listados imediatamente.<p>
                        <b>Passo 1: </b>Clique no bot�o <img src="../img/upArrowGrnLrg.gif" border=0 width=16 height=16 align="absmiddle">  do relat�rio que voc� deseja abrir. <br>
                </ul>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                    Como pesquisar um relat�rio t�cnico espec�fico?</b></font>
                <ul> <b>Passo 1: </b>Insira uma informa��o completa ou as primeiras letras dos campos correspondentes como explicado a seguir.<br>
                    <ul type=disc> 
                        <li>Se voc� deseja encontrar relat�rios escritos por um t�cnico em particular, insira o nome do t�cnico no campo "<span style="background-color:yellow" > T�cnico: <input type="text" name="t" size=11 maxlength=4 value="Name"> </span>" .<br>
                        <li>Se voc� deseja encontrar relat�rios de trabalhos feitos em um departamento espec�fico, insira o nome do departamento no campo "<span style="background-color:yellow" > Department: <input type="text" name="t" size=11 maxlength=4 value="Name"> </span>" .<br>
                        <li>Se voc� deseja encontrar relat�rios escritos em uma data particular, insira a data no campo "<span style="background-color:yellow" > Date from: <input type="text" name="t" size=11 maxlength=4 value="Name"> </span>" .<br>
                        <li>Se voc� deseja encontrar todos os relat�rios de um per�odo de tempo, insira a data de in�cio no campo "<span style="background-color:yellow" > De: <input type="text" name="t" size=11 maxlength=4 value="Name"> </span>" e
                            entre com a data de fim no campo "<span style="background-color:yellow" > to: <input type="text" name="t" size=11 maxlength=4 value="Name"> </span>" .<br>
                    </ul>
                    <b>Passo 2: </b>Clique no bot�o <input type="button" value="Search"> para iniciar a pesquisa. <br>
                    <b>Passo 3: </b>Os resultados ser�o listados. Clique no �cone <img src="../img/upArrowGrnLrg.gif" border=0 width=16 height=16 align="absmiddle">  do relat�rio que voc� desejar abrir. <br>
                    <b>Nota: </b>Relat�rios tecnicos que s�o marcados com <img src="../img/check-r.gif" border=0  align="absmiddle"> j� foram lidos ou impressos.<p>

                </ul>
                </font>
            <?php endif; ?>
            <?php if ($src == "showarch") : ?>
                <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b>
                    Marcando o relat�rio como lido.</b></font>
                <ul> <b>Passo 1: </b>Clique no bot�o <input type="button" value="Marcar como 'Lido'">.<p>
                        <b>Nota: </b>Quando o relat�rio for marcado como lido, ele n�o ser� listado imediatamente a cada in�cio de pesquisa de arquivo. Eles podem somente ser encotrados novamente 
                        atrav�s dos m�todos usuais de pesquisa em arquivos.<p>
                </ul>
                <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b>
                    Imprimindo o relat�rio.</b></font>
                <ul> <b>Passo 1: </b>Clique no bot�o <input type="button" value="Imprimir">.<p>
                </ul>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                    Como voltar ao in�cio da pesquisa de arquivos?</b></font>
                <ul> <b>Passo 1: </b>Clique no bot�o <input type="button" value="<< Voltar">.<p>
                </ul>
            <?php endif; ?>
            <?php if ($src == "dutydoc") : ?>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                    Como documentar um trabalho feito durante horas de servi�o ?</b></font>
                <ul> <b>Passo 1: </b>Insira a data no campo " Date <input type="text" name="d" size=10 maxlength=10> " .<p>
                    <ul> <b>Dica: </b>Digite "t" ou "T" (significando HOJE) para inserir a data de hoje automaticamente.<br>
                        <b>Tip: </b>Digite "y" ou "Y" (significando ONTEM) para inserir a data de ontem automaticamente.<p>
                    </ul>
                    <b>Passo 2: </b>Insira o nome da enfermeira em servi�o no campo  <nobr>"<span style="background-color:yellow" > Sobrenome, Nome <input type="text" name="d" size=20 maxlength=10> </span>"</nobr> .<br>
                    <b>Passo 3: </b>Insira a hora de in�cio do servi�o no campo "<span style="background-color:yellow" > de <input type="text" name="d" size=5 maxlength=5> </span>" .<br>
                    <b>Passo 4: </b>Insira a hora de fim do servi�o no campo "<span style="background-color:yellow" > at� <input type="text" name="d" size=5 maxlength=5> </span>" .<p>
                    <ul> <b>Dica: </b>Insira "n" or "N" (significando AGORA) para inserir a hora atual imediatamente.<p>
                    </ul>
                    <b>Passo 5: </b>Insira o n�mero de OR no campo "<span style="background-color:yellow" > Sala OP <input type="text" name="d" size=5 maxlength=5> </span>" .<br>
                    <b>Passo 6: </b>Insira o diagn�stico, terapia, ou opera��o no campo <nobr>"<span style="background-color:yellow" > Diagn�stico/Terapia <input type="text" name="d" size=5 maxlength=5> </span>"</nobr> .<br>
                    <b>Passo 7: </b>Insira o nome do enfermeiro de plant�o no campo<nobr>"<span style="background-color:yellow" > Plant�o: <input type="text" name="d" size=5 maxlength=5> </span>"</nobr> .<br>
                    <b>Passo 8: </b>Insira o nome do enfermeiro de chamada no campo <nobr>"<span style="background-color:yellow" > De chamada: <input type="text" name="d" size=5 maxlength=5> </span>"</nobr> se necess�rio.<br>
                    <b>Passo 9: </b>Clique no bot�o <input type="button" value="Salvar"> para salvar o documento. <br>
                </ul>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Como imprimir a lista de documentos?</b></font>
                <ul> <b>Passo 1: </b>Clique no bot�o <input type="button" value="Imprimir"> e a janela de impress�o ir� aparecer.<br>
                    <b>Passo 2: </b>Siga as instru��es da janela de impress�o.<br>
                </ul>
                <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>EU salvei o documento e gostaria de fech�-lo, o que devo fazer? </b></font>
                <ul> <b>Passo 1: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> . <br>
                </ul>
            <?php endif; ?>

        </form>
    </body>
</html>
