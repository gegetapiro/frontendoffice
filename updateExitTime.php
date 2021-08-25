<?php
$id = $_GET["whattaid"];
$exittime = $_GET["whattaextime"];
$note = $_GET["whattanote"];
$exitdata = $_GET["whattaexidata"];
include "connection.php";
if ($link) {
    $query = "UPDATE moduloElencoVisitatori SET ora_uscita = '" . $exittime . "', dataUscita = '" . $exitdata . "', annotazioni='" . $note . "' WHERE id = '" . $id . "'";
    if (mysqli_query($link, $query)) {
        echo "aggiornamento effettuato";
        // echo "history.go(-1)";
        header("location:index.html");
    } else {
        echo "problemi nell'aggiornamento " . mysqli_error($link);
    }
} else {
    echo   "connection problems " . mysqli_error($link);
}
