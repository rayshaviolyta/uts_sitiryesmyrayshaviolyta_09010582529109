<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $pemrograman = Category::where('name', 'Pemrograman')->first();
        $basisData = Category::where('name', 'Basis Data')->first();
        $jaringan = Category::where('name', 'Jaringan Komputer')->first();

        $books = [
            ['category_id' => $pemrograman->id, 'title' => 'Belajar Laravel untuk Pemula', 'author' => 'Andi Pratama', 'publisher' => 'Informatika', 'year' => 2023, 'stock' => 10],
            ['category_id' => $pemrograman->id, 'title' => 'Dasar-Dasar PHP Modern', 'author' => 'Rina Kusuma', 'publisher' => 'Andi Offset', 'year' => 2022, 'stock' => 7],
            ['category_id' => $basisData->id, 'title' => 'Perancangan Basis Data Relasional', 'author' => 'Budi Santoso', 'publisher' => 'Gramedia', 'year' => 2021, 'stock' => 5],
            ['category_id' => $basisData->id, 'title' => 'Mastering SQL', 'author' => 'Dewi Lestari', 'publisher' => 'Elex Media', 'year' => 2020, 'stock' => 8],
            ['category_id' => $jaringan->id, 'title' => 'Jaringan Komputer Dasar', 'author' => 'Hendra Wijaya', 'publisher' => 'Erlangga', 'year' => 2019, 'stock' => 6],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
