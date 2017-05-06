<?php ob_start();?>
<!DOCTYPE html>
<?php

/* dönem bilgisine göre dönem butonu oluşturma */

session_start();
if(!isset($_SESSION['kullaniciadi']))
header("location:../index.php?q=4"); /* giriş başarısız ise */
else
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
		<ul class="left hide-on-med-and-down">
			<li><a href="index.php" class="headerlink"><img src="../assets/img/logo.png"></a></li>
			<li><a href="index.php" class="headerlink">Anasayfa <i class="fa fa-home" aria-hidden="true"></i></a></li>
		</ul>
		<ul class="right hide-on-med-and-down">
			<li>
				<form role="form" method="get" class="form-inline" action="arama.php">
					<input type="text" name="ara" class="doubleinput2" id="arama" placeholder="Arama">
				</form>
			</li>
			<li><a class="dropdown-button headerlink" href="#!" data-activates="dropdown1">Sistem Yönetimi <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a></li>
			<ul id="dropdown1" class="dropdown-content">
				<li><a href="ogrenciler.php" class="headerlink">Öğrencileri Göster</a></li>
				<li class="divider"></li>
				<li><a href="isletmeler.php" class="headerlink">İşletmeleri Göster</a></li>
			</ul>
			<li><a class="dropdown-button headerlink" href="#!" data-activates="dropdown2">Hesap Yönetimi <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a></li>
			<ul id="dropdown2" class="dropdown-content">
				<li><a href="guncelle.php" class="headerlink">Hesap Bilgilerimi Güncelle</a></li>
				<li class="divider"></li>
				<li><a href="yenihesap.php" class="headerlink">Yeni Personel Ekle</a></li>
				<li class="divider"></li>
				<li><a href="personel.php" class="headerlink">Kayıtlı Personeli Göster</a></li>
			</ul>
			<li><a href="cikis.php" class="headerlink"><i class="fa fa-sign-out" aria-hidden="true"></i> Çıkış Yap</a></li>
		</ul>
		<ul id="slide-out" class="side-nav">
			<li><img src="../assets/img/mobile.png"></li>
			<li class="no-padding">
			<li><a href="index.php" class="headerlink">Anasayfa <i class="fa fa-home fa-2x" aria-hidden="true"></i></a></li>
			<li class="divider"></li>
			<li>
				<form role="form" method="get" class="form-inline" action="arama.php">
				<input type="text" name="ara" class="doubleinput2" id="arama" placeholder="Arama">
				</form>
			</li>
			<li class="divider"></li>
			<ul class="collapsible collapsible-accordion">
			  <li>
				<a class="collapsible-header headerlink">Sistem Yönetimi <i class="fa fa-chevron-circle-down fa-2x" aria-hidden="true"></i></a>
				<div class="collapsible-body">
				  <ul>
				  <li><a href="ogrenciler.php" class="headerlink">Öğrencileri Göster</a></li>
				  <li class="divider"></li>
				  <li><a href="isletmeler.php" class="headerlink">İşletmeleri Göster</a></li>
				  </ul>
				</div>
			  </li>
			</ul>
		  </li>
		  <li class="divider"></li>
		  <li class="no-padding">
			<ul class="collapsible collapsible-accordion">
			  <li>
				<a class="collapsible-header headerlink">Hesap Yönetimi <i class="fa fa-chevron-circle-down fa-2x" aria-hidden="true"></i></a>
				<div class="collapsible-body">
				  <ul>
				  <li><a href="guncelle.php" class="headerlink">Hesap Bilgilerimi Güncelle</a></li>
				  <li class="divider"></li>
				  <li><a href="yenihesap.php" class="headerlink">Yeni Personel Ekle</a></li>
				  <li class="divider"></li>
				  <li><a href="personel.php" class="headerlink">Kayıtlı Personeli Göster</a></li>
				  </ul>
				</div>
			  </li>
			</ul>
		  </li>
		  <li class="divider"></li>
		  <li><a href="cikis.php" class="headerlink">Çıkış Yap <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse headerlink"><i class="fa fa-bars fa-3x" aria-hidden="true"></i></a>
    </div>
  </nav>