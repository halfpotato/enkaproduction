<?php 

	function userLoggedIn()
	{
		if (isset($_POST['action']) and $_POST['action'] == 'login') {
			
			if (empty($_POST['email']) || empty($_POST['password'])) {
				$GLOBALS['errors'] = 'Please fill those fields';
				return FALSE;
			}

			$password = md5($_POST['password']);

			if (getUsers($_POST['email'], $password)) {
				
				session_start();
				$_SESSION['loggedIn'] = TRUE;
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['password'] = $password;
				return TRUE;				
			
			}else{

				session_start();
				unset($_SESSION['loggedIn']);
				unset($_SESSION['email']);
				unset($_SESSION['password']);

				$GLOBALS['errors'] = 'The details was incorrect';
				return FALSE;	
			}
		}

		if (isset($_POST['action']) and $_POST['action'] == 'logout') {

			session_start();
			unset($_SESSION['loggedIn']);
			unset($_SESSION['email']);
			unset($_SESSION['password']);

			header('Location: ' . $_POST['goto']);
			exit();
		}

		session_start();
		if (isset($_SESSION['loggedIn'])) {
			return getUsers($_SESSION['email'], $_SESSION['password']);
		}
	}

	function getUsers($email, $password){
		// include '../core/db.inc.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';
		try {

			$query = 'SELECT COUNT(*) FROM webmaster WHERE email = :email AND password = :password';
			$s = $pdo->prepare($query);
			$s->bindValue(':email', $email);
			$s->bindValue(':password', $password);
			$s->execute();

		} catch (Exception $e) {
			
			$output = 'Error fetching the data, unable to login because: ' . $e->getMessage();
			include '../../includes/output.html.php';
			exit();			
		}

		$row = $s->fetch();

		if ($row[0] > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function logout(){
		session_start();
		unset($_SESSION['loggedIn']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);

		$GLOBALS['errors'] = 'The details was incorrect';
		return TRUE;	
	}

	function cekAuth(){
		if (!userLoggedIn()) {
			return FALSE;
		}else{
			return TRUE;
		}
	}

	function mailto($to, $subject, $message){
		return mail($to, $subject, $message, 'From: test@enkaproduction.com');
	}

 ?>