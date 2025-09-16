<?php

namespace App\Filament\Resources\Citas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\Select;

class CitaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('propiedad_cliente_id')
                    ->label('Cliente interesado')
                    ->relationship('propiedadCliente', 'id')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        $record->cliente->name . ' - ' . $record->propiedad->title
                    )
                    ->required()
                    ->native(false),

                Select::make('user_id')
                    ->label('Agente')
                    ->relationship('agente', 'name')
                    ->required()
                    ->native(false),

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
                    ->label('Observaciones')
                    ->columnSpanFull(),
            ]);
    }
}
