<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Aufnahme eines neuen Patienten</b></font>
<p><font size=2 face="verana,arial" >
<form action="#" >
    <b>Schritt 1</b>

    <ul> 
        <font color=#ff0000>Pr�fen Sie zuerst nach ob der Patient schon im System registriert ist</font>.<p>
            Geben Sie entweder eine vollst�ndige Information oder die erste Zeichen von der Fallnummer, oder dem Namen, oder Vornamen vom Patienten 
            ein.
        <p>Beispiel 1: "21000012" oder "12".
            <br>Beispiel 2: "Guerero" oder "gue".
            <br>Beispiel 3: "Alfredo" oder "Alf".

    </ul>
    <b>Schritt 2</b>

    <ul> 

        Klicken Sie den <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> Knopf um die Suche zu starten. Die Suche wird in das Anmeldemodul
        umgeleitet.

    </ul>
    <b>Schritt 3</b>
    <ul> 
        Falls die Suche kein Ergebnis liefert m�ssen Sie die Person zuerst anmelden. Folgen Sie bitte daf�r die Anmeldeanleitung.
    </ul>

    <b>Schritt 4</b>
    <ul> 
        Falls die Suche die Person findet klicken Sie den  <img <?php echo createLDImgSrc('../', 'ok_small.gif', '0') ?>> Knopf neben dem Geburtsdatum an.
    </ul>


    <b>Schritt 5</b>
    <ul> 
        Geben Sie die Daten in das Aufnahmeformular ein. 
    </ul>

    <b>Schritt 6</b>
    <ul> 
        Klicken Sie den <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> Knopf zum Speichern an.<p>
    </ul>

    <b>Merke!</b>

    <ul> 
        Falls wichtige Daten fehlen wird ein kleines Fenster gezeigt und Sie werden dazu aufgef�rdert die Daten einzugeben.
        In manchen F�llen wird das Formular noch mal eingeblendet und Sie werden dazu aufgef�rdert die fehlende Daten in die rot markierte Felder einzugeben.
        Danach klicken Sie den <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> Knopf.<p>
    </ul>
    <b>Merke!</b>
    <ul> Falls Sie die unvollst�ndige Daten trotzdem speichern m�chten klicken Sie den <input type="button" value="Trotzdem speichern"> Knopf an.
    </ul>
    <b>Merke!</b>
    <ul> Falls Sie abbrechen m�chten klicken Sie den <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>> Knopf an.

    </ul>


</form>

