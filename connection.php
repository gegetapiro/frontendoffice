<?php
include "dataConnection.php";

$link = mysqli_connect($host, $user, $password, $db);
if($link){
    // echo "accesso ok";
}else{
    // echo "cazzi ";
}
?>