<?php
include "../cfg/konfigurasi.php";
$CSK=mysql_query("SELECT * FROM barangjual WHERE setor='0'");
$nCSK=mysql_fetch_array($CSK);
if($nCSK[0]){
	header('location:../meja.php?mess=gagal');
}else{   		  
$query="SHOW TABLES";
$hasil=mysql_query($query);
$listtabel="";
while($data=mysql_fetch_row($hasil)){
	$listtabel.=$data[0]." ";
}

$command="D:\\xampp\mysql\bin\mysqldump -u".$user." -p".$password." ".$datab." ".$listtabel." > ".$datab.".sql";

exec($command);

header("Content-Disposition: attachment; filename=".$datab.".sql");
header("Content-type: application/download");
$fp=fopen($datab.".sql", 'r');
$content=fread($fp, filesize($datab.".sql"));
fclose($fp);
echo $content;
exit;

}


?>