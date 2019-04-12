@extends('pages.layouts.template.content')

@section('page_title', "learn Any topic")
@section('description',  "Topics Found")
@section('keyword', "courses,topics")

<?php 
$topics = $TopicsFound;

?>


@section('courses')
<section class="card" style="flex-wrap: wrap;flex-direction: row;justify-content: center;background-color: #f8f9fa59;">

    @if (count($topics) > 0)
        @foreach ($topics as $topic)
            <div class="card--content course-details-card-content">
                <a href="{{ route('topics.display', $topic->slug) }}" style="text-decoration:none;"><div class="container" style="padding: 5px 15px;">
                        <div class="row" style="align-items:center;">
                            <div class="col-9">
                                <p> {{$topic->title}}</p>
                            </div>
                            @if($topic->isfree === 0)
                            <div class="col-3" >
                                <span class="lock" style="font-size: 13px;
                                background: #f8f9fa;
                                padding: 9px;
                                color: #061c3e;
                                border-radius: 50%;
                                border: 2px solid;
                                box-shadow: 0 0 9px #888;"><i class="fas fa-lock"></i><span>
                            </div> 
                            @endif
                            @if($topic->isfree === 1)
                            <div class="col-3" >
                                <span class="lock" style="font-size: 13px;
                                background: #f8f9fa;
                                padding: 6px;
                                font-weight: 600;
                                color: #02ff3c;
                                border-radius: 5px;
                                /* border: 2px solid; */
                                box-shadow: 0 0 9px #28a745;">Free<span>
                            </div> 
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <div class="card--content course-details-card-content"><h6 class="text-info p-4">No Topic(s) Found</h6> </div>
    @endif
</section>
@endsection

