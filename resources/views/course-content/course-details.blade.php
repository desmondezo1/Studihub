
@extends('layouts.app')

@section('sub-header')
<div class="jumbotron jumbotron-fluid header-image-jumbotron">
    <a href="{{url('/')}}" class="return-button">Back</a>
       <div class="container">
         <h1 class="display-4">Learn {{$course_name}}</h1>
        <!-- <p class="lead">with 2,500+ videos, notes, and Practise questions on all subjects</p> -->
       </div>
     </div>
@endsection

@section('courses')
<h5 class="scroll-title"><a href="{{url('/')}}" >Home</a> ><a href="{{url('/text')}}" >{{$course_name}}</a></h5>
<section class="card" style="flex-wrap: wrap;flex-direction: row;justify-content: center;background-color: #f8f9fa59;">

@foreach ($topic as $topic)
        <div class="card--content course-details-card-content">
         <a href="{{url('/learn')}}/{{$course_name}}/{{$topic->title}}" topic="{{$topic->title}}"><div class="container" style="padding: 5px 15px;">
         <div class="row" style="align-items:center;">
           <div class="col-9">
              <p> this is where the topic {{$topic->title}}</p>
           </div>
           <div class="col-3" >
               
           </div>
         </div>
         </div></a>
        </div>
        @endforeach
       <div class="card--content course-details-card-content">2</div>
       <div class="card--content course-details-card-content">3</div>
       <div class="card--content course-details-card-content">4</div>
       <div class="card--content course-details-card-content">5</div>
       <div class="card--content course-details-card-content">6</div>
       <div class="card--content course-details-card-content">7</div>
       <div class="card--content course-details-card-content">8</div>
       <div class="card--content course-details-card-content">9</div>
       <div class="card--content course-details-card-content">0</div>
   </section>
   
@endsection

