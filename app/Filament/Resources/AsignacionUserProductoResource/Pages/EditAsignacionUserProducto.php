<?php

namespace App\Filament\Resources\AsignacionUserProductoResource\Pages;

use App\Filament\Resources\AsignacionUserProductoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAsignacionUserProducto extends EditRecord
{
    protected static string $resource = AsignacionUserProductoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
