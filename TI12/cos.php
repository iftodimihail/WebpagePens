<?php
	session_start();
	if(isset($_SESSION['utilizator'])){
		echo "<h1>Bun venit, ".$_SESSION['utilizator']."!</h1>";
?>
		<form method="post" action="api/logout.php">
			<input type="submit" name="logoutBtn" value="Logout">
		</form>
<?php

		
		if(isset($_SESSION['cos'])){
			echo '<table id="productsTable">';
			foreach($_SESSION['cos'] as $index => $item){
				echo '<tr id="'.$index.'">';
				echo '<td>'.$item.'</td>';
				echo '</tr>';
			}
			echo '</table>';
		}
		
		if(isset($_SESSION['cos'])){?>
			<form method="post" action="api/golire.php">
				<input type="submit" name="clearBtn" value="Golește coș">
			</form>
	<?php	
		}
	}
?>
