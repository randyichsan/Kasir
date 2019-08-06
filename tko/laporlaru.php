<?php

echo '<div class="kotaku">';
$pawal=$_POST['awaldagang'];
$pakhir=$_POST['akhirdagang'];
echo '<form><div class="kotakh">KOREKSI TOKO</div><div class="kotakb">';
echo '<center>'; echo 'Periode dagang: '; echo ''.tgl_indo($pawal).' s.d '.tgl_indo($pakhir).'';

$queryNBK=mysql_query("SELECT SUM(jhk) FROM stoktoko WHERE tgl_nstok BETWEEN '$pawal' AND '$pakhir'");
$nNBK=mysql_fetch_row($queryNBK);

$querySSK=mysql_query("SELECT SUM(selisih) FROM setoran WHERE tgl_setor BETWEEN '$pawal' AND '$pakhir'");
$nSSK=mysql_fetch_row($querySSK);

$rugi=$nNBK[0]+$nSSK[0];

$queryCBJ=mysql_query("SELECT * FROM barangjual WHERE tgljual BETWEEN '$pawal' AND '$pakhir'");
$lnc=0;
while($nCBJ=mysql_fetch_row($queryCBJ)){
$kdbrgbj=$nCBJ[1];
$qtybj=$nCBJ[4];
$tobj=$nCBJ[5];
$queryHBM=mysql_query("SELECT MAX(hrbbrg) FROM barangbeli WHERE kdbrg='$kdbrgbj'");
$nHBM=mysql_fetch_row($queryHBM);
$aslijual=$qtybj*$nHBM[0];
$hasiljual=$tobj-$aslijual;
$lnc+=$hasiljual;
}
$lba=$lnc+$rugi;
echo '<br><br><table>
<tr><td>NBK</td><td><input type="text" value="';echo $nNBK[0]; echo '" disabled></td></tr>
<tr><td>SSK</td><td><input type="text" value="';echo $nSSK[0]; echo '" disabled></td></tr>
<tr><td>INC</td><td><input type="text" value="';echo $lnc; echo '" disabled></td></tr>
<tr><td>LBA</td><td><input type="text" value="';echo $lba; echo '" disabled></td></tr>';
echo '</table></center></div></form>';
echo '</div>';
?>