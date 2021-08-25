<?php
include_once 'dataConnection.php';

$datainsert = $_POST["entryday"];
$entrytime = $_POST["entrytime"];
// $entrytime = $_POST["entryhour"];
$name = $_POST["name"];
$doctype = $_POST["tipoDocumento"];
$identity = strtoupper($_POST["identity"]);
$badge = $_POST["badgenumber"];
$company = $_POST["company"];
$referent = $_POST["referent"];
$exittime = $_POST["exittime"];
$note = $_POST["note"];



try {
  $connection = new PDO("mysql:host=$host;dbname=$db", $user, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $datainsert = $connection->exec("INSERT INTO $table(data, ora_ingresso, nome_visitatore, tipodocumento, estremi_documento, num_badge, societa_rappresentata, referente_interno, ora_uscita, annotazioni)
  VALUES('$datainsert', '$entrytime', '$name', '$doctype', '$identity', '$badge', '$company', '$referent', '$exittime', '$note')");
  echo json_encode("successfully insert visitor: " . $name);
} catch (PDOException $e) {

  echo json_encode("user " . $name . " insert failed") ;
}
