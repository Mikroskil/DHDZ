<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>
</head>

<body>
<?php

$username = $password = '';
$usernameErr = $passwordErr = '';
$allow = 1;

//validation
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST['username'])){
		$usernameErr="*username must not empty!";
		$allow = 0;
		}
	else {
		$username = trim($_POST['username']);
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $_POST['username'])){
			$usernameErr="*username must not contain special character!";
			$allow = 0;
			}
		}
		
	if(empty($_POST['password'])){
		$passwordErr="*password must not empty!";
		$allow = 0;
		}
	else{
		$password = $_POST['password'];
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['password'])){
			$passwordErr="*password must not contain special character!";
			$allow = 0;
			}
	}
	
	
}	

if($allow==1){
	include ('connect.php');
	if(isset($_POST['loginAdmin'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$search = mysql_query("SELECT username, password FROM admins WHERE username='".$username."' AND password='".$password."' ") or die(mysql_error()); 
		$match  = mysql_num_rows($search);
		
		if($match == 1){
			session_start();
			$_SESSION['logged-in'] = true;
			$_SESSION['username'] = $username;
			header("Location: beranda.php");
		   }
		else{
			$usernameErr = "*incorrect username or password";
			}
		}
	}
		
?>

<h1 align="center">SiPePeAMOeBa Login</h1>
<form method="post" name="formLogin">
	<table border="0" cellspacing="0" align="center">
		<tr>
			<td>username</td>
			<td>:<input type="text" name="username" value="<?php echo $username; ?>" size="40"/></td>
			<td><font color="#FF0000"><?php echo $usernameErr; ?></font></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:<input type="password" name="password" value="<?php echo $password; ?>" size="40"/></td>
			<td><font color="#FF0000"><?php echo $passwordErr; ?></font></td>
		</tr>
		<tr>
			<td><input type="submit" value="Login" name="loginAdmin" />
			<td><input type="reset" value="cancel" />
		</tr>
	</table>
</form>

</body>
</html>
