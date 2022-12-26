<?php

namespace Database\Seeders;

use App\Models\WhichDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class WhichDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WhichDay::factory()
        ->count(10)
        ->create();
    }
}
