<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reaction;
use App\User;
use Auth;

use App\Constant\Status;

class MatchingController extends Controller
{
    public static function index(){

        $got_reaction_ids = Reaction::where([
            ['to_user_id', Auth::id()], //to_user_id＝自分
            ['status', Status::APPLY]
            ])->pluck('from_user_id');
            // 自分(to_user_id)へAPPLYしてくれた人のIDを取得。pluck⇒LAPPLYしてくれた人のID情報のみを取得。
            // dd($got_reaction_ids);

        $matching_ids = Reaction::whereIn('to_user_id', $got_reaction_ids)
        ->where('status', Status::APPLY)
        ->where('from_user_id', Auth::id())
        ->pluck('to_user_id');
            // APPLYしてくれた人の中から、自分がAPPLYした人だけを抽出します
            // dd($matching_ids);

        $matching_users = User::whereIn('id', $matching_ids)->get();
        // WhereInを使うことで、APPLYしてくれた人のidだけを検索しつつ、自分(この場合はfrom_user_id)がAPPLYしている人を
        // 取得し再度IDを取得usersテーブルの中から、先ほど取得したID情報をWhereInで取得
        
        // $match_users_count = count($matching_users);
       
        // return view('home')->with('matching_users',$matching_users);
        
        return view('home', compact('matching_users'));
        // ->with('match_users_count', $match_users_count);
        dd($matching_users);
    }
}
