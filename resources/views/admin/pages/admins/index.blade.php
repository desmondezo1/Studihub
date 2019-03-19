<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 22:22
 */
?>

@extends('admin.template.app')

@section('page_title', "Admins")
@section('description', "Manage Admins")
@section('keyword', "student,subscribers,learners")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Manage Admins',
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
                            <h3 class="h4 text-center">Manage Admins</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Manager All Admins Here</p>
                            </div>
                            <hr class="my-2">
                            <div class="mb-3">
                                <h4 class="info-color-dark white-text text-center mb-5">
                                    @if(Auth::user()->can('create-admin-admin-user-controller'))
                                        <span class="new-button" style="float:left;">
                                                        <i class="fa fa-admin-plus"></i>&nbsp;
                                                    <a href="{{ route('admin.admins.create') }}" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span>
                                                        &nbsp;Add Admin
                                                    </a>
                                        </span>

                                        <span class="new-button" style="float:right;">
                                            <i class="fa fa-admin-plus"></i>&nbsp;
                                            <a href="{{ route('admin.roles.index') }}" class="btn btn-info btn-sm"><span class="fa fa-eye"></span>
                                                &nbsp;View Roles
                                            </a>
                                        </span>
                                    @endif
                                </h4>
                            </div>
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
                            <h3 class="h4">List of Admins</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="students" class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th># </th>
                                        <th>Full Name</th>
                                        <th>Gender </th>
                                        <th>Role</th>
                                        <th>Is Banned </th>
                                        <th>Photo </th>
                                        <th>Date Joined </th>
                                        <th class="col-md-6">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $index=>$admin)
                                        <tr>
                                            <th scope="row">{{ ++$index }}</th>
                                            <td>{{ $admin->fullname }}</td>
                                            <td>{{ $admin->gender }}</td>
                                            <td>
                                                @foreach($admin->roles as $role)
                                                    {{ $role->display_name }}
                                                @endforeach
                                            </td>
                                            <td>{{ $admin->isBanned() ? "Yes" : "No" }}</td>
                                            <th><img src="{{ $admin->photo }}" alt="{{ $admin->fullname }}" class="thumbnail image-responsive" width="100%"></th>
                                            <td>{{ \Carbon\Carbon::parse($admin->created_at)->diffForHumans()}}</td>
                                            <td class="col-md-6">
                                                @if(Auth::user()->can('read-admin-admin-user-controller'))
                                                    <a href="{{ route('admin.admins.show', $admin->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                                @endif
                                                @if(Auth::user()->can('update-admin-admin-user-controller'))
                                                    @if($admin->isNotBanned())
                                                            {!! Form::model($admin, [
                                                                 'method' => 'PATCH',
                                                                 'route' => ['admin.admins.ban', $admin->id],
                                                                 'role' => 'form',
                                                                 'enctype'=>"multipart/form-data", 'class'=>'form-horizontal'
                                                             ]) !!}
                                                        @csrf
                                                        @method('PUT')
                                                            <button  type="submit" id="ban" name="submit" class="btn btn-warning btn-xs"><i class="fa fa-ban" aria-hidden="true"></i> Ban</button>
                                                            {!! Form::close() !!}
                                                    @else
                                                            {!! Form::model($admin, [
                                                                'method' => 'PATCH',
                                                                'route' => ['admin.admins.unban', $admin->id],
                                                                'role' => 'form',
                                                                'enctype'=>"multipart/form-data", 'class'=>'form-horizontal'
                                                            ]) !!}
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" id="unban" name="submit" class="btn btn-success btn-xs"><i class="fa fa-unlock" aria-hidden="true"></i> Unban</button>
                                                            {!! Form::close() !!}
                                                     @endif
                                                @endif
                                                @if(Auth::user()->can('update-admin-admin-user-controller'))
                                                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                @endif
                                                @if(Auth::user()->can('delete-admin-admin-user-controller'))
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-url="{{ route('admin.admins.destroy', $admin->id) }}" data-id="{{ $admin->id }}"><i class="fa fa-trash-o"></i> Delete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th># </th>
                                        <th>Full Name</th>
                                        <th>Gender </th>
                                        <th>Subscription Count</th>
                                        <th>Is Banned </th>
                                        <th>Photo </th>
                                        <th>Date Joined </th>
                                        <th class="col-md-6">
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