<?php
	require_once("headerinclude.php");
	define("lf","<br/>");

	echo "<form method=\"post\" action=\"\">";
	echo "<h2>Choose City</h2>";
	echo "<select name=\"Subjects_Name\">";

	echo "<option value=\"vienna\">Vienna</option>";
	echo "<option value=\"london\">London</option>";
	echo "<option value=\"linz\">Linz</option>";
	echo "<option value=\"melk\">Melk</option>";
	echo "<option value=\"berlin\">Berlin</option>";

	echo "</select>";
	echo "<button type=\"submit\" name=\"submit\" >Submit</button>";
	echo "</form>";

	if(isset($_POST["submit"])){
		$city=$_POST["Subjects_Name"];
	}

	$var = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=89620b1d5cf81223c9cd476e125c09d4");

	$decoded = json_decode($var,true);

	echo "<h1>".$decoded["name"]."</h1>";

	echo "<p>".date("h:i:sa")."<p>";
	echo "<p>".date("d m,Y")."<p>";

	echo "<p>".$decoded["weather"][0]["description"]."<p>";
	$temp = ($decoded["main"]["temp"])- 273.15;
	echo "<p>Temperature: ".$temp."°C<p>";	echo "<p>Humidity: ".$decoded["main"]["humidity"]."%<p>";
	echo "<p>Windspeed: ".$decoded["wind"]["speed"]."km/h<p>";

	require_once("footinclude.php");
?>
