<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DimLokasiResource\Pages;
use App\Filament\Admin\Resources\DimLokasiResource\RelationManagers;
use App\Models\DimLokasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;


class DimLokasiResource extends Resource
{
    protected static ?string $model = DimLokasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('provinsi')
                    ->required()
                    ->label('Provinsi'),
    
                TextInput::make('kota_kabupaten')
                    ->required()
                    ->label('Kota / Kabupaten'),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('provinsi')->label('Provinsi'),
                TextColumn::make('kota_kabupaten')->label('Kota / Kabupaten'),
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
            'index' => Pages\ListDimLokasis::route('/'),
            'create' => Pages\CreateDimLokasi::route('/create'),
            'edit' => Pages\EditDimLokasi::route('/{record}/edit'),
        ];
    }
}
