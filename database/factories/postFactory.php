<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => "Titre",
            'description' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'image' => fake()->randomelement(['images/cayeux-services-payants.jpg','images/elizeu-dias-RN6ts8IZ4_0-unsplash.jpg','images/istockphoto-489833698-612x612.jpg']),
        
            'user_id'=> User::all()->random()->id,
        ];
    }
}
