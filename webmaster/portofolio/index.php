<?php 
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/access.inc.php';

	if (!cekAuth()) {
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/logout.html.php';
		exit();
	}

	$error = null;

	if (isset($_REQUEST['add'])) {

		$available = 'yes';
		$pagetitle = 'ADD PORTFOLIO';
		$action = 'addportfolio';
		$worktitle = '';
		$aboutwork = '';
		$img = null;
		$button = 'ADD';

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/portofolio_form.html.php';
		exit();
	}

	if (isset($_REQUEST['addportfolio'])) {
		
		if (empty($_REQUEST['worktitle'])) {
			$error = "Worktitle Fields are required !";
		}else if(strlen($_REQUEST['worktitle']) > 255){
			$error = "Worktitle was to long !";
		}else if (empty($_REQUEST['aboutwork'])) {
			$error = "Description is required !";
		}else{
			
			$img_name = $_FILES['img']['name'];
			$img_size = $_FILES['img']['size'];
			$img_tmp = $_FILES['img']['tmp_name'];
			$img_type = $_FILES['img']['type'];
			$img_ext = strtolower(end(explode('.', $_FILES['img']['name'])));
			$img_target = '../../assets/img/portofolio/' . $img_name;

			// echo $img_ext;
			// exit();

			$extentions_img = array("jpeg", "jpg", "png");
			if (in_array($img_ext, $extentions_img) === false) {
				$error = 'Extentions not allowed, please choose a JPEG or PNG file' . implode(', ', $extentions_img);
			}elseif ($img_size > 200000) {
				$error = 'Img file was too large';
			}else{


				$worktitle = trim($_REQUEST['worktitle']);
				$aboutwork = trim($_REQUEST['aboutwork']);
				$date = $_REQUEST['dateevent'];
				$img = 'assets/img/portofolio/' . $img_name;

				move_uploaded_file($img_tmp, $img_target);			

				try {
					
					include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

					$query = 'INSERT INTO portofolios SET
							  worktitle = :worktitle,
							  aboutwork = :aboutwork,
							  img = :img,
							  dateevent = :dateevent';


					$s = $pdo->prepare($query);
					$s->bindValue(':worktitle', $worktitle);
					$s->bindValue(':aboutwork', $aboutwork);
					$s->bindValue(':img', mysql_real_escape_string($img));
					$s->bindValue(':dateevent', $date);

					$s->execute();

				} catch (Exception $e) {
					
					$output = 'Unable to add service because: ' . $e->getMessage();
					include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
					exit();
					
				}
			}

			header('Location: .');
			exit();
		}


		$available = 'yes';
		$pagetitle = 'ADD PORTFOLIO';
		$action = 'addportfolio';
		$worktitle = $_REQUEST['worktitle'];
		$aboutwork = $_REQUEST['aboutwork'];
		$img = '';
		$button = 'ADD';

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/portofolio_form.html.php';
		exit();
	}

	//EDIT DATA FROM DATABASE

	if (isset($_REQUEST['action']) and $_REQUEST['action'] == 'Edit') {
		
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

		try {
			
			$query = 'SELECT * FROM portofolios WHERE id = :id';
			$s = $pdo->prepare($query);
			$s->bindValue(':id', $_REQUEST['id']);
			$s->execute();

		} catch (PDOException $e) {
			
			$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
			exit();
		}

		$row = $s->fetch();

		$pagetitle = 'Edit Portofolio Details';
		$action = 'editportofolio';
		$id = $row['id'];
		$worktitle = $row['worktitle'];
		$aboutwork = $row['aboutwork'];
		$img = $row['img'];
		$dateevent = $row['dateevent'];
		$button = 'Update';
		$available ='yes';

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/portofolio_form.html.php';
		exit();
	}

	if (isset($_REQUEST['editportofolio'])) {

		if (empty($_FILES['img']['name']) === false) {					

			$img_name = $_FILES['img']['name'];
			$img_size = $_FILES['img']['size'];
			$img_temp = $_FILES['img']['tmp_name'];
			$img_extn = strtolower(end(explode('.', $img_name)));
			$img_target = '../../assets/img/portofolio/' . $img_name;

			$allowed = array('jpg', 'jpeg', 'png', 'gif');					

			if (!in_array($img_extn, $allowed)) {					
				$error = 'file type are incorrect';

			}elseif ($img_size > 2000000) {
				$error = 'file\'s to big ! upload less than 2MB'; 
			}else{
				try {
					include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

					$query = 'SELECT img FROM portofolios WHERE id = :id';
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
		
		if (empty($_REQUEST['worktitle'])) {
			$error = 'Name Fields are require';
		
		}elseif (strlen($_REQUEST['worktitle']) > 140) {
			$error = 'Name was to long';
		
		}elseif (empty($_REQUEST['aboutwork'])) {

			$error = 'About work Fields are require';

		}else{

			try {				

				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';	
				
				$img = (!empty($_FILES['img']['name'])) ? 'assets/img/portofolio/' . $_FILES['img']['name'] : $_REQUEST['image'];

				// echo $img;
				// exit();

				//$cat = (isset($_REQUEST['catalogue'])) ? $_REQUEST['catalogue'] : $_REQUEST['cat'];

				$worktitle = trim($_REQUEST['worktitle']);
				$aboutwork = trim($_REQUEST['aboutwork']);
				$date = $_REQUEST['dateevent'];
				$id = $_REQUEST['id'];				
				
				$q_update = 'UPDATE portofolios SET
						  worktitle = :worktitle,
						  aboutwork = :aboutwork,
						  img = :img,
						  dateevent = :dateevent
						  WHERE id = :id';

				$s = $pdo->prepare($q_update);
				$s->bindValue(':id', $id);
				$s->bindValue(':worktitle', $worktitle);
				$s->bindValue(':aboutwork', $aboutwork);
				$s->bindValue(':img', $img);
				//$s->bindValue(':catalogue', $cat);
				$s->bindValue(':dateevent', $date);
		
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
		$worktitle = $_REQUEST['worktitle'];
		$aboutwork = $_REQUEST['aboutwork'];
		$img = $img;
		//$catalogue = $cat;
		$button = 'Update';
		$available ='yes';

		include $_SERVER['DOCUMENT_ROOT'] .'/enkaproduction/webmaster/views/portofolio_form.html.php';
		exit();

	}

	//DELETE FROM DATABASE
	if (isset($_REQUEST['action']) and $_REQUEST['action'] == 'Delete') {
		
		//DELETE IMAGE FROME DIRECTORY
		try {
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

			$query = 'SELECT img FROM portofolios WHERE id = :id';
			$s = $pdo->prepare($query);
			$s->bindValue(':id', $_REQUEST['id']);
			$s->execute();

			$row = $s->fetch();

			$last_img = $row['img'];
			// print_r($last_img . $_REQUEST['id']);
			// exit();
			unlink('../../' . $last_img);

		} catch (PDOException $e) {
			$output = 'Unable to Update data, because: ' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
			exit();
		}	
		
		//DELETE IMAGE REFERENCE FROM DATABASE
		try {
	
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

			$query = 'DELETE FROM portofolios WHERE id = :id';
			$s = $pdo->prepare($query);
			$s->bindValue(':id', $_REQUEST['id']);
			$s->execute();

		} catch (PDOException $e) {
			
			$output = 'Unable to Delete, because: ' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
			exit();	
		}

		header('Location: .');
		exit();
	}

	//VIEW THE DATA FROM DATABASE
	try {
		
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

		$result = $pdo->query('SELECT * FROM portofolios');

	} catch (PDOException $e) {
		
		$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
		exit();
	}

	while ($row = $result->fetch()) {
		$lists[] = array('id' => $row['id'],
						 'worktitle' => $row['worktitle'],
						 'aboutwork' => $row['aboutwork'],
						 'img' => $row['img'],
						 'dateevent' => $row['dateevent']);
	}

	$row = $result->fetch();

	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/portofolio.html.php';

 ?>