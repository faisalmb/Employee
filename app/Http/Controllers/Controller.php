<?php

namespace App\Http\Controllers;

use App\Traits\EmployeeFunction;
use App\Traits\RouteFunction;
use App\Traits\TransactinoFunction;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use EmployeeFunction,
        RouteFunction,
        TransactinoFunction;
}
