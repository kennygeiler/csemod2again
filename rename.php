<?php
session_start();
if(!isset($_SESSION['username'])){
	header("Location: login.php?error=2");
}
if(isset($_GET['file']) && isset($_GET['new'])){
	$username = $_SESSION['username'];
    $dir    = "uploads/{$username}/";
	$old = $dir . $_GET['file'];
	$new = $dir . $_GET['new'];
	
	if(rename($old, $new)){
		header("Location: files.php");
	}else{
		header("Location: files.php?error=4");
	}
}


?>