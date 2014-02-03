<?php 
	
	// include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';
	// try {

	// 	$result = $pdo->query('SELECT * FROM portofolios');			
	
	// } catch (Exception $e) {
	// 	$output = 'Unable to fetch data from database, because: ' . $e->getMessage();
	// 	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/output.html.php';
	// 	exit();			
	// }	

	// while ($row = $result->fetch()) {
	// 	$lists[] = array('id' => $row['id'], 'worktitle' => $row['worktitle'], 'aboutwork' => $row['aboutwork'], 'img' => $row['img'], 'dateevent' => $row['dateevent']);
	// }

	// $row = $result->fetch();

	try {
		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/core/db.inc.php';			

		$q = $pdo->query('SELECT COUNT(id) FROM portofolios');
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
			$query = 'SELECT * FROM portofolios ORDER BY id DESC LIMIT ' . $limits;
			
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
						   'worktitle' => $resrow['worktitle'],
						   'aboutwork' => $resrow['aboutwork'],
						   'img' => $resrow['img'],
						   'dateevent' => $resrow['dateevent']);						   		
		}		

		include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/portofolio/portofolio.html.php';

	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	// include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/portofolio/portofolio.html.php';

 ?>