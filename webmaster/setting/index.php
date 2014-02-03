<?php 

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/access.inc.php';

	if (!cekAuth()) {
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/logout.html.php';
		exit();
	}

	try {

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

		$result = $pdo->query('SELECT * FROM webprofiles');
		
	} catch (PDOException $e) {
		
		$output = 'Unable to fetch the data, because' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
		exit();
	}

	// while ($row = $result->fetch()) {
	// 	$data[] = array(
	// 			  'id' => $row['id'],
	// 			  'webname' => $row['webname'],
	// 			  'about' => $row['about'],
	// 			  'whyus' => $row['whyus'],
	// 			  'officeaddress' => $row['officeaddress'],
	// 			  'officemail' => $row['officemail'],
	// 			  'officephone' => $row['officephone']);
	// }

	$row = $result->fetch();

	if (isset($_REQUEST['add'])) {

		$pagetitle = 'Add Deteils';
		$action = 'adddetails';
		$button = 'ADD';

		$webname = '';
		$about = '';
		$whyus = '';
		$officeaddress = '';
		$officemail = '';
		$officephone = '';

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/setting_form.html.php';
		exit();
	}

	if (isset($_REQUEST['adddetails'])) {
		
		try {
			
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

			$query = 'INSERT INTO webprofiles SET
			 		  webname = :webname,
			 		  about = :about,
			 		  whyus = :whyus,
			 		  officeaddress = :officeaddress,
			 		  officemail = :officemail,
			 		  officephone = :officephone';

			$s = $pdo->prepare($query);
			// $s->bindValue(':id', $_REQUEST['id']);
			$s->bindValue(':webname', $_REQUEST['webname']);
			$s->bindValue(':about', $_REQUEST['about']);
			$s->bindValue(':whyus', $_REQUEST['whyus']);
			$s->bindValue(':officeaddress', $_REQUEST['officeaddress']);
			$s->bindValue(':officemail', $_REQUEST['officemail']);
			$s->bindValue(':officephone', $_REQUEST['officephone']);

			$s->execute();


		} catch (PDOException $e) {
			
			$output = 'Unable to Add details into database, because: ' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
			exit();
		}

		// include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/setting.html.php';
		header('Location: .');
		exit();
	}

	if (isset($_REQUEST['edit'])) {

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

		$result = $pdo->query('SELECT * FROM webprofiles');

		// while ($row = $result->fetch()) {
		// 	$data[] = array(
		// 			  'id' => $row['id'],
		// 			  'webname' => $row['webname'],
		// 			  'about' => $row['about'],
		// 			  'whyus' => $row['whyus'],
		// 			  'officeaddress' => $row['officeaddress'],
		// 			  'officemail' => $row['officemail'],
		// 			  'officephone' => $row['officephone']);
		// }

		$row = $result->fetch();

		$pagetitle = 'Edit Deteils';
		$action = 'editdetails';
		$button = 'Update';

		$id = $row['id'];
		$webname = $row['webname'];
		$about = $row['about'];
		$whyus = $row['whyus'];
		$officeaddress = $row['officeaddress'];
		$officemail = $row['officemail'];
		$officephone = $row['officephone'];
		
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/setting_form.html.php';
		exit();
	}

	if (isset($_REQUEST['editdetails'])) {			

		try {
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';			

			$query = 'UPDATE webprofiles SET
					  webname = :webname,
					  about = :about,
					  whyus = :whyus,
					  officeaddress = :officeaddress,
					  officemail = :officemail,
					  officephone = :officephone
					  WHERE id = :id';

			$s = $pdo->prepare($query);
			$s->bindValue(':id', $_REQUEST['id']);
			$s->bindValue(':webname', $_REQUEST['webname']);
			$s->bindValue(':about', $_REQUEST['about']);
			$s->bindValue(':whyus', $_REQUEST['whyus']);
			$s->bindValue(':officeaddress', $_REQUEST['officeaddress']);
			$s->bindValue(':officemail', $_REQUEST['officemail']);
			$s->bindValue(':officephone', $_REQUEST['officephone']);

			$s->execute();

		} catch (PDOException $e) {
			
			$output = 'Unable to Update details, because: ' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
			exit();
		}

		// include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/setting_form.html.php';
		header('Location: .');
		exit();

	}

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/setting.html.php';

 ?>