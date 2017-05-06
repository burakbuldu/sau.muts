<?php ob_start();?>
<!DOCTYPE html>
<?php

/* Giriş yapan personel kontrolü */

$kullaniciadi=$_SESSION['kullaniciadi'];
include "header.php";
include "../ayarlar/connection.php";
?>
        
        <!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Yeni Akademik Hesap Oluştur</h3>
	                    <p>Aşağıdaki formu doldurunuz:</p>
	                </div>
						<div class="col-sm-12 description-text">
	                    <p>
<?php
	if(isset($_REQUEST['q'])) {
		if($_REQUEST['q'] == 1)
			echo "Bu kullanıcı adı daha önce kaydedilmiş!"; } ?>
						</p>
						</div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                    
	                    <form role="form" method="post" class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	                    	
	                    	<fieldset data-toggle="validator">
	            				<h6>Hesap Bilgilerim</h6>
	            				<div class="form-group">
				                    <label for="kullaniciadi">Kullanıcı Adı:</label><br>
				                    <input type="text" name="kullaniciadi" class="form-control" id="kullaniciadi" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="email">Email Adresi:</label><br>
				                    <input type="email" name="email" class="form-control" id="email" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="sifre">Şifresi:</label><br>
				                    <input type="password" name="sifre" class="form-control" id="sifre" data-minlength="6" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
				                <div class="form-group">
				                    <label for="sifre2">Tekrar Şifresi:</label><br>
				                    <input type="password" name="sifre2" class="form-control" id="sifre2" data-minlength="6" data-match="#sifre" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
								<div class="form-group">
				                    <label for="isim">Personel Adı:</label><br>
				                    <input type="text" name="isim" class="form-control" id="isim" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
								<div class="form-group">
				                    <label for="soyisim">Personel Soyadı:</label><br>
				                    <input type="text" name="soyisim" class="form-control" id="soyisim" required>
									<div class="help-block with-errors" style="color:white;"></div>
				                </div>
	            				<br>
	            				<button type="submit" class="btn">Oluştur</button>
	            			</fieldset>
	            				                    	
	                    </form>
	                    
	                </div>
	            </div>
			</div>
		</div>
		

        <?php
include "footer.php";

/* Yeni personel bilgilerini veritabanına gönderme */

if($_POST)
{
$kullaniciadi=strtolower(tr_strtolower($_POST['kullaniciadi']));
$isim=strtolower(tr_strtolower($_POST['isim']));
$soyisim=strtolower(tr_strtolower($_POST['soyisim']));
$email=strtolower(tr_strtolower($_POST['email']));
$sifre=md5($_POST['sifre']);

$sorgu="select * from akademik where kullaniciadi='$kullaniciadi'";
$dondur=mysqli_query($conn,$sorgu);

if(mysqli_num_rows($dondur)>0)
{
    header("location:yenihesap.php?q=1"); /* Benzer kayıt oluştuysa */
}
else {
	
	/* Yeni kayıt verilerini veritabanına gönderme */
    $sorgu = "insert into akademik values('','$kullaniciadi','$sifre','$isim','$soyisim','$email')";
    mysqli_query($conn, $sorgu); mysqli_close($conn);
    header("location:personel.php?q=1");
}
}
?>
    </body>
</html>
