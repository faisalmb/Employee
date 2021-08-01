<?php
namespace App\Traits;
use App\Models\Transactino;

trait TransactinoFunction
{
    protected $response;
    public function addTransactino($routeId,$routeNo,$totalAmount){

            Transactino::create(['route_id' => $routeId ,'route_no' => $routeNo,'total_amount' => $totalAmount]);
            $this->response = response()->json('success added', 201);

            return $this->response;

    }
}
