<?php
	session_start();
	$file = fopen("../../../res/produse.txt", "r");
	$json = '';
	while(!feof($file)){
		$json.=fgets($file);
	}
	$jsonArr = json_decode($json,true);
	
	if(empty($_SESSION['cos'])){
		$_SESSION['cos'] = array();
	}
	array_push($_SESSION['cos'], $jsonArr[$_GET['id']]["nume"]);
	header('Location: http://localhost:5555/TI12/index.php');
?>
