
	<?php 
			if(isset($_GET['numePersoana']) && $_GET['numePersoana']!="")
				echo "<h1>Bun venit, ".$_GET['numePersoana']."!</h1>";
		?>
		<form action="index.php">
		<input type="hidden" name="sectiune" value="acasa">
			Nume: <input type="text" name="numePersoana"><br>
			<input type="submit">
		</form>