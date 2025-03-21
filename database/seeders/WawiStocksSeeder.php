<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class WawiStocksSeeder extends Seeder
{
    public function run()
    {
        // Prüfen, ob die Tabelle existiert
        if (!Schema::hasTable('wawi_stocks')) {
            return;
        }

        // Beispiel-Lieferanten abrufen
        $supplierIds = DB::table('wawi_suppliers')->pluck('id');

        if ($supplierIds->isEmpty()) {
            return;
        }

        // Beispiel-Bestände einfügen
        DB::table('wawi_stocks')->insert([
            [
                'color' => '#000000',
                'description' => 'Laptop mit leistungsstarker Hardware.',
                'price' => 1299.99,
                'amount' => 50,
                'supplier_id' => $supplierIds->random(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'color' => '#ffffff',
                'description' => 'Kabellose Kopfhörer mit Geräuschunterdrückung.',
                'price' => 299.99,
                'amount' => 200,
                'supplier_id' => $supplierIds->random(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'color' => '#336eff',
                'description' => 'Smartphone mit hochauflösendem Display.',
                'price' => 899.99,
                'amount' => 100,
                'supplier_id' => $supplierIds->random(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}