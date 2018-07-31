<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b><?php echo "Patientendaten - $x3" ?></b></font>
<form action="#" >
    <p><font size=2 face="verdana,arial" >

        <?php if ($src == "") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Was bedeuten diese Farbbalken?
            </b> <img <?php echo createComIcon('../', 'colorcodebar3.gif', '0') ?> ></font>
        <ul> <b>Anmerkung: </b>Jeder dieser Farbbalken signalisiert (sofern auf "sichtbar" gesetzt) die Verf�gbarkeit einer
            bestimmten Information, einer Anweisung, einer �nderung oder einer Anfrage etc.<br>
            Die Zuordnung der Farben kann f�r jede Station getrennt festgelegt werden.<br>
            Die rosa Balken rechts sollen den ungef�hren Zeitpunk der F�lligkeit anzeigen.<br>
            So bedeutet der sechste rosa Balken "6. Stunde" oder "6 Uhr morgens" und der 22. Balken bedeutet entsprechend
            "22 Uhr".
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wozu dienen die folgenden Kn�pfe?</b></font>
        <ul> <input type="button" value="Fieberkurve">
            <ul>
                Damit wird die Temperaturkurve des Patienten ge�ffnet. Sie k�nnen Temperatur- oder Blutdruckwerte eintragen,
                �ndern oder l�schen.<br>
                Weitere editierbare Felder sind:
                <ul type="disc">
                    <li>Allergie<br>
                    <li>T�glicher Di�tplan<br>
                    <li>Hauptdiagnose / Therapie<br>
                    <li>T�gliche Diagnose / Therapie<br>
                    <li>Anmerkungen, extra Diagnosenbr>
                    <li>PT (Physikalische Therapie), ATG (Anti-Thrombose-Gymnastik), etc.<br>
                    <li>Antikoagulantien<br>
                    <li>T�gliche Dokumentation zu den Antikoagulantien<br>
                    <li>Intraven�se Medikation & Druckverb�nde<br>
                    <li>T�gliche Dokumentation zur intraven�sen Medikation<br>
                    <li>Anmerkungen<br>
                    <li>Medikation (Liste)<br>
                    <li>T�gliche Dokumentation zur Medikation und Dosierung<br>
                </ul>
            </ul>
            <input type="button" value="Pflegebericht">
            <ul>
                Hiermit wird der Pflegebericht ge�ffnet Sie k�nnen Ihre Pflegeaktivit�ten dokumentieren, deren Effektivit�t,
                Beobachtungen, Anfragen, Empfehlungen usw.
            </ul>
            <input type="button" value="�rztliche Anweisungen">
            <ul>
                Der verantwortliche Arzt gibt hier seine Anweisungen, die Medikation, Dosierung, Antworten auf Fragen der
                Pflegepersonals, oder �nderungen ein.
            </ul>
            <input type="button" value="Diagnostische Berichte">
            <ul>
                Hier wird die Diagnostik bzw. die Befunde aus anderen Klinken und Abteilungen aufbewahrt.
            </ul>
    <!-- 	<input type="button" value="Root data">
            <ul>
            This stores the patients root data and personal information like name, given name, etc. This is also the initial documentation of the
            patient's anamnesis or medical history that serves as foundation for the individual nursing plan.
            </ul>
            <input type="button" value="Nursing Plan">
            <ul>
            This is the individual nursing plan. You can create, edit, or delete the plan.
            </ul>
            -->
            <input type="button" value="DRG">
            <ul>
                Hiermit wird das DRG-Fenster ge�ffnet.
            </ul>
            <input type="button" value="Labor">
            <ul>
                Hier sind Labor- und Pathologie-Befunde gespeichert.
            </ul>
            <input type="button" value="Photos">
            <ul>
                Damit wird das Bild-Archiv des Patienten ge�ffnet.
            </ul>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wozu dient diese Auswahlbox: </b>	<select name="d"><option value="">Anforderung f�r diagnostischen Test ausw�hlen</option></select>?
        </font>
        <ul><b>Anmerkung: </b>Hiermit wird das entsprechende Anforderungsformular f�r einen diagnostischen Test
            ausgew�hlt.<br>
            <b>Schritt 1: </b>Klicken Sie auf <select name="d"><option value="">Anforderung f�r diagnostischen Test ausw�hlen</option></select><br>
            <b>Schritt 2: </b>Klicken Sie auf die Klinik/Abteilung oder den Test.<br>
            <b>Schritt 3: </b>Das Anforderungsformular wird automatisch ge�ffnet.<br>
        </ul>
    <?php endif; ?>

    <?php if ($src == "labor") : ?>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b>Derzeit sind keine Laborbefunde verf�gbar. </b></font>
        <ul> Klicken Sie auf den Knopf <input type="button" value="OK"> um zu den Stammdaten des Patienten zur�ckzukeheren.</ul>
    <?php else : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Wie schlie�e ich die Ansicht mit den Patientendaten? </b></font>
        <ul> <b>Anmerkung: </b>Wenn Sie diese Ansicht schlie�en m�chten, klicken Sie auf <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?> align="absmiddle">.</ul>

    <?php endif; ?>

</form>
