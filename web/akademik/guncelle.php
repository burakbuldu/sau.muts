<?php ob_start();?>
<!DOCTYPE html>
<?php
include "header.php";
include "../ayarlar/connection.php";

/* giriş kontrolü başarılıysa giriş yapan kişinin bilgilerinin veritabanından çekilmesi */

$sorgu="select * from akademik where kullaniciadi='".$_SESSION['kullaniciadi']."'";
$dondur=mysqli_query($conn,$sorgu);
$sonuc=mysqli_fetch_assoc($dondur);
?>
        
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
				                    <input type="text" name="kullaniciadi" class="form-control" id="kullaniciadi" value="<?php echo $sonuc["kullaniciadi"]; ?>" readonly>
				                </div>
				                <div class="form-group">
				                    <label for="email">Email:</label><br>
				                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $sonuc["email"]; ?>" required>
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
								<div class="form-group">
				                    <label for="isim">Adınız:</label><br>
				                    <input type="text" name="isim" class="form-control" id="isim" value="<?php echo strtoupper(tr_strtoupper($sonuc["isim"])); ?>" required>
				                </div>
								<div class="form-group">
				                    <label for="soyisim">Soyadınız:</label><br>
				                    <input type="text" name="soyisim" class="form-control" id="soyisim" value="<?php echo strtoupper(tr_strtoupper($sonuc["soyisim"])); ?>" required>
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

/* Güncellenen bilgilerin veritabanına gönderilmesi */

if($_POST)
{
$kullaniciadi=strtolower(tr_strtolower($_POST['kullaniciadi']));
$isim=strtolower(tr_strtolower($_POST['isim']));
$soyisim=strtolower(tr_strtolower($_POST['soyisim']));
$email=strtolower(tr_strtolower($_POST['email']));
$sifre=md5($_POST['sifre']);

$sorgu="update akademik set isim='$isim',soyisim='$soyisim',email='$email',sifre='$sifre' where kullaniciadi='$kullaniciadi'";

mysqli_query($conn, $sorgu);
mysqli_close($conn);
header("location:index.php?q=1");
}
?>
    </body>
</html>
