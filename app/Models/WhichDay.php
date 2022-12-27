<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WhichDay extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $table = "which_day";

    public static function votesSince($date){
        return self::select('wechat_name', DB::raw('MAX(which_day) as which_day'), DB::raw('MAX(time) as time'))
            ->where('which_day', '>=', $date)
            ->groupBy('wechat_name')
            ->get();
    }
}
