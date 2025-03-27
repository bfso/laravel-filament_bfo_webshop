<?php 

namespace Sapium\FilamentPackageSapiumWawi\Controllers;

use Illuminate\Http\Request;
use App\Http\Controller;
use Sapium\FilamentPackageSapiumWawi\Models\WawiProduct;

class ProductController
{ 
    public function index()
    {
        $products = WawiProduct::with('category')->get();
        return response()->json($products);
    }
}
