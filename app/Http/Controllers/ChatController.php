<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatRoom;
use App\ChatRoomUser;
use App\ChatMessage;
use App\User;
// use App\Http\Controllers\Chat;

use App\Events\ChatPusher;

use Auth;

class ChatController extends Controller
{
    public static function show(Request $request){
    
    if(isset($user_id)){
        $matching_user_id = $user_id;
    }else{
        $matching_user_id = $request->user_id;
    }

    // 自分の持っているチャットルームを取得
    $current_user_chat_rooms = ChatRoomUser::where('user_id', Auth::id())
    ->pluck('chat_room_id');

    // 自分の持っているチャットルームからチャット相手のいるルームを探す
    $chat_room_id = ChatRoomUser::whereIn('chat_room_id', $current_user_chat_rooms)
        ->where('user_id', $matching_user_id)
        // ->where('user_id', $matching_user_id)
        ->pluck('chat_room_id');

    //なければ作成する
    if ($chat_room_id->isEmpty()){

        ChatRoom::create(); //チャットルーム作成
        
        $latest_chat_room = ChatRoom::orderBy('created_at', 'desc')->first(); //最新チャットルームを取得

        $chat_room_id = $latest_chat_room->id;

        //新規登録 モデル側 $fillableで許可したフィールドを指定して保存
        ChatRoomUser::create( 
        ['chat_room_id' => $chat_room_id,
        'user_id' => Auth::id()]);

        ChatRoomUser::create(
        ['chat_room_id' => $chat_room_id,
        'user_id' => $matching_user_id]);
    }

    //チャットルーム取得時はオブジェクト型なので数値に変換
    if(is_object($chat_room_id)){
        $chat_room_id = $chat_room_id->first();
    }
    
    //チャット相手のユーザー情報を取得
    $chat_room_user = User::findOrFail($matching_user_id);

    //チャット相手のユーザー名を取得(JS用)
    $chat_room_user_name = $chat_room_user->name;

    $chat_messages = ChatMessage::where('chat_room_id', $chat_room_id)
    ->orderby('created_at')
    ->get();
    // dd($chat_messages);

    return view('chat.chat_show', compact('chat_room'))
    ->with('chat_room_id', $chat_room_id)
    ->with('chat_room_user', $chat_room_user)
    ->with('chat_messages', $chat_messages)
    ->with('chat_room_user_name', $chat_room_user_name);
    
    
    // return view('chat.chat_show')->with([
    //     'chat_room_id', $chat_room_id,
    //     'chat_room_user', $chat_room_user,
    //     'chat_messages', $chat_messages,
    //     'chat_room_user_name', $chat_room_user_name
    //     ]);
    
    }
    
    //chat.chat
    public static function chat(Request $request){
        // $chat_room_user = json_decode($request->chat_room_user);
        $chat = new ChatMessage();
        $chat->chat_room_id = $request->chat_room_id;
        $chat->user_id = $request->user_id;
        // $chat->user_id = $request->chat_room_user->id;
        // $chat->chat_room_user = chat_room_user;
        $chat->message = $request->message;
        // $chat->photo = $request->photo;
        // $chat->referral_letter_id= $request->referral_letter_id;
        // $chat->patient_memo_id = $request->patient_memo_id;
        $chat->save();
        
        // dd($chat);
    
        // チャットが投稿されたらデータベースに保存した後、イベント発火。

        // event(new ChatPusher($chat));
        
        //return view('chat.chat_show', compact('chat_room_id', 'user_id','message'));
            // 'chat_room_id' => json_decode($request->chat_room_id),
            // 'chat_room_user' => json_decode($request->chat_room_user),

        return redirect('/chat/chat_show');

        // return view('chat.chat_show')->with([
        //     'user_id' => $request->user_id
        // ]);
        
        // $auths = Auth::user();
        // return view('chat.chat_show', ['auth' => $auths]);

    }
}
