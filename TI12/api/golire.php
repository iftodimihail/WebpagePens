<?php
	session_start();
	if(isset($_SESSION['cos'])){
		unset($_SESSION['cos']);
		header('Location: ../index.php');
	}
?>