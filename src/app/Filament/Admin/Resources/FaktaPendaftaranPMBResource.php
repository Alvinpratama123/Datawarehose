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
use Filament\Tables\Columns\TextColumn;

class FaktaPendaftaranPMBResource extends Resource
{
    protected static ?string $model = FaktaPendaftaranPMB::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Bisa diisi jika ingin form create/edit
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Contoh tampilkan beberapa kolom dari tabel fakta
                Tables\Columns\TextColumn::make('waktu.tanggal')->label('Tanggal'),
                Tables\Columns\TextColumn::make('lokasi.provinsi')->label('Provinsi'),
                Tables\Columns\TextColumn::make('jalurMasuk.nama_jalur')->label('Jalur Masuk'),
                Tables\Columns\TextColumn::make('calonMahasiswa.nama_lengkap')->label('Nama Calon Mahasiswa'),
                Tables\Columns\TextColumn::make('programStudi.nama_prodi')->label('Program Studi'),
                Tables\Columns\TextColumn::make('status_bayar')->label('Status Bayar'),
                Tables\Columns\TextColumn::make('status_seleksi')->label('Status Seleksi'),
                Tables\Columns\TextColumn::make('jumlah_bayar')->label('Jumlah Bayar')->money('IDR', true),
            ])
            ->filters([
                //
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
                    ->successNotificationTitle('✅ Proses ETL berhasil dijalankan!')
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
            'index' => Pages\ListFaktaPendaftaranPMBS::route('/'),
            'create' => Pages\CreateFaktaPendaftaranPMB::route('/create'),
            'edit' => Pages\EditFaktaPendaftaranPMB::route('/{record}/edit'),
        ];
    }
}
