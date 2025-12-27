
# 🚀 Shared Hosting Kurulum Rehberi (Adım Adım)

Bu paket, shared hosting (cPanel, Plesk vb.) ortamına sorunsuz kurulum için hazırlanmıştır.

## 1. Hazırlanan Dosyalar
Şu an projeniz yüklemeye hazır hale getirildi:
- **Build**: `npm run build` ile en güncel CSS/JS dosyaları oluşturuldu.
- **Config**: Shared hosting veritabanı hatalarını önlemek için gerekli ayarlar yapıldı.
- **Cache**: Tüm önbellekler temizlendi.

## 2. Sunucuya Yükleme (Dosya Yapısı)
Shared hosting'de genellikle `public_html` klasörü bulunur. Laravel proje yapısını şu şekilde kurmalısınız:

### Klasör Yapısı Örneği
Sunucunuzdaki dosya yöneticisi şöyle görünmeli:
```
/home/kullaniciadi/
├── avukat_core/       <-- Projenin ANA dosyaları buraya (public hariç her şey)
│   ├── app
│   ├── bootstrap
│   ├── config
│   ├── database
│   ├── resources
│   ├── routes
│   ├── storage
│   ├── vendor
│   ├── .env          <-- ÖNEMLİ: Bu dosyayı oluşturmayı unutmayın
│   └── artisan
│
└── public_html/       <-- Sitenin görünen yüzü
    ├── index.php      <-- DÜZENLENECEK (Aşağıda anlatıldı)
    ├── .htaccess
    ├── build/
    ├── storage/       <-- Sembolik link (Aşağıda anlatıldı)
    ├── robots.txt
    └── favicon.ico
```

### Adım 1: Dosyaları Yükleyin
1.  Bilgisayarınızdaki `public` klasörünün **içindekileri** sunucudaki `public_html` (veya `www`) klasörüne atın.
2.  Bilgisayarınızdaki **diğer tüm klasörleri** (app, bootstrap, config, vendor vb.) sunucuda `public_html` ile aynı seviyede oluşturacağınız yeni bir klasöre (örn: `avukat_core`) atın.

### Adım 2: index.php Düzenlemesi
Sunucudaki `public_html/index.php` dosyasını açın ve şu satırları `avukat_core` klasörünü gösterecek şekilde güncelleyin:

```php
// Satır ~19
require __DIR__.'/../avukat_core/vendor/autoload.php';

// Satır ~43
$app = require_once __DIR__.'/../avukat_core/bootstrap/app.php';
```

## 3. Veritabanı Kurulumu
1.  **Veritabanı Oluşturun**: Hosting panelinizden bir MySQL veritabanı ve kullanıcısı oluşturun.
2.  **Dışa Aktar (Export)**: Yerel bilgisayarınızdaki veritabanını (`mysqldump` veya phpMyAdmin ile) `.sql` olarak dışa aktarın.
3.  **İçe Aktar (Import)**: Hosting phpMyAdmin'i kullanarak bu `.sql` dosyasını yeni oluşturduğunuz veritabanına yükleyin.

## 4. .env Dosyası Ayarları
Sunucudaki `avukat_core` klasörü içinde `.env` dosyası oluşturun (veya `.env.example` dosyasının adını değiştirin) ve şu ayarları yapın:

```env
APP_NAME="Avukat Tarık Taşdemir"
APP_ENV=production
APP_KEY=base64:... (Kendi keyiniz)
APP_DEBUG=false
APP_URL=https://www.siteadresi.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sunucu_db_adi
DB_USERNAME=sunucu_db_kullanicisi
DB_PASSWORD=sunucu_db_sifresi
```

## 5. Son Kontroller
1.  **Storage İzni**: Sunucuda `avukat_core/storage` ve `avukat_core/bootstrap/cache` klasörlerine yazma izni (775 veya 777) verin.
2.  **Storage Link**: Resimlerin görünmesi için SSH erişiminiz varsa `php artisan storage:link` komutunu çalıştırın. SSH yoksa, `avukat_core/storage/app/public` klasörünün içindekileri `public_html/storage` klasörüne kopyalayın.

## Not
Şu an **Bakım Modu** açık (`routes/web.php` içinde). Siteyi yayına almak istediğinizde `routes/web.php` dosyasındaki ilgili satırı eski haline getirmeyi unutmayın!

## 6. Terminal Olmadan Yönetim (Web Konsolu)
Terminal erişiminiz olmadığı için `routes/web.php` içine eklediğimiz özel linkleri kullanabilirsiniz.
**Dikkat:** Bu linkler şu an şifresiz olabilir (kodunuzu kontrol edin). İşiniz bitince bu kodları silmeniz önerilir.

*   `siteadresi.com/sys-setup/migrate` -> Tabloları kurar.
*   `siteadresi.com/sys-setup/seed` -> Örnek verileri yükler.
*   `siteadresi.com/sys-setup/storage-link` -> Resim bağlantılarını onarır.
*   `siteadresi.com/sys-setup/optimize` -> Önbelleği temizler.
