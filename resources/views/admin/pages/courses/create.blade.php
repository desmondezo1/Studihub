<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 23:00
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 22:19
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 20:31
 */
?>
@extends('admin.template.app')

@section('page_title', "Create Courses")
@section('description', "Create Courses For each Category of Classes")
@section('keyword', "subjects, english,mathematics,geography ...")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Manage Courses',
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
                            <h3 class="h4 text-center">Create Course</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Add  Course Here</p>
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
                            <h3 class="h4">Add Course</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route'=>('admin.courses.store'), 'role' => 'form', 'enctype'=>"multipart/form-data", 'class'=>'form-horizontal']) !!}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="list-style: none">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 form-control-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="title" name="title" class="form-control">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label for="summary" class="col-sm-3 form-control-label">Summary</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="summary" id="summary" class="form-control"></textarea><small class="help-block-none">A small description of what the course is all about.</small>
                                    </div>
                                </div>


                                <div class="line"></div>
                                <div class="form-group row">
                                    <label for="category" class="col-sm-3 form-control-label">Category</label>
                                    <div class="col-sm-9">
                                        <div class="i-checks">
                                            <select name="course_category_id" id="course_category_id" class="custom-select">
                                                <option selected>Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Toggle Visibility</label>
                                    <div class="col-sm-9">
                                        <div class="i-checks">
                                            <input id="visible" type="radio" name="visible" class="radio-template">
                                            <label for="visible"> hide ?</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="line"></div>
                                <div class="form-group row">
                                    <label for="photo" class="col-sm-3 form-control-label">Upload Photo</label>
                                    <div class="col-sm-9">
                                        <input id="photo" type="file" name="photo" class="form-control-file">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 offset-sm-3">
                                        <a href="{{ route('admin.courses.index') }}" type="btn" name="cancel" style="color: #fff0ff" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
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
        $('#visible').on('change',function($){
            $('#visible').value = '!!this.checked';
        });
    </script>

@endpush


