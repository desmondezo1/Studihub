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
        @if(count(Request::segments()) < 1)
            <li class="breadcrumb-item"><a href="{{ route($page_route)}} }}">{{ $page_name }}</a></li>
        @else
            <li class="breadcrumb-item active">{{ $page_name }}</li>
        @endif

        <?php $breadcrumb_url = url(''); ?>
        @for($i = 1; $i <= count(Request::segments()); $i++)
            @php $breadcrumb_url .= "/" . Request::segment($i); @endphp
            @if(Request::segment($i) != ltrim(route($page_route, [], false), '/') && !is_numeric(Request::segment($i)))
                &nbsp; / &nbsp;
                @if($i < count(Request::segments()) & $i > 0)
                    <li class="active">
                        <a href="{{ $breadcrumb_url }}">{{ ucwords(str_replace('-', ' ', str_replace('_', ' ', Request::segment($i)))) }}</a>
                    </li>
                @else
                    <li>{{ ucwords(str_replace('-', ' ', str_replace('_', ' ', Request::segment($i)))) }}</li>
                @endif

            @endif
        @endfor
    </ul>
</div>
