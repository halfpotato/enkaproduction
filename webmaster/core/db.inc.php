<?php

try {

	$pdo = new PDO('mysql:host=localhost;dbname=enka','admin','enkaproduction');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// $pdo->exec('SET NAMES "UTF-8"');

} catch (PDOException $e) {
	
	$output = 'Unable to connect to database becouse: ' . $e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
	exit();
}