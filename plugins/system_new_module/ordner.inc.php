<?PHP 
//ordner.inc.php ist eine Include-Datei von edv_modul_neu_3.php
 
clearstatcache();
//Variable einlesen
$verz = "../" . $ModulNeuBez;

if(is_dir($verz)) {
   echo "Das Verzeichnis <Strong><I> $verz </Strong></I> existiert bereits. Bitte andere Bezeichnung w�hlen. Der Vorgang wird abgebrochen<BR> ";
	 exit;
}
else  { 
			// Kontrollmeldung
			//echo "<br>Das Verzeichnis mit $ModulNeuBez gibts noch nicht, kann erstellt werden.<br>";
			
// Verzeichnis anlegen mit dem Namen des neuen Moduls
			if( mkdir($verz , 0777)){
			   // Kontrollausgabe der Variable
         //echo "Ein Verzeichnis mit Namen <strong><i> " . $ModulNeuBez . "</strong></i> wurde erstellt. ";
         require_once("Traps_anlegen.inc.php"); //muss aktiviert sein!
				}

/*****************************************************/
//Falls gew�nscht, Eintrag im Standardmen� vornehmen

ltrim($stdmenuejanein);
rtrim($stdmenuejanein);
//pr�fen ob ein Standard-Men�eintrag gew�nscht ist
if ($stdmenuejanein=="1"){
	    require_once("menueintrag_modul.inc.php");
	    //echo "<br/>Men�eintrag wurde angelegt.<br/>";
	 }
elseif ($stdmenuejanein=="2"){
			//echo "Es wurde wie gew�nscht KEIN Standardmen�eintrag vorgenommen f�r " . $ModulNeuBez . ".";
		 }  	
clearstatcache();	 
}
/*****************************************************/
//Ende Standardmen�eintrag vornehmen		
?>

