<?php

namespace App\Http\Controllers\API;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    public $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function getCategory(Request $request)
    {
        try {
            $data = $this->service->getFilterCategory($request->all());
            return $this->sendResponse($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function createCategory(Request $request)
    {
        try {
            $data = $request->all();
            $validate = $this->service->validateCategory($data);

            if($validate->fails())
                return $this->sendError($validate->messages()->first(), 422, $validate->errors()->all());

            $resData = $this->service->createCategory($data);

            return $this->sendResponse($resData, 'Successfully Added');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
