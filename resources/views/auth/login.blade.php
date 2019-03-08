@extends('template.app')

@section('page_title', "Student Login")
@section('description', "Student Login")
@section('keyword', "login,student")

@section('content')
<div class="container" style="height:90vh; padding:50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="    box-shadow: 0 0 13px -3px black;">
                <div class="card-header text-center" style="background-color: rgb(6, 28, 62);">{{ __('Login') }}</div>

                <div class="card-body" style="border: 1px solid #0b316b;">

                    @if ($errors->any())
                        <div class="alert alert-danger text-center">
                            <ul style="list-style: none">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="login" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Or Username') }}</label>

                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control{{ ($errors->has('username') or $errors->first('email')) ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" placeholder="{{ __('E-Mail Address Or Username') }}" autofocus>
                                @if ($errors->has('username') or $errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ ($errors->first('username')) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Your Password') }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #ff2d38;
                                border-color: #af0912;">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.reset') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
        
                        <a class="btn btn-link" href="{{ route('getRegister') }}" style="text-decoration:none; color:#fff; margin:10px;background-color: #ff2d38;
                        border-color: #af0912;">
                            {{ __('Sign up for free!') }}
                        </a>
                    </div>
                </div>
            .</div>
        </div>
    </div>
</div>
@endsection
