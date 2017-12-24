<?
session_start();
function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$validUser = preg_match('([a-zA-z0-9]{3,15})',$user);
	$validPass = preg_match('([a-zA-z0-9]{6,15})',$pass);
	test_input($username);
	test_input($pass);
	if(!(isset($_POST['username']) && isset($_POST['password']))){?>
		<form method="POST" action="api/login.php"> 
					Utilizator: <input pattern="[a-zA-z0-9]{3,15}" type="text" name="username" required>
					Parola: <input pattern="[a-zA-z0-9]{6,15}" type="password" name="password" required>
					<input type="submit" name="loginBtn" value="Login">
					<button id="signUpBtn" onclick="loadDoc('api/signup.php')">Creează-ți cont</button>
		</form>
	<?php
		if(isset($_SESSION['error'])){
			echo $_SESSION['error'];
			$_SESSION['error']="";
		}
	}
	
	else{
		$validUser = preg_match('([a-zA-z0-9]{3,15})',$username);
		$validPass = preg_match('([a-zA-z0-9]{6,15})',$pass);
		$json = file_get_contents('../res/utilizatori.json');
		$jsonArr = json_decode($json,true);
		if($validUser === 1 && $validPass === 1){
			$flag = 0;
			foreach($jsonArr as $user){
				if($user["username"] === $username && $user['password'] === $pass ){
					$flag = 1;
					break;
				}
				elseif($user["username"] === $username && $user["password"] !== $pass){
					$flag = 2;
					break;
				}
			}
			switch($flag){
				case 0: 
					$_SESSION['error'] = "Numele de utilizator nu a fost găsit!";
					header('Location: ../index.php');
					break;
				case 1: 
					$_SESSION['username'] = $username;
					$_SESSION['error'] = "";
					header('Location: ../index.php');
					break;
				case 2:
					$_SESSION['error'] = "Parolă incorectă!";
					header('Location: ../index.php');
					break;
			}
		}
	}
