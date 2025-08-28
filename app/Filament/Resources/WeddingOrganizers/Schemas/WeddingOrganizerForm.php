<?php

namespace App\Filament\Resources\WeddingOrganizers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class WeddingOrganizerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('icon')
                    ->image()
                    ->required(),
            ]);
    }
}
