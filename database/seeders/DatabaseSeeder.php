<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            WawiSuppliersSeeder::class,
            WawiStocksSeeder::class,
            WawiCategoriesSeeder::class,
            WawiProductsSeeder::class,
            ProductSeeder::class,
            WawiProductCategorieSeeder::class
        ]);

        $admin = User::create([
            'email' => 'admin@bfo.ch',
            'name' => 'admin@bfo.ch',
            'password' => Hash::make('admin@bfo.ch'),
        ]);
    }
}
