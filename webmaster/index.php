<?php 

	include_once $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/magicquotes.inc.php';

	require_once $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/access.inc.php';

	if (!userLoggedIn()) {
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/login.html.php';
		exit();
	}else{
		header('location: ' . 'home/');
		exit();
	}
 ?>