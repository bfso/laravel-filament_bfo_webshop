<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class WawiSuppliersSeeder extends Seeder
{
    public function run()
    {
        // Prüfen, ob die Tabelle existiert
        if (!Schema::hasTable('wawi_suppliers')) {
            return;
        }

        // Beispiel-Lieferanten einfügen
        DB::table('wawi_suppliers')->insert([
            [
                'name' => 'Tech Supplies GmbH',
                'description' => 'Lieferant für Elektronik und Zubehör.',
                'phone' => '+49 123 456 789',
                'email' => 'info@techsupplies.de',
                'location' => 'Berlin, Deutschland',
                'contact_person' => 'Max Mustermann',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Home Appliances AG',
                'description' => 'Großhändler für Haushaltsgeräte.',
                'phone' => '+49 987 654 321',
                'email' => 'kontakt@homeappliances.de',
                'location' => 'München, Deutschland',
                'contact_person' => 'Anna Schmidt',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}