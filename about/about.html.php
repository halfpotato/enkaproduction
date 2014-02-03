<?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_header.html.php'; 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?> 

	<div class="content ten-margin">
		<div class="container">
			<div class="row-fluid">
				<div class="hero-unit">
					<h2>ABOUT US</h2>
					<?php htmlOut($row['about']); ?>
				</div>				
			</div>
		</div>
	</div>	

<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_footer.html.php'; ?>