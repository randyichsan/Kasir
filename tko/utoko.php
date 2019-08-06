<?php

ion_start(); 
if($_GET['ubto']=='edit'){
if($_SESSION[leveluser]=='A'){
$querynmTOKO = mysql_query("select * from toko"); 
$nmTOKO=mysql_fetch_row($querynmTOKO);
echo '<div class="kotaku">';
echo '<form name="utoko" method="POST" action=""><div class="kotakhw">UBAH TOKO</div><div class="kotakbw"><hr><center>';
echo '<table>
<tr><td>Nama Toko</td><td><input type="text" id="nmtoko" name="nmtoko" value="';echo $nmTOKO[0]; echo '"></td></tr>
<tr><td>Alamat</td><td><textarea wrap="OFF" id="altoko"  name="altoko" cols="30">'; echo $nmTOKO[1]; echo '</textarea></td></tr>
<tr><td>Telepon</td><td><input type="text" id="teltoko" name="teltoko" value="'; echo $nmTOKO[2]; echo '"></td></tr>';
echo '<tr><td></td><td align="right"><input type="submit" value="Ubah"></td></tr>';
echo '</table></center></div>
</form>';
if(isset($_POST[nmtoko]) && isset($_POST[altoko]) && isset($_POST[teltoko])){
	mysql_query("UPDATE toko SET toko='$_POST[nmtoko]',alamat='$_POST[altoko]',telepon='$_POST[teltoko]'");
}
echo '</div></div>';
}else{
	echo 'Anda tidak diperbolehkan merubah nama toko..';
}
}
?>