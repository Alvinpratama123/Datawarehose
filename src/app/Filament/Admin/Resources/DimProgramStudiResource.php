<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DimProgramStudiResource\Pages;
use App\Filament\Admin\Resources\DimProgramStudiResource\RelationManagers;
use App\Models\DimProgramStudi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class DimProgramStudiResource extends Resource
{
    protected static ?string $model = DimProgramStudi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('nama_prodi')
                ->required()
                ->label('nama_prodi'),

            TextInput::make('jenjang_pendidikan')
                ->required()
                ->label('Jenjang Pendidikan'),

            TextInput::make('fakultas')
                ->required()
                ->label('Fakultas'),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('nama_prodi')->label('nama_prodi'),
            TextColumn::make('jenjang_pendidikan')->label('Jenjang Pendidikan'),
            TextColumn::make('fakultas')->label('Fakultas'),
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
            'index' => Pages\ListDimProgramStudis::route('/'),
            'create' => Pages\CreateDimProgramStudi::route('/create'),
            'edit' => Pages\EditDimProgramStudi::route('/{record}/edit'),
        ];
    }
}
