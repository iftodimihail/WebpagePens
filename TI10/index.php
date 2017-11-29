<DOCTYPE html>
<html>
	<body>
		<div class="nav-bar">
				<nav class="nav">
					<a href="index.php?sectiune=acasa">acasa</a>
					<a href="index.php?sectiune=info">info</a>
				</nav>
			</div>
			
	<section id="content">
		<?php	
		if($_GET['sectiune']=="")
			include "acasa.php";
		
		if(isset($_GET['sectiune']) && $_GET['sectiune']!="")
			include $_GET['sectiune'].".php";
		?>
	</section>
		
	</body>
</html>