<html>

    <head>
        <title></title>

    </head>
    <body>
        <form >
            <font face="Verdana, Arial" size=2>
            <font  size=3 color="#0000cc">
            <b>

                <?php
                switch ($src) {
                    case "show": print "Enfermeiros de plant�o - Plano de trabalho";
                        break;
                    case "quick": print "Enfermeiros de plant�o - Vis�o r�pida";
                        break;
                    case "plan": print "Enfermeiros de plant�o - Criar plano de trabalho";
                        break;
                    case "personlist": print "Criar uma lista de pessoal";
                        break;
                    case "dutydoc": print "Enfermeiros de plant�o - Documentando trabalho executado em hor�rio de plant�o";
                        break;
                }
                ?>
            </b>
            </font>
            <p>

                <?php if ($src == "quick") : ?>
                <p><font color="#990000" face="Verdana, Arial">O que eu posso fazer aqui?</font></b><p>
                    <font face="Verdana, Arial" size=2>
                    <img <?php echo createComIcon('../', 'update.gif', '0', 'absmiddle') ?>><b> Obter informa��o adicional (se dispon�vel) sobre os enfermeiros de plant�o.</b>
                <ul>Para ver a informa��o adicional, <span style="background-color:yellow" >clique no nome</span> da
                    pessoa sa lista. Uma janela aparecer� mostrando infroma��o relevante.</ul><p>
                    <img <?php echo createComIcon('../', 'update.gif', '0', 'absmiddle') ?>><b> Veja o plano de trabalho para o mes inteiro.</b>
                <ul>Para exibir o plano de trabalho para o mes inteiro, clique no �cone correspondente &nbsp;<button><img <?php echo createComIcon('../', 'new_address.gif', '0', 'absmiddle') ?>> <font size=1>Mostre</font></button>.<br>
                    O plano de trabalho ser� exibido.</ul><p>
                    <font face="Verdana, Arial" size=3 color="#990000">
                <p><b>O que o vis�o r�pida ir� exibir?</b></font></b><p>
                    <font face="Verdana, Arial" size=2>
                </b><li><b>Departamento OR</b> :<ul>A lista dos departamentos existentes que tem m�dicos/cirurgi�es de prontid�o e/ou em plant�o.</ul><p>
                <li><b>Prontid�o </b> :<ul>O enfermeiro de prontid�o.</ul><p>
                <li><b>Bip/Telefone</b> :<ul>Informa��o de bip/telefone do enfermeiro de prontid�o</ul>
                <li><b>Sobre-aviso </b> :<ul>O enfermeiro de sobre-aviso.</ul><p>
                <li><b>Bip/Telefone</b> :<ul>Informa��o de Bip/Telefone de quem est� de sobre-aviso.</ul><p>
                <li><b>Plano de trabalho</b> :<ul>�cone clic�vel. Faz o link ao plano de trabalho do departamento para o mes inteiro. Clique no �cone&nbsp;<button><img <?php echo createComIcon('../', 'new_address.gif', '0', 'absmiddle') ?>> <font size=1>Show</font></button>
                        se voc� quiser abrir o plano de trabalho para o mes inteiro e eventualmente criar ou editar o plano de trabalho.</ul>

                <?php endif; ?>
                <?php if ($src == "show") : ?>
                    <p>
                        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero criar um novo plano de trabalho para o mes que est� sendo exibido</b></font>
                    <ul> <b>Passo 1: </b>Clique no bot�o  <img <?php echo createLDImgSrc('../', 'newplan.gif', '0') ?>> .<br>
                    </ul>
                    <ul><b>Passo 2:</b>
                        Se voc� estiver logado e tem direito de acesso a esta fun��o, o 
                        modo de edi��o para o plano de trabalho  aparecer� na tela principal.<br>
                        De outro modo, voc� ser� solicitado a entrar com seu nome de usu�rio e senha. <p>
                            Entre com seu nome de usu�rio e senha e clique no bot�o <img <?php echo createLDImgSrc('../', 'continue.gif', '0') ?>>.<p>
                            Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.

                    </ul>
                    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero to criar um plano para um certo mes, mas o plano que est� sendo exibido � para um mes diferente.</b></font>
                    <ul> <b>Passo 1: </b>Clique repetidamente no link clic�vel "Mes" at� que o mes que voc� quer apare�a. <br>
                        Clique � direita do link clic�vel "mes" para avan�ar o mes.<br>
                        Clique � esquerda do link clic�vel "mes" para retroceder o mes.<br>
                        <b>Passo 2: </b>Siga as instru��es anteriores para criar um novo plano de trabalho.<br>
                    </ul>
                    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero voltar � vis�o r�pida </b></font>
                    <ul> <b>Passo 1: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?> >.<br>
                    </ul>
                    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero ver os n�meros do bip e telefone dos enfermeiros de plant�o </b></font>
                    <ul> <b>Passo 1: </b><span style="background-color:yellow" >Clique no nome da pessoa</span>.  Uma janela aparecer� mostrando as informa��es relevantes.<br>
                        <u1>


                            <b>Nota</b>
                            <ul> Se voc� decidir fechar o plano de trabalho  clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>>.
                            </ul>
                        <?php endif; ?>
                        <?php if ($src == "plan") : ?>

                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                                Eu quero agendar um enfermeiro para plant�o isando a lista de enfermeiros</b></font>
                            <ul> <b>Passo 1: </b>Clique no bot�o &nbsp;<button><img <?php echo createComIcon('../', 'patdata.gif', '0') ?>></button> do dia selecionado para abrir a lista de enfermeiros. <br>
                                Uma janela aparecer� mostrando a lista de enfermeiros.<br>
                                <ul type=disc>
                                    <li>Clique no �cone na coluna da esquerda "Prontid�o" para agendar um plant�o em prontid�o.<br>
                                    <li>Clique no �cone na coluna da direita "On-call" para agendar um sobre-aviso de plant�o.
                                </ul>
                                <b>Passo 2: </b><span style="background-color:yellow" >Clique no nome do enfermeiro</span> para copi�-lo ao plano de trabalho.<br>
                                <b>Passo 3: </b>Se voc� clicou no nome errado, repita o passo 2 e clique no nome correto.<br>
                                <b>Passo 4: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> na janela da lista de enfermeiros.<br>
                            </ul>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                                Eu quero entrar manualmente com o nome do enfermeiro no plano de trabalho</b></font>
                            <ul> <b>Passo 1: </b>Clique no campo de entrada de texto "<input type="text" name="t" size=11 maxlength=4 >" do dia selecionado.<br>
                                <b>Passo 2: </b>Digite manualmente o nome do enfermeiro<br>
                            </ul>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                                Eu quero apagar um nome do plano de trabalho</b></font>
                            <ul> <b>Passo 1: </b>Clique no campo de entrada de texto "<input type="text" name="t" size=11 maxlength=4 value="Nome">" do nome a ser apagado.<br>
                                <b>Passo 2: </b>Apague manualmente o nome, usando as teclas backspace ou delete do teclado.<br>
                            </ul>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero salvar o plano de trabalho</b></font>
                            <ul> <b>Passo 1: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> .<br>
                            </ul>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu salvei o plano e desejo terminar o planejamento, o que devo fazer? </b></font>
                            <ul> <b>Passo 1: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> . <br>
                            </ul>
                            </font>
                        <?php endif; ?>
                        <?php if ($src == "personlist") : ?>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                                O departamento exibido est� errado. Eu quero mudar para o departamento certo.</b></font>
                            <ul> <b>Passo 1: </b>Selecione o departamento no campo <nobr>"<span style="background-color:yellow" >Altere departamento ou sala OP: </span><select name="s">
                                        <option value="Departamento exemplo 1" selected> Departamento exemplo 1</option>
                                        <option value="Departamento exemplo 2"> Departamento exemplo 2</option>
                                        <option value="Departamento exemplo 3"> Departamento exemplo 3</option>
                                        <option value="Departamento exemplo 4"> Departamento exemplo 4</option>
                                    </select>"</nobr> .
                                <br>
                                <b>Passo 2: </b>Clique no bot�o <input type="button" value="Altere"> para alterar o departamento selecionado.
                            </ul>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                                Eu quero apagar um nome da lista</b></font>
                            <ul> <b>Passo 1: </b>Clique no campo de entrada de texto "<input type="text" name="t" size=11 maxlength=4 value="Nome">" do nome a ser apagado.<br>
                                <b>Passo 2: </b>Apague manualmente o nome, usando as teclas backspace ou delete do teclado.<br>
                            </ul>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu quero salvar a lista de pessoal</b></font>
                            <ul> <b>Passo 1: </b>clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>>.<br>
                            </ul>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu salvei a lista e quero fech�-la,o que devo fazer? </b></font>
                            <ul> <b>Passo 1: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> . <br>
                            </ul>
                        <?php endif; ?>
                        <?php if ($src == "dutydoc") : ?>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                                Como documentar um trabalho feito durante o hor�rio de plant�o?</b></font>
                            <ul> <b>Passo 1: </b>Entre com a data no campo " Data <input type="text" name="d" size=10 maxlength=10> ".<p>
                                <ul> <b>Dica: </b>Entre ou com "t" ou com "T" (significando HOJE) para automaticamente entrar com a data de hoje.<br>
                                    <b>Dica: </b>Entre ou com "y" ou "Y" (significando ONTEM) para automaticamente entrar com a data de ontem.<p>
                                </ul>
                                <b>Passo 2: </b>Entre com o nome do enfermeiro de plant�o no campo <nobr>"<span style="background-color:yellow" > Sobrenome, nome <input type="text" name="d" size=20 maxlength=10> </span>"</nobr> .<br>
                                <b>Passo 3: </b>Entre com o hor�rio do in�cio do trabalho no campo "<span style="background-color:yellow" > de <input type="text" name="d" size=5 maxlength=5> </span>" .<br>
                                <b>Passo 4: </b>Entre com o hor�rio do fim do trabalho no campo "<span style="background-color:yellow" > at� <input type="text" name="d" size=5 maxlength=5> </span>" .<p>
                                <ul> <b>Dica: </b>Entre ou com "n" ou com "N" (significando AGORA) para automaticamente entrar com o hor�rio atual.<p>
                                </ul>.<p>
                            </ul>
                            <b>Passo 5: </b>Entre com o n�mero OR no campo "<span style="background-color:yellow" > Sala OP <input type="text" name="d" size=5 maxlength=5> </span>" .<br>
                            <b>Passo 6: </b>Entre com o diagn�stico, terapia, ou opera��o no campo <nobr>"<span style="background-color:yellow" > Diagn�stico/Terapia <input type="text" name="d" size=5 maxlength=5> </span>"</nobr> .<br>
                            <b>Passo 7: </b>Entre com o nome do enfermeiro de prontid�o no campo <nobr>"<span style="background-color:yellow" > Prontid�o: <input type="text" name="d" size=5 maxlength=5> </span>"</nobr> .<br>
                            <b>Passo 8: </b>Entre com o nome do enfermeiro de servi�o no campo <nobr>"<span style="background-color:yellow" > Em servi�o: <input type="text" name="d" size=5 maxlength=5> </span>"</nobr> se necess�rio.<br>
                            <b>Passo 1: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para salvar o documento. <br>
                            </ul>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Como imprimir o documento da lista?</b></font>
                            <ul> <b>Passo 1: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'printout.gif', '0') ?>>  e a janela de impress�o aparecer�.<br>
                                <b>Passo 2: </b>Siga as instru��es da janela de impress�o.<br>
                            </ul>
                            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Eu salvei o documento e quero fech�-lo, o que devo fazer? </b></font>
                            <ul> <b>Passo 1: </b>Se voc� terminou, clique no bot�o <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> . <br>
                            </ul>
                        <?php endif; ?>

                        </form>
                        </body>
                        </html>
