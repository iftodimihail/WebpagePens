<?php
	session_start();
	$user = $_POST['utilizator'];
	$pass = $_POST['parola'];
	
	if($user == "ana" && $pass == "1234"){
		$_SESSION['utilizator'] = $user;
		$_SESSION['eroare'] = "";
		header('Location: http://localhost:5555/TI12/index.php');
	}
	else{
		$_SESSION['eroare'] = "Eroare!";
		header('Location: http://localhost:5555/TI12/index.php');
	}
?>