<?php
session_start();
$username = $_POST['username'];
$h = fopen("user.txt", "r");
//echo $_POST['username'];
while( !feof($h) ){
	$l = fgets($h);
	echo $l;
	if(($username . ' ') === $l){
		echo 'true';
	}else{echo'false';}
	echo '<br/>';
	/*if (strcmp($_POST['username'], fgets($h)) == 0) {
		$_SESSION['username'] = $username;
		header("Location: files.php");
		exit;
	}*/
}
fclose($h);
?>
