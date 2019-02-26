@extends('pages.layouts.template.content')

@section('page_title', "Course Topics")
@section('description', "Course categorized topics available at studihub")
@section('keyword', "topics,course")

@section('sub-header')
    @include('partials.breadcrumb')

@endsection

@section('script')

    <script>
        $("#hide-button").click(function() {
            $("#hide-button").removeClass( "display" ).addClass( "display-none" );
            $("#show-button").removeClass( "display-none" ).addClass( "display" );
        });

        $("#show-button").click(function() {
            $("#show-button").removeClass( "display" ).addClass( "display-none" );
            $("#hide-button").removeClass( "display-none" ).addClass( "display" );
        });

    </script>

@endsection

