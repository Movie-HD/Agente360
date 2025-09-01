<?php

namespace App\Filament\Resources\Propiedads\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AgentesRelationManager extends RelationManager
{
    protected static string $relationship = 'agentes';

    protected static ?string $modelLabel = 'Agente Invitado';
    protected static ?string $pluralModelLabel = 'Agentes Invitados';

    protected static ?string $title = 'Agentes Invitados';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('agente', 'name')
                    ->required()
                    ->native(false),
                TextInput::make('porcentaje_comision')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
                Select::make('tipo')
                    ->options([
                        'invitado' => 'Invitado',
                        'compartido' => 'Compartido',
                    ])
                    ->required()
                    ->native(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('agente.name')
            ->columns([
                TextColumn::make('agente.name')
                    ->searchable(),
                TextColumn::make('porcentaje_comision')
                    ->searchable(),
                TextColumn::make('tipo')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
