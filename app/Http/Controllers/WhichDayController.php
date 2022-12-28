<?php

namespace App\Http\Controllers;

use App\Models\WhichDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhichDayController extends Controller
{
    public function store(Request $request, $activity_code = '0000')
    {
        /*
         * validation
         */
        $validator = Validator::make($request->all(), [
            'which-day' => ["required", 'date'],
            'wechat-name' => ["required", 'string'],
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
        $whichDay->activity_code = $activity_code;

        $whichDay->save();

        $request->session()->put('activity_code', $activity_code);
        $request->session()->put('whichDay', $whichDay);

        return redirect()->route('thank-you', ['date' => $attributes['which-day']]);
    }
}
