<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APIBaseController extends Controller
{
    function sendResponse($result, $message){
        $response = [
            "success" => true,
            "message" => $message,
            "data" => $result
        ];
        return response()->json($response, 200);
    }


    function sendError($error, $errorMessages = []){
        $response = [
            "success" => false,
            "message" => $error
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, 404);
    }
}
