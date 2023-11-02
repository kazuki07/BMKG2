<?php

namespace App\Filament\Resources\PimpinanResource\Pages;

use App\Filament\Resources\PimpinanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;

class ListPimpinans extends ListRecords
{
    protected static string $resource = PimpinanResource::class;

    protected static ?string $title = 'Pimpinan';

    protected ?string $heading = 'Pimpinan';

    protected ?string $subheading = 'Daftar yang akan dimunculkan pada bagian Pimpinan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Pimpinan')
                ->icon('heroicon-o-plus-circle'),
        ];
    }
}
