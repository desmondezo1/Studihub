@extends('pages.layouts.template.content')

@section('page_title')
Request a Professional tutor
@endsection
@section('description')
Studihub helps you find professional tutors anywhere in the country.
Request a professional tutor on studihub -->
All tutors are a verified to ensure we provide you with only the best.
@endsection
@section('keyword')
Professional tutor Nigeria
@endsection

@section('styles')
<link href="{{ asset('css/privatetutor.css') }}" rel="stylesheet">    
<link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,700" rel="stylesheet">
<style>
  h1,p,a{
    font-family: 'Nunito', sans-serif;
  }
h3{
  margin-bottom: 26px;
  color: #0b316b;
  text-align: center;
  font-family: 'Nunito', sans-serif;
  font-weight: 700;
}  

label{
  color: #5d595a;
  font-weight: 500;
}
.Request{
  margin: 20px;
  padding: 20px;
  display: flex;
  align-items: center;
  justify-content: center;

}

.request-btn{
 width:70%;
 background: #0b316b;
 border: none;
}

.class{
    color: #495057;
    background: white;
    font-family: inherit;
    font-size: 1rem;
    padding: 5px 92px;
    border: 0.6px solid #ccc;
}

.class-list{
  padding: 10px;
}
.class-list a{
  color: #495057;
  font-size: large;
}

input[type="checkbox"]{
  width: 30px; /*Desired width*/
  height: 20px; /*Desired height*/
  cursor: pointer;

}
li{
  padding: 15px 0px;
}
</style>
@endsection

@section('sub-header')
    <div class="jumbotron jumbotron-fluid header-image-jumbotron">
        <div class="container">
            <h1 class="display-4">Find Expert Tutors Near You</h1>
            <p class="lead"></p>
        </div>
    </div class="jumbotron-fluid ">
    
    <div class="become-tutor-div">
Qualified? >> <a class="btn btn-primary become-tutor-btn" href="/tutor-signup">Become a tutor</a>
    </div>

@endsection

@section('suggestions')
<div class="container-fluid">
<div class="row">
  <div class="col-md-6 tutor-image">
     
  </div>
  <div class="col-md-6 form-col">
  <form class="tutor-request-form">
    <h3>Get a Good Tutor, Learn anything</h3>
    <div class="form-group">
        <label for="inputEmail4">Your full Name</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="Mary Doe">
    </div>
    <div class="form-group">
        <label for="inputEmail4">Your phone number</label>
        <input type="tel" class="form-control" id="inputEmail4" placeholder="080xxxxxxxx">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Your email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="jessica@example.com">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Your Password</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
      </div>
    </div>
   
    <div class="form-row">  
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="inputCity">Location</label>
        <input type="text" class="form-control" id="inputCity">
      </div>

      <div class="form-group col-md-6">
          <label for="exampleSelect1">Number of Kids</label>
          <select class="form-control" id="numberofkids">
            <option selected value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <OPTIon value="6">6</OPTIon>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10 and above</option>
          </select>
      </div> 
      <div class="col-lg-12">
          <label for="class">Kid's Class<small>(Multiple selection)</small></label>
          <div class="button-group">
             <button type="button" class="btn btn-default btn-sm dropdown-toggle class" data-toggle="dropdown" name="class">Choose...</span></button>
     <ul class="dropdown-menu class-list">
       <li><input type="checkbox" class=" form-check-inputclass-list-item" id="nursery"/><label class="form-check-label" for="nursery">&nbsp;Nursery</label></li>
       <li><input type="checkbox" class=" form-check-inputclass-list-item" id="primary"/><label class="form-check-label" for="primary">&nbsp;Primary</label></li>
       <li><input type="checkbox" class=" form-check-inputclass-list-item " id="juniorsecondary"/><label class="form-check-label" for="juniorsecondary">&nbsp;Junior Secondary</label></li>
       <li><input type="checkbox" class=" form-check-inputclass-list-item " id="seniorsecondary"/><label class="form-check-label" for="seniorsecondary">&nbsp;Senior Secondary</label></li>
       <li><input type="checkbox" class=" class-list-item " id="exam"/><label class="form-check-label" for="exam">&nbsp;Exam (UTME/POST-UTME/WASSCE)</label></li>
      </ul>
       </div>
     </div>


   <div class="Request col-md-12"> <button type="submit" class="btn btn-primary request-btn" >Get a Tutor</button></div>
  </form>
</div>
</div>
</div>
      @endsection

      @section('scripts')
      <script>
   


        </script>  
      @endsection