<?php 

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/access.inc.php';

	if (!cekAuth()) {
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/logout.html.php';
		exit();
	}

	$errors = null;
	$success = null;
	if (isset($_REQUEST['mailto'])) {

		// $to = '';

		if (empty($_REQUEST['title']) || empty($_REQUEST['message'])) {
			$errors = 'Those fields are required';
			// include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/contact_form.html.php';
			// exit();
		}else{
			mail('fakhrianakbaik@gmail.com', $_REQUEST['title'], $_REQUEST['message'], 'From: enkaproduction@mail.com');
			$success = 'Email has send';			
		}
	}
	

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/contact_dev.html.php';

 ?>