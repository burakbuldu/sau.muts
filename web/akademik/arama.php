<!DOCTYPE html>
<?php
$kullaniciadi=$_SESSION['kullaniciadi'];
include "header.php";								/* Giriş kontrolü */
include "../ayarlar/connection.php";
?> <div class="description-container">
	        <div class="container"><div class="row">
	                <div class="col-xs-12 description-title">
	                    <h2>Mesleki Uygulama Takip Sistemi</h2>
	                </div>
					</div>
					<div class="row">
						<div class="col-xs-12">
						<div class="panel panel-default">
						<div class="panel-heading">
						<h6 class="panel-title"><i class="fa fa-search" aria-hidden="true"></i> Arama Sonuçları</h6>
					  </div>
					  <div class="panel-collapse collapse in">
					  <div class="panel-body">

<?	$arama=$_GET["ara"];
	
	if (ctype_digit($arama)) { ?>
						<div class="well well-sm well-primary"><div class="row"><div class='col-xs-12"><b>Sayısal bir değer arayamazsınız!</b></div></div></div>

<?			/* sayısal veri aranırsa */

	}
	if (strlen($arama) < 3) { ?>
	
						<div class="well well-sm well-primary"><div class="row"><div class="col-sm-12"><b>3'ten daha az karakter ile arama yapamazsınız!</b></div></div></div>

<?	/* 3 karakterden az sayıda veri aranırsa */

	}
		
	else {	
						/* aranan değerin öğrenci bilgileri tablosunda sorgulanması */
	
	$sorgu1="select * from ogrenci_bilgileri where ogrenci_no like '$arama' or isim like '%$arama%' or soyisim like '%$arama%'";
	$dondur1=mysqli_query($conn,$sorgu1);
	
	if(mysqli_num_rows($dondur1)>=1) {	?>
	<div class="well well-sm well-primary">
	<?									/* sonuç dönerse öğrenci bilgileri çekilir */

	while($sonuc1=mysqli_fetch_assoc($dondur1)) {

	$ogrenci_no=$sonuc1["ogrenci_no"];
    $sorgu2 = "select * from ogrenci_bilgileri where ogrenci_no='".$ogrenci_no."'";
    $dondur2 = mysqli_query($conn, $sorgu2);
	$sonuc2 = mysqli_fetch_assoc($dondur2);
	
    $sorgu3 = "select * from staj_birimleri where ogrenci_no='".$ogrenci_no."'";
    $dondur3 = mysqli_query($conn, $sorgu3);
	$sonuc3 = mysqli_fetch_assoc($dondur3);
	
    $sorgu4 = "select * from staj_bilgileri where ogrenci_no='".$ogrenci_no."'";
    $dondur4 = mysqli_query($conn, $sorgu4);
	$sonuc4 = mysqli_fetch_assoc($dondur4);
	$staj_baslama=$sonuc4["staj_baslama"];
	
						/* çekilen öğrenci bilgileri ekrana basılır ve çıkılır */
?>					
				<div class="row"><div class="col-xs-12"><b>ÖĞRENCİLER:</b></div></div><div class="row">
				<div class="col-xs-3"><b><a class="text-muted" href="ogrenci.php?ogrenci=<? echo strtoupper($sonuc1["ogrenci_no"]) ?>"><? echo strtoupper($sonuc1["ogrenci_no"]) ?></a></b></div>
				<div class="col-xs-3">Adı Soyadı: <b><? echo strtoupper(tr_strtoupper($sonuc2["isim"]." ".$sonuc2["soyisim"])); ?></b></div>
				<div class="col-xs-4">Staj Yeri: <b><a class="text-muted" href="isletme.php?isletme=<? echo strtoupper(tr_strtoupper($sonuc3["sirket_adi"])) ?>"><? echo strtoupper(tr_strtoupper($sonuc3["sirket_adi"])) ?></a></b></div>
				<div class="col-xs-2">Staj Dönemi: <b><? echo date_tr('Y',$staj_baslama) ?></b></div>
				</div> <? } } ?> </div> <?
		
	$sorgu5="select * from sirket_bilgileri where sirket_adi like '%$arama%'";			/* aranan değerin şirket bilgilerinde aranması */
	$dondur5=mysqli_query($conn,$sorgu5);
	if(mysqli_num_rows($dondur5)>=1) {		?>

	<div class="well well-sm well-primary">
	
<?	/* sonuç dönerse işletme bilgileri çekilir ve ekrana basılır */
		while($sonuc5=mysqli_fetch_array($dondur5)) {
				?>
				
				<div class="row"><div class="col-xs-12"><b>İŞLETMELER:</b></div></div><div class="row">
				<div class="col-xs-3"><b><a class="text-muted" href="isletme.php?isletme=<? echo strtoupper(tr_strtoupper($sonuc5["sirket_adi"])) ?>"><? echo strtoupper(tr_strtoupper($sonuc5["sirket_adi"])) ?></a></b></div>
				<div class="col-xs-3">Şehir: <b><? echo $sonuc5["sehir"]; ?></b></div>
				<div class="col-xs-6">Staj gören öğrenciler: <b>
	<?
    $sorgu6 = "select distinct ogrenci_no from staj_birimleri where sirket_adi='".$sonuc5["sirket_adi"]."'";
    $dondur6 = mysqli_query($conn, $sorgu6);
	while($sonuc6 = mysqli_fetch_assoc($dondur6)) {
	$sorgu7 = "select isim, soyisim from ogrenci_bilgileri where ogrenci_no='".$sonuc5["ogrenci_no"]."'";
    $dondur7 = mysqli_query($conn, $sorgu7);
	$sonuc7=mysqli_fetch_array($dondur7);
	
	?>
	
			<a class="text-muted" href="ogrenci.php?ogrenci=<? echo $sonuc5["ogrenci_no"] ?>" title="<? echo strtoupper(tr_strtoupper($sonuc7["isim"]." ".$sonuc7["soyisim"])); ?>"><? echo $sonuc5["ogrenci_no"] ?></a>

	<?	} ?></b></div><? } ?></div></div>
	
	<? } if(mysqli_num_rows($dondur5)<1 && mysqli_num_rows($dondur1)<1) { ?> <div class="well well-sm well-primary"><div class="row"><div class="col-xs-12"><b>Aradığınız kriterde bir sonuç bulunamadı!</b></div></div>
	<?	} }?>
	</div></div></div>
	
	<?
		include "footer.php";
	  mysqli_close($conn);
?>

    </body>
</html>
