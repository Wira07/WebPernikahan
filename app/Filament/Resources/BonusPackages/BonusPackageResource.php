<?php

namespace App\Filament\Resources\BonusPackages;

use App\Filament\Resources\BonusPackages\Pages\CreateBonusPackage;
use App\Filament\Resources\BonusPackages\Pages\EditBonusPackage;
use App\Filament\Resources\BonusPackages\Pages\ListBonusPackages;
use App\Filament\Resources\BonusPackages\Schemas\BonusPackageForm;
use App\Filament\Resources\BonusPackages\Tables\BonusPackagesTable;
use App\Models\BonusPackage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BonusPackageResource extends Resource
{
    protected static ?string $model = BonusPackage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BonusPackageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BonusPackagesTable::configure($table);
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
            'index' => ListBonusPackages::route('/'),
            'create' => CreateBonusPackage::route('/create'),
            'edit' => EditBonusPackage::route('/{record}/edit'),
        ];
    }
}
