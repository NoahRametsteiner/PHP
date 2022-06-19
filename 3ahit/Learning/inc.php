<?php
//	require_once("headerinclude.php");
	define("lf","<br/>");
	define("Pi","3.1415");

	$personen=array("Bu","Un","Pi");
	$personen[-5]="Bra";
	$personen[]="Al";
	$personen[]="Ham";
	$personen[]="Di";
	$personen[]="Kah";
	print_r($personen);
	var_dump($personen);

	/*$count = count($personen);
	for($i=0;$i<$count;$i++){
		echo $personen[$i].lf;
	}*/
	echo lf;
	foreach($personen as $index=>$person){
		echo $index."&nbsp;".$person.lf;
	}

	$lehrer=array("Al"=>"Altermüller","Rei"=>"Reiter","Hoe"=>"Höfinger");
	$lehrer["Bra"]="Brachinger";
	$lehrer["Ham"]="Hammer";
	$lehrer["Ha"]="Haabs";
	$lehrer["Kah"]="Kashofer";

	$lehrer=array();
	$lehrer[]=array("kuerzel"=>"Bra","firstname"=>"Andreas","lastname"=>"Brachinger","birthday"=>"1995-08-24",);

	$lehrer[]=array("kuerzel"=>"Kah","firstname"=>"Rudolf","lastname"=>"Kashofer","birthday"=>"1980-03-10",);
	var_dump($lehrer);
	/*

	sort($lehrer);
	print_r($lehrer);
	//echo lf;


	asort($lehrer);
	print_r($lehrer)
	//echo lf;

	ksort($lehrer);
	print_r($lehrer)
	//echo lf;

	$wahr = 1;
	$falsch = 0;

	echo "<table border=\"1\">";
	echo "<tr><td>AND</td><td>true</td><td>false</td></tr><tr><td>true</td><td>",$wahr&&$wahr,"</td><td>",$wahr&&$falsch,"</td></tr><tr><td>false</td><td>",$falsch&&$wahr,"</td><td>",$falsch&&$falsch,"</td></tr>";
	echo "<tr><td>OR</td><td>true</td><td>false</td></tr><tr><td>true</td><td>",$wahr||$wahr,"</td><td>",$wahr||$falsch,"</td></tr><tr><td>false</td><td>",$falsch||$wahr,"</td><td>",$falsch||$falsch,"</td></tr>";


	$variable=10;
	//Gibt den Wert der Variable aus. Bei Doppelten Hochkommer muss man ein \ vor einem ".
	echo "Variablenwer: \"$variable\"".lf;
	//Gibt den Namen der Variable aus. Ihr kann man das \ weglassen.
	echo 'Variablenwer: "$variable"'.lf;

	$langerText=<<<LT
	The bodies found on Tuesday were believed to be those of a 41-year-old woman and a 10-year-old girl, both of whom had been reported missing the previous night, officials said. The girls death brought the number of children killed in the blaze to three, officials said.
LT;

	echo lf.$langerText.lf;

	echo lf."Character in Text: ";
	echo strlen($langerText).lf;

	echo "Kapeller == Kapelle : ";
	echo strcmp("Kapeller","Kapelle").lf;

	echo "Kapelle == Kapeller : ";
	echo strcmp("Kapelle","Kapeller").lf;

	echo "Kapeller == Kapeller : ";
	echo strcmp("Kapeller","Kapeller").lf;

	echo lf."//Kopiert String ab der 10 stelle und dann die N�chsten 100 Buchstaben: ".lf;
	echo substr($langerText,10,100).lf;

	echo lf."strtoupper:";
	echo lf.strtoupper($langerText).lf;
	echo lf."strtolower:";
	echo lf.strtolower($langerText).lf;

	if(strpos($langerText,"killed",0)===false){
		echo lf."nicht gefunden".lf;
	}else{
		echo lf."Gefunden".lf;
	}

	$string=sprintf("%3.2f",3.141592);
	echo lf.str_replace("the","THE",$langerText);

	$klassenliste=str_replace(";;;;1;","",$klassenliste);
	$klassenliste=str_replace(";;;;2;","",$klassenliste);

	echo $klassenliste.lf;
	$array3ahit=explode(";",$klassenliste);
	print_r($array3ahit);
	foreach($array3ahit as $zeile){
		$schueler=explode(";",$zeile);
		print_r($schueler);
	}




$haystack=<<<LT
	The bodies found on Tuesday were believed to be those of a 41-year-old woman and a 10-year-old girl, both of whom had been reported missing the previous night, officials said. The girls death brought the number of children killed in the blaze to three, officials said.
LT;

$needle = "of";

	function countStrings($haystack,$needle){
	$stelle=-1;
	$counter=0;
		do{
			$stelle=strpos($haystack,$needle,($stelle+1));
			$counter++;
		}while($stelle!==false);
		echo $counter;
	}

	echo countStrings($haystack,$needle).lf;



	echo(gettype(Pi) .lf);

	//Funktion Radiant to Grad
	$radiant=Pi/4;
	function radtoGrad($rad){
		//$radiant unknown in this frunction - use gobal keyword befor variable
		global $radiant;
		return 180/Pi*$rad;
	}
	echo radtoGrad($radiant).lf;

	$number1=1;
	$number="1";

	// <
	// >
	// <=
	// >=
	// !=
	// ==
	// !==

	//=== compares the data types
	if($number===1){
		echo "True" .lf;
	}else{
		echo "false" .lf;
	}

	print_r($_GET);

	$a = 1;
	$b = 2;
	echo("Type a = " .gettype($a) .lf);
	echo("Type b = " .gettype($b) .lf);
	$a = 1.0;
	$b = 2.0;
	echo("Type a = " .gettype($a) .lf);
	echo("Type b = " .gettype($b) .lf);
	$pi = $b*asin($a);
	$zahl = Pi;
	settype($zahl,"double");
	echo("Type of $zahl = " .gettype($zahl) .lf);
	$diff = $pi - $zahl;
	echo("difference = " .gettype($diff) ." value = " .$diff .lf);
	*/



echo("

	<table>
	<tr>
	  <th>Company</th>
	  <th>Contact</th>
	  <th>Country</th>
	</tr>
	<tr>
	  <td>Alfreds Futterkiste</td>
	  <td>Maria Anders</td>
	  <td>Germany</td>
	</tr>
	<tr>
	  <td>Centro comercial Moctezuma</td>
	  <td>Francisco Chang</td>
	  <td>Mexico</td>
	</tr>
  </table>
");

	require_once("footinclude.php");
?>
