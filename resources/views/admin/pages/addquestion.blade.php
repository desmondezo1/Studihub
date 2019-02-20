@extends('admin.template.adminpage')

@section('css')
<style>
.input-group{
    padding: 10px;
}
</style>
@endsection

@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
@endsection

@section('page')
Add Question
@endsection

@section('content')

<div class="container">
 <form action="">
    <div class="row">
        
            <div  class="col-md-6">
        

    <div class="form-group">
            <label for="formGroupExampleInput">Subject<br><small style="font-weight:400;" >Select a subject</small></label>
            
                <select class="custom-select">
                        <option selected>Accounting</option>
                        <option value="1">Agriculture</option>
                        <option value="2">Biology</option>
                        <option value="2">Chemistry</option>
                        <option value="2">Commerce</option>
                        <option value="2">Christian Religious Studies</option>
                        <option value="2">Economics</option>
                        <option value="2">Use of English</option>
                        <option value="2">Geography</option>
                        <option value="2">Government</option>
                        <option value="2">History</option>
                        <option value="2">Islamic Religious Studies</option>
                        <option value="2">Literature</option>
                        <option value="2">Mathematics</option>
                        <option value="2">Physics</option>          
                      </select>
            </div>

            <div class="form-group">
                    <label for="topic">Topic Title <br><small style="font-weight:400;" >Add/search a topic name</small></label>
                    <input  class="form-control" list="topics" name="topic">
                    <datalist id="topics" >
                        <option value="Number bases addition">
                        <option value="subtraction">
                        <option value="Division">
                        <option value="multiplication">
                        <option value="Design thinking">
                    </datalist>
            </div>
         
        </div>
          <div class="col-md-6">  
        <div class="form-group">
            <label for="question">Add question</label>
             <textarea class="form-control textarea" name="Question" id="questiontextarea"></textarea>
            </div>
            <!-- --Add option --->
                <p class="lead">Add Options and select the correct one</p>
                             
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">1</span>
                        <div class="input-group-text">
                            <input type="radio" name="option" aria-label="Radio button for following text input">
                        </div>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with radio button">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                            <span class="input-group-text">2</span>
                        <div class="input-group-text">
                            <input type="radio" name="option" aria-label="Radio button for following text input">
                        </div>
                    </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">3</span>
                        <div class="input-group-text">
                         <input type="radio" name="option" aria-label="Radio button for following text input">
                        </div>
                    </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">3</span>
                    <div class="input-group-text">
                         <input type="radio" name="option" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
                </div>
          </div>
          <div class="container" style="width: 50%;padding: 30px;">
          <button type="submit" name="add_question" class="btn btn-success btn-lg btn-block">Add question</button>
          </div>
        </div>
    </form>
</div>


    
    
    
    
@endsection

@section('jsscript')

<script>
//Script for fileupload for ckeditor
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
         CKEDITOR.replace( 'questiontextarea', options );
</script>
    
@endsection
