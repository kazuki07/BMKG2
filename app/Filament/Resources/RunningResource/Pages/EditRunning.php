<?php

namespace App\Filament\Resources\RunningResource\Pages;

use App\Filament\Resources\RunningResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRunning extends EditRecord
{
    protected static string $resource = RunningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
