<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FaktaPendaftaranPMBResource\Pages;
use App\Models\FaktaPendaftaranPMB;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Artisan;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class FaktaPendaftaranPMBResource extends Resource
{
    protected static ?string $model = FaktaPendaftaranPMB::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_calon_mahasiswa')
                    ->relationship('calonMahasiswa', 'nama_lengkap')
                    ->required(),
                Select::make('id_program_studi')
                    ->relationship('programStudi', 'nama_prodi')
                    ->required(),
                Select::make('id_jalur_masuk')
                    ->relationship('jalurMasuk', 'nama_jalur')
                    ->required(),
                    Select::make('id_lokasi')
                    ->relationship('lokasi', 'kota_kabupaten') // atau bisa pakai 'provinsi'
                    ->required(),                
                Select::make('id_waktu')
                    ->relationship('waktu', 'tanggal')
                    ->required(),
                Select::make('status_bayar')
                    ->options([
                        'Lunas' => 'Lunas',
                        'Belum Lunas' => 'Belum Lunas',
                    ])
                    ->required(),
                Select::make('status_seleksi')
                    ->options([
                        'Lolos' => 'Lolos',
                        'Tidak Lolos' => 'Tidak Lolos',
                    ])
                    ->required(),
                TextInput::make('jumlah_bayar')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('waktu.tanggal')->label('Tanggal'),
                Tables\Columns\TextColumn::make('lokasi.provinsi')->label('Provinsi'),
                Tables\Columns\TextColumn::make('jalurMasuk.nama_jalur')->label('Jalur Masuk'),
                Tables\Columns\TextColumn::make('calonMahasiswa.nama_lengkap')->label('Nama Calon Mahasiswa'),
                Tables\Columns\TextColumn::make('programStudi.nama_prodi')->label('Program Studi'),
                Tables\Columns\TextColumn::make('status_bayar')->label('Status Bayar'),
                Tables\Columns\TextColumn::make('status_seleksi')->label('Status Seleksi'),
                Tables\Columns\TextColumn::make('jumlah_bayar')->label('Jumlah Bayar')->money('IDR', true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Action::make('ETL')
                    ->label('Proses ETL')
                    ->action(function () {
                        Artisan::call('etl:pmb');
                    })
                    ->successNotificationTitle('\u2705 Proses ETL berhasil dijalankan!')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaktaPendaftaranPMBS::route('/'),
            'create' => Pages\CreateFaktaPendaftaranPMB::route('/create'),
            'edit' => Pages\EditFaktaPendaftaranPMB::route('/{record}/edit'),
        ];
    }
}