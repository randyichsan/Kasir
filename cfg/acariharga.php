<?php 
include "konfigurasi.php"; 

$kodebrg = $_POST['q'];
	$queryCR1 = mysql_query("select * from barangtoko where nmbrg like '$kodebrg%' ORDER BY nmbrg ASC limit 100"); 
	$CR1=mysql_fetch_array($queryCR1);
		if($CR1){
		$nocb=1;
		 $C1= mysql_query("select * from barangtoko where nmbrg like '$kodebrg%' ORDER BY nmbrg ASC limit 100");
		 echo '<table>
	  <tr><th>no</th><th>kode barang</th><th>nama barang</th><th>harga</th><th>ubah harga</th></tr>';
		 while($k=mysql_fetch_array($C1)){ 
    		print "<tr><td>$nocb</td><td>$k[0]</td><td>$k[1]</td><td>$k[2]</td><td align='center'><a href='?kertas=harga&ubah=ya&pluh=$k[0]' title='ubah'><img src=img/b_edit.png alt=edit></a></td></tr>";  //fungsi beda sendiri karena varchar
    		$nocb++;
		 }
		 echo '</table><br>';
		 }else{
		 $queryCR2 = mysql_query("select * from barangtoko where kdbrg='$kodebrg'");
		 $CR2=mysql_fetch_array($queryCR2);
	     if($CR2[0]){
	     	echo '<table>
	  <tr><th>kode barang</th><th>nama barang</th><th>harga</th><th>ubah harga</th></tr>';
	    	print "<tr><td>$CR2[0]</td><td>$CR2[1]</td><td>$CR2[2]</td><td align='center'><a href='?kertas=harga&ubah=ya&pluh=$CR2[0]' title='ubah'><img src=img/b_edit.png alt=edit></a></td></tr>";  //fungsi beda sendiri karena varchar
    		echo '</table><br>';
	     }else{ echo 'Tidak ditemukan! Mungkin barang belum terdaftar.'; } 	
    	 }
?>