<?php
namespace App\Traits;
use App\Models\Employee;

trait EmployeeFunction
{
    use GenralFunction;
    protected $response;
    public function addEmployee($firstName,$lastName){
        $employeeNamel = Employee::where('first_name',$firstName)
            ->where('last_name',$lastName)
            ->first();
        $this->response = $this->generalResponse(false, 409, 'exist', $errors = null, null);
        if(!$employeeNamel){
            Employee::insert(['first_name' => $firstName ,'last_name' => $lastName]);
            $this->response = $this->generalResponse(true, 201, 'success', $errors = null, null);
        }

        return $this->response;

    }
}
