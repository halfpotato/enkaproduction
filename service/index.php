<?php 

	if (isset($_GET['srvd'])) {

		$id = (int)$_GET['srvd'];
		//$cekID;

			try {
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';			
				$query = 'SELECT COUNT(id) FROM sevices WHERE id = :id';

				$s = $pdo->prepare($query);

				$s->bindValue(':id', $id);
				$s->execute();

				$row = $s->fetch();			
				$cekID = $row[0];

			} catch (PDOException $e) {
				$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
				exit();
			}

		if (!$id || $cekID < 1) {		
			exit("not found");

		}else{
			try {

				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';

				$query = 'SELECT * FROM sevices WHERE id = :id';
				$s = $pdo->prepare($query);

				$s->bindValue(':id', $id);
				$s->execute();

				$row = $s->fetch();
				
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/service/serviceMore.html.php';
				exit();

			} catch (PDOException $e) {
				
				$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
				include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
				exit();
			}
		}
	}

	try {
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';			

		$q = $pdo->query('SELECT COUNT(id) FROM sevices');
		$row = $q->fetch();

		//total row count
		$rows = $row[0];
		//display per page
		$page_rows = 4;
		//last page
		$last = ceil($rows/$page_rows);
		//nilai last tidak boleh kurang dari 1
		if ($last < 1) {
			$last = 1;
		}
		//nilai default dari page number variable adalah 1
		$page_number = 1;
		//pengecekan untuk nilai yang di dapatkan dari query string
		if (isset($_GET['pn'])) {
			$page_number = preg_replace('#[^0-9]#', '', $_GET['pn']);
		}

		try {
			
			$inlimit = 'LIMIT ' . ($page_number - 1) * $page_rows . ',' . $page_rows;
			$limits = ($page_number - 1) * $page_rows . ',' . $page_rows;
			$query = 'SELECT * FROM sevices ORDER BY id DESC LIMIT ' . $limits;
			
			$s = $pdo->prepare($query);
			// $s->bindValue(':limits', $limit);
			$s->execute();
			
			// $result = $s->fetch();
			// print_r($result);
			// exit();			

		} catch (Exception $e) {
			echo $e->getMessage();
		}

		$paginationCtrl = '';
		if ($last != 1) {
			
			if ($page_number > 1) {
				$previous = $page_number - 1;
				$paginationCtrl .= '<a href="' . $_SERVER['PHP_SELF'] .'?pn='. $previous . '">Previous</a>&nbsp;';

				for ($i= $page_number - 4; $i < $page_number ; $i++) { 
					if ($i > 0) {
						$paginationCtrl .= '<a href="'. $_SERVER['PHP_SELF'] .'?pn='. $i . '">'. $i .'</a>&nbsp;';
					}
				}
			}

			$paginationCtrl .= ''. $page_number . '&nbsp;';

			for ($i= $page_number + 1; $i <= $last ; $i++) { 
				if ($i > 0) {
					$paginationCtrl .= '<a href="'. $_SERVER['PHP_SELF'] .'?pn='. $i . '">'. $i .'</a>&nbsp;';
					if ($i > $page_number+4) {
						break;
					}
				}
			}

			if ($page_number != $last) {
				$next = $page_number + 1;
				$paginationCtrl .= '<a href="' . $_SERVER['PHP_SELF'] .'?pn='. $next . '">Next</a>&nbsp;';
			}
		}
		
		while ($resrow = $s->fetch()) {
			$lists[] = array('id' => $resrow['id'],
						   'name' => $resrow['name'],
						   'description' => $resrow['description'],
						   'img' => $resrow['img'],
						   'catalogue' => $resrow['catalogue']);						   		
		}		

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/service/service.html.php';

	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	// while ($row = $result->fetch()) {
	// 	$lists[] = array('id' => $row['id'], 
	// 					 'name' => $row['name'], 
	// 					 'description' => $row['description'], 
	// 					 'img' => $row['img'], 
	// 					 'catalogue' => $row['catalogue']);
	// }

	//include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/service/service.html.php';

 ?>