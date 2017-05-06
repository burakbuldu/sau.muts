<?php ob_start();?>
<!DOCTYPE html>
<?php
include "header.php";

 /* Giriş yapan öğrencinin bilgilerini veritabanından çekme */

$ogrenci_no=$_SESSION['ogrenci_no'];
$sorgu1="select * from ogrenci_bilgileri where ogrenci_no='$ogrenci_no'";
$dondur1=mysqli_query($conn,$sorgu1);
$sonuc1=mysqli_fetch_assoc($dondur1);

?>
        
        <!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Öğrenci Bilgilerimi Güncelle</h3>
	                    <p>Bilgilerinizi güncellemek için aşağıdaki adımları izleyiniz:</p>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                    
	                    <form role="form" method="post" class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	                    	
	                    	<fieldset data-toggle="validator">
	            				<h6>Hesap Bilgileri <span class="step">(Adım 1 / 3)</span></h6>
	            				<div class="form-group">
				                    <label for="ogrenci_no">Öğrenci No:</label><br>
				                    <input type="text" name="ogrenci_no" class="form-control" id="ogrenci_no" value="<?php echo $ogrenci_no ?>" readonly>
				                </div>
				                <div class="form-group">
				                    <label for="email">Email:</label><br>
				                    <input type="email" name="email" class="form-control" id="email" value="<?php echo strtolower($sonuc1["email"]); ?>" required>
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
	            				<button type="button" class="btn btn-next">İleri <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset data-toggle="validator">
	            				<h6>Kişisel Bilgiler <span class="step">(Adım 2 / 3)</span></h6>
	            				<div class="form-group">
				                    <label for="isim">Adınız:</label><br>
				                    <input type="text" name="isim" class="form-control" id="isim" value="<?php echo strtoupper(tr_strtoupper($sonuc1["isim"])); ?>" required>
				                </div>
				                <div class="form-group">
				                    <label for="soyisim">Soyadınız:</label><br>
				                    <input type="text" name="soyisim" class="form-control" id="soyisim" value="<?php echo strtoupper(tr_strtoupper($sonuc1["soyisim"])); ?>" required>
				                </div>
				                <div class="form-group">
				                    <label for="birth-date">Doğum Tarihi(Gün/Ay/Yıl):</label><br>
				                    <input type="date" name="dogum_tarihi" class="birth-date form-control" id="birth-date" value="<?php echo $sonuc1["dogum_tarihi"]?>" required>
				                </div>
				                <div class="form-group">
				                    <label for="telefon">Telefon:</label><br>
									<input type="text" class="doubleinput" value="+90" readonly>
				                    <input type="tel" name="telefon" class="doubleinput2" id="telefon" value="<?php echo $sonuc1["telefon"] ?>" required>
				                </div>
								<div class="form-group">
				                    <label for="cinsiyet">Cinsiyet:</label><br>
				                    <select class="form-control" name="cinsiyet">
                                    <?php if($sonuc1["cinsiyet"]=='Erkek')
										echo '<option selected="selected">Erkek</option>
                                    <option>Kadın</option>';
										else
										echo '<option selected="selected">Kadın</option>
                                    <option>Erkek</option>'; ?>
									</select>
				                </div>
				                <div class="form-group">
				                    <label for="memleket">Memleket:</label><br>
				                    <select class="form-control" name="memleket">
										<option value="<?php echo $sonuc1["memleket"]; ?>" selected><?php echo $sonuc1["memleket"]; ?></option>
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
										<option value="Sakarya">Sakarya</option>
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
	            				<h6>Üniversite Staj Bilgilerim <span class="step">(Adım 3 / 3)</span></h6>
				                <div class="form-group">
				                    <label for="denetmen_adi">Mesleki Uygulama Denetmeni Adı:</label><br>
				                    <input type="text" name="denetmen_adi" class="form-control" id="denetmen_adi" value="<?php echo strtoupper(tr_strtoupper($sonuc1["denetmen_adi"])); ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="denetmen_soyadi">Mesleki Uygulama Denetmeni Soyadı:</label><br>
				                    <input type="text" name="denetmen_soyadi" class="form-control" id="denetmen_soyadi" value="<?php echo strtoupper(tr_strtoupper($sonuc1["denetmen_soyadi"])); ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
								<div class="form-group">
				                    <label for="bolum">Bölümüm:</label><br>
				                    <select class="form-control" name="bolum">
										<option value="<?php echo $sonuc1["bolum"]?>" selected><?php echo $sonuc1["bolum"]?></option>
										<option value="İnsan Kaynakları Yönetimi">İnsan Kaynakları Yönetimi</option>
										<option value="İşletme">İşletme</option>
										<option value="Sağlık Yönetimi">Sağlık Yönetimi</option>
										<option value="Uluslararası Ticaret">Uluslararası Ticaret</option>
										<option value="Yönetim Bilişim Sistemleri">Yönetim Bilişim Sistemleri</option>
									</select>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Geri</button>
	            				<button type="submit" class="btn">Güncelle</button>
	            			</fieldset>
	                    	
	                    </form>
	                    
	                </div>
	            </div>
			</div>
		</div>
		

        <? include "footer.php";
		
		 /* Güncellemeleri veritabanına gönderme */
		
if($_POST)
{
$ogrenci_no=strtolower($_POST['ogrenci_no']);
$sifre=md5($_POST['sifre']);
$isim=strtolower(tr_strtolower($_POST['isim']));
$soyisim=strtolower(tr_strtolower($_POST['soyisim']));
$email=strtolower($_POST['email']);
$telefon=$_POST['telefon'];
$cinsiyet=$_POST['cinsiyet'];
$memleket=$_POST['memleket'];
$bolum=$_POST['bolum'];
$denetmen_adi=strtolower(tr_strtolower($_POST['denetmen_adi']));
$denetmen_soyadi=strtolower(tr_strtolower($_POST['denetmen_soyadi']));
$dogum_tarihi=$_POST['dogum_tarihi'];

$sorgu0="update ogrenci_bilgileri set sifre='$sifre' where ogrenci_no='$ogrenci_no'";
$sorgu1="update ogrenci_bilgileri set isim='$isim', soyisim='$soyisim', email='$email', telefon='$telefon', cinsiyet='$cinsiyet', memleket='$memleket', bolum='$bolum', denetmen_adi='$denetmen_adi', denetmen_soyadi='$denetmen_soyadi', dogum_tarihi='$dogum_tarihi' where ogrenci_no='$ogrenci_no'";
$flag=2;
if(mysqli_query($conn,$sorgu0))
$flag=1;
if(mysqli_query($conn,$sorgu1))
$flag=1;
else $flag=2;
mysqli_close($conn);
header("location:index.php?q=$flag");
}
?>
    </body>
</html>
