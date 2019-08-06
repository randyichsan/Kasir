<?php
echo '<script language="javascript">';
echo '
function calc(){
	if(bayar.value==""){
		alert("Masukan nilai uang bayar!");
		bayar.focus();
		return (false);
	}else{
		byr=document.getElementById("bayar");
		cash=byr.value.trim();
		tot=document.getElementById("totb");
		total=tot.value.trim();
		change=cash-total;
		document.getElementById("kembali").value=change;
		alert("Uang kembali: Rp. "+change+"\nTerima Kasih, silahkan datang kembali");
		return (false);
	}
}
</script>';


 $queryCAL=mysql_query("SELECT sum(tobrg) FROM keranjang where onksr='Y' AND idksr='$_SESSION[iduser]'");
	$mCAL=mysql_fetch_row($queryCAL);
	$totCAL=$mCAL[0];
echo '<div id="kotaku">';
 echo '<form method="POST" onSubmit="return calc()"><div class="kotakh">KALKULATOR</div><div class="kotakb"><center><table>
 <tr><td>Total Belanja</td><td>Rp.<font size="6">'; echo number_format($totCAL,0,",","."); echo '</font><input type="hidden" name="totb" id="totb" value="'; echo $totCAL; echo '" size="20" /></td></tr>
 <tr><td>Bayar</td><td><input type="text" name="bayar" id="bayar" size="20" /></td></tr>
 <tr><td>Kembali</td><td><input type="text" name="kembali" id="kembali" disabled="yes" size="20" /></td></tr>
 <tr><td colspan="2" align="right"><input type="submit" value="Hitung" /></td></tr>
 </table></center></div></form></div><br>';
 
?>