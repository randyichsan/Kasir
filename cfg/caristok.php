<?php 

include "konfigurasi.php"; 

$kodebrg = $_POST['q'];
	$queryCRS = mysql_query("select * from stoktoko where nmbrg like '$kodebrg%' ORDER BY nmbrg ASC limit 100"); 
	$CRS=mysql_fetch_array($queryCRS);
		if($CRS){
		$nocs=1;
		 $CS= mysql_query("select * from stoktoko where nmbrg like '$kodebrg%' ORDER BY nmbrg ASC limit 100");
		 echo '<table>
	  <tr><th rowspan="2">no</th><th rowspan="2">kode barang</th><th rowspan="2">nama barang</th><th colspan="2">stok lama</th><th colspan="2">stok baru</th><th rowspan="2">total stok</th><th rowspan="2">stok asli</th><th rowspan="2">tanggal cek</th></tr>
	  <tr><th>qty</th><th>tanggal</th><th>qty</th><th>tanggal</th></tr>';
		 while($s=mysql_fetch_array($CS)){ 
    		print "<tr><td>$nocs</td><td>$s[0]</td><td>$s[1]</td><td>$s[2]</td><td>$s[3]</td><td>$s[4]</td><td>$s[5]</td><td>$s[6]</td><td>$s[7]</td><td>$s[8]</td></tr>";  //fungsi beda sendiri karena varchar
    		$nocs++;
		 }
		 echo '</table>QTY. stok lama (-) --> mengambil stok baru sejumlah (-) tersebut.';
		 }else{
		 $queryCS2 = mysql_query("select * from stoktoko where kdbrg='$kodebrg'");
		 $CS2=mysql_fetch_array($queryCS2);
	     if($CS2[0]){
	     	echo '<table>
	  <tr><th rowspan="2">no</th><th rowspan="2">kode barang</th><th rowspan="2">nama barang</th><th colspan="2">stok lama</th><th colspan="2">stok baru</th><th rowspan="2">total stok</th><th rowspan="2">stok asli</th><th rowspan="2">tanggal cek</th></tr>
	  <tr><th>qty</th><th>tanggal</th><th>qty</th><th>tanggal</th></tr>';
		print "<tr><td>1</td><td>$CS2[0]</td><td>$CS2[1]</td><td>$CS2[2]</td><td>$CS2[3]</td><td>$CS2[4]</td><td>$CS2[5]</td><td>$CS2[6]</td><td>$CS2[7]</td><td>$CS2[8]</td></tr>";  //fungsi beda sendiri karena varchar
    		echo '</table>QTY. stok lama (-) --> mengambil stok baru sejumlah (-) tersebut.'; 
    	}else{ 
			echo 'Tidak ditemukan! Mungkin barang belum terdaftar.'; } 	
    	 }
?>
