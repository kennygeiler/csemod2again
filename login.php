<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log In</title>    
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function subLI(){
	document.getElementById('logInForm').setAttribute('action','check_login.php');
	document.getElementById('logInForm').submit();
}
function subRG(){
	document.getElementById('logInForm').setAttribute('action','register.php');
	document.getElementById('logInForm').submit();
}
</script>
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
					}else if($_GET['error'] == 2){
						echo '
						<tr class="errorRow">
							<td colspan="2">you must log in to access that page!</td>
						</tr>';
					}else if($_GET['error'] == 3){
						echo '
						<tr class="errorRow">
							<td colspan="2">that username already exists!</td>
						</tr>';
					}
				}
				?>
            	<tr>
                	<td>Username</td>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                	<td></td>
                    <td>
                    	<div id="logInButton" onClick="subLI()">Log In</div>
                    	<div id="regButton" onClick="subRG()">Register</div>
                    </td>
                    
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
