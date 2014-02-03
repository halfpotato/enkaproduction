<?php 
	
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/home.html.php';

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/access.inc.php';

	if (!cekAuth()) {
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/logout.html.php';
		exit();
	}

	//BUAT FUNGSI EMAIL.

	// if (isset($_REQUEST['contact'])) {
	// 	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/contact_form.html.php';
	// 	exit();
	// }

	// if (isset($_REQUEST['mailto'])) {
		
	// 	$to = 'fakhrinf@hotmail.com';

	// 	if (empty($_REQUEST['subject']) || empty($_REQUEST['message'])) {
	// 		$errors = 'Those fields are required';
	// 		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/contact_form.html.php';
	// 		exit();
	// 	}else{
	// 		mailto($to, $_REQUEST['subject'], $_REQUEST['message']);
	// 		header('Location: .');
	// 		exit();
	// 	}
	// }

 ?>