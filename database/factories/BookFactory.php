<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    <?php

    namespace Database\Factories;
    
    use Illuminate\Database\Eloquent\Factories\Factory;
    
    class BookFactory extends Factory
    {
        public function definition()
        {
            return [
                'title' => $this->faker->sentence(3),
                'description' => $this->faker->paragraph(3),
                'is_available' => $this->faker->boolean(80) // 80% chance of being available
            ];
        }
    }
}
