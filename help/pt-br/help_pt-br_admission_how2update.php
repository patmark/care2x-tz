
<p><font size=2 face="verana,arial" >
<form action="#" >
    <b>Como atualizar ou alterar dados</b>
    <ul> Se voc� quiser fazer mudan�as na informa��o clique no bot�o <input type="button" value="Atualizar dados">.
    </ul>
    <?php if ($src == "search") : ?>
        <b>Nova pesquisa</b>
        <ul> Se voc� quiser iniciar uma nova pesquisa clique no bot�o <input type="button" value="Voltar � pesquisa">.
        </ul>
    <?php else : ?>
        <b>Para iniciar uma nova admiss�o de um novo paciente</b>
        <ul> Se voc� quiser iniciar uma nova admiss�o clique no bot�o <input type="button" value="Voltar � admiss�o">.
        </ul>
    <?php endif; ?>
    <b>Nota</b>
    <ul> Se voc� tiver terminado, clique no bot�o <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>.

    </ul>


</form>

