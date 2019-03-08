<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/15/2019
 * Time: 1:40 PM
 */
?>
@extends('pages.layouts.template.content')

@section('page_title', "Tutor Sign up")
@section('description',"Sign up to become a tutor")
@section('keyword', "tutor,teach,signup")


@section('styles')
<link href="{{ asset('css/privatetutor.css') }}" rel="stylesheet">
@endsection

@section('sub-header')
<div class="jumbotron jumbotron-fluid header-image-jumbotron">
    <div class="container">
        <h1 class="display-4">Become a Tutor and earn Better</h1>
        <p class="lead"></p>
    </div>
</div>

@endsection

@section('suggestions')


<div class="container" style="padding: 20px;">
    <div class="row">
        <div class="col-md-3" style="padding: 1px;text-align: center;">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horrizontal">
                <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                <a class="nav-link" id="credentials-tab" data-toggle="pill" href="#credentials" role="tab" aria-controls="credentials" aria-selected="false">Credentials</a>
                <a class="nav-link" id="media-tab" data-toggle="pill" href="#media" role="tab" aria-controls="media" aria-selected="false">Media</a>
                <a class="nav-link" id="verification-tab" data-toggle="pill" href="#verification" role="tab" aria-controls="verification" aria-selected="false">Verification</a>
                <a class="nav-link" id="socialmedia-tab" data-toggle="pill" href="#socialmedia" role="tab" aria-controls="socialmedia" aria-selected="false">Social Media</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">

                <!-----------------------------------------PROFILE TAB----------------------------------------------------->
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form>
                        <!-- Full name -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">First Name</label>
                                <input type="text" class="form-control" id="firstname" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Last Name</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                            </div>
                        </div>
                        <!-- end full name -->

                        <!-- Gender and Email --->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Hi@example.com">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Gender</label>
                                <select id="inputState" class="form-control">
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="party">D.O.B</label>
                                <input class="form-control" type="date" id="party" name="party" min="1939-01-01" max="2001-01-01">
                            </div>
                        </div>
                        <!-- End of gender and email -->

                        <!-- Address -->
                        <div class="form-group">
                            <label for="inputAddress">Address<small> (Your Current living address. This is where you would attend lessons from)</small></label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>

                    </form>
                 </div>                        

                <!-----------------CREDENTAILS TAB----------------->
                <div class="tab-pane fade" id="credentials" role="tabpanel" aria-labelledby="credentials-tab">
                    <legend style="text-align:center; padding:20px;"> EDUCATION</legend>
                        <form>
                            <!--------------------------EDUCATION -------------------------------->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">School</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="University of ...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Course</label>
                                    <input type="text" class="form-control" id="inputPassword4" placeholder="Animal Science..">
                                </div> 
                                <div class="form-group">
                                    <label for="inputAddress">Degree</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Bsc.">
                                </div>
                            </div>
                           <!-------------------------EXPERIENCE--------------------------------->
                            <legend> Work Experience</legend>
                        
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                    <label for="inputAddress2">Name of company</label>
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Studihub Education S....">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Role</label>
                                    <input type="text" class="form-control" placeholder="Manager...">
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="stillworkthere">
                                    <label class="form-check-label" for="gridCheck">
                                        I still work there
                                    </label>
                                </div>
                            </div>
                            <!-----------------------TEACHING EXPERIENCE--------------------------------->
                            <div class="form-group col-md-4">
                                    <label for="inputState">Teaching experience</label>
                                    <select id="inputState" class="form-control">
                                      <option selected>Just started</option>
                                      <option>1 year</option>
                                      <option>2 years</option>
                                      <option>3 years</option>
                                      <option>4 years</option>
                                      <option>5 years</option>
                                      <option>6 years</option>
                                      <option>7 years</option>
                                      <option>8 years</option>
                                      <option>9 years</option>
                                      <option>More than 10 years</option>
                                    </select>
                            </div>
                            <div class="form-row">
                                <legend>What class do you teach?</legend>
                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nursery">
                                    <label class="form-check-label" for="nursery">
                                       Nursery
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="primary">
                                    <label class="form-check-label" for="primary">
                                        Primary
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="jsecondary">
                                    <label class="form-check-label" for="jsecondary">
                                        Junior Secondary
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ssecondary">
                                    <label class="form-check-label" for="ssecondary">
                                        Senior Secondary
                                    </label>
                                </div>
                            </div>
                                
                            </div>
                            <div class="form-row">
                                    <legend>Academic Curricullum</legend>
                                <div class="form-group col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nigerian">
                                        <label class="form-check-label" for="nigerian">
                                           Nigerian
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="british">
                                        <label class="form-check-label" for="british">
                                            British
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="american">
                                        <label class="form-check-label" for="american">
                                            American
                                        </label>
                                    </div>
                                </div>
                            </div>
                      

                  
                            <button type="submit" class="btn btn-primary">Next >></button>
 
                        </form>
                    </div>

                <!------------------------------------->

                <!--------------- MEDIA TAB ------------------>
                <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>

                <!------------------------------------------VERIFICATION TAB----------------------------------------------------->
                <div class="tab-pane fade" id="verification" role="tabpanel" aria-labelledby="verification-tab">lorem</div>
                <!-----------------------------------------------SOCIAL MEDIA TAB----------------------------------------------------------------->
                <div class="tab-pane fade" id="socialmedia" role="tabpanel" aria-labelledby="socialmedia-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo nisi optio ratione odio, quidem incidunt, eos, consequuntur sed aspernatur minus cum ad perferendis reiciendis laboriosam excepturi maxime est nulla adipisci.</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    

@endsection