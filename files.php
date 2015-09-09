<?php
session_start();
if(!isset($_SESSION['username'])){
	header("Location: login.php");
}
?>
<html>
<head>
	<title>file sharing site</title>
</head>
<body>
<h1>Hello, <?php echo $_SESSION['username'] ?></h1>
<a href="logout.php">logout</a>

<form enctype="multipart/form-data" action="file_upload.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
</form>

<?php
$username = $_SESSION['username'];
$dir    = "uploads/{$username}/";
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
		if(is_file($dir . $file)){
	      echo "<a href=\"" . $dir . $file . "\">filename:" . $file . "</a><br>";
		}
    }
    closedir($dh);
  }else{
  	echo 'directory could not be opened';
  }
}else{
	echo 'directory not found';
}
?>

</body>
</html>
