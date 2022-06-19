<?php
    require_once("inc/headerinclude.php");
    define("lf","<br/>");


	
    $cocktails = array("gern"=>"Long Island", "sehr gern"=>"Pina Colada","nicht so gern" =>"Mojito");

    $cocktails["durchschnitt"]="Caipirinha";

    print_r($cocktails);
    echo lf;
    foreach($cocktails as $index=>$cocktail){
        echo $index." ".$cocktail.lf;
    }

    ksort($cocktails);
    print_r($cocktails);
	
	
	$file = file_get_contents("https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita");
	$i=0;
	if($file===false) exit(1);
	
	if($file===true)
	$content = json_decode($file,true);
	
	
	foreach($content as $index=>$cocktail){
		
		foreach($cocktail as $index2=>$cocktail2){
			if($cocktail2["strAlcoholic"]=="Alcoholic")
			$i++;
		}
	}
	echo($i);
	
	/*$file1 = file_get_contents("https://www.thecocktaildb.com/api/json/v1/1/filter.php?a=Alcoholic");
	$file2 = file_get_contents("https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=11007");
	$i;
	$vodka = json_decode($file1,true);
	$content = json_decode($file2,true);
	
	foreach($vodka as $index=>$drink){
		
		foreach($drink as $index2=>$ingre){
			$id = $ingre["idDrink"];
			echo($id);
			lf;
		}
	}*/
	
	
    require_once("inc/footinclude.php");
?>
















