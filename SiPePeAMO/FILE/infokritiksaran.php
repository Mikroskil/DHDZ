<title>info kritik &amp; saran</title><h1 align="center">INFO KRITIK & SARAN</h1>
<table align="center" width="100%" border="1" cellspacing="0">
	<tr bgcolor="#CCCCCC">
		<th width="5%">No</th>
		<th width="15%">Nama</th>
		<th width="15%">Alamat</th>
		<th width="15%">Email</th>
		<th width="10%">No Hp</th>
		<th width="10%">No Meter</th>
		<th width="30%">kritik & saran</th>
	</tr>
	<?php 
		include("../connect.php");
		$sql="SELECT * FROM kritiksaran";
		$result = mysql_query($sql);
		$i=1;
		while($row=mysql_fetch_array($result)){
			if($i%2==0)
				echo (" <tr bgcolor='#FFFFCC' align='center'>");
			else
				echo ("<tr align='center'>");
				
			echo("<td>". $i ."</td>
				  <td>". $row['Nama'] ."</td>
				  <td>". $row['Alamat'] ."</td>
				  <td>". $row['Email'] ."</td>
				  <td>". $row['No_Hp'] ."</td>
				  <td>". $row['No_Meter'] ."</td>
				  <td align='justify'>". $row['Kritik_Saran'] ."</td>
				  </tr>");
				  
			$i = $i +1;
		}		
	?>
	
</table>