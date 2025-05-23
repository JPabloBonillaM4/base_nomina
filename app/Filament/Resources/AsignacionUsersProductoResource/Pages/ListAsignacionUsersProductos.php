<?php

namespace App\Filament\Resources\AsignacionUsersProductoResource\Pages;

use App\Filament\Resources\AsignacionUsersProductoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAsignacionUsersProductos extends ListRecords
{
    protected static string $resource = AsignacionUsersProductoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
