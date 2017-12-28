<?php
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
	
	function formCase($x){
		switch($x){
			case 1:
				echo '<form method="POST" action="api/signup">
					Nume utilizator: <input pattern="[a-zA-z0-9]{3,15}" type="text" name="user" required>
					Parola: <input id="pass" pattern="[a-zA-z0-9]{6,15}" type="password" name="password" required>
					Confirmă parola: <input id="passConf" pattern="[a-zA-z0-9]{6,15}" type="password" name="passwordConf" required>
					<input type="submit" name="signUpBtn" value="Înregistrează-te">
				</form>';
				break;
			case 2: echo '<form method="POST" action="signup">
					Nume utilizator: <input pattern="[a-zA-z0-9]{3,15}" type="text" name="user" required>
					Parola: <input id="pass" pattern="[a-zA-z0-9]{6,15}" type="password" name="password" required>
					Confirmă parola: <input id="passConf" pattern="[a-zA-z0-9]{6,15}" type="password" name="passwordConf" required>
					<input type="submit" name="signUpBtn" value="Înregistrează-te">
				</form>';
				break;
		}
	}
			
	if(!isset($_POST['user']) && !isset($_POST['password']) && !isset($_POST['passwordConf'])){
		formCase(1);
	}	
	else{
		if($_POST['password'] !== $_POST['passwordConf']){
			formCase(2);
			echo "Parolele introduse nu se potrivesc!";
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
						header('Location: ../index');
				}
				else{
					formCase(2);
					echo "Numele de utilizator deja există!";
				}
			}
			else{
				formCase(2);
				echo "Why you do that?";
			}
		}
	}
?>
