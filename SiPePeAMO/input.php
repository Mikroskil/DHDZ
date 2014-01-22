<?php
//INPUT KRITIK / SARAN
	if (isset($_POST['inputSaran'])){
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$email = $_POST['email'];
			$noHp = $_POST['noHp'];
			$noMeter = $_POST['noMeter'];
			$komentar = $_POST['komentar'];
		
			$sql="INSERT INTO kritiksaran(nama,alamat,email,no_hp,no_meter,kritik_saran) 
								VALUES ('$nama','$alamat','$email','$noHp','$noMeter','$komentar')";
			$result = mysql_query($sql);
?>	
	<script>
	alert("kritik / saran telah berhasil dikirim");
	ajaxRun('FILE/kritikdansaran.php');
    </script>
	<?php
	
}
//INPUT PENGADUAN
	if (isset($_POST['inputPengaduan'])){
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$email = $_POST['email'];
			$noHp = $_POST['noHp'];
			$noMeter = $_POST['noMeter'];
			$komentar = $_POST['komentar'];
			
			$sql="INSERT INTO pengaduan(nama,alamat,email,no_hp,no_meter,komentar,tanggal_pengaduan) 
								VALUES ('$nama','$alamat','$email','$noHp','$noMeter','$komentar',CURDATE())";
			$result = mysql_query($sql);
			
			$sql="SELECT MAX(no_pengaduan) AS no_pengaduan FROM pengaduan";
			$result = mysql_query($sql);
			$row= mysql_fetch_array($result);
			$noPengaduan = $row['no_pengaduan'];
?>	
	<script>
	ajaxRun2('FILE/pengaduan.php',<?php echo $noPengaduan; ?>);
	alert("pengaduan anda telah berhasil dikirim!");
	</script>
	<?php 
}
	
//INPUT RESPON
	if (isset($_POST['inputRespon'])){
			$respon = $_POST['respon'];
			$no = $_GET['no'];
			$sql="UPDATE pengaduan SET respon='$respon',tanggal_respon=CURDATE()
					WHERE no_pengaduan = '$no'";
			$result=mysql_query($sql);
?>	
	<script>
	ajaxRun('FILE/daftar.php');
	alert("respon anda telah berhasil dikirim!");
	</script>
	<?php 
}	
	
	
//HITUNG SIMULASI
	if (isset($_POST['hitungSimulasi'])){
			$pemakaian = $_POST['pemakaian'];
			$gol = $_POST['gol'];
			$ukuran = $_POST['ukuran'];
			$sql="SELECT * FROM golongan WHERE golongan='$gol' AND meter1<='$pemakaian' AND meter2>='$pemakaian'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			
			$hasil = $pemakaian * $row['HARGA'];
			
			$sql="SELECT * FROM pemeliharaan WHERE diameter_pipa='$ukuran'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			
			$total = $hasil + $row['biaya_pemeliharaan'];
			
			$sql="SELECT * FROM adm";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$total = $total + $row['biaya_admin'];
			?>	
			<script>
				ajaxRun2('FILE/simulasi.php',<?php echo $total; ?>);
			</script>
	<?php 
		}
?>
