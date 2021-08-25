<?php
$id = $_POST["whattaid"];
$dataingresso = $_POST["dataingresso"];
$oraingresso = $_POST["oraingresso"];
$nominativo = $_POST["nominativo"];
$tipodoc = $_POST["tipodoc"];
$doc = $_POST["doc"];
$numbadge = $_POST["nubadge"];
$company = $_POST["company"];
$referente = $_POST["referente"];
$exittime = $_POST["exittime"];
$exitdata = $_POST["exitdata"];
$nota = $_POST["nota"];
include "connection.php";
if ($link) {
    $thequery = "UPDATE moduloElencoVisitatori SET data = '" . $dataingresso . "', ora_ingresso = '" . $oraingresso . "', nome_visitatore ='" . $nominativo .
        "', tipodocumento = '" . $tipodoc . "', estremi_documento = '" . $doc  . "', num_badge = '" . $numbadge . "', societa_rappresentata = '" . $company .
        "',  referente_interno = '" . $referente . "', ora_uscita = '" . $exittime . "', dataUscita= '" . $exitdata . "', annotazioni = '" . $nota .
        "' WHERE id= '" . $id . "'";
    if (mysqli_query($link, $thequery)) {
        echo json_encode("aggiornamento effettuato");
        //echo "history.go(-1)";
         header("location:index.html");
    } else {
        echo json_encode("problemi nell'aggiornamento " . mysqli_error($link));
    }
} else {
    echo  json_encode("connection problems " . mysqli_error($link));
}
