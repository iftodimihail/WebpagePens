<?php
	if(isset($_SESSION['utilizator'])){
		session_destroy();
	}
	header('Location: http://localhost:5555/TI12/index.php');
?>