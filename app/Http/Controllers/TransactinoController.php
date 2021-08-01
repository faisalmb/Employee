<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactinoController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'route_id'=>'required|integer|exists:routes,id',
            'route_no'=>'required|integer|exists:routes,route_no',
            'total_amount'=>'required|string'
        ]);
        $routeId = $request->route_id;
        $totalAmount =  $request->total_amount;
        $routeNo = $request->route_no;
        return $this->addTransactino($routeId,$routeNo,$totalAmount);
    }

    public function getAllTransactionsRequest(Request $request){
        $routeId = $request->routeId;
        $transactinosId = null;
       return $this->getAlltransation($routeId,$transactinosId);
    }
    public function getAllTransactionsByIdRequest(Request $request){
        $routeId = $request->routeId;
        $transactinosId = $request->transactinosId;
        return $this->getAlltransation($routeId,$transactinosId);
    }
}
