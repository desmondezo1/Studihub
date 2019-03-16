@extends('pages.layouts.template.content')

@section('page_title', $course ? $course->title : "Course")
@section('description', $course ? str_limit($course->summary, 120) : "About this course")
@section('keyword', "courses,topics")


@section('sub-header')
    <div class="jumbotron jumbotron-fluid header-image-jumbotron">
        <a href="{{url('/')}}" class="return-button">Back</a>
        <div class="container">
            <h1 class="display-4">Learn {{$course ? $course->title : ""}}</h1>
            <!-- <p class="lead">with 2,500+ videos, notes, and Practise questions on all subjects</p> -->
        </div>
    </div>
    @include('partials.breadcrumb')
@endsection

@section('courses')
    {{--i will Replace this your code below with a proper breadcum later--}}
    <section class="card" style="flex-wrap: wrap;flex-direction: row;justify-content: center;background-color: #f8f9fa59;">

        @if (count($course ? $course->topics : []) > 0)
            @foreach ($course->topics as $topic)
                <div class="card--content course-details-card-content">
                    <a href="{{ route('topics.show', $topic->slug) }}"><div class="container" style="padding: 5px 15px;">
                            <div class="row" style="align-items:center;">
                                <div class="col-9">
                                    <p> {{$topic->title}}</p>
                                </div>
                                <div class="col-3" >

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="card--content course-details-card-content"><h6 class="text-info p-4">No Topic(s) Yet For This Course</h6> </div>
        @endif
    </section>

@endsection
