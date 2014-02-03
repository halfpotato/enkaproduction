<?php  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php'; ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<link rel="stylesheet" href="css/webmaster.css">
<link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>
	<div class="form-header">
		<h2>Enka Production</h2>
	</div>
	<div class="content twenty">
		<?php if (isset($errors)): ?>
			<p class="alert alert-danger"><?php htmlOut($errors); ?></p>
		<?php endif ?>
		<form action="" method="post">

			<div class="control-groups">
				<label class="control-labels" for="email">
					Email:
				</label>	
				<div>
					<input class="control input-block-level" type="text" name="email" placeholder="Your Email">		
				</div>				
			</div>

			<div class="control-groups">
				<label class="control-labels" for="email">
					Password:
				</label>	
				<div class="control">
					<input class="control input-block-level" type="password" name="password" placeholder="Your Password">		
				</div>				
			</div>	

			<input type="hidden" name="action" value="login">
			<input type="submit" value="Log in" class="btn btn-primary btn-block">
		</form>
	</div>
	<div class="form-footer">
		<p>
			<a href="../home"><small><em>BACK TO FRONT</em></small></a>
		</p>
	</div>
</body>
</html>