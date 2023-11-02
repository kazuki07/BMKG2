<?php

namespace App\Filament\Resources\RunningResource\Pages;

use App\Filament\Resources\RunningResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRunnings extends ListRecords
{
    protected static string $resource = RunningResource::class;

    protected static ?string $title = 'Teks';

    protected ?string $heading = 'Teks';

    protected ?string $subheading = 'Daftar yang akan dimunculkan pada bagian Teks berjalan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Teks')
                ->icon('heroicon-o-plus-circle'),
        ];
    }
}
