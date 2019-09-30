@extends('student.template.app')

@section('page_title', "Welcome To Studihub")
@section('description', "Resource center to prepare for SSCE,JAMB,PUME and GCE")
@section('keyword', "subjects, english,mathematics,geography ...")


@section("page-header")
    @component('student.partials.page-header', [
            'page_name' => 'Dashboard',
            ])
    @endcomponent

@endsection

@section("breadcrum")
    @component('student.partials.page-header', [
            'page_name' => 'Home',
            'page_route' => 'index'
            ])
    @endcomponent

@endsection

@section("content")
    <!-- Dashboard Counts Section-->
    <section class="dashboard-counts no-padding-bottom" data-aos="zoom-in-up">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-12 col-sm-12 col-md-10 mx-auto">

                </div>
            </div>
        </div>
    </section>

@endsection