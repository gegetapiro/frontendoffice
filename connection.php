<?php
include "dataConnection.php";

$link = mysqli_connect($host, $user, $password, $db);
if(!$link){
    echo "connessione ok";
}else{
    echo "fanculo";
}
// $link = mysqli_connect($host, $user, $password, $db);
?>