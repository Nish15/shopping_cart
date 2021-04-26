<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CartService extends Service
{

    public function addProductInCart($product, $data = [])
    {
        try {
            $user = Auth::user();
            $cart = Cart::whereProductId($product['id'])->whereUserId($user->id)->first();
            if($cart == null){
                $cart = new Cart();
                $cart->product_id = $product['id'];
                $cart->user_id = $user->id;
                $cart->product_count = 1;
                $cart->save();
            } else {

                if(!isset($data['product_count'])){
                    $data['product_count'] = 1;
                }

                $cart->product_count = $cart->product_count + $data['product_count'];

                // Checking that the product count can't be less than Zero.
                if($cart->product_count <= 0) {
                    $cart->product_count = 0;
                    $cart->delete();
                } else {
                    $cart->product_count = $cart->product_count;
                    $cart->save();
                }
            }

            return $cart;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getCartListByUserId()
    {
        $user = Auth::user();
        $where = [];
        if(isset($user->id))
            $where['user_id'] = $user->id;

        $response = Cart::with(['product.category'])->where($where)->get();

        return $response;
    }
}
