<?php ob_start();?>
<!DOCTYPE html>
<?php
$kullaniciadi=$_SESSION['kullaniciadi'];
$year=$_GET['donem'];
include "header.php";

/* giriş bilgilerinin ve dönem bilgisi kontrolü */

if($year=="")
$year=date("Y");
?>
        
        <!-- Description -->
		<div class="description-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-md-12 description-title">
	                    <h2>Mesleki Uygulama Takip Sistemi</h2>
				
					<?
					
					/* dönem bilgisine göre dönem butonu oluşturma */
					
					include "../ayarlar/connection.php";
					
					?>
					<div class="row">
					<form role="form" method="get" class="form-inline" action="<? echo $_SERVER['PHP_SELF'] ?>">
					<div class="right">
						<div class="input-group col-xs-3 col-xs-9-offset" style="margin:10px">
							<select name="donem" class="form-control" style="width:75px; height:50px;">
							<option value="<? echo $year; ?>"><? echo $year; ?></option>";
					<?
					$sorgu="select distinct year(staj_baslama) from staj_bilgileri";
					$dondur=mysqli_query($conn,$sorgu);
					
					/* dönem bilgisine göre diğer dönemleri oluşturma */
					
					while($sonuc=mysqli_fetch_assoc($dondur))	{
						if($sonuc["year(staj_baslama)"]==$year) continue;
					?>
					
					<option value="<? echo $sonuc["year(staj_baslama)"]; ?>"><? echo $sonuc["year(staj_baslama)"]; ?> </option>

					<? } ?>
					
					</select> 
							<span class="input-group-btn">
					<button class="btn" type="submit">Dönem Seç</button>
							</span>
						</div>
						</div>
					</form></div></div>
					
					<?
					/* dönem bilgisine göre veritabanında yer alan öğrencilerin bölümlerini listeleme */
					
					$sorgu1="select distinct bolum from ogrenci_bilgileri where ogrenci_no in (select ogrenci_no from staj_bilgileri where year(staj_baslama)=$year)";
					$dondur1=mysqli_query($conn,$sorgu1);
					$bolum=0;
					while ($sonuc1 = mysqli_fetch_assoc($dondur1)) {
						
						$bolum++;
					?>
					
					<div class="row">
						<div class="col-xs-12">
							<div class="panel panel-default">
								<div class="panel-heading">
								<h6 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#bolum<? echo $bolum; ?>">
								<i class="fa fa-graduation-cap" aria-hidden="true"></i><? echo strtoupper(tr_strtoupper($sonuc1["bolum"])); ?> Staj Yerleri Listesi</a></h6>
							</div>
							
							<?
					/* dönem bilgisine göre gelen bölüm sayıları bazında tablolar oluşturma */
							
								  if ($bolum==1) {
							?> 
						<div id="#bolum<? echo $bolum; ?>" class="panel-collapse collapse in">
						
							<?	} else { ?>
						<div id="#bolum<? echo $bolum; ?>" class="panel-collapse collapse">
						
						<? }
					
					/* dönem bilgisine göre gelen bölümlere ait staj yapılmış şirketleri listeleme */

						$sorgu2="select * from sirket_bilgileri where ogrenci_no in (select ogrenci_no from ogrenci_bilgileri where bolum='".$sonuc1["bolum"]."' and ogrenci_no in (select ogrenci_no from staj_bilgileri where year(staj_baslama)=$year))";
						$dondur2=mysqli_query($conn,$sorgu2);
					  while ($sonuc2 = mysqli_fetch_assoc($dondur2)) {
						  $say=1;
						?>
						
						<div class="panel-body">
									<div class="well well-sm well-primary">
						<h6 class="col-xs-12 center"><b>
						<a class="text-muted" href="isletme.php?isletme=<? echo strtoupper(tr_strtoupper($sonuc2["sirket_adi"])); ?>">
						<? echo strtoupper(tr_strtoupper($sonuc2["sirket_adi"])); ?></a></b>	

						<? 
						
						$sorgu3="select AVG(toplam_puan) from staj_degerlendirme where ogrenci_no in (select ogrenci_no from staj_birimleri where sirket_adi='".$sonuc2["sirket_adi"]."')";
						$dondur3=mysqli_query($conn,$sorgu3);
						$sonuc3=mysqli_fetch_assoc($dondur3);
						if (is_null($sonuc3["AVG(toplam_puan)"])) {	?>
												<span title="Değerlendirme yapılmamış!">
						<? star(0); } else { ?>
												<span title="<? echo round(($sonuc3["AVG(toplam_puan)"]/3),2); ?>/5">
						
						<? star($sonuc3["AVG(toplam_puan)"]); } ?></span>
						</h6>
						<hr style="border: 1px; dashed #8c8b8b;">
						<div class="row">
						<div class="col-xs-2">Staj Yapılan Birimler:</div>
						<div class="col-xs-7"><b>
						
						
						<?
						/* Şirkette staj yapılan birimleri listeleme */
						
						$sorgu4="select staj_birimi from staj_birimleri where sirket_adi in (select sirket_adi from sirket_bilgileri where ogrenci_no='".$sonuc2["ogrenci_no"]."')";
						$dondur4=mysqli_query($conn,$sorgu4);
						$birimler=array();
						while($sonuc4=mysqli_fetch_assoc($dondur4)) { $birimler[]=strtoupper(tr_strtoupper($sonuc4["staj_birimi"])); } $birimler = implode(', ',$birimler); echo $birimler;
						
						?>
						
						</b></div>
						<div class="col-xs-3">Websitesi: <b><a class="text-muted" href="//<? echo $sonuc2["website"]; ?>" title="<? echo strtoupper(tr_strtoupper($sonuc2["sirket_adi"])); ?>" target="_blank"><? echo $sonuc2["website"]; ?></a></b></div>
						</div>
									
						<div class="row">
							<div class="col-xs-2">Staj Gören Öğrenciler:</div>
							<div class="col-xs-10"><b>
							
							<?

							/* Şirkette staj gören öğrencilerin bilgilerini alma */
							
							$sorgu5="select * from ogrenci_bilgileri where ogrenci_no in (select ogrenci_no from staj_birimleri where sirket_adi in (select sirket_adi from sirket_bilgileri where ogrenci_no='".$sonuc2["ogrenci_no"]."'))";
							$dondur5=mysqli_query($conn,$sorgu5);
							$ogrenciler=array();
							while($sonuc5=mysqli_fetch_assoc($dondur5)) { $ogrenciler[]="<a class='text-muted' href='ogrenci.php?ogrenci=".strtoupper($sonuc5["ogrenci_no"])."'>".strtoupper(tr_strtoupper($sonuc5["isim"]." ".$sonuc5["soyisim"]))."</a>"; } $ogrenciler = implode(', ',$ogrenciler); echo $ogrenciler;
							
									?>
									</b></div>
						</div>
						</div>
					  </div>
					 <? } ?>
					 </div>
					</div>
					</div>
				</div>
				<? } ?>	
				</div>
			</div>

        <?php
include "footer.php"; mysqli_close($conn);
?>

    </body>
</html>
