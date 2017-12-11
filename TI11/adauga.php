<?php
function formatSizeUnits($bytes)
				{
					if ($bytes >= 1073741824)
					{
						$bytes = number_format($bytes / 1073741824, 2) . ' GB';
					}
					elseif ($bytes >= 1048576)
					{
						$bytes = number_format($bytes / 1048576, 2) . ' MB';
					}
					elseif ($bytes >= 1024)
					{
						$bytes = number_format($bytes / 1024, 2) . ' KB';
					}
					elseif ($bytes > 1)
					{
						$bytes = $bytes . ' bytes';
					}
					elseif ($bytes == 1)
					{
						$bytes = $bytes . ' byte';
					}
					else
					{
						$bytes = '0 bytes';
					}
					return $bytes;
				}
		$cookieName = $_COOKIE['utilizator'];
		$dir = "utilizatori/";
		
		//checks if the user directory exists and sets it
		if(isset($cookieName))
			$dir = $dir.$cookieName."/";
		
		$file = $dir.basename($_FILES['fileToUpload']['name']);
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file);
		
		//add the header response
		header("Content-Type: application/json;charset=utf-8");
		
		//response array with the data
		$id = uniqid("fileRow");
		$dataArray = array(
			$id,
			pathinfo($file, PATHINFO_FILENAME),
			pathinfo($file, PATHINFO_EXTENSION),
			date("d M Y H:i:s", filemtime($file)),
			formatSizeUnits(filesize($file)),
			'<a href="'.$file.'">Link</a>',
			'<button onclick="deleteFileOnServer(\''.$file.'\', '.$id.');">Șterge</button>'
		);
		
		//transforms the array in a json type format 
		$jsonData = json_encode($dataArray);
		echo $jsonData;
?>
