<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductService extends Service
{

    public function validateProduct($data)
    {
        return Validator::make($data, [
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => ['required', 'numeric'],
            'make' => ['required', 'numeric'],
            'description' => 'nullable|string',
        ]);
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function createProduct($data)
    {
        try {
            $product = new Product();
            $product->name = $data['name'];
            $product->category_id = $data['category_id'];
            $product->price = $data['price'];
            $product->make = $data['make'];
            $product->description = $data['description'];
            // $product->created_by = Auth::user()->id;
            $product->save();

            return $product;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getFilterProducts($data)
    {
        $where = [];
        if(isset($data['category_id']))
            $where['category_id'] = $data['category_id'];

        $response = Product::where($where)->with('category')->get();

        return $response;
    }
}
