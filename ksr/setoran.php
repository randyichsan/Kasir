<?php
session_start();

include "../cfg/konfigurasi.php";
include "../cfg/indotgl.php";

if(isset($_POST['jmlsetors'])){
$jstr=$_POST['jmlsetors'];	
$kdu=$_SESSION['iduser'];
$tgls=$_POST['tglsetor_s'];
$kdjs=''.$kdu.''.$tgls.'';
//echo $kdjs;
$queryTOS=mysql_query("SELECT SUM(tobrg) FROM barangjual WHERE kdjual LIKE '$kdjs%' AND setor='0'");
	$nTOS=mysql_fetch_row($queryTOS);
	$ntots=$nTOS[0];
if($ntots==0){
	echo 'Tidak ada transaksi, tidak bisa melakukan setoran.';	
}else{
echo '<div class="kotaku">';
echo '<form name="daftars"><div class="kotakh">DAFTAR SETORAN</div><div class="kotakb"><center>
<table>
<tr><th>kode kasir</th><th>tanggal setor</th><th>jumlah setor</th><th>setoran kasir</th><th>selisih</th></tr>';
	print "<tr><td>$_SESSION[iduser]</td><td>";echo tgl_indo($tgls); print"</td><td>"; echo number_format($ntots,0,",","."); print "</td><td>$jstr</td><td>";echo $sel=$jstr-$ntots; print"</td></tr>";
mysql_query("INSERT INTO setoran(kode_kasir,tgl_jual,tgl_setor,jum_jual,jum_setor,selisih) VALUES('$_SESSION[iduser]','$tgls','$ktgl','$ntots','$jstr','$sel')");
echo '</table></center><br>tanda (-) pada selisih -> kekurangan setoran.</div>
</form>
</div>'; 
mysql_query("UPDATE barangjual SET setor='1' WHERE kdjual LIKE '$kdjs%' AND setor='0'");
}
}
?>