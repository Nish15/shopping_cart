<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController as ApiController;
use App\Models\Product;
use App\Models\User;
use App\Services\CartService;

class CartController extends ApiController
{
    public $service;

    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function getCartListByUserId(Request $request)
    {
        try {
            $data = $this->service->getCartListByUserId();
            return $this->sendResponse($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function addProductInCart(Request $request, Product $product)
    {
        try {
            $data = $request->all();
            $product = $product->toArray();
            $resData = $this->service->addProductInCart($product, $data);

            return $this->sendResponse($resData, 'Successfully Added');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
