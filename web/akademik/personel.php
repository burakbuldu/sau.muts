<?php ob_start();?>
<!DOCTYPE html>
<?php
/* Giriş yapan kullanıcı bilgilerinin kontrolü */

$kullaniciadi=$_SESSION['kullaniciadi'];
include "header.php";
?>
        
        <!-- Description -->
		<div class="description-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-md-12 description-title">
	                    <h2>Mesleki Uygulama Takip Sistemi</h2>
	                </div>
	            </div>
				<div class='row'>
					<div class='col-sm-12'>
						<div class='panel panel-default'>
							<div class='panel-heading'>
								<h4 class='panel-title'><a data-toggle='collapse' data-parent='#accordion' href='#bolum1"'><i class='fa fa-users' aria-hidden='true'></i> Kayıtlı Personel</a> </h6>
							</div>
							<div id='bolum1' class='panel-collapse collapse in'>
								<div class='panel-body'>
									<div class='well well-sm well-primary'>
										<div class="row">
											<div class="col-sm-4"># <b> Kullanıcı Adı:</b></div>
											<div class="col-sm-4"><b>Adı Soyadı:</b></div>
											<div class="col-sm-4"><b>Email Adresi:</b></div>
										</div>
											<?
											
											/* Personel kayıtlarının basılması */
											
											include "../ayarlar/connection.php";
												$say=1;
												$sorgu="select * from akademik";
												$dondur=mysqli_query($conn,$sorgu);
												while($sonuc = mysqli_fetch_assoc($dondur)) { ?>
										<div class='row'>
											<div class="col-sm-4"><b><? echo $say; ?>-)</b> <? echo $sonuc['kullaniciadi']; ?></div>
											<div class="col-sm-4"><? echo strtoupper(tr_strtoupper($sonuc['isim']." ".$sonuc['soyisim'])); ?></div>
											<div class="col-sm-4"><a class="text-muted" href="mailto:<? echo $sonuc['email']; ?>" title="<? echo $sonuc['isim']." ".$sonuc['soyisim']; ?>"><? echo $sonuc["email"]; ?></a></div>
										</div><? $say++; } ?>
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>

        <?php
include "footer.php"; mysqli_close($conn);
?>

    </body>
</html>
