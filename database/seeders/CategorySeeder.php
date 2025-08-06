<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::create([
            'name' => 'Makanan Berat',
            'slug' => 'Makanan Berat',
            'description' => 'Kategori makanan berat seperti nasi, mie, dan lainnya.',
            'status' => 0,
            'image' => 'food.jfif',
        ]);
    }
}
