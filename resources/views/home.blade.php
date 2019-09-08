@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- 連携一覧 -->
    <div class="container">
    <div class="mt-5">
      <h4 class="pageTitle">＜連携実施医院 一覧＞</h4>
      <div class="matchingList">
		@foreach( $matching_users as $user)
          <div class="matchingClinic">
          <!--<div class="matchingclinic_img"><img src="/storage/images/{{ $user->img_name}}"></div>-->
            <div class="matchingClinic_name">{{ $user->name }}</div>
            <form method="GET" action="{{ route('chat.chat_show') }}">
            {{ csrf_field() }}
              <input name="user_id" type="hidden" value="{{$user->id}}">
              <button type="submit" class="chatForm_btn">メッセージ</button>
            </form>
          </div>
        @endforeach
      </div>
      
    <div>
  </div>
    
    <!-- 「ユーザー画面（MyPage）」へ移行 -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                　<!--{{$user= Auth::user()}}-->
                　@if($user == Auth::user())
                  <a href="{{'/users/show/'.$user->id}}">
           　　　    　　　<button type="button" class="btn btn-primary">
                      MyPage
                      </button>
                  </a>
                  @endif
            </div>
        </div>
                
    <!-- 「検索ページ」へ移行 -->
        <!--<form action="{{ url('/search') }}" method="POST" class="form-horizontal">-->
            <!--{{ csrf_field() }}-->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a href="/search">
                    <button type="button" class="btn btn-primary">
                        新規連携先の検索
                    </button>
                </a>
            </div>
        </div>
    <!--</form>-->

                    
</div>

@endsection
