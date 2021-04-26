<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products =
        [
            [
                "name" => "Nikon D3500 DSLR Camera",
                "category_id" => 3,
                "description" => "The best camera for creatives needs to do a lot of things at once",
                "price"       => 29000,
                "make"        => 2021
            ],
            [
                "name" => "Sony Alpha ILCE 6000Y",
                "category_id" => 2,
                "description" => "The best camera for creatives needs to do a lot of things at once",
                "price"       => 28000,
                "make"        => 2021
            ],
            [
                "name" => "Canon EOS",
                "category_id" => 4,
                "description" => "The best camera for creatives needs to do a lot of things at once",
                "price"       => 4000,
                "make"        => 2021
            ],
            [
                "name" => "Nikon Z50 Mirroless",
                "category_id" => 1,
                "description" => "The best camera for creatives needs to do a lot of things at once",
                "price"       => 45000,
                "make"        => 2021
            ],
            [
                "name" => "Sony Alpha ILCE 6400L",
                "category_id" => 1,
                "description" => "The best camera for creatives needs to do a lot of things at once",
                "price"       => 33000,
                "make"        => 2021
            ],
            [
                "name" => "Canon EOS 90D",
                "category_id" => 5,
                "description" => "The best camera for creatives needs to do a lot of things at once",
                "price"       => 20000,
                "make"        => 2021
            ],
        ];

        Product::insert($products);
    }
}
