<?php
	session_start();
	if(isset($_SESSION['utilizator'])){
		$file = fopen("../../res/produse.txt", "r");
		$json = '';
		while(!feof($file)){
			$json.=fgets($file);
		}
		$jsonArr = json_decode($json,true);
		fclose($file);
		echo "Nume: ".$jsonArr[$_GET['id']]["nume"]."<br>";
		echo "Producator: ".$jsonArr[$_GET['id']]["producator"]."<br>";
		echo "Preț: ".$jsonArr[$_GET['id']]["pret"]."<br>";
		echo "Descriere: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
		Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
		Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>";
		echo '<form method="post" action="api/modifica.php?id='.$_GET['id'].'">';
		echo '<td><input type="submit" name="addProd" value="Adaugă"></td>';
		echo '</form>';
	}
?>