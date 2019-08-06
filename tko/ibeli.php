<?php
echo '<script language="javascript" src="jesi/autobeli.js"></script> 
<script language="javascript">
function onEnterI(e){		<!--fungsi scan barcode javascript - event handler onkeypress-->
	var key=e.keyCode || e.which;
	if(key==13){
		dPlu=document.getElementById("kbbeli");
		nPlu=dPlu.value.trim();
		cariI(nPlu); 
	}
}
function cariI(item){ 
    if(item.length==0){ 
        document.getElementById("sugestibli").style.visibility = "hidden"; 
    }else{ 
        ajakL = buatajax(); 
        var url="cfg/caribarang.php"; 
        ajakL.onreadystatechange=stateChanged; 
        var params = "q="+item; <!--alert(item);-->
        ajakL.open("POST",url,true); 
        ajakL.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajakL.setRequestHeader("Content-length", params.length);
        ajakL.setRequestHeader("Connection", "close");
		ajakL.send(params); 
    } 
} 
function vbeli(form){
if (belib.kbbeli.value == "")
  {
    alert("Isikan kode barang!");
    belib.kbbeli.focus();
    return (false);
  }
if (belib.nbbeli.value == "")
  {
    alert("Isikan nama barang!");
    belib.nbbeli.focus();
    return (false);
  }
if (belib.hbbeli.value == "")
  {
    alert("Isikan harga barang!");
    belib.hbbeli.focus();
    return (false);
  }
if (isNaN(belib.qbbeli.value))
  {
	alert("Qty. harus berupa angka!");	
    belib.qbbeli.focus();
	return (false);
  }
if (belib.tbbeli.value == "")
  {
    alert("Isikan tanggal beli!");
    belib.tbbeli.focus();
    return (false);
  }
 	return(true);
}
</script>';


echo '<div class="kotaku">';
echo '<form name="belib" method="POST" action="" onsubmit="return vbeli(belib)"><div class="kotakhw">INPUT PEMBELIAN</div><div class="kotakbw"><hr><center>';
echo '<table>
<tr><td>Kode Barang</td><td><input type="text" id="kbbeli" name="kbbeli" onkeypress="onEnterI(event)"></td></tr>
<tr><td>Nama Barang</td><td><input type="text" id="nbbeli" name="nbbeli" onkeyup="cariI(nbbeli.value)"></td></tr>
<tr><td>Harga Beli</td><td><input type="text" id="hbbeli" name="hbbeli"></td></tr>
<tr><td>Quantity</td><td><input type="text" id="qbbeli" name="qbbeli"></td></tr>
<tr><td>Tanggal Beli</td><td><input type="text" id="tbbeli" name="tbbeli" value="'; echo $ktgl; echo '"></td></tr>
<tr><td></td><td align="right"><input type="submit" value="Masuk"></td></tr>';
echo '</table></center></div>
</form>';
echo '<div id="sugestibli" style="position:absolute;top:215;left:250;padding: 2px 2px 2px 2px;background-color:#FFFF55;width:160;visibility:hidden;z-index:100"></div>';
echo '</div>';
 
?>