<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DimCalonMahasiswaResource\Pages;
use App\Filament\Admin\Resources\DimCalonMahasiswaResource\RelationManagers;
use App\Models\DimCalonMahasiswa;
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

class DimCalonMahasiswaResource extends Resource
{
    protected static ?string $model = DimCalonMahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('nama_lengkap')
                ->required()
                ->label('Nama Lengkap'),

            TextInput::make('jenis_kelamin')
                ->required()
                ->label('Jenis Kelamin'),

            DatePicker::make('tanggal_lahir')
                ->required()
                ->label('Tanggal Lahir'),

            TextInput::make('pendidikan_terakhir')
                ->required()
                ->label('pendidikan_terakhir'),
            TextInput::make('asal_sekolah')
                ->required()
                ->label('asal_sekolah'),    

        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('nama_lengkap')->label('Nama Lengkap'),
            TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
            TextColumn::make('tanggal_lahir')->label('Tanggal Lahir'),
            TextColumn::make('asal_sekolah')->label('asal_sekolah'),

            TextColumn::make('pendidikan_terakhir')->label('pendidikan_terakhir'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDimCalonMahasiswas::route('/'),
            'create' => Pages\CreateDimCalonMahasiswa::route('/create'),
            'edit' => Pages\EditDimCalonMahasiswa::route('/{record}/edit'),
        ];
    }
}
