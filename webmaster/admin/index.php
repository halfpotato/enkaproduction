<?php 

	$errors = null;

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/magicquotes.inc.php';

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

	include_once $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/access.inc.php';

	if (!cekAuth()) {
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/logout.html.php';
		exit();
	// }else{
	// 	exit();
	// }
	}

	try {

		$result = $pdo->query('SELECT id, name, email FROM webmaster');		

	} catch (PDOException $e) {
		
		$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
		exit();		
	}

	while ($row = $result->fetch()) {
		$lists[] = array('id' => $row['id'], 'name' => $row['name'], 'email' => $row['email']);
	}

	if (isset($_REQUEST['add'])) {
		
		$pagetitle = 'ADD WEBMASTER';
		$action = 'addwmaster';
		$id = '';
		$name = '';
		$email = '';
		$password = '';
		$button = 'ADD';

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/form.html.php';
		exit();
	}

	if (isset($_REQUEST['addwmaster'])) {
		
		if (empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['pass1']) || empty($_REQUEST['pass2'])) {
			
			$errors = 'All fields are require.';

			} else if($_REQUEST['pass1'] != $_REQUEST['pass2']) {

				$errors = 'Password didn\'t match.';

			} else {

				try {
					include '../core/db.inc.php';
					$query = 'INSERT INTO webmaster SET
							  name = :name,
							  email = :email,
							  password = :pass';

					$s = $pdo->prepare($query);
					$s->bindValue(':name', $_REQUEST['name']);
					$s->bindValue(':email', $_REQUEST['email']);
					$s->bindValue(':pass', md5($_REQUEST['pass1']));
					$s->execute();	
				} catch (PDOException $e) {
					$output = 'Unable to add webmaster, because: ' . $e->getMessage();
					include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
					exit();		
				}

				header('Location: .');
				exit();
			}

			$pagetitle = 'ADD WEBMASTER';
			$action = 'addwmaster';
			$id = '';
			$name = '';
			$email = '';
			$password = '';
			$button = 'ADD';
			// header('Location: .');
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/form.html.php';
			exit();
		}


		if (isset($_REQUEST['action']) and $_REQUEST['action'] == 'Edit') {
			
			include $_SERVER['DOCUMENT_ROOT'] .'/enkaproduction/webmaster/core/db.inc.php';
			try {
				$query = 'SELECT id,name,email FROM webmaster WHERE id = :id';
				
				$s = $pdo->prepare($query);
				$s->bindValue(':id', $_REQUEST['id']);
				$s->execute();

				$row = $s->fetch();

				$pagetitle = 'Edit WEBMASTER';
				$action = 'editwmaster';
				$id = $row['id'];
				$name = $row['name'];
				$email = $row['email'];
				$password = '';
				$button = 'Update';	
			} catch (PDOException $e) {
				$output = 'Unable to fetch data, because: ' . $e->getMessage();
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
				exit();		
			}

			// header('Location: .');
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/form.html.php';
			exit();	
		}

		if (isset($_REQUEST['editwmaster'])) {
			
			if (empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['pass1']) || empty($_REQUEST['pass2'])) {
				
				$errors = 'All fields are require. ';

			}else if ($_REQUEST['pass1'] != $_REQUEST['pass2']) {
				
				$errors = 'Password didn\'t match';

			}else{

				try {
					include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

					$query = 'UPDATE webmaster SET
							  name = :name,
							  email = :email,
							  password = :password
							  WHERE id = :id';

					$s = $pdo->prepare($query);
					$s->bindValue(':id', $_REQUEST['id']);
					$s->bindValue(':name', $_REQUEST['name']);
					$s->bindValue(':email', $_REQUEST['email']);
					$s->bindValue(':password', md5($_REQUEST['pass1']));
					
					$s->execute();	
				} catch (PDOException $e) {
					$output = 'Unable to update webmaster, because: ' . $e->getMessage();
					include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
					exit();	
				}

				header('Location: .');
				exit();
			}

				$pagetitle = 'Edit WEBMASTER';
				$action = 'editwmaster';
				$id = $_REQUEST['id'];
				$name = $_REQUEST['name'];
				$email = $_REQUEST['email'];
				$password = '';
				$button = 'Update';
				// header('Location: .');
				
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/form.html.php';
				exit();
		}

		if (isset($_REQUEST['action']) and $_REQUEST['action'] == 'Delete') {
			
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';
			try {
				
				$query = 'DELETE FROM webmaster WHERE id = :id';
				$s = $pdo->prepare($query);
				$s->bindValue(':id', $_REQUEST['id']);
				$s->execute();

			} catch (PDOException $e) {
				
				$output = 'Unable to Delete webmaster, because: ' . $e->getMessage();
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
				exit();	
			}

			header('Location: .');
			exit();
		}

		if (isset($_REQUEST['logout'])) {
			
			logout();
			header('Location: .' . '/index.php');
			exit();
		}

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/admin.html.php';
 ?>