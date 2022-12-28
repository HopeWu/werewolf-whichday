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
         * check the voting records
         */
        $validator_list = Validator::make($request->all(), [
            'activity-code-records' => ['required'],
        ]);
        if (!$validator_list->fails()) {
            $validator_list = Validator::make($request->all(), [
                'activity-code-records' => ['string'],
            ]);

            if ($validator_list->fails()) {
                return redirect(url()->previous())
                    ->withErrors($validator_list)
                    ->withInput();
            }else{
                $attributes = $validator_list->validated();
                $votes = WhichDay::votesOf($attributes['activity-code-records']);

                return view('admin', [
                    'votes' => $votes,
                ]);
            }
        }

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
            }else{
                $attributes = $validator_search->validated();
                $records = WhichDay::votedBy($attributes['wechat-name']);

                return view('admin', [
                    'records' => $records,
                ]);
            }
        }

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
                $counter = WhichDay::resultOf($attributes['activity-code-result']);

                return view('admin', [
                    'counter' => $counter,
                ]);
            }
        }

        /*
         * all empty
         */
        return redirect(url()->previous())
            ->withErrors($validator_result)
            ->withInput();
    }
}
