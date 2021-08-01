<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'First_Name'=>'required|string',
            'Last Name'=>'required|string'
        ]);
        $firstName = $request->First_Name;
        $lastName =  $request->Last_Name;
        return $this->addEmployee($firstName, $lastName);
    }
}
