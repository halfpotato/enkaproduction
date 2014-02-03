<?php 
	include 'overallheader.inc.php'; 
	include '../../includes/helper.func.php';
?>

<legend>
	<h2><?php htmlOut($pagetitle); ?></h2>
</legend>

<?php if (isset($errors)): ?>
	<div>
		<p class="alert alert-error"><?php htmlOut($errors); ?></p>
	</div>
<?php endif ?>

<form class="form-horizontal" action="?<?php htmlOut($action); ?>" method="post">
 	<div class="control-group">
  		<label class="control-label" for="name">Name</label>
		    <div class="controls">
		  	    <input type="text" name="name" value="<?php htmlOut($name); ?>" placeholder="Name">
		    </div>
		</div>
    	
   	<div class="control-group">
    	<label class="control-label" for="email">Email</label>
		    <div class="controls">
			    <input type="text" name="email" value="<?php htmlOut($email); ?>" placeholder="Email">
		    </div>
 	</div>

  <div class="control-group">
    <label class="control-label" for="pass1">Password</label>
    <div class="controls">
      <input type="password" name="pass1" value="<?php htmlOut($password); ?>" placeholder="Password">
    </div>
  </div>

 <div class="control-group">
    <label class="control-label" for="Pass2">Confirm Password</label>
    <div class="controls">
      <input type="password" name="pass2" value="<?php htmlOut($password); ?>" placeholder="Password">
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
		<a href="?" class="btn">BACK</a>
		<input type="hidden" name="id" value="<?php htmlOut($id); ?>">
   	   <button type="submit" class="btn btn-success"><?php htmlOut($button); ?></button>
    </div>
  </div>
</form>

<?php include 'overallfooter.inc.php'; ?>