<?php

namespace App\Filament\Resources\Propiedads\Resources\PropiedadClientes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class PropiedadClienteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('cliente_id')
                    ->relationship('cliente', 'name')
                    ->required()
                    ->native(false),
                Select::make('nivel_interes')
                    ->options([
                        'alto' => 'Alto',
                        'medio' => 'Medio',
                        'bajo' => 'Bajo',
                    ])
                    ->required()
                    ->native(false),
                Select::make('estado_contacto')
                    ->options([
                        'llamada' => 'Llamada',
                        'visita' => 'Visita',
                        'oferta' => 'Oferta',
                        'otros' => 'Otros',
                    ])
                    ->required()
                    ->native(false),
            ]);
    }
}
