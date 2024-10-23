<?php
// LetterCategoryFactory.php
namespace Database\Factories\Letters;

use App\Models\Letters\LetterCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class LetterCategoryFactory extends Factory
{
    protected $model = LetterCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
