<?php
/*	$err="";
	$nometer = $bulan =$tahun = "";
	$allow=1;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$nometer = trim($_POST['nometer']);
		if(empty($_POST['nometer'])){
		$err="*no meter tidak boleh kosong!";
		$allow = 0;
		}
	else if (!is_numeric($_POST['username'])){
			$err="*no meter mesti angka!";
			$allow = 0;
			}
	else if($_POST['bulan']==0){
		$err="*bulan belum dipilih!";
		$allow=0;
		}
	else if($_POST['tahun']==0){
		$err="*tahun belum dipilih!";
		$allow=0;
		}
	}*/
		include('../connect.php');   
		$nometer=$_GET['text1'];
		$bulan=$_GET['text2'];
		$tahun=$_GET['text3'];
		$standAwal="-";
		$standAkhir="-";
		$pemakaian="-";
		$diameter="-";
		$gol="-";
		$biayaPemakaian="-";
		$biayaAdmin="-";
		$biayaPerawatan="-";
		$biayaTerlambat="-";
		$total="-";
		$petugas="-";
		$nama="";
		$alamat="";
		$imageAwal="";
		$imageAkhir="";
		$bulanlalu=$bulan-1;
		
		if($nometer!=''){
		
			$query1 ="SELECT * FROM pemakaian WHERE nomor_meter=". $nometer ." AND MONTH(tanggal)=". $bulan ." AND YEAR(tanggal)=".$tahun;
			$result1 = mysql_query($query1);
			$row = mysql_fetch_array($result1);
			
			$query2 ="SELECT * FROM cust WHERE id=". $nometer;
			$result2 = mysql_query($query2);
			$row2 = mysql_fetch_array($result2);
			
			$query3="SELECT * FROM pemakaian WHERE nomor_meter=". $nometer ." AND MONTH(tanggal)=". $bulanlalu." AND YEAR(tanggal)=".$tahun;
			$result3 = mysql_query($query3);
			$row3 = mysql_fetch_array($result3);
			if($bulan==1)
					$bulan="Januari";
				else if($bulan==2)
					$bulan="Februari";
				else if($bulan==3)
					$bulan="Maret";
				else if($bulan==4)
					$bulan="April";
				else if($bulan==5)
					$bulan="Mei";
				else if($bulan==6)
					$bulan="Juni";
				else if($bulan==7)
					$bulan="Juli";
				else if($bulan==8)
					$bulan="Agustus";
				else if($bulan==9)
					$bulan="September";
				else if($bulan==10)
					$bulan="Oktober";
				else if($bulan==11)
					$bulan="November";
				else if($bulan==12)
					$bulan="Desember";
				else
					$bulan="";
					
		if(mysql_num_rows($result1)!=0){
				$nometer=$row['nomor_meter'];
				$standAwal=$row['stand_awal'];
				$standAkhir=$row['stand_akhir'];
				$pemakaian=$standAkhir-$standAwal;
				$biayaPemakaian=$row['biaya_pemakaian'];
				$biayaAdmin=$row['biaya_admin'];
				$biayaPerawatan=$row['biaya_pemeliharaan'];
				$total=$row['total_biaya'];
				$diameter=$row2['diameter_pipa'];
				$gol=$row2['gol'];
				$nama=$row2['nama'];
				$alamat=$row2['alamat'];
				$imageAkhir=$row['gambar'];
				$imageAwal=$row3['gambar'];
				}
			
		}
?>
<table width="70%" align="center">
<tr>
	<td width="50%">
    <table border="1" cellspacing="0" background="GAMBAR/bgbirugradasi.jpg" rules="all" style="border:inset" width="273" height="31">
    <tr>
        <td align="left"><h3>Informasi Pemakaian </h3></td>
    </tr>
    </table>
    </td>
    <td width="50%">&nbsp;</td>
</tr>
</table>	
<table border = 1 align="center" width="70%" bgcolor="#FFFFFF">
<form method="post" name="formPemakaian">
<tr>
	<td align="left">
	
    <input type = "text" value = "<?php echo $nometer ;?>" placeholder = "nomor meter" name="nometer" id="nometer"> 
		<select name="bulan" id="bulan" > 	
					<option value="0"> Pemakaian bulan </option>
                    <option value="1"> Januari </option> 
                    <option value="2"> Febuari </option>
                    <option value="3"> Maret </option>
                    <option value="4"> April </option>
                    <option value="5"> Mei </option>
                    <option value="6"> Juni </option>
                    <option value="7"> Juli </option>
                    <option value="8"> Agustus </option>
                    <option value="9"> September </option>
                    <option value="10"> Oktober </option>
                    <option value="11"> November </option>
                    <option value="12"> Desember </option> 
		</select>
		<select name="tahun" id="tahun">
			<option value="0">Pemakaian tahun</option>
			<option value="2014">2014</option>
			<option value="2013">2013</option>
			<option value="2013">2012</option>
			<option value="2011">2011</option>
		</select>
    <input type="button" value="Cari" name="inputPemakaian" onclick="ajaxRun4('FILE/info.php','nometer','bulan','tahun')">
    </td>
</tr>
</form>
<tr>
	<td align="left" background="GAMBAR/biru1.png">
			<fieldset>
				<legend><h3> Data</h3></legend>
				<table>
					<tr>
						<td>Nama</td>
						<td>: <input type="text" size="40" id="nama" value="<?php echo $nama; ?>" readonly="readonly" ></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>: <input type="text" size="40" id="alamat" value="<?php echo $alamat; ?>" readonly="readonly"></td>
					</tr>
					<tr>
						<td>Nomor Meter</td>
						<td>: <input type="text" size="40" id="nomet" value="<?php echo $nometer; ?>" readonly="readonly"></td>
					</tr>
					<tr>
						<td>Pemakaian Bulan</td>
						<td>: <input type="text" size="40" id="bln" value="<?php echo $bulan; ?>" readonly="readonly"></td>
					</tr>					
				</table>
			</fieldset>
	</td>
</tr>
</table>

<table width="70%" align="center">
<tr>
	<td width="50%">
    <table border="1" cellspacing="0" background="GAMBAR/bgbirugradasi.jpg" rules="all" style="border:inset" width="273" height="31">
    <tr>
        <td align="left"><h3>Pemakaian Bulan <?php echo $bulan; ?></h3></td>
    </tr>
    </table>
    </td>
    <td width="50%">&nbsp;</td>
</tr>
</table>
<table border = 1 align="center" width="70%" bgcolor="#FFFFFF">
<tr>
<td>
    <table border = "1" align="center">
    <tr>
        <td width="10%" align="center"> <div align="center">Stand awal </div></td>
        <td width="10%" align="center"> <div align="center">Stand akhir </div></td>
        <td width="10%" align="center"> <div align="center">Pemakaian </div></td>
        <td width="10%" align="center"> <div align="center">Diameter pipa </div></td>
        <td width="10%" align="center"> <div align="center">Golongan </div></td>
        <td width="10%" align="center"> <div align="center">Biaya Pemakaian </div></td>
        <td width="10%" align="center"> <div align="center">Biaya abodemen </div></td>
        <td width="10%" align="center"> <div align="center">Biaya perawatan pipa </div></td>
        <td width="10%" align="center"> <div align="center">Biaya keterlambatan </div></td>
        <td width="10%" align="center"> <div align="center"><b> Total biaya </b> </div></td>
        <td width="10%" align="center"> <div align="center">Petugas catat </div></td>
    </tr>
    <tr>
        <td><div align="center" ><?php echo $standAwal; ?> </div></td>
        <td><div align="center" ><?php echo $standAkhir; ?></div></td>
        <td><div align="center" ><?php echo $pemakaian; ?></div></td>
        <td><div align="center" ><?php echo $diameter; ?></div></td>
        <td><div align="center" ><?php echo $gol; ?></div></td>
        <td><div align="center" ><?php echo $biayaPemakaian; ?></div></td>
        <td><div align="center" ><?php echo $biayaAdmin; ?></div></td>
        <td><div align="center" ><?php echo $biayaPerawatan; ?></div></td>
        <td><div align="center" ><?php echo $biayaTerlambat; ?></div></td>
        <td><div align="center" ><?php echo $total; ?></div></td>
        <td><div align="center" ><?php echo $petugas; ?></div></td>
    </tr>
    </table>
</td>
</tr>
<tr>
	<td  bgcolor="#FFCC33">
    <table border = "1" width = "40%" align="center">
    <tr>
    	<td colspan="2" background="GAMBAR/bgbirugradasi.jpg" align="center">Dokumentasi</td>
    </tr>
    <tr>
        <td width = "15%" align = "center" bgcolor="#FFFF99"> Stand awal </td>
        <td width = "15%" align = "center" bgcolor="#FFFF99"> Stand akhir </td>
    </tr>
    <tr>
        <td bgcolor="f2f2f2"><div align="center"><?php if($imageAwal!='') echo '<img src="data:image/jpeg;	base64,' .  $imageAkhir . '" />';?></div></td>
        <td bgcolor="f2f2f2"><div align="center"><?php if($imageAkhir!='') echo '<img src="data:image/jpeg;	base64,' .  $imageAkhir . '" />';?></div></td>
    </tr>
    </table>
	</td>
</tr>
</table>
