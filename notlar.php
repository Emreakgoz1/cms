 <?php

 /*
 -Cms altındaki index.phpmizi olusturduk.
 -init.phpyi cagırdık.
 -init.php içerisinde de session_start ile sessionumuzu başlattık.
 -ob_startı başlattık.YÖnlendirme de sıkıntı olmasın diye
 -init.php içerisinde loadclasses ile sınıflarımız olursa otomatik yüklettik 
 -$config degişkeni ile config dosyamızı yüklettik.Database baglantısı
 -config.php içerisinde de :
 -2 tane sabit degişken ve 1 de geriye dizi döndürdük
 -init.php içerisinde try catch içerisinde
- Veritabanı baglantımızı gerçekleştirdik $db degişkenine attık 
-init.php içerisinde helper dosyalarımızı otomatik olarak yüklettik.

-index.php de $_server degişkenindeki REQUEST_URI daki link yapımızdaki degerleri aldık
--SUBFOLDER dayda bizim projemiz yani anadizinde calısmıyorsak
-array_shift ile dizideki ilk elemanı aldık
-geriye ilk elemansız dizimiz kaldık
- ve kontrol ettik bu dizinin sıfırıncı elemanı yoksa index yap
- eger controller kısmında controller dosyası olarak yoksa o zaman 404 yap
-ve controller dosyasını cagır dedik.










 */