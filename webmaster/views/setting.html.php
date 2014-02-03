<?php 
	// session_start();
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallheader.inc.php'; 
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?>
	<div>
		<?php if (!isset($row['id'])): ?>
		<div>
			<ul class="nav nav-pills">
				<li><a href="?add">ADD Details</a></li>
			</ul>
			<div class="alert">
				<h3>This is your First Time?</h3>
				<p>
					To add details to your website, just click link 'ADD' above and fill all the fields. Enjoy. 
				</p>
			</div>
		</div>
	<?php else: ?>
		<div>
			<ul class="nav nav-pills">
				<li><a href="?edit">Edit Details</a></li>
			</ul>
		</div>

<!-- 		<?php //foreach ($data as $row): ?> -->
		<div class="pad-twenty">
			<legend>
				<h3>SETTING</h3>
			</legend>
				<p>Web name: <span><?php htmlOut($row['webname']); ?></span></p>
			
			<legend>
				<h5>About</h5>
			</legend>
				<p><span><?php htmlOut($row['about']); ?></span></p>
			
			<legend>
				<h5>Why Us</h5>
			</legend>
				<p><span><?php htmlOut($row['whyus']); ?></span></p>
			
			<legend>
				<h5>Office</h5>	
			</legend>
				<p>Office Address: <span><?php htmlOut($row['about']); ?></span></p>
				<p>Office Email: <span><?php htmlOut($row['officemail']); ?></span></p>
				<p>Office Phone: <span><?php htmlOut($row['officephone']); ?></span></p>
		</div>
		
<!-- 		<?php //endforeach ?> -->
	<?php endif ?>
	</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallfooter.inc.php'; ?>