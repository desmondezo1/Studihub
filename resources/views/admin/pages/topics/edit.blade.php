@extends('admin.template.app')

@section('page_title', "Edit Topic")
@section('description', "Edit Topics For each Courses")
@section('keyword', "topics, english,mathematics,geography ...")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Edit Topic',
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
                            <h3 class="h4 text-center">Edit Topics</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Edit Topic Here</p>
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
                            <h3 class="h4">Edit Topic</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::model($topic, [
                                 'method' => 'PATCH',
                                 'route' => ['admin.topics.update', $topic->slug],
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
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 form-control-label">Title</label>
                                <div class="col-sm-9">
                                    {{ Form::hidden('slug', $topic->slug ,['class'=>'form-control', 'id'=>'slug', 'placeholder'=>'Slug']) }}
                                    {{ Form::text('title', old('title'),['class'=>'form-control', 'id'=>'title', 'placeholder'=>'Title']) }}
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="notes" class="col-sm-3 form-control-label">Lesson Notes</label>
                                <div class="col-sm-9">
                                    {{ Form::textarea('notes', old('notes'),['class'=>'form-control richTextBox', 'id'=>'notes', 'placeholder'=>'Notes','style'=>'border:5px;']) }}
                                    <small class="help-block-none"> Description of what the course is all about.</small>
                                </div>
                            </div>

                            <div class="line"></div>
                            @role('admin')

                                <div class="form-group row">
                                    <label for="hidden" class="col-sm-3 form-control-label">Toggle Visibility</label>
                                    <div class="col-sm-9">
                                        <div class="i-checks">
                                            <input id="hidden" type="checkbox" name="hidden" class="checkbox-template" {{ $topic->hidden ? 'checked ' : 'unchecked '}}>

                                            <label for="hidden"> is Hidden ?</label>
                                        </div>
                                    </div>
                                </div>
                            @endrole
                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="course_id" class="col-sm-3 form-control-label">Subject/ Course</label>
                                <div class="col-sm-9">
                                    <div class="i-checks">
                                        {{ Form::select('course_id', $courses, old('course_id'),['class'=>'form-control custom-select']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Toggle Freebie</label>
                                <div class="col-sm-9">
                                    <div class="i-checks">
                                        <input id="isfree" type="checkbox" name="isfree" class="checkbox-template" {{ $topic->isfree ? 'checked ' : 'unchecked '}}>
                                        <label for="isfree"> is Free ?</label>
                                    </div>
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="exam_type" class="col-sm-3 form-control-label">Exam Type</label>
                                <div class="col-sm-9">
                                    <div class="i-checks">
                                        {{ Form::select('exam_type', ['GEC'=>'GCE','NECO'=>'NECO','WAEC'=>'WAEC','JAMB'=>'JAMB'], old('exam_type'),['class'=>'form-control custom-select']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="photo" class="col-sm-3 form-control-label">Upload Photo or PDF, Word Doc</label>
                                <div class="col-sm-9">
                                    <img src="{{ $topic->photo? '/storage/'.$topic->photo : '' }}" class="img-thumbnail" width="30%">
                                    {{ Form::file('photo',['id'=>'photo', 'class'=>"form-control-file"]) }}
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="uploadtype" class="col-sm-3 form-control-label">Video Upload Type</label>
                                <div class="col-sm-9">
                                    <select name="uploadtype" id="uploadtype" class="custom-select">
                                        <option selected>Select</option>
                                        <option value="upload">Video Upload</option>
                                        <option value="embed">Url Embed</option>
                                    </select>
                                </div>
                            </div>


                            <div class="line embed" style="display: none"></div>
                            <div class="form-group row embed" style="display: none">
                                <label for="embed" class="col-sm-3 form-control-label">Video Embed Code<br><small style="font-weight:400;" >VDOcipher/Youtube/vimeo/Wistia</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="embed" id="embed" placeholder="Video Embed code" value="{{ $topic->VideoData()->first()->embed_url }}">
                                </div>
                            </div>

                            <div class="line upload" style="display: none"></div>
                            <div class="form-group row upload" style="display: none">
                                <label for="video" class="col-sm-3 form-control-label">Video To Your cdn Automatically</label>
                                <div class="col-sm-9">
                                    <input id="video" type="file" name="video" class="form-control-file">
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-sm-4 offset-sm-3">
                                    <a href="{{ route('admin.topics.index') }}" type="btn" name="cancel" style="color: #fff0ff" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="videoModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Embeded Video URl</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Modal body..
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger okModal" data-dismiss="modal">Ok</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $('#isFre').on('change',function($){
            $('#isFre').value = '!!this.checked';
        });


        $(document).ready(function (){
            $('select[name="status"]').on('change',function(e){
                let option = e.target.value;
                if(option === 'DRAFT'){
                    $('.scheduled').removeAttr('style');
                }
            });
        });

        $(document).ready(function (){
            $('select[name="uploadtype"]').on('change',function(e){
                let option = e.target.value;
                if(option === 'upload'){
                    $('.upload').removeAttr('style');
                    $('.embed').css('display','none');
                }else if(option === 'embed'){
                    $('.embed').removeAttr('style');
                    $('.upload').css('display','none');
                }

            });
        });
    </script>

    <script>
        //Script for fileupload for ckeditor
        let options = {
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
        CKEDITOR.replace('notes', {
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




