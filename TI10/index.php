<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>TI 10</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
		<nav class="navbar">
		  <ul class="nav nav-pills navbar-fixed-top">
			
			<li>
			  <a href="index.php?sectiune=acasa">Acasă</a>  
			 </li> 
			
			<li>
			  <a href="index.php?sectiune=info">Info</a>
			</li>
			
			 <li>
			  <a href="index.php?sectiune=test">Test</a>
		   </li> 
			
		  </ul>
  </nav>
	</header>
			
	<section id="content">
		<?php	
		if($_GET['sectiune']=="")
			$_GET['sectiune']="acasa";
		
		if(isset($_GET['sectiune']) && $_GET['sectiune']!="")
			include $_GET['sectiune'].".php";
		?>
	</section>
		
	</body>
</html>
