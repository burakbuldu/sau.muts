<?php ob_start();?>
<!DOCTYPE html>
<?php
$kullaniciadi=$_SESSION['kullaniciadi'];
include "header.php";
include "../ayarlar/connection.php";
$ogrenci_no=$_REQUEST['ogrenci'];

/* Giriş yapan kullanıcı bilgilerinin ve öğrenci isteğinin kontrolü */

$sorgu="select * from ogrenci_bilgileri where ogrenci_no='$ogrenci_no'";
$dondur=mysqli_query($conn,$sorgu);
$sonuc=mysqli_fetch_assoc($dondur);
?>
        
        <!-- Description -->
		<div class="description-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 description-title">
	                    <h2>Mesleki Uygulama Takip Sistemi</h2>
	                </div>
					<div class="col-sm-12 description-text">
	                    <p>
<?php
	if(!isset($sonuc["ogrenci_no"]))
{
    echo "Böyle bir öğrenci yok"; /* öğrenci no kontrolü başarısız ise */
}
else {

/* öğrenci no kontrolü başarılıysa buna göre öğrenci bilgilerinin veritabanından çekilmesi */

    $sorgu1 = "select * from ogrenci_bilgileri where ogrenci_no='".$ogrenci_no."'";
    $dondur1 = mysqli_query($conn, $sorgu1);
	$sonuc1 = mysqli_fetch_assoc($dondur1);
	
    $sorgu3 = "select * from staj_bilgileri where ogrenci_no='".$ogrenci_no."'";
    $dondur3 = mysqli_query($conn, $sorgu3);
	$sonuc3 = mysqli_fetch_assoc($dondur3);
	
    $sorgu4 = "select * from staj_birimleri where ogrenci_no='".$ogrenci_no."'";
    $dondur4 = mysqli_query($conn, $sorgu4);
	$sonuc4 = mysqli_fetch_assoc($dondur4);
	
    $sorgu5 = "select * from sirket_bilgileri where sirket_adi='".$sonuc4["sirket_adi"]."'";
    $dondur5 = mysqli_query($conn, $sorgu5);
	$sonuc5 = mysqli_fetch_assoc($dondur5); ?>
						</p>
						</div>
	            </div>
				<div class="row">
    
				<div class="col-xs-12">

				  <div class="panel-group" id="accordion">
					
					<div class="panel panel-default">
						
					  <div class="panel-heading">
						<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#ogrencibilgileri"><i class="fa fa-user" aria-hidden="true"></i> Öğrenci Bilgileri</a> </h6>
					  </div>
					  <div id="ogrencibilgileri" class="panel-collapse collapse in">
								<div class="panel-body">
									<div class="well well-sm well-primary">
									<h6 class="col-xs-12">Kişisel Bilgileri</h6>
										<div class="row">
											<div class="col-xs-2">Öğrenci No:</div>
											<div class="col-xs-4"><b><? echo $ogrenci_no; ?></b></div>
											<div class="col-xs-2">Doğum Tarihi:</div>
											<div class="col-xs-4"><b><? echo date_tr('j F Y', $sonuc1["dogum_tarihi"]); ?></b></div>
										</div>
										<div class="row">
											<div class="col-xs-2">Adı:</div>
											<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc1["isim"])); ?></b></div>
											<div class="col-xs-2">Memleket:</div>
											<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc1["memleket"])); ?></b></div>
										</div>
										<div class="row">
											<div class="col-xs-2">Soyadı:</div>
											<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc1["soyisim"])); ?></b></div>
											<div class="col-xs-2">Email Adresi:</div>
											<div class="col-xs-4"><b><a class="text-muted" href="mailto:<? echo strtolower($sonuc1["email"]); ?>"><? echo strtolower($sonuc1["email"]); ?></a></b></div>
										 </div>
										<div class="row">
											<div class="col-xs-2">Cinsiyet</div>
											<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc1["cinsiyet"])); ?></b></div>
											<div class="col-xs-2">Telefon:</div>
											<div class="col-xs-4"><b>+90 <? echo $sonuc1["telefon"]; ?></b></div>
										</div>
									</div>
									<div class="well well-sm well-primary">
										<h6 class="col-xs-12">Üniversite Bilgileri</h6>
										<div class="row">
											<div class="col-xs-2">Bölüm Adı:</div>
											<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc1["bolum"])); ?></b></div>
											<div class="col-xs-2">Staj Denetmeni:</div>
											<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc1["denetmen_adi"]." ".$sonuc1["denetmen_soyadi"])); ?></b></div>
										</div>
						  </div>
						</div>
						</div>
						</div>
						</div>
					</div>
					</div>
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#stajbilgileri"><i class="fa fa-briefcase" aria-hidden="true"></i> Mesleki Uygulama Bilgileri</a> </h6>
					  </div>
					  <div id="stajbilgileri" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="well well-sm well-primary">
								<h6 class="col-xs-12">Mesleki Uygulama Bilgileri</h6>
									<div class="row">
										<div class="col-xs-2">Staj Yapılan Departman:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc3["staj_birimi"])); ?></b></div>
										<div class="col-xs-2">Staj Başlama Tarihi:</div>
										<div class="col-xs-4"><b><? echo date_tr('j F Y', $sonuc3["staj_baslama"]); ?></b></div>
									</div>
									<div class="row">
										<div class="col-xs-2"></div>
										<div class="col-xs-4"></div>
										<div class="col-xs-2">Staj Bitiş Tarihi:</div>
										<div class="col-xs-4"><b><? echo date_tr('j F Y', $sonuc3["staj_bitis"]); ?></b></div>
									</div>
								</div>
								<div class="well well-sm well-primary">
								<h6 class="col-xs-12">İşyeri Staj Sorumlusu Bilgileri</h6>
									<div class="row">
										<div class="col-xs-2">Adı Soyadı:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc4["kontakt_adi"]." ".$sonuc4["kontakt_soyadi"])); ?></b></div>
										<div class="col-xs-2">Email Adresi:</div>
										<div class="col-xs-4"><b><a class="text-muted" href="mailto:<? echo strtolower($sonuc4["kontakt_email"]); ?>"><? echo strtolower($sonuc4["kontakt_email"]); ?></a></b></div>
									</div>
									<div class="row">
										<div class="col-xs-2">Pozisyonu / Ünvanı:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc4["kontakt_unvan"])); ?></b></div>
										<div class="col-xs-2">Telefonu:</div>
										<div class="col-xs-4"><b>+90 <? echo $sonuc4["kontakt_tel"]; ?></b></div>
									</div>
								</div>
								<div class="well well-sm well-primary">
								<h6 class="col-xs-12">Şirket Bilgileri</h6>
									<div class="row">
										<div class="col-xs-2">Şirket Adı:</div>
										<div class="col-xs-4"><b><a class="text-muted" href="isletme.php?isletme=<? echo strtoupper(tr_strtoupper($sonuc4["sirket_adi"])); ?>"><? echo strtoupper(tr_strtoupper($sonuc4["sirket_adi"])); ?></a></b></div>
										<div class="col-xs-2">Şehir:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc5["sehir"])); ?></b></div>
									</div>
									<div class="row">
										<div class="col-xs-2">Websitesi:</div>
										<div class="col-xs-4"><b><a class="text-muted" href="//<? echo $sonuc5["website"]; ?>" title="<? echo strtolower($sonuc5["sirket_adi"]); ?>" target="_blank"><? echo strtolower($sonuc5["website"]); ?></a></b></div>
										<div class="col-xs-2">Adres:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc5["adres"])); ?></b></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<? 
						$sorgu6 = "select * from staj_degerlendirme where ogrenci_no='".$ogrenci_no."'";
						$dondur6 = mysqli_query($conn, $sorgu6);
																											/* Değerlendirme kontrolü */
						if(mysqli_num_rows($dondur6)>0) {
									
							$sonuc6 = mysqli_fetch_assoc($dondur6);
							
							$ise_devam;
							if($sonuc6["ise_devam"]==0) $ise_devam="Bilinmiyor";
							if($sonuc6["ise_devam"]==1) $ise_devam="Hayır";
							if($sonuc6["ise_devam"]==2) $ise_devam="Evet";
							
					?>
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#stajdegerlendirme"><i class="fa fa-briefcase" aria-hidden="true"></i> Mesleki Uygulama Değerlendirmesi</a> </h6>
					  </div>
					  <div id="stajdegerlendirme" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="well well-sm well-primary">
									<div class="row">
										<h6 class="col-xs-12"><b>Değerlendirme Puanları</b></h6>
									</div>
									<div class="row">
										<div class="col-xs-3">İşletme Notu: <b><span title="<? echo $sonuc6["isletme_puani"]; ?>"><? star($sonuc6["isletme_puani"]*3); ?></span></b></div>
										<div class="col-xs-3">Birim Notu: <b><span title="<? echo $sonuc6["birim_puani"]; ?>"><? star($sonuc6["birim_puani"]*3); ?></span></b></div>
										<div class="col-xs-3">Staj Notu: <b><span title="<? echo $sonuc6["staj_puani"]; ?>"><? star($sonuc6["staj_puani"]*3); ?></span></b></div>
										<div class="col-xs-3">İşe Devam: <b><? echo $ise_devam; ?></b></div>
									</div>
									<hr style="border-top: 0.5px solid #8c8b8b;">
									<div class="row">
										<div class="col-xs-12">Staj Yorumu: <b><? echo $sonuc6["staj_yorumu"]; ?></b></div>
									</div>
								</div>
							</div>
						</div>
					</div><? } ?>
				</div>
			</div>

<?php }
include "footer.php"; mysqli_close($conn);
?>

    </body>
</html>
