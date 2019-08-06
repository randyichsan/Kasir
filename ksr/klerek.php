<?php
echo '<script language="javascript">
function vsetor(form){
if (setork.jmlsetors.value == "")
  {
    alert("Isikan jumlah setoran!");
    setork.jmlsetors.focus();
    return (false);
  }
  if (isNaN(setork.jmlsetors.value))
  {
	alert("Setoran harus berupa angka!");	
    setork.jmlsetors.focus();
	return (false);
  }
 	return(true);
}
</script>';
echo '<div class="kotaku">';
echo '<form name="setork" method="POST" action="" onsubmit="return vsetor(setork)"><div class="kotakhw">SETORAN KASIR</div><div class="kotakbw"><hr><center>
<table>
<tr><td>Kode kasir</td><td><input type="text" name="kodekasir_s" value="';echo $_SESSION[iduser]; echo'" disabled></td></tr>
<tr><td>Tanggal setor</td><td><input type="text" name="tglsetor_s" value="';echo $ktgl; echo'"></td></tr>
<tr><td>Jumlah setor</td><td><input type="text" id="jmlsetors" name="jmlsetors"></td></tr>
<tr><td></td><td align="right"><input type="submit" value="Setor" name="setor"></td></tr>
</table></center></div>
</form>';
echo '</div>';
?>