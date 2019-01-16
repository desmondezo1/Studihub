<ol class="breadcrumb hidden-xs">
    @if(count(Request::segments()) < 1)
        <li class="active"><i class="fa fa-dashboard"></i> {{ $page_name }}</li>
    @else
        <li class="active">
            <a href="{{ route($page_route)}}"><i class="fa fa-dashboard"></i> {{ $page_name }}</a>
        </li>
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
</ol>
