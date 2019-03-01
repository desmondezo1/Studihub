@extends('pages.layouts.template.content')

@section('page_title', "Welcome To Studihub")
@section('description', "Resource center to prepare for SSCE,JAMB,PUME and GCE")
@section('keyword', "subjects, english,mathematics,geography ...")

@section('sub-header')
    <div class="jumbotron jumbotron-fluid header-image-jumbotron" data-aos="zoom-in">
        <div class="container">
            <h1 class="display-4">Learn how to Pass</h1>
            <p class="lead">with 2,500+ videos, notes, and Practise questions on all subjects</p>
        </div>
    </div>
    @component('partials.breadcrumb', [
            'page_name' => 'Home',
            'page_route' => 'index'
            ])
    @endcomponent
@endsection

@section('suggestions')
    <h1 class="scroll-title">Suggestions</h1>
    <section class="cards smallscreen">

        @if ($courses->count()>0)
            @foreach ($courses as $course)
   
                <a href="{{ route("courses.show", $course->slug) }}">
                    <div class="card-content">
                    <img src="{{storage_path($course->photo)}}" width="100%" alt="{{$course->name}} Icon" data-aos="flip-left"
                         data-aos-easing="ease-out-cubic"
                         data-aos-duration="2000">
                    </div>
                </a>
            @endforeach

         @else
            <div class="card-content">No Content Available. Check later</div>
        @endif
        
    </section>
    <div  class="container largerscreen">
        @if($courses->count() > 0)
            <div class="row" style="justify-content: center;">
                @foreach ($courses as $suggestion)
                    <a href="{{ route("courses.show", $suggestion->slug) }}">
                        <div class="col" style="width:200px; height:150px;">
                            <img class="subject-image" src="{{ '/storage/'.$suggestion->photo}}" width="100%" alt="{{$suggestion->name}} Icon" data-aos="flip-left"
                                 data-aos-easing="ease-out-cubic"
                                 data-aos-duration="2000">
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
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
            <a href="{{ route("courses.show", $subject->slug) }}">
                <div class="card--content" data-aos="flip-right"
                     data-aos-easing="ease-out-cubic"
                     data-aos-duration="2000">
                <img src="{{ '/storage/'.$subject->photo }}" width="100%" alt="{{$subject->name}} Icon">
                </div>
            </a>
        @endforeach
    </section>
@endif

<div  class="container largerscreen">
    @if($courses->count() > 0)
        <div class="row" style="justify-content: center;">
            @foreach ($courses as $subjects)
                <a href="{{ route("courses.show", $subject->slug) }}">
                    <div class="col" style="width:200px; height:150px;" data-aos="flip-right"
                         data-aos-easing="ease-out-cubic"
                         data-aos-duration="2000">
                        <img class="subject-image" src="{{ '/storage/'.$subject->photo }}" width="100%" alt="{{$subjects->name}} Icon">
                    </div>
                </a>
            @endforeach
        </div>
     @endif
</div>
@endsection

@section('skills')
    <h1 class="scroll-title">Learn Skills</h1>
       @if($courses->count() > 0)
           <section class="cards smallscreen">
               @foreach ($courses as $skill)
                   <a href="{{ route("courses.show", $skill->slug) }}">
                       <div class="card--content" data-aos="flip-left"
                            data-aos-easing="ease-out-cubic"
                            data-aos-duration="2000">
                           <img src="{{ '/storage/'.$skill->photo }}" width="100%" alt="{{$skill->name}} Icon">
                       </div>
                   </a>
               @endforeach
           </section>
        @endif
    <div  class="container largerscreen">
        @if($courses->count() > 0)
            <div class="row" style="justify-content: center;">
                @foreach ($courses as $skills)
                    <a href="{{ route("courses.show", $skill->slug) }}">
                        <div class="col" style="width:200px; height:150px;" data-aos="flip-left"
                             data-aos-easing="ease-out-cubic"
                             data-aos-duration="2000">
                            <img class="subject-image" src="{{ '/storage/'.$skill->photo }}" width="100%" alt="{{$skills->name}} Icon">
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('footer')
    @parent
@endsection
