<?php
    include "../ayarlar/connection.php";
	
	$arama=$_GET['searchPhrase'];
	$sorgu="SELECT * FROM sirket_bilgileri WHERE sirket_adi LIKE '%".$arama."%'";
	$dondur=mysqli_query($conn,$sorgu);

	//etiket tablosunda taratıyoruz bulunan verileri alıyoruz.

	while($sonuc=mysqli_fetch_assoc($dondur)){

	$veriler = array();
	$veriler["sirket_adi"] = $sonuc["sirket_adi"];

	//verileri json formatına çeviriyoruz
	echo json_encode($veriler);

	}
?>