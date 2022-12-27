<?php

namespace App\Http\Controllers;

use App\Models\WhichDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPanelController extends Controller
{
    public function index(Request $request)
    {

        $validator_list = Validator::make($request->all(), [
            'since' => ['required', 'date']
        ]);

        if (!$validator_list->fails()) {
            $attributes = $validator_list->validated();
            $votes = WhichDay::votesSince($attributes['since']);

            return view('admin', [
                'votes' => $votes,
            ]);
        } else {
            $validator_search = Validator::make($request->all(), [
                'wechat-name' => ['required', 'string'],
            ]);

            if (!$validator_search->fails()) {
                $attributes = $validator_search->validated();
                $records = WhichDay::votedBy($attributes['wechat-name']);

                return view('admin', [
                        'records' => $records,
                ]);
            } else {
                return redirect(url()->previous())
                    ->withErrors($validator_list)
                    ->withInput();
            }
        }
    }
}
