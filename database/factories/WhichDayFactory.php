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
            'activity_code' => '0000',
            'reserve1' => '0000',
            'reserve2' => '0000',
            'reserve3' => '0000',
            'reserve4' => '0000',
        ];
    }
}
