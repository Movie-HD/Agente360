<?php

namespace App\Filament\Resources\Propiedads\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PropiedadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('organizacion_id')
                    ->required()
                    ->numeric(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('cliente_id')
                    ->numeric(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('tipo')
                    ->required(),
                TextInput::make('direccion')
                    ->required(),
                TextInput::make('precio')
                    ->required()
                    ->numeric(),
                TextInput::make('currency_id')
                    ->numeric(),
                TextInput::make('area_total')
                    ->numeric(),
                TextInput::make('area_construida')
                    ->numeric(),
                TextInput::make('dormitorios')
                    ->numeric(),
                TextInput::make('banos')
                    ->numeric(),
                TextInput::make('estacionamientos')
                    ->numeric(),
                TextInput::make('antiguedad')
                    ->numeric(),
                Toggle::make('amoblado')
                    ->required(),
                Toggle::make('exclusividad')
                    ->required(),
                TextInput::make('estado')
                    ->required()
                    ->default('disponible'),
            ]);
    }
}
