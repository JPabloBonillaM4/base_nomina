<?php

namespace App\Filament\Resources\GeneracionNominaResource\Pages;

use App\Filament\Resources\GeneracionNominaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeneracionNomina extends EditRecord
{
    protected static string $resource = GeneracionNominaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
