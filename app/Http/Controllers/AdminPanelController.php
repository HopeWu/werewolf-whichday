<?php

namespace App\Http\Controllers;

use App\Models\WhichDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPanelController extends Controller
{
    public function index(Request $request)
    {

        /*
         * check the voting records for a specified person
         */
        $validator_search = Validator::make($request->all(), [
            'wechat-name' => ['required']
        ]);
        if (!$validator_search->fails()) {
            $validator_search = Validator::make($request->all(), [
                'wechat-name' => ['string']
            ]);

            if ($validator_search->fails()) {
                return redirect(url()->previous())
                    ->withErrors($validator_search)
                    ->withInput();
            } else {
                $attributes = $validator_search->validated();
                $records = WhichDay::votedBy($attributes['wechat-name']);

                return view('admin', [
                    'records' => $records,
                ]);
            }
        } else {
            /*
            * check voting results
            */
            $validator_result = Validator::make($request->all(), [
                'activity-code-result' => ['required'],
            ]);
            if (!$validator_result->fails()) {
                $validator_result = Validator::make($request->all(), [
                    'activity-code-result' => ['string'],
                ]);

                if ($validator_result->fails()) {
                    return redirect(url()->previous())
                        ->withErrors($validator_result)
                        ->withInput();
                }else{
                    $attributes = $validator_result->validated();
                    $activity_code = $attributes['activity-code-result'];
                }
            }else{
                $activity_code = '0000';
            }
            $counter = WhichDay::resultOf($activity_code);
            $votes = WhichDay::votesOf($activity_code);

            return view('admin', [
                'counter' => $counter,
                'votes' => $votes,
            ]);
        }
    }
}
