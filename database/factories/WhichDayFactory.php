<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WhichDay>
 */
class WhichDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'wechat_name' => fake()->name(),
            'which_day' => fake()->date(),
            'time' => fake()->time(),
        ];
    }
}
