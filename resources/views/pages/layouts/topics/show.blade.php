@extends('pages.layouts.template.content')

@if($topic != null)
    @section('page_title', $topic->title)
    @section('description', str_limit($topic->note, 120))
    @section('keyword', $topic->course()->title)
@endif


@section('sub-header')
    @include('partials.breadcrumb')
@endsection

@section('others')
    <div class="slant-bg">Slant</div>
    <div class="container">
    <div class="row">
        <div class="col-md-3">
          <div class="container">
            <div class="input-group mb-3">
                <input type="text" class="form-control topic-search" placeholder="Search" aria-label="search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search topic</button>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
             </ul>
          </div>
        </div>
        <div class="col-md-9">
            <iframe src="https://player.vdocipher.com/playerAssets/1.x/vdo/embed/index.html#otp=20160313versUSE323vHRcuMiStcHM0dJa7JHsfo8ZK1fBenFUvKnY7hKT6FQCRw&playbackInfo=eyJ2aWRlb0lkIjoiN2RjY2Y5MmQ3MTFjNGI5MWI2YjRiMTBiZGY2OGI2ZWQifQ==" style="border:0;height:360px;width:640px;max-width: 100%;border-radius: 5px;box-shadow: 0px 4px 40px rgba(255, 44, 56, 0.36);" allowFullScreen="true" allow="encrypted-media"></iframe>
       
    <div class="container notes-container">
        <h1> This shit aint free </h1>
       <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem nobis exercitationem ullam, consequatur harum modi provident quidem placeat quos commodi rerum optio voluptatum nemo esse ipsa minima dolor aspernatur neque!
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam ex dicta voluptas minus! Laborum saepe iusto cum ullam molestias itaque sit corrupti omnis sunt, iure iste, accusamus debitis, harum quos!
        Lorem ipsum doslor sit amet consectetur, adipisicing elit. Aliquam consequatur, voluptas quo neque blanditiis doloremque aliquid molestiae tempore officia quae impedit praesentium eligendi reprehenderit doloribus accusantium! Magnam obcaecati fugit distinctio!
       </p>
    </div> 
    </div>
    </div>
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

