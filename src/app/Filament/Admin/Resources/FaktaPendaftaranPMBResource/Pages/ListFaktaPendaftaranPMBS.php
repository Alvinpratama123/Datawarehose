<?php

namespace App\Filament\Admin\Resources\FaktaPendaftaranPMBResource\Pages;

use App\Filament\Admin\Resources\FaktaPendaftaranPMBResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaktaPendaftaranPMBS extends ListRecords
{
    protected static string $resource = FaktaPendaftaranPMBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
