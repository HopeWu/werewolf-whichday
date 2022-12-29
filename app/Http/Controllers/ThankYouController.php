<?php

namespace App\Http\Controllers;

use App\Models\WhichDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThankYouController extends Controller
{
    public function index(Request $request, $date = null)
    {
        /*
         * get a random fun pic
         * a bit hacky
         */
        $directory = public_path('images/funpics');
        $directory .= '/';
        $files = glob($directory.'*');
        $seed = rand(0,100000);
        $mod = count($files);
        $funPicPath = $files[$seed % $mod];
        $pathForClient = substr($funPicPath, strlen(public_path()));
        $funPicPath = $pathForClient;


        if ($date == null){
            return view('thank-you',['funPicPath'=>$funPicPath]);
        }elseif (!$request->session()->has('activity_code')){
            return view('thank-you',['funPicPath'=>$funPicPath]);
        }else{
            $activity_code = $request->session()->get('activity_code');
            $result = WhichDay::resultOf($activity_code);
            $keys = array_keys($result);

            /*
             * If this vote doesn't belong to the most populous two votes
             * and the majority has formed(e.g. 3 have voted the same),
             * we hint the user, and maybe he wants to vote again.
             * @param majority
             */
            $majority = 3;
            if($result[$keys[0]] >= $majority
                and
                ($date != $keys[0] and $date != $keys[1])
            ){
                return view('thank-you', [
                    'funPicPath'=>$funPicPath,
                    'date1' => $keys[0],
                    'date2' => $keys[1],
                    'count1' => $result[$keys[0]],
                    'count2' => $result[$keys[1]],
                ]);
            }else{
                return view('thank-you',['funPicPath'=>$funPicPath]);
            }
        }
    }
}
