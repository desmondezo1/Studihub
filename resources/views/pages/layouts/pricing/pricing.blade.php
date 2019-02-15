@extends('pages.layouts.template.content')

<!-- Css link scetion -->
@section('styles')
    <link href="{{ asset('css/pricing.css') }}" rel="stylesheet">
@endsection

@section('sub-header')
    <div class="jumbotron jumbotron-fluid header-image-jumbotron">
        <a href="{{url('/')}}" class="return-button">Back</a>
        <div class="container">
            @isset($course_name)
                <h1 class="display-4">Learn {{$course_name}}or </h1>
        @endisset

        <!-- <p class="lead">with 2,500+ videos, notes, and Practise questions on all subjects</p> -->
        </div>
    </div>
@endsection

@section('pricing')
    <div class="pill-wrapper">
        <ul class="nav nav-pills">
            <li class="nav-item pill-item">
                <a class="nav-link pill-link active" data-toggle="pill" href="#subscription">Subscription</a>
            </li>
            <li class="nav-item pill-item">
                <a class="nav-link pill-link" data-toggle="pill" href="#buy_topic">Buy a Topic</a>
            </li>
        </ul>
    </div>



    <!-- Section of dynamic pills -->

    <div class="tab-content">
        <div class="tab-pane container active" id="subscription">
            <div class="container">
                <div class="row" style="justify-content: center;">
                    <div class="col-md-3 col-sm-6 ">
                        <div class="price-box">
                            <h1 style="color:#007bff;">N200<small style="color:#888;">/Day</small></h1>
                            <ul>
                                <li>Over 300 Videos</li>
                                <li>Exam Notes</li>
                                <li>Practise questions</li>
                                <li>30+ World Class teachers</li>
                                <li>Online tutoring</li>
                            </ul>

                            <form method="POST" action="{{ route('pay') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="amount" value="200" />
                                <input type="hidden" name="country" value="NG" /> <!-- Replace the value with your transaction country -->
                                <input type="hidden" name="currency" value="NGN" />
                                <input type="hidden" name="email" value="{{ auth()->guard('student')->user() != null ? auth()->guard('student')->user()->email : '' }}" /> <!-- Replace the value with your customer email -->
                                <input type="hidden" name="firstname" value="{{ auth()->guard('student')->user() != null ? auth()->guard('student')->user()->firstname : '' }}" /> <!-- Replace the value with your customer firstname -->
                                <input type="hidden" name="lastname" value="{{ auth()->guard('student')->user() != null ? auth()->guard('student')->user()->lastname : '' }}" /> <!-- Replace the value with your customer lastname -->
                                <input type="hidden" name="phonenumber" value="{{ auth()->guard('student')->user() != null ? auth()->guard('student')->user()->phone : '' }}" /> <!-- Replace the value with your customer phonenumber -->
                                <input type="hidden" name="paymentplan" value="100" /> <!-- Replace the value with the payment plan id -->
                                <input type="hidden" name="metadata" value="{{ json_encode(['topic_id'=> $topic->id]) }}"/>
                                <input type="hidden" name="description" value="Flutterwave Jersey" />
                                <input type="submit" value="Buy" class="btn btn-block btn-primary payment-btn" style="background: #007bff;box-shadow: 0px 4px 13px rgba(0, 0, 0, 0.25);
                               border-radius: 5px;"/>
                            </form>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="price-box">
                            <h1 style="color:#ff2c38;">N500<small style="color:#888;">/Week</small></h1>
                            <ul>
                                <li>Over 300 Videos</li>
                                <li>Exam Notes</li>
                                <li>Practise questions</li>
                                <li>30+ World Class teachers</li>
                                <li>Online tutoring</li>
                            </ul>
                            <a href="{{ route('pay') }}" style="background:#ff2c38;box-shadow: 0px 4px 13px rgba(0, 0, 0, 0.25);
                            border-radius: 5px;">
                                Buy
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 ">
                        <div class="price-box">
                            <h1 style="color:#02da0d;">N1000<small style="color:#888;">/Month</small></h1>
                            <ul>
                                <li>Over 300 Videos</li>
                                <li>Exam Notes</li>
                                <li>Practise questions</li>
                                <li>30+ World Class teachers</li>
                                <li>Online tutoring</li>
                            </ul>
                            <a
                                href="{{ route('pay') }}" style="background: #02da0d;box-shadow: 0px 4px 13px rgba(0, 0, 0, 0.25);
                            border-radius: 5px;">
                                Buy
                            </a>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- second section for the buy a topic -->
        <div class="tab-pane container fade" id="buy_topic">
            <!-- Price and number of topics selected dynamically displayed -->
            <div class="container display-total">
                <div class="row">
                    <div class="col-md-6">
                        <p>Total: 3</p>
                    </div>
                    <div class="col-md-6">
                        <p>Price: N600</p>
                    </div>
                </div>
            </div>
            <!-- end -->

            <div class="container">
                <div class="background">
                    <!-- search topic form -->
                    <form action="">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search Topic" name="search_topic" id="" class="form-control">
                    </form>
                    <!-- End of search topic form -->
                </div>
            </div>

            <!-- Form For check box -->
            <form action="" method="post">
                <div class="container">
                    <div class="list-topics">
                        <input type="checkbox" id="test1" />
                        <label for="test1">Red</label>
                    </div>
                    <div class="list-topics">
                        <input type="checkbox" id="test2" />
                        <label for="test2">Red2</label>
                    </div>
                    <div class="list-topics">
                        <input type="checkbox" id="test3" />
                        <label for="test3">Red3</label>
                    </div>
                    <div style="display: flex;justify-content:center;">
                        <button class="btn btn-sucess" type="submit" style="background: #02da0d;color:#fff;padding: 8px 69px;">Buy</button>
                    </div>
                    <div style="display: flex;justify-content:center;">
                        <p>Valid for 7days</p>
                    </div>

                </div>

            </form>
            <!-- end of form -->
        </div>
    </div>
@endsection
