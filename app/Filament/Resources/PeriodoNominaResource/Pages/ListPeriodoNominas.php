<?php

namespace App\Filament\Resources\PeriodoNominaResource\Pages;

use App\Filament\Resources\PeriodoNominaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriodoNominas extends ListRecords
{
    protected static string $resource = PeriodoNominaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
