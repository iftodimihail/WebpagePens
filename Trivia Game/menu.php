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
				<title>Smart Trivia</title>
			</head>
			<body>
		<?php 
				echo "Bun venit, ".$_SESSION['username']."!";
		?>
				<form action="api/logout.php">
					<input type="submit" value="logout">
				</form>
			<?php
				if(!isset($_GET['category'])){
			?>
					<section class="categories">
						<div class="row1">
							<div class="category1" id="computer"> <a href="?category=computers">
								<h2>Computers</h2>
							</a></div>
							<div class="category1" id="geography"><a href="?category=geography">
								<h2>Geografie</h2>
							</a></div>
							<div class="category1" id="history"><a href="?category=history">
								<h2>Istorie</h2>
							</a></div>
						</div>
						<div class="row2">
							<div class="category2" id="music"><a href="?category=music">
								<h2>Muzică</h2>
							</a></div>
							<div class="category2" id="movie"><a href="?category=movie">
								<h2>Film</h2>
							</a></div>
							<div class="category2" id="science"><a href="?category=science">
								<h2>Știință</h2>
							</a></div>
						</div>
					</section>
			<?php
				}
				else
				{	
					?> 
					<a href=<?php echo "menu"; ?>><img src="images/home.png"></a>
					<?php
					include "categories/computers.php";
				}
		?>
			<script src="js/myquestions.js"></script>
			<script src="js/myquiz.js"></script>
			</body>
		</html>
	<?php }
?>
