<?php
	if(!isset($_COOKIE['TestCookie'])){
		$value=1;
	setcookie('TestCookie',$value);
	}else{
		$value=$_COOKIE['TestCookie'];
		if($value>10){
			setcookie('TestCookie','',time()-3600);
		}else{
			setcookie('TestCookie',$value+1);
		}
	}
	require_once("inc/headerinclude.php");
	require_once("inc/config.inc.php");

	echo "Value: ".$value;




	require_once("inc/footinclude.php");
?>
