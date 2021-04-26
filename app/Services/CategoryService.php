<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;;
use Illuminate\Validation\Rule;
use App\Models\Category;

class CategoryService extends Service
{

    public function validateCategory($data)
    {
        return Validator::make($data, [
            'name' => 'required|string',
            'type' => ['required', Rule::in(['Mirrorless', 'Full Frame', 'Point and Shoot'])],
            'model' => 'numeric',
        ]);
    }

    public function getAllCategory()
    {
        return Category::all();
    }

    public function createCategory($data)
    {
        try {
            $category = new Category();
            $category->name = $data['name'];
            $category->type = $data['type'];
            $category->model = $data['model'];
            // $category->created_by = Auth::user()->id;
            $category->save();

            return $category;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getFilterCategory($data)
    {
        $where = [];
        if(isset($data['type']))
            $where['type'] = $data['type'];

        $response = Category::where($where)->get();

        return $response;
    }
}
