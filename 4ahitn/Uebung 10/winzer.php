<?php
require('config.inc.php');
require_once("headerinclude.php");

//Connect Database
$mysqli = new mysqli(config::host,config::username,config::password,config::dbName,config::port);

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

$sqlwinzer = "select * from winzer";
$resultwinzer = $mysqli->query($sqlwinzer);
$arraywinzer = array();

while($rowwinzer = mysqli_fetch_assoc($resultwinzer)){
    $arraywinzer[] = $rowwinzer;
}

for($i=0;$i < count($arraywinzer);$i++){
    echo ("
        <div>
            <table border=\"0\">
                <tr>
                    <th>Name</th>
                    <th>Strasse</th>
                    <th>PLZ</th>
                    <th>Ort</th>
                    <th>Telefon</th>
                </tr>

                <tr>
                    <td>".$arraywinzer[$i]["name"]."</td>
                    <td>".$arraywinzer[$i]["strasse"]."</td>
                    <td>".$arraywinzer[$i]["plz"]."</td>
                    <td>".$arraywinzer[$i]["ort"]."</td>
                    <td>".$arraywinzer[$i]["telefon"]."</td>
                </tr>
                <tr>
                    <td>
                        <br><br>
                        <table border=\"0\" style=\"text-align: left;\">
                            <tr>
                                <th>Bezeichnung</th>
                                <th>Jahrgang</th>
                                <th>Preis</th>
                                <th>Anzahl</th>
                             </tr>
    ");

    $sqlwein = "select * from wein where wnr=".$arraywinzer[$i]["wnr"].";";
    $resultwein = $mysqli->query($sqlwein);
    $arraywein = array();

    while($rowwein = mysqli_fetch_assoc($resultwein)){
        $arraywein[] = $rowwein;
    }

    for($a=0;$a < count($arraywein);$a++){
        echo ("
        <tr>
            <td>".$arraywein[$a]["bezeichnung"]."</td>
            <td>".$arraywein[$a]["jahrgang"]."</td>
            <td>".$arraywein[$a]["preis"]."</td>
            <td>".$arraywein[$a]["anzahl"]."</td></tr>
    ");
        
    }
    echo ("
                    </table>
                    </br>
                </td>
                </table>
            <br><br>
        </div>
    ");
}

$mysqli->close();
require_once("footinclude.php");
?>