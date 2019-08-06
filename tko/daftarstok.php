<?php

$perhal=8;
$halaman=new kelas_halaman($perhal);

$numlist=mysql_query("SELECT * FROM stoktoko");

$jum_bar=mysql_num_rows($numlist);
$halaman->tentukan_total_baris($jum_bar);
$awalrec=$halaman->peroleh_awal_record();

$queryCRS = mysql_query("select * from stoktoko ORDER BY nmbrg ASC limit $awalrec, $perhal"); 
		$nocs=$awalrec;
echo '<table>
	  <tr><th rowspan="2">no</th><th rowspan="2">kode barang</th><th rowspan="2">nama barang</th><th colspan="2">stok lama</th><th colspan="2">stok baru</th><th rowspan="2">total stok</th><th rowspan="2">stok asli</th><th rowspan="2">tanggal cek</th></tr>
	  <tr><th>qty</th><th>tanggal</th><th>qty</th><th>tanggal</th></tr>';
		 while($s=mysql_fetch_array($queryCRS)){ 
		 	$nocs++;
    		print "<tr align='center'><td>$nocs</td><td>$s[0]</td><td align='left'>$s[1]</td><td>$s[2]</td><td>$s[3]</td><td>$s[4]</td><td>$s[5]</td><td>$s[6]</td><td>$s[7]</td><td>$s[8]</td></tr>";  //fungsi beda sendiri karena varchar
    				 }
		 echo '</table>QTY. stok lama (-) --> mengambil stok baru sejumlah (-) tersebut.<br><br>';
		  //fungsi beda sendiri karena varchar
if ($halaman->jumlah_halaman > 1)
	  {
	    print("Halaman: ");
		for ($hal = 1; $hal <= $halaman->jumlah_halaman; $hal++)
		{
		   if ($hal == $halaman->halaman_sekarang)
			  echo "$hal | ";
		   else   
			  {
			     $nama_modul = $_SERVER['PHP_SELF'].'?kertas=stok';
				 
			     echo "<a href=\"?kertas=stok&page=$hal\">$hal</a> |\n";
			  }
		}	
	  }
?>