<?php
    require_once("inc/headerinclude.php");
    define("lf","<br/>");

  /*function bmi ($height,$weight){
    $result = $weight/($height*$height);

    return $result;
  }

  function average (){
    $count=func_num_args();
    $args=func_get_args();

    $sum=0;
    foreach($args as $number) {
      $sum+=$number;
    }
    return $sum/$count;
  }

  $w=65;
  $h=1.88;

//  echo bmi($w,$h);

  echo average(1,2,3,4,90,100,100).lf;

  $today=new DateTime();
  $inthefutur=new DateTime('2020-12-24');
  $daysto=new DateInterval('P1D');
  $daysto=$inthefutur->diff($today);

  echo 'Today:  '.$today->format('Y-m-d').lf;
  echo 'until:  '.$inthefutur->format('Y-m-d').lf;
  echo 'will be '.$daysto->format('%Y year(s) %m month(s) %d day(s)').lf;


  $timestamp=mktime(0,0,);
  echo $timestamp.lf;

  echo date('F D Y',$timestamp);*/
  
  function bmi($height, $weight){
		$result = $weight/($height*$height);
		return $result;
	}

	?>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
	<input type="radio" name="Geschl"  value="Männlich" <?php echo 'checked="checked"'; ?>> Mann
	<input type="radio" name="Geschl"  value="Weiblich"> Frau<br><br>
	<label for="height">Height: </label><input type="text" name="height" id="height"> <br><br>
	<label for="weight">Weight: </label><input type="text" name="weight" id="weight"> <br><br>
	<input type="submit" value="calc" name="calc">
	</form>

	<?php

	if(isset($_GET["calc"]) && isset($_GET["weight"]) && isset($_GET["height"])){
		if(!empty($_GET["height"]) && !empty($_GET["weight"]))
			echo "BMI:    ".bmi($_GET["height"],$_GET["weight"]);
	}
			
	require_once("inc/footinclude.php");		
?>












