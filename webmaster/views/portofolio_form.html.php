<?php 
	// session_start();
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallheader.inc.php'; 
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?>

<?php if (isset($available)): ?>

	<h2 class="ten-margin"><?php htmlOut($pagetitle); ?></h2>
	<?php if (isset($error)): ?>
		<p class="alert alert-error ten-margin"><?php echo $error; ?></p>
	<?php endif; ?>

	<form class="form-horizontal" action="?<?php htmlOut($action); ?>" method="post" enctype="multipart/form-data">
	 	<div class="control-group">
	  		<label class="control-label" for="worktitle">Work Title</label>
		    <div class="controls">
		  	    <input type="text" name="worktitle" value="<?php htmlOut($worktitle); ?>" placeholder="Name">
		    </div>
		</div>
	    	
	   	<div class="control-group">
	    	<label class="control-label" for="aboutwork">Description</label>
		    <div class="controls">
				<textarea name="aboutwork" id="aboutwork" cols="30" rows="10" placeholder="Description"><?php htmlOut($aboutwork); ?></textarea>
		    </div>
	 	</div>


		<div class="control-group">
		    <label class="control-label" for="image">Image</label>
		    <div class="controls">
		    	<input type="file" name="img">
		    	<img src="../../<?php htmlOut($img); ?>" alt="IMAGE" width="150px" height="150px" style="display:block;">
		    </div>
		</div>

		<div class="control-group">
		    <label class="control-label" for="dateevent">Date Event</label>
		    <div class="controls">
		    	<input type="date" name="dateevent" value="<?php htmlOut($dateevent); ?>">		    	
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
<?php else: ?>
	<div class="alert">
		<h3>Unfortunately,</h3>
		<p>This feature not available in this version because some reason.</p>
		<p>We'll contact you soon if this feature available.</p>
		<a href="?" class="btn">BACK</a>
	</div>

<?php endif ?>

<!-- <div class="alert">
	<h3>Unfortunately,</h3>
	<p>This feature not available in this version because some reason.</p>
	<p>We'll contact you soon if this feature available.</p>
	<a href="?" class="btn">BACK</a>
</div> -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallfooter.inc.php'; ?>