<?php

/* Veritabanı Bağlantısı */

$conn=mysqli_connect("localhost","db_kullanıcısı","db_şifresi","db_adı")
or die("Could not connect to server");

/* Türkçe karakterleri büyütme ve küçültme fonksiyonları */

    function tr_strtoupper($metin){
        $bul = array('ı','i','ğ','ü','ş','ö','ç');
        $degistir = array('I','İ','Ğ','Ü','Ş','Ö','Ç');
        $metin = str_replace($bul,$degistir,$metin);
        return $metin;
    }  
    function tr_strtolower($metin){
        $bul = array('I','İ','Ğ','Ü','Ş','Ö','Ç');
        $degistir = array('ı','i','ğ','ü','ş','ö','ç');
        $metin = str_replace($bul,$degistir,$metin);
        return $metin;
    } 
	
/* Türkçe tarih fonksiyonu */
	
	function date_tr($f, $zt = 'now'){
	$z = date("$f", strtotime($zt));
	$donustur = array(
		'Monday'	=> 'Pazartesi',
		'Tuesday'	=> 'Salı',
		'Wednesday'	=> 'Çarşamba',
		'Thursday'	=> 'Perşembe',
		'Friday'	=> 'Cuma',
		'Saturday'	=> 'Cumartesi',
		'Sunday'	=> 'Pazar',
		'January'	=> 'Ocak',
		'February'	=> 'Şubat',
		'March'		=> 'Mart',
		'April'		=> 'Nisan',
		'May'		=> 'Mayıs',
		'June'		=> 'Haziran',
		'July'		=> 'Temmuz',
		'August'	=> 'Ağustos',
		'September'	=> 'Eylül',
		'October'	=> 'Ekim',
		'November'	=> 'Kasım',
		'December'	=> 'Aralık',
		'Mon'		=> 'Pts',
		'Tue'		=> 'Sal',
		'Wed'		=> 'Çar',
		'Thu'		=> 'Per',
		'Fri'		=> 'Cum',
		'Sat'		=> 'Cts',
		'Sun'		=> 'Paz',
		'Jan'		=> 'Oca',
		'Feb'		=> 'Şub',
		'Mar'		=> 'Mar',
		'Apr'		=> 'Nis',
		'Jun'		=> 'Haz',
		'Jul'		=> 'Tem',
		'Aug'		=> 'Ağu',
		'Sep'		=> 'Eyl',
		'Oct'		=> 'Eki',
		'Nov'		=> 'Kas',
		'Dec'		=> 'Ara',
	);
	foreach($donustur as $en => $tr){
		$z = str_replace($en, $tr, $z);
	}
	if(strpos($z, 'Mayıs') !== false && strpos($f, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
	return $z;
}

/* Değerlendirme Fonksiyonu */
	
	function star($sayi){
		if($sayi<=0) { 
		echo "<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>";
		} if($sayi<=1.5 && $sayi>0) {
		echo "<i class='fa fa-star-half-o text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>";
		} if($sayi<=3 && $sayi>1.5) {
		echo "<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>";
		} if($sayi<=4.5 && $sayi>3) {
		echo "<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-half-o text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>";
		} if($sayi<=6 && $sayi>4.5) {
		echo "<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>";
		} if($sayi<=7.5 && $sayi>6) {
		echo "<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-half-o text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>";
		} if($sayi<=9 && $sayi>7.5) {
		echo "<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>";
		} if($sayi<=10.5 && $sayi>9) {
		echo "<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-half-o text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>";
		} if($sayi<=12 && $sayi>10.5) {
		echo "<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-o'aria-hidden='true'></i>";
		} if($sayi<=13.5 && $sayi>12) {
		echo "<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star-half-o text-danger'aria-hidden='true'></i>";
		} if($sayi>13.5) {
		echo "<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>
			<i class='fa fa-star text-danger'aria-hidden='true'></i>";
							 } 
		return $sayi;
}