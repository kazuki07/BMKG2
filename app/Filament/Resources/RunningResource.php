<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RunningResource\Pages;
use App\Filament\Resources\RunningResource\RelationManagers;
use App\Models\Running;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RunningResource extends Resource
{
    protected static ?string $model = Running::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Running Text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('teks')
                    ->label('Teks')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('teks')
                    ->label('Teks')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRunnings::route('/'),
            // 'create' => Pages\CreateRunning::route('/create'),
            // 'edit' => Pages\EditRunning::route('/{record}/edit'),
        ];
    }
}
