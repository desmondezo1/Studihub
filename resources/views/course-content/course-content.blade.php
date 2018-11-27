 @extends('layouts.app')

 @section('sub-header')
 <div class="jumbotron jumbotron-fluid header-image-jumbotron">
        <div class="container">
          <h1 class="display-4">Learn how to Pass</h1>
          <p class="lead">with 2,500+ videos, notes, and Practise questions on all subjects</p>
        </div>
      </div>
 @endsection

 @section('suggestions')
 <h4 class="scroll-title">Suggestions</h4>
 <section class="cards">
    
          @if ($course->count()>0)
           @foreach ($course as $course)
            <a href="/{{$course->name}}">
              <div class="card--content">{{$course->name}}</div> 
            </a>
           @endforeach
              
          @endif
        <div class="card--content">1</div>
        <div class="card--content">2</div>
        <div class="card--content">3</div>
        <div class="card--content">4</div>
        <div class="card--content">5</div>
        <div class="card--content">6</div>
        <div class="card--content">7</div>
        <div class="card--content">8</div>
        <div class="card--content">9</div>
        <div class="card--content">0</div>
    </section>
 @endsection

 @section('courses')
 <h4 class="scroll-title">Subjects</h4>
 <section class="cards">
        <div class="card--content">1</div>
        <div class="card--content">2</div>
        <div class="card--content">3</div>
        <div class="card--content">4</div>
        <div class="card--content">5</div>
        <div class="card--content">6</div>
        <div class="card--content">7</div>
        <div class="card--content">8</div>
        <div class="card--content">9</div>
        <div class="card--content">0</div>
    </section>
 @endsection
 
 @section('skills')
 <h4 class="scroll-title">Learn Skills</h4>
 <section class="cards">
        <div class="card--content">1</div>
        <div class="card--content">2</div>
        <div class="card--content">3</div>
        <div class="card--content">4</div>
        <div class="card--content">5</div>
        <div class="card--content">6</div>
        <div class="card--content">7</div>
        <div class="card--content">8</div>
        <div class="card--content">9</div>
        <div class="card--content">0</div>
    </section>
 @endsection

 @section('footer')
     @parent
 @endsection