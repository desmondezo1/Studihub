<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 22:22
 */
?>

@extends('admin.template.app')

@section('page_title', $role != null ? $role->name : "")
@section('description', "Show Admin info")
@section('keyword', "admin,teachers")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' =>  $role->display_name,
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
                            <h3 class="h4 text-center">View Role info</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Viewing {{ $role->display_name }} Here</p>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="student" class="table table-striped table-sm">
                                            <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td>{{ $role->name }}</td>
                                            </tr>

                                            <tr>
                                                <td>Display Name:</td>
                                                <td>{{ $role->display_name }}</td>
                                            </tr>

                                            <tr>
                                                <td>Permissions:</td>
                                                <td>
                                                    @foreach($role->permissions as $permission)
                                                        {{ $permission->display_name }}<br>
                                                    @endforeach
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Date Sent</td>
                                                <td>{{ prettyDate($role->created_at) }}</td>
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

                        <span class="pull-left">
                                <a href="{{ route('admin.roles.edit', $role->id) }}" data-original-title="Edit Info" data-toggle="tooltip" type="button" class="btn btn-sm btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
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