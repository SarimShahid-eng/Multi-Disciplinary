<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Journal>
 */
class JournalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Impact in Computer Science',
            'email'=>'sarimshah456@gmail.com',
            'issn' => '1940-087X',
            'editor_in_chief_id' => 3,
            'description' => 'Journal of Computer science',


        ];
    }
}
