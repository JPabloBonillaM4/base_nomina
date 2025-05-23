<?php

namespace App\Filament\Resources\AsignacionUserProductoResource\Pages;

use App\Filament\Resources\AsignacionUserProductoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAsignacionUserProductos extends ListRecords
{
    protected static string $resource = AsignacionUserProductoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
