<?php ob_start();?>
<!DOCTYPE html>
<?php

/* kullanıcı girişi kontrolü */

include "header.php";
include "../ayarlar/connection.php";

/* sistem toplam kayıtlarının çekilmesi */

$sorgu1="select * from ogrenci_bilgileri";
$dondur1=mysqli_query($conn,$sorgu1);
$ogrenci=mysqli_num_rows($dondur1);

$sorgu2="select * from sirket_bilgileri";
$dondur2=mysqli_query($conn,$sorgu2);
$isletme=mysqli_num_rows($dondur2);
?>
        
         <!-- Description -->
		<div class="description-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-xs-12 description-title">
	                    <h2>Mesleki Uygulama Takip Sistemi</h2>
	                </div>
					<div class="col-xs-12 description-text">
	                    <p>
<?php
	if(isset($_REQUEST['q'])) {
		if($_REQUEST['q'] == 1)
			echo "Bilgileriniz güncellendi, kontrol edebilirsiniz!"; }
		echo "Sistemde şu anda kayıtlı <b>".$isletme."</b> işletme ve <b>".$ogrenci."</b> öğrenci bulunmaktadır.";
		?>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title"><i class="fa fa-users" aria-hidden="true"></i> Son Kaydolan Öğrenciler</h6>
							</div>
							<div class="panel-collapse collapse in">
								<div class="panel-body">
									<div class="well well-sm well-primary">
										<div class="row">
										<div class="col-xs-4"><b># Öğrenci Numarası:</div><div class="col-xs-4">Adı Soyadı:</div><div class="col-xs-4">Bölümü:</b></div>
										<hr style="border:1px dashed #8c8b8b;" width="95%">
										<?
										$sorgu3="SELECT * FROM ogrenci_bilgileri ORDER BY id DESC LIMIT 5";
										$dondur3=mysqli_query($conn,$sorgu3);
										$say=1;
										while($sonuc3=mysqli_fetch_assoc($dondur3))
										{
										?>
										<div class="col-xs-4"><? echo $say?>-) <b><a class="text-muted" href="ogrenci.php?ogrenci=<? echo $sonuc3["ogrenci_no"]; ?>" title="<? echo strtoupper(tr_strtoupper($sonuc3["isim"]." ".$sonuc3["soyisim"])); ?>">
										<? echo $sonuc3["ogrenci_no"]; ?></a></b></div><div class="col-xs-4"><? echo strtoupper(tr_strtoupper($sonuc3["isim"]." ".$sonuc3["soyisim"])); ?></div><div class="col-xs-4"><? echo $sonuc3["bolum"]; ?></div>
										<? $say++; } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title"><i class="fa fa-building" aria-hidden="true"></i> İşletme Kayıtları</h6>
							</div>
							<div class="panel-collapse collapse in">
								<div class="panel-body">
									<div class="well well-sm well-primary">
										<div class="row">
										<div class="col-xs-12"><b> Son Kaydedilen İşletme:</b></div>
										<?
										$sorgu3="SELECT * FROM sirket_bilgileri ORDER BY id DESC LIMIT 1";
										$dondur3=mysqli_query($conn,$sorgu3);
										$sonuc3=mysqli_fetch_assoc($dondur3);
										?>
										<div class="col-xs-4"><b>Adı:</b> <b><a class="text-muted" href="isletme.php?isletme=<? echo strtoupper(tr_strtoupper($sonuc3["sirket_adi"])); ?>" title="<? echo strtoupper(tr_strtoupper($sonuc3["sirket_adi"])); ?>">
										<? echo strtoupper(tr_strtoupper($sonuc3["sirket_adi"])); ?></a></b></div><div class="col-xs-5"><b>Adres: </b><? echo strtoupper(tr_strtoupper($sonuc3["adres"])); ?></div>
										<div class="col-xs-2 right"><b>Şehir: </b><? echo strtoupper(tr_strtoupper($sonuc3["sehir"])); ?></div>
										<hr style="border:1px dashed #8c8b8b;" width="95%">
										<div class="col-xs-6"><b> En Yüksek Değerlendirme Puanına Göre İşletmeler:</b></div>
										<div class="col-xs-6"><b> En Düşük Değerlendirme Puanına Göre İşletmeler:</b></div>
										<div class="col-xs-6">
										<?
										$sorgu4="SELECT staj_birimleri.sirket_adi as sirket_adi, AVG(staj_degerlendirme.toplam_puan) as toplampuan from staj_birimleri inner join staj_degerlendirme on staj_birimleri.ogrenci_no=staj_degerlendirme.ogrenci_no GROUP by staj_birimleri.sirket_adi ORDER BY AVG(staj_degerlendirme.toplam_puan) DESC LIMIT 5";
										$dondur4=mysqli_query($conn,$sorgu4);
										$say=1;
										while($sonuc4=mysqli_fetch_assoc($dondur4)) { ?>
										<div><? echo $say; ?>-)
											<b><a class="text-muted" href="isletme.php?isletme=<? echo strtoupper(tr_strtoupper($sonuc4["sirket_adi"])); ?>" title="<? echo strtoupper(tr_strtoupper($sonuc4["sirket_adi"])); ?>">
										<? echo strtoupper(tr_strtoupper($sonuc4["sirket_adi"])); ?></a></b>
											<span class="right" title="<? echo round(($sonuc4["toplampuan"]/3),2); ?>/5">
											<? 	star($sonuc4["toplampuan"]); ?></span>
										</div><? $say++; } ?></div><div class="col-xs-6">
										<?
										$sorgu5="SELECT staj_birimleri.sirket_adi as sirket_adi, AVG(staj_degerlendirme.toplam_puan) as toplampuan from staj_birimleri inner join staj_degerlendirme on staj_birimleri.ogrenci_no=staj_degerlendirme.ogrenci_no GROUP by staj_birimleri.sirket_adi ORDER BY AVG(staj_degerlendirme.toplam_puan) ASC LIMIT 5";
										$dondur5=mysqli_query($conn,$sorgu5);
										$say=1;
										while($sonuc5=mysqli_fetch_assoc($dondur5)) { ?>
										<div><? echo $say; ?>-) <b><a class="text-muted" href="isletme.php?isletme=<? echo strtoupper(tr_strtoupper($sonuc5["sirket_adi"])); ?>" title="<? echo strtoupper(tr_strtoupper($sonuc5["sirket_adi"])); ?>">
										<? echo strtoupper(tr_strtoupper($sonuc5["sirket_adi"])); ?></a></b>
											<span class="right" title="<? echo round(($sonuc5["toplampuan"]/3),2) ?>/5">
											<?	star($sonuc5["toplampuan"]); ?></span>
										</div><? $say++; } ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
	
	<?
		include "footer.php";
	  mysqli_close($conn);
?>

    </body>
</html>
