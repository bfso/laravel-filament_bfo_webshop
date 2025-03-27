<?php 

namespace Sapium\FilamentPackageSapiumWawi\Controllers;

use Illuminate\Http\Request;
use App\Http\Controller;
use Sapium\FilamentPackageSapiumWawi\Models\WawiProduct;

class ProductController
{ 
    public function index()
    {
        // Lade Produkte mit ihren zugehörigen Kategorien
        $products = WawiProduct::with('categories')->get(); // 'categories' für viele Kategorien
    
        // Gebe die Produkte als JSON zurück
        return response()->json($products);
    }
    
}
