<?php
	session_start();
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$user = $_POST['utilizator'];
	$pass = $_POST['parola'];
	test_input($user);
	test_input($pass);
	$file = fopen("../../../res/utilizatori.txt", "r");
	if($file){
		while(!feof($file)){
			$line = test_input(fgets($file));
			if($user."=".$pass === $line){
				$_SESSION['utilizator'] = $user;
				$_SESSION['eroare'] = "";
				break;
			}
		}
		fclose($file);
	}
	if(!isset($_SESSION['utilizator'])){
		$_SESSION['eroare'] = "Eroare!";
	}
	header('Location: ../index.php');
?>