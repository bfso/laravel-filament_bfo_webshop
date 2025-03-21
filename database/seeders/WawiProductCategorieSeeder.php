<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Sapium\FilamentPackageSapiumWawi\Models\WawiProduct;
use Sapium\FilamentPackageSapiumWawi\Models\WawiCategories;

class WawiProductCategorieSeeder extends Seeder
{
    public function run()
    {
        // Get all products
        $products = WawiProduct::all();

        // Get all categories
        $categories = WawiCategories::all();

        // Loop through each product
        foreach ($products as $product) {
            $randomCategories = $categories->random(rand(1, 3));

            foreach ($randomCategories as $category) {
                $product->categories()->attach($category->id);
            }
        }
    }
}
