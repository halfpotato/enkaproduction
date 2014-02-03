<?php 

	$error = null;
	$success = null;

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

	try {

		$result = $pdo->query('SELECT officeaddress, officemail, officephone FROM webprofiles');		

	} catch (PDOException $e) {
		
		$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
		exit();		
	}

	$row = $result->fetch();

	if (isset($_REQUEST['send'])) {
		
		if (empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['message'])) {
			$error = "All Field are required !";
		}else{

			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';
			try {
				
				$query = 'INSERT INTO messages SET
						  name = :name,
						  email = :email,
						  message = :message,
						  inputdate = :dates';				

				$s = $pdo->prepare($query);
				$s->bindValue(':name', $_REQUEST['name']);
				$s->bindValue(':email', $_REQUEST['email']);
				$s->bindValue(':message', $_REQUEST['message']);
				$s->bindValue(':dates', getdate());
				$s->execute();

				$success = "Message Sent.";

			} catch (PDOException $e) {
				$output = 'Unable to send message, because: ' . $e->getMessage();
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
				exit();	
			}
		}

	}

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/contact/contact.html.php';

 ?>