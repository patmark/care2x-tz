<font face="Verdana, Arial" size=3 color="#0000cc">
<b>Radiological test request</b></font>
<p>
    <font size=2 face="verdana,arial" >

    <?php
    if (!$src) {
        ?>
        <a name="sday"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
        The patient's label  is not attached. What should I do?</b></font>
    <ul> 
        <b>Step 1: </b>Enter  either a full information or a few letters from a patient's information, like for example first name, or family name, 
        or the encounter number.
        <p>Example 1: enter "21000012" or "12".
            <br>Example 2: enter "Guerero" or "gue".
        <br>Example 3: enter "Alfredo" or "Alf".<p>
            <b>Step 2: </b>Click the <img <?php echo createLDImgSrc('../', 'searchlamp.gif', '0') ?>> button to start searching. <p>
            <b>Step 3: </b> If the search finds a result, select the right person from the displayed list by clicking its 
            <img <?php echo createLDImgSrc('../', 'ok_small.gif', '0') ?>> button.
    </ul>
    <?php
}
?>



<a name="sel"><img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b></a>
How to create a radiological test request?</b></font>
<ul> 
    <b>Step 1: </b>Check the checkbox of the test category that you want.<p>
        <b>Step 2: </b>Check the radiobuttons  that inform about the patient's current situation.<p>
        <b>Step 3: </b>In the "Clinical information" text area, type diagnoses, history, and supplemental information.<p>
        <b>Step 4: </b>In the "Requested diagnostic test" text area, type the requested test in details.<p>
</ul>


<img <?php echo createComIcon('../', 'frage.gif', '0') ?>> <font color="#990000"><b>
    How to send the request?</b></font>
<ul> 	
    <b>Step: </b>Click the <img <?php echo createLDImgSrc('../', 'abschic.gif', '0') ?> align="absmiddle">  button.<br>
</ul>



