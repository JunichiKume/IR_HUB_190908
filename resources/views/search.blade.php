@extends('layouts.layout')

@section('content')
<div class=search>
    <thead>
        <th>＜連携先検索＞</th>
        <th>&nbsp;</th>
    </thead>
    <form action="{{ url('/search') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div>
            <p>医療機関カテゴリー</p>
            <input type="search" name="clinic_category"/>
        </div>
        <div>
            <p>連携希望の疾患名</p>
            <input type="search" name="disease_name"/>
        </div>
        <div>
            <p>医療機関所在地</p>
            <input type="search" name="clinic_address"/>
        </div>
        <div class="form-group" >
            <button type="submit" class="btn btn-primary">
                検索
            </button>
        </div>
    </form> 
    
    <div class="userAction_edit">
      <td>
        <a href="/search">
        <button type="button" class="btn btn-primary">
        全てを表示
        </button>
        </a>
      </td>
    </div>
    <div class="userAction_edit">
      <td>
        <a href="/home">
        <button type="button" class="btn btn-primary">
        ホーム
        </button>
        </a>
      </td>
    </div>
    
</div>

<!-- 連携先候補一覧 -->
    @if (count($user) > 0 )
        <div class="card-body">
            <!--ページネーション-->
            <div> {{ $user->links() }}</div>
            <!--連携先候補一覧-->
            <div class="card-body">
            <table class="table table-striped task-table">
            <!-- テーブルヘッダ -->
                <thead>
                    <th>連携先候補一覧</th>
                    <th>&nbsp;</th>
                </thead>
            <!-- テーブル本体 -->
                <tbody>
                    @foreach ($user as $user)
                    <tr>
                        @if($user != Auth::user())
                            <!-- 医療機関名 -->
                            <td class="table-text">
                                <div> {{ $user->name }} </div>
                            </td>
                            <!-- 医療機関カテゴリー -->
                            <td class="table-text">
                                <div> {{ $user->clinic_category }} </div>
                            </td>
                            <!-- 連携希望疾患名 -->
                            <td class="table-text">
                                <div> {{ $user->disease_name }} </div>
                            </td>
                            <!-- 医療機関所在地 -->
                            <td class="table-text">
                                <div> {{ $user->clinic_address }} </div>
                            </td>
                        
                            <!-- 連携先: 詳細ボタン -->
                            <td>
                                <a href={{'/users/show/'.$user->id}}>
                                    <button type="button" class="btn btn-primary">
                                    詳細
                                    </button>
                                </a>
                            </td>
                            
                            <!-- 連携申請ボタン -->
                            <td>
                                <form action="{{ url('/apply')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="from_user_id" value="{{Auth::id()}}">
                                    <input type="hidden" name="to_user_id" value="{{$user->id}}">
                                    <input type="hidden" name="reaction" value="apply">
                                    <button type="submit" class="btn btn-primary">
                                    連携申請
                                    </button>
                                </form>
                            </td>
                            
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        @endif

@endsection
