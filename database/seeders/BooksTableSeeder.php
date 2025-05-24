<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        // Create 50 books using the factory
        Book::factory()->count(50)->create();
    }
}