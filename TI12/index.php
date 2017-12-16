<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>TI 12</title>
</head>
<body>
	<?php if(!isset($_SESSION['utilizator'])){ ?>
		<form method="POST" action="api/login.php"> 
			Utilizator: <input type="text" name="utilizator" required>
			Parola: <input type="text" name="parola" required>
			<input type="submit" name="loginBtn" value="Login">
		</form>
	<?php 
		if($_SESSION['eroare']){
			echo $_SESSION['eroare'];
			$_SESSION['eroare']="";
		}
	}
	else{
		echo "<h1>Bun venit, ".$_SESSION['utilizator']."!</h1>";
		?> 
		
		<form method="post" action="api/logout.php">
			<input type="submit" name="logoutBtn" value="Logout">
		</form>
		
		<form method="post" action="cos.php">
			<input type="submit" name="cartBtn" value="Coș">
		</form>
		
		<?php
		$file = fopen("../../res/produse.txt", "r");
		$json = '';
		while(!feof($file)){
			$json.=fgets($file);
		}
		fclose($file);
		$jsonArr = json_decode($json,true);
		?>
		<table id="productsTable" style="text-align:center; border-collapse: collapse;">
		<tr style="border: 1px solid;"><td>Nume produs</td><td>Producător</td><td>Preț</td><td>Adaugă în coș</td></tr>
		<?php
		foreach($jsonArr as $item){
			echo '<tr style="border: 1px solid" id="'.$item["id"].'">';
			echo '<td><a href="produs.php?id='.$item["id"].'">'.$item["nume"].'</td>';
			echo '<td>'.$item["producator"].'</td>';
			echo '<td>'.$item["pret"].'</td>';
			echo '<form method="post" action="api/modifica.php?id='.$item["id"].'">';
			echo '<td><input type="submit" name="addProd" value="Adaugă"></td>';
			echo '</form>';
			echo '</tr>';
		}
		echo '</table>';
	}
?>
</body>
</html>

