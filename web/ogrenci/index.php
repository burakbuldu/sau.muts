<?php ob_start();?>
<!DOCTYPE html>
<?php
include "header.php";
$ogrenci_no=$_SESSION['ogrenci_no'];  /* Giriş yapan öğrencinin bilgilerini veritabanından çekme */

    $sorgu1 = "select * from ogrenci_bilgileri where ogrenci_no='".$ogrenci_no."'";
    $dondur1 = mysqli_query($conn, $sorgu1);
	$sonuc1 = mysqli_fetch_assoc($dondur1);
	
    $sorgu2 = "select * from staj_bilgileri where ogrenci_no='".$ogrenci_no."'";
    $dondur2 = mysqli_query($conn, $sorgu2);
	$sonuc2 = mysqli_fetch_assoc($dondur2);
	
    $sorgu3 = "select * from staj_birimleri where ogrenci_no='".$ogrenci_no."'";
    $dondur3 = mysqli_query($conn, $sorgu3);
	$sonuc3 = mysqli_fetch_assoc($dondur3);
	
	$sorgu4 = "select * from sirket_bilgileri where sirket_adi='".$sonuc3["sirket_adi"]."'";
    $dondur4 = mysqli_query($conn, $sorgu4);
	$sonuc4 = mysqli_fetch_assoc($dondur4);
	
	$sorgu5 = "select * from staj_birimleri where sirket_adi='".$sonuc3["sirket_adi"]."' and NOT (ogrenci_no='".$ogrenci_no."')";
	$dondur5 = mysqli_query($conn,$sorgu5);
	
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
	if(isset($_REQUEST['q'])) {
		if($_REQUEST['q'] == 1)
			echo "Bilgileriniz güncellendi, kontrol edebilirsiniz!";
		if($_REQUEST['q'] == 2)
			echo "Bir sorun oluştu veya bilgileriniz güncellenemedi!";
		if($_REQUEST['q'] == 3)
			echo "Hatalı istek!"; }?>
						</p>
					</div>
	            </div>
				<div class="row">
					<div class="col-xs-12">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#ogrencibilgilerim"><i class="fa fa-user" aria-hidden="true"></i> Öğrenci Bilgilerim</a></h6>
								</div>
							<div id="ogrencibilgilerim" class="panel-collapse collapse in">
								<div class="panel-body">
									<div class="well well-sm well-primary">
									<h6 class="col-xs-12">Kişisel Bilgilerim</h6>
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
											<div class="col-xs-4"><b><? echo strtolower($sonuc1["email"]); ?></b></div>
										 </div>
										<div class="row">
											<div class="col-xs-2">Cinsiyet</div>
											<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc1["cinsiyet"])); ?></b></div>
											<div class="col-xs-2">Telefon:</div>
											<div class="col-xs-4"><b>+90 <? echo $sonuc1["telefon"]; ?></b></div>
										</div>
									</div>
									<div class="well well-sm well-primary">
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
			<div class="row">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#stajbilgilerim"><i class="fa fa-briefcase" aria-hidden="true"></i> Mesleki Uygulama Bilgilerim</a></h6>
						</div>
						<div id="stajbilgilerim" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="well well-sm well-primary">
								<h6 class="col-xs-12">Mesleki Uygulama Bilgilerim</h6>
									<div class="row">
										<div class="col-xs-2">Staj Yapılan Departman:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc2["staj_birimi"])); ?></b></div>
										<div class="col-xs-2">Staj Başlama Tarihi:</div>
										<div class="col-xs-4"><b><? echo date_tr('j F Y', $sonuc2["staj_baslama"]); ?></b></div>
									</div>
									<div class="row">
										<div class="col-xs-2"></div>
										<div class="col-xs-4"></div>
										<div class="col-xs-2">Staj Bitiş Tarihi:</div>
										<div class="col-xs-4"><b><? echo date_tr('j F Y', $sonuc2["staj_bitis"]); ?></b></div>
									</div>
								</div>
								<div class="well well-sm well-primary">
								<h6 class="col-xs-12">İşyeri Staj Sorumlusu Bilgileri</h6>
									<div class="row">
										<div class="col-xs-2">Adı Soyadı:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc3["kontakt_adi"]." ".$sonuc3["kontakt_soyadi"])); ?></b></div>
										<div class="col-xs-2">Email Adresi:</div>
										<div class="col-xs-4"><b><a class="text-muted" href="mailto:<? echo strtolower($sonuc3["kontakt_email"]); ?>" title="<? echo strtoupper(tr_strtoupper($sonuc3["kontakt_adi"]." ".$sonuc3["kontakt_soyadi"])); ?>"><? echo strtolower($sonuc3["kontakt_email"]); ?></a></b></div>
									</div>
									<div class="row">
										<div class="col-xs-2">Pozisyonu / Ünvanı:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc3["kontakt_unvan"])); ?></b></div>
										<div class="col-xs-2">Telefonu:</div>
										<div class="col-xs-4"><b>+90 <? echo $sonuc3["kontakt_tel"]; ?></b></div>
									</div>
								</div>
								<div class="well well-sm well-primary">
								<h6 class="col-xs-12">Şirket Bilgileri</h6>
									<div class="row">
										<div class="col-xs-2">Şirket Adı:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc3["sirket_adi"])); ?></b></div>
										<div class="col-xs-2">Şehir:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc4["sehir"])); ?></b></div>
									</div>
									<div class="row">
										<div class="col-xs-2">Websitesi:</div>
										<div class="col-xs-4"><b><a class="text-muted" href="//<? echo $sonuc4["website"]; ?>" title="<? echo strtolower($sonuc4["sirket_adi"]); ?>" target="_blank"><? echo strtolower($sonuc4["website"]); ?></a></b></div>
										<div class="col-xs-2">Adres:</div>
										<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc4["adres"])); ?></b></div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<? if(mysqli_num_rows($dondur5)>=1) {
					?>
				<div class="row">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#digerstajyerler"><i class="fa fa-users" aria-hidden="true"></i> İşletmedeki Diğer Stajyerler</a></h6>
						</div>
						<div id="digerstajyerler" class="panel-collapse collapse">
							<div class="panel-body">
							
							<? while($sonuc5=mysqli_fetch_assoc($dondur5)) {
								
								$sorgu6="select * from staj_bilgileri where ogrenci_no='".$sonuc5["ogrenci_no"]."'";
								$dondur6=mysqli_query($conn,$sorgu6);
								$sonuc6=mysqli_fetch_assoc($dondur6);
								
								$sorgu7="select * from ogrenci_bilgileri where ogrenci_no='".$sonuc5["ogrenci_no"]."'";
								$dondur7=mysqli_query($conn,$sorgu7);
								$sonuc7=mysqli_fetch_assoc($dondur7);
								
								$sorgu8="select * from staj_degerlendirme where ogrenci_no='".$sonuc5["ogrenci_no"]."'";
								$dondur8=mysqli_query($conn,$sorgu8);
								$sonuc8=mysqli_fetch_assoc($dondur8);

							?>
							
									<div class="well well-sm well-primary">
									<h6 class="col-xs-12"><b><? echo strtoupper(tr_strtoupper($sonuc7["isim"]." ".$sonuc7["soyisim"])); ?></b></h6>
										<div class="row">
											<div class="col-xs-2">Email Adresi:</div>
											<div class="col-xs-4"><b><a class="text-muted" href="mailto:<? echo strtolower($sonuc7["email"]); ?>" title="<? echo strtoupper(tr_strtoupper($sonuc7["isim"]." ".$sonuc7["soyisim"])); ?>"><? echo strtolower($sonuc7["email"]); ?></a></b></div>
											<div class="col-xs-2">Bölüm Adı:</div>
											<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc7["bolum"])); ?></b></div>
										</div>
										<div class="row">
											<div class="col-xs-2">Telefon:</div>
											<div class="col-xs-4"><b>+90 <? echo $sonuc7["telefon"]; ?></b></div>
											<div class="col-xs-2">Staj Denetmeni:</div>
											<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc7["denetmen_adi"]." ".$sonuc7["denetmen_soyadi"])); ?></b></div>
										</div>
										<hr style="border-top: 2px dashed #8c8b8b;">
										<div class="row">
											<div class="col-xs-2">Staj Dönemi:</div>
											<div class="col-xs-4"><b><? echo date_tr('Y',$sonuc6["staj_baslama"]); ?></b></div>
											<div class="col-xs-2">Staj Birimi:</div>
											<div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc6["staj_birimi"])); ?></b></div>
										</div>
										<hr style="border-top: 2px dashed #8c8b8b;">
										<div class="row">
											<div class="col-xs-3">Ort. Değerlendirme Notu: <span title="<? echo round(($sonuc8["toplam_puan"]/3),2); ?>"><? star($sonuc8["toplam_puan"]); ?></span></div>
											<div class="col-xs-9">Staj Yorumu: <b><? echo $sonuc8["staj_yorumu"]; ?></b></div>
										</div>
									</div>
							
							<? } ?>
							
								</div>
							</div>
						</div>
					</div>
				</div>
				<?  }
						$sorgu7 = "select * from staj_degerlendirme where ogrenci_no='".$ogrenci_no."'";
						$dondur7 = mysqli_query($conn, $sorgu7);
																											/* Değerlendirme kontrolü */
						if(mysqli_num_rows($dondur7)>0) {
									
							$sonuc7 = mysqli_fetch_assoc($dondur7);
							
							$ise_devam;
							if($sonuc7["ise_devam"]==1) $ise_devam="Hayır";
							if($sonuc7["ise_devam"]==2) $ise_devam="Evet";
							
					?>
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#stajdegerlendirme"><i class="fa fa-briefcase" aria-hidden="true"></i> Mesleki Uygulama Değerlendirme Sonuçlarım</a> </h6>
					  </div>
					  <div id="stajdegerlendirme" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="well well-sm well-primary">
									<div class="row">
										<h6 class="col-xs-12"><b>Değerlendirme Puanları</b></h6>
									</div>
									<div class="row">
										<div class="col-xs-3">İşletme Puanım: <b><span title="<? echo $sonuc7["isletme_puani"]; ?>"><? star($sonuc7["isletme_puani"]*3); ?></span></b></div>
										<div class="col-xs-3">Departman Puanım: <b><span title="<? echo $sonuc7["birim_puani"]; ?>"><? star($sonuc7["birim_puani"]*3); ?></span></b></div>
										<div class="col-xs-3">Staj Puanım: <b><span title="<? echo $sonuc7["staj_puani"]; ?>"><? star($sonuc7["staj_puani"]*3); ?></span></b></div>
										<div class="col-xs-3">İşe Devam Durumum: <b><? echo $ise_devam; ?></b></div>
									</div>
									<hr style="border-top: 0.5px solid #8c8b8b;">
									<div class="row">
										<div class="col-xs-12">Staj Değerlendirmelerim ve Yorumum: <b><? echo $sonuc7["staj_yorumu"]; ?></b></div>
									</div>
								</div>
							</div>
						</div>
					</div><? } ?>
			</div>
		</div>
<? include "footer.php"; mysqli_close($conn); ?>

</body>
</html>
