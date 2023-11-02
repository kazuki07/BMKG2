<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiResource\Pages;
use App\Filament\Resources\InformasiResource\RelationManagers;
use App\Models\Informasi;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InformasiResource extends Resource
{
    protected static ?string $model = Informasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Informasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul Informasi')
                    ->required(),
                TextInput::make('deskripsi')
                    ->label('Deskripsi Informasi')
                    ->nullable(),
                FileUpload::make('gambar')
                    ->label('Gambar Informasi')
                    ->nullable()
                    ->directory('informasi'),
                Select::make('status')
                    ->label('Status Ditampilkan')
                    ->options([
                        'Tampil' => 'Tampilkan',
                        'Tidak' => 'Tidak Tampilkan',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul Informasi'),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi Informasi'),
                ImageColumn::make('gambar')
                    ->label('Gambar Informasi'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Tampil' => 'success',
                        'Tidak' => 'danger',
                    })
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
            ])
            ->emptyStateIcon('heroicon-o-document')
            ->emptyStateHeading('Tidak ada data Informasi');
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
            'index' => Pages\ListInformasis::route('/'),
            // 'create' => Pages\CreateInformasi::route('/create'),
            // 'edit' => Pages\EditInformasi::route('/{record}/edit'),
        ];
    }
}
