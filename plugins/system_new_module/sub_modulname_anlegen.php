<?PHP
/***************************************************/
   /*** SUB_MENU DATEI   E R S T E L L E N ***/
/***************************************************/

// Datei sub_<modulname.php> im neuen Verzeichnis erstellen 

//Pfad f�r das neue Modul
$pfad=$root_path."modules/$ModulNeuBez/";

//Dateiname generieren auf Grundlage des Namensteils "sub_" und desModulnamens
$dateiname="sub_" . $ModulNeuBez . ".php";
 
//Datei �ffnen
$datei=fopen($pfad . $dateiname,"w");

//Inhalt dieser Datei in ein Array schreiben
$line=array(30);
$line[0]="<?PHP\n";
$line[1]="//***Variablen f�r dieses Modul setzen***\n";
$line[2]="//Variable f�r Individual-Sprachdateisetzen, Ausgabetext sollte in Variablen hier abgelegt werden.\n";

//$zeile4 Umgebungsvaliable f�r die spezielle Sprachdatei f�r das neue Modul setzen;
$line[3]="\$lang_thismodule_used=\"".$ModulNeuBez.".php\";\n";

//Hilfedatei Variable setzen und erstellen
$line[4]="//Hilfedatei\n";
$line[5]="\$new_hlp_file=\"".$ModulNeuBez."_hlp.php\";\n";

//Variable f�r �berschrift der Titelleseite, des Submen�s o.�.
$line[6]="//Variable f�r �berschrift der Titelleseite, des Submen�s o.�.\n";
$line[7]="\$thismodulname=".$ModulNeuBez.";\n";

// Standardpfadangaben laden
$line[8]="require(\"./roots.php\");\n";

// Die soeben kopierten Dateien einbinden
$line[9]="// Error Meldungen unterdr�cken, inc_environment_global.php includen, Standard-Sprachdateien einbinden,\n";
$line[0]=="// Dateischutz etc.\n"; 
$line[11]="require(\$root_path.\"modules/"."$ModulNeuBez"."/"."$inc_datei_array[0]\");\n";
$line[12]="// Den <HEAD> includen\n";
$line[13]="\$returnfile=\"sub_".$ModulNeuBez.".php\".URL_APPEND;\n";
$line[14]="\$breakfile=\$root_path.\"main/startframe.php\".URL_APPEND;\n";
$line[15]="require(\$root_path.\"modules/"."$ModulNeuBez"."/"."$inc_datei_array[1]\");\n";
$line[16]="// Den <BODY> includen \n";
$line[17]="require(\$root_path.\"modules/"."$ModulNeuBez"."/"."$inc_datei_array[2]\");\n";
$line[18]="// den blauen Titelblock einbinden\n";
$line[19]="require(\$root_path.\"modules/"."$ModulNeuBez"."/"."$inc_datei_array[3]\");\n";

// Ab hier ist die Ausgangs-Standard-Datei fertig.

$line[20]="/*****************************************/\n";
$line[21]="// Submen� anstarten.\n";
$line[22]="/*****************************************/\n";
$line[23]="require(\$root_path.\"modules/"."$ModulNeuBez"."/submenu1.php\");\n";
$line[24]="require(\$root_path.\"modules/system_new_module/includes/footnote.inc.php\");\n";
$line[25]="?>\n";


//Anzahl der Codezeilen im Array bestimmen
$anzahl_line=count($line);

//Alle Codezeilen in die Datei einf�gen
$i=0;
while($i<$anzahl_line){
			fwrite($datei,$line[$i]);
			$i++;
			}
			
fclose($datei);

/***************************************************/
//Ende5 der sub_<modulname>.php 
