<?php ob_start();?>
<!DOCTYPE html>
<?php
include "header.php";

/* Giriş yapan öğrencilerin bilgilerini veritabanından çekme */

$ogrenci_no=$_SESSION['ogrenci_no'];
$sorgu1="select * from staj_bilgileri where ogrenci_no='$ogrenci_no'";
$dondur1=mysqli_query($conn,$sorgu1);
$sonuc1=mysqli_fetch_assoc($dondur1);

$sorgu2="select * from staj_birimleri where ogrenci_no='$ogrenci_no'";
$dondur2=mysqli_query($conn,$sorgu2);
$sonuc2=mysqli_fetch_assoc($dondur2);

$sorgu3="select * from sirket_bilgileri where sirket_adi='".$sonuc2["sirket_adi"]."'";
$dondur3=mysqli_query($conn,$sorgu3);
$sonuc3=mysqli_fetch_assoc($dondur3);

?>
        
        <!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Mesleki Uygulama ve İş Yeri Bilgilerimi Güncelle</h3>
	                    <p>Bilgilerinizi güncellemek için aşağıdaki adımları izleyiniz:</p>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                    
	                    <form role="form" action="" method="post" class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	                    	
	                    	<fieldset data-toggle="validator">
	            				<h6>Mesleki Uygulama Bilgileri <span class="step">(Adım 1 / 3)</span></h6>
	            				<div class="form-group">
				                    <label for="sirket_adi">İş Yeri Adı:</label><br>
				                    <input type="text" name="sirket_adi" class="form-control" id="sirket_adi" value="<?php echo strtoupper(tr_strtoupper($sonuc2["sirket_adi"])); ?>" readonly>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="staj_birimi">Staj Yapılan Departman / Birim:</label><br>
				                    <input type="text" name="staj_birimi" class="form-control" id="staj_birimi" value="<?php echo strtoupper(tr_strtoupper($sonuc1["staj_birimi"])); ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="staj_baslama">Staja Başlama Tarihi(Gün/Ay/Yıl):</label><br>
				                    <input type="date" name="staj_baslama" class="form-control" id="staj_baslama" value="<?php echo $sonuc1["staj_baslama"]; ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="staj_bitis">Staj Bitiş Tarihi(Gün/Ay/Yıl):</label><br>
				                    <input type="date" name="staj_bitis" class="form-control" id="staj_bitis" value="<?php echo $sonuc1["staj_bitis"]; ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-next">İleri <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset data-toggle="validator">
	            				<h6>İş Yeri Staj Sorumlusu Bilgileri <span class="step">(Adım 2 / 3)</span></h6>
	            				<div class="form-group">
				                    <label for="kontakt_adi">Adı:</label><br>
				                    <input type="text" name="kontakt_adi" class="form-control" id="kontakt_adi" value="<?php echo strtoupper(tr_strtoupper($sonuc2["kontakt_adi"])); ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="kontakt_soyadi">Soyadı:</label><br>
				                    <input type="text" name="kontakt_soyadi" class="form-control" id="kontakt_soyadi" value="<?php echo strtoupper(tr_strtoupper($sonuc2["kontakt_soyadi"])); ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="kontakt_unvan">Pozisyonu / Ünvanı:</label><br>
				                    <input type="text" name="kontakt_unvan" class="form-control" id="kontakt_unvan" value="<?php echo strtoupper(tr_strtoupper($sonuc2["kontakt_unvan"])); ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="telefon">Telefonu:</label><br>
									<input type="text" class="doubleinput" value="+90" readonly>
				                    <input type="tel" name="kontakt_tel" class="doubleinput2" id="telefon" pattern="[2-5]{1}[0-9]{9}" value="<?php echo $sonuc2["kontakt_tel"]; ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
								<div class="form-group">
				                    <label for="kontakt_email">Email Adresi:</label><br>
				                    <input type="email" name="kontakt_email" class="form-control" id="kontakt_email" value="<?php echo $sonuc2["kontakt_email"]; ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Geri</button>
	            				<button type="button" class="btn btn-next">İleri <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset data-toggle="validator">
	            				<h6>Şirket Bilgileri <span class="step">(Adım 3 / 3)</span></h6>
				                <div class="form-group">
				                    <label for="website">Şirket Websitesi:</label><br>
				                    <input type="text" name="website" class="form-control" id="website" value="<?php echo $sonuc3["website"]; ?>" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="sehir">Şehir:</label><br>
				                    <select class="form-control" name="sehir">
										<option value="<?php echo $sonuc3["sehir"]; ?>" selected><?php echo $sonuc3["sehir"]; ?></option>
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
				                <div class="form-group">
									<label for="adres">Adres:</label><br>
				                    <textarea name="adres" class="form-control" id="adres" required><?php echo strtoupper(tr_strtoupper($sonuc3["adres"])); ?></textarea>
									<div class="help-block with-errors" style="color:white;"></div>
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
				
				/* Güncellenen bilgileri veritabanına gönderme */
if($_POST)
{
$ogrenci_no=$_SESSION['ogrenci_no'];
$sirket_adi=strtoupper(tr_strtoupper($_POST['sirket_adi']));
$staj_baslama=$_POST['staj_baslama'];
$staj_bitis=$_POST['staj_bitis'];
$staj_birimi=strtolower(tr_strtolower($_POST['staj_birimi']));
$adres=strtolower(tr_strtoupper($_POST['adres']));
$sehir=$_POST['sehir'];
$kontakt_adi=strtolower(tr_strtolower($_POST['kontakt_adi']));
$kontakt_soyadi=strtolower(tr_strtolower($_POST['kontakt_soyadi']));
$kontakt_unvan=strtolower(tr_strtolower($_POST['kontakt_unvan']));
$kontakt_tel=$_POST['kontakt_tel'];
$kontakt_email=strtolower($_POST['kontakt_email']);
$website=strtolower($_POST['website']);

$sorgu0="update sirket_bilgileri set ogrenci_no='$ogrenci_no',adres='$adres',sehir='$sehir',website='$website' where sirket_adi='$sirket_adi'";
$sorgu1="update staj_birimleri set staj_birimi='$staj_birimi',kontakt_adi='$kontakt_adi',kontakt_soyadi='$kontakt_soyadi',kontakt_unvan='$kontakt_unvan',kontakt_tel='$kontakt_tel',kontakt_email='$kontakt_email' where ogrenci_no='$ogrenci_no'";
$sorgu2="update staj_bilgileri set staj_birimi='$staj_birimi',staj_baslama='$staj_baslama',staj_bitis='$staj_bitis' where ogrenci_no='$ogrenci_no'";

if(mysqli_query($conn,$sorgu0))
$flag=1;
if(mysqli_query($conn,$sorgu1))
$flag=1;
if(mysqli_query($conn,$sorgu2))
$flag=1;
else $flag=2;
header("location:index.php?q=$flag");
}
?>
    </body>
</html>
