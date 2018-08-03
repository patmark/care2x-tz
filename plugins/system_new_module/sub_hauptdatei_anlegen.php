<?PHP
/***************************************************/
   /*** H A U P T D A T E I    E R S T E L L E N ***/
/***************************************************/

// Datei <modulname.php> im neuen Verzeichnis erstellen 

//Pfad f�r das neue Modul
$pfad=$root_path."modules/$ModulNeuBez/";

//Dateiname generieren auf Grundlage des Modulnamens
if ($ModulNeuBez=""){
   echo "Fehler, leere Modulbezeichnungen sind nicht erlaubt.";
	 break;
	 }
else{
    $dateiname=$ModulNeuBez . ".php";
		}
 
//Datei �ffnen
$datei=fopen($pfad . $dateiname,"w");

//Inhalt dieser Datei in ein Array schreiben
$mainline=array(50);
$mainline[1]="<?PHP\n";
$mainline[2]="//***Variablen f�r dieses Modul setzen***\n";
$mainline[3]="//Variable f�r Individual-Sprachdateisetzen, Ausgabetext sollte in Variablen hier abgelegt werden.\n";

//$zeile4 Umgebungsvaliable f�r die spezielle Sprachdatei f�r das neue Modul setzen;
$mainline[4]="\$lang_thismodule_used=\"".$ModulNeuBez.".php\";\n";

// Variable f�r den Cookie setzen
$mainline[5]="// Variable f�r den Cookie setzen";
$mainline[6]="\$this_cookie_name=\"ck_".$ModulNeuBez."user.php\";\n";

//Hilfedatei Variable setzen und erstellen
$mainline[7]="//Hilfedatei\n";
$mainline[8]="\$new_hlp_file=\"".$ModulNeuBez."._hlp.php\";\n";

$mainline[9]="//Variable f�r �berschrift der Titelleseite, des Submen�s o.�.\n";
$mainline[10]="\$thismodulname=".$ModulNeuBez.";\n";

// Standardpfadangaben laden
$mainline[11]="require(\"./roots.php\");\n";

// Die Standarddateien aus modules/system_new_module/includes in den neuen Ordner kopieren.
// ggf. m�ssen noch Anpassungen in den Dateien vorgenommen werden

//wird auskommentiert, da diese Datei bereits in sub_modulname_anlegen.php ausgef�hrt wurde.
//require ("inc_datei_array.php");

// Die soeben kopierten Dateien einbinden
$mainline[12]="// Error Meldungen unterdr�cken, inc_environment_global.php includen, Standard-Sprachdateien einbinden,\n";
$mainline[13]="// Dateischutz etc.\n"; 
$mainline[14]="require(\$root_path.\"modules/"."$ModulNeuBez"."/"."$inc_datei_array[0]\");\n";
$mainline[15]="// Den <HEAD> includen\n";
$mainline[16]="require(\$root_path.\"modules/"."$ModulNeuBez"."/"."$inc_datei_array[1]\");\n";
$mainline[17]="// Den <BODY> includen \n";
$mainline[18]="require(\$root_path.\"modules/"."$ModulNeuBez"."/"."$inc_datei_array[2]\");\n";
$mainline[19]="// den blauen Titelblock einbinden\n";
$mainline[20]="require(\$root_path.\"modules/"."$ModulNeuBez"."/"."$inc_datei_array[3]\");\n";

// Ab hier ist die Ausgangs-Standard-Datei fertig.
$mainline[21]="echo  \"<H1>Bla bla bla....das k�nnte ihr Code sein...</H1>\";\n";
$mainline[22]="/*********************************************************************************/\n";
$mainline[23]="// Ab hier kann ihr Code stehen, bzw. mit include oder require eingebunden werden.\n";
$mainline[24]="/*********************************************************************************/\n";
//if ($patientenbezogen="1"){
    
$mainline[25]="require(\$root_path.\"modules/system_new_module/includes/footnote.inc.php\");\n";
$mainline[26]="?>\n";


//Anzahl der Codezeilen im Array bestimmen
$anzahl_mainline=count($mainline);

//Alle Codezeilen in die Datei einf�gen
$i=0;
while($i<$anzahl_mainline){
			fwrite($datei,$mainline[$i]);
			$i++;
			}
fclose($datei);

//echo "<p>Eine Datei mit der Bezeichnung <strong><i>" . $dateiname . "</strong></i> wurde erstellt.</p>";	 
//echo "<p>Diese Datei ist der Ausgangspunkt f�r die Programmierung neuer Module.</p>";
/***************************************************/
//Ende5 der <modulname>.php 

?>
