@extends('layouts.layout')

@section('content')
<!--<div class="loginPage">-->
<!--    <h1>医療連携HUB</h1>-->
<!--    <div class="btn"><a href="{{ route('login') }}">メールアドレスでログインする</a></div>-->
<!--</div>-->
<div class="loginPage">
  <div class="container">
    <div class="loginPage_contents">
    <h1 class="h3 loginPage_contents_title">医療連携HUB</h1>
    <div class="btn loginPage_contents_btn"><a class="text-white" href="{{ route('login') }}">メールアドレスでログインする</a></div>
    </div>
  </div>
</div>
@endsection