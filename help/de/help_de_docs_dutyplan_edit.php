<?php
error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
?>
<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Erstellen eines Dienstplans - �rzte</b></font>
<form action="#" >
    <p><font size=2 face="verdana,arial" >


        <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
            Ich m�chte einen Arzt einplanen anhand der �rzteliste. Wie geht das?</b></font>
    <ul> <b>Schritt 1: </b>Den  &nbsp;<button><img <?php echo createComIcon('../', 'patdata.gif', '0') ?>></button> Knopf des entsprechenden Tages anklicken um die �rzteliste zu �ffnen. <br>
        Ein kleines Fenster mit der �rzteliste wird sich �ffnen .<br>
        <ul type=disc>
            <li>Um einen Arzt in Dienst einzuplanen klicken Sie den Knopf auf der linken Spalte an.<br>
            <li>Um einen Arzt in Hintergrunddienst einzuplanen klicken Sie den Knopf auf der rechten Spalte an.<br>
        </ul>
        <b>Schritt 2: </b><span style="background-color:yellow" >Den Namen des Arztes</span> in �rzteliste anklicken um ihn in den Dienstplan zu �bertragen.<br>
        <b>Schritt 3: </b>Falls Sie den falschen Namen angeklickt haben wiederholen Sie den Schritt 2.<br>
        <b>Schritt 4: </b>Wenn Sie fertig sind den <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> Knopf in der �rzteliste anklicken.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Ich m�chte einen Arzt manuell einplanen. Wie geht das?</b></font>
    <ul> <b>Schritt 1: </b>Das Eingabefeld  "<input type="text" name="t" size=11 maxlength=4 >" des entsprechenden Tages anklicken.<br>
        <b>Schritt 2: </b>Tippen Sie den Namen manuell ein. <br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
        Ich m�chte einen Arzt aus dem Dienstplan entfernen. Wie geht das?</b></font>
    <ul> <b>Schritt 1: </b>Das Eingabefeld  "<input type="text" name="t" size=11 maxlength=4 >" des entsprechenden Namen anklicken.<br>
        <b>Schritt 2: </b>Entfernen Sie manuell den Namen. Benutzen Sie daf�r die Tasten "Ent" oder "R�cktaste" der Tastatur.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Wie kann ich den plan speichern?</b></font>
    <ul> <b>Schritt 1: </b>Den <img <?php echo createLDImgSrc('../', 'savedisc.gif', '0') ?>> Knopf anklicken.<br>
    </ul>
    <img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>Ich habe den Plan gespeichert und ich m�chte jetzt beenden. Was soll ich tun? </b></font>
    <ul> <b>Schritt 1: </b>Wenn Sie fertig sind den <img <?php echo createLDImgSrc('../', 'close2.gif', '0') ?>> Knopf anklicken. <br>
    </ul>
</form>

