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
            $s = app('Studihub\Http\AssetsHelper');
            return $s->scripts();
        }

    }

    if (!function_exists('style_assets')) {
        function style_assets()
        {
            $s = app('Studihub\Http\AssetsHelper');
            return $s->styles();
        }

    }

    if(!function_exists('prettyDate')){
        function prettyDate($date) {
            return date("M d, Y @h:i:s", strtotime($date));
        }
    }


    function flash($title = null, $message = null) {
    // Set variable $flash to fetch the Flash Class
    // in Flash.php
        $flash = new \Studihub\Http\Flash();
        //dd($flash->info('info','Hey'));
    // If 0 parameters are passed in ($title, $message)
    // then just return the flash instance.
        if (func_num_args() == 0) {
            return $flash;
        }

    // Just return a regular flash->info message
        return $flash->info($title, $message);
    }

