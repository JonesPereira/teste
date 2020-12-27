<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ControllerAPI extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function toJson($data, $status = 200, $message = false)
    {
        if ($message === false) {
            return response()->json(['status' => $status, 'data' => $data], $status);
        } else {
            return response()->json(['status' => $status, 'message' => $message, 'data' => $data], $status);
        }
    }

    protected function toJsonError($messages, $status = 400)
    {
        return response()->json(['messages' => $messages], $status);
    }

    protected function toJsonSuccess($sucess, $status = 200)
    {
        return response()->json(['status' => $status, 'data' => ['success' => $sucess]], $status);
    }
}
