<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 2/27/2019
 * Time: 17:04
 */
?>
{{--{{ dd(session('flash_message.message')) }}--}}
@if (session()->has('flash_message'))
    <script type="text/javascript">
        notifier.notify(
            "{{ session('flash_message.message') }}",
            "{{ session('flash_message.title') }}"
        );
    </script>
@endif
