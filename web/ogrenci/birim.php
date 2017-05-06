<?php
    include "../ayarlar/connection.php";
	
	$arama=$_GET['searchPhrase'];
	$sorgu="SELECT distinct staj_birimi FROM staj_birimleri WHERE staj_birimi LIKE '%".$arama."%'";
	$dondur=mysqli_query($conn,$sorgu);

	//etiket tablosunda taratıyoruz bulunan verileri alıyoruz.

	while($sonuc=mysqli_fetch_assoc($dondur)){

	$veriler = array();
	$veriler["staj_birimi"] = $sonuc["staj_birimi"];

	//verileri json formatına çeviriyoruz
	echo json_encode($veriler);

	}
?>