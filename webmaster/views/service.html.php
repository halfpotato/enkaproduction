<?php 
	// session_start();
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallheader.inc.php'; 
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?>

	<div>
		<ul class="nav nav-pills">
			<li><a href="?add">ADD SERVICE</a></li>
		</ul>
	</div>
	<div>

<!-- 		<?php //if (!isset($row['id'])): ?>
			<div class="alert">
				<h3>This is your first time?</h3>
				<p>To add an service it's very simple you just click link ADD above and fill all require fields. Enjoy.</p>
			</div>
		<?php //else: ?> -->
			<table class="table table-bordered table-condensed">
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Image</th>
					<th>Catalogue</th>
					<th>Action</th>
				</tr>
			<?php foreach ($lists as $list): ?>
				<form action="" method="post">
					<tr>
						<td width="20%"><?php htmlOut($list['name']); ?></td>
						<td width="40%"><?php htmlOut($list['description']); ?></td>
						<td width="10%"><img src="../../<?php echo htmlOut($list['img']); ?>" alt="" style="width:100%;"></td>
						<td width="20%"><?php htmlOut($list['catalogue']) ?></td>
						<td width="10%">
							<input type="hidden" name="id" value="<?php htmlOut($list['id']); ?>">

							<input class="btn btn-block btn-mini" type="submit" name="action" value="Edit">
							<input class="btn btn-danger btn-block btn-mini" type="submit" name="action" value="Delete">			
						</td>
					</tr>
				</form>
			<?php endforeach ?>
			</table>
<!-- 		<?php //endif ?> -->

	</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallfooter.inc.php'; ?>