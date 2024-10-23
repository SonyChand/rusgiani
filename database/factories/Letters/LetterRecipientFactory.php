<?php

// LetterRecipientFactory.php
namespace Database\Factories\Letters;

use App\Models\Letters\Letter;
use App\Models\Letters\LetterRecipient;
use Illuminate\Database\Eloquent\Factories\Factory;

class LetterRecipientFactory extends Factory
{
    protected $model = LetterRecipient::class;

    public function definition()
    {
        return [
            'letter_id' => Letter::factory(),
            'name' => $this->faker->name,
            'email' => $this->faker->email,
        ];
    }
}
