<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 23:00
 */
?>
@extends('admin.template.app')

@section('page_title', "Question Choices")
@section('description', "Choices of questions based on different topics and exams")
@section('keyword', "subjects, english,mathematics,geography ...")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Manage Question Choices',
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
                            <h3 class="h4 text-center">Create Choice</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Add  Choices Here</p>
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
                            <h3 class="h4">Add Choice</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route'=>('admin.choices.store'), 'role' => 'form', 'method'=>'post', 'enctype'=>"multipart/form-data", 'class'=>'form-horizontal']) !!}

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
                                <label for="question_id" class="col-sm-3 form-control-label">Question</label>
                                <div class="col-sm-9">
                                    <div class="i-checks">
                                        <select name="question_id" id="question_id" class="custom-select">
                                            <option value="">Select</option>
                                            @foreach($questions as $question)
                                                <option value="{{ $question->id }}">{{ strip_tags(str_limit($question->question_desc, 120)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="help-block question_id"></span>
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="choice_desc" class="col-sm-3 form-control-label">Choice Desc.</label>
                                <div class="col-sm-9">
                                    <div class="i-checks">
                                        <input id="choice_desc" type="text" name="choice_desc" class="form-control">
                                    </div>
                                    <span class="help-block choice_desc"></span>
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="choice_option" class="col-sm-3 form-control-label">Choice Options</label>
                                <div class="col-sm-9">
                                    <div class="i-checks">
                                        <select name="choice_option" id="choice_option" class="custom-select">
                                            <option value="">Select</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                    <span class="help-block choice_option"></span>
                                </div>
                            </div>

                            <div class="line is_correct"></div>
                            <div class="form-group row is_correct">
                                <label for="is_correct" class="col-sm-3 form-control-label">Toggle Correct/ Wrong</label>
                                <div class="col-sm-9">
                                    <div class="i-checks">
                                        <input id="is_correct" type="checkbox" name="is_correct" class="checkbox-template" {{--disabled="{{ $choice->is_correct ? 'disabled' : '' }}"--}}>
                                        <label for="is_correct"> is Correct ?</label>
                                    </div>
                                    <span class="help-block is_correct"></span>
                                </div>
                            </div>


                            <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mx-auto">
                                        <a href="{{ route('admin.choices.index') }}" type="btn" name="cancel" style="color: #fff0ff" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" name="submit" class="btn btn-primary" data-url="{{ route('admin.choices.store') }}">Save changes</button>
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

        $("form").on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var data = $(this).serialize();

            var url = $("button[name=submit]").attr('data-url');
           // alert(url);
            clearError();
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType:"json",
                beforeSend: function(xhr){
                    //panel_body.find('.inform').html('<img src="/assets//admin/img/ajax-loader.gif" class="ajax-loader">');
                },
                success: function(data, status){
                   // alert(data['message']);
                    notifier.notify(data['message'], 'success');
                },
                error:function(data, status){
                    notifier.notify(data.responseJSON.message, 'error');
                    $.each(data.responseJSON.errors, function (key, value) {
                        $('span.'+key).parent('.form-group').addClass('has-error');
                        $('input[name="'+key+'"]').addClass('is-invalid');
                        $('select[name="'+key+'"]').addClass('is-invalid');
                        $('span.'+key).replaceWith('<span class="invalid-feedback '+key+'" style="display:inline-block;"><strong>'+ value +'</strong></span>');
                    });

                },
                complete: function(){

                }
            });
        });

        function clearError() {
            var data = [
                'question_id', 'choice_desc', 'choice_option', 'iscorrect'
            ];
            $.each(data, function (key) {
                $('span.'+data[key]).parent('.form-group').removeClass('has-error');
                $('input[name="'+data[key]+'"]').removeClass('is-invalid');
                $('select[name="'+data[key]+'"]').removeClass('is-invalid');
                $('span.'+data[key]).replaceWith('<span class="help-block '+data[key]+'"></span>');
            })
        }
    </script>

<script type="text/javascript">
    $('select[name=question_id]').on('change', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var url = "{{ url('/admin/choices/check') }}";
        var data = $(this).val();
        // alert(url);
        clearError();
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'id':data,
            },
            dataType:"json",
            beforeSend: function(xhr){
                //panel_body.find('.inform').html('<img src="/assets//admin/img/ajax-loader.gif" class="ajax-loader">');
            },
            success: function(data, status){
                if(data.correct_count >= 1){
                    $('.is_correct').find('input[name=is_correct]').attr('disabled','disabled');
                }else {
                    $('.is_correct').find('input[name=is_correct]').removeAttr('disabled');
                }
            },
            error:function(data, status){

            },
            complete: function(){

            }
        });
    });
</script>


@endpush


