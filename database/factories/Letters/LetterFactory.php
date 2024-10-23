<?php

// LetterFactory.php
namespace Database\Factories\Letters;

use App\Models\Letters\Letter;
use App\Models\Letters\LetterCategory;
use App\Models\Letters\LetterSubcategory;
use App\Models\Letters\LetterClassification;
use Illuminate\Database\Eloquent\Factories\Factory;

class LetterFactory extends Factory
{
    protected $model = Letter::class;

    public function definition()
    {
        return [
            'letter_category_id' => LetterCategory::factory(),
            'letter_subcategory_id' => LetterSubcategory::factory(),
            'letter_classification_id' => LetterClassification::factory(),
            'number' => $this->faker->unique()->numerify('L#####'),
            'subject' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'date' => $this->faker->date,
        ];
    }
}
