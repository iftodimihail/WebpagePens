<?php
	session_start();
	if($_SESSION['username']=="")
	{
		session_unset();
		session_destroy();
		header('Location: /index');
	}
	else{
?>		
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8">
				<meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<link rel="stylesheet" type="text/css" href="css/style.css">
				<link href="images/favicon.ico" rel="icon" type="image/x-icon">
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<title>Smart Trivia</title>
			</head>
			<body>
			<div class="home">
		<?php 
		?>	
			<a href="menu"><img id="banner" src="images/banner.png"></a>
			<div id="logoutdiv">
				<form action="api/logout.php">
					<input id="logout" type="image" src="images/logout.png" alt="submit" value="logout">
				</form>
			</div>
			<?php
				if(!isset($_GET['category'])){
			?>
					<div class="categories">
							<div class="category1" id="computers"><a href="?category=computers">
								<h2>Computers</h2>
								<img src="images/categories/computer.png">
							</a></div>
							<div class="category1" id="geography"><a href="?category=geografie">
								<h2>Geografie</h2>
								<img style="margin-top:10px" src="images/categories/geography.png">
							</a></div>
							<div class="category1" id="history"><a href="?category=istorie">
								<h2>Istorie</h2>
								<img style="margin-top:5px" src="images/categories/history.png">
							</a></div>
							<div class="category2" id="music"><a href="?category=muzică">
								<h2>Muzică</h2>
								<img style="margin-top:5px" src="images/categories/music.png">
							</a></div>
							<div class="category2" id="movie"><a href="?category=film">
								<h2>Film</h2>
								<img style="margin-top:0px" src="images/categories/movie.png">
							</a></div>
							<div class="category2" id="science"><a href="?category=știință">
								<h2>Știință</h2>
								<img style="margin-top:0px" src="images/categories/science.png">
							</a></div>
					</div>
				</div>
			<?php
				}
				else
				{	
					include "quiz.php";
				}
		?>
			<script src="js/myquestions.js"></script>
			<script src="js/quiz.js"></script>
			</body>
		</html>
	<?php }
?>
