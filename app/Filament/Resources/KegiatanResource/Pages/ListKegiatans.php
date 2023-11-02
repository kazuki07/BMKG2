<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use App\Filament\Resources\KegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;

class ListKegiatans extends ListRecords
{
    protected static string $resource = KegiatanResource::class;

    protected static ?string $title = 'Kegiatan';

    protected ?string $heading = 'Kegiatan';

    protected ?string $subheading = 'Daftar yang akan dimunculkan pada bagian Kegiatan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Kegiatan')
                ->icon('heroicon-o-plus-circle'),
        ];
    }
}
