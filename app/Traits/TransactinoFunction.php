<?php
namespace App\Traits;
use App\Models\Route;
use App\Models\Employee;
use App\Models\Transactino;

trait TransactinoFunction
{
    use GenralFunction;
    protected $response;
    public function addTransactino($routeId,$routeNo,$totalAmount){

            Transactino::create(['route_id' => $routeId ,'route_no' => $routeNo,'total_amount' => $totalAmount]);
            $this->response = $this->generalResponse(true, 201, 'success', $errors = null, null);

            return $this->response;

    }

    public function getAlltransation($routeId,$transactinosId){
        $transactinos = '';
        if (empty($transactinosId)){
            $transactinos = Transactino::where('route_id',$routeId)->sum('total_amount');
        }else{
            $transactinos = Transactino::where('route_id',$routeId)->where('id',$transactinosId)->sum('total_amount');
        }

        $route = Route::where('id',$routeId)->first();
//        $employee = Employee::where('id',$route->employee_id)->first();

         $summaryboj = (object)[
             "total_amount"=> $transactinos,
             "total_hour"=> []
         ];
        $rotsobj = (object) [
            "route_id" => $route->id,
            "route_name"=> $route->route_name,
            "salesman_summary" => $summaryboj
        ];
        $response = (object)[
            "salesman" =>$rotsobj
        ];
        $response = [$response];
        $this->response = $this->generalResponse(true, 200, 'success', $errors = null, $response); // response()->json([$response], 200);
        return $this->response;

    }
}
