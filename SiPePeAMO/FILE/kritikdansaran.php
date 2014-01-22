<?php
	session_start();
?>
<table width="70%" align="center">
<tr>
	<td width="50%">
    <table border="1" cellspacing="0" background="GAMBAR/bgbirugradasi.jpg" rules="all" style="border:inset" width="273" height="31">
    <tr>
        <td align="left"><h3>Krtitik Dan Saran</h3></td>
    </tr>
    </table>
    </td>
	<?php if (isset($_SESSION['logged-in'] ) && $_SESSION['logged-in']== true) 
			echo ("<td><a href='file/infokritiksaran.php'><button>view kritik & saran</button></a></td>")?>
</tr>
</table>
<table border="1" cellspacing="0" width="70%" align="center" bgcolor="#FFFFCC">
	<tr>
		<td>
		<form name="formSaran" method="post" action="">
		  <fieldset>
				<legend><h3> Data</h3></legend>
			  <table>
				  <tr>
					  <td><div align="justify">Nama</div></td>
					  <td>: <input type="text" size="40" id="nama" name="nama"/></td>
				  </tr>
				  <tr>
					  <td><div align="justify">Alamat</div></td>
					  <td>: <input type="text" size="40" id="alamat" name="alamat"/></td>
				  </tr>
				  <tr>
					  <td><div align="justify">Email</div></td>
					  <td>: <input type="text" size="40" id="email" name="email"/></td>
				  </tr>
				  <tr>
					  <td><div align="justify">No Hp</div></td>
					  <td>: <input type="text" size="40" id="noHp" name="noHp"/></td>
				  </tr>
				  <tr>
					  <td><div align="justify">No Meter</div></td>
					  <td>: <input type="text" size="40" id="noMeter" name="noMeter"/></td>
				  </tr>
				  <tr>
					  <td><div align="justify">Kritik dan Saran</div></td>
					  <td><div align="left">: </div></td>
				  </tr>
				  <tr>
					  <td colspan="2"><textarea cols="40" rows="5" id="komentar" name="komentar"></textarea></td>
				  </tr>
			  </table>
					<input type="submit" name="inputSaran" value="Submit"/>
					<input type="reset" value="Cancel"/>
		  </fieldset>
		</form>
		</td>
	</tr>
</table>

