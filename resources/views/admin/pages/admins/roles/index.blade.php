<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 22:22
 */
?>

@extends('admin.template.app')

@section('page_title', "Admin Roles")
@section('description', "Manage Admin Roles")
@section('keyword', "student,teacher,roles")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Roles',
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
                            <h3 class="h4 text-center">Manage Roles</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Manager All Roles Here</p>
                            </div>
                            <hr class="my-2">
                            <div class="mb-3">
                                <h4 class="info-color-dark white-text text-center mb-5">
                                    @if(Auth::user()->can('create-admin-admin-role-controller'))
                                        <span class="new-button" style="float:left;">
                                                        <i class="fa fa-admin-plus" style="color: #005983"></i>&nbsp;
                                                    <a href="{{ route('admin.roles.create') }}" class="btn btn-info btn-sm"><span class="fa fa-plus"></span>
                                                        &nbsp;Create Role
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
                            <h3 class="h4">List of Roles</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="roles" class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th># </th>
                                        <th>Display Name</th>
                                        <th>Name </th>
                                        <th>Date Joined </th>
                                        <th class="col-md-4">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $index=>$role)
                                        <tr>
                                            <th scope="row">{{ ++$index }}</th>
                                            <td>{{ $role->display_name }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($role->created_at)->diffForHumans()}}</td>
                                            <td class="col-md-4">
                                                @if(Auth::user()->can('read-admin-admin-role-controller'))
                                                    <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                                @endif
                                                @if(Auth::user()->can('update-admin-admin-role-controller'))
                                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                @endif
                                                @if(Auth::user()->can('delete-admin-admin-role-controller'))
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-url="{{ route('admin.roles.destroy', $role->id) }}" data-id="{{ $role->id }}"><i class="fa fa-trash-o"></i> Delete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th># </th>
                                        <th>Display Name</th>
                                        <th>Name </th>
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
            $('#roles').DataTable({
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