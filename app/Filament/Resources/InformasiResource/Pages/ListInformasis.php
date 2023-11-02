<?php

namespace App\Filament\Resources\InformasiResource\Pages;

use App\Filament\Resources\InformasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;

class ListInformasis extends ListRecords
{
    protected static string $resource = InformasiResource::class;

    protected static ?string $title = 'Informasi';

    protected ?string $heading = 'Informasi';

    protected ?string $subheading = 'Daftar yang akan dimunculkan pada bagian Informasi Lainnya';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Informasi')
                ->icon('heroicon-o-plus-circle'),
        ];
    }
}
