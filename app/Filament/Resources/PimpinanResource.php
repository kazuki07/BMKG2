<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PimpinanResource\Pages;
use App\Filament\Resources\PimpinanResource\RelationManagers;
use App\Models\Pimpinan;
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

class PimpinanResource extends Resource
{
    protected static ?string $model = Pimpinan::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Daftar Pimpinan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama Pimpinan')
                    ->required(),
                TextInput::make('alamat')
                    ->label('Alamat')
                    ->nullable(),
                TextInput::make('nomor')
                    ->label('No. Handphone')
                    ->nullable(),
                FileUpload::make('profil_gambar')
                    ->label('Profil Gambar')
                    ->nullable()
                    ->directory('pimpinan'),
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
                TextColumn::make('nama')
                    ->label('Nama Pimpinan'),
                TextColumn::make('alamat')
                    ->label('Alamat'),
                TextColumn::make('nomor')
                    ->label('No. Handphone'),
                ImageColumn::make('profil_gambar')
                    ->label('Profil'),
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
            'index' => Pages\ListPimpinans::route('/'),
            // 'create' => Pages\CreatePimpinan::route('/create'),
            // 'edit' => Pages\EditPimpinan::route('/{record}/edit'),
        ];
    }
}
