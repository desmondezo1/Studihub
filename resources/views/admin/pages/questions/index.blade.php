<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 22:23
 */
?>
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
            'page_name' => 'Questions',
            ])
    @endcomponent

@endsection

@section("breadcrum")
    @component('admin.partials.page-header', [
            'page_name' => 'Questions',
            'page_route' => 'admin.questions.index'
            ])
    @endcomponent

@endsection

@section("content")


@endsection


