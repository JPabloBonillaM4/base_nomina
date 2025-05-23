<?php

namespace App\Filament\Resources\ProduccionDiariaResource\Pages;

use App\Filament\Resources\ProduccionDiariaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProduccionDiarias extends ListRecords
{
    protected static string $resource = ProduccionDiariaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
