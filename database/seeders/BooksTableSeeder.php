<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    <?php

    namespace Database\Seeders;
    
    use App\Models\Book;
    use Illuminate\Database\Seeder;
    
    class BooksTableSeeder extends Seeder
    {
        public function run()
        {
            $genres = ['Fiction', 'Non-Fiction', 'Science', 'History', 'Biography', 'Fantasy'];
            
            Book::factory(50)->create()->each(function ($book) use ($genres) {
                $book->update([
                    'genre' => $genres[array_rand($genres)],
                    'price' => rand(5, 30) + (rand(0, 99) / 100)
                ]);
            });
        }
    }
}
