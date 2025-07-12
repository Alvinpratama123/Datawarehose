<?php

namespace App\Filament\Admin\Resources\FaktaPendaftaranPMBResource\Pages;

use App\Filament\Admin\Resources\FaktaPendaftaranPMBResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFaktaPendaftaranPMB extends CreateRecord
{
    protected static string $resource = FaktaPendaftaranPMBResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}