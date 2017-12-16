<?php	
	session_start();
	if(isset($_SESSION['utilizator'])){
		session_unset();
		session_destroy();
		header('Location: ../index.php');
	}
?>
