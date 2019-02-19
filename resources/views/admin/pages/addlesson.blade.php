@extends('admin.template.adminpage')

@section('page')
Add Lesson
@endsection

@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form>
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
            <option value="Internet Explorer">
            <option value="Firefox">
            <option value="Chrome">
            <option value="Opera">
            <option value="Safari">
        </datalist>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">Video Embed Code<br><small style="font-weight:400;" >VDOcipher/Youtube/vimeo/Wistia</small></label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Video Embed code">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Lesson Note</label>
      <textarea class="form-control textarea" id="lessonnote" placeholder="Add the note here" required></textarea>
    </div>
  </form>
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
         CKEDITOR.replace( 'lessonnote', options );
</script>
    
@endsection
