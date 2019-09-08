<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reaction;
use Auth;
use App\Constant\Status;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $got_reaction_ids = Reaction::where([
            ['to_user_id', Auth::id()], //to_user_id＝自分
            ['status', Status::APPLY]
            ])->pluck('from_user_id');
        $matching_ids = Reaction::whereIn('to_user_id', $got_reaction_ids)
        ->where('status', Status::APPLY)
        ->where('from_user_id', Auth::id())
        ->pluck('to_user_id');
        $matching_users = User::whereIn('id', $matching_ids)->get();
        
        // return view('home');
        // return view('home', compact('users','matching_users'));
        
        
        // $userCount = $users->count(); //追加
        // $from_user_id = Auth::id(); //追加

        return view('home', ['users'=>$users,'matching_users'=>$matching_users]);
        // return view('search', compact('users'));
        // ->with('userCount', $userCount) //追加
        // ->with('from_user_id', $from_user_id); //追加
    }
    
    // 連携先候補一覧の表示？
    // MyPageへの移行？
    public function show()
    {
        $user = User::orderBy('created_at', 'asc')->get();
        return view('home', [
            'user' => $user
        ]);
        
        // $user = User::orderBy('created_at', 'asc')->first();
        // return view('home', [
        //     'user' => $user
        // ]);
    }
}
