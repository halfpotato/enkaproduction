<?php 

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

	try {

		$result = $pdo->query('SELECT about FROM webprofiles');

	} catch (PDOException $e) {
		$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
		exit();		
	}

	$row = $result->fetch();

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/about/about.html.php';

 ?>