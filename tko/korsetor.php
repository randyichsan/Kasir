<?php


echo '<div class="kotaku">';
$pawal=$_POST['awalsetor'];
$pakhir=$_POST['akhirsetor'];
$querypsetor=mysql_query("SELECT * FROM setoran WHERE tgl_setor BETWEEN '$pawal' AND '$pakhir'");
echo '<form><div class="kotakh">KOREKSI SETORAN</div><div class="kotakb">';
echo '<center>'; echo 'Periode setoran: '; echo ''.tgl_indo($pawal).' s.d '.tgl_indo($pakhir).'';
echo '<table>
<tr><th>no</th><th>kode kasir</th><th>jumlah jual</th><th>jumlah setor</th><th>selisih</th><th>tanggal setor</th></tr>';
$nokstor=1;
while($npsetor=mysql_fetch_row($querypsetor)){
print "<tr><td>$nokstor</td><td>$npsetor[0]</td><td>$npsetor[3]</td><td>$npsetor[4]</td><td>$npsetor[5]</td><td>$npsetor[2]</td></tr>";
$nokstor++;
}
$querysssetor=mysql_query("SELECT SUM(selisih) FROM setoran WHERE tgl_setor BETWEEN '$pawal' AND '$pakhir'");
$nsssetor=mysql_fetch_row($querysssetor);
print "<tr><td colspan='4' align='right'>Total selisih</td><td colspan='2'>$nsssetor[0]</td></tr>";
echo '</table></center></div></form></div>';

?>