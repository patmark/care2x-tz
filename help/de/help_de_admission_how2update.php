<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<p><font size=2 face="verana,arial" >
<form action="#" >
    <font size=3 color="#0000cc"><b>Daten �ndern bzw. aktualisieren</b></font>
    <ul>Wenn Sie die Daten �ndern oder aktualisieren m�chten, klicken Sie den <input type="button" value="Daten aktualisieren"> an.
    </ul>
    <?php if ($src == "such") : ?>
        <font size=3 color="#0000cc"><b>Neue Suche</b></font>
        <ul> Falls Sie noch mal suchen m�chten, den  <input type="button" value="Zur�ck zur Suche"> anklicken.
        </ul>
    <?php else : ?>
        <font size=3 color="#0000cc"><b>Einen neuen Patient aufnehmen</b></font>
        <ul> Falls Sie einen neuen Patien aufnehmen m�chten, den <input type="button" value="Zur�ck zur Aufnahme"> anklicken.
        </ul>
    <?php endif; ?>
    <b>Achtung!</b>
    <ul> Wenn Sie fertig sind den <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>> anklicken.

    </ul>
</form>

