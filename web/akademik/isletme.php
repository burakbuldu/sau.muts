<?php
$kullaniciadi=$_SESSION['kullaniciadi'];
include "header.php";
include "../ayarlar/connection.php";
$isletme=strtolower(tr_strtolower($_REQUEST['isletme']));

/* Giriş bilgileri ve işletme kontrolü */

$sorgu1="select * from sirket_bilgileri where sirket_adi='$isletme'";
$dondur1=mysqli_query($conn,$sorgu1);
$sonuc1=mysqli_fetch_assoc($dondur1);
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
	if(!isset($sonuc1["sirket_adi"]))
{
    echo "Böyle bir işletme yok";
}
else { 
		/* işletmeyi son güncelleyen öğrencinin bilgilerinin alınması */

		$sorgu2="select isim, soyisim from ogrenci_bilgileri where ogrenci_no='".$sonuc1["ogrenci_no"]."'";
		$dondur2=mysqli_query($conn,$sorgu2);
		$sonuc2=mysqli_fetch_assoc($dondur2);
		
		/* işletme bilgilerinin ekrana asılması */
	?>
						</p>
						</div>
	            </div>
				<div class="row">
    
				<div class="col-xs-12">

				  <div class="panel-group" id="accordion">
					
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h6 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#isletmebilgileri"><i class="fa fa-briefcase" aria-hidden="true"></i> <? echo strtoupper(tr_strtoupper($sonuc1["sirket_adi"])); ?></a> 
						
						<? 
						
						$sorgu3="select AVG(toplam_puan) from staj_degerlendirme where ogrenci_no in (select ogrenci_no from staj_birimleri where sirket_adi='".$sonuc1["sirket_adi"]."')";
						$dondur3=mysqli_query($conn,$sorgu3);
						$sonuc3=mysqli_fetch_assoc($dondur3);
						if (is_null($sonuc3["AVG(toplam_puan)"])) {	?>
												<span title="Değerlendirme yapılmamış!">
						<? } else { ?>
						<span title="<? echo round(($sonuc3["AVG(toplam_puan)"]/3),2); ?>/5"><? star($sonuc3["AVG(toplam_puan)"]); } ?></span>
						
						</h6>
					  </div>
					  <div id="isletmebilgileri" class="panel-collapse collapse in">
						<div class="panel-body">
						
						<div class="well well-sm well-primary">
						<h6><b>Şirket Bilgileri</b></h6>
						<div class="row">
						  <div class="col-xs-2">Şirket Adı:</div>
						  <div class="col-xs-2"><b><? echo strtoupper(tr_strtoupper($sonuc1["sirket_adi"])); ?></b></div>
						  <div class="col-xs-3">Son Güncelleyen Öğrenci:</div>
						  <div class="col-xs-5"><b><a class="text-muted" href="ogrenci.php?ogrenci=<? echo $sonuc1["ogrenci_no"]; ?>" title="<? echo strtoupper(tr_strtoupper($sonuc2["isim"]." ".$sonuc2["soyisim"])); ?>"><? echo $sonuc1["ogrenci_no"]; ?></a></b></div>
						</div>
						<div class="row">
						  <div class="col-xs-2">Websitesi:</div>
						  <div class="col-xs-2"><b><a class="text-muted" href="//<? echo $sonuc1["website"]; ?>" title="<? echo strtoupper(tr_strtoupper($sonuc1["sirket_adi"])); ?>" target="_blank"><? echo $sonuc1["website"]; ?></a></b></div>
						  <div class="col-xs-3">Adres:</div>
						  <div class="col-xs-5"><b><? echo strtoupper(tr_strtoupper($sonuc1["adres"]." / ".$sonuc1["sehir"])); ?></b></div>
						</div>
						</div>
						<?
							/* işletmedeki staj yapılan departmanların bilerin ekrana basılması */
						
						    $sorgu4 = "select * from staj_birimleri where sirket_adi='".$sonuc1["sirket_adi"]."'";
							$dondur4 = mysqli_query($conn, $sorgu4);
						while($sonuc4 =mysqli_fetch_assoc($dondur4)) {
							
							?>
						<div class="well well-sm well-primary">
							<h6><b>Departman:</b> <? echo strtoupper(tr_strtoupper($sonuc4["staj_birimi"])); ?></h6>
							<div class="row">
							  <div class="col-xs-2">Adı Soyadı:</div>
							  <div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc4["kontakt_adi"]." ".$sonuc4["kontakt_soyadi"])); ?></b></div>
							  <div class="col-xs-2">Email Adresi:</div>
							  <div class="col-xs-4"><b><a class="text-muted" href="mailto:<? echo strtolower(tr_strtolower($sonuc4["kontakt_email"])); ?>"><? echo strtolower(tr_strtolower($sonuc4["kontakt_email"])); ?></a></b></div>
							</div>
							<div class="row">
							  <div class="col-xs-2">Pozisyonu / Ünvanı:</div>
							  <div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc4["kontakt_unvan"])); ?></b></div>
							  <div class="col-xs-2">Telefonu:</div>
							  <div class="col-xs-4"><b>+90 <? echo $sonuc4["kontakt_tel"]; ?></b></div>
							</div>
						</div> <? } ?>

				</div>
			  </div>
			</div>
			</div>
		
		<div class="row">
    
				<div class="col-xs-12">

				  <div class="panel-group" id="accordion">
					
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#ogrencibilgileri"><i class="fa fa-briefcase" aria-hidden="true"></i> Staj Gören Öğrenci Bilgileri</a> </h6>
					  </div>
					  <div id="ogrencibilgileri" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="well well-sm well-primary">
							<? 		
							
									/* işletmede staj gören öğrencilerin bilgilerinin alınması
									
									en üstteki sorgu işletme bilgilerini son güncelleyen öğrenciyi ekrana basmak içindi.
									
									burası ise işletmede staj gören tüm öğrencilerin tek tek tüm bilgilerini satır bazında yansıtır.
									*/
							
									$sorgu5 = "select * from staj_birimleri where sirket_adi='".$sonuc1["sirket_adi"]."'";
									$dondur5 = mysqli_query($conn, $sorgu5);
									while($sonuc5 = mysqli_fetch_assoc($dondur5)) {
									$sorgu6 = "select * from staj_bilgileri where ogrenci_no='".$sonuc5["ogrenci_no"]."'";
									$dondur6 = mysqli_query($conn, $sorgu6);
									$sonuc6 = mysqli_fetch_assoc($dondur6);
									$sorgu7 = "select * from ogrenci_bilgileri where ogrenci_no='".$sonuc5["ogrenci_no"]."'";
									$dondur7 = mysqli_query($conn, $sorgu7);
									$sonuc7 = mysqli_fetch_assoc($dondur7);
									$sorgu8 = "select * from staj_degerlendirme where ogrenci_no='".$sonuc5["ogrenci_no"]."'";
									$dondur8 = mysqli_query($conn, $sorgu8);
									$sonuc8 = mysqli_fetch_assoc($dondur8);
									$ise_devam;
									if($sonuc8["ise_devam"]==0) $ise_devam="Bilinmiyor";
									if($sonuc8["ise_devam"]==1) $ise_devam="Hayır";
									if($sonuc8["ise_devam"]==2) $ise_devam="Evet";
							?>
							<div class="row">
								<div class="col-xs-2">
								<h6><b><? echo strtoupper(tr_strtoupper($sonuc7["isim"]." ".$sonuc7["soyisim"])); ?></b></div>
								<div class="col-xs-2"><span title="<? echo round(($sonuc8["toplam_puan"]/3),2); ?>"><? star($sonuc8["toplam_puan"]); ?></span></h6>
								</div>
							</div>
							<div class="row">
							<div class="col-xs-12">
							<hr style="border-top: 0.5px solid #8c8b8b; margin:0px" width="25%">
							</div>
							</div>
							<div class="row">
								  <div class="col-xs-3">Öğrenci No:</div>
								  <div class="col-xs-4"><b><a class="text-muted" href="ogrenci.php?ogrenci=<? echo $sonuc5["ogrenci_no"]; ?>" title="<? echo strtoupper(tr_strtoupper($sonuc7["isim"]." ".$sonuc7["soyisim"])); ?>"><? echo $sonuc5["ogrenci_no"]; ?></a></b></div>
								  <div class="col-xs-3">İşletme Notu:</div>
								  <div class="col-xs-2"><b><span title="<? echo $sonuc8["isletme_puani"]; ?>"><? star($sonuc8["isletme_puani"]*3); ?></span></b></div>
								  <div class="col-xs-3">Bölümü / Staj Denetmeni:</div>
								  <div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc7["bolum"])); ?> / <? echo strtoupper(tr_strtoupper($sonuc7["denetmen_adi"]." ".$sonuc7["denetmen_soyadi"])); ?></b></div>
								  <div class="col-xs-3">Staj Notu:</div>
								  <div class="col-xs-2"><b><span title="<? echo $sonuc8["staj_puani"]; ?>"><? star($sonuc8["staj_puani"]*3); ?></span></b></div>
							</div>
							<div class="row">
								  <div class="col-xs-3">Staj Yapılan Departman:</div>
								  <div class="col-xs-4"><b><? echo strtoupper(tr_strtoupper($sonuc6["staj_birimi"])); ?></b></div>
								  <div class="col-xs-3">Birim Notu:</div>
								  <div class="col-xs-2"><b><span title="<? echo $sonuc8["birim_puani"]; ?>"><? star($sonuc8["birim_puani"]*3); ?></span></b></div>
								  <div class="col-xs-3">Çalıştığı Tarih:</div>
								  <div class="col-xs-4"><b><? echo date_tr('j F Y', $sonuc6["staj_baslama"]); ?> - <? echo date_tr('j F Y', $sonuc6["staj_bitis"]); ?></b></div>
								  <div class="col-xs-3">İşe Devam:</div>
								  <div class="col-xs-2"><b><? echo $ise_devam; ?></b></div>
							</div>
							<div class="row">
								<div class="col-xs-3">Staj Değerlendirmesi:</div>
								<div class="col-xs-9"><b><? echo $sonuc8["staj_yorumu"]; ?></b></div>
							</div> <? } ?>
						</div>

				</div>
			  </div>
			</div>
			</div>
		</div>
		</div><? } 
include "footer.php"; mysqli_close($conn);
?>

    </body>
</html>
