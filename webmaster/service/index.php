<?php 

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/access.inc.php';

	if (!cekAuth()) {
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/logout.html.php';
		exit();
	}

	//DECLARATION
	$error = null;
	$success = null;
	$target = '../../assets/img/';
	// $target_img = $target . basename($_FILES['img']['name']);
	// $target_catalogue = $target . basename($_FILES['catalogue']['name']);
	//ADD DATA INTO DATA BASE
	if (isset($_REQUEST['add'])) {
			
			$available = 'yes';
			$pagetitle = 'ADD Service';
			$action = 'addservice';
			$name = '';
			$description = '';
			$img = '';
			$catalogue = '';
			$button = 'ADD';
		
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/service_form.html.php';
		exit();
	}

	if (isset($_REQUEST['addservice'])) {
		
		if (empty($_REQUEST['name'])) {
			$error = 'Name Fields are require !';
		
		}elseif (strlen($_REQUEST['name']) > 140) {
			$error = 'Name was to long !';
		
		}elseif (empty($_REQUEST['description'])) {
			$error = 'Description Fields are require !';

		} elseif (empty($_FILES['img']['name'])) {
			$error = 'please choose an image !';
		// }elseif (empty($_FILES['catalogue']['name'])) {
		// 	# code...
		// }
		}else{
			
			$img_name = $_FILES['img']['name'];
			$img_size = $_FILES['img']['size'];
			$img_tmp = $_FILES['img']['tmp_name'];
			$img_type = $_FILES['img']['type'];
			$img_ext = strtolower(end(explode('.', $img_name)));
			$img_target = '../../assets/img/service/' . $img_name;

			$extentions_img = array("jpeg", "jpg", "png", "gif");
			
			if (!in_array($img_ext, $extentions_img)) {
				$error = 'Extentions not allowed, please choose a JPEG or PNG file' . implode(', ', $extentions_img);
			}elseif ($img_size > 2000000) {
				$error = 'Img file was too large';
			}else{
				
				//print_r($img_target);
				move_uploaded_file($img_tmp, $img_target);		
				try {
			
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

				$name = trim($_REQUEST['name']);
				$description = trim($_REQUEST['description']);
				$img = 'assets/img/service/'. $img_name;

				$query = 'INSERT INTO sevices SET
						  name = :name,
						  description = :description,
						  img = :img';

				$s = $pdo->prepare($query);
				$s->bindValue(':name', $name);
				$s->bindValue(':description', $description);
				$s->bindValue(':img', mysql_real_escape_string($img));
				// $s->bindValue(':catalogue', $cat_name);

				$s->execute();				

				$success = 'all Information Succesfully added';

				} catch (PDOException $e) {
					
					$output = 'Unable to add service because: ' . $e->getMessage();
					include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
					exit();
				}		
			}
		}

		$available = 'yes';
		$pagetitle = 'ADD Service';
		$action = 'addservice';
		$name = '';
		$description = '';
		$img = null;
		$catalogue = null;
		$button = 'ADD';

		// header('Location: .');
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/service_form.html.php';
		exit();
	}
	//EDIT DATA FROM DATABASE

	if (isset($_REQUEST['action']) and $_REQUEST['action'] == 'Edit') {
		
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

		try {
			
			$query = 'SELECT id,name,description,img,catalogue FROM sevices WHERE id = :id';
			$s = $pdo->prepare($query);
			$s->bindValue(':id', $_REQUEST['id']);
			$s->execute();

		} catch (PDOException $e) {
			
			$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
			exit();
		}

		$row = $s->fetch();

		$pagetitle = 'Edit Service Details';
		$action = 'editservice';
		$id = $row['id'];
		$name = $row['name'];
		$description = $row['description'];
		$img = $row['img'];
		$catalogue = $row['catalogue'];
		$button = 'Update';
		$available ='yes';

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/service_form.html.php';
		exit();
	}

	if (isset($_REQUEST['editservice'])) {

		if (empty($_FILES['img']['name']) === false) {					

			$img_name = $_FILES['img']['name'];
			$img_size = $_FILES['img']['size'];
			$img_temp = $_FILES['img']['tmp_name'];
			$img_extn = strtolower(end(explode('.', $img_name)));
			$img_target = '../../assets/img/service/' . $img_name;

			$allowed = array('jpg', 'jpeg', 'png', 'gif');					

			if (!in_array($img_extn, $allowed)) {					
				$error = 'file type are incorrect';

			}elseif ($img_size > 2000000) {
				$error = 'file\'s to big ! upload less than 2MB'; 
			}else{
				try {
					include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

					$query = 'SELECT img FROM sevices WHERE id = :id';
					$s = $pdo->prepare($query);
					$s->bindValue(':id', $_REQUEST['id']);
					$s->execute();

					$row = $s->fetch();

					$last_img = $row['img'];
					// print_r($last_img . $_REQUEST['id']);
					// exit();
					unlink('../../' . $last_img);

					move_uploaded_file($img_temp, $img_target);
				} catch (PDOException $e) {
					$output = 'Unable to Update data, because: ' . $e->getMessage();
					include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
					exit();
				}

			}
		}
		
		if (empty($_REQUEST['name'])) {
			$error = 'Name Fields are require';
		
		}elseif (strlen($_REQUEST['name']) > 140) {
			$error = 'Name was to long';
		
		}elseif (empty($_REQUEST['description'])) {

			$error = 'Description Fields are require';

		}else{

			try {				

				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';	
				
				$img = (!empty($_FILES['img']['name'])) ? 'assets/img/service/' . $_FILES['img']['name'] : $_REQUEST['image'];

				// echo $img;
				// exit();

				$cat = (isset($_REQUEST['catalogue'])) ? $_REQUEST['catalogue'] : $_REQUEST['cat'];

				$name = trim($_REQUEST['name']);
				$description = trim($_REQUEST['description']);
				$id = $_REQUEST['id'];				
				
				$q_update = 'UPDATE sevices SET
						  name = :name,
						  description = :description,
						  img = :img,
						  catalogue = :catalogue
						  WHERE id = :id';

				$s = $pdo->prepare($q_update);
				$s->bindValue(':id', $id);
				$s->bindValue(':name', $name);
				$s->bindValue(':description', $description);
				$s->bindValue(':img', $img);
				$s->bindValue(':catalogue', $cat);
		
				//$s->execute();				
				$s->execute();	
			} catch (PDOException $e) {
				
				$output = 'Unable to Update data, because: ' . $e->getMessage();
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
				exit();
			}

			header('Location: .');
			exit();
		}

		$pagetitle = 'Edit Service Details';
		$action = 'editservice';
		$id = $_REQUEST['id'];
		$name = $_REQUEST['name'];
		$description = $_REQUEST['description'];
		$img = $img;
		$catalogue = $cat;
		$button = 'Update';
		$available ='yes';

		include $_SERVER['DOCUMENT_ROOT'] .'/enkaproduction/webmaster/views/service_form.html.php';
		exit();

	}

	//DELETE DATA FROM DATABASE


	//VIEW THE DATA FROM DATABASE
	try {
		
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

		$result = $pdo->query('SELECT * FROM sevices');

	} catch (PDOException $e) {
		
		$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
		exit();
	}

	while ($row = $result->fetch()) {
		$lists[] = array('id' => $row['id'],
						 'name' => $row['name'],
						 'description' => $row['description'],
						 'img' => $row['img'],
						 'catalogue' => $row['catalogue']);
	}

	$row = $result->fetch();

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/service.html.php';

 ?>