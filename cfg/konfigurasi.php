<?php



mysql_connect("localhost","root",""); //ubahpasswordnya diganti dengan password mysql kamu
mysql_select_db("tokoku"); 

$datab="tokoku";
$password="";   //ubahpasswordnya diganti dengan password mysql kamu
$user="root";

date_default_timezone_set('Asia/Jakarta');
	$ktgl=date("Y-m-d");
	$kjam=date("H:i:s");
?>