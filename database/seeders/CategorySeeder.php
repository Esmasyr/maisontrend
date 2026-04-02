<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Elbise',
                'slug' => 'elbise',
                'description' => 'Şık ve zarif elbise modelleri'
            ],
            [
                'name' => 'Bluz',
                'slug' => 'bluz',
                'description' => 'Günlük ve ofis için bluz modelleri'
            ],
            [
                'name' => 'Pantolon',
                'slug' => 'pantolon',
                'description' => 'Rahat ve şık pantolon modelleri'
            ],
            [
                'name' => 'Ceket',
                'slug' => 'ceket',
                'description' => 'Trend ceket ve mont modelleri'
            ],
            [
                'name' => 'Etek',
                'slug' => 'etek',
                'description' => 'Farklı stil ve boylarda etek modelleri'
            ],
            [
                'name' => 'Tişört',
                'slug' => 'tisort',
                'description' => 'Rahat günlük tişört modelleri'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}