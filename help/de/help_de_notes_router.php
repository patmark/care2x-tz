<font face="Verdana, Arial" size=3 color="#0000cc">
<b><?php echo $x1 ?></b></font>

<p><font size=2 face="verdana,arial" >

    <?php
    if ($x2 == 'show' || $src == 'sickness') {
        if ($x3) {
            ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
            <font color="#990000"><b>Wie kann ich die Registrierungs-Daten anzeigen lassen?</b></font>
        <ul>
            <b>Schritt: </b> Klicken Sie auf <img <?php echo createLDImgSrc('../', 'reg_data.gif', '0') ?>>.<p>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
        <font color="#990000"><b>Wie kann ich die Aufnahme-Daten anzeigen lassen?</b></font>
        <ul>
            <b>Schritt: </b> Klicken Sie auf <img <?php echo createLDImgSrc('../', 'admission_data.gif', '0') ?>>.<p>
                <b>Anmerkung: </b> Dieser Knopf erscheint nur, wenn die Person derzeit station�r oder ambulant aufgenommen ist.<p>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
        <font color="#990000"><b>Wie kann ich Berichte anzeigen lassen?</b></font>
        <ul>
            <b>Schritt: </b> Klicken Sie auf <img <?php echo createComIcon('../', 'info3.gif', '0') ?>>.<p>
                <b>Anmerkung: </b>Dieser Knopf erscheint nur, wenn die Bericht-Daten nicht vollst�dig in der Vorschau angezeigt werden k�nnen.<p>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
        <font color="#990000"><b>Wie erzeuge ich aus dem Bericht ein PDF-Dokument?</b></font>
        <ul>
            <b>Schritt: </b> Klicken Sie auf <img <?php echo createComIcon('../', 'pdf_icon.gif', '0') ?>>.<p>
        </ul>

        <?php
    } else {

        if ($src == 'sickness') {
            ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
            <font color="#990000"><b>Wie wechsle ich die Abteilung?</b></font>
            <ul>
                <b>Schritt 1: </b> W�hlen Sie die Abteilung aus der Auswahlbox " <img <?php echo createComIcon('../', 'bul_arrowgrnlrg.gif', '0') ?>>."<p>
                    <b>Schritt 2: </b> Klicken Sie auf "Los".<p>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
            <font color="#990000"><b>Wie speichere ich die Best�tigung?</b></font>
            <ul>
                <b>Schritt: </b> Klicken Sie auf <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>>.<p>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
            <font color="#990000"><b>Wie drucke ich die Best�tigung aus?</b></font>
            <ul>
                <b>Schritt: </b> Klicken Sie auf <img <?php echo createLDImgSrc('../', 'printout.gif', '0') ?>>.<p>
            </ul>

            <?php
        } elseif ($src == 'diagnostics') {
            ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
            <font color="#990000"><b>Es sind noch keine Daten vorhanden. Wie erfasse ich Daten?</b></font>
            <ul>
                <b>Anmerkung: </b> Neue Untersuchungsbefunde oder Berichte k�nnen nur �ber die entsprechenden Labor- oder Diagnostik-Module eingegeben
                werden. Im Aufnahme-Modul k�nnen sie nur gelesen werden.<p>
            </ul>
            <?php
        } elseif ($src == 'Anmerkungs') {
            ?>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
            <font color="#990000"><b>Es sind noch keine Daten vorhanden. Wie erfasse ich Daten?</b></font>
            <ul>
                <b>Schritt: </b> Klicken Sie auf " <img <?php echo createComIcon('../', 'bul_arrowgrnlrg.gif', '0') ?>> <font color=#0000ff><b>Neuen Datensatz eingeben</b></font>".<p>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
            <font color="#990000"><b>Wie komme ich wieder zur�ck zum Options-Men�?</b></font>
            <ul>
                <b>Schritt: </b> Klicken Sie auf " <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> <font color=#0000ff><b>Zur�ck zu den Optionen</b></font>".<p>
            </ul>

            <?php
        } else {
            ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
            <font color="#990000"><b>Es sind noch keine Daten vorhanden. Wie erfasse ich Daten?</b></font>
            <ul>
                <b>Schritt: </b> Klicken Sie auf " <img <?php echo createComIcon('../', 'bul_arrowgrnlrg.gif', '0') ?>> <font color=#0000ff>Neuen Datensatz eingeben</font> ".<p>
            </ul>

            <?php
        }
    }
} else {
    ?>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
    <font color="#990000"><b>Wie erzeuge ich den Datensatz?</b></font>

    <ul>
        <b>Schritt: </b> Geben Sie die Information ein und klicken dann auf <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>>.
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>>
    <font color="#990000"><b>Wie gebe ich das Datum ein?</b></font>
    <ul>
        <b>Schritt 1: </b> Klicken Sie auf <img <?php echo createComIcon('../', 'show-calendar.gif', '0') ?>>, um einen Mini-Kalender anzuzeigen.<p>
        <img src="../help/en/img/en_date_select.png"><p>
            <b>Schritt 2: </b> Klicken Sie dort auf das entsprechende Datum.<p>
        <img src="../help/en/img/en_mini_calendar.png"><p>
            <b>ODER: </b> F�r "heute" bzw. "gestern" k�nnen sie auch einfach "h" bzw. "g" (oder "H" bzw. "G") eingeben.<p>

    </ul>
    <?php
}
?>
