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
 * Time: 23:00
 */
?>
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

@section('page_title', "Edit Question")
@section('description', "Edit Question For each Topics")
@section('keyword', "topics, english,mathematics,geography ...")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Edit Topics',
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
                            <h3 class="h4 text-center">Edit Question</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Edit Question Here</p>
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
                            <h3 class="h4">Edit Question</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::model($question, [
                                 'method' => 'PATCH',
                                 'route' => ['admin.questions.update', $question->id],
                                 'role' => 'form',
                                 'enctype'=>"multipart/form-data", 'class'=>'form-horizontal'
                             ]) !!}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger text-center">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="list-style: none">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="question_desc" class="col-sm-3 form-control-label">Lesson Notes</label>
                                <div class="col-sm-9">
                                    {{ Form::textarea('question_desc', old('question_desc'),['class'=>'form-control richTextBox', 'id'=>'question_desc', 'placeholder'=>'Question Description','style'=>'border:5px;']) }}
                                    <small class="help-block-none"> question Description.</small>
                                </div>
                            </div>

                            <div class="line"></div>
                            @role('admin')
                            <div class="form-group row">
                                <label for="hidden" class="col-sm-3 form-control-label">Toggle Visibility</label>
                                <div class="col-sm-9">
                                    <div class="i-checks">
                                        <input id="hidden" type="checkbox" name="hidden" class="checkbox-template" {{ $question->hidden ? 'checked ' : 'unchecked '}}>
                                        <label for="hidden"> is Hidden ?</label>
                                    </div>
                                </div>
                            </div>
                            @endrole
                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="topic_id" class="col-sm-3 form-control-label">Topic</label>
                                <div class="col-sm-9">
                                    <div class="i-checks">
                                        {{ Form::select('topic_id', $topics, old('topic_id'),['class'=>'form-control custom-select']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="exam_type" class="col-sm-3 form-control-label">Exam Type</label>
                                <div class="col-sm-9">
                                    <div class="i-checks">
                                        {{ Form::select('exam_type', ['GCE'=>'GCE','NECO'=>'NECO','WAEC'=>'WAEC','JAMB'=>'JAMB'], old('exam_type'),['class'=>'form-control custom-select']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="question_difficulty" class="col-sm-3 form-control-label">Difficulty Level</label>
                                <div class="col-sm-9">
                                    {{ Form::select('question_difficulty', ['beginner'=>'Beginner','intermediate'=>'Intermediate','advance'=>'Advance'], old('question_difficulty'),['class'=>'form-control custom-select']) }}
                                </div>
                            </div>


                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-sm-4 offset-sm-3">
                                    <a href="{{ route('admin.questions.index') }}" type="btn" name="cancel" style="color: #fff0ff" class="btn btn-secondary">Cancel</a>
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

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script>
        //Script for fileupload for ckeditor
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    {{--    <script>
            //CKEDITOR.replace( 'notes', options );
        </script>--}}
    <script type="text/javascript">
        CKEDITOR.replace('question_desc', {
            extraPlugins: 'mathjax',
            mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
            height: 320,
            options
        });

        if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
            document.getElementById('ie8-warning').className = 'tip alert';
        }
    </script>

@endpush




