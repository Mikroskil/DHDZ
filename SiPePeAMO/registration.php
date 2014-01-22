<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Registration</title>
</head>

<body>

<?php

$username = $email = $password = $rpassword = '';
$usernameErr = $passwordErr = $rpasswordErr = $emailErr = '';
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
	
	if(empty($_POST['rpassword'])){
			$rpasswordErr="*password must not empty!";
			$allow = 0;
			}
	else {
		$rpassword = $_POST['rpassword'];
		if($_POST['password'] !=$_POST['rpassword']){
			$passwordErr = $rpasswordErr = "*passwords didn't match!";
			$allow=0;
			}
		}
		
	if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['rpassword'])){
			$rpasswordErr="*password must not contain special character!";
			$allow = 0;
			}
	
	
	
	if(empty($_POST['email'])){
		$emailErr = "*email must not empty!";
		$allow=0;
		}
	else{
		$email = $_POST['email'];
		if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email'])){
			$emailErr="*Invalid email format!";
			$allow = 0;
			}	
		}	
}		
//insert to database
if($allow==1){
	include ('connect.php');
	if(isset($_POST['inputAdmin'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		$queryInsert = mysql_query("INSERT INTO admins(username,password,email) 
									VALUES ('$username','$password','$email')");
									
		$username = $email = $password = $rpassword = '';
		
?>
	<script>
    alert("data sudah berhasil di simpan");
    </script>
	<?php
	}
}

?>

<!--registration form-->
<h2>SiPePeAMOeBA Admin Registration </h2>
<form method="post" action="" name="formRegistration"  >
	<table border="0" cellspacing="0">
		<tr>
			<td>Username</td>
			<td>:<input type="text" name="username" value="<?php echo $username; ?>" size="40"/></td>
			<td><font color="#FF0000"><?php echo $usernameErr; ?></font></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:<input type="password" name="password" value="<?php echo $password; ?>" size="40"/></td>
			<td><font color="#FF0000"><?php echo $passwordErr; ?></font></td>
		</tr>
		<tr>
			<td>Retype Password</td>
			<td>:<input type="password" name="rpassword" value="<?php echo $rpassword; ?>" size="40"/></td>
			<td><font color="#FF0000"><?php echo $rpasswordErr; ?></font></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:<input type="text" name="email" value="<?php echo $email; ?>" size="40"/></td>
			<td><font color="#FF0000"><?php echo $emailErr; ?></font></td>
		</tr>
		<tr>
			<td><input type="submit" value="Simpan" name="inputAdmin" />
			<td><input type="reset" value="reset" />
		</tr>
	</table>
</form>


</body>
</html>