<?php 
	include 'overallheader.inc.php'; 
	include '../../includes/helper.func.php';
?>
	<div>
		<ul class="nav nav-pills">
			<li><a href="?add">ADD WEBMASTER</a></li>
		</ul>
	</div>

	<div>
		<table border="0" cellspacing="10" class="table table-bordered table-striped table-condensed">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			<?php foreach ($lists as $list): ?>
				<form action="" method="post">
					<tr>
						<td><?php htmlOut($list['name']); ?></td>
						<td><?php htmlOut($list['email']); ?></td>
						<td>
							<input type="hidden" name="id" value="<?php htmlOut($list['id']); ?>">
							<input class="btn btn-block btn-mini" type="submit" name="action" value="Edit">
							<input class="btn btn-danger btn-block btn-mini" type="submit" name="action" value="Delete">
						</td>
					<tr>
				</form>
			<?php endforeach ?>
		</table>
	</div>

<?php include 'overallfooter.inc.php'; ?>