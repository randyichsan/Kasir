<?php 
include "konfigurasi.php"; 
$kodebrg = $_POST['q'];
	$queryCR1 = mysql_query("select * from barangtoko where nmbrg like '$kodebrg%' ORDER BY nmbrg ASC limit 100"); 
	$CR1=mysql_fetch_array($queryCR1);
	if($CR1){
		 $C1= mysql_query("select * from barangtoko where nmbrg like '$kodebrg%' ORDER BY nmbrg ASC limit 100");
		 while($k=mysql_fetch_array($C1)){ 
    		echo '<li onClick="hargabrg('.$k[0].','.$k[2].');namabrg(\''.$k[1].'\');qtybarang.focus();"                     style="cursor:pointer">'.$k[1].'</li>';  //fungsi beda sendiri karena varchar
		 }}else{
		 $queryCR2 = mysql_query("select * from barangtoko where kdbrg='$kodebrg'");
		 $CR2=mysql_fetch_array($queryCR2);
	     if($CR2[0]){
		 echo '<li onClick="kodbrg('.$CR2[0].','.$CR2[2].');namabrg(\''.$CR2[1].'\');qtybarang.focus();"                     style="cursor:pointer">'.$CR2[1].'</li>';
	     }else{ echo 'barang tidak ditemukan!'; } 	
    	 }
?>