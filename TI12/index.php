<?php
	session_start();
?>
	<?php if(!isset($_SESSION['utilizator'])){ ?>
		<form method="POST" action="api/login.php"> 
			Utilizator: <input type="text" name="utilizator" value="ana" required>
			Parola: <input type="text" name="parola" value="1234" required>
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
		
		<?php
		$file = fopen("../../res/produse.txt", "r");
		$json = '';
		while(!feof($file)){
			$json.=fgets($file);
		}
		$jsonArr = json_decode($json,true);
		echo '<table id="productsTable">';
		foreach($jsonArr as $item){
			echo '<tr id="'.$item["id"].'">';
			echo '<td>'.$item["nume"].'</td>';
			echo '<td>'.$item["producator"].'</td>';
			echo '<td>'.$item["pret"].'</td>';
			echo '</tr>';
		}
		echo '</table>';
		session_destroy();
	}
?>
