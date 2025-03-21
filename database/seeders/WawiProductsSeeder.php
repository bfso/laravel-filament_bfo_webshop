<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class WawiProductsSeeder extends Seeder
{
    public function run()
    {
        // Prüfen, ob die Tabelle existiert
        if (!Schema::hasTable('wawi_products')) {
            return;
        }

        // Beispielkategorien abrufen
        $categoryIds = DB::table('wawi_categories')->pluck('id');

        if ($categoryIds->isEmpty()) {
            return;
        }

        // Beispielprodukte einfügen
        DB::table('wawi_products')->insert([
            [
                'product_name' => 'Samsung Galaxy S23',
                'product_description' => 'Leistungsstarkes Smartphone mit beeindruckender Kamera.',
                'purchase_price' => 699.99,
                'product_price' => 899.99,
                'special_price' => 849.99,
                'special_price_from' => Carbon::now()->subDays(3),
                'special_price_to' => Carbon::now()->addDays(7),
                'image' => 'samsung_s23.jpg',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_name' => 'Apple iPhone 14',
                'product_description' => 'Das neueste iPhone mit innovativer Technologie.',
                'purchase_price' => 799.99,
                'product_price' => 1099.99,
                'special_price' => 999.99,
                'special_price_from' => Carbon::now()->subDays(2),
                'special_price_to' => Carbon::now()->addDays(5),
                'image' => 'iphone_14.jpg',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_name' => 'Sony WH-1000XM5',
                'product_description' => 'Premium-Kopfhörer mit Geräuschunterdrückung.',
                'purchase_price' => 249.99,
                'product_price' => 349.99,
                'special_price' => 299.99,
                'special_price_from' => Carbon::now()->subDays(7),
                'special_price_to' => Carbon::now()->addDays(14),
                'image' => 'sony_wh1000xm5.jpg',
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_name' => 'Dell XPS 13',
                'product_description' => 'Leichtes und leistungsfähiges Ultrabook.',
                'purchase_price' => 999.99,
                'product_price' => 1299.99,
                'special_price' => null,
                'special_price_from' => null,
                'special_price_to' => null,
                'image' => 'dell_xps13.jpg',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_name' => 'LG OLED C2 55" TV',
                'product_description' => '4K OLED Fernseher mit atemberaubender Bildqualität.',
                'purchase_price' => 1299.99,
                'product_price' => 1599.99,
                'special_price' => 1399.99,
                'special_price_from' => Carbon::now()->subDays(10),
                'special_price_to' => Carbon::now()->addDays(10),
                'image' => 'lg_oled_c2.jpg',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
