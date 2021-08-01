<?php
namespace App\Traits;
use App\Models\Route;

trait RouteFunction
{
    protected $response;
    public function addRoute($employeeID,$routeName,$routeNo){
        $route = Route::where('employee_ID',$employeeID)
            ->where('route_no',$routeNo)
            ->first();
        $this->response = response()->json('exist', 409);
        if(!$route){
            Route::create(['employee_ID' => $employeeID ,'route_no' => $routeNo,'route_name' => $routeName]);
            $this->response = response()->json('success added', 201);
        }

        return $this->response;

    }
}
