<?php
include "connection.php";
if ($link) {
    $thequery = "SELECT * FROM insiderReferent";
    if ($result = mysqli_query($link, $thequery)) {
        $names = array();
        if ($result->num_rows > 0) {
            while ($name = $result->fetch_array(MYSQLI_NUM)) {
                array_push($names, $name);
                // echo $name;
            }
            echo json_encode($names);
        } else {
            echo "nessun dato";
        }
    }
} else {
    echo "errore connessione";
}
