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
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\DateTimePicker;

class MediosRelationManager extends RelationManager
{
    protected static string $relationship = 'medios';

    protected static ?string $modelLabel = 'Medio de Publicación';
    protected static ?string $pluralModelLabel = 'Medios de Publicación';

    protected static ?string $title = 'Medios de Publicación';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('medio')
                    ->required()
                    ->maxLength(255),
                TextInput::make('link')
                    ->maxLength(255),
                DateTimePicker::make('fecha_publicacion'),
                TextInput::make('costo')
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('medio')
            ->columns([
                TextColumn::make('medio')
                    ->searchable(),
                TextColumn::make('link'),
                TextColumn::make('fecha_publicacion'),
                TextColumn::make('costo'),
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
