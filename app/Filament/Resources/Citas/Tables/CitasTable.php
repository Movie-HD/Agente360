<?php

namespace App\Filament\Resources\Citas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class CitasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('propiedadCliente.propiedad.title')
                    ->sortable(),
                TextColumn::make('propiedadCliente.propiedad.propietario.name')
                    ->sortable(),
                TextColumn::make('propiedadCliente.cliente.name')
                    ->label('Interesado')
                    ->sortable(),
                TextColumn::make('agente.name')
                    ->label('Agente')
                    ->sortable(),
                TextColumn::make('fecha_hora')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                TextColumn::make('estado')
                    ->badge()
                    ->colors([
                        'warning' => 'pendiente',
                        'success' => 'realizada',
                        'danger' => 'cancelada',
                        'info' => 'reprogramada',
                    ]),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('hoy')
                    ->query(fn (Builder $query) => 
                        $query->whereDate('fecha_hora', today())
                    ),
            
                Filter::make('mañana')
                    ->query(fn (Builder $query) => 
                        $query->whereDate('fecha_hora', today()->addDay())
                    ),
            
                Filter::make('interes_alto')
                    ->label('Clientes con interés alto')
                    ->query(fn (Builder $query) => 
                        $query->whereHas('propiedadCliente', fn ($q) => 
                            $q->where('nivel_interes', 'alto')
                        )
                    ),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
