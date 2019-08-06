<?php

echo '<script language="javascript" src="jesi/autocarirakstok.js"></script> 
<script language="javascript">
function onEnterRS(e){		<!--fungsi scan barcode javascript - event handler onkeypress-->
	var key=e.keyCode || e.which;
	if(key==13){
		dPlu=document.getElementById("kodebarangrs");
		nPlu=dPlu.value.trim();
		cariRS(nPlu); 
	}
}
function cariRS(item){ 
    if(item.length==0){ 
        document.getElementById("dastok").style.visibility = "hidden"; 
    }else{ 
        ajakL = buatajax(); 
        var url="cfg/carirakstok.php"; 
        ajakL.onreadystatechange=stateChanged; 
        var params = "q="+item; <!--alert(item);-->
        ajakL.open("POST",url,true); 
        ajakL.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajakL.setRequestHeader("Content-length", params.length);
        ajakL.setRequestHeader("Connection", "close");
		ajakL.send(params); 
    } 
} 
</script>';
echo '<div class="kotaku">';
echo '<div class="kotakhw">CEK STOK RAK</div><div class="kotakbw"><hr><center>
<form name="carirs" method="POST" action="">
<table>
<tr><td>Kode Barang</td><td><input type="text" name="kodebarangrs"  id="kodebarangrs" value="" onkeypress="onEnterRS(event)"></td></tr>
<tr><td>Nama Barang</td><td><input type="text" name="namabarangrs" id="namabarangrs" value="" onkeyup="cariRS(namabarangrs.value)"></td></tr>
</table></form>';

if($_GET['csr']=='ya'){
$queryCSR=mysql_query("SELECT * FROM stoktoko WHERE kdbrg='$_GET[kdbs]'");
$nCSR=mysql_fetch_row($queryCSR);
echo '<hr>';
echo '<form name="ubahrs" method="POST" action="tko/ubahrakstok.php">
<table>
<tr><td>Kode Barang</td><td><input type="text" name="kodrakcek"  id="kodrakcek" value="'; echo $nCSR[0]; echo'" disabled><input type="hidden" value="'; echo $nCSR[0]; echo'" name="kodrakcekhid" id="kodrakcekhid"></td></tr> 
<tr><td>Nama Barang</td><td><input type="text" name="namrakcek"  id="namrakcek" value="'; echo $nCSR[1]; echo '" disabled></td></tr>
<tr><td>Stok Rak</td><td><input type="text" name="stokrakcek"  id="stokrakcek" value=""></td></tr>
<tr><td>Tanggal Cek</td><td><input type="text" name="tglrakcek" id="tglrakcek" value="'; echo $ktgl; echo'"></td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Cek"></td></tr>
</table></form>';
}

echo '</center></div>';

echo '</div>';

?>