<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Elbiseler
            [
                'name' => 'Siyah Abiye Elbise',
                'slug' => 'siyah-abiye-elbise',
                'description' => 'Özel günler için şık siyah abiye elbise. Zarif kesimi ve kaliteli kumaşı ile öne çıkıyor.',
                'price' => 899.99,
                'stock' => 15,
                'category_id' => 1,
            ],
            [
                'name' => 'Çiçek Desenli Yazlık Elbise',
                'slug' => 'cicek-desenli-yazlik-elbise',
                'description' => 'Hafif ve ferah kumaşı ile yaz ayları için ideal. Renkli çiçek desenleriyle neşeli bir görünüm.',
                'price' => 299.99,
                'stock' => 25,
                'category_id' => 1,
            ],
            [
                'name' => 'Lacivert Kokteyl Elbise',
                'slug' => 'lacivert-kokteyl-elbise',
                'description' => 'Davetler için mükemmel lacivert kokteyl elbise. Zarif ve şık tasarım.',
                'price' => 699.99,
                'stock' => 12,
                'category_id' => 1,
            ],
            
            // Bluzlar
            [
                'name' => 'Beyaz Gömlek Bluz',
                'slug' => 'beyaz-gomlek-bluz',
                'description' => 'Klasik beyaz gömlek bluz. İş ve günlük kullanım için ideal.',
                'price' => 199.99,
                'stock' => 30,
                'category_id' => 2,
            ],
            [
                'name' => 'Pembe Şifon Bluz',
                'slug' => 'pembe-sifon-bluz',
                'description' => 'Hafif şifon kumaştan üretilmiş pembe bluz. Zarif ve feminen.',
                'price' => 249.99,
                'stock' => 20,
                'category_id' => 2,
            ],
            [
                'name' => 'Desenli Kolsuz Bluz',
                'slug' => 'desenli-kolsuz-bluz',
                'description' => 'Yaz ayları için harika kolsuz bluz modeli. Farklı desen seçenekleri.',
                'price' => 179.99,
                'stock' => 18,
                'category_id' => 2,
            ],
            
            // Pantolonlar
            [
                'name' => 'Siyah Kumaş Pantolon',
                'slug' => 'siyah-kumas-pantolon',
                'description' => 'Klasik siyah kumaş pantolon. İş ve günlük kullanım için ideal.',
                'price' => 399.99,
                'stock' => 22,
                'category_id' => 3,
            ],
            [
                'name' => 'Mavi Jean Pantolon',
                'slug' => 'mavi-jean-pantolon',
                'description' => 'Rahat kesim mavi jean. Kaliteli denim kumaş.',
                'price' => 349.99,
                'stock' => 28,
                'category_id' => 3,
            ],
            [
                'name' => 'Gri Wide Leg Pantolon',
                'slug' => 'gri-wide-leg-pantolon',
                'description' => 'Trend gri wide leg pantolon. Rahat ve şık.',
                'price' => 449.99,
                'stock' => 16,
                'category_id' => 3,
            ],
            
            // Ceketler
            [
                'name' => 'Siyah Blazer Ceket',
                'slug' => 'siyah-blazer-ceket',
                'description' => 'Klasik siyah blazer ceket. İş ve özel günler için.',
                'price' => 799.99,
                'stock' => 10,
                'category_id' => 4,
            ],
            [
                'name' => 'Kot Ceket',
                'slug' => 'kot-ceket',
                'description' => 'Trend kot ceket modeli. Her kombine uygun.',
                'price' => 499.99,
                'stock' => 14,
                'category_id' => 4,
            ],
            
            // Etekler
            [
                'name' => 'Pileli Mini Etek',
                'slug' => 'pileli-mini-etek',
                'description' => 'Şık pileli mini etek. Genç ve dinamik görünüm.',
                'price' => 279.99,
                'stock' => 20,
                'category_id' => 5,
            ],
            [
                'name' => 'Siyah Kalem Etek',
                'slug' => 'siyah-kalem-etek',
                'description' => 'Klasik siyah kalem etek. Ofis şıklığı.',
                'price' => 299.99,
                'stock' => 18,
                'category_id' => 5,
            ],
            
            // Tişörtler
            [
                'name' => 'Beyaz Basic Tişört',
                'slug' => 'beyaz-basic-tisort',
                'description' => 'Klasik beyaz tişört. Gardıropların vazgeçilmezi.',
                'price' => 129.99,
                'stock' => 50,
                'category_id' => 6,
            ],
            [
                'name' => 'Siyah V Yaka Tişört',
                'slug' => 'siyah-v-yaka-tisort',
                'description' => 'Şık v yaka tişört. %100 pamuk.',
                'price' => 149.99,
                'stock' => 45,
                'category_id' => 6,
            ],
            [
                'name' => 'Baskılı Oversize Tişört',
                'slug' => 'baskili-oversize-tisort',
                'description' => 'Trend baskılı oversize tişört. Rahat kesim.',
                'price' => 189.99,
                'stock' => 35,
                'category_id' => 6,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}