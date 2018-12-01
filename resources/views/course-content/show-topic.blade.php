@extends('layouts.app')

@section('sub-header')
<div class="container video-box" style="padding:20px;">
  <div class="video-container collapse show" style="border-radius:4%;" id="collapseExample">
    <iframe width="100%" height="250px" src="https://www.youtube-nocookie.com/embed/rS4NVyGcmr0?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   </div>
   <a class="btn btn-primary btn-sm vid-button display" id="hide-button"  data-toggle="collapse" data-target="#collapseExample">
      <i class="fas fa-video-slash"></i> Hide Video
   </a>
   <a class="btn btn-primary btn-sm vid-button display-none" id="show-button"  data-toggle="collapse" data-target="#collapseExample">
      <i class="fas fa-video"></i> show Video
   </a>
   
</div>
<div class="container notes-container">   
  <h1> This shit aint free </h1>

   Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem nobis exercitationem ullam, consequatur harum modi provident quidem placeat quos commodi rerum optio voluptatum nemo esse ipsa minima dolor aspernatur neque!
   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam ex dicta voluptas minus! Laborum saepe iusto cum ullam molestias itaque sit corrupti omnis sunt, iure iste, accusamus debitis, harum quos!
   Lorem ipsum doslor sit amet consectetur, adipisicing elit. Aliquam consequatur, voluptas quo neque blanditiis doloremque aliquid molestiae tempore officia quae impedit praesentium eligendi reprehenderit doloribus accusantium! Magnam obcaecati fugit distinctio!
   For example,   7 1
   3
   k
   k and  n i
   i
   0
   4 
   <div class="button-group">
   <button id="pagination-button" class="previous-button">Previous</button>
   <button id="pagination-button" class="next-button">Next</button> 
   </div>  
</div>

@endsection

@section('footer')

<nav class="menu">
		<input type="radio" name="menu" id="one" checked>
		<input type="radio" name="menu" id="two">
		<input type="radio" name="menu" id="three">
		<input type="radio" name="menu" id="four">
		<div class="list">
			<div class="link-wrap">
				<label for="one">
					<i class="material-icons">home</i>
					<span>Home</span>
				</label>
				<label for="two">
					<i class="material-icons">chat</i>
					<span>Ask</span>
				</label>
				<label for="three">
               <i class="material-icons">
                  person
               </i>
               <span>Profile</span>
					
				</label>
				<label for="four">
					<i class="material-icons">menu</i>
					<span>Topics</span>
				</label>
			</div>
		</div>
</nav>
    <!--<div class="container-fluid bottom-nav">
      <div><i class="fas fa-caret-left"></i></div>
      <div>Home</div>
      <div><i class="fas fa-caret-right"></i></div>
    </div>-->
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