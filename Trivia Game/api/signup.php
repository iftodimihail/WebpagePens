<?php
	session_start();
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
	
	if(isset($_POST['user']) && isset($_POST['password'])){
		$user = $_POST['user'];
		$pass = $_POST['password'];
		$confPass = $_POST['confPassword'];
		$age = $_POST['age'];
		test_input($user);
		test_input($pass);
		test_input($confPass);
		test_input($age);
		$validUser = preg_match('([a-zA-z0-9]{3,15})',$user);
		$validPass = preg_match('([a-zA-z0-9]{6,15})',$pass);
		if($validUser === 1 && $validPass === 1){
			$json = file_get_contents('../res/utilizatori.json');
			$jsonArr = json_decode($json,true);
			$arrpush['username'] = $user;
			$arrpush['password'] = $pass;
			$jsonArr[sizeof($jsonArr)] = array("username" => $arrpush['username'], "password" =>$arrpush['password']);
			$json = json_encode($jsonArr);
			if (json_decode($json) != null){
				$file = fopen("../res/utilizatori.json","w+");
				fwrite($file, $json);
				fclose($file);
			}
		}
	}
?>
	
