<?php
$user = "root";
$password = null;
$database = "routesha_jerrydb";
$table = "moduloElencoVisitatori";
$link = mysqli_connect() or die("problemi");
if ($link) {
    echo "va";
    $query = "SELECT * FROM $table";
    $result =  mysqli_query($link, $query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            print_r($row);
        }
    }
}
