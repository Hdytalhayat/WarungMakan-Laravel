<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;
use App\Models\menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Categories::first();

        menu::create([
            'cate_id' => $category->id,
            'name' => 'Pizza Spesial',
            'slug' => 'pizza-spesial',
            'small_description' => 'Pizza dengan topping lengkap.',
            'description' => 'Pizza dengan topping lengkap.',
            'original_price' => '25000',
            'menu_price' => '20000',
            'image' => 'pizza.jfif',
            'model' => 'pizza.glb',
            'status' => 0,
        ]);
    }
}
