<?php

namespace App\Filament\Admin\Resources\FaktaPendaftaranPMBResource\Pages;

use App\Filament\Admin\Resources\FaktaPendaftaranPMBResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaktaPendaftaranPMB extends EditRecord
{
    protected static string $resource = FaktaPendaftaranPMBResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}