<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>TI 11</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
	</head>
	<body onload="getCookie('utilizator')">		
		<section class="content1">
		<form method="POST">
			Nume: <input id="cookieInput" type="text" name="nume">
			<input type="submit" value="Încarcă" name="button" onclick="setCookie()">
		</form>
		</section>
		<section class="content2">
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
					
				function setTable(){
					$cookieName = $_COOKIE['utilizator'];
					if(isset($cookieName)){
						$userDir = "utilizatori/".$cookieName;
						if(is_dir($userDir)){
							$fileArray = array_slice(scandir($userDir), 2);
							echo "<table id='table'>";
							echo "<tr>";
							echo "<td>Nume</td> <td>Extensie</td> <td>Dată Modificare</td> <td>Dimensiune</td> <td>Link</td> <td>Șterge</td>";
							echo "</tr>";
							foreach($fileArray as $index => $file){
								$filePath = $userDir."/".$file;
								$rowId = "fileRow".$index;
								echo '<tr id="'.$rowId.'">';
								echo "<td>".(pathinfo($file, PATHINFO_FILENAME))."</td>";
								echo "<td>".(pathinfo($file, PATHINFO_EXTENSION))."</td>";
								echo "<td>".(date("d M Y H:i:s", filemtime($filePath)))."</td>";
								echo "<td>".(formatSizeUnits(filesize($filePath)))."</td>";
								echo '<td><a href="'.$filePath.'">Link</a></td>';
								echo '<td><button onclick="deleteFileOnServer(\''.$filePath.'\', '.$rowId.');">Șterge</button></td>';
								echo "</tr>";
							}
							echo "</table>";
						}
						else{
							echo "<p>Driectorul nu există!<p>";
						}
					}
					else{
						echo "<p>Cookie nesetat<p>";
					}
				}
				if(array_key_exists('button',$_POST)){
					setTable();
				}
			?>
		</section>
		<section class="content3">
			<form method="post" enctype="multipart/form-data" onsubmit="event.preventDefault(); addFileOnServer()">
				Selectează fișiere: <input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload" name="submit">
			</form>
		</section>
		<script src="js/myscript.js"></script>
	</body>
</html>
