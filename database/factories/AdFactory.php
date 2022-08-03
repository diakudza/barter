<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=> $this->faker->numberBetween('1','1000'),
            'title' => fake('ru_RU')->realTextBetween('10','20'),
            'text' => fake('ru_RU')->realTextBetween('100','300'),
            'category_id'=> $this->faker->numberBetween('1','10'),
            'city_id'=> $this->faker->numberBetween('1','200'),
            'image'=> $this->faker->image('public/images',640,480, null, false, true),
            'barter_type'=> $this->faker->randomElement(['free' ,'barter']),
            'status'=> $this->faker->randomElement(['active', 'archived', 'delete']),
        ];
    }

}
