<?php
include "../cfg/konfigurasi.php";

session_start();
	
if(isset($_POST['newhar'])){
mysql_query("UPDATE barangtoko SET hrbrg='$_POST[newhar]' where kdbrg='$_POST[pluuh]'");
echo $_POST['newhar'];
echo $_POST['pluuh'];
header ('location:../meja.php?kertas=harga');
}else{echo 'gagal';}

?>