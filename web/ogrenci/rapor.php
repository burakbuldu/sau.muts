<?php
ob_start();
include "header.php";
$ogrenci_no=$_SESSION["ogrenci_no"];

/* Giriş yapan öğrencinin kontrolü */

if(!isset($_SESSION))
	header("location:../index.php");

/* Giriş yapan öğrencilerin bilgilerini veritabanından çekme */

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
	$sonuc5 = mysqli_fetch_assoc($dondur5);
	
	$dogum_tarihi=date_tr('j F Y', $sonuc1["dogum_tarihi"]);
	$staj_baslama=date_tr('j F Y', $sonuc3["staj_baslama"]);
	$staj_bitis=date_tr('j F Y', $sonuc3["staj_bitis"]);
	$isim=strtoupper(tr_strtoupper($sonuc1["isim"]));
	$soyisim=strtoupper(tr_strtoupper($sonuc1["soyisim"]));
	$memleket=strtoupper(tr_strtoupper($sonuc1["memleket"]));
	$email=strtolower($sonuc1["email"]);
	$cinsiyet=strtoupper(tr_strtoupper($sonuc1["cinsiyet"]));
	$telefon=$sonuc1["telefon"];
	$bolum=strtoupper(tr_strtoupper($sonuc1["bolum"]));
	$denetmen_adi=strtoupper(tr_strtoupper($sonuc1["denetmen_adi"]."".$sonuc1["denetmen_soyadi"]));
	$staj_birimi=strtoupper(tr_strtoupper($sonuc3["staj_birimi"]));
	$kontakt_adi=strtoupper(tr_strtoupper($sonuc4["kontakt_adi"]));
	$kontakt_soyadi=strtoupper(tr_strtoupper($sonuc4["kontakt_soyadi"]));
	$kontakt_unvan=strtoupper(tr_strtoupper($sonuc4["kontakt_unvan"]));
	$kontakt_tel=$sonuc4["kontakt_tel"];
	$kontakt_email=strtolower($sonuc4["kontakt_email"]);
	$sirket_adi=strtoupper(tr_strtoupper($sonuc5["sirket_adi"]));
	$sehir=strtoupper(tr_strtoupper($sonuc5["sehir"]));
	$website=strtolower($sonuc5["website"]);
	$adres=strtoupper(tr_strtoupper($sonuc5["adres"]));
	
	/* Veritabanından gelen bilgileri PDF dokümanına basma */

require_once('../pdf/tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('XXXXX');
$pdf->SetTitle('Staj Rapor Detayı');
$pdf->SetSubject('Staj Rapor Dokümanı');
$pdf->SetKeywords('Mesleki Uygulama, PDF, Sakarya Üniversitesi, İşletme Fakültesi, Staj');
//set some language-dependent strings

// ---------------------------------------------------------
// set font
$pdf->SetFont('arial', '', 10, '', true);
// add a page
$pdf->AddPage();



// Set some content to print
$html =<<<EOD
<br/>
	<h1 style="text-decoration: underline;">Öğrenci Bilgilerim</h1>
	<h2>Kişisel Bilgilerim</h2>
	<table class="table">
		<tbody>
		<tr>
<td>Öğrenci No:</td>
<td>$ogrenci_no</td>
<td>Doğum Tarihi:</td>
<td>$dogum_tarihi</td>
		</tr>
		<tr>
<td>Adı:</td>
<td>$isim</td>
<td>Memleket:</td>
<td>$memleket</td>
		</tr>
		<tr>
<td>Soyadı:</td>
<td>$soyisim</td>
<td>Email Adresi:</td>
<td>$email</td>
		</tr>
		<tr>
<td>Cinsiyet</td>
<td>$cinsiyet</td>
<td>Telefon:</td>
<td>+90 $telefon</td>
		</tr>
		</tbody>
	<h2>Eğitim Bilgilerim</h2>
	<table class="table">
		<tbody>
		<tr>
<td>Bölüm Adı:</td>
<td>$bolum</td>
		</tr>
		<tr>
<td>Staj Denetmeni:</td>
<td>$denetmen_adi</td>
		</tr>
		</tbody>
	</table>
	<h1 style="text-decoration: underline;">Mesleki Uygulama Bilgilerim</h1>
	<table class="table">
		<tbody>
		<tr>
<td>Staj Yapılan Departman:</td>
<td>$staj_birimi</td>
<td>Staj Başlama Tarihi:</td>
<td>$staj_baslama</td>
		</tr>
		<tr>
<td></td>
<td></td>
<td>Staj Bitiş Tarihi:</td>
<td>$staj_bitis</td>
		</tr>
		</tbody>
		</table>
	<h2>İşyeri Staj Sorumlusu Bilgileri</h2>
	<table class="table">
		<tbody>
		<tr>
<td>Adı Soyadı:</td>
<td>$kontakt_adi $kontakt_soyadi</td>
<td>Email Adresi:</td>
<td>$kontakt_email</td>
		</tr>
		<tr>
<td>Pozisyonu / Ünvanı:</td>
<td>$kontakt_unvan</td>
<td>Telefonu:</td>
<td>+90 $kontakt_tel</td>
		</tr>
		</tbody>
		</table>
	<h2>Şirket Bilgileri</h2>
	<table class="table">
		<tbody>
		<tr>
<td>Şirket Adı:</td>
<td>$sirket_adi</td>
<td>Şehir:</td>
<td>$sehir</td>
		</tr>
		<tr>
<td>Websitesi:</td>
<td>$website</td>
<td>Adres:</td>
<td>$adres</td>
		</tr>
		<tr>
<td></td>
<td></td>
		</tr>
		</tbody>
		</table>
EOD;

$pdf->writeHTML($html, true, false, false, false, '');
date_default_timezone_set('Europe/Istanbul');
$tarih=date('d.m.Y');
$saat=date('H:i:s');

$html = <<<EOD
<table width='100%'>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
<td align='left'>Rapor tarihi:</td><td>$tarih</td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
<td align='left'>Rapor saati:</td><td>$saat</td></tr></table>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, false, "L", true);

// ---------------------------------------------------------
//Close and output PDF document
mysqli_close($conn);
ob_end_clean();
$pdf->Output($studen_id.".pdf", "I");
?>