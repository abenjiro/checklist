@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 7%;">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <p class="lead text-muted text-center"> Sign In</p>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <label for="email" class="text-muted">E-Mail Address: </label>
                        <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="text-muted">Password: </label>
                        <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>

                        <div class="form-group">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="" class="text-muted"></label>
                        <input type="submit" class="form-control btn btn-primary" value="Login" name="submit">
                        
                        <a class="btn btn-link form-control" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div> 

@endsection
