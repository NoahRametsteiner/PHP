<?php
	require_once("inc/headerinclude.php");
	require_once("inc/config.inc.php");

	function bmi($height,$weight/*,&$result*/){
		$result=$weight/($height*$height);
		return $result;
	}
	
	function average(){
		$count=func_num_args();
		$args=func_get_args();
		
		$sum=0;
		foreach($args as $number){
			$sum+=$number;
		}
		return $sum/$count;
	}
		
	$w=60;
	$h=1.85;
	
	echo bmi($h,$w);
	
	echo average(1,2,3,4,90,100,100).lf;
	
	$today=new DateTime();
	$inthefuture=new DateTime('2020-12-24');
	$daysto=new DateInterval('P1D');
	$daysto=$inthefuture->diff($today);
	echo 'Today:  '.$today->format('y-m-d').lf;
	echo 'until:  '.$inthefuture->format('y-m-d').lf;
	echo 'will be:  '.$daysto->format('%y year(s) %m month(s) %d day(s)').lf.lf;
	
	//my Age
	$today=new DateTime();
	$geb=new DateTime('2003-8-29');
	$age=new DateInterval('P1D');
	$age=$today->diff($geb);
	echo 'Today:  '.$today->format('Y-m-d').lf;
	echo 'Birthday:  '.$geb->format('Y-m-d').lf;
	echo 'Age:  '.$age->format('%y year(s) %m month(s) %d day(s)').lf.lf;
	
	
	$timestamp=mktime(0,0,0,12,31,2020);
	echo $timestamp.lf;
	
	echo date('F D Y W',$timestamp).lf.lf;
	
	echo date('l jS \of F Y h:i:s A').lf.lf;
	echo date(DATE_RFC822).lf.lf.lf;
	?>

	<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
	<label for="gender">Male: </label><input type="radio" name="gender" id="gender"><br>
	<label for="gender">Female: </label><input type="radio" name="gender" id="gender"><br>
	<label for="height">Height: </label><input type="text" name="height" id="height"> <br>
	<label for="weight">Weight: </label><input type="text" name="weight" id="weight"> <br>
	<input type="submit" value="calc" name="calc"><br>
	</form>
	<?php	
	/*if(isset($_POST["calc"]) && isset($_POST["height"]) && isset($_POST["weight"]))
		if(!empty($_POS["height"])&& !empty($_POS["weight"]))
			echo "BMI:  ".bmi($_POST["height"],$_POST["weight"]);
	*/
	
	if(isset($_POST["calc"]) && isset($_POST["weight"]) && isset($_POST["height"])&& isset($_POST["gender"])){
		if(!empty($_POST["height"]) && !empty($_POST["weight"]))
			echo "BMI:    ".bmi($_POST["height"],$_POST["weight"]);
		}	
		require_once("inc/footinclude.php");
	?>