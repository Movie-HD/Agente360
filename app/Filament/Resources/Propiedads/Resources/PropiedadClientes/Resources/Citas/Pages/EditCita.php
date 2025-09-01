<?php

namespace App\Filament\Resources\Propiedads\Resources\PropiedadClientes\Resources\Citas\Pages;

use App\Filament\Resources\Propiedads\Resources\PropiedadClientes\Resources\Citas\CitaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCita extends EditRecord
{
    protected static string $resource = CitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
