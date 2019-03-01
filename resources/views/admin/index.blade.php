<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 20:31
 */
?>
@extends('admin.template.app')

@section('page_title', "Welcome To Studihub")
@section('description', "Resource center to prepare for SSCE,JAMB,PUME and GCE")
@section('keyword', "subjects, english,mathematics,geography ...")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Dashboard',
            ])
    @endcomponent

@endsection

@section("breadcrum")
    @component('admin.partials.page-header', [
            'page_name' => 'Home',
            'page_route' => 'index'
            ])
    @endcomponent

@endsection

@section("content")
    <!-- Dashboard Counts Section-->
    <section class="dashboard-counts no-padding-bottom" data-aos="zoom-in-up">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-violet"><i class="icon-user"></i></div>
                        <div class="title"><span>New<br>Clients</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                            </div>
                        </div>
                        <div class="number"><strong>25</strong></div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-red"><i class="icon-padnote"></i></div>
                        <div class="title"><span>Work<br>Orders</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                            </div>
                        </div>
                        <div class="number"><strong>70</strong></div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-green"><i class="icon-bill"></i></div>
                        <div class="title"><span>New<br>Invoices</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                            </div>
                        </div>
                        <div class="number"><strong>40</strong></div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-orange"><i class="icon-check"></i></div>
                        <div class="title"><span>Open<br>Cases</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                            </div>
                        </div>
                        <div class="number"><strong>50</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

