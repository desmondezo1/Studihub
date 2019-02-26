<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/25/2019
 * Time: 20:54
 */
?>
<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">

            @if(count(Request::segments()) == 0)
                <li class="active breadcrumb-item"><i class="fa fa-dashboard"></i> Admin</li>
            @else
                <li class="active breadcrumb-item">
                    <a href="{{ route('admin.index')}}"><i class="fa fa-dashboard"></i> Admin</a>
                </li>
            @endif
            <?php $breadcrumb_url = url(''); ?>
            @for($i = 1; $i <= count(Request::segments()); $i++)
                <?php $breadcrumb_url .= '/' . Request::segment($i); ?>
                @if(Request::segment($i) != ltrim(route('admin.index', [], false), '/') && !is_numeric(Request::segment($i)))

                    @if($i < count(Request::segments()) & $i > 0)
                        <li class="active breadcrumb-item"><a href="{{ $breadcrumb_url }}">{{ ucwords(str_replace('-', ' ', str_replace('_', ' ', Request::segment($i)))) }}</a>
                        </li>
                    @else
                        <li class="breadcrumb-item">{{ ucwords(str_replace('-', ' ', str_replace('_', ' ', Request::segment($i)))) }}</li>
                    @endif

                @endif
            @endfor
    </ul>
</div>
