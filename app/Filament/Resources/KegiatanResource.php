<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use App\Models\Kegiatan;
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

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Kegiatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama Kegiatan')
                    ->required(),
                TextInput::make('deskripsi')
                    ->label('Deskripsi')
                    ->nullable(),
                FileUpload::make('gambar')
                    ->label('Gambar Kegiatan')
                    ->required()
                    ->directory('kegiatan'),
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
                    ->label('Nama Kegiatan'),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi'),
                ImageColumn::make('gambar')
                    ->label('Gambar Kegiatan'),
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
            'index' => Pages\ListKegiatans::route('/'),
            // 'create' => Pages\CreateKegiatan::route('/create'),
            // 'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
