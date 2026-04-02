<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixSeeder extends Seeder
{
    public function run(): void
    {
        // Foreign key kısıtlamasını geçici kapat
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kategoriler = [
            ['name' => 'Elbise',   'slug' => 'elbise'],
            ['name' => 'Bluz',     'slug' => 'bluz'],
            ['name' => 'Pantolon', 'slug' => 'pantolon'],
            ['name' => 'Ceket',    'slug' => 'ceket'],
            ['name' => 'Etek',     'slug' => 'etek'],
            ['name' => 'Tişört',   'slug' => 'tisort'],
            ['name' => 'Kazak',    'slug' => 'kazak'],
            ['name' => 'Mont',     'slug' => 'mont'],
            ['name' => 'Trençkot', 'slug' => 'trencekot'],
            ['name' => 'Eşofman',  'slug' => 'esofman'],
        ];

        foreach ($kategoriler as $kat) {
            DB::table('categories')->insert(array_merge($kat, [
                'description' => null,
                'image'       => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]));
        }

        $catIds = DB::table('categories')->pluck('id')->toArray();

        $gorseller = [
           $gorseller = [
    // Elbise
    'https://cdn.dsmcdn.com/ty1522/product/media/images/prod/QC/20240115/16/5e3c5e3c-5e3c-5e3c-5e3c-5e3c5e3c5e3c/1_org_zoom.jpg',
    // Bluz  
    'https://cdn.dsmcdn.com/ty1/product/media/images/20201007/20/11031238/1/1/1_org.jpg',
];            'https://images.unsplash.com/photo-1496747611176-843222e1e57c?w=600&q=80',
            'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=600&q=80',
            'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?w=600&q=80',
            'https://images.unsplash.com/photo-1583744946564-b52ac1c389c8?w=600&q=80',
            'https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=600&q=80',
            'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&q=80',
            'https://images.unsplash.com/photo-1485230895905-ec40ba36b9bc?w=600&q=80',
            'https://images.unsplash.com/photo-1475180098004-ca77a66827be?w=600&q=80',
        ];

        $urunler = DB::table('products')->get();
        $i = 0;

        foreach ($urunler as $urun) {
            DB::table('products')->where('id', $urun->id)->update([
                'category_id' => $catIds[$i % count($catIds)],
                'image'       => $gorseller[$i % count($gorseller)],
            ]);
            $i++;
        }
    }
}