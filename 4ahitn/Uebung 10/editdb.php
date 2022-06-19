<?php
require('config.inc.php');
require_once("headerinclude.php");

$nr             = $_GET['nr'];
$wnr            = $_GET['wnr'];
$knr            = $_GET['knr'];
$bezeichnung    = $_GET["bezeichnung"];
$sorte          = $_GET["sorte"];
$jahrgang       = $_GET["jahrgang"];
$preis          = $_GET["preis"];
$anzahl         = $_GET["anzahl"];


//Opens MySQL connection
$mysqli = new mysqli(config::host,config::username,config::password,config::dbName,config::port);
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

//Updates table "wein" with alle $_GET from edit.php
$stmt = $mysqli->prepare("update wein set bezeichnung=?,sorte=?,jahrgang=?,preis=?,anzahl=?,wnr=?,position=? WHERE nr='$nr'");
$stmt->bind_param("sssssss", $bezeichnung,$sorte,$jahrgang,$preis,$anzahl,$wnr,$knr);

$stmt->execute();

//Closes connection
$stmt->close();
$mysqli->close();
header('Location: weine.php');

require_once("footinclude.php");
?>