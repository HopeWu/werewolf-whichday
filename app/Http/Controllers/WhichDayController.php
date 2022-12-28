<?php

namespace App\Http\Controllers;

use App\Models\WhichDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhichDayController extends Controller
{
    public function store(Request $request, $activity_code)
    {
        /*
         * validation
         */
        $validator = Validator::make($request->all(), [
            'which-day' => ["required", 'date'],
            'wechat-name' => ["required", 'string'],
            'time' => ["required", 'date_format:H:i'],
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }
        $attributes = $validator->validated();

        if(!isset($activity_code)){
            $activity_code = '0000';
        }

        $whichDay = new WhichDay;
        $whichDay->wechat_name = $attributes['wechat-name'];
        $whichDay->which_day = $attributes['which-day'];
        $whichDay->time = $attributes['time'];
        $whichDay->activity_code = $activity_code;

        $whichDay->save();

        return view('thank-you', ['whichDay' => $whichDay]);
    }
}
