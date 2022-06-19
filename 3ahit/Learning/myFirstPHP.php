<!doctype html>
<html>
<head>
	<title>I am learning PHP</title>
	<style type="text/css">
	body	{font-damily: Verdana;}
	h2		{font-size: 15px;}
	p		{font-size: 12px;}
	</style>
</head>
<body>
<?php
	//phpinfo();

	$vorname="Noah";
	$nachname="Rametsteiner";
	$name=$vorname." ".$nachname;

	$text = "formatted";

	echo "<h2>Hello ".$name."!<h2>
	<p>This is my first PhP-Script.!<p>";
?>
</body>
</html>