<?php
session_start();
if(!isset($_SESSION['username'])){
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_SESSION['username'] ?>'s Files</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/flick/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="includes/scripts.js"></script>
</head>

<body>
	<div class="main">
    	<h1>Hello, <?php echo $_SESSION['username'] ?></h1>
        <a href="logout.php" id="logOutButton">log out</a>
        <form id="fileUpload" enctype="multipart/form-data" action="file_upload.php" method="POST">                
            <div onclick="filePicker('filePicker')" class="uploadButton" id="upload_btn">choose file</div>
            <div style="width:0px; height:0px; overflow:hidden"><input type="file" value="upload" id="filePicker" name="uploadedfile" onChange="filePickerUpdate(this, 'upload_btn', 'fileUpload')"></div>
        </form>
        
        <table class="fileTable">
        	<thead>
            	<tr>
                	<th>Name</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Actions</th>
                </tr>
			</thead>
            <tbody>
				<?php
                $username = $_SESSION['username'];
                $dir    = "uploads/{$username}/";
                if (is_dir($dir)){
					if ($dh = opendir($dir)){
						while (($file = readdir($dh)) !== false){
							if(is_file($dir . $file)){
								$fp = $dir . $file;
								$info = pathinfo($fp);
								
								$fn = $info['basename'];
								$ft = $info['extension'];
								$fs = filesize($fp);
								
								echo'
								<tr>
									<td><a href="' . $fp . '">' . $fn . '</a></td>
									<td>' . $ft . '</td>
									<td>' . $fs . '</td>
									<td>3</td>
								</tr>';
							}
						}
						closedir($dh);
					}else{
						echo '<tr><td colspan="4">directory could not be opened</td</tr>';
					}
                }else{
                    echo '<tr><td colspan="4">directory not found</td</tr>';
                }
                ?>
            </tbody>
        </table>
        
        
    </div>



</body>
</html>
