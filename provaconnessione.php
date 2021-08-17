<?php
$host = "localhost:3306";
$db = "routesha_jerrydb";
$user = "root";
// $user = "routesha";
$password = "@Meo2f59";
$table = "moduloElencoVisitatori";

$link = mysqli_connect($host, $user, $password, $db);
if($link){
    echo "accesso ok";
}else{
    echo "cazzi";
}

?>