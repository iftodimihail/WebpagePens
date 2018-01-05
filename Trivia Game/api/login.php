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
	test_input($username);
	test_input($pass);
	
	if(!isset($username) && !isset($pass)){?>
		<div class="formContainer">
			<form method="POST" action="api/login"> 
					<input id="user" pattern="[a-zA-z0-9]{3,15}" type="text" name="username" required autofocus placeholder="Nume utilizator">
					<input id="pass" pattern="[a-zA-z0-9]{6,15}" type="password" name="password" required placeholder="Parola">
					<input id="login" type="submit" name="loginBtn" value="Login">
			</form>
			<?php
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				$_SESSION['error']="";
			}
			if(isset($_SESSION['succes'])){
				echo $_SESSION['succes'];
				$_SESSION['succes']="";
			}
			?>	
				<form method="POST" action="api/signup">
					<input type="submit" id="signUpBtn" name="signUpBtn" value="Creează-ți cont"><br>
				</form>
		</div>
<?php		
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
					header('Location: ../index');
					break;
				case 1: 
					$_SESSION['username'] = $username;
					$_SESSION['error'] = "";
					header('Location: ../menu');
					break;
				case 2:
					$_SESSION['error'] = "Parolă incorectă!";
					header('Location: ../index');
					break;
			}
		}
	}
?>
