@extends('admin.template.adminpage')

@section('css')
<link href="{{ URL::asset('css/adminpagemessages.css') }}" rel="stylesheet">
@endsection

@section('page')
Messages
@endsection

@section('content')


<div class="card">
        <div class="card-body">
          <h5 class="card-title">user 5</h5>
          <p class="card-text" style="color:#000;">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <div style="text-align: center;">
                <button data-toggle="modal" data-target="#exampleModal">Reply</button>
                <button>Delete</button>
                <button class="hideorshow" type="button" data-toggle="collapse" data-target="#reply" aria-expanded="false" aria-controls="reply">Show More</button>
            </div>
        </div>
        <div class="card-footer">
          <small class="text-muted">3 mins ago</small>
        </div>
        <div class="collapse card-body reply" id="reply" style="background: rgb(6, 28, 62);">
            <div class="reply-message">
            <p class="card-text reply-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime velit repellat asperiores illo tenetur libero numquam beatae eos voluptatum odit iure nihil enim natus, minima perspiciatis nostrum doloribus quod dolores?</p>
                <div class="card-footer footer-timestamp">
                    <small class="text-muted">Desezo replied 3 mins ago</small>
                  </div>
            </div>
            <div class="reply-message">
            <p class="card-text reply-text">Lorem  footeripsum dolor sit amet consectetur adipisicing elit. Maxime velit repellat asperiores illo tenetur libero numquam beatae eos voluptatum odit iure nihil enim natus, minima perspiciatis nostrum doloribus quod dolores?</p>
                <div class="card-footer footer-timestamp">
                    <small class="text-muted">Eton replied 3 mins ago</small>
                  </div>
            </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Reply as Desezo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="Post">
                    <textarea name="Reply" id="" cols="50" rows="10"></textarea>  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="Submit" class="btn btn-primary">Reply</button>
                </form>
                </div>
              </div>
            </div>
          </div>
          


@endsection
@section('jsscript')
<script>
$(document).ready(function(){
    $(".hideorshow").click(function(){
        $(this).text($(this).text() == 'Show Less' ? 'Show More' : 'Show Less');
    });
});
</script>
@endsection