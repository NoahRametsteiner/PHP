<?php



/*
mysql (deprecated), mysqli (improved), PDO (PHP Data Objects)
mysqli -- OOP oder prozedural (nicht empfohlen, aber möglich: mischen)
mysqli_connect ... Verbindung aufbauen
mysqli_select_db (optional) ... Verbindung mit Datenbank herstellen
mysqli_query ... Abfrage absetzen
mysqli_fetch_XXX ... Ergebnis auswerten
mysqli_close ... Verbindung schließen
*/
/*
$dbh=mysqli_connect(config::host,config::username,config::password,config::dbName) or die("Verbindung fehlgeschlagen");
echo "Verbindung erfolgreich<br>";

$query="Select * from person";
$result=mysqli_query($dbh,$query);

if($result===FALSE){
    die("Abfrage konnte nicht abgesetzt werden");
}
echo "<table>";
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo "<tr><td>".$row["nummer"]."</td><td>".$row["name"]."</td><td>".$row["geburtsdatum"]."</td></tr>";
}
echo "</table>";
mysqli_close($dbh);
*/
if(!isset($_GET["nameFlugzeug"])){
    echo "<form action=\"".htmlentities($_SERVER["PHP_SELF"])."\" method=\"GET\">";
    echo "Flugzeug: <input type=\"text\" name=\"nameFlugzeug\" id=\"nameFlugzeug\"";
    echo "<input type=\"submit\" placeholder=\"Suchen\">";
    echo "</form>";
}
else {
    require('config.php');

    $mysqli = new mysqli(config::host, config::username, config::password, config::dbName);
    if ($mysqli->connect_error) {
        die("Fehler beim Herstellen der DB-Verbindung" . $mysqli->connect_error);
    }

    //$sql = "select * from fliegt;";

    //$sql = "select * from flugzeug where name=?";
    $sql = "select * from flugzeug";
    //$stmt = $mysqli->prepare($sql);
    //$stmt -> bind_param("s",$_GET["nameFlugzeug"]);
    //$stmt->execute();

    //$res = $stmt->get_result();
    $res = $mysqli->query($sql);
    /*
    while(($plane=$res->fetch_assoc()))
    {
        print_r($plane);
        echo "</br>";
    }*/
    ?>

    <table>
	<thead>
		<tr>
			<th>N</th>
			<th>Flugzeuge</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		// select all tasks if page is visited or refreshed
        $res = $mysqli->query($sql);

		$i = 1; while ($row = mysqli_fetch_array($res)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="id"> <?php echo $row['name']; ?> </td>
                <td class="id"> <?php echo $row['modell']; ?> </td>
                <td class="id"> <?php echo $row['hersteller']; ?> </td>
                <td class="id"> <?php echo $row['spannweite']; ?> </td>
                <td class="id"> <?php echo $row['lehrer']; ?> </td>
                <td class="id"> <?php echo $row['hangar']; ?> </td>
				<td class="delete">
					<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a>
				</td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>
<?php

    $mysqli->close();
}
?>