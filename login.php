<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log In</title>    
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="loginBox">
    	<form action="check_login.php" method="POST" id="logInForm">
        	<table>
            	<tr>
                	<td colspan="2"><h1>Log In</h1></td>
                </tr>
                <?php
				if(isset($_GET['error'])){
					if($_GET['error'] == 1){
						echo '
						<tr class="errorRow">
							<td colspan="2">incorrect username!</td>
						</tr>';
					}
				}
				?>
            	<tr>
                	<td>Username</td>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                	<td colspan="2"><div id="logInButton" onClick="document.getElementById('logInForm').submit();">Log In</div></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
