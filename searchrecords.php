<?php

include "connection.php";

if ($link) {
  
    $soggetto = $_POST["whosearch"];
    $thequery = "SELECT * FROM `moduloElencoVisitatori` WHERE nome_visitatore LIKE '%" . $soggetto . "%'";

    if ($result = mysqli_query($link, $thequery)) {
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_NUM)) {
                array_push($rows, $row);
             }
         echo json_encode($rows);
        }
    }
} else {
    echo "error connection " . error_log($link);
}
