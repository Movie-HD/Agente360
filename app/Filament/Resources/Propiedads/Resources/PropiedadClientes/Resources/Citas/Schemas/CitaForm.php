<?php

namespace App\Filament\Resources\Propiedads\Resources\PropiedadClientes\Resources\Citas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden; # Agregar si es un Hidden [Form]
use Filament\Forms\Components\Select;

class CitaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('organizacion_id')
                    ->default(auth()->user()->organizacion_id),
                Hidden::make('user_id')
                    ->default(auth()->user()->id),
                DateTimePicker::make('fecha_hora')
                    ->required(),
                Select::make('estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'realizada' => 'Realizada',
                        'cancelada' => 'Cancelada',
                        'reprogramada' => 'Reprogramada',
                    ])
                    ->required()
                    ->native(false),
                Textarea::make('feedback')
                    ->columnSpanFull(),
            ]);
    }
}
