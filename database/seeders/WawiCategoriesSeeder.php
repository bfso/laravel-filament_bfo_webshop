<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class WawiCategoriesSeeder extends Seeder
{
    public function run()
    {
        // Prüfen, ob die Tabelle existiert
        if (!Schema::hasTable('wawi_categories')) {
            return;
        }

        // Beispielkategorien einfügen
        DB::table('wawi_categories')->insert([
            [
                'name' => 'Smartphones',
                'description' => 'Mobiltelefone und Smartphones.',
                'color' => '#ff5733',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Laptops',
                'description' => 'Notebooks und Ultrabooks.',
                'color' => '#33a1ff',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Fernseher',
                'description' => 'LED, OLED und QLED Fernseher.',
                'color' => '#ffd700',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kopfhörer',
                'description' => 'Over-Ear und In-Ear Kopfhörer.',
                'color' => '#8a2be2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Haushaltsgeräte',
                'description' => 'Geräte für den Haushalt.',
                'color' => '#228b22',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}