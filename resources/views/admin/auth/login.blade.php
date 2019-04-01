@extends('template.app')
@section('page_title', "Admin Login")
@section('description',"Admin login page")
@section('keyword', "admin,login")


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
  margin: 50px auto 100px;
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
<!---- NEW ADMIN LOGIN ---->
<div class="form">
<div class="card-header">{{ __('Admin') }}</div>
<form class="login-form loginsignup" method="POST" action="{{ route('admin.login') }}">
        @csrf    
    <input type="text" id="login" type="text" class="form-control{{ ($errors->has('username') or $errors->first('email')) ? ' is-invalid' : '' }}" name="email" value="{{ old('login') }}" placeholder="{{ __('User@example.com') }}" autofocus/>
        @if ($errors->has('username') or $errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ ($errors->first('username')) }}</strong>
        </span>
         @endif
        <input type="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Your Password') }}" name="password"/>
        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif

        <button>login</button>
    </form>
    </div>
<!------------END-------------->
@endsection
