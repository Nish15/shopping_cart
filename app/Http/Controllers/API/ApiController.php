<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;


class ApiController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($data = [], $message = null)
    {
    	$response = [
            'status' => 'success',
            'data'    => $data,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $code = 404, $errorMessages = [])
    {
    	$response = [
            'status' => 'failed',
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
