<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/15/2019
 * Time: 12:19 PM
 */
?>
@extends('pages.layouts.template.content')

@section('page_title', "Privacy Policy")
@section('description', "Privacy policy pages"
)
@section('keyword', "privacy policy")

@section('sub-header')
    <div class="jumbotron jumbotron-fluid header-image-jumbotron">
        <div class="container">
            <h1 class="display-4">Learn how to Pass</h1>
            <p class="lead">with 2,500+ videos, notes, and Practise questions on all subjects</p>
        </div>
    </div>
    @component('partials.breadcrumb', [
            'page_name' => 'policy',
            'page_route' => 'policy'
            ])
    @endcomponent
@endsection

@section('skills')
    <h1 class="scroll-title">Learn Skills</h1>
    {{--    @if($courses->count() > 0)
            <section class="cards smallscreen">
                @foreach ($courses as $skill)
                    <a href="courses/{{$skill->id}}">
                        <div class="card--content">
                            <img src="{{$skill->image_path}}" width="100%" alt="{{$skill->name}} Icon">
                        </div>
                    </a>
                @endforeach
            </section>
        @endif
        <div  class="container largerscreen">
            @if($courses->count() > 0)
                <div class="row" style="justify-content: center;">
                    @foreach ($courses as $skills)
                        <a href="courses/{{$skills->id}}">
                            <div class="col" style="width:200px; height:150px;">
                                <img class="subject-image" src="{{$skills->image_path}}" width="100%" alt="{{$skills->name}} Icon">
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>--}}
@endsection

@section('footer')
    @parent
@endsection
