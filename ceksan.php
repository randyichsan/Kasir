<html>

<head>
  <title></title>
</head>

<body>

<?php
include "cfg/konfigurasi.php";

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$namauser = anti_injection($_POST['idanda']);
$sandi     = anti_injection(md5($_POST['katakunci']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($namauser) OR !ctype_alnum($sandi))
{
  	header('location:index.php?aks=error1');
}
else
{
	$login=mysql_query("SELECT * FROM usertoko WHERE id_user='$namauser' AND ksandi='$sandi'");
	$ada=mysql_num_rows($login);
	$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
	if ($ada > 0)
	{
  		session_start();

  		$_SESSION[iduser]     	= $r[id_user];
  		$_SESSION[nauser]		= $r[nama_user];
 		$_SESSION[passuser]     = $r[ksandi];
 		$_SESSION[idsesi]		= $r[id_sesi];
  		$_SESSION[leveluser]    = $r[level_user];
  		$_SESSION[kodeuser]		= $r[opt_user];
  		
		$sid_lama = session_id();

		session_regenerate_id();

		$sid_baru = session_id();

  		mysql_query("UPDATE usertoko SET id_sesi='$sid_baru' WHERE id_user='$_SESSION[iduser]'");
		  
		header('location:meja.php');
	}else{
		header('location:index.php?aks=error1');
  	}
}
?>


</body>

</html>