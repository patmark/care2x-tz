<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
?>
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    Intranet Email - 
    <?php
    switch ($src) {
        case "pass": switch ($x1) {
                case "": print "Log in";
                    break;
                case "1": print "Benutzer anmelden";
                    break;
            }
            break;
        case "mail": switch ($x1) {
                case "compose": print "Email schreiben";
                    break;
                case "listmail": print "Liste der Email";
                    break;
                case "sendmail": print "Email gesendet";
                    break;
            }
            break;
        case "read": print "Email lesen";
            break;
        case "address": print "Adressenbuch";
            break;
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >



    <?php if ($src == "pass") : ?>
    <?php if ($x1 == "") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Wie kann ich mich einloggen?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Gibt Ihre Intranet Email Adresse (ohne den @xxxxxxx Teil) in das Feld <nobr>"<span style="background-color:yellow" >Ihre Email Adresse: </span>"</nobr> ein.<br>
                <b>Schritt 2: </b>W�hle den Domain Anteil aus dem Auswahlfeld <nobr>"<span style="background-color:yellow" > @<select name="d">
                            <option value="Test Domain 1"> Test Domain 1</option>
                            <option value="Test Domain 2"> Test Domain 2</option>
                        </select>
                    </span>"</nobr> aus.<br>
                <b>Schritt 3: </b>klickt den <input type="button" value="Login"> Knopf an zum einloggen.<br>
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Ich have noch keine Adresse. Wie bekomme ich eine Adresse?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Sie m�ssen sich registrieren lassen. Klickt die Option "<span style="background-color:yellow" > Neuer Benutzer kann sich hier registrieren lassen. <img <?php echo createComIcon('../', 'bul_arrowgrnsm.gif', '0') ?>> </span>" an.
                Das Anmeldeformular blendet sich ein.<br>
                <b>Schritt 2: </b>Wenn das Formular sichtbar ist k�nnen Sie weitere Hilfsanweisung durch den "Hilfe" Knopf sehen.<br>
            </ul>
    <?php endif; ?>		
    <?php if ($x1 == "1") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Wie kann ich mich anmelden?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Gibt Ihre Name und Vorname in das Feld "<span style="background-color:yellow" > Name, Vorname: </span>" ein.<br>
                <b>Schritt 2: </b>Gibt die gew�nschte Email Adresse in das Feld "<span style="background-color:yellow" > Gew�nschte Email Adresse: </span>" ein.<p>
                    <b>Schritt 3: </b>W�hle den Domain Anteil aus dem Auswahlfeld <nobr>"<span style="background-color:yellow" > @<select name="d">
                            <option value="Test Domain 1"> Test Domain 1</option>
                            <option value="Test Domain 2"> Test Domain 2</option>
                        </select>
                    </span>"</nobr> aus.<br>
                <b>Schritt 4: </b>Gibt den gew�nschten Alias in das Feld "<span style="background-color:yellow" > Alias: </span>" ein.<p>
                    <b>Schritt 5: </b>Gibt das gew�nschte Passwort in das Feld "<span style="background-color:yellow" > Gew�nschtes Passwort: </span>" ein.<br>
                    <b>Schritt 6: </b>Wiederhole das Passwort in das Feld "<span style="background-color:yellow" > Passwort noch einmal eingeben: </span>" ein.<br>
                    <b>Schritt 3: </b>Klickt den <input type="button" value="Registrieren"> Knopf an zum anmelden.<br>
            </ul>

    <?php endif; ?>		
<?php endif; ?>	

<?php if ($src == "mail") : ?>
    <?php if ($x1 == "listmail") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Wie �ffne ich einen Email zum lesen?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Klickt entweder den Empf�nger des Emails, oder seinen Sender, oder das Datum, oder das Symbol <img src="../img/c-mail.gif" border=0 align="absmiddle"> oder <img src="../img/o-mail.gif" border=0 align="absmiddle"> an.<br>
            </ul>

            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Was bedeuten diese Symbole  <img src="../img/c-mail.gif" border=0 align="absmiddle"> und <img src="../img/o-mail.gif" border=0 align="absmiddle">?</b>
            </font>
            <ul>       	
                <img src="../img/c-mail.gif" border=0 align="absmiddle"> = Email ist noch nicht ge�ffnet bzw. gelesen. <br>
                <img src="../img/o-mail.gif" border=0 align="absmiddle"> = Email wurde ge�ffnet bzw. gelesen. <br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Wie entferne ich einen Email?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Klickt den Checkbox <input type="checkbox" name="a" value="s" checked> des Emails an um ihn auszuw�hlen.<br>
                <b>Schritt 2: </b>Klickt den <input type="button" value="L�schen"> Knopf an.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Wie �ffne ich einen anderen Ordner?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Klicken Sie einfach den Ordner an.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Wie schreibe ich einen Email?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Klickt die Option "<span style="background-color:yellow" > Neue Email </span>" an.<br>
            </ul>
    <?php endif; ?>		
    <?php if ($x1 == "compose") : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Wie schreibe ich einen Email?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Gibt die Adresse des Empf�ngers in das Feld "<span style="background-color:yellow" > Empf�nger: </span>" ein.<br>
                <b>Schritt 2: </b>Um an jemand eine Kopie zu schicken, gibt die Adresse in das Feld "<span style="background-color:yellow" > (CC) </span>" ein.<br>
                <b>Schritt 3: </b>Um an jemand eine Kopie zu schicken (ohne seine Adresse zu zeigen),  gibt die Adresse in das Feld "<span style="background-color:yellow" > (BCC) </span>" ein.<br>
                <b>Schritt 4: </b>Gibt den Betreff in das Feld "<span style="background-color:yellow" > Betreff: </span>" ein.<br>
                <b>Schritt 5: </b>Jetzt schreiben Sie Ihre Nachricht in das Texteingabefeld.<br>
                <b>Schritt 6: </b>Klickt den<input type="button" value="Senden"> Knopf an zum schicken.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Ich m�chte nur eine Vorlage bzw. einen Entwurf schreiben. Wie geht das?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Schreiben Sie Ihre Nachricht im Texteingabefeld.<br>
                <b>Schritt 2: </b>Anschliessend klicken Sie den <input type="button" value="Als Vorlage speichern"> Knopf an.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Wie kann ich Adressen aus meinem Adressenbuch �bernehmen?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Klickt den <input type="button" value="Alle zeigen"> Knopf unterhalb der Option "Schnelladresse" an.<br>
                <b>Schritt 2: </b>Ein kleines Fenster mit Ihrem Adressenbuch �ffnet sich.<br>
                <b>Schritt 3: </b>Klicken Sie den entsprechenden Knopf der Adresse die Sie �bernehmen m�chten an.<p>
                <ul>   
                    Klickt den "An<input type="radio" name="t" value="a">" an um die Adresse in das "Empf�nger" Feld zu �bertragen.<br>
                    Klickt den "CC<input type="radio" name="t" value="a">" an um die Adresse in das "CC" Feld zu �bertragen.<br>
                    Klickt den "BCC<input type="radio" name="t" value="a">" an um die Adresse in das "BCC" Feld zu �bertragen.<p>
                </ul>
                <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <b>Achtung!</b> Wenn Sie eine Auswahl r�cksetzen m�chten klicken Sie
                das nebenstehende Symbol <img src="../img/redpfeil.gif" border=0> an.<br> 	
                <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <b>Achtung!</b> Sie k�nnen mehrere Adressen auf einmal ausw�hlen. 	<p>
                    <b>Schritt 4: </b>Klickt den <input type="button" value="�bertragen"> Knopf an um die ausgew�hlte Adressen in den Email zu �bertragen.<br>
                    <b>Schritt 5: </b>Klickt die Option "<span style="background-color:yellow" > <img src="../img/l_arrowGrnSm.gif" border=0> Schliessen </span>"
                    an um das Fenster zu schliessen.<br>
            </ul>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Was bringt die "Schnelladresse" Option?</b>
            </font>
            <ul>       	
                <b>Achtung! </b>Wenn Sie vorher Adressen in Ihre "Schnelladresse" cache gespeichert haben, werden die erste f�nf Adressen aufgelistet.<p>
                    <b>Schritt 1: </b>Klicken Sie zuerst das Feld an wo Sie die Adresse �bertragen m�chten (zB. "Empf�nger" oder "CC" oder "BCC").<br>
                    <b>Schritt 2: </b>Klicken Sie eine Adresse in der "Schnelladresse" Liste an. Diese Adresse wird sofort in das Feld das  Sie vorher anklickten �bertragen.<br>
            </ul>

    <?php endif; ?>		
    <?php if (($x1 == "sendmail") && ($x3 == "1")) : ?>
            <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
                Wie schreibe ich einen Email?</b>
            </font>
            <ul>       	
                <b>Schritt 1: </b>Klickt die Option "<span style="background-color:yellow" > Neue Email </span>" an.<br>
            </ul>
    <?php endif; ?>		
<?php endif; ?>	


<?php if ($src == "read") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie kann ich einen Email ausdrucken?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Clickt die Option "<span style="background-color:yellow" > Version zum ausdrucken <img src="../img/bul_arrowGrnSm.gif" border=0></span>" an.<br>
            <b>Schritt 2: </b>Ein Fenster mit der Version zum ausdrucken �ffnet sich.<br>
            <b>Schritt 3: </b>Klickt die Option "<span style="background-color:yellow" > < Ausdrucken > </span>" an.<br>
            <b>Schritt 4: </b>Das Windows� Druckmenu �ffnet sich. Klickt den "OK" bzw. "Drucken" an.<br>
            <b>Schritt 5: </b>Um das Fenster mit der Version zum ausdrucken zu schliessen, klickt die Option "<span style="background-color:yellow" > < Schliessen > </span>" an.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie kann ich den Email erneut senden?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt den <input type="button" value="Erneut senden"> Knopf an.<br>
            <b>Schritt 2: </b>Falls erforderlich bearbeiten Sie den Email.<br>
            <b>Schritt 3: </b>Klickt den <input type="button" value="Senden">Knopf an um den Email erneut zu senden.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie leite ich den Email weiter?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt den <input type="button" value="Weiterleiten"> Knopf an.<br>
            <b>Schritt 2: </b>Gibt die Adresse des Empf�ngers ein.<br>
            <b>Schritt 3: </b>Klickt den <input type="button" value="Senden">Knopf an um den Email weiterzuleiten.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie l�sche ich den Email?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt den <input type="button" value="L�schen"> Knopf an.<br>
            <b>Schritt 2: </b>Sie werden nach einer Best�tigung gefragt.<br>
            <b>Schritt 3: </b>Klickt den <input type="button" value="OK"> Knopf an um den Email zu l�schen.<p>
                <b>Achtung!</b> Die gel�schte Emails aus dem "Posteingang" werden vor�bergehend in den "Recycle" gespeichert.
        </ul>
<?php endif; ?>		

<?php if ($src == "address") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie kann ich eine Adresse in mein Adressenbuch speichern?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt den <input type="button" value="Neue Email Adresse einf�gen"> Knopf an.<br>
            <b>Schritt 2: </b>Ein Eingabeformular blendet sich ein. Gibt den Namen in das Feld "<span style="background-color:yellow" > Name, Vorname: </span>" ein.<br>
            <b>Schritt 3: </b>Gibt den Alias bzw. Kurzname in das Feld "<span style="background-color:yellow" > Alias/Kurzname: </span>" ein.<br>
            <b>Schritt 4: </b>Gibt die Email Adresse in das Feld  "<span style="background-color:yellow" > Email Adresse: </span>" ein.<br>
            <b>Schritt 5: </b>W�hle den Domain Anteil aus dem Auswahlfeld <nobr>"<span style="background-color:yellow" > @<select name="d">
                        <option value="Test Domain 1"> Test Domain 1</option>
                        <option value="Test Domain 2"> Test Domain 2</option>
                    </select>
                </span>"</nobr> aus.<br>
            <b>Schritt 6: </b>Klickt den <input type="button" value="Speichern"> Knopf an.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie entferne ich eine Adresse aus meinem Adressenbuch?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt den Checkbox <input type="checkbox" name="d" value="s" checked> der Adresse die Sie entfernen m�chten.<br>
            <b>Schritt 2: </b>Klickt den <input type="button" value="L�schen"> Knopf an.<br>
            <b>Schritt 3: </b>Sie werden nach einer Best�tigung gefragt.<br>
            <b>Schritt 4: </b>Klickt den <input type="button" value="OK"> Knopf an um die Adresse zu l�schen.<p>
        </ul>
<?php endif; ?>		

    <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b>
        Achtung!</b>
    </font>
    <ul>       	
        Intranet Email und Adressen funktionieren NUR innerhalb des Intranets und sind unbrauchbar f�r das Internet.<br>
    </ul>
</form>

