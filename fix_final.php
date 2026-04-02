<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
use Illuminate\Support\Facades\DB;

$urun_gorselleri = [
    // ELBISELER
    'Siyah Midi Elbise'         => 'https://images.unsplash.com/photo-1502716119720-b23a93e5fe1b?w=600&q=80',
    'Beyaz Dantel Elbise'       => 'https://images.unsplash.com/photo-1496217590455-aa63a8550c23?w=600&q=80',
    'Kırmızı Abiye Elbise'      => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=600&q=80',
    'Mavi Yazlık Elbise'        => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
    'Yeşil Şifon Elbise'        => 'https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=600&q=80',
    'Mor Pileli Elbise'         => 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?w=600&q=80',
    'Pembe Kokteyl Elbise'      => 'https://images.unsplash.com/photo-1495385794356-15371f348c31?w=600&q=80',
    'Turuncu Askılı Elbise'     => 'https://images.unsplash.com/photo-1485968579580-b6d095142e6e?w=600&q=80',
    'Lacivert Maxi Elbise'      => 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&q=80',
    'Çiçek Desenli Elbise'      => 'https://images.unsplash.com/photo-1583496661160-fb5218b5d673?w=600&q=80',

    // BLUZLAR
    'Beyaz Gömlek Bluz'         => 'https://images.unsplash.com/photo-1598554747436-c9293d6a588f?w=600&q=80',
    'Pembe Şifon Bluz'          => 'https://images.unsplash.com/photo-1571513722275-4b41940f54b8?w=600&q=80',
    'Siyah V Yaka Bluz'         => 'https://images.unsplash.com/photo-1509631179647-0177331693ae?w=600&q=80',
    'Desenli Crop Bluz'         => 'https://images.unsplash.com/photo-1519681393784-d120267933ba?w=600&q=80',
    'Krem Düğmeli Bluz'         => 'https://images.unsplash.com/photo-1591369822096-ffd140ec948f?w=600&q=80',
    'Mavi Kolsuz Bluz'          => 'https://images.unsplash.com/photo-1485462537746-965f33f4f4b4?w=600&q=80',
    'Yeşil Fırfırlı Bluz'       => 'https://images.unsplash.com/photo-1496747611176-843222e1e57c?w=600&q=80',
    'Bordo İşlemeli Bluz'       => 'https://images.unsplash.com/photo-1532453288672-3a56f2238d45?w=600&q=80',

    // PANTOLONLAR
    'Siyah Kumaş Pantolon'      => 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?w=600&q=80',
    'Mavi Jean Pantolon'        => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=600&q=80',
    'Beyaz Wide Leg Pantolon'   => 'https://images.unsplash.com/photo-1506629082955-511b1aa562c8?w=600&q=80',
    'Gri Dar Kesim Pantolon'    => 'https://images.unsplash.com/photo-1560243563-062bfc001d68?w=600&q=80',
    'Kahverengi Keten Pantolon' => 'https://images.unsplash.com/photo-1475180098004-ca77a66827be?w=600&q=80',
    'Lacivert Klasik Pantolon'  => 'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=600&q=80',
    'Haki Kargo Pantolon'       => 'https://images.unsplash.com/photo-1517445312882-bc9910d016b7?w=600&q=80',

    // CEKETLER
    'Siyah Blazer Ceket'        => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&q=80',
    'Kot Ceket'                 => 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=600&q=80',
    'Deri Ceket'                => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=600&q=80',
    'Kahverengi Süet Ceket'     => 'https://images.unsplash.com/photo-1544022613-e87ca75a784a?w=600&q=80',
    'Beyaz Trençkot'            => 'https://images.unsplash.com/photo-1548369937-47519962c11a?w=600&q=80',
    'Yeşil Bomber Ceket'        => 'https://images.unsplash.com/photo-1551537482-f2075a1d41f2?w=600&q=80',

    // ETEKLER
    'Siyah Kalem Etek'          => 'https://images.unsplash.com/photo-1577900232427-18219b9166a0?w=600&q=80',
    'Pileli Mini Etek'          => 'https://images.unsplash.com/photo-1570976447640-ac859083963f?w=600&q=80',
    'Jean Etek'                 => 'https://images.unsplash.com/photo-1509631179647-0177331693ae?w=600&q=80',
    'Kırmızı A Kesim Etek'      => 'https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?w=600&q=80',
    'Midi Boy Plise Etek'       => 'https://images.unsplash.com/photo-1585487000160-6ebcfceb0d03?w=600&q=80',
    'Desenli Maxi Etek'         => 'https://images.unsplash.com/photo-1496747611176-843222e1e57c?w=600&q=80',

    // TIŞÖRTLER
    'Beyaz Basic Tişört'        => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=600&q=80',
    'Siyah V Yaka Tişört'       => 'https://images.unsplash.com/photo-1503342394128-c104d54dba01?w=600&q=80',
    'Gri Oversize Tişört'       => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=600&q=80',
    'Lacivert Polo Tişört'      => 'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=600&q=80',
    'Baskılı Crop Tişört'       => 'https://images.unsplash.com/photo-1527719327859-c6ce80353573?w=600&q=80',
    'Çizgili Uzun Kollu Tişört' => 'https://images.unsplash.com/photo-1562157873-818bc0726f68?w=600&q=80',
];

$guncellenen = 0;
foreach ($urun_gorselleri as $isim => $url) {
    $etkilenen = DB::table('products')->where('name', $isim)->update(['image' => $url]);
    if ($etkilenen) {
        echo "✓ $isim\n";
        $guncellenen++;
    } else {
        echo "✗ BULUNAMADI: $isim\n";
    }
}
echo "\nToplam: $guncellenen ürün güncellendi.\n";