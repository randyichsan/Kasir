<?php
echo '<script language="javascript" src="jesi/autocariharga.js"></script> 
<script language="javascript">
function onEnterB(e){		<!--fungsi scan barcode javascript - event handler onkeypress-->
	var key=e.keyCode || e.which;
	if(key==13){
		dPlu=document.getElementById("kodebarangc");
		nPlu=dPlu.value.trim();
		cariB(nPlu); 
	}
}
function cariB(item){ 
    if(item.length==0){ 
        document.getElementById("dastok").style.visibility = "hidden"; 
    }else{ 
        ajakL = buatajax(); 
        var url="cfg/acariharga.php"; 
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
echo '<div class="kotakhw">CARI HARGA BARANG</div><div class="kotakbw"><hr><center>
<form name="carih" method="POST" action="">
<table>
<tr><td>Kode Barang</td><td><input type="text" name="kodebarangc"  id="kodebarangc" value="" onkeypress="onEnterB(event)"></td></tr>
<tr><td>Nama Barang</td><td><input type="text" name="namabarangc" value="" onkeyup="cariB(this.value)"></td></tr>
</table></form></center>';

if(isset($_GET[ubah])){
$ubah=$_GET['ubah'];
 	if($ubah=='ya')	{
 	$queryHRGB=mysql_query("SELECT * FROM barangtoko WHERE kdbrg='$_GET[pluh]'");
 	$nHRGB=mysql_fetch_row($queryHRGB);
 		echo '<br>';
		echo '<center><font size="4">UBAH HARGA BARANG</font></center><hr>';
		echo 'Kode Barang: <b>'; echo $nHRGB[0];
	echo '</b><br>Nama Barang: <b>'; echo $nHRGB[1];
	echo '</b><br>Harga Lama: <b>'; echo $nHRGB[2];
	echo '</b><br>Harga Baru: <form name="updhar" method="POST" action="tko/ubahh.php"><input type="text" size="10" name="newhar" id="newhar"><input type="hidden" name="pluuh" value="'; echo $nHRGB[0]; echo '"><input type="submit" value="Ubah"></form>';
	}
}
echo '</div>';
echo '</div>';
?>