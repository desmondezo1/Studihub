<ol class="breadcrumb hidden-xs">
    @if(count(Request::segments()) == 0)
        <li class="active breadcrumb-item"><i class="fa fa-dashboard"></i> Home</li>
    @else
        <li class="active breadcrumb-item">
            <a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a>
        </li>
    @endif
    <?php $breadcrumb_url = url(''); ?>
    @for($i = 1; $i <= count(Request::segments()); $i++)
        <?php $breadcrumb_url .= '/' . Request::segment($i); ?>
        @if(Request::segment($i) != ltrim(route('home', [], false), '/') && !is_numeric(Request::segment($i)))

            @if($i < count(Request::segments()) & $i > 0)
                <li class="active breadcrumb-item"><a href="{{ $breadcrumb_url }}">{{ ucwords(str_replace('-', ' ', str_replace('_', ' ', Request::segment($i)))) }}</a>
                </li>
            @else
                <li class="breadcrumb-item">{{ ucwords(str_replace('-', ' ', str_replace('_', ' ', Request::segment($i)))) }}</li>
            @endif

        @endif
    @endfor
</ol>
