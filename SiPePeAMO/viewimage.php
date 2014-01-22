<?php
	include('connect.php');   
	
			$query1 ="SELECT * FROM pemakaian WHERE nomor_meter=2013001 AND MONTH(tanggal)=12 AND YEAR(tanggal)=2013";
			$result1 = mysql_query($query1);
			$row = mysql_fetch_array($result1);
			header("Content-type: image/jpeg");
			echo $row['gambar'];
	mysql_close($connect);
			
	
?>