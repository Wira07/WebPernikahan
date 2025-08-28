<?php

namespace App\Filament\Resources\BonusPackages\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class BonusPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('thumbnail')
                    ->image()
                    ->required(),

                Forms\Components\Textarea::make('about')
                    ->required(),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),
            ]);
    }
}
