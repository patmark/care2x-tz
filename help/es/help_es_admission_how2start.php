<?php
$foreword = '
<form action="#">

<font face="Verdana, Arial" size=3 color="#0000cc">
<b>C�mo empezar ';

switch ($x1) {
    case "entry": print $foreword . 'la admisi�n de un paciente nuevo';
        break;
    case "search": print $foreword . 'la b�squeda de los datos de admisi�n de un paciente';
        break;
    case "archiv": print $foreword . 'su investigaci�n en los archivos';
        break;
}
?>

<?php if (!$x1) : ?>
    <?php require("help_en_main.php"); ?>
<?php else : ?>
    </b></font>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <p>
        <font face="Verdana, Arial" size=2> 
    <?php if ($src != $x1) : ?>
            <b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Paso 1</font></b> 
        <ul>
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> D� clic en el bot�n 
            <img src="../gui/img/control/default/es/es<?php
            switch ($x1) {
                case "entry": print '_ein-gray.gif';
                    break;
                case "search": print '_such-gray.gif';
                    break;
                case "archiv": print '_arch-gray.gif';
                    break;
            }
            ?>" border="0">. </font> 
        </ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Paso 2</b> 
        <?php endif; ?>
    </font> 
    <ul>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Si usted ya ingres� 
        su nombre y contrase�a y tiene permiso para ver esta funci�n, aparecer� el 
        <?php
        switch ($x1) {
            case "entry": print 'formulario de admisi�n del paciente';
                break;
            case "search": print 'campo de b�squeda';
                break;
            case "archiv": print 'campo para buscar en el archivo';
                break;
        }
        ?>
        en la ventana principal.<br>
        De otro modo, se le pedir� que escriba su nombre y contrase�a. </font><font face="Verdana, Arial, Helvetica, sans-serif">
        <p><font size="2"> Ingr�selos y d� clic en el bot�n <img <?php echo createLDImgSrc('../', 'continue.gif', '0') ?>>.</font>
        <p><font size="2"> Si desea salir de esta ventana, d� clic en el bot�n <img <?php echo createLDImgSrc('../', 'cancel.gif', '0') ?>>. 
            </font>
        </font></ul>


    </form>
<?php endif; ?>
