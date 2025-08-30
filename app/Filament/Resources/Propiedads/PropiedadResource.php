<?php

namespace App\Filament\Resources\Propiedads;

use App\Filament\Resources\Propiedads\Pages\CreatePropiedad;
use App\Filament\Resources\Propiedads\Pages\EditPropiedad;
use App\Filament\Resources\Propiedads\Pages\ListPropiedads;
use App\Filament\Resources\Propiedads\Schemas\PropiedadForm;
use App\Filament\Resources\Propiedads\Tables\PropiedadsTable;
use App\Models\Propiedad;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropiedadResource extends Resource
{
    protected static ?string $model = Propiedad::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return PropiedadForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PropiedadsTable::configure($table);
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
            'index' => ListPropiedads::route('/'),
            'create' => CreatePropiedad::route('/create'),
            'edit' => EditPropiedad::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
