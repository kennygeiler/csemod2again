<?php
session_start();
$username = $_POST['username'];
$h = fopen("user.txt", "r");
while( !feof($h) ){
	if (strcmp($_POST['username'], fgets($h))) {
		$_SESSION['username'] = $username;
		header("Location: files.html");
		exit;
	}
}
fclose($h);
?>
