<?php

echo '<div id="kanan">';
echo '<div class="kotaku">';
echo '<form><div class="kotakh">REKAP SETORAN</div><div class="kotakb"><center>
<table>
<tr><th>no</th><th>kode kasir</th><th>tanggal jual</th><th>tanggal setor</th><th>jumlah jual</th><th>jumlah setor</th><th>selisih</th><th>rincian</th></tr>';
$nSTOR=1;
if($_SESSION[leveluser]=='A'){
	$queryRSTR=mysql_query("SELECT * FROM setoran ORDER BY tgl_setor DESC");
}else{
	$queryRSTR=mysql_query("SELECT * FROM setoran WHERE kode_kasir='$_SESSION[iduser]'");	
}
while($nRSTR=mysql_fetch_row($queryRSTR)){
	print "<tr align='center'><td>$nSTOR</td><td>$nRSTR[0]</td><td>$nRSTR[1]</td><td>$nRSTR[2]</td><td>$nRSTR[3]</td><td>$nRSTR[4]</td><td>$nRSTR[5]</td><td><a href='?kertas=rekap_setoran&rincian=lihat&k=$nRSTR[0]$nRSTR[1]'>lihat</a></td></tr>";
	$nSTOR++;
}
echo '</table>
</center><br>tanda (-) pada selisih -> kekurangan setoran.
</div>
</form>
</div>
</div>';

echo '<div id="kirig">';
echo '<div class="kotaku">';
if($_GET['rincian']=='lihat' && !empty($_GET['k'])){
$kdk=$_GET['k'];
echo '<div class="kotakb"><center>';
echo '<form><table>
<tr><th>no</th><th>kode barang</th><th>nama barang</th><th>harga barang</th><th>qty.</th><th>total</th><th>kode jual</th></tr>';
$queryRSK=mysql_query("SELECT * FROM barangjual WHERE kdjual LIKE '$kdk%'");
$noRSK=1;
while($nRSK=mysql_fetch_row($queryRSK)){
	print "<tr><td align='center'>$noRSK</td><td align='center'>$nRSK[1]</td><td>$nRSK[2]</td><td align='center'>$nRSK[3]</td><td align='center'>$nRSK[4]</td><td align='center'>$nRSK[5]</td><td>$nRSK[6]</td></tr>";
	$noRSK++;
}
$queryTOTRS=mysql_query("SELECT sum(tobrg) FROM barangjual where setor='1' AND kdjual LIKE '$kdk%'");
$nTOTRS=mysql_fetch_row($queryTOTRS);
print "<tr><td colspan='5' align='right'>Total Rp.</td><td>$nTOTRS[0]</td><td></td></tr>";
echo '</table></from></center></div></div>';	
}
echo '</div>';

?>