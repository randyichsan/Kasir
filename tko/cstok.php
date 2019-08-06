<?php

echo '<script language="javascript" src="jesi/autocaristok.js"></script> 
<script language="javascript">
function onEnterS(e){		<!--fungsi scan barcode javascript - event handler onkeypress-->
	var key=e.keyCode || e.which;
	if(key==13){
		dPlu=document.getElementById("kodebarangs");
		nPlu=dPlu.value.trim();
		cariS(nPlu); 
	}
}
function cariS(item){ 
    if(item.length==0){ 
        document.getElementById("kanan").style.visibility = "hidden"; 
    }else{ 
        ajakL = buatajax(); 
        var url="cfg/caristok.php"; 
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
echo '<div class="kotakhw">CARI STOK BARANG</div><div class="kotakbw"><hr><center>
<form name="caris" method="POST" action="">
<table>
<tr><td>Kode Barang</td><td><input type="text" name="kodebarangs"  id="kodebarangs" value="" onkeypress="onEnterS(event)"></td></tr>
<tr><td>Nama Barang</td><td><input type="text" name="namabarangs" value="" onkeyup="cariS(namabarangs.value)"></td></tr>
</table></form></center></div>';
echo '</div>';

?>