<?php

namespace App\Filament\Resources\Propiedads\Resources\PropiedadClientes\Pages;

use App\Filament\Resources\Propiedads\Resources\PropiedadClientes\PropiedadClienteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPropiedadCliente extends EditRecord
{
    protected static string $resource = PropiedadClienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
