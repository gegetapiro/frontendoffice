<?php

/*
blocco dei parametri di connessione
*/
// nome di host
$host = "localhost";
// nome del database
$db = "CORE_data";
// username dell'utente in connessione
$user = "root";
// password dell'utente
$password = "libellula";

/*
blocco try/catch di gestione delle eccezioni
*/
try {
	// stringa di connessione al DBMS
	$connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);
	/*
	Avremmo potuto anche omettere dbname in questo modo:
	$connessione = new PDO("mysql:host=$host", $user, $password);
	*/
	// notifica in caso di connessione effettuata
	echo "Connessione a MySQL tramite PDO effettuata. <br />";
	// imposto dell'attributo necessario per ottenere il report degli errori
	$connessione -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// lettura tabella
	foreach ($connessione->query("SELECT id, data, ora_ingresso, nome_visitatore, tipodocumento, estremi_documento, num_badge, societa_rappresentata, referente_interno, ora_uscita, annotazioni FROM moduloElencoVisitatori") as $row) {
		echo $row['id'] . " " . $row['data'] . " " .  $row['ora_ingresso'] . " " . $row['nome_visitatore'] . " " . $row['tipodocumento']  . " " . $row['estremi_documento']
		. " " . $row['num_badge'] . " " . $row['societa_rappresentata'] . " " . $row['referente_interno'] . " " . $row['ora_uscita'] . " " . $row['annotazioni'] . " " .   "<br />";
	}
	// chiusura della connessione
	$connessione = null;
} catch(PDOException $e) {
	// notifica in caso di errore nel tentativo di connessione
	echo $e -> getMessage();
}
?>
