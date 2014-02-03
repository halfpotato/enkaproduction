<?php 
	// session_start();
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallheader.inc.php'; 
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?>

	<?php if (isset($available)): ?>

		<h2 class="ten-margin"><?php htmlOut($pagetitle); ?></h2>
		<?php if (isset($error)): ?>

			<p class="alert alert-error ten-margin"><?php echo htmlOut($error); ?></p>

		<?php elseif(isset($success)) : ?>
			
			<p class="alert alert-success ten-margin"><?php echo htmlOut($success); ?></p>
		
		<?php endif; ?>

		<form class="form-horizontal" action="?<?php htmlOut($action); ?>" method="post" enctype="multipart/form-data">
		 	<div class="control-group">
		  		<label class="control-label" for="name">Name</label>
			    <div class="controls">
			  	    <input type="text" name="name" value="<?php htmlOut($name); ?>" placeholder="Name">
			    </div>
			</div>
		    	
		   	<div class="control-group">
		    	<label class="control-label" for="description">Description</label>
			    <div class="controls">
					<textarea name="description" id="description" cols="30" rows="10" placeholder="Description"><?php htmlOut($description); ?></textarea>
			    </div>
		 	</div>


			<div class="control-group">
			    <label class="control-label" for="image">Image</label>
			    <div class="controls">
			    	<input type="file" name="img">
			    	<!-- <img src="../../<?php htmlOut($img); ?>" alt="Image" width="150px" height="150px" style="display:block;"> -->
			    </div>
			</div>

			<div class="control-group">
			    <label class="control-label" for="catalogue">Catalogue</label>
			    <div class="controls">
			      	<input type="file" name="catalogue">
				</div>
			</div>

		    <div class="control-group">
			    <div class="controls">
					<a href="?" class="btn">BACK</a>
					<input type="hidden" name="id" value="<?php htmlOut($id); ?>">
					<input type="text" name="image" value="<?php htmlOut($img); ?>">
					<input type="hidden" name="cat" value="<?php htmlOut($catalogue); ?>">
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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallfooter.inc.php'; ?>