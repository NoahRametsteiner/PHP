<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="css/css.css">
<title>Session</title>


</head>
<body>
  <h1>Session</h1>
<?php
define("lf","<br/>");
session_start();

if (isset($_POST["go"])){
    if (isset($_POST["myname"])){
        $_SESSION["myname"] = $_POST["myname"];
        $redirect_url = "redirect.php";
        //$redirect_url = "http://localhost:8080/forms/answer.php";
        header("Location: $redirect_url");
    }
}else{
  ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
    Name: <input type="text" name="myname" value="">
    <br> Username: <input type="text" name="username" value="">
    <br> Password: <input type="password" name="secret" value="">
    <br> <input type="submit" name="go" value="Register">
    </form>
  <?php
}
?>

</body>
</html>
