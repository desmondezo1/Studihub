
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
            'page_route' => 'home'
            ])
    @endcomponent
@endsection

@section('suggestions')
    <h4 class="scroll-title">Suggestions</h4>
    <section class="cards">

        @if ($courses->count()>0)
            @foreach ($courses as $courses)
                <a href="learn/{{$courses->id}}">
                    <div class="card--content">{{$courses->name}}</div>
                </a>
            @endforeach

         @else
            <div class="card--content">No Content Available. Check later</div>
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
@if(count($courses) > 0)
<h4 class="scroll-title">Subjects</h4>
<section class="cards">
    @foreach ($courses as $course)
        <div class="card-content p-3">
            <img class="card-img-top" src="{{ $course->image_path }}" alt="Card image" width="50%">
            <div class="card-body">
                <h4 class="card-title small"><a href= "{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a> </h4>
                <p class="card-text">Some example text.</p>
            </div>
        </div>
    @endforeach
</section>
@endif
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
