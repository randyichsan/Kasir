<?php
	$nim = $_GET['nim'];
		
	// connect database
	require_once('db_login.php');
	
	$db = new mysqli($db_host, $db_username, $db_password, $db_database);
	
	if ($db->connect_errno){
		die ("Could not connect to the database: <br />". $db->connect_error);
	}

	// buat validasi: apakah yakin ingin menghapus?
	
	$query = " DELETE FROM mahasiswa WHERE nim=".$nim." ";
	
	// Execute the query
	$result = $db->query( $query );
	if (!$result){
		die ("Could not query the database: <br />". $db->error);
	}
	else{
		echo 'Data has been deleted.<br/><br/>';
		echo '<a href="index.php">Back to home</a>';
	}
	
	$db->close();				
?>
<?php
	$filename = $nim.".jpg";
	$folder = "uploads/".$nim;
	if (file_exists($folder)){
		unlink($folder.'/'.$filename);
		rmdir($folder);
	}
?>

<html>
	<head>
		<title>Hapus Data</title>
	</head>
<html>