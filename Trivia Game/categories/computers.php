<?php
	session_start();
	if(!isset($_GET['difficulty'])){
?>
		<div class = "difficulty">
			<div id="easy"><a href="?category=computers&difficulty=easy">
				Easy
			</a></div>
			<div id ="medium"><a href="?category=computers&difficulty=medium">
				Medium 
			</a></div>
			<div id="hard"><a href="?category=computers&difficulty=hard">
				Hard
			</a></div>
		</div>
<?php
	}
	else{
		echo $_GET['difficulty'];
	}
?>
