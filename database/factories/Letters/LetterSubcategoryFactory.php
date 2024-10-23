<?php
// LetterSubcategoryFactory.php
namespace Database\Factories\Letters;

use App\Models\Letters\LetterCategory;
use App\Models\Letters\LetterSubcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class LetterSubcategoryFactory extends Factory
{
    protected $model = LetterSubcategory::class;

    public function definition()
    {
        return [
            'letter_category_id' => LetterCategory::factory(),
            'name' => $this->faker->word,
        ];
    }
}
