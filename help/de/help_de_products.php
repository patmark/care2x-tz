<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
?>
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>
    <?php
    if ($x2 == "pharma")
        print "Apotheke - ";
    else
        print "Medicallager - ";
    switch ($src) {
        case "head": if ($x2 == "pharma")
                print "Bestellung von Arzneimittel";
            else
                print "Bestellung von Produkten";
            break;
        case "catalog": print "Bestellkatalog";
            break;
        case "orderlist": print "Bestellkorb (Bestellungsliste";
            break;
        case "final": print "Endgultige Bestelliste";
            break;
        case "maincat": print "Bestellkatalog";
            break;
        case "arch": print "Bestellungsarchiv";
            break;
        case "archshow": print "Bestellungsarchiv";
            break;
        case "db": switch ($x3) {
                case "input": print "Eingabe von neuen Produkten in die Datenbak";
                    break;
            }
            break;
        case "how2":print "Wie bestelle ich ";
            if ($x2 == "pharma")
                print "Arzneimittel";
            else
                print "Produkte";
    }
    ?></b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >
<?php if ($src == "maincat") : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie stelle ich einen Artikel in den Bestellkatalog?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Suche zuerst den Artikel. 
            Gibt entweder eine vollst�ndige Information oder die erste Zeichen von dem Markennamen des Artikels, oder seinem Generic, oder seiner Bestellnummer, usw. in das Feld
            <nobr><span style="background-color:yellow" >" Geben Sie einen Suchbegriff ein: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> ein.<br>
            <b>Schritt 2: </b>Klickt den <input type="button" value="Artikel suchen"> Knopf an um den Artikel zu suchen.<br>
            <b>Schritt 3: </b>Wenn die Suche einen Artikel findet der dem Suchbegriff exakt anspricht, werden alle Information �ber den Artikel gezeigt.<br>
            <b>Schritt 4: </b>Klickt den <input type="button" value="Diesen Artikel in den Katalog stellen"> Knopf an um den Artikel in den Katalog zu stellen.<p>
                <b>Achtung! </b>Wenn Sie den Artikel nicht m�chten suchen Sie einfach weiter.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie suche ich weiter?</b>
        </font>
        <ul>       	
            Folge die oben beschriebene Anweisungen um nach einem Artikel zu suchen.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Die Suche liefert mehrere Artikel die dem Suchbegriff ann�hernd ansprechen. Was soll ich tun?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Wenn mehrere Artikel gefunden werden, wird eine Liste gezeigt.<br>
            <b>Schritt 2: </b>Klickt den <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?>> Knopf des Artikels. Der Artikel wird in den Katalog gestellt.<br>
            <b>Schritt 3: </b>Wenn Sie vorher die Information �ber den Artikel sehen m�chten, klickt entweder seinen Namen oder das Symbol <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> an.<br>
            <b>Schritt 4: </b>Die komplette Information �ber den Artikel wird gezeigt.<br>
            <b>Schritt 4: </b>Klickt den <input type="button" value="Diesen Artikel in den Katalog stellen"> Knopf an um den Artikel in den Katalog zu stellen.<p>
        </ul>


        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Ich m�chte mehr Information �ber den Artikel sehen. Was soll ich tun?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt das Symbol <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> an.<br>
            <b>Schritt 2: </b>Die komplette Information �ber den Artikel wird gezeigt.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie entferne ich einen Artikel aus dem Katalog?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt den <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> Knopf des Artikels an.<br>
        </ul>

<?php endif; ?>

<?php if ($src == "how2") : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie bestelle ich <?php if ($x2 == "pharma") print "Arzneimittel";
    else print "Produkte aus dem Medicallager"; ?>?
        </b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt die Option "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'bestell.gif', '0') ?>> <?php if ($x2 == "pharma") print "Apothekenbestellung";
    else print "Bestellung"; ?> </span>" an um in den Bestellmodus zu gehen.<br>
            <b>Schritt 2: </b>Wenn Sie sich vorher angemeldet haben werden die Bestellkorb und Bestellkatalog gezeigt. Ansonsten werden Sie nach Ihrem
            Benutzernamen und Passwort gefragt.<br>

            <b>Schritt 3: </b>Falls erforderlich geben Sie Ihren Benutzernamen und Passwort ein. Klickt den <img <?php echo createLDImgSrc('../', 'continue.gif', '0') ?>> Knopf an.<br>
            <b>Schritt 4: </b>Sie k�nnen dann eine Bestellungsliste erstellen. Auf dem rechten Rahmen sehen Sie den Bestellkatalog von Ihrer Abteilung, oder Station, oder OP Saal, usw.<p>
                <b>Schritt 5: </b>Wenn der Artikel den Sie bestellen m�chten in der Katalogliste ist, klickt seinen <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> Knopf an um  in den Bestellkorb auf dem linken Rahmen <b>ein St�ck</b> von dem Artikel zu stellen.<p>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Ich m�chte aber mehr als ein St�ck von dem Artikel in den Bestellkorb stellen. Wie geht das?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt den Checkbox <input type="checkbox" name="a" value="a" checked> des Artikels im Katalog an.<br>
            <b>Schritt 2: </b>Gibt die St�ckzahl in das Feld " St�ck <input type="text" name="d" size=2 maxlength=2> " ein.<br>
            <b>Schritt 3: </b>Klickt den <input type="button" value="In den Bestellkorb stellen"> Knopf an um den Artikel in den Bestellkorb zu stellen.<p>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Der Artikel den ich brauche ist nicht im Katalog. Was soll ich tun?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Sie m�ssen den Artikel suchen. 
            Gibt entweder eine vollst�ndige Information oder die erste Zeichen von dem Markennamen des Artikels, oder seinem Generic, oder seiner Bestellnummer, usw. in das Feld
            <nobr><span style="background-color:yellow" >" Suchbegriff f�r den Artikel: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> ein.<br>
            <b>Schritt 2: </b>Klickt den <input type="button" value="Artikel suchen"> Knopf an um den Artikel zu suchen.<br>
            <b>Schritt 3: </b>Wenn die Suche ein Artikel bzw. mehrere Artikel findet, wird eine Liste gezeigt.<br>
            <b>Schritt 4: </b>Wenn Sie nur ein St�ck von dem Artikel bestellen m�chten, klickt den <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> Knopf an. 
            Der Artikel wird in den Bestellkorb gestellt. Gleichzeitig wird er auch in den Katalog gestellt.<br>
            <b>Schritt 5: </b>Wenn Sie den Artikel nur in den Katalog stellen m�chten, klickt den <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?>> Knopf an.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Ich m�chte mehr Information �ber den Artikel sehen. Was soll ich tun?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt entweder den Namen des Artikels oder das Symbol <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> an.<br>
            <b>Schritt 2: </b>Ein Fenster mit der Information �ber den Artikel �ffnet sich.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie entferne ich einen Artikel aus dem Katalog?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt den <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> Knopf des Artikels an.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Kann ich die St�ckzahl des Artikels im Bestellkorb �ndern?
        </b>
        </font>
        <ul>       	
            <b>Ja.</b> �berschreibe einfach die Eingabe mit der neuen St�ckzahl.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Alle Artikel zum Bestellen sind jetzt im Bestellkorb. Was soll ich jetzt tun?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Sende die Bestellungsliste in  <?php if ($x2 == "pharma") print "die Apotheke";
    else print "den Medicallager"; ?>. 
            <br>Klickt den <input type="button" value="Endg�ltige Bestellungsliste erstellen"> Knopf an um weiter zu gehen.<br>
            <b>Schritt 2: </b>Die Bestellungsliste wird wieder gezeigt. Gibt Ihren Namen in das Feld <nobr>"<span style="background-color:yellow" > Erstellt von <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> ein.<br>
            <b>Schritt 3: </b>W�hle die Priorit�tklasse der Bestellung zwischen "<span style="background-color:yellow" > Normal<input type="radio" name="x" value="s" checked> Eilig<input type="radio" name="x" > </span>" aus. Klickt den entsprechenden Knopf an.<br>
            <b>Schritt 4: </b>Der Arzt muss seinen Namen in das Feld  <nobr>"<span style="background-color:yellow" > Best�tigt von <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> eingeben.<br>
            <b>Schritt 5: </b>Der Arzt muss sein Passwort in das Feld <nobr>"<span style="background-color:yellow" > Passwort: <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> eingeben.<br>
            <b>Schritt 6: </b>Klickt den <input type="button" value="Bestellungsliste an <?php if ($x2 == "pharma") print "die Apotheke";
    else print "den Medicallager"; ?> senden"> Knopf an.<br>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Achtung!</b></font> 
        <ul>       	
            Wenn Sie die Bestellungsliste nicht senden m�chten klicken Sie die Option "<span style="background-color:yellow" > << Zur�ck und noch mal bearbeiten </span>" an.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Ich m�chte die Bestellung beenden. Wie geht das?</b>
        </font>
        <ul>     
            <b>Schritt 1: </b>Klickt die Option "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> Bestellung beenden und verlassen</span>" an um in <?php if ($x2 == "pharma") print "die Apotheke";
    else print "den Medicallager"; ?> zur�ck zu gehen.<br>
        </ul>	
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie erstelle ich eine neue Bestellungsliste?</b>
        </font>
        <ul>     
            <b>Schritt 1: </b>Klickt die Option "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> Eine neue Bestellungsliste erstellen bzw. einen leeren Bestellkorb erzeugen </span>" an.<br>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Achtung!</b></font> 
        <ul>       	
            Sie bekommen weitere Hilfsanweisungen durch Anklicken des Symbols <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> innerhalb des Bestellkorbes bzw. Katalogs .
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Achtung!</b></font> 
        <ul>       	
            Wenn Sie abbrechen m�chten klickt den <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> Knopf an.
        </ul>
<?php endif; ?>


<?php if ($src == "head") : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie bestelle ich <?php if ($x2 == "pharma") print "Arzneimittel";
    else print "Produkte aus dem Medicallager"; ?>?
        </b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Erstelle zuerst die Bestellungsliste. Auf dem rechten Rahmen sehen Sie den Bestellkatalog von Ihrer Abteilung, oder Station, oder OP Saal, usw.<p>
                <b>Schritt 2: </b>Wenn der Artikel den Sie bestellen m�chten in der Katalogliste ist, klickt seinen <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> Knopf an um  in den Bestellkorb auf dem linken Rahmen <b>ein St�ck</b> von dem Artikel zu stellen.<p>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Achtung!</b></font> 
        <ul>       	
            Sie bekommen weitere Hilfsanweisungen durch Anklicken des Symbols <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> innerhalb des Bestellkorbes bzw. Katalogs .
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Achtung!</b></font> 
        <ul>       	
            Wenn Sie abbrechen m�chten klickt den <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> Knopf an.
        </ul>
<?php endif; ?>

<?php if ($src == "catalog") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie stelle ich einen Artikel in den Bestellkatalog?</b>
    </b>
    </font>
    <ul>       	
        <b>Schritt 1: </b>Wenn der Artikel den Sie bestellen m�chten in der Katalogliste ist, klickt seinen <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> Knopf an um  in den Bestellkorb auf dem linken Rahmen <b>ein St�ck</b> von dem Artikel zu stellen.<p>
    </ul>

    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Ich m�chte aber mehr als ein St�ck von dem Artikel in den Bestellkorb stellen. Wie geht das?</b>
    </font>
    <ul>       	
        <b>Schritt 1: </b>Klickt den Checkbox <input type="checkbox" name="a" value="a" checked> des Artikels im Katalog an.<br>
        <b>Schritt 2: </b>Gibt die St�ckzahl in das Feld " St�ck <input type="text" name="d" size=2 maxlength=2> " ein.<br>
        <b>Schritt 3: </b>Klickt den <input type="button" value="In den Bestellkorb stellen"> Knopf an um den Artikel in den Bestellkorb zu stellen.<p>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Der Artikel den ich brauche ist nicht im Katalog. Was soll ich tun?</b>
    </font>
    <ul>       	
        <b>Schritt 1: </b>Sie m�ssen den Artikel suchen. 
        Gibt entweder eine vollst�ndige Information oder die erste Zeichen von dem Markennamen des Artikels, oder seinem Generic, oder seiner Bestellnummer, usw. in das Feld
        <nobr><span style="background-color:yellow" >" Suchbegriff f�r den Artikel: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> ein.<br>
        <b>Schritt 2: </b>Klickt den <input type="button" value="Artikel suchen"> Knopf an um den Artikel zu suchen.<br>
        <b>Schritt 3: </b>Wenn die Suche ein Artikel bzw. mehrere Artikel findet, wird eine Liste gezeigt.<br>
        <b>Schritt 4: </b>Wenn Sie nur ein St�ck von dem Artikel bestellen m�chten, klickt den <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> Knopf an. 
        Der Artikel wird in den Bestellkorb gestellt. Gleichzeitig wird er auch in den Katalog gestellt.<br>
        <b>Schritt 5: </b>Wenn Sie den Artikel nur in den Katalog stellen m�chten, klickt den <img <?php echo createComIcon('../', 'dwnarrowgrnlrg.gif', '0') ?>> Knopf an.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Ich m�chte mehr Information �ber den Artikel sehen. Was soll ich tun?</b>
    </font>
    <ul>       	
        <b>Schritt 1: </b>Klickt entweder den Namen des Artikels oder das Symbol <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> an.<br>
        <b>Schritt 2: </b>Ein Fenster mit der Information �ber den Artikel �ffnet sich.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Wie entferne ich einen Artikel aus dem Katalog?</b>
    </font>
    <ul>       	
        <b>Schritt 1: </b>Klickt den <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> Knopf des Artikels an.<br>
    </ul>

<?php endif; ?>

<?php if ($src == "orderlist") : ?>
    <?php if ($x1 == "0") : ?>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Achtung!</b></font> 
        <ul>       	
            Der Bestellkorb ist momentan leer.<p>
                Um eine Bestellungsliste zu erstellen, w�hle ein Artikel aus dem Katalog auf dem rechten Rahmen aus.
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie stelle ich einen Artikel in den Bestellkatalog?</b>
        </b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Wenn der Artikel den Sie bestellen m�chten in der Katalogliste ist, klickt seinen <img <?php echo createComIcon('../', 'l-arrowgrnlrg.gif', '0') ?>> Knopf an um  in den Bestellkorb auf dem linken Rahmen <b>ein St�ck</b> von dem Artikel zu stellen.<p>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Achtung!</b></font> 
        <ul>       	
            Um weitere Hilfe wie man einen Artikel sucht, ausw�hlt, bestellt, usw. zu bekommen, klickt das Symbol <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> im Katalog an.<p>
        </ul>

    <?php else : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Kann ich die St�ckzahl des Artikels im Bestellkorb �ndern?
        </b>
        </font>
        <ul>       	
            <b>Ja.</b> �berschreibe einfach die Eingabe mit der neuen St�ckzahl.
        </ul>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Ich m�chte mehr Information �ber den Artikel sehen. Was soll ich tun?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt entweder den Namen des Artikels oder das Symbol <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> an.<br>
            <b>Schritt 2: </b>Ein Fenster mit der Information �ber den Artikel �ffnet sich.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie entferne ich einen Artikel aus dem Katalog?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt den <img <?php echo createComIcon('../', 'delete2.gif', '0', 'absmiddle') ?>> Knopf des Artikels an.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Alle Artikel zum Bestellen sind jetzt im Bestellkorb. Was soll ich jetzt tun?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Sende die Bestellungsliste in  <?php if ($x2 == "pharma") print "die Apotheke";
        else print "den Medicallager"; ?>. 
            <br>Klickt den <input type="button" value="Endg�ltige Bestellungsliste erstellen"> Knopf an um weiter zu gehen.<br>
            <b>Schritt 2: </b>Die Bestellungsliste wird wieder gezeigt. Gibt Ihren Namen in das Feld <nobr>"<span style="background-color:yellow" > Erstellt von <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> ein.<br>
            <b>Schritt 3: </b>W�hle die Priorit�tklasse der Bestellung zwischen "<span style="background-color:yellow" > Normal<input type="radio" name="x" value="s" checked> Eilig<input type="radio" name="x" > </span>" aus. Klickt den entsprechenden Knopf an.<br>
            <b>Schritt 4: </b>Der Arzt muss seinen Namen in das Feld  <nobr>"<span style="background-color:yellow" > Best�tigt von <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> eingeben.<br>
            <b>Schritt 5: </b>Der Arzt muss sein Passwort in das Feld <nobr>"<span style="background-color:yellow" > Passwort: <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> eingeben.<br>
            <b>Schritt 6: </b>Klickt den <input type="button" value="Bestellungsliste an <?php if ($x2 == "pharma") print "die Apotheke";
        else print "den Medicallager"; ?> senden"> Knopf an.<br>
        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Achtung!</b></font> 
        <ul>       	
            Wenn Sie die Bestellungsliste nicht senden m�chten klicken Sie die Option "<span style="background-color:yellow" > << Zur�ck und noch mal bearbeiten </span>" an.
        </ul>
    <?php endif; ?>

<?php endif; ?>


<?php if ($src == "final") : ?>
    <?php if ($x1 == "1") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Ich m�chte die Bestellung beenden. Wie geht das?</b>
        </font>
        <ul>     
            <b>Schritt 1: </b>Klickt die Option "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> Bestellung beenden und verlassen</span>" an um in <?php if ($x2 == "pharma") print "die Apotheke";
        else print "den Medicallager"; ?> zur�ck zu gehen.<br>
        </ul>	
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie erstelle ich eine neue Bestellungsliste?</b>
        </font>
        <ul>     
            <b>Schritt 1: </b>Klickt die Option "<span style="background-color:yellow" > <img <?php echo createComIcon('../', 'arrow-blu.gif', '0') ?>> Eine neue Bestellungsliste erstellen bzw. einen leeren Bestellkorb erzeugen </span>" an.<br>
        </ul>
    <?php else : ?>

        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie sende ich die endg�ltige Bestellungsliste?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Gibt Ihren Namen in das Feld <nobr>"<span style="background-color:yellow" > Erstellt von <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> ein.<br>
            <b>Schritt 2: </b>W�hle die Priorit�tklasse der Bestellung zwischen "<span style="background-color:yellow" > Normal<input type="radio" name="x" value="s" checked> Eilig<input type="radio" name="x" > </span>" aus. Klickt den entsprechenden Knopf an.<br>
            <b>Schritt 3: </b>Der Arzt muss seinen Namen in das Feld  <nobr>"<span style="background-color:yellow" > Best�tigt von <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> eingeben.<br>
            <b>Schritt 4: </b>Der Arzt muss sein Passwort in das Feld <nobr>"<span style="background-color:yellow" > Passwort: <input type="text" name="c" size=15 maxlength=10> </span>"</nobr> eingeben.<br>
            <b>Schritt 5: </b>Klickt den <input type="button" value="Bestellungsliste an <?php if ($x2 == "pharma") print "die Apotheke";
        else print "den Medicallager"; ?> senden"> Knopf an.<br>

        </ul>
        <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Achtung!</b></font> 
        <ul>       	
            Wenn Sie die Bestellungsliste nicht senden m�chten klicken Sie die Option "<span style="background-color:yellow" > << Zur�ck und noch mal bearbeiten </span>" an.
        </ul>
    <?php endif; ?>

<?php endif; ?>
<!-- ++++++++++++++++++++++++++++++++++ archive +++++++++++++++++++++++++++++++++++++++++++ -->
<?php if ($src == "arch") : ?>


    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
    <font color="#990000"><b>Ich m�chte die Bestellungsliste im Archiv sehen. Wie geht das?</b></font>
    <ul>  	<b>Schritt 1: </b>
        Gibt entweder eine vollst�ndige Information oder die erste Zeichen von Namen der Abteilung, oder dem Bestellungsdatum, oder die Priorit�tsklasse ("eilig") in das Feld
        <nobr><span style="background-color:yellow" >" Suchbegriff f�r die Bestellungsliste: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> ein.<br>
        <b>Schritt 2: </b>Aktiviere bzw deaktiviere die folgende Checkboxen:
        <ul> 	
            <input type="checkbox" name="d" checked> Datum<br>
            <input type="checkbox" name="d" checked> Abteilung<br>
            <input type="checkbox" name="d" checked> Priotit�t<br>
            Im Normalfall sind alle drei Checkboxes aktiviert und die Suche sucht in allen drei Kategorien.
        </ul> 	
        <b>Schritt 3: </b>Klickt den <input type="button" value="Suchen"> Knopf an um die Bestellungsliste zu suchen.<br>
        <b>Schritt 4: </b>Wenn die Suche Ergebnisse findet wird eine Liste gezeigt.<br>
        <b>Schritt 5: </b>Klickt den <img <?php echo createComIcon('../', 'uparrowgrnlrg.gif', '0') ?>> Knopf einer Bestellungsliste an. Die Details werden gezeigt.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
    <font color="#990000"><b>Mehrere Bestellungslisten sind aufgelistet. Wie �ffne ich eine Bestellungsliste?</b></font>
    <ul>  	
        <b>Schritt 1: </b>Klickt den <img <?php echo createComIcon('../', 'uparrowgrnlrg.gif', '0') ?>> Knopf einer Bestellungsliste an. Die Details werden gezeigt.<br>
    </ul>

    <img <?php echo createComIcon('../', 'warn.gif', '0', 'absmiddle') ?>> <font color="#990000"><b> Achtung!</b></font> 
    <ul>       	
        Wenn Sie die Suche beenden m�chten klickt den <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> Knopf an.
    </ul>


<?php endif; ?>

<?php if ($src == "archshow") : ?>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Ich m�chte mehr Information �ber den Artikel sehen. Was soll ich tun?</b>
    </font>
    <ul>       	
        <b>Schritt 1: </b>Klickt das Symbol <img <?php echo createComIcon('../', 'info3.gif', '0') ?>> an.<br>
        <b>Schritt 2: </b>Ein Fenster mit der Information �ber den Artikel �ffnet sich.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Ich m�chte die Liste wieder sehen. Was soll ich tun?</b>
    </font>
    <ul>       	
        <b>Schritt 1: </b>Klickt den <input type="button" value="<< Zur�ck"> Knopf an.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> 
    <font color="#990000"><b>Ich m�chte eine neue Suchen nach Bestellungslisten starten. Was soll ich tun?</b></font>
    <ul>  
        <b>Schritt 1: </b>Gibt entweder eine vollst�ndige Information oder die erste Zeichen von Namen der Abteilung, oder dem Bestellungsdatum, oder die Priorit�tsklasse ("eilig") in das Feld
        <nobr><span style="background-color:yellow" >" Suchbegriff f�r die Bestellungsliste: <input type="text" name="s" size=10 maxlength=10> "</span></nobr> ein.<br>
        <b>Schritt 2: </b>Aktiviere bzw deaktiviere die folgende Checkboxen:
        <ul> 	
            <input type="checkbox" name="d" checked> Datum<br>
            <input type="checkbox" name="d" checked> Abteilung<br>
            <input type="checkbox" name="d" checked> Priotit�t<br>
            Im Normalfall sind alle drei Checkboxes aktiviert und die Suche sucht in allen drei Kategorien.
        </ul> 	
        <b>Schritt 3: </b>Klickt den <input type="button" value="Suchen"> Knopf an um die Bestellungsliste zu suchen.<br>
        <b>Schritt 4: </b>Wenn die Suche Ergebnisse findet wird eine Liste gezeigt.<br>
        <b>Schritt 5: </b>Klickt den <img <?php echo createComIcon('../', 'uparrowgrnlrg.gif', '0') ?>> Knopf einer Bestellungsliste an. Die Details werden gezeigt.<br>
    </ul>
<?php endif; ?>	


<?php if ($src == "db") : ?>
    <?php if ($x1 == "") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie gebe ich ein neues Produkt in die Datenbank ein?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Gibt zuerst alle vorhandene Information �ber das Produkt in die entsprechende Eingabefelder ein.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Wie w�hle ich ein Bild f�r das Produkt aus?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Klickt den <input type="button" value="Durchsuchen..."> Knopf am Feld "<span style="background-color:yellow" > Bilddatei </span>" an.<br>
            <b>Schritt 2: </b>Einf kleines Fenster zum ausw�hlen von Dateien �ffnet sich. W�hle die gew�nschte Bilddatei aus und klickt "OK" an.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            I am finished entering all available product information. How to save it?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Click the button <input type="button" value="Save">.<br>
        </ul>
    <?php endif; ?>	
    <?php if ($x1 == "save") : ?>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            How to enter a new product into the databank?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Click the <input type="button" value="New product"> button.<br>
            <b>Schritt 2: </b>The entry form will appear.<br>
            <b>Schritt 3: </b>Enter the available information about the new product.<br>
            <b>Schritt 4: </b>Click the button <input type="button" value="Save"> to save the information.<br>
        </ul>
        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            I want to edit the product that is currently displayed How to do it?</b>
        </font>
        <ul>       	
            <b>Schritt 1: </b>Click the button <input type="button" value="Updte or edit">.<br>
            <b>Schritt 2: </b>The product information will be automatically entered into the editing form.<br>
            <b>Schritt 3: </b>Edit the information.<br>
            <b>Schritt 4: </b>Click the button <input type="button" value="Save"> to save the new information.<br>
        </ul>

    <?php endif; ?>	
<?php endif; ?>	
</form>

