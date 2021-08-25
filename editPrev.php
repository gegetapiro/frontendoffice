<?php



include_once "dataConnection.php";

// $qualeid = $_POST["whattaid"];
$qualeid = 1;


try{

  $pdoedit = new PDO("mysql:dbname=$db;$host", "$user", "$password");

  $stat = $pdoedit->prepare("SELECT * FROM $table WHERE id=$qualeid LIMIT 1");

  $stat->execute();

  $row = $stat->fetch();

  ############# https://stackoverflow.com/questions/5456626/php-pdo-returning-single-row  ###################
  ################  vedi qui: http://www.miniscript.it/articoli/67/pdo_eseguire_le_query.html   ###############
  $elemedit["editablerec"] = $row;
  echo json_encode($elemedit);


}catch(PDOException $e){
  echo $e->getMessage();
}










?>
