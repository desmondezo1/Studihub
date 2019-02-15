@extends('pages.layouts.template.content')

@section('page_title', $topic->title)
@section('description', str_limit($topic->note, 120))
@section('keyword', $topic->course()->title)

@section('sub-header')
    <div class="container video-box" style="padding:20px;">
        <div class="video-container collapse show" style="border-radius:4%;" id="collapseExample">
            <iframe width="100%" height="250px" src="https://www.youtube-nocookie.com/embed/rS4NVyGcmr0?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <a class="btn btn-primary vid-button display" id="hide-button"  data-toggle="collapse" data-target="#collapseExample">
            <i class="fas fa-video-slash"></i> Hide Video
        </a>
        <a class="btn btn-primary vid-button display-none" id="show-button"  data-toggle="collapse" data-target="#collapseExample">
            <i class="fas fa-video"></i> show Video
        </a>

    </div>
    <div class="container notes-container">
        <h1> This shit aint free </h1>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem nobis exercitationem ullam, consequatur harum modi provident quidem placeat quos commodi rerum optio voluptatum nemo esse ipsa minima dolor aspernatur neque!
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam ex dicta voluptas minus! Laborum saepe iusto cum ullam molestias itaque sit corrupti omnis sunt, iure iste, accusamus debitis, harum quos!
        Lorem ipsum doslor sit amet consectetur, adipisicing elit. Aliquam consequatur, voluptas quo neque blanditiis doloremque aliquid molestiae tempore officia quae impedit praesentium eligendi reprehenderit doloribus accusantium! Magnam obcaecati fugit distinctio!
    </div>

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

