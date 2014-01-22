<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Input Pemakaian Customer</title>
</head>



<body>
<?php

$nometer = $standawal = $standakhir = $petugas = '';
$nometerErr = $standawalErr = $standakhirErr = $petugasErr = '';
$allow = 1;

//validation
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST['nometer'])){
		$nometerErr="*no meter must not empty!";
		$allow = 0;
		}
	else {
		$nometer = trim($_POST['username']);
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $_POST['nometer'])){
			$nometerErr="*username must not contain special character!";
			$allow = 0;
			}
		}
		
	if(empty($_POST['standawal'])){
		$passwordErr="*stand awal must not empty!";
		$allow = 0;
		}
	else{
		$password = $_POST['standawal'];
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['standawal'])){
			$passwordErr="*password must not contain special character!";
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




<form method="post" action="" name="formPemakaianCustomer">
	<table border="0" cellspacing="0">
		<tr>
			<td>Nomor meter</td>
			<td>:<input type="text" name="nometer" value="<?php echo $nometer; ?>" size="40" maxlength="8"/></td>
			<td><font color="#FF0000"><?php echo $nometerErr; ?></font></td>
		</tr>
		<tr>
			<td>Bulan</td>
			<td>:<select name="bulan"> 	<option> Pemakaian bulan </option>
                    <option value=1> Januari </option> 
                    <option value=2> Febuari </option>
                    <option value=3> Maret </option>
                    <option value=4> April </option>
                    <option value=5> Mei </option>
                    <option value=6> Juni </option>
                    <option value=7> Juli </option>
                    <option value=8> Agustus </option>
                    <option value=9> September </option>
                    <option value=10> Oktober </option>
                    <option value=11> November </option>
                    <option value=12> Desember </option> 
				</select>
			</td>
			<td><font color="#FF0000"><?php echo $bulanErr; ?></font></td>
		</tr>
		<tr>
			<td>Stand Awal</td>
			<td>:<input type="text" name="standawal" value="<?php echo $standawal; ?>" size="40"/></td>
			<td><font color="#FF0000"><?php echo $standawalErr; ?></font></td>
		</tr>
		<tr>
			<td>Stand Akhir</td>
			<td>:<input type="text" name="standakhir" value="<?php echo $standakhir; ?>" size="40"/></td>
			<td><font color="#FF0000"><?php echo $standakhirErr; ?></font></td>
		</tr>
		<tr>
			<td>petugas pencatat</td>
			<td>:<input type="text" name="petugas" value="<?php echo $petugas; ?>" size="40"/></td>
			<td><font color="#FF0000"><?php echo $petugasErr; ?></font></td>
		</tr>
		<tr>
			<td><input type="submit" value="Simpan" name="inputPemakaian" />
			<td><input type="reset" value="reset" />
		</tr>
	</table>
</form>
</body>
</html>
