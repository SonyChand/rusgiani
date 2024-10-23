<?php

// LetterClassificationFactory.php
namespace Database\Factories\Letters;

use App\Models\Letters\LetterClassification;
use Illuminate\Database\Eloquent\Factories\Factory;

class LetterClassificationFactory extends Factory
{
    protected $model = LetterClassification::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
