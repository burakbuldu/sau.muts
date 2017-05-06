<?php ob_start();?>
<!DOCTYPE html>
<?php

include "../ayarlar/connection.php";

/* Şifresini unutan personelin aktivasyon kodu ve kullanıcı adıyla veritabanında kontrolü */

	$kullaniciadi=$_REQUEST["kullaniciadi"];
	$aktivasyon_kodu=$_REQUEST["kod"];

	$sorgu="select * from akademik where kullaniciadi='$kullaniciadi' and sifre='$aktivasyon_kodu'";
	$dondur=mysqli_query($conn,$sorgu);
	$say=mysqli_num_rows($dondur);
	
	/* eşleşme olmadıysa */
	
	if($say<1) header("location:../index.php?q=2");
	
	/* eşleşme başarılıysa aşağısı çalışacak */
?>
<html lang="tr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sakarya Üniversitesi İşletme Fakültesi - Mesleki Uygulama Takip Sistemi</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/css/form-elements.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/media-queries.css">
		<link rel="stylesheet" href="../assets/css/modal.css">
		<link rel="stylesheet" href="../assets/css/materialize.min.css">
		
		

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    </head>

    <body>
		
		<!-- Top menu -->
<nav>
  <div class="nav-wrapper brown">
    <a href="index.php" class="brand-logo headerlink"><img src="../assets/img/logo.png"></a>
      <a href="#" data-activates="slide-out" class="button-collapse headerlink"><i class="fa fa-bars fa-3x" aria-hidden="true"></i></a>
    </div>
  </nav>
        
        <!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Hesap Bilgilerimi Güncelle</h3>
	                    <p>Bilgilerinizi güncellemek için aşağıdaki adımları izleyiniz:</p>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                    
	                    <form role="form" method="post" class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	                    	
	                    	<fieldset data-toggle="validator">
	            				<h6>Hesap Bilgilerim</h6>
	            				<div class="form-group">
				                    <label for="kullaniciadi">Kullanıcı Adı:</label><br>
				                    <input type="text" name="kullaniciadi" class="form-control" id="kullaniciadi" value="<?php echo $kullaniciadi ?>" readonly>
				                </div>
								<div class="form-group">
				                    <label for="aktivasyon_kodu">Aktivasyon Kodunuz:</label><br>
				                    <input type="text" name="aktivasyon_kodu" class="form-control" id="aktivasyon_kodu" value="<?php echo $aktivasyon_kodu ?>" readonly>
				                </div>
				                <div class="form-group">
				                    <label for="sifre">Şifreniz:</label><br>
				                    <input type="password" name="sifre" class="form-control" id="sifre" data-minlength="6" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="sifre2">Tekrar Şifreniz:</label><br>
				                    <input type="password" name="sifre2" class="form-control" id="sifre2" data-minlength="6" data-match="#sifre" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
	            				<br>
	            				<button type="submit" class="btn">Güncelle</button>
	            			</fieldset>
	            				                    	
	                    </form>
	                    
	                </div>
	            </div>
			</div>
		</div>
		

        <?php
include "footer.php";

/* Yeni girilen şifreleri veritabanında güncelleme */

if($_POST)
{
$kullaniciadi=strtolower(tr_strtolower($_POST['kullaniciadi']));
$sifre=md5($_POST['sifre']);

$sorgu="update akademik set sifre='$sifre' where kullaniciadi='$kullaniciadi'";

mysqli_query($conn, $sorgu);
mysqli_close($conn);
header("location:../index.php?q=1");
}
?>
    </body>
</html>
