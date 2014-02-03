<?php

try {

	$pdo = new PDO('mysql:host=ap-cdbr-azure-east-b.cloudapp.net;dbname=cdb_b3184fefed','b643a5a0543844','680a3b8a');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// $pdo->exec('SET NAMES "UTF-8"');

} catch (PDOException $e) {
	
	$output = 'Unable to connect to database becouse: ' . $e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
	exit();
}