<?php ob_start();?>
<!DOCTYPE html>
<?php
session_start(); /* Kullanıcı Kontrolü */
if(!isset($_SESSION['ogrenci_no']))
header("location:../index.php?q=4");
else
	include "../ayarlar/connection.php";
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
		<!-- cdn for modernizr, if you haven't included it already -->
		<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
		<!-- polyfiller file to detect and load polyfills -->
		<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
		<script>
		  webshims.setOptions('waitReady', false);
		  webshims.setOptions('forms-ext', {types: 'date'});
		  webshims.polyfill('forms forms-ext');
		</script>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#sirket_adi").autocomplete({
				source: function(query, response) {
					$.ajax({
						url: "isletme.php",
						dataType: "json",
						data: {
							searchPhrase: query.term
							},
							success: function(result) {
							response(result);
							}
						});
												}
										});
			$("#staj_birimi").autocomplete({
				source: function(query, response) {
					$.ajax({
						url: "birim.php",
						dataType: "json",
						data: {
							searchPhrase: query.term
							},
							success: function(result) {
							response(result);
							}
						});
												}
										});
									});
		</script>
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
			<li><a class="headerlink" href="rapor.php"><i class="fa fa-print" aria-hidden="true"></i> Çıktı Al</a></li>
				<?
					$sorgu="select * from staj_degerlendirme where ogrenci_no='".$_SESSION['ogrenci_no']."'";
					$dondur=mysqli_query($conn,$sorgu);
					$say=1;
					if(mysqli_num_rows($dondur)!=1) { $say=0;
				?>
			<li><a class="headerlink" href="puanla.php"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Staj Değerlendirmesi Yap</a></li>
				<? } else { $say=1; ?>
			<li><a class="headerlink" href="guncelle.php"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Staj Değerlendirmesi Güncelle</a></li>
				<? } ?>
			<li><a class="dropdown-button headerlink" href="#!" data-activates="dropdown1">Hesap Yönetimi <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a></li>
			<ul id="dropdown1" class="dropdown-content">
			<li><a class="headerlink" href="ogrenci.php">Kişisel Bilgilerimi Güncelle</a></li>
			<li class="divider"></li>
			<li><a class="headerlink" href="staj.php">Staj Bilgilerimi Güncelle</a></li>
			</ul>
			<li><a class="headerlink" href="cikis.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Çıkış Yap</a></li>
		</ul>
		<ul id="slide-out" class="side-nav">
			<li><img src="../assets/img/mobile.png"></li>
			<li class="no-padding">
			<ul class="collapsible collapsible-accordion">
			<li><a href="index.php" class="headerlink">Anasayfa <i class="fa fa-home fa-2x" aria-hidden="true"></i></a></li>
					<? if($say==1) { ?>
					<li><a class="headerlink" href="puanla.php"><i class="fa fa-calendar-check-o fa-2x" aria-hidden="true"></i> Değerlendirmeyi Güncelle</a></li>
					<? } else { ?>
					<li><a class="headerlink" href="puanla.php"><i class="fa fa-calendar-check-o fa-2x" aria-hidden="true"></i> Staj Değerlendirmesi Yap</a></li>
					<? } ?>
					<li>
							<a class="headerlink collapsible-header">Hesap Yönetimi <i class="fa fa-chevron-circle-down fa-2x" aria-hidden="true"></i></a>
							<div class="collapsible-body">
							<ul>
							<li><a class="headerlink" href="ogrenci.php">Kişisel Bilgilerimi Güncelle</a></li>
							<li class="divider"></li>
							<li><a class="headerlink" href="staj.php">Staj Bilgilerimi Güncelle</a></li>
							</ul>
							</div>
					</li>
			<li class="divider"></li>
			<li><a class="headerlink" href="cikis.php">Çıkış Yap <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a></li>
				</ul>
			</li>
		</ul>
	<a href="#" data-activates="slide-out" class="button-collapse headerlink"><i class="fa fa-bars fa-3x" aria-hidden="true"></i></a>
	</div>
</nav>