<?php
		$cookieName = $_COOKIE['utilizator'];
		if(isset($cookieName)){
			$jsonFile = fopen("utilizatori/".$cookieName.".json", "w");
			if(isset($_FILES["fileToUpload"])){
				$fileName = $_FILES["fileToUpload"]["name"];
				echo $fileName;
			}
			$txt = '{ 	
						"fisiere":[
						{"nume" = '.$targetFile.'},
						]
					}';
			fwrite($jsonFile, $txt);
		}
?>
