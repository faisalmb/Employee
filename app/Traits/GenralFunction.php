<?php
namespace App\Traits;
use stdClass;
use Illuminate\Support\Str;
trait GenralFunction
{
    function generalResponse($status, $code, $message, $errors = null, $data = null)
    {
        $data = is_null($data) ? new stdClass() : $data;
        return response()->json(['status' => $status, 'code' => $code, 'message' => $message, 'errors' => $errors, 'data' => $data], $code);
    }
}
