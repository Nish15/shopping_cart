<?php

namespace App\Http\Controllers\API;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    public $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function getProduct(Request $request)
    {
        try {
            $data = $this->service->getFilterProducts($request->all());
            return $this->sendResponse($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function createProduct(Request $request)
    {
        try {
            $data = $request->all();
            $validate = $this->service->validateProduct($data);

            if($validate->fails())
                return $this->sendError($validate->messages()->first(), 422, $validate->errors()->all());

            $resData = $this->service->createProduct($data);

            return $this->sendResponse($resData, 'Successfully Added');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
