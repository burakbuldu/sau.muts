<?php ob_start();?>
<!DOCTYPE html>
<html lang="tr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sakarya Üniversitesi İşletme Fakültesi - Mesleki Uygulama Takip Sistemi</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">
		<link rel="stylesheet" href="assets/css/modal.css">
		<link rel="stylesheet" href="assets/css/materialize.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
		<style>
		.modal-backdrop
		{
			opacity:0.5 !important;
		}
		</style>
    </head>

    <body>
		
		<!-- Top menu -->
	<nav>
		<div class="nav-wrapper brown">
			<a href="index.php" class="brand-logo headerlink"><img src="assets/img/logo.png"></a>
			  <ul class="right hide-on-med-and-down">
				<li><a class="headerlink" href='#' data-toggle="modal" data-target="#ogrenci-giris"><i class="fa fa-sign-in" aria-hidden="true"></i> Öğrenci Giriş</a></li>
				<li><a class="headerlink" href='#' data-toggle="modal" data-target="#akademik-giris"><i class="fa fa-sign-in" aria-hidden="true"></i> Akademik Giriş</a></li>
			  </ul>
			  <ul id="slide-out" class="side-nav">
				<li><img src="assets/img/mobile.png"></li>
				<li><a class="headerlink" href='#' data-toggle="modal" data-target="#ogrenci-giris"><i class="fa fa-sign-in" aria-hidden="true"></i> Öğrenci Giriş</a></li>
				<li><a class="headerlink" href='#' data-toggle="modal" data-target="#akademik-giris"><i class="fa fa-sign-in" aria-hidden="true"></i> Akademik Giriş</a></li>
			  </ul>
			<a href="#" data-activates="slide-out" class="button-collapse headerlink"><i class="fa fa-bars fa-3x" aria-hidden="true"></i></a>
		</div>
	</nav>
        
        <!-- Description -->
		<div class="description-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 description-title">
	                    <h2>Mesleki Uygulama Takip Sistemi</h2>
						<div class="col-sm-12 description-text">
	                    <p>
<?php
	if(isset($_REQUEST['q'])) {
		if($_REQUEST['q'] == 1)
			echo "Öğrenci kaydı tamamlandı, giriş yaparak bilgilerinizi kontrol edebilirsiniz!";
		if($_REQUEST['q'] == 2)
			echo "Hatali Kullanıcı ya da Şifre!";
		if($_REQUEST['q'] == 3)
			echo "Böyle bir öğrenci kaydı mevcut!"; 
		if($_REQUEST['q'] == 4)
			echo "Giriş yapmadınız!";
		if($_REQUEST['q'] == 5)
			echo "Hatali Kullanıcı ya da Aktivasyon Kodu!";	
		if($_REQUEST['q'] == 6)
			echo "Aktivasyon Kodunuz email adresinize gönderilmiştir!";
		if($_REQUEST['q'] == 7)
			echo "Böyle bir kullanıcı kaydı yoktur!";	} ?>
						</p>
						</div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-10 col-sm-offset-1 description-text">
	                    <p><h6>Mesleki Uygulama Takip Sistemi, Sakarya Üniversitesi İşletme Fakültesi için bitirme tezi olarak hazırlanmıştır.</h6></p>
						<p><h6>Mesleki Uygulama kapsamında staj gören öğrencilerin, denetçi öğretim üyeleri, staj görülen işyerleri ve staj bilgilerinin kayıt altında tutulduğu, sisteme kayıtlı öğretim üyelerinin için rapor alabildiği bir platformdur.</h6></p>
	                </div>
	            </div>
			</div>
		<div class="modal fade" id="ogrenci-giris" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="loginmodal-container">
						<h1>Öğrenci Girişi</h1><br>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="ogrencigiris"  method="post">
						<input class="form-control" type="text" name="ogrenci_no" placeholder="Öğrenci No: b131306021 gibi" pattern="[BbGgUu](?:1[3-9]|[2-9][0-9])13\d{5}" maxlength="10" required>
						<input class="form-control" type="password" name="sifre" placeholder="Şifre" required maxlength="14">
						<input type="submit" name="ogrencigiris" class="login loginmodal-submit" value="Giriş">
						</form>
						<div class="login-help">
						<a href='#' data-dismiss="modal" data-toggle="modal" data-target="#ogrenci-kayit">Kayıt Ol</a> - <a href='#' data-dismiss="modal" data-toggle="modal" data-target="#ogrenci-unuttum">Şifremi Unuttum</a>
					  </div>
				</div>
			</div>
		 </div>
		 <div class="modal fade" id="ogrenci-unuttum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	 <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Öğrenci - Şifremi Unuttum</h1><br>
				  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="ogrenciunuttum" method="post">
					<input class="form-control" type="text" name="ogrenci_no" placeholder="Öğrenci No: b131306021 gibi" pattern="[BbGgUu](?:1[3-9]|[2-9][0-9])13\d{5}" maxlength="10" required>
					<input type="submit" name="ogrenciunuttum" class="login loginmodal-submit" value="Devam Et">
				  </form>
				</div>
			</div>
		 </div>
		 <div class="modal fade" id="akademik-giris" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="loginmodal-container">
						<h1>Akademik Girişi</h1><br>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="akademikgiris" method="post">
						<input class="form-control" type="text" name="kullaniciadi" placeholder="Kullanıcı Adı" required maxlength="10">
						<input class="form-control" type="password" name="sifre" placeholder="Şifre" required maxlength="14">
						<input type="submit" name="akademikgiris" class="login loginmodal-submit" value="Giriş">
						</form>
						<div class="login-help">
						<a href='#' data-dismiss="modal" data-toggle="modal" data-target="#akademik-unuttum">Şifremi Unuttum</a>
					  </div>
				</div>
			</div>
		  </div>
		<div class="modal fade" id="akademik-unuttum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	 <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Akademik - Şifremi Unuttum</h1><br>
				  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="akademikunuttum" method="post">
					<input class="form-control" type="text" name="kullaniciadi" placeholder="Kullanıcı Adı" required maxlength="10">
					<input type="submit" name="akademikunuttum" class="login loginmodal-submit" value="Devam Et">
				  </form>
				</div>
			</div>
		 </div>
		  <div class="modal fade" id="ogrenci-kayit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Öğrenci Kayıt</h1><br>
				  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="ogrencikayit" method="post">
					<input class="form-control" type="text" name="ogrenci_no" placeholder="Öğrenci No: b131306021 gibi" pattern="[BbGgUu](?:1[3-9]|[2-9][0-9])13\d{5}" maxlength="10" required>
					<input type="submit" name="ogrencikayit" class="login loginmodal-submit" value="Devam Et">
				  </form>
				</div>
			</div>
		  </div>		  
		</div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/materialize.min.js"></script>
				<script>
		$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
		}
	  );
		</script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>
<?php

	include "ayarlar/connection.php";
	include "ayarlar/class.phpmailer.php";
	include "ayarlar/PHPMailerAutoload.php";
	include "ayarlar/class.smtp.php";
	
		$mail = new PHPMailer();
	
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->kullaniciadi = 'ornek@gmail.com';
		$mail->sifre = '******';
		$mail->SetFrom($mail->kullaniciadi, 'Staj Takip Sistemi');
		
		$url = $_SERVER['REQUEST_URI'];
		$parts = explode('/',$url);
		$dir = $_SERVER['SERVER_NAME'];
		for ($i = 0; $i < count($parts) - 1; $i++) {
		 $dir .= $parts[$i] . "/";
		}

	session_start();
	
	/*  Giriş kontrolleri */
	
if ( isset($_POST['akademikgiris']) ){

	$kullaniciadi=strtolower(tr_strtolower($_POST['kullaniciadi']));
	$sifre=md5($_POST['sifre']);

	$sorgu="select * from akademik";
	$dondur=mysqli_query($conn,$sorgu);
	$flag=0;


	while($sonuc=mysqli_fetch_assoc($dondur))

	{
		if($kullaniciadi==$sonuc["kullaniciadi"] && $sifre==$sonuc["sifre"]) {
			$flag=1;
			break;
		}
	}

	if($flag==1)
	{
		$_SESSION['kullaniciadi']=$kullaniciadi;
		header("location:akademik/index.php");
	}
	else
	{
		header("location:index.php?q=2");
	}
	}

if ( isset($_POST['ogrencigiris']) ){

	$ogrenci_no=strtolower($_POST['ogrenci_no']);
	$sifre=md5($_POST['sifre']);

	$sorgu="select ogrenci_no, sifre from ogrenci_bilgileri";
	$dondur=mysqli_query($conn,$sorgu);
	$flag=0;


	while($sonuc=mysqli_fetch_assoc($dondur))

	{
		if($ogrenci_no==$sonuc["ogrenci_no"] && $sifre==$sonuc["sifre"]) {
			$flag=1;
			break;
		}
	}

	if($flag==1)
	{
		$_SESSION['ogrenci_no']=$ogrenci_no;
		header("location:ogrenci/index.php");
	}
	else
	{
		header("location:index.php?q=2");
	}
	}


if ( isset($_POST['ogrencikayit'])){

	$ogrenci_no=strtolower($_POST["ogrenci_no"]);

	$sorgu1="SELECT ogrenci_no FROM aktivasyon";
	$dondur1=mysqli_query($conn,$sorgu1);
	$sorgu2="SELECT ogrenci_no FROM ogrenci_bilgileri";
	$dondur2=mysqli_query($conn,$sorgu2);
	$flag=0;

	while($sonuc=mysqli_fetch_assoc($dondur1))

	{
		if($ogrenci_no==$sonuc["ogrenci_no"]) {
			$flag=1;
			break;
		}
	}
	while($sonuc=mysqli_fetch_assoc($dondur2))

	{
		if($ogrenci_no==$sonuc["ogrenci_no"]) {
			$flag=1;
			break;
		}
	}

	if($flag==1)
		
		header("location:index.php?q=3");

	else
	{	
		$rasgele = rand(0,9999999);
		$aktivasyon= $rasgele.$ogrenci_no;
		$kod = md5($aktivasyon);
		
		$mail->AddAddress($ogrenci_no.'@sakarya.edu.tr',$ogrenci_no);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Stajyer Öğrenci Kaydı';
		$content = 'Merhaba, stajyer öğrenci üyeliğinizi aktifleştirmek için Aktivasyon Kodunuz: '.$kod.'<br/><br/><br/>Kayıt formu linki için <a href="'.$dir.'ogrenci/aktivasyon.php?kod='.$kod.'&ogrenci_no='.$ogrenci_no.'" target="_blank">tıklayın</a>';
		$mail->MsgHTML($content);
		
		
			mysqli_query($conn,"insert into aktivasyon(ogrenci_no,aktivasyon_kodu) values ('".$ogrenci_no."','".$kod."')");
		
		if($mail->send())
			header("location:ogrenci/aktivasyon.php?ogrenci_no=".$ogrenci_no);
		else
			echo $mail->ErrorInfo;
	}
	}

if ( isset($_POST['ogrenciunuttum'])){

	$ogrenci_no=strtolower($_POST["ogrenci_no"]);

	$sorgu3="SELECT * FROM ogrenci_bilgileri where ogrenci_no='".$ogrenci_no."'";
	$dondur3=mysqli_query($conn,$sorgu3);
	$sonuc3=mysqli_fetch_assoc($dondur3);
	
	if(!isset($sonuc3["ogrenci_no"])) 
		
		header("location:index.php?q=7");
	
		$email=$sonuc3["email"];
		$fistname=$sonuc3["isim"];
		$soyisim=$sonuc3["soyisim"];
		$rasgele = rand(0,9999999);
		$aktivasyon= $rasgele.$ogrenci_no;
		$kod = md5($aktivasyon);
		
		$mail->AddAddress($email);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Stajyer Öğrenci - Şifremi Unuttum';
		$content = 'Merhaba '.$isim.' '.$soyisim.', öğrenci kaydınızı tekrar aktifleştirmek için linkiniz '.$dir.'ogrenci/unuttum.php?kod='.$kod.'&ogrenci_no='.$ogrenci_no.'<br/><br/><br/><a href="'.$dir.'ogrenci/unuttum.php?kod='.$kod.'&ogrenci_no='.$ogrenci_no.'" target="_blank">tıklayınız</a>';
		$mail->MsgHTML($content);
		
		mysqli_query($conn,"insert into aktivasyon(ogrenci_no,aktivasyon_kodu) values ('".$ogrenci_no."','".$kod."')");
		
		if($mail->send())
			header("location:index.php?q=6");
		else
			echo $mail->ErrorInfo;
	}
if ( isset($_POST['akademikunuttum'])){

	$kullaniciadi=strtolower(tr_strtolower($_POST["kullaniciadi"]));

	$sorgu4="SELECT * FROM akademik where kullaniciadi='".$kullaniciadi."'";
	$dondur4=mysqli_query($conn,$sorgu4);
	$sonuc4=mysqli_fetch_assoc($dondur4);
		
		if(!isset($sonuc4["kullaniciadi"]))
		header("location:index.php?q=7");
	
		$email=$sonuc4["email"];
		$fistname=$sonuc4["isim"];
		$soyisim=$sonuc4["soyisim"];
		$rasgele = rand(0,9999999);
		$aktivasyon= $rasgele.$kullaniciadi;
		$kod = md5($aktivasyon);
		
		$mail->AddAddress($email);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Mezun Takip Sistemi Yönetimi - Şifremi Unuttum';
		$content = 'Merhaba '.$isim.' '.$soyisim.', üyeliğinizi tekrar aktifleştirmek için linkiniz '.$dir.'akademik/unuttum.php?kod='.$kod.'&kullaniciadi='.$kullaniciadi.'<br/><br/><br/><a href="'.$dir.'akademik/unuttum.php?kod='.$kod.'&kullaniciadi='.$ogrenci_no.'" target="_blank">tıklayınız</a>';
		$mail->MsgHTML($content);
		
		$sorgu2="update akademik set sifre='$kod' where kullaniciadi='$kullaniciadi'";
				mysqli_query($conn, $sorgu2);
		
		if($mail->send())
			header("location:index.php?q=6");
		else
			echo $mail->ErrorInfo;
	}
	
?>
</html>