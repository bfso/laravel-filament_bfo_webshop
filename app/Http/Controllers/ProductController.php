<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WawiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function exportToJson()
    {
        $products = WawiModel::all();
        $jsonData = $products->toJson();
        $filePath = storage_path('app/products.json');
        File::put($filePath, $jsonData);

        return response()->json([
            'message' => 'Daten erfolgreich exportiert',
            'file' => $filePath
        ]);
    }
}