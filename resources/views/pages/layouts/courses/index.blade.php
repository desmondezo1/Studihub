@extends('pages.layouts.template.content')

@section('page_title', "List of Courses")
@section('description', "Courses available for downloads")
@section('keyword', "subjects, english,mathematics,geography ...")

@section('sub-header')
    <div class="jumbotron jumbotron-fluid header-image-jumbotron" data-aos="flip-right">
        <div class="container">
            <h1 class="display-4">Learn how to Pass</h1>
            <p class="lead">with 2,500+ videos, notes, and Practise questions on all subjects</p>
        </div>
    </div>
    @include('partials.breadcrumb')
@endsection

@section('suggestins')
    <h1 class="scroll-title">Suggestions</h1>
    <section class="cards smallscreen">

        @if ($courses->count() > 0)
            @foreach ($courses as $course)
   
                <a href="{{ route("courses.show", $course->slug) }}">
                    <div class="card--content" data-aos="flip-down">
                    <img src="{{ public_path($course->photo) }}" width="100%" alt="{{$course->name}} Icon">
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
                 <div class="col" style="width:200px; height:150px;" data-aos="flip-down">
                <img class="subject-image" src="{{ public_path($course->photo) }}" width="100%" alt="{{$suggestions->name}} Icon">
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
            <div class="card--content" data-aos="flip-down">
            <img src="{{ public_path($course->photo) }}" width="100%" alt="{{$subject->name}} Icon">
            </div>
        </a>
    @endforeach
</section>
@endif

<div  class="container largerscreen">
<div class="row" style="justify-content: center;">
    @foreach ($courses as $subjects)
    <a href="courses/{{$subjects->id}}">
     <div class="col" style="width:200px; height:150px;" data-aos="flip-down">
    <img class="subject-image" src="{{ public_path($course->photo) }}" width="100%" alt="{{$subjects->name}} Icon">
    </div>
    </a>
    
@endforeach
</div>
</div>
@endsection

@section('skills')
    <h1 class="scroll-title">Learn Skills</h1>
    <section class="cards smallscreen">
            <a href="/courses/">
                <div class="card--content" data-aos="flip-down">
                <img src="img/photo.jpeg" width="100%" alt="Icon">  
                <h3> Photography </h3>
                </div>
            </a>
            <a href="courses/">
                <div class="card--content" data-aos="flip-down">
                <img src="img/programming.jpg" width="100%" alt="Icon">  
                <h3>Programming</h3>
                </div>
            </a>
            <a href="courses/">
                <div class="card--content" data-aos="flip-down">
                <img src="img/baking.jpg" width="100%" alt="Icon"> 
                <h3>Baking</h3> 
                </div>
            </a>
            <a href="courses/">
                <div class="card--content" data-aos="flip-down">
                <img src="img/Fashion.jpg" width="100%" alt="Icon"> 
                <h3>Fashion Design</h3> 
                </div>
            </a>
            <a href="courses/">
                <div class="card--content" data-aos="flip-down">
                <img src="img/baking.jpg" width="100%" alt="Icon"> 
                <h3>Digital Marketing</h3> 
                </div>
            </a>
            @foreach ($courses as $skill)
            <!--<a href="courses/{{$skill->id}}">
                <div class="card--content" data-aos="flip-down">
                <img src="{{ public_path($skill->photo) }}" width="100%" alt="{{$skill->name}} Icon">
                </div>
            </a>-->
        @endforeach
    </section>
    <div  class="container largerscreen">
            <div class="row" style="justify-content: center;">
                    <a href="courses/" data-aos="flip-down" style="color:#333;text-align:center;">
                        <div class="col" style="width:200px; height:150px;">
                       <img class="subject-image" src="img/photo.jpeg" width="100%" alt="Icon"> 
                            <h3>Photogrpahy</h3>
                    </div>
                       </a>
                       <a href="courses/" data-aos="flip-down" style="color:#333;text-align:center;">
                        <div class="col" style="width:200px; height:150px;">
                       <img class="subject-image" src="img/baking.jpg" width="100%" alt="Icon"> 
                            <h3>Baking</h3>
                    </div>
                       </a>
                       <a href="courses/" data-aos="flip-down" style="color:#333;text-align:center;">
                        <div class="col" style="width:200px; height:150px;">
                       <img class="subject-image" src="img/programming.jpg" width="100%" alt="Icon">
                       <h3>Programming</h3> 
                       </div>
                       </a>
                       <a href="courses/" data-aos="flip-down" style="color:#333;text-align:center;">
                        <div class="col" style="width:200px; height:150px;">
                       <img class="subject-image" src="img/bead.jpg" width="100%" alt="Icon">
                       <h3>Bead Making</h3> 
                       </div>
                       </a>
                       <a href="courses/" data-aos="flip-down" style="color:#333;text-align:center;">
                        <div class="col" style="width:200px; height:150px;">
                       <img class="subject-image" src="img/fashion.jpg" width="100%" alt="Icon">
                       <h3>Fashion design</h3> 
                       </div>
                       </a>
                       <a href="courses/" data-aos="flip-down" style="color:#333;text-align:center;">
                        <div class="col" style="width:200px; height:150px;">
                       <img class="subject-image" src="img/fashion.jpg" width="100%" alt="Icon">
                       <h3>Digital Marketing</h3> 
                       </div>
                       </a>
                @foreach ($courses as $skills) 
                
                <!--<a href="courses/{{$skills->id}}" data-aos="flip-down">
                 <div class="col" style="width:200px; height:150px;">
                <img class="subject-image" src="{{ public_path($skill->photo) }}" width="100%" alt="{{$skills->name}} Icon">
                </div>
                </a>
            -->
            @endforeach
            </div>
            </div>
@endsection

@section('footer')
    @parent
@endsection
