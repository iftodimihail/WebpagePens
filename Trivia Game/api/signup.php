<?php
	session_start();
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
		
	if(isset($_POST['user']) && isset($_POST['password']) && isset($_POST['passwordConf'])){
		if($_POST['password'] !== $_POST['passwordConf']){
			unset($_POST['user'],$_POST['password']);
			$_SESSION['error']="Parolele introduse nu se potrivesc!";
			header('Location: signup');
		}
		else{			
			$user = $_POST['user'];
			$pass = $_POST['password'];
			$passConf = $_POST['passwordConf'];
			test_input($user);
			test_input($pass);
			test_input($passConf);
			$validUser = preg_match('([a-zA-z0-9]{3,15})',$user);
			$validPass = preg_match('([a-zA-z0-9]{6,15})',$pass);
			$validPassConf = preg_match('([a-zA-z0-9]{6,15})',$passConf);
			$json = file_get_contents('../res/utilizatori.json');
			$jsonArr = json_decode($json,true);
			if($validUser === 1 && $validPass === 1 && $validPassConf === 1){
				$flag = 1;
				foreach($jsonArr as $users){
					if($users["username"]==$user){
						$flag = 0;
						break;
					}
				}
				if($flag === 1){	
					$arrpush['username'] = $user;
					$arrpush['password'] = $pass;
					$jsonArr[sizeof($jsonArr)] = array("username" => $arrpush['username'], "password" =>$arrpush['password']);
					$json = json_encode($jsonArr, JSON_PRETTY_PRINT);
					if (json_decode($json) != null){
						$file = fopen("../res/utilizatori.json","w+");
						fwrite($file, $json);
						fclose($file);
					}
						$_SESSION['succes']="Cont înregistrat!";
						header('Location: ../index');
				}
				else{
					unset($_POST['user'],$_POST['password']);
					$_SESSION['error']="Numele de utilizator deja există!";
					header('Location: signup');
				}
			}
			else{
				unset($_POST['user'],$_POST['password']);
				$_SESSION['error']="Why you do that?";
				header('Location: signup');
			}
		}
	}
	else{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
			<title>Smart Trivia</title>
		</head>
		<body>
			<div class="formContainer">	
				<form method="POST" action="signup">
					<input id="user" pattern="[a-zA-z0-9]{3,15}" type="text" name="user" required autofocus placeholder="Nume utilizator">
					<input id="pass" pattern="[a-zA-z0-9]{6,15}" type="password" name="password" required placeholder="Parola">
					<input id="passConf" pattern="[a-zA-z0-9]{6,15}" type="password" name="passwordConf" required placeholder="Confirmă parola">
					<input id="signup" type="submit" name="signUpBtn" value="Înregistrează-te">
				</form>
					<form method="POST" action="../index">
						<input type="submit" id="login" name="loginBtn" value="Conectează-te">
					</form>
			</div>
			<script src="../js/myscript.js"></script>
		</body>
		</html>
<?php
		if(isset($_SESSION['error'])){
			echo $_SESSION['error'];
			$_SESSION['error'] = "";
		}
	}
?>
