<?php
namespace App\Traits;
use App\Models\Route;

trait RouteFunction
{
    use GenralFunction;
    protected $response;
    public function addRoute($employeeID,$routeName,$routeNo){
        $route = Route::where('employee_id',$employeeID)
            ->where('route_no',$routeNo)
            ->first();
        $this->response = $this->generalResponse(false, 409, 'exist', $errors = null, null);
        if(!$route){
            Route::insert(['employee_id' => $employeeID ,'route_no' => $routeNo,'route_name' => $routeName]);
            $this->response = $this->generalResponse(true, 201, 'success', $errors = null, null);
        }

        return $this->response;

    }
}
