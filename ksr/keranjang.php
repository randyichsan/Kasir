<?php
echo '<script language="javascript">
function validqty(form){
if (updqty.newqty.value == "")
  {
    alert("Isikan QTY. barang!");
    updqty.newqty.focus();
    return (false);
  }
  if (isNaN(updqty.newqty.value))
  {
	alert("QTY. harus berupa angka!");	
    updqty.newqty.focus();
	return (false);
  }
 	return(true);
}
</script>';
switch((isset($_GET['status'])? $_GET['status']:'')){
	default:
	$queryCK=mysql_query("SELECT sum(tobrg) FROM keranjang Where onksr='Y' AND idksr='$_SESSION[iduser]'");
	$mCK=mysql_fetch_row($queryCK);
	$CK=$mCK[0];
	echo 'Status:<br />';
	if($CK){
		echo '<div class="pesanker">Keranjang masih berisi subtotal Rp. <b>'; echo $CK; echo '</b>,- <br /><img src="img/s_attention.png" /> <b>Sebelum melakukan transaksi baru, keranjang harus kosong!</b> <a href="?kertas=mesin_kasir&status=on" title="kembali ke keranjang"><u>CEK KERANJANG</u></a></div>';
	}else{
		echo 'Keranjang kosong, silahkan mulai transaksi baru.';
	}
		break;

case "on":
	if(isset($_POST['hrgbrg'])){
	$jum = $_POST['hrgbrg'] * $_POST['qtybarang']; 
	
	$queryIT=mysql_query("SELECT * FROM Keranjang WHERE kdbrg='$_POST[plu]' AND onksr='Y' AND idksr='$_SESSION[iduser]'");
	$cIT=mysql_fetch_row($queryIT);
	if($cIT[0]){
		echo '<div class="pesanker"><img src="img/s_attention.png" /> <b>Tidak bisa memasukan kembali item '; echo $cIT[2]; echo ' yang sudah ada dikeranjang, silahkan lakukan perubahan pada item tersebut.</b></div><br><br>';
	}else{
	$queryA=mysql_query("INSERT INTO keranjang(kdbrg,nmbrg,hrbrg,bybrg,tobrg,idksr,tgljual) VALUES('$_POST[plu]','$_POST[nmbarang]','$_POST[hrgbrg]','$_POST[qtybarang]','$jum','$_SESSION[iduser]','$ktgl')");
	}}
	echo '<div id="kotaku">';
	echo '<form method="POST" action="ksr/kantong.php">';
	echo '<div class="kotakhw">KERANJANG</div><div class="kotakbw"><center><table>'; // bgcolor="#C8F2C8" bordercolor="#6EC36E"
	echo '<tr><th>NO</th><th>KODE BARANG</th><th>NAMA BARANG</th><th>HARGA</th><th>QTY</th><th>JUMLAH</th><th colspan="2">EDIT</th></tr>';
	$no=1;
	$queryB=mysql_query("SELECT * FROM keranjang where onksr='Y' AND idksr='$_SESSION[iduser]'");
	while($n=mysql_fetch_row($queryB)){
		print "<tr>
		<td align=\"center\">$no</td>
		<td>$n[1]</td>
		<td>$n[2]</td>
		<td align=\"right\">$n[3]</td>
		<td align=\"center\">$n[4]</td>
		<td align=\"right\">$n[5]</td>
		<td align=\"center\"><a href=?kertas=mesin_kasir&status=ubah&kdplu=$n[1] title=\"Ubah\"><img src=img/b_edit.png alt=edit></a></td><td><center><a href=ksr/ubah.php?edit=hapus&kdplu=$n[1] title=\"Hapus\" onclick=\"return confirm('Batal Belanja? ')\"\"><img src=img/b_drop.png alt=delete></a></center></td></tr>";
		$no++;
	}
	$queryC=mysql_query("SELECT sum(tobrg) FROM keranjang Where onksr='Y' AND idksr='$_SESSION[iduser]'");
	$m=mysql_fetch_row($queryC);
	$tot=$m[0];
	print "<tr><td align=\"right\" colspan=\"6\">TOTAL Rp. <b><font size=\"4\">"; echo number_format($tot,0,",","."); print "</font></b></td><td align=\"center\" colspan=\"2\"><input type=\"submit\" value=\"Bayar\"></td></tr>";
	echo '</table></center></div>';
	echo '</form></div>';
	break;
case "off":
	echo 'Keranjang kosong, silahkan mulai transaksi baru.';
	break;
case "ubah":
$queryQTY=mysql_query("SELECT * FROM keranjang WHERE kdbrg='$_GET[kdplu]' AND onksr='Y' AND idksr='$_SESSION[iduser]'");
$nQTY=mysql_fetch_row($queryQTY);
	echo '<div class="boxer">';
	echo '<b>UBAH QTY. BARANG</b><hr>';
	echo 'Kode Barang: <b>'; echo $nQTY[1];
	echo '</b><br>Nama Barang: <b>'; echo $nQTY[2];
	echo '</b><br>Qty. Lama: <b>'; echo $nQTY[4];
	echo '</b><br>Qty. Baru: <form name="updqty" method="POST" action="ksr/ubah.php?edit=ubah" onSubmit="return validqty(this)"><input type="text" size="3" name="newqty"><input type="hidden" name="kdpluu" value="'; echo$nQTY[1]; echo '"><input type="submit" value="Ubah"></form>';
	echo '</div>';
	break;
}
?>