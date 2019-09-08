<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Reaction;
use App\Constant\Status;
use Log;

class ReactionsController extends Controller
{
    public function create(Request $request)
    {
        Log::debug($request);

        $to_user_id = $request->to_user_id;
        $apply_status = $request->reaction;
        $from_user_id = $request->from_user_id;

        if ($apply_status === 'apply'){
            $status = Status::APPLY;
        }
        else{
            $status = Status::DISAPPLY;
        }

        $checkReaction = Reaction::where([
        ['to_user_id', $to_user_id],
        ['from_user_id', $from_user_id]
        ])->get();

        if($checkReaction->isEmpty()){
            
            $reaction = new Reaction();

            $reaction->to_user_id = $to_user_id;
            $reaction->from_user_id = $from_user_id; 
            $reaction->status = $status;
            
            $reaction->save();
            
        }
        
        //連携の承認画面への移動
        // $apply_users = Reaction::where([
        // ['from_user_id', $from_user_id],
        // // ['to_user_id', $to_user_id],
        // ])->get();
        
        // return view('home', compact('apply_users'))
        // ->with('apply_users_count', $apply_users_count);

    }
}
