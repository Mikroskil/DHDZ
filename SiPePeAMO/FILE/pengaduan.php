<?php
	if(isset($_GET['text1']) && $_GET['text1']!=''){
		$noPengaduan=$_GET['text1'];		
		}
	else
		$noPengaduan ="";
		
	$komentarErr='';
	$namaErr='';
	$nometerErr='';	
	
	
	
?>


<table width="70%" align="center" >
<tr>
	<td width="50%">
    <table border="1" cellspacing="0" background="GAMBAR/bgbirugradasi.jpg" rules="all" style="border:inset" width="273" height="31">
    <tr>
        <td align="left"><h3>Pengaduan Pelanggan</h3></td>
    </tr>
    </table>
    </td>
    <td width="50%">&nbsp;</td>
</tr>
<table border="1" cellspacing="0" width="70%" align="center" bgcolor="#FFFFCC">
	<tr>
		<td>
		<form name="formPengaduan" method="post">
			<fieldset>
				<legend><h3> Data</h3></legend>
				<table>
					<tr>
						<td ><div align="justify">Nama</div></td>
						<td>:<input type="text" size="40" id="nama" name="nama" <?php if(isset($_GET['text1']) && $_GET['text1']!='') echo ("disabled='disabled'");?>/><font color="#FF0000">&nbsp;</font></td>
						<td><font color="#FF0000" id="namaErr"></font></td>
					</tr>
					<tr>
						<td><div align="justify">Alamat</div></td>
						<td>:<input type="text" size="40" id="alamat" name="alamat" <?php if(isset($_GET['text1']) && $_GET['text1']!='') echo ("disabled='disabled'");?>/>&nbsp;</td>
						<td></td>
					</tr>
					<tr>
						<td><div align="justify">Email</div></td>
						<td>:<input type="text" size="40" id="email" name="email" <?php if(isset($_GET['text1']) && $_GET['text1']!='') echo ("disabled='disabled'");?>/>&nbsp;</td>
						<td></td>
					</tr>
					<tr>
						<td><div align="justify">No Hp</div></td>
						<td>:<input type="text" size="40" id="noHp" name="noHp" <?php if(isset($_GET['text1']) && $_GET['text1']!='') echo ("disabled='disabled'");?>/>&nbsp;</td>
						<td></td>
					</tr>
					<tr>
						<td><div align="justify">No Meter</div></td>
						<td>:<input type="text" size="40" id="noMeter" name="noMeter" <?php if(isset($_GET['text1']) && $_GET['text1']!='') echo ("disabled='disabled'");?>/><font color="#FF0000">&nbsp;</font></td>
						<td><font color="#FF0000"><?php echo " $nometerErr" ?></font></td>
					</tr>
					<tr>
						<td><div align="justify">Komentar :</div></td>
						<td><textarea cols="40" rows="6" id="komentar" name="komentar" <?php if(isset($_GET['text1']) && $_GET['text1']!='') echo ("disabled='disabled'");?>></textarea><font color="#FF0000"></font></td>
						<td><font color="#FF0000"><?php echo " $komentarErr" ?></font></td>
					</tr>
					
					<tr>
						<td>No Pengaduan </td>
						<td>: <input type="text" style="text-align:center;font-weight:bold;font-size:24px;" readonly="readonly" width="40" id="noPengaduan" name="noPengaduan" value="<?php echo $noPengaduan; ?>"/>
						</td>
					</tr>
					<tr>
						<td colspan="2">*No Pengaduan akan diberikan setelah menekan tombol "submit" </td>
					</tr>
				</table>
					<input type="submit" value="Submit" name="inputPengaduan"/>
					<input type="reset" value="Cancel"/>
			</fieldset>
		</form>
		</td>
	</tr>
</table>

