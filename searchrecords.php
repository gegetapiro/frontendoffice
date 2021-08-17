<?php

include "connection.php";
$visitor = $_POST["whosearch"];

// $visitor = "Carlo Lidi";
// echo json_encode($visitor);


if ($link) {

    $thequery = "SELECT * FROM $table WHERE nome_visitatore LIKE '%$visitor%'";

    if ($result = mysqli_query($link, $thequery)) {
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_NUM)) {
                array_push($rows, $row);
                // echo $row[0];

            }
            echo json_encode($rows);
        }
    }
} else {
    echo "error connection " . mysqli_error($link);
}
