<?php
require('config.inc.php');
require_once("headerinclude.php");

$nr = $_GET['nr'];

$mysqli = new mysqli(config::host,config::username,config::password,config::dbName,config::port);
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

$sql = "DELETE FROM wein WHERE nr=".$nr;
$mysqli->query($sql);
$mysqli->close();


header('Location: weine.php');

require_once("footinclude.php");
?>