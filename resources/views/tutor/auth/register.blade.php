<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/15/2019
 * Time: 1:40 PM
 */
?>
@extends('pages.layouts.template.content')

@section('page_title', "Tutor Sign up")
@section('description',"Sign up to become a tutor")
@section('keyword', "tutor,teach,signup")


@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/tutor/css/jquery.steps.css') }}">
    <style type="text/css">
        .wizard > .content{
            min-height: 45em;
        }
    </style>
@endsection

@section('sub-header')
    <div class="jumbotron jumbotron-fluid header-image-jumbotron">
        <div class="container">
            <h1 class="display-4">Become a Tutor and earn Better</h1>
            <p class="lead"></p>
        </div>
    </div>

@endsection

@section('suggestions')


    <div class="container content mb-5 mt-5">
        <div class="row">
            <div class="col-md-12 mb-5">
                @if(Session::has('message'))
                    <p class="text-danger">{{ Session::get('message') }}</p>
                @endif
            </div>
            <div class="col-md-12 mb-5">
                <form id="my-form" method="post" action="{{ route("tutor.auth.register") }}">
                    @csrf
                    <div>
                        <h3>Profile</h3>
                        <section>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control required {{ $errors->has('firstname') ? ' is-invalid' : '' }}" value="{{ old('firstname') }}" name="firstname" id="firstname" placeholder="First Name">
                                    @if ($errors->has('firstnamee'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control required {{ $errors->has('larsname') ? ' is-invalid' : '' }}" value="{{ old('latsname') }}" name="lastname" id="lastname" placeholder="Last Name">
                                    @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- Gender and Email --->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender" class="form-control required {{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                        <option selected>Selected</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date">D.O.B</label>
                                    <input class="form-control required {{ $errors->has('dob') ? ' is-invalid' : '' }}" value="{{ old('dob') }}" type="date" id="dob" name="dob" autofocus
                                           max="{{ Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}">
                                    @if ($errors->has('dob'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- End of gender and email -->

                            <!-- Address -->
                            <div class="form-group">
                                <label for="address">Address<small> (Your Current living address. This is where you would attend lessons from)</small></label>
                                <input type="text" class="form-control required {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}" name="address" id="address" placeholder="1234 Main St">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <select id="state" name="state" class="form-control required {{ $errors->has('state') ? ' is-invalid' : '' }}">
                                        <option value="" selected="selected">Select an option</option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('state'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control required {{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}" id="city">
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-check-label" for="bio">
                                    Introduce yourself to clients
                                </label>
                                <textarea class="form-control required {{ $errors->has('bio') ? ' is-invalid' : '' }}" value="{{ old('bio') }}" name="bio" id="bio" cols="40" rows="10" ></textarea>
                                @if ($errors->has('bio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p>(*) Mandatory</p>
                        </section>
                        <h3>Credentials</h3>
                        <section>
                            <legend style="text-align:center; padding:20px;"> EDUCATION</legend>
                            <!--------------------------EDUCATION -------------------------------->
                            <div class="form-group">
                                <label for="school">School</label>
                                <input type="text" class="form-control required {{ $errors->has('school') ? ' is-invalid' : '' }}" value="{{ old('school') }}" name="school" id="school" placeholder="University of ...">
                                @if ($errors->has('school'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('school') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="course">Course</label>
                                    <input type="text" class="form-control required {{ $errors->has('course') ? ' is-invalid' : '' }}" value="{{ old('course') }}" name="course" id="course" placeholder="Animal Science..">
                                    @if ($errors->has('course'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="degree">Degree</label>
                                    <input type="text" class="form-control required {{ $errors->has('degree') ? ' is-invalid' : '' }}" value="{{ old('degree') }}" name="degree" id="degree" placeholder="Bsc.">
                                    @if ($errors->has('degree'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('degree') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-------------------------EXPERIENCE--------------------------------->
                            <legend> Work Experience</legend>

                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="company">Name of company</label>
                                    <input type="text" class="form-control required {{ $errors->has('company') ? ' is-invalid' : '' }}" value="{{ old('company') }}" name="company" id="company" placeholder="Studihub Education S....">
                                    @if ($errors->has('company'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-----------------------TEACHING EXPERIENCE--------------------------------->
                                <div class="form-group col-md-4">
                                    <label for="experience">Teaching experience</label>
                                    <select id="experience" name="experience" class="form-control required {{ $errors->has('role') ? ' is-invalid' : '' }}">
                                        <option selected>Just started</option>
                                        <option>1 year</option>
                                        <option>2 years</option>
                                        <option>3 years</option>
                                        <option>4 years</option>
                                        <option>5 years</option>
                                        <option>6 years</option>
                                        <option>7 years</option>
                                        <option>8 years</option>
                                        <option>9 years</option>
                                        <option>More than 10 years</option>
                                    </select>
                                    @if ($errors->has('experience'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="role">Role</label>
                                    <input type="text" class="form-control required {{ $errors->has('role') ? ' is-invalid' : '' }}" value="{{ old('role') }}" name="role" id="role" placeholder="Manager...">
                                    @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 mt-3" style="padding-top: 1.5rem">
                                    <div class="form-check">
                                        <input class="form-check-input {{ $errors->has('stillworkthere') ? ' is-invalid' : '' }}" value="{{ old('stillworkthere') }}" name="stillworkthere" type="checkbox" id="stillworkthere">
                                        @if ($errors->has('stillworkthere'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stillworkthere') }}</strong>
                                    </span>
                                        @endif
                                        <label class="form-check-label" for="stillworkthere">
                                            I still work there
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="curriculum">Academic Curricullum ?</label>
                                    <select id="curriculum" name="curriculum" class="form-control required {{ $errors->has('curriculum') ? ' is-invalid' : '' }}">
                                        <option value="">Selected</option>
                                        <option value="nigerian">Nigerian</option>
                                        <option value="british">British</option>
                                        <option value="american">American</option>
                                    </select>
                                    @if($errors->has('curriculum'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('curriculum') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="classname">What class do you teach?</label>
                                    <select id="classname" multiple name="classname" class="form-control required {{ $errors->has('classname') ? ' is-invalid' : '' }}">
                                        <option selected>Selected</option>
                                        <option value="nursary">Nursery</option>
                                        <option value="jsecondary">Junior Secondary</option>
                                        <option value="ssecondary">Senior Secondary</option>
                                    </select>
                                    @if ($errors->has('classname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('classname') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <p>(*) Mandatory</p>
                        </section>
                        <h3>Verification</h3>
                        <section>
                            <!-- end full name -->
                            <div class="form-group">
                                <label for="email">Email (will be used as username)</label>
                                <input type="email" class="form-control required {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" id="email" placeholder="Hi@example.com">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control required {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" name="password" id="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control required {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" value="{{ old('password_confirmation') }}" name="password_confirmation" id="password-confirmation" placeholder="confirm Password">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="photo">Upload Photo</label>
                                    <input type="hidden" class="form-control img {{ $errors->has('avatar') ? ' is-invalid' : '' }}" value="{{ old('avatar') }}" name="avatar" id="avatar">
                                    <input type="file" class="form-control required"  name="photo" id="image" placeholder="Upload Photo" data-url="{{ route('tutor.photo.upload') }}">
                                    @if ($errors->has('avatar'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-sm-8 mb-3 mb-sm-0 mx-auto">
                                        <div class="text-center old-img">
                                        </div>
                                        <div class="showImg pt-2 text-center"></div>
                                    </div>
                                </div>
                            </div>

                            <p>(*) Mandatory</p>
                        </section>
                        <h3>Social Medial</h3>
                        <section>
                            <div class="form-group">
                                <label for="social_media">Facebook</label>
                                <input type="url" class="form-control {{ $errors->has('social_media') ? ' is-invalid' : '' }}" value="{{ old('social_media') }}" name="social_media[]" id="facebook" placeholder="http://www.facebook.com/username">
                                @if ($errors->has('social_media'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('social_media') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="social_media">LinkedIn</label>
                                <input type="url" class="form-control {{ $errors->has('social_media') ? ' is-invalid' : '' }}" value="{{ old('social_media') }}" name="social_media[]" id="linkedin" placeholder="http://www.linkedin.com/username">
                                @if ($errors->has('social_media'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('social_media') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p>(*) Mandatory</p>
                        </section>
                        <h3>Finish</h3>
                        <section>
                            <input id="terms" name="terms" type="checkbox" class="required {{ $errors->has('terms') ? ' is-invalid' : '' }}" value="{{ old('terms') }}" autofocus> <label for="terms">I agree with the Terms and Conditions.</label>

                            @if ($errors->has('terms'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terms') }}</strong>
                                </span>
                            @endif
                        </section>
                    </div>
                </form>
            </div>
            <div style="display: none; margin-bottom: 6px;" id="animatedModal" class="animated-modal text-center p-5 fancybox-content bg-gradient-secondary mx-auto">
                <h2>
                    Uploading!
                </h2>
                <p>
                    Please wait, while the image is processing.<br>
                </p>
                <p class="mb-0">
                    <svg class="lds-spinner" width="200px"  height="200px"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;"><g transform="rotate(0 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(30 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(60 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(90 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(120 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(150 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(180 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(210 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(240 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(270 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(300 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                            </rect>
                        </g><g transform="rotate(330 50 50)">
                            <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#f7f7f7">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate>
                            </rect>
                        </g></svg>
                </p>
                <button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/tutor/js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('assets/tutor//js/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('assets/tutor//js/jquery.cookie-1.3.1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>

    <script>
        // As a jQuery Plugin
        var form = $("#my-form").show();
        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex)
            {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                form.submit();
            }
        });

        $('#stillworkthere').on('change',function(){
            this.value = this.checked ? 1:0;
        });

        $('#terms').on('change',function(){
            this.value = this.checked ? 1:0;
        });
    </script>
@endpush