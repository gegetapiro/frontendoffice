<?php
include "connection.php";
if (!$link) {
    echo "errore di connessione";
} else {
    $thequery = "DELETE FROM $table WHERE id = '" . $_POST["id"] . "'";
    if (mysqli_query($link, $thequery)) {
        echo "record con id: " . $_POST["id"] . " cancellato con successo";
    } else {
        echo "problemi nella cancellazione del record con id: " . $myId . mysqli_error($link) . $myId;
    }
}
