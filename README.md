# Bitirme Projesi

Mesleki Uygulama Takip Sistemi: Sakarya Üniversitesi İşletme Fakültesi YBS bölümü (www.ybs.sakarya.edu.tr) öğrencileri Burak Buldu ve Mert İleri tarafından hazırlanmıştır.

PHP, MySQL, JQuery ve HTML5 kullanılarak hazırlanmıştır.

----------------------------------------------------------------------------------------------------------------------------------------

Görsel tasarımda kaynak olarak kullanılan bazı JQuery ve Bootstrap kütüphaneleri aşağıdakilerden oluşmaktadır.

1-) Materialize CSS -> http://materializecss.com/

2-) Validator -> https://1000hz.github.io/bootstrap-validator/

3-) Modal -> http://bootsnipp.com/snippets/featured/clean-modal-login-form

4-) Bootstrap Long Multi Step Form -> http://azmind.com/bootstrap-multi-step-form-free/

5-) PHP mail fonksiyonundan bağımsız olarak PHPMailer kullanılmıştır. -> https://github.com/PHPMailer/PHPMailer

6-)PDF oluşturmak için TCPDF'ten yararlanılmıştır. -> https://tcpdf.org/

Arial Türkçe fontunu kendimiz sisteme ekledik. Eğer başka bir font eklemek isterseniz istediğiniz fontu bu linkten dönüştürebilirsiniz. http://fonts.snm-portal.com/

Convert ettiğiniz fontun *.php *.ctg.z ve *.z dosyalarını  /pdf/fonts dizinine yükleyiniz. Üç dosyanın da aynı dizine yüklenmesi gerekiyor.

----------------------------------------------------------------------------------------------------------------------------------------
# DEMO

Demo Akademik Kullanıcı: admin Şifre: 123456

----------------------------------------------------------------------------------------------------------------------------------------

Demo sistemde bilgi güncelleyemez ya da sıfırlayamazsınız.

----------------------------------------------------------------------------------------------------------------------------------------

# KURULUM

1-) ayarlar/connection.php dosyasında MySQL bağlantısını yapınız.

2-) index.php dosyasında aktivasyon kodlarının gönderimi için gönderecek GMail hesabının kurulumunu yapınız.

$mail->kullaniciadi Gönderici GMail hesabı

$mail->sifre Gönderici GMail şifresi

3-) veritabani.sql dosyasını MySQL veritabanı sisteminize yükleyiniz.

----------------------------------------------------------------------------------------------------------------------------------------

# SİSTEM TANITIMI VE KULLANIMI

1- Öğrenciler üniversite öğrenci numaraları aracılığıyla sisteme kayıt oluştururlar. Üniversitenin vermiş olduğu email adreslerine aktivasyon kodu içeren bir mail alırlar. Aktivasyon kodu eşleşmesiyle kayıt formlarını tamamlarlar.

2- Sakarya Üniversitesi İşletme Fakültesi için hazırlandığı için Öğrenci numaraları formlarda buna göre kısıtlanmıştır. Bu kısıtta HTML5 Pattern özelliğinden faydalanılmıştır.

3- Veritabanında saklanan parolalar ve oluşturulan aktivasyon kodları md5 ile hashlenmektedir. (Demodaki veriler canlı olarak kullanıldığı için oradaki kullanıcı bilgileri burada paylaşılmamaktadır. Tez savunmaları bittiğinde son güncellemeleri içeren ayrı bir test ortamı paylaşılacaktır.) 

4- Akademik personel sisteme kayıtlı akademik personel tarafından oluşturulur.

5- Web uygulamanın arayüzünden kayıt silinmesi yapılmamaktadır.

6- Web uygulamanın arayüzünden öğrenci kayıtlarını diğer öğrenciler göremezler.

7- Web uygulamanın arayüzünden akademik personel öğrenci kayıtlarını sadece görüntüleyebilirler, müdahale edemezler.

8- Öğrencilerin oluşturdukları kayıtları için uygulama arayüzünde PDF çıktısı almak tasarlanmıştır. İleride CV çıktısı almak için bir alt yapı vermektedir.

9- Web Uygulaması Türkçe dilinde hazırlanmış olup, İngilizce kısımlar da Uygulama kullanıcıları için Türkçeleştirilmiştir.

----------------------------------------------------------------------------------------------------------------------------------------

# Güncellemeler Hakkında

Son Güncellemede sistemde 3 soruyla staj, birim ve işletme değerlendirmek için yıldız sistemi eklendi. Bunun için yeni formlar oluşturuldu. Autocomplete hataları düzeltildi. Akademik personel için işletme değerlendirmelerini görebileceği ekranlar hazırlandı. Lise bilgileriyle ilgili tablolar ve ekranlar kaldırıldı.

Canlı Sistem için: http://www.saumis.sakarya.edu.tr

----------------------------------------------------------------------------------------------------------------------------------------

Sorularınız ve iletişim için: burak@buldu.org (Burak Buldu)
