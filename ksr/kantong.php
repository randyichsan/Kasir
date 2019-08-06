<?php
include "../cfg/konfigurasi.php";
session_start();
$idusr = $_SESSION['iduser'];
$kodj = ''.$idusr.''.$ktgl.''.$kjam.'';

/** proses input transaksi ke tabel barangjual
*/
mysql_query("UPDATE keranjang SET kdjual='$kodj' WHERE onksr='Y' AND idksr='$_SESSION[iduser]'");
mysql_query("INSERT INTO barangjual(kdbrg,nmbrg,hrbrg,bybrg,tobrg,kdjual,tgljual) SELECT kdbrg,nmbrg,hrbrg,bybrg,tobrg,kdjual,tgljual FROM keranjang where onksr='Y' AND idksr='$_SESSION[iduser]'");
mysql_query("UPDATE keranjang SET onksr='N' where onksr='Y' AND idksr='$_SESSION[iduser]'");
$TP=mysql_query("SELECT * FROM barangjual WHERE kdjual LIKE '$kodusr%' AND fus='0'");
while($nTP=mysql_fetch_row($TP)){
	$TPU=mysql_query("SELECT * FROM barangjual WHERE kdbrg='$nTP[1]' AND kdjual LIKE '$kodusr%' AND fus='0'");
	$TSU=mysql_query("SELECT * FROM stoktoko WHERE kdbrg='$nTP[1]'");
	$nTPU=mysql_fetch_row($TPU);
	$nTSU=mysql_fetch_row($TSU);
	$USL=$nTSU[2]-$nTPU[4];
	$UST=$nTSU[6]-$nTPU[4];
mysql_query("UPDATE stoktoko SET stlama='$USL',tstok='$UST' WHERE kdbrg='$nTP[1]'");
}
mysql_query("UPDATE barangjual SET fus='1' WHERE kdjual LIKE '$kodusr%' AND fus='0'");
//echo 'ok update';
header('location:../meja.php?kertas=mesin_kasir&status=off');
?>