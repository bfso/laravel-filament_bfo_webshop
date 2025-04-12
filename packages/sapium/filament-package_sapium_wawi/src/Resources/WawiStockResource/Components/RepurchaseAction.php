<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource\Components;

use Filament\Tables\Actions\Action;
use Filament\Support\Facades\FilamentIcon;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class RepurchaseAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->label('Nachbestellen')
            ->icon(FilamentIcon::resolve('heroicon-o-shopping-cart'))
            ->action(fn(Model $record) => $this->sendReorderEmail($record));
    }

    protected function sendReorderEmail(Model $record): void
    {

        $emailContent = "Nachbestellung für Produkt: " . $record->name;

        try {
            Mail::raw($emailContent, function ($message) {
                $message->to('admin@bfo.ch')
                    ->subject('Nachbestellung erforderlich')
                    ->from(config('mail.from.address', 'noreply@example.com'), config('mail.from.name', 'System'));
            });

            Notification::make()
                ->success()
                ->title('Nachbestellung wurde angefordert')
                ->send();

        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('E-Mail konnte nicht gesendet werden')
                ->body($e->getMessage())
                ->send();
        }
    }

    public function data(): array
    {
        return [];
    }
}
