<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="css/css.css">
<title>Secret Santa</title>


</head>
<body>
  <h1>Secret Santa</h1>
<?php
require("sendMail.php");
define("lf","<br/>");

//Var
$arr = array();
$bl = array();
$bigflag = 0;

//Buttons
?>

<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
  <label for="name"><p>Name: </p></label><input type="text" name="name" id="name">
  <label for="email"><p>EMail: </p></label><input type="email" name="email" id="email"> <br>
  <input type="submit" value="Submit" name="submit"><br>
  <input type="submit" value="Delete Cookies" name="Del"><br>
  <input type="submit" value="Berechnung" name="Calc"><br>
</form>
<?php

//Löscht alle  Cookies.
if(isset($_POST["Del"]) && isset($_POST["name"]) && isset($_POST["email"])){
  foreach ($_COOKIE as $key=>$val){
    setcookie($key,'',time()-3600);
    setcookie($key-($key*2),'',time()-3600);
  }
}

//Gibt die Werte die in Email und Name stehen in zwei Cookies. Emails sind Negativ, Namen sind Positiv.
if(isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["email"])){
  if(!empty($_POST["name"]) && !empty($_POST["email"])){
    setcookie(cookiecount(),$_POST["name"]);
    setcookie(cookiecount()-(cookiecount()*2),$_POST["email"]);
  }teilnehmer($_COOKIE,$arr);
}

//Berechnung für Anzahl der Teilnehmer.
if(isset($_POST["Calc"])){
  if(cookiecount()>3){

    //Auswertung der Teilnehmer.
    for($i=1;$i<=cookiecount()-1;$i++){
      do{
        $flag = 0;
        $rannum = rand(1,cookiecount()-1);

        //Nicht jemanden Beschenken der bereitz beschenkt wird.
        for($x=1;$x<=cookiecount()-1;$x++){
          if(isset($bl[$x])){
            if($bl[$x]==$rannum){
              $flag = 1;
            }
          }
        }

        //Kein Gleiches Pärchen.
        if(isset($bl[$rannum])){
          if($bl[$rannum] == $i){
            $flag = 1;
          }
        }

        //Nicht Selbst Beschenken.
        if($rannum == $i){$flag = 1;}

      }while($flag == 1);
      //Speichert wer wenn beschenkt.
      echo "<p>".$_COOKIE[$i]." beschenkt ".$_COOKIE[$rannum]."</p>";
      $bl[$i]=$rannum;
      csv($_COOKIE[$i],$_COOKIE[$i-($i*2)],$_COOKIE[$rannum-($rannum*2)]);
    }

    //Versendet die Mails.
    for($i=1;$i<=cookiecount()-1;$i++){
      //Email des Engerl
      $email=$_COOKIE[$i-($i*2)];
      //Name des Engerl
      $name =$_COOKIE[$i];
      //Message die in der Email steht.
      $message = "Du wurdest zu Engerl Bengerl eingeladen und beschenkst ".$_COOKIE[$bl[$i]].".";
      //Titel der Mail.
      $subject = "Secret Santa";

      sendMail($email, $message, $subject, $name);
    }
  }else{echo "Min. 3 Teilnehmer!";}
}

//Zählt wie viele Cookies existieren.
function cookiecount(){
  $zuweisungen = 1;
  while(1==1){
    if(!isset($_COOKIE[$zuweisungen])){
      break;
    }else{
      $zuweisungen++;
    }
  }
  return $zuweisungen;
}

//Speichert die Teilnehmer in ein Array.
function teilnehmer($arr){
  for($i=1;;$i++){
    if(isset($_COOKIE[$i])){
      $arr[$i]=$_COOKIE[$i];
      $arr[$i-($i*2)]=$_COOKIE[$i-($i*2)];
    }else{break;}
  }
}

//Erstellt eine CSV datei.
function csv($NameEngerl,$EmailEngerl,$Email){
  $f = fopen('Secret Santa.csv', 'a');
  fputcsv($f, [$NameEngerl, $EmailEngerl, $Email]);
  fclose($f);
}

?>

</body>
</html>
