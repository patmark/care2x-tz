<font face="Verdana, Arial" size=3 color="#0000cc">
<b><?php echo "$x3 - $x2" ?></b></font>
<form action="#" >
    <p><font size=2 face="verdana,arial" >
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como admitir um paciente a partir de uma lista de espera?</b></font>
    <ul> <b>Passo 1: </b>Clique no nome do paciente da lista de espera.<p>
            <img src="../help/en/img/en_ambulatory_waitlist.png" border=0 width=301 height=156>
        <p>
            <b>Passo 2: </b>Uma janela aparecer� mostrando a lista de ocupa��o da ala.<br>
            <b>Passo 3: </b>Clique no bot�o <img <?php echo createLDImgSrc('../', 'assign_here.gif', '0') ?>> da cama assinalada ao paciente.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Como assinalar uma cama a um paciente?</b> (M�todo antigo)</font>
    <ul> 
        <b>Note: </b> Este � o m�todo antigo de admiss�o de um paciente internado para uma ala. O m�todo preferido atualmente � o de usar a lista de espera. Veja os passos acima.<p>
            <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'plus2.gif', '0') ?>> correspondente ao n�mero do quarto e cama. 
            <br>
            <b>Passo 2: </b>Uma janela aparecer� para a pesquisa de paciente.<br>
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

    <?php if ((($src == "") && ($x1 == "ja")) || (($src == "fresh") && ($x1 == "template"))) : ?>


        <font face="Verdana, Arial" size=2>
        <a name="open"></a>
        <b>
            <p><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000">Como abrir os gr�ficoa dos pacientes?</font></b><p>
            <font face="Verdana, Arial" size=2>
        <ul>
            <b>Passo:</b> Clique nas barras coloridas para abrir o arquivo dos gr�ficos...<p>
            <img src="../help/en/img/en_ambulatory_sbars.png" border=0 width=434 height=84><p>
                <b>OU:</b> Clique no �cone <img <?php echo createComIcon($root_path, 'open.gif', '0'); ?>> para abrir o arquivo dos gr�ficos...<p>
                <img src="../help/en/img/en_admission_folder.png" border=0 width=456 height=92>
        </ul>
        <a name="adata"></a>
        <font face="Verdana, Arial" size=2>
        <b>
            <p><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000">Como exibir a data de admiss�o de um paciente?</font></b><p>
            <font face="Verdana, Arial" size=2>
        <ul>
            <b>Passo:</b> Clique no �cone <img <?php echo createComIcon($root_path, 'pdata.gif', '0'); ?>> exibir a data de admiss�o ...<p>
            <img src="../help/en/img/en_admission_listlink.png" border=0 width=456 height=92><p>
                <b>OU:</b> Clique no sobrenome do paciente para a exibi��o da data de admiss�o.<p>
                <img src="../help/en/img/en_ambulatory_name.png" border=0 width=434 height=84>
        </ul>

        <a name="transfer"></a>
        <font face="Verdana, Arial" size=2>
        <b>
            <p><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000">Como transferir um paciente?</font></b><p>
            <font face="Verdana, Arial" size=2>
        <ul>
            <b>Passo:</b> Clique no �cone <img <?php echo createComIcon($root_path, 'xchange.gif', '0'); ?>> para abrir a janela de transfer�ncia.<p>
                <img src="../help/en/img/en_admission_transfer.png" border=0 width=456 height=92>
        </ul>


        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como liberar um paciente da ala?</b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'bestell.gif', '0') ?>> correspondente ao paciente.
            <p>
            <img src="../help/en/img/en_admission_discharge.png" border=0 width=456 height=92><p>
                <b>Passo 2: </b>O formul�rio de libera��o do paciente aparecer�T.<br>
                <b>Passo 3: </b>Se voc� tiver certeza em liberar o paciente, <br>clique no campo da caixa de verifica��o 
                "<input type="checkbox" name="g" ><span style="background-color:yellow" > Sim, tenho certeza. Libere o paciente.</span>" para
                ativ�-la.<br>
                <b>Passo 4: </b>Clique no bot�o <input type="button" value="libere"> para liberar o paciente.<p>
                <b>Note: </b>Se voc� quiser cancelar, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>> e o paciente n�o ser� liberado.<br>
        </ul>




        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como bloquear uma cama?</b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o <img <?php echo createComIcon('../', 'plus2.gif', '0') ?>>correspondente ao n�mero do quarto e cama.
            <br>
            <b>Passo 2: </b>Uma janela para a pesquisa do paciente aparecer�.<br>
            <b>Passo 3: </b>Clique no bot�o "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> <font color="#0000ff">Bloqueie esta cama</font> </span>".<br>
            <b>Passo 4: </b>Choose&nbsp;<button>OK</button> quando perguntado por confirma��o.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Eu quero apagar um paciente da lista</b></font>
        <ul> <b>Nota: </b>Voc� N�O PODE simplesmante apagar um paciente da lista. Para remover o paciente voc� deve liber�-lo regularmente. Para fazer isto,
            siga as instru��es de como liberar um paciente da ala conforme anteriormente descrito.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>O que estas barras  <img <?php echo createComIcon('../', 's_colorbar.gif', '0') ?>> coloridas significam? </b></font>
        <ul> <b>Nota: </b>Cada uma desta barras coloridas quando "assinaladas vis�veis" sinalizam a disponibilidade de uma informa��o em particular, uma instru��o, uma mudan�a, ou uma pergunta, etc.<br>
            O significado de cada barra colorida pode ser assinalado em cada ala. 
        </ul>
        <!-- <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>O que significa este �cone <img <?php echo createComIcon('../', 'patdata.gif', '0') ?>> ? </b></font>
        <ul> <b>Nota: </b>Este � o bot�o de arquivo de dados do paciente. Para exibir o arquivo de dados do paciente, clique neste �cone. Uma janela aparecer�
                                mostrando a informa��o b�sica do paciente, sua foto de identifica��o se dispon�vel, e muitas outras op��es.<br>
        </ul> -->
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>O que significa este �cone <img <?php echo createComIcon('../', 'bubble2.gif', '0') ?>> ? </b></font>
        <ul> <b>Nota: </b>Este � o bot�o de Ler/Escrever notas. Clicando nele Uma janela aparecer� para ler ou escrever notas a respeito do paciente.<br>
            O �cone simples <img <?php echo createComIcon('../', 'bubble2.gif', '0') ?>> significa que n�o h� notas ou observa��es sobre o paciente. Para escrever uma nota ou observa��o clique neste �cone.
            O �cone <img <?php echo createComIcon('../', 'bubble3.gif', '0') ?>> significa que h� uma nota ou observa��o armazenada sobre o paciente. Para ler ou anexar notas ou observa��es
            clique neste �cone.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>O que significa este �cone <img <?php echo createComIcon('../', 'bestell.gif', '0') ?>> ? </b></font>
        <ul> <b>Nota: </b>Este � o bot�o de libera��o do paciente. Para liberar um paciente, clique para abrir o formul�rio de libera��o do paciente.<br>
        </ul>
    <?php elseif (($src == "") && ($x1 == "template")) : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            O que eu devo fazer quando <span style="background-color:yellow" >a lista de hoje ainda n�o foi criada</span>?</b></font>
        <ul> <b>Passo 1: </b>Clique no bot�o <input type="button" value="Mostre a �ltima lista de ocupa��o"> para encontrara a �ltima lista gravada.
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
                <li>pelo seu n�mero de paciente, entre com o n�mero no campo <br>"<span style="background-color:yellow" >No. paciente:</span><input type="text" name="t" size=19 maxlength=10 value="22000109">" .
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
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                A �ltima lista de ocupa��o est� sendo exibida mas eu n�o quero copi�-la. Como iniciar uma nova lista? </b></font>
            <ul> <b>Passo 1: </b>Clique no bot�o <input type="button" value="N�o copie isto! Crie uma nova lista."> para iniciar uma nova lista.
            </ul>
        <?php elseif ($src == "assign") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Como assinalar uma cama a um paciente?</b></font>
            <ul> <b>Passo 1: </b>Primeiro encontre o paciente entrando com uma palavra chave de pesquisa em um dos v�rios campos de entradas.<br>
                Se voc� quiser encontrar o paciente...<ul type="disc">
                    <li>pelo seu n�mero de paciente, entre com o n�mero no campo <br>"<span style="background-color:yellow" >No. paciente:</span><input type="text" name="t" size=19 maxlength=10 value="22000109">" .
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

        <?php endif; ?>

        <?php if (($src != "assign") && ($src != "remarks") && ($src != "discharge")) : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>O que significa "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> <font color="#0000ff">Bloqueado</font> </span>" ? </b></font>
            <ul> <b>Nota: </b>Isto significa que a cama est� bloqueada e n�o pode ser assinalada a um paciente. Para desbloque�-la, clique no bot�o "<span style="background-color:yellow" ><font color="#0000ff">Bloqueado</font></span>" and choose&nbsp;<button>OK</button>
                quando for perguntado por confirma��o.<br>
                <b>Nota: </b>Dependendo da configura��o da vers�o do programa ou configura��es de setup, para desfazer o bloqueamento de uma cama pode ser necess�rio uma senha.</ul>

        <?php endif; ?>

        <a name="pic"></a>
        <font face="Verdana, Arial" size=2>
        <b>
            <p><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000">Como exibir a foto de identifica��o de um paciente?</font></b><p>
            <font face="Verdana, Arial" size=2>
        <ul>
            <b>Passo:</b> Clique no �cone <img <?php echo createComIcon($root_path, 'spf.gif', '0'); ?>> ou  <img <?php echo createComIcon($root_path, 'spm.gif', '0'); ?>> .<p>
                <img src="../help/en/img/en_ambulatory_sex.png" border=0 width=434 height=84>
        </ul>


</form>

