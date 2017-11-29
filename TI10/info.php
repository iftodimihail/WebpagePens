<?php 
echo "<h1>Server info</h1>";
echo $_SERVER['SERVER_ADDR'];
echo "<br>";
echo $_SERVER['SERVER_PORT'];
echo "<br>";
echo $_SERVER['SERVER_SIGNATURE'];
echo "<br>";
echo "<h1>Client info</h1>";
echo $_SERVER['REMOTE_ADDR'];
echo "<br>";
echo $_SERVER['REMOTE_PORT'];
echo "<br>";
echo "<h1>Adresa url</h1>";
echo $_SERVER['HTTP_REFERER'];
?>