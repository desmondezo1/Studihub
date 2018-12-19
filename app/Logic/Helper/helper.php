<?php
/**
 * Created by PhpStorm.
 * User: Precious Ogbewi
 * Date: 06/12/2018
 * Time: 09:59
 */
?>
<?php

if (!function_exists('script_assets')) {
    function script_assets()
    {
        $s = app('App\Http\AssetsHelper');
        return $s->scripts();
    }

}

if (!function_exists('style_assets')) {
    function style_assets()
    {
        $s = app('App\Http\AssetsHelper');
        return $s->styles();
    }

}

