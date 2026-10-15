<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Motori',
            'Informatica',
            'Elettrodomestici',
            'Libri',
            'Giochi',
            'Sport',
            'Immobili',
            'Abbigliamento',
            'Arredamento',
            'Musica',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}