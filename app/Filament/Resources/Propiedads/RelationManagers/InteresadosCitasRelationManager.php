<?php

namespace App\Filament\Resources\Propiedads\RelationManagers;

use App\Filament\Resources\Propiedads\Resources\PropiedadClientes\Resources\Citas\CitaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class InteresadosCitasRelationManager extends RelationManager
{
    protected static string $relationship = 'interesadosCitas';

    protected static ?string $relatedResource = CitaResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
