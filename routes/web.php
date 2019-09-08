<?php
use App\Home;
use App\Users\show;
use App\User;
// use Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** user情報 関連のイベント------------------------------*/
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
        Route::get('show/{id}', 'UsersController@show')->name('users.show');
        Route::post('edit/{id}', 'UsersController@edit')->name('users.edit'); //追記
        Route::post('update/{id}', 'UsersController@update')->name('users.update'); //追記
});
/** ----------------------------------------------------*/

Route::get('/', function () {
    return view('top');
});

Auth::routes();

/** home 関連のイベント---------------------------------*/
/** home の表示*/
Route::get('/home', 'HomeController@index')->name('home');

/** 「ユーザー画面（MyPage）」へ移行(home.blade.php⇒show.blade.php)*/
Route::get('/users/show','HomeController@show' );

/** 「連携先検索画面」へ移行(home.blade.php⇒search.blade.php)*/
Route::get('/search', 'SearchController@index');
// Route::get('/search/{user}', 'SearchController@index');
// Route::post('/search', 'SearchController@search');

/** 「メッセージ画面」へ移行(Home⇒chat_show.blade.php)*/
// Route::get('home/chat/chat_show', 'MatchingController@index')->name('matching'); 
/** ----------------------------------------------------*/

/** search.blade.php 内でのイベント---------------------*/
/** 「連携先候補一覧」の表示*/
Route::get('/search','SearchController@show' );

/** 検索機能*/
Route::post('/search','SearchController@search');
// Route::get('/users/show','SearchController@search');
/** ---------------------------------------------------*/


/** 「ユーザー情報編集画面」へ移行(edit.blade.php)*/
// Route::post('/users/show' , function() {
//     return view('/users/show') ;
// // });
// Route::post('/users/edit' , function(Request $request){
//     return view('/users/edit') ;
// });

/** search画面で連携申請(search.blade.php)*/
Route::post('/apply', 'ReactionsController@create');
Route::post('/home', 'ReactionsController@create');

/** マッチングコントローラー*/
Route::get('home/matching', 'MatchingController@index')->name('matching'); 
// Route::get('matching', 'MatchingController@index')->name('matching'); 

// Route::group(['middleware' => ['auth']], function () {
//     Route::get('home', 'MatchingController@index')->name('matching');
//   });

/** マッチングすることでチ  ャットルームを開ける*/
Route::group(['prefix' => 'chat', 'middleware' => 'auth'], function () {
    Route::get('chat_show', 'ChatController@show')->name('chat.chat_show');
    // Route::get('matching', 'ChatController@show')->name('chat.chat_show');
    // Route::post('chat', 'ChatController@chat')->name('chat.chat');
    Route::post('chat', 'ChatController@chat')->name('chat.chat');
});


