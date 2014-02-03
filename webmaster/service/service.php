<?php 

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/access.inc.php';

	if (!cekAuth()) {
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/logout.html.php';
		exit();
	}

	//DECLARATION
	$errors[] = array();
	$success[] = array();
	$target = '../../assets/img/';
	$target_img = $target . basename($_FILES['img']['name']);
	$target_catalogue = $target . basename($_FILES['catalogue']['name']);
	//ADD DATA INTO DATA BASE
	if (isset($_REQUEST['add'])) {
			
			$pagetitle = 'ADD Service';
			$action = 'addservice';
			$name = '';
			$description = '';
			$img = '';
			$catalogue = '';
		
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/service_form.html.php';
		exit();
	}

	if (isset($_REQUEST['addservice'])) {
		
		if (empty($_REQUEST['name'])) {
			$errors[] = 'Name Fields are require';
		
		}elseif (strlen($_REQUEST['name']) > 140) {
			$errors[] = 'Name was to long';
		
		}elseif (empty($_REQUEST['description'])) {
			$errors[] = 'Description Fields are require';

		elseif (isset($_FILES['img'])) {
			
			$img_name = $_FILES['img']['name'];
			$img_size = $_FILES['img']['size'];
			$img_tmp = $_FILES['img']['tmp_name'];
			$img_type = $_FILES['img']['type'];
			$img_ext = strtolower(end(explode('.', $_FILES['img']['name'])));

			$extentions_img[] = array("jpeg", "jpg", "png");
			if (in_array($img_ext, $extentions_img) === false) {
				$errors[] = 'Extentions not allowed, please choose a JPEG or PNG file';
			}elseif ($img_size > 200000) {
				$errors[] = 'Img file was too large';
			}

		}elseif (isset($_FILES['catalogue'])) {
			
			$cat_name = $_FILES['catalogue']['name'];
			$cat_size = $_FILES['catalogue']['size'];
			$cat_tmp = $_FILES['catalogue']['tmp_name'];
			$cat_type = $_FILES['catalogue']['type'];
			$cat_ext = strtolower(end(explode('.', $_FILES['catalogue']['name'])));

			$extentions_cat[] = array("pdf","doc","docx");
			if (in_array($cat_ext, $extentions_cat) === false) {
				$errors[] = 'Extention not allowed, please choose a PDF or DOC file';
			}

		}else{
			$name = trim($_REQUEST['name']);
			$description = trim($_REQUEST['description']);
			// $img = $_FILES['img']['name'];
			// $catalogue = $_FILES['catalogue']['name'];

			try {
			
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

				$query = 'INSERT INTO services SET
						  name = :name.
						  description = :description,
						  img = :img,
						  catalogue = :catalogue';

				$s = $pdo->prepare($query);
				$s->bindValue(':name', $name);
				$s->bindValue(':description', $description);
				$s->bindValue(':img', $img_name);
				$s->bindValue(':catalogue', $cat_name);

				$s->execute();				

				if (isset($errors) === false and isset($_FILES['img'])) {
					move_uploaded_file($img_tmp, $target_img);
					$success[] = 'Image Succesfully uploaded';
				}

				if (isset($errors) === false and isset($_FILES['catalogue'])) {
					move_uploaded_file($cat_tmp, $target_catalogue);
					$success[] = 'catalogue Succesfully uploaded';
				}

				$success[] = 'all Information Succesfully added';

			} catch (PDOException $e) {
				
				$output = 'Unable to add service because: ' $e->gerMessage();
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
				exit();
			}
		}

		$pagetitle = 'ADD Service';
		$action = 'addservice';
		$name = '';
		$description = '';
		$img = '';
		$catalogue = '';

		// header('Location: .');
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/service_form.html.php';
		exit();
	}
	//EDIT DATA FROM DATABASE

	if (isset($_REQUEST['action']) and $_REQUEST['action'] == 'Edit') {
		
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

		try {
			
			$query = 'SELECT * FROM services WHERE id = :id';
			$s = $pdo->prepare($query);
			$s->bindValue(':id', $_REQUEST['id']);
			$s->execute();

		} catch (Exception $e) {
			
			$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
			exit();
		}

		$row = $s->fetch();

		$pagetitle = 'Edit Service Details';
		$action = 'editservice';
		$name = $_row['name'];
		$description = $_row['description'];
		$img = $row['img'];
		$catalogue = $row['catalogue'];
		$button = 'Update';

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/service_form.html.php';
		exit();
	}

	if (isset($_REQUEST['editservice'])) {
		
		if (empty($_REQUEST['name'])) {
			$errors[] = 'Name Fields are require';
		
		}elseif (strlen($_REQUEST['name']) > 140) {
			$errors[] = 'Name was to long';
		
		}elseif (empty($_REQUEST['description'])) {
			$errors[] = 'Description Fields are require';
		}else{

			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

			try {
				
				$query = 'UPDATE services SET
						  name = :name,
						  description = :description,
						  img = :img,
						  catalogue = :catalogue';
				$s = $pdo->prepare($query);
				$s->bindValue(':id', $_REQUEST['id']);
				$s->bindValue(':name', $_REQUEST['name']);
				$s->bindValue(':description', $_REQUEST['description']);
				$s->bindValue(':img', $_REQUEST['img']);
				$s->bindValue(':catalogue', $_REQUEST['catalogue']);

				$s->execute();

				header('Location: .');
				exit();

			} catch (PDOException $e) {
				
				$output = 'Unable to Update data, because: ' . $e->getMessage();
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
				exit();
			}
		}

		include $_SERVER['DOCUMENT_ROOT'] .'/enkaproduction/webmaster/views/service_form.html.php';
		exit();

	}

	//DELETE DATA FROM DATABASE


	//VIEW THE DATA FROM DATABASE
	try {
		
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

		$result = $pdo->query('SELECT * FROM services');

	} catch (PDOException $e) {
		
		$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
		exit();
	}

	while ($row = $result->fetch()) {
		$lists[] = array('id' => $row['id']
						 'name' => $row['name'],
						 'description' => $row['description'],
						 'img' => $row['img'],
						 'catalogue') => $row['catalogue'];
	}

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/service.html.php';

 ?>