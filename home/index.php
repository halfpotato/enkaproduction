<?php 

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';
	try {
		
		$result = $pdo->query('SELECT about, whyus, webname FROM webprofiles');

	} catch (PDOException $e) {
		
		$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
		exit();
	
	}

	$row = $result->fetch();

	try {
		
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';
		$r = $pdo->query('SELECT * FROM sevices ORDER BY id DESC limit 3');		
	
	} catch (Exception $e) {
		echo $e->getMessage();
	}

	while ($rows = $r->fetch()) {
	$list[] = array('id' => $rows['id'], 
					 'name' => $rows['name'], 
					 'description' => $rows['description'], 
					 'img' => $rows['img'], 
					 'catalogue' => $rows['catalogue']);
	}
	
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/home/home.html.php';

 ?>