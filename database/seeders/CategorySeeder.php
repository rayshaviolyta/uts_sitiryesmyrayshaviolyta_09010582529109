<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Pemrograman', 'description' => 'Buku seputar bahasa pemrograman dan pengembangan perangkat lunak.'],
            ['name' => 'Basis Data', 'description' => 'Buku tentang perancangan dan pengelolaan basis data.'],
            ['name' => 'Jaringan Komputer', 'description' => 'Buku tentang jaringan, protokol, dan keamanan jaringan.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
