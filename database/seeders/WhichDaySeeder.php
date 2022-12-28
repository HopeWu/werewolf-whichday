<?php

namespace Database\Seeders;

use App\Models\WhichDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


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

        DB::table('which_day')->insert([
            'which_day'=>Carbon::tomorrow(),
            'wechat_name'=>'Hope',
            'activity_code'=>'0000',
        ]);
        DB::table('which_day')->insert([
            'which_day'=>Carbon::tomorrow(),
            'wechat_name'=>'Olivia',
            'activity_code'=>'0000',
        ]);
        DB::table('which_day')->insert([
            'which_day'=>Carbon::tomorrow(),
            'wechat_name'=>'Alice',
            'activity_code'=>'0000',
        ]);
        DB::table('which_day')->insert([
            'which_day'=>Carbon::tomorrow(),
            'wechat_name'=>'Bob',
            'activity_code'=>'0000',
        ]);
    }
}
