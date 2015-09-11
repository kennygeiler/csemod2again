<?php
session_start();
if(!isset($_SESSION['username'])){
	header("Location: login.php?error=2");
}
include 'config.php';

// Get the username and make sure it is valid
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo "Invalid username";
	exit;
}

// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}
echo $filename . '<br/>';

$full_path = sprintf("uploads\\%s\\%s", $username, $filename);

echo $full_path;

if(!is_dir("uploads/" . $username . "/")){
	mkdir("uploads/".$username."/");
}

if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	header("Location: files.php");
	exit;
}else{
	header("Location: files.php?error=1");
	exit;
}
 
?>
