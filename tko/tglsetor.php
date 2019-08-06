<?php

echo '<script language="javascript">
function validks(form)
{
  if (psetoran.awalsetor.value == "")
  {
    alert("Isikan periode awal setor!");
    psetoran.awalsetor.focus();
    return (false);
  }
  if (psetoran.akhirsetor.value == "")
  {
    alert("Isikan periode akhir setor!");
    psetoran.akhirsetor.focus();
    return (false);
  }
  return (true);
}
</script>';
echo '<div class="kotaku">';
echo '<div class="kotakhw">PERIODE SETORAN</div><div class="kotakbw"><hr><center>
<form name="psetoran" method="POST" action="" onSubmit="return validks(psetoran)">
<table>
<tr><td>Awal</td><td><input type="text" name="awalsetor"  id="awalsetor" value=""></td></tr>
<tr><td>Akhir</td><td><input type="text" name="akhirsetor" id="akhirsetor" value="'; echo $ktgl; echo '"></td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Cek"></td></tr>
</table></form>';
echo '</center></div>';
echo '</div>';

?>