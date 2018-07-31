<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b><?php echo "Patient's Data - $x3" ?></b></font>
<form action="#" >
    <p><font size=2 face="verdana,arial" >

        <?php if ($src == "") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>O que estas barras coloridas significam?</b> <img <?php echo createComIcon('../', 'colorcodebar3.gif', '0') ?> ></font>
        <ul> <b>Nota: </b>Quando cada uma destas barras estiver vis�vel, sinalizam a disponibilidade de uma informa��o particular, uma instru��o, uma mundan�a, ou um pedido, etc.<br>
            O significado das cores pode ser modificado para cada ala. <br>
            A barra com a s�rie cor-de-rosa na direita representa a aproxima��o do tempo quando uma instru��o deve ser carregada.<br>
            Por exemplo: a sexta cor-de-rosa significa a "sexta hora" ou "6:00", a 22a cor da barra significa a "vig�sima segunda hora" ou "22:00".
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            O que s�o os seguintes bot�es?</b></font>
        <ul> <input type="button" value="Gr�fico de febre">
            <ul>
                Este ir� abrir o gr�fico di�rio de febre do paciente. Voc� pode entrar, editar, ou deletar febre e dados BP no gr�fico.<br>
                Os campos de dados edit�veis adicionais:
                <ul type="disc">
                    <li>Alergia<br>
                    <li>Plano de dieta di�rio<br>
                    <li>Diagn�stico principal/terapia<br>
                    <li>Diagn�stico di�rio/terapia<br>
                    <li>Notas, diagn�sticos extras<br>
                    <li>Tp (Terapia f�sica), Atg (gin�stica anti-trombose), etc.<br>
                    <li>Anticoagulantes<br>
                    <li>Documenta��o di�ria para anticoagulantes<br>
                    <li>Medica��o intravenosa & Bandage dressing<br> ??
                    <li>Documenta��o di�ria para medica��o intravenosa<br>
                    <li>Notas<br>
                    <li>Medica��o (list)<br>
                    <li>Documenta��o di�ria para medica��o e dosagem<br>
                </ul>		
            </ul>
            <input type="button" value="Relat�rio de enfermagem">
            <ul>
                Este ir� abrir o formul�rio de relat�rio de enfermagem. Voc� pode documentar sua atividade de enfermagem, sua efetividade, observa��es, chamados, ou recomenda��es, etc.
            </ul>
            <input type="button" value="Ordens m�dicas">
            <ul>
                O m�dico respons�vel ir� inserir aqui suas instru��es, medica��o, dosagem, respostas aos chamados de enfermeiros, ou instru��es para mudan�as, etc.
            </ul>	
            <input type="button" value="Relat�rios de diagn�stico">
            <ul>
                Este armazena os relat�rios de diagn�sticos oriundos de diferentes cl�nicas de diagn�stico ou departamentos.
            </ul>	
    <!-- 	<input type="button" value="Dados b�sicos">
            <ul>
            Este armazena os dados b�sicos de pacientes e informa��es pessoais como nome, primeiro nome, etc. Esta � tamb�m a documenta��o inicial da
            anamnese do paciente ou hist�rico m�dico que serve como fundamenta��o  para o plano de enfermagem individual.
            </ul>	
            <input type="button" value="Plano de enfermagem">
            <ul>
            Este � o plano individual de enfermagem. Voc� pode criar, editar, ou deletar o plano.
            </ul>	
            -->	
            <input type="button" value="DRG">
            <ul>
                Abre a janela composta de DRG.
            </ul>	
            <input type="button" value="Relat�rios de Laborat�rio">
            <ul>
                Este armazena ambos relat�rios m�dicos e de laborat�rios patol�gicos.
            </ul>	
            <input type="button" value="Fotos">
            <ul>
                Este ir� abrir o cat�logo de fotos do paciente.
            </ul>	
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Qual � a fun��o desta caixa de sele��o  </b>	<select name="d"><option value="">Selecione a requisi��o de teste diagn�stico</option></select>?
        </font>
        <ul>       	<b>Nota: </b>Este ir� selecionar o formul�rio de requisi��o para um teste diagn�stico em particular.<br>
            <b>Passo 1: </b>Clique no <select name="d"><option value="">Selecione a requisi��o de teste diagn�stico</option></select>
            <br>
            <b>Passo 2: </b>Clique na cl�nica escolhida, departamento, ou teste diagnostico.<br>
            <b>Passo 3: </b>O formul�rio de requisi��o ser� automaticamente aberto.<br>
        </ul>
    <?php endif; ?>

    <?php if ($src == "labor") : ?>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b>N�o h� relat�rio de laborat�rio dispon�vel no momento. </b></font>
        <ul> Clique no bot�o  <input type="button" value="OK"> para voltar � pasta de dados do paciente.</ul>
    <?php else : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Como fechar a pasta de dados do paciente? </b></font>
        <ul> <b>Nota: </b>Se voc� decidir fechar, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?> align="absmiddle">.</ul>

    <?php endif; ?>

</form>

