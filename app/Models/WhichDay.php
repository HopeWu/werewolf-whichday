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

    public static function votesOf($activity_code){
        return self::select('wechat_name', DB::raw('MAX(which_day) as which_day'), DB::raw('MAX(time) as time'))
            ->where('activity_code', '=', $activity_code)
            ->groupBy('wechat_name')
            ->get();
    }

    public static function votesSince($date, $activity_code){
        return self::select('wechat_name', DB::raw('MAX(which_day) as which_day'), DB::raw('MAX(time) as time'))
            ->where('which_day', '>=', $date)
            ->where('activity_code', '=', $activity_code)
            ->groupBy('wechat_name')
            ->get();
    }

    public static function votedBy($wechatName){
        return self::where('wechat_name', '=', $wechatName)
            ->orderBy('which_day', 'desc')
            ->take(10)
            ->get();
    }
    public static function resultOf($activity_code): array
    {
        $votes = self::select('wechat_name', DB::raw('MAX(which_day) as which_day'), DB::raw('MAX(time) as time'))
            ->where('activity_code', '=', $activity_code)
            ->groupBy('wechat_name')
            ->get();

        $counter = [];
        foreach ($votes as $vote){
            if(array_key_exists($vote->which_day, $counter)){
                $counter[$vote->which_day] += 1;
            }else{
                $counter[$vote->which_day] = 1;
            }
        }
        arsort($counter);
        return array_slice($counter, 0, 5);
    }

    public static function resultSince($date, $activity_code): array
    {
        $votes = self::select('wechat_name', DB::raw('MAX(which_day) as which_day'), DB::raw('MAX(time) as time'))
            ->where('which_day', '>=', $date)
            ->where('activity_code', '=', $activity_code)
            ->groupBy('wechat_name')
            ->get();

        $counter = [];
        foreach ($votes as $vote){
            if(array_key_exists($vote->which_day, $counter)){
                $counter[$vote->which_day] += 1;
            }else{
                $counter[$vote->which_day] = 1;
            }
        }
        arsort($counter);
        return array_slice($counter, 0, 5);
    }
}
