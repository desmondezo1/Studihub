@extends('pages.layouts.template.content')

@section('page_title', "About Studihub")
@section('description',
"We are dedicated to helping students in
secondary pass their exams by making the
neccessary resources available to them"
)
@section('keyword', "learn,pass,studihub online education")

@section('sub-header')
    <div class="jumbotron jumbotron-fluid header-image-jumbotron">
        <div class="container">
            <h1 class="display-4">About us</h1>
            <p class="lead">At Studihub we work hard every day to you learn and pass your exams better</p>
        </div>
    </div>
    @component('partials.breadcrumb', [
            'page_name' => 'about',
            'page_route' => 'about'
            ])
    @endcomponent
@endsection

@section('skills')
<div class="container">
    <p>Studihub is an educational platform that uses audio-visual aids, notes, practice questions and tutors to help students learn and pass their exams better</p>
    <div class="row">
        <div class="col-md-6">
text
        </div>
        <div class="col-md-6">
image
        </div>

    </div>
</div>
@endsection

@section('footer')
    @parent
@endsection

