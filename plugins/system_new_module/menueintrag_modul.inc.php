<?PHP

//Verbindung zur Datenbank herstellen, mit ADODB
require ("Verbindung.inc.php");

//print $recordSet->fields[0];
//$recordSet->MoveNext();
$conn->debug=1;
// Alle Men�punkte um 1 erh�hen, die (hirarchisch) oberhalb des Neuen Moduls liegen
if ($updateflag=true){
    $sql="UPDATE care_menu_main SET sort_nr = sort_nr + 1 WHERE sort_nr >= '".$sort_nr."';";
		$recordSet = &$conn->Execute($sql);
		}

//Pr�fen ob bereits ein Eintrag im Men� existiert mit $MenuNeuBez
// Auslesen aus der Tabelle ob Eintrag mit der Variable vorhanden ist
//Variable aufbereiten f�r Lesbarkeit in MySQL

$SQL_ModulNeuBez="'".$ModulNeuBez."'";
$sql="SELECT name FROM care_menu_main WHERE name=".$SQL_ModulNeuBez.";";

//$sql->debug=true;

$recordSet = &$conn->Execute($sql);

$variable=$recordSet->fields[0];

if ($variable!=""){
	 echo"<BR/>Es gibt bereits einen Eintrag mit<STRONG><I> " . $ModulNeuBez . ".</STRONG></I> Bitte gehen Sie zur�ck und w�hlen eine andere Bezeichnung.<BR/>";
	 }
else {
   // Variablen f�llen
	 //$sort_nr++;
   $name="'".$ModulNeuBez."'";
   $LD_var="'LD".$ModulNeuBez."'";
	 $url="'modules/".$ModulNeuBez."/sub_".$ModulNeuBez.".php'";			
				
//Einf�ge-Abfrage ausf�hren
	    $sql="INSERT INTO care_menu_main (sort_nr,name,LD_var,url) VALUES ('".$sort_nr."',".$name.",".$LD_var.",".$url.");";
	    $recordSet = &$conn->Execute($sql);
	    //echo "<BR/>Der Eintrag im Standardmen� f�r das Modul  mit Bezeichnung <STRONG><I>" . $ModulNeuBez . "</STRONG></I> wurde angelegt.";
	 }
?>	 
