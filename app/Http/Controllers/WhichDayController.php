<?php

namespace App\Http\Controllers;

use App\Models\WhichDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhichDayController extends Controller
{
    public function store(Request $request)
    {
        /*
         * validation
         */
        $validator = Validator::make($request->all(), [
            'which-day' => ["required", 'date'],
            'wechat-name' => ["required", 'string'],
            'time' => ["required", 'time'],
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }
        $attributes = $validator->validated();

        $whichDay = new WhichDay;
        $whichDay->wechat_name = $attributes['wechat-name'];
        $whichDay->which_day = $attributes['which-day'];
        $whichDay->time = $attributes['time'];

        $whichDay->save();

        return view('thank-you', ['wname' => $attributes['wechat-name']]);
    }
}
