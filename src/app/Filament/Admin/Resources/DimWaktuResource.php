<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DimWaktuResource\Pages;
use App\Filament\Admin\Resources\DimWaktuResource\RelationManagers;
use App\Models\DimWaktu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class DimWaktuResource extends Resource
{
    protected static ?string $model = DimWaktu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            DatePicker::make('tanggal')
                ->required()
                ->label('Tanggal'),

            TextInput::make('hari')
                ->required()
                ->label('Hari'),

            TextInput::make('bulan')
                ->required()
                ->label('Bulan'),

            TextInput::make('tahun')
                ->required()
                ->label('Tahun'),

            TextInput::make('periode_pendaftaran')
                ->required()
                ->label('Periode Pendaftaran'),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('tanggal')->label('Tanggal'),
            TextColumn::make('hari')->label('Hari'),
            TextColumn::make('bulan')->label('Bulan'),
            TextColumn::make('tahun')->label('Tahun'),
            TextColumn::make('periode_pendaftaran')->label('Periode Pendaftaran'),
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
            'index' => Pages\ListDimWaktus::route('/'),
            'create' => Pages\CreateDimWaktu::route('/create'),
            'edit' => Pages\EditDimWaktu::route('/{record}/edit'),
        ];
    }
}
