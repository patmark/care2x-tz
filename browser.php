<?php require("language/$lang/lang_" . $lang . "_startframe.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <TITLE><?php= $LDMainTitle ?></TITLE>
        <meta name="Description" content="CARE 2002  Integrated Information System of a Hospital ">
        <meta name="Keywords" content="health care, hospital, health, care, medicine, doctor, nurse, nursing, integrated information system for hospitals, integrated, information, barcode, patient, outpatient, inpatient, ambulant, emergency, unfall, notfall, praxis, hno, chirurgie, surgery, cardiology, obgyn, gyn, ambulance, CARE 2002, 2002, OSD, open source development, osd software, health care management, research institute, elpidio, latorilla, bong, elatorilla, ebong, pflege, krankenpflege, interaktiv, stuttgart, pflegebuch, handbuch, soziologie, marienhospital, online, calendar, unterricht">
        <meta name="Author" content="Elpidio Latorilla">
    </head>
    <BODY bgcolor=white>
    <center>
        <p><br><p><br>
            <font color="#990000" size=4 face="verdana,arial">
            <?php if ($b != "msie") : ?>

                <?php= $LDAlertBrowser ?>
                <BR>
            <p><br>
            <p><br>
                <font size=2 color="#000000">
                <A HREF="<?php= "index.php?lang=$lang&egal=1" ?>"><u><?php= $LDGoAheadEgal ?></u></A>
                </font>
            <?php elseif ($v < 5) : ?>

                <?php= $LDAlertOldBrowser ?>
                <BR>
            <p><br><p><br>
                <A HREF="<?php= "index.php?lang=$lang&egal=1" ?>"><u><?php= $LDGoAheadEgal ?></u></A>

            <?php endif; ?>
            </font>
    </center>
</BODY>
</html>
