<?php

namespace App\Filament\Resources\WeddingTestimonials;

use App\Filament\Resources\WeddingTestimonials\Pages\CreateWeddingTestimonial;
use App\Filament\Resources\WeddingTestimonials\Pages\EditWeddingTestimonial;
use App\Filament\Resources\WeddingTestimonials\Pages\ListWeddingTestimonials;
use App\Filament\Resources\WeddingTestimonials\Schemas\WeddingTestimonialForm;
use App\Filament\Resources\WeddingTestimonials\Tables\WeddingTestimonialsTable;
use App\Models\WeddingTestimonial;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeddingTestimonialResource extends Resource
{
    protected static ?string $model = WeddingTestimonial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return WeddingTestimonialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WeddingTestimonialsTable::configure($table);
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
            'index' => ListWeddingTestimonials::route('/'),
            'create' => CreateWeddingTestimonial::route('/create'),
            'edit' => EditWeddingTestimonial::route('/{record}/edit'),
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
