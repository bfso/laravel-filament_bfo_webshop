<?php
namespace Sapium\FilamentPackageSapiumWawi;

use Illuminate\Support\Facades\DB;

class WawigetProduct
{
    // Alle Produkte aus der Tabelle 'wawi_products' auslesen
    public static function sync()
    {
        // Alle Produkte mit dem Query Builder abrufen
        return DB::table('wawi_products')->get();

        //Log::debug("Products fetched");
        // Optional: Rückgabe der Produkte als JSON
        // return response()->json($products);s
    }

}
