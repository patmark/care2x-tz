<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    Radiologia - Upload de imagens Dicom 

</b>
</font>
<p><font size=2 face="verana,arial" >
<form action="#" >

    <?php
    if (!$src) {
        ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como fazer o upload de imagens dicom?</b>
        </font>

        <ul>       	
            <b>Passo 1: </b>Se o n�mero de encontro relacionado �s imagens estiver dispon�vel, entre com ele no campo "<font color=#0000ff>N�mero de encontro relacionado</font>" .<p>
                <b>Passo 2: </b>Se n�meros de identifica��es ou documentos relacionados estiverem dispon�veis, entre com eles no campo "<font color=#0000ff>Documentos relacionados com ID</font>" . Separe as identifica��es com v�rgulas.<p> 
                <b>Passo 3: </b>Digite uma descri��o breve da(s) imagem(ns) no campo "<font color=#0000ff>Notas</font>" .<p> 
                <b>Passo 4: </b>Clique no bot�o <input type="button" value="Selecionar"> para abrir a janela seletora de arquivos.<p> 
                <b>Passo 5: </b>Selecione o arquivo da imagem.<p> 
                <b>Passo 6: </b>Quando todos os arquivos de imagens estiverem selecionados, clique no bot�o <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> para iniciar o upload.<p> 
        </ul>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Como alterar o n�mero de imagens para fazer o upload?</b>
        </font>

        <ul>       	
            <b>Nota: </b>Mude o n�mero somente antes de entrar com qualquer dado ou antes de iniciar a sele��o dos arquivos de imagens.<p> 
                <b>Passo 1: </b>Entre com o n�mero no campo "Eu preciso fazer um upload <input type="text" name="d" size=3 maxlength=1 value=4>" .<p>
                <b>Passo 2: </b>Clique em "OK".<p> 
        </ul>
        <?php
    } else {
        ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Depois de fazer um upload com sucesso,como posso verificar a integridade das imagens que foram enviadas por upload?</b>
        </font>
        <ul>       	
            <b>Passo: </b>Clique no �cone <img <?php echo createComIcon('../', 'torso.gif', '0') ?>> do "<b>Grupo de imagem #</b>" para mostrar as imagens na tela corrente (visor espec�fico).<p>
            <img src="../help/en/img/en_dicom_group_in.png" border=0 width=318 height=132><p> 
                <b>Or: </b>Clique no �cone <img <?php echo createComIcon('../', 'torso_win.gif', '0') ?>> do "<b>Grupo de imagem #</b>" para mostrar as imagens em uma janela extra.<p>
                <img src="../help/en/img/en_dicom_group_ex.png" border=0 width=318 height=132> 

        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Depois de fazer um upload com sucesso, como posso verificar a integridade de cada imagem que foi enviada por upload?</b>
        </font>
        <ul>       	
            <b>Passo: </b>Clique no �cone <img <?php echo createComIcon('../', 'torso.gif', '0') ?>> da lista para mostrar uma �nica imagem na tela corrente (visor espec�fico).<p>
            <img src="../help/en/img/en_dicom_single_in.png" border=0 width=410 height=101><p> 
                <b>Or: </b>Clique no �cone <img <?php echo createComIcon('../', 'torso_win.gif', '0') ?>> da lista para mostrar uma �nica imagem em uma janela extra.<p>
                <img src="../help/en/img/en_dicom_single_ex.png" border=0 width=410 height=101>

        </ul>

        <?php
    }
    ?>

</form>

