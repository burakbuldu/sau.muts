<?
ob_start();
include "../ayarlar/connection.php";

/* Şifresini unutan öğrencinin veritabanında aktivasyon koduyla karşılaştırılması */

	$ogrenci_no=$_REQUEST["ogrenci_no"];
	$aktivasyon_kodu=$_REQUEST["kod"];

	if(!isset($aktivasyon_kodu) && !isset($ogrenci_no)) header("location:../index.php?q=4");
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
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>
				<style>
        body {
			background-image: url("../assets/img/backgrounds/1.jpg");
			background-color: #cccccc;
		}
		</style>
		</head>
    <body>
		
		<!-- Top menu -->
<nav>
	<div class="nav-wrapper brown">
		<ul class="left hide-on-med-and-down">
		<li><a href="../index.php" class="headerlink"><img src="../assets/img/logo.png"></a></li>
		<li><a href="../index.php" class="headerlink">Anasayfa <i class="fa fa-home" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</nav>
        <!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Öğrenci - Şifremi Unuttum</h3>
	                    <p>Lütfen bilgilerinizi güncelleyiniz:</p>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                    
	                    <form role="form" method="post" class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	                    	
	                    	<fieldset data-toggle="validator">
	            				<h6>Hesap Bilgileri</h6>
	            				<div class="form-group">
				                    <label for="ogrenci_no">Öğrenci Numaranız:</label><br>
				                    <input type="text" name="ogrenci_no" class="form-control" id="ogrenci_no" value="<?php echo $_REQUEST['ogrenci_no']; ?>" readonly>
				                </div>
								<div class="form-group">
				                    <label for="aktivasyon_kodu">Aktivasyon Kodunuz:</label><br>
				                    <input type="text" name="aktivasyon_kodu" class="form-control" id="aktivasyon_kodu" value="<?php echo $_REQUEST['kod']; ?>" readonly>
				                </div>
				                <div class="form-group">
				                    <label for="sifre">Şifreniz:</label><br>
				                    <input type="password" name="sifre" class="form-control" id="sifre" data-minlength="6" maxlength="14" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="sifre2">Tekrar Şifreniz:</label><br>
				                    <input type="password" name="sifre2" class="form-control" id="sifre2" data-minlength="6" maxlength="14" data-match="#sifre" required>
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
		

                <?
include "footer.php";

/* Yeni şifrelerin veritabanına gönderilmesi ve aktivasyon kaydının silinmesi */

if($_POST) {
	$ogrenci_no=strtolower($_POST["ogrenci_no"]);
	$aktivasyon_kodu=$_POST["aktivasyon_kodu"];
	$sifre=md5($_POST["sifre"]);

				$sorgu1="delete from aktivasyon where ogrenci_no='$ogrenci_no'";
				mysqli_query($conn, $sorgu1);

				$sorgu2="update ogrenci_bilgileri set sifre='$sifre' where ogrenci_no='$ogrenci_no'";
				mysqli_query($conn, $sorgu2);
				mysqli_close($conn);
		header("location:../index.php?q=1");
}
?>
    </body>
</html>
