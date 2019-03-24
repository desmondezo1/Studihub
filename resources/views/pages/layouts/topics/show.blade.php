@extends('pages.layouts.template.content')

@if($topic != null)
    @section('page_title', $topic->title)
    @section('description', str_limit($topic->note, 120))
    @section('keyword', $topic->course()->first() ? $topic->course()->first()->title : '')
@endif

@section('styles')
    <style>
    ul.mb-3 li a{
        padding: 10px 15px;
        color: #fff;
    }
    ul.mb-3 li{
        margin: 0px 5px;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #0b316b;
    border-radius: 2px;
    }
    /* A simple page container that has 20px either side */
.PageContainer {
  width: 100%;
  padding: 0 20px;
}

.CardsContainer {
  /* Bring the main container edge to edge using a negative margin either side equal to the padding of the PageContainer class. */
  margin-left: -20px;
  margin-right: -20px;
  /* Hide anything that vertically overflows. This is the line that prevents the scrollbar from showing. Uncomment it to see what I mean.*/
  overflow-y: hidden;
  /* Allow some bottom padding to show so that we do not cut off some of the card box shadow. Careful not to add too much padding though or the scroll bar will come back into view. */
  padding-bottom: 20px;
}

.Cards {
  /* Dont allow cards to wrap onto a new line. You can use other methods to get the cards side by side but as im using display: inline-block on the cards this is the quickest way. */
  white-space: nowrap;
  /* Allow scrolling on the x axis */
  overflow-x: scroll;
  /* Set scroll snapping */
  scroll-snap-type: x mandatory;
  /*  Add some padding to top top of the Cards so that we aren't clipping the Card box shadow  */
  padding-top: 20px;
  /* Add scroll padding to prevent the scroll snapping to the edge of the screen */
  scroll-padding: 0 20px;
  /*  Add padding left and right of the Cards equal to the padding of the PageContainer  */
  padding-left: 20px;
  padding-right: 20px;
  /* The following two lines are crutial to hiding the scroll bar. Add a decent amount of padding to the bottom so that the scroll bar shows a bit bellow the cards. Then use a negative margin to pull the Cards up again.  */
  padding-bottom: 30px;
  margin-bottom: -30px;
  /* The following line adds momentum scrolling on iOS and feels a lot smoother. */
  -webkit-overflow-scrolling: touch;
}

.Card {
  /* Set scroll snapping */
  scroll-snap-align: start;
  width: 80%;
  height: 290px;
  background: white;
  margin-right: 15px;
  border-radius: 15px;
  white-space: normal;
  display: inline-block;
  box-shadow: 0px 2px 20px rgba(8, 0, 58, 0.2);
}

.Card:last-child {
  margin-right: 0;
}


    </style>
@endsection

@section('sub-header')
    @include('partials.breadcrumb')
@endsection

@section('others')
    <div class="slant-bg">Slant</div>
    <div class="container">
    <div class="row">
        <div class="col-md-3">
          <div class="container topic-list">
            <div class="input-group mb-3">
                <input type="text" class="form-control topic-search" placeholder="Search topic" aria-label="search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <ul class="list-group list-group-flush">
              @foreach ($topicList as $topicList)
                <li class="list-group-item">{{$topicList->title}}</li>
              @endforeach
              </ul>
          </div>
        </div>
        <div class="col-md-9">
            <iframe src="https://player.vdocipher.com/playerAssets/1.x/vdo/embed/index.html#otp=20160313versUSE323vHRcuMiStcHM0dJa7JHsfo8ZK1fBenFUvKnY7hKT6FQCRw&playbackInfo=eyJ2aWRlb0lkIjoiN2RjY2Y5MmQ3MTFjNGI5MWI2YjRiMTBiZGY2OGI2ZWQifQ==" style="border:0;height:360px;width:640px;max-width: 100%;border-radius: 5px;box-shadow: 0px 4px 40px rgba(255, 44, 56, 0.36);" allowFullScreen="true" allow="encrypted-media"></iframe>
       
    <div class="container notes-container">
        <h1> TOPIC TITLE </h1>
       <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem nobis exercitationem ullam, consequatur harum modi provident quidem placeat quos commodi rerum optio voluptatum nemo esse ipsa minima dolor aspernatur neque!
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam ex dicta voluptas minus! Laborum saepe iusto cum ullam molestias itaque sit corrupti omnis sunt, iure iste, accusamus debitis, harum quos!
        Lorem ipsum doslor sit amet consectetur, adipisicing elit. Aliquam consequatur, voluptas quo neque blanditiis doloremque aliquid molestiae tempore officia quae impedit praesentium eligendi reprehenderit doloribus accusantium! Magnam obcaecati fugit distinctio!
       </p>
    </div>

<div class="flip-cards">
    <div class="PageContainer">
        <h1>Study Cards</h1>
        <div class="CardsContainer">
           <div class="Cards">
               <!-- STUDY CARD'S CONTENT ON MODAL -->
             <a href="" data-toggle="modal" data-target="#exampleModal"><div class="Card"></div></a>
                <!---MODAL OF CARD EXPLANATION-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color: #ff0017; font-size:3rem;">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>

                          </div>
                        </div>
                      </div>
                <!---END OF CARD MODAL---->
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
             <div class="Card"></div>
          </div>
        </div>
      
      </div>
</div>
    </div>
    </div>
    </div>
 <div class="container" 
 style="background: #d72b3b;
 position: sticky;
 border-radius: 5px;
 bottom: 0;
 box-shadow: 0px -5px 17px #f8e1e4;
 ">
 
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"  
    style="
    justify-content: center;
    
    
    ">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="far fa-sticky-note"></i> Notes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" ><i class="fas fa-brain"></i> Practice</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="far fa-eye"></i> Cards</a>
        </li>
      </ul>
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

