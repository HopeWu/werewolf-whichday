<?php

namespace App\Http\Controllers;

use App\Models\WhichDay;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index(Request $request){
        $attributes = $request->validate([
            'since' => ['required', 'date']
        ]);
        $votes = WhichDay::votesSince($attributes['since']);

        return view('admin', [
            'votes' => $votes,
        ]);
    }
}
