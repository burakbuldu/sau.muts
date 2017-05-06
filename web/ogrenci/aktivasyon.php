<?php ob_start();?>
<!DOCTYPE html>
<?php
	include "../ayarlar/connection.php";
	if(!isset($_REQUEST['ogrenci_no'])) header("location:../index.php?q=4");
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
	                <div class="col-sm-12 description-title">
	                    <h2>Öğrenci Kayıt Formu</h2>
						<div class="col-sm-12 description-text">
	                    <p>
						<?	if(!isset($_REQUEST['kod'])) echo "Aktivasyon kodunuz Üniversite Öğrenci E-Mail Adresinize gönderilmiştir!<br/>Lütfen kontrol ediniz!"; ?>
						</p>
						</div>
	                </div>
	            </div>
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <p>Sisteme kayıt olmak için aşağıdaki adımları izleyiniz:</p>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                    
	                    <form role="form" method="post" class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	                    	
	                    	<fieldset data-toggle="validator">
	            				<h6>Hesap Bilgileri <span class="step">(Adım 1 / 5)</span></h6>
	            				<div class="form-group">
				                    <label for="ogrenci_no">Öğrenci Numaranız:</label><br>
									<? if (isset($_REQUEST['ogrenci_no'])) { ?>
				                    <input type="text" name="ogrenci_no" class="form-control" id="ogrenci_no" value="<?php echo $_REQUEST['ogrenci_no']; ?>" readonly>
									<? } else  { ?>
									<input type="text" name="ogrenci_no" pattern="[b,B,g,G,u,U]{1}[0-9]{9}" maxlength="10" class="form-control" id="ogrenci_no" required>
									<div class="help-block with-errors" style="color:white;"></div>
									<? } ?>
				                </div>
								<div class="form-group">
				                    <label for="aktivasyon_kodu">Aktivasyon Kodunuz:</label><br>
									<? if (isset($_REQUEST['kod'])) { ?>
				                    <input type="text" name="aktivasyon_kodu" class="form-control" id="aktivasyon_kodu" value="<?php echo $_REQUEST['kod']; ?>" readonly>
									<? } else  { ?>
									<input type="text" name="aktivasyon_kodu" pattern="[0-9a-fA-F]{32}" class="form-control" maxlength="32" "id="aktivasyon_kodu" required>
									<div class="help-block with-errors" style="color:white;"></div>
									<? } ?>
				                </div>
				                <div class="form-group">
				                    <label for="email">Emailiniz:</label><br>
				                    <input type="email" name="email" class="form-control" placeholder="ornek@email.com" id="email" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="email2">Tekrar Emailiniz:</label><br>
				                    <input type="email" name="email2" class="form-control" id="email2" placeholder="ornek@email.com" data-match="#email" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="sifre">Şifreniz:</label><br>
				                    <input type="password" name="sifre" class="form-control" id="sifre"  placeholder="6-14 karakter arası" data-minlength="6" maxlength="14" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="sifre2">Tekrar Şifreniz:</label><br>
				                    <input type="password" name="sifre2" class="form-control" id="sifre2" placeholder="Tekrar şifreniz" data-minlength="6" maxlength="14" data-match="#sifre" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-next">İleri <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset data-toggle="validator">
	            				<h6>Kişisel Bilgiler <span class="step">(Adım 2 / 5)</span></h6>
	            				<div class="form-group">
				                    <label for="isim">Adınız:</label><br>
				                    <input type="text" name="isim" class="form-control" id="isim" maxlength="20" placeholder="Adınız" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="soyisim">Soyadınız:</label><br>
				                    <input type="text" name="soyisim" class="form-control" id="soyisim" maxlength="20" placeholder="Soyadınız" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="birth-date">Doğum Tarihi(Gün/Ay/Yıl):</label><br>
				                    <input type="date" name="dogum_tarihi" id="myDate" min="1980-01-01" max="<? echo date('Y-m-d'); ?>" class="birth-date form-control" id="birth-date" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="telefon">Telefon:</label><br>
									<input type="text" class="doubleinput" value="+90" readonly>
				                    <input type="tel" name="telefon" class="doubleinput2" placeholder="2121234567 ya da 532123456" pattern="[2-5]{1}[0-9]{9}" maxlength="10" id="telefon" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
								<div class="form-group">
				                    <label for="cinsiyet">Cinsiyet:</label><br>
				                    <select class="form-control" name="cinsiyet">
                                    <option selected="selected">Erkek</option>
                                    <option>Kadın</option>
									</select>
				                </div>
				                <div class="form-group">
				                    <label for="memleket">Memleket:</label><br>
				                    <select class="form-control" name="memleket">
										<option value="Yurtdışı">Yurtdışı</option>
										<option value="Adana">Adana</option>
										<option value="Adıyaman">Adıyaman</option>
										<option value="Afyonkarahisar">Afyonkarahisar</option>
										<option value="Ağrı">Ağrı</option>
										<option value="Amasya">Amasya</option>
										<option value="Ankara">Ankara</option>
										<option value="Antalya">Antalya</option>
										<option value="Artvin">Artvin</option>
										<option value="Aydın">Aydın</option>
										<option value="Balıkesir">Balıkesir</option>
										<option value="Bilecik">Bilecik</option>
										<option value="Bingöl">Bingöl</option>
										<option value="Bitlis">Bitlis</option>
										<option value="Bolu">Bolu</option>
										<option value="Burdur">Burdur</option>
										<option value="Bursa">Bursa</option>
										<option value="Çanakkale">Çanakkale</option>
										<option value="Çankırı">Çankırı</option>
										<option value="Çorum">Çorum</option>
										<option value="Denizli">Denizli</option>
										<option value="Diyarbakır">Diyarbakır</option>
										<option value="Edirne">Edirne</option>
										<option value="Elazığ">Elazığ</option>
										<option value="Erzincan">Erzincan</option>
										<option value="Erzurum">Erzurum</option>
										<option value="Eskişehir">Eskişehir</option>
										<option value="Gaziantep">Gaziantep</option>
										<option value="Giresun">Giresun</option>
										<option value="Gümüşhane">Gümüşhane</option>
										<option value="Hakkari">Hakkari</option>
										<option value="Hatay">Hatay</option>
										<option value="Isparta">Isparta</option>
										<option value="Mersin">Mersin</option>
										<option value="İstanbul">İstanbul</option>
										<option value="İzmir">İzmir</option>
										<option value="Kars">Kars</option>
										<option value="Kastamonu">Kastamonu</option>
										<option value="Kayseri">Kayseri</option>
										<option value="Kırklareli">Kırklareli</option>
										<option value="Kırşehir">Kırşehir</option>
										<option value="Kocaeli">Kocaeli</option>
										<option value="Konya">Konya</option>
										<option value="Kütahya">Kütahya</option>
										<option value="Malatya">Malatya</option>
										<option value="Manisa">Manisa</option>
										<option value="Kahramanmaraş">Kahramanmaraş</option>
										<option value="Mardin">Mardin</option>
										<option value="Muğla">Muğla</option>
										<option value="Muş">Muş</option>
										<option value="Nevşehir">Nevşehir</option>
										<option value="Niğde">Niğde</option>
										<option value="Ordu">Ordu</option>
										<option value="Rize">Rize</option>
										<option value="Sakarya" selected>Sakarya</option>
										<option value="Samsun">Samsun</option>
										<option value="Siirt">Siirt</option>
										<option value="Sinop">Sinop</option>
										<option value="Sivas">Sivas</option>
										<option value="Tekirdağ">Tekirdağ</option>
										<option value="Tokat">Tokat</option>
										<option value="Trabzon">Trabzon</option>
										<option value="Tunceli">Tunceli</option>
										<option value="Şanlıurfa">Şanlıurfa</option>
										<option value="Uşak">Uşak</option>
										<option value="Van">Van</option>
										<option value="Yozgat">Yozgat</option>
										<option value="Zonguldak">Zonguldak</option>
										<option value="Aksaray">Aksaray</option>
										<option value="Bayburt">Bayburt</option>
										<option value="Karaman">Karaman</option>
										<option value="Kırıkkale">Kırıkkale</option>
										<option value="Batman">Batman</option>
										<option value="Şırnak">Şırnak</option>
										<option value="Bartın">Bartın</option>
										<option value="Ardahan">Ardahan</option>
										<option value="Iğdır">Iğdır</option>
										<option value="Yalova">Yalova</option>
										<option value="Karabük">Karabük</option>
										<option value="Kilis">Kilis</option>
										<option value="Osmaniye">Osmaniye</option>
										<option value="Düzce">Düzce</option>
									</select>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Geri</button>
	            				<button type="button" class="btn btn-next">İleri <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset data-toggle="validator">
	            				<h6>Üniversite Staj Bilgilerim <span class="step">(Adım 3 / 5)</span></h6>
				                <div class="form-group">
				                    <label for="bolum">Bölümüm:</label><br>
				                    <select class="form-control" name="bolum">
										<option value="İnsan Kaynakları Yönetimi">İnsan Kaynakları Yönetimi</option>
										<option value="İşletme">İşletme</option>
										<option value="Sağlık Yönetimi">Sağlık Yönetimi</option>
										<option value="Uluslararası Ticaret">Uluslararası Ticaret</option>
										<option value="Yönetim Bilişim Sistemleri" selected>Yönetim Bilişim Sistemleri</option>
									</select>
				                </div>
				                <div class="form-group">
				                    <label for="denetmen_adi">Mesleki Uygulama Denetmeni Adı:</label><br>
				                    <input type="text" name="denetmen_adi" class="form-control" id="denetmen_adi" maxlength="20" placeholder="Staj denetmeni hocanızın Adı"  required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
								<div class="form-group">
				                    <label for="denetmen_soyadi">Mesleki Uygulama Denetmeni Soyadı:</label><br>
				                    <input type="text" name="denetmen_soyadi" class="form-control" id="denetmen_soyadi" maxlength="20" placeholder="Staj denetmeni hocanızın Soyadı"  required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
								<div class="form-group">
				                    <label for="staj_baslama">Staja Başlama Tarihi(Gün/Ay/Yıl):</label><br>
				                    <input type="date" name="staj_baslama" id="staj_baslama" class="form-control"  onblur="compare();" id="staj_baslama" required>
									<script>
									var today = new Date();
									var dd = today.getDate();
									var mm = today.getMonth()+1; //January is 0!
									var yyyy = today.getFullYear();
									 if(dd<10){
											dd='0'+dd
										} 
										if(mm<10){
											mm='0'+mm
										} 

									today = yyyy+'-'+mm+'-'+dd;
									document.getElementById("staj_baslama").setAttribute("value", today);
									
									function compare()
									{
										var startDt = document.getElementById("staj_baslama").value;
										var endDt = document.getElementById("staj_bitis").value;

										if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
										{
											document.getElementById("mydate2").innerHTML = "Bitiş tarihi, başlama tarihinden daha küçük bir tarih olamaz!";
											document.getElementById("butonum").classList.add('hidden');
											document.getElementById("mydate2").classList.remove('hidden');
										}
										else
										{	
											document.getElementById("mydate2").classList.add('hidden');
											document.getElementById("butonum").classList.remove('hidden');
										}
									}
									</script>
									<div class="help-block with-errors" id="mydate2"style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="staj_bitis">Staj Bitiş Tarihi(Gün/Ay/Yıl):</label><br>
				                    <input type="date" name="staj_bitis" class="form-control" id="staj_bitis" onblur="compare();" required>
									<script>
									function compare()
									{
										var startDt = document.getElementById("staj_baslama").value;
										var endDt = document.getElementById("staj_bitis").value;

										if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
										{
											document.getElementById("mydate").innerHTML = "Bitiş tarihi, başlama tarihinden daha küçük bir tarih olamaz!";
											document.getElementById("butonum").classList.add('hidden');
											document.getElementById("mydate").classList.remove('hidden');
										}
										else
										{	
											document.getElementById("mydate").classList.add('hidden');
											document.getElementById("butonum").classList.remove('hidden');
										}
									}
									</script>
									<div class="help-block with-errors" id="mydate" style="color:white;"></div>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Geri</button>
	            				<button type="button" id="butonum" class="btn btn-next">İleri <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
							
							<fieldset data-toggle="validator">
	            				<h6>İş Yeri Bilgileri <span class="step">(Adım 4 / 5)</span></h6>
								<div class="form-group">
				                    <label for="sirket_adi">İş Yeri Adı:</label><br>
				                    <input type="text" name="sirket_adi" class="form-control" id="sirket_adi" maxlength="40" placeholder="Staj yaptığınız işletme" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
								<div class="form-group">
				                    <label for="staj_birimi">Staj Yapılan Departman / Birim:</label><br>
				                    <input type="text" name="staj_birimi" class="form-control" id="staj_birimi" maxlength="20" placeholder="Staj yaptığınız departman" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="website">Şirket Websitesi:</label><br>
				                    <input type="text" name="website" class="form-control" id="website" maxlength="63" placeholder="www.ornek.com.tr" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="sehir">Şehir:</label><br>
				                    <select class="form-control" name="sehir">
										<option value="Yurtdışı">Yurtdışı</option>
										<option value="Adana">Adana</option>
										<option value="Adıyaman">Adıyaman</option>
										<option value="Afyonkarahisar">Afyonkarahisar</option>
										<option value="Ağrı">Ağrı</option>
										<option value="Amasya">Amasya</option>
										<option value="Ankara">Ankara</option>
										<option value="Antalya">Antalya</option>
										<option value="Artvin">Artvin</option>
										<option value="Aydın">Aydın</option>
										<option value="Balıkesir">Balıkesir</option>
										<option value="Bilecik">Bilecik</option>
										<option value="Bingöl">Bingöl</option>
										<option value="Bitlis">Bitlis</option>
										<option value="Bolu">Bolu</option>
										<option value="Burdur">Burdur</option>
										<option value="Bursa">Bursa</option>
										<option value="Çanakkale">Çanakkale</option>
										<option value="Çankırı">Çankırı</option>
										<option value="Çorum">Çorum</option>
										<option value="Denizli">Denizli</option>
										<option value="Diyarbakır">Diyarbakır</option>
										<option value="Edirne">Edirne</option>
										<option value="Elazığ">Elazığ</option>
										<option value="Erzincan">Erzincan</option>
										<option value="Erzurum">Erzurum</option>
										<option value="Eskişehir">Eskişehir</option>
										<option value="Gaziantep">Gaziantep</option>
										<option value="Giresun">Giresun</option>
										<option value="Gümüşhane">Gümüşhane</option>
										<option value="Hakkari">Hakkari</option>
										<option value="Hatay">Hatay</option>
										<option value="Isparta">Isparta</option>
										<option value="Mersin">Mersin</option>
										<option value="İstanbul">İstanbul</option>
										<option value="İzmir">İzmir</option>
										<option value="Kars">Kars</option>
										<option value="Kastamonu">Kastamonu</option>
										<option value="Kayseri">Kayseri</option>
										<option value="Kırklareli">Kırklareli</option>
										<option value="Kırşehir">Kırşehir</option>
										<option value="Kocaeli">Kocaeli</option>
										<option value="Konya">Konya</option>
										<option value="Kütahya">Kütahya</option>
										<option value="Malatya">Malatya</option>
										<option value="Manisa">Manisa</option>
										<option value="Kahramanmaraş">Kahramanmaraş</option>
										<option value="Mardin">Mardin</option>
										<option value="Muğla">Muğla</option>
										<option value="Muş">Muş</option>
										<option value="Nevşehir">Nevşehir</option>
										<option value="Niğde">Niğde</option>
										<option value="Ordu">Ordu</option>
										<option value="Rize">Rize</option>
										<option value="Sakarya" selected>Sakarya</option>
										<option value="Samsun">Samsun</option>
										<option value="Siirt">Siirt</option>
										<option value="Sinop">Sinop</option>
										<option value="Sivas">Sivas</option>
										<option value="Tekirdağ">Tekirdağ</option>
										<option value="Tokat">Tokat</option>
										<option value="Trabzon">Trabzon</option>
										<option value="Tunceli">Tunceli</option>
										<option value="Şanlıurfa">Şanlıurfa</option>
										<option value="Uşak">Uşak</option>
										<option value="Van">Van</option>
										<option value="Yozgat">Yozgat</option>
										<option value="Zonguldak">Zonguldak</option>
										<option value="Aksaray">Aksaray</option>
										<option value="Bayburt">Bayburt</option>
										<option value="Karaman">Karaman</option>
										<option value="Kırıkkale">Kırıkkale</option>
										<option value="Batman">Batman</option>
										<option value="Şırnak">Şırnak</option>
										<option value="Bartın">Bartın</option>
										<option value="Ardahan">Ardahan</option>
										<option value="Iğdır">Iğdır</option>
										<option value="Yalova">Yalova</option>
										<option value="Karabük">Karabük</option>
										<option value="Kilis">Kilis</option>
										<option value="Osmaniye">Osmaniye</option>
										<option value="Düzce">Düzce</option>
									</select>
				                </div>
				                <div class="form-group">
									<label for="adres">Adres:</label><br>
				                    <textarea name="adres" class="form-control" id="adres" required></textarea>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Geri</button>
	            				<button type="button" class="btn btn-next">İleri <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
							
							<fieldset data-toggle="validator">
	            				<h6>İş Yeri Staj Sorumlusu Bilgileri <span class="step">(Adım 5 / 5)</span></h6>
	            				<div class="form-group">
				                    <label for="kontakt_adi">Adı:</label><br>
				                    <input type="text" name="kontakt_adi" class="form-control" id="kontakt_adi" maxlength="20" placeholder="Sorumlu Adı" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="kontakt_soyadi">Soyadı:</label><br>
				                    <input type="text" name="kontakt_soyadi" class="form-control" id="kontakt_soyadi" maxlength="20" placeholder="Sorumlu Soyadı" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="kontakt_unvan">Pozisyonu / Ünvanı:</label><br>
				                    <input type="text" name="kontakt_unvan" class="form-control" id="kontakt_unvan" maxlength="40" placeholder="İşyerindeki ünvanı" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="telefon">Telefonu:</label><br>
									<input type="text" class="doubleinput" value="+90" readonly>
				                    <input type="tel" name="kontakt_tel" class="doubleinput2" id="telefon"  pattern="[2-5]{1}[0-9]{9}" maxlength="10"  placeholder="5321234567 gibi" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
								<div class="form-group">
				                    <label for="kontakt_email">Email Adresi:</label><br>
				                    <input type="email" name="kontakt_email" class="form-control" id="kontakt_email" placeholder="email@ornek.com.tr" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Geri</button>
	            				<button type="submit" class="btn">Kayıt Ol</button>
	            			</fieldset>
	                    	
	                    </form>
	                    
	                </div>
	            </div>
			</div>
		</div>
                <? include "footer.php";
				
					/*  Aktivasyon kontrolü */
				
if($_POST) {
	$ogrenci_no=strtolower($_POST["ogrenci_no"]);
	$aktivasyon_kodu=$_POST["aktivasyon_kodu"];

	$sorgu="select * from aktivasyon where ogrenci_no='$ogrenci_no'";
	$dondur=mysqli_query($conn,$sorgu);
	$flag=0;

	while($sonuc=mysqli_fetch_assoc($dondur)) {
		if ($ogrenci_no==$sonuc["ogrenci_no"] && $aktivasyon_kodu==$sonuc["aktivasyon_kodu"])
			{
				$sifre=md5($_POST["sifre"]);
				$isim=strtolower(tr_strtolower($_POST["isim"]));
				$soyisim=strtolower(tr_strtolower($_POST["soyisim"]));
				$email=strtolower($_POST["email"]);
				$telefon=$_POST["telefon"];
				$cinsiyet=$_POST["cinsiyet"];
				$memleket=$_POST["memleket"];
				$bolum=$_POST["bolum"];
				$denetmen_adi=strtolower(tr_strtolower($_POST["denetmen_adi"]));
				$denetmen_soyadi=strtolower(tr_strtolower($_POST["denetmen_soyadi"]));
				$dogum_tarihi=$_POST["dogum_tarihi"];

				$sirket_adi=strtolower(tr_strtolower($_POST["sirket_adi"]));
				$staj_baslama=$_POST["staj_baslama"];
				$staj_bitis=$_POST["staj_bitis"];
				$staj_birimi=strtolower(tr_strtolower($_POST["staj_birimi"]));

				$adres=strtolower(tr_strtolower($_POST["adres"]));
				$sehir=$_POST["sehir"];
				$kontakt_adi=strtolower(tr_strtolower($_POST["kontakt_adi"]));
				$kontakt_soyadi=strtolower(tr_strtolower($_POST["kontakt_soyadi"]));
				$kontakt_unvan=strtolower(tr_strtolower($_POST["kontakt_unvan"]));
				$kontakt_tel=$_POST["kontakt_tel"];
				$kontakt_email=strtolower($_POST["kontakt_email"]);
				$website=strtolower($_POST["website"]);

				$sorgu1="delete from aktivasyon where ogrenci_no='$ogrenci_no'";
				mysqli_query($conn, $sorgu1);

				$sorgu2="insert into ogrenci_bilgileri values('','$ogrenci_no','$sifre','$isim','$soyisim','$email','$telefon','$cinsiyet','$memleket','$dogum_tarihi','$bolum','$denetmen_adi','$denetmen_soyadi')";
				mysqli_query($conn, $sorgu2);

				$sorgu3="insert into staj_bilgileri values('','$ogrenci_no','$staj_birimi','$staj_baslama','$staj_bitis')";
				mysqli_query($conn, $sorgu3);
								
				$sorgu4="insert into staj_birimleri values('','$ogrenci_no','$sirket_adi','$staj_birimi','$kontakt_adi','$kontakt_soyadi','$kontakt_unvan','$kontakt_tel','$kontakt_email')";
				mysqli_query($conn, $sorgu4);

				$sorgu5="insert into sirket_bilgileri values('','$sirket_adi','$adres','$sehir','$website','$ogrenci_no')";
				mysqli_query($conn, $sorgu5);
				
				$flag=1; 	/*  başarılı */
				break;
			}
	}
	if($flag==1)
	{
		header("location:../index.php?q=1");
	}
	else
	{
		header("location:../index.php?q=2");
	}
}
?>
    </body>
</html>
