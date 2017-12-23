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
	<body <?php if(!(isset($_SESSION['username']) || isset($_SESSION['error']))) echo "onload=loadDoc('api/login.php')";?>>
		<section id="content">
		<?php if(isset($_SESSION['username'])){
			echo "Welcome, ".$_SESSION['username']."!";
			?>
			<form action="api/logout.php">
				<input type="submit" value="logout">
			</form>
		<?php 
		}
		else{
			echo $_SESSION['error'];
			$_SESSION['error']="";
		}
		?>
		</section>
	<script src="js/myscript.js"></script>
	</body>
</html>

