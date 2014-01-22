<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
	<body>
<table width="70%" align="center">
<tr>
	<td width="50%">
    <table border="1" cellspacing="0" background="GAMBAR/bgbirugradasi.jpg" rules="all" style="border:inset" width="318" height="31">
    <tr>
        <td align="left"><h3>Daftar Pengaduan Pelanggan</h3></td>
    </tr>
    </table>
    </td>
    <td width="50%">&nbsp;</td>
</tr>
</table>
<table border="1" cellpadding="0" cellspacing="0" width="85%" align="center" style="border:outset">
<tr>
	  <th bgcolor="#FFFFFF">Nomor</th>
	  <th bgcolor="#FFFFFF">No Pengaduan</th>
	  <th width="10%" bgcolor="#FFFFFF">Nama </th>
	  <th width="8%" bgcolor="#FFFFFF">No. meter</th>
	  <th width="10%" bgcolor="#FFFFFF">Tanggal Posting</th>
	  <th width="25%" bgcolor="#FFFFFF">Isi</th>
	  <th width="20%" bgcolor="#FFFFFF">Respons</th>
	  <th width="10%" bgcolor="#FFFFFF">Tanggal Respon</th>
	  <th bgcolor="#FFFFFF">Pelaksana</th>
	  <?php
	  	if (isset($_SESSION['logged-in'] ) && $_SESSION['logged-in']== true)
			echo ("<th></th>");
	  ?>
  </tr>
	<?php	
		include("../connect.php");
		$sql="SELECT * FROM pengaduan";
		$result = mysql_query($sql);
		$i=1;
		while($row=mysql_fetch_array($result)){
			if($i%2==0)
				echo (" <tr bgcolor='#FFFFCC'>");
			else
				echo ("<tr>");
				
			echo("<td>". $i ."</td>
				  <td>". $row['no_pengaduan'] ."</td>
				  <td>". $row['Nama'] ."</td>
				  <td>". $row['No_meter'] ."</td>
				  <td>". $row['tanggal_pengaduan'] ."</td>
				  <td>". $row['komentar'] ."</td>
			  <form method='post' action='?no=".$row['no_pengaduan']."'>");
			if (isset($_SESSION['logged-in'] ) && $_SESSION['logged-in']== true)
				echo ("<td><textarea cols='25' rows='5' id='respon' name='respon' >".$row['respon']."</textarea></td>");
			else
				echo("<td>".$row['respon']."</td>");
			echo ("<td>". $row['tanggal_respon'] ."</td>
				  		<td>						</td>");
			if(isset($_SESSION['logged-in'] ) && $_SESSION['logged-in']== true)
				echo ("<td><input type='submit' value='input' name='inputRespon'/></td>");
			echo ("	
			  </form>
				  </tr>");
				  
			$i = $i +1;
		}		
	?>
</table>
</body>
</html>