<?php

function permit()
{
session_start();

include "konfigurasi.php";
$lu=$_SESSION[kodeuser];
if($lu=='ADM'){
	$pok=mysql_query("SELECT * FROM menutoko");
$sok=mysql_fetch_array($pok);
if(!empty($sok['opt_menu']))
	{
		return TRUE;
	}
else
	{
		return FALSE;
	}	
}else{
	$lm='AU';
	$pok=mysql_query("SELECT * FROM menutoko WHERE level_menu='$lm' AND opt_menu='$_GET[kertas]'");
$sok=mysql_fetch_array($pok);
if(!empty($sok['opt_menu']))
	{
		return TRUE;
	}
else
	{
		return FALSE;
	}
}
}


?>
