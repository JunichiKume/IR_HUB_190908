@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">医療機関名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('doctor_name') ? ' has-error' : '' }}">
                            <label for="doctor_name" class="col-md-4 control-label">理事長名／院長名</label>

                            <div class="col-md-6">
                                <input id="doctor_name" type="text" class="form-control" name="doctor_name" value="{{ old('doctor_name') }}" required autofocus>

                                @if ($errors->has('doctor_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('doctor_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
                            <label for="post_code" class="col-md-4 control-label">〒</label>

                            <div class="col-md-6">
                                <input id="post_code" type="text" class="form-control" name="post_code" value="{{ old('post_code
                                ') }}" required autofocus>

                                @if ($errors->has('post_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('clinic_address') ? ' has-error' : '' }}">
                            <label for="clinic_address" class="col-md-4 control-label">医療機関住所</label>

                            <div class="col-md-6">
                                <input id="clinic_address" type="text" class="form-control" name="clinic_address" value="{{ old('clinic_address
                                ') }}" required autofocus>

                                @if ($errors->has('clinic_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('clinic_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('clinic_phone_number') ? ' has-error' : '' }}">
                            <label for="clinic_phone_number" class="col-md-4 control-label">医療機関電話番号</label>

                            <div class="col-md-6">
                                <input id="clinic_phone_number" type="tel" class="form-control" name="clinic_phone_number" value="{{ old('clinic_phone_number
                                ') }}" required autofocus>

                                @if ($errors->has('clinic_phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('clinic_phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
