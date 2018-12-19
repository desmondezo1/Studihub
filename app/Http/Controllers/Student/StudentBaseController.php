<?php

namespace Studihub\Http\Controllers\Student;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StudentBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
