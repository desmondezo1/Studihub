
@extends('admin.template.app')

@section('page_title', "Add Admin")
@section('description', "Add Admin")
@section('keyword', "topics, english,mathematics,geography ...")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Add Admin',
            ])
    @endcomponent

@endsection


@section("content")

    <!--Section: Main panel-->
    <section>
        <div class="container-fluid">
            <div class="row" data-aos="flip-left"
                 data-aos-easing="ease-out-cubic"
                 data-aos-duration="2000">
                <div class="col-lg-12 col-xs-12 text-center">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow" style="display: none; position: absolute; transform: translate3d(19px, 24px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-end"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>{{--<a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>--}}</div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4 text-center">Add Admin</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Add Admin info Here</p>
                            </div>
                            <hr class="my-2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" data-aos="zoom-in">
                <div class="col-lg-12 col-xs-12">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>{{--<a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>--}}</div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Add Admin</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route'=>('admin.admins.store'), 'role' => 'form', 'method'=>'post', 'class'=>'form-horizontal']) !!}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                                <div class="col-md-8 mx-auto">
                                    <label for="name" class="col-md-4 control-label">First Name</label>
                                    {{ Form::text('firstname', old('firstname'),['class'=>'form-control', 'id'=>'firstname', 'placeholder'=>'First Name','autofocus'=>true]) }}

                                    @if ($errors->has('firstname'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <div class="col-md-8 mx-auto">
                                    <label for="lastname" class="col-md-4 control-label">Last Name</label>
                                    {{ Form::text('lastname', old('lastname'),['class'=>'form-control', 'id'=>'lastname', 'placeholder'=>'Last Name','autofocus'=>true]) }}

                                    @if ($errors->has('lastname'))
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-8 mx-auto">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    {{ Form::text('email', old('email'),['class'=>'form-control', 'id'=>'email','autofocus'=>true]) }}

                                    @if ($errors->has('email'))
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <div class="col-md-8 mx-auto">
                                    <label for="phone" class="col-md-4 control-label">Phone Number</label>
                                    {{ Form::text('phone', old('phone'),['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone','autofocus'=>true]) }}
                                    @if ($errors->has('phone'))
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                <div class="col-md-8 mx-auto">
                                    <label for="state" class="col-md-4 control-label">State</label>
                                    {{ Form::select('state', $states, old('state'),['class'=>'form-control']) }}
                                    @if ($errors->has('state'))
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <div class="col-md-8 mx-auto">
                                    <label for="city" class="col-md-4 control-label">City</label>
                                    {{ Form::text('city', old('city'),['class'=>'form-control', 'id'=>'city', 'placeholder'=>'City','autofocus'=>true]) }}
                                    @if ($errors->has('city'))
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <div class="col-md-8 mx-auto">
                                    <label for="address" class="col-md-4 control-label">Address</label>
                                    {{ Form::text('address', old('address'),['class'=>'form-control', 'id'=>'address', 'placeholder'=>'Address','autofocus'=>true]) }}
                                    @if ($errors->has('address'))
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <div class="col-md-8 mx-auto">
                                    <label for="gender" class="col-md-4 control-label">Gender:</label>
                                    {{ Form::select('gender', ['male'=>'Male', 'female'=>'Female'], old('gender'),['class'=>'form-control']) }}
                                    @if ($errors->has('gender'))
                                        <span class="help-block invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if(Auth::guard()->user()->hasRole('admin'))
                                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                    <div class="col-md-8 mx-auto">
                                        <label for="role" class="col-md-4 control-label">Assign Role:</label>
                                        {{ Form::select('role', $roles, old('role'),['id'=>'role','class'=>'form-control']) }}
                                        @if ($errors->has('role'))
                                            <span class="help-block invalid-feedback">
                                                    <strong>{{ $errors->first('role') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-8 mx-auto">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                                    {{ Form::password('password', ['class'=>'form-control', 'id'=>'password', 'placeholder'=>'Password']) }}
                                    @if ($errors->has('password'))
                                        <span class="help-block invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <div class="col-md-8 mx-auto">
                                    <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block invalid-feedback">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 mx-auto">
                                    <div class="inform" style="padding: 7px"><img src="{{ old('photo') }}" width="25%"></div>
                                    {{ Form::hidden('photo', old('avatar'),['id'=>'photo']) }}
                                    {{ Form::file('image',['id'=>'image', 'data-url'=>route('admin.admins.upload')]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 mx-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).on('change', '#image', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var file_data = $(this).prop("files")[0];
            var formData = new FormData();
            formData.append('file',file_data);
            var panel_body = $('.card-body');
            panel_body.find('.inform').empty();
            var url = $(this).attr('data-url');
            $.ajax({
                cache:false,
                type: "POST",
                url: url,
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
                data: formData,
                async:true,
                dataType:"json",
                beforeSend: function(xhr){
                    panel_body.find('.inform').html('<img src="/assets/admin/img/ajax-loader.gif" class="ajax-loader">');
                },
                success: function(data, status){
                    panel_body.find('.inform').html('<img src=/'+data['path']+' class="image-responsive image-thumbnail" width="25%">');
                    $('#photo').attr('value', data['path']);
                },
                error:function(data, status){
                    panel_body.find('.inform').html('<p>'+ data['msg']+'</p>');
                },
                complete: function(){

                }
            });
        });
    </script>
@endpush




