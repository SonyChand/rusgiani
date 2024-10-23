<?php

namespace Database\Factories\Letters;

use App\Models\Letters\Letter;
use App\Models\Letters\LetterAttachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class LetterAttachmentFactory extends Factory
{
    protected $model = LetterAttachment::class;

    public function definition()
    {
        return [
            'letter_id' => Letter::factory(),
            'name' => $this->faker->word,
            'path' => $this->faker->filePath,
        ];
    }
}
