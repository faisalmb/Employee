<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'employee_id'=>'required|integer|exists:employees,id',
            'route_no'=>'required|integer',
            'route_name'=>'required|string'
        ]);
        $employeeID = $request->employee_id;
        $routeName =  $request->route_name;
        $routeNo = $request->route_no;
        return $this->addRoute($employeeID,$routeName,$routeNo);
    }
}
