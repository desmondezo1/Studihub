
@extends('pages.layouts.template.content')

@section('sub-header')
    <div class="jumbotron jumbotron-fluid header-image-jumbotron">
        <div class="container">
            <h1 class="display-4">Learn how to Pass</h1>
            <p class="lead">with 2,500+ videos, notes, and Practise questions on all subjects</p>
        </div>
    </div>
    @component('partials.breadcum', [
            'page_name' => 'Home',
            'page_route' => 'courses.index'
            ])
    @endcomponent
@endsection

@section('suggestions')
    <h1 class="scroll-title">Suggestions</h1>
    <section class="cards smallscreen">

        @if ($courses->count()>0)
            @foreach ($courses as $course)
   
                <a href="{{ route("courses.show", $course->slug) }}">
                    <div class="card--content">
                    <img src="{{$course->image_path}}" width="100%" alt="{{$course->name}} Icon">  
                    </div>
                </a>
            @endforeach

         @else
            <div class="card--content">No Content Available. Check later</div>
        @endif
        
    </section>
    <div  class="container largerscreen">
            <div class="row" style="justify-content: center;">
                @foreach ($courses as $suggestions)
                
                <a href="{{ route("courses.show", $suggestions->slug) }}">
                 <div class="col" style="width:200px; height:150px;">
                <img class="subject-image" src="{{$suggestions->image_path}}" width="100%" alt="{{$suggestions->name}} Icon"> 
                </div>
                </a>
                
            @endforeach
            </div>
            </div>
@endsection

@section('courses')

@if($courses->count() > 0)
<h1 class="scroll-title">Subjects <small class="muted-text" style="font-size: 52%;
    padding: 5px;
    background: #6c757d;
    font-weight: 400;
    color: #f8f9fa;
    border-radius: 5%;
    box-shadow: 0 0 13px -3px black;">SSCE/UTME</small></h1>

<section class="cards smallscreen">
    @foreach ($courses as $subject)
        <a href="courses/{{$subject->id}}">
            <div class="card--content">
            <img src="{{$subject->image_path}}" width="100%" alt="{{$subject->name}} Icon">  
            </div>
        </a>
    @endforeach
</section>
@endif

<div  class="container largerscreen">
<div class="row" style="justify-content: center;">
    @foreach ($courses as $subjects)
    
    <a href="courses/{{$subjects->id}}">
     <div class="col" style="width:200px; height:150px;">
    <img class="subject-image" src="{{$subjects->image_path}}" width="100%" alt="{{$subjects->name}} Icon"> 
    </div>
    </a>
    
@endforeach
</div>
</div>
@endsection

@section('skills')
    <h1 class="scroll-title">Learn Skills</h1>
    <section class="cards smallscreen">
            @foreach ($courses as $skill)
            <a href="courses/{{$skill->id}}">
                <div class="card--content">
                <img src="{{$skill->image_path}}" width="100%" alt="{{$skill->name}} Icon">  
                </div>
            </a>
        @endforeach
    </section>
    <div  class="container largerscreen">
            <div class="row" style="justify-content: center;">
                @foreach ($courses as $skills)
                
                <a href="courses/{{$skills->id}}">
                 <div class="col" style="width:200px; height:150px;">
                <img class="subject-image" src="{{$skills->image_path}}" width="100%" alt="{{$skills->name}} Icon"> 
                </div>
                </a>
                
            @endforeach
            </div>
            </div>
@endsection

@section('footer')
    @parent
@endsection
