<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SiPePeAMOeBA</title>
<link rel="shortcut icon" href="../../../../IMAGES/background/favicon.ico">
<link rel="stylesheet" href="style.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script src="func.js"></script>
<script type="text/javascript" src="engine1/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<style type="text/css">

.style2 {color: #FF0000}

</style>
<?php
	include('connect.php');   
	include('input.php');
	mysql_close($connect);
?>
</head>

<body style="background-color:#F2F2F2">
<div class="header">
<table width="70%" align="center">
	<tr>
		<td><div id="admin" ><?php
				if (isset($_SESSION['logged-in'] ) && $_SESSION['logged-in']==true) {
					$user = $_SESSION['username'];
			    	echo "Welcome, " . $user . "!";
					?>
					<script type="text/javascript">
						document.getElementById("admin").style.visibility='visible';
					</script>
					<?php
				} 
				
				else{
				?>	
					<script type="text/javascript">
					document.getElementById("admin").style.visibility='hidden';
					</script>
					<?php
					}
					?>
					
			<form method="post" action="logout.php">
				<input type="submit" value="Logut" />
			</form>
			</div>
			</td>
	</div></tr>
	<tr>
		<td><img src="GAMBAR/header1.jpg"></td>
	</tr>
</table>
</div>

<div id = "dropmenu">
<table align="center" width="70%" >
<tr>
	<td>
    	<div class='cssmenu' align="center">
              	<ul>
                	<li class='active'>
                    <a href="beranda.php">
                    <span>&nbsp;&nbsp;Beranda&nbsp;&nbsp;</span></a></li>
              			<li><a href="#" onclick="ajaxRun4('FILE/info.php','','','')"><span>Informasi</span></a>
                    		<ul>
                      			<li><a href="#" onclick="ajaxRun4('FILE/info.php','','','')"><span>Cek Pemakaian</span></a></li>
                      			<li><a href="#" onclick="ajaxRun('FILE/simulasi.php')"><span>Informasi Perhitungan(Golongan)</span></a></li>
                    		</ul>
               			</li>
                		<li><a href="#" onclick="ajaxRun('FILE/sejarahpdam.html')"><span>Tentang Kami</span></a>
                        	<ul>
                      			<li><a href="#" onclick="ajaxRun('FILE/sejarahpdam.html')"><span>Sejarah</span></a></li>
                      			<li><a href="#" onclick="ajaxRun('FILE/visidanmisi.html')"><span>Visi Misi</span></a></li>
                      			<li><a href="#" onclick="ajaxRun('FILE/tujuanweb.html')"><span>Tujuan Website</span></a></li>
                      			<li><a href="#" onclick="ajaxRun('FILE/kritikdansaran.php')"><span>Kritik dan Saran</span></a></li>
                    		</ul>
                         </li>
              			<li><a href="#" onclick="ajaxRun2('FILE/pengaduan.php','')"><span>Pengaduan</span></a>
                    		<ul>
                      			<li><a href="#" onclick="ajaxRun2('FILE/pengaduan.php','')"><span>Pengaduan Pelanggan</span></a></li>
                      			<li><a href="#" onclick="ajaxRun('FILE/daftar.php')"><span>Daftar Pengaduan</span></a></li>
                    		</ul>
               			</li>
   	 		  </ul>
   		</div>
	</td>
</tr>
</table>
</div>

<div id = "main">
<table align="center" width="70%" bgcolor="#FFFFFF">
<tr bgcolor="f2f2f2">
	<td >    	
		<!-- Slide -->
		<div id="wowslider-container1">
		<div class="ws_images">
        <ul>
			<li><img src="data1/images/1.jpg" alt="1" title="1" id="wows1_0"/></li>
			<li><img src="data1/images/2.jpg" alt="2" title="2" id="wows1_1"/></li>
			<li><img src="data1/images/3.jpg" alt="3" title="3" id="wows1_2"/></li>
			<li><img src="data1/images/4.gif" alt="4" title="4" id="wows1_3"/></li>
			<li><img src="data1/images/5.jpg" alt="5" title="5" id="wows1_4"/></li>
		</ul>
        </div>
		<div class="ws_thumbs">
		<div>
		<a href="#" title="1"><img src="data1/tooltips/1.jpg" alt="" /></a>
		<a href="#" title="2"><img src="data1/tooltips/2.jpg" alt="" /></a>
		<a href="#" title="3"><img src="data1/tooltips/3.jpg" alt="" /></a>
		<a href="#" title="4"><img src="data1/tooltips/4.gif" alt="" /></a>
		<a href="#" title="5"><img src="data1/tooltips/5.jpg" alt="" /></a>
		</div>
		</div>
		<div class="ws_shadow"></div>
		</div>
			<script type="text/javascript" src="engine1/wowslider.js"></script>
			<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End Slide -->	
    </td>
</tr>

<tr valign="top">
  <td valign="top"><table width="100%">
    <tr>
      <td width="65%" valign="top"><table width="100%" height="271">
          <tr bgcolor="f2f2f2" align="left">
            <td width="86%" height="34"><font color="#000000" face="Bookman Old Style" size="+1">&nbsp;&nbsp;Berita Terkini</font></td>
            <td width="14%"><table align="center">
                <tr>
                  <td align="center" width="50%" bgcolor="#FFFFFF"><a href="#" onclick="ajaxRun('FILE/page1berita.html')"><img src="GAMBAR/Left-Arrow.gif" width="23" height="24"></a></td>
                  <td align="center" width="50%" bgcolor="#FFFFFF"><a href="#" onclick="ajaxRun('FILE/page2berita.html')"><img src="GAMBAR/Right_Arrow.gif" width="23" height="24"></a></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="2">
            <div id="berita">
            <table height="229" bgcolor="#F2F2F2">
                <tr>
                  <td width="30%" height="223" align="center" valign="middle" bordercolor="#999999" bgcolor="#FFFFFF"><img src="GAMBAR/index.jpg" width="143" height="175" border="1" align="middle"></td>
                  <td width="70%" align="justify" valign="top"><p><font color="#000000" face="Times New Roman"><strong>PDAM Tirtanadi Bangun Sumur Bor Kapasitas 15 Liter per Detik</strong>3</font></p>
                      <p><font color="#000000" face="Times New Roman" size="-1">Perusahaan Daerah Air Minum (PDAM) Tirtanadi Provinsi Sumatera Utara juga sedang melakukan pembangunan sumur bor di Cabang Tuasan. Kacab PDAM Tirtanadi Cabang Tuasan, M.Yusuf Pohan, SE, MM kepada wartawan saat peninjauan menjelaskan, pembangunan sumur bor kapasitas 10 liter hingga 15/detik ini baru dilaksanakan sebulan lalu.</font></p>
                    <span class="style2"><font color="#FF0000"><a href="#" onclick="ajaxRun('FILE/berita PDAM/berita1.html')">Selanjutnya &gt;&gt;</a></font></span>
                    <p>&nbsp;</p></td>
                </tr>
                <tr>
                  <td width="30%" height="223" align="center" valign="middle" bordercolor="#999999" bgcolor="#FFFFFF"><img src="GAMBAR/Menara-Air-Tirtanadi-Medan-Selasa-13032012.jpg" width="143" height="175" border="1" align="middle"></td>
                  <td width="70%" align="justify" valign="top"><p><font color="#000000" face="Times New Roman"><strong>Perbaikan, Pasokan Air PDAM Tirtanadi Medan Pelanggan Cabang Diski Terganggu</strong></font></p>
                      <font color="#000000" face="Times New Roman" size="-1">
                        <p>Dalam beberapa hari ke depan pasokan air dari PDAM Tirtanadi akan terganggu. Kepala Divisi Public Relations, Amrun, mengatakan, gangguan itu terjadi dalam rangka optimalisasi pengoperasian WTP Mini di Tanjung Gusta.</p>
                        <p>Pekerjaan perbaikan dilaksanakan Selasa (1/10/2013) dan diperkirakan akan selesai pada 5 Oktober 2013. Selama lima hari pelaksanaan pekerjaan tersebut, WTP Mini Jalan Kelambir V akan stop produksi.</p>
                      </font>
                      <span class="style2"><font color="#FF0000"><a href="#" onclick="ajaxRun('FILE/berita PDAM/berita2.html')">Selanjutnya &gt;&gt;</a></font></span>
                    <p>&nbsp;</p></td>
                </tr>
            </table>
            </div>
            </td>
          </tr>
      </table>
      </td>
      <td width="35%" valign="top">
      <table>
          <tr>
            <td width="25%" height="31" bgcolor="f2f2f2"><font color="#000000" size="+1" face="Bookman Old Style">&nbsp;&nbsp;Informasi&nbsp;&nbsp;</font></td>
            <td width="75%"><font color="#000000">&nbsp;</font></td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%" align="left" bordercolor="#333333" border="1" rules="none">
                <tr align="left">
                  <td colspan="2" align="left"><font color="#000000">Informasi Pemakaian</font></td>
                </tr>
                <tr>
                  <td width="100%" align="center" valign="middle"><input type="text" value="Cek Pemakaian"></td>
                  <td width="30%"><img src="GAMBAR/magnifying-glass.jpg" width="31" height="34"></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" bordercolor="#333333" bgcolor="f2f2f2"><img src="GAMBAR/leavecomment2.jpg" width="155" height="168" border="1"></td>
                </tr>
                <tr align="center">
                  <td align="center" colspan="2"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bordercolor="#F2F2F2" rules="none">
                      <tr align="left">
                        <td align="left"><font color="#000000">Informasi Pembayaran Online</font></td>
                      </tr>
                      <tr align="center">
                        <td align="center" bordercolor="#333333" bgcolor="f2f2f2"><table align="center">
                            <tr>
                              <td><img src="GAMBAR/BCA.jpg" width="88" height="49"></td>
                              <td><img src="GAMBAR/bri.jpg" width="88" height="49"></td>
                              <td><img src="GAMBAR/mandiri.jpg" width="88" height="49"></td>
                            </tr>
                            <tr>
                              <td><img src="GAMBAR/bni.jpg" width="88" height="49"></td>
                              <td><img src="GAMBAR/bukopin.jpg" width="88" height="49"></td>
                              <td><img src="GAMBAR/sumut.jpg" width="88" height="49"></td>
                            </tr>
                            <tr>
                              <td><img src="GAMBAR/bii.jpg" width="88" height="49"></td>
                              <td><img src="GAMBAR/cimb.jpg" width="88" height="49"></td>
                              <td><img src="GAMBAR/hsbc.jpg" width="88" height="49"></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
  </table>
</td>
</tr>
</table>
</div>

<div id="footer">
<table table align="center" width="70%">
<tr>
	<td>
    <table width="100%" border="1" align="left" cellpadding="3" cellspacing="3" rules="groups" style="border:outset ; border-bottom-color:#CCCCCC; border-top-color:#CCCCCC">
    <tr>
    	<td width="50">Beranda</td>
    	<td width="55">Webmail</td>
    	<td width="85">Kritik dan Saran</td>
    	<td width="91">Terms of Service</td>
    	<td width="585" align="left">Privacy Policy</td>
    </tr>
    <tr>
    	<td height="21" colspan="5">Copyrights © 2013 SiPePeAMO Team All Rights Reserved</td>
    </tr>
    </table>
    </td>
</tr>
</table>
</div>
</body>
</html>
