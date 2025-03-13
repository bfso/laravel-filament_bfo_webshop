<?php

namespace App\Providers\Filament\Wawi\Widgets;

use Filament\Widgets\Widget;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource;

class WawiProductTableWidget 
{
    protected static string $view = 'filament.wawi.widgets.wawi-product-table-widget';
    
    public function getHeading(): string
    {
        return 'Wawi Product Table';
    }

    public function render()
    {
        return view(static::$view, [
            'table' => WawiProductResource::table($this),
        ]);
    }
}
