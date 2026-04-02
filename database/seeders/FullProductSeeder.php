<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class FullProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        
        // ELBİSELER
        $elbiseCategory = $categories->where('slug', 'elbise')->first();
        if($elbiseCategory) {
            $elbiseler = [
                ['name' => 'Siyah Midi Elbise', 'price' => 499.99, 'stock' => 20],
                ['name' => 'Beyaz Dantel Elbise', 'price' => 699.99, 'stock' => 15],
                ['name' => 'Kırmızı Abiye Elbise', 'price' => 899.99, 'stock' => 10],
                ['name' => 'Mavi Yazlık Elbise', 'price' => 399.99, 'stock' => 25],
                ['name' => 'Yeşil Şifon Elbise', 'price' => 549.99, 'stock' => 18],
                ['name' => 'Mor Pileli Elbise', 'price' => 449.99, 'stock' => 22],
                ['name' => 'Pembe Kokteyl Elbise', 'price' => 799.99, 'stock' => 12],
                ['name' => 'Turuncu Askılı Elbise', 'price' => 349.99, 'stock' => 30],
                ['name' => 'Lacivert Maxi Elbise', 'price' => 649.99, 'stock' => 16],
                ['name' => 'Çiçek Desenli Elbise', 'price' => 429.99, 'stock' => 20],
            ];
            
            foreach($elbiseler as $item) {
                Product::create([
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'description' => 'Şık ve modern tasarım. Kaliteli kumaş. Günlük ve özel günler için ideal.',
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'category_id' => $elbiseCategory->id,
                ]);
            }
        }
        
        // BLUZLAR
        $bluzCategory = $categories->where('slug', 'bluz')->first();
        if($bluzCategory) {
            $bluzlar = [
                ['name' => 'Beyaz Gömlek Bluz', 'price' => 199.99, 'stock' => 35],
                ['name' => 'Pembe Şifon Bluz', 'price' => 249.99, 'stock' => 28],
                ['name' => 'Siyah V Yaka Bluz', 'price' => 229.99, 'stock' => 30],
                ['name' => 'Desenli Crop Bluz', 'price' => 179.99, 'stock' => 40],
                ['name' => 'Krem Düğmeli Bluz', 'price' => 269.99, 'stock' => 25],
                ['name' => 'Mavi Kolsuz Bluz', 'price' => 189.99, 'stock' => 32],
                ['name' => 'Yeşil Fırfırlı Bluz', 'price' => 299.99, 'stock' => 20],
                ['name' => 'Bordo İşlemeli Bluz', 'price' => 319.99, 'stock' => 18],
            ];
            
            foreach($bluzlar as $item) {
                Product::create([
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'description' => 'Günlük kullanım için rahat ve şık. Kaliteli kumaş, dayanıklı dikişler.',
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'category_id' => $bluzCategory->id,
                ]);
            }
        }
        
        // PANTOLONLAR
        $pantolonCategory = $categories->where('slug', 'pantolon')->first();
        if($pantolonCategory) {
            $pantolonlar = [
                ['name' => 'Siyah Kumaş Pantolon', 'price' => 399.99, 'stock' => 25],
                ['name' => 'Mavi Jean Pantolon', 'price' => 349.99, 'stock' => 30],
                ['name' => 'Beyaz Wide Leg Pantolon', 'price' => 449.99, 'stock' => 20],
                ['name' => 'Gri Dar Kesim Pantolon', 'price' => 379.99, 'stock' => 22],
                ['name' => 'Kahverengi Keten Pantolon', 'price' => 419.99, 'stock' => 18],
                ['name' => 'Lacivert Klasik Pantolon', 'price' => 389.99, 'stock' => 28],
                ['name' => 'Haki Kargo Pantolon', 'price' => 429.99, 'stock' => 15],
            ];
            
            foreach($pantolonlar as $item) {
                Product::create([
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'description' => 'Rahat kesim, kaliteli kumaş. İş ve günlük kullanım için ideal.',
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'category_id' => $pantolonCategory->id,
                ]);
            }
        }
        
        // CEKETLER
        $ceketCategory = $categories->where('slug', 'ceket')->first();
        if($ceketCategory) {
            $ceketler = [
                ['name' => 'Siyah Blazer Ceket', 'price' => 799.99, 'stock' => 12],
                ['name' => 'Kot Ceket', 'price' => 499.99, 'stock' => 18],
                ['name' => 'Deri Ceket', 'price' => 1299.99, 'stock' => 8],
                ['name' => 'Kahverengi Süet Ceket', 'price' => 899.99, 'stock' => 10],
                ['name' => 'Beyaz Trençkot', 'price' => 749.99, 'stock' => 14],
                ['name' => 'Yeşil Bomber Ceket', 'price' => 649.99, 'stock' => 15],
            ];
            
            foreach($ceketler as $item) {
                Product::create([
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'description' => 'Şık ve modern tasarım. Kaliteli malzeme, rahat kesim.',
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'category_id' => $ceketCategory->id,
                ]);
            }
        }
        
        // ETEKLER
        $etekCategory = $categories->where('slug', 'etek')->first();
        if($etekCategory) {
            $etekler = [
                ['name' => 'Siyah Kalem Etek', 'price' => 299.99, 'stock' => 22],
                ['name' => 'Pileli Mini Etek', 'price' => 279.99, 'stock' => 25],
                ['name' => 'Jean Etek', 'price' => 349.99, 'stock' => 20],
                ['name' => 'Kırmızı A Kesim Etek', 'price' => 329.99, 'stock' => 18],
                ['name' => 'Midi Boy Plise Etek', 'price' => 399.99, 'stock' => 15],
                ['name' => 'Desenli Maxi Etek', 'price' => 449.99, 'stock' => 12],
            ];
            
            foreach($etekler as $item) {
                Product::create([
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'description' => 'Şık ve rahat. Kaliteli kumaş, modern tasarım.',
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'category_id' => $etekCategory->id,
                ]);
            }
        }
        
        // TİŞÖRTLER
        $tisortCategory = $categories->where('slug', 'tisort')->first();
        if($tisortCategory) {
            $tisortler = [
                ['name' => 'Beyaz Basic Tişört', 'price' => 129.99, 'stock' => 50],
                ['name' => 'Siyah V Yaka Tişört', 'price' => 149.99, 'stock' => 45],
                ['name' => 'Gri Oversize Tişört', 'price' => 189.99, 'stock' => 40],
                ['name' => 'Lacivert Polo Tişört', 'price' => 199.99, 'stock' => 35],
                ['name' => 'Baskılı Crop Tişört', 'price' => 169.99, 'stock' => 38],
                ['name' => 'Çizgili Uzun Kollu Tişört', 'price' => 179.99, 'stock' => 42],
            ];
            
            foreach($tisortler as $item) {
                Product::create([
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'description' => '%100 pamuk, rahat kesim. Günlük kullanım için ideal.',
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'category_id' => $tisortCategory->id,
                ]);
            }
        }
    }
}