<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OUTPUT REPORT</title>
</head>
<body>
	<div style="width:40%;
				height:35%;
				margin: 250px auto;
				padding:10px;
				border: 5px dotted #313131;
				border-radius: 8px;
				background-color: #eee;">
		<!-- <h2>There's Something Wrong.</h2> -->
		<p><?php echo htmlspecialchars($output,ENT_QUOTES,'UTF-8'); ?></p>
	</div> 
</body>
</html>