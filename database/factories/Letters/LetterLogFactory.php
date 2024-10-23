<?php

// LetterLogFactory.php
namespace Database\Factories\Letters;

use App\Models\User;
use App\Models\Letters\Letter;
use App\Models\Letters\LetterLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class LetterLogFactory extends Factory
{
    protected $model = LetterLog::class;

    public function definition()
    {
        return [
            'letter_id' => Letter::factory(),
            'user_id' => User::factory(),
            'action' => $this->faker->word,
        ];
    }
}
