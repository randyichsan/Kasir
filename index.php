<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Aplikasi Web Kasir Sederhana</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

						<script language="javascript">
					function valid(form)
					{
					  if (form.idanda.value == "")
					  {
						alert("Anda belum mengisikan ID.");
						form.idanda.focus();
						return (false);
					  }

					  if (form.katakunci.value == "")
					  {
						alert("Anda belum mengisikan Kata kunci.");
						form.katakunci.focus();
						return (false);
					  }
					  return (true);
					}
					</script>
    
    
  </head>

  <body>

    <!--Google Font - Work Sans-->
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>

			<div class="container">
			<div class="profile">
			<button class="profile__avatar" id="toggleProfile">
			<img src="cashier.jpg" alt="Avatar" /> 
			</button>
				
			<div class="profile__form">
			<form name="form" action="ceksan.php" method="post" onSubmit="return valid(this)">
			<div class="profile__fields">
			<div class="field">
							<b><center><?php 
							include "cfg/konfigurasi.php";
							$querytk=mysql_query("SELECT * FROM toko");
							$ntk=mysql_fetch_row($querytk); 
							echo $ntk[0]; ?>  </b>	
			</div>
					
					
				<div class="field"><center>
				<table border="0">
											<tr><td align="left" align="center">ID. User</td><td align="right"><input name="idanda" type="text" value="" maxlenght="20" size="20"></td></tr>
											<tr><td align="left" align="center">Password</td><td align="right"><input name="katakunci" type="password" value="" size="20"></td></tr>
											<tr><td colspan="2" align="center"><input type="submit" value="Masuk"></td></tr>
			</div>
				   
				  </div>
				 </div>
			  </div>
			</div>
				
											<script src="js/index.js"></script>

    
    
    

<?php

						switch((isset($_GET['aks'])? $_GET['aks']:''))
						{

						default: 
						echo "<script language=\"javascript\">
									alert(\"Silahkan log-in\");
								  </script>";
						break;

						case "error1":
						echo "<script language=\"javascript\">
									alert(\"Terjadi kesalahan, periksa kembali ID dan Password Anda!.\");
								  </script>";
						break;

						case "mess2":
							echo "<script language=\"javascript\">
									alert(\"Klik icon gambar.\");
								  </script>";
						break;

						}
?>
  </body>
</html>
