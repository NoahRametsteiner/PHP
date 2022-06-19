<?php
require('config.inc.php');
require_once("headerinclude.php");

//Saves alle _GET
$nr           = $_GET['nr'];
$wnr          = $_GET['wnr'];
$bezeichnung  = $_GET["bezeichnung"];
$sorte        = $_GET["sorte"];
$jahrgang     = $_GET["jahrgang"];
$preis        = $_GET["preis"];
$anzahl       = $_GET["anzahl"];
$name         = $_GET["name"];
$reihe        = $_GET["reihe"];
$regal        = $_GET["regal"];
$fach         = $_GET["fach"];
$winzer       = $_GET["name"];


//Creates form contactform with default values
  echo ("
    <div><form action=\"editdb.php\" method=\"get\">
    <br><br>

    <input type=\"hidden\" id=\"nr\" name=\"nr\" value=\"".$nr."\" readonly>
    <input type=\"hidden\" id=\"wnr\" name=\"wnr\" value=\"".$wnr."\" readonly>  

    <label for=\"name\">Bezeichnung</label><br>
    <input type=\"text\" id=\"bezeichnung\" name=\"bezeichnung\" value=\"".$bezeichnung."\" required>

    <br><br>
    <label for=\"name\">Sorte</label><br>
    <input type=\"text\" id=\"sorte\" name=\"sorte\" value=\"".$sorte."\" required>

    <br><br>
    <label for=\"name\">Jahrgang</label><br>
    <input type=\"text\" id=\"jahrgang\" name=\"jahrgang\" value=\"".$jahrgang."\" required>

    <br><br>
    <label for=\"name\">Preis</label><br>
    <input type=\"text\" id=\"preis\" name=\"preis\" value=\"".$preis."\"required>

    <br><br>
    <label for=\"name\">Anzahl</label><br>
    <input type=\"text\" id=\"anzahl\" name=\"anzahl\" value=\"".$anzahl."\" required>

    <br><br>
    <label for=\"department-selection\">Winzer</label>
    <select id=\"wnr\" name=\"wnr\" required>
  ");


//Opens MySQL connection
$mysqli = new mysqli(config::host,config::username,config::password,config::dbName,config::port);

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
} 

//Get all winzer
$sqlwinzer = "select wnr,name from winzer";
$resultwinzer = $mysqli->query($sqlwinzer);
$arraywinzer = array();

//Saves each row in the array
while($rowwinzer = mysqli_fetch_assoc($resultwinzer)){
    $arraywinzer[] = $rowwinzer;
}

//Adds all winzers to the options
for($a=0;$a < count($arraywinzer);$a++){
  echo "<option value=".$arraywinzer[$a]["wnr"];
  if($arraywinzer[$a]["name"]==$winzer){
    echo " selected";
  }
  echo ">".$arraywinzer[$a]["name"]."</option>";
}

echo ("
  </select>

  <br><br>
  <label for=\"department-selection\">Lagerort</label>
  <select id=\"knr\" name=\"knr\" required>
");

//Gets alle the positions and adds them to the contactform
$sqllager = "select knr,reihe,regal,fach from keller;";
$resultlager = $mysqli->query($sqllager);
$arraylager = array();

while($rowlager = mysqli_fetch_assoc($resultlager)){
    $arraylager[] = $rowlager;
}

for($i=0;$i < count($arraylager);$i++){

  $arraylagerplatz = $arraylager[$i]["reihe"]."/".$arraylager[$i]["regal"]."/".$arraylager[$i]["fach"];
  
  $lagerplatz = $reihe."/".$regal."/".$fach;
  echo "<option value=".$arraylager[$i]["knr"];
  if($arraylagerplatz==$lagerplatz){
    echo " selected";
  }
  echo ">".$arraylagerplatz."</option>";
  
}

echo ("
  </select>
  <br><br>
  <button type=\"submit\">Edit</button>
  </form><br></div>
");


$mysqli->close();
require_once("footinclude.php");
?>