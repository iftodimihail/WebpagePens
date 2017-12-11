<?php
	if (isset($_POST['path']) && file_exists($_POST['path'])) {
		$path = $_POST['path'];
		unlink($path);
	}
?>