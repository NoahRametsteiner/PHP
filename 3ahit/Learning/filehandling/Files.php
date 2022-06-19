<?php

include("header.php");
define("lf","</br>");

/*
echo file_exists(filename "C:/temp/sportler.sql");
echo filesize(filename "C:\\temp\\sportler.sql");
echo filetype(filename "C:/temp");
echo is_dir(filename "C:/temp");

if(chdir(directory: "C:/temp")){
  echo "dir changed".lf;
}
*/
//echo mkdir(pathname: "Bra", mode: 0700).lf;



$handle = opendir("C:/xampp/htdocs/PHP/3ahit/noah.rametsteiner/filehandling/1.jpg");
while($file = readdir($handle)!==fales){
  echo $file.lf;
  uebung($file);
}


/*
auslesen für jedes jpg in tabelle abspeichern und Eigenschaften
zeigen*/

function uebung(){
  echo '<img src=".$file."/>'.lf;
}

include("footer.php");
