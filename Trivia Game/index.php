<?php
	session_start();
	if(isset($_SESSION['username'])){
		header('Location: menu');
	}
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
	<body onload="loadDoc('api/login.php')">
		<main id="content">
			
		</main>
		<script src="js/myscript.js"></script>
	</body>
</html>
