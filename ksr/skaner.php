<?php
echo '<script language="javascript" src="jesi/autokasir.js"></script> 
<script language="javascript">
function onEnter(e){		<!--fungsi scan barcode javascript - event handler onkeypress-->
	var key=e.keyCode || e.which;
	if(key==13){
		dPlu=document.getElementById("plu");
		nPlu=dPlu.value.trim();
		lihatB(nPlu); 
	}
}
function lihatB(item){ 
    if(item.length==0){ 
        document.getElementById("sugesbrg").style.visibility = "hidden"; 
    }else{ 
        ajakL = buatajax(); 
        var url="cfg/caribarangsken.php"; 
        ajakL.onreadystatechange=stateChanged; 
        var params = "q="+item; <!--alert(item);-->
        ajakL.open("POST",url,true); 
        ajakL.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajakL.setRequestHeader("Content-length", params.length);
        ajakL.setRequestHeader("Connection", "close");
		ajakL.send(params); 
    } 
} 
function valid(form)
{
  if (form.plu.value == "")
  {
    alert("Isikan kode barang!");
    form.plu.focus();
    return (false);
  }
  if (form.nmbarang.value == "")
  {
    alert("Isikan nama barang!");
    form.nmbarang.focus();
    return (false);
  }
  if (form.hrbarang.value == "")
  {
    alert("Barang yang dimasukan tidak ada!");
    form.plu.focus();
    return (false);
  }
  if (form.qtybarang.value == "")
  {
    alert("Isikan jumlah barang!");
    form.qtybarang.focus();
    return (false);
  }
  if (isNaN(form.qtybarang.value))
  {
	alert("QTY. harus berupa angka!");	
    form.qtybarang.focus();
	return (false);
  }
 	return(true);
}
</script>
<body onload="form.plu.focus();"> 
<div id="kotaku">
<form name="form" method="POST" action="?kertas=mesin_kasir&status=on" onsubmit="return valid(this)"> 
<div class="kotakh"><a href="meja.php?kertas=mesin_kasir&status=on">SCANNER TOKO</a></div><div class="kotakb"><center><table>
<tr><td>Kode Barang</td><td><input type=text id=plu name=plu onkeypress="onEnter(event)" size="20" /></td></tr> 
<tr><td>Nama Barang</td><td><input type=text id=nmbarang name=nmbarang onkeyup="lihatB(this.value)" size="20" /></td></tr>  
<tr><td>Harga Barang</td><td><input type=text id=hrbarang name=hrbarang disabled="yes" size="20" /><input type=text id=hrgbrg name=hrgbrg style="display:none" /></td></tr> 
<tr><td>QTY. Barang</td><td><input type=text id=qtybarang name="qtybarang" value="1" size="20" /></td></tr> 
<tr><td colspan="2" align="right">'; 
echo '<font size="1">'; ?><?php echo 'KSRBJ'.$ktgl.''.$kjam.''; ?> <?php echo '</font>'; ?> <?php echo '<input type="submit" value="Beli"></td>
</tr>
</table></center></div>
</form></div>';
echo '<div id=sugesbrg style="position:absolute;top:110;left:110;padding: 2px 2px 2px 2px;background-color:#FFFF55;width:160;visibility:hidden;z-index:100"> 
</div> 
</body>';
?>