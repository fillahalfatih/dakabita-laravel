<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
            'slug' => 'butter-cookies',
            'image' => 'butter-cookies.png',
            'emoji' => '🍪',
            'name' => 'Butter Cookies'
        ]);

        Category::create([
            'slug' => 'kue-kering',
            'image' => 'kue-kering.png',
            'emoji' => '🥐',
            'name' => 'Kue Kering'
        ]);

        Category::create([
            'slug' => 'bakery',
            'image' => 'bakery.png',
            'emoji' => '🥖',
            'name' => 'Bakery'
        ]);

        Product::factory(25)->create();
    }
}
