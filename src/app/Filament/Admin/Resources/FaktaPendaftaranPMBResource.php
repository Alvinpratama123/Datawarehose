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
    protected static ?string $navigationLabel = 'Fakta Pendaftaran PMB';
    protected static ?string $modelLabel = 'Fakta Pendaftaran';
    protected static ?string $pluralModelLabel = 'Data Fakta Pendaftaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_calon_mahasiswa')
                    ->relationship('calonMahasiswa', 'nama_lengkap')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Calon Mahasiswa'),
                
                Select::make('id_program_studi')
                    ->relationship('programStudi', 'nama_prodi')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Program Studi'),
                
                Select::make('id_jalur_masuk')
                    ->relationship('jalurMasuk', 'nama_jalur')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Jalur Masuk'),
                
                Select::make('id_lokasi')
                    ->relationship('lokasi', 'provinsi')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Lokasi'),
                
                Select::make('id_waktu')
                    ->relationship('waktu', 'tanggal')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Tanggal Pendaftaran'),
                
                Select::make('status_bayar')
                    ->options([
                        'Lunas' => 'Lunas',
                        'Belum Lunas' => 'Belum Lunas',
                    ])
                    ->required()
                    ->native(false)
                    ->label('Status Pembayaran'),
                
                Select::make('status_seleksi')
                    ->options([
                        'Lolos' => 'Lolos',
                        'Tidak Lolos' => 'Tidak Lolos',
                    ])
                    ->required()
                    ->native(false)
                    ->label('Status Seleksi'),
                
                TextInput::make('jumlah_bayar')
                    ->numeric()
                    ->required()
                    ->prefix('Rp')
                    ->label('Jumlah Bayar'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('waktu.tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('lokasi.provinsi')
                    ->label('Provinsi')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('jalurMasuk.nama_jalur')
                    ->label('Jalur Masuk')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('calonMahasiswa.nama_lengkap')
                    ->label('Nama Calon Mahasiswa')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('programStudi.nama_prodi')
                    ->label('Program Studi')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('status_bayar')
                    ->label('Status Bayar')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Lunas' => 'success',
                        'Belum Lunas' => 'danger',
                    }),
                
                Tables\Columns\TextColumn::make('status_seleksi')
                    ->label('Status Seleksi')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Lolos' => 'success',
                        'Tidak Lolos' => 'danger',
                    }),
                
                Tables\Columns\TextColumn::make('jumlah_bayar')
                    ->label('Jumlah Bayar')
                    ->money('IDR', locale: 'id')
                    ->sortable(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('ETL')
                    ->label('Proses ETL')
                    ->action(function () {
                        Artisan::call('etl:pmb');
                    })
                    ->successNotificationTitle('✅ Proses ETL berhasil dijalankan!')
                    ->icon('heroicon-m-arrow-path')
                    ->color('primary')
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
            'index' => Pages\ListFaktaPendaftaranPMB::route('/'),
            'create' => Pages\CreateFaktaPendaftaranPMB::route('/create'),
            'edit' => Pages\EditFaktaPendaftaranPMB::route('/{record}/edit'),
        ];
    }
}