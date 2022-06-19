<?php
require('config.inc.php');
require_once("headerinclude.php");

//Connect Database
try {

    //Opens MySQL connection
    $pdo = new PDO('mysql:host='.config::host.';dbname='.config::dbName, config::username, config::password);
    $arraywein = array();
    //Saves each row in the array
    foreach($pdo->query('select nr,bezeichnung,sorte,jahrgang,preis,anzahl,winzer.name,winzer.wnr,reihe,regal,fach,position from wein join winzer join keller where winzer.wnr=wein.wnr and position=knr order by nr asc;') as $row) {
        $arraywein[] = $row;
    }

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

    //Creates table
    echo ("
        <div>
            <table border=\"0\">
                <tr>
                    <th></th>
                    <th>Bezeichnung</th>
                    <th>Sorte</th>
                    <th>Jahrgang</th>
                    <th>Preis</th>
                    <th>Anzahl</th>
                    <th>Winzer</th>
                    <th>Lagerort</th>
                </tr>
    ");

for($i=0;$i < count($arraywein);$i++){

    $post = (
        "nr=".$arraywein[$i]["nr"].
        "&winzer=".$arraywein[$i]["name"].
        "&wnr=".$arraywein[$i]["wnr"].
        "&bezeichnung=".$arraywein[$i]["bezeichnung"].
        "&sorte=".$arraywein[$i]["sorte"].
        "&jahrgang=".$arraywein[$i]["jahrgang"].
        "&preis=".$arraywein[$i]["preis"].
        "&anzahl=".$arraywein[$i]["anzahl"].
        "&name=".$arraywein[$i]["name"].
        "&reihe=".$arraywein[$i]["reihe"].
        "&regal=".$arraywein[$i]["regal"].
        "&fach=".$arraywein[$i]["fach"]
    );

    echo ("
        <tr>
            <td>
                <a href=\"edit.php?".$post."\"><img src=\"images/edit.png\"></a>
                <a href=\"del.php?nr=".$arraywein[$i]["nr"]."\"><img src=\"images/del.png\"></a>
            </td>
            <td>".$arraywein[$i]["bezeichnung"]."</td>  
            <td>".$arraywein[$i]["sorte"]."</td>
            <td>".$arraywein[$i]["jahrgang"]."</td>
            <td>".$arraywein[$i]["preis"]."</td>
            <td>".$arraywein[$i]["anzahl"]."</td>
            <td>".$arraywein[$i]["name"]."</td>
            <td>".$arraywein[$i]["reihe"]."/".$arraywein[$i]["regal"]."/".$arraywein[$i]["fach"]."</td>
        </tr>
    ");
}

echo ("
        </table>
    </div>
");

$pdo = null;

require_once("footinclude.php");
?>