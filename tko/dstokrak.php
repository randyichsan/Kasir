<?php
 

/** bagian kanan daftar pembelian **/

echo '<div class="kotaku">';
if(isset($_POST['kbbeli']) && isset($_POST['nbbeli']) && isset($_POST['hbbeli']) && isset($_POST['qbbeli']) && isset($_POST['tbbeli'])){
	$tob=$_POST[hbbeli] * $_POST[qbbeli];
	mysql_query("INSERT INTO barangbeli(kdbrg,nmbrg,hrbbrg,qtybrg,totbeli,tglbeli) VALUES ('$_POST[kbbeli]','$_POST[nbbeli]','$_POST[hbbeli]','$_POST[qbbeli]','$tob','$_POST[tbbeli]')"); 

$cekbb=mysql_query("SELECT * FROM stoktoko WHERE kdbrg='$_POST[kbbeli]'");
$nbb=mysql_fetch_row($cekbb);
	if($nbb[0]){
		$UST=mysql_query("SELECT * FROM stoktoko WHERE kdbrg='$_POST[kbbeli]'");
		$nUST=mysql_fetch_row($UST);
		$slm=$nUST[2];
		$tlm=$nUST[3];
		$sbr=$_POST['qbbeli'];
		$tbr=$nUST[5];
		$tso=$nUST[6];
		$tsob=$tso+$_POST['qbbeli'];
		mysql_query("UPDATE stoktoko SET stlama='$tso' WHERE kdbrg='$_POST[kbbeli]'");
		mysql_query("UPDATE stoktoko SET tglama='$tbr' WHERE kdbrg='$_POST[kbbeli]'");
		mysql_query("UPDATE stoktoko SET stbaru='$_POST[qbbeli]',tgbaru='$_POST[tbbeli]',tstok='$tsob' WHERE kdbrg='$_POST[kbbeli]'");
	}else{ //input barang baru yang belum terdaftar
		mysql_query("INSERT INTO stoktoko(kdbrg,nmbrg,stbaru,tgbaru,tstok) VALUES('$_POST[kbbeli]','$_POST[nbbeli]','$_POST[qbbeli]','$_POST[tbbeli]','$_POST[qbbeli]')");
		mysql_query("INSERT INTO barangtoko(kdbrg,nmbrg) VALUES('$_POST[kbbeli]','$_POST[nbbeli]')");
	}	
}
echo '<form method="POST" action="">';
echo '<div class="kotakh">DAFTAR PEMBELIAN</div><div class="kotakb"><center>';
	echo '<table>'; // bgcolor="#C8F2C8" bordercolor="#6EC36E"
	echo '<tr><th>NO</th><th>KODE BARANG</th><th>NAMA BARANG</th><th>HARGA BELI</th><th>QTY</th><th>TOTAL BELI</th><th>TGL BELI</th><th colspan="2">EDIT</th></tr>';
	$no=1;
	$queryTB=mysql_query("SELECT * FROM barangbeli ORDER BY tglbeli DESC");
	while($nTB=mysql_fetch_row($queryTB)){
		print "<tr>
		<td align=\"center\">$no</td>
		<td>$nTB[0]</td>
		<td>$nTB[1]</td>
		<td align=\"center\">$nTB[2]</td>
		<td align=\"center\">$nTB[3]</td>
		<td align=\"right\">$nTB[4]</td>
		<td align=\"center\">$nTB[5]</td>
		<td align=\"center\"><a href=#><img src=img/b_edit.png alt=edit></a></td><td><center><a href=# onclick=\"return confirm('HAPUS BARANG? ')\"\"><img src=img/b_drop.png alt=delete></a></center></td></tr>";
		$no++;
	}
	echo '</table></center></div></form>';

echo '</div>';

?>