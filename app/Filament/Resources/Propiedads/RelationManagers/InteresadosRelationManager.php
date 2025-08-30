<?php

namespace App\Filament\Resources\Propiedads\RelationManagers;

use App\Filament\Resources\Propiedads\Resources\PropiedadClientes\PropiedadClienteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class InteresadosRelationManager extends RelationManager
{
    protected static string $relationship = 'interesados';

    protected static ?string $relatedResource = PropiedadClienteResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
