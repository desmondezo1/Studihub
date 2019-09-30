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
.accordion .card{
  box-shadow: 0 0 20px 7px #ccc!important;
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
  box-shadow: 0 0 20px 7px #ccc!important;
  
}

.Card:last-child {
  margin-right: 0;
}
.card-header{
  background: #031633;
  border-radius: 5px;
  color: #f8e1e4;
  padding: 0;
}
.btn-link{
  color: #f8f9fa;
  text-decoration: none;
  font-weight: 400;
}
.btn-link:hover, .btn-link:active {
    color: #f8f9fa;
    text-decoration: none;
    background-color: transparent;
    border-color: transparent;
    font-weight: 500;
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
                <input type="text" name="search" class="form-control topic-search" placeholder="Search topic" id="search" aria-label="search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                
                  </div>
            </div>
            <!--- Topic lists ---->
            <ul id="AjaxSearchtopic" class="list-group list-group-flush">
              @foreach ($related_topics as $related_topic)
                <li class="list-group-item">

                <a style="color:#fff; text-decoration:none;" href="{{ route('topics.display', $related_topic->slug) }}">{{$related_topic->title}}</a></li>
              @endforeach
              </ul>
              <!--- END OF TOPIC LISTS --->
          </div>
        </div>
        <div class="col-md-9">
            <iframe src="{{$topic->videoData->embed_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border:0;height:360px;width:640px;max-width: 100%;border-radius: 5px;box-shadow: 0px 4px 40px rgba(255, 44, 56, 0.36);" allowFullScreen="true" allow="encrypted-media"></iframe>
       
          <div class="container notes-container">
              <h1>{{$topic->title}} </h1>
            {!! htmlspecialchars_decode($topic->notes) !!}
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
      <!--END OF FLIP CARDS--->
      <!-----BEGINING OF MODALS------>
      <div class="modal fade" id="pills-ask" tabindex="-1" role="dialog" aria-labelledby="pills-ask" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header" style="   
              position: sticky;
              top: 0;
              margin-bottom:10px;
              z-index:9;
              color: #fff;
              background: #0b316b;
              ">
                <h5 class="modal-title" id="exampleModalCenterTitle">Ask a Tutor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #f8f9fa;">
                  <span aria-hidden="true" style="color: #f8f9fa;">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="accordion" id="accordionExample">
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              How do i calculate the net profit of the equation?
                            </button>
                          </h2>
                        </div>
                        <div class="card-body">
                            <BUTTON class="btn btn-success"><i class="far fa-arrow-alt-circle-up"></i> Vote <span class="badge badge-light">4</span> </button>
                            <BUTTON class="btn btn-default"><i class="far fa-bookmark"></i> Save</button>
                         </div>
                    
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                          </div>
                        </div>
                      </div>


                      <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Collapsible Group Item #2
                            </button>
                          </h2>
                        </div>
                        <div class="card-body">
                            <BUTTON class="btn btn-success"><i class="far fa-arrow-alt-circle-up"></i> Vote <span class="badge badge-light">4</span> </button>
                            <BUTTON class="btn btn-default"><i class="far fa-bookmark"></i> Save</button>
                         </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                          <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingThree">
                          <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Collapsible Group Item #3
                            </button>
                          </h2>
                        </div>
                        <div class="card-body">
                            <BUTTON class="btn btn-success"><i class="far fa-arrow-alt-circle-up"></i> Vote <span class="badge badge-light">4</span> </button>
                            <BUTTON class="btn btn-default"><i class="far fa-bookmark"></i> Save</button>
                         </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                          <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="add-message" style="
              padding: 10px;
              position: sticky;
              bottom: 0px;
              margin-top: 15px;
              background: #e9ecef;
              box-shadow: 0 0 10px -6px black;
              
                }">
                <form action="" method="post">
                 
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ask others" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="far fa-paper-plane"></i> ASK</button>
                  </div>
                </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
      <!------ END OF MODALS --------->
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
        <!--<li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="far fa-sticky-note"></i> Notes</a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" id="pills-card-tab" data-toggle="pill" href="#pills-card" role="tab" aria-controls="pills-card" aria-selected="false"><i class="far fa-eye"></i> Cards</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-practice-tab" data-toggle="pill" href="#pills-practice" role="tab" aria-controls="pills-practice" aria-selected="false" ><i class="fas fa-brain"></i> Practice</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-ask-tab" data-toggle="modal" data-target="#pills-ask" href="" role="tab" aria-controls="pills-ask" aria-selected="false"><i class="fas fa-comments"></i> Ask</a>
        </li>
      </ul>
</div>
@endsection

@section('jscript')

    <script>

        $("#hide-button").click(function() {
            $("#hide-button").removeClass( "display" ).addhpClass( "display-none" );
            $("#show-button").removeClass( "display-none" ).addClass( "display" );
        });

        $("#show-button").click(function() {
            $("#show-button").removeClass( "display" ).addClass( "display-none" );
            $("#hide-button").removeClass( "display-none" ).addClass( "display" );
        });

    $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{ route('Ajax.topic.search')}}',
    data:{'search':$value},
    success:function(data){
     $('#AjaxSearchtopic').html(data);
    }
    });
    })

    </script>
   <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
   </script> 
@endsection
