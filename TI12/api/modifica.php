<?php
	session_start();
	$file = fopen("../../../res/produse.txt", "r");
	$json = '';
	while(!feof($file)){
		$json.=fgets($file);
	}
	$jsonArr = json_decode($json,true);
	fclose($file);
	$prodName = $jsonArr[$_GET['id']]["nume"];
	if(empty($_SESSION['cos'])){
		$_SESSION['cos'] = array();
		array_push($_SESSION['cos'], $prodName);
	}
	else{
		$key = array_search($prodName, $_SESSION['cos']);
		if($key === false)
			array_push($_SESSION['cos'], $prodName);
		else
			unset($_SESSION['cos'][$key]);
	}
	header('Location: ../index.php');
?>
