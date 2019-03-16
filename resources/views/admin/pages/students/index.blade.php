<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 22:22
 */
?>

@extends('admin.template.app')

@section('page_title', "Students")
@section('description', "Manage Students")
@section('keyword', "student,subscribers,learners")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Students',
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
                            <h3 class="h4 text-center">Manage Students</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Manager All Students Here</p>
                            </div>
                            <hr class="my-2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" data-aos="fade-in"
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
                            <h3 class="h4">Manage All Students here</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="students" class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th># </th>
                                        <th>Full Name</th>
                                        <th>Username </th>
                                        <th>Gender </th>
                                        <th>Enrolled Course Count</th>
                                        <th>Is Banned </th>
                                        <th>Photo </th>
                                        <th>Date Joined </th>
                                        <th class="col-md-4">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $index=>$student)
                                        <tr>
                                            <th scope="row">{{ ++$index }}</th>
                                            <td>{{ $student->fullname }}</td>
                                            <td>{{ $student->username }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td><a href="{{ route('admin.students.courses', $student->id) }}">{{ $student->enrolledCourses ? $student->enrolledCourses->count() : 0 }}</a> </td>
                                            <td>{{ $student->isBanned() ? "Yes" : "No" }}</td>
                                            @if($student->gender != null)
                                                <th><img src="{{ $student->photo }}" alt="{{ $student->fullname }}" class="thumbnail image-responsive" width="100%"></th>
                                            @else
                                                <td> Nil</td>
                                            @endif
                                            <td>{{ \Carbon\Carbon::parse($student->created_at)->diffForHumans()}}</td>
                                            <td>
                                                @if(Auth::user()->can('read-admin-admin-student-controller'))
                                                    <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                                @endif
                                                @if(Auth::user()->can('update-admin-admin-student-controller'))
                                                    @if($student->isNotBanned())
                                                            {!! Form::model($student, [
                                                                 'method' => 'PATCH',
                                                                 'route' => ['admin.students.ban', $student->id],
                                                                 'role' => 'form',
                                                                 'enctype'=>"multipart/form-data", 'class'=>'form-horizontal'
                                                             ]) !!}
                                                        @csrf
                                                        @method('PUT')
                                                            <button  type="submit" id="ban" name="submit" class="btn btn-warning btn-xs"><i class="fa fa-ban" aria-hidden="true"></i> Ban</button>
                                                            {!! Form::close() !!}
                                                    @else
                                                            {!! Form::model($student, [
                                                                'method' => 'PATCH',
                                                                'route' => ['admin.students.unban', $student->id],
                                                                'role' => 'form',
                                                                'enctype'=>"multipart/form-data", 'class'=>'form-horizontal'
                                                            ]) !!}
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" id="unban" name="submit" class="btn btn-success btn-xs"><i class="fa fa-undo" aria-hidden="true"></i> Unban</button>
                                                            {!! Form::close() !!}
                                                     @endif
                                                @endif
                                                @if(Auth::user()->can('delete-admin-admin-student-controller'))
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-url="{{ route('admin.students.destroy', $student->id) }}" data-id="{{ $student->id }}"><i class="fa fa-trash-o"></i> Delete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th># </th>
                                        <th>Full Name</th>
                                        <th>Username </th>
                                        <th>Gender </th>
                                        <th>Subscription Count</th>
                                        <th>Is Banned </th>
                                        <th>Photo </th>
                                        <th>Date Joined </th>
                                        <th class="col-md-4">
                                            Actions
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('#students').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                "order" : [['3', "desc"]]
            })
        });
    </script>
@endpush