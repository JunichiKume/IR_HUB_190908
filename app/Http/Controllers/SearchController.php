<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB; 
use Auth; //追記

class SearchController extends Controller
{
    // home.blade.php⇒search .blade.phpへの移行
    public function index()
    {
        return view('search') ;
        // $user = User::orderBy('created_at', 'asc')->get();
        // return view('search', [
        //     'user' => $user
        // ]);
    }
    
    // 連携先候補一覧の表示
    public function show()
    {
        // $user = User::orderBy('created_at', 'asc')->get();
        $user = User::orderBy('created_at', 'asc')->paginate(5);
        return view('search', [
            'user' => $user
        ]);
    }
    
    // 検索機能
        
    // public function search(Request $request)
    // {
    //     //キーワードを取得
    //     $keyword = $request->input('keyword');

    //     //もしキーワードが入力されている場合
    //     if(!empty($keyword))
    //     {   
    //         //医療機関名から検索
    //         // $clinic_category = $request->clinic_category;
    //         $user = DB::table('user')
    //                 ->where('clinic_category', 'like', '%'.$keyword.'%')
    //                 // ->paginate(4);
    //                 ->get();

    //         //リレーション関係にあるテーブルの材料名から検索
    //         // $recipes = Recipe::whereHas('ingredients', function ($query) use ($keyword){
    //         //     $query->where('ingredient', 'like','%'.$keyword.'%');
    //         // })->paginate(4);

    //     }else{//キーワードが入力されていない場合
    //         $user = DB::table('user')
    //         // ->paginate(4);
    //         ->get();
    //     }
    //     //検索フォームへ
    //     return view('search',[
    //         'user' => $user,
    //         'keyword' => $keyword,
    //         ]);
    //     //  return view('search')->with('user',$user)
    //     //   ->with('keyword',$keyword);
    //     // return view('search', compact('user', 'keyword'));
    // }
    
    public function search(Request $request)
    {
        $user = User::where('clinic_category', $request->clinic_category)->paginate(5);
        // $category = $request->clinic_category;
        // $disease = $request->disease_name;
        // $address = $request->clinic_address;
        // $user = User::where(function($query) use ($category,$disease,$address) {
        //     $query->orWhere("clinic_category","=",$category)
        //         ->orWhere("disease_name","=",$disease)
        //         ->orWhere("clinic_address","=",$address);
        // })->get();
        return view('search', [
            'user' => $user
        ]);
    }
}
