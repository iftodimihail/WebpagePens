<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Smart Trivia</title>
</head>
<body onload="loadDoc('api/login.php')">
	<?php if(!isset($_SESSION['user'])){ ?>
	<section id="content">
	</section>
	<?php 
		if($_SESSION['error']){
			echo $_SESSION['error'];
			$_SESSION['error']="";
		}
	}
?>
<script src="js/myscript.js"></script>
</body>
</html>

