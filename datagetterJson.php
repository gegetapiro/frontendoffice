<?php
include_once 'dataConnection.php';
$elem = array();
$pdo = new PDO("mysql:dbname=$db;$host", "$user", "$password");
$statement = $pdo->prepare("SELECT * FROM $table");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  $elem['visitatori'][] = $row;
}
echo json_encode($elem);
/* $link= new mysqli( $host, $user, $password, $db);
if ($link->connect_error) {
  die('Errore di connessione (' . $result->connect_errno . ') '
  . $result->connect_error);
} else {
  echo 'Connesso. ' . $link->host_info . "\n";
  $query = "SELECT * FROM $table";
  $result = mysqli_query($link, $query );
  if($result->num_rows > 0){
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //  print_r($row )  ;
      $elem['visitatori'][] = $row;
      // code...
    }
    echo json_encode($elem);
  }
} */
