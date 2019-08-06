<?php
include "../cfg/konfigurasi.php";

session_start();
switch((isset($_GET['edit'])? $_GET['edit']:'')){
	default:
	echo 'null';
	break;
	
case "ubah":
if(isset($_POST['newqty'])){
$queryUPD=mysql_query("SELECT * FROM keranjang WHERE kdbrg='$_POST[kdpluu]' AND onksr='Y' AND idksr='$_SESSION[iduser]'");
$nUPD=mysql_fetch_row($queryUPD);
$newjum=$nUPD[3]*$_POST['newqty'];
mysql_query("UPDATE keranjang SET bybrg='$_POST[newqty]',tobrg='$newjum' where kdbrg='$_POST[kdpluu]' AND onksr='Y' AND idksr='$_SESSION[iduser]'");
//echo $newjum;
//echo $_POST['newqty'];
//echo '<br>';
//echo $_POST['kdpluu'];
//echo 'saya ada dalam ubah?'; **/
header ('location:../meja.php?kertas=mesin_kasir&status=on');
}else{echo 'gagal';}
break;

case "hapus":
$hapus=mysql_query("DELETE FROM keranjang WHERE kdbrg='$_GET[kdplu]' AND onksr='Y' AND idksr='$_SESSION[iduser]'");
header ('location:../meja.php?kertas=mesin_kasir&status=on');
break;
}


?>