<?php
echo '<div id="kanan">';
echo '<div class="kotaku">';
$perhal=11;
$halaman=new kelas_halaman($perhal);

$numlist=mysql_query("SELECT * FROM barangjual");

$jum_bar=mysql_num_rows($numlist);
$halaman->tentukan_total_baris($jum_bar);
$awalrec=$halaman->peroleh_awal_record();

$queryTJ=mysql_query("SELECT * FROM barangjual ORDER BY nom DESC LIMIT $awalrec, $perhal");
echo '<div class="kotakh">DAFTAR PENJUALAN</div><div class="kotakb"><center>';
	echo '<table>'; // bgcolor="#C8F2C8" bordercolor="#6EC36E"
	echo '<tr><th>NO</th><th>KODE BARANG</th><th>NAMA BARANG</th><th>HARGA JUAL</th><th>QTY</th><th>JUMLAH</th><th>KODE JUAL</th></tr>';
	$no=$awalrec;
	while($nTJ=mysql_fetch_row($queryTJ)){
		$no++;
		print "<tr>
		<td align=\"center\">$no</td>
		<td>$nTJ[1]</td>
		<td>$nTJ[2]</td>
		<td align=\"center\">$nTJ[3]</td>
		<td align=\"center\">$nTJ[4]</td>
		<td align=\"right\">$nTJ[5]</td>
		<td align=\"right\">$nTJ[6]</td></tr>";
		}
	echo '</table></center></div>';
//echo $halaman->jumlah_halaman;
if ($halaman->jumlah_halaman > 1)
	  {
	    print("Halaman: ");
		for ($hal = 1; $hal <= $halaman->jumlah_halaman; $hal++)
		{
		   if ($hal == $halaman->halaman_sekarang)
			  echo "$hal | ";
		   else   
			  {
			     $nama_modul = $_SERVER['PHP_SELF'].'?kertas=penjualan';
				 
			     echo "<a href=\"?kertas=penjualan&page=$hal\">$hal</a> |\n";
			  }
		}	
	  }
//$halaman->tampilkan_link_halaman();
print "<br><br></div>";
?>