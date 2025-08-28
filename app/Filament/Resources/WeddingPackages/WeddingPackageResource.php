<?php

namespace App\Filament\Resources\WeddingPackages;

use App\Filament\Resources\WeddingPackages\Pages\CreateWeddingPackage;
use App\Filament\Resources\WeddingPackages\Pages\EditWeddingPackage;
use App\Filament\Resources\WeddingPackages\Pages\ListWeddingPackages;
use App\Filament\Resources\WeddingPackages\Schemas\WeddingPackageForm;
use App\Filament\Resources\WeddingPackages\Tables\WeddingPackagesTable;
use App\Models\WeddingPackage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeddingPackageResource extends Resource
{
    protected static ?string $model = WeddingPackage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return WeddingPackageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WeddingPackagesTable::configure($table);
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
            'index' => ListWeddingPackages::route('/'),
            'create' => CreateWeddingPackage::route('/create'),
            'edit' => EditWeddingPackage::route('/{record}/edit'),
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
