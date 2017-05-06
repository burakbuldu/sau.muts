<?php ob_start();?>
<!DOCTYPE html>
<?php

/* Giriş yapan kullanıcı bilgilerinin kontrolü */

$kullaniciadi=$_SESSION['kullaniciadi'];
$year=$_GET['donem'];
include "header.php";
include "../ayarlar/connection.php";

if($year=="")
$year=date("Y"); /* yıl verisi boşsa şu anki yıl atanır */

/* yıl bilgisine göre öğrenci bilgilerinde yer alan bölüm kayıtlarının sıralanması */

$sorgu1="select distinct bolum from ogrenci_bilgileri where ogrenci_no in (select ogrenci_no from staj_bilgileri where year(staj_baslama)=$year)";
$dondur1=mysqli_query($conn,$sorgu1);
$bolum=0;

?>
        
        <!-- Description -->
	<div class="description-container">
	    <div class="container">
	        <div class="row">
	                <div class="col-xs-12 description-title">
	                    <h2>Mesleki Uygulama Takip Sistemi</h2>

				<form role="form" method="get" class="form-inline" action="<? echo $_SERVER['PHP_SELF']; ?>">
					<div class="right">
						<div class="input-group col-xs-3 col-xs-9-offset" style="margin:10px">
							<select name="donem" class="form-control" style="width:75px; height:50px;">
							<option value="<? echo $year; ?>"><? echo $year; ?></option>
							
					<?		/*  veritabanındaki staj bilgileri tablosundan staj yılları sayılması ve sonuç kadar dönem ekrana basma */
					
					$sorgu="select distinct year(staj_baslama) from staj_bilgileri";
					$dondur=mysqli_query($conn,$sorgu);
					
					while($sonuc=mysqli_fetch_assoc($dondur))	{
						if($sonuc["year(staj_baslama)"]==$year) continue; ?>
					<option value="<? $sonuc["year(staj_baslama)"]; ?>"><? $sonuc["year(staj_baslama)"]; ?></option>
					<? } ?>
					</select>
							<span class="input-group-btn">
								<button class="btn" type="submit">Dönem Seç</button>
							</span>
						</div>
						</div>
					</form>
					</div>
			</div>
						
					<?	/* bölüm sayısı kadar ekranda açılır kapanır tablolar oluşturma */
						
					while ($sonuc1 = mysqli_fetch_assoc($dondur1)) {
						
						$bolum++;
						
						
					?>
			<div class="row">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h6 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#bolum<? echo $bolum; ?>"><i class="fa fa-users" aria-hidden="true"></i><? echo strtoupper(tr_strtoupper($sonuc1["bolum"])); ?> Öğrenci Listesi</a></h6>
						</div>
					  
					 <?
					  if ($bolum==1) { ?>
						<div id="bolum<? echo $bolum; ?>" class="panel-collapse collapse in">  
						  <? } else { ?>
							<div id="bolum<? echo $bolum; ?>" class="panel-collapse collapse">
						
						  <? }
						
						/* yıla göre bölüm bazında öğrenci bilgilerinden denetmen sayısı kadar tablo içi alan oluşturma */

										$sorgu2="select distinct denetmen_adi, denetmen_soyadi from ogrenci_bilgileri where bolum='".$sonuc1["bolum"]."' and ogrenci_no in (select ogrenci_no from staj_bilgileri where year(staj_baslama)=$year)";
										$dondur2=mysqli_query($conn,$sorgu2);
									  while($sonuc2 = mysqli_fetch_assoc($dondur2)) {
								
										?>
										
									<div class="panel-body">
										<div class="well well-sm well-primary">
											<h6 class="col-sm-12">Denetmen: <b><? echo strtoupper(tr_strtoupper($sonuc2["denetmen_adi"]." ".$sonuc2["denetmen_soyadi"])); ?></b></h6>
											
											<?
											$sorgu3="select * from ogrenci_bilgileri where bolum='".$sonuc1["bolum"]."' and denetmen_adi='".$sonuc2["denetmen_adi"]."' and denetmen_soyadi='".$sonuc2["denetmen_soyadi"]."' and ogrenci_no in (select ogrenci_no from staj_bilgileri where year(staj_baslama)=$year)";
											$dondur3=mysqli_query($conn,$sorgu3);
											while ($sonuc3 = mysqli_fetch_assoc($dondur3)) {
												
												/* yıla göre bölüm bazında gelen danışman bilgisiyle eşleşen öğrencilerin her biri satır olarak öğrenci bilgileri tablosundan ve öğrencinin numarasından diğer tablolardaki bilgilerinin ekrana basılması */
											
											$sorgu4="select sirket_adi from staj_birimleri where ogrenci_no='".$sonuc3["ogrenci_no"]."' and ogrenci_no in (select ogrenci_no from staj_bilgileri where year(staj_baslama)=$year)";
											$dondur4=mysqli_query($conn,$sorgu4);
											$sonuc4 = mysqli_fetch_assoc($dondur4);
											
										?>
											<div class="row">
												<div class="col-sm-3">Öğrenci No: <b><a class="text-muted" href="ogrenci.php?ogrenci=<? echo $sonuc3["ogrenci_no"]; ?>"><? echo $sonuc3["ogrenci_no"]; ?></a></b></div>
												<div class="col-sm-3">Adı Soyadı: <b><? echo strtoupper(tr_strtoupper($sonuc3["isim"]." ".$sonuc3["soyisim"])); ?></b></div>
												<div class="col-sm-3">Staj Yeri: <b><a class="text-muted" href="isletme.php?isletme=<? echo strtoupper(tr_strtoupper($sonuc4["sirket_adi"])); ?>"><? echo strtoupper(tr_strtoupper($sonuc4["sirket_adi"])); ?></a></b></div>
												<div class="col-sm-3">Email: <b><a class="text-muted" href="mailto:<? echo strtolower($sonuc3["email"]); ?>"><? echo strtolower($sonuc3["email"]); ?></a></b></div>
											</div><? } ?>
										</div> 
								</div><? } ?>	
							</div>
						</div> 
					</div>
				</div><? } ?>		
			</div>
		</div>
	</div>

        <?php
include "footer.php"; mysqli_close($conn);
?>

    </body>
</html>
