@extends('layouts.layout')

@section('content')

<div class='usershowPage'>
<div class='container'>
  <div class=userInfo>
    <div class='userInfo_name'>{{ $user -> name }}</div>  <!--必須-->
    <!--<div><p>医療機関名：</p><div class='userInfo_name'>{{ $user -> name }}</div></div>  <!--必須-->
    <div class='userInfo_doctor_name'>{{ $user -> doctor_name }}</div>  <!--必須-->
    <!--<div><p>理事長／院長名：</p><div class='userInfo_doctor_name'>{{ $user -> doctor_name }}</div> </div>  <!--必須-->
    <div class='userInfo_post_code'>{{ $user -> post_code }}</div>   <!--必須-->
    <div class='userInfo_clinic_address'>{{ $user -> clinic_address }}</div>   <!--必須-->
    <div class='userInfo_clinic_phone_number'>{{ $user -> clinic_phone_number }}</div>   <!--必須-->
    <div class='email'>{{ $user -> email }}</div>
    <div class='userInfo_main_photo'>{{ $user -> main_photo }}</div>
    <div class='userInfo_tagline'>{{ $user -> tagline }}</div>
    <div class='userInfo_clinic_pr'>{{ $user -> clinic_pr }}</div>
    <div class='userInfo_doctor_profile'>{{ $user -> doctor_profile }}</div>
    <div class='userInfo_doctor_photo'>{{ $user -> doctor_photo }}</div>
    <div class='userInfo_doctor_number'>{{ $user -> doctor_number }}</div>
    <div class='userInfo_staff_number'>{{ $user -> staff_number }}</div>
    <div class='userInfo_personnel_details'>{{ $user -> personnel_details }}</div>
    <div class='userInfo_clinic_url'>{{ $user -> clinic_url }}</div>
    <div class='userInfo_clinic_category'>{{ $user -> clinic_category }}</div>
    <div class='userInfo_clinic_treatment'>{{ $user -> clinic_treatment }}</div>
    <div class='userInfo_clinic_features'>{{ $user -> clinic_features }}</div>
    <div class='userInfo_disease_name'>{{ $user -> disease_name }}</div>
    <div class='userInfo_conference'>{{ $user -> conference }}</div>
    <div class='userInfo_open_date'>{{ $user -> open_date }}</div>
    <div class='userInfo_sub_photo'>{{ $user -> sub_photo }}</div>
  </div>
  
  <div class=userAction>
    <!--<div class="userAction_edit">-->
    <!--      <i class="fas fa-edit fa-2x"></i>-->
    <!--    <span>編集</span>-->
    <!--</div>-->
    <div class="userAction_edit">
      @if($user == Auth::user())
      <td>
        <form action="{{ url('/users/edit/'.$user->id) }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">
        編集
        </button>
        </form>
      </td>
      @endif
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
    <div class="userAction_edit">
      <td>
        <a href="/search">
        <button type="button" class="btn btn-primary">
        連携候補先一覧
        </button>
        </a>
      </td>
    </div>
 
  </div>
  
</div>
</div>


<!--<div class='usershowPage'>-->
<!--  <div class='container'>-->
<!--    <header class="header">-->
<!--      <p class='header_logo'>-->
<!--      <a href="{{ route('users.show', ['id' => $user['id']]) }}">-->
<!--      <img src="/storage/images/techpit-match-icon.png">-->
<!--      </a>-->
<!--      </p>-->
<!--    </header>-->
<!--    <div class='userInfo'>-->
<!--      <div class='userInfo_img'>-->
<!--      <img src="/storage/images/{{$user -> img_name}}">-->
<!--      </div>-->
<!--      <div class='userInfo_name'>{{ $user -> name }}</div>-->
<!--      <div class='userInfo_selfIntroduction'>{{ $user -> self_introduction }}</div>-->
<!--    </div>-->
    
<!--      <div class='userAction'>-->
<!--        <div class="userAction_edit userAction_common">-->
<!--          <i class="fas fa-edit fa-2x"></i>-->
<!--          <span>編集</span>-->
<!--        </div>-->
<!--        <div class='userAction_logout userAction_common'>-->
<!--        <a href="{{ route('logout') }}" onclick="event.preventDefault();-->
<!--          document.getElementById('logout-form').submit();"><i class="fas fa-cog fa-2x"></i></a>-->
<!--          <span>ログアウト</span>-->
<!--          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
<!--              {{ csrf_field() }}-->
<!--          </form>-->
<!--        </div>-->
<!--      </div>-->
    
<!--  </div>-->
<!--</div>-->

@endsection