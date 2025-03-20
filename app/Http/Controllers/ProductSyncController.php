<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sapium\FilamentPackageSapiumWawi\Models\WawiProduct;
use App\Models\ShopProduct;

class ProductSyncController extends Controller
{
    public function sync()
    {
        $wawiProducts = WawiProduct::all();

        foreach ($wawiProducts as $wawiProduct) {
            ShopProduct::updateOrCreate(
                ['wawi_product_id' => $wawiProduct->id],
                [
                    'name' => $wawiProduct->product_name,
                    'description' => $wawiProduct->product_description,
                    'price' => $wawiProduct->product_price,
                    'special_price' => $wawiProduct->special_price,
                    'special_price_from' => $wawiProduct->special_price_from,
                    'special_price_to' => $wawiProduct->special_price_to,
                    'image' => $wawiProduct->image,
                ]
            );
        }

        return redirect()->back()->with('success', 'Products synced successfully!');
    }
}