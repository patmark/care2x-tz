<?php

//Variablen f�r den Quellpfad

$quellpfad=($root_path . $newmodule_includepath);

//Pr�fen ob die Variablen Werte enthalten um den Zielpfad anzulegen
if ($root_path=="" or ModulNeuBez==""){
    echo $err_ida_var_fehlt;
		exit;
		}
else {
$zielpfad =($root_path . "modules/".$ModulNeuBez . "/");

//echo "ziel: ".$zielpfad." ist zielpfad ";
}
//Pr�fen ob der Zielpfad bereits existiert
if(is_dir($zielpfad)) {
   //Pfad existiert
	 }
else{ 
    echo $err_keinpfad;
		exit;
    }
		
if ($pat_bez=="1"){
	 $qdatei="back_mit.php"; 
	 }
else{
 	$qdatei="back_ohne.php"; 
	}

$datei=fopen($quellpfad.$qdatei,"r"); 
$zieldatei="back.php";
$zdatei=fopen($zielpfad.$zieldatei,"w+"); 
$ix=1;
//innere Schleife
while (!feof($datei)) {
//eine Zeile auslesen
$buffer = fgets($datei,4096);
 
//schreiben
fwrite($zdatei,$buffer); 

$ix++;
}		//Ende innere Schleife
fclose($datei);
fclose($zdatei);	

?>
