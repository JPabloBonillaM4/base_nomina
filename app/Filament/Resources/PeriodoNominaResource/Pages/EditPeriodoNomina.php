<?php

namespace App\Filament\Resources\PeriodoNominaResource\Pages;

use App\Filament\Resources\PeriodoNominaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeriodoNomina extends EditRecord
{
    protected static string $resource = PeriodoNominaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
