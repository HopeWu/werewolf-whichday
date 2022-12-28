<?php

namespace App\Http\Controllers;

use App\Models\WhichDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPanelController extends Controller
{
    public function index(Request $request)
    {
        $isEmpty = true;
        $validator_list = Validator::make($request->all(), [
            'since' => ['required']
        ]);
        if (!$validator_list->fails()) {
            $isEmpty = false;
            $validator_list = Validator::make($request->all(), [
                'since' => ['date'],
                'activity-code' => ['required', 'string'],
            ]);

            if ($validator_list->fails()) {
                return redirect(url()->previous())
                    ->withErrors($validator_list)
                    ->withInput();
            }else{
                $attributes = $validator_list->validated();
                $votes = WhichDay::votesSince($attributes['since'], $attributes['activity-code']);

                return view('admin', [
                    'votes' => $votes,
                ]);
            }
        }

        $validator_search = Validator::make($request->all(), [
            'wechat-name' => ['required']
        ]);
        if (!$validator_search->fails()) {
            $isEmpty = false;
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

        $validator_result = Validator::make($request->all(), [
            'result-since' => ['required']
        ]);
        if (!$validator_result->fails()) {
            $isEmpty = false;
            $validator_result = Validator::make($request->all(), [
                'result-since' => ['date'],
                'activity-code' => ['required', 'string'],
            ]);

            if ($validator_result->fails()) {
                return redirect(url()->previous())
                    ->withErrors($validator_result)
                    ->withInput();
            }else{
                $attributes = $validator_result->validated();
                $counter = WhichDay::resultSince($attributes['result-since'], $attributes['activity-code']);

                return view('admin', [
                    'counter' => $counter,
                ]);
            }
        }

        return redirect(url()->previous())
            ->withErrors($validator_result)
            ->withInput();
    }
}
