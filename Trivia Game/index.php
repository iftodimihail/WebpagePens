<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Smart Trivia</title>
	</head>
	<body <?php if(!isset($_SESSION['username'])) echo "onload=loadDoc('api/login.php')";?>>
		<main id="content">
			
		</main>
		<script src="js/myscript.js"></script>
	</body>
</html>
