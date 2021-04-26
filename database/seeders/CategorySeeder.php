<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =
        [
            [
                "name" => "Nikon",
                "type" => "Mirrorless",
                "model" => 2021
            ],
            [
                "name" => "Canon",
                "type" => "Mirrorless",
                "model" => 2021
            ],
            [
                "name" => "Nikon",
                "type" => "Full Frame",
                "model" => 2021
            ],
            [
                "name" => "Canon",
                "type" => "Full Frame",
                "model" => 2021
            ],
            [
                "name" => "Nikon",
                "type" => "Point and Shoot",
                "model" => 2021
            ],
            [
                "name" => "Canon",
                "type" => "Point and Shoot",
                "model" => 2021
            ],
        ];

        Category::insert($categories);
    }
}
