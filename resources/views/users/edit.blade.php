@extends('layouts.layout')
    @section('content')
    <div class="row">
    <div class="col-md-12">
    
    <!--<form action="{{ url('/users/update') }}" method="POST">-->
    <form action="{{ url('/users/update/'.$user->id) }}" method="POST">
  
    <div>
        <p>医療機関名</p>
        <input type="text" name="name" value="{{$user->name}}"/>
    </div>
    <div>
        <p>理事長／院長名</p>
        <input type="text" name="doctor_name" value="{{$user->doctor_name}}"/>
    </div>
    <div>
        <p>郵便番号</p>　<!--input変更-->
        <input type="text" name="post_code" value="{{$user->post_code}}"/>　
    </div>
    <div>
        <p>医療機関住所</p>
        <input type="text" name="clinic_address" value="{{$user->clinic_address}}"/>
    </div>
    <div>
        <p>医療機関電話番号</p> <!--input変更-->
        <input type="text" name="clinic_phone_number" value="{{$user->clinic_phone_number}}"/>
    </div>
    <div>
        <p>Email</p> <!--input変更-->
        <input type="text" name="email" value="{{$user->email}}"/>
    </div>
    <div>
        <p>写真（メイン）</p> <!--input変更-->
        <input type="text" name="main_photo" value="{{$user->main_photo}}"/>
    </div>
    <div>
        <p>キャッチフレーズ</p> 
        <input type="text" name="tagline" value="{{$user->tagline}}"/>
    </div>
    <div>
        <p>医院PRポイント</p> 
        <input type="text" name="clinic_pr" value="{{$user->clinic_pr}}"/>
    </div>
    <div>
        <p>理事長／院長 略歴</p> 
        <input type="text" name="doctor_profile" value="{{$user->doctor_profile}}"/>
    </div>
    <div>
        <p>写真（院長）</p> <!--input変更-->
        <input type="text" name="doctor_photo" value="{{$user->doctor_photo}}"/>
    </div>
    <div>
        <p>Dr人数</p> <!--input変更-->
        <input type="text" name="doctor_number" value="{{$user->doctor_number}}"/>
    </div>
    <div>
        <p>スタッフ人数</p> <!--input変更-->
        <input type="text" name="staff_number" value="{{$user->staff_number}}"/>
    </div>
    <div>
        <p>人員構成詳細</p> <!--input変更-->
        <input type="text" name="personnel_details" value="{{$user->personnel_details}}"/>
    </div>
    <div>
        <p>医院URL</p> <!--input変更-->
        <input type="text" name="clinic_url" value="{{$user->clinic_url}}"/>
    </div>
    <div>
        <p>医療機関カテゴリー</p> <!--input変更-->
        <input type="text" name="clinic_category" value="{{$user->clinic_category}}"/>
    </div>
    <div>
        <p>診療項目</p> <!--input変更-->
        <input type="text" name="clinic_treatment" value="{{$user->clinic_treatment}}"/>
    </div>
    <div>
        <p>医療機関特徴</p> <!--input変更-->
        <input type="text" name="clinic_features" value="{{$user->clinic_features}}"/>
    </div>
    <div>
        <p>対象疾患名</p> <!--input変更-->
        <input type="text" name="disease_name" value="{{$user->disease_name}}"/>
    </div>
    <div>
        <p>所属学会</p> <!--input変更-->
        <input type="text" name="conference" value="{{$user->conference}}"/>
    </div>
    <div>
        <p>診療日</p> <!--input変更-->
        <input type="text" name="open_date" value="{{$user->open_date}}"/>
    </div>
    <div>
        <p>写真（サブ）</p> <!--input変更-->
        <input type="text" name="sub_photo" value="{{$user->sub_photo}}"/>
    </div>
   
 
    <!-- Save ボタン/Back ボタン -->
    <div class="well well-sm">
    <!--<form action="{{ url('/users/update'.$user->id) }}" method="POST">-->
    <!--    {{ csrf_field() }}-->
    <!--<a href="{{url('users/show/'.$user->id)}}">-->
        <button type="submit" class="btn btn-primary">Save</button>
    <!--</a>-->
    <a class="btn btn-primary" href="{{url('users/show/'.$user->id)}}">Back</a>
    <!--<a class="btn btn-link pull-right" href="{{ url('/') }}">Back</a>-->
    </div>
    <!--/ Save ボタン/Back ボタン -->
    
    <!-- id 値を送信 -->
    <input type="hidden" name="id" value="{{$user->id}}" />
    <!--/ id 値を送信 -->
    <!-- CSRF -->
    {{ csrf_field() }}
    <!--/ CSRF -->
    </form>
    </div>
    </div>
@endsection