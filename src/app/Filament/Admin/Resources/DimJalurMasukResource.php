<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DimJalurMasukResource\Pages;
use App\Filament\Admin\Resources\DimJalurMasukResource\RelationManagers;
use App\Models\DimJalurMasuk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;


class DimJalurMasukResource extends Resource
{
    protected static ?string $model = DimJalurMasuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_jalur')
                    ->required()
                    ->label('Nama Jalur Masuk'),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_jalur')->label('Nama Jalur Masuk'),
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
            'index' => Pages\ListDimJalurMasuks::route('/'),
            'create' => Pages\CreateDimJalurMasuk::route('/create'),
            'edit' => Pages\EditDimJalurMasuk::route('/{record}/edit'),
        ];
    }
}
