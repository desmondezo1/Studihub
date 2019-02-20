<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;

class AdminBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $user;

    public function __construct()
    {
        if (app()->runningInConsole()) {
            return;
        }
        $route = app(Route::class);
        // Get the controller array
        $arr = array_reverse(explode('\\', explode('@', $route->getAction()['uses'])[0]));

        $controller = '';

        // Add folder
        if ($arr[1] != 'controllers') {
            $controller .= kebab_case($arr[1]) . '-';
        }

        // Add file
        $controller .= kebab_case($arr[0]);

        //dd($controller);
        // Skip ACL
        $skip = ['admin-admin-controller'];
        if (in_array($controller, $skip)) {
            return;
        }
        //dd('permission:read-' . $controller);

        // Add CRUD permission check
        $this->middleware('permission:create-' . $controller)->only(['create', 'store']);
        $this->middleware('permission:read-' . $controller)->only(['index', 'show', 'edit']);
        $this->middleware('permission:update-' . $controller)->only(['update']);
        $this->middleware('permission:delete-' . $controller)->only('destroy');
    }
}
