<?php 
	// session_start();
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallheader.inc.php'; 
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?>

	<legend>
		<h3>Contact Developer</h3>
	</legend>

	<?php if (isset($errors)): ?>
		<p class="alert alert-danger"><?php htmlOut($errors); ?></p>
	<?php endif ?>

	<?php if (isset($success)): ?>
		<p class="alert alert-success"><?php htmlOut($success); ?></p>
	<?php endif ?>

	<form class="form-horizontal" action="?mailto" method="post">
 	<div class="control-group">
  		<label class="control-label" for="title">Title</label>
		    <div class="controls">
		  	    <input type="text" name="title">
		    </div>
		</div>
    	
   	<div class="control-group">
    	<label class="control-label" for="message">Message</label>
		    <div class="controls">
			    <textarea name="message" id="" cols="50" rows="5">
			    	
			    </textarea>
		    </div>
 	</div>

  <div class="control-group">
    <div class="controls">
		<!-- <a href="?" class="btn">BACK</a> -->		
   	   <button type="submit" class="btn btn-success">Send</button>
    </div>
  </div>
</form>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallfooter.inc.php'; ?>