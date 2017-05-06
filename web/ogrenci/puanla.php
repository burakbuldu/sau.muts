<?php ob_start();?>
<!DOCTYPE html>
<?php
include "header.php";

$ogrenci_no=$_SESSION['ogrenci_no'];

$sorgu1="select * from staj_degerlendirme where ogrenci_no='".$ogrenci_no."'";
$dondur1=mysqli_query($conn,$sorgu1);
$sonuc=mysqli_fetch_assoc($dondur1);

if(mysqli_num_rows($dondur1)>0) header("location:index.php?q=3");
?>
        
        <!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Staj Değerlendirmesi</h3>
	                    <p>Staj sonunda değerlendirmenizi yapabilirsiniz.<br/>Yapmış olduğunuz değerlendirme sonucunuz sadece size, şirketinizde staj yapan ve yapacak olan diğer stajyerlere ve öğretim üyelerine görünmektedir.<br/>
						Sonraki dönemlerde staj yapmış olduğunuz işletmede staj yapacak olan öğrencilere ve işletmeye stajyer göndermek isteyen öğretim üyelerine yorumlarınız ve değerlendirmeleriniz ile yardımcı olmanız için hazırlanmıştır:</p>
	                </div>
	            </div>
				<hr>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                    <form role="form" method="post" class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	            			<fieldset data-toggle="validator">
									<div class="form-group">
										<label for="denetmen_soyadi"><h6>1-) Gelecek dönemlerde başka öğrencilerin de staj yapmasını tavsiye ederim:</h6></label><br>
										<label class="radio-inline"><input type="radio" name="staj_puani" value="1">Kesinlikle Katılmıyorum</label>
										<label class="radio-inline"><input type="radio" name="staj_puani" value="2">Katılmıyorum</label>
										<label class="radio-inline"><input type="radio" name="staj_puani" value="3" required>Kararsızım</label>
										<label class="radio-inline"><input type="radio" name="staj_puani" value="4">Katılıyorum</label>
										<label class="radio-inline"><input type="radio" name="staj_puani" value="5">Kesinlikle Katılıyorum</label>
									</div>
									<br/>
									<div class="form-group">
										<label for="denetmen_soyadi"><h6>2-) Çevremdekilere staj yaptığım birimlerde/departmanlarda çalışmayı tavsiye ederim:</h6></label><br>
										<label class="radio-inline"><input type="radio" name="birim_puani" value="1">Kesinlikle Katılmıyorum</label>
										<label class="radio-inline"><input type="radio" name="birim_puani" value="2">Katılmıyorum</label>
										<label class="radio-inline"><input type="radio" name="birim_puani" value="3" required>Kararsızım</label>
										<label class="radio-inline"><input type="radio" name="birim_puani" value="4">Katılıyorum</label>
										<label class="radio-inline"><input type="radio" name="birim_puani" value="5">Kesinlikle Katılıyorum</label>
									</div>
									<br/>
									<div class="form-group">
										<label for="denetmen_soyadi"><h6>3-) Staj yaptığım işletmede çalışmak isterim ve çevremdekilere işletmeyi tavsiye ederim:</h6></label><br>
										<label class="radio-inline"><input type="radio" name="isletme_puani" value="1">Kesinlikle Katılmıyorum</label>
										<label class="radio-inline"><input type="radio" name="isletme_puani" value="2">Katılmıyorum</label>
										<label class="radio-inline"><input type="radio" name="isletme_puani" value="3" required>Kararsızım</label>
										<label class="radio-inline"><input type="radio" name="isletme_puani" value="4">Katılıyorum</label>
										<label class="radio-inline"><input type="radio" name="isletme_puani" value="5">Kesinlikle Katılıyorum</label>
									</div><br>
									<div class="form-group">
									<label for="ise_devam"><h6>4-) Staj sonunda işletmede çalışmaya devam ediyor musunuz?:</h6></label>
				                    <select class="form-control" name="ise_devam" style="width:100px; height:30px;">
										<option value="1" selected>Hayır</option>
										<option value="2">Evet</option>
									</select>
									</div>
									<div class="form-group">
									<label for="staj_yorumu"><h6>Genel değerlendirme:</h6></label><br>
				                    <textarea name="staj_yorumu" class="form-control" id="staj_yorumu" maxlength="500" placeholder="Staj hakkındaki genel yorumlarınızı, tavsiyelerinizı ve düşüncelerinizi buradan paylaşabilirsiniz."></textarea>
									</div>
								<div class="center">
	            				<button type="submit" class="btn">Gönder</button>
								</div>
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
$staj_puani=$_POST['staj_puani'];
$birim_puani=$_POST['birim_puani'];
$isletme_puani=$_POST['isletme_puani'];
$staj_yorumu=strtolower(tr_strtolower($_POST['staj_yorumu']));
$toplam_puan=$staj_puani+$birim_puani+$isletme_puani;
$ise_devam=$_POST['ise_devam'];

$sorgu2="insert into staj_degerlendirme values('','$ogrenci_no','$isletme_puani','$birim_puani','$staj_puani','$toplam_puan','$ise_devam','$staj_yorumu')";
$flag=2;
if(mysqli_query($conn,$sorgu2))
$flag=1;
else $flag=2;
mysqli_close($conn);
header("location:index.php?q=$flag");
}
?>
    </body>
</html>
