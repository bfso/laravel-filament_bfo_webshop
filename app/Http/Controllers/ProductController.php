<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // Alle Produkte mit dem Query Builder abrufen
        $products = DB::table('wawi_products')->get();

        //Log::debug("Products fetched");
        // Optional: Rückgabe der Produkte als JSON
        return response()->json($products);
    }

}