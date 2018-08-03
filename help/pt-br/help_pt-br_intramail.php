<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    Email - Intranet 
    <?php
    switch ($src) {
        case "pass": switch ($x1) {
                case "": print "Log in";
                    break;
                case "1": print "Registrando um novo usu�rio";
                    break;
            }
            break;
        case "mail": switch ($x1) {
                case "compose": print "Criar uma nova mensagem";
                    break;
                case "listmail": print "Lista de mensagens";
                    break;
                case "sendmail": print "Mensagem enviada";
                    break;
            }
            break;
        case "read": print "Ler mensagens";
            break;
        case "endere�o": print "Livro de endere�os";
            break;
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >



    <?php if ($src == "pass") : ?>
    <?php if ($x1 == "") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como fazer o log in?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Entre com o seu endere�o de email da intranet (sem a parte @xxxxxx ) no campo <nobr>"<span style="background-color:yellow" > Seu endere�o de email: </span>"</nobr> .<br>
                <b>Passo 2: </b>Selecione a parte de dom�nio no campo <nobr>"<span style="background-color:yellow" > @<select name="d">
                            <option value="Teste Dom�nio 1"> Teste Dom�nio 1</option>
                            <option value="Teste Dom�nio 2"> Teste Dom�nio 2</option>
                        </select>
                    </span>"</nobr> .<br>
                <b>Passo 3: </b>Clique no bot�o <input type="button" value="Login"> para fazer o log in.<br>
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Eu ainda n�o tenho endere�o. Como consigo um endere�o?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no link "<span style="background-color:yellow" > Novo usu�rio pode se registrar aqui. <img <?php echo createComIcon('../', 'bul_arrowgrnsm.gif', '0') ?>> </span>" para abrir o 
                formul�rio de registro.<br>
                <b>Passo 2: </b>Para maiores instru��es, clique no bot�o "Ajuda" ap�s o formul�rio de registro ter sido mostrado.<br>
            </ul>
    <?php endif; ?>		
    <?php if ($x1 == "1") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como se registrar?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Entre com o sobrenome e nome no campo "<span style="background-color:yellow" > Sobrenome, nome: </span>" .<br>
                <b>Passo 2: </b>Entre com o seu endere�o de email de sua escolha no campo "<span style="background-color:yellow" > Escolha de endere�o de email: </span>" .<p>
                    <b>Passo 3: </b>Selecione a parte de dom�nio  no campo  <nobr>"<span style="background-color:yellow" > @<select name="d">
                            <option value="Teste Dom�nio 1"> Teste Dom�nio 1</option>
                            <option value="Teste Dom�nio 2"> Teste Dom�nio 2</option>
                        </select>
                    </span>"</nobr> .<br>
                <b>Passo 4: </b>Entre com o alias de sua escolha no campo "<span style="background-color:yellow" > Alias: </span>" .<p>
                    <b>Passo 5: </b>Entre com a senha de sua escolha no campo "<span style="background-color:yellow" > Senha escolhida: </span>" .<br>
                    <b>Passo 6: </b>Entre novamente com a senha no campo "<span style="background-color:yellow" > Entre novamente com a senha: </span>" .<br>
                    <b>Passo 7: </b>Clique no bot�o <input type="button" value="Registre"> para se registrar.<br>
            </ul>

    <?php endif; ?>		
<?php endif; ?>	

<?php if ($src == "mail") : ?>
    <?php if ($x1 == "listmail") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como abrir uma mensagem?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique ou no destinat�rio da mensagem, ou em quem enviou, ou assunto, ou data, ou nos �cones <img src="../img/c-mail.gif" border=0 align="absmiddle"> ou <img src="../img/o-mail.gif" border=0 align="absmiddle">.<br>
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                O que os �cones <img src="../img/c-mail.gif" border=0 align="absmiddle"> e <img src="../img/o-mail.gif" border=0 align="absmiddle"> significam?</b>
            </font>
            <ul>       	
                <img src="../img/c-mail.gif" border=0 align="absmiddle"> = Mensagem ainda n�o foi aberta ou lida. <br>
                <img src="../img/o-mail.gif" border=0 align="absmiddle"> = Mensagem j� foi aberta ou lida. <br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como apagar uma mensagem?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Marque na caixa de verifica��o da mensagem <input type="checkbox" name="a" value="s" verificado> para selecion�-la.<br>
                <b>Passo 2: </b>Clique no bot�o <input type="button" value="Apagar"> .<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como ir de um arquivo para outro?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b> Clique no bot�o com o nome do arquivo.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como compor ou escrever uma nova mensagem?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no link "<span style="background-color:yellow" > Novo Email </span>".<br>
            </ul>
    <?php endif; ?>		
    <?php if ($x1 == "compose") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como escrever uma nova mensagem?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Entre com o endere�o de email do destinat�rio no campo "<span style="background-color:yellow" > Destinat�rio: </span>" .<br>
                <b>Passo 2: </b>Se voc� quiser enviar uma c�pia para alguem entre com seu endere�o de email no campo "<span style="background-color:yellow" > (CC) </span>" .<br>
                <b>Passo 3: </b>Se voc� quiser enviar uma c�pia para alguem (sem mostrar o endere�o) entre seu endere�o de email no campo "<span style="background-color:yellow" > (BCC) </span>" .<br>
                <b>Passo 4: </b>Entre com o assunto de sua mensagem no campo "<span style="background-color:yellow" > Assunto: </span>" .<br>
                <b>Passo 5: </b>Digite sua mensagem no campo de entrada de texto.<br>
                <b>Passo 6: </b>Clique no bot�o <input type="button" value="Enviar"> para enviar a mensagem.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Eu planejo salvar a mensagem como rascunho. Como fazer isto?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Digite sua mensagem no campo de entrada de text.<br>
                <b>Passo 2: </b>Depois de digitar sua mensagem, clique no bot�o <input type="button" value="Salvar como rascunho"> .<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como usar endere�os de email diretamente de meu livro de endere�os?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no bot�o <input type="button" value="Mostre todos"> "Endere�o r�pido".<br>
                <b>Passo 2: </b>Uma pequena janela se abrir� com o livro de endere�os.<br>
                <b>Passo 3: </b>Clique no bot�o do radio de um endere�o correspondente ao campo para onde deve ser copiado.<p>
                <ul>   
                    Clique "To<input type="radio" name="t" value="a">" para copiar o endere�o para o campo "Destinat�rio" .<br>
                    Clique "CC<input type="radio" name="t" value="a">" para copiar o endere�o para o campo "CC" .<br>
                    Clique "BCC<input type="radio" name="t" value="a">" para copiar o endere�o para o campo "BCC" .<p>
                </ul>
                <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <b>Nota:</b>  Se voc� quiser 
                desmarcar um bot�o do radio, clique no �cone do bot�o correspondente <img src="../img/redpfeil.gif" border=0> .<br> 	
                <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <b>Nota:</b> Voc� pode selecionar v�rios endere�os
                ao mesmo tempo. 	<p>
                    <b>Passo 4: </b>Clique no bot�o <input type="button" value="Assumir"> para copiar os endere�os selecionados para a mensagem que est� sendo composta.<br>
                    <b>Passo 5: </b>Clique no bot�o "<span style="background-color:yellow" > <img src="../img/l_arrowGrnSm.gif" border=0> Close </span>"
                    para fechar a janela aberta.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como � que funciona o "Endere�o r�pido" ?</b>
            </font>
            <ul>       	
                <b>Nota: </b>Se voc� tem endere�os de email armazenados em  "Endere�o r�pido" , oa cinco primeiros ser�o listados no "Endere�o r�pido".<p>
                    <b>Passo 1: </b>Clique primeiro no campo onde voc� quer por o endere�o (por exemplo: "Destinat�rio" ou "CC" ou "BCC") .<br>
                    <b>Passo 2: </b>Clique no bot�o Endere�o na lista do "Endere�o r�pido" . Este endere�o ser� copiado para o campo de entrada que voc� clicou previamente.<br>
            </ul>

    <?php endif; ?>		
    <?php if (($x1 == "sendmail") && ($x3 == "1")) : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como compor ou escrever uma nova mensagem?</b>
            </font>
            <ul>       	
                <b>Passo 1: </b>Clique no link do bot�o  "<span style="background-color:yellow" > Novo Email </span>".<br>
            </ul>
    <?php endif; ?>		
<?php endif; ?>	


<?php if ($src == "read") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como imprimir a mensagem?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no link do bot�o  "<span style="background-color:yellow" > Vers�o de impress�o <img src="../img/bul_arrowGrnSm.gif" border=0></span>".<br>
            <b>Passo 2: </b>Uma janela abrir� mostrando uma vers�o de impress�o da mensagem.<br>
            <b>Passo 3: </b>Clique no bot�o op��o "<span style="background-color:yellow" > < Print > </span>" para imprimir.<br>
            <b>Passo 4: </b>O menu de impressoras do Windows� aparecer�. Clique no bot�o "OK".<br>
            <b>Passo 5: </b>Para fechar a janela da vers�o de impress�o, clique no bot�o de op��o "<span style="background-color:yellow" > < Close > </span>".<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como re-enviar a mensagem?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <input type="button" value="Re-enviar"> .<br>
            <b>Passo 2: </b>Edite os endere�os da mensagem se necess�rio.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Enviar"> para finalmente re-enviar a mensagem.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como encaminhar uma mensagem?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <input type="button" value="Encaminhar"> .<br>
            <b>Passo 2: </b>Entre com o endere�o do destinat�rio.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="Enviar"> para finalmente encaminhar a mensagem.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como apagar uma mensagem?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <input type="button" value="Apagar"> .<br>
            <b>Passo 2: </b>Voc� ser� perguntado se voc� realmente quer apagar a mensagem.<br>
            <b>Passo 3: </b>Clique no bot�o <input type="button" value="OK"> para finalmente apagar a mensagem.<p>
                <b>Note:</b> Mensagens que s�o apagadas do arquivo da "Caixa de entrada"  ficam temporariamente armazenados no arquivo "Reciclar" .
        </ul>
<?php endif; ?>		

<?php if ($src == "endere�o") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como acrescentar um endere�o de email ao livro de endere�os?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique no bot�o <input type="button" value="Acrescentar novo endere�o de email"> .<br>
            <b>Passo 2: </b>Um formul�rio de netrada aparecer�. Entre com o nome  no campo "<span style="background-color:yellow" > Sobrenome, Nome: </span>" .<br>
            <b>Passo 3: </b>Entre com o alias ou apelido no campo "<span style="background-color:yellow" > Alias/Apelido: </span>" .<br>
            <b>Passo 4: </b>Entre com o endere�o de email no campo "<span style="background-color:yellow" > Endere�o de Email: </span>" .<br>
            <b>Passo 5: </b>Selecione a parte do dom�nio no campo  <nobr>"<span style="background-color:yellow" > @<select name="d">
                        <option value="Teste de Dom�nio 1"> Teste de Dom�nio 1</option>
                        <option value="Teste de Dom�nio 2"> Teste de Dom�nio 2</option>
                    </select>
                </span>"</nobr> .<br>
            <b>Passo 6: </b>Clique no bot�o <input type="button" value="Salvar"> .<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como remover um endere�o de email do livro de endere�os?</b>
        </font>
        <ul>       	
            <b>Passo 1: </b>Clique na caixa de verifica��o <input type="checkbox" name="d" value="s" verificado> para selecionar o endere�o que vai ser removido.<br>
            <b>Passo 2: </b>Clique no bot�o <input type="button" value="Apagar"> .<br>
            <b>Passo 3: </b>Voc� ser� perguntado se voc� realmente quer apagar o endere�o.<br>
            <b>Passo 4: </b>Clique no bot�o <input type="button" value="OK"> para finalmente remover o endere�o.<p>
        </ul>
<?php endif; ?>		

    <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b>
        Nota:</b>
    </font>
    <ul>       	
        A fun��o de emails e endere�os da intranet funcionam SOMENTE DENTRO do sistema da intranet e n�o podem ser usados para a internet.<br>
    </ul>
</form>

