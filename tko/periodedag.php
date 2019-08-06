<?php

echo '<script language="javascript">
function validpd(form)
{
  if (pdagang.awaldagang.value == "")
  {
    alert("Isikan periode awal dagang!");
    pdagang.awaldagang.focus();
    return (false);
  }
  if (pdagang.akhirdagang.value == "")
  {
    alert("Isikan periode akhir dagang!");
    pdagang.akhirdagang.focus();
    return (false);
  }
  return (true);
}
</script>';
echo '<div class="kotaku">';
echo '<div class="kotakhw">PERIODE DAGANG</div><div class="kotakbw"><hr><center>
<form name="pdagang" method="POST" action="" onSubmit="return validpd(pdagang)">
<table>
<tr><td>Awal</td><td><input type="text" name="awaldagang"  id="awaldagang" value=""></td></tr>
<tr><td>Akhir</td><td><input type="text" name="akhirdagang" id="akhirdagang" value="'; echo $ktgl; echo '"></td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Lapor"></td></tr>
</table></form>';
echo '</center></div>';
echo '</div>';

?>