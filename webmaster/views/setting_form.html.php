<?php 
	// session_start();
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallheader.inc.php'; 
	include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?>

	<form class="form-horizontal" action="?<?php htmlOut($action); ?>" method="post">
	 	
	 	<legend>
	 		<h5>Web Details</h5>
	 	</legend>
	 	<div class="control-group">
	  		<label class="control-label" for="webname">Web Name :</label>
		    <div class="controls">
		  	    <input type="text" name="webname" value="<?php htmlOut($webname); ?>" placeholder="Website Name">
		    </div>
		</div>

		<legend>
			<h5>About</h5>
		</legend>
		<div class="control-group">
	  		<label class="control-label" for="about">About :</label>
		    <div class="controls">
				<textarea name="about" cols="10" rows="5"><?php htmlOut($about); ?></textarea>
		    </div>
		</div>

		<div class="control-group">
	  		<label class="control-label" for="whyus">Why Us :</label>
		    <div class="controls">
				<textarea name="whyus" cols="10" rows="5"><?php htmlOut($whyus); ?></textarea>
		    </div>
		</div>

		<legend>
			<h5>Office Information</h5>
		</legend>
		<div class="control-group">
	  		<label class="control-label" for="officeaddress">Office Address :</label>
		    <div class="controls">
				<input type="text" name="officeaddress" placeholder="Address" value="<?php htmlOut($officeaddress); ?>">
		    </div>
		</div>

		<div class="control-group">
	  		<label class="control-label" for="officemail">Office Email :</label>
		    <div class="controls">
				<input type="text" name="officemail" placeholder="Email" value="<?php htmlOut($officemail); ?>">
		    </div>
		</div>

		<div class="control-group">
	  		<label class="control-label" for="officephone">Office Phone :</label>
		    <div class="controls">
				<input type="text" name="officephone" placeholder="Phone" value="<?php htmlOut($officephone); ?>">
		    </div>
		</div>

		<div class="control-group">
			<div class="controls">
				<input type="hidden" name="id" value="<?php htmlOut($id); ?>">
				<a href="?" class="btn">BACK</a>
				<input type="submit" value="Update" class="btn btn-primary">
			</div>
		</div>
	</form>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/webmaster/views/overallfooter.inc.php'; ?>