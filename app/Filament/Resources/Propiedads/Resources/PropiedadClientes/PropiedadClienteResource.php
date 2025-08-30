<?php

namespace App\Filament\Resources\Propiedads\Resources\PropiedadClientes;

use App\Filament\Resources\Propiedads\PropiedadResource;
use App\Filament\Resources\Propiedads\Resources\PropiedadClientes\Pages\CreatePropiedadCliente;
use App\Filament\Resources\Propiedads\Resources\PropiedadClientes\Pages\EditPropiedadCliente;
use App\Filament\Resources\Propiedads\Resources\PropiedadClientes\Schemas\PropiedadClienteForm;
use App\Filament\Resources\Propiedads\Resources\PropiedadClientes\Tables\PropiedadClientesTable;
use App\Models\PropiedadCliente;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PropiedadClienteResource extends Resource
{
    protected static ?string $model = PropiedadCliente::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = PropiedadResource::class;

    public static function form(Schema $schema): Schema
    {
        return PropiedadClienteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PropiedadClientesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreatePropiedadCliente::route('/create'),
            'edit' => EditPropiedadCliente::route('/{record}/edit'),
        ];
    }
}
