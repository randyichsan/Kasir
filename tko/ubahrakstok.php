<?php
include "../cfg/konfigurasi.php";

session_start();
	
if(!empty($_POST['stokrakcek']) && !empty($_POST['tglrakcek'])){
$queryUCSR=mysql_query("SELECT * FROM stoktoko WHERE kdbrg='$_POST[kodrakcekhid]'");
$nUCSR=mysql_fetch_row($queryUCSR);
$sstok=$_POST['stokrakcek']-$nUCSR[6];
$queryHRBBRG=mysql_query("SELECT MAX(hrbbrg) FROM barangbeli WHERE kdbrg='$_POST[kodrakcekhid]'");
$nHRBBRG=mysql_fetch_row($queryHRBBRG);
$hargabeli=$nHRBBRG[0];
$shar=$sstok*$hargabeli;
$korek=''.$sstok.' '.$shar.'';

//echo $hargabeli;
//echo $sstok;
//echo $shar;
mysql_query("UPDATE stoktoko SET nstok='$_POST[stokrakcek]',tgl_nstok='$_POST[tglrakcek]',jbk='$sstok',jhk='$shar' where kdbrg='$_POST[kodrakcekhid]'");
header ('location:../meja.php?kertas=cstok');
//echo $_POST['stokrakcek'];
//echo $_POST['tglrakcek'];
//echo $_POST['kodrakcekhid'];
}else{echo 'gagal';}

?>