<?php 
echo '<div class="kotaku">';
$perhal=15;
$halaman=new kelas_halaman($perhal);

$numlist=mysql_query("SELECT * FROM barangtoko");

$jum_bar=mysql_num_rows($numlist);
$halaman->tentukan_total_baris($jum_bar);
$awalrec=$halaman->peroleh_awal_record();


	$queryCR1 = mysql_query("select * from barangtoko ORDER BY nmbrg ASC limit $awalrec, $perhal"); 
			$nocb=$awalrec;
echo '<div class="kotakh">DAFTAR HARGA</div><div class="kotakb"><center>';
echo '<table>
	  <tr><th>no</th><th>kode barang</th><th>nama barang</th><th>harga</th><th>ubah</th></tr>';
		 while($k=mysql_fetch_array($queryCR1)){ 
		 	$nocb++;
    		print "<tr><td>$nocb</td><td>$k[0]</td><td>$k[1]</td><td>$k[2]</td><td align='center'><a href='?kertas=harga&ubah=ya&pluh=$k[0]' title='ubah'><img src=img/b_edit.png alt=edit></a></td></tr>";  //fungsi beda sendiri karena varchar
    	 }
		 echo '</table></center></div><br>';
if ($halaman->jumlah_halaman > 1)
	  {
	    print("Halaman: ");
		for ($hal = 1; $hal <= $halaman->jumlah_halaman; $hal++)
		{
		   if ($hal == $halaman->halaman_sekarang)
			  echo "$hal | ";
		   else   
			  {
			     $nama_modul = $_SERVER['PHP_SELF'].'?kertas=harga';
				 
			     echo "<a href=\"?kertas=harga&page=$hal\">$hal</a> |\n";
			  }
		}	
	  }
echo '</div>';		
?>