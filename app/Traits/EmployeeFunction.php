<?php
namespace App\Traits;
use App\Models\Employee;

trait EmployeeFunction
{
    protected $response;
    public function addEmployee($firstName,$lastName){
        $employeeNamel = Employee::where('first_name',$firstName)
            ->where('last_name',$lastName)
            ->first();
        $this->response = response()->json('exist', 409);
        if(!$employeeNamel){
            Employee::insert(['first_name' => $firstName ,'last_name' => $lastName]);
            $this->response = response()->json('success added', 201);
        }

        return $this->response;

    }
}
