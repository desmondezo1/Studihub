<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 22:22
 */
?>

@extends('admin.template.app')

@section('page_title', $student->fullname)
@section('description', "Show Students")
@section('keyword', "student,subscribers,learners")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' =>  $student->fullname,
            ])
    @endcomponent

@endsection

@section("content")

    <!--Section: Main panel-->
    <section>
        <div class="container-fluid">
            <div class="row" data-aos="flip-down">
                <div class="col-lg-12 col-xs-12 text-center">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow" style="display: none; position: absolute; transform: translate3d(19px, 24px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-end"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>{{--<a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>--}}</div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4 text-center">View Student info</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Viewing {{ $student->fullname }} Here</p>
                            </div>
                            <hr class="my-2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" data-aos="fade-up"
                 data-aos-anchor-placement="top-center">
                <div class="col-lg-12 col-xs-12">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4"> Showing {{ $student->fullname }} info</h3>
                        </div>
                        <div class="card-body">
                           <div class="row">
                               <div class="col-md-4">
                                   @if($student->gender != null)
                                       <img src="{{ $student->photo }}" class="img-responsive">
                                   @else
                                   No Thumbnail
                                   @endif
                               </div>
                               <div class="col-md-8">
                                   <div class="table-responsive">
                                       <table id="student" class="table table-striped table-sm">
                                           <tbody>
                                           <tr>
                                               <td>Title:</td>
                                               <td>{{ $student->username }}</td>
                                           </tr>
                                           <tr>
                                               <td>Full Name:</td>
                                               <td>{{ $student->fullname }}</td>
                                           </tr>
                                           <tr>
                                               <td>Phone:</td>
                                               <td>{{ $student->phone }}</td>
                                           </tr>
                                           <tr>
                                               <td>Email:</td>
                                               <td>
                                                   {{ $student->email }}
                                               </td>
                                           </tr>

                                           <tr>
                                               <td>No of Enrolled Course:</td>
                                               <td>
                                                   {{ $student->enrolledCourses ? $student->enrolledCourses->count() : 0 }}
                                               </td>
                                           </tr>

                                           <tr>
                                               <td>Banned:</td>
                                               <td>
                                                   {{ $student->isBanned() ? "Banned" :"No" }}
                                               </td>
                                           </tr>

                                           <tr>
                                               <td>Gender:</td>
                                               <td>{{ $student->gender }}</td>
                                           </tr>

                                           <tr>
                                               <td> Date Sent</td>
                                               <td>{{ prettyDate($student->created_at) }}</td>
                                           </tr>
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="card-footer">
                            <span class="pull-right">
                                <a href="{{ URL::previous() }}" data-original-title="Back To Previous Page" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">

    </script>

@endpush