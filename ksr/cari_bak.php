<?php 
include "../cfg/konfigurasi.php"; 
 
$kodebrg = $_GET['q'];

	$queryCR1 = mysql_query("select * from barangtoko where nmbrg like '$kodebrg%' limit 100"); 
	while($k=mysql_fetch_array($queryCR1)){ 
    		echo '<li onClick="hargabrg('.$k[0].','.$k[2].');namabrg(\''.$k[1].'\');qtybarang.focus();"                     style="cursor:pointer">'.$k[1].'</li>';  //fungsi beda sendiri karena varchar
	}
	$k=mysql_fetch_array($queryCR1); 
	if(!$k[0]){
		$queryCR2 = mysql_query("select * from barangtoko where kdbrg = '$kodebrg'"); 
		$k=mysql_fetch_array($queryCR2); 
		echo $k[1];
	}
?>