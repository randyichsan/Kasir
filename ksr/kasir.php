<?php


 $kdus=$_SESSION['iduser'];
$kdjskg=''.$kdus.''.$ktgl.'';
$queryCSH=mysql_query("SELECT * FROM barangjual WHERE setor='0' AND kdjual NOT LIKE '$kdjskg%'");
$cCSH=mysql_fetch_row($queryCSH);
if($cCSH[0]){
	echo 'Anda belum melakukan setoran hari sebelumnya, silahkan melakukan setoran tersebut';
}else{
$queryCS=mysql_query("SELECT * FROM setoran WHERE kode_kasir='$_SESSION[iduser]' AND tgl_jual='$ktgl'");
$cCS=mysql_fetch_row($queryCS);

if($cCS[0]){
   echo 'Anda sudah melakukan setoran hari ini, tidak dapat membuka kasir dengan kode yang sama. Kode: '.$cCS[0];
}else{
	echo '<div class="cart">';
	include "keranjang.php";
echo '</div>';

echo '<div id="alat">';
echo '<div class="skaner">';
	include "skaner.php";
echo '</div>';
echo '<div class="kalkulator">';
	include "kalkulator.php";
echo '</div>';
echo '</div>';
}
}
?>