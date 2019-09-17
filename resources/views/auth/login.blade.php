@extends('template.app')

@section('page_title', "Student Login")
@section('description', "Student Login")
@section('keyword', "login,student")

@section('styles')
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  border-radius: 5px;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #061c3e;
  width: 100%;
  border-radius:5px;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #ff2d38;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #061c3e;;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #ff2d38; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #ff2d38, #0b316b);
  background: -moz-linear-gradient(right, #ff2d38, #0b316b);
  background: -o-linear-gradient(right, #ff2d38, #0b316b);
  background: linear-gradient(to top, #ff2d38, #0b316b);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

</style>
    
@endsection
@section('content')

<!--- START OF CREATE ACCOUNT SECTION --->
<div class="login-page">
    @if ($errors->any())
    <div class="alert alert-danger text-center">
        <p class="text-danger">Please check and correct the following errors</p>
    </div>
    @endif
    <div class="form">
          {!! Form::open(['route'=>('auth.register'), 'role' => 'form', 'enctype'=>"multipart/form-data", 'class'=>'form-horizontal register-form loginsignup']) !!}
          <input id="firstname" placeholder="First Name" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" autofocus>
        @if ($errors->has('firstname'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('firstname') }}</strong>
            </span>
        @endif
        <input id="lastname" type="text" Placeholder="Last Name" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" autofocus>
        @if ($errors->has('lastname'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lastname') }}</strong>
            </span>
        @endif
        <input id="password" type="password"placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <input id="password-confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Confirm Password">
        @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
        <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <select id="gender" name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }} ">
            <option value="">Select Your Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        @if ($errors->has('gender'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
        <br>
        <select id="class_category" name="class_category" class="form-control{{ $errors->has('class_category') ? ' is-invalid' : '' }}">
            <option value="">Select Your Class</option>
            <option value="sciences">Sciences</option>
            <option value="social_sciences">Social Sciences</option>
            <option value="arts">Arts</option>
        </select>
        @if ($errors->has('class_category'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('class_category') }}</strong>
            </span>
        @endif
        <br>
        <p class="text-info mb-2">Note: the word before @ in your emails will be your username e.g {example}@email.com</p>
        <button type="submit">create</button>
        <p class="message">Already registered? <a href="#" class="signin">Sign In</a></p>
        {!! Form::close() !!}
      <!--- END OF CREATE ACCOUNT FORM --->

      <!--- LOGIN FORM ---->
          {!! Form::open(['route'=>('login'), 'role' => 'form', 'enctype'=>"multipart/form-data", 'class'=>'form-horizontal login-form loginsignup']) !!}
        <input type="text" id="login" class="form-control{{ ($errors->has('username') or $errors->first('email')) ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" placeholder="{{ __('User@example.com') }}" autofocus/>
        @if ($errors->has('username') or $errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ ($errors->first('username')) }}</strong>
        </span>
         @endif
        <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Your Password') }}" name="password"/>
        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif

        <button>login</button>
        <p> <a class="btn btn-link" href="{{ route('forgot') }}" style="color: #ff2c38;">
                {{ __('Forgot Your Password?') }}
            </a></p>
        <p class="message">Not registered? <a href="#" class="create_account">Create an account</a></p>
        {!! Form::close() !!}
    </div>
  </div>
@endsection

@push('scripts')
<script>
    //Script for login form animation
    $('.message .create_account').click(function(){
        $('form.loginsignup').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
        $('.message .signin').click(function(){
    $('form.loginsignup').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
</script>
@endpush