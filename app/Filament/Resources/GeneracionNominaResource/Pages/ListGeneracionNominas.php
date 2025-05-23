<?php

namespace App\Filament\Resources\GeneracionNominaResource\Pages;

use App\Filament\Resources\GeneracionNominaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeneracionNominas extends ListRecords
{
    protected static string $resource = GeneracionNominaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
